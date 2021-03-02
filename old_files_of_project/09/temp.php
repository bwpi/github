<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Расписание занятий в <?=(isset($_GET['id']) ? $_GET['id'] : '5')?> классе</title>
  </head>
  <body>
    <h1 class='text-center'><?php echo $author ?></h1>
    <div class="container-fluide">
        <div class="row">
            <div class="col-2 border"><h3>menu</h3>
             <div class="btn-group-vertical">
              <?php foreach ($out as $value):?>                
                <a class='btn btn-info' href="?id=<?=$value?>"><?=$value?> класс</a>
              <?php endforeach;?>
            </div>
          </div>
            <div class="col-8 border">
<div class="h3 text-center" id="title">Расписание занятий в <?=(isset($_GET['id']) ? $_GET['id'] : '5')?> классе</div>
          <div class="table-responsive">
            <table class="table table-sm table-hover table-bordered table-secondary shadow-lg" id="schedule">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <?php foreach ($day_array as $key => $day1):?>                
                      <th scope="col"><?=$day1?></th>                      
                  <?php endforeach;?>
                  </tr>
              </thead>    
              <tbody>
                  <?php for ($i=1; $i <= 8; $i++):?>
                    <?php
                    if ($i%2 == 0) {
                      $class='bg-secondary text-white';
                    }
                    else{
                      $class='bg-info';
                    }
                    ?>
                      <tr class="<?=$class?>">
                          <th scope="row"><?=$i;?></th>
                          <?php foreach ($schedule as $key_day_en => $day3):?>                               
                              <?php foreach ($day3 as $key_day_ru => $sched):?>
                                  <td>                                    
                                    <?= $schedule[$key_day_en][$key_day_ru][$i][0];?>
                                  </td>                        
                              <?php endforeach;?>            
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
  </body>
</html>