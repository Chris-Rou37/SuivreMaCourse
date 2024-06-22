 // on initialise la carte 
let carte = L.map(document.getElementById('maCarte')).setView([47.383333, 0.683333], 16);
// On charge les "tuiles"
L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
  // lien vers la source des données
  attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
  minZoom: 15,
  maxZoom: 20
}).addTo(carte);

 // Création d'un marqueur sur la carte
let marqueur = L.marker([47.383333, 0.683333]).addTo(carte);
marqueur.bindPopup("<b>Bonjour!</b><br>Ceci est un marqueur.");