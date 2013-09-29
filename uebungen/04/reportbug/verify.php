<?php

require_once('../recaptcha/recaptchalib.php');

require_once('../phpmailer/class.phpmailer.php');
$privatekey = "6LcZHOgSAAAAAGffw7pv6JfHn1KvEsPCi3Pun34L";
$resp = recaptcha_check_answer($privatekey, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);


if (!$resp->is_valid) {
    // What happens when the CAPTCHA was entered incorrectly
    header('Location: reportbug.php?captchafailed=true');
    exit();
} else {
    $filedate = date("Ymd_His");
    $uploaddir = '/var/www/uploads/' . $filedate . "_" . $_POST['email'] . "/";
    mkdir($uploaddir, 0644);
    $filename = $uploaddir . $filedate . "_ticketfile.txt";
    $mail = new PHPMailer();


    $mail->IsSMTP(); // telling the class to use SMTP
    $mail->Host = "mail.yourdomain.com"; // SMTP server
    $mail->SMTPDebug = 2;                     // enables SMTP debug information (for testing)
    // 1 = errors and messages
    // 2 = messages only
    $mail->SMTPAuth = true;                  // enable SMTP authentication
    $mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
    $mail->Host = "smtp.gmail.com";      // sets GMAIL as the SMTP server
    $mail->Port = 465;                   // set the SMTP port for the GMAIL server
    $mail->Username = "severinmueller1983@gmail.com";  // GMAIL username
    $mail->Password = "hoppus123";            // GMAIL password

    $mail->SetFrom('severinmueller1983@gmail.com', 'Severin Mueller');

    $mail->AddReplyTo('severinmueller1983@gmail.com', 'Severin Mueller');

    $mail->Subject = "New Ticket notification";

    $mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

    $address = "severin.mueller@gmx.net";
    $mail->AddAddress($address, "John Doe");



    echo '<pre>';
    foreach ($_FILES["upload"]["name"] as $key => $error) {
        if ($error == UPLOAD_ERR_OK) {
            $tmp_name = $_FILES["upload"]["tmp_name"][$key];
            $uploadfile = $uploaddir . $filedate . "_" . basename($_FILES["upload"]["name"][$key]);
            $name = $_FILES["upload"]["name"][$key];
            move_uploaded_file($tmp_name, $uploadfile);
            $mail->AddAttachment($uploadfile); // attachment
        }
        fopen($filename, "w");
        $cb = $_POST["callback"];
        if ($cb == true) {
            $cbstring = "yes";
        } else {
            $cbstring = "no";
        }
        if (is_writable($filename)) {
            $content =
                    "Name          : " . htmlspecialchars($_POST["name"]) . "\n" .
                    "E-Mail        : " . htmlspecialchars($_POST["email"]) . "\n" .
                    "Site          : " . htmlspecialchars($_POST["web"]) . "\n" .
                    "Datum         : " . htmlspecialchars($_POST["bugDate"]) . "\n" .
                    "Fehlertyp     : " . htmlspecialchars($_POST["bugtype"]) . "\n" .
                    "Priorität     : " . htmlspecialchars($_POST["priority"]) . "\n" .
                    "Rückruf       : " . htmlspecialchars($cbstring) . "\n" .
                    "Reproduzierbar: " . htmlspecialchars($_POST["reproducable"]) . "\n" .
                    "Beschreibung  : " . htmlspecialchars($_POST["text"]);

            $mail->MsgHTML($content);
            if (!$handle = fopen($filename, "a")) {
                print "Kann die Datei $filename nicht öffnen";
                exit;
            }

            // Schreibe $somecontent in die geöffnete Datei.
            if (!fwrite($handle, $content)) {
                print "Kann in die Datei $filename nicht schreiben";
                exit;
            }
            if (!$mail->Send()) {
                echo "Mailer Error: " . $mail->ErrorInfo;
            } else {
                echo "<p style=\"color:#336699;font-family:Arial;size:18pt\">Vielen Dank für Ihre Meldung. Wir werden uns so rasch als möglich um das Problem kümmern</p>";
            }
            fclose($handle);
        } else {
            
        }
    }
}
?>