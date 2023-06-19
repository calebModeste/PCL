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

      <div class="login">
        <div class="inscription" id="inscription">
            <form action="./inscription.php" method="post">
                
                  <div>
                    <label for="Nominscription">Nom </label>
                    <input type="text"  name="Nominscription" id="Nominscription" placeholder="" minlength="2" required>
                  </div>
                  <div>
                    <label for="Prenominscription">Prenom </label>
                    <input type="text"  name="Prenominscription" id="Prenominscription" placeholder="" minlength="2" required>
                  </div>
                  <div>
                    <label for="Userinscription">Nom d'utilisateur </label>
                    <input type="text"  name="Userinscription" id="Userinscription" placeholder="" minlength="5" required>
                  </div>
                  <div>
                    <label for="Emailinscription">E-mail</label>
                    <input type="email" pattern="[\w-\.]+@([\w-]+\.)+[\w-]{2,4}" name="Emailinscription" id="Emailinscription" placeholder="" minlength="5" required>
                  </div>
                  <div>
                    <label for="Phoneinscription">Telephone </label>
                    <input type="tel"  name="Phoneinscription" id="Phoneinscription" placeholder="" minlength="5" required>
                  </div>
                  <div>
                    <label for="Cityinscription">Ville de residance </label>
                    <input type="text" name="Cityinscription" id="Cityinscription" placeholder=""  required>
                  </div>
                  <div>
                    <label for="Zipinscription">code postal </label>
                    <input type="text"  name="Zipinscription" id="Zipinscription" placeholder="" minlength="5" required>
                  </div>
                  <div>
                    <label for="Passwordinscription">Mot de passe</label>
                    <input type="password" name="Passwordinscription" id="Passwordinscription" minlength="8"  required>                  
                  </div>
                  <div class="submit">
                <input type="submit" value="INSCRIPTION">
              </div>
            </form>
            <div class="connecte">
              <a href="./connexion.php">je me connecte</a>
            </div>
        </div>

      </div>
      <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['Nominscription']) && !empty($_POST['Prenominscription']) 
            && !empty($_POST['Userinscription']) && !empty($_POST['Emailinscription']) 
            && !empty($_POST['Phoneinscription']) && !empty($_POST['Cityinscription'])
            && !empty($_POST['Zipinscription']) && ($_POST['Passwordinscription'])) {

            $setuser= $connect->exePrepaQuery($users->setUser(
              $securities->filterString($_POST['Nominscription']),$securities->filterString($_POST['Prenominscription']),
              $securities->filterString($_POST['Userinscription']),$securities->filterString(md5($_POST['Passwordinscription'])),
              $securities->filterString($_POST['Emailinscription']),$securities->filterString($_POST['Phoneinscription']),
              $securities->filterString($_POST['Cityinscription']),$securities->filterString($_POST['Zipinscription'])
              
            ));
            header("location: ./connexion.php");
        }
      ?>
    </main>

</body>
</html>
