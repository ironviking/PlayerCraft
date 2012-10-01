        	    <!-- New page box (hidden default)-->
        	<div id="NewBox">
        		<form action="" method="get">
        		<h5>New page</h5>
				<input type="text" required name="page" placeholder="Page name"><br>
				<input type="submit" name="action" value="Create">
				 <a onclick="NoNewBox(); return false;" href="#"><input type="button" value="cancel"></a>
				</form> 
			</div>
            <div id="NewRedirect">
                <form action="" method="get">
                    <h5>New redirect</h5>
                    <input type="text" required name="page" placeholder="Page name"><br>
                    <input type="text" required name="to" placeholder="Redirect to"><br>
                    <input type="submit" name="action" value="Create">
                     <a onclick="NoRedirect(); return false;" href="#"><input type="button" value="cancel"></a>
                </form> 
            </div>
			<!-- Annat -->
        <section>
                <h2>Pages</h2>
                <hr>
        	<form action="" method="GET">
        	<select name="page" style="min-width: 250px;">
        		<?php
        			foreach($pages->result() as $page)
					{
						echo "<option name=" . $page->name . "\">" . $page->name . "</option>";
					}
        		?>
        	</select>
        	<input name="action" type="submit" value="Edit" class="button inline">
        	<input name="action" type="submit" value="Delete" class="button inline">
        	<input name="action" type="submit" value="Go" class="button inline">
                <blockquote>
                          <p>Here you can edit and delete existing pages. To visit the page, press the "Go!" button. To create a new page press "New page" </p>
                </blockquote>
                        <a href="#" onclick="NewBox(); return false;"><button>New page</button></a><br><br>
            </form>
            <!-- Redirects -->
            <h2>Redirects</h2>
            <hr>
            <table>
                <?php
                if($redirects){
                    ?>
                  <tr>
                    <th>Page</th>
                    <th>To</th>
                </tr>
                    <?
                    foreach($redirects->result() as $redirect)
                    {
                        echo "<tr>";
                        echo "<td>";
                        echo $redirect->page;
                        echo "</td>";
                        echo "<td>";
                        echo $redirect->href;
                        echo "</td>";
                        echo "<td>";
                        echo '<a href="?action=rmr&id='. $redirect->id.'"> <input type="button" value="-"> </a>';
                        echo "</td>";
                        echo "</tr>";
                    }
                }else{
                    echo '<h3 style="color: gray;">No redirects</h3>';
                }
                ?>
                </table>

                <blockquote>
                   Redirect the visitor to another url. The page doesn't need to exist.
                </blockquote>
                <a onclick="NewRedirect(); return false;" href="#"><input type="button" value="New redirect">

</section>
