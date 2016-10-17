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
	}
		 $id= 'bruke1r1';/*$_REQUEST['username'];*/
		 $pw= 'pass1'; /*$_REQUEST['passord'];*/
		 $query=("SELECT * FROM kunde WHERE brukernavn='$id'AND passord='$pw'");
		$sql= odbc_exec($conn, $query);
		 
		 if(odbc_result($sql,1) !=null){
			 
			 echo 'Welcome to my server';
		 }
		 else{
			 echo "user not found";
		 }
			 
	
		 
		
	


	



?>
