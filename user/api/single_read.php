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
    $item->u_id = isset($_GET['u_id']) ? $_GET['u_id'] : die();
  
    $item->getSingleUser();
    if($item->u_fullname != null){
        // create array
        $emp_arr = array(
            "u_id" =>  $item->u_id,
            "u_fullname" => $item->u_fullname,
            "u_phone" => $item->u_phone,
            "u_email" => $item->u_email,
            "u_image" => $item->u_image
        );
      
        http_response_code(200);
        echo json_encode($emp_arr);
    }
      
    else{
        http_response_code(404);
        echo json_encode("User not found.");
    }
?>