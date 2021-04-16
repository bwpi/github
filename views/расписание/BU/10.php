<h1 class="text-center"><?php echo $nameout ?></h1>
    <div class="container-fluide">
        <div class="row">
            <div class="col-2 border"><h3>menu</h3>
              <div class="btn-group-vertical">
                <?php foreach ($out as $value):?>                
                   <a class="btn btn-info" href="?id=<?= $value?>"><?=$value?> класс</a>
                <?php endforeach;?>
                <a href="<?=SERVER?>/" class="btn btn-info">На главную</a>
              </div>            
            </div>
            <div class="col-8 border">
          <div class="h3 text-center" id="title">Расписание занятий <?=$id?> классе</div>
          <div class="table-responsive">
            <table class="table table-sm table-hover table-bordered table-info shadow-lg" id="schedule">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <?php foreach ($day_week as $key => $day):?>                
                      <th scope="col"><?=$day?></th>                      
                  <?php endforeach;?>
                  </tr>
              </thead>    
              <tbody>
                  <?php for ($i=1; $i <= 8; $i++):?>
                    <?php if ($i%2 == 0) {
                      $class = 'text-success';
                    } elseif ($i%5 == 0) {
                      $class = 'text-warning';
                    } else {
                      $class = 'bg-success';
                    }                      
                    ?>
                      <tr class="<?=$class?>">
                          <th scope="row"><?=$i;?></th>                                
                          <?php foreach ($schedule as $key_day => $sched):?>
                              <?php $out_work = $schedule[$key_day][$i][0];?>
                              <td<?= (strstr($out_work, 'в/д')) ? " class='bg-success'" : ''?>><?=$out_work?></td>
                          <?php endforeach;?>                                
                      </tr>
                  <?php endfor;?>
              </tbody>
            </table>
          </div>
          
        </div>
            <div class="col-2 border"><h3>settings</h3></div>
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