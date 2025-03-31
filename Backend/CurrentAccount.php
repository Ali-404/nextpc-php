<?php 
    session_start();
    $data;
    if (isset($_SESSION["account"])){
        $data = array('account' => $_SESSION["account"]);
    }else {
        $data = array("error" => "No Account!");
    }


    header("Content-Type: application/json");
    echo json_encode($data);

?>