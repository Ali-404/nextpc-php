const profile = document.querySelector(".profilePic")
const infos = document.querySelector(".info")

const orderEl = document.querySelector("orders")
const favEl = document.querySelector("fav")

function changePage(event){
    document.querySelector("#page1").classList.toggle("hidden")
    document.querySelector("#page2").classList.toggle("hidden")
    document.querySelector("#orders").classList.toggle("active")
    document.querySelector("#fav").classList.toggle("active")
}


function loadInfos(){
    $.get("../../Backend/CurrentAccount.php", {},
        function (data) {
            if (data["error"]){
              return window.location.href = "../Login/index.php"  
            }
            let userData = JSON.parse(data["account"])
            profile.innerHTML = userData.username[0]
            infos.innerHTML = `
            <h1>@${userData.username}</h1>
            <p class="text-secondary-emphasis bi bi-phone"> ${userData.phone}</p>
            <p class="text-secondary-emphasis bi bi-envelope-at"> ${userData.email}</p>
          `

          loadFavorites(userData.id)
        },
        "json"
    );
}


function loadFavorites(account){
  if (!account){
    return 
  }
  $.get("../../Backend/Likes.php", {
    account:account
  },
    function (products) {
      if (products && products.length > 0){
          const container = document.querySelector(".favContainer")
          products.forEach(product => {
              $.get("../../Backend/Products.php", {
                product:Number(product[0])
              },
                function (data, textStatus, jqXHR) {
                  const productData = data[0]
                  const newEl = document.createElement('a')
                  newEl.href = '../Product/index.php?product=' + productData[0]
                  newEl.className = 'favorite shadow text-bg-light d-flex align-items-center justify-content-between rounded-3 '
                  newEl.innerHTML = `
                    <img src="../../UPLOAD/${productData[10]}/${productData[8]}"  />
                    <div>
                      <h4>${productData[1]}</h4>
                    </div>
                  `
                  container.appendChild(newEl)
                },
                "json"
              );
          })
      }
      
    },
    "json"
  );
}


function loadOrders(account_id){
  $.ajax({
    type: "GET",
    url: "../../Backend/orders.php",
    data: {
      account_id:account_id,
    },
    dataType: "json",
    success: function (orders) {
      if (orders ){
        orders.forEach(order => {
          
          $.ajax({
            type: "GET",
            url: "../../Backend/ProductsArray.php",
            data: {
              products: order[1]
            },
            dataType: "json",
            success: function (products) {
              
              let names = ""
              products.forEach(prod => {
                names += (prod.name + "<br>")
                
              })

              document.querySelector(".ordersContainer").innerHTML = 
              `
              <h1>Orders</h1>
             
              `
    
              
              
              const newEl = document.createElement('div')
              newEl.innerHTML = ` 
              <h3>${names}</h3>
              
              <hr class="w-100">
              <span class="w-100 text-center">Total : ${order[4]} Dhs</span>
              <h4 class="status shadow">On Route</h4>`
            newEl.className = `order shadow text-bg-light p-5 rounded`
            document.querySelector(".ordersContainer").appendChild(newEl)

            }
          });
        })
      }
    }
  });
}

loadInfos()