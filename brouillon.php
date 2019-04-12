<?php 
$base = new PDO('mysql:host=localhost;dbname=codethecode', 'root', '');

if (isset($_GET['compagnie'])) {
    $id_compagnie=$_GET['compagnie'];
$req=$base->query("SELECT * FROM compagnies WHERE id_compagnie=$id_compagnie");
$compagnie = $req->fetch();
}
$today=date('Y-m-d H:i:s');

$nom=$prenom=$numero=$destination=$date_depart=$heure_depart=$nom_erreur=$numero_erreur=$prenom_erreur=$destination_erreur=$date_depart_erreur=$heure_depart_erreur="";
if(isset($_POST['reserver'])){
    echo $nom=verify($_POST['nom']);
    echo $prenom=verify($_POST['prenom']);
    echo $numero=verify($_POST['numero']);
    echo $destination=verify($_POST['destination']);
    echo $heure_depart=verify($_POST['heure']);
    echo $date_depart=verify($_POST['date']);
    echo $success=true;

    if(empty($nom)){
        $nom_erreur="Veuillez saisir votre nom";
        $success=false;
    }
    if(empty($prenom)){
        $prenom_erreur="Veuillez saisir votre prenom";
        $success=false;
    }
    if(empty($numero)){
        $numero_erreur="Veuillez saisir votre numero";
        $success=false;
    }
    if(empty($destination)){
        $destination_erreur="Veuillez saisir votre destination";
        $success=false;
    }
    if(empty($nom)){
        $nom_erreur="Veuillez saisir votre nom";
        $success=false;
    }
    if(empty($date_depart)){
        $date_depart_erreur="Veuillez saisir votre date de reservation";
        $success=false;
    }
    if(empty($heure_depart)){
        $heure_depart_erreur="Veuillez saisir votre heure de reservation";
        $success=false;
    }

    if($success){
        
        $req=$base->prepare("INSERT INTO reservation(id_compagnie, nom_client, prenom_client, heure_depart, date_reservation, date_depart, destination) VALUES (?,?,?,?,?,?,?)");
        $req->execute(array($id_compagnie, $nom, $prenom, $heure_depart,$today, $date_depart, $destination
        
    ));

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
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="reservation.css">
    <title>RESERVATION</title>
</head>
<body>
    

<h1><?php echo $compagnie['nom_compagnie'];?></h1>
    <div class="texte"></div>
    <div class="offset-2 col-8 p-0 row">
        <form action="reservation.php" method="post" class="col-12 p-4 reservation  p-0 row">

            <input type="text" class="i1 form-control" name="nom" placeholder="Nom">
            <input type="text" class="i2 form-control" name="prenom" placeholder="Prenoms">
            <input type="text" class="i3 form-control" name="numero" placeholder="Contact">

           <select name="destination" id="" class="form-control">
                <option value="">Destination...</option>
                <option value="bouake" name="">BOUAKE</option>
                <option value="daloa" name="">DALOA</option>
                <option value="korhogo" name="">KORHOGO</option>
            </select>
            <span class="col-6 p-0">DATE DE DEPART</span>
            <span class="col-6 p-0">HEURE DE RESERVATION</span>
            <input type="date" name="date"  class="form-control col-6">
            <select name="heure" class="form-control col-6">
                    <option value="matin">8h</option>
                    <option value="midi">14h</option>
                    <option value="soir">18h</option>
                </select>
            <input type="submit" class="form-control col-12" name="reserver" value="reserver">
        </form>
        <div class="codethecode"></div>
    </div>
</body>
</html>






<div class="texte"><?php echo $compagnie['nom_compagnie'];?></div>
    <div class="offset-2 col-8 p-0 row">
            <span class="col-8"><i class="fas fa-signature"></i> INSCRIPTION</span>
            
            <form action="reservation.php?compagnie=<?php echo $compagnie['id_compagnie'];?>" method="post" class="col-12 p-4 reservation  p-0 row">
                <input class="form-control" type="text" name="nom" placeholder="nom">
                <span><?php echo $nom_erreur;?></span>
                <input class="form-control" type="text" name="prenom" placeholder="prenom">
                <input class="form-control" type="number" name="numero" placeholder="Numero">
                <select name="destination" >
                    <option value="daloa">Daloa</option>
                    <option value="bouake">Bouaké</option>
                    <option value="korhogo">Korhogo</option>
                </select>
                <input class="form-control" type="date" name="date" >
                <select name="heure" >
                    <option value="matin">Matin</option>
                    <option value="midi">Bouaké</option>
                    <option value="soir">Soir</option>
                </select>
                <input class="form-control" type="submit" name="reserver" value="reserver">
            </form>
        </div>
        <div class="codethecode"></div>
    </div>