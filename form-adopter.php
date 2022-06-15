<?php 
$bdd=new PDO("mysql:host=localhost;dbname=bdd-site","root","");
if(isset($_POST['Envoyer'])){
if(!empty($_POST['nom'])AND!empty($_POST['email'])AND!empty($_POST['téléphone'])AND!empty($_POST['message'])){
       
       $img=htmlspecialchars($_GET['img']);
        $idmaitre=$_GET['id'];
        $idanimal=$_GET['idanimal'];
        $animal=$_GET['animal'];
        $nom=$_POST['nom'];
        $email=$_POST['email'];
        $téléphone=$_POST['téléphone'];
        $adoptant=$_POST['qst'];
        $msg=$_POST['message'];   
       
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){

        $envoyer=$bdd->prepare("INSERT INTO demande(nom,email,numero,animal,idanimal,idmaitre,msg,adoptant,img) VALUES(?,?,?,?,?,?,?,?,?)");
        $envoyer->execute(array($nom,$email,$téléphone,$animal,$idanimal, $idmaitre,$msg,$adoptant,$img));
        } 
        else{  $message="l'email que vous avez entré  ce n'est pas un email valide !";}
   
} else{    $message="avant de valider veuillez compléter tout le formulaire !";}
      

}



?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet"href="adopter-chat.css">
        <link rel="stylesheet"href="formAdopter.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"rel="stylesheet">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
            <title>AdoptMe</title>

    </head>
    <body>
      <header> 
         <a href="adopter.html" class="logo"><span>    A</span>doptMe    </a>          
      </header>
   <section>
    <div class="col30" >
   
            <img src="30.png" height ="450px" width="100%"  alt="image">
         
      </div>
</section>
<div class="container">

    <h3 class="title"> Adoptez Votre Animal choisi </h3>
  
    <div class="card">	
        <h3> Demande d'adoption</h3>
    <form method="post">
    <?php if(isset($message)){
	 echo '<p class="p1"> '.$message."</p>";
}  
else 
if(isset($message2)){
      echo '<p> '.$message2."</p>";
}

	?>  
        <div class="form-group">
     
        <input type="text" placeholder="votre nom et prénom"  name="nom" required minlength="4" maxlength="30"/>
        </div>
        <div class="form-group">
        
        <input type="email" placeholder="votre email" name="email"/>
        </div>
        <div class="form-group">
        
        <input type="number" placeholder="votre numéro de téléphone" name="téléphone"/>
        </div>
        <div class="select" >
            <p>Avez vous déja adoptez un animal ?</p></br>
            <select  id="format"  name="qst">
                <option value="Oui" name="qst">Oui</option>
                <option value="Non" name="qst">Non</option></select> </div>
        <div class="form-group">
        <textarea rows="4" cols="34" name="message" placeholder="  Pourquoi voulez-vous adopter un animal ?"></textarea>
        </div>
        <input class="btn" type="Submit" name="Envoyer" value="Envoyer">  </input>
        </form>
  </div>
    
</div>
</body>
</html>