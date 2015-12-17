<?php
session_start();

$root = realpath($_SERVER["DOCUMENT_ROOT"]);

include $root.'/cms/includes/functions.php';


$titre     = $_POST['titre'];

$text      = $_POST['text'];

$date      = date("Y-m-d");

$categorie = $_POST['categorie'];

$myDB = connectDB();

	
$sql = 'INSERT INTO articles(id_utilisateur, date, Titre, text) VALUES ('.$_SESSION['user']['id'].', "'.$date.'", "'.$titre.'", "'.$text.'")';

$articleInsert = $myDB->query($sql);

echo '<p>'.$sql.'</p>';

$sql = 'SELECT id_article FROM articles WHERE id_utilisateur LIKE '.$_SESSION['user']['id'].' AND Titre LIKE "'.$titre.'" AND text LIKE "'.$text.'" AND date LIKE "'.$date.'"  ORDER BY id_article DESC LIMIT 1';

$idArticle = $myDB->query($sql)->fetchColumn();

echo '<p>'.$idArticle.'</p>';

foreach ($categorie as $id) {

	$sql = 'INSERT INTO categorie_article(id_article, id_categorie) VALUES ('.$idArticle.', '.$id.')';

	$categorieInsert = $myDB->query($sql);

}


header('Location: article.php');

?>