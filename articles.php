<?php
include "includes/header.php";

$allArticles = getAllArticles();

$categories = getCategorie();

?>

    <div class="container">

        <section>

            <div class="row">
                <div class="col-xs-12 col-md-12">

                    <h1>Tous les articles</h1>

                </div>
            </div>

			<div class="row">
			
				<div class="article_filter">

					<a href="#" data-filter="*" class="current">Tous</a>
					
					<?php foreach($categories as $cat) { ?>
						<a href="#" data-filter=".<?php echo $cat['nom'] ?>"><?php echo $cat['nom'] ?></a>
					<?php } ?>

				</div>
			
			</div>

            <div class="row">

				<div class="article_container">

                    <?php foreach ($allArticles as $val) { ?>
                        <div class="col-xs-12 col-md-4 <?php echo $val['categorie'] ?>">
                            <article>
							
								<div style="background:url(<?php echo $val['chemin'] ?>) no-repeat center center;background-size:cover;" class="inlineimg"></div>

                                <h1><?php echo $val['Titre'] ?></h1>

                                <h2><a href="categories.php?categorie=<?php echo $val['id_categorie'] ?>"><?php echo $val['categorie'] ?></a></h2>

                                <h2><?php echo $val['date'] ?></h2>

                                <p>
                                    <?php echo First100Word($val['text'], $val['id_article']) ?>
                                </p>

                            </article>
                        </div>
                    <?php } ?>
                </div>

            </div>

        </section>

    </div>

    <?php 
include "includes/footer.php";
?>
