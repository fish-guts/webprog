<?php

    $header = 'From: severin.mueller@gmx.net' . "\r\n" .
    'Reply-To: severin.mueller@gmx.net' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

    $recipient = "xobe@zhaw.ch";
    $subject = "Test E-Mail";
    $body = "Hoi Jaime\n\n, das ist meine Test E-Mail, hoffentlich kommts an. ";
    
     if (mail($recipient, $subject, $body, $header)) {
         echo("<p>Mail erfolgreich gesendet</p>");
     } else {
         echo("<p>Beim Senden der Mail ist ein Fehler aufgetreten");
     }

?>
