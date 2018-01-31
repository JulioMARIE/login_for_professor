<?php session_start();
header('Content-type: text/html; charset=utf-8');
include ("topic_page.php");
include ('connect.php');
?>
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/form-elements.css">
<link rel="stylesheet" href="assets/css/style.css">
</head>
         <body>
         <nav class="navbar navbar-inverse navbar-static-top">
             <div class="navbar-header">
                     <span id="namemenu" class="navbar-brand">
                         <?php
                         echo 'Hello '.$uname.'';
                         ?>
                     </span>
                 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#labarremenu">
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                 </button>
             </div>
             <div class="collapse navbar-collapse" id="labarremenu">
                 <ul class="nav navbar-nav">
                     <li class="active">
                         <a href="accueil.php">Dashboard</a>
                     </li>
                     <li>
                         <a href="client.php">Client</a>
                     </li>
                     <li>
                         <a href="commande.php">Commande</a>
                     </li>
                     <li>
                         <a href="deconnexion.php" >Logout <span class="caret-top"></span></a>
                     </li>
                 </ul>
             </div>
         </nav>
          <div class="container">
            <table class=" container table-bordered table-condensed" style="max-width: 1000px;">
            <thead>
            <tr>
                <th>Bon de commande n“</th>
                <th>Date de commande</th>
                <th>Date de livraison</th>
                <th>Client</th>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Prix unitaire</th>
                <th>Montant</th>
            </tr>
            </thead>
            <tbody>
        <?php
        include ("connexion.php");
       $reqc=$mydb->query('SELECT bcde.numbcde ,bcde.datebcde,livraison.dateliv,client.nomcli,produit.libprod,commander.qtecmd,produit.pu,
                    SUM(produit.pu*commander.qtecmd)FROM bcde,client,livraison,commander,produit,facture 
                    WHERE bcde.numcli=client.numcli AND livraison.numfact=facture.numfact AND bcde.numbcde=commander.numbcde
                    AND produit.codeprod=commander.codeprod 
                    GROUP BY bcde.numbcde,bcde.datebcde,livraison.dateliv,client.nomcli,produit.libprod,commander.qtecmd,produit.pu');
      while($row=$reqc->fetch())
        {
            $lignes=0;
            $rows[$lignes++]=$row ;
            foreach ($rows as $row) {
                echo '<td class="col-lg-1">' . $row['numbcde'] . '</td>';
                echo '<td class="col-lg-2">' . $row['datebcde'] . '</td>';
                echo '<td class="col-lg-2">' .$row['dateliv'].'</td>';
                echo '<td class="col-lg-2">'.$row['nomcli'].'</td>';
                echo '<td class="col-lg-2">'.$row['libprod'].'</td>';
                echo '<td class="col-lg-1">'.$row['qtecmd'].'</td>';
                echo '<td class="col-lg-1">'.$row['pu'].'</td>';
                echo '<td class="col-lg-1">'.$row['SUM(produit.pu*commander.qtecmd)'].'</td>
                </tbody> 
             </table>';
            }
        }
     $reqc->closeCursor();
      ?>
          </div>

         <script src="js/jquery-3.2.1.min.js"></script>
         <script src="https://code.jquery.com/jquery.js"></script>
         <script type="text/javascript" src="custom.js"></script>
         <script type="text/javascript" src="jquery.MARIE_hoverFade.js"></script>
         <script src="bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>