<?php 
/**
 * ООП
 * Классы
 * Объекты
 * Методы
 * Свойства
 * и прочее
 */
class Fs {
    public $dir = '';
    public $catalog = '';
    public $direct = [];
    public $temp_array = [];
    private $array = [];
    private $iconArray = [
        'doc', 'docx', 'jpeg', 'jpg', 'json', 'pdf', 'png', 'ppt', 'pptx', 'txt', 'xls', 'xlsx', 
    ];
    
    function __construct($dir){
        $this->dir = $dir;
    }
    public function dirScan(){        
        $files = scandir($this->dir . $this->catalog);
        unset($files[0], $files[1]);
        krsort($files);
        foreach ($files as $key => $value) {            
            if (is_dir($this->dir . $this->catalog . $value)) {
                array_unshift($this->array, $value);
            } else {
                array_push($this->array, $value);
            }
        }        
        return $this; 
    }
    
    public function setCatalog($catalog) {
        $this->catalog = $catalog;
        return $this;
    }
    public function setDir($dir) {
        $this->dir = $dir;
        return $this;
    }
    public function scanRec() {        
        $path = $this->dir;
        if (is_dir($path)) {
            $dir_scan = array_slice(scandir($path . '/'), 2);            
            foreach ($dir_scan as $key => $value) {
                $file = $path . '/' . $value;
                if (is_file($file)) {
                    // $direct = $value;
                    $data = [
                        'name' => $value,                        
                        // 'type' => mime_content_type($file),
                        // 'size' => round(stat($file)[7]/1024, 2),
                        // 'atime' => date("d F Y H:i:s", stat($file)[8]),
                        // 'mtime' => date("d F Y H:i:s", stat($file)[9])
                    ];
                    // implode('/', $data);
                    array_push($this->direct, implode('/', $data));
                    
                } else {                    
                    // $this->direct[$value] = scanRec($this->dir . '/' . $value);
                    $data = [
                        'name' => $value,                       
                        // 'type' => mime_content_type($file),
                        // 'size' => round(stat($file)[7]/1024, 2),
                        // 'atime' => date("d F Y H:i:s", stat($file)[8]),
                        // 'mtime' => date("d F Y H:i:s", stat($file)[9])
                    ];
                    // implode('/', $data);
                    array_push($this->direct, implode('/', $data));
                    // $this->direct[$value] = scanRec($this->dir . '/' . $value);
                }                
            }            
        } else {
            // echo 'no dir' . $path;
        }
        krsort($this->direct, SORT_STRING);
        return $this;
    }
    /**
     * Формирование адреса в адресной строке
     */
    private function setWebPath($catalog, $show_host = true) {
        if ($show_host) {
            $host = "http://" . $_SERVER['HTTP_HOST'] . "/" . CURRENT_CONTROLLER . '/';
        }
        return $host . $catalog;      
    }
    /**
     * Формирование ссылки
     */
    private function setHrefPath($value, $type_folder = true) {
        if($type_folder) {
            return '?dir=' . $value . '/';   
        }
        return '?dir=' . $value;      
    }
    public function show() {          
        foreach ($this->direct as $key => $value) {            
            if (is_dir($this->dir . $value)) {                
                array_unshift($this->temp_array, [
                    'name' => $this->setWebPath($value, false),
                    'style' => 'directory',                    
                    'type' => 'dir',
                    'href' => $this->setHrefPath($value),
                    'exec' => '',
                ]);
            } else {                
                $icon = (in_array(end(explode('.', $value)), $this->iconArray)) ? end(explode('.', $value)) : 'any' ;            
                array_push($this->temp_array, [
                    'name' => $this->setWebPath($value, false),
                    'style' => 'green files',                    
                    'type' => 'file',
                    'href' => $this->setHrefPath($value, false),
                    'exec' => $icon,
                ]);
            }
        }
        
        return $this;
    }
    public function showInTo($dir = '') {         	
        foreach ($this->array as $key => $value) {		
            if (is_dir($this->dir . $this->catalog . $value)) {
                array_push($this->temp_array, [
                    'name' => $this->setWebPath($value, false),
                    'style' => 'directory',                    
                    'type' => 'dir',
                    'href' => $this->setHrefPath($dir . $value),
                    'exec' => '',
                ]);                
            } else {                
                $icon = (in_array(end(explode('.', $value)), $this->iconArray)) ? end(explode('.', $value)) : 'any' ;         
                array_push($this->temp_array, [
                    'name' => $this->setWebPath($value, false),
                    'style' => 'green files',                    
                    'type' => 'file',
                    'href' => $this->setHrefPath($dir . $value, false),
                    'exec' => $icon,
                ]);
            }		
        }
        return $this;
    }
}