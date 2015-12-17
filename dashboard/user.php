<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);

include $root.'/cms/includes/header.php';

if($_SESSION['user']['role'] != 1){
    header('Location: '.$root.'/cms/index.php');
}

$usersCount = usersCount();

$allUsers = getAllUsers();

$rolesCount = rolesCount();

$allRoles = getAllRoles();


?>

<div class="container">
    <section>
       
        <div class="row">
            <div class="col-xs-12 col-md-12">
            
                <h1>Utilisateurs</h1>
                
            </div>
        </div>
          
        <div class="col-xs-12 col-md-12">
            
            <article>
            
            <table>

                <thead>
                    <th>Id Utilisateur</th>
                    <th>Login</th>
                    <th>Mail</th>
                    <th>Rôle</th>
                </thead>
                <?php 

                for($i = 0; $i < $usersCount; $i++) {

                ?>

                <tr>
                    <td><?php echo $allUsers[$i]['id'] ?></td>
                    <td><?php echo $allUsers[$i]['login'] ?></td>
                    <td><?php echo $allUsers[$i]['mail'] ?></td>
                    <td>
                        <form action="user-treat.php" method="POST">

                            <select name="roleChange" required>

                                <?php

                                for($iBis = 0; $iBis < $rolesCount; $iBis++) {

                                ?>
                                <option value="<?php echo $allUsers[$i]['id'].':'.$allRoles[$iBis]['idRole'] ?>" <?php if($allUsers[$i]['idRole'] == $allRoles[$iBis]['idRole']){ echo 'selected'; } ?>><?php echo $allRoles[$iBis]['nom'] ?></option>
                                <?php } ?>

                            </select>

                            <button type="submit" class="button-orange">Enregistrer</button>

                        </form>
                    </td>
                </tr>

                <?php } ?>

            </table>
        
		</article>
            
        </div>
    </section>
</div>

<?php
include $root.'/cms/includes/footer.php';
?>