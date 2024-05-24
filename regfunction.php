<?php


$username = $_POST['felhaszn'];
$password =  hash('sha512','jelsz');
$host = "localhost";
$dbusername="root";
$dbpassword = "";
$dbname="fodrász";

// Kapacsolat es adatok felvitele 
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
    die('Connect Error ('.mysqli_connect_errno() .') '.mysqli_connect_error());
}
else{
    $sql = "INSERT INTO user (username,password) 
    values ('$username','$password')";
    if ($conn->query($sql)){
        
        echo'<strong style=color:green; font-weight: bold;">Sikeres Regisztráció! Átirányítás a Főoldalra<br></strong>'; header('refresh: 2; url=index.php');
       
        
    }
    else{
        echo "Hiba " .mysqli_error($conn);
    $conn->close();
}
}
?>