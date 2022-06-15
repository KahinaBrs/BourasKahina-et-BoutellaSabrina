<?php
session_start();
$bdd=new PDO("mysql:host=localhost;dbname=bdd-site","root","");
if(isset($_GET['admin'])){
	$mdpadmin=$_GET['admin'];
	$req=$bdd->prepare("SELECT * FROM adminpassword WHERE mdp= ?");
	$req->execute(array($mdpadmin));
	$admin=$req->fetch();
 if(isset($_SESSION['mdp'])){
if(isset($_POST["btn-deconnexion"])){
        
    session_start();
    $_SESSION=array();
    session_destroy();
    header("Location:page-admin.php");
    
        }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet"href="admin2.css">
    <style>
          
    *{
        padding:0;
        margin: 0;
        box-sizing: border-box;
        font-family: 'Quicksand', sans-serif;
    }
        
        header{
       
       position:fixed;
       top: 0%;
       left: 0%;
       padding: 16px ;
       z-index: 1;
       display: flex;
       justify-content: space-between;
       align-items:center;
       transition: 0.5s ;
    }
    .logo{
        color: #d62a5b   ;
        font-weight: bold;
        font-size: 2em;
        text-decoration: none;
    }
    .logo span{
        color:    #f07d7d  ;
    }
    
     
    form input{
      cursor:pointer;
      position:absolute;
      top:20px;
      right:15px;
      font-size:20px;
      font-weight:500;
      color: #1e4d70; 
      text-transform: capitalize; 
      height:50px;
      width:170px;
      background: rgb(255, 173, 173) ;
      border:none;
          }
          form input:hover{
              cursor:pointer;
              background: rgb(255, 153, 153) ;
          }  
    
    .btn{
        margin:10px;
      cursor:pointer;
      font-size:18px;
      font-weight:500;
      color: #1e4d70; 
      text-transform: capitalize; 
      height:50px;
      width:200px;
      background: rgb(255, 173, 173) ;
      border:none;
          }
          .btn2{
            margin:10px;
          cursor:pointer;
          font-size:18px;
          font-weight:500;
          color: #1e4d70; 
          text-transform: capitalize; 
          height:50px;
          width:280px;
          background: rgb(255, 173, 173) ;
          border:none;
              }
          .btn2:hover,.btn:hover{
              cursor:pointer;
              background: rgb(255, 153, 153) ;
          }  
    
     .container{
       width:100%;
        padding:3rem 2rem;
        text-align: center;
     }  
    .container .title{
        font-size: 3.5rem;
        color:#444;
        margin-bottom: 3rem;
        text-transform: uppercase;
        text-align: center;
     }
    .container img{
        height:160px;
        margin:auto;
    }
     
    </style>
</head>
<body>
<header> 
             <a class="logo"><span>A</span>doptMe</a> 
          
        </header>
<form method="post"> <input type="submit" name="btn-deconnexion"value="deconnecter"/></form>
            
       
        <div class="container">

<h3 class="title"> Admin </h3>

	<img src="icon-admin0.png"/>
    <h3>Gérer les :</h3><br>

<a href="page-admin3.php"><button class="btn"> MEMBRES </button></a><a href="page-admin7.php"><button class="btn2"> Demandes: mettre en adoption</button></a><a href="page-admin5.php"><button class="btn">Demandes d'adoption</button></a>

</div>
<a href="statistiques.php" class="stat" style="position: relative;left:40px;top:40px;"><img  src="42.png" height="80px"></a>
</body>
</html><?php }}?>