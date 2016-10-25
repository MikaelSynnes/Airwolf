<?php
     session_start();
    //Use the machine name and instance if multiple instances are used
    $server = '158.38.101.83';
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
 if(isset($_SESSION['username'])){
      echo "You are logged in as : {$_SESSION['username']}<p><a href='logout.php'>Logout</a></p>"; 
    }

$rows = array();


while($myRow = odbc_fetch_array( $result )){
    $rows[] = $myRow;
}
?>

<!DOCTYPE html>
<html>
<script src="js/jquery.min.js"></script>
<title>Group project datamodellering</title>
    <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="Css.CSS">
        <header>
            <div id="header">
                Airwolf
            </div>
            <div id="login">
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
            <form action="search.php?searching=true" method="POST">
                <div class="col-1">
                    <input type="text" name="searchTekst" value="" placeholder="Search.."/><input type="submit" value="Søk"/>
                </div>
            </form>
            <div class="col-2"></div>
                <a href="handlekurv"><div class="col-3">Handlekurv </div></a>
        </div>
        <aside>
            <ul>
                <li><a href="KatNr1"></a>
                <li><a href="KatNr2">Test</a>
                <li><a href="KatNr3">Test</a>
                <li><a href="KatNr4">Test</a>
            </ul>
        </aside>
        <div id="product">
            <a href="VNr1.html">
                <form action="add.php" method="POST">
                    <img src="images/<?php echo$rows[0]['Img'];?>" width="175" height="200" alt="Laptop"/>
                    <div id="Tekst">
                        <?php  echo $rows[0]['KortBeskrivelse'];  ?>
                    </div>
                </article>
            </a>
            <select name="VNr"><option value=<?php  echo$rows[0]['VNr'] ?>/>
                </select>
            
 

            <?php  echo $rows[1]['Beskrivelse'];  ?>
            <br>
            <select name="pris"> <option value= <?php echo $rows[0]['Pris'];
            ?>/></select>
            <p><?php echo $rows[0]['Pris']?>kr</p>

            <p>Quantity</p>
            <select name="antall">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
                <input type="submit" value="Kjøp" />
            </form>

        </div>
            <br>
        </body>
    <footer>
    <div class="push"></div>
        <div class="container">
            <div class="footerFloater">
                © 2016 - Airwolf SB
            </div>

            <div class="footerFloater">
                <a href="" class="btn"> Contact </a>
                <a href="" class="btn">About</a>
                <a href="" class="btn">FAQ</a>
            </div>
        </div>
    </footer>
</html>|