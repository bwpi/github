<?php
namespace vendor\core\router;
class Router_new{
    
    public $routes =[];
    public $route = [];
    public $set = [
        'controller'=>'main',
        'action'=>'main',
        'param'=>''
    ];

    public function add($uri) {
        dispatcher($uri, $out, $route);
        return $this;
    }

    public function request() {    
        $routes = explode('&', rtrim($_SERVER['QUERY_STRING'], '/'));
        $this->routes = explode('/', $routes[0]);        
        return $this->routes;
    }
    
    static private function router() {
    
        $this->route['controller'] = $this->routes[0]??$this->set['controller'];
        $this->route['view'] = $this->routes[1]??$this->set['action'];
        $this->route['param'] = $this->routes[2]??$this->set['param'];
        
        return $this->route;
    }
    
    static public function start() {
        $this->request();        
    }    

    public function set($set, $var) {
        $this->set[$set] = $var;
        return $this;
    }
    /*
    * Функция диспетчер контроллеров, видов, параметров. Редактор маршрутов
    */
    public function dispatcher($in, $out, $route) {
    
        $routes = request();    
        $input = explode('/', $in);
        $output = explode('/', $out); 
    
        foreach ($output as $key => $value) {
            if(preg_match_all('/<([\s\S]+?)>/', $value, $match)) {            
                $route[$match[1][0]] = $routes[$key];
                unset($output[$key]);
            }        
        }    
        
        if ($routes[0] == $input[0]) {
            $route['controller'] = ($input[0] != $output[0]) ? $output[0] : $routes['controller'];
        }
        if ($routes[1] == $input[1]) {
            $route['view'] = ($input[1] != $output[1]) ? $output[1] : $route['view'];        
        }    
        if ($routes[2] == $input[2]) {
            $route['param'] = ($input[2] != $output[2]) ? $output[2] : $route['param'];
        }    
        
        return $route;
    }
    
    function Render($route) {    
    
        $controller = $route['controller'];
        $view = $route['view'];
        $param = $route['param'];    
        /*
        * Загрузка контроллера
        */
        include (CTRLS . $controller . '.php');
    }
}