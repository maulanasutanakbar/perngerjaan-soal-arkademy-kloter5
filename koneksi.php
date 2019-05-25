<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'arkademy';
try{
$dbconfig = new PDO("mysql:host={$host};dbname={$dbname}",$user,$pass);
$dbconfig->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    echo $e->getMessage();
}
include_once 'class.biodata.php';
$biodata = new biodata($dbconfig);
?>