<?php
session_start();

include '../functions.php';

$titre = $_POST['titre'];

$text  = $_POST['text'];

$date = date("Y-m-d");

$myDB = connectDB();

if(isset($_GET)){

	$sql = 'UPDATE articles SET ('.$_SESSION['user']['id'].', "'.$date.'", "'.$titre.'", "'.$text.'")';

	$articleInsert = $myDB->query($sql);
	
}else {
	
	$sql = 'INSERT INTO articles(id_utilisateur, date, Titre, text) VALUES ('.$_SESSION['user']['id'].', "'.$date.'", "'.$titre.'", "'.$text.'")';

	$articleInsert = $myDB->query($sql);

	var_dump($articleInsert);

}


?>