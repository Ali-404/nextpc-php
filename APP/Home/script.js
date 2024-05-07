// load Categories

function LoadCategories(){
    $.ajax({
        url: '../../Backend/Categories.php',
        type: 'GET',
        dataType: 'json',
        success: function(categories){
            // load categories in html
            const categoriesContainer = document.getElementById("categoriesContainer")
            categoriesContainer.innerHTML = ``

            categories.forEach((categorie,indx) => {
                const newCat = document.createElement("button")
                newCat.className = `bi bi-${categorie[2]} link link-light categorieButton`
                newCat.id = 'cat' + categorie[0].toString();
                if (indx == 0){
                    newCat.classList.add("link-active")
                    LoadProducts(categorie[0],categorie)
                }

                newCat.innerText = " " + categorie[1]
                newCat.addEventListener("click", ( ) => LoadProducts(categorie[0],categorie))
                categoriesContainer.appendChild(newCat)
            });

            // update link class on click

        },
        error: function(xhr, status, error){
            // Handle error
            console.error(xhr.responseText);
        }
    });
}


function LoadProducts(categorieID, categorie){

    setLoading(true)

    $.ajax({
        url: '../../Backend/Products.php',
        type: 'GET',
        data: {
            categorie:categorieID,
        },
        dataType: 'json',
        success: function(products){
            const productsContainer = document.getElementById('productsContainer')
            const promotionContainer = document.querySelector(".headerInfos")
            const adsContainer = document.querySelector('.headersInfo2')

            // empty all 
            productsContainer.innerHTML = `<small>There is no Product in our stock.</small>`
          
            promotionContainer.innerHTML = ``
            if (!promotionContainer.classList.contains("hidden")){
                promotionContainer.classList.add("hidden")
            }

            if (!adsContainer.classList.contains("hidden")){
                adsContainer.classList.add("hidden")
            }
            adsContainer.classList.add("hidden")


            // load Procuts

            if (products && products.length > 0 ){
                
                if (products.length >= 12){
                    for (let i = 0; i <= 6; i++) {
                        LoadProductHTML(products[i])                        
                    }
                    document.querySelector("#loadMoreBtn").classList.remove("hidden")
                    document.querySelector("#loadMoreBtn").addEventListener('click', () => {
                        setLoading(true)
                        for (let i = 0; i <= 6; i++) {
                            LoadProductHTML(products[i])             
                        }  
                        setTimeout(() => setLoading(false),400)
                    })
                }else {
                    products.forEach(product => {
                        LoadProductHTML(product)                        
                    })
                }
    
    
                // load Promotion
                if (categorie && categorie[3]){
                    const targetProduct = products.filter(prd =>prd[0] ==categorie[3])[0]
                    
                    promotionContainer.classList.remove('hidden')
                    if (targetProduct){
                        promotionContainer.innerHTML = `
                        <img src="../../UPLOAD/${targetProduct[10]}/${targetProduct[8]}" />
                        <b>
                        <h3>${targetProduct[1]}</h3>
                        <p>${targetProduct[2]}</p>
                        <a href="../Product/index.php?product=${targetProduct[0]}" class="btn2">Buy Now</a>
                        </b>`
                    }
                    
                }
    
    
                // load Ads
                if (categorie && categorie[4] && categorie[5] && categorie[6]){

                    const ads = [categorie[4]||false,categorie[5]||false,categorie[6]||false]
                    ads.forEach((ad,adID) => {
                        if (!ad) return
                        adsContainer.classList.remove('hidden')

                        const _adID = adID + 1
                        const adContainerButton = document.querySelector("#ad" + _adID.toString())
                        
                        const adObject = JSON.parse(ad)
                        const title = adObject.title
                        const disc = adObject.description
                        const target = adObject.target
                       
                        if (title && disc){
                            adContainerButton.innerHTML = `
                            <h1>${title}</h1>
                            <p>${disc}</p>
                            `
                        }
    
                        if (target){
                            adContainerButton.addEventListener("click", () => window.href.location = target )
                        }
    
                    })
                }
            }


            // link active
            const btnLink = document.querySelectorAll('.categorieButton')
            if (btnLink){
                btnLink.forEach(btn => {
                    if (btn.id == 'cat' + categorieID.toString()){
                        btn.classList.add("link-active");
                    }else {
                        btn.classList.remove("link-active");
                    }
                })
            }

            setTimeout(() => {
                setLoading(false)
            },200)

        },
        error: function(xhr, status, error){
            setLoading(false)
            showAlert("danger", "Unable to load Products ! Try again later .")
            console.error(error);
        }
    });

    

}

function LoadProductHTML(product){
    const productsContainer = document.getElementById('productsContainer')
    const newElement = document.createElement("div")
    newElement.innerHTML = `
        <div class="card " onclick="OpenProductPage(${product[0]})" data-discription="${product[2]}">
        <img src="../../UPLOAD/${product[10]}/${product[8]}" />
        <h1 class="heading">${product[1]}</h1>
        <div><span class="oldPrice">${product[4]} Dhs</span><span class="price"> ${product[3]} Dhs</span></div>
        <div class="my-3">
            <a class="btn1 text-bg-light bi bi-basket" onclick="OpenProductPage(${product[0]})"> Buy Now</a>
        </div>
        </div>
    `
    productsContainer.appendChild(newElement)
    document.querySelector("small").classList.add("hidden")
}


function OpenProductPage(id){
    window.location.href = `../Product/index.php?product=${id}`
}


// Load Categories on start
LoadCategories();