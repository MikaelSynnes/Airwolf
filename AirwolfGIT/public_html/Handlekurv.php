<?php
session_start();
if (isset($_SESSION['username'])) {
    echo "You are logged in as : {$_SESSION['username']}<p><a href='logout.php'>Logout</a></p>";
echo "Ditt Ordrenr er : {$_SESSION['sesOrdre']}";
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


$ONr = $_SESSION['sesOrdre'];
$showcart = ("SELECT VNr FROM Ordrelinje WHERE OrdreNr='$ONr'");
$result = odbc_exec($conn, $showcart);
$vare = array();
//echo "$vare";
$p=3;
//while ($vare = odbc_fetch_array($result)) {
   // $vareInt = (int) $vare;
   //$vare2= odbc_exec($conn, ("SELECT VNr FROM OrdreLinje WHERE OrdreNr='$ONr'"));
    //$vare3= odbc_result($vare2,1);
    $result2 = odbc_exec($conn, ("SELECT * FROM Vare WHERE VNr='$p'"));
   // $result2 = "SELECT * FROM Vare WHERE VNr='$p'";
    //$result3= odbc_exec($conn, ("SELECT VNr FROM OrdreLinje WHERE OrdreNr='$ONr'"));
    $result_arr = array();
    while ($result_arr = odbc_fetch_array($result2)) {
        ?> <article><?php
          //PUTT EN IF SETNING SOM SJEKKER OM DU HAR NOE I ORDRELINJEN HER ELSE "DU HAR INGENTING I HANDLEKURV"
           $vID=$result_arr['VNr'];
            $test = "SELECT * FROM OrdreLinje Where OrdreNr='$ONr'";
            $test1 = "SELECT VNr FROM OrdreLinje";
            


    $query = odbc_exec($conn, $test);
    $array = odbc_fetch_array($query);
    $verdi=stripslashes($array['OrdreNr']);

    $query1 = odbc_exec($conn, $test1);
    $array1= odbc_fetch_array($query1);
    $verdi1=stripslashes($array['VNr']);


             if($verdi == $ONr && $verdi1 == $vID){
            echo "<img src='images/" . $result_arr['Img'] . "' alt='laptop' width='100' height='150'>";
            echo "   ";
            echo $result_arr['VareNavn'];
            echo "   ";
            echo $result_arr['Pris'];
            }
            else echo "Ingenting i handlekurv";
            
                if($_SERVER["REQUEST_METHOD"] == "POST") {
                $removeItem=("DELETE FROM OrdreLinje WHERE OrdreNr='$ONr' AND VNr='$vID'");
		odbc_exec($conn, $removeItem);
	}
echo "<br>";
            
echo "<br>";
     



            ?>
            <form method="POST" action="">
                <input type="submit" value="Remove"></form></article>
        </article>
        <?php

        
        echo "<br>";
    }
//}
?>       
</body>
</html>

