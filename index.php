<?php

    $recipient = "severin.mueller@gmx.net";
    $header = 'From: adolf@h1tl3r.com' . "\r\n" .
    'Reply-To: adolf@h1tl3r.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    $subject = "fourteen words";
    $body = "Adolf H, superstar!!!";
    
     if (mail($recipient, $subject, $body, $header)) {
         echo("<p>Mail erfolgreich gesendet</p>");
     } else {
         echo("<p>Beim Senden der Mail ist ein Fehler aufgetreten");
     }

?>