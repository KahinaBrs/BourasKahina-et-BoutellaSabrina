<?php
session_start();
$bdd=new PDO("mysql:host=localhost;dbname=bdd-site","root","");

if(isset($_POST["btn-deconnexion"])){
        
    session_start();
    $_SESSION=array();
    session_destroy();
    header("Location:page-admin.php");
    
        }
        $req=$bdd->prepare("SELECT * FROM demande ");
        $req->execute();
        $demandes=$req->fetchAll();
      
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>page admin</title>
    <link rel="stylesheet"href="admin5.css">
</head>
<body>
<header> 
             <a href="page-admin2.php?admin=<?=$_SESSION['mdp']?>" class="logo"><span>A</span>doptMe</a> 
          
        </header>
<form method="post"> <input type="submit" name="btn-deconnexion"value="deconnecter"/></form>
            
       
        <div class="container">

<h3 class="title">les demandes </h3>

	<img src="a1.png"/>

    <table>
     <tr>
        <td>numéro de la demande</td>
        <td>Nom</td>
        <td>Email</td> 
        <td>Numéro</td>
        <td>Message</td>
        <td>Animal</td>
        <td>Adoptant</td>
        <td></td>
    </tr>
    <?php  foreach( $demandes as $demande):
          ?>
        <tr>
       
       <td class="td1"><?php echo $demande['nbr']?></td>
       <td class="td2"><?php echo $demande['nom']?></td>
       <td class="td3"><?php echo $demande['email']?></td>
       <td class="td4"><?php echo $demande['numero']?></td>
       <td class="td6"><?php echo $demande['msg']?></td>
       <td class="td1"><?php echo $demande['animal'];?></td>
       <td class="td1"><?php echo $demande['adoptant'];?></td>
       <td class="btn"><a href="page-admin6.php?nom=<?=$demande['nom']?>&nbr=<?=$demande['nbr']?>&animal=<?=$demande['animal']?>&idanimal=<?=$demande['idanimal']?>&idmaitre=<?=$demande['idmaitre']?>&img=<?=$demande['animal']?>/<?=$demande['img']?>&numero=<?=$demande['numero']?>">Traiter demande <a></td>
       <?php endforeach ?>
   </tr>
   
</table>


</div>
</body>
</html>