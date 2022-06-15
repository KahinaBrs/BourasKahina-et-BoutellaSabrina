<?php  
$bdd=new PDO("mysql:host=localhost;dbname=bdd-site","root","");
if(isset($_POST['ok'])){
    if(!empty($_POST['ok'])){
        $mdp=md5($_POST['password']) ;      
         $envoyer=$bdd->prepare("INSERT INTO adminpassword(mdp) VALUES(?)");
        $envoyer->execute(array($mdp));
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="" method="post">
   
 <input type="password" value="password" name="password">
 <input type="submit" name="ok" value="ok">

    </form>
</body>
</html>