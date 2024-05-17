<?php 

    include "db.php";


    $resultData = [];
    $result;

    if (isset($_GET["account_id"])){

        $result = $conn->query("SELECT * FROM orders WHERE account_id=".$_GET["account_id"]."");
    }else {
        $result = $conn->query("SELECT * FROM orders");
    }
    
    $resultData = $result->fetch_all();
    
    header("Content-Type: application/json");
    echo json_encode($resultData);



?>