<?php
  session_start();
  require_once("../function/token.php");
  require_once("../function/alert.php");
  require_once("../function/redirect.php");
  require_once("../function/user.php");
  require_once("../function/email.php");

  $errorcount = 0;

  $email = $_POST["email"] != ""? $_POST["email"] : $errorcount++;

  $_SESSION["email"] = $email;

  if($errorcount > 0){
    $session_error = "You have " . $errorcount . " error";
    if ($errorcount > 1) {
      $session_error .= "s";
    }
    $session_error .= " in your form submission";
    set_alert("error", $session_error);

    header("Location: ../forgot.php");
  }else{
    $allusers = scandir("../db/users");
    $countallusers = count($allusers);

    for ($counter=0; $counter < $countallusers; $counter++){
      $currentuser = $allusers[$counter];

      if ($currentuser == $email . ".json"){

        $token = generate_token();

        $subject = "Password Reset Link";
        $message = "A password reset has been initiated on your account. If you did not initiate this, kindly ignore, otherwise, visit: localhost/sngh/reset.php?token=". $token;

        file_put_contents("../db/token/" . $email . ".json", json_encode(['token'=>$token]));

        send_mail($email, $subject, $message);
        die();
      }

    }
    set_alert("error", "The email you entered is not registered with us.");
    redirect_to("../forgot.php");
  }

?>