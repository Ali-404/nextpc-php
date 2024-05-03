function loadDates(){
    
        const select = document.getElementById("expireYY")
        for (let i = 1900; i < 2100; i++) {
    
            const el = document.createElement("option")
            el.setAttribute("value", i)
            el.innerText = i.toString()
            select.appendChild(el)
        }  
    }
loadDates()