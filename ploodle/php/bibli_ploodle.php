<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting( E_ALL );


define ('BD_NAME', 'projet_daw');
define ('BD_USER', 'projet_daw_u');
define ('BD_PASS', 'projet_daw_p');
define ('BD_SERVER', 'localhost');


function head(string $title, string $prefixe = '..', string $css = 'style2.css'):void {
    echo '<!DOCTYPE html>',
    '<html lang="fr">',
        '<head>',
            '<meta charset="UTF-8">',
            '<meta name="viewport" content="width=device-width, initial-scale=1.0">',
            '<link rel="stylesheet" href="'.$prefixe.'/styles/'.$css.'">',
            '<title>'.$title.'</title>',
        '</head>',
        '<body>',
            '<div id="display">';
}

function nav(string $prefixe = '..'):void {
    echo '<nav>',
    '<ul>',
        '<li><a href='.$prefixe.'/index.php>Ploodle</a></li>',
        '<li>';
    if (isset($_SESSION['usLogin'])) {
        echo '<span onclick="switchSidebar()" class="clickable">'.$_SESSION['usPrenom'],' ',$_SESSION['usNom'].'</span></li>';
    } else {
        echo '<a href="'.$prefixe.'/php/login.php">Connexion</a></li>';
    }
    echo '</ul>',
'</nav>',
'<main>';
}

function footer(string $prefixe = '..'):void {
echo '<div class="sidebar" id="sidebar">',
    '<ul>',
        '<li><h3>',$_SESSION['usLogin'],'</h3></li>',
        '<li><a href="'.$prefixe.'/php/deconnexion.php">Déconnexion</a></li>',
        '<li><a href="'.$prefixe.'/php/profil.php">Profil</a></li>',
        '<li><a href="#">Menu Item 3</a></li>',
        '<li><a href="#">Menu Item 4</a></li>',
        '<li><a href="#">Menu Item 5</a></li>',
    '</ul>',
'</div>';
echo '</main></div></body></html>';
echo '<script>',
    'function switchSidebar() {',
        'var sidebar = document.getElementById("sidebar");',
        'if (sidebar.style.width === "250px") {',
            'sidebar.style.width = "0";',
        '} else {',
            'sidebar.style.width = "250px";',
        '}',
    '}',
    '</script>';
}