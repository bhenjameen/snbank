<?php

  include_once("alert.php");

 
  function is_user_loggedin(){
    if($_SESSION["loggedin"] && !empty($_SESSION["loggedin"])){
      return true;
    }
    return false;
  }

  function is_token_set(){
    return is_token_set_in_get() || is_token_set_in_session();
  }

  function is_token_set_in_session(){
    return isset($_SESSION["token"]);
  }

  function is_token_set_in_get(){
    return isset($_GET["token"]);
  }

  function find_user($email = ""){
    if(!$email){
      set_alert("error", "User Email Is Not Set");
      die();
    }

    $allusers = scandir("../db/users");
    $countallusers = count($allusers);

    for ($counter=0; $counter < $countallusers; $counter++) { 
      $currentuser = $allusers[$counter];

      if ($currentuser == $email . ".json") {
        $userstring = file_get_contents("../db/users/" . $currentuser);
        $userobject = json_decode($userstring);

        return $userobject;
      }
    }
    return false;
  }

  function save_user($userobject){
    file_put_contents("../db/users/" . $userobject["email"] . ".json", json_encode($userobject));
  }
    
?>