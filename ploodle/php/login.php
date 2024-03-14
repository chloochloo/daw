<?php

require_once 'bibli_generale.php';

head('Connexion');
nav();

if (isset($_POST['btnConnexion'])) {
    traitementConnexion();
}
affConnex();

footer();

/*FONCTIONS*/

function affConnex():void {
echo 
    '<section class="sessionForm"><h3>Connexion</h3>',
        '<p>Pour vous connecter, merci de fournir les informations suivantes.</p>',
        '<form action="login.php" method="POST">',
            '<ul>',
                '<li><label for="login">Login</label></li>',
                '<li><input id="login" name="login" type="text" required autocomplete="login"></input></li>',
                '<li><label for="password">Mot de passe</label></li>',
                '<li><input id="password" name="password" type="password" required autocomplete="current-password"></input></li>',
                '<li><input type="submit" name="btnConnexion" value="Se connecter"></li>',
            '</ul>',
        '</form>',
    '<a href="inscription.php">S\'inscrire</a>',
    '</section>';
}

function traitementConnexion(): void {
    if (isset($_POST['login'], $_POST['password'])) {

        $login = $_POST['login'];
        $passe = $_POST['password'];

        $db = bdConnect();

        $query = "SELECT * FROM user WHERE usLogin='$login'";
        $result = bdSendRequest($db, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $userData = mysqli_fetch_assoc($result);
            $hashedPassword = $userData['usPass'];

            if (password_verify($passe, $hashedPassword)) {
                $_SESSION['usLogin'] = $userData['usLogin'];
                $_SESSION['usID'] = $userData['usID'];
                $_SESSION['usNom'] = $userData['usNom'];
                $_SESSION['usPrenom'] = $userData['usPrenom'];
                header('Location: ../index.php');
                exit;
            } else {
                loginFailed();
            }
        } else {
            loginFailed();
        }

        mysqli_close($db);
    }
}

function loginFailed(): void {
    echo '<section><p>Identifiant ou mot de passe incorrect.</p></section>';
}