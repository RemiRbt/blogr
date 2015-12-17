<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);

include $root.'/cms/includes/header.php';

/*
//Traitement du formulaire
if(isset($_POST)){
	include 'article-treat.php';
}*/

$myDB = connectDB();

//Vérification de la connexion
if($_SESSION['user']['role'] != 1 && $_SESSION['user']['role'] != 2){
    header('Location: ../index.php');
}
/*
//Edition article existant
if(isset($_GET['article'])){
	$article = editArticleById($_GET['article']);
}
*/
//Obtenir les catégories
$allCategorie = getCategorie();

//Nombre articles auteurs
$nbArticle = userArticlesCount($_SESSION['user']['id']);

//Obtenir articles auteur
$userArticle = getUserArticles($_SESSION['user']['id']);
var_dump($userArticle);

?>

<?php if($userArticle) { ?>

<h1>Vos Articles (<?php echo $nbArticle ?>)</h1>

<?php


foreach ($userArticle as $article) {

?>

<p><?php echo $article['titre']; ?></p>

<a href="article.php?article=<?php echo $article['id']; ?>">Editer l'article</a>

<?php } ?>
<?php } ?>

<section id="edit-article">

        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-12">

                    <h1>Article</h1>

                </div>
            </div>

            <article>
                <div class="row">
                    <form method="POST" action="article-treat.php">
                        <div class="col-xs-12 col-md-6">
                            <input type="text" name="titre" placeholder="Titre" <?php if(isset($article)){ echo 'value="'.$article[ 'titre']. '"';} ?>>

                            <textarea name="text" placeholder="Texte de l'article"><?php if(isset($article)){ echo $article['text']; } ?></textarea>
                        </div>

                        <div class="col-xs-12 col-md-6">
                            <div class="col-xs-12 col-md-12">
                                <h1>Catégories</h1>
                            </div>

                            <ul>
                                <?php foreach ($allCategorie as $categorie) { ?>

                                    <li>
                                        <input type="checkbox" name="categorie[]" id="<?php echo $categorie['id_categorie'] ?>" value="<?php echo $categorie['id_categorie'] ?>">
                                        <label for="<?php echo $categorie['id_categorie'] ?>">
                                            <?php echo $categorie['nom'] ?>
                                        </label>
                                    </li>
                                    <?php } ?>
                            </ul>

                            <button type="submit" class="button-orange">Envoyer</button>
                        </div>
                    </form>
                </div>
            </article>
        </div>