<div class="container-fluide">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <?php foreach($array as $name => $href):?>
        <?php if($name != 'current'):?>
          <li class="breadcrumb-item" style="display: contents;word-break: break-word;white-space: nowrap;">
            <?php if($name != $array->current):?>
              <a href="<?=$href?>"><?=$name?></a>
            <?php else:?>
              <a><?=$name?></a>
            <?php endif;?>
          </li>
        <?php endif;?>
      <?php endforeach;?>
    </ol>
  </nav>
  <h5 class="text-center">Текущий каталог - <?= $array->current?></h5>
</div>
