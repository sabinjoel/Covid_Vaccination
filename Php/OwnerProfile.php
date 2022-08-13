<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="./../Css/Home.css">
    <title>Car Rental</title>
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

    </style>
  </head>
  <hr class = "Rule">

  <body style="background-image: url('./../images/Allpage bg.png'); background-repeat: no-repeat;background-size: cover;">
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
        <hr class = "Rule">
        <br>
  </body>
</html>

<?php 
    echo '<h1 align = center style = "color:red;">My Profile</h1>';
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "covid vaccination";
    $conn = mysqli_connect($host,$user,$password,$db);
    if(!$conn){
        
        echo "<img src = './../images/serverError.png' alt = 'This is an image' style = 'margin:50px 300px150px 0px 0px 50px'>";
        echo "Connection failed : ".mysqli_connect_error();
        die();
    }

    $email =$_SESSION['username'];
    $username = strstr($email, '@', true);
    $email = $_SESSION['username'];
    $query = "SELECT * FROM admindetails WHERE Email= '$email';";
    $query_run = mysqli_query($conn,$query);
    $data = mysqli_fetch_assoc($query_run);
    if($data){  
        echo '<br>';
        echo "<h1  style = 'color:green;margin:50px 300px '> First Name  : ".$data['FirstName']."</h1>";
        echo "<h1 style = 'color:green;margin:50px 300px '>Last Name : ". $data['LastName']."</h1>";
        echo "<h1 style = 'color:green;margin:50px 300px '>Age : ".$data['Age']."</h1>";
        echo "<h1 style = 'color:green;margin:50px 300px '>Email : ".$data['Email']."</h1>";
        echo "<h1 style = 'color:green; margin:50px 300px '>Phone Number : ".$data['phoneNumber']."</h1>";
        echo "<h1 style = 'color:green; margin:50px 300px '>Address : ".$data['Address']."</h1>";
    }else{
        echo "No data exists";
    }   
?>