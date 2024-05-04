<?php 

    include "../../Backend/Auth.php";
   
   
    echo "<script>setLoading(true)</script>";

    function checkInputs(){
        // check username existance
        if(isset($_POST['username'])){
            $user_in_db = getAccountByData("username", $_POST["username"]);
            if ($user_in_db){
                echo "<script>showAlert('danger','Username Already exists')</script>";
                echo "<script>setLoading(false)</script>";

                return false;
            }
        }
        

        if(isset($_POST['gmail'])){
            $user_in_db = getAccountByData("email", $_POST["gmail"]);
     
            echo "<script>showAlert('danger',".json_encode($user_in_db).")</script>";
            if ($user_in_db){
                echo "<script>showAlert('danger','Email Already exists')</script>";
            echo "<script>setLoading(false)</script>";

                return false;
            }
        }

        if(isset($_POST['phone'])){
            $user_in_db = getAccountByData("phone", $_POST["phone"]);
            if ($user_in_db){
                echo "<script>showAlert('danger','Phone Number Already exists')</script>";
                echo "<script>setLoading(false)</script>";
                
                return false;
            }
        }
        return true;
    }
    

    // ADD TO DATABASE
    if (checkInputs() and isset($_POST['username']) and isset($_POST['password']) and isset($_POST['gmail']) and isset($_POST['phone'])){

    
        if (CreateAccount($_POST['username'], $_POST['password'], $_POST['gmail'],$_POST["phone"] )){
            echo "<script>showAlert('success','Account Created Successfully')</script>";
            echo "<script>setLoading(false)</script>";
            return false;
            
        }
    }


?>
