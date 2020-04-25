<?php
    session_start();

    if(isset($_SESSION["loggedin"]) && !empty($_SESSION["loggedin"])) {
      header("Location: dashboard.php");
    }
  include_once("lib/header.php");
  require_once("function/alert.php");
?>
  <title>SNGH: Login</title>
  
  </head>
  <body>

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal"><a href="index.php">SNG Hospital</a></h5>
      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="aboutus.php">About Us</a>
        <a class="p-2 text-dark" href="contactus.php">Contact Us</a>
      </nav>
    </div>

    <div class="container">
      <div class="row col-6">
        <h3>LOGIN TO SNG HOSPITAL</h3>
      </div>

        <p>
        <?php print_alert(); ?>
        </p>

      <div class="row col-6">
        <form action="process/processlogin.php" method="POST">

          <p>
            <label for="email">Email:</label><br>
            <input
              <?php
                if(isset($_SESSION['email'])){
                  echo "value=" . $_SESSION['email'];
                }
              ?>
            id="email" class="form-control" name="email" placeholder="Your Email Here" type="email">
          </p>

          <p>
            <label for="password">Password:</label><br>
            <input
              <?php
                if(isset($_SESSION['password'])){
                  echo "value=" . $_SESSION['password'];
                }
              ?>
              id="password" class="form-control" name="password" placeholder="Your Password Here" type="password">
          </p>

          <p>
            <button class="btn btn-sm btn-primary" type="submit">Login</button>
          </p>
        </form>
      </div>
    <a class="p-2 text-dark" href="register.php">Register</a> |
    <a class="p-2 text-dark" href="forgot_password.php">Forgot Password</a>
    </div>

<?php
  include_once("lib/footer.php");
?>