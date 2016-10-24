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
	
        $username=$_POST['Email']; 
        $password=$_POST['passord']; 

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
	}
		 $username= $_REQUEST['Email'];
		 $password= $_REQUEST['passord'];
		 $query=("SELECT * FROM kunde WHERE Email='$username'AND passord='$password'");
		$sql= odbc_exec($conn, $query);
		 
		 if(odbc_result($sql,1)){
			 echo 'You are logged in!';
                        session_start();    
                        $_SESSION['loggedIn'] = true;
                        $_SESSION['username'] = $username;
                        header("Location: /Airwolf/AirwolfGIT/public_html/");
                        
                         exit;
		 }
		 else{
			 echo "user not found";
		 }
			 
	
		 
		
	


	



?>
