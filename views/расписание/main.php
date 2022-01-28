<h1 class="text-center"><?php echo $author;?></h1>
    <div class="container-fluide">
    	<div class="row">
    		<div class="col-2 d-print-none border">
                <h3>Menu</h3>
                <div class="btn-group-vertical d-grid">
                    <?php foreach ($out as $value):?>                        
                        <?php if ($value < '5') {
                            $cl = 'info';
                        } else {
                            $cl = 'success';
                        }?>
                        <a class="btn btn-<?=$cl?> w-100" href="/shedules/main/<?=$value?>"><?=$value?> класс</a>
                    <?php endforeach;?>
                    <a href="<?=SERVER?>/" class="btn btn-info">На главную</a>
                </div>
                                
            </div>
    		<div class="col-8 border">
    			<div class="h3 text-center" id="title">Расписание занятий в <b id="id"><?=$id?></b> классе</div>
                <div class="table-responsive">                  
                  <?php RenderTable(compact('day_week', 'schedule'), 'true');?>
                </div>
                <button class="btn btn-info d-print-none" onclick="print()">Распечатать расписание</button>
                <form method="GET">
                    <button class="btn btn-info d-print-none" type="submit" name="save_schedule" value="<?=$id?>">Сохранить расписание</button>
                </form>

                <div class="alert alert-info" id="message">
                    
                </div>
    		</div>
    		<div class="col-2 d-print-none border"><h3>Settings</h3></div>
    	</div>
    </div>