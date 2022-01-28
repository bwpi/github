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
        <?php noAuthor($author);?>
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eyedropper" viewBox="0 0 16 16">
          <path d="M13.354.646a1.207 1.207 0 0 0-1.708 0L8.5 3.793l-.646-.647a.5.5 0 1 0-.708.708L8.293 5l-7.147 7.146A.5.5 0 0 0 1 12.5v1.793l-.854.854a.5.5 0 1 0 .708.707L1.707 15H3.5a.5.5 0 0 0 .354-.146L11 7.707l1.146 1.147a.5.5 0 0 0 .708-.708l-.647-.646 3.147-3.146a1.207 1.207 0 0 0 0-1.708l-2-2zM2 12.707l7-7L10.293 7l-7 7H2v-1.293z"/>
          </svg>Выбери любой цвет:
          <div class="row btnsColor">
            <?=$colorButtonTemplate;?>            
          </div>
          <div>
            <?=$info?>
          </div>
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
          <div class="col-2 mirgerl d-print-none">
            <a href="<?=SERVER?>/" class="btn btn1">
              <div align="left"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open" viewBox="0 0 16 16">
              <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"></path>
              <path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117zM11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5zM4 1.934V15h6V1.077l-6 .857z"></path>
            </svg> На главную</div>
            </a><br>
           
            <?=$menuTemplate;?>
            
            </div>
          </div>
        </div>
        <div class="col-9 border mycolmid" style="background-color: #fff;">
          <div class="h3 text-center" id="title">Расписание занятий в <a id="classnum"><?= $id?></a> классе</div>
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
                              <td<?= (strstr($out_work, 'в/д')) ? " class='selected'" : ''?>><?=$out_work?></td>
                          <?php endforeach;?>                                
                      </tr>
                  <?php endfor;?>
              </tbody>
            </table>            
          </div>
        </div>          
      </div>
    </div><br>
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
  <?php if (isset($Vk)) { echo '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-quote-fill" viewBox="0 0 16 16">
  <path d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM7.194 6.766a1.688 1.688 0 0 0-.227-.272 1.467 1.467 0 0 0-.469-.324l-.008-.004A1.785 1.785 0 0 0 5.734 6C4.776 6 4 6.746 4 7.667c0 .92.776 1.666 1.734 1.666.343 0 .662-.095.931-.26-.137.389-.39.804-.81 1.22a.405.405 0 0 0 .011.59c.173.16.447.155.614-.01 1.334-1.329 1.37-2.758.941-3.706a2.461 2.461 0 0 0-.227-.4zM11 9.073c-.136.389-.39.804-.81 1.22a.405.405 0 0 0 .012.59c.172.16.446.155.613-.01 1.334-1.329 1.37-2.758.942-3.706a2.466 2.466 0 0 0-.228-.4 1.686 1.686 0 0 0-.227-.273 1.466 1.466 0 0 0-.469-.324l-.008-.004A1.785 1.785 0 0 0 10.07 6c-.957 0-1.734.746-1.734 1.667 0 .92.777 1.666 1.734 1.666.343 0 .662-.095.931-.26z"/>
</svg> Вконтакте: @' . $Vk . '<br>';}?>
        </div>
      </footer>
  </div>

<!-- Optional JavaScript; choose one of the two!    -->

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>      
<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5fe32d15393c420018b42234&product=inline-share-buttons" async="async"></script>
<!-- Зимние украшения -->
<!-- <script src='https://uguide.ru/js/script/snow11.js'> </script>
<script type="text/javascript" src="https://uguide.ru/js/script/snowcursor.min.js"></script> -->
<!-- конец -->