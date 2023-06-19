
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
            <img src="./public/img/3ecca1c0-ba00-4058-b1c2-40b8c391e2a2.png" alt="banderoll">
          </div>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
              Quibusdam quidem dignissimos laboriosam quia recusandae, 
              reprehenderit accusamus in commodi ipsam sint asperiores fugit, 
              labore odio mollitia doloribus voluptate cum repellat fugiat lorem 
              ipsum dolor sit amet, consectetur adipisicing elit. 
              Quibusdam quidem dignissimos laboriosam quia recusandae, 
              reprehenderit accusamus in commodi ipsam sint asperiores fugit, 
              labore odio mollitia doloribus voluptate cum repellat fugiat?
            </p>
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
                            <img src="./public/img/0bb3f532-7661-426a-a24a-1958cfb9c705.png" alt="categorie">
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
