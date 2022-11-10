<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../config/database.php';
    include_once '../class/listing.php';
    $database = new Database();
    $db = $database->getConnection();
    $items = new Listing($db);
    $stmt = $items->getListing();
    $itemCount = $stmt->rowCount();

    // echo json_encode($itemCount);
    if($itemCount > 0){
        
        $employeeArr = array();
        $employeeArr["body"] = array();
        // $employeeArr["itemCount"] = $itemCount;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "list_id" => $list_id,
                "list_productname" => $list_productname,
                "list_description" => $list_description,
                "list_address" => $list_address,
                "list_image" => $list_image,
                "list_publishdate" => $list_publishdate,
                "list_price" => $list_price,
                "list_condition" => $list_condition,
                "list_fueltype" => $list_fueltype,
                "list_registrationyear" => $list_registrationyear,
                "list_vehicletype" => $list_vehicletype,
                "list_model" => $list_model,
                "list_enginecapacity" => $list_enginecapacity,
                "list_mileage" => $list_mileage,
                "list_brand" => $list_brand,
                "list_transmission" => $list_transmission,
                "list_negotiable" => $list_negotiable,
                "list_phone" => $list_phone,
                "image_one" => $image_one,
                "image_two" => $image_two,
                "image_three" => $image_three,
                "image_four" => $image_four,
                "image_five" => $image_five,
                "image_six" => $image_six,
                "u_id" => $u_id

            );
            array_push($employeeArr["body"], $e);
        }
        echo json_encode($employeeArr);
    }
    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "No record found.")
        );
    }
?>