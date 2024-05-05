<?php 

    include "../../Backend/Auth.php";

    if (isset($_POST["username"]) and isset($_POST["password"])){
      $logged_in =  LogIn($_POST["username"], $_POST["password"]);
        if ($logged_in){
            echo "<script>showAlert('success', 'Logged In Successfully!')</script>";
            header("location:../Home/index.php");
        }else {
            echo "<script>showAlert('alert', 'Unable to Login! Try Again Later')</script>";

        }
    }


?>