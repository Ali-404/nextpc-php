<?php 

include "db.php";


function getCardFromData($data,$v){
    global $conn;
    $sql = "SELECT * FROM bank_cards WHERE ".$data."='".$v."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            return $row;
        }
    }
    return false;

}




    

?>
