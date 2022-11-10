<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../config/database.php';
    include_once '../class/user.php';
    $database = new Database();
    $db = $database->getConnection();
    $items = new User($db);
    $stmt = $items->getUser();
    $itemCount = $stmt->rowCount();

    // echo json_encode($itemCount);
    if($itemCount > 0){
        
        $employeeArr = array();
        $employeeArr["body"] = array();
        // $employeeArr["itemCount"] = $itemCount;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "u_id" => $u_id,
                "u_fullname" => $u_fullname,
                "u_phone" => $u_phone,
                "u_email" => $u_email,
                "u_image" => $u_image,
                "code" => $code,
                "status" => $status
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