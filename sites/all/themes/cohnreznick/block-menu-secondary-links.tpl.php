<div class="right">
	  &copy; 2012 CohnReznick&nbsp;&nbsp;|&nbsp;&nbsp;
      All Rights Reserved&nbsp;&nbsp;|&nbsp;&nbsp; 
      <?php
         $nav = menu_navigation_links('secondary-links'); $i = 0;
         foreach ($nav as $item) {
  	         $href = $item['href'] == "<front>" ? base_path() : base_path() . drupal_get_path_alias($item['href']);
			 if($i == count($nav) - 1)
			    print '<a href="'. $href .'">'. $item['title'] .'</a>';
			 else 
		        print '<a href="'. $href .'">'. $item['title'] .'</a>&nbsp;&nbsp;|&nbsp;&nbsp;';
			 $i++;
         }
     ?>
</div>