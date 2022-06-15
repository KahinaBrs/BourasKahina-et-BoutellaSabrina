<?php

$bdd=new PDO("mysql:host=localhost;dbname=bdd-site","root","");
if(isset($_GET["animal"])){

$animal=$_GET["animal"];
$img=$_GET["img"];

if($animal=="chat"){
    $idchat=$_GET["idchat"];
   $delete=$bdd->prepare("DELETE FROM chat  WHERE idchat =?");
$delete->execute(array($idchat));
     unlink($img);
    header("Location:page-admin7.php");
}

if($animal=="chien"){
    $idchien=$_GET["idchien"];
   $delete=$bdd->prepare("DELETE FROM chien  WHERE idchien =?");
$delete->execute(array($idchien));
     unlink($img);
    header("Location:page-admin7.php");
}

if($animal=="rongeur"){
    $idrongeur=$_GET["idrongeur"];
   $delete=$bdd->prepare("DELETE FROM rongeur  WHERE idrongeur =?");
$delete->execute(array($idrongeur));
     unlink($img);
    header("Location:page-admin7.php");
}

if($animal=="reptile"){
    $idreptile=$_GET["idreptile"];
   $delete=$bdd->prepare("DELETE FROM reptile  WHERE idreptile =?");
$delete->execute(array($idreptile));
     unlink($img);
    header("Location:page-admin7.php");
}

if($animal=="poisson"){
    $idpoisson=$_GET["idpoisson"];
   $delete=$bdd->prepare("DELETE FROM poisson  WHERE idpoisson =?");
$delete->execute(array($idpoisson));
     unlink($img);
    header("Location:page-admin7.php");
}

if($animal=="oiseau"){
    $idoiseau=$_GET["idoiseau"];
   $delete=$bdd->prepare("DELETE FROM oiseau  WHERE idoiseau =?");
$delete->execute(array($idoiseau));
     unlink($img);
    header("Location:page-admin7.php");
}

 


}?>