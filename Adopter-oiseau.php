<?php $bdd=new PDO("mysql:host=localhost;dbname=bdd-site","root","");
$req=$bdd->prepare("SELECT * FROM oiseau where validationadmin= 1 ");
$req->execute();
$cats=$req->fetchAll();

?>
<!DOCTYPE html>

<html lang="fr">
   
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet"href="adopter-oiseau.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"rel="stylesheet">
            <title>AdoptMe</title>
    </head>
    <body>
      <header> 
         <a href="adopter.html" class="logo"><span>    A</span>doptMe    </a>          
      </header>
   <section>
    <div class="col30" >
        <div>  
            <img src="z.63.jpg" height = "500px" width="1300"  alt="image">
        </div> 
      </div>
</section>

<div class="container">

  <h3 class="title"> Adoptez un oiseau </h3>

  <div class="cat-container">

<?php  foreach( $cats as $cat):
$image=htmlspecialchars($cat['img']);
?>
     <div class="cat" data-name="<?php echo $cat['idoiseau']?>">
        <img src="oiseau/<?=$image?>" >
        <h3><?php echo $cat['nom']?></h3>
          
     </div>
     
  <?php endforeach  ?>
   
    </div>
  
    </div>

</div>

<div class="cat-preview">
<?php  foreach( $cats as $cat):?>
  <div class="preview" data-target="<?php echo$cat['idoiseau']?>">
     <a href="" class="close-btn">&times;</a>
     <h3><?php echo $cat['nom']?></h3>
     <p>Nom : <?php echo $cat['nom']?></p>
     <p>race: <?php echo $cat['race']?></p>
     <p>Age  : <?php echo $cat['age']?></p>
     <p>Sexe : <?php echo $cat['sexe']?></p>

     <p class="discription">Discription : <?php echo $cat['apropos']?></p>

    
     <div class="buttons">
<a href="form-adopter.php?animal=oiseau&idanimal=<?php echo$cat['idoiseau']?>&id=<?php echo$cat['id']?>&img=<?php echo$image?>" class="adopt">Adopte moi </a>
    
     </div>
  </div>
  <?php endforeach  ?>



</div>

<script src=" oiseau-adopter.js"></script>  
        
        </body>
        </html>






 