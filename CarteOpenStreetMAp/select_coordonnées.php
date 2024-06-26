<?php

include("db_connect.php"); // Inclut le fichier de connexion à la base de données.

$response = array(); // Crée un tableau pour stocker la réponse.

  // On créé la requête pour récupérer les dernières coordonnées
  $req = "SELECT * from coordonnees_gps ORDER BY id DESC LIMIT 1";

  // on envoie la requête
  $res = $cnx->query($req);

  if ($res->num_rows > 0) { // Vérifie si la requête a retourné au moins un résultat.

    $tmp = array(); // Crée un tableau temporaire pour stocker les données gps.
    $response["gps"] = array(); // Crée un tableau "gps" dans réponse.
    $curs = mysqli_fetch_array($res); // Récupère les données gps depuis la base de données.

    $tmp["id"] = $curs["id"]; // Stocke l'ID des données gps dans le tableau temporaire.
    $tmp["latitude"] = $curs["latitude"]; // Stocke la latitude dans le tableau temporaire.
    $tmp["longitude"] = $curs["longitude"]; // Stocke la longitude dans le tableau temporaire.

    array_push($response["gps"], $tmp); // Ajoute les données gps au tableau "gps" dans la réponse.

    $response["success"] = 1; // Indique que la requête a réussi.
    //echo json_encode($response); // Convertit la réponse en format JSON et l'envoie.
    
  } else {

    $response["success"] = 0; // Indique que la requête a échoué.
    $response["message"] = "Erreur de requete"; // Ajoute un message d'erreur à la réponse.

    echo json_encode($response); // Convertit la réponse en format JSON et l'envoie.
  }


?>