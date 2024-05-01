// load images in pictures

const images = ["../../UPLOAD/PC/1.png", "../../UPLOAD/PC/2.png"]

function loadImages(){
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

loadImages()


function changeUrl(e) {
    const urlTo = e.currentTarget.getAttribute('data-urlto')
    const container = document.querySelector(".thePic > img")
    container.src = urlTo
}