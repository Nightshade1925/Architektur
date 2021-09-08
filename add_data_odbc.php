<?php
 
    $database = "db_m151";
    $con = odbc_connect('MariaDb','root','password!'); /*die variante funktioniert connection aber kann ned date hinzuefüege
    //$con = odbc_connect("DRIVER={SQL Server Native Client 11.0};Server=LAPTOP-TOQJ1EIO\SQLEXPRESS;Database=m151",
    "root", "password!");*/

  
    if($con)
    {
        echo "it works!";
    }
    else{

        die("error!");
    }

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

    
  
    $sql = "INSERT INTO tbl_person(vorname,nachname,geburtsdatum,ahv_nr,personal_nr,fk_abteilung,fk_telefon,fk_email,fk_beruf) VALUES 
        ('$vorname', '$nachname', '$geburtsdatum','$ahvNr','$personalnr','1','1','1','1')";
    
    $result = odbc_exec($con, $sql);

    if($result == true)
    {
        echo "successfully added";
    }
?>