<link rel="stylesheet" type="text/css" href="<?=SERVER?>/css/style.css">
    <link rel="icon" type="image/png" href="https://img.icons8.com/doodle/480/000000/puzzle--v1.png">
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
.table:hover .tr1 {
        color: #000;
        background-color: #EDEEF0;
      }
      .tr1, .tr1:hover {
        background-color: #<?php echo $color;?>;
        color: #fff;
        transition: 0.3s;
      }
      tr:hover {
        background-color: #<?php echo $color;?> !important;
        color: #fff !important;
        transition: 0s !important;
      }
      #classnum {
        color: #<?php echo $color;?>;
      }
      .btn2 {
        box-shadow: 0px 0px #<?php echo $color;?>;
      }
      .selected {
        color: #fff;
        background-color: #<?php echo $color;?> !important;
        border-radius: 15px 15px 15px 15px;
        transition: 0.3s;
      }
      tr:hover .selected {
        border-radius: 0px 0px 0px 0px !important;
        transition: 0s !important;
      }
    </style>