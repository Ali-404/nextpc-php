
function loadBasketData(){
    
    setLoading(true)
    const basketData = GetProductsInBasket()
    const container = document.getElementById("containerOrders")
    container.innerHTML = ''
  
    if (basketData){
        document.getElementById("noProcuctsText").classList.add("hidden")
        document.getElementById("checkout").classList.remove("disabled")

        Object.keys(basketData).forEach(productID => {
            const count = basketData[productID]
            if (count > 0){
                $.ajax({
                    type: "GET",
                    url: "../../Backend/Products.php",
                    data:{
                        'product':productID
                    },
                    dataType: "json",
                    success: function (products) {
                        products.forEach(product => {
                            const newEl = document.createElement("div")
                            newEl.className = "w-100 flex-fill d-flex flex-column flex-md-row align-items-center justify-content-between gap-3"
                            newEl.id = `productContainer-${product[0]}`
                            newEl.innerHTML = `
                                <img src="../../UPLOAD/${product[10]}/${product[8]}" class="productImage" alt="">
                                <div class="d-flex flex-column align-items-center gap-1 infos">
                                <h1>${product[1]}</h1>
                                <p>${product[2]}</p>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                <button class="controlBtn bi bi-plus" onclick="AddProd(${product[0]}, ${product[3]})"></button>
                                <span id="product-${product[0]}">${count}</span>
                                <button class="controlBtn bi bi-dash" onclick="RemoveProd(${product[0]}, ${product[3]})"></button>
                                </div>
                                <div class="d-flex flex-column align-items-center gap-1">
                                <h3 id="price-${product[0]}">${product[3] * count} Dhs</h3>
                                <button class="btn btn-outline-danger" onclick="RemoveProd(${product[0]})">Remove</button>
                                </div>
                            `
                            
                            const hr = document.createElement("hr")
                            hr.className = "w-100"
                            container.appendChild(hr)
                            container.appendChild(newEl)
                        });

                        setLoading(false)

                    },
                    error:function(){
                        setLoading(false)
                        errBack()
                    }
                });
            }

            
            
        })
    }else {
        document.getElementById("noProcuctsText").classList.remove("hidden")
        document.getElementById("checkout").classList.add("disabled")
        
    }

    setLoading(false)

}




function errBack(){
    window.location.href = "../../ERROR.php"
    return false 
}



loadBasketData()


function AddProd(id,price){
    AddToBasket(id,1)
    updateEl(id, price)
}
function RemoveProd(id ,price){
    RemoveFromBasket(id,1)
    updateEl(id, price)
}

function updateEl(id, price){
    var el = document.querySelector("#product-"+id);
    if (el != null){
        const count = CountProcutsInBasket(id)
        if (count > 0){
            el.innerText = count
            // update price
            document.querySelector("#price-" + id).innerText = (price * count).toString() + " Dhs"

        }else {
            document.querySelector("#productContainer-" + id).remove()
            if (!GetProductsInBasket()){
                document.querySelector("#noProcuctsText").classList.remove("hidden")
                document.querySelector("#checkout").classList.add("disabled")
            }
        }
    }
}


function updateDisible(btn = false){
    
    if (!btn){
        btn = document.querySelector("#removeAll")
    }
    if (!GetProductsInBasket()){
        btn.classList.add("disabled")
    }else {
        btn.classList.remove("disabled")
    }
}

function removeAll(){
    document.querySelector("#containerOrders").innerText = ''
    document.querySelector("#noProcuctsText").classList.remove("hidden")
    document.querySelector("#checkout").classList.add("disabled")
}
updateDisible()