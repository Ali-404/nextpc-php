<?php 

session_start();

include "db.php";


function isLoggedIn(){
    if(isset($_SESSION['account'])){
        return true; 
    }
    return false;
}

function getAccountFromID($id){
    global $conn;
    $sql = "SELECT * FROM accounts WHERE id=".$id."";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            return $row;
        }
    }
    return false;

}

function getAccountByData($data,$v){
    global $conn;
    $sql = "SELECT * FROM accounts WHERE ".$data."='".$v."'";
    $result = $conn->query($sql);
    $resultData = false;
    if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            $resultData = $row;
        }
    }
    return $resultData;
}   

    
function CreateAccount($username, $pwd, $gmail, $phone){
    global $conn;
    $password = password_hash($pwd, PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO accounts (username, email, phone,password)
    VALUES ('".$username."', '".$gmail."', '".$phone."','".$password."')";

    if ($conn->query($sql) === TRUE) {
        $conn->commit();
        return true;
    }
    return false;

}


function LogIn($username, $password){
    // search for account 
    $account = getAccountByData("username",$username);
    if (!$account){
        echo "<script>showAlert('danger', 'Invalid Account With This username!')</script>";
        return false;
    }
    // match password
    $hashed_password = $account["password"];
    if (!password_verify($password, $hashed_password)){
        echo "<script>showAlert('danger', 'Wrong Password !')</script>";
        return false;
    }

    // save account to session
    $_SESSION['account'] = json_encode($account);

    
    return true;
}
    

?>
