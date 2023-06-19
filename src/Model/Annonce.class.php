<?php 
namespace Run\Model;

class Annonce{
    function getAllAnnonce(){
        $sql="SELECT
        annonce.id as id,
        annonce.titre as titre,
        categories.titre as categ,
        users.pseudo as pseudo,
        annonce.date_creation as date,
        annonce.prix as prix,
        annonce.description as descript
    FROM
        annonce
    JOIN categories ON categories.id = annonce.categorie_id
    JOIN users ON users.id = annonce.auteur
        ";

        return htmlspecialchars($sql) ;        
    }
    function getAnnonceByTitre(string $titre){
        $sql="SELECT
        annonce.id as id,
        annonce.titre as titre,
        categories.titre as categ,
        users.pseudo as pseudo,
        annonce.date_creation as date,
        annonce.prix as prix,
        annonce.description as descript
    FROM
        annonce
    JOIN categories ON categories.id = annonce.categorie_id
    JOIN users ON users.id = annonce.auteur
    WHERE
    	annonce.titre LIKE '%".htmlspecialchars($titre)."%'";

        return $sql ;        
    }
    function getAnnonceByCategorie(int $categorie){
        $sql="SELECT
        annonce.id as id,
        annonce.titre as titre,
        categories.titre as categ,
        users.pseudo as pseudo,
        annonce.date_creation as date,
        annonce.prix as prix,
        annonce.description as descript
    FROM
        annonce
    JOIN categories ON categories.id = annonce.categorie_id
    JOIN users ON users.id = annonce.auteur
    WHERE
    	annonce.categorie_id =".$categorie;

        return htmlspecialchars($sql) ;        
    }
    function getAnnonceByTitreCategorie(string $titre,int $categorie){
        $sql="SELECT
        annonce.id as id,
        annonce.titre as titre,
        categories.titre as categ,
        users.pseudo as pseudo,
        annonce.date_creation as date,
        annonce.prix as prix,
        annonce.description as descript
    FROM
        annonce
    JOIN categories ON categories.id = annonce.categorie_id
    JOIN users ON users.id = annonce.auteur
    WHERE
        annonce.titre LIKE '%".htmlspecialchars($titre)."%'
        AND
    	annonce.categorie_id =".htmlspecialchars($categorie);

        return $sql ;        
    }
    function getAnnonceByTitrePrix(string $titre,int $prix){
        $sql="SELECT
        annonce.id as id,
        annonce.titre as titre,
        categories.titre as categ,
        users.pseudo as pseudo,
        annonce.date_creation as date,
        annonce.prix as prix,
        annonce.description as descript
    FROM
        annonce
    JOIN categories ON categories.id = annonce.categorie_id
    JOIN users ON users.id = annonce.auteur
    WHERE
        annonce.titre LIKE '%".htmlspecialchars($titre)."%'
        AND
    	annonce.prix <=".htmlspecialchars($prix);

        return $sql ;        
    }

    function getAnnonceByCategoriePrix(int $categorie,int $prix){
        $sql="SELECT
        annonce.id as id,
        annonce.titre as titre,
        categories.titre as categ,
        users.pseudo as pseudo,
        annonce.date_creation as date,
        annonce.prix as prix,
        annonce.description as descript
    FROM
        annonce
    JOIN categories ON categories.id = annonce.categorie_id
    JOIN users ON users.id = annonce.auteur
    WHERE
        annonce.prix <=".htmlspecialchars($prix)."
        AND
    	annonce.categorie_id =".htmlspecialchars($categorie);

        return $sql ;
    }

    function getAnnonceByPrix(int $prix){
        $sql="SELECT
        annonce.id as id,
        annonce.titre as titre,
        categories.titre as categ,
        users.pseudo as pseudo,
        annonce.date_creation as date,
        annonce.prix as prix,
        annonce.description as descript
    FROM
        annonce
    JOIN categories ON categories.id = annonce.categorie_id
    JOIN users ON users.id = annonce.auteur
    WHERE
        annonce.prix <=".htmlspecialchars($prix);

        return $sql ;        
    }

    function getAnnonceByTitreCategoriePrix(string $titre,int $categorie,int $prix){
        $sql="SELECT
                annonce.id as id,
                annonce.titre as titre,
                categories.titre as categ,
                users.pseudo as pseudo,
                annonce.date_creation as date,
                annonce.prix as prix,
                annonce.description as descript
            FROM
                annonce
            JOIN categories ON categories.id = annonce.categorie_id
            JOIN users ON users.id = annonce.auteur
            WHERE
                annonce.titre LIKE '%".htmlspecialchars($titre)."%'
                AND
                annonce.prix <=".htmlspecialchars($prix)."
                AND
                annonce.categorie_id =".htmlspecialchars($categorie);

        return $sql ;        
    }
    function getAnnonceById(int $id){
        $sql="SELECT
                annonce.titre,
                categories.titre as cate,
                users.pseudo,
                auteur,
                date_creation,
                prix,
                description
            FROM
                annonce
            JOIN users ON users.id = annonce.auteur
            JOIN categories ON categories.id = annonce.categorie_id
            WHERE
                annonce.id =".$id;

        return htmlspecialchars($sql) ;
    }
    function getFavoris(int $user){
        $sql="SELECT
                favoris_id,
                annonce_id,
                user
            FROM
                `favoris`
            WHERE
                favoris.user =".$user;

        return htmlspecialchars($sql) ;
    }
    
    function setfavoris(int $user,int $annonce){
        $sql="INSERT INTO favoris(
            favoris.annonce_id,
            favoris.user
        )
        VALUES(".$annonce.", ".$user.")";

        return htmlspecialchars($sql) ;
    }
    function setOffre(int $auteur,int $offre,int $idAnnonce){
        $sql="INSERT INTO `offre`(
                `auteur_offre`,
                `proposition`,
                `annonce_id`
            )
            VALUES(
                ".$auteur.",
                ".$offre.",
                ".$idAnnonce."
            )";

        return htmlspecialchars($sql);
    }
    function getOffre(int $idUser, int $idAnnonce){
        $sql="SELECT
                users.pseudo,
                offre.proposition,
                annonce.titre
            FROM
                offre
            JOIN users ON users.id = offre.auteur_offre
            JOIN annonce ON annonce.id = offre.annonce_id
            WHERE
                offre.auteur_offre =".$idUser." AND offre.annonce_id =".$idAnnonce."
            ORDER BY offre.offre_id DESC";

        return htmlspecialchars($sql);
    }
    function deletefavoris(int $idFav){
        $sql="DELETE
            FROM
                favoris
            WHERE
                favoris_id =".$idFav;

        return htmlspecialchars($sql);
    }
    function getAllCategorie(){
        $sql="SELECT
                categories.id as cateId,
                categories.titre as cate
            FROM
                categories";

        return htmlspecialchars($sql) ;
    }
    function getCategoriesById(int $idCategorie){
        $sql="SELECT
                titre
            FROM
                categories
            WHERE
                id =".$idCategorie;

        return htmlspecialchars($sql) ;
    }
}