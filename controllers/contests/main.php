<?php
/*
* Загрузка модели
*/
include (MODELS . 'model.php');
$dir = '/public/img/';
$arr = [];
$unarr = [];

$files = dirScan($dir);

$data = json_decode(file_get_contents(FILES . "likes.json"), true);

if (count($files)!=count($data)){
    foreach ($files as $key => $value) {	
        $arr[$value] = 0;
    }
    file_put_contents(FILES . "likes.json", json_encode($arr, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));
    $data = json_decode(file_get_contents(FILES . "likes.json"), true);
}

if (isset($_POST['like'])) {    
    $arr = json_decode(file_get_contents(FILES . "likes.json"), true);    
    $arr[$_POST['like']] += 1;
    file_put_contents(FILES . "likes.json", json_encode($arr, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));    
    echo $_POST['like'];
    exit;	
} elseif (isset($_POST['unlike'])){
    $unarr = json_decode(file_get_contents(FILES . "likes.json"), true);    
    $unarr[$_POST['unlike']] -= 1;
    file_put_contents(FILES . "likes.json", json_encode($unarr, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));    
    echo $_POST['unlike'];    
    exit;
}

foreach ($data as $name_img => $num_img){
    if($num_img == max($data)) {
        $name = $name_img;
        $num = $num_img;
    }
}