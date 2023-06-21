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
          if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['message'])&& isset($_GET['receve']) && isset($_GET['cas'])) {
              echo $_GET['cas'];                              
              if ($_GET['cas']==1) {
              $message = $connect->exePrepaQuery(
                $chat->setmessageU1(
                  $_SESSION['id'],
                  $_GET['receve'],
                  $_POST['message']
                  )
              );
              header("location: ./chat.php");
              }
              if ($_GET['cas']==2) {
              $message = $connect->exePrepaQuery(
                $chat->setmessageU2(
                  $_GET['receve'],
                  $_SESSION['id'],
                  $_POST['message']
                  )
              );
              header("location: ./chat.php");
              } 
          }

        ?>





        <section class="message">
          <div class="discussion">

            <?php
              if(isset($_SESSION['id']) && !empty($_SESSION['id'])):
                $us= $connect->exePrepaQuery($users->getEmailPassword());
                foreach ($us as $u):
                  $discusion= $connect->exePrepaQuery($chat->getDiscusssion($_SESSION['id'],$u['id']));
                  foreach ($discusion as $dis):
                    if($dis['user1_id']==$_SESSION['id'] && $dis['user2_id']!=$_SESSION['id']):?>

                <a href="./chat.php?receve=<?=$dis['user2_id']?>&cas=1">
                  <p>userid: <?= $dis['user2_id'] ?></p>
                </a>

            <?php endif; 
                  if($dis['user1_id']!=$_SESSION['id'] && $dis['user2_id']==$_SESSION['id']):?>

                <a href="./chat.php?receve=<?=$dis['user1_id']?>&cas=2">
                  <p>userid <?= $dis['user1_id'] ?></p>
                </a>

            <?php endif;endforeach;endforeach;endif;?>

          </div>
          <div class="chat">
              <div class="fildiscusion">
                <?php  
                
                if ((isset($_GET['receve']) && !empty($_GET['receve'])) && (isset($_SESSION['id']) && !empty($_SESSION['id']))):
                  $filDiscussion=$connect->exePrepaQuery($chat->getChat($_SESSION['id'],$_GET['receve']));
                  foreach($filDiscussion as $fil):
                ?>
                    

                    <?php
                      if($_SESSION['id']==$fil['u1']): 
                        if($fil['mU1']!=null):
                           
                      ?>
                      <div class="sender">
                        <span>cas1 user: <?=$_SESSION['user']?></span>
                        <p>
                          
                          <?=$fil['mU1']?>
                        </p>
                        <p><?=$fil['send_at']?></p>
                      </div>

                    <?php endif; if($fil['mU2']!=null): 
                      $names=$connect->exePrepaQuery($users->getUserById($fil['u2']));
                      foreach($names as $name):
                      ?>

                      <div class="recever">
                        <span>cas1 user:<?=$name['pseudo']?></span>
                          <p>
                          <?=$fil['mU2']?>
                          </p>
                          <p><?=$fil['send_at']?></p>
                      </div>
                    <?php endforeach;endif;endif; ?>


                    
                    <?php
                      if($_SESSION['id']==$fil['u2']): 
                        if($fil['mU2']!=null):  
                        
                        ?>
                      <div class="sender">
                        <span>Cas2 user: <?=$_SESSION['user']?></span>
                        <p>
                          <?=$fil['mU2']?>
                        </p>
                        <p><?=$fil['send_at']?></p>
                      </div>

                    <?php endif; if($fil['mU1']!=null): 
                      $names=$connect->exePrepaQuery($users->getUserById($fil['u1']));
                      foreach($names as $name):
                      ?>

                      <div class="recever">
                        <span>cas2 user:<?=$name['pseudo']?></span>
                          <p>
                          <?=$fil['mU1']?>
                          </p>
                          <p><?=$fil['send_at']?></p>
                      </div>
                    <?php endforeach;endif; endif; ?>

                <?php  
                    endforeach;endif;
                ?>
              </div>
              <div class="sendmessage">
                <form action="./chat.php<?=$parame = (isset($_GET['receve'])) ? "?receve=".$_GET['receve'] : "" ;?>&<?=$cas = (isset($_GET['cas'])) ? "cas=".$_GET['cas'] : "" ;?>" method="post">
                  <textarea name="message"></textarea>
                  <input type="submit" value="envoyer">
                </form>
              </div>

          </div>
        </section>


    </main>

</body>
</html>
