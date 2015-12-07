<?php 
include "includes/header.php";
$CategorieArticles = getCategorieArticles($_GET['categorie']);
?>

<div class="container">

	<section>

		<div class="row">
			<div class="col-xs-12 col-md-12">
	
				<h1><?php echo getCategorieById($_GET['categorie']) ?></h1>

			</div>
		</div>

<?php

foreach ($CategorieArticles as $cat) {
	
?>
	
	<div class="row">
			<div class="col-xs-12 col-md-12">
				<article>

					<img src="" alt="">

					<h1><?php echo $cat['Titre'] ?></h1>

					<h2><?php echo $cat['date'] ?></h2>

					<p><?php echo First100Word($cat['text'], $cat['id_article']) ?></p>

				</article>
			</div>
		</div>


<?php
}
?>

</section>

</div>

<?php 
include "includes/footer.php";
?>

