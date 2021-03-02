<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
function debug($arr) {
    echo '<pre>' . print_r($arr, true) . '</pre>';
}

$array = [    
        "понедельник"=> [
            "1"=>"История",
            "2"=>"Математика",
            "3"=>"физика",
            "4"=>"Русский язык",
            "5"=>"Технология",
            "6"=>"Технология"
        ],    
        "вторник"=> [
            "1"=>"Немецкий",
            "2"=>"Биология",
            "3"=>"ИЗО",
            "4"=>"Математика",
            "5"=>"Русский язык",
            "6"=>"Литература",
            "7"=>"Немецкий"
        ]
    ];

debug($array);
 function array_chunk_fixed($input, $num, $preserve_keys = FALSE) {
    $count = count($input) ;
    if($count)
        $input = array_chunk($input, ceil($count/$num), $preserve_keys) ;
    $input = array_pad($input, $num, array()) ;
    return $input ;
}


$array = array('A', 'B','C' , 'D', 'E' , 'F', 'G' ,'H');
print_r(array_chunk_fixed($array, 3)); 