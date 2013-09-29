<?
# Include the Dropbox SDK libraries
require_once "../dropbox-sdk/Dropbox/autoload.php";
use \Dropbox as dbx;

$token = "0bhGkHrBBy4AAAAAAAAAAVEATbVPPKL0VQM6U9deG7Y";

$dbxClient = new Dropbox\Client($token, "PHP-Example/1.0");
if( is_file( "working-draft.txt" ) ) {
    echo "yes";
$f = fopen( "working-draft.txt", "rb");
$result = $dbxClient->uploadFile( '/severinmueller/bugreports/'. basename("working-draft.txt"), Dropbox\WriteMode::add(), $f);
echo $result;
fclose($f);
} else {
    echo "error";
}

?>