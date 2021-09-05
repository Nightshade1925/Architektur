<?php
    $user = "root";
    $pass = "";
    $server = "localhost";
    $database = "db_m151";
    $driver = "MySQL ODBC 8.0 Unicode Driver";
    $connection = "DRIVER = $driver; SERVER=$server; DATABASE=$database";
    
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
    $conn = new mysqli($server, 
    $user, $pass, $database);
    
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " 
        . $conn->connect_error);
}
  
$sqlquery = "INSERT INTO tbl_person VALUES 
    ('$vorname', '$nachname', '$geburtsdatum','$ahvNr','$personalnr','1','1','1','1','1')"
  
if ($conn->query($sql) === TRUE) {
    echo "record inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}





?>