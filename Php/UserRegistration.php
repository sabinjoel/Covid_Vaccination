<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "covid vaccination";
    $conn =  mysqli_connect($host,$user,$password,$db);
   
    if(isset($_POST["Submit"])){
        $FirstName = $_POST['first_name'];
        $LastName = $_POST['last_name'];
        $Email = $_POST['email'];
        $Age = $_POST['age'];
        $Password = $_POST['Password'];
        $AadharNumber = $_POST["AadharNumber"];
        $PhoneNumber = $_POST["phone"];
        $Address = $_POST['Address'];
        $sql = "INSERT INTO userdetails(FirstName,LastName,Email,Password,AadharNumber,Age,phoneNumber,Address) values('$FirstName','$LastName','$Email','$Password','$AadharNumber','$Age','$PhoneNumber','$Address')";
        if(mysqli_query($conn,$sql)){
            echo "Record Added Successfully";
            header("Location:Login.html");
        }else{
            // echo "Error";
            echo "<img src = './../images/Mail.jpg' alt = 'This is an image' style = 'margin:150px 0px 0px 50px'>";
            header("Refresh:5;url= UserRegistration.html");
        } 
    }else{
        echo "Something Went Wrong";
    }
    
?>