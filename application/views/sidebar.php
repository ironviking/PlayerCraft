	<!-- Sidebar !-->
		<div id="aside">
		<?php
		if($widgets->result() == null){echo '<script type="text/javascript">document.getElementById("content").style.width="930px";</script>';}else{
		  foreach($widgets->result() as $widget)
		  {  echo '<div class="widget">';
                     echo '<h4>' . $widget->title . '</h4>';
                     echo '<p>' . $widget->content . '</p>';
                     echo '</div>';
                    }
                    }
		?>
		</div>