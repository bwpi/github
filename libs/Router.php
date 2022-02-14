<?php
/*
* Чтение адресной строки и возврат массива
*/
function request() {
    
    $routes = explode('&', $_SERVER['QUERY_STRING']);
    $routes = explode('/', $routes[0]);
    
    return $routes;
}

function Router($routes) {

    $route['controller'] = (!empty($routes[0])) ? $routes[0] : 'main';
    $route['view'] = (!empty($routes[1])) ? $routes[1] : 'main';
    $route['param'] = (!empty($routes[2])) ? $routes[2] : '';
    
    return $route;
}
/*
* Функция диспетчер контроллеров, видов, параметров. Редактор маршрутов
*/
function dispatcher($in, $out, $route) {

    $routes = request();    
    $input = explode('/', $in);
    $output = explode('/', $out);

    // if (!empty($route)&&!empty($output)) {
    //     foreach ($output as $key => $value) {
    //         if(preg_match_all('/{([\s\S]+?)}/', $value, $match)) {                               
    //             $route[$match[1][0]] = $routes[$key];
    //             unset($output[$key]);                              
    //         }
    //     }
    // }    
    
    if (isset($routes[0]) && $routes[0] == $input[0]) {
        $route['controller'] = ($input[0] != $output[0]) ? $output[0] : $routes['controller'];
    }
    if ((isset($input[1]) && isset($routes[1])) && $routes[1] == $input[1]) {
        $route['view'] = ($input[1] != $output[1]) ? $output[1] : $route['view'];        
    }    
    if (isset($routes[2]) && $routes[2] == $input[2]) {
        $route['param'] = ($input[2] != $output[2]) ? $output[2] : $route['param'];
    }    
    
    return $route;
}

function Render($route) {

    $controller = $route['controller'];
    $view = $route['view'];
    $param = $route['param'];
    /**
     * Глобальные константы для контроллеров
     */
    define('CURRENT_CONTROLLER', $controller);  
    /*
    * Загрузка контроллера
    */
    include (CTRLS . $controller . '.php');
}

function isAjax(){
    return isset($_SERVER['HTTP_X_REQUESTED_WITH'])&&$_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';        
}