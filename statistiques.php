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
$demandeschat=$req1->rowCount();

$req1=$bdd->prepare("SELECT * FROM demande where animal='chat'");
$req1->execute();
$demandeschat2=$req1->rowCount();

$req1=$bdd->prepare("SELECT * FROM demande2 where animal='chat'");
$req1->execute();
$demandeschat3=$req1->rowCount();




$req2=$bdd->prepare("SELECT * FROM chien where validationadmin= 0");
$req2->execute();
$demandeschien=$req2->rowCount();

$req2=$bdd->prepare("SELECT * FROM demande where animal='chien'");
$req2->execute();
$demandeschien2=$req2->rowCount();

$req2=$bdd->prepare("SELECT * FROM demande2 where animal='chien'");
$req2->execute();
$demandeschien3=$req2->rowCount();



$req3=$bdd->prepare("SELECT * FROM rongeur where validationadmin= 0");
$req3->execute();
$demandesrongeur=$req3->rowCount();

$req3=$bdd->prepare("SELECT * FROM demande where animal='rongeur'");
$req3->execute();
$demandesrongeur2=$req3->rowCount();

$req3=$bdd->prepare("SELECT * FROM demande2 where animal='rongeur'");
$req3->execute();
$demandesrongeur3=$req3->rowCount();


$req4=$bdd->prepare("SELECT * FROM reptile where validationadmin= 0");
$req4->execute();
$demandesreptile=$req4->rowCount();

$req4=$bdd->prepare("SELECT * FROM demande where animal='reptile'");
$req4->execute();
$demandesreptile2=$req4->rowCount();

$req4=$bdd->prepare("SELECT * FROM demande2 where animal='reptile'");
$req4->execute();
$demandesreptile3=$req4->rowCount();


$req5=$bdd->prepare("SELECT * FROM poisson where validationadmin= 0");
$req5->execute();
$demandespoisson=$req5->rowCount();

$req5=$bdd->prepare("SELECT * FROM demande where animal='poisson'");
$req5->execute();
$demandespoisson2=$req5->rowCount();

$req5=$bdd->prepare("SELECT * FROM demande2 where animal='poisson'");
$req5->execute();
$demandespoisson3=$req5->rowCount();

$req6=$bdd->prepare("SELECT * FROM oiseau where validationadmin= 0");
$req6->execute();
$demandesoiseau=$req6->rowCount();

$req6=$bdd->prepare("SELECT * FROM demande where animal='oiseau'");
$req6->execute();
$demandesoiseau2=$req6->rowCount();

$req6=$bdd->prepare("SELECT * FROM demande2 where animal='oiseau'");
$req6->execute();
$demandesoiseau3=$req6->rowCount();



?>        
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>page admin</title>
    <link rel="stylesheet"href="admin3.css">
</head>
<body>
<header> 
             <a href="page-admin2.php?admin=<?=$_SESSION['mdp']?>" class="logo"><span>A</span>doptMe</a> 
          
        </header>
<form method="post"> <input type="submit" class="dcntd" name="btn-deconnexion"value="deconnecter"/></form>
            
       
        <div class="container">

<h3 class="title">Les statistiques</h3>
<table>
    <h3>Demandes: mettre en adoption</h3>
    <br>
     <tr>
        <td> Chat 🐈 </td>
        <td>Chien 🐕 </td>
        <td>Rongeur 🐇</td>
        <td> Reptiles 🐍</td>
        <td>Poisson 🐠</td>
        <td>Oiseaux 🐤</td>
      
    </tr>
       <tr>
       <td> <?php echo $demandeschat?></td>
       <td><?php echo $demandeschien ?></td>
       <td><?php echo $demandesrongeur ?></td>
       <td><?php echo $demandesreptile ?></td>
       <td><?php echo $demandespoisson ?></td>
       <td><?php echo $demandesoiseau ?></td>

   </tr>
   
</table>
<br><br>
<table>
    <h3>Demandes d'adoption </h3>
    <br>
     <tr>
        <td> Chat 🐈 </td>
        <td>Chien 🐕 </td>
        <td>Rongeur 🐇</td>
        <td> Reptiles 🐍</td>
        <td>Poisson 🐠</td>
        <td>Oiseaux 🐤</td>
      
    </tr>
       <tr>
       <td> <?php echo $demandeschat2?></td>
       <td><?php echo $demandeschien2?></td>
       <td> <?php echo $demandesrongeur2?></td>
       <td> <?php echo $demandesreptile2?></td>
       <td> <?php echo $demandespoisson2?></td>
       <td> <?php echo $demandesoiseau2?></td>
      

   </tr>
   
</table>
<br><br>
<table>
    <h3>Demandes d'un animal spéciale </h3>
    <br>
     <tr>
        <td> Chat 🐈 </td>
        <td>Chien 🐕 </td>
        <td>Rongeur 🐇</td>
        <td> Reptiles 🐍</td>
        <td>Poisson 🐠</td>
        <td>Oiseaux 🐤</td>
      
    </tr>
       <tr>
       <td> <?php echo $demandeschat3?></td>
       <td><?php echo $demandeschien3?></td>
       <td> <?php echo $demandesrongeur3?></td>
       <td> <?php echo $demandesreptile3?></td>
       <td> <?php echo $demandespoisson3?></td>
       <td> <?php echo $demandesoiseau3?></td>

   </tr>
   
</table>
    </body>

    </html>