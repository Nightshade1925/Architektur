<?php
 
    $database = "db_m151";
    $con = odbc_connect('MySQL','root','password!');

  
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

    
  
    $sql = "insert into [tbl_person](vorname,nachname,geburtsdatum,ahv_nr,personal_nr,fk_firma,fk_abteilung,fk_telefon,fk_email,fk_beruf) VALUES 
        ('$vorname', '$nachname', '$geburtsdatum','$ahvNr','$personalnr','1','1','1','1','1')";
    
    odbc_exec($con, $sql);

?>