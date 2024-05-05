
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
  document.body.classList.toggle("loading", bool)
}

function UpdateNavBar(is_logged_in, username = false){
  
  const btn = document.querySelector("#navAuthButton") 
  const prof = document.querySelector("#navAuthProfile")


  btn.style.visibility = 'hidden'
  btn.style.position = 'absolute'

  
  prof.style.visibility = 'hidden'
  prof.style.position = 'absolute'


  if (is_logged_in && username){
    
    prof.style.visibility = 'visible'
    prof.style.position = 'unset'
  }else {
    
    btn.style.visibility = 'visible'
    btn.style.position = 'unset'
  }


  if (username && is_logged_in){
    btn.innerText = username[0]
  }

}

function requestLogout(){
  $.ajax({
    url: "../../Backend/Logout.php",
    data: {
      request: "logout"
    },
    success: function( result ) {
      window.location.reload()
    }
  });
}