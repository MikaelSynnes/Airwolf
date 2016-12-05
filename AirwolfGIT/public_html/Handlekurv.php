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
    <header><div id="header"><a href="index.php"> Airwolf </a> </div> 
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
        <a href="handlekurv.php"><div class="col-3">Handlekurv</div></a>
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
$server = '158.38.101.242';
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
echo $ONr;
$remove=false;


while ($result_arr = odbc_fetch_array($result)) {
    ?> <article><?php
        //PUTT EN IF SETNING SOM SJEKKER OM DU HAR NOE I ORDRELINJEN HER ELSE "DU HAR INGENTING I HANDLEKURV"
        $vID = (int) $result_arr['VNr'];

        echo $vID;

        $test = "SELECT * FROM Vare Where VNr='$vID'";
        $resultVare = odbc_exec($conn, $test);


        while ($resultVare_arr = odbc_fetch_array($resultVare)) {







            //Sjekker om verdiene stemmer med brukeren, om de gjør det poster resultatet
            // til handlekurven, og om du trykker på remove-knappen vil den fjerne ordrelinjen
            if ($vID != null) {
                echo "<img src='images/" . $resultVare_arr['Img'] . "' alt='laptop' width='100' height='150'>";
                echo "   ";
                echo $resultVare_arr['VareNavn'];
                echo "   ";
                echo $resultVare_arr['Pris'];
            } else
                echo "Ingenting i handlekurv";

            
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                 $id = (int) $resultVare_arr['VNr'];
            }
            ?>
               <form method="POST" action="">
            <input type="submit" value="Remove"></form></article>
    </article>
            <?php
        }
}
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
           
            $removeItem = ("DELETE FROM OrdreLinje WHERE OrdreNr='$ONr' AND VNr='$id'");
            odbc_exec($conn, $removeItem);
            header("Location: /Airwolf/AirwolfGIT/public_html/handlekurv.php");
        }
        echo "<br>";

        echo "<br>";
        ?>
     
    <?php
    echo "<br>";

    
?>       


</body>
</html>

