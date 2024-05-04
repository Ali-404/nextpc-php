<?php 

include "db.php";


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
    
    $sql = "INSERT INTO accounts (username, email, phone,password,likes)
    VALUES ('".$username."', '".$gmail."', '".$phone."','".$password."','".json_encode(array())."')";

    if ($conn->query($sql) === TRUE) {
        $conn->commit();
        return true;
    }
    return false;

}
    

?>
