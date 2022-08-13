<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="./../Css/Home.css">
    <title>Covid Vaccination</title>
    <style>
      .drop-btn {
    background: none;
    border: none;
    padding: 0;
    color: black;
    text-decoration: none;
    cursor: pointer;
  }
  
  .dropdown {
    position: relative;
    display: inline-block;
  }
  
  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
  }
  
  .dropdown-content a {
    color: black;
    padding: 10px 10px;
    text-decoration: none;
    display: block;
  }
  
  .dropdown-content a:hover {background-color: lightgreen;}
  
  .dropdown:hover .dropdown-content {display: block;background-color:white}
  body {
    margin: 0px 0px 0px 0px;
    width:100%;
    overflow-x: hidden;
    /* margin-top: 0px */
}

    </style>
  </head>
  <hr class = "Rule">

  <body>
        <p class = "some" style = "font-size:30px;font:bold;position:relative;left:30px;top:20px">Covid Vaccination Website </p>
        <div class = "random" style = "position:relative">
          <center>
              <nav>
                  <a href = "#home" >Home </a>
                  <!-- <a href = "./../Html/bookingsPage.html">Booking</a> -->
                  <div class="dropdown">
                    <button class="drop-btn">Vaccination Centres▼</button>
                    <div class="dropdown-content">
                      <a href="./OwnerBooking.php">Add Vaccine Centre</a>
                      <a href="./OwnerRemoveCarPage.php">Remove Vaccine Centre</a>
                      <!-- <a href="./OwnerBookingHistory.php">Current </a> -->
                    </div>
                  </div>
                  <a href = "./OwnerProfile.php">My Profile</a>
                  <div class="dropdown">
                    <button class="drop-btn">Account▼</button>
                    <div class="dropdown-content">
                      <a href="./OwnerUpdatePassword.php">Update Password</a>
                      <a href="./OwnerDelete.php">Delete my account</a>
                    </div>
                  </div>
                  <a href = "#About" >About </a>
                  <a href = "./../Php/OwnerContactUs.html" >Contact Us </a>
                  <a href = "./Logout.php">Log Out </a>
              </nav>
          </center>
        <?php 
          $email =$_SESSION['username'];
          $username = strstr($email, '@', true);
          echo "<h1 align= right style = 'color:blue;position:relative;bottom:20px'> "."Hello ".$username."</h1>";
        ?>
        </div>
        <br>
        <img class = "car"  src = "./../images/homeee.png" alt = "This is a image2 " style= "position:relative;bottom:20px">
        <div id = "About" style = "background-color:#3d9996">
        <img class = "car"  src = "./../images/partner.png" alt = "This is a partner image " style= "position:relative;bottom:10px;height:400px">
          
        <center>
          <h2 style = "margin:0px 0px 0px 0px ">Copyright © 2022 Sabin. All Rights Reserved</h2>
            
          </center>
          <br>
          <br>
        </div>
  </body>
</html>
