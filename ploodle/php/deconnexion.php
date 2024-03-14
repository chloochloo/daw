<?php

require_once 'bibli_generale.php';

head('Deconnexion');
nav();
footer();

unset($_SESSION['usLogin']);
unset($_SESSION['usID']);
unset($_SESSION['usNom']);
unset($_SESSION['usPrenom']);

if(isset($_SERVER['HTTP_REFERER'])) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    header('Location: ../index.php');
}

