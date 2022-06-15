<?php
session_start();
$pdo=new PDO("mysql:host=localhost;dbname=bdd-site","root","");
if(isset($_POST['btn-connexion']))
{
	$email=$_POST['email'];
	$mdp=md5($_POST['mdp']);
	if(!empty($email)AND !empty($mdp)){
		
		$reqmembre=$pdo->prepare("SELECT *FROM membre WHERE email= ? AND mdp= ?");
		$reqmembre->execute(array($email,$mdp));
		$membreexist=$reqmembre->rowCount();
		if($membreexist==1){

			$membre=$reqmembre->fetch();
			$_SESSION['id']=$membre['id'];
			$_SESSION['nom']=$membre['nom'];
            $_SESSION['prenom']=$membre['prenom'];
			$_SESSION['email']=$membre['email'];
          $_SESSION['genre']=$membre['genre'];
			header("Location:profil.php?id=".$_SESSION['id']);
			
		}
		else{
			$message="l'email ou le mot de passe est incorrect !";
		}
		
		
	}else{$message="complétez tous les champs s'il vous plait !";}
		
}

?>
<html>
   <head>
      <meta charset="utf-8" name="viewport"content="width=device-width,initial-scale=1.0">
<link rel="stylesheet" href="cnx.css">
      <title>Se connecter </title>  

	  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
   </head>
 


	
<body>
<header> 
             <a href="site.html" class="logo"><span>A</span>doptMe</a>
            <?php if(isset($message)){
	 echo '<p> '.$message." : 🐕</p>";
}  

	?> 
        </header>

<div class="card">	
	<h3> Connexion </h3>
<form method="post">
<div class="form-group">
	<i class="fas fa-envelope"></i><input type="text" placeholder="email"  name="email"/>
</div>
<div class="form-group">
<i class="fas fa-lock"></i>
<input type="password" placeholder="mot de passe"  name="mdp"/>
</div>
<button class="btn" type="Submit" name="btn-connexion"> Connecter</button>

<a href="inscription.php"> inscrivez vous ici !</a>
</form>


</div>

</body>
</html>
