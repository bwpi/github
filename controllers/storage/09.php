<?php
/**
 * 
 */
// class Auth {
    
//     public $v='хрень какая-то';
    
//     function __construct($v=''){
//         echo $this->v;
//     }
//     public function f($v){
//         echo $v;
//     }
// }
// $auth = new Auth();
// $auth->f(1);
// echo $auth->v;

/**
 * 
 */
class Auth  
{
    
    private static $users = [];

    public function __construct($file) {
        self::$users = readJsonData($file);
    }

    public static function auth($user = '') {
        if ($_SESSION['auth'] == $user) {
            return true;
        } else {
            echo 'Отказано в доступе - ' . $_SERVER[REMOTE_ADDR];
            echo '<a href="http://' . $_SERVER['HTTP_HOST'] . '/login/">Авторизуйтесь</a>';
            exit;
        }
    }

    public static function login() {
        $users = self::$users;        
        if (array_key_exists($_POST['login'], $users)&&($_POST['password']==$users[$_POST['login']])) {  
            $_SESSION['auth'] = $_POST['login'];
            debug($_SESSION);
            return true;
        } return false;
    }
}

Auth::auth('user09');
debug($_SESSION);
/*
* Подключение персонального контроллера
$head
$storage_views || $content
$script_file
$scripts
*/
// debug($_SERVER);
// $storage_views = $controller . '/' . $view;

$file_path = ROOT . '/' . str_replace('+', " ",$_SERVER[QUERY_STRING]);
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
$main_dir = ROOT . "/$controller/";

if (isset($_GET['dir'])&&!empty($_GET['dir'])) {
    $dir = $_GET['dir'];   
    $files = dirScan($main_dir . $dir);
    ksort($files, SORT_STRING);
    ob_start();
    echo '<div class="buttons">';
    setPathInTo($files, $main_dir . $dir, $dir);
    echo '</div>';
    $content = ob_get_clean();    
} else {
    $files = scanRec($main_dir);
    ksort($files, SORT_STRING);
    ob_start();
    echo '<div class="buttons">';
    setPath($files, $main_dir);
    echo '</div>';
    $content = ob_get_clean();
}

 
