<?php require_once('functions.php'); ?>

<ul id="main_nav">

<?php
  $menu_items = getMenuItems('primary-links'); 
  foreach ($menu_items as $item) {
  	  if ($item['plid'] == 0) {
  	      $href = $item['link_path'] == "<front>" ? base_path() : base_path() . drupal_get_path_alias($item['link_path']);
		  $child_items = getChildMenuItems($menu_items, $item['mlid']);
		   $cnt_vnuk = 0;
		  	  foreach($child_items as $child) {
			  	  $vnuk_items = getChildMenuItems($menu_items, $child['mlid']);
				  if(count($vnuk_items) > 0) $cnt_vnuk++;
			  }
		  if($cnt_vnuk == 0) 
		         echo '<li><a href="'. $href .'">'. $item['link_title'] .'</a>';
		  elseif(count($child_items) == 3)
		          echo '<li class="menu3col"><a href="'. $href .'">'. $item['link_title'] .'</a>';
		  elseif(count($child_items) == 2)
		          echo '<li class="menu2col"><a href="'. $href .'">'. $item['link_title'] .'</a>';
		  elseif(count($child_items) == 0)
                  echo '<li><a href="'. $href .'">'. $item['link_title'] .'</a></li>';
		  else
		  	      echo '<li><a href="'. $href .'">'. $item['link_title'] .'</a>';
		  if($child_items) {
		  	  echo '<div>';
			  if($cnt_vnuk == 0) {
			  	  echo '<ul class="sub-menu">';
			  	  foreach($child_items as $child) {
			  	  	    $href = $child['link_path'] == "<front>" ? base_path() : base_path() . drupal_get_path_alias($child['link_path']);
						echo '<li><a href="'. $href .'">'. $child['link_title'] .'</a></li>';
				  }
				  echo '</ul>';
			  }else
			  foreach($child_items as $child) {
			  	  $vnuk_items = getChildMenuItems($menu_items, $child['mlid']);
			  	  $href = $child['link_path'] == "<front>" ? base_path() : base_path() . drupal_get_path_alias($child['link_path']);
				  echo '<ul class="sub-menu">';
				  if(count($vnuk_items) > 0) {
                        echo '<li class="parent"><a href="'. $href .'">'. $child['link_title'] .'</a></li>';
				        foreach($vnuk_items as $vnuk) {
				        	  $href = $vnuk['link_path'] == "<front>" ? base_path() : base_path() . drupal_get_path_alias($vnuk['link_path']);
				        	  $pravnuk_items = getChildMenuItems($menu_items, $vnuk['mlid']);
							   if(count($pravnuk_items) == 0)
							           echo '<li><a href="'. $href .'">'. $vnuk['link_title'] .'</a></li>';
                               else {
                                       echo '<li><a href="'. $href .'">'. $vnuk['link_title'] .'</a>';
						               echo '<div><ul class="sub-menu">';
									   foreach($pravnuk_items as $pravnuk) {
						        	       $href = $pravnuk['link_path'] == "<front>" ? base_path() : base_path() . drupal_get_path_alias($pravnuk['link_path']);
									       echo '<li><a href="'. $href .'">'. $pravnuk['link_title'] .'</a></li>';
							           }
                                       echo '</ul></div></li>';
						        }
						}
				  }
				  else {
					    echo '<li><a href="'. $href .'">'. $child['link_title'] .'</a></li>';
				  }
				   echo '</ul>';
			  }
			  echo '</div>';
		  }
		  if(count($child_items) > 0)
              echo '</li>';
	  }
  }
?>
</ul>


