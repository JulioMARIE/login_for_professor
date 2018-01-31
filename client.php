<?php
header('Content-type: text/html; charset=utf-8');
session_start();
include ("topic_page.php");
include ('connect.php');
?>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script language="javascript">
            function confirme( identities) {
                var confirmation=confirm("Would do like to delete?");
                if(confirmation){
                    document.location.href="modify.php?idp="+identities;
                }
            }
        </script>
    </head>
    <body>
    <nav class="nav navbar-inverse navbar-static-top">
        <div class="navbar-header">
                    <span class="navbar-brand">
                        <?php echo 'Hello '.$uname.'';?>
                    </span>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="menu">
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
                    <a href="deconnexion.php">Logout <span class="caret-top"></span></a>
                </li>
            </ul>
        </div>
    </nav>
        <div class="container jumbotron">
            <div class="pull-left" style="color:blue;margin-top: 10px;">Nos CLIENTS</div>

            <form action="cible.php" method="post" class="form-inline well" style="margin-left: 120px;">
                <div class="form-group well">
                    <label class="sr-only" for="namecli">Name</label>
                    <input type="text" class="form-control" id="namecli" name="namecli"
                           placeholder="Client name..." autofocus required>
                </div>
                <div class="form-group well">
                    <label class="sr-only" for="addcli">Name</label>
                    <input type="text" class="form-control" id="addcli" name="addcli"
                           placeholder="Client address..."required>
                </div>
                    <button type="submit" class="btn btn-default " style="margin-top: 40px;"><span class="glyphicon glyphicon-ok-circle"></span> Envoyer</button>
                <div class="input-group custom-search-form pull-right col-md-2" style="margin-top: 40px;">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button type="button" class="btn btn-default">
                             <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </span>
                </div>
            </form>
        </div>
        <table class=" container table-bordered table-condensed table-hover table-striped">
            <thead>
            <tr>
                <th style="text-align:center;">Nom</th>
                <th style="text-align:center;">Addresse</th>
                <th style="text-align:center; color: blue">Edit</th>
                <th style="text-align:center;color: red;">Delete</th>
            </tr>
            </thead>
            <tbody>
        <?php
         include ("connexion.php");
        $reponse = $mydb->query("SELECT * FROM client ORDER BY nomcli ");
        while($donnees = $reponse->fetch())
         {
            /*echo '<p><strong>' . htmlspecialchars($donnees['nomcli'],ENT_QUOTES) .
                    '</strong>  ' . htmlspecialchars($donnees['adressecli']) . '<span class="col-lg-1 ">
                                             <a class="btn btn-block twitter" href="edit.php">Editer</a>
                                         </span><div class="col-lg-1 ">
                                             <a class="btn btn-block google" href="modify.php">Modify</a>
                                         </div></p>';*/
            $numcli = $donnees["numcli"];
            echo ("<tr>
                <td style=\"text-align:center;\">
                    " . $donnees["nomcli"] . "
                </td>
                <td style=\"text-align:center;\">"
                . $donnees["adressecli"] . "
                </td style=\"text-align:center;\">
                <td style=\"text-align:center;\">
                <a class='btn btn-block' href='edit.php?idp=$numcli'><span class='glyphicon glyphicon-edit' style='color:darkblue;'></span>    Edit</a> 
                </td>
                <td><a class='btn btn-block' href=\"#\"onClick=\"confirme('".$numcli."')\" style='color:red;'><span class='glyphicon glyphicon-trash' style='color:red;'></span>   Delete</a></td>
            </tr>");
        }
        ?>
                <script src="js/jquery-3.2.1.min.js"></script>
       <script src="https://code.jquery.com/jquery.js"></script>
       <script src="bootstrap/js/bootstrap.min.js"></script>
     <!--   <script type="text/javascript ">
            function confirme( identities) {
                var confirmation=confirm("Would do like to delete?");
                if(confirmation){
                    document.location.href="modify.php?idp="+identities;
                }
            }
        </script>*/
        -->
    </body>
</html>