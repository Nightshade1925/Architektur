<?php
    //MariaDb
    $database = "db_m151";
    $con = odbc_connect('MariaDb','root','password!'); /*die variante funktioniert connection aber kann ned date hinzuefüege
    //$con = odbc_connect("DRIVER={SQL Server Native Client 11.0};Server=LAPTOP-TOQJ1EIO\SQLEXPRESS;Database=m151",
    "root", "password!");*/

    //MySQL Server
    $con2 = odbc_connect('MySQL','root','');


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
    $firma = 'Tele';

    
  
    /*Without Stored Procedure
    $sql = "INSERT INTO tbl_person(vorname,nachname,geburtsdatum,ahv_nr,personal_nr,fk_abteilung,fk_telefon,fk_email,fk_beruf) VALUES 
        ('$vorname', '$nachname', '$geburtsdatum','$ahvNr','$personalnr','1','1','1','1')";

    $sql2 = "INSERT INTO tbl_person(vorname,nachname,geburtsdatum,ahv_nr,personal_nr,fk_abteilung,fk_telefon,fk_email,fk_beruf) VALUES 
    ('$vorname', '$nachname', '$geburtsdatum','$ahvNr','$personalnr',2,1,1,1)";
    */

    $call_procedure = odbc_prepare($con, 'Call insert_data(?,?,?,?,?,?,?,?,?,?,?)');
    //for  MariaDb
    $result = odbc_execute($call_procedure, array($vorname, $nachname,$geburtsdatum,$ahvNr,$personalnr,$abteilung,$firma,$telefon,$email,$berufsbezeichnung,$berufsbeschreibung));

    if($result == true)
    {
        echo "successfully added";
    }
    else{
        echo "error";
    }
?>