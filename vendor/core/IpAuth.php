<?php
/**
 * авторизация по ip
 */

namespace vendor\core;

class IpAuth {
    
    public $rule = '';
    public $profile = [];

    private static function getIpData($file_data){

        return explode("\r\n", file_get_contents(DATA . $file_data . '.txt'));

    }
    /**
    * @params $ip $rules
    * определение ip адреса клиента и выбор роли
    */
    public function ipAuth($ip, $rules = ['admin', 'teach', 'study']){
        
        if(in_array($ip, self::getIpData($rules[0]))){
            $this->rule = $rules[0];
            return "$ip - $this->rule";
        }elseif(in_array($ip, self::getIpData($rules[1]))){
            $this->rule = $rules[1];
            return "$ip - $this->rule";
        }else{
            $this->rule = $rules[2];
            return "$ip - $this->rule";
        }
       
    }

    public function setViewAuth(){
        return $this->rule;
    }

    public function getProfile(){        
        if(is_file(DATA . 'profiles.json')){
            return $this->profile = (json_decode(file_get_contents(DATA . 'profiles.json')));           
        }        
    }

    public function setProfile(){
        $file = DATA . 'profiles.json';
        $this->profile = [
            'admin' => [
                'title' => 'Администратор',
                'main' => 'Административная страница МКОУ ГСОШ',
                'set' => '$(".user").remove();$.removeCookie("admin");$(".dash").hide();$("form.search").show(1000);$(".login").show(1000);',
                'auth' => '<a class="btn btn-white login" data-toggle="modal" data-target="#auth"><i class="fas fa-user"></i></a>',
            ],
            'teach' => [
                'title' => 'Учитель',
                'main' => 'Страница быстрого доступа МКОУ ГСОШ',
                'set' => '$(".sup, .user, .dashboard").remove();',
                'auth' => '',
            ],
            'study' => [
                'title' => 'Ученик',
                'main' => 'Информационная страница МКОУ ГСОШ',
                'set' => '$(".adms, .sup").remove();',
                'auth' => '',
            ],
        ];
        if(is_file($file)){
            file_put_contents($file, json_encode($this->profile));
        }        
    }

}