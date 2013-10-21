<?php



function show_entries() {
    $files = scandir("data");
    foreach($files as $entry) {
        if(($entry!=".") AND ($entry!="..")) {
            
            $ent = explode('_', $entry);
            $date = $ent[0];
            $title = $ent[1]; 
            
            $text = file_get_contents($entry);
            echo "<fieldset class=\"form\"><legend>".$title."</legend><p style=\"font-size:10pt\">Date: ".$date."</p><br /><br /><p>".$text."</p>";
            echo "<a href=\"delete.php\" style=\"text-decoration:none;font-family:Arial;font-size:8pt\">Löschen</a>  <a href=\"edit.php\" style=\"text-decoration:none;font-family:Arial;font-size:8pt\">Bearbeiten</a> <br /></fieldset>";
            

        }
    }
}



function delete_entry($file) {
    $p = "data/".$file;
    unlink($p);    
}

function create_entry($title, $entry, $date) {
    $filename = "data/" . $date . "_" . $title;
    if (!$handle = fopen($filename, "a")) {
        print "Kann die Datei $filename nicht öffnen";
        exit;
    }

    // Schreibe $somecontent in die geöffnete Datei.
    if (!fwrite($handle, $entry)) {
        print "Kann in die Datei $filename nicht schreiben";
        exit;
    }
    fclose($handle);
}

?>
