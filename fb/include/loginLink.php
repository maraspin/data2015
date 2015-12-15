 <?php

 /*
 * Semplice snippet per generare un logout link
 * apre la finestra di FB e chiede autorizzazione all'utente la prima volta
 */

 $permissions = ['email', 'user_likes']; // optional

 // Viene generata una URL di Login direttamente dall'SDK di FB - Dobbiamo passare una callback URL
 $loginUrl = $helper->getLoginUrl('http://www.data2015.it/login-callback.php', $permissions);
 echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
 