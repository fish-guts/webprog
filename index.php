<?php

    $from = 'severinmueller1983@gmail.com';
    $to = 'xobe@zhaw.ch';
    $subject = 'Hi!';
    $body = "Hi Jaime,\n\nDies ist eine TestMail, generiert von meinem PHP Script\n\nGruess Severin";

    $header = 'From: Severin Müller' . "\r\n" .
    'Reply-To: severinmueller1983@gmail,com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();


    if (!mail($to, $subject, $body,$headers)) {
        echo("<p>Es ist ein Fehler aufgetreten!!!");
    } else {
        echo('<p>Message successfully sent!</p>');
    }

?>

