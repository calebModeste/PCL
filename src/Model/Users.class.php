<?php 
namespace Run\Model;

class Users{
    

    function getAllUsers(){
        $sql="SELECT * FROM users";

        return htmlspecialchars($sql);
    }
    function getEmailPassword(){
        $sql="SELECT
                id,
                pseudo,
                passworld,
                email
            FROM
                users";
        return htmlspecialchars($sql);
    }
    function getUserById($id){
        $sql="SELECT
        nom,
        prenom,
        pseudo,
        email,
        telephone,
        ville,
        codePostal
    FROM
        users
    WHERE
        users.id =".$id;

        return htmlspecialchars($sql);
    }
    function getUserByname(string $pseudo){
        $sql="SELECT
        id,
        nom,
        prenom,
        email,
        telephone,
        ville,
        codePostal
    FROM
        users
    WHERE
        users.pseudo =".$pseudo;

        return htmlspecialchars($sql);
    }
    function setUser(string $nom,string $prenom,string $pseudo,string $passworld,string $email,string $telephone,string $ville,string $codePostal){
        $sql="INSERT INTO users(
            nom,
            prenom,
            pseudo,
            passworld,
            email,
            telephone,
            ville,
            codePostal
        )
        VALUES(
            '".$nom."',
            '".$prenom."',
            '".$pseudo."',
            '".$passworld."',
            '".$email."',
            '".$telephone."',
            '".$ville."',
            '".$codePostal."'
        )";

        return $sql;
    }
}