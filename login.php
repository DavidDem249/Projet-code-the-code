
<?php

    $erreur = "";
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $base = new PDO('mysql:host=localhost;dbname=codethecode', 'root', '');
        $req = $base->prepare("SELECT * FROM clientd WHERE email = ? AND mdp = ?");
        $req->execute(array($_POST['email'], $_POST['mdp']));
        $result = $req->fetch();
        $count = $req->rowCount();
        if ($count >= 1){
            session_start();
            $_SESSION['nom'] = $result['nom'];
            header("location: acceuil.php");
        }
        else {
            $erreur = "Email ou mot de passe inexistant";
        }
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
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <title>CONNEXION</title>
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
                    NOUS VOUS PRIONS DE BIEN VOULOIR VOUS CONNECTER AFIN D'EFFECTUER TOUTE EVENTUELLE RESERVATION.
                </span>
            </div>
        </div>
        <div class="col-6 droite login">
            <span class="col-8"><i class="fas fa-signature"></i> CONNEXION</span>
            <form action="" method="post" class="offset-2 col-8">
                <input class="form-control" type="email" name="email" placeholder="Email">
                <input class="form-control" type="password" name="mdp" placeholder="Password">
                <input class="form-control" type="submit" value="Valider">
            </form>
            <?php echo $erreur ?>
        </div>
    </div>
</body>
</html>