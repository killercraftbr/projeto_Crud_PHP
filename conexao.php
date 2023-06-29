<?php
$host ="localhost";
$db = "projeto_crud";
$user= "root";
$pass ="";
$mysqli = new mysqli($host,$user,$pass,$db);
if($mysqli->connect_errno){
    die("vish maiquinho, o banco deu erro");}
    
?>