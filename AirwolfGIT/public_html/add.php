
	<?php //Add item to cart
        session_start();
    $server = '158.38.101.83';
    $user = 'Synnes';
    $pass = '4307';
    //Define Port
    $port='Port=1433';
    $database = 'Airwolf';

    $connection_string = "DRIVER={SQL Server};SERVER=$server;$port;DATABASE=$database";
    $conn = odbc_connect($connection_string,$user,$pass);
    
    
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$Vnr= $_REQUEST['VNr'];
			$antall=$_REQUEST['antall'];
			$pris=$_REQUEST['pris'];
                        $OrdreNr=($_SESSION['sesOrdre']);
                        $b = ((int)$OrdreNr);
                        $vare1=$_REQUEST['vare'];
                        $vare=(int)$vare1;
                        $d=(int)$pris;
                        $b = ("SELECT max(OrdreNr)+1 FROM Ordre");
                        $sqlO= odbc_exec($conn, $b);
                        $p= odbc_result($sqlO,1);


			$newOrdreLinje=("INSERT INTO Ordrelinje(OrdreNr, VNr, PrisprEnhet, Antall)
			VALUES('$OrdreNr','$vare','$d','$antall')");
			odbc_exec($conn, $newOrdreLinje);
                        header("Location: /Airwolf/AirwolfGIT/public_html/handlekurv.php");
                        
                         
		}
	
	?>  