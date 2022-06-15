<?php

$bdd=new PDO("mysql:host=localhost;dbname=bdd-site","root","");
if(isset($_GET["animal"])){

$animal=$_GET["animal"];
$race=$_GET["race"];
$age=$_GET["age"];
$idmembre=$_GET["id"];
$nom=$_GET["nom"];
$img=$_GET["img"];


if($animal=="chat"){
    $idchat=$_GET["idchat"];
    $req=$bdd->prepare("UPDATE chat SET validationadmin= 1 Where idchat=? ");
    $req->execute(array($idchat));

$req2=$bdd->prepare("SELECT * FROM demande2 WHERE animal=? AND race like ? AND age like ?");
$req2->execute(array('chat',$race,$age));
$demande=$req2->fetch();
$nbrdemande=$req2->rowCount();
if($nbrdemande!= 0){

   $iddemande=$demande['iddemande'];

   $inserer2=$bdd->prepare("INSERT INTO alerte (id,nomanimal,animal,idmaitre,img) VALUES(?,?,?,?,?)");
   $inserer2->execute(array($iddemande,$nom,'chat',$idmembre,$img));}
      
   header("Location:page-admin7.php?admin=".$_SESSION['mdp']);
}


if($animal=="chien"){
    $idchien=$_GET["idchien"];
    $req=$bdd->prepare("UPDATE chien SET validationadmin= 1 Where idchien=? ");
    $req->execute(array($idchien));

$req2=$bdd->prepare("SELECT * FROM demande2 WHERE animal=? AND race like ? AND age like ?");
$req2->execute(array('chien',$race,$age));
$demande=$req2->fetch();
$nbrdemande=$req2->rowCount();
if($nbrdemande!= 0){

   $iddemande=$demande['iddemande'];

   $inserer2=$bdd->prepare("INSERT INTO alerte (id,nomanimal,animal,idmaitre,img) VALUES(?,?,?,?,?)");
   $inserer2->execute(array($iddemande,$nom,'chien',$idmembre,$img));}
      
   header("Location:page-admin7.php?admin=".$_SESSION['mdp']);
}

if($animal=="rongeur"){
    $idrongeur=$_GET["idrongeur"];
    $req=$bdd->prepare("UPDATE rongeur SET validationadmin= 1 Where idrongeur=? ");
    $req->execute(array($idrongeur));

$req2=$bdd->prepare("SELECT * FROM demande2 WHERE animal=? AND race like ? AND age like ?");
$req2->execute(array('rongeur',$race,$age));
$demande=$req2->fetch();
$nbrdemande=$req2->rowCount();
if($nbrdemande!= 0){

   $iddemande=$demande['iddemande'];

   $inserer2=$bdd->prepare("INSERT INTO alerte (id,nomanimal,animal,idmaitre,img) VALUES(?,?,?,?,?)");
   $inserer2->execute(array($iddemande,$nom,'rongeur',$idmembre,$img));}
      
   header("Location:page-admin7.php?admin=".$_SESSION['mdp']);
}

if($animal=="reptile"){
    $idreptile=$_GET["idreptile"];
    $req=$bdd->prepare("UPDATE reptile SET validationadmin= 1 Where idreptile=? ");
    $req->execute(array($idreptile));

$req2=$bdd->prepare("SELECT * FROM demande2 WHERE animal=? AND race like ? AND age like ?");
$req2->execute(array('reptile',$race,$age));
$demande=$req2->fetch();
$nbrdemande=$req2->rowCount();
if($nbrdemande!= 0){

   $iddemande=$demande['iddemande'];

   $inserer2=$bdd->prepare("INSERT INTO alerte (id,nomanimal,animal,idmaitre,img) VALUES(?,?,?,?,?)");
   $inserer2->execute(array($iddemande,$nom,'reptile',$idmembre,$img));}
      
   header("Location:page-admin7.php?admin=".$_SESSION['mdp']);
}

if($animal=="poisson"){
    $idpoisson=$_GET["idpoisson"];
    $req=$bdd->prepare("UPDATE poisson SET validationadmin= 1 Where idpoisson=? ");
    $req->execute(array($idpoisson));

$req2=$bdd->prepare("SELECT * FROM demande2 WHERE animal=? AND race like ? AND age like ?");
$req2->execute(array('poisson',$race,$age));
$demande=$req2->fetch();
$nbrdemande=$req2->rowCount();
if($nbrdemande!= 0){

   $iddemande=$demande['iddemande'];

   $inserer2=$bdd->prepare("INSERT INTO alerte (id,nomanimal,animal,idmaitre,img) VALUES(?,?,?,?,?)");
   $inserer2->execute(array($iddemande,$nom,'poisson',$idmembre,$img));}
      
   header("Location:page-admin7.php?admin=".$_SESSION['mdp']);
}

if($animal=="oiseau"){
    $idoiseau=$_GET["idoiseau"];
    $req=$bdd->prepare("UPDATE oiseau SET validationadmin= 1 Where idoiseau=? ");
    $req->execute(array($idoiseau));

$req2=$bdd->prepare("SELECT * FROM demande2 WHERE animal=? AND race like ? AND age like ?");
$req2->execute(array('oiseau',$race,$age));
$demande=$req2->fetch();
$nbrdemande=$req2->rowCount();
if($nbrdemande!= 0){

   $iddemande=$demande['iddemande'];

   $inserer2=$bdd->prepare("INSERT INTO alerte (id,nomanimal,animal,idmaitre,img) VALUES(?,?,?,?,?)");
   $inserer2->execute(array($iddemande,$nom,'oiseau',$idmembre,$img));}
      
   header("Location:page-admin7.php?admin=".$_SESSION['mdp']);
}


}?>