 <?php

$myDB  = connectDB();


$login  = $_POST['login'];

$psswd  = $_POST['psswd'];

$sql = 'SELECT utilisateurs.* FROM utilisateurs WHERE login LIKE \''.$login.'\'';

$userReq  = $myDB->query($sql);

$user = $userReq->fetch();

if($psswd == $user['password']){

	echo '<p>Vous êtes connecté.</p>';

	$_SESSION['user']['login'] = $user['login'];
	$_SESSION['user']['mail']  = $user['email'];
	$_SESSION['user']['role']  = $user['id_role'];
	$_SESSION['user']['id']    = $user['id_utilisateur'];

} else {

	$loginError = true;
}

?>