<?php
    //MariaDb
    $con = odbc_connect('MariaDb','root','password!'); 

    //MySQL Server
    $con2 = odbc_connect('MySQL','root','','1');


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



    //for  MariaDb
    $call_procedure = odbc_prepare($con, 'Call insert_data(?,?,?,?,?,?,?,?,?,?,?)');
    //$result = odbc_execute($call_procedure, array($vorname, $nachname,$geburtsdatum,$ahvNr,$personalnr,$abteilung,$firma,$telefon,$email,$berufsbezeichnung,$berufsbeschreibung));


    //for  MySqL server
    $call_procedure2 = odbc_prepare($con2, "EXEC insert_data @ivorname = '" . $vorname ."', @inachname = '". $nachname ."', @igeburtsdatum = '2000-09-13', @iahv_nr = '". $ahvNr . "', @ipersonal_nr = '".$personalnr."', @iabteilungsname = '". $abteilung . "', @ifirmenname = '". $firma ."', @itelefonnummer = '".$telefon ."', @iemail = '".$email."', @iberufsbezeichnung = '". $berufsbezeichnung ."', @ibeschreibung = '". $berufsbeschreibung ."'");
    $result = odbc_execute($call_procedure2);


    if($result == true)
    {
        echo "successfully added";
    }
    else{
        echo "error";
    }
?>