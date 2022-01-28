<!doctype html>
<html lang="en">
  <head>
    <title>Календарь событий</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="icon" type="image/png" href="https://img.icons8.com/doodle/480/000000/puzzle--v1.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <?php if ($style_file):?>
      <link rel='stylesheet' type='text/css' href="<?=$style_file;?>">
    <?php endif;?>    

    
    
  </head>
  <body>    
    <div class="container-fluid">
      <div>
        <a class="btn btn-info" href="http://192.168.1.9:88/calendar/">Главная</a>        
        <a class="btn btn-info" href="http://192.168.1.9:88/calendar/08">08</a>
        <a class="btn btn-info" href="http://192.168.1.9:88/calendar/09">09</a>
        <a class="btn btn-info" href="http://192.168.1.9:88/calendar/10">10</a>        
        <a class="btn btn-info" href="http://192.168.1.9:88/calendar/11">11</a>        
      </div>
    <?php 
      if ($storage_views) {
        include VIEWS . $storage_views . ".php";    
      } else {
        echo $content;
      }
    ?>
  </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <?php if ($script_file):?>
      <script src="<?=$script_file;?>"></script>
    <?php endif;?>
    <?php if ($scripts) {
        echo $scripts;
      } ?>    
  </body>
</html>