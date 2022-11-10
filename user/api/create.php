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
    $item->u_fullname = $data->u_fullname;
    $item->u_phone = $data->u_phone;
    $item->u_password = $data->u_password;
    $item->u_email = $data->u_email;
    $item->u_image = $data->u_image;
    $item->code = $data->code;
    $item->status = $data->status;
    

    
    if($item->createUser()){
        
        
        echo 'User created successfully.';

        // $mail = new PHPMailer;
        // $mail->isSMTP();
        // $mail->SMTPDebug = 2;
        // $mail->Host = 'smtp.hostinger.com';
        // $mail->Port = 587;
        // $mail->SMTPAuth = true;                                 
        // $mail->Username   = 'no-reply@reuse.sale';                     
        // $mail->Password   = 'zufaa@123'; 
        // $mail->Port = 465;
        // $mail->setFrom('no-reply@reuse.sale', 'Reuse.Sale');
        // $mail->addReplyTo('no-reply@reuse.sale', 'Reuse.Sale');
        // $mail->addAddress('sadik254@gmail.com', '$data->u_fullname');
        // $mail->Subject = 'Checking if PHPMailer works';
        // $mail->Body = 'This is just a plain text message body';
        // if (!$mail->send()) {
        //     echo 'Mailer Error: ' . $mail->ErrorInfo;

        //     } 
        //     else{
        //      echo 'The email message was sent!';
        //         }

    
}
else {
    
    echo 'User could not be created.';
}
    

?>