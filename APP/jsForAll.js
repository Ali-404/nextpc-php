
function showAlert(type, text,timeout = 5000){
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
  newEl.scrollIntoView()
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
  
  prof.addEventListener("click", () => {
    window.location.href = "../Profile/index.php"
  })


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
    prof.firstElementChild.innerText = username[0]
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



function parseURLParams(url) {
  var queryStart = url.indexOf("?") + 1,
      queryEnd   = url.indexOf("#") + 1 || url.length + 1,
      query = url.slice(queryStart, queryEnd - 1),
      pairs = query.replace(/\+/g, " ").split("&"),
      parms = {}, i, n, v, nv;

  if (query === url || query === "") return;

  for (i = 0; i < pairs.length; i++) {
      nv = pairs[i].split("=", 2);
      n = decodeURIComponent(nv[0]);
      v = decodeURIComponent(nv[1]);

      if (!parms.hasOwnProperty(n)) parms[n] = [];
      parms[n].push(nv.length === 2 ? v : null);
  }
  return parms;
}


function CheckForMessages(){
  const urlParams = parseURLParams(window.location.href)
  if (urlParams){
    if (urlParams["error"]){
      showAlert("danger", urlParams["error"][0])
      
    }else if (urlParams["info"]){
      showAlert("info", urlParams["info"][0])
      
    }else if (urlParams["warning"]){
      showAlert("warning", urlParams["warning"][0])

    }
  }
}

document.addEventListener("DOMContentLoaded", () => {
  CheckForMessages()
})

function basketNotif(){
  const basket = document.querySelector(".floating")
  if (basket){
      let items = 0
      const itemsInBasket = localStorage.getItem("basket")
      const itemsInBasketArray = JSON.parse(itemsInBasket) || []
      const keys = Object.keys(itemsInBasketArray)
      keys.forEach(k => {
        const v = itemsInBasketArray[k]
        if (v){
          items += v
        }
      }) 
      if (items && items > 0){
        basket.innerHTML = `
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill " style="background:rgb(255, 0, 102)">
        ${items}
        <span class="visually-hidden">unread messages</span>`
      }else {
        basket.innerHTML = ``
      }
   
  }
}

document.addEventListener("DOMContentLoaded", () => basketNotif())