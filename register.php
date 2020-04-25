<?php
  session_start();
  if(isset($_SESSION["loggedin"]) && !empty($_SESSION["loggedin"])) {
    header("Location: dashboard.php");
  }

  include_once("lib/header.php");
  require_once("function/alert.php");

?>
  <title>SNGH: Register</title>
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
      <div class="row">
        <h3>Register for your SNG account</h3>
      </div>

      <div class="row col-6">
        <form action="process/processregistr.php" method="POST">
          <p>
            <?php print_alert(); ?>
          </p>

          <p>
            <label class="label" for="firstname">First Name:</label><br>
            <input 
              <?php
                if(isset($_SESSION['firstname'])){
                  echo "value=" . $_SESSION['firstname'];
                }
              ?>
            id="firstname" class="form-control" name="firstname" placeholder="Your First Name Here" type="text">
          </p>

          <p>
            <label class="label" for="lastname">Last Name:</label><br>
            <input
              <?php
                if(isset($_SESSION['lastname'])){
                  echo "value=" . $_SESSION['lastname'];
                }
              ?>
              id="lastname" class="form-control" name="lastname" placeholder="Your Last Name Here" type="text">
          </p>

          <p>
            <label class="label" for="email">Email:</label><br>
            <input
              <?php
                if(isset($_SESSION['email'])){
                  echo "value=" . $_SESSION['email'];
                }
              ?>
            id="email" class="form-control" name="email" placeholder="Your Email Here" type="email">
          </p>

          <p>
            <label class="label">Gender:</label><br>
            <input
              <?php
                if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'male'){
                  echo "selected";
                }
              ?>
            id="male" name="gender" type="radio" value="male"><label class="label" for="male">Male</label>
            <input
              <?php
                if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'female'){
                  echo "selected";
                }
              ?>
            id="female" name="gender" type="radio" value="female"><label class="label" for="female">Female</label>
          </p>

          <p>
            <label class="label">Designation:</label><br>
            <input
              <?php
                if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'Medical Personnel'){
                  echo "selected";
                }
              ?>
            id="medicalpersonnel" name="designation" type="radio" value="medicalpersonnel">
            <label class="label" for="medicalpersonnel">Medical Personnel</label>
            <input
              <?php
                if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'Patient'){
                  echo "selected";
                }
              ?>
            id="patient" name="designation" type="radio" value="patient"><label class="label" for="patient">Patient</label>
          </p>

          <p>
            <label class="label">Department:</label><br>
            <input
              <?php
                if(isset($_SESSION['department']) && $_SESSION['department'] == 'Radiology'){
                  echo "selected";
                }
              ?>
            id="radiology" name="department" type="radio" value = "radiology"><label class="label" for = "radiology">Radiology</label>
            <input
              <?php
                if(isset($_SESSION['department']) && $_SESSION['department'] == 'Virology'){
                  echo "selected";
                }
              ?>
            id="virology" name="department" type="radio" value = "virology"><label class="label" for = "virology">Virology</label>
            <input
              <?php
                if(isset($_SESSION['department']) && $_SESSION['department'] == 'Pathology'){
                  echo "selected";
                }
              ?>
            id="pathology" name="department" type="radio" value = "pathology"><label class="label" for = "pathology">Pathology</label>
          </p>

          <p>
            <label class="label" for="password">Password:</label><br>
            <input
              <?php
                if(isset($_SESSION['password'])){
                  echo "value=" . $_SESSION['password'];
                }
              ?>
              id="password" class="form-control" name="password" placeholder="Your Password Here" type="password">
          </p>

          <p>
            <button class="btn btn-success" type="submit">Register</button>
          </p>
        </form>
      </div>
      <a class="p-2 text-dark" href="login.php">Have An Account Already? Login</a>
    </div>

<?php
  include_once("lib/footer.php");
?>