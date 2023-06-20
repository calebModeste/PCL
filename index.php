
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
        <section class="affiche">
          <div class="banderoll">
            <img src="./public/img/Les-nouvelles-tendances-marketing-point-vente-F.jpg" alt="banderoll">
          </div>
            <p> BIENVENUE SUR PCL </p>
            
        </section>
        <section >
          
          <ul class="categories">
                <?php
                  $categories=$connect->exePrepaQuery($annonce->getAllCategorie());
                  foreach ($categories as $categorie):
                    if($categorie['cateId']!=1):
                ?>
                      <li class="categorie">
                        <a href="./searchAnnonce.php?searchCategorie=<?=$categorie['cateId']?>">   
                            <img src="./public/img/034166a5-9940-4c0c-9273-2a4dbe9d63a2.png" alt="categorie">
                            <p><?=$categorie['cate']?></p>
                        </a>
                      </li>
            
                <?php
                  endif; endforeach;
                ?>
          </ul>

        </section>
        <section class="help">


        </section>
       

    </main>

</body>
</html>
