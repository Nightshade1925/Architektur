<?php
    $user = "root";
    $pass = "";
    $server = "localhost:3307";
    $database = "db_m151";
   # $driver = "MySQL ODBC 8.0 Unicode Driver";
    #$connection = "DRIVER = $driver; SERVER=$server; DATABASE=$database";
    
   /* $con = odbc_connect($connection,$user,$pass); //da gits nen error

    zum teste ob connection funktioniert
    if($con)
    {
        echo "it works!";
    }
    else{

        die("error!");
    }
*/
    $nachname = $_POST['nachname'];
    $vorname = $_POST['vorname'];
    $geburtsdatum = $_POST['geburtsdatum'];
    $email = $_POST['email'];
    $ahvNr = $_POST['ahvNr'];
    $personalnr = $_POST['personalnr'];
    $telefon = $_POST['telefon'];
    $abteilung = $_POST['abteilung'];
    $berufsbezeichnung = $_POST['berufsbezeichnung'];
    $berufsbeschreibung = $_POST['berufsbeschreibung'];
    $con = mysqli_connect($server, $user, $pass, $database);
    
    //check connection
    if (mysqli_connect_error()) {
        echo "Verbindung nicht möglich: ";
      }
  
    $sql = "INSERT INTO tbl_person VALUES 
        ('1','$vorname', '$nachname', '$geburtsdatum','$ahvNr','$personalnr','1','1','1','1','1')";

    if ($con->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $con->error;
      }

?>