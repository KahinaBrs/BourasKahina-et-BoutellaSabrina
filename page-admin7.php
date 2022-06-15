<?php
session_start();
$bdd=new PDO("mysql:host=localhost;dbname=bdd-site","root","");

if(isset($_POST["btn-deconnexion"])){
        
    session_start();
    $_SESSION=array();
    session_destroy();
    header("Location:page-admin.php");
    
        }

$req1=$bdd->prepare("SELECT * FROM chat where validationadmin= 0");
$req1->execute();
$demandeschat=$req1->fetchAll();

$req2=$bdd->prepare("SELECT * FROM chien where validationadmin= 0");
$req2->execute();
$demandeschien=$req2->fetchAll();

$req3=$bdd->prepare("SELECT * FROM rongeur where validationadmin= 0");
$req3->execute();
$demandesrongeur=$req3->fetchAll();

$req4=$bdd->prepare("SELECT * FROM reptile where validationadmin= 0");
$req4->execute();
$demandesreptile=$req4->fetchAll();

$req5=$bdd->prepare("SELECT * FROM poisson where validationadmin= 0");
$req5->execute();
$demandespoisson=$req5->fetchAll();

$req6=$bdd->prepare("SELECT * FROM oiseau where validationadmin= 0");
$req6->execute();
$demandesoiseau=$req6->fetchAll();


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
             <a href="page-admin2.php?admin=<?=$_SESSION['mdp']?>" class="logo"><span>A</span>doptMe</a> 
          
        </header>
<form method="post"> <input type="submit" class="dcntd" name="btn-deconnexion"value="deconnecter"/></form>
            
       
        <div class="container">

<h3 class="title">les demandes </h3>
<?php foreach($demandeschat as $demande):
    $img="chat/".htmlspecialchars($demande['img']);?> 
<div class="card">
    
	<img src="<?=$img?>"/>

   <h3><?php echo $demande['race']?></h3><br>
   <h3><?php echo $demande['age'] ?></h3>
   <br>
<p><?php echo $demande['apropos'] ?><p>

<a href="valider.php?id=<?=$demande['id']?>&animal=chat&idchat=<?=$demande['idchat']?>&race=<?=$demande['race']?>&age=<?=$demande['age']?>&nom=<?=$demande['nom']?>&img=<?=$demande['img']?>"><input type="submit" class="btn" value="valider"action="page-admin7.php" ></a>
<a href="supprimer.php?animal=chat&idchat=<?=$demande['idchat']?>&img=chat/<?=$demande['img']?>"><input type="submit" class="btn" value="Supprimer la demande"></a> 
</div><br>
<?php endforeach ?>

<?php foreach($demandeschien as $demande2):
    $img="chien/".htmlspecialchars($demande2['img']);?> 
<div class="card">
    
	<img src="<?=$img?>"/>

   <h3><?php echo $demande2['race']?></h3><br>
   <h3><?php echo $demande2['age'] ?></h3>
   <br>
<p><?php echo $demande2['apropos'] ?><p>

<a href="valider.php?id=<?=$demande2['id']?>&animal=chien&idchien=<?=$demande2['idchien']?>&race=<?=$demande2['race']?>&age=<?=$demande2['age']?>&nom=<?=$demande2['nom']?>&img=<?=$demande2['img']?>"><input type="submit" class="btn" value="valider"action="page-admin7.php" ></a>
<a href="supprimer.php?animal=chien&idchien=<?=$demande2['idchien']?>&img=chien/<?=$demande2['img']?>"><input type="submit" class="btn" value="Supprimer la demande"></a> 
</div><br>
<?php endforeach ?>

<?php foreach($demandesrongeur as $demande3):
    $img="rongeur/".htmlspecialchars($demande3['img']);?> 
<div class="card">
    
	<img src="<?=$img?>"/>

   <h3><?php echo $demande3['race']?></h3><br>
   <h3><?php echo $demande3['age'] ?></h3>
   <br>
<p><?php echo $demande3['apropos'] ?><p>

<a href="valider.php?id=<?=$demande3['id']?>&animal=rongeur&idrongeur=<?=$demande3['idrongeur']?>&race=<?=$demande3['race']?>&age=<?=$demande3['age']?>&nom=<?=$demande3['nom']?>&img=<?=$demande3['img']?>"><input type="submit" class="btn" value="valider"action="page-admin7.php" ></a>
<a href="supprimer.php?animal=rongeur&idrongeur=<?=$demande3['idrongeur']?>&img=rongeur/<?=$demande3['img']?>"><input type="submit" class="btn" value="Supprimer la demande"></a> 
</div><br>
<?php endforeach ?>

<?php foreach($demandesreptile as $demande4):
    $img="reptile/".htmlspecialchars($demande4['img']);?> 
<div class="card">
    
	<img src="<?=$img?>"/>

   <h3><?php echo $demande4['race']?></h3><br>
   <h3><?php echo $demande4['age'] ?></h3>
   <br>
<p><?php echo $demande4['apropos'] ?><p>

<a href="valider.php?id=<?=$demande4['id']?>&animal=reptile&idreptile=<?=$demande4['idreptile']?>&race=<?=$demande4['race']?>&age=<?=$demande4['age']?>&nom=<?=$demande4['nom']?>&img=<?=$demande4['img']?>"><input type="submit" class="btn" value="valider"action="page-admin7.php" ></a>
<a href="supprimer.php?animal=reptile&idreptile=<?=$demande4['idreptile']?>&img=reptile/<?=$demande4['img']?>"><input type="submit" class="btn" value="Supprimer la demande"></a> 
</div><br>
<?php endforeach ?>

<?php foreach($demandespoisson as $demande5):
    $img="poisson/".htmlspecialchars($demande5['img']);?> 
<div class="card">
    
	<img src="<?=$img?>"/>

   <h3><?php echo $demande5['race']?></h3><br>
   <h3><?php echo $demande5['age'] ?></h3>
   <br>
<p><?php echo $demande5['apropos'] ?><p>

<a href="valider.php?id=<?=$demande5['id']?>&animal=poisson&idpoisson=<?=$demande5['idpoisson']?>&race=<?=$demande5['race']?>&age=<?=$demande5['age']?>&nom=<?=$demande5['nom']?>&img=<?=$demande5['img']?>"><input type="submit" class="btn" value="valider"action="page-admin7.php" ></a>
<a href="supprimer.php?animal=poisson&idpoisson=<?=$demande5['idpoisson']?>&img=poisson/<?=$demande5['img']?>"><input type="submit" class="btn" value="Supprimer la demande"></a> 
</div><br>
<?php endforeach ?>

<?php foreach($demandesoiseau as $demande6):
    $img="poisson/".htmlspecialchars($demande6['img']);?> 
<div class="card">
    
	<img src="<?=$img?>"/>

   <h3><?php echo $demande6['race']?></h3><br>
   <h3><?php echo $demande6['age'] ?></h3>
   <br>
<p><?php echo $demande6['apropos'] ?><p>

<a href="valider.php?id=<?=$demande6['id']?>&animal=oiseau&idoiseau=<?=$demande6['idoiseau']?>&race=<?=$demande6['race']?>&age=<?=$demande6['age']?>&nom=<?=$demande6['nom']?>&img=<?=$demande6['img']?>"><input type="submit" class="btn" value="valider"action="page-admin7.php" ></a>
<a href="supprimer.php?animal=oiseau&idoiseau=<?=$demande6['idoiseau']?>&img=oiseau/<?=$demande6['img']?>"><input type="submit" class="btn" value="Supprimer la demande"></a> 
</div><br>
<?php endforeach ?>
</div>

</body>
</html>
