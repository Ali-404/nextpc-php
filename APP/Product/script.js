// load images in pictures


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

            document.querySelector("#titleH1").innerText = product[1]
            document.querySelector('.oldPrice').innerText = product[4].toString() + " Dhs"
            document.querySelector('.price').innerText = product[3].toString() + " Dhs"


            // load pc data if pc
            if (product[6]){
                if (product[7] && product[7] != null){
                    const pcData = JSON.parse(product[7])
                    const keys = Object.keys(pcData)

                    keys.forEach(pcInfoTitle => {
                        document.querySelector("#" + pcInfoTitle).innerText = pcData[pcInfoTitle]
                    })
                }

            }

            // cover
            if (product[8]){
                const imagePath = `../../UPLOAD/${product[10]}/${product[8]}`
                document.getElementById("cover").src = imagePath;
            }
            // images

            $.ajax({
                type: "GET",
                url: "../../Backend/Likes.php",
                data: {
                    product:product[0]
                },
                dataType: "json",
                success: function (likesTable) {
                    document.querySelector("#likes").innerText = " " + (likesTable.length || 0).toString() + " Likes"
                    
                }
            });

            // likes

            // user Like


        },
        error:function(xhr, ajaxOptions, thrownError){
            window.location.href = `../../ERROR.php?error=${"Invalid Product !"}`
        }
    });
}

LoadProduct()