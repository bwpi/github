<?php
namespace vendor\core\base;
use \app\models\AdminModels;

abstract class Controller {

    public $route = [];
    public $layout;
    public $view;
    public $vars = [];
    public $action_item = [];

    public function __construct($route){
        $this->route = $route;
        $this->view = $route['action'];        
    }

    public function getView(){
        $vObj = new View($this->route, $this->layout, $this->view);
        $vObj->render($this->vars);
    }

    public function setData($vars){
        $this->vars = $vars;
    }

    public function isAjax(){
        return isset($_SERVER['HTTP_X_REQUESTED_WITH'])&&$_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';        
    }
    public function isGet($id){
        return $_GET[$id];        
    }

    public function loadView($view, $vars = []){
        extract($vars);        
        ob_start();
        include VIEWS . "{$this->route['controller']}/{$view}.php";
        return ob_get_clean();
    }    

    public function loadWidget($widget = '', $vars = []){       
        extract($vars);
        ob_start();
        $widget = include (VIEWS . "widget/{$widget}.php");
        return ob_get_clean();
    }

    public function response($massage, $type){
        if($massage){
            return "<div class='alert alert-$type'>$massage</div>";
        } 
    }

    protected function getMenuSidebar(){        
        $model = new AdminModels();
        foreach (get_class_methods($this) as $key => $value) {
            if (strpos($value, 'Action')) {                
                array_push($this->action_item, str_replace("Action", "", $value));                
            }
        }
        $out = array_combine($this->action_item, $model->getMenuItems('settings/item'));        
        $ktp_files = $model->scanDirInFiles('ktp/');        
        $output = $this->loadWidget('_menu', compact('out', 'ktp_files'));
        return $output;
    }

}