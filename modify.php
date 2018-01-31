<?php
/**
 * Created by PhpStorm.
 * User: AVEMARIA
 * Date: 26/07/2017
 * Time: 14:44
 */
        $id=$_GET["idp"];
        include ('connexion.php');
        $quer=$mydb->exec("DELETE FROM client WHERE numcli=$id");
        if($quer){
            include("client.php");
            ?>
        <script type="text/javascript">alert("Success")</script>
       <?php
           }else{
            ?><script language="JavaScript">alert("Failed")</script>
  <?php
            include("client.php");
        }
?>