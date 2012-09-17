<ul class="top_menu">
<?php
  $nav = menu_navigation_links('menu-top-menu');
  foreach ($nav as $item) {
  	$href = $item['href'] == "<front>" ? base_path() : base_path() . drupal_get_path_alias($item['href']);
	if($href == request_uri())
        print '<li><a class="active" href="'. $href .'">'. $item['title'] .'</a></li>';
	else {
		print '<li><a href="'. $href .'">'. $item['title'] .'</a></li>';
	}
  }
?>
</ul>