<?php
include("select_coordonnées.php");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SuivreMaCourse</title>
  <!-- Lien CSS-->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
  <link href="styles.css" rel="stylesheet" />
  <!--CSS-->
</head>

<body>

  <div id="maCarte"></div>

  <!--Lien JS-->
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
  <!--
  <script type="text/javascript" src="fonctions.js"></script>
-->
  <!-- récupération des coordonnées GPS -->
  <script>
    // Récupération de la réponse JSON encodée en PHP
    let response = <?php echo json_encode($response); ?>;
    // Extraction de l'identifiant du premier point GPS
    let id = response.gps[0].id;
    // Extraction de la latitude du premier point GPS
    let latitude = response.gps[0].latitude;
    // Extraction de la longitude du premier point GPS
    let longitude = response.gps[0].longitude;
  </script>

  <script>
    // on initialise la carte 
    let carte = L.map(document.getElementById('maCarte')).setView([latitude, longitude], 16);
    // On charge les "tuiles"
    L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
      // lien vers la source des données
      attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
      minZoom: 15,
      maxZoom: 20
    }).addTo(carte);

    // Création d'un marqueur sur la carte
    let marqueur = L.marker([latitude, longitude]).addTo(carte);
    marqueur.bindPopup("<b>Bonjour !</b><br>C'est moi.");
  </script>
  <!--JS-->
</body>

</html>