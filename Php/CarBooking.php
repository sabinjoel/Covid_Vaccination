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

  <body>
        <p class = "some" style = "font-size:30px;font:bold;position:relative;left:30px;top:20px">Car Rental Website </p>
        <div class = "random" style = "position:relative">
          <center>
              <nav>
                  <a href = "#home" >Home </a>
                  <!-- <a href = "./../Html/bookingsPage.html">Booking</a> -->
                  <div class="dropdown">
                    <button class="drop-btn">Booking▼</button>
                    <div class="dropdown-content">
                      <a href="./UserBooking.php">Booking</a>
                      <a href="./UserCancelBooking.php">Cancel Booking</a>
                      <a href="./UserBookingHistory.php">History</a>
                    </div>
                  </div>
                  <a href = "./UserProfile.php">My Profile</a>
                  <div class="dropdown">
                    <button class="drop-btn">Account▼</button>
                    <div class="dropdown-content">
                      <a href="./UserUpdatePassword.php">Update Password</a>
                      <a href="./UserDelete.php">Delete my account</a>
                    </div>
                  </div>
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
       
  </body>
</html>


<form action ="" method = "POST">
    <?php
        $Id = $_GET['Id'];
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
        $query = "SELECT * FROM centredetails WHERE centreId= '$Id';";
        $query_run = mysqli_query($conn,$query);
        $data = mysqli_fetch_assoc($query_run);
        if($data){  
            echo "<h1 style = 'color:red;margin:50px 300px'>Centre Details</h1>";
            echo "<h2  style = 'color:green;margin:50px 300px '> Name  : ".$data['centreName']."</h2>";
            echo "<h2 style = 'color:green;margin:50px 300px '>Centre Id : ". $data['centreId']."</h2>";
            echo "<h2 style = 'color:green;margin:50px 300px '>Email : ".$data['Email']."</h2>";
            echo "<h2 style = 'color:green;margin:50px 300px '>Pincode : ".$data['Pincode']."</h2>";
            echo "<h2 style = 'color:green;margin:50px 300px '> vaccineCapacity : ".$data['vaccineCapacity']."</h2>";
            echo '<center><img src="data:image/jpeg;base64,'.base64_encode($data['Image'] ).'" style = "text-align:center" height="500em"/></center>';  
        }else{
            echo "Something went wrong";
        }
    ?>
        <marquee ><h1 style = "color:blue">Please select below date to book your slot</h1></marquee>
        <center>
        <div>
            <label>Slot Date</label>
            <input type = "Date" name="sDate"  required>
            <p></p>
        </div>
        <button name = "Book" style = "background-color:Red;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;">Book Now</button>
        </center>
</form>
 


<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "covid vaccination";
    $conn = mysqli_connect($host,$user,$password,$db);
    if(!$conn){  
        echo "<img src = './../images/serverError.png' alt = 'This is an image' style = 'margin:50px 300px150px 0px 0px 50px'>";
        echo "Connection failed : ".mysqli_connect_error();
        die();
    }else{
      echo "connection successful";
    }
    if(isset($_POST['Book'])){
        $Id = $_GET['Id'];
        $email =$_SESSION['username'];
        $query = "INSERT INTO bookingdetails(Id,Email) values('$Id','$email')";
        $conn1 = mysqli_connect($host,$user,$password,$db);
        $query1 = "UPDATE bookingdetails SET Count = Count - 1 where Id = '$Id'";
        if(mysqli_query($conn,$query)){
            $result = mysqli_query($conn1,$query1);
            echo '<script type = "text/javascript">alert("Your  booking successful")</script>';
            header("Location:UserBooking.php");
          }else{
            
            echo '<script type = "text/javascript">alert("There is no slots available today!")</script>';
        }
    }
?>    