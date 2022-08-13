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

  body {
      margin: 0px 0px 0px 0px;
      width:100%;
      overflow-x: hidden;
    }
    </style>
  </head>
  <hr class = "Rule">

  <body style="background-image: url('./../images/Allpage bg.png'); background-repeat: no-repeat;background-size: cover;">>
        <p class = "some" style = "font-size:30px;font:bold;position:relative;left:30px;top:20px">Covid Vaccination Website </p>
        <div class = "random" style = "position:relative">
          <center>
              <nav>
                  <a href = "#home" >Home </a>
                  <!-- <a href = "./../Html/bookingsPage.html">Booking</a> -->
                  <a href="./UserBooking.php">Booking</a>
                  <a href = "./UserProfile.php">My Profile</a>
                  <div class="dropdown">
                    <button class="drop-btn">Account▼</button>
                    <div class="dropdown-content">
                      <a href="./UserUpdatePassword.php">Update Password</a>
                      <a href="./UserDelete.php">Delete my account</a>
                    </div>
                  </div>
                  <a href = "#About" >About </a>
                  <a href = "./../Php/UserContactUs.php" >Contact Us </a>
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
        <h1 align = "center" style = "color:red">User Booking</h1>
        <h2 align = "left" style = "color:orange">Available Centres</h2>
  </body>
</html>
        

        


<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $db = "covid vaccination";
    $conn = mysqli_connect($host,$username,$password,$db);
    $query = "SELECT * FROM centredetails WHERE vaccineCapacity > 0;";
    $query_run = mysqli_query($conn,$query);
    
    echo "<table>";
    $i = 0;
    while($row = mysqli_fetch_array($query_run)){ 
            if( $i % 2 == 0){
                echo "<tr>";
            }
            echo "<td>";
                echo '<img src="data:image/jpeg;base64,'.base64_encode($row['Image'] ).'" height="400px" style = "padding:30px;"/>';
                echo '<br>'  
            ?> 
  
            <a href="CarBooking.php? Id= <?php echo $row["centreId"];?>"  style = "background-color:green;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;position:relative; left:300px;">Centre Details</a>
            <?php
            echo "</td>";
            $i++;
    }

?>