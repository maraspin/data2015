<?php

/*
 * Script che viene invocato dopo che l'utente ha effettuato login su Facebook
 */
require_once __DIR__ . '/include/fbinit.php';

// Diamo per assodato che tutto vada bene con il login...
$b_error = false;

// Verifichiamo che tutto sia andato bene; se non è così riproponiamo possibilità di eseguire login...
try {
  $helper = $fb->getRedirectLoginHelper();
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  $s_message = 'Graph Error Message: ' . $e->getMessage();
  $b_error = true;  
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  $s_message = 'Facebook SDK Error Message: ' . $e->getMessage();
  $b_error = true;  
}

if ($b_error) {
  echo "Something went wrong... " . $s_message . "<br />";
  include('include/loginLink.php');
  exit;
}

// Utilizzeremo questo valore in sessione per memorizzare l'accessToken fornito da FB 
// e necessario per eseguire le successive chiamate
$_SESSION['facebook_access_token'] = (string) $accessToken;

// Rimandiamo l'utente alla pagina principale della nostra applicazione
header("Location: index.php");
