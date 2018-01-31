<?php
/**
 * Created by PhpStorm.
 * User: AVEMARIA
 * Date: 27/07/2017
 * Time: 19:22
 */
include ("connexion.php");
$nom=$_POST["uname"];
$a=$_POST["address"];
$id=$_POST["id"];
$sqlquery = $mydb->exec("UPDATE client SET nomcli='$nom',adressecli='$a' WHERE numcli=$id");
if($sqlquery){
    include("client.php");
    ?>
    <script type="text/javascript">print("Success")</script>
    <?php
}else{
    ?><script language="JavaScript">alert("Failed,you have any modifications")</script>
    <?php
    include("client.php");
}
?>