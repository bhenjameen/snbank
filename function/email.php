<?php

  require_once("alert.php");
  require_once("redirect.php");

  function send_mail($email = "", $subject = "", $message = ""){
    $headers = "From: no-reply@sngh.org" . "\r\n" . "cc: kufre@sngh.org";

    $try = mail($email, $subject, $message, $headers);

    if($try){

      set_alert("message", "Password reset link has been sent to you via email.");
      redirect_to("../login.php");
    }else {
      set_alert("error", "Something went wrong. We could not send you the password reset link to " . $email);
      redirect_to("../login.php");
    }
  }

?>