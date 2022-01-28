<?php
/**
 * авторизация по IP
 */

namespace vendor\core\auth;
use app\models\AdminModels;

class IpAuth extends Auth{	

	static public function ipAuth($rule) {
        self::loadProfile($rule);        
    }
       
}