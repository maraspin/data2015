<?php

// Usiamo questa riga per includere l'autoloader
require_once __DIR__ . '/../vendor/autoload.php';

// Utilizzeremo la sessione per mantenere il login attivo
session_start();

// Le chiamate a FB Graph API richiedono un cosiddetto access_token - lo prendiamo dalla sessione
// (è stato settato al login - vedi login-callback.php)
$s_accessToken = $_SESSION['facebook_access_token'];
if (empty($s_accessToken)) {
	$s_accessToken = 'undefined';
}

// Creiamo l'applicazione FB vera e propria, impostando gli opportuni parametri
$fb = new Facebook\Facebook([
  'app_id' => 'APP_ID',
  'app_secret' => 'APP_SECRET',
  'default_graph_version' => 'v2.2',
  ]);
