<?php require_once('functions.php'); ?>

<ul id="main_nav">
<?php
  $menu_items = getMenuItems('primary-links'); 
  foreach ($menu_items as $item) {
  	  if ($item['plid'] == 0) {
  	      $href = $item['link_path'] == "<front>" ? base_path() : base_path() . drupal_get_path_alias($item['link_path']);
		  $child_items = getChildMenuItems($menu_items, $item['mlid']);
		  if(count($child_items) > 2)
		          echo '<li class="menu3col"><a href="'. $href .'">'. $item['link_title'] .'</a>';
		  elseif(count($child_items) == 2)
		          echo '<li class="menu2col"><a href="'. $href .'">'. $item['link_title'] .'</a>';
		  elseif(count($child_items) == 0)
                  echo '<li><a href="'. $href .'">'. $item['link_title'] .'</a></li>';
		  else
		  	      echo '<li><a href="'. $href .'">'. $item['link_title'] .'</a>';
		  if($child_items) {
		  	  echo '<div><ul class="sub-menu">';
			  foreach($child_items as $child) {
			  	  $href = $child['link_path'] == "<front>" ? base_path() : base_path() . drupal_get_path_alias($child['link_path']);
                  echo '<li class="parent"><a href="'. $href .'">'. $child['link_title'] .'</a></li>';
			  }
			  echo '</ul></div>';
		  }
		  if(count($child_items) > 0)
              echo '</li>';
	  }
  }
?>
</ul>


