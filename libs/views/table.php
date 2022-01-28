<?php

function RenderTable($input, $params = 'false') {
	extract($input);
	echo '<table class="table table-sm table-hover table-bordered table-white shadow-lg" id="schedule">';
        echo '<thead>';
          echo '<tr>';
            echo '<th scope="col">#</th>';
            foreach ($day_week as $key => $day){
                echo '<th scope="col">' . $day . '</th>';
            }
            echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
            for ($i=1; $i <= 8; $i++){
                echo "<tr>";
                    echo "<th scope='row'>{$i}</th>";                                
                    foreach ($schedule as $key_day => $sched){
                    	$out_work = $schedule[$key_day][$i][0];                    	
                        echo "<td contenteditable='{$params}'>{$out_work}</td>";
                    }                        
                echo "</tr>";
            }            
       echo '</tbody>';
      echo '</table>';
}