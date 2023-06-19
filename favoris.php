<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portal Cheap LInk</title>
    <link rel="stylesheet" href="./public/css/style_init.css">
    <link rel="stylesheet" href="./public/css/style_page.css">
    <?php include('./callback.php') ?>
  </head>
  <body>
    
    <!-- header -->
    <?php include('./public/templates/header.php') ?>


    <!-- main -->
    <main>
      <section class="favoris">
        <?php 
          $favoris=$connect->exePrepaQuery($annonce->getFavoris($_SESSION['id']));
          foreach($favoris as $fav):
            $annonces= $connect->exePrepaQuery($annonce->getAnnonceById($fav['annonce_id']));
            foreach($annonces as $an):
        ?>
              <div class="annnceFav">
                <div class="imgFav">
                  <img src="./public/img/034166a5-9940-4c0c-9273-2a4dbe9d63a2.png"  alt="annonce">
                </div>
                <div class="DescriptionFav">
                  <span><p>titre: <?=$an['titre']?></p><p>prix: <?=$an['prix']?></p></span>
                  <p>categorie: <?=$an['cate'] ?> </p>
                  
                </div>
                <div class="action">
                  <a href="./annonce.php?idAnnonce=<?=$fav['annonce_id']?>"><img src="./public/img/icon/icons8-ouvrir-en-fenêtre-32.png" alt="voir"></a>
                  <a href="./chat.php?idAnnonce=<?=$fav['annonce_id']?>"><img src="./public/img/icon/icons8-salon-de-discussion-32.png" alt="messagerie"></a>
                  <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
                      <input type="number" hidden value="<?=$fav['favoris_id']?>" name="favId">
                      <button type="submit"><img src="./public/img/icon/icons8-supprimer-pour-toujours-32.png" alt="supprimer"></button>
                  </form>
                </div>
              </div>

        <?php 
              endforeach;
            endforeach;  ?>
      </section>

      <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['favId']) && $_POST['favId']!=0) {
          var_dump($_POST['favId']);
          //$deletefav= $connect->exePrepaQuery($annonce->deletefavoris($_POST['favId']));
          //header('location: ./favoris.php');
        }

      ?>

    </main>

</body>
</html>
