<?php
include CORE . 'show/ShowDataInTemplates.php';

class Temp {
    private static $path_templates = '/temp/';
    private static $type = '.php';

	static public function templates($templates = '', $array = [], $set = TRUE) {
        ob_start();

        $array = self::toObject($array);

        if ($set) {            
        	ShowDataInTemplates::out($array, [
                'template' => self::getPath($templates),
            ]);           
        }

        include (ROOT . self::getPath($templates));                
        
        return ob_get_clean();
    }
    static private function getPath($templates)
    {
        return self::$path_templates . $templates . self::$type;
    }
    static private function toObject($array = []) {
        return json_decode(json_encode($array, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));
    }
}