<?php

include 'includes/header.php';

$LastArticles = get5LastArticles();

?>

<div class="container">

	<section>

		<div class="row">
			<div class="col-xs-12 col-md-12">

				<h1>Derniers articles</h1>
				
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-md-12">
				
				<article>
				
				<div class="row">
				
					<div class="col-xs-12 col-md-6">

					<img src="<?php echo $LastArticles[1]['chemin'] ?>">
					
					</div>
				
					<div class="col-xs-12 col-md-6">

					<h1><?php echo $LastArticles[1]['Titre'] ?></h1>

					<h2><a href="categories.php?categorie=<?php echo $LastArticles[1]['id_categorie'] ?>"><?php echo $LastArticles[1]['categorie'] ?></a></h2>
					
					<h3><?php echo $LastArticles[1]['date'] ?></h3>

					<p><?php echo First100Word($LastArticles[1]['text'], $LastArticles[1]['id_article']) ?></p>
				
					</div>
					
				</div>
				
				</article>

			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-md-6">
				<article>

					<img src="<?php echo $LastArticles[2]['chemin'] ?>">

					<h1><?php echo $LastArticles[2]['Titre'] ?></h1>

                    <h2><a href="categories.php?categorie=<?php echo $LastArticles[2]['id_categorie'] ?>"><?php echo $LastArticles[2]['categorie'] ?></a></h2>					
					<h3><?php echo $LastArticles[2]['date'] ?></h3>

					<p><?php echo First100Word($LastArticles[2]['text'], $LastArticles[2]['id_article']) ?></p>

				</article>
			</div>
			
			<div class="col-xs-12 col-md-6">
				<article>

					<img src="<?php echo $LastArticles[3]['chemin'] ?>">

					<h1><?php echo $LastArticles[3]['Titre'] ?></h1>

                    <h2><a href="categories.php?categorie=<?php echo $LastArticles[3]['id_categorie'] ?>"><?php echo $LastArticles[3]['categorie'] ?></a></h2>					
					<h3><?php echo $LastArticles[3]['date'] ?></h3>

					<p><?php echo First100Word($LastArticles[3]['text'], $LastArticles[3]['id_article']) ?></p>

				</article>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-md-6">
				<article>

					<img src="<?php echo $LastArticles[4]['chemin'] ?>">

					<h1><?php echo $LastArticles[4]['Titre'] ?></h1>

                    <h2><a href="categories.php?categorie=<?php echo $LastArticles[4]['id_categorie'] ?>"><?php echo $LastArticles[4]['categorie'] ?></a></h2>					
					<h3><?php echo $LastArticles[4]['date'] ?></h3>

					<p><?php echo First100Word($LastArticles[4]['text'], $LastArticles[4]['id_article']) ?></p>

				</article>
			</div>
			
			<div class="col-xs-12 col-md-6">
				<article>

					<img src="<?php echo $LastArticles[5]['chemin'] ?>">

					<h1><?php echo $LastArticles[5]['Titre'] ?></h1>

                    <h2><a href="categories.php?categorie=<?php echo $LastArticles[5]['id_categorie'] ?>"><?php echo $LastArticles[5]['categorie'] ?></a></h2>					
					<h3><?php echo $LastArticles[5]['date'] ?></h3>

					<p><?php echo First100Word($LastArticles[5]['text'], $LastArticles[5]['id_article']) ?></p>

				</article>
			</div>
		</div>

	</section>

</div>

<?php 

include "includes/footer.php";

?>