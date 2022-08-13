<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <style>
      div {
        margin-bottom: 10px;
        padding-top: 15px;
      }
      label{
        display: inline-block;
        width: 150px;
        text-align: right;
      }
    </style>
    <link rel="stylesheet" href="./../Css/Home.css">
    <title>Add Cars</title>

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
    <form action = "" method="POST" enctype="multipart/form-data">
        <center>
            <h1 style = "color:red">Add Vaccination Centre</h1>
            <!-- <div>
                <label class = "name" >Centre Id<span style = "color: red;">&#42;</span></label>          
                <input  type = "text" name = "CentreId" placeholder = "Centre Id" required>    
            </div> -->
    
            <label class = "name" >Centre Name<span style = "color: red;">&#42;</span></label>
                <input  type = "text" name = "CentreName" placeholder = "Centre Name" required>
            
            <div>
                <label class = "name" >Area<span style = "color: red;">&#42;</span></label>           
                <input  type = "text" name = "Area" placeholder = "Area"required>
                
            </div>
            <div>
                <label class = "name" >Pincode<span style = "color: red;">&#42;</span></label>
                <input  type = "text" name = "Pincode" placeholder = "Pincode" required>
                
            </div>
            <div>
                <label class = "name" >Vaccine Capacity<span style = "color: red;">&#42;</span></label>
                <input  type = "text" name = "VaccineCapacity" placeholder = "Vaccine Capacity" required>
                
            </div>
            <div>
                <label for="img">Centre image:<span style = "color: red;">&#42;</span></label>
                <input type="file" name="Image" required>
            </div>
            <button name = "Upload" style = "width:fit-content;background-color:orange;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;">Submit</button>
        </center>
    </form>
  </body>
</html>

<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "covid vaccination";
$conn1 = mysqli_connect($host,$username,$password,$db);
if(isset($_POST['Upload'])){
    $conn = mysqli_connect("localhost","root","","covid vaccination");
    $email = $_SESSION['username'];
    $query = "SELECT * FROM admindetails WHERE Email= '$email';";
    $query_run = mysqli_query($conn,$query);
    $data = mysqli_fetch_assoc($query_run);
    $file = addslashes(file_get_contents($_FILES["Image"]["tmp_name"]));
    $Email = $data['Email'];
    $Address = $data['Address'];
    // $CentreId = $_POST['CentreId'];
    $CentreName = $_POST['CentreName'];
    $Area = $_POST['Area'];
    $Pincode = $_POST['Pincode'];
    $VaccineCapacity = $_POST['VaccineCapacity'];
    $sql = "INSERT INTO centredetails(centreName,Area,Pincode,vaccineCapacity,Email,Image) values('$CentreName','$Area','$Pincode','$VaccineCapacity','$email','$file')";
    if(mysqli_query($conn,$sql)){
        echo '<script type = "text/javascript">alert("Car Added Successfully")</script>';
    }else{
        echo "Something went wrong";
    }
}
