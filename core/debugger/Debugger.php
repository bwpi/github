<?php

class Debug {
    private static $html = '';
    public static $message = [];
    public static function getMessage($array = [])
    {
        array_push(self::$message, $array);
    }    
    public static function show()
    {
        if(self::$message) {
            self::$html .= 
"<style>
    #open {
        position: fixed;
        top: 0;
        right: 0;
        z-index: 10000;
        padding-left: 25px;
        padding-right: 25px;
    }
    #open_array {
        position: absolute;
        top: 0;
        left: 0;
        z-index: 10000;        
    }
    .debug-container.active {        
        left: 0;       
    }
    .debug-container {
        display: flex;
        flex-wrap: wrap;
        background-color: rgba(100,100,100,.9);
        padding: 15px;
        position: absolute;
        top: 0;
        left: -100%;
        bottom: 0;
        width: 100vw;
        overflow: auto;
        transition: all .4s ease;
    }
    .debug-item {
        border-radius: 10px;
        margin:30px;
        padding: 20px;
        background-color:
        rgba(100,100,250,.9);
        z-index: 1500;
        height: max-content;
    }
    .debug-body {
        padding: 10px;
        background-color: rgba(250,250,250,.9);
        transition: all .4s ease;
    }
    .debug-body pre {
        display: block;
        text-align: initial;
    }
    .debug-body.hidden {
        height: 10px;
    }
    .debug-body.hidden pre {
        display: none;
    }
</style>
<script>
    $('body').on('click','#open',function(){
        $('.debug-container').toggleClass('active');
    })
    $('body').on('click','.debug-item h4',function(){
        $(this).siblings('.debug-body').toggleClass('hidden')
    })
</script>";
            self::$html .= "<a class='btn btn-danger' id='open'>" . count(self::$message) . "</a><div class='debug-container'>";
            foreach (self::$message as $key => $value) {
                self::$html .= "<div class='debug-item'>
                    <h4>DEBUG #".$key."</h4>
                    <div class='debug-body'>
                        <pre>" . print_r($value, true) . "</pre>
                    </div>
                </div>";
            }
            self::$html .= "</div>";
        }
        echo self::$html;
    }
}

function debug($array){    
    Debug::getMessage($array);    
}