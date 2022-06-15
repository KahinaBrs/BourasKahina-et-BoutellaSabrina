<?php 
$bdd=new PDO("mysql:host=localhost;dbname=bdd-site","root","");
if(isset($_POST['Valider'])){
if(!empty($_POST['nom'])AND!empty($_POST['race'])AND!empty($_POST['age'])AND!empty($_POST['discription'])){
if(($_POST['sexe'])!='Sexe'){


        $idmembre=$_GET['id'];
        $nom=$_POST['nom'];
        $race=$_POST['race'];
        $age=$_POST['age'];
        $sexe=$_POST['sexe'];
        $apropos=$_POST['discription'];
        if(isset($_FILES['image'])){
                     
        $picname=htmlspecialchars($_FILES["image"]["name"]);
        $pictmpname=$_FILES["image"]["tmp_name"];

        $inserer=$bdd->prepare("INSERT INTO oiseau(id,nom,race,age,sexe,apropos,img,validationadmin) VALUES(?,?,?,?,?,?,?,?)");
        $inserer->execute(array($idmembre,$nom,$race,$age,$sexe,$apropos,$picname,0));
        $move=move_uploaded_file($pictmpname,"oiseau/$picname");

        if(isset($move)){

         $message2="merci, votre demande va être traitée par l'admin ";         
    

        }else{
        $message="il y a eu une erreur !";}
   
        } else{
        $message="vous avez oublié de mettre une image de votre oiseau !";}

         }else{
         $message="choisis le sexe de ton oiseau !";}
 
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
    <link rel="stylesheet" href="oiseau.css">
    <title>mettere mon amimal</title>
</head>
<header> 
    <a href="profil.php?id=<?=$_GET['id'];?>" class="logo"><span>    A</span>doptMe </a>
    <?php if(isset($message)){ echo '<p class="p1"> '.$message." : 🐈</p>";}if(isset($message2)){echo '<p class="p2"> '.$message2." : 🐈</p>";}

	?> 
 </header>
<body> 
    <div class="container">
		<div class="Adopt-box">
			<div class="left"></div>
			<div class="right">
                <form method="post" action="" enctype="multipart/form-data">
				<h2>Mettre a l'adoption</h2>
                <input type="text" class="field" placeholder="Nom de votre animal"  name="nom"/>
				<input type="text" class="field" placeholder="La race de votre animal"  name="race"/>
                <input type="text" class="field" placeholder="Son Age"  name="age"/>
                <div class="select" >
                <select  id="format"  name="sexe">
                    <option  value="Sexe">Sexe</option>
                    <option value="Male" name="sexe">Male</option>
                    <option value="Femelle" name="sexe">Femelle</option></select> </div></br>
				<textarea placeholder="Quelques choses spécial sur ton animal" class="field" name="discription"></textarea>
                <input type="file" name="image" id="file" />
                <label for="file">
                    <i class="material-icones"></i>&nbsp;
                    Chosir une photo</label></br>
                <script src="file.js"></script>
				<input class="btn" type="submit" name="Valider" value="Valider"/>
              </form>
            </div>
		</div>
	</div>
</body>
</html>