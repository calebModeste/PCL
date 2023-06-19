
<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portal Cheap LInk</title>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
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
        <div class="connexion" id="connexion">
            <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
              <div>
                <label for="emailconnexion">E-mail</label>
                <input type="email" pattern="[\w-\.]+@([\w-]+\.)+[\w-]{2,4}" name="emailconnexion" id="emailconnexion" placeholder=""  required>
              </div>
              <div>
                <label for="passwordconnexion">Mot de passe</label>
                <input type="password" name="passwordconnexion" id="passwordconnexion">
              </div>
              <div class="submit">
                <input type="submit" value="CONNEXION">
              </div>
            </form>
            <div class="inscris">
              <a href="./inscription.php">je m'inscris</a>
            </div>
        </div>
    </div>
    <?php 
      $mail_password=$connect->exePrepaQuery($users->getEmailPassword());
      
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        foreach ($mail_password as $he) {

          if ($he['email']===$_POST['emailconnexion'] && $he['passworld']===md5($_POST['passwordconnexion'])) {
            $_SESSION['user']=$he['pseudo'];
            $_SESSION['id']=$he['id']; 
            header("location: ./index.php");
            exit;
          }
        }
      }


    ?>
    </main>

</body>
</html>
