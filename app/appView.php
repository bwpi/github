<?php

function getView($route, $types = '.html') {
    $controller = $route['controller'];
    $view = $route['view'];
    $param = $route['param'];
    
    ob_start();
    if(is_file(VIEWS . $controller . $types)){
        require VIEWS . $controller . $types;
    } else {
        echo "<p>Не найден вид <b>" . VIEWS . $controller . $types . "</b></p>";
    }
    $content = ob_get_clean();    
    /*
    * Загрузка контроллера
    */
    include (CTRLS . $controller . '.php');
}