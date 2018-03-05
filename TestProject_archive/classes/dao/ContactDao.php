<?php
namespace dao;

use domaine\Contact;
                                        
    class ContactDao extends DaoBdd
    {
        
        public function ___construct($config)
        {
            parent::___construct($config);
        }
        
        public function findAllContactByUserId($utilisateur_id) {
            
            $result = [];
            
            $reponse = $this->bdd->prepare("SELECT nom, prenom, tel, mail,id FROM contacts WHERE utilisateur_id = :utilisateur_id");
            
            $reponse->bindParam(":utilisateur_id", $utilisateur_id);
            
          if($reponse->execute()){
              
          
            while ($donnees = $reponse->fetch()) {
            
               
                $nom = $donnees["nom"];
                $prenom = $donnees["prenom"];
                $tel = $donnees["tel"];
                $mail = $donnees["mail"];
                $id = $donnees["id"];
                
                $contact = new Contact( $id,$nom, $prenom, $tel, $mail, $utilisateur_id);
                
                $result[] = $contact;
            }
          }
            
            return $result;
         
        }
        
        
        
        public function findContactById($id) {
            
            $result;
            
            $query = $this->bdd->prepare("SELECT id, nom, prenom, tel, mail, utilisateur_id FROM contacts where id = :id");
            
            $query->bindParam(":id", $id);
            
            if ($query->execute()) {
                
                if ($donnees = $query->fetch()) {
                    
                    $id = $donnees["id"];
                    $nom = $donnees["nom"];
                    $prenom = $donnees["prenom"];
                    $tel = $donnees["tel"];
                    $mail = $donnees["mail"];
                    $utilisateur_id = $donnees["utilisateur_id"];
                   
                    
                    $result = new Contact($id, $nom, $prenom, $tel, $mail, $utilisateur_id);
                }
            }
            
            return $result;
        }
        
        public function insertContact($contact)
        {
            $result;
            
            $query = $this->bdd->prepare("INSERT INTO contacts (nom, prenom, tel, mail, utilisateur_id) VALUES (:nom, :prenom, :tel, :mail, :utilisateur_id)");
            
            $query->bindParam(":nom", $contact->nom);
            $query->bindParam(":prenom", $contact->prenom);
            $query->bindParam(":tel", $contact->tel);
            $query->bindParam(":mail", $contact->mail);
            $query->bindParam(":utilisateur_id", $contact->utilisateur_id);
            
            $query->execute();
            
            $id = $this->bdd->lastInsertId();
            
            $contact->id = $id;
            
            return $id;
                
        }
        
        public function deleteContact($id) {
            
            $query = $this->bdd->prepare("DELETE FROM contacts WHERE id = :id");
            
            $query->bindParam(":id", $id);
            
            $query->execute();
        }
        public function updateContact($contact) {
            
            $result;
            
            $query = $this->bdd->prepare("UPDATE contacts SET nom = :nom, prenom = :prenom, tel = :tel, mail = :mail WHERE id = :id");
            
            $query->bindParam(":nom", $contact->nom);
            
            $query->bindParam(":prenom", $contact->prenom);
            
            $query->bindParam(":tel", $contact->tel);
            
            $query->bindParam(":mail", $contact->mail);
            
            $query->bindParam(":id", $contact->id);
            
            
            $query->execute();
        }
    }


