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
    
    $data = json_decode(file_get_contents("php://input"));
    
    $item->list_id = $data->list_id;
    
    if($item->deleteListing()){
        echo json_encode("AD Deleted Successfully.");
    } else{
        echo json_encode("AD could not be deleted");
    }
?>