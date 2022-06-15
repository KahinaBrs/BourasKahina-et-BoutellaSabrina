<?php
session_start();
$bdd=new PDO("mysql:host=localhost;dbname=bdd-site","root","");
$idmembre=intval($_GET['id']);


if(isset($_POST["cancel"])){
    header("Location:page-admin3.php");
}else
if(isset($_POST["confirm"])){
    $delete=$bdd->prepare("DELETE FROM  membre  WHERE id=?");
    $delete->execute(array($idmembre));
    $delete2=$bdd->prepare("DELETE FROM  chat  WHERE id=?");
    $delete2->execute(array($idmembre));
    $delete3=$bdd->prepare("DELETE FROM chien WHERE id=?");
    $delete3->execute(array($idmembre));
    $delete4=$bdd->prepare("DELETE FROM rongeur WHERE id=?");
    $delete4->execute(array($idmembre));
    $delete5=$bdd->prepare("DELETE FROM reptile WHERE id=?");
    $delete5->execute(array($idmembre));
    $delete6=$bdd->prepare("DELETE FROM poisson WHERE id=?");
    $delete6->execute(array($idmembre));
    $delete7=$bdd->prepare("DELETE FROM oiseau WHERE id=?");
    $delete7->execute(array($idmembre));

    $deleteAlert=$bdd->prepare("DELETE FROM alerte WHERE id=?");
    $deleteAlert->execute(array($idmembre));

    $deleteDemande=$bdd->prepare("DELETE FROM demande WHERE id=?");
    $deleteDemande->execute(array($idmembre));

    $deleteDemande2=$bdd->prepare("DELETE FROM demande2 WHERE id=?");
    $deleteDemande2->execute(array($idmembre));



    header("Location:page-admin3.php");
}


if(isset($_POST["btn-deconnexion"])){
        
    session_start();
    $_SESSION=array();
    session_destroy();
    header("Location:page-admin.php");
    
        }


    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"href="admin4.css">
    <title>page admin</title>
    
</head>
<body>
<header> 
             <a href="page-admin3.php" class="logo"><span>A</span>doptMe</a> 
          
        </header>
<form method="post"> <input class="dcntd" type="submit" name="btn-deconnexion"value="deconnecter"/></form>
            
       
        <div class="container">

<h3 class="title">les Membres </h3>

	<img src="icon-user.png"/>
    <h3>Supprimer le membre: id = <?php echo $idmembre ?></h3>
<br>
 <form method="post"><input type="submit" class="btn" value="Confirmer" name="confirm"> <input type="submit" class="btn" value="Annuler" name="cancel"> </form>


</div>
</body>
</html>