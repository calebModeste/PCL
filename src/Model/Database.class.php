<?php 
namespace Run\Model;

use PDO;
use PDOException;

class DataPDO{
    private static $host = 'localhost';
    private static $dbname = 'datamarket';
    private static $user = 'admin';
    private static $password = 'irhonagasaki7*';
    private static $option=[
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::FETCH_OBJ,
        PDO::ATTR_PERSISTENT => true,
    ];
    private static $connect;
  
    private function getPdo(){
        ///Connection a la base de donnée en PDO 
        try{
            self::$connect = new PDO('mysql:host='.self::$host.';dbname='.self::$dbname.';charset=utf8;',
            self::$user,
            self::$password,
            self::$option
        );
        }
        catch(PDOException $exption){
            echo "ERREUR : ". $exption->getMessage();
        }
    }
    public function executeQuery(){
        $sql = "SELECT * FROM etudiant";
        echo $this->getPdo();
        $result = self::$connect->query($sql);

        return $result;
        
    }
    public function exePrepaQuery(string $sql){
        $this->getPdo();
        $result = self::$connect->prepare($sql);
        $result->execute();
        return $result;
    }
}