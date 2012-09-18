        	    <!-- New page box (hidden default)-->
        	<div id="NewPageBox">
        		<form action="" method="get">
        		<h5>New page  <a onclick="NoNewPage(); return false;" href="#">[X]</a></h5>
        		<hr>
				<input type="text" name="page" placeholder="Page name">
				<input type="submit" name="action" value="Create">
				</form> 
			</div>
			<!-- Annat -->
        <div id="content">
        	<form action="" method="GET">
        	<select name="page" class="SelectPage">
        		<?php
        			foreach($pages->result() as $page)
					{
						echo "<option name=" . $page->name . "\">" . $page->name . "</option>";
					}
        		?>
        	</select><br>
        	<input name="action" type="submit" value="Edit" class="button inline">
        	<input name="action" type="submit" value="Delete" class="button inline">
        	<input name="action" type="submit" value="Go" class="button inline">
        </form>
        <div id="desc">
        	<p>Here you can edit and delete existing pages. To visit the page, press the "Go!" button. Or you can create a ...</p>
        </div>
        <a href="#" onclick="NewPage(); return false;" class="button">New page</a>
	    </div>