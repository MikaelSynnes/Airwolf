<?php
    session_start();
    //Use the machine name and instance if multiple instances are used
    $server = '158.38.101.242';
    $user = 'Synnes';
    $pass = '4307';
    //Define Port
    $port='Port=1433';
    $database = 'Airwolf';

    $connection_string = "DRIVER={SQL Server};SERVER=$server;$port;DATABASE=$database";
    $conn = odbc_connect($connection_string,$user,$pass);
    if ($conn) {
        echo "Connection established.";
    } else{
        die("Connection could not be established.");
    }


 $sql = "SELECT KortBeskrivelse  FROM Vare" ;
$print =odbc_exec($conn,$sql);

$product_array = "SELECT *  FROM Vare" ;
$result =odbc_exec($conn,$product_array);


$rows = array();


while($myRow = odbc_fetch_array( $result )){
    $rows[] = $myRow;
}



 
   if(isset($_SESSION['username'])){
      echo "You are logged in as : {$_SESSION['username']}<p><a href='logout.php'>Logout</a></p>"; 
    }
 

?>
<!DOCTYPE html>
<html>
<script src="js/jquery.min.js"></script>

</script>

    <title>Group project datamodellering</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="Css.CSS">
    <header><div id="header"> Airwolf </div>   
        <div id="login"> 
            <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
           	<form action="login.html" method="POST">
            <input type= "submit" Value="login"/>
                </form>
            <form action="newuser.html" method="POST">
                <input type= "submit" value="Registrer deg"/>
            </form>
            
        </div>       
    </header>
    <body>
        <div class="row">

<form action="testsearch.php" method="POST">
            <div class="col-1"><input type="text" name="keyword" value="" placeholder="Search.."/><input type="submit" value="Søk"/></div>
            <div class="col-2"></div>
            <a href="handlekurv.php"><div class="col-3">Handlekurv</div></a>
        </div>
   
        <aside>
            <ul>
                <li><a href="index.php">Laptop</a>
                <li><a href="KatNr2">Stasjonær</a>
               <li><a href="KatNr3">Utstyr</a>
            </ul>
        </aside>
        <div id="product">
				
            if (in_array($, TRUE))
				
				
        </section>
    </body>
    <footer>
                <div class="push"></div>
                <div class="container">
                    <div class="footerFloater">
                        © 2016 - Airwolf SB
                    </div>

                    <div class="footerFloater">
                        <a href="" class="btn"> Contact </a>
                        <a href="" class="btn"> About </a>
                        <a href="" class="btn"> FAQ </a>
                    </div>
                </div>	
    </footer>


</html>

