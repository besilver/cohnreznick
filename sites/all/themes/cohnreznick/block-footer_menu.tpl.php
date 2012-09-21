<?php

function getMenuItemById($id) {
	
	$query_menu = db_query("SELECT mlid, plid, link_path, link_title FROM {menu_links} WHERE mlid=%d AND hidden=0 ", $id);
    return db_fetch_array($query_menu);
	
}

function getChildMenuItemByPid($id) {
	
	$query_menu = db_query("SELECT mlid, plid, link_path, link_title FROM {menu_links} WHERE plid=%d AND hidden=0 ORDER BY weight", $id);
	$menu_items = array();
    while ($record = db_fetch_array($query_menu)) {
       $menu_items[] = $record;	
	}
	return $menu_items;
	
}


function displayMenuList($id, $limit = 0) {
	
	 $this_item = getMenuItemById($id);
	 $child_items = getChildMenuItemByPid($id); 
	 $href = $this_item['link_path'] == "<front>" ? base_path() : base_path() . drupal_get_path_alias($this_item['link_path']);
	 echo '<h3><a href="'.$href.'">'.$this_item['link_title'].'</a></h3>';
	 $has_vnuks = 0; $count_vnuks = array();
	 for($i = 0; $i < count($child_items); $i++) {
	     $count_vnuks[$i] = db_result(db_query("SELECT COUNT(mlid) FROM {menu_links} WHERE plid=%d AND hidden=0 GROUP BY plid", $child_items[$i]['mlid']));
	 }
	 $has_vnuks = array_sum($count_vnuks) > 0 ? true : false;
	 
	 if($has_vnuks == false) {
	 	     $ost = $limit ? count($vnuk_items) % $limit : 0;
			 if($ost) {
					 $ost = count($child_items) % $limit;
					 if(count($child_items) > 0) {
					 	  echo '<table class="footer-table"><tr><td>';
					 	   echo '<ul class="left">';
						   for($i = 0; $i < $limit; $i++) {
						   	     $href = $child_items[$i]['link_path'] == "<front>" ? base_path() : base_path() . drupal_get_path_alias($child_items[$i]['link_path']);
								 echo '<li><a href="'. $href .'">'. $child_items[$i]['link_title'] .'</a></li>';
						   }
						   echo '</ul>';
						   echo '</td><td>';
						   echo '<ul class="right">';
						   for($i = $limit; $i < $limit + $ost; $i++) {
						   	     $href = $child_items[$i]['link_path'] == "<front>" ? base_path() : base_path() . drupal_get_path_alias($child_items[$i]['link_path']);
								 echo '<li><a href="'. $href .'">'. $child_items[$i]['link_title'] .'</a></li>';
						   }
						   echo '</ul>';
						   echo '</td></tr></table>';
					 }
			 }
			 else {
				 	  if(count($child_items) > 0) {
						 	   echo '<ul>';
							   for($i = 0; $i < count($child_items); $i++) {
							   	     $href = $child_items[$i]['link_path'] == "<front>" ? base_path() : base_path() . drupal_get_path_alias($child_items[$i]['link_path']);
									 echo '<li><a href="'. $href .'">'. $child_items[$i]['link_title'] .'</a></li>';
							   }
							   echo '</ul>';
			           }
			 }
			 
		}else {
					for($i = 0; $i < count($child_items); $i++) {
							   	     $href = $child_items[$i]['link_path'] == "<front>" ? base_path() : base_path() . drupal_get_path_alias($child_items[$i]['link_path']);
									 echo '<h4><a href="'. $href .'">'. $child_items[$i]['link_title'] .'</a></h4>';
									 $vnuk_items = getChildMenuItemByPid($child_items[$i]['mlid']);
									 $ost = $limit ? count($vnuk_items) % $limit : 0;
									 			 if($ost) {
														 
														 if(count($vnuk_items) > 0) {
														 	  echo '<table class="footer-table"><tr><td>';
														 	   echo '<ul class="left">';
															   for($j = 0; $j < $limit; $j++) {
															   	     $href = $vnuk_items[$j]['link_path'] == "<front>" ? base_path() : base_path() . drupal_get_path_alias($vnuk_items[$j]['link_path']);
																	 echo '<li><a href="'. $href .'">'. $vnuk_items[$j]['link_title'] .'</a></li>';
															   }
															   echo '</ul>';
															   echo '</td><td>';
															   echo '<ul class="right">';
															   for($j = $limit; $j < $limit + $ost; $j++) {
															   	     $href = $vnuk_items[$j]['link_path'] == "<front>" ? base_path() : base_path() . drupal_get_path_alias($vnuk_items[$j]['link_path']);
																	 echo '<li><a href="'. $href .'">'. $vnuk_items[$j]['link_title'] .'</a></li>';
															   }
															   echo '</ul>';
															   echo '</td></tr></table>';
														 }
												 }
												 else {
													 	  if(count($vnuk_items) > 0) {
															 	   echo '<ul>';
																   for($j = 0; $j < count($vnuk_items); $j++) {
																   	     $href = $vnuk_items[$j]['link_path'] == "<front>" ? base_path() : base_path() . drupal_get_path_alias($vnuk_items[$j]['link_path']);
																		 echo '<li><a href="'. $href .'">'. $vnuk_items[$j]['link_title'] .'</a></li>';
																   }
																   echo '</ul>';
												           }
												 }
					}
		}
}

?>


<div id="footer">
  <div class="inner">
    <div class="col">
       <?php displayMenuList(396) ?>
       <hr />
       <?php displayMenuList(3182) ?>
    </div>
    <div class="col">
       <?php displayMenuList(3180,4) ?>
    </div>
    <div class="col">
    	<?php displayMenuList(3179) ?>
    </div>
    <div class="col">
    	<?php displayMenuList(3193) ?>
       <hr />
       <?php displayMenuList(3207) ?>
    </div>
  </div>
</div>