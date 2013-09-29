<!DOCTYPE html>
<?
session_start();
$valid_session = $_SESSION['validlogin'];

if($valid_session!=true) {
    header("Location: ../index.php?loginfailed");
}

?>
<html>
    <head>
        <title>Submit us your Bug!</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../style/style.css" type="text/css" media="all" />
        <script type="text/javascript">
            // ref: http://diveintohtml5.org/detect.html
            function supports_input_placeholder()
            {
                var i = document.createElement('input');
                return 'placeholder' in i;
            }

            if (!supports_input_placeholder()) {
                var fields = document.getElementsByTagName('INPUT');
                for (var i = 0; i < fields.length; i++) {
                    if (fields[i].hasAttribute('placeholder')) {
                        fields[i].defaultValue = fields[i].getAttribute('placeholder');
                        fields[i].onfocus = function() {
                            if (this.value == this.defaultValue)
                                this.value = '';
                        }
                        fields[i].onblur = function() {
                            if (this.value == '')
                                this.value = this.defaultValue;
                        }
                    }
                }
            }
            function updateSlider(val) {
                document.getElementById('slidervalue').value=val;
            }
        </script>
    </head>
    <body>

        <h2 class="title">Bitte melde deinen Bug mit diesem Formular</h2>

        <form class="form" action="verify.php" method="POST" enctype="multipart/form-data">
            <?php
                if(htmlspecialchars($_GET['captchafailed'])==true) {
                    echo "<p style=\"color:red;font-family:Arial;size:14pt;font-weight:bold\">Ungültige Captcha Validierung. Bitte erneut versuchen</p>";
                }
            ?>
            <fieldset class="form">
                <legend>Kontaktinformationen</legend>
                <p class="name">
                    <input type="text" name="name" id="name" placeholder="John Doe" required/>
                    <label for="name">Name</label>
                </p>

                <p class="email">
                    <input type="email" name="email" id="email" placeholder="mail@example.com" required/>
                    <label for="email">Email</label>
                </p>
                <p>
                    <input type="datetime" name="bugDate" id="bugDate" placeholder="dd.mm.yyyy" required />
                    <label for="bugDate">Datum</label>
                </p>
            </fieldset>
            <fieldset class="form">
                <legend>Fehlerbeschrieb</legend>
                <p class="web">
                    <input type="url" name="web" id="web" placeholder="www.example.com" required/>
                    <label for="web">Betreffende Website</label>
                </p>	

                <p class="text">
                    <textarea name="text" placeholder="Fehlerreport" required/></textarea>
                </p>
                <p>
                    <select id="bugtype2" name="bugtype" required>
                        <option value="bugCode" selected>Code</option>
                        <option value="bugFrontEnd">Front End</option>
                        <option value="bugEmail">E-Mail Versand</option>
                    </select>
                    <label>Fehlertyp</label>                    
                </p>
                <p> 
                    <input type="range" onChange="updateSlider(this.value)" name="priority" id="priority" min="1" max="4" required />
                    <input type="text" width="5px" id="slidervalue" />
                    <label for="points">Priorität:</label>
                </p>
                <p class="callBack"> 
                    <input type="checkbox" id="callback" name="callback" value="needcallback" />
                    <label for="points">Rückruf erforderlich</label>
                </p>                
                <p class="formradios">
                    <input type="radio" id="reproducable" name="reproducable" value="yes" checked required/>Ja
                    <input type="radio" id="reproducable" name="reproducable" value="no" />Nein
                    <label for="reproducable">Reproduzierbar</label>
                </p>
                <p>
                    <input name="upload[]" id="upload" type="file" multiple>
                    <label for="upload">Datei(en) hochladen</label>
                </p>
            </fieldset>   
            <fieldset class="form">
                <legend>Anti-Spam</legend>
                <?php
                    require_once('../recaptcha/recaptchalib.php');
                    $publickey = "6LcZHOgSAAAAADDOrxpoM59D4WLMGqJSwPHORWm0";
                    echo recaptcha_get_html($publickey);
                 ?>
                
            </fieldset>
            <p class="submit">
                <input type="submit" value="Senden" />
            </p>
            
        </form>

    </body>
</html>