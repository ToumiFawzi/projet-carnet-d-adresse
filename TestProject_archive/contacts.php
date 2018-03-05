<?php
session_start();
use dao\ContactDao;
include 'inc/autoload.inc';
?>
<?php
$config = include 'inc/config.inc';
$contactDao = new ContactDao($config);
$contacts  = $contactDao->findAllContactByUserId($_SESSION['id']);
?>

<!doctype html>
    <html lang="fr">
    <head>
      <meta charset="utf-8">
      <title>Liste des contacts</title>
      <link rel="stylesheet" href="styles/style.css">
      <link 
            rel="stylesheet" 
            href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
            integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
            crossorigin="anonymous">
    </head>
    <body>
    
    	<h1>Liste des Contacts</h1>
    	<br />
		<div>          
        	<a href="addContactView.php?id=<?php echo $_SESSION['id']?>" class="btn black-background text-white">
    			<span class="glyphicon glyphicon-plus text-white"></span> ajouter un contact
  			</a>
        </div>
		<br />

    	<table class="table table-striped">
	  		<thead>
	  			<tr>
	  			    <th>#</th>
	  				<th>Nom</th>
	  				<th>Prénom</th>
	  				<th>Tel</th>
	  				<th>mail</th>
	  				<th>Editer</th>
	  				<th>suprimer</th>
	  			</tr>
	  		</thead>
	  		<tbody>
<?php
              
               foreach ($contacts as $contact) { 
            
                   ?>
	  			<tr>
	  				<th scope="row"><?php echo $contact->id ?> </th> 
	  				<td><?php echo $contact->nom ?></td>
	  				<td><?php echo $contact->prenom ?></td> 
	  				<td><?php echo $contact->tel ?></td>
	  				<td><?php echo $contact->mail ?></td>
	  				<td><a href="editContactview.php?id=<?php $contact->id ?>"><span class="glyphicon glyphicon-pencil text-black"></span></a></td>
	  				<td><a href="supContactview.php?id=<?php $contact->id ?>"><span class="glyphicon glyphicon-trash text-black"></span></a></td>
	  				
	  			</tr>
<?php 
                }
?>	  			
	  		</tbody>
      	</table>
      
    </body>
    <script 
        src="https://code.jquery.com/jquery-3.2.1.js"
        integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
        crossorigin="anonymous"></script>

    <script 
        src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" 
        crossorigin="anonymous"></script>
</html>