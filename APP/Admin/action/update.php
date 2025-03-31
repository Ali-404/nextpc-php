<?php 
    include "../../../Backend/db.php";
    try {
        $id = $_POST["id"];
        $categorie = $_POST["categorie"];
        $name = $_POST["name"];
        $description = $_POST["description"];
        $oldPrice = $_POST["oldPrice"];
        $price = $_POST["price"];
        $stock = $_POST["stock"];
        $isPC = isset($_POST["isPC"]);
        $pcData = [];
        if ($isPC){

            $cpu = $_POST["cpu"];
            $motherboard = $_POST["motherboard"];
            $case = $_POST["case"];
            $psu = $_POST["psu"];
            $gpu = $_POST["gpu"];
            $ram = $_POST["ram"];
            $storage = $_POST["storage"];
         

            $pcData = array(
                "data-cpu" => $cpu, 
                "data-mothercard" => $motherboard, 
                "data-case" => $case, 
                "data-psu" => $psu, 
                "data-gpu" => $gpu, 
                "data-ram" => $ram, 
                "data-storage" => $storage
            );
        }


        $pcData = json_encode($pcData);
        
        $st =  $conn->prepare("UPDATE products SET name=?,description=?,price=?,oldPrice=?,stock=?,is_pc=?,pc_data=?,categorie=? WHERE id=?");
        $st->bind_param("sssssssss",$name,$description,$price,$oldPrice,$stock,$isPC,$pcData,$categorie,$id);
        $st->execute();
        
        // new image
        $newname = "";
        if (isset($_FILES['cover']) && $_FILES['cover']['error'] == 0) {
            $info = pathinfo($_FILES["cover"]['name']);
            if ($info){

                $ext = $info['extension'];
                $newname = generateRandomString() . "." . $ext; 
        
                $target = "../../../UPLOAD/" . $categorie . "/" . $newname;
                move_uploaded_file($_FILES['cover']['tmp_name'], $target);
    
                $st2 =  $conn->prepare("UPDATE products set cover_path=? WHERE id=?");
                $st2->bind_param("ss", $newname, $id);
                $st2->execute();
                $st2->close();
            }
        }
        header("location: ../../Admin/action/index.php");
        
    }catch (Exception $e){
        echo "Error !".$e->getMessage();
    }


    
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }

?>
