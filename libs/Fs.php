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
    public $breadcrumb = [];
    public $catalog = '';
    public $direct = [];
    private $rec_directory_files = [];
    public $temp_array = [];
    private $array = [];
    private $iconArray = [
        'doc', 'docx', 'jpeg', 'jpg', 'json', 'pdf', 'png', 'ppt', 'pptx', 'txt', 'xls', 'xlsx', 'zip'
    ];
    /**
     * Метод конструктор при инициализации класса принимает начальный каталог для сканирования
     */
    function __construct($dir){
        $this->dir = $dir;
        $this->setBreadcrumb('Главная', setWebPath('', $show_host = true));
        $this->breadcrumb['current'] = 'Главная';
    }
    private function setBreadcrumb($name = 'Корень', $href = ''){        
        $this->breadcrumb[$name] = $href;            
    }
    /**
     * Метод для сканирования текущего каталога
     */
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
    /**
     * Метод для изменения текущего каталога
     */
    public function setCatalog($catalog) {
        $catalog_path = explode('/', $catalog);
        $catalog_path = array_diff($catalog_path, array(''));
        $href = '';
        foreach ($catalog_path as $path) {            
            $href .=$path  . '/';
            $this->setBreadcrumb($path, $this->setHrefPath($href, false));                   
        }
        $this->breadcrumb['current'] = end($catalog_path);
        
        $this->catalog = $catalog;
        return $this;
    }
    public function setDir($dir) {
        $this->dir = $dir;
        return $this;
    }   
    /**
     * Метод для сканирования вложенных каталогов
     */ 
    public function recursive($path) {        
        if (is_dir($path)) {
            $dir_scan = array_slice(scandir($path . '/'), 2);            
            foreach ($dir_scan as $key => $value) {
                $file = $path . '/' . $value;
                if (is_file($file)) {                    
                    $data = [
                        'name' => $value,
                        'size' => stat($file)[7],
                        'path' => $path . '/'
                    ];                   
                    array_push($this->rec_directory_files, $data);                    
                } else {                    
                    $this->recursive($file);                 
                }                
            }            
        }
        writeData(FILES . 'recursive_teachers.json', $this->rec_directory_files);        
    }
    /**
     * Метод для сканирования вложенных каталогов
     */ 
    public function scanRec() {        
        $path = $this->dir;
        if (is_dir($path)) {
            $dir_scan = array_slice(scandir($path . '/'), 2);            
            foreach ($dir_scan as $key => $value) {
                $file = $path . '/' . $value;
                if (is_file($file)) {                    
                    $data = [
                        'name' => $value,                       
                    ];                   
                    array_push($this->direct, implode('/', $data));                    
                } else {                    
                    $data = [
                        'name' => $value,                        
                    ];                   
                    array_push($this->direct, implode('/', $data));                   
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
    private function setWebPath($catalog = '', $show_host = true) {
        if ($show_host) {
            return "http://" . $_SERVER['HTTP_HOST'] . "/" . CURRENT_CONTROLLER . '/' . $catalog;
        }
        return $catalog;      
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
    /**
     * Метод вывода массива найденных объектов (файлы или папки)
     */
    public function show() {          
        foreach ($this->direct as $key => $value) {            
            if (is_dir($this->dir . $value)) {                
                array_unshift($this->temp_array, [
                    'name' => $this->setWebPath($value, false),
                    'style' => 'directory',                    
                    'type' => mime_content_type($this->dir . $value),
                    'href' => $this->setHrefPath($value),
                    'size' => '',                   
                    'atime' => date("d f y H:i:s", stat($this->dir . $value)[8]),
                    'mtime' => date("d f y H:i:s", stat($this->dir . $value)[9]),
                    'exec' => ''
                ]);
            } else {
                $end_icon = explode('.', $value);
                $icon = (in_array(end($end_icon), $this->iconArray)) ? end($end_icon) : 'any' ;
                array_push($this->temp_array, [
                    'name' => $this->setWebPath($value, false),
                    'style' => 'green files',                    
                    'type' => mime_content_type($this->dir . $value),
                    'href' => $this->setHrefPath($value, false),                    
                    'size' => stat($this->dir . $value)[7],
                    'atime' => date("d f y H:i:s", stat($this->dir . $value)[8]),
                    'mtime' => date("d f y H:i:s", stat($this->dir . $value)[9]),
                    'exec' => $icon
                ]);
            }
        }
        
        return $this;
    }
    /**
     * Метод вывода массива найденных объектов (файлы или папки)
     */
    public function showInTo($dir = '') {         	
        foreach ($this->array as $key => $value) {		
            if (is_dir($this->dir . $this->catalog . $value)) {
                array_push($this->temp_array, [
                    'name' => $this->setWebPath($value, false),
                    'style' => 'directory',                    
                    'type' => mime_content_type($this->dir . $this->catalog . $value),
                    'href' => $this->setHrefPath($dir . $value),
                    'size' => '',                                                          
                    'atime' => date("d f y H:i:s", stat($this->dir . $this->catalog . $value)[8]),
                    'mtime' => date("d f y H:i:s", stat($this->dir . $this->catalog . $value)[9]),
                    'exec' => ''
                ]);                
            } else {
                $end_icon = explode('.', $value);
                $icon = (in_array(end($end_icon), $this->iconArray)) ? end($end_icon) : 'any' ;                
                array_push($this->temp_array, [
                    'name' => $this->setWebPath($value, false),
                    'style' => 'green files',                    
                    'type' => mime_content_type($this->dir . $this->catalog . $value),
                    'href' => $this->setHrefPath($dir . $value, false),                                      
                    'size' => stat($this->dir . $this->catalog . $value)[7],
                    'atime' => date("d f y H:i:s", stat($this->dir . $this->catalog . $value)[8]),
                    'mtime' => date("d f y H:i:s", stat($this->dir . $this->catalog . $value)[9]),
                    'exec' => $icon
                ]);
            }		
        }
        return $this;
    }
    /**
     * Метод для скачивания файла
     */
    public function downloadFile() {
        if(isset($_GET['dir'])){
            $file_path = $this->dir . urldecode($_GET['dir']);        
            if (file_exists($file_path)) {
                if(is_file($file_path)){                     
                    header('Content-Description: File Transfer');
                    header('Content-Type: ' . mime_content_type($file_path));
                    header('Content-Disposition: attachment; filename=' . end(explode('/',$file_path)));
                    header('Content-Transfer-Encoding: binary');
                    header('Content-Length: ' . filesize($file_path));
                    readfile($file_path);
                    exit();
                }
            }
        }        
    }
}

// $users = [];
// for ($i=0; $i < 50; $i++) {
//     $prefix = '';
//     if($i < 10) {
//         $prefix = '0';
//     }
//     $users['user' . $prefix . $i] = [
//         'id' => $i,
//         'name' => 'user' . $prefix . $i,
//         'role' => 'teacher',
//         'password_real' => 'user' . $prefix . $i . '_' . "00" . $prefix . $i,
//         'password' => sha1('user' . $prefix . $i . '_' . "00" . $prefix . $i),
//         'propertys' => []
//     ];    
// }
// writeData(FILES . 'teachers.json', $users);