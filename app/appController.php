<?php

function get($get = '') {    
    return !$get ? $_GET : $_GET[$get];
}