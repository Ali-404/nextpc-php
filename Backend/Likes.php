<?php 

    include "db.php";


    $resultData = [];
    global $conn;
    $result;
    
    if (isset($_GET["product"])){
        $result = $conn->query("SELECT * FROM likes WHERE product='".$_GET["product"]."' ");
    }else if (isset($_GET['account'])){
        $result = $conn->query("SELECT * FROM likes WHERE account='".$_GET["account"]."' ");
    }
    else {
        $result = $conn->query("SELECT * FROM likes");
    }


    if ($result->num_rows > 0 ){
        $resultData = $result->fetch_all();
    }
    
    header("Content-Type: application/json");
    echo json_encode($resultData);



?>