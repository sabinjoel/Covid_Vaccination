
<?php
    echo "<h1 align = center style = 'color:orange'>My Bookings History</h1>";
    session_start();
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
        echo "<h2  style = 'color:green;margin:50px 300px '> Centre Id  : ".$data['centreId']."</h2>";
        echo "<h2 style = 'color:green;margin:50px 300px '> Centre Name : ". $data['centreName']."</h2>";
        echo "<h2 style = 'color:green;margin:50px 300px '> Area : ".$data['Area']."</h2>";
        echo "<h2 style = 'color:green;margin:50px 300px '> Pincode : ".$data['Pincode']."</h2>";
        echo "<h2 style = 'color:green;margin:50px 300px '> Vaccine Capacity : ".$data['vaccineCapacity']."</h2>";
        echo "<h2 style = 'color:green;margin:50px 300px '> Added by : ".$data['Email']."</h2>";
        echo '<center><img src="data:image/jpeg;base64,'.base64_encode($data['Image'] ).'" style = "text-align:center" height="500em"/></center>';  
    }else{
        echo "Something went wrong";
    }
?>
        




