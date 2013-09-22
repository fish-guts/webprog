<?php

    $recipient = "xobe@zhaw.ch";
    $subject = "Test E-Mail";
    $body = "Hoi Jaim\n\n, das ist meine Test E-Mail, hoffentlich kommts an. ";
    
     if (mail($recipient, $subject, $body)) {
         echo("<p>Mail erfolgreich gesendet</p>");
     } else {
         echo("<p>Beim Senden der Mail ist ein Fehler aufgetreten");
     }

?>