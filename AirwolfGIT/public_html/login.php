<?php
$my_url = "http://localhost:5000/AirwolfGIT/Airwolf/AirwolfGIT/public_html/index.php";
  $server = '158.38.101.242';
    $user = 'Synnes';
    $pass = '4307';
    //Define Port
    $port='Port=1433';
    $database = 'Airwolf';

    $connection_string = "DRIVER={SQL Server};SERVER=$server;$port;DATABASE=$database";
    $conn = odbc_connect($connection_string,$user,$pass);
	
        $username=$_POST['Email']; 
        $password=$_POST['passord']; 

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
	}
             

		 $username= $_REQUEST['Email'];
		 $password= $_REQUEST['passord'];
		 $query1=("SELECT * FROM kunde WHERE Email='$username'AND passord='$password'");
		$sql= odbc_exec($conn, $query1);
		 
		 if(odbc_result($sql,1)){
			 echo 'You are logged in!';
                        session_start();    
                        $_SESSION['loggedIn'] = true;
                        $_SESSION['username'] = $username;
                 $id= ("SELECT BrukerNr FROM Kunde WHERE Email='$username' AND passord='$password'");


                 $getNr=odbc_exec($conn,$id);
                 $BNr=odbc_result($getNr,1);

                 
		
		 $query=("SELECT max(OrdreNr)+1 FROM Ordre");
		 $sqlO= odbc_exec($conn, $query);
                 $ordreNr= odbc_result($sqlO,1);
                 $_SESSION["sesOrdre"] = $ordreNr;
		 
		 
		 $newOrdre=("INSERT INTO Ordre(OrdreNr, BrukerNr, OrdreDato, SendtDato)
		 VALUES ('$ordreNr', '$BNr', getDATE(), null )");
		odbc_exec($conn, $newOrdre);


                      header("Location: /Airwolf/AirwolfGIT/public_html/");
                      exit;   
                      
		 }
		 else{
			 echo "user not found";
		 }
			 