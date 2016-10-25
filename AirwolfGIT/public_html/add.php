
	<?php //Add item to cart
        
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
			$newOrdreLinje=("INSERT INTO OrdreLinje(OrdreNr, VNr, PrisprEnhet, Antall)
			VALUES('1','$Vnr','$pris','$antall')");
			odbc_exec($conn, $newOrdreLinje);
		}
	
	?>  