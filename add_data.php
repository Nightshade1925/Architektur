<?php
    $user = "root";
    $pass = "";
    $server = "localhost:3307";
    $database = "db_m151";
  
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