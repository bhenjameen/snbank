<?php
  session_start();
  if(isset($_SESSION["loggedin"]) && !empty($_SESSION["loggedin"])) {
    header("Location: dashboard.php");
  }

  include_once("lib/header.php");
  require_once("function/alert.php");

?>
<title>SNGH: Add A Patient</title>
</head>

<body>

    <p>Add A Patient</p>

    <form action="process/processpatient_setup.php" method="POST">
        <p>
            <?php print_alert(); ?>
        </p>

        <p>
            <label for="firstname">First Name:</label><br>
            <input <?php
            if(isset($_SESSION['firstname'])){
              echo "value=" . $_SESSION['firstname'];
            }
          ?> id="firstname" name="firstname" placeholder="Enter First Name Here" type="text">
        </p>

        <p>
            <label for="lastname">Last Name:</label><br>
            <input <?php
            if(isset($_SESSION['lastname'])){
              echo "value=" . $_SESSION['lastname'];
            }
          ?> id="lastname" name="lastname" placeholder="Enter Last Name Here" type="text">
        </p>

        <p>
            <label for="email">Email:</label><br>
            <input <?php
            if(isset($_SESSION['email'])){
              echo "value=" . $_SESSION['email'];
            }
          ?> id="email" name="email" placeholder="Enter Email Here" type="email">
        </p>

        <p>
            <label>Gender:</label><br>
            <input <?php
            if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'male'){
              echo "selected";
            }
          ?> id="male" name="gender" type="radio" value="male"><label for="male">Male</label>
            <input <?php
            if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'female'){
              echo "selected";
            }
          ?> id="female" name="gender" type="radio" value="female"><label for="female">Female</label>
        </p>

        <p>
            <label>Designation:</label><br>
            <input <?php
            if(isset($_SESSION['designation']) && $_SESSION['designation'] == 'Patient'){
              echo "selected";
            }
          ?> id="patient" name="designation" type="radio" value="patient">
            <label for="patient">Patient</label>
        </p>

        <p>
            <label>Department:</label><br>
            <input <?php
            if(isset($_SESSION['department']) && $_SESSION['department'] == 'Radiology'){
              echo "selected";
            }
          ?> id="radiology" name="department" type="radio" value="radiology"><label for="radiology">Radiology</label>
            <input <?php
            if(isset($_SESSION['department']) && $_SESSION['department'] == 'Virology'){
              echo "selected";
            }
          ?> id="virology" name="department" type="radio" value="virology"><label for="virology">Virology</label>
            <input <?php
            if(isset($_SESSION['department']) && $_SESSION['department'] == 'Pathology'){
              echo "selected";
            }
          ?> id="pathology" name="department" type="radio" value="pathology"><label for="pathology">Pathology</label>
        </p>

        <p>
            <label for="password">Password:</label><br>
            <input <?php
            if(isset($_SESSION['password'])){
              echo "value=" . $_SESSION['password'];
            }
          ?> id="password" name="password" placeholder="Enter Password Here" type="password">
        </p>

        <p>
            <button type="submit">Add Patient</button>
        </p>
    </form>

    <a href="personnel_setup.php">Add A Medical Personnel</a> |
    <a href="superadmin.php">Dashboard</a>

    <?php
  include_once("lib/footer.php");
?>