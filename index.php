
<?php
session_start();
$host = "localhost";
$dbusername="root";
$dbpassword = "";
$dbname="fodrász";

// Kapacsolat es adatok felvitele + valaszlevel kuldese. 
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
    die('Connect Error ('.mysqli_connect_errno() .') '.mysqli_connect_error());
};

?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<head><title>Barber Shop</title>

<style>
    *
    {
        background-color: transparent;
        margin: 0;
        padding: 0p;
        box-sizing: border-box;
        font-family: sans-serif;
    }
    body 
    {
        display: flex;
        justify-content: flex-end;
        position: relative;
        background-image: url(barber.jpg);
        
    }
    .header
    {
        padding: 0px;
  text-align: center;
  background: #1abc9c;
  color: white;
  font-size: 15px;
    }
    
    .sub_div {
        position:absolute;
        bottom: 0px
    }
    nav a 
    {
        font-size: 1.1em;
        color: #333;
        text-decoration: none;
        padding: 6px 50px;
        transition: .5s;
       
        
    }
    nav a:hover 
    {
        color: #0ef;
    }
    .div 
    {
        padding-top: 5px;
    }
  
    .nav1 li
    {
        display: inline;
  height: 100%;
  vertical-align: top;


    }
    .nav1
    {
        display: inline;
  height: 50%;
  vertical-align: right;
  width: 700px;

  
    }
    .sidebar
    {
        position: fixed;
        left: 0;
        width: 180px;
        height: 25%;
        filter: blur(0.5px);
        
        
        
    }
    .sidebar ul a
    {
        margin: 0;
        padding: 0;
        color: black;
        display: block;
        height: 100%;
        width: 40%;
        line-height: 65px;
        
       
    }
    ul li:hover a 
    {
        padding-left: 50px;
    }
    header 
    {
        text-decoration: underline;
        font-family: "Bold Italic";
        padding-left: 30px;
        font-size: 30px;
        
        
    }
    .bottombar 
    {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        background-color: red;
        text-align: center;
        color: white;
        padding-left:20px;
       v
    }
    .bottombar li
    
    {
        font-family: "Bold Italic";
        letter-spacing: 4px;
      
    }

    </style>
<body>
<?php


if(isset($_SESSION['username'])){
echo "Bejelentkezve mint: " . $_SESSION['username'];
}else
{
    $conn->close();
}
?>
<nav>

<div class="nav1"><br><br>
<ul>
<form action="login.php"  method="post">
<li><img src="log.png" style= 'position: absolute; left: 65%; top: 40%; height: 40px;' button onclick="document.location='login.php'"></li>
<li><a href="facebook" button onclick="document.location=href='https://www.facebook.com/andrasibarbershop'">Facebook</a>
<li><a href="instagram" button onclick="document.location=href='https://www.instagram.com/balazsremai/'">Instagram</a>
<a href="logout.php">Kijelentkezés</a>
</ul>
<div class="sidebar">
<header> Menü </header>
<ul>
<li><a href="#" button onclick="document.location='index.php'">Főoldal</a></li>
<li><a href="#" button onclick="document.location='Foglalás.php'">Foglalás</a></li></ul>
</div>
<div class="bottombar">
<ul>
<marquee direction="right">
        Nyitvatartás
    </marquee>
<marquee direction="left">
Hétfő: 8:00-20:00
Kedd: 8:00-20:00
Szerda: 8:00-20:00
Csütörtök: Zárva
Péntek:8:00-20:00
Szombat:8:00-17:00
Vasárnap: Zárva
</marquee>

</nav>

</body>
</html>