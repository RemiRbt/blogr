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
	<script src="js/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.2.2/isotope.pkgd.min.js"></script>
	<script src="js/script.js"></script>


</head>

<body>



<?php 

$Categories = getCategorie();

?>

<header>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-6 col-md-6">

				<h1><a href="index.php">Blog</a></h1>

			</div>

			<div class="col-xs-6 col-md-6">
				<div class="row">
					<nav role="navigation">
					    
					    <div class="col-xs-2 col-md-2">
					        
					        <p><a href="articles.php">Articles</a></p>
					        
					    </div>
					    
						<div class="col-xs-5 col-md-5">

							<p>Catégories <i class="fa fa-caret-down"></i></p>

							<ul>
								<?php foreach($Categories as $cat) { ?>
									<li>
										<a href="categories.php?categorie=<?php echo $cat['id_categorie'] ?>"><?php echo $cat['nom'] ?></a>
									</li>
								<?php } ?>
							</ul>

						</div>

						<div class="col-xs-5 col-md-5">
                            <?php if(isset($_SESSION['user'])){ ?>
                               
                               <p style="margin-right: 50px;"><?php echo $_SESSION['user']['login']; ?> <i class="fa fa-caret-down"></i></p>
                               
                               <ul>
                                   <li><a href="dashboard/">Dashboard</a></li>
                                   <li><a href="/cms/destroy.php">Se déconnecter</a></li>
                               </ul>
                                
                            <?php }else { ?>
							<button id="button-connect">Se connecter</button>
                            
                            <?php } ?>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</div>
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