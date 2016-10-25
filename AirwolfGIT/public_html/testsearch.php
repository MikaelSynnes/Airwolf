<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Airwolf - Søkeresultat</title>
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
		<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
            <div class="col-1"><input type="text" name="searchTekst" value="" placeholder="Search.."/><input type="submit" value="Søk"/></div>
            <div class="col-2"></div>
            <a href="handlekurv"><div class="col-3">Handlekurv</div></a>
        </div>


        <aside>
            <ul>
                <li><a href="KatNr1"></a>
                <li><a href="KatNr2">Laptop</a>
                <li><a href="KatNr3">Stasjonær</a>
               <li><a href="KatNr4">Utstyr</a>
            </ul>
        </aside>
        
<script language="php">

$my_url = "http://localhost:5000/AirwolfGIT/Airwolf/AirwolfGIT/public_html/index.php";
  $server = '158.38.101.83';
    $user = 'Synnes';
    $pass = '4307';
    //Define Port
    $port='Port=1433';
    $database = 'Airwolf';

session_start();
if(isset($_SESSION['username'])){
      echo "You are logged in as : {$_SESSION['username']}<p><a href='logout.php'>Logout</a></p>"; 
    }
   
    $connection_string = "DRIVER={SQL Server};SERVER=$server;$port;DATABASE=$database";
    $conn = odbc_connect($connection_string,$user,$pass);


// Search Engine
// Only execute when button is pressed
if (isset($_POST['keyword'])) {
// Filter
$keyword = trim ($_POST['keyword']);

// Select statement
$search = "SELECT * FROM Vare WHERE KortBeskrivelse LIKE '%$keyword%' OR VareNavn LIKE '%$keyword%'";

// Display

$result = odbc_exec($conn,$search) or die('query did not work');

}

while($result_arr = odbc_fetch_array( $result ))
{ 
echo $result_arr['VareNavn'];
echo "<br>";
echo "<img src='images/" . $result_arr['Img'] . "' alt='laptop' width='105' height='150'>";
echo " ";
echo "<br>"; 
echo "<br>"; 
}
$anymatches = odbc_num_rows($result); 
if ($anymatches < 0) 
{ 
   echo "Dette produktet ligger ikke inne.<br><br>"; 
}

</script>
</body>
</html>

