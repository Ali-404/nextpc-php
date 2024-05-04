function onSubmit(e){

    var regularExpression = new RegExp("(?=.*\\d)(?=.*[A-Z])(?=.*[!@#$%^&*()_+[\\]{};:<>,.?])");

    const password = document.getElementById("password").value 
    const conferm_password = document.getElementById("password_conferm").value 


    if (password.trim().length < 6){
        e.preventDefault();
        showAlert("warning", "Password should have at least 6 characters !")
        
    }


    if (!regularExpression.test(password)){
        e.preventDefault();
        showAlert("danger", "Password should contains symbols,numbers,Upper and lower cases exemple:Pass@Word15$1 !")
    }

    if (password != conferm_password){
        e.preventDefault();
        showAlert("danger", "Wrong Password confermation !")
    }
}
