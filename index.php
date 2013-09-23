<?php
    /* smtp über postfix für gmail konfiguriert (mit tls) */
    $from = 'severinmueller1983@gmail.com';
    /* emfpänger */
    $to = 'xobe@zhaw.ch';
    $subject = 'Hi!';
    $body = "Hi Jaime,\n\nDies ist eine TestMail, generiert von meinem PHP Script gesendet mit postfix\n\nGruess Severin";

    $header = 'From: Severin Müller' . "\r\n" .
    'Reply-To: severinmueller1983@gmail.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();


    if (!mail($to, $subject, $body,$header)) {
        echo("<p>Es ist ein Fehler aufgetreten!!!");
    } else {
        echo('<p>Message successfully sent!</p>');
    }

?>

