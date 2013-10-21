<!DOCTYPE html>
<?php
session_start();
require_once("db/pdo.php");
$valid_session = $_SESSION['validlogin'];

if ($valid_session != true) {
    header("Location: index.php?loginfailed");
}
$db = new db();
$open_todo = $db->load_todo(1);
$complete_todo = $db->load_todo(2);
?>
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

        <h1 class="title">Todo Board</h1>
        <form action="create_form.php" method="POST">
            <input type="submit" value="Neuer Eintrag" />                
        </form>
        <table style="vertical-align:top">
            <tr>
                <td width=50%">
                    <h2 class="title">Offen</h2>    
                    <?php
                    foreach ($open_todo as $row) {
                        echo "<form class=\"form\" action=\"db/update.php\" method=\"POST\" enctype=\"multipart/form-data\">";
                        echo "<input type=\"hidden\" name=\"id\" value=\"" . $row['id'] . "\" />";
                        echo "<fieldset class=\"form\">";
                        echo "<legend>" . $row['title'] . "</legend>";
                        echo "<table> <tr> <td name=\"date\">Date: " . $row['date'] . "</td>";
                        echo "<td>User: " . $row['username'] . "</td><tr></table>";
                        echo "<textarea name=\"text" . $row['id'] . "\">" . $row['text'] . "</textarea>";
                        echo "<br /><br /><input type=\"submit\" name=\"" . $row['id'] . "\" value=\"Speichern\" />";
                        echo "<input type=\"submit\" name=\"" . $row['id'] . "\" value=\"Erledigt\" />";
                        echo "</fieldset>";
                        echo "</form>";
                    }
                    ?>      
                </td>
                <td>
                    <h2 class="title">Erledigt</h2>    
                    <?php
                    if ((isset($complete_todo) == true) && (sizeof($complete_todo) > 0)) {
                        foreach ($complete_todo as $row) {
                            echo "<form class=\"form\" action=\"db/delete.php\" method=\"POST\" enctype=\"multipart/form-data\">";
                            echo "<fieldset class=\"form\">";
                            echo "<legend>" . $row['title'] . "</legend>";
                            echo "<table> <tr> <td>Date: " . $row['date'] . "</td>";
                            echo "<td>User: " . $row['username'] . "</td><tr></table>";
                            echo "<textarea readonly=\"readonly\">" . $row['text'] . "</textarea>";
                            echo "<br /><br /><input type=\"submit\" name=\"" . $row['id'] . "\" value=\"Löschen\" />";
                            echo "</fieldset>";
                            echo "</form>";                            
                        }
                    } else {
                        echo "<p class=\"form\">Hier gibts nichts zu sehen</p>";
                    }
                    ?>
                </td>
            </tr>
        </table>
        <form action="db/logout.php" method="POST">
            <input type="submit" value="Logout" />                
        </form>        
    </body>
</html>