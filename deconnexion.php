<?php
/**
 * Created by PhpStorm.
 * User: AVEMARIA
 * Date: 26/07/2017
 * Time: 01:08
 */
session_start();
$saf=$_SESSION['id_user'];
session_unset();
session_destroy();
include_once ('topic_page.php');
if($id==0) {
    include_once ('connexion.php');
    $req=$mydb->prepare('UPDATE `user` SET `statut` = \'0\' WHERE `user`.`id_user` =:uid');
    $req->bindValue(':uid',$saf,PDO::PARAM_STR);
    $req->execute();
    $req->closeCursor();
    header('Location:accueil.php');
}
?>