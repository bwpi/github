<header class="d-print-none">
    <div>
      <a id="a1width">
        <h1 class="text" id="h1text"><strong><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check-square" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
            <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
          </svg></strong><?php echo $author ?><span class="badge badge-secondary" id='badger'>Расписание</span>
        </h1>
      </a>
    </div>
    <div class="diver20"></div>
     <div class="alert alert-warning alert-dismissible fade show mirger20" role="alert"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/></svg>Информация<br>Другие страницы с расписанием:<br>
        <?php
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
          echo '<div>' . $info . '</div>';?>
          <div align="right">
            <div class="sharethis-inline-share-buttons"></div>
            Поделись расписанием с друзьями!
        </div>
      </div>
  </header>
  <div><br><br></div>
  <div class="fixedbyme">
  <div class="mirger20"><br><br></div>
      <div class="container-fluide mirger20">
        <div class="row">
            <div class="col-2 mirgerl d-print-none"><!-- <h3>Меню</h3> -->
              <a href="<?=SERVER?>/" class="btn btn1"><div align="left"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open" viewBox="0 0 16 16">
  <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"></path>
  <path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117zM11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5zM4 1.934V15h6V1.077l-6 .857z"></path>
</svg> На главную</div></a><br><br>
             <div class="btn-group-vertical">
              <?php foreach ($out as $value):?>  
                <?php
                  if (($value == 5) || ($value == 10)) {
                    echo '</div> <br><br><div class="btn-group-vertical">';
                  }
                ?>     
                  <a class='btn btn1 <?php if ($value == $id) { echo 'btn2';} ?>' <?php if ((isset($id) & $id != $value)) { echo 'href="?id=' . $value; if (isset($_GET['color'])) { echo '&color=' . $_GET['color'];} echo '"'; {
                    # code...
                  }} {
                    # code...
                  }?> style="<?php
                  if ($id == $value) {
                    echo "color: #fff; cursor: default; background-color: #" . $color;
                  }
                  ?>"><div style="width: 100px" align='left'>
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                    <path fill-rule="evenodd" d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5z"/>
                    <circle cx="3.5" cy="5.5" r=".5"/>
                    <circle cx="3.5" cy="8" r=".5"/>
                    <circle cx="3.5" cy="10.5" r=".5"/>
                  </svg> <?=$value?> класс</div></a>
              <?php endforeach;?>
            </div>
          </div>
          <div class="col-9 border mycolmid" style="background-color: #fff;">
            <div class="h3 text-center" id="title">Расписание занятий в <a id="classnum"><?= $id ?></a> классе</div>
              <div class="table-responsive">
                <table class="table table-sm table-bordered" id="my1tab" id="schedule">
                  <thead>
                    <tr class="tr1">
                      <th scope="col">#</th>
                      <?php foreach ($day_week as $key => $day):?>                
                          <th scope="col"><?=$day?></th>                      
                      <?php endforeach;?>
                      </tr>
                  </thead>    
                  <tbody>
                      <?php for ($i=1; $i <= 8; $i++):?>
                      <?php
                        if ($i%2 == 0) {
                          $style='background-color: #EDEEF0';
                        }
                        else{
                          $style='background-color: #ffffff';
                        }
                      ?>
                        <tr class="<?=$class?>" style="<?=$style?>">
                            <th scope="row"><?=$i;?></th>                                
                            <?php foreach ($schedule as $key_day => $sched):?>
                                <?php $out_work = $schedule[$key_day][$i][0];?>
                                <td><?=$out_work?></td>
                            <?php endforeach;?>                                
                        </tr>
                    <?php endfor;?>
                </tbody>
              </table>            
            </div>
          </div>
          <!-- <div class="col-2 border"><h3>Настройки</h3>

          </div> -->
        </div>
      </div>

            <!-- Optional JavaScript; choose one of the two! -->

              <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

             <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
              <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
              <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
              <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
              -->
      <div class="mirger20 d-print-none">
        <p class="mirgerl">
          <a onclick="print()" class="ahref pointer"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-square-fill" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"></path>
          </svg> Распечатать расписание</a><br>
          <a href="https://dnevnik.ru/" target="blank" class="ahref"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-right-square-fill" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.879 5.172a.5.5 0 0 0-.707.707l4.096 4.096H6.5a.5.5 0 1 0 0 1h3.975a.5.5 0 0 0 .5-.5V6.5a.5.5 0 0 0-1 0v2.768L5.879 5.172z"/>
          </svg> Дневник.ру</a><br>
          <a href="https://www.yaklass.ru/" target="blank" class="ahref"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-right-square-fill" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.879 5.172a.5.5 0 0 0-.707.707l4.096 4.096H6.5a.5.5 0 1 0 0 1h3.975a.5.5 0 0 0 .5-.5V6.5a.5.5 0 0 0-1 0v2.768L5.879 5.172z"/>
          </svg> ЯКласс</a><br>
        </p>
      </div>
      <footer id="foot" class="d-print-none">
      <div>
        <a><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-terminal-fill" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M0 3a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3zm9.5 5.5h-3a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zm-6.354-.354L4.793 6.5 3.146 4.854a.5.5 0 1 1 .708-.708l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708z"/></svg> Сделано учениками <abbr title="Муниципальное казенное общеобразовательное учреждение Гаринская средняя общеобразовательная школа">МКОУ ГСОШ</abbr></a><br>
                <?php if (isset($Email)) { echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-square-dots-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-2.5a1 1 0 0 0-.8.4l-1.9 2.533a1 1 0 0 1-1.6 0L5.3 12.4a1 1 0 0 0-.8-.4H2a2 2 0 0 1-2-2V2zm5 4a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
</svg> Почта: ' . $Email . '<br>';}?>
    </div>
    </footer>
  </div>
  <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5fe32d15393c420018b42234&product=inline-share-buttons" async="async"></script>
  <!-- Зимние украшения -->
  <!-- <script src='https://uguide.ru/js/script/snow11.js'> </script>
  <script type="text/javascript" src="https://uguide.ru/js/script/snowcursor.min.js"></script> -->
  <!-- конец -->