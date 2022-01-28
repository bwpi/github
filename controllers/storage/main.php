<?php
include LIBS . 'Auth.php';
new Auth('teachers');
$auth = Auth::auth();

$file_path = '/mnt/teachers/' . urldecode($_GET['dir']);
if (file_exists($file_path)) {
    if(is_file($file_path)){        
        // ob_end_clean();        
        header('Content-Description: File Transfer');
        header('Content-Type: ' . mime_content_type($file_path));
        header('Content-Disposition: attachment; filename=' . basename($file_path));
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: ' . filesize($file_path));
        readfile($file_path);
        exit();
    }
}

// $users = [];
// for ($i=0; $i < 50; $i++) {
//     $prefix = '';
//     if($i < 10) {
//         $prefix = '0';
//     }
//     $users['user' . $prefix . $i] = [
//         'id' => $i,
//         'name' => 'user' . $prefix . $i,
//         'role' => 'teacher',
//         'password_real' => 'user' . $prefix . $i . '_' . "00" . $prefix . $i,
//         'password' => sha1('user' . $prefix . $i . '_' . "00" . $prefix . $i),
//         'propertys' => []
//     ];    
// }
// writeData(FILES . 'teachers.json', $users);
$Fs = new Fs("/mnt/shared/");

$content .= "<h3 class='text-center'>Пользователь - " . $auth['name'] . "</h3>";

if (isset($_GET['dir'])&&!empty($_GET['dir'])) {    
    $dir = $_GET['dir'];
    $Fs->setCatalog($dir)->dirScan()->showInTo($dir);    
    $content .= '<div class="buttons">' . Temp::templates('a', $Fs->temp_array) . '</div>';    
} else {
    $Fs->scanRec()->show();    
    $content .= '<div class="buttons">' . Temp::templates('a', $Fs->temp_array) . '</div>';
}
