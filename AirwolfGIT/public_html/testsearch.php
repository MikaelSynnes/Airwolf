<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Search Engine Test</title>
</head>
<body>
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
$search2 = "SELECT Img FROM Vare";
// Display
$result2 = odbc_exec($conn, $search2);
$result = odbc_exec($conn,$search) or die('query did not work');

}

while($result_arr = odbc_fetch_array( $result ))
{ 
echo $result_arr['VareNavn']; 
echo "<img src='images/" . $result_arr[Img] . "' alt='laptop' width='105' height='150'>";
echo " ";
echo "<br>"; 
echo "<br>"; 
}
$anymatches=odbc_num_rows($result); 
if ($anymatches <1) 
{ 
   echo "Nothing was found that matched your query.<br><br>"; 
}

</script>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
<input type="text" name="keyword">
<input type="submit" name="search" value="Search">

 