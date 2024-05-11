const orderEl = document.querySelector("orders")
const favEl = document.querySelector("fav")

function changePage(event){
    document.querySelector("#page1").classList.toggle("hidden")
    document.querySelector("#page2").classList.toggle("hidden")
    document.querySelector("#orders").classList.toggle("active")
    document.querySelector("#fav").classList.toggle("active")
}

