<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Расписание занятий в <?=$_GET['id']?> классе</title>
  </head>
  <body>
    <h1 class="text-center"><?php echo $author;?></h1>
    <div class="container-fluide">
    	<div class="row">
    		<div class="col-2 d-print-none border">
                <h3>Menu</h3>
                <div class="btn-group-vertical">
                    <?php foreach ($out as $value):?>                        
                        <?php if ($value < '5') {
                            $cl = 'info';
                        } else {
                            $cl = 'success';
                        }?>
                        <a class="btn btn-<?=$cl?>" href="?id=<?=$value?>"><?=$value?> класс</a>
                    <?php endforeach;?>                
                </div>                
            </div>
    		<div class="col-8 border">
    			<div class="h3 text-center" id="title">Расписание занятий в <b id="id"><?=$_GET['id']?></b> классе</div>
                <div class="table-responsive">
                  <table class="table table-sm table-hover table-bordered table-white shadow-lg" id="schedule">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <?php foreach ($day_array as $key => $day):?>                
                            <th scope="col"><?=$day?></th>                          
                        <?php endforeach;?>
                        </tr>
                    </thead>    
                    <tbody>
                        <?php for ($i=1; $i <= 8; $i++):?>
                            <?php if ($i%2 == 0) {
                                $class = 'bg-warning';
                            } elseif ($i%3 == 0) {
                                $class = 'bg-light';
                            } else {
                                $class = 'bg-danger text-white';
                            };?>
                            <tr class="<?=$class?>">
                                <th scope="row"><?=$i;?></th>
                                <?php foreach ($schedule as $key_day_en => $day3):?>
                                    <?php foreach ($day3 as $key_day_ru => $sched):?>
                                        <?php $out_work = $schedule[$key_day_en][$key_day_ru][$i][0];?>
                                        <?php if (strstr($out_work, 'в/д')):?>
                                            <td class='bg-success'>                                            
                                                <?=$out_work?>
                                            </td>
                                        <?php else:?>
                                            <td>
                                                <?=$out_work?>
                                            </td>                                        
                                        <?php endif?>                                        
                                    <?php endforeach;?>            
                                <?php endforeach;?> 
                            </tr>      
                        <?php endfor;?>
                    </tbody>
                  </table>
                </div>
                <button class="btn btn-info d-print-none" onclick="print()">Распечатать расписание</button>
                <form method="GET">
                    <button class="btn btn-info d-print-none" type="submit" name="save_schedule" value="<?=$_GET['id']?>">Сохранить расписание</button>
                </form>

                <div class="alert alert-info" id="message">
                    
                </div>
    		</div>
    		<div class="col-2 d-print-none border"><h3>Settings</h3></div>
    	</div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
    <script type="text/javascript">
   //  	$('body').on('click', 'table td', function (e) {
   //  		let text = $(this).text().replace(/\s+/g, ' ').trim();    		
			// let cell = e.target;
			// if (cell.tagName.toLowerCase() != 'td')
			// 	return;
			// let i = cell.parentNode.rowIndex;
			// let j = cell.cellIndex;			
			// console.log('Выделенный текст: ' + text + ' в строке - ' + i + ';\nв столбце: ' + $('table thead tr th:eq(' + j + ')').text());		  
   //  	})
   		function getUrlVars(key) {
			var vars = {};
			var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
			vars[key] = value;
			});
			return vars[key];
		}

    	document.querySelector('table, td').onclick = (event) => {
    	  let id = getUrlVars('id');
          let idd = document.querySelector('#id').innerText;
		  let cell = event.target;
		  text = cell.innerText;
		  if (cell.tagName.toLowerCase() != 'td')
		    return;
		  let i = cell.parentNode.rowIndex;
		  let j = cell.cellIndex;		  
		  // let table = document.querySelector('table');
		  // for (var m = 0; m < table.rows.length; m++) {
		  //   for (var n = 0; n < table.rows[m].cells.length; n++) {
		  //     if (table.rows[m].cells[n] == cell) {
		  //       i = m;
		  //       j = n;
		  //     }
		  //   }
		  // }
		  // console.log(idd+text)
		  // console.log('строка - ' + i + ';\nстолбец: ' + $('table thead tr th:eq(' + j + ')').text());          
          document.getElementById("message").innerHTML = 'В строке - ' + i + '; столбец: ' + $('table thead tr th:eq(' + j + ')').text() + ' изменены данные <b>' + text + '</b> в файле - ' + idd;
		}
    </script>
  </body>
</html>