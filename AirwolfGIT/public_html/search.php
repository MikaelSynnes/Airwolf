

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
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		 $id= $_REQUEST['searchTekst'];
		 $query=("SELECT * FROM Vare WHERE CONTAINS (Beskrivelse,'$id')");
		$sql= odbc_exec($conn, $query);
		
		$result=odbc_exec($conn, $query);
		$rows = array();


while($myRow = odbc_fetch_array( $result )){
    $rows[] = $myRow;
}
	}

	?>
	<html>
<script src="js/jquery.min.js"></script>

</script>

    <title>Group project datamodellering</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="Css.CSS">
    <header><div id="header"> Airwolf </div>   
        <div id="login"> 
           	<form action="loginkriss.php" method="POST">
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
					
					</div>
                </article></a>
            <a href="VNr2.html"><article>
                    +<body>
 <img src="images/<?php echo$rows[1]['Img'];?>"  width="175" height="200">
                    <div id="Tekst">
		
			<?php  echo $rows[1]['KortBeskrivelse'];  ?>

					</div>
						</article>		
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
	
