<?php

class ShowDataInTemplates {    
    static public function out($array = [], $prop = []) {
        if(ALLOW_ARRAY_DATA && $array)
        ?> 
        <style>
            .open_array {            
                position:absolute!important;
                left:10px!important;
                top:10px!important;
                width:30px!important;
                height:20px!important;
                border-radius:5px!important;
                z-index:10001!important;
                display:flex!important;
                justify-content:center!important;
                align-items:center!important;
                padding:5px;                
            }  
            .block_array {
                overflow: auto; 
                padding: 10px; 
                border: 1px solid #d2d2d2; 
                position:absolute; 
                top:0; 
                left:0; 
                background-color: #57ecece8;
                z-index: 10000; 
            }    
            .block_array pre {
                overflow: unset;
            }                
        </style> 
        <div style="position: relative">        
            <button class='btn btn-danger open_array'>
                <svg xmlns='http://www.w3.org/2000/svg' aria-hidden='true' focusable='false' data-prefix='fas' data-icon='eye' class='svg-inline--fa fa-eye fa-w-18' role='img' viewBox='0 0 576 512'><path fill='currentColor' d='M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z'/></svg>
            </button>
            <div class='block_array d-none'>
                <pre>#template: <?=$prop['template']?></pre>
                <?php echo "<pre>#data array: " . print_r($array, true) . "</pre>";?>
            </div>
        </div>
<?php
    }
}