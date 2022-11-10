<?php
// include database and object files
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../config/database.php';
include_once '../class/user.php';
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare user object
$user = new User($db);

// set ID property of user to be edited
$user->u_email = isset($_GET['u_email']) ? $_GET['u_email'] : die();
$user->u_password = (isset($_GET['u_password']) ? $_GET['u_password'] : die());  

// read the details of user to be edited
$stmt = $user->login();
if($stmt->rowCount() > 0){
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    // create array
    $user_arr=array(
        "status" => true,
        "message" => "Successfully Login!",
        "u_id" => $row['u_id'],
        "u_email" => $row['u_email']
    );
}
else{
    $user_arr=array(
        "status" => false,
        "message" => "Invalid Email or Password!",
    );
}
// make it json format
print_r(json_encode($user_arr));
?>