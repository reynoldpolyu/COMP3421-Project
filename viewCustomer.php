<?php
include("header.php");
?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dish</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <meta name="author" content="" />

  <!-- Facebook and Twitter integration -->
  <meta property="og:title" content=""/>
  <meta property="og:image" content=""/>
  <meta property="og:url" content=""/>
  <meta property="og:site_name" content=""/>
  <meta property="og:description" content=""/>
  <meta name="twitter:title" content="" />
  <meta name="twitter:image" content="" />
  <meta name="twitter:url" content="" />
  <meta name="twitter:card" content="" />

  <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">

  <!-- Animate.css -->
  <link rel="stylesheet" href="css/animate.css">
  <!-- Icomoon Icon Fonts-->
  <link rel="stylesheet" href="css/icomoon.css">
  <!-- Bootstrap  -->
  <link rel="stylesheet" href="css/bootstrap.css">

  <!-- Magnific Popup -->
  <link rel="stylesheet" href="css/magnific-popup.css">

  <!-- Flexslider  -->
  <link rel="stylesheet" href="css/flexslider.css">

  <!-- Owl Carousel -->
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">

  <!-- Date Picker -->
  <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <!-- Flaticons  -->
  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

  <!-- Theme style  -->
  <link rel="stylesheet" href="css/style.css">

  <!-- Modernizr JS -->
  <script src="js/modernizr-2.6.2.min.js"></script>
</head>
<body class="colorlib-light-grey">
	<div class="colorlib-loader"></div>
    <form method="POST" enctype="multipart/form-data">
      <center>
        <br>
        <?php 
          if($_SESSION["user_type"] == 'staff'){
            echo "<a href='staffHomepage.php'><h1>Homepage ".$_SESSION["user_type"]."</h1></a>";
          }
          else if($_SESSION["user_type"] == 'admin'){
            echo "<a href='adminHomepage.php'><h1>Homepage ".$_SESSION["user_type"]."</h1></a>";
          }
        ?>
        <br><br>
      <h2>Customer Information</h2>
      <h3>Where you are <?php echo $_SESSION["user_type"];?></h3>

      <br>

      <table>
        <tr>
          <td>First Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
          <td>Last Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
          <td>Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
          <td>Gender&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
          <td>Contact Number&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
          <td>Birthday<td><br>

        </tr>
        <!-- the following tr is for debugging purpose, please keep -->
        <br>
        <tr>
              <td><br></td>
              <td><br></td>
              <td><br></td>
              <td><br></td>
              <td><br></td>
              <td><br> <form action='deleteDishProcess.php' method='POST'>
                  <input type='hidden' name='dishid' value='$row[dish_id]'>
                </form></td>
              </tr>
        <?php
            $userid = $_GET['userid'];
            include("connection.php");
            $sql = "SELECT * FROM users WHERE user_id='$userid'";
            $result = mysqli_query($con,$sql);
            while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
              echo "
              <tr>
              <td>$row[user_fname]</td>
              <td>$row[user_lname]</td>
              <td>$row[user_email]</td>
              <td>$row[user_gender]</td>
              <td>$row[user_phone]</td>
              <td>$row[user_DOB]</td>
              </tr>
              ";
            }
             mysqli_close($con);


          ?>
      </table><br><br>
      </center>
    </form>

    
      <?php 
          if($_SESSION["user_type"] == 'staff'){
            echo "<form method='POST' action='viewBooking.php' >";
          }
          else if($_SESSION["user_type"] == 'admin'){
            echo "<form method='POST' action='viewBooking.php' >";
          }
        ?>

    <!-- <form method="POST" action="viewRestaurant.php" > -->
      <center>
        <button type='submit' name='backButton'>Back</button>
      </center>
      </form>
</body>
<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!-- jQuery Easing -->
<script src="js/jquery.easing.1.3.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js"></script>
<!-- Waypoints -->
<script src="js/jquery.waypoints.min.js"></script>
<!-- Flexslider -->
<script src="js/jquery.flexslider-min.js"></script>
<!-- Owl carousel -->
<script src="js/owl.carousel.min.js"></script>
<!-- Magnific Popup -->
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/magnific-popup-options.js"></script>
<!-- Date Picker -->
<script src="js/bootstrap-datepicker.js"></script>
<!-- Stellar Parallax -->
<script src="js/jquery.stellar.min.js"></script>
<!-- Main -->
<script src="js/main.js"></script>
</html>
