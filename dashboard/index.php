<?php

$root = realpath($_SERVER["DOCUMENT_ROOT"]);

include $root.'/cms/includes/header.php';

if($_SESSION['user']['role'] != 1){
    header('Location: '.$root.'/cms/index.php');
}

?>
<?php include 'menu.php'; ?>

<section id="dashboard">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <h1>Dashboard</h1>
            </div>
        </div>
        
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <article>

                    <h1>Derniers utilisateurs</h1>
                    
                    <table>

                        <thead>
                            <th>Id Utilisateur</th>
                            <th>Login</th>
                            <th>Mail</th>
                            <th>Rôle</th>
                        </thead>
                        
                        <tr>
                            <td>Id</td>
                            <td>Login</td>
                            <td>mail@mail.fr</td>
                            <td>
                                <form action="">
                                   <select name="" id="">
                                        <option value="">Administrateur</option>
                                        <option value="">Rédacteur</option>
                                        <option value="">Utilisateur</option>
                                        <option value="">Modérateur</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>Id</td>
                            <td>Login</td>
                            <td>mail@mail.fr</td>
                            <td>
                                <form action="">
                                    <select name="" id="">
                                        <option value="">Administrateur</option>
                                        <option value="">Rédacteur</option>
                                        <option value="">Utilisateur</option>
                                        <option value="">Modérateur</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>Id</td>
                            <td>Login</td>
                            <td>mail@mail.fr</td>
                            <td>
                                <form action="">
                                    <select name="" id="">
                                        <option value="">Administrateur</option>
                                        <option value="">Rédacteur</option>
                                        <option value="">Utilisateur</option>
                                        <option value="">Modérateur</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                        
                    </table>

                </article>

                <article>

                    <h1>Derniers articles</h1>
				
                    <h2>Titre d'un article</h2>
                    <p><a href="#">Editer l'article</a></p>
				
                    <h2>Titre d'un article</h2>
                    <p><a href="#">Editer l'article</a></p>
				
                    <h2>Titre d'un article</h2>
                    <p><a href="#">Editer l'article</a></p>

                </article>
            </div>
        </div>
    </div>
</section>

<?php
include $root.'/cms/includes/footer.php';
?>