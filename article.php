<?php
include "includes/header.php";
$TheArticle=getTheArticle($_GET['article']);
?>

<div class="container">

	<section>

		<div class="row">
			<div class="col-xs-12 col-md-12">
	
				<h1><?php echo getArticleById($_GET['article']) ?></h1>

			</div>
		</div>
		
		<div class="row">
			<div class="col-xs-12 col-md-12">
                <article>

                    <div style="background:url(<?php echo $TheArticle['chemin'] ?>) no-repeat center center;background-size:cover;" class="inlineimg"></div>

                    <h1><?php echo $TheArticle['Titre'] ?></h1>

                    <h2><?php echo $TheArticle['date'] ?></h2>

                    <p><?php echo $TheArticle['text'] ?></p>

                    <?php if(isset($TheArticle['chemin'])){ ?>

                    <p><a href='<?php echo $TheArticle['chemin'] ?>'>Lien du média</a></p>

                    <?php } ?>

                </article>
			</div>
		</div>
	
	</section>
	
</div>

<?php 
include "includes/footer.php";
?>