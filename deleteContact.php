<?php include_once ("connexion.php");
$uneSuppression = new MaConnexion ("gestion des contacts","","root","localhost");
$uneSuppression->deleteContact_Secure($_POST['ID_Contact']);
header("Location: index.php");
?>