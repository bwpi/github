<?php
/**
 * авторизация по логину и паролю
 */

namespace vendor\core\auth;
use app\models\AdminModels;

class Auth {
    
    static public $profile_name;
	static public $rule = '';
	static public $profile = [];
    static public $msg = '';    
	
	/*
    *Принудительная переадресация на авторизацию
    */
    static public function access($rule = []) {
        self::auth();
        if ($rule) {
            foreach ($rule as $value) {
                if (self::$profile->rules == $value) {
                    return true;
                }
                header('Location: /login');
                exit;
            }            
        }
        if (empty(self::$profile)) {
            header('Location: /login');
            exit;
        }        
    }
    /*
    *Принудительная выбор режима авторизации
    */
    static public function auth() {        
        if (self::ipFind()) {            
            IpAuth::ipAuth(self::ipFind()); //Режим аутентификации по IP адресу ipAuth::class            
        } else {            
            LoginAuth::loginAuth(); //Режим аутентификации по Логину loginAuth::class            
        }        
    }
    /*
    *Ищем IP адрес из диапазона и выгружаем имя профиля
    */
    static private function ipFind() {
        $model = new AdminModels();
        $array_in = $model->fromJsonToArrayOrJsonStorage("users/ip", false);     
        foreach ($array_in as $profile_name => $ips) {          
            if (in_array(REMOTE_ADDR, $ips)) {                
                self::$profile_name = $profile_name;                
            }
        }
        return self::$profile_name;
    }
    /*
    *Загрузка профиля
    */
    static public function loadProfile($rule){
        if(is_file(STORAGE . 'users/profiles/profiles.json')){
            $profile = (json_decode(file_get_contents(STORAGE . 'users/profiles/profiles.json')));
            self::$rule = $rule;            
            self::$profile = $profile->$rule;
        } else {
            echo STORAGE . 'users/profiles/profiles.json - no file';            
        }
    }
}