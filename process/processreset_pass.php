<?php
  session_start();
  require_once("../function/token.php");
  require_once("../function/alert.php");
  require_once("../function/redirect.php");
  require_once("../function/user.php");

  $errorcount = 0;

  if(!is_user_loggedin()){
    $token = $_POST["token"] != ""? $_POST["token"] : $errorcount++;
    $_SESSION["token"] = $token;
  }

  $email = $_POST["email"] != ""? $_POST["email"] : $errorcount++;
  $password = $_POST["password"] != ""? $_POST["password"] : $errorcount++;

  $_SESSION["email"] = $email;

  if($errorcount > 0){
    $session_error = "You have " . $errorcount . " error";
    if ($errorcount > 1) {
      $session_error .= "s";
    }
    $session_error .= " in your form submission";
    set_alert("error", $session_error);

    redirect_to("../reset.php");
  }else{

    $checktoken = is_user_loggedin() ? true : find_token($email);

    if($checktoken){

      $userexists = find_user($email);
      if ($userexists) {

        $userobject = find_user($email);

        $userobject->password = password_hash($password, PASSWORD_DEFAULT);

        unlink("../db/users/" . $currentuser);
        unlink("../db/token/" . $currentuser);

        save_user($userobject);

        set_alert("message", "Password reset successful. You can now log in.");

        $subject = "Password Reset Notification";
        $message = "The password on your account has been updated. If you did not initiate this password change, kindly visit sngh.org and reset your password immediately.";

        send_mail($subject, $message, $email);
        
        redirect_to("../login.php");

        return;
      }
    }
    set_alert("error", "Password reset failed. Token/email is expired/invalid.");

    redirect_to("../login.php");
  }

?>