const urlParams = parseURLParams(window.location.href)
document.addEventListener("DOMContentLoaded", () => {
    setLoading(false)
    if (!urlParams?.account){
        window.location.href = "../../ERROR.php?err=Invalid Account !"
        return
    }

})
function loadDates(){
        
    
        const select = document.getElementById("expireYY")
        for (let i = 1900; i < 2100; i++) {
    
            const el = document.createElement("option")
            el.setAttribute("value", i)
            el.innerText = i.toString()
            select.appendChild(el)
        }  
    }
loadDates()



function submitPayment(e){
    e.preventDefault()
    setLoading(true)

    $.ajax({
        type: "GET",
        url: "../../Backend/CurrentAccount.php",
        dataType: "json",
        success: function (response) {
            if (response && response?.account){
                
                const formData = new FormData(e.target);
                
                const itemsInBasket = JSON.parse(localStorage.getItem("basket"))
               
                    
                    // load in side html

                    // =====
                    $.ajax({
                        type: "GET",
                        url: "../../Backend/ProductsArray.php",
                        data: {
                            products: JSON.stringify(Object.keys(itemsInBasket))
                        },
                        dataType: "json",
                        success: function (allProducts) {
                            
                            let price = 0
                            const account_id = urlParams.account
                            allProducts.forEach(prod => {
                                const count = itemsInBasket[prod.id]
                        
                                price += (prod.price * count)
                            })

                            // data append
                            formData.append("price", price)
                            formData.append("account_id", account_id)
                            formData.append("products", JSON.stringify(Object.keys(itemsInBasket)))

                            const data = {}

                            formData.forEach((v,k) => {
                                data[k] = v
                            })
                            // send
                            try {

                                $.ajax({
                                    type: "POST",
                                    url: "../../Backend/Payment.php",
                                    data: data,
                                    dataType: "json",
                                    success: function (response) {
                                        if (response['error'] == false){
                                            localStorage.removeItem("basket")
                                            window.location.href = '../Done/index.php'
                                        }else {
                                            showAlert("danger", response["message"])
                                        }
                                    }
                                });
                            }catch(e){
                                console.error(e)
                                setLoading(false)
                                showAlert("danger", "Sorry we have a probleme! please try again or contact us.")
                            }

                            setTimeout(function (){
                                setLoading(false)
                            },3000)
                        }
                    });
                    
                
                
            }else {
                showAlert("warning", "You must be logged in to complete ! Please Login or Sign Up.")
                setLoading(false)
                
            }
        }
    });

}

setLoading(true)