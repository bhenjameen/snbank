<?php
  session_start();
  require_once("function/alert.php");
  include_once("lib/header.php");

?>
  <title>SNGH: Book Appointment</title>
  </head>
  <body>

  <form action="process/processappointment.php" method="POST">

    <h2>Have Any Issues?</h2>
    <p>Book an appointment with us.</p>

    <?php
      print_alert();
    ?>

    <p>
      <label for="date">Date of appointment:</label><br>
      <input
        <?php
          if(isset($_SESSION['date1'])){
            echo "value=" . $_SESSION['date1'];
          }
        ?>
      id="date" name="date1" placeholder="Enter Date Here" type="text/number"><br>
    </p>

    <p>
      <label for="time">Time of appointment:</label><br>
      <input
        <?php
          if(isset($_SESSION['time1'])){
            echo "value=" . $_SESSION['time1'];
          }
        ?>
      id="time" name="time1" placeholder="Enter Time Here" type="text/number"><br>
    </p>

    <p>
      <label for="nature">Nature of appointment:</label><br>
      <input
        <?php
          if(isset($_SESSION['nature1'])){
            echo "value=" . $_SESSION['nature1'];
          }
        ?>
      id="nature" name="nature1" placeholder="Enter Nature Of Appointment Here" type="text"><br>
    </p>

    <p>
      <label for="complaint">Complaint:</label><br>
      <textarea
        <?php
          if(isset($_SESSION['complaint1'])){
            echo "value=" . $_SESSION['complaint1'];
          }
        ?>
      id="complaint" name="complaint1" placeholder="Your Complaint Here" type="text"></textarea><br>
    </p>

    <p>
        <label>Department:</label><br>
        <input
          <?php
            if(isset($_SESSION['department1']) && $_SESSION['department1'] == 'Radiology'){
              echo "selected";
            }
          ?>
        id="radiology" name="department1" type="radio" value = "radiology"><label for = "radiology">Radiology</label>
        <input
          <?php
            if(isset($_SESSION['department1']) && $_SESSION['department1'] == 'Virology'){
              echo "selected";
            }
          ?>
        id="virology" name="department1" type="radio" value = "virology"><label for = "virology">Virology</label>
        <input
          <?php
            if(isset($_SESSION['department1']) && $_SESSION['department1'] == 'Pathology'){
              echo "selected";
            }
          ?>
        id="pathology" name="department1" type="radio" value = "pathology"><label for = "pathology">Pathology</label>
      </p>

    <p>
      <button type="submit">Book Appointment</button>
    </p>

  </form>

  <a href="patient.php">Dashboard</a>

<?php
  include_once("lib/footer.php");
?>