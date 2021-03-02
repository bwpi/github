<?php

function getView($route, $data = [], $types = '.html') {
    extract($data);
    ob_start();
    if(is_file(VIEWS . $route['controller'] . $types)){        
        include VIEWS . $route['controller'] . $types;
    } else {
        echo "<p>Не найден вид <b>" . VIEWS . $route['controller'] . $types . "</b></p>";
    }
    return $content = ob_get_clean();    
}