<?php
namespace domaine;

class Utilisateur
{

    public $id;

    public $nom;

    public $prenom;

    public $mail;

    public $identifiant;

    public $mdp;

    public function __construct( $nom, $prenom, $mail, $identifiant, $mdp)
    {
       
        
        $this->nom = $nom;
        
        $this->prenom = $prenom;
        
        $this->mail = $mail;
        
        $this->identifiant = $identifiant;
        
        $this->mdp = $mdp;
    }
}