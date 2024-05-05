<?php 

    include "db.php";


    $resultData = [];
    global $conn;
    $result;
    
    if (isset($_GET["categorie"])){
        $result = $conn->query("SELECT * FROM products WHERE categorie='".$_GET["categorie"]."' ");
    }else if (isset($_GET['product'])){
        $result = $conn->query("SELECT * FROM products WHERE id='".$_GET["product"]."' ");
    }
    else {
        $result = $conn->query("SELECT * FROM products");
    }


    if ($result->num_rows > 0 ){
        $resultData = $result->fetch_all();
    }
    
    header("Content-Type: application/json");
    echo json_encode($resultData);



?>