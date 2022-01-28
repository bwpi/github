<?php
namespace vendor\core\base;

class View {

    public $route = [];
    public $layout;
    public $view;    

    public function __construct($route, $layout = '', $view = ''){
        $this->route = $route;        
        if($layout === false){
            $this->layout = false;
        } else {
            $this->layout = $layout ?: LAYOUT;
        }
        $this->view = $view;        
    }

    public function render($vars){
        extract($vars);
        $file_view = VIEWS . "{$this->route['controller']}/{$this->view}.php";
        
        ob_start();
        if(is_file($file_view)){
            require $file_view;
        } else {
            echo "<p>не найден вид <b>$file_view</b></p>";
        }
        $content = ob_get_clean();
        
        if(false !== $this->layout){
            $file_layout = VIEWS . "layouts/{$this->layout}.php";
            if(is_file($file_layout)){
                require $file_layout;
            } else {
                echo "<p>не найден шаблон <b>$file_layout</b></p>";
            }
        }        
    }   
    
}