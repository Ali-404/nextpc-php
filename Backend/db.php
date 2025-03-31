<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "Nextpc";
    $conn;

    // Create connection
    try {
        $conn = new mysqli($servername, $username, $password,$database);
    
        // Check connection
        
        if ($conn->error or $conn->connect_error) {
            pg_err();
            die();
        }
        
    }catch (Exception $e){
        
        pg_err();
        die();
    }

   
function pg_err(){
    
    $url  = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
    $url .= $_SERVER['SERVER_NAME'];
    $url .= ":3000"; //server port
    $url .= "/ERROR.php";
    
    echo "<script>window.location.href = '". $url ."';</script>";
    exit(); // Stop further execution of the script
}
?>

