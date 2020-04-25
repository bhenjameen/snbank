<?php
  session_start();

  include_once("lib/header.php");

  if(!isset($_SESSION["loggedin"])) {
    header("Location: login.php");
  }
?>
<title>SNGH: Dashboard</title>
</head>

<body>
    <h1>DASHBOARD</h1>
    <p>
        Welcome, <?php echo $_SESSION["fullname"] ?>, You are logged in as <?php echo $_SESSION["role"] ?> and your ID
        is <?php echo $_SESSION["loggedin"]?>.
    </p>
    <p>
        <a href="index.php">Home</a> |
        <a href="logout.php">Logout</a> |
        <a href="password_reset.php">Reset Password</a>
    </p>

    <?php
  include_once("lib/footer.php");
?>