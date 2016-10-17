<?php
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


$rows = array();


while($myRow = odbc_fetch_array( $result )){
    $rows[] = $myRow;
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
           	<form action="link" method="POST">
            <input type= "submit" Value="login"/>
                </form>
            <form action="link" method="POST">
                <input type= "submit" value="Registrer deg"/>
            </form>
            
        </div>       
    </header>
    <body>
        <div class="row">
		<form action="search.php?searching=true" method="POST">
            <div class="col-1"><input type="text" name="searchTekst" value="" placeholder="Search.."/><input type="submit" value="Søk"/></div>
            <div class="col-2"></div>
            <a href="handlekurv"><div class="col-3">Handlekurv</div></a>
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
	
            <a href="VNr1.html"><article>
                   <img src="images/<?php echo$rows[0]['Img'];?>" width="175" height="200" " alt="Laptop"/>
                    <div id="Tekst"> 
				<?php  echo $rows[0]['KortBeskrivelse'];  ?>
					<form action="addToCart.php" method"POST">
						<input type="submit" value="legg til"/>
					</div>
                </article></a>
            <a href="VNr2.html"><article>
                    <<body>
 <img src="images/<?php echo$rows[1]['Img'];?>"  width="175" height="200">
                    <div id="Tekst">
					<div id="product">
<form id ="form3" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_cart" />
<input type="hidden" name="add" value="1" />
<input type="hidden" name="item_name" value="Window's Smart Watch" />
<input type="hidden" name="amount" value="60" />
<input type="hidden" name="currency_code" value="USD" />
<input type="hidden" name="lc" value="US" />
<input type="hidden" name="cancel_return" value="http://localhost/paypal-shopping-cart/index.php">
<input type="hidden" name="return" value="Success.php">
					
			<?php  echo $rows[1]['KortBeskrivelse'];  ?>
	<p>Quantity</p>
	<select name="quantity">
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>
	</select>
	</div>
		</div>
		
					
					
					</div>
						</article>
					<a href="VNr3.html"><article>

						  <img src="images/<?php echo$rows[1]['Img'];?>"  width="175" height="200">
						<div id="Tekst">
<?php  echo $rows[2]['KortBeskrivelse'];  ?>			
</div>

                </article></a><br>

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
                        <a href="" class="btn">About</a>
                        <a href="" class="btn">FAQ</a>
                    </div>
                </div>	
    </footer>


</html>


<?php
session_start();



 $connection_string = "DRIVER={SQL Server};SERVER=$server;$port;DATABASE=$database";
    $conn = odbc_connect($connection_string,$user,$pass);
// get passed parameters
$username=trim(stripslashes($_POST['username']));
$password=trim(stripslashes($_POST['password']));

$sql="SELECT * FROM Kunde WHERE brukernavn='$username' and passord='$password'";

// prepare and execute in 1 statement
$result=odbc_exec($conn,$stmt) 
or die ("result error ".odbc_error().'-'.odbc_errormsg());

// if no result: no rows read
if (!odbc_fetch_row($result))
die("Wrong Username or Password"); 

// else: all is okay
else { 
$_SESSION['username']=$username;
$_SESSION['password']=$password;
header("location:/index.php");
}
odbc_close($conn);
?>
