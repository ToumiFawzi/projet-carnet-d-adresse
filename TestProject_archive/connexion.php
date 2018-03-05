<?php
session_start();
use dao\UtilisateurDao;
include 'inc/autoload.inc';
$config = include 'inc/config.inc';


    if (isset($_POST['identifiant']))
    {
        $identifiant = htmlspecialchars($_POST['identifiant']);
    }
    if (isset($_POST['password']))
    {
        $mdp = sha1($_POST['password']);
    }
    
    
if(!isset($identifiant) || !isset($mdp)){
    echo "Bienvenue connectez vous pour plus d'option";
}
elseif(isset($identifiant)&& isset($mdp))
{  
   $userDao = new UtilisateurDao($config);
   $compare =  $userDao->findAllUsers();
   
   foreach ($compare as $utilisateur)
   { 
       if($identifiant === $utilisateur->identifiant && $mdp === $utilisateur->mdp)
       {
           $_SESSION['id'] = $utilisateur->id;
           header("Location: contacts.php");
           exit();
       }
       else{
           $erreur = 'login ou pass incorrect';
          
            }
   }
}

else
  {
  echo "veulliez remplir les champs";
   }


?>



<!doctype html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link 
            rel="stylesheet" 
            href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
            integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
            crossorigin="anonymous">
        <link rel="stylesheet" href="styles/.css">
        <title>Page de connexion</title>
    </head>
<body>
     <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="panel panel-login">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-6">
                                    Pas de compte ?
                                </div>
                                <div class="col-xs-6">
                                   <a  href="inscription.php"> S'enregitrer  </a>
                                    

                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form id="login-form" action="" method="post" role="form" style="display: block;">

                                        <div class="form-group">
                                            <input type="text" name="identifiant" id="identifiant" tabindex="1" class="form-control" placeholder="identifiant" value="">
                                        </div>

                                        <div class="form-group">
                                            <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="mot de passe">
                                        </div>

                                        <input id="connection" type="submit" name="formconnect" value="Se connecter ">

                                        <input type="button" onclick="window.location.replace('connexion.php')" value="Annuler" />

                                        <br/>
                                        <br/>
                                        <br/>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="text-center">
                                                        <a href="" tabindex="5" class="forgot-password">mot de passe oublié ?</a>
                                                        <br/>
                                                        <?php if(isset ($erreur)){ 
                                                        echo '<font color="red">'.$erreur.'</font>';}?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

      
</body>
</html>
