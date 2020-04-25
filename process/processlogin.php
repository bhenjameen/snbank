<?php
  session_start();
  require_once("../function/token.php");
  require_once("../function/alert.php");
  require_once("../function/redirect.php");
  require_once("../function/user.php");

  $errorcount = 0;
  $email = $_POST["email"] != ""? $_POST["email"] : $errorcount++;
  $password = $_POST["password"] != ""? $_POST["password"] : $errorcount++;

  $_SESSION["email"] = $email;

  if(($email == "admin@sngh.org") && ($password == "admin101")){
    redirect_to("../superadmin.php");
    die();
  }

  if($errorcount > 0){
    $session_error = "You have " . $errorcount . " error";
    if ($errorcount > 1) {
      $session_error .= "s";
    }
    $session_error .= " in your form submission";
    set_alert("error", $session_error);

    redirect_to("../login.php");
  }else{
    $currentuser = find_user($email);

    if ($currentuser) {
      $userstring = file_get_contents("../db/users/" . $currentuser->email . ".json");
      $userobject = json_decode($userstring);
      $passwordfromdb = $userobject->password;

      $passwordfromuser = password_verify($password, $passwordfromdb);

      if($passwordfromdb == $passwordfromuser){
        $_SESSION["loggedin"] = $userobject->id;
        $_SESSION["email"] = $userobject->email;
        $_SESSION["fullname"] = $userobject->firstname . " " . $userobject->lastname;
        $_SESSION["role"] = $userobject->designation;

        getdate();

        $mydate = getdate(date("U"));

        $time = "$mydate[hours]:$mydate[minutes]";
        $date = "$mydate[weekday], $mydate[month] $mydate[mday] $mydate[year]";
        $dateTime = $time ." ". $date;

        file_put_contents("../db/time/".  $email . ".json", json_encode($dateTime));
        
        //For different dashboards
        if ($userobject->designation == "patient") {
          redirect_to("../patient.php");
          die();
        }else {
          redirect_to("../personnel.php");
          die();
        }
      }
    } 
    set_alert("error", "Invalid email or password");
    redirect_to("../login.php");
    die();
    
  }

?>