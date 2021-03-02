<?php

function getView($route, $data = [], $types = '.html') {
    extract($data);
    ob_start();
    if(is_file(VIEWS . $route . $types)){        
        include VIEWS . $route . $types;
    } else {
        echo "<p>Не найден вид <b>" . VIEWS . $route . $types . "</b></p>";
    }
    return $content = ob_get_clean();    
}