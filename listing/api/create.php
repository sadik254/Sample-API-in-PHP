<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    include_once '../config/database.php';
    include_once '../class/listing_temp.php';
    $database = new Database();
    $db = $database->getConnection();
    $item = new Listing($db);
    $data = json_decode(file_get_contents("php://input"));
    $item->list_productname = $data->list_productname;
    $item->list_description = $data->list_description;
    $item->list_address = $data->list_address;
    $item->list_image = $data->list_image;
    $item->list_publishdate = $data->list_publishdate;
    $item->list_price = $data->list_price;
    $item->list_condition = $data->list_condition;
    $item->list_fueltype = $data->list_fueltype;
    $item->list_registrationyear = $data->list_registrationyear;
    $item->list_vehicletype = $data->list_vehicletype;
    $item->list_model = $data->list_model;
    $item->list_enginecapacity = $data->list_enginecapacity;
    $item->list_mileage = $data->list_mileage;
    $item->list_brand = $data->list_brand;
    $item->list_transmission = $data->list_transmission;
    $item->list_negotiable = $data->list_negotiable;
    $item->list_phone = $data->list_phone;
    $item->image_one = $data->image_one;
    $item->image_two = $data->image_two;
    $item->image_three = $data->image_three;
    $item->image_four = $data->image_four;
    $item->image_five = $data->image_five;
    $item->image_six = $data->image_six;
    $item->u_id = $data->u_id;

    
    if($item->createListing()){
        echo 'Ad posted successfully for moderation';
    } else{
        echo 'Ad could not be created.';
    }
?>