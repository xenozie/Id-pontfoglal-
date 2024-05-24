<?php
session_start();
$host = "localhost";
$dbusername="root";
$dbpassword = "";
$dbname="fodrász";
$password =  hash('sha512','pw');
$connect=new mysqli($host, $dbusername, $dbpassword, $dbname);
if(!empty($_POST['login']))
{
    $username=$_POST['un'];
    $password= $_POST['pw'];
    $query = "SELECT * FROM user WHERE username = '$username'";
    $result=mysqli_query($connect,$query);
    $count=mysqli_num_rows($result);
    if($count>0)
    {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        header('location: index.php');
        die;
    }
    else
    {
        
        echo '<span style="background-color: red; color: white; font-weight: bold;">  Hibás jelszó, vagy felhasználónév!</span>';
    }
};
?>
<?php
// Admin user belépés
if($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["un"] == "admin" && $_POST["pw"] == "123") {
        $_SESSION['username'] = $username;
        header('location: admin.php');
    }
    else
    {
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
    <title>Belépés</title>
</head>
<body>
<style>
    .bejelent
    {
        border-style: solid;
        border-color: lightblue;
        border-radius: 35px;
        width: 20%;
        height: 230px;
    }
    .nev {
        padding-left: 20px;
        font-family: 'Courier New', Courier, monospace;
        font-weight: bold;
    }
    .jel
    {
        margin: 0;
        padding: 0;
        padding-left: 15px;
        font-family: 'Courier New', Courier, monospace;
        font-weight: bold;
    }
    h2 {
       padding-left: 150px;
       font-family: 'Times New Roman', Times, serif;
      letter-spacing: 3px;

    }
    input.home2
{
    width: 5%;
font-size: 18px;
margin-top: 0px;
margin-left: 10px;
border-radius: 15px;
border-color: white;
box-shadow: 2px 2px lightblue;
transition: all 1s;
    
}
input.home2:hover

{
    transform: translateY(-5px);
}
    </style>

<h2>Belépés</h2>
<input type="button" class="home2" style="width: 5%;
font-size: 18px;
border-radius: 15px;
border-color: white;
box-shadow: 2px 2px lightblue;
transition: all 1s;" value='Főoldal' button onclick="document.location='index.php'"></li><br><br>
<form method="post" class="bejelent">
    <label for="username" class="nev">Felhasználónév</label><br><br>
    <input type="text" name="un" style=" margin-left: 5px; border-style: solid; border-radius: 35px; border-color: lightblue; box-shadow: 2px 2px 1px 1px lightblue; "required><br><br>
    <label for="password" class="jel">Jelszó</label><br><br>
    <input type="password" name="pw" style=" margin-left: 5px; border-style: solid; border-radius: 35px; border-color: lightblue; box-shadow: 2px 2px 1px 1px lightblue;" required><br><br>
<input type="submit" name="login" value="Bejelentkezés" style=" margin-left: 50px; border-style: solid; border-radius: 35px; border-color: lightblue; box-shadow: 2px 2px 1px 1px lightblue;"><br><br>

    <input type="submit" value="Regisztráció" button onclick="document.location='registration.php'" style=" margin-left: 55px; border-style: solid; border-radius: 35px; border-color: lightblue; box-shadow: 2px 2px 1px 1px lightblue; ">
</form>

</body>
</html>
