<?php
/**
 * Created by PhpStorm.
 * User: AVEMARIA
 * Date: 27/07/2017
 * Time: 11:00
 */
try{
    $pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
    $mydb= new  PDO("mysql:host=localhost;dbname=dbchalk","root","",$pdo_options);
}
catch(Exception $e){
    die("Erreur :" . $e->getMessage());
}
?>