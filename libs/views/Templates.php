<?php
include CORE . 'show/ShowDataInTemplates.php';
/**
 * fu('html', $array);
 */
class Temp {
    private static $path_templates = '/temp/';
    private static $type = '.php';

	static public function templates($templates = '', $array = [], $set = TRUE) {
        ob_start();
        
        if (ALLOW_ARRAY_DATA && $array && $set) {
            
        	ShowDataInTemplates::out($array, [
                'template' => self::getPath($templates),
            ]);
            
            include (ROOT . self::getPath($templates));
           
        } else {
            include (ROOT . self::getPath($templates));
        }        
        
        return ob_get_clean();
    }
    static private function getPath($templates)
    {
        return self::$path_templates . $templates . self::$type;
    }	
}