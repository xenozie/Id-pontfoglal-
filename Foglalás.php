<?php
$Név = ['VNev'];
$Név2 =['KNev'];
$telefon =['telefon'];
$email = ['email'];
$date= ['date'];
$time = ['time'];
$szolgaltatas = ['szolg'];
$barber = ['barber'];
$host = "localhost";
$dbusername="root";
$dbpassword = "";
$dbname="fodrász";
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
if (mysqli_connect_error()){
    die('Connect Error ('.mysqli_connect_errno() .') '.mysqli_connect_error()); 
}


?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="stylefoglalas.css">
    <title>Foglalás</title> 
</head>
    <body>
    <style>
      body
      {
    
        justify-content: flex-end;
        background-image: url(logo3.jpg);
        background-repeat: no-repeat;
        background-position: right;
      }
      .kep
      {

         position: absolute;
         top: 18%;
         left: 35px;
         border-style: solid;
border-color: lightblue;
box-shadow: 2px 2px 1px 1px lightblue;
border-radius: 5px;
      }
      </style>
    <nav>

  
    <div class="topnav">
    <p>Szolgáltatások: HAJ / SZAKÁLL / HAJ és SZAKÁLL / APA-FIA HAJVÁGÁS / HAJVÁGÁS és SZAKÁLL GÉPI</p>
</nav>
<ul>
<li><input type="button" class="home" value='Főoldal' button onclick="document.location='index.php'"></li>
</ul>
</div>

<div class="kep" id="kep">
<p><img src="hajvagas.jpg" alt="Hajvágás"><br>

<p style="color: black; text-align: center; font-weight: bold">Új megjelenést szeretnél?<p><br><p style="text-align: center; font-weight: bold">Foglalj nálunk időpontot!</p> <br><p style="text-align: center">Fodrászaink a legprecízebbek, <br>és a legjobb szolgáltatásokat fogják nyújtani számodra. <br><br> 
<p style="font-weight: bold; text-align: center">Szolgáltatás áraink:<br><br>
<p style="text-align: center">Haj vágás: 2500,-<br>
<p  style="text-align: center">Szakáll: 4500,-<br>
<p  style="text-align: center">Családi Szolgáltatások: 5500,-<br>
<p  style="text-align: center">Gépi haj/szakáll vágás: 6500,-<br>

    </div>
<div id="form">
  <form method="POST" action='dbconnection.php'>

  <h3> Foglaló adatai </h3><br>
<div class='foglalas'>
<label style="font-size: 30px;">Vezetéknév</label>
<input required type="text" name="VNev" class='name'>
<label style="font-size: 30px;">Keresztnév</label>
<input required type="text" name="KNev" class='name'>
<label style="font-size: 30px;">Telefonszám</label>
<input required type="text" name="telefon" class='telefon' maxlength="12"><p style="color: red; font-size: 15px;">Pl. +3670...</p>
<label style="font-size: 30px;">Email</label>
<input required type="email" id="email" name="email" class='email'><hr>
<label style="font-size: 25px;" for='szolg'>Válassz Szolgáltatásaim közül:</label>
<select id='szolg' name='szolg' style="border-style: solid; text-align: center; border-radius: 35px; border-color: black; box-shadow: 2px 2px 1px 1px lightblue; width: 70px">
<option value="1">Haj</option>
<option value="2">Szakáll</option>
<option value="3">Családi</option>
<option value="4">Gépi</option>
</select>
<label style="font-size: 25px;" for="barber">Válassz Fodrászaink közül:</label>
<select id='barber' name='barber' style="display:grid; justify-self: center; text-align: center; border-style: solid; border-radius: 15px; border-color: black; box-shadow: 2px 2px 1px 1px lightblue; width: 90px">
<option value='1'>Kis Pista</option>
    </select><br><hr>

<label for="time" style="font-size: 30px;">Időpont</label>
<select name="time" id="time" class="time" style="display:grid; justify-self: center; text-align: center; width: 22%; border-style: solid; border-radius: 35px; border-color: black; box-shadow: 2px 3px lightblue;">
<?php

// Dátumok lekérdezése Adatbázisbol
$sql = "SELECT * FROM idopontok where flag = '0'";
$result= mysqli_query($conn, $sql);

if ($result) {
  while ($row = mysqli_fetch_array($result)){
  if($row['flag'] !='1'){
    echo "<option value='{$row['idopont']}'>".date("H:i:s", strtotime($row['idopont'])). "</option>";
  }
}
}
else
{
  echo "Sikertelen" . mysqli_error($conn);
};
?>

</select>
<label for="date" style="font-size: 30px;">Dátum</label>
<select name="date" id="date" class="date" style="display:grid; justify-self: center; text-align: center; width: 28%; border-style: solid; border-radius: 35px; box-shadow: 2px 3px lightblue;">
<?php
// Dátumok lekérdezése Adatbázisbol

$sql = "SELECT * FROM idopontok where flag = '0'";
$result= mysqli_query($conn, $sql);

if ($result) {
  while ($row = mysqli_fetch_array($result)){
  if($row['flag'] !='1'){
    echo "<option value='{$row['datum']}'>".date("Y-m-d", strtotime($row['datum'])). "</option>";
  }
}
}
?>
  </select><br>
  <input type="submit" name="submit" value="Foglalás" style="  display: grid;
justify-self: center;
background-color: rgba;
font-size: 1rem;
font-weight: 700;
padding: 0.5em 1em;
border-radius: 5px solid;
background-color: white;
box-shadow: 2px 2px 1px 1px lightblue;
height: 35px;">
</form>

  </div><br><hr>
  <div class="bottomnav">
  <img src="map2.jpg" style= "height: 25px" a href="facebook" button onclick="document.location=href='https://maps.app.goo.gl/VsEipRma9K8D8t9LA'" ></a>
<p>Barber Shop<p>
  </div>
</nav>
</body>
</html>