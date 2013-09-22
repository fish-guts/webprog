<?php

    $recipient = "severin.mueller@gmx.net";
    $subject = "fourteen words";
    $body = "Adolf H, superstar!!!";
    
     if (mail($recipient, $subject, $body)) {
         echo("<p>Mail erfolgreich gesendet</p>");
     } else {
         echo("<p>Beim Senden der Mail ist ein Fehler aufgetreten");
     }

?>