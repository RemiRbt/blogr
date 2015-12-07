<?php 

include 'includes/header.php';


$myDB = connectDB();

if(isset($_POST["login_sub"])){

	$newLogin     = htmlspecialchars($_POST['login_sub']);

	$newMail      = htmlspecialchars($_POST['mail']);

	$newPassword1 = htmlspecialchars($_POST['password1']);

	$newPassword2 = htmlspecialchars($_POST['password2']);


	$sql = 'SELECT login FROM utilisateurs WHERE login LIKE \''.$newLogin.'\'';

	$testLogin = $myDB->query($sql)->fetch(PDO::FETCH_ASSOC);
		
	if($testLogin['login'] != $newLogin ){
		
		if($newPassword1 == $newPassword2) {

		$sql = "INSERT INTO utilisateurs(login, password, email, id_role) VALUES ( '".$newLogin."', '".$newPassword1."', '".$newMail."', 3) ";

		$newUser = $myDB->query($sql);

		$succes = true;

		} elseif ($newPassword1 != $newPassword2) {

		$error = 'password';

		} 
	} else {

		$error = 'login';

	}

}

disconnectDB($myDB);

?>

<div class="container">


    <section>
        <div class="row">
            <div class="col-xs-12 col-md-8 col-md-offset-2">
                
                <h1>S'inscrire</h1>
                
                <article>

                    <?php

                    if(isset($error)) {

                        if($error == 'login') {

                            echo '<p>Ce login n\'est pas disponible.</p>';

                        } else {

                            echo '<p>Les mots de passes renseignés ne correspondent pas.</p>';

                        }

                    }

                    if(isset($succes)) {


                        echo '<p>Inscription réussie</p>';

                        $_SESSION['user']['login'] = $_POST['login_sub'];
                        $_SESSION['user']['mail']  = $_POST['mail'];
                        $_SESSION['user']['role']  = 3;

                    ?> 

                    <p>Bonjour <?php echo $_SESSION['user']['login']; ?></p>
                    <p>Votre mail est <?php echo $_SESSION['user']['mail']; ?></p>
                    <p>Et vous avez le rôle de  <?php echo getRole($_SESSION['user']['role']); ?></p>

                    <?php

                    } else { ?>

                    <form action="signin.php" method="POST" class="form-signin">

                    <input type="text"     placeholder="Login"        name="login_sub"     <?php if(isset($_POST['login_sub'])){ echo 'value="'.$_POST['login_sub'].'"'; } ?>required><br>

                    <input type="email"    placeholder="Mail"         name="mail"      <?php if(isset($_POST['mail'])){ echo 'value="'.$_POST['mail'].'"'; } ?>required><br>

                    <input type="password" placeholder="Mot de passe" name="password1" required><br>

                    <input type="password" placeholder="Répétez votre mot de passe" name="password2" required><br>

                    <button type="submit">Envoyer</button>

                    </form>

                    <?php } ?>


                    
                </article>

            </div>
        </div>
	</section>
</div>

<?php 
include 'includes/footer.php';
 ?>