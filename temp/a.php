<?php foreach ($array as $key => $item) :?>
<?php 
        if ($item['type'] == 'dir') {
            $type = 'folder';
        } else {
            $type = $item['exec'];
        }
    ?>
<a class="<?= $item['style']?>" href="<?= $item['href']?>"><img src="/img/<?=$type?>.svg" /><?= $item['name']?></a>
<?php endforeach;?>
<?php if(empty($array)):?>
<div class="alert alert-warning">Нет данных для отображения</div>
<?php endif;?>