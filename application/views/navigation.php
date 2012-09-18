<div id="menu">
	<ul>
                <?php
                    foreach ($menuItems->result() as $item)
                    {                               
                        if($menuItems == null){ show_error('tmp->No_pages'); }
                        echo '<li><a href="'. str_replace(' ', '_', $item->name) .'">'. $item->name .'</a></li>';
                    }

                ?>
	</ul>
</div><!-- End of #menu-->