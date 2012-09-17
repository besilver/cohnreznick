<?php

function getNodeFieldValue($node, $field_name) {

	 if (count($node->{$field_name}) == 1)
	    return $node->{$field_name}[0]['value'];
	 elseif(count($node->{$field_name}) > 1) {
	 	$res = array();
	 	for($i = 0; $i < count($node->{$field_name}); $i++)
		  $res[$i] = $node->{$field_name}[$i]['value'];
		return $res;
	 }
	 elseif(count($node->{$field_name}) == 0) {
	 	return NULL;
	 }
     
}

function getNodeImage($node, $field_name, $attributes = '') {

	 $str_attrib = '';
	 foreach($attributes as $name=>$value) {
	 	$str_attrib .= ' '.$name.' = "'.$value.'" ';
	 }
	
	 return '<img src="/'.$node->{$field_name}[0]['filepath'].'" '.$str_attrib.' alt="'.$node->{$field_name}[0]['data']['alt'].'" />';
     
}

function getFilePath($node, $field_name) {
	
	 return $node->{$field_name}[0]['filepath'];
     
}

function getMenuItems($menu_name) {
	
	$query_menu = db_query("SELECT mlid, plid, link_path, link_title FROM {menu_links} WHERE menu_name='%s' AND hidden=%d ORDER BY weight", $menu_name, 0);
	$menu_items = array();
    while ($record = db_fetch_array($query_menu)) {
       $menu_items[] = $record;	
	}
	return $menu_items;
		   
}

function getChildMenuItems($menu_items, $pid) {
	
	$child_items = array();
	foreach($menu_items as $item) {
		if($item['plid'] == $pid)
		    $child_items[] = $item;
	}
	return  $child_items;
	
}

function getActiveMenuItem() {
	
	$current_url = request_uri();
	$active_item = db_fetch_array(db_query("SELECT mlid,plid,link_title,link_path FROM {menu_links} WHERE link_path='%s'", $current_url));
	return $active_item;
	
}

function getParentTemplate($id, $parent_categories) {
	
	$query_parent = db_query("SELECT parent FROM {term_hierarchy} WHERE tid=%d", $id);
	$parent = db_result($query_parent);
	$parent_template = getRealTemplate($parent, $parent_categories);
	if ($parent == 1) return NULL;
	else
	   return $parent_template ? $parent_template : getParentTemplate($parent, $parent_categories);
	
}

function getRealTemplate($id, $parent_categories) {
	
	$template = 'page-taxonomy-term-'.$id;
	foreach($parent_categories as $index => $value) {
       	if($index == $template) {
       	   	  $real_template = $value;
			  break;
       	}
  	}
	return $real_template ? $real_template : NULL;
	
}


function my_menu_tree_output($tree, $li_first = '', $li_last = '', $wrap_sub_start = '<ul>',  $wrap_sub_end = '</ul>', $li_child = NULL, $a_parent = NULL, $li_other = NULL) {
  $output = '';
  $items = array();
  static $level;
  // Pull out just the menu items we are going to render so that we
  // get an accurate count for the first/last classes.
  foreach ($tree as $data) {
    if (!$data['link']['hidden']) {
      $items[] = $data;
    }
  }

  $num_items = count($items);
  foreach ($items as $i => $data) {
    $extra_class = NULL;
    if ($i == 0) {
      $extra_class = $li_first;
    }
    if ($i == $num_items - 1) {
      $extra_class = $li_last;
    }
    $link = theme('menu_item_link', $data['link']);
    if ($data['below']) {
        $output .= my_menu_item($link, $data['link']['has_children'], my_menu_tree_output($data['below']), $data['link']['in_active_trail'], $extra_class, TRUE, $wrap_sub_start, $wrap_sub_end, $li_child = NULL, $a_parent = NULL, $li_other = NULL); 
    }
    else {
        $output .= my_menu_item($link, $data['link']['has_children'], '', $data['link']['in_active_trail'], $extra_class, FALSE);
    }
  }
  return $output;
}

function my_menu_item($link, $has_children, $menu = '', $in_active_trail = FALSE, $extra_class = NULL, $is_parent = FALSE, $wrap_sub_start = NULL, $wrap_sub_end = NULL, $li_child = NULL, $a_parent = NULL, $li_other = NULL) {


  if ($in_active_trail) {
     $class .= ' active-trail';
  }
  
  if (!empty($extra_class)) {
     $class .= ' ' . $extra_class;
  }
  if ($in_active_trail) {
     $class .= ' active-trail';
  }
  
  if($class) $class = 'class="' . $class . '"';

  if($is_parent)
     return '<li>' . $link .  $wrap_sub_start.$menu.$wrap_sub_end. "</li>\n";
  else
	 return '<li>' . $link . "</li>\n";
}

