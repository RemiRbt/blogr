<?php

/***
 *     _____                             _              __________________ 
 *    /  __ \                           (_)             | ___ \  _  \  _  \
 *    | /  \/ ___  _ __  _ __   _____  ___  ___  _ __   | |_/ / | | | | | |
 *    | |    / _ \| '_ \| '_ \ / _ \ \/ / |/ _ \| '_ \  | ___ \ | | | | | |
 *    | \__/\ (_) | | | | | | |  __/>  <| | (_) | | | | | |_/ / |/ /| |/ / 
 *     \____/\___/|_| |_|_| |_|\___/_/\_\_|\___/|_| |_| \____/|___/ |___/  
 *                                                                         
 *                                                                         
 */

function connectDB() {

$host = 'localhost';
$user = 'root';
$DBName = 'cms_1';
$passwd  = '';

try {
	$bdd = new PDO('mysql:host='.$host.';dbname='.$DBName.';charset=utf8', $user, $passwd);
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

return $bdd;

}

/***
 *    ______                                     _              __________________ 
 *    |  _  \                                   (_)             | ___ \  _  \  _  \
 *    | | | |___  ___ ___  _ __  _ __   _____  ___  ___  _ __   | |_/ / | | | | | |
 *    | | | / _ \/ __/ _ \| '_ \| '_ \ / _ \ \/ / |/ _ \| '_ \  | ___ \ | | | | | |
 *    | |/ /  __/ (_| (_) | | | | | | |  __/>  <| | (_) | | | | | |_/ / |/ /| |/ / 
 *    |___/ \___|\___\___/|_| |_|_| |_|\___/_/\_\_|\___/|_| |_| \____/|___/ |___/  
 *                                                                                 
 *                                                                                 
 */

function disconnectDB($bdd) {

$bdd = null;

}

/***
 *                _     _____                   _      ___       _   _      _            ______         _____       _   
 *               | |   /  __ \                 | |    / _ \     | | (_)    | |           | ___ \       /  __ \     | |  
 *      __ _  ___| |_  | /  \/ ___  _   _ _ __ | |_  / /_\ \_ __| |_ _  ___| | ___  ___  | |_/ /_   _  | /  \/ __ _| |_ 
 *     / _` |/ _ \ __| | |    / _ \| | | | '_ \| __| |  _  | '__| __| |/ __| |/ _ \/ __| | ___ \ | | | | |    / _` | __|
 *    | (_| |  __/ |_  | \__/\ (_) | |_| | | | | |_  | | | | |  | |_| | (__| |  __/\__ \ | |_/ / |_| | | \__/\ (_| | |_ 
 *     \__, |\___|\__|  \____/\___/ \__,_|_| |_|\__| \_| |_/_|   \__|_|\___|_|\___||___/ \____/ \__, |  \____/\__,_|\__|
 *      __/ |                                                                                    __/ |                  
 *     |___/                                                                                    |___/                   
 */

function getCountArticlesByCat($idCategorie) {

$myBdd = connectDB();

$reponse = $myBdd->query('SELECT count(articles.id_article) FROM articles, categories, categorie_article WHERE articles.id_article=categorie_article.id_article AND categories.id_categorie=categorie_article.id_categorie AND categories.id_categorie='.$idCategorie);

while ($myData = $reponse->fetch()) {
	$myNumber = $myData['count(articles.id_article)'];
}

return $myNumber;
	
}

/***
 *    ______ _          _     __  _____  _____   _    _               _ 
 *    |  ___(_)        | |   /  ||  _  ||  _  | | |  | |             | |
 *    | |_   _ _ __ ___| |_  `| || |/' || |/' | | |  | | ___  _ __ __| |
 *    |  _| | | '__/ __| __|  | ||  /| ||  /| | | |/\| |/ _ \| '__/ _` |
 *    | |   | | |  \__ \ |_  _| |\ |_/ /\ |_/ / \  /\  / (_) | | | (_| |
 *    \_|   |_|_|  |___/\__| \___/\___/  \___/   \/  \/ \___/|_|  \__,_|
 *                                                                      
 *                                                                      
 */

function First100Word($texte, $idArticle){

$nb_mots = 100;
$var = $texte;
$tab= explode(' ', $var, $nb_mots+1);
unset($tab[$nb_mots]);
$myTexte=implode(' ', $tab).'... <a href="article.php?article='.$idArticle.'">Lire plus</a>';
return $myTexte;

}



/***
 *                _     _____       _                        _      
 *               | |   /  __ \     | |                      (_)     
 *      __ _  ___| |_  | /  \/ __ _| |_ ___  __ _  ___  _ __ _  ___ 
 *     / _` |/ _ \ __| | |    / _` | __/ _ \/ _` |/ _ \| '__| |/ _ \
 *    | (_| |  __/ |_  | \__/\ (_| | ||  __/ (_| | (_) | |  | |  __/
 *     \__, |\___|\__|  \____/\__,_|\__\___|\__, |\___/|_|  |_|\___|
 *      __/ |                                __/ |                  
 *     |___/                                |___/                   
 */

function getCategorie() {

$myBdd = connectDB();

$reponse = $myBdd->query('SELECT * FROM categories');

$i=1;
while ($myData = $reponse->fetch()) {
	if(getCountArticlesByCat($myData['id_categorie']) > 0 ) {
	$myCategories[$i]['id_categorie'] = $myData['id_categorie'];
	$myCategories[$i]['nom'] = $myData['nom'];
	$i++;
	}
}

$reponse->closeCursor();

disconnectDB($myBdd);

return $myCategories;

}
/***
 *                _     _____       _                        _       ______         _____    _ 
 *               | |   /  __ \     | |                      (_)      | ___ \       |_   _|  | |
 *      __ _  ___| |_  | /  \/ __ _| |_ ___  __ _  ___  _ __ _  ___  | |_/ /_   _    | |  __| |
 *     / _` |/ _ \ __| | |    / _` | __/ _ \/ _` |/ _ \| '__| |/ _ \ | ___ \ | | |   | | / _` |
 *    | (_| |  __/ |_  | \__/\ (_| | ||  __/ (_| | (_) | |  | |  __/ | |_/ / |_| |  _| || (_| |
 *     \__, |\___|\__|  \____/\__,_|\__\___|\__, |\___/|_|  |_|\___| \____/ \__, |  \___/\__,_|
 *      __/ |                                __/ |                           __/ |             
 *     |___/                                |___/                           |___/              
 */

function getCategorieById($idCategorie) {

	$myBdd = connectDB();
		
	$sql = 'SELECT nom FROM categories WHERE id_categorie='.$idCategorie;

	$reponse = $myBdd->query($sql);

	$myData = $reponse->fetch();

	disconnectDB($myBdd);

	return($myData['nom']);

}

/***
 *                _     _____       _                        _       ______          ___       _   _      _      
 *               | |   /  __ \     | |                      (_)      | ___ \        / _ \     | | (_)    | |     
 *      __ _  ___| |_  | /  \/ __ _| |_ ___  __ _  ___  _ __ _  ___  | |_/ /_   _  / /_\ \_ __| |_ _  ___| | ___ 
 *     / _` |/ _ \ __| | |    / _` | __/ _ \/ _` |/ _ \| '__| |/ _ \ | ___ \ | | | |  _  | '__| __| |/ __| |/ _ \
 *    | (_| |  __/ |_  | \__/\ (_| | ||  __/ (_| | (_) | |  | |  __/ | |_/ / |_| | | | | | |  | |_| | (__| |  __/
 *     \__, |\___|\__|  \____/\__,_|\__\___|\__, |\___/|_|  |_|\___| \____/ \__, | \_| |_/_|   \__|_|\___|_|\___|
 *      __/ |                                __/ |                           __/ |                               
 *     |___/                                |___/                           |___/                                
 */

function getCategorieByArticle($idArticle) {

	$myBdd = connectDB();
		
	$sql = 'SELECT categories.nom, categories.id_categorie FROM articles, categories, categorie_article WHERE articles.id_article=categorie_article.id_article AND categories.id_categorie=categorie_article.id_categorie AND articles.id_article='.$idArticle;

	$reponse = $myBdd->query($sql);

	while ($myData = $reponse->fetch()) {
		$myCategorie[$i]['id_categorie'] = $myData['id_categorie'];
		$myCategorie[$i]['nom'] = $myData['nom'];
	}

	disconnectDB($myBdd);

	return $myCategorie;

}
/***
 *                _      ___       _   _      _       ______         _____    _ 
 *               | |    / _ \     | | (_)    | |      | ___ \       |_   _|  | |
 *      __ _  ___| |_  / /_\ \_ __| |_ _  ___| | ___  | |_/ /_   _    | |  __| |
 *     / _` |/ _ \ __| |  _  | '__| __| |/ __| |/ _ \ | ___ \ | | |   | | / _` |
 *    | (_| |  __/ |_  | | | | |  | |_| | (__| |  __/ | |_/ / |_| |  _| || (_| |
 *     \__, |\___|\__| \_| |_/_|   \__|_|\___|_|\___| \____/ \__, |  \___/\__,_|
 *      __/ |                                                 __/ |             
 *     |___/                                                 |___/              
 */

function getArticleById($idArticle) {

	$myBdd = connectDB();
		
	$sql = 'SELECT Titre FROM articles WHERE id_article='.$idArticle;

	$reponse = $myBdd->query($sql);

	$myData = $reponse->fetch();

	disconnectDB($myBdd);

	return($myData['Titre']);

}


/***
 *                _      ___       _   _      _      
 *               | |    / _ \     | | (_)    | |     
 *      __ _  ___| |_  / /_\ \_ __| |_ _  ___| | ___ 
 *     / _` |/ _ \ __| |  _  | '__| __| |/ __| |/ _ \
 *    | (_| |  __/ |_  | | | | |  | |_| | (__| |  __/
 *     \__, |\___|\__| \_| |_/_|   \__|_|\___|_|\___|
 *      __/ |                                        
 *     |___/                                         
 */

function getArticle() {

$myBdd = connectDB();

$reponse = $myBdd->query('SELECT * FROM articles');

$i=1;
while ($myData = $reponse->fetch())
{
	$myArticles[$i]['id_article'] = $myData['id_article'];
	$myArticles[$i]['id_utilisateur'] = $myData['id_utilisateur'];
	$myArticles[$i]['date'] = $myData['date'];
	$myArticles[$i]['text'] = $myData['text'];
	$myArticles[$i]['Titre'] = $myData['Titre'];
	$i++;
}

$reponse->closeCursor();

disconnectDB($myBdd);
return $myArticles;

}

/***
 *                _     _____       _                        _         ___       _   _      _           
 *               | |   /  __ \     | |                      (_)       / _ \     | | (_)    | |          
 *      __ _  ___| |_  | /  \/ __ _| |_ ___  __ _  ___  _ __ _  ___  / /_\ \_ __| |_ _  ___| | ___  ___ 
 *     / _` |/ _ \ __| | |    / _` | __/ _ \/ _` |/ _ \| '__| |/ _ \ |  _  | '__| __| |/ __| |/ _ \/ __|
 *    | (_| |  __/ |_  | \__/\ (_| | ||  __/ (_| | (_) | |  | |  __/ | | | | |  | |_| | (__| |  __/\__ \
 *     \__, |\___|\__|  \____/\__,_|\__\___|\__, |\___/|_|  |_|\___| \_| |_/_|   \__|_|\___|_|\___||___/
 *      __/ |                                __/ |                                                      
 *     |___/                                |___/                                                       
 */

function getCategorieArticles($idCategorie) {

$myBdd = connectDB();

$reponse = $myBdd->query('SELECT articles.id_article, articles.Titre, articles.date, articles.text, medias.chemin  FROM articles, categories, categorie_article, medias WHERE articles.id_article=categorie_article.id_article AND categories.id_categorie=categorie_article.id_categorie AND categories.id_categorie ='.$idCategorie.' AND articles.id_article=medias.id_article');

$i=1;
while ($myData = $reponse->fetch())
{
	$CategorieArticles[$i]['id_article'] = $myData['id_article'];
	$CategorieArticles[$i]['Titre'] = $myData['Titre'];
	$CategorieArticles[$i]['date'] = $myData['date'];
	$CategorieArticles[$i]['text'] = $myData['text'];
	$CategorieArticles[$i]['chemin'] = $myData['chemin'];
	$i++;
}

$reponse->closeCursor();

disconnectDB($myBdd);

return $CategorieArticles;

}

/***
 *                _     _____   _               _      ___       _   _      _           
 *               | |   |  ___| | |             | |    / _ \     | | (_)    | |          
 *      __ _  ___| |_  |___ \  | |     __ _ ___| |_  / /_\ \_ __| |_ _  ___| | ___  ___ 
 *     / _` |/ _ \ __|     \ \ | |    / _` / __| __| |  _  | '__| __| |/ __| |/ _ \/ __|
 *    | (_| |  __/ |_  /\__/ / | |___| (_| \__ \ |_  | | | | |  | |_| | (__| |  __/\__ \
 *     \__, |\___|\__| \____/  \_____/\__,_|___/\__| \_| |_/_|   \__|_|\___|_|\___||___/
 *      __/ |                                                                           
 *     |___/                                                                            
 */

function get5LastArticles() {

	$myBdd = connectDB();
    // a coriger, ne prend pas les 5 plus récent --> article 1 a 2 categorie et n'est donc pas pris en compte, pourquoi ?
    //SELECT articles.id_article, articles.Titre, articles.text, articles.date, categories.nom FROM articles, categories, categorie_article WHERE articles.id_article=categorie_article.id_article AND categories.id_categorie=categorie_article.id_categorie group by categories.nom having count(articles.id_article) > 1 ORDER BY date DESC LIMIT 0,5

    $reponse = $myBdd->query('SELECT articles.id_article, articles.Titre, articles.text, articles.date, categories.nom, categories.id_categorie, medias.chemin FROM articles, categories, categorie_article, medias WHERE articles.id_article=categorie_article.id_article AND articles.id_article=medias.id_article AND categories.id_categorie=categorie_article.id_categorie ORDER BY date DESC LIMIT 0,5');

    $i=1;
    while ($myData = $reponse->fetch())
    {
        $my5LastArticles[$i]['Titre']        = $myData['Titre'];
        $my5LastArticles[$i]['id_article']   = $myData['id_article'];
        $my5LastArticles[$i]['text']         = $myData['text'];
        $my5LastArticles[$i]['date']         = $myData['date'];
        $my5LastArticles[$i]['categorie']    = $myData['nom'];
        $my5LastArticles[$i]['id_categorie'] = $myData['id_categorie'];
        $my5LastArticles[$i]['chemin'] = $myData['chemin'];
        $i++;
    }

    $reponse->closeCursor();

    disconnectDB($myBdd);

    return $my5LastArticles;

}

// GET ALL ARTICLES

function getAllArticles() {

	$myBdd = connectDB();
	
    $reponse = $myBdd->query('SELECT articles.id_article, articles.Titre, articles.text, articles.date, categories.nom, categories.id_categorie, medias.chemin FROM articles, categories, categorie_article, medias WHERE articles.id_article=categorie_article.id_article AND articles.id_article=medias.id_article AND categories.id_categorie=categorie_article.id_categorie GROUP BY articles.id_article');

    $i=1;
    while ($myData = $reponse->fetch())
    {
        $myAllArticle[$i]['Titre'] = $myData['Titre'];
        $myAllArticle[$i]['id_article'] = $myData['id_article'];
        $myAllArticle[$i]['text'] = $myData['text'];
        $myAllArticle[$i]['date'] = $myData['date'];
        $myAllArticle[$i]['categorie'] = $myData['nom'];
        $myAllArticle[$i]['id_categorie'] = $myData['id_categorie'];
        $myAllArticle[$i]['chemin'] = $myData['chemin'];
        $i++;
    }

    $reponse->closeCursor();

    disconnectDB($myBdd);

    return $myAllArticle;

}

/***
 *                _    ___  ___         _ _          ___       _   _      _      
 *               | |   |  \/  |        | (_)        / _ \     | | (_)    | |     
 *      __ _  ___| |_  | .  . | ___  __| |_  __ _  / /_\ \_ __| |_ _  ___| | ___ 
 *     / _` |/ _ \ __| | |\/| |/ _ \/ _` | |/ _` | |  _  | '__| __| |/ __| |/ _ \
 *    | (_| |  __/ |_  | |  | |  __/ (_| | | (_| | | | | | |  | |_| | (__| |  __/
 *     \__, |\___|\__| \_|  |_/\___|\__,_|_|\__,_| \_| |_/_|   \__|_|\___|_|\___|
 *      __/ |                                                                    
 *     |___/                                                                     
 */
 
 function getMediaArticle($idArticle) {
 
    $myBdd = connectDB();

    $reponse = $myBdd->query('SELECT medias.chemin FROM articles, medias WHERE articles.id_article=medias.id_article AND articles.id_article ='.$idArticle);

    while ($myData = $reponse->fetch()) {
        $myMediaArticle['chemin'] = $myData['chemin'];
    }

    disconnectDB($myBdd);

    return $myMediaArticle;
 
 }

/***
 *                _     _____ _             ___       _   _      _      
 *               | |   |_   _| |           / _ \     | | (_)    | |     
 *      __ _  ___| |_    | | | |__   ___  / /_\ \_ __| |_ _  ___| | ___ 
 *     / _` |/ _ \ __|   | | | '_ \ / _ \ |  _  | '__| __| |/ __| |/ _ \
 *    | (_| |  __/ |_    | | | | | |  __/ | | | | |  | |_| | (__| |  __/
 *     \__, |\___|\__|   \_/ |_| |_|\___| \_| |_/_|   \__|_|\___|_|\___|
 *      __/ |                                                           
 *     |___/                                                            
 */
 
 function getTheArticle($idArticle) {
 
$myBdd = connectDB();

$chemin = getMediaArticle($idArticle);

$sql1 = 'SELECT articles.id_article, articles.Titre, articles.date, articles.text, medias.chemin FROM articles, medias WHERE articles.id_article = '.$idArticle.' AND articles.id_article=medias.id_article';
$sql2 = 'SELECT articles.id_article, articles.Titre, articles.date, articles.text FROM articles WHERE articles.id_article = '.$idArticle;

$reponse1 = $myBdd->query($sql1);
$reponse2 = $myBdd->query($sql2);



if($chemin['chemin'] != '0') {

	while ($myData = $reponse1->fetch()) {
		$myTheArticle['id_article'] = $myData['id_article'];
		$myTheArticle['Titre'] = $myData['Titre'];
		$myTheArticle['text'] = $myData['text'];
		$myTheArticle['date'] = $myData['date'];
		$myTheArticle['chemin'] = $myData['chemin'];
	}
	
} else {

	while ($myData = $reponse2->fetch()) {
		$myTheArticle['id_article'] = $myData['id_article'];
		$myTheArticle['Titre'] = $myData['Titre'];
		$myTheArticle['text'] = $myData['text'];
		$myTheArticle['date'] = $myData['date'];
	}
	
}

return $myTheArticle;

}


// GET ROLE 

function getRole($idRole) {

	$myBdd = connectDB();

	$sql = 'SELECT nom FROM roles WHERE id_role LIKE \''.$idRole.'\'';

	$req = $myBdd->query($sql);

	$myData = $req->fetch();

	return($myData['nom']);

	disconnectDB($myDB);

}

// USERS COUNT

function usersCount(){

	$myDB = connectDB();

	$sql = 'SELECT COUNT(login) FROM utilisateurs';

	$usersCount = $myDB->query($sql)->fetchColumn();

	disconnectDB($myDB);

	return $usersCount;
}


// GET USERS 

function getAllUsers() {
	$myDB = connectDB();


	$sql = 'SELECT utilisateurs.id_utilisateur, utilisateurs.login, utilisateurs.email, utilisateurs.id_role, roles.nom FROM utilisateurs, roles WHERE utilisateurs.id_role=roles.id_role ORDER BY utilisateurs.id_utilisateur';

	$myUserReq = $myDB->query($sql);

	$i = 0;

	while($myData = $myUserReq->fetch()) {

	    $myUser[$i]['id']      = $myData['id_utilisateur'];
	    $myUser[$i]['login']   = $myData['login'];
	    $myUser[$i]['mail']    = $myData['email'];
	    $myUser[$i]['idRole']  = $myData['id_role'];
	    $myUser[$i]['nomRole'] = $myData['nom'];

	    $i++;

	}

	$myUserReq->closeCursor();

	return $myUser;
}


// USERS COUNT 

function rolesCount() {

	$myDB = connectDB();

	$sql = 'SELECT COUNT(id_role) FROM roles';

	$rolesCount = $myDB->query($sql)->fetchColumn();

	disconnectDB($myDB);

	return $rolesCount;
}


// GET ALL ROLES 

function getAllRoles() {

	$myDB = connectDB();

	$sql = 'SELECT * FROM roles';

    $myRolesReq = $myDB->query($sql);

    $i = 0;

    while($myData = $myRolesReq->fetch()) {

        $myRole[$i]['idRole'] = $myData['id_role'];
        $myRole[$i]['nom']    = $myData['nom'];

        $i++;

    }

    disconnectDB($myDB);

    return $myRole;
}


// USER ARTICLES COUNT 

function userArticlesCount($idUser) {

	$myDB = connectDB();

	$sql = 'SELECT COUNT(id_article) FROM articles WHERE id_utilisateur = '.$idUser;

	$nbArticle = $myDB->query($sql)->fetchColumn();

    disconnectDB($myDB);

	return $nbArticle;

}


// EDIT ARTICLE BY ID 

function editArticleById($myIdArticle) {

	$myDB = connectDB();

	$sql = 'SELECT Titre, text FROM articles WHERE id_article = '.$myIdArticle;

	$articleReq = $myDB->query($sql)->fetch(PDO::FETCH_ASSOC);

	$article['titre'] = $articleReq['Titre'];
	$article['text']  = $articleReq['text'];

    disconnectDB($myDB);

	return $article;
}


// GET USER ARTICLES

function getUserArticles($idUser) {

	$myDB = connectDB();

	$sql = 'SELECT * FROM articles WHERE id_utilisateur = '.$idUser;

	$articleReq = $myDB->query($sql);

	$i = 0;

	while($myData = $articleReq->fetch()){
		$userArticle[$i]['id']    = $myData['id_article'];
		$userArticle[$i]['date']  = $myData['date'];
		$userArticle[$i]['titre'] = $myData['Titre'];
		$userArticle[$i]['text']  = $myData['text'];

		$i++;
	}

    disconnectDB($myDB);

	return $userArticle;

}


?>