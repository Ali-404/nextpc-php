

function AddToBasket(product, count = 1){
   let oldStorage = localStorage.getItem("basket")
   oldStorage = JSON.parse(oldStorage)


   if (!oldStorage){
    oldStorage = {}
   }

    if (oldStorage[product]){
        // INCREASE IT
        oldStorage[product] = oldStorage[product] + count
    }else {
        oldStorage[product] = count
    }
    localStorage.setItem("basket", JSON.stringify(oldStorage))

}

function RemoveFromBasket(product, count = -1){
    
    let basket = GetProductsInBasket()
    if (basket){
        const targetProduct = Object.keys(basket).filter(prd => prd == product && basket[prd] >= count)
        if (targetProduct){
            basket[product] -= count
            if (basket[product] <= 0 || count <= -1){
                delete basket[product]
            }
        }
    }
    // resave basket
    
    if (Object.keys(basket).length > 0){
        localStorage.setItem("basket", JSON.stringify(basket))
        
    }else {
        localStorage.removeItem("basket")
    }
}

function CountProcutsInBasket(product){
    const products = GetProductsInBasket()
    if (products){
        if (products[product]){
            return products[product]
        }
    }
    return 0
}

function GetProductsInBasket(){
    const itemsInBasket = localStorage.getItem("basket")
    return JSON.parse(itemsInBasket) || false
}


function ClearBasket(){
    return localStorage.removeItem("basket")
}
