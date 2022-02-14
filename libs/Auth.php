<?php
function auth() {	
	if ($_SESSION['auth']) {
		return true;
	} else {
        header('Location:' . '/login');
		echo 'Отказано в доступе - ' . $_SERVER[REMOTE_ADDR];
		echo '<a href="http://' . $_SERVER['HTTP_HOST'] . '/login/">Авторизуйтесь</a>';
		exit;
	}
	
}
class Auth {
    
    private static $users = [];    

    public function __construct($file = '') {
        self::$users = readJsonData($file);        
    }

    public static function exit() {
        if (isset($_GET['exit'])) {            
            session_destroy();
            header('Location:' . '/');            
            exit;
        }
    }

    public static function auth() {
        if ($_SESSION['auth']) {            
            return self::getUser();            
        } else {     
            header('Location:' . '/login');            
            exit;
        }
    }

    private static function getUser() {
        if($_SESSION['auth']) {
            return [
                'id' => self::$users[$_SESSION['auth']]['id'],
                'login' => $_SESSION['auth'],                
                'name' => self::$users[$_SESSION['auth']]['name'],
                'role' => self::$users[$_SESSION['auth']]['role'],
                'propertys' => self::$users[$_SESSION['auth']]['propertys']
            ];            
        }
    }

    public static function login() {              
        if (array_key_exists($_POST['login'], self::$users)&&(sha1($_POST['password'])==self::$users[$_POST['login']]['password'])) {  
            $_SESSION['auth'] = $_POST['login'];
            // header('Location:' . $_SERVER['HTTP_REFERER']);
            return true;
        } return false;
    }
}