<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $db = "covid vaccination";
    $conn = mysqli_connect($host,$username,$password,$db);
    if(!$conn){
        die("Connection failed : ".mysqli_connect_error());
    }else{
        // echo "Connection successful\n";
    }

    if(isset($_POST["Submit"])){
        $FirstName = $_POST['first_name'];
        $LastName = $_POST['last_name'];
        $Age = $_POST['age'];
        $Email  = $_POST['email'];
        $Password = $_POST['Password'];
        $PhoneNumber = $_POST['Phone'];
        $Address = $_POST['Address'];
        $sql = "INSERT INTO admindetails(FirstName,LastName,Age,Email,Password,phoneNumber,Address) values('$FirstName','$LastName','$Age','$Email','$Password','$PhoneNumber','$Address')";
        if(mysqli_query($conn,$sql)){
            echo "You are Successfully Registered!!";
            header("Refresh:5;url=Login.html");
            // header("Location:Login.html");
        }else{
            echo "This Email is already registered try with other mail id";
            echo "<img src = './../images/Mail.jpg' alt = 'This is an image' style = 'margin:150px 0px 0px 50px'>";
            header("Refresh:5;url=OwnerRegistration.html");
        } 
    }else{
        echo "<img src = './../images/serverError.png' alt = 'This is an image' style = 'margin:150px 0px 0px 50px'>";
    }
?>