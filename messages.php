<?php
session_start();
$bdd=new PDO("mysql:host=localhost;dbname=bdd-site","root","");
if(isset($_GET['id'])){
	$idmembre=intval($_GET['id']);
	$reqmembre=$bdd->prepare("SELECT * FROM membre WHERE id= ?");
	$reqmembre->execute(array($idmembre));
	$membre=$reqmembre->fetch();
 if($membre['id']==$_SESSION['id']){ 

    $nom=$membre['nom'];
    $email=$membre['email'];
    $téléphone=$membre['numero'];
    $msg="demande d'adoption d'un membre";
    $adoptant="Oui";

    if(isset($_POST["btn-deconnexion"])){
        
        session_start();
        $_SESSION=array();
        session_destroy();
        header("Location:connexion.php");       }

            $req=$bdd->prepare("SELECT * FROM alerte WHERE id =$idmembre");
            $req->execute();
            $alertes=$req->fetchAll();
            $alertepourmoi=$req->rowCount();
            if($alertepourmoi==0){
             $message="vous n'avez pas reçu de message ";}
             else{  $message2="vous avez reçu  une réponse à votre demande ";   
                foreach(  $alertes as $alerte):
                  
            $animal=$alerte['animal'];
            $nomanimal=$alerte['nomanimal'];
            $idmaitre=$alerte['idmaitre'];
            $img=$alerte['img'];
                endforeach;
            if( $alerte['animal']==="chat"){
                    
            $reqselect=$bdd->prepare("SELECT * FROM chat where nom = ? and id = ? and img=?");
            $reqselect->execute(array($nomanimal,$idmaitre,$img));
            $chat=$reqselect->fetch();
            $idanimal=htmlspecialchars(intval($chat['idchat'])) ;
            }
            if( $alerte['animal']==="chien"){
                    
                $reqselect=$bdd->prepare("SELECT * FROM chien where nom = ? and id = ? and img=?");
                $reqselect->execute(array($nomanimal,$idmaitre,$img));
                $chien=$reqselect->fetch();
                $idanimal=htmlspecialchars(intval($chien['idchien'])) ;
                }
            if( $alerte['animal']==="rongeur"){
                    
                    $reqselect=$bdd->prepare("SELECT * FROM rongeur where nom = ? and id = ? and img=?");
                    $reqselect->execute(array($nomanimal,$idmaitre,$img));
                    $rongeur=$reqselect->fetch();
                    $idanimal=htmlspecialchars(intval($rongeur['idrongeur'])) ;
               }

            if( $alerte['animal']==="reptile"){
                    
                    $reqselect=$bdd->prepare("SELECT * FROM reptile where nom = ? and id = ? and img=?");
                    $reqselect->execute(array($nomanimal,$idmaitre,$img));
                    $reptile=$reqselect->fetch();
                    $idanimal=htmlspecialchars(intval($reptile['idreptile'])) ;
                    }
             if( $alerte['animal']==="poisson"){
                    
                        $reqselect=$bdd->prepare("SELECT * FROM poisson where nom = ? and id = ? and img=?");
                        $reqselect->execute(array($nomanimal,$idmaitre,$img));
                        $poisson=$reqselect->fetch();
                        $idanimal=htmlspecialchars(intval($poisson['idpoisson'])) ;
                        }
             if( $alerte['animal']==="oiseau"){
                    
                            $reqselect=$bdd->prepare("SELECT * FROM oiseau where nom = ? and id = ? and img=?");
                            $reqselect->execute(array($nomanimal,$idmaitre,$img));
                            $oiseau=$reqselect->fetch();
                            $idanimal=htmlspecialchars(intval($oiseau['idoiseau'])) ;
                            }          

            if(isset($_POST['confirm'])){

            $envoyer=$bdd->prepare("INSERT INTO demande(nom,email,numero,animal,idanimal,idmaitre,msg,adoptant,img) VALUES(?,?,?,?,?,?,?,?,?)");
            $envoyer->execute(array($nom,$email,$téléphone,$animal,$idanimal, $idmaitre,$msg,$adoptant,$img));

            $delete=$bdd->prepare("DELETE FROM demande2 WHERE iddemande=? And animal=?");
            $delete->execute(array($idmembre,$animal));
       

            $delete2=$bdd->prepare("DELETE FROM alerte WHERE id=? ");
            $delete2->execute(array($idmembre));
            header("Location:messages.php?id=".$idmembre);

            }

    
             }
    



             if(isset($_POST["delete"])){
                $delete=$bdd->prepare("DELETE FROM alerte WHERE id=? ");
               $delete->execute(array($idmembre));
               header("Location:messages.php?id=".$idmembre);
             }
             
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/css/swiper.css">
    <link rel="stylesheet" href="messages.css">  
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"rel="stylesheet">
    <title>Profil</title>

</head>
<body>
    <div class="profil">

   <img class="img1" src="<?php if($membre['genre']=='Homme'){echo"homme.png" ;}else echo"femme.png" ?>" >  
<a href="profil.php?id=<?php echo $idmembre ?>"><?php   echo $membre['nom'] ?> <?php   echo $membre['prenom'] ?><a>
     <img class="img2"src="messages.png"><a href=""> messages</a>
 <form method="post"> <input name="btn-deconnexion"  type="submit"value="déconnecter" ></form>
    </div>
    <h3 class="titre-adopt">➣ Mes messages et notifications : </h3>
  <h3 class="titre-adopt2"> <?php if(isset($message2)){echo $message2 ;}?> </h3>
    
  <div class="container">
 
  <h3 class="titre-adopt"> <?php if(isset($message)){echo $message ;}?> </h3>

    <?php 
     foreach(  $alertes as $alerte):
        $img= $alerte['animal'].'/'.htmlspecialchars($alerte['img']);
     ?>

     <div class="card">
     <br>
<h2><?php echo $alerte['nomanimal'] ?></h2>
<br>
<img src=" <?php echo $img ?>">

<form method="post"><input type="submit" class="btn" value="Adopter" name="confirm"> <input type="submit" class="btn" value="Supprimer" name="delete"> </form>
</div>

  <?php endforeach  ?>

     </div>
    </body>
    <?php } }?>