<?php

// Tentative de connexion à la base de données MySQL en utilisant l'adresse du serveur (localhost), 
// le nom d'utilisateur (root) et un mot de passe vide
$cnx = mysqli_connect("localhost", "root", "");

// Vérification si la connexion a échoué
if (!$cnx) {
  // Affichage d'un message d'erreur si la connexion au serveur a échoué
  echo "Erreur de connexion au serveur";

}
// Sélection de la base de données nommée 'suividecourse'
$db = mysqli_select_db($cnx, "suividecourse");

// Vérification si la sélection de la base de données a échoué
if (!$db) {
  // Affichage d'un message d'erreur si la connexion à la base de données a échoué
  echo "Erreur de connexion à la base";

} 

?>
