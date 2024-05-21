<?php 

include "../../../Backend/db.php";

try {
    $name = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $oldPrice = $_POST["oldPrice"];
    $stock = $_POST["stock"];
    $categorie = $_POST["categorie"];
    $is_pc = isset($_POST["isPC"]);

    $pcData = [];
    
    if ($is_pc) {
        // pc data
        try {
            $cpu = $_POST["cpu"] ?? "";
            $motherboard = $_POST["motherboard"] ?? "";
            $case = $_POST["case"] ?? "";
            $psu = $_POST["psu"] ?? "";
            $gpu = $_POST["gpu"] ?? "";
            $ram = $_POST["ram"] ?? "";
            $storage = $_POST["storage"] ?? "";

            $pcData = [
                "data-cpu" => $cpu,
                "data-mothercard" => $motherboard,
                "data-case" => $case,
                "data-psu" => $psu,
                "data-gpu" => $gpu,
                "data-ram" => $ram,
                "data-storage" => $storage,
            ];
        } catch (Exception $ee) {
            echo $ee->getMessage();
        }
    }

    if (isset($_FILES['cover']) && $_FILES['cover']['error'] == 0) {
        $info = pathinfo($_FILES["cover"]['name']);
        $ext = $info['extension'];
        $newname = generateRandomString() . "." . $ext; 

        $target = "../../../UPLOAD/" . $categorie . "/" . $newname;
        move_uploaded_file($_FILES['cover']['tmp_name'], $target);
    } else {
        throw new Exception("File upload failed!");
    }
    
    $stmt = $conn->prepare("INSERT INTO products(name, description, price, oldPrice, stock, is_pc, pc_data, cover_path, categorie) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    $pc_data = json_encode($pcData);
    
    $stmt->bind_param("ssssissss", $name, $description, $price, $oldPrice, $stock, $is_pc, $pc_data, $newname, $categorie);
    $stmt->execute();
    $stmt->close();

    header("location:../../Done/index.php");
} catch (Exception $e) {
    echo $e->getMessage();
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
