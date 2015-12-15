<?php

/*
 * Script che distrugge la sessione e quindi "stacca" l'applicazione da FB - ma NON esegue logout da Facebook
 * Dare un'occhiata a https://developers.facebook.com/docs/php/FacebookRedirectLoginHelper/4.0.0 per logout anche da FB
 * Metodo getLogoutUrl
 */

require_once __DIR__ . '/include/fbinit.php';

// Azzeramento parametri sessione
$_SESSION = array();

// Distruzione Sessione
session_destroy();

// Redirect a pagina principale App
header("location: index.php");