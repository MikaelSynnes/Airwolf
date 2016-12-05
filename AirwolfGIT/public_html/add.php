
	<?php //Add item to cart
        session_start();
    $server = '158.38.101.242';
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
                    
                        $vare=(int)$Vnr;
                        $d=(int)$pris;
                     


			$newOrdreLinje=("INSERT INTO Ordrelinje(OrdreNr, VNr, PrisprEnhet, Antall)
			VALUES('$OrdreNr','$vare','$d','$antall')");
                        
                        if($newOrdreLinje!=null){
                            
                        }
                        }
			odbc_exec($conn, $newOrdreLinje);
                        header("Location: /Airwolf/AirwolfGIT/public_html/handlekurv.php");
                        
                         
		
	
	?>  