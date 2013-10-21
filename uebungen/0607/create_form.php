<!DOCTYPE html>
<html>
    <head>
        <title>Severin's Todo List</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style/style.css" type="text/css" media="all" />
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
                document.getElementById('slidervalue').value = val;
            }
        </script>
    </head>
    <body>

        <form class="form" action="db/create.php" method="POST" enctype="multipart/form-data">";
            <fieldset class="form">;
                <legend>Neuer Todo Eintrag </legend>
                <input type="text" name="title" required="required" />
                <label for="title">Titel</label><br /><br />
                <textarea name="text" placeholder="Text hier"></textarea>
                <br /><br /><input type="submit" value="Speichern" />
            </fieldset>
        </form>
    </body>
</html>