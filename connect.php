<?php
function checkconnection(){
    if($GLOBALS['id']==0) {
        header('Location:accueil.php');
    }
}
checkconnection();
?>