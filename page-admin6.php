<?php
session_start();
$bdd=new PDO("mysql:host=localhost;dbname=bdd-site","root","");

if(isset($_POST["btn-deconnexion"])){
        
    session_start();
    $_SESSION=array();
    session_destroy();
    header("Location:page-admin.php");
    
        }

$nbr=$_GET['nbr'];
$adoptant=htmlspecialchars($_GET['nom']);
$animal=$_GET['animal'];
$idanimal=$_GET['idanimal'];
$idmaitre=$_GET['idmaitre'];
$numero=$_GET['numero'];
$img=htmlspecialchars($_GET['img']);  

$req2=$bdd->prepare("SELECT * FROM membre Where id=? ");
    $req2->execute(array($idmaitre));
   $maitre=$req2->fetch();
   $numeromaitre=$maitre['numero'];


if($animal=="chat"){
    $req=$bdd->prepare("SELECT * FROM chat Where idchat=? ");
    $req->execute(array($idanimal));
   $chat=$req->fetch();
   $nomanimal=$chat['nom'];
}

if($animal=="chien"){
    $req=$bdd->prepare("SELECT * FROM chien Where idchien=? ");
    $req->execute(array($idanimal));
   $chien=$req->fetch();
   $nomanimal=$chien['nom'];
}

if($animal=="rongeur"){
    $req=$bdd->prepare("SELECT * FROM rongeur Where idrongeur=? ");
    $req->execute(array($idanimal));
   $rongeur=$req->fetch();
   $nomanimal=$rongeur['nom'];
}
if($animal=="reptile"){
    $req=$bdd->prepare("SELECT * FROM reptile Where idreptile=? ");
    $req->execute(array($idanimal));
   $reptile=$req->fetch();
   $nomanimal=$reptile['nom'];
}
if($animal=="poisson"){
    $req=$bdd->prepare("SELECT * FROM poisson Where idpoisson=? ");
    $req->execute(array($idanimal));
   $poisson=$req->fetch();
   $nomanimal=$poisson['nom'];
}
if($animal=="oiseau"){
    $req=$bdd->prepare("SELECT * FROM oiseau Where idoiseau=? ");
    $req->execute(array($idanimal));
   $oiseau=$req->fetch();
   $nomanimal=$oiseau['nom'];
}


        if(isset($_POST["delete"])){
    $delete=$bdd->prepare("DELETE FROM demande  WHERE nbr=?");
   $delete->execute(array($nbr));
   header("Location:page-admin5.php");
 }
 
 if(isset($_POST["confirm"])){
     
if($animal=="chat"){
    $req=$bdd->prepare("DELETE FROM chat Where idchat=? ");
    $req->execute(array($idanimal));}

if($animal=="chien"){
     $req=$bdd->prepare("DELETE FROM chien Where idchien=? ");
     $req->execute(array($idanimal));}

if($animal=="rongeur"){
    $req=$bdd->prepare("DELETE FROM rongeur Where idrongeur=? ");
    $req->execute(array($idanimal));}

if($animal=="reptile"){
    $req=$bdd->prepare("DELETE FROM reptile Where idreptile=? ");
    $req->execute(array($idanimal));}

 if($animal=="poisson"){
     $req=$bdd->prepare("DELETE FROM poisson Where idpoisson=? ");
     $req->execute(array($idanimal));}

 if($animal=="oiseau"){
     $req=$bdd->prepare("DELETE FROM oiseau Where idoiseau=? ");
     $req->execute(array($idanimal));}

    $delete=$bdd->prepare("DELETE FROM demande  WHERE nbr=?");
   $delete->execute(array($nbr));
      unlink($img);

   header("Location:page-admin5.php");
 }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>page admin</title>
    <link rel="stylesheet"href="admin6.css">
</head>
<body>
<header> 
             <a href="page-admin5.php" class="logo"><span>A</span>doptMe</a> 
          
        </header>
<form method="post"> <input type="submit" class="dcntd" name="btn-deconnexion"value="deconnecter"/></form>
            
       
        <div class="container">

<h3 class="title">les demandes </h3>
<div class="card">
	<img src="<?=$img?>"/>
<h3><?php echo $adoptant; echo' veut adopter :'." $nomanimal" ?></h3><br>
   <h3><?php echo 'numéro de l\'adoptant : '.$numero ?></h3><br>
   <h3><?php echo 'numéro de son maitre  : '. $numeromaitre ?></h3>

   <form method="post"><input type="submit" class="btn" value="Adoption éffectuée" name="confirm"> <input type="submit" class="btn" value="Supprimer la demande" name="delete"> </form>
</div>

</div>
</body>
</html>