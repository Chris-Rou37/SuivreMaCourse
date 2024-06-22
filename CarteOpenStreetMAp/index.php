<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>OpenStreetMap</title>
  <!-- Lien CSS-->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
  <link href="styles.css" rel="stylesheet" />
  <!--CSS-->
</head>

<body>

  <div id="maCarte"></div>

  <!--Lien JS-->
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
  <script type="text/javascript" src="fonctions.js"></script>

  <script>
    /*
    // on initialise la carte 
    let carte = L.map('maCarte').setView([47.383333, 0.683333], 15);
    // On charge les "tuiles"
    L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
      // lien vers la source des données
      attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
      minZoom: 15,
      maxZoom: 20
    }).addTo(carte);
    */
  </script>
  <!--JS-->
</body>

</html>