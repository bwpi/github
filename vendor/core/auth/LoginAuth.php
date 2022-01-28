<?php
/**
 * авторизация по Login
 */

namespace vendor\core\auth;
use app\models\AdminModels;

class LoginAuth extends Auth{    

	static public function loginAuth() {        
        if (self::checkUserData()) {            
            self::loadProfile(self::$rule);
        } else {
            self::loadProfile('guest');
        }        
    }

    static public function checkUserData(){        
        if (isset($_COOKIE['login'])&&isset($_COOKIE['password'])) {
            self::validate($_COOKIE['login'], $_COOKIE['password']);            
            self::$rule = $_COOKIE['login'];
            return self::$rule;
        }
        //  else {
        //     return self::$rule = $_SESSION['login'];
        // }
    }

    static public function checkUser() {        
        if (isset($_POST['login'])&&isset($_POST['password'])) {
            self::validate($_POST['login'], $_POST['password']);            
        } else {
            self::$msg = 'Авторизуйтесь, пожалуйста!';
        }		
    }
    
    static private function validate($login, $password){
        if ($_POST) {
            if(self::checkProfile($login)) {
                if (self::$profile->password == md5($password)) {                    
                    self::$msg = 'Проверка прошла успешно!.. <a href="/" class="btn btn-success">Вернуться</a>';
                    self::autorization($login, $password);
                    return true;
                } self::$msg = 'Не верный логин или пароль, повторите попытку снова!'; //переадресация на страницу авторизации /login       
            }
        } else {
            if(self::checkProfile($login)) {
                if (self::$profile->password == $password) {
                    return true;
                } header('Location: /login'); //переадресация на страницу авторизации /login       
            }
        }
    }

    static private function checkProfile($rule){
        if(is_file(STORAGE . 'users/profiles/profiles.json')){
            $profile = (json_decode(file_get_contents(STORAGE . 'users/profiles/profiles.json')));
            if (property_exists($profile, $rule)) {
                self::$profile = $profile->$rule;
                return true;
            } else {
                self::$msg = 'Не верный логин!';
                return false;
            }
        } else {
            self::$msg = "Профиль - $rule - не найден! Обратитесь к Администратору!";
            return false;            
        }
    }

    static private function autorization($login = '', $password = ''){
        session_start();        
        //-----------------// 
        if ((isset($_COOKIE['login'])&&($_COOKIE['login'] == $login)) && (isset($_COOKIE['password'])&&($_COOKIE['password'] == md5($password)))) { 
            self::$msg = 'Вы уже авторизованы!.. <a href="/" class="btn btn-success">Вернуться</a>';            
        } else { 
            if(($_POST['login']) && ($_POST['password'])) { 
                if((trim($_POST['login']) == $login) && (trim($_POST['password']) == $password)) {                    
                    setcookie("login", $login, time() + 3600, '/'); 
                    setcookie("password", md5($password), time() + 3600, '/');
                    self::$msg = "Вы уже авторизованы!.. <a href='/' class='btn btn-success'>Вернуться</a>";
                } else { 
                    echo '<script>alert("Логин или пароль не верны!")</script>';
                } 
            } else { 
                if((!$_POST['login']) && (!$_POST['password'])) {
                    echo '<script>alert("Введите все значения!")</script>';
                } else { 
                    echo '<script>alert("Введите все значения!")</script>';
                }
            }
        }
    }
       
}