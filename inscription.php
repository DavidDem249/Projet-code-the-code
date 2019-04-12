<?php
$base = new PDO('mysql:host=localhost;dbname=codethecode', 'root', '');
if(!empty($_POST)) 
    {
        $nom               = verify($_POST['nom_compagnie']);
        $password        = verify($_POST['password']);
        $contact            = verify($_POST['contact_compagnie']);
        $commune           = verify($_POST['commune_compagnie']); 
        $image              = verify($_FILES["image"]["name"]);
        $imagePath          = 'image/'. basename($image);
        $imageExtension     = pathinfo($imagePath,PATHINFO_EXTENSION);
        $isSuccess          = true;
        $isUploadSuccess    = false;
        
            $isUploadSuccess = true;
            if($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif" ) 
            {
                $imageError = "Les fichiers autorises sont: .jpg, .jpeg, .png, .gif";
                $isUploadSuccess = false;
            }
            if(file_exists($imagePath)) 
            {
                $imageError = "Le fichier existe deja";
                $isUploadSuccess = false;
            }
            if($_FILES["image"]["size"] > 500000) 
            {
                $imageError = "Le fichier ne doit pas depasser les 500KB";
                $isUploadSuccess = false;
            }
            if($isUploadSuccess) 
            {
                if(!move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)) 
                {
                    $imageError = "Il y a eu une erreur lors de l'upload";
                    $isUploadSuccess = false;
                } 
            } 
        
        
        if($isSuccess && $isUploadSuccess) 
        {
            $statement = $base->prepare("INSERT INTO compagnie (nom_compagnie, contact, password, logo_compagnie, commune) values(?, ?, ?, ?, ?)");
            $statement->execute(array($nom,$contact,$password,$image,$commune));
            header("Location: index.php");
        }
    }

    function verify($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
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
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <title>Document</title>
</head>
<body>
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
            <form action="inscription.php" method="post" class="offset-2 col-8">
                <input class="form-control" type="text" name="nom_compagnie" placeholder="Nom de votre compagnie">
                <input class="form-control" type="password" name="password" placeholder="Password">
                <input class="form-control" type="tel" name="contact_compagnie" placeholder="Contact">
                <input class="form-control" type="text" name="commune_compagnie" placeholder="Commune">
                <select name="" class="form-control">
                <option value="">Forfait de souscription...</option>
                    <option value="">mini </option>
                    <option value="">moyen </option>
                    <option value="">max </option>

                </select>
                <input class="form-control" type="file" name="image">
                <input class="form-control" type="submit" value="Valider">
                
            </form>
        </div>
    </div>
</body>
</html>