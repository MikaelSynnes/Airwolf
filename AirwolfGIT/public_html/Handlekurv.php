<?php
session_start();
if (isset($_SESSION['username'])) {
    echo "You are logged in as : {$_SESSION['username']}<p><a href='logout.php'>Logout</a></p>";
}

?>
<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Airwolf - Handlekurv</title>
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
    <div class="row">
        <div class="col-1"><input type="text" name="keyword" value="" placeholder="Search.."/><input type="submit" value="Søk"/></div>
        <div class="col-2"></div>
        <a href="handlekurv.html"><div class="col-3">Handlekurv</div></a>
    </div>
</div>
<aside>
    <ul>
        <li><a href="KatNr1"></a>
        <li><a href="KatNr2">Laptop</a>
        <li><a href="KatNr3">Stasjonær</a>
        <li><a href="KatNr4">Utstyr</a>
    </ul>
</aside>
<?php

$server = '158.38.101.83';
$user = 'Synnes';
$pass = '4307';
//Define Port
$port = 'Port=1433';
$database = 'Airwolf';
$connection_string = "DRIVER={SQL Server};SERVER=$server;$port;DATABASE=$database";
$conn = odbc_connect($connection_string, $user, $pass);


$ONr = isset($_SESSION['sesOrdre']);
$showcart = ("SELECT VNr FROM Ordrelinje WHERE OrdreNr='$ONr'");
$result = odbc_exec($conn, $showcart);
$vare = array();
while ($vare = odbc_fetch_array($result)) {
    $vareInt = (int) $vare;
    $result2 = odbc_exec($conn, ("SELECT * FROM Vare WHERE VNr='$vareInt'"));
    $result_arr = array();
    while ($result_arr = odbc_fetch_array($result2)) {
        ?> <article><?php
            echo "<img src='images/" . $result_arr['Img'] . "' alt='laptop' width='30' height='40'>";
            echo "   ";
            echo $result_arr['VareNavn'];
            echo "   ";
            echo $result_arr['Pris'];

             $vID=$result_arr['VNr'];
echo "<br>";
             echo $ONr;
echo "<br>";
             echo $vID;

if($_SERVER["REQUEST_METHOD"] == "POST") {
		
		$removeItem=("DELETE FROM OrdreLinje WHERE OrdreNr='$ONr' AND VNr='$vID'");
		odbc_exec($conn, $removeItem);
	}


            ?>
            <form method="POST" action="">
                <input type="submit" value="Remove"></form></article>
        </article>
        <?php

        
        echo "<br>";
    }
}
?>       
</body>
</html>

