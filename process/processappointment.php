<?php
  session_start();
  require_once("../function/token.php");
  require_once("../function/alert.php");
  require_once("../function/redirect.php");
  require_once("../function/user.php");

  $errorcount = 0;

  $date1 = $_POST["date1"] != ""? $_POST["date1"] : $errorcount++;
  $time1 = $_POST["time1"] != ""? $_POST["time1"] : $errorcount++;
  $nature1 = $_POST["nature1"] != ""? $_POST["nature1"] : $errorcount++;
  $complaint1 = $_POST["complaint1"] != ""? $_POST["complaint1"] : $errorcount++;
  $department1 = $_POST["department1"] != ""? $_POST["department1"] : $errorcount++;

  $_SESSION['date1'] = $date1;
  $_SESSION["time1"] = $time1;
  $_SESSION["nature1"] = $nature1;
  $_SESSION["complaint1"] = $complaint1;
  $_SESSION["department1"] = $department1;

  $types = ["message", "info", "error"];
  $colors = ["green", "grey", "red"];

  for($i = 0; $i < count($types); $i++){
    if(isset($_SESSION[$types[$i]]) && !empty($_SESSION[$types[$i]])){
      echo "<span style='color:".$colors[$i]."'>" . $_SESSION[$types[$i]] . "</span>";
      session_unset();
    }
  }

  if($errorcount > 0){
    $session_error = "You have " . $errorcount . " error";
    if ($errorcount > 1) {
      $session_error .= "s";
    }
    $session_error .= " in your form submission";
    $_SESSION["error"] = $session_error;

    header("Location: ../appointment.php");
    die();
  }

  $appointmentobject = [
    'date1' => $date1,
    'time1' => $time1,
    'nature1' => $nature1,
    'complaint1' => $complaint1,
    'department1' => $department1,
  ];

  file_put_contents("../db/appointment/" . $currentuser->email . ".json", json_encode($appointmentobject));

  set_alert("message", "Your Appointment Has Been Booked Successfully");
  redirect_to("../appointment.php");  

?>