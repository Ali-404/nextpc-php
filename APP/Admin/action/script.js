function loadProduct(){
    
    $.ajax({
        type: "GET",
        url: "../../../Backend/Products.php",
        data:{},
        dataType: "json",
        success: function (products) {
            const tbody = document.querySelector("#tbody")
            products.forEach((product,i) => {
                
                const newEl = document.createElement("tr")
                newEl.innerHTML = `
                    <td>${product[0]}</td>
                    <td>${product[1]}</td>
                    <td>${product[2]}</td>
                    <td>${product[3]}</td>
                    <td>${product[4]}</td>
                    <td>${product[5]}</td>
                    <td>${product[6]}</td>
                    <td>
                    <button class="btn btn-warning bi bi-info" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample${i}" aria-expanded="false" aria-controls="collapseExample${i}">
                    </button>
                    <div class="collapse" id="collapseExample${i}">
                        <div class="card card-body">
                        ${formatInfo(product[7])}
                        </div>
                    </div>
                    </td>
                    <td>${product[8]}</td>
                    <td>${product[10]}</td>
                    <td>
                        <a class="btn btn-success bi bi-eye" href="../../Product/index.php?product=${product[0]}" target="_blank"></a>
                        
                        <button class="btn btn-primary bi bi-pencil my-2" onclick="editForm(${product[0]})"></button>
                        <button class="btn btn-danger bi bi-trash" onclick="toggleAlert(${product[0]})"></button>
                    </td>
                
                `

                tbody.appendChild(newEl)
            
            })

        }
    });
}



function toggleAlert(id = false){
    document.getElementById('alert').classList.toggle('hidden')
    if (id){
        document.getElementById('alert-yes').onclick =() => deleteItem(id);
    }
}


function deleteItem(id){
    $.ajax({
        type: "POST",
        url: "delete.php",
        data: {
            id: id
        },
        dataType: "json",
        success: function (response) {
            if (response["error"] == true){
                showAlert("danger", response["message"] || "We have an error !")
            }else {
                window.location.reload()
            }
        },
        error: function(a,b,e){
            console.error(e)
        }
    });
}

function toggleForm(){
    document.querySelector("#updateForm").classList.toggle("hidden")
    document.querySelector("#updateForm").reset()
}

function formatInfo(json){
    let returnData = ''
    if (!json || JSON.parse(json).length <= 0){
        return 'This is not a pc'
    }

    const data = JSON.parse(json)
    Object.keys(data).forEach(key => {
        returnData += "<b>" + key.replace("data-","").toUpperCase() +  ":</b> " + data[key] + "<br><hr>"
    })
    return returnData
}


function editForm(productID){
    $.ajax({
        type: "GET",
        url: "../../../Backend/Products.php",
        data: {
            product:productID
        },
        dataType: "json",
        success: function (prd) {
            const product = prd[0]
            const name = product[1]
            const description= product[2]
            const price = product[3]
            const oldPrice= product[4]
            const stock = product[5]
            const isPC = product[6] == 1 ? true : false 
            const pcInfoJson= product[7]
            const cover= product[8]
            const categorie= product[10]

            document.querySelector("#id").defaultValue = product[0]

            document.querySelector("#categorie").defaultValue = categorie
            document.querySelector("#categorie").value = categorie
            document.querySelector("#name").defaultValue = name
            document.querySelector("#description").defaultValue = description
            document.querySelector("#price").defaultValue = price
            document.querySelector("#oldPrice").defaultValue = oldPrice
            document.querySelector("#stock").defaultValue = stock
            document.querySelector("#isPC").checked = isPC
            document.querySelector("#collapseExample").classList.add("hidden")
            if (isPC && pcInfoJson){
                document.querySelector("#collapseExample").classList.remove("hidden")
                const pcInfo = JSON.parse(pcInfoJson)
                document.querySelector("#cpu").defaultValue = pcInfo["data-cpu"] 
                document.querySelector("#motherboard").defaultValue = pcInfo["data-mothercard"] 
                document.querySelector("#case").defaultValue = pcInfo["data-case"] 
                document.querySelector("#psu").defaultValue = pcInfo["data-psu"] 
                document.querySelector("#gpu").defaultValue = pcInfo["data-gpu"] 
                document.querySelector("#ram").defaultValue = pcInfo["data-ram"] 
                document.querySelector("#storage").defaultValue = pcInfo["data-storage"] 
            }else {
                document.querySelector("#collapseExample").classList.add("hidden")
            }

            document.querySelector("#img").src = "../../../UPLOAD/" + categorie + "/" + cover
                

            document.querySelector("#updateForm").classList.remove("hidden")

            
            
        }
    });



}


function formPCINFO(e){

        
        document.querySelector("#collapseExample").classList.toggle("hidden",!e?.target?.checked)

    
}



loadProduct()
