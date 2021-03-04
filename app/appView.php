<?php

function getView($route, $data = [], $types = '.html', $layout = 'default.php') {
    extract($data);
    ob_start();
    if(is_file(VIEWS . $route . $types)){        
        include VIEWS . $route . $types;
    } else {
        echo "<p>Не найден вид <b>" . VIEWS . $route . $types . "</b></p>";
    }
    return $content = ob_get_clean();    
}

function getVariant($data, $template, $delimetr = '/') {
    $out = explode($delimetr, $data);
    if ($template) {
        foreach ($out as $value) {
            $temp .= $template($value);
        }
        return $temp;
    }
    return $out;
}

function getTemplate($data, $classes = 'alert alert-info') {
    return "<div class='{$classes}'>{$data}</div>";
}