<table>

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
		 $id= $_REQUEST['searchTekst'];
		 $query=("SELECT VareNavn FROM Vare WHERE VareNavn LIKE'$id'");
		$sql= odbc_exec($conn, $query);
		 
		 echo odbc_result($sql,1);
		 
		
	
}

	



?>


</table>