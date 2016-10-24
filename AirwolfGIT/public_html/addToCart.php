<?php

$my_url = "http://localhost:5000/AirwolfGIT/Airwolf/AirwolfGIT/public_html/index.php";
  $server = '158.38.101.83';
    $user = 'Synnes';
    $pass = '4307';
    //Define Port
    $port='Port=1433';
    $database = 'Airwolf';

    $connection_string = "DRIVER={SQL Server};SERVER=$server;$port;DATABASE=$database";
    $conn = odbc_connect($connection_string,$user,$pass);
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		 $id= $_REQUEST['KNr'];
		  $ordreNr= odbc_result($sql,1);
		 
		 $query=("SELECT max(OrdreNr)+1 FROM Ordre");
		 $sql= odbc_exec($conn, $query);
		 
		 
		 $newOrdre=("INSERT INTO Ordre(OrdreNr, BrukerNr, OrdreDato, SendtDato)
		 VALUES ('$ordreNr, '$id', DATE(), null )");
		 $sqlOrdre= odbc_exec($conn, $newOrdre);
	}
		
		 
		
	
	
	?>
	<?php //Add item to cart
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$Vnr= $_REQUEST['VNr'];
			$antall=$_REQUEST['antall'];
			$pris=$_REQUEST['Pris'];
			$newOrdreLinje=("INSERT INTO OrdreLinje(OrdreNr, VareNr, PrisprEnhet, Antall)
			VALUES('$ordreNr', ' $Vnr', '$antall', )"
			$sqlLinje= odbc_exec($conn, $newOrdreLinje);
		}
	
	?>
	
	<?php //Remove item from cart
	
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		 $vId= $_REQUEST['vareID'];
		  $ordreNr= odbc_result($sql,1);
		$removeItem=("DELETE FROM OrdreLinje
		WHERE VNr='$vID' AND OrdreNr='$OrdreId'")
		odbc_exec($conn, $removeItem);
	
	?>