<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    include_once '../config/database.php';
    include_once '../class/user.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $item = new User($db);
    
    $data = json_decode(file_get_contents("php://input"));
    
    $item->u_id = $data->u_id;
    
    // user values
    $item->u_fullname = $data->u_fullname;
    $item->u_phone = $data->u_phone;
    $item->u_password = $data->u_password;
    $item->u_email = $data->u_email;
    $item->u_image = $data->u_image;
    $item->code = $data->code;
    $item->status = $data->status;
    
    if($item->updateUser()){
        echo json_encode("User data updated.");
    } else{
        echo json_encode("Data could not be updated");
    }
?>