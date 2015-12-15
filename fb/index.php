<?php

/*
 * Pagina principale della nostra app - Entry point
 */

// Parametri con cui la nostra app viene configurata
require_once __DIR__ . '/include/fbinit.php';

// Helper utilizzato per il login
$helper = $fb->getRedirectLoginHelper();

// Supponiamo non ci siano problemi e che il login vada a buon fine
$isError = false;

// Se qualcosa non va come previsto, $b_error viene impostato a true
try {
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->get('/me?fields=id,name', $s_accessToken);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // echo 'Graph returned an error: ' . $e->getMessage() . "<br />" ;
  $isError = true;  
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  $isError = true;  
  // echo 'Facebook SDK returned an error: ' . $e->getMessage() . "<br />";
}

// Diamo per assodato (azzardato ...ma tant'è, per lo scopo di questo esercizio) 
// che l'errore sia dovuto a un problema in autenticazione
if ($isError) {
  // @TODO: Generare qui il link per il login
  // Vedere https://developers.facebook.com/docs/php/howto/example_facebook_login
}

// Recuperiamo l'utente
$user = $response->getGraphUser();

// Stampiamo il nome dell'utente loggato (noi, teoricamente)
echo 'Name: ' . $user->getName() . PHP_EOL;

// Link per eseguire il logout
echo '<a href="logout.php">Logout</a>';


?><html>
<body>

<!-- Qui di seguito utilizziamo il widget Facebook Like -->
<div id="fb-root"></div>

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1504741946487367',
      xfbml      : true,
      version    : 'v2.5'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<div
  class="fb-like"
  data-share="true"
  data-width="450"
  data-show-faces="true">
</div>
</body>
</html>