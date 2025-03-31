<?php 

    // GET data and price

    
    include "db.php";
    header("Content-Type: application/json");
    try {

        $name  = $_POST["cardName"];
        $number  = $_POST["cardNumber"];
        $m  = $_POST["m"];
        $y = $_POST["y"];
        $code = $_POST["code"];
        
        $price = $_POST["price"];

        $account_id = $_POST["account_id"];
        $products = $_POST["products"];

        if (isset($account_id) && isset($products) && isset($price) && isset($name) && isset($number)&& isset($m)&& isset($y)&& isset($code)){
          
            $sql = "SELECT * FROM bank_cards WHERE name='$name' and number=$number and m=$m and y=$y and security_code=$code  ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0){
                $cardData = $result->fetch_assoc();
                if ($cardData["is_blocked"] and $cardData["is_blocked"] != 0){
                    echo json_encode(["error"=>true,"message"=>"Your Card is Blocked !"]);
                    return;
                }

                // calc sold

                if ($cardData['sold'] < $price){
                    echo json_encode(["error"=>true,"message"=>"You dont have enough sold in your Card !"]);
                    return;
                }


                $conn->query("UPDATE bank_cards SET sold=".($cardData['sold'] - $price)." WHERE id=".$cardData["id"]." ");
                $conn->commit();

                // add order

                $conn->query("INSERT INTO orders(products,account_id,total ) VALUES('$products',$account_id,$price)");
                $conn->commit();

                echo json_encode(["error"=>false,"message"=>"Payment Completed successfully."]);
                return;

            }
            else{
                    echo json_encode(["error"=>true,"message"=>"Incorrect Card Information!"]);
                    return;
            }

        }else {
            echo json_encode(["error"=>true,"message"=>"Invalid Card Data ! Please fill all the information !"]);
            return;
        }

    }catch (Exception $e){
        echo json_encode(["error"=>true,"message"=>$e->getMessage()]);
    }



?>