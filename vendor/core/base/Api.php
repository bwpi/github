<?php
namespace vendor\core\base;
use \app\models\AdminModels;

abstract class Api {

    public $route = [];    
    public $view;
    public $vars = [];
    public $method = '';
    public $api = '';

    public function __construct($route){
        $this->route = $route;
        $this->view = $route['action'];
        $this->method = $_SERVER['REQUEST_METHOD'];
    }

    public function getView(){
        // $vObj = new View($this->route, $this->layout, $this->view);
        // $vObj->render($this->vars);        
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

    public function getApi($param) {
        echo $this->view . '/' . $param;        
    }

}