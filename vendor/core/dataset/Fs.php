<?php

namespace vendor\core\dataset;

class Fs {

    public $data = [];
    public $dir = [];
    protected $path = STORAGE;
    protected $type = 'json';
    /**
     * Читаем файл JSON
     */
    public function readFile($filename) {
        if (is_file($this->path . $filename . "." . $this->type)) {            
            $this->data = file_get_contents($this->path . $filename . "." . $this->type);            
            return $this;
        } else {
            echo "нет данных - {$filename} для чтения в массив";            
        }
    }

    /**
     * Читаем файл
     */
    public function read($filename) {
        if (is_file($this->path . $filename)) {            
            $this->data = file_get_contents($this->path . $filename);            
            return $this;
        } else {
            echo "нет данных - {$filename} для чтения в массив";            
        }
    }
    
    /*
    *Сканируем каталог на наличие файлов
    */
    public function scanDir($dir = '', $type = false) {
        if (is_dir($this->path . $dir)) {
            $dir_scan = array_slice(scandir($this->path . $dir), 2);
            if (!$type) {
                $this->dir = $dir_scan;
                return $this;
            } else {
                $this->dir = [];                
                foreach ($dir_scan as $key => $value) {
                    array_push($this->dir, pathinfo($value, PATHINFO_FILENAME));
                }
                return $this;                
            }          
        } else {
            echo 'no dir' . $this->path . $dir;
        }
    }

    /*
    *Сканируем все каталоги
    */
    public function scanDirAll($dir = '') {
    	if (is_dir($this->path . $dir)) {
            $dir_scan = scandir($this->path . $dir);
            $this->dir = $dir_scan;            
            return $this;
        } else {
        	echo 'no dir' . $this->path . $dir;
        }
    }

    /*
    *Рекурсивное сканирование каталогов
    */
    public function scan($dir = '') {
        $direct = [];
        $path = $this->path . $dir;
    	if (is_dir($path)) {
            $dir_scan = array_slice(scandir($path . '/'), 2);            
            foreach ($dir_scan as $key => $value) {
                $file = $path . '/' . $value;
                if (is_file($file)) {
                    // $direct = $value;
                    $data = [
                        'name' => $value,
                        'type' => mime_content_type($file),
                        'size' => round(stat($file)[7]/1024, 2),
                        'atime' => date("d F Y H:i:s", stat($file)[8]),
                        'mtime' => date("d F Y H:i:s", stat($file)[9])
                    ];
                    // implode('/', $data);
                    array_push($direct, implode('/', $data));
                    
                } else {                    
                    $direct[$value] = $this->scan($dir . '/' . $value);
                }                
            }            
        } else {
        	echo 'no dir' . $path;
        }
        ksort($direct, SORT_STRING);
        return $direct;
    }

    public function setPath($path) {
        $this->path = $path;
        return $this;
    }

    public function setType($type) {
        $this->type = $type;
        return $this;
    }

    public function array($mode = true) {
        return $this->data = json_decode($this->data, $mode);
    }

    public function json() {
        return $this->data = json_encode($this->data);
    }
    
}