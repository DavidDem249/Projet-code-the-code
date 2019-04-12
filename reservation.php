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
    $nom=verify($_POST['nom']);
    $prenom=verify($_POST['prenom']);
    $numero=verify($_POST['numero']);
    $destination=verify($_POST['destination']);
    $heure_depart=verify($_POST['heure']);
    $date_depart=verify($_POST['date']);
    $success=true;

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
  



    <div class="texte">
        <?php echo $compagnie['nom_compagnie'];?><br>
        <img src="image/<?php echo $compagnie['logo_compagnie'];?>" alt="">

    </div>
    <div class="offset-2 col-8 p-0 row">
        <form action="reservation.php?compagnie=<?php echo $compagnie['id_compagnie'];?>" method="post" class="col-12 p-4 reservation  p-0 row">

            <input type="text" class="i1 form-control" name="nom" placeholder="Nom">
            <input type="text" class="i2 form-control" name="prenom" placeholder="Prenoms">
            <input type="text" class="i3 form-control" name="numero" placeholder="Contact">

           <select name="destination" id="" class="form-control">
                <option value="">Destination...</option>
                <option value="bouake">BOUAKE</option>
                <option value="daloa">DALOA</option>
                <option value="korhogo">KORHOGO</option>
            </select>
            <span class="col-6 p-0">DATE DE DEPART</span>
            <span class="col-6 p-0">HEURE DE RESERVATION</span>
            <input type="date" name="date" class="form-control col-6">
            <select name="heure" class="form-control col-6">
                    <option value="8h">8h</option>
                    <option value=">14h">14h</option>
                    <option value="18h">18h</option>
                </select>
            <input type="submit" class="form-control col-12" name="reserver" value="reserver">
        </form>
    </div>
    
    </body>
</html>