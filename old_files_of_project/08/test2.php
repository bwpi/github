<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
function debug($arr) {
    echo '<pre>' . print_r($arr, true) . '</pre>';
}

echo "Привет Всем!";

$out = json_decode(file_get_contents("../files/editable.json"), true);
debug($out);

foreach ($out as $key => $value){
    echo "<form><input name='{$key}' value='{$value}'><button type='submit'>Save</button></form>";
}

debug($_GET);

$result = array_replace_recursive($out, $_GET);

debug($result);

file_put_contents("../files/editable.json", json_encode($result, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));
?>
