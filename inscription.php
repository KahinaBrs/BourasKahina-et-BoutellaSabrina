<?php $bdd=new PDO("mysql:host=localhost;dbname=bdd-site","root","");


if(isset ($_POST['btn-inscription'])){

      
      $nom=$_POST['nom'];
      $prénom=$_POST['prénom'];
      $email=$_POST['email'];
      $email2=$_POST['email2'];
      $numéro=$_POST['numéro'];
      $genre=$_POST['genre'];
     $mdp=md5($_POST['motdepasse']);
     $mdp2=md5($_POST['motdepasse2']);

      if(!empty($_POST['nom'])and!empty($_POST['prénom'])
      and!empty($_POST['email'])and!empty($_POST['email2'])and!empty($_POST['numéro'])
      and!empty($_POST['motdepasse'])and!empty($_POST['motdepasse2'])){
		
		if($email==$email2){

                        
                  $reqemail=$bdd->prepare("SELECT * FROM membre WHERE  email=?");
                         $reqemail->execute(array($email));
                        $nbremail= $reqemail->rowCount();
                        if($nbremail==0){
            
    
                      if($mdp ==$mdp2)
                      {
                            
       $inserer=$bdd->prepare("INSERT INTO membre(nom,prenom,email,numero,genre,mdp) VALUES(?,?,?,?,?,?)");
      $inserer->execute(array($nom,$prénom,$email,$numéro,$genre,$mdp));
       $message2="votre compte a été bien créé  !
        <a style=\" color:skyblue;text-decoration:none;\" href=\"connexion.php\"> me connecter </a> ";
                
                      }
                      else{
                            $message="vos mots de passes ne correspondent pas !";
                      }
        }
        

                        else{
                              $message="email déja utilisée ";
                        }
                                       
                }
                else{
                      $message="vos email ne correspondent pas !";
                }
            
           

      }else{
            $message="remplissez tout les informations  svp ! ";

      }
}
?>
<html>
   <head>
      <meta charset="utf-8" name="viewport"content="width=device-width,initial-scale=1.0">
      <script src="https://kit.fontawesome.com/91627eeb58.js" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="inscr.css">
      <title>inscription</title>  

<header>
             <a href="site.html" class="logo"><span>A</span>doptMe</a>
<?php if(isset($message)){
	 echo '<p style="color:red;font-size:1.3em;font-weight:500;"> '.$message.": 🐕</p>";
}  
else 
if(isset($message2)){
      echo '<p style="color:#49F16A;font-size:1.3em;font-weight:500;"> '.$message2.": 🐕</p>";
}
	?>  
<body>
</header>
  
<form method="post" class="card">
<h3>Inscrivez-vous !</h3> 
<div class="form-group">
<p><i class="fa-solid fa-user"></i>Nom</p>
<input type="text" name="nom" value=""  placeholder="Nom"required minlength="4" maxlength="10">
</div>
<div class="form-group">
<p><i class="fa-solid fa-user"></i>Prénom</p>
<input type="text" name="prénom" value="" placeholder="prénom" required minlength="4" maxlength="10">
</div>
<div class="form-group">
<p><i class="fas fa-envelope"></i>Email</p>
<input type="email" name="email" value=""  placeholder="email"required minlength="4" maxlength="40">
</div>
<div class="form-group">
<p><i class="fas fa-envelope"></i>Confirmation d'email</p>
<input type="email" name="email2" value="" placeholder="email2">
</div>
<div class="form-group">
<p> <i class="fa-solid fa-square-phone"></i> Numéro de téléphone</p>
<input type="number" placeholder="numéro de téléphone"name="numéro"/>
</div>
<div class="form-group">
<p><i class="fas fa-lock"></i>Mot de passe</p>
<input type="password" name="motdepasse" value="" placeholder="mot de passe" required minlength="4" maxlength="40">
</div>
<div class="form-group">
<p><i class="fas fa-lock"></i>Confirmation de mot de passe</p>
<input type="password" name="motdepasse2" value="" placeholder="Confirmation de mot de passe" required minlength="4" maxlength="40">
</div>
<div class="form-group">
<p><i class="fa-solid fa-user"></i>Genre</p>
<select class="selection" name="genre" >
              <option value="Homme">Homme</option>
              <option value="Femme">Femme</option>
</div>
<input  class="btn" type="submit" id="submit" name="btn-inscription" value="S'inscrire"/>
<a href="connexion.php"> me connecter</a>
</form>



</body>
</html>


