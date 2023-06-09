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
        <section class="search">
        <?php 
            if ($_SERVER["REQUEST_METHOD"] == "POST" && (isset($_POST['idAnnonce']) && !empty($_POST['idAnnonce']))) {
                //var_dump($anSearch['id'],);
                $setfavoris = $connect->exePrepaQuery($annonce->setfavoris($_SESSION['id'],$_POST['idAnnonce']));
                   
                }
          ?>






          <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
            
            <input type="search" name="searchAnnonce" value="recherche" id="searchAnnonce">

            <select name="searchCategorie" id="searchCategorie" >
                  <option value="0">categorie</option>
                  <?php
                    $categories=$connect->exePrepaQuery($annonce->getAllCategorie());
                    foreach ($categories as $categorie):
                  ?>
                  <option value="<?=$categorie['cateId'] ?>"><?=$categorie['cate'] ?></option>
                  <?php
                    endforeach;
                  ?>
              </select>

              <label for="">prix maximum</label>
                <input type="number" name="searchPrix" value="0" id="searchPrix">
                
              <input type="submit" value="recherche">
          </form>

        </section>


        <section class="annnonceSearch">




          <?php 
                  /*AFFICHE TOUT */
            if(
              ((isset($_GET['searchAnnonce']) && $_GET['searchAnnonce']=="recherche") && !isset($_GET['searchPrix']) && !isset($_GET['searchCategorie']))
                        ||
              (isset($_GET['searchAnnonce']) && $_GET['searchAnnonce']=="recherche") && (isset($_GET['searchCategorie']) && $_GET['searchCategorie']==0)  && (isset($_GET['searchPrix']) && $_GET['searchPrix']==0)
              ):
              $annonceSearch=$connect->exePrepaQuery($annonce->getAllAnnonce());
              foreach($annonceSearch as $anSearch):
          ?>

            <div class="annnceFav">
              <div class="imgFav">
                <img src="./public/img/034166a5-9940-4c0c-9273-2a4dbe9d63a2.png"  alt="annonce">
              </div>
              <div class="DescriptionFav">
                <span>
                  <p><strong>titre:</strong> <?=$anSearch['titre'] ?></p>
                  <p><strong>prix:</strong> <?=$anSearch['prix'] ?></p>
                </span>
                <span>
                  <p><strong>categorie:</strong>  <?=$anSearch['categ'] ?></p>
                  <p><strong>auteur:</strong>  <?=$anSearch['pseudo'] ?></p>
                </span>
                  <p><strong>date de creation:</strong> <?=$anSearch['date'] ?></p> 

              </div>
              <div class="action">

                <a href="./annonce.php?idAnnonce=<?=$anSearch['id']?>">
                  <img src="./public/img/icon/icons8-ouvrir-en-fenêtre-32.png" alt="voir">
                </a>

                <form action="./favoris.php" method="post">
                  <input type="number" hidden value="<?=$anSearch['id']?>" name="idAnnonce" id="">
                  <button name="setfavoris" type="submit">
                    <img src="./public/img/icon/icons8-signet-32.png" alt="favoris">
                  </button>
                </form>

                <a href="./chat.php">
                  <img src="./public/img/icon/icons8-salon-de-discussion-32.png" alt="messagerie">
                </a>

              </div>
            </div>
          <?php 
          endforeach; endif;
          ?>
            



          <?php 
              /*AFFICHE par titre */
            if(
                (isset($_GET['searchAnnonce']) && $_GET['searchAnnonce']!="recherche") && ((isset($_GET['searchCategorie']) && $_GET['searchCategorie']==0) || (!isset($_GET['searchCategorie']))) && ((isset($_GET['searchPrix']) && $_GET['searchPrix']==0) || (!isset($_GET['searchPrix'])))
              ):
              $annonceSearch=$connect->exePrepaQuery($annonce->getAnnonceByTitre($_GET['searchAnnonce']));
              foreach($annonceSearch as $anSearch):
          ?>

            <div class="annnceFav">
              <div class="imgFav">
                <img src="./public/img/034166a5-9940-4c0c-9273-2a4dbe9d63a2.png"  alt="annonce">
              </div>
              <div class="DescriptionFav">
                <span>
                  <p><strong>titre:</strong> <?=$anSearch['titre'] ?></p>
                  <p><strong>prix:</strong> <?=$anSearch['prix'] ?></p>
                </span>
                <span>
                  <p><strong>categorie:</strong>  <?=$anSearch['categ'] ?></p>
                  <p><strong>auteur:</strong>  <?=$anSearch['pseudo'] ?></p>
                </span>
                  <p><strong>date de creation:</strong> <?=$anSearch['date'] ?></p> 

              </div>
              <div class="action">

                <a href="./annonce.php?idAnnonce=<?=$anSearch['id']?>">
                  <img src="./public/img/icon/icons8-ouvrir-en-fenêtre-32.png" alt="voir">
                </a>

                <form action="./favoris.php" method="post">
                  <input type="number" hidden value="<?=$anSearch['id']?>" name="idAnnonce" id="">
                  <button name="setfavoris" name="setfavoris" type="submit">
                    <img src="./public/img/icon/icons8-signet-32.png" alt="favoris">
                  </button>
                </form>

                <a href="./chat.php">
                  <img src="./public/img/icon/icons8-salon-de-discussion-32.png" alt="messagerie">
                </a>

              </div>
            </div>
          <?php 
          endforeach; endif;
          ?>



          <?php 
              /*AFFICHE par categorie */
            if(
                ((isset($_GET['searchAnnonce']) && $_GET['searchAnnonce']=="recherche") && ((isset($_GET['searchCategorie']) && $_GET['searchCategorie']!=0)) && ((isset($_GET['searchPrix']) && $_GET['searchPrix']==0)))
                    ||
                ((isset($_GET['searchCategorie']) && $_GET['searchCategorie']!=0))
              ):
              $annonceSearch=$connect->exePrepaQuery($annonce->getAnnonceByCategorie($_GET['searchCategorie']));
              foreach($annonceSearch as $anSearch):
          ?>

            <div class="annnceFav">
              <div class="imgFav">
                <img src="./public/img/034166a5-9940-4c0c-9273-2a4dbe9d63a2.png"  alt="annonce">
              </div>
              <div class="DescriptionFav">
                <span>
                  <p><strong>titre:</strong> <?=$anSearch['titre'] ?></p>
                  <p><strong>prix:</strong> <?=$anSearch['prix'] ?></p>
                </span>
                <span>
                  <p><strong>categorie:</strong>  <?=$anSearch['categ'] ?></p>
                  <p><strong>auteur:</strong>  <?=$anSearch['pseudo'] ?></p>
                </span>
                  <p><strong>date de creation:</strong> <?=$anSearch['date'] ?></p> 

              </div>
              <div class="action">

                <a href="./annonce.php?idAnnonce=<?=$anSearch['id']?>">
                  <img src="./public/img/icon/icons8-ouvrir-en-fenêtre-32.png" alt="voir">
                </a>

                <form action="./favoris.php" method="post">
                  <input type="number" hidden value="<?=$anSearch['id']?>" name="idAnnonce" id="">

                  <button name="setfavoris" type="submit">
                    <img src="./public/img/icon/icons8-signet-32.png" alt="favoris">
                  </button>
                </form>

                <a href="./chat.php">
                  <img src="./public/img/icon/icons8-salon-de-discussion-32.png" alt="messagerie">
                </a>

              </div>
            </div>
          <?php 
          endforeach; endif;
          ?>
            


          <?php 
              /*AFFICHE par titre et categorie */
            if(
                (isset($_GET['searchAnnonce']) && $_GET['searchAnnonce']!="recherche") && ((isset($_GET['searchCategorie']) && $_GET['searchCategorie']!=0)) && ((isset($_GET['searchPrix']) && $_GET['searchPrix']==0))
              ):
              $annonceSearch=$connect->exePrepaQuery($annonce->getAnnonceByTitreCategorie($_GET['searchAnnonce'],$_GET['searchCategorie']));
              foreach($annonceSearch as $anSearch):
          ?>

            <div class="annnceFav">
              <div class="imgFav">
                <img src="./public/img/034166a5-9940-4c0c-9273-2a4dbe9d63a2.png"  alt="annonce">
              </div>
              <div class="DescriptionFav">
                <span>
                  <p><strong>titre:</strong> <?=$anSearch['titre'] ?></p>
                  <p><strong>prix:</strong> <?=$anSearch['prix'] ?></p>
                </span>
                <span>
                  <p><strong>categorie:</strong>  <?=$anSearch['categ'] ?></p>
                  <p><strong>auteur:</strong>  <?=$anSearch['pseudo'] ?></p>
                </span>
                  <p><strong>date de creation:</strong> <?=$anSearch['date'] ?></p> 

              </div>
              <div class="action">

                <a href="./annonce.php?idAnnonce=<?=$anSearch['id']?>">
                  <img src="./public/img/icon/icons8-ouvrir-en-fenêtre-32.png" alt="voir">
                </a>

                <form action="./favoris.php" method="post">
                  <input type="number" hidden value="<?=$anSearch['id']?>" name="idAnnonce" id="">

                  <button name="setfavoris" type="submit">
                    <img src="./public/img/icon/icons8-signet-32.png" alt="favoris">
                  </button>
                </form>

                <a href="./chat.php">
                  <img src="./public/img/icon/icons8-salon-de-discussion-32.png" alt="messagerie">
                </a>

              </div>
            </div>
          <?php 
          endforeach; endif;
          ?>


          <?php 
              /*AFFICHE par titre et prix */
            if(
                (isset($_GET['searchAnnonce']) && $_GET['searchAnnonce']!="recherche") && ((isset($_GET['searchCategorie']) && $_GET['searchCategorie']==0)) && ((isset($_GET['searchPrix']) && $_GET['searchPrix']!=0))
              ):
              $annonceSearch=$connect->exePrepaQuery($annonce->getAnnonceByTitrePrix($_GET['searchAnnonce'],$_GET['searchPrix']));
              foreach($annonceSearch as $anSearch):
          ?>

            <div class="annnceFav">
              <div class="imgFav">
                <img src="./public/img/034166a5-9940-4c0c-9273-2a4dbe9d63a2.png"  alt="annonce">
              </div>
              <div class="DescriptionFav">
                <span>
                  <p><strong>titre:</strong> <?=$anSearch['titre'] ?></p>
                  <p><strong>prix:</strong> <?=$anSearch['prix'] ?></p>
                </span>
                <span>
                  <p><strong>categorie:</strong>  <?=$anSearch['categ'] ?></p>
                  <p><strong>auteur:</strong>  <?=$anSearch['pseudo'] ?></p>
                </span>
                  <p><strong>date de creation:</strong> <?=$anSearch['date'] ?></p> 

              </div>
              <div class="action">

                <a href="./annonce.php?idAnnonce=<?=$anSearch['id']?>">
                  <img src="./public/img/icon/icons8-ouvrir-en-fenêtre-32.png" alt="voir">
                </a>

                <form action="./favoris.php" method="post">
                  <input type="number" hidden value="<?=$anSearch['id']?>" name="idAnnonce" id="">

                  <button name="setfavoris" type="submit">
                    <img src="./public/img/icon/icons8-signet-32.png" alt="favoris">
                  </button>
                </form>

                <a href="./chat.php">
                  <img src="./public/img/icon/icons8-salon-de-discussion-32.png" alt="messagerie">
                </a>

              </div>
            </div>
          <?php 
          endforeach; endif;
          ?>


          <?php 
              /*AFFICHE par categorie et prix */
            if(
                (isset($_GET['searchAnnonce']) && $_GET['searchAnnonce']=="recherche") && ((isset($_GET['searchCategorie']) && $_GET['searchCategorie']!=0)) && ((isset($_GET['searchPrix']) && $_GET['searchPrix']!=0))
              ):
              $annonceSearch=$connect->exePrepaQuery($annonce->getAnnonceByCategoriePrix($_GET['searchCategorie'],$_GET['searchPrix']));
              foreach($annonceSearch as $anSearch):
          ?>

            <div class="annnceFav">
              <div class="imgFav">
                <img src="./public/img/034166a5-9940-4c0c-9273-2a4dbe9d63a2.png"  alt="annonce">
              </div>
              <div class="DescriptionFav">
                <span>
                  <p><strong>titre:</strong> <?=$anSearch['titre'] ?></p>
                  <p><strong>prix:</strong> <?=$anSearch['prix'] ?></p>
                </span>
                <span>
                  <p><strong>categorie:</strong>  <?=$anSearch['categ'] ?></p>
                  <p><strong>auteur:</strong>  <?=$anSearch['pseudo'] ?></p>
                </span>
                  <p><strong>date de creation:</strong> <?=$anSearch['date'] ?></p> 

              </div>
              <div class="action">

                <a href="./annonce.php?idAnnonce=<?=$anSearch['id']?>">
                  <img src="./public/img/icon/icons8-ouvrir-en-fenêtre-32.png" alt="voir">
                </a>

                <form action="./favoris.php" method="post">
                  <input type="number" hidden value="<?=$anSearch['id']?>" name="idAnnonce" id="">

                  <button name="setfavoris" type="submit">
                    <img src="./public/img/icon/icons8-signet-32.png" alt="favoris">
                  </button>
                </form>

                <a href="./chat.php">
                  <img src="./public/img/icon/icons8-salon-de-discussion-32.png" alt="messagerie">
                </a>

              </div>
            </div>
          <?php 
          endforeach; endif;
          ?>

        
          <?php 
              /*AFFICHE par prix */
            if(
                (isset($_GET['searchAnnonce']) && $_GET['searchAnnonce']=="recherche") && ((isset($_GET['searchCategorie']) && $_GET['searchCategorie']==0)) && ((isset($_GET['searchPrix']) && $_GET['searchPrix']!=0))
              ):
              $annonceSearch=$connect->exePrepaQuery($annonce->getAnnonceByPrix($_GET['searchPrix']));
              foreach($annonceSearch as $anSearch):
          ?>

            <div class="annnceFav">
              <div class="imgFav">
                <img src="./public/img/034166a5-9940-4c0c-9273-2a4dbe9d63a2.png"  alt="annonce">
              </div>
              <div class="DescriptionFav">
                <span>
                  <p><strong>titre:</strong> <?=$anSearch['titre'] ?></p>
                  <p><strong>prix:</strong> <?=$anSearch['prix'] ?></p>
                </span>
                <span>
                  <p><strong>categorie:</strong>  <?=$anSearch['categ'] ?></p>
                  <p><strong>auteur:</strong>  <?=$anSearch['pseudo'] ?></p>
                </span>
                  <p><strong>date de creation:</strong> <?=$anSearch['date'] ?></p> 

              </div>
              <div class="action">

                <a href="./annonce.php?idAnnonce=<?=$anSearch['id']?>">
                  <img src="./public/img/icon/icons8-ouvrir-en-fenêtre-32.png" alt="voir">
                </a>./favoris.php
                <form action="./favoris.php" method="post">
                  <input type="number" hidden value="<?=$anSearch['id']?>" name="idAnnonce" id="">

                  <button name="setfavoris" type="submit">
                    <img src="./public/img/icon/icons8-signet-32.png" alt="favoris">
                  </button>
                </form>

                <a href="./chat.php">
                  <img src="./public/img/icon/icons8-salon-de-discussion-32.png" alt="messagerie">
                </a>

              </div>
            </div>
          <?php 
          endforeach; endif;
          ?>


          <?php 
              /*AFFICHE par titre categorie prix */
            if(
                (isset($_GET['searchAnnonce']) && $_GET['searchAnnonce']!="recherche") && ((isset($_GET['searchCategorie']) && $_GET['searchCategorie']!=0)) && ((isset($_GET['searchPrix']) && $_GET['searchPrix']!=0))
              ):
              $annonceSearch=$connect->exePrepaQuery($annonce->getAnnonceByTitreCategoriePrix($_GET['searchAnnonce'],$_GET['searchCategorie'],$_GET['searchPrix']));
              foreach($annonceSearch as $anSearch):
          ?>

            <div class="annnceFav">
              <div class="imgFav">
                <img src="./public/img/034166a5-9940-4c0c-9273-2a4dbe9d63a2.png"  alt="annonce">
              </div>
              <div class="DescriptionFav">
                <span>
                  <p><strong>titre:</strong> <?=$anSearch['titre'] ?></p>
                  <p><strong>prix:</strong> <?=$anSearch['prix'] ?></p>
                </span>
                <span>
                  <p><strong>categorie:</strong>  <?=$anSearch['categ'] ?></p>
                  <p><strong>auteur:</strong>  <?=$anSearch['pseudo'] ?></p>
                </span>
                  <p><strong>date de creation:</strong> <?=$anSearch['date'] ?></p> 

              </div>
              <div class="action">

                <a href="./annonce.php?idAnnonce=<?=$anSearch['id']?>">
                  <img src="./public/img/icon/icons8-ouvrir-en-fenêtre-32.png" alt="voir">
                </a>

                <form action="./favoris.php" method="post">
                  <input type="number" hidden value="<?=$anSearch['id']?>" name="idAnnonce" id="">

                  <button name="setfavoris" type="submit">
                    <img src="./public/img/icon/icons8-signet-32.png" alt="favoris">
                  </button>
                </form>

                <a href="./chat.php">
                  <img src="./public/img/icon/icons8-salon-de-discussion-32.png" alt="messagerie">
                </a>

              </div>
            </div>
          <?php 
          endforeach; endif;
          ?>


        </section>
       

    </main>

</body>
</html>
