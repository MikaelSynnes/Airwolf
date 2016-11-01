<?php
session_start();
//Use the machine name and instance if multiple instances are used
$server = '158.38.101.83';
$user = 'Synnes';
$pass = '4307';
//Define Port
$port = 'Port=1433';
$database = 'Airwolf';

$connection_string = "DRIVER={SQL Server};SERVER=$server;$port;DATABASE=$database";
$conn = odbc_connect($connection_string, $user, $pass);
if ($conn) {
    echo "Connection established.";
} else {
    die("Connection could not be established.");
}


$sql = "SELECT KortBeskrivelse  FROM Vare";
$print = odbc_exec($conn, $sql);

$product_array = "SELECT *  FROM Vare";
$result = odbc_exec($conn, $product_array);


$rows = array();


while ($myRow = odbc_fetch_array($result)) {
    $rows[] = $myRow;
}




if (isset($_SESSION['username'])) {
    echo "You are logged in as : {$_SESSION['username']}<p><a href='logout.php'>Logout</a></p>";
}
echo "Ditt Ordrenr er : {$_SESSION['sesOrdre']}";
?>
<!DOCTYPE html>
<html>
    <script src="js/jquery.min.js"></script>

</script>

<title>Group project datamodellering</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="Css.CSS">
<header>
    <a href="index.php">
        <div id="header"> Airwolf </div>   
    </a>
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
            <a href="handlekurv.html"><div class="col-3">Handlekurv</div></a>
    </div>

    <aside>
        <ul>
            <li><a href="index.html">Laptop</a>
            <li><a href="KatNr2">Stasjonær</a>
            <li><a href="KatNr3">Utstyr</a>
        </ul>
    </aside>
    <div id="product">
        <a href="VNr1.php"><article>
                <img src="Images/<?php echo$rows[0]['Img']; ?>" width="175" height="200" alt="Laptop"/>
                <div id="Tekst"> 
                    <h3>	<?php echo $rows[0]['VareNavn']; ?> </h3>
                    <?php echo $rows[0]['KortBeskrivelse']; ?> </div>

                </div>
            </article></a>
        <div id="product">
            <a href="VNr2.php"><article>
                    <img src="Images/<?php echo$rows[1]['Img']; ?>" width="175" height="200" alt="Laptop"/>
                    <div id="Tekst"> 
                        <h3>	<?php echo $rows[1]['VareNavn']; ?> </h3>
                        <?php echo $rows[1]['KortBeskrivelse']; ?> </div>

                    </div>
                </article></a>
            <div id="product">
                <a href="VNr3.php"><article>
                        <img src="Images/<?php echo$rows[2]['Img']; ?>" width="175" height="200" alt="Laptop"/>
                        <div id="Tekst"> 
                            <h3>	<?php echo $rows[2]['VareNavn']; ?> </h3>
                            <?php echo $rows[2]['KortBeskrivelse']; ?> </div>

                        </div>
                    </article></a>
                <div id="product">
                    <a href="VNr4.php"><article>
                            <img src="Images/<?php echo$rows[3]['Img']; ?>" width="175" height="200" alt="Laptop"/>
                            <div id="Tekst"> 
                                <h3>	<?php echo $rows[3]['VareNavn']; ?> </h3>
                                <?php echo $rows[3]['KortBeskrivelse']; ?> </div>

                            </div>
                        </article></a>
                    <div id="product">
                        <a href="VNr5.php"><article>
                                <img src="Images/<?php echo$rows[4]['Img']; ?>" width="175" height="200" alt="Laptop"/>
                                <div id="Tekst"> 
                                    <h3>	<?php echo $rows[4]['VareNavn']; ?> </h3>
                                    <?php echo $rows[4]['KortBeskrivelse']; ?> </div>

                                </div>
                            </article></a>




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

