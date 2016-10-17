<?php 
require_once('conn.php'); 
session_start(); 
// Get the data collected from the user 
$username=$_POST['username'];
$password=$_POST['password'];
$username = stripslashes($username);
$password = stripslashes($password);
function isLoggedIn()
    {
        if($_SESSION['LoggedIn'])
        {
            return true;
        }
        else return false;
    }
$sql="SELECT * FROM Kunde WHERE brukernavn  ='$username' AND passord='$password'";
// prepare and execute in 1 statement
$result=odbc_exec($conn,$sql) 
or die ("result error ".odbc_error().'-'.odbc_errormsg());
// if no result: no rows read
if (!odbc_fetch_row($result))
die("Wrong Username or Password"); 
// else: all is okay
else { 
session_regenerate_id();
$_SESSION['LoggedIn'] = true;
$_SESSION['username']=$username;
header("location:login3.php");
}
function logout()
    {
        unset($_SESSION['LoggedIn']);
        unset($_SESSION['username']);
        session_destroy();
        header('location: login.php');
    }
odbc_close($connection);
?> 