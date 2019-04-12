<?php
    session_start();

    $nom = $prenom = $contact = $email = $mdp = $er_prenom = $er_nom = $er_contact =$er_email = $er_mdp =  "";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];

        $base = new PDO('mysql:host=localhost;dbname=codethecode', 'root', '');
        $req = $base->prepare("INSERT INTO clientd (nom,prenom,email,mdp,contact)VALUES(?,?,?,?,?)");
        $req->execute(array($nom,$prenom,$email,$mdp,$contact));
        session_start();
        $_SESSION['nom'] = $_POST['nom'];
        header("location: index.php");
        
    }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="inscrit.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <title>INSCRIPTION</title>
</head>
<body>
<div class="row codethecode">
        <a href="index.php" class="col-4">ACCUEIL</a>
        <a href="inscrit.php" class="col-4">INSCRIPTION</a>
        <a href="login.php" class="col-4">CONNEXION</a>
    </div>
    <div class="inscription row">
        <div class="col-6 gauche">
            <div class="information text-center">
                <span class="text-center">
                    NOUS VOUS PRIONS DE BIEN VOULOIR VOUS INSCRIRE A NOTRE FORMULAIRE POUR BENEFICIER DE 5% DE REDUCTION SUR TOUTES VOS RESERVATIONS PENDANT 1 MOIS
                </span>
            </div>
        </div>
        <div class="col-6 droite">
            <span class="col-8"><i class="fas fa-signature"></i> INSCRIPTION</span>
            <form action="" method="POST" class="offset-2 col-8">
                <input class="form-control" type="text" name="nom" placeholder="Nom">
                <input class="form-control" type="text" name="prenom" placeholder="Prénoms">
                <input class="form-control" type="email" name="email" placeholder="Email">
                <input class="form-control" type="password" name="mdp" placeholder="Password">
                <input class="form-control" type="tel" name="contact" placeholder="Contact">
                <input class="form-control" type="submit" name="valider" value="Valider">
            </form>
        </div>
    </div>
</body>
</html>