<?php include_once ("connexion.php");
$uneMiseAJour = new MaConnexion ("gestion des contacts","","root","localhost");
$uneMiseAJour->miseAJourContact_Secure($_POST['nom'],$_POST['prenom'],$_POST['Email'],$_POST['imageProfil'],$_POST['ID_Contact']);
header("Location: index.php");
?>