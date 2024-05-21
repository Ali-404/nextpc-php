<?php 

    include("../../../Backend/db.php");
    $result = [];



    try {
        if (isset($_POST["id"])){

            $id = $_POST["id"];
            $conn->query("DELETE FROM products WHERE id=". $id);
            $result = ["error"=>false];
        }else {
            $result = ["error" => true, "message" => "No Product !"];
        }

    }catch (Exception $e){
        $result = ["error" => true, "message" => "We have an error! " .$e->getMessage()];
    }


    header("Content-Type: application/json");
    echo json_encode($result);


?>