<?php
  session_start();

  include_once("lib/header.php");
  require_once("function/alert.php");
  require_once("function/user.php");

?>
  <title>SNGH: Reset Password</title>
  </head>
  <body>
    <?php
      if(!is_user_loggedin() && !is_token_set()){
        $_SESSION["error"] = "You are not authorized to reset your password";
        header("Location: login.php");
      }
    ?>
    <h1>Reset Password</h1>
    <p>Reset password associated with email address</p>

    <form action="process/processreset_pass.php" method="POST">
    
      <p>
      <?php print_alert(); ?>
      </p>

      <p>
        <?php if(!is_user_loggedin()) { ?>
          <input
            <?php
              if(is_token_set_in_session()){
                echo "value='" . $_SESSION["token"] . "'";
              }else{
                echo "value='" . $_GET["token"] . "'";
              }
            ?>
          type="hidden" name="token" />
        <?php } ?>

      </p>

      <p>
        <label for="email">Email:</label><br>
        <input
          <?php
            if(isset($_SESSION['email'])){
              echo "value=" . $_SESSION['email'];
            }
          ?>
         id="email" name="email" placeholder="Your Email Here" type="email">
      </p>
      <p>
        <label for="password">Enter New Password:</label><br>
        <input id="password" name="password" placeholder="Your New Password Here" type="password">
      </p>

      <p>
        <button type="submit">Reset Password</button>
      </p>
    </form>

    <a href="index.php">Home</a> |
    <a href="register.php">Register</a> |
    <a href="login.php">Login</a>
<?php
  include_once("lib/footer.php");
?>