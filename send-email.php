<?php
    $to = "ashrafulrobin3@gmail.com";
    $subject = "Account Security Alert";
    $message = "Hello Mr Ashraful";
    $headers = "From: <ashraful.py@gmail.com>";

    $success = mail($to, $subject, $message, $headers);

    if($success) {
        echo "Success";
    }else {
        echo "Error";
    }

?>