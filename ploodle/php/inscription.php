<?php

require_once 'bibli_generale.php';

head('Inscription');
nav();

if (isset($_POST['btnInscription'])) {
    traitementInscription();
}
aff_inscription();

footer();

/*FONCTIONS*/

function aff_inscription():void {

    $post = ['login' => '', 'nom' => '', 'prenom' =>'' ];

    if (isset($_POST['btnInscription'])) {
        $post = $_POST;
    }

    echo
    '<section class="sessionForm"><h3>Inscription</h3>',
    '<p>Pour vous inscrire, merci de fournir les informations suivantes.</p>',
    '<form action="inscription.php" method="POST">',
        '<ul>',
            '<li><label for="login">Login</label></li>',
            '<li><input id="login" name="login" type="text" placeholder="4 à 8 lettres minuscules ou chiffres" required value="', $post['login'], '"></input></li>',
            '<li><label for="password">Mot de passe</label></li>',
            '<li><input id="password" name="password" type="password" placeholder="4 caractères minimum" required></input></li>',
            '<li><label for="password">Mot de passe</label></li>',
            '<li><input id="password" name="password2" type="password" required></input></li>',
            '<li><label for="nom">Nom</label></li>',
            '<li><input id="nom" name="nom" type="text" required value="', $post['nom'], '"></input></liu>',
            '<li><label for="prenom">Prénom</label></li>',
            '<li><input id="prenom" name="prenom" type="text" required value="', $post['prenom'], '"></input></li>',
            '<li><input type="submit" name="btnInscription" value="S\'inscrire"></li>',
        '</ul>',
    '</form>',
    '<a href="login.php">Se connecter</a>',
    '</section>';
}


function traitementInscription():void {
    $passe = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $bd = bdConnect();
	$sql = "INSERT INTO user (usNom, usPrenom, usLogin, usPass)
		VALUES ('" . $_POST['nom']
		 . "','" . $_POST['prenom']
		 . "','" . $_POST['login']
		 . "','" . $passe . "')";

	bdSendRequest($bd, $sql);
	mysqli_close($bd);

	echo '<section>',
	'<p>Un nouvel usager a bien été enregistré.</p>',
	'</section>';

}


