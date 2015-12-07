<meta charset="utf-8">

<?php
session_start();

include '../functions.php';
/*
//Traitement du formulaire
if(isset($_POST)){
	include 'article-treat.php';
}
*/
$myDB = connectDB();

//Vérification de la connexion
if($_SESSION['user']['role'] != 1 && $_SESSION['user']['role'] != 2){
    header('Location: ../index.php');
}

//Edition article existant
if(isset($_GET['article'])){
	$article = editArticleById($_GET['article']);
}

//Nombre articles auteurs
$nbArticle = userArticlesCount($_SESSION['user']['id']);

//Obtenir articles auteur
$userArticle = getUserArticles($_SESSION['user']['id']);

?>

<h1>Vos Articles</h1>

<?php

for($i = 0; $i < $nbArticle; $i++){

?>

<p><?php echo $userArticle[$i]['titre']; ?></p>

<a href="article.php?article=<?php echo $userArticle[$i]['id']; ?>">Editer l'article</a>

<?php } ?>

<form method="POST" action="article-treat.php">

	<label for="titreID">Titre</label>
	<input type="text" id="titreID" name="titre" <?php if(isset($article)){ echo 'value="'.$article['titre'].'"';} ?>>

	<input type="checkbox" id="societe" name="categorie[]" value="1"><label for="societe">Société</label> 

	<label for="textID">Texte de l'article</label>
	<textarea id="textID" name="text"><?php if(isset($article)){ echo $article['text']; } ?></textarea>

	<button type="submit">Envoyer</button>

</form>

