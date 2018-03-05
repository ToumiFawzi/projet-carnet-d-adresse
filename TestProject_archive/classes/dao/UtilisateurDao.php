<?php
namespace dao;

use domaine\Utilisateur;

class UtilisateurDao extends DaoBdd
{

    public function ___construct($config)
    {
        parent::___construct($config);                                      
    }

    public function findAllUsers() {
        
        $result = [];
        
        $reponse = $this->bdd->query("SELECT * FROM utilisateurs order by id");
        
        while ($donnees = $reponse->fetch()) {
            
           
            $nom = $donnees["nom"];
            $prenom = $donnees["prenom"];
            $mail = $donnees["mail"];
            $identifiant = $donnees["identifiant"];
            $mdp = $donnees["mdp"];
            
            $utilisateur = new Utilisateur($nom, $prenom, $mail, $identifiant, $mdp);
            
            $result[] = $utilisateur;
            $utilisateur->id = $donnees["id"];
        }
        
        return $result;
    }
    
    public function findUserById($id) {
        
        $result;
        
        $query = $this->bdd->prepare("SELECT id, nom, prenom, mail, identifiant, mdp FROM utilisateurs where id = :id");
        
        $query->bindParam(":id", $id);
        
        if ($query->execute()) {
            
            if ($donnees = $query->fetch()) {
                
                $id = $donnees["id"];
                $nom = $donnees["nom"];
                $prenom = $donnees["prenom"];
                $mail = $donnees["mail"];
                $identifiant = $donnees["identifiant"];
                $mdp = $donnees["mdp"];
                
                $result = new Utilisateur($id, $nom, $prenom, $mail, $identifiant, $mdp);
            }
        }
        
        return $result;
    }
    
    public function insertUser($utilisateur)
    {
        $result;
        
        $query = $this->bdd->prepare("INSERT INTO utilisateurs (nom, prenom, mail, identifiant, mdp) VALUES (:nom, :prenom, :mail, :identifiant, :mdp)");
        
        $query->bindParam(":nom", $utilisateur->nom);
        $query->bindParam(":prenom", $utilisateur->prenom);
        $query->bindParam(":mail", $utilisateur->mail);
        $query->bindParam(":identifiant", $utilisateur->identifiant);
        $query->bindParam(":mdp", $utilisateur->mdp);
        
        $query->execute();
        
        $id = $this->bdd->lastInsertId();
        
        $utilisateur->id = $id;
        
        return $id;
        
        
    }
    public function deleteUser($id) {
        
        $query = $this->bdd->prepare("DELETE FROM utilisateurs WHERE id = :id");
        
        $query->bindParam(":id", $id);
        
        $query->execute();
    }
    public function updateUser($utilisateur) {
        
        $result;
        
        $query = $this->bdd->prepare("UPDATE utilisateurs SET nom = :nom, prenom = :prenom, mail = :mail, identifiant = :identifiant, mdp = :mdp WHERE id = :id");
        
        $query->bindParam(":nom", $utilisateur->nom);
        
        $query->bindParam(":prenom", $utilisateur->prenom);
        
        $query->bindParam(":mail", $utilisateur->mail);
        
        $query->bindParam(":identifiant", $utilisateur->identifiant);
        
        $query->bindParam(":mdp", $utilisateur->mdp);
        
        $query->bindParam(":id", $utilisateur->id);
        
     
        $query->execute();
    }
}