<link rel="stylesheet" type="text/css" href="<?=SERVER?>/css/style.css">
    <link rel="icon" type="image/png" href=<?php 
      if ($author == 'Гусельников') {
      echo '"https://img.icons8.com/doodle/480/000000/puzzle--v1.png"';
      }
      else {
      echo
      '"https://img.icons8.com/dusk/100/000000/bug.png"';
    }?>>   
    <style type="text/css">
      ::selection {
        color: white;
        background-color: #<?php echo $color; ?>;
      }
      header, header:hover {
        background-color: #<?php echo $color; ?>;  
        border-radius: 0px 0px 15px 15px;
        position: fixed !important;
        z-index: 2;
        width: 100% !important;
        transition: 0.5s;
      }
      #badger {
        background-color: #ffffff;
        color: #<?php echo $color;?>
      }
      .ahref, .ahref:hover {
        transition: 0.3s;
        color: #<?php echo $color;?>
      }
      .btn1:hover {
        background-color: #<?php echo $color;?>;
        color: white;
        margin-left: 15px !important;
        box-shadow: -14px 0px 0px 0px #<?php echo $color;?>;
      }
      .tr1 {
        background-color: #<?php echo $color;?>;
        color: #fff;
      }
      tr:hover {
        background-color: #<?php echo $color;?> !important;
        color: #fff !important;
      }
      #classnum {
        color: #<?php echo $color;?>;
      }
      .btn2 {
        box-shadow: 0px 0px #<?php echo $color;?>;
      }
    </style>