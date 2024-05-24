<?php
session_start();
$host = "localhost";
$dbusername="root";
$dbpassword = "";
$dbname="fodrász";

// Kapcsolat es adatok felvitele + valaszlevel kuldese. 
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){ 
    die('Connect Error ('.mysqli_connect_errno() .') '.mysqli_connect_error());
}
else {
    $sql = "SELECT * FROM vendeg";
    $result= mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
      echo "<h2>Vendégek</h2><br>";
      echo "<table class='table table-striped'><thead><tr><th>Vezetéknév</th><th>Keresztnév</th><th>Email</th><th>Telefonszám</th></tr></tr></thead><tbody>";
      while ($row = mysqli_fetch_array($result)){
          echo "<tr><td>{$row['vezetek_nev']}</td><td>{$row['kereszt_nev']}</td><td>{$row['email']}</td><td>{$row['telefonszam']}</td></tr>";
          
      }
      echo "</tbody></table>";
    }
  };
  echo "<h2>Új foglalások</h2>";  $sql2 = "SELECT COUNT(*) AS foglalasok from foglalas";
  $result=mysqli_query($conn, $sql2);
  $row = $result->fetch_assoc();
  $foglalasok = $row['foglalasok'];
?>
 <form action="logout.php" method="post"> 
   
    </form>
<!DOCTYPE html> 
<html lang="hu">
<head>
<style>
</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Admin</title>
    <ul class="list-group">
    <li class="list-group-item">Foglalások<span class="badge"><?php echo $foglalasok; ?></span></li>
</head>
</ul>
    <ul class="pager">
  <li><a href="logout.php">Kijelentkezés</a></li>
</ul>
<body>
    

</body> 
</html>
