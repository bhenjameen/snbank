<?php
  session_start();

  include_once("lib/header.php");
  require_once("function/alert.php");

?>
  <title>SNGH: Forgot Password</title>
  </head>
  <body>

    <h1>Forgot Password</h1>
    <p>Provide the email address associated with your account in the field below:</p>

    <form action="process/processforgot_pass.php" method="POST">
    
      <p>
        <?php print_alert(); ?>
      </p>
      
      <label for="email">Email:</label><br>
      <input
        <?php
          if(isset($_SESSION['email'])){
            echo "value=" . $_SESSION['email'];
          }
        ?>
      id="email" name="email" placeholder="Your Email Here" type="email">

      <p>
        <button type="submit">Submit</button>
      </p>
    </form>

    <a href="index.php">Home</a> |
    <a href="register.php">Register</a> |
    <a href="login.php">Login</a>
<?php
  include_once("lib/footer.php");
?>