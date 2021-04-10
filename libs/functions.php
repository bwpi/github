<?php
/*
* 
*/
function debug2($arr) {
    echo '<div style="position: relative; border-radius: 10px; top: 0; left: 0; float:right; margin:30px; padding: 20px; background-color: rgba(100,100,250,.9); z-index: 1500">';
    echo '<h4>DEBUG</h4>';
    echo '<div style="padding: 10px; background-color: rgba(250,250,250,.9)">';
    echo '<pre>' . print_r($arr, true) . '</pre>';
    echo '</div>';
    echo '</div>';
}

function debug($arr) {
    echo '<pre>' . print_r($arr, true) . '</pre>';
}
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
    $route['param'] = $routes[2];
    
    return $route;
}
/*
* Функция диспетчер контроллеров, видов, параметров. Редактор маршрутов
*/
function dispatcher($in, $out, $route) {

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

function isAjax(){
    return isset($_SERVER['HTTP_X_REQUESTED_WITH'])&&$_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';        
}