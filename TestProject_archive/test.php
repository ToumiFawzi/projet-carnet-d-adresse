<?php
include 'inc/autoload.inc';
use domaine\Utilisateur;
use dao\UtilisateurDao;
use domaine\Contact;
use dao\ContactDao;
?>
<?php
$config = include 'inc/config.inc';

$id = 4;
$nom = "baba";  
$prenom= "baba";
$mail = "fawzi.t@hotmail";
$identifiant = "Fawzit"; 
$mdp = "123" ;  
$user = new Utilisateur($id, $nom, $prenom, $mail, $identifiant, $mdp);

$userDao = new UtilisateurDao($config);
//$utilisateur = new Utilisateur("1","toto", "toto", "toto", "toto", "toto","toto");
//$test = $userDao->insertUser($utilisateur);fonctionne
/*$user2 = new Utilisateur(null, "titi",  "titi", "titi", "titi", "titi");*/
//$test2 =$userDao->insertUser($user2);

//$suprim = $userDao->deleteUser(2); fonctionne

//$user3 = new Utilisateur(4,"tata", "tata", "tata", "tata", "tata");
//$edit = $userDao->updateUser($user3);fonctionne

//var_dump($search = $userDao->findUserById(3)); fonctionne

//var_dump($searchAll = $userDao->findAllUsers());fonctionne

/*$contactDao = new ContactDao($config);
$contact1 = new Contact(null,"titi", "fawz", "0901010101","fawzi.t@hotmail.fr",1);
$contactDao->insertContact($contact1); fonctionne inserer contact*/

//suprimer contact
//$delete = $contactDao->deleteContact(3);fonctionne

/*editer un contact*/
/*$contact2 = new Contact($id, $nom, $prenom, "01010102", $mail,8);
$edit = $contactDao->updateContact($contact2); fonctionne*/ 

//read readby id
//var_dump($searchcont = $contactDao->findContactById(4)); //fonctionne

//var_dump($searchcontAll = $contactDao->findAllContact()); //fonctionne







?>



<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>First PHP with Eclipse</title>
  <link rel="stylesheet" href="styles/style.css">
</head>
<body>
  <h1><?php echo "Hello ".$user->nom." ".$user->prenom." !" ?></h1>
  <h2><?php echo "DB : ".$config['db.host'].":".$config['db.name'] ?></h2> -->
</body>
</html>