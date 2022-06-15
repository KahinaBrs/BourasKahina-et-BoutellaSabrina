<?php
session_start();
$bdd=new PDO("mysql:host=localhost;dbname=bdd-site","root","");

if(isset($_POST["btn-deconnexion"])){
        
    session_start();
    $_SESSION=array();
    session_destroy();
    header("Location:page-admin.php");
    
        }
        $req=$bdd->prepare("SELECT * FROM membre ");
        $req->execute();
        $membres=$req->fetchAll();

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
<form method="post"> <input type="submit" name="btn-deconnexion"value="deconnecter"/></form>
            
       
        <div class="container">

<h3 class="title">les Membres </h3>

	<img src="icon-user.png"/>

    <table>
     <tr>
        <td> ID</td>
        <td>Nom</td>
        <td>Prénom</td>
        <td>Numéro</td>
        <td>Email</td>
        <td>Genre</td>
        <td>ÉDITER</td>
    </tr>
    <?php  foreach( $membres as $membre):?>
       
        <tr>
       <td><?php echo $membre['id']?></td>
       <td><?php echo $membre['nom']?></td>
       <td><?php echo $membre['prenom']?></td>
       <td><?php echo $membre['numero']?></td>
       <td><?php echo $membre['email']?></td>
       <td><?php echo $membre['genre']?></td>
       <td class="btn"><a href="page-admin4.php?id=<?=$membre['id']?>"> Supprimer Membre<a></td>
       <?php endforeach ?>
   </tr>
   
</table>


</div>
</body>
</html>