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

// function outVariant($data, $template, $classes = 'btn btn-primary mx-1', $delimetr = '/') {
//     $out = explode($delimetr, $data);
//     if ($template) {
//         foreach ($out as $value) {
//             $temp .= $template($value, $classes);
//         }
//         return $temp;
//     }
//     return $out;
// }

// function outResponseOptions($data, $classes) {
//     return "<a class='{$classes}'>{$data}</a>";
// }

function outVariant($data, $template, $classes = 'btn btn-primary mx-1', $delimetr = '/') {    
    $out = explode($delimetr, $data);
    if ($template) {        
        return $template($out, $classes);
    }
    return $out;
}

function outResponseOptions($in, $classes) {    
    foreach ($in as $value) {
        $template .= "<a class='{$classes}'>{$value}</a>";
    }
    return $template;
}