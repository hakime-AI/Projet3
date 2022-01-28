<?php 
session_start();
$_SESSION['PageActuel']=htmlspecialchars($_SERVER['PHP_SELF']);

try{
    $codb = new PDO("mysql:host=localhost;dbname=gites", "root", "",[
    PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ,
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']);


}
catch(PDOException $e)
{
    echo "Message d'erreur : " .$e->getMessage(). "<br />"; 
}
?>