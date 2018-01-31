<?php session_start();
header('Content-type: text/html; charset=utf-8');
include ('topic_page.php');
if($id!=0){echo "Erreur";}
if(empty($_POST['uname'])){?>
<title>Register</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/form-elements.css">
<link rel="shortcut icon" href="assets/ico/favicon.png">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
</head>
  <body>
    <div class="top-content">
       <div class="inner-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2" style="margin-bottom: 20px;">
                    <h1><strong>Chalk </strong>Register Page</h1>
                </div>
            </div>
            <form action="register.php" method="post" class="well col-lg-6 col-lg-offset-3">
                <fieldset>
                <legend>Register to our site</legend>
                <legend>Please,fill on</legend>
                    <div class="row">
                        <div class="form-group">
                            <label for="uname" class="sr-only">Username</label>
                            <input type="text" name="uname" class="form-control" id="uname" value="<?php echo $uname?>"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="prenom" class="sr-only">Surname</label>
                            <input type="text" name="prenom" class="form-control" id="prenom" placeholder="Surname..."/>
                        </div>
                    </div>
                    <div class="row">
                        <div id="p" class="form-group">
                            <label for="passwd" class="sr-only">Password</label>
                            <input type="password" name="passwd" class="form-control" id="passwd" placeholder="Password..."/>
                        </div>
                    </div>
                    <div class="row">
                        <div id="pc" class="form-group">
                            <label for="passwdc" class="sr-only">Confirm_Password</label>
                            <input type="password" name="passwdc" class="form-control" id="passwdc" placeholder="Confirm_Password..."/>
                        </div>
                    </div>
                    <div class="row">
                            <button type="submit" class="col-lg-2 btn btn-primary pull-right" id="v">Valide</button>
                            <span class="col-lg-2  pull-right" style="margin-right:40px; "><a href="sign_in.php">Exit</a></span>
                    </div>
                </fieldset>

            </form>
        </div>
    </div>
</div>
<?php  }else{
        $uname_1=NULL;
        $uname_2=NULL;
        $pr=NULL;
        $pwd_er=NULL;
        $i=0;
        $unam=$_POST['uname'];
        $pre=$_POST['prenom'];
        $pwd1=sha1($_POST['passwd']);
        $pwd2=sha1($_POST['passwdc']);
        include_once ('connexion.php');
        $req=$mydb->prepare('SELECT COUNT(*) FROM user WHERE nom=:uname');
        $req->bindValue(':uname',$unam,PDO::PARAM_STR);
        $req->execute();
        $uname_free=($req->fetchColumn()==0)?1:0;
        $req->closeCursor();
        if(!$uname_free){
            $uname_1="Your username have already been used by another member";
            $i++;
        }
        if(strlen($unam)<3 || strlen($unam)>15){
            $uname_2="Your username is so short or long";
            $i++;
        }
        if(strlen($pre)<3 || strlen($pre)>15){
            $pr="Your surname is so short or long";
            $i++;
        }
        if($pwd1!=$pwd2 || empty($pwd2) || empty($pwd1)){
         $pwd_er="Your password are different";
         $i++;
        }
        if($i==0){
            $statut=0;
            include ("connexion.php");
            $req=$mydb->prepare("INSERT INTO user(nom,prenom,password,statut) VALUES (:nom,:prenom,:passwd,:st)");
            $req->bindValue(':nom', $unam, PDO::PARAM_STR);
            $req->bindValue(':prenom', $pre, PDO::PARAM_INT);
            $req->bindValue(':passwd', $pwd1, PDO::PARAM_STR);
            $req->bindValue(':st',$statut, PDO::PARAM_STR);
            $req->execute();
            $_SESSION['uname']=$unam;
            $_SESSION['id_user']=$mydb->lastInsertId();
            $req->closeCursor();
            echo '<script type="javascript">alert("Success '.stripslashes(htmlspecialchars($pre)).' ,you are now registered")</script>';
            header('Location:sign_in.php');
        }else{
          /*  echo'<p>'.$i.' erreur(s)</p>';
            echo'<p>'.$uname_1.'</p>';
            echo'<p>'.$uname_2.'</p>';
            echo'<p>'.$pwd_er.'</p>';
            echo'<p>'.$pr.'</p>'; */
            $_SESSION['uname']=$unam;
          ?><script language="JavaScript">alert("<?php echo $i.'  '.$uname_1.' <br> '.$uname_2.' <br> '.$pr.' <br> '.$pwd_er;?>");
                document.location.href="<?php echo htmlspecialchars($_SERVER['HTTP_REFERER']) ?>";
            </script>';
           <?php

        }

    }
?>
    <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.backstretch.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <!--[if lt IE 10]>
    <script src="assets/js/placeholder.js"></script>
    <![endif]-->
  </body>
</html>
