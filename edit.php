<?php
session_start();
header('Content-type: text/html; charset=utf-8');
include ("topic_page.php");
include("connexion.php");
$id = $_GET["idp"];
$sql = $mydb->query("SELECT * FROM client WHERE numcli=$id");
if ($sqlf = $sql->fetch()){
?>
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/form-elements.css">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="register_css.css.">
</head>
<body>
<div class="topic">
    <div class="thyinner">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <h1><strong>Chalk </strong>Edit  Profil Page</h1>
                </div>
            </div>
            <form action="editnext.php" method="post" class="well col-lg-6 col-lg-offset-3">
                <legend>Edit your profil</legend>
                <legend>Please,fill on</legend>
                <fieldset>
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <div class="row">
                        <div class="form-group">
                            <label for="uname" class="sr-only">Name</label>
                            <input type="text" name="uname" class="form-control" id="uname" value="<?php echo $sqlf["nomcli"]; ?>"
                            autofocus/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="prenom" class="sr-only">Adresse</label>
                            <input type="text" name="address" class="form-control" id="prenom"
                                   value="<?php echo $sqlf["adressecli"]?>"
                            />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <button type="submit" class="col-lg-2 btn btn-primary pull-right">OK</button>
                            <span class="pull-left"><a href="client.php">Exit</a></span>
                        </div>
                    </div>
                </fieldset>

            </form>
        </div>
    </div>
    <?php
    }
    ?>

    <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.backstretch.min.js"></script>
    <script src="assets/js/scripts.js"></script>

    <!--[if lt IE 10]>
    <script src="assets/js/placeholder.js"></script>
    <![endif]-->
    </body>
</html>