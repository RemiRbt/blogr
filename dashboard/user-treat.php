<?php

include '../includes/functions.php';

$myDB = connectDB();

var_dump($_POST);

list($myUserIdChange, $myUserNewRole) = explode(':', $_POST['roleChange']);


$sql = 'UPDATE  utilisateurs SET id_role='.$myUserNewRole.' WHERE id_utilisateur LIKE '.$myUserIdChange;
$sth = $myDB->query($sql);

header('Location: user.php');

?>