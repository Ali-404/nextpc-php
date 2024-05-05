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
            console.log(categories)

            categories.forEach((categorie,indx) => {
                const newCat = document.createElement("button")
                newCat.className = `bi bi-${categorie[2]} link link-light categorieButton`
                newCat.id = 'cat' + categorie[0].toString();
                if (indx == 0){
                    newCat.classList.add("link-active")
                    LoadProducts(categorie[0],categorie)
                }

                newCat.innerText = " " + categorie[1]
                newCat.addEventListener("click", ( ) => LoadProducts(categorie[0]))
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

    const productsContainer = document.getElementById('productsContainer')
    const promotionContainer = document.querySelector(".headerInfos")
    const adsContainer = document.querySelector('.headersInfo2')

    // load Procuts
    productsContainer.innerHTML = ``


    // load Promotion
    promotionContainer.innerHTML = `
    <img src="../../assets/pc1.jpg" />
    <b>
      <h3>Title Of product</h3>
      <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quibusdam, soluta.</p>
      <a href="" class="btn2">Buy Now</a>
    </b>
    `


    // load Ads
    adsContainer.innerHTML = ``

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
    },1000)

}



// Load Categories on start
LoadCategories();