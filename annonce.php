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
        <section class="annonceView">
            <div class="AnnonceImage">
                <img src="./public/img/0bb3f532-7661-426a-a24a-1958cfb9c705.png" alt="annonce">
            </div>
          <div class="AnnonceInfos">
            <?php
              if (isset($_GET['idAnnonce'])&& !empty($_GET['idAnnonce']) && $_GET['idAnnonce']!=0):
                $infos=$connect->exePrepaQuery($annonce->getAnnonceById($_GET['idAnnonce']));
                foreach($infos as $info):
            ?>
              <div>
                    <p><b>Titre:</b> <?=$info['titre']?></p>
                    <p><b>Auteur:</b> <?=$info['pseudo']?></p>
                    <p><b>Categorie:</b> <?=$info['cate']?></p>
              </div>
              <div>
                    <p><b>Details</b></p>
                    <p>créer le <?=$info['date_creation']?></p>
                    <span>
                      <p><b>description de l'auteur:</b></p>
                      <p>
                        <?=$info['description']?>
                      </p>
                    </span>

              </div>
              <div>
                    <span>
                      <p><b>Prix de base:</b> <?=$info['prix']?> euro</p>
                    </span>
              </div>
              <div class="monOffre">
                  <form action="<?=$_SERVER['PHP_SELF']?>?idAnnonce=<?=$_GET['idAnnonce']?>" method="post">
                    <label for="offre">Votre offre pour cette annonce:</label>
                      <input type="number" name="offre" id="offre" min="0">
                      <input type="submit" name="soumettre" value="soumettre">
                  </form>
              </div>
              <div class="mesOffres">
                  <p>
                    <b>MES OFFRES</b>
                  </p>

                  <div class="offres">
                    <ul>
                        <?php 
                        if (isset($_SESSION['id']) && (isset($_GET['idAnnonce'])&& !empty($_GET['idAnnonce']) && $_GET['idAnnonce']!=0)                        ):
                          $getOffres=$connect->exePrepaQuery($annonce->getOffre($_SESSION['id'],$_GET['idAnnonce']));
                          foreach($getOffres as $getOffre):
                        ?>
                          
                            <li>
                              <span><?=$getOffre['pseudo']?></span>
                              <span><?=$getOffre['titre']?></span>
                              <span><?=$getOffre['proposition']?></span>
                            </li>
                            
                          

                        <?php 
                          endforeach; ;endif;
                        ?>
                    </ul>
                  </div>
              </div>

            <?php 
                endforeach;
              endif;
            ?>
          </div>

        </section>
       <?php 

          if ($_SERVER["REQUEST_METHOD"] == "POST" ) {           
            $offre=$connect->exePrepaQuery($annonce->setOffre($_SESSION['id'],$_POST['offre'],$_GET['idAnnonce']));
            //header("location:./annonce.php?idAnnonce=".$_GET['idAnnonce']);
            //exit;
        }
       ?>

    </main>

</body>
</html>
