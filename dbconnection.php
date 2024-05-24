<?php
$Név = $_POST['VNev'];
$Név2 = $_POST['KNev'];
$telefon = $_POST['telefon'];
$email = $_POST['email'];
$date= $_POST['date'];
$time = $_POST['time'];
$szolgaltatas = $_POST['szolg'];
$barber = $_POST['barber'];


// Kapacsolat es adatok felvitele táblákba + valaszlevel kuldese
$host = "localhost";
$dbusername="root";
$dbpassword = "";
$dbname="fodrász";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
    die('Connect Error ('.mysqli_connect_errno() .') '.mysqli_connect_error());
}
else
    $to_email= $email;
    $subject = "Barber Shop Időpont foglalás💈";
    $body = "Kedves 👉 $Név $Név2!
Foglalásod rögzítettük.

Az alábbi Időpontban: 

Dátum: $date

Időpont: $time

Üdvözlettel
BarberShop,

Lemondásra telefonon van lehetőség:

Telefonszám: +709478298";

    $headers = "From: balazs990126@gmail.com";
    
    if(mail($to_email, $subject, $body, $headers)){
        header("location: index.php");
    
    }else{
        echo "Hiba a küldés közben";
    }
    $sql = "INSERT INTO vendeg (vezetek_nev,kereszt_nev,telefonszam,email) 
    values ('$Név','$Név2','$telefon','$email')";
    if ($conn->query($sql))
        {
        header("Location: index.php");

        }
    else
    {
        echo "Hiba " .mysqli_error($conn);
    $conn->close();
}


$sql2 = "INSERT INTO foglalas (barber_id, vendeg_id, szolgaltatas_id, idopont_id)
VALUES (
    (SELECT barber_id FROM barber WHERE barber_id = $barber LIMIT 1),
    (SELECT vendeg_id FROM vendeg WHERE vendeg_id = LAST_INSERT_ID() LIMIT 1),
    (SELECT szolgaltatas_id FROM szolgaltatas WHERE szolgaltatas_id = $szolgaltatas LIMIT 1),
    (SELECT idopont_id FROM idopontok WHERE datum='$date' AND idopont='$time' LIMIT 1))";
    if ($conn->query($sql2))
    {
        echo "Sikeres";
    } 
    else
    {
        echo "Hiba" . $conn->error;
    $conn->close();
    };
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['time']) && isset($_POST['date'])){
    $sql3 = "UPDATE idopontok set flag='1' where idopont_id=1 AND datum='$date' AND idopont='$time'";
      $result = mysqli_query($conn, $sql3);
    
      if($result)
      {
        echo "sikeres ";
      }else
      {
        echo "Sikertelen" .mysqli_error($conn);
      }
    };
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['time']) && isset($_POST['date'])){
        $sql3 = "UPDATE idopontok set flag='1' where idopont_id=2 AND datum='$date' AND idopont='$time'";
          $result2 = mysqli_query($conn, $sql3);
        
          if($result2)
          {
            echo "sikeres ";
          }else
          {
            echo "Sikertelen" .mysqli_error($conn);
          }
        };
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['time']) && isset($_POST['date'])){
          $sql3 = "UPDATE idopontok set flag='1' where idopont_id=3 AND datum='$date' AND idopont='$time'";
            $result2 = mysqli_query($conn, $sql3);
          
            if($result2)
            {
              echo "sikeres ";
            }else
            {
              echo "Sikertelen" .mysqli_error($conn);
            }
          };
?>