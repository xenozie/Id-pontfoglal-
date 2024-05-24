
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylefoglalas.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <title>Regisztráció</title>
</head>
<body>
<form><ul class="pager">
  <li class="previous"><a href="index.php">Vissza</a></li>
</ul></form>

<div>
<h2 style="margin-left: 15px;">Regisztráció</h2>
<form method="post" class='reg-2' action='regfunction.php'>
<label>Felhasználónév</label>
<input type="text" name="felhaszn" class='username-2' required>
<label>Jelszó</label>
<input type="password" name="jelsz" class='password-2' required><br>
<input type="submit" name='reg' class='reg' value="Regisztráció"> </input><br>
</form>

  

</div>
</body>
</html>