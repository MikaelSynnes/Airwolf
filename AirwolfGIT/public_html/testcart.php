<?php
  $server = '158.38.101.83';
    $user = 'Synnes';
    $pass = '4307';
    //Define Port
    $port='Port=1433';
    $database = 'Airwolf';

    $connection_string = "DRIVER={SQL Server};SERVER=$server;$port;DATABASE=$database";
    $conn = odbc_connect($connection_string,$user,$pass);



$ONr=29;


 $showcart=("SELECT VNr FROM Ordrelinje WHERE OrdreNr='$ONr'");
      $result =odbc_exec($conn,$showcart);


$rows = array();


while($myRow = odbc_fetch_array( $result )){
    $rows[] = $myRow;
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
?>