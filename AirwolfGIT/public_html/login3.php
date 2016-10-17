<?php
include('conn.php');
session_start(); 
if (!isset($_SESSION['username'])) {
        header('Location: login.php');
}
print_r($_SESSION);
?>