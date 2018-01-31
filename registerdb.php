<?php
/**
 * Created by PhpStorm.
 * User: AVEMARIA
 * Date: 24/07/2017
 * Time: 17:12
 */
include ("connexion.php");
$statut=0;
$req=$mydb->prepare('INSERT INTO user(nom,prenom,password,statut) VALUES (:nom,:prenom,:passwd,:statut)');
$req->execute(array('nom'=>$_POST['uname'],
                    'prenom'=>$_POST['prenom'],
                    'passwd'=>sha1($_POST['passwd']),
                     'statut'=>$statut));
        header('Location:sign_in.php');
?>