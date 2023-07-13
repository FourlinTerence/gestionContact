<?php include_once("connexion.php");
$gestionDesContacts = new MaConnexion("gestion des contacts", "", "root", "localhost"); ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gestion des contacts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <nav>
            <h1>GESTION DES CONTACT</h1>
        </nav>
        <div class="premierePartie">
            <h1>Gerez vos contacts en toute simplicité</h1>
        </div>
    </header>
    <main>
        <input type="button" class="create" value="Ajouter un contact" data-bs-toggle="modal" data-bs-target="#create">
        <section class="deuxiemePartie">

            <?php $contact = $gestionDesContacts->select("contact", "*");
            foreach ($contact as $uneDonnees) {
                echo ' 
            <form>
                <div class="carteAvecBouton">
                    <h3 class="texteCarteAvecBouton">' . $uneDonnees['nom'] . ' ' . $uneDonnees['prenom'] . '</h3>
                    <img src="' . $uneDonnees['imageProfil'] . '" alt="avatar de ' . $uneDonnees['nom'] . '">
                    <p class="texteItalique">Adresse mail: ' . $uneDonnees['email'] . '</p>
                    <button class="boutonCarte1" type="button" data-bs-toggle="modal" data-bs-target="#modifContact'.$uneDonnees['ID_Contact'].'">
                    Modifier ce contact
                    </button>
                    <button class="boutonCarte2" type="button" data-bs-toggle="modal" data-bs-target="#deleteContact'.$uneDonnees['ID_Contact'].'">
                    Supprimer ce contact
                    </button>
                </div>
            </form>';
            }
            ?>
        </section>


        <!-- Modal Create -->
        <form method="post" action="updateContact.php">
            <div class="modal fade" id="create" tabindex="-1" aria-labelledby="createLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title fs-5" id="createLabel">Ajouter un contact</h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <label for="createNom">Nom du contact</label>
                            <input id="createNom" class="form-control" type="text" name="nom">
                            <label for="createPrenom">Prenom du contact</label>
                            <input id="createPrenom" class="form-control" type="text" name="prenom">
                            <label for="createEmail">Email du contact</label>
                            <input id="createEmail" class="form-control" type="text" name="Email">
                            <label for="createImage">Lien vers image du profil</label>
                            <input id="createImage" class="form-control" type="text" name="imageProfil">

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Confirmer</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>

                        </div>
                    </div>
                </div>
            </div>
        </form>

        
        <!-- Modal Update -->
        <?php 
        foreach ($contact as $uneDonnees){
        echo '
        <form action="modifContact.php" method="post">
            <div class="modal fade" id="modifContact'.$uneDonnees['ID_Contact'].'" tabindex="-1" aria-labelledby="modifLabel'.$uneDonnees['ID_Contact'].'" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title fs-5" id="modifLabel'.$uneDonnees['ID_Contact'].'">Modifier le contact '.$uneDonnees['nom'].'</h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <label for="modifNom'.$uneDonnees['ID_Contact'].'">Nom du contact</label>
                            <input id="modifNom'.$uneDonnees['ID_Contact'].'" class="form-control" type="text" name="nom" value="'.$uneDonnees['nom'].'" aria-label="default input example">
                            <label for="modifPrenom'.$uneDonnees['ID_Contact'].'">Prenom du contact</label>
                            <input id="modifPrenom'.$uneDonnees['ID_Contact'].'" class="form-control" type="text" name="prenom" value="'.$uneDonnees['prenom'].'" aria-label="default input example">
                            <label for="modifEmail'.$uneDonnees['ID_Contact'].'">Email du contact</label>
                            <input id="modifEmail'.$uneDonnees['ID_Contact'].'" class="form-control" type="text" name="Email" value="'.$uneDonnees['email'].'" aria-label="default input example">
                            <label for="modifImage'.$uneDonnees['ID_Contact'].'">Lien vers image du profil</label>
                            <input id="modifImage'.$uneDonnees['ID_Contact'].'" class="form-control" type="text" name="imageProfil" value="'.$uneDonnees['imageProfil'].'" aria-label="default input example">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Confirmer</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>

                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" class="form-control" name="ID_Contact" value="'.$uneDonnees['ID_Contact'].'">
        </form>';
        }

        foreach ($contact as $uneDonnees){
            echo '
            <form action="deleteContact.php" method="post">
                <div class="modal fade" id="deleteContact'.$uneDonnees['ID_Contact'].'" tabindex="-1" aria-labelledby="deleteLabel'.$uneDonnees['ID_Contact'].'" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title fs-5" id="deleteLabel'.$uneDonnees['ID_Contact'].'">Supprimer le contact '.$uneDonnees['nom'].'</h3>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Etes vous sur de vouloir supprimer '.$uneDonnees['nom'].' '.$uneDonnees['prenom'].' de la liste de contact?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Confirmer</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
    
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" class="form-control" name="ID_Contact" value="'.$uneDonnees['ID_Contact'].'">
            </form>';
            }
        ?>


    </main>

    <footer>
        <p>&copy;FOURLIN Terence 's application. Tous droits réservés.</p>
    </footer>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>