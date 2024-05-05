<?php 

    include "db.php";


        $resultData = [];
        global $conn;
        $result = $conn->query("SELECT * FROM categories");
        if ($result->num_rows > 0 ){
            $resultData = $result->fetch_all();
        }
        
        header("Content-Type: application/json");
        echo json_encode($resultData);



?>