<?php
session_start();
$bdd=new PDO("mysql:host=localhost;dbname=bdd-site","root","");
if(isset($_POST['btn-connexion']))
{
	if(!empty($_POST['mdp'])){
			$mdp=md5($_POST['mdp']);
		$req=$bdd->prepare("SELECT *FROM adminpassword WHERE mdp= ?");
		$req->execute(array($mdp));
		$password=$req->rowCount();
		if($password==1){
			
			$admin=$req->fetch();
			$_SESSION['mdp']=$admin['mdp'];
			header("Location:page-admin2.php?admin=".$_SESSION['mdp']);
			
		}else{$message="le mot de passe que vous avez entrer est incorrect ";}
		
		
	}else{$message="complétez  le champ de mot de passe s'il vous plait ";}
		
}

?>
<html>
   <head>
      <meta charset="utf-8" name="viewport"content="width=device-width,initial-scale=1.0">
      <link rel="stylesheet" href="connexion.css">
	  <title>page admin</title>

	  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
   </head>
 


	
<body>
<header> 
             <a href="site.html" class="logo"><span>A</span>doptMe</a>
            <?php if(isset($message)){
	 echo '<p> '.$message." :🐕</p>";
}  

	?> 
        </header>
<img src="cat.png"/>
<div class="card" style="height:370px">	
	<h3> Admin Connexion </h3>
<form method="post" >

<div class="form-group">
<i class="fas fa-lock"></i>
<input type="password" placeholder="mot de passe"  name="mdp"/>
</div>
<button class="btn" type="Submit" name="btn-connexion"> Connecter</button>
</form>

</div>

</body>
</html>
