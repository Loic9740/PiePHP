<pre>
<?php
session_start();


var_dump($_POST);
var_dump($_GET);
var_dump($_SERVER);
?>


</pre>

<?php
include 'Core/Core.php';
define("BASE_URI", str_replace(DIRECTORY_SEPARATOR, "/", substr(__DIR__, strlen($_SERVER["DOCUMENT_ROOT"]))));
require_once(implode(DIRECTORY_SEPARATOR, ['Core', 'autoload.php']));

$app = new \Core\Core();
$app->run();



?>












