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
    <?php 
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $setAnnonce= $connect->exePrepaQuery($annonce->setAnnonce($_POST['MakeTitreA'],$_POST['MakeCategA'],$_SESSION['id'],$_POST['MakePrixA'],$_POST['MakedescripA']));
 
          }

      ?>





      <section class="yoursAnnonce">
        <table >
          <tr>
            <th>titre</th>
            <th>categories</th>
            <th>prix</th>
            <th>date de création</th>
            <!--<th>action</th>-->
          </tr>

          <?php
          if ((isset($_SESSION['id']) && !empty(isset($_SESSION['id'])))):
              $myAnnonces= $connect->exePrepaQuery($annonce->getAnnonceByAuteur($_SESSION['id']));
              foreach($myAnnonces as $myAnnonce):
          ?>
          <tr>
            <td><?=$myAnnonce['titre']?></td>
            <td><?=$myAnnonce['cate']?></td>
            <td><?=$myAnnonce['prix']?></td>
            <td><?=$myAnnonce['date_creation']?></td>
            <!--<td>
              <form action="" method="post">
                <button type="submit"><img src="./public/img/icon/icons8-supprimer-pour-toujours-32.png" alt="supprime"></button>
              </form>
            </td>-->
          </tr>
          <?php 
            endforeach;endif;
          ?>
        </table>
      

      </section>
      <section class="makeAnnonce">
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <label for="">titre de l'annonce</label>
            <input type="text" name="MakeTitreA" id="MakeTitreA">
            
            <label for="">prix de l'annonce</label>
            <input type="number" name="MakePrixA" id="MakePrixA" min="0">
            
            <select name="MakeCategA" id="MakeCategA" >
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
              <label for="">description</label>
              <textarea name="MakedescripA" id="MakedescripA" cols="30" rows="10"></textarea>
              <input type="submit" name="makeA" value="creer annonce">
        </form>
      </section>
      <section class="proposition">
        <table >
          <tr>
            <th>titre</th>
            <th>categories</th>
            <th>Les offres</th>

          </tr>
        <?php 
              if ((isset($_SESSION['id']) && !empty(isset($_SESSION['id'])))):
                $myAnnonces= $connect->exePrepaQuery($annonce->getAnnonceByAuteur($_SESSION['id']));
                foreach($myAnnonces as $myAnnonce):
          ?>
        
          <tr>
            <td><?=$myAnnonce['titre']?></td>
            <td><?=$myAnnonce['cate']?></td>
            <td>
              <ul>
                <?php 
                  if(isset($myAnnonce['id'])):
                    $offreAnnonces= $connect->exePrepaQuery($annonce->getOffrebyAnnonce($myAnnonce['id']));
                    foreach($offreAnnonces as $offreAnnonce):
                ?>
                  <li>
                    <span>offre de <?=$offreAnnonce['offrePrix']?> euro</span>
                    <span>, par <?=$offreAnnonce['auteur']?></span>
                  </li>
                <?php 
                    endforeach;endif;
                ?>
              </ul>
            </td>

          </tr>
        <?php 
              endforeach;endif;
        ?>
        </table>
      </section>



    </main>

</body>
</html>
