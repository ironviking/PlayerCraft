	<!-- Sidebar !-->
		<div id="aside">
		<?php
		if($widgets->result() == null){echo '<script type="text/javascript">document.getElementById("content").style.width="930px";</script>';}else{
		  foreach($widgets->result() as $widget)
		  { 
		   echo '<div class="widget">';
                     echo '<h4>' . $widget->title . '</h4>';

                if($widget->content == '#USE-AS-ONLINE-PLAYERS-WIDGET' && $query_server){
		  			echo '<div class="players">';
		  			echo '<ul>';
		  			if( isset($ServerData['online_players']) )
			  			foreach($ServerData['online_players'] as $player){
			  				echo '<li>' . $player . '</li>';
			  			}else{
			  				echo 'Could not query server data (Is the server offline?)';
			  			}
		  			echo '</ul>';
		  		}else{
                     echo '<p>' . $widget->content . '</p>';
                 }

                     echo '</div>';
                    }
                }
		?>
		</div>