// loading bg
window.addEventListener('DOMContentLoaded', () => {
  const bgLoading = document.createElement("div")
  bgLoading.className = "bgLoading hidden"
  bgLoading.setAttribute('id', 'bgLoading') 
  document.body.appendChild(bgLoading)
})

// alert
function showAlert(type, text,timeout = 3000){
    var body = document.querySelector(".notifContainer")
    if (!body){
      body = document.createElement('div')
      body.classList.add("notifContainer")
      document.body.appendChild(body)
    } 
    const html = ` 
    ${text}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  
  `

  const newEl = document.createElement("div")
  newEl.className = `alert alert-${type} alert-dismissible fade show`
  newEl.role = 'alert'
  newEl.innerHTML = html
  body.appendChild(newEl)
  if (timeout != -1){
    setTimeout(() => {
      newEl.remove()
    },3000)

  }
}


function setLoading(bool = false){
  document.getElementById("bgLoading")?.classList.toggle("hidden",bool)
}
