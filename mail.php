<?php
$from = "no-reply@reuse.sale";
$to = "sadik254@gmail.com";
$subject= "Registration Confirmation";
$message = "Test Email";
$headers = "From:" .$from;
if(mail($to,$subject,$message,$headers)){
    echo "The email was sent";
}
else{
    echo "The email can't be sent";
}



?>