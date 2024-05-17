<?php 

    include "db.php";


    $resultData = [];
    global $conn;
    $result;
    
    if (isset($_GET['products'])){
        $products = json_decode($_GET['products']);
        foreach ($products as $product) {
            $r = $conn->query("SELECT * FROM products WHERE id='".$product."' ");
            array_push($resultData,$r->fetch_assoc());
        }
    }
    else {
        die("no product id !");
    }


    
    header("Content-Type: application/json");
    echo json_encode($resultData);



?>