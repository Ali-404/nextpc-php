// load images in pictures
var isFirstTime = true

function loadImages(images){
    const btnsContainer = document.querySelector(".picturesSec .btns")

    images.forEach(img => {
        const newEl = document.createElement("button")
        newEl.setAttribute("data-urlTo", img)
        newEl.setAttribute("onclick", "changeUrl(event)")
        newEl.innerHTML = `
            <img src='${img}' />
        `
        btnsContainer.appendChild(newEl)
    })
}



function changeUrl(e) {
    const urlTo = e.currentTarget.getAttribute('data-urlto')
    const container = document.querySelector(".thePic > img")
    container.src = urlTo
}


// load product 

function LoadProduct(){
    const urlParams = parseURLParams(window.location.href)
    if (!urlParams){
        
         console.error("No Arguments passed with the url ")
         window.location.href = `../../ERROR.php?error=${"Invalid Product !"}`
         return
    }
    if (!urlParams['product']){
         console.error("No Product passed with the url")
         
    }
    $.ajax({
        type: "GET",
        url: "../../Backend/Products.php",
        data: {
            product:urlParams['product'][0]
        },
        dataType: "json",
        success: function (res) {
            if (res.length <= 0){
                window.location.href = `../../ERROR.php?error=${"Invalid Product !"}`
                return
            }
            const product = res[0]

            updateLikes(-1,product[0])


            document.querySelector("#titleH1").innerText = product[1]

            if (product[4] && product[4] > 0){
                document.querySelector('.oldPrice').style.visibility = 'visible'
                document.querySelector('.oldPrice').innerText = product[4].toString() + " Dhs"
            }else {
                document.querySelector('.oldPrice').style.visibility = 'hidden'
            }
            
            document.querySelector('.price').innerText = product[3].toString() + " Dhs"
            
            if (product[2] && product[2].trim().length > 0){
                
                document.querySelector('#discreption').style.visibility = 'visible'
                document.querySelector("#discreption p").innerText = product[2]
            }else {
                
                document.querySelector('#discreption').style.visibility = 'hidden'
            }
            if (CountProcutsInBasket(product[0]) > 0){

                document.querySelector("#productCount").innerText = "(" + CountProcutsInBasket(product[0]) + ")"
            }else {
                document.querySelector("#productCount").innerText = ''
            }
            document.querySelector("#addToBasketButton").addEventListener("click", () => {
                AddToBasket(product[0])
                if (CountProcutsInBasket(product[0]) > 0){

                    document.querySelector("#productCount").innerText = "(" + CountProcutsInBasket(product[0]) + ")"
                }else {
                    document.querySelector("#productCount").innerText = ''
                }
            })

            // load pc data if pc
            if (product[6] && product[6] == 1){
                if (product[7] && product[7] != null){

                    document.querySelector("#infos").classList.remove("hidden")
                    const pcData = JSON.parse(product[7])
                    const keys = Object.keys(pcData)

                    keys.forEach(pcInfoTitle => {
                        const el = document.querySelector("#" + pcInfoTitle)
                        if (el){
                            el.innerText = pcData[pcInfoTitle]
                        }
                    })
                }

            }else {
                document.querySelector("#infos").classList.add("hidden")
            }

            // cover
            if (product[8]){
                const imagePath = `../../UPLOAD/${product[10]}/${product[8]}`
                document.getElementById("cover").src = imagePath;
            }
            // images


            $.ajax({
                type: "GET",
                url: "../../Backend/CurrentAccount.php",
                dataType: "json",
                success: function (accountData) {
                    const correntAccountData = JSON.parse(accountData["account"])
                    if (correntAccountData && !correntAccountData.error){
                        // likes
                       updateLikes(correntAccountData.id, product[0])
                    }else {
                        console.warn("No Account to get likes !")
                    }
                }
            });


            



            // remove loading
            setTimeout(() => setLoading(false),1000)
            
        },
        error:function(xhr, ajaxOptions, thrownError){
            setLoading(false)
            window.location.href = `../../ERROR.php?error=${"Invalid Product !"}`
        }
    });
}



function Like(account, product){
    $.ajax({
        type: "post",
        url: "../../Backend/AddLikes.php",
        data: {
            "account":account,
            "product":product
        },
        dataType: "json",
        success: function (response) {
            updateLikes(account, product);
        },
        error: function(a,b,err){
            console.error(err);
        }
    });
}

function updateLikes(account,product){
    $.ajax({
        type: "GET",
        url: "../../Backend/Likes.php",
        data: {
            product:product,
            // account:account
        },
        dataType: "json",
        success: function (likesTable) {
            if (account && account != -1){
                const MyLikesCount = likesTable.filter(like => like[1] == account).length || 0
                if (MyLikesCount > 0 && isFirstTime){
                    document.getElementById("heart").checked = true;
                    isFirstTime = false;  
                }

                    // user on Like

                document.getElementById("heart").onclick = () => Like(account, product)
            

            }else {

                document.getElementById("heart").onclick = (e) => {e.preventDefault();showAlert("danger", "Please LogIn to like .")}
            }
            const allLikes = likesTable.length || 0
            
            document.querySelector("#likes").innerText = " " + allLikes.toString() + " Likes"
            
        }
    });
}
setLoading(true)
document.addEventListener("DOMContentLoaded", () => LoadProduct())