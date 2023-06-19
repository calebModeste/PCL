<?php 
    session_start();
?>
<header>

<?php 
    if ((isset($_SESSION['id']) && !empty($_SESSION['id'])) && (isset($_SESSION['user']) && !empty($_SESSION['user']))):
?>

    <nav class="navbar">
        <div class="titre">
            <p>
                <a href="./index.php">Portal Cheap Link</a>
            </p>
            <div class="manage">
                <a href="./manageA.php">creer une annonce</a>
                <div>
                    <form action="./searchAnnonce.php" method="get">
                        <input type="search" name="searchAnnonce" value="recherche" id="searchAnnonce">
                        <input type="submit" value="recherche">
                    </form>
                </div>
            </div>
            <div class="log">
                <a href="./manageA.php">
                    <img src="./public/img/icon/icons8-auteur-homme-32.png" alt="connexion"> 
                    <p><?=$_SESSION['user']?></p> 
                </a>

                <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
                    <button type="submit" name="logout" value="true"><img src="./public/img/icon/icons8-déconnexion-arrondi-32.png" alt="logout"></button>
                </form>
            </div>

            
        </div>

        <div class="lien">
            <a href="./favoris.php">
                <img src="./public/img/icon/icons8-signet-32.png" alt="favoris">
                <p>favoris</p> 
            </a>
            <a href="./chat.php">
                <img src="./public/img/icon/icons8-salon-de-discussion-32.png" alt="message">
                <p>message</p> 
            </a>
        
        </div>

    </nav>

    <?php  
        endif;
        if ((!isset($_SESSION['id']) || empty($_SESSION['id']) ) && (!isset($_SESSION['user']) || empty($_SESSION['user']))):
    
    ?>

    <nav class="navbar">
        <div class="titre">
            <div class="title">
                <a href="./index.php">Portal Cheap Link</a>
            </div>
            <div class="manage">
                <a href="./manageA.php">creer une annonce</a>
                <div>
                    <form action="./searchAnnonce.php" method="get">
                        <input type="search" name="searchAnnonce" value="recherche" id="searchAnnonce">
                        <input type="submit" value="recherche">
                    </form>
                </div>
            </div>
            <div class="log">
                <a href="./connexion.php">
                    <img src="./public/img/icon/icons8-ajouter-un-utilisateur-homme-32.png" alt="connexion"> 
                    <p>connexion</p> 
                </a>
            </div>

            
        </div>

        <div class="lien">
            <a href="./connexion.php">
                <img src="./public/img/icon/icons8-signet-32.png" alt="favoris">
                <p>favoris</p> 
            </a>
            <a href="./connexion.php">
                <img src="./public/img/icon/icons8-salon-de-discussion-32.png" alt="message">
                <p>message</p> 
            </a>
        
        </div>

    </nav>

    <?php  endif; ?>
            
    <?php  
          if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['logout']) ){

              if ($_POST['logout']) {
                session_destroy();
                header("location: ./index.php");
              }
            }
        ?>
</header>
