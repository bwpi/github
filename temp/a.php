<?php if(empty($array)):?>
<div class="alert alert-warning">Нет данных для отображения</div>
<?php else:?>
    <?php foreach ($array as $key => $item) :?>
        <?php 
            $type = ($item->type == 'directory') ? 'directory' : $item->exec;
            $size = ((float)$item->size <= 1024) ? round((float)$item->size/1024, 2) . ' Kb' : round((float)$item->size/(1024*1024), 2) . ' Mb';
        ?>
        <a class="<?= $item->style?>" href="<?= $item->href?>">
            <object type="image/svg+xml" data="/img/<?= $type?>.svg">
                <img src="/img/<?=$type?>.svg" title="<?= $item->name?>"/>
            </object>
            <?= $item->name?>
            <div class="info">
                <span class="badge bg-primary"><?= $item->atime?></span>
                <span class="badge bg-secondary"><?= $item->mtime?></span>
                <?php if ($item->size) { ?>
                    <span class="badge bg-info"><?= $size?></span>
                <?php } ?>            
            </div>
        </a>
    <?php endforeach;?>
<?php endif;?>