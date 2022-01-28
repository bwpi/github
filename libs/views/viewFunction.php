<?php 

function colorBox($paramcolb)
{
  $out =  SERVER . '?';
  if (isset($_GET['id'])) {
    $out .= 'id=' . $_GET['id'] . '&';
  }
  $out .= 'color=' . $paramcolb;
  return $out;
}

function noAuthor($author)
{
  if ($author != "Гусельников") { echo
            '<a href="/shedules/08" class="ahref"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right" viewBox="0 0 16 16">
             <path fill-rule="evenodd" d="M6 12.796L11.481 8 6 3.204v9.592zm.659.753l5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z"/>
            </svg>Юрий Гусельников</a><br>';
          }
          if ($author != "Кайдаулов") { echo
            '<a href="/shedules/10" class="ahref"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M6 12.796L11.481 8 6 3.204v9.592zm.659.753l5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z"/>
            </svg>Роман Кайдаулов</a><br>';
          }
          if ($author != "Алексеев") { echo
            '<a href="/shedules/09" class="ahref"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M6 12.796L11.481 8 6 3.204v9.592zm.659.753l5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z"/>
            </svg>Артем Алексеев</a><br>';
          }
}

function getMenuTemplate($array = [], $params){
  extract($params);  
  $out = '';
  foreach ($array as $value){              
    if (($value == '1-a') || ($value == 5) || ($value == 10)) {
      $out.='<br><div class="btn-group-vertical">';
    }
    $btn_class = ($value == $id) ? 'btn2' : '';
    $href = '';
    if ((isset($id) && $id != $value)) {
        $href .= '?id=' . $value;
    }
    if (isset($_GET['color'])) {
        $href .= '&color=' . $_GET['color'];        
    }               
    if ($id == $value) {
        $style = "color: #fff; cursor: default; background-color: #" . $color;
    }                            
    $out .= "<a class='btn btn1 {$btn_class}' href='{$href}' style='{$style}'>";                  
         $style = '';         
    $out .= "<div style='width: 100px' align='left'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-card-list' viewBox='0 0 16 16'>
                      <path fill-rule='evenodd' d='M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z'/>
                      <path fill-rule='evenodd' d='M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5z'/>
                      <circle cx='3.5' cy='5.5' r='.5'/>
                      <circle cx='3.5' cy='8' r='.5'/>
                      <circle cx='3.5' cy='10.5' r='.5'/>
                    </svg> {$value} класс</div></a>";
    }
    return $out."</div>";
}


