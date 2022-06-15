<?php
session_start();
$bdd=new PDO("mysql:host=localhost;dbname=bdd-site","root","");
if(isset($_GET['id'])){
	$idmembre=intval($_GET['id']);
	$reqmembre=$bdd->prepare("SELECT * FROM membre WHERE id= ?");
	$reqmembre->execute(array($idmembre));
	$membre=$reqmembre->fetch();
 if(isset($_SESSION['id'])AND $membre['id']==$_SESSION['id']){

    if(isset($_POST["btn-deconnexion"])){
        
session_start();
$_SESSION=array();
session_destroy();
header("Location:connexion.php");
    }
    if(isset($_POST["send"])){
        if(!empty($_POST['race'])AND !empty($_POST['age'])){  
        $animal=$_POST['animal'];
        $race=$_POST['race'];
        $age=$_POST['age'];
        if($animal!='animal'){
            $inserer=$bdd->prepare("INSERT INTO demande2 (iddemande,animal,race,age) VALUES(?,?,?,?)");
            $inserer->execute(array($idmembre,$animal,$race,$age));
            $ok="la demande est envoyée !";
    }else{
        $message="choisis la catégorie de ton animal !";}
}else{
    $message="avant de valider veuillez compléter tout le formulaire !";}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/css/swiper.css">
    <link rel="stylesheet" href="profil.css">  
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"rel="stylesheet">
    <title>Profil</title>
 
</head>
<body>
    <div class="profil">

   <img class="img1" src="<?php if($membre['genre']=='Homme'){echo"homme.png" ;}else echo"femme.png" ?>" >  
<a><?php   echo $membre['nom'] ?> <?php   echo $membre['prenom'] ?><a>
     <img class="img2"src="messages.png"><a href="messages.php?id=<?php echo $idmembre ?>"> messages</a>
 <form method="post"> <input name="btn-deconnexion"  type="submit"value="déconnecter" ></form>
    </div>
  
    <h3 class="titre-adopt">➣ Choisis la catégorie de l'animal que tu veux le mettre en adoption </h3>
        <ol>
            <li> <a href="chat.php?id=<?php echo $idmembre ?>"> 🐈  Chat</a> </li>
            <li> <a href="chien.php?id=<?php echo $idmembre ?>">🐕  Chien</a></li>
            <li> <a href="rongeur.php?id=<?php echo $idmembre ?>">  🐇  Rongeur  </a> </li>
            <li> <a href="reptile.php?id=<?php echo $idmembre ?>"> 🐍  Reptiles</a></li>
            <li> <a href ="poisson.php?id=<?php echo $idmembre ?>">🐠  Poisson </a> </li>
            <li><a href="oiseau.php?id=<?php echo $idmembre ?>">   🐤  Oiseau</a> </li>
    </ol> 

        <img src="z.0.jpg" class="image">
</br>
<h3 class="titre-adopt2">➣ Demander un animale qui me satisfait </h3>
<?php if(isset($message)){ echo '<p class="p1"> '.$message." : 🐈</p>";}if(isset($ok)){echo '<p class="p2"> '.$ok." : 🐈</p>";}?>

<div class="demander">
</br>
<img src="z.00.png"/>

<form method="post"  >
    <select  id="format"  name="animal">
                    <option  enabled-value="animal"> Animal </option>
                    <option value="chat" name="animal">🐈  Chat</option>
                    <option value="chien" name="animal">🐕  Chien</option>
                    <option value="rongeur" name="animal">🐇  Rongeur </option>
                    <option value="reptile" name="animal">🐍  Reptiles</option>
                    <option value="poisson" name="animal">🐠  Poisson </option>
                    <option value="oiseau" name="animal">🐤  Oiseau</option>
                </select>
                
  <input type="text" class="field" placeholder="La race de votre animal"  name="race"/>
  <input type="text" class="field" placeholder="Son Age"  name="age"/>

     <input class="send" type="submit" name="send" value="demander"/>                  
</form>
<div>


 </body>

 <?php } }?>