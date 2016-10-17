    <?php //Use the machine name and instance if multiple instances are used
    $server = '158.38.101.83';
    $user = 'Synnes';
    $pass = '4307';
    //Define Port
    $port='Port=1433';
    $database = 'Airwolf';

    $connection = "DRIVER={SQL Server};SERVER=$server;$port;DATABASE=$database";
    $conn = odbc_connect($connection,$user,$pass);
    if ($conn) {
        echo "Connection established.";
    } else{
        die("Connection could not be established.");
    }

 $sql = "SELECT KortBeskrivelse  FROM Vare" ;
$print =odbc_exec($conn,$sql);
?>