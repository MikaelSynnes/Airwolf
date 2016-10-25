?>
	<?php //Add item to cart
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$Vnr= $_REQUEST['VNr'];
			$antall=$_REQUEST['antall'];
			$pris=$_REQUEST['Pris'];
			$newOrdreLinje=("INSERT INTO OrdreLinje(OrdreNr, VareNr, PrisprEnhet, Antall)
			VALUES('$ordreNr', ' $Vnr', '$antall', )");
			$sqlLinje= odbc_exec($conn, $newOrdreLinje);
		}
	
	?>