<?php session_start();
header('Content-type: text/html; charset=utf-8');
include ("topic_page.php");
if($id!=0){echo "Erreur";}
if(!isset($_POST['uname'])){?>
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
			             <div class="col-sm-8 col-sm-offset-2">
			                 <h1><strong>Chalk </strong>Login Page</h1>
				         </div>
			         </div>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3 form-box">
                        <div class="form-top">
                            <div class="form-top-left">
                                <h3>Login to our site</h3>
                                <p>Enter your username and your password to log on</p>
                            </div>
                            <div class="form-top-right">
                                <i class="fa fa-key"></i>
                            </div>
                        </div>
                        <div class="form-bottom">
                            <form action="sign_in.php" method="post" class="login-form">
                                    <div class="form-group">
                                        <label for="uname" class="sr-only">Username</label>
                                        <input type="text" name="uname" class="form-username form-control" id="uname" placeholder="Username..." autofocus required/>
                                    </div>
                                    <div class="form-group">
                                        <label for="passwd" class="sr-only">Password</label>
                                        <input type="password" name="passwd" class="form-password form-control" id="passwd" placeholder="Password..." required/>
                                    </div>
                                <div class="row" style="margin-top: 30px;">
                                    <div class="form-group">
                                        <a href="#" class="col-lg-4" style="margin-left: 10px;"><h5>Forgot Password?</h5></a>
                                        <a href="register.php" class="col-lg-2 col-lg-offset-2">Register</a>
                                        <button type="submit" class="col-lg-2 btn-primary pull-right" style="margin-right: 20px;border-radius:5px;">Sign in</button>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 40px;">
                                    <div class="form-group">
                                        <div class="col-lg-4 ">
                                            <a class="btn btn-link-1 btn-link-1-facebook" href="#">
                                                <i class="fa fa-facebook"></i> Facebook
                                            </a>
                                        </div>
                                        <div class="col-lg-4">
                                            <a class="btn btn-link-1 btn-link-1-twitter" style="margin-left:15px; " href="#">
                                                <i class="fa fa-twitter"></i> Twitter
                                            </a>
                                        </div>
                                        <div class="col-lg-4">
                                            <a class="btn btn-link-1 btn-link-1-google-plus" href="#">
                                                <i class="fa fa-google-plus"></i> Google Plus
                                            </a>
                                        </div>
                                    </div>
                                </div>
                             </form>
                        </div>
                    </div>
                </div>
            </div>
		 </div>
     </div>

    <?php }else{
        if(empty($_POST['uname']) || empty($_POST['passwd'])){
            ?><script language="JavaScript">alert("Failed to connection")</script> <?php
        }else{
        include_once ('connexion.php');
        $query=$mydb->prepare('SELECT * FROM user WHERE nom=:uname');
        $query->bindValue(':uname',$_POST['uname'],PDO::PARAM_STR);
        $query->execute();
        $data=$query->fetch();
        if($data['password']==sha1($_POST['passwd'])){
            $_SESSION['uname']=$data['nom'];
            $_SESSION['id_user']=$data['id_user'];
            $_SESSION['passwd']=$data['password'];
            $req=$mydb->prepare('UPDATE `user` SET `statut` = \'1\' WHERE `user`.`id_user` =:uid');
            $req->bindValue(':uid',$data['id_user'],PDO::PARAM_STR);
            $req->execute();
            $req->closeCursor();
            header('Location:accueil.php');
        }else{
        $_SESSION['uname']=$data['nom'];
        ?> <script language="JavaScript">alert("Failed to connection,Invalid Username or Password");
           document.location.href="<?php echo htmlspecialchars($_SERVER['HTTP_REFERER']) ?>";
        </script>
            <?php
        }
            $query->closeCursor();
        }
    }
    ?>
         <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
         <script src="bootstrap/js/bootstrap.js" type="text/javascript"></script>
         <script src="assets/js/jquery-1.11.1.min.js"></script>
         <script src="assets/bootstrap/js/bootstrap.min.js"></script>
         <script src="assets/js/jquery.backstretch.min.js"></script>
         <script src="assets/js/scripts.js"></script>

         <!--[if lt IE 10]>
         <script src="assets/js/placeholder.js"></script>
         <![endif]-->
	  </body>
</html>