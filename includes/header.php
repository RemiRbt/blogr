<?php 
session_start();

include "functions.php";


if(isset($_POST['login'])) {
	include 'connect.php';
}
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bapt & Rem</title>
    <!--<link rel="stylesheet" href="normalize.css">-->
    <link rel="stylesheet" href="/cms/css/bootstrap.css">
    <link rel="stylesheet" href="/cms/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	<script src="/cms/js/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.2.2/isotope.pkgd.min.js"></script>
	<script src="/cms/js/script.js"></script>


</head>

<body>



<?php 

$Categories = getCategorie();

?>

<header>

<nav class="navbar navbar-default">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <h1><a class="navbar-brand" href="index.php">TPF Blog</a></h1>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="index.php"><i class="fa fa-home"></i></a></li>
              <li><a href="articles.php">Articles</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Catégories <span class="caret"></span></a>
                <ul class="dropdown-menu">
				<?php foreach($Categories as $cat) { ?>
					<li>
						<a href="categories.php?categorie=<?php echo $cat['id_categorie'] ?>"><?php echo $cat['nom'] ?></a>
					</li>
				<?php } ?>
                </ul>
              </li>
			  <li class="dropdown">
			<?php if(isset($_SESSION['user'])){ ?>                               
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> <?php echo $_SESSION['user']['login']; ?> <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="dashboard/">Dashboard</a></li>
						<li><a href="/cms/destroy.php">Se déconnecter</a></li>
					</ul>
					<?php }else { ?>
						<button id="button-connect">Se connecter</button>
					<?php } ?>
			  </li>
			</ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
</nav>
	
</header>

<aside>
    <div class="container">
       <div class="row">
            <div id="aside-wrapper" class="col-xs-12 col-sm-12 col-md-offset-2 col-md-8">
                
                <h1>Se connecter</h1>

                <p id="close-connect"><i class="fa fa-times fa-2x"></i></p>

                <?php if(!isset($_SESSION['user'])) { ?>

                <form action="index.php" method="POST">

                    <input type="text"     placeholder="Login"    name="login" required autofocus>

                    <input type="password" placeholder="Mot de passe" name="psswd" required>

                    <button type="reset">Supprimer</button>

                    <button type="submit">Envoyer</button>

                </form>

                <?php if(isset($loginError)){ ?>

                <p>Il y a une erreur dans le login ou le mot de passe.</p>

                <?php
                } ?>

                <p>Pas de compte ? <a href="signin.php">Inscrivez-vous</a></p>

                <?php }else{ ?>

                <p>Bonjour <?php echo $_SESSION['user']['login']; ?></p>
                <p>Votre mail est <?php echo $_SESSION['user']['mail']; ?></p>
                <p>Et vous avez le rôle de  <?php echo getRole($_SESSION['user']['role']); ?></p>


                <a href="destroy.php">Se déconnecter</a>
                <br>

                <?php } ?>
           </div>
        </div>
    </div>
</aside>


	<script src="/cms/js/bootstrap.js"></script>