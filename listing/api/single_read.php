<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    include_once '../config/database.php';
    include_once '../class/listing.php';
    $database = new Database();
    $db = $database->getConnection();
    $item = new Listing($db);
    $item->list_id = isset($_GET['list_id']) ? $_GET['list_id'] : die();
  
    $item->getSingleListing();
    if($item->list_productname != null){
        // create array
        $emp_arr = array(
            "list_id" =>  $item->list_id,
            "list_productname" => $item->list_productname,
            "list_description" => $item->list_description,
            "list_address" => $item->list_address,
            "list_image" => $item->list_image,
            "list_publishdate" => $item->list_publishdate,
            "list_price" => $item->list_price,
            "list_condition" => $item->list_condition,
            "list_fueltype" => $item->list_fueltype,
            "list_registrationyear" => $item->list_registrationyear,
            "list_vehicletype" => $item->list_vehicletype,
            "list_model" => $item->list_model,
            "list_enginecapacity" => $item->list_enginecapacity,
            "list_mileage" => $item->list_mileage,
            "list_brand" => $item->list_brand,
            "list_transmission" => $item->list_transmission,
            "list_negotiable" => $item->list_negotiable,
            "list_phone" => $item->list_phone,
            "image_one" => $item->image_one,
            "image_two" => $item->image_two,
            "image_three" => $item->image_three,
            "image_four" => $item->image_four,
            "image_five" => $item->image_five,
            "image_six" => $item->image_six,
            "u_id" => $item->u_id
            
        );
      
        http_response_code(200);
        echo json_encode($emp_arr);
    }
      
    else{
        http_response_code(404);
        echo json_encode("Ad not found.");
    }
?>