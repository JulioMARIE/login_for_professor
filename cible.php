<?php
// Connexion à la base de données
include ("connexion.php");
$req = $mydb->prepare('INSERT INTO client (nomcli, adressecli) VALUES(:namecli, :addcli)');
$req->bindValue(':namecli',stripcslashes(htmlspecialchars($_POST['namecli'])),PDO::PARAM_STR);
$req->bindValue(':addcli',stripcslashes(htmlspecialchars($_POST['addcli'])),PDO::PARAM_STR);
$req->execute();
$req->closeCursor();
header('Location: client.php');
?>