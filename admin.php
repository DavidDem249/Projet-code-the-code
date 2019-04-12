<!DOCTYPE html>
<html>
    <head>
        <title>Code</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    
    <body>
        <marquee><h1 class="text-logo">Panneau d'administration</h1></marquee>
        <div class="container">
            <div class="row">
                <h1><strong>Liste  de toutes les réservations éffectuées par les clients </strong></h1>
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Compagnie</th>
                      <th>Client</th>
                      <th>date de départ</th>
                      <th>destination</th>
                      <th>Date de reservation</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        $base = new PDO('mysql:host=localhost;dbname=codethecode', 'root', '');
                        $req = $base->query('SELECT r.id_reservation,r.id_compagnie,r.nom_client,r.prenom_client, r.heure_depart,r.date_reservation,r.date_depart,r.destination, c.nom_compagnie,c.id_compagnie 
                                           FROM reservation AS r INNER JOIN compagnies AS c ON r.id_compagnie = c.id_compagnie ORDER BY r.date_reservation DESC');
                        while($result = $req->fetch()) 
                        {
                            echo '<tr>';
                            echo '<td>'. $result['nom_compagnie'] . '</td>';
                            echo '<td>'. $result['nom_client'] .' '.$result['prenom_client']. '</td>';
                            echo '<td>'. $result['date_depart'] .' '.$result['heure_depart']. '</td>';
                            echo '<td>'. $result['destination'] . '</td>';
                            echo '<td>'. $result['date_reservation'] . '</td>';
                            
                        }
                      ?>
                  </tbody>
                </table>
            </div>
        </div>
    </body>
</html>
