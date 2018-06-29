<?php
    header("Location: index.html");
    $name = Trim(stripslashes($_POST['name']));
    $visitor_email = Trim(stripslashes($_POST['email']));
    $address = Trim(stripslashes($_POST['address']));
    $number = Trim(stripslashes($_POST['number']));
    $subject = Trim(stripslashes($_POST['subject']));
    $message = Trim(stripslashes($_POST['message']));


    //validation
    $validationOK=true;
    if (Trim($name)=="") $validationOK=false;
    if (Trim($visitor_email)=="") $validationOK=false;
    if (!$validationOK) {
        header("Location: invalid.html");
        exit;
    }

    $email_from = 'bdmerlo@gmail.com';

    $email_subject = "$subject";

    $email_body = "Client Name: $name.\n".
                    "Client Email: $visitor_email.\n".
                        "Client Address: $address.\n".
                             "Client Telephone: $number.\n".
                                 "Client Subject: $subject.\n".
                                    "Client Message: $message.\n";


    $to = "bdmerlo@gmail.com";

    $headers = "From: $email_from \r\n";
    $headers = "Reply-to: $visitor_email \r\n";

    $success = mail($to, $email_subject, $email_body, $headers);

    if ($success){
        header("Location: success.html");
      }
      else{
        header("Location: fail.html");
      }


    

?>