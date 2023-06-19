<?php 
// CALL CLASS
    use Run\Model\DataPDO;
    use Run\Model\Users;
    use Run\Model\Annonce;
    use Run\Model\Chat;
    use Run\Security\Security;

// REQUIRE
require('./src/Model/Database.class.php');
require('./src/Model/Users.class.php');
require('./src/Model/Annonce.class.php');
require('./src/Model/Chat.class.php');
require('./src/Security/Security.class.php');

//INSTANCE
$connect = new DataPDO;
$users= new Users;
$annonce = new Annonce;
$chat = new Chat;
$securities = new Security;




//test

$getuseByid = $users->getUserById(4);
$use = $connect->exePrepaQuery($users->getAllUsers());