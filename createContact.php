<?php include_once ("connexion.php");
$uneInsertion = new MaConnexion ("gestion des contacts","","root","localhost");
$uneInsertion->insertContact_Secure($_POST['nom'],$_POST['prenom'],$_POST['Email'],$_POST['imageProfil']);
header("Location: index.php");
?>