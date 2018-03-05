<?php
namespace domaine;

class Contact
{
    public $id;

    public $nom;

    public $prenom;

    public $tel; //propriété

    public $mail;

    public $utilisateur_id;
    

    public function __construct( $id,$nom, $prenom, $tel, $mail, $utilisateur_id)
    { // constructeur
        
        $this->id = $id;
        
        $this->nom = $nom;
        
        $this->prenom = $prenom;
        
        $this->tel = $tel;      
        
        $this->mail = $mail;
        
        $this->utilisateur_id = $utilisateur_id;
    }
}
