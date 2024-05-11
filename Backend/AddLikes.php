<?php 
    include "db.php";
    $data;
    
    if (isset($_POST["account"]) && isset($_POST["product"])){

        $isExistsResult = $conn->query("SELECT * FROM likes WHERE product=".$_POST["product"]." AND account=".$_POST["account"]." ");
        $isAlreadyExists = $isExistsResult->fetch_assoc();
        

        if ($isAlreadyExists){
            $removeResult = $conn->query("DELETE FROM likes WHERE product=".$_POST["product"]." AND account=".$_POST["account"]." ");
            $conn->commit();
            $data = array("removed" => true);
        }else {
            $AddResultQuery = $conn->query("INSERT INTO likes(product,account) VALUES(".$_POST["product"].",".$_POST["account"].")");
            $conn->commit();
            if ($AddResultQuery){
                $data = array("added" => true);
            }else {
                $data = array("added" => false,"error"=>"Unable to like !");
            }
        }

    }else {
        $data = array("error"=>"Invalid Post Account and Product !");
    }

    header("Content-Type: application/json");
    echo json_encode($data);

?>