<?php

function my_sliderimgtop_db_list_ob() {
	
	$result = db_query("SELECT * FROM {".MODULE_NAME_SIT."} mob");
	$ob = array();
    while ($record = db_fetch_object($result)) {
       $ob[] = $record;
    }
	
    return $ob;
	
}

function my_sliderimgtop_db_list_ob_items($ob) {
	
	$result = db_query("SELECT * FROM {".MODULE_NAME_SIT."_items} mob WHERE ob_id=%d ORDER BY weight", $ob);
	$ob = array();
    while ($record = db_fetch_object($result)) {
       $ob[] = $record;
    }
	
    return $ob;
	
}


function my_sliderimgtop_db_ob($ob) {
	
	$result = db_query("SELECT * FROM {".MODULE_NAME_SIT."} mob
	                    WHERE id=%d", $ob);
    $record = db_fetch_object($result);
    return $record;
	
}

function my_sliderimgtop_db_obi($obi) {
	
	$result = db_query("SELECT * FROM {".MODULE_NAME_SIT."_items} mobi WHERE id=%d", $obi);
    $record = db_fetch_object($result);
    return $record;
	
}

function my_sliderimgtop_db_count_obi($ob) {
	
	$result = db_query("SELECT count(*) FROM {".MODULE_NAME_SIT."_items} mobi WHERE ob_id=%d", $ob);
    $record = db_result($result);
    return $record;
	
}


function my_sliderimgtop_admin() {
	
	$ob = my_sliderimgtop_db_list_ob();
	
	$content = '';
	$cnt = count($ob);
	
	$content .= '<div style="float: left; margin: 20px;" ><p>'.DESCRIPTION_SIT.'</p><br/><br/><span>Appereance of this block:</span></div>';
	$content .= '<div style="float: left" ><img width="300px;" src="/sites/all/themes/cohnreznick/images/img_'.MODULE_NAME_SIT.'.png" /></div>';
	$content .= '<div style="clear: both"></div>';
	
	$content .= '<div class="'.STYLE.'-add"><a href="'.url('admin/build/'.MODULE_NAME_SIT.'/add').'">Add new '.BLOCK_NAME_SIT.'</a></div>';
	if($cnt) {
		$content .= '<h2>Existing blocks</h2>';
		$content .= '<table>';
		$content .= '<tr><th>Title</th><th>Path</th><th>Amount</th><th>Operations</th></tr>';
		for($i = 0; $i < $cnt; $i++) {
			if($ob[$i]->enabled) 
			   $content .= '<tr>';
			else {
			   $content .= '<tr class="'.STYLE_SIT.'-disabled">';
			}
			$content .= '<td>'.$ob[$i]->title.'</td>';
			$content .= '<td>'.htmlspecialchars($ob[$i]->display).'</td>';
			$content .= '<td>'.my_sliderimgtop_db_count_obi($ob[$i]->id).'</td>';
			$content .= '<td><ul class="'.STYLE_SIT.'-op"><li><a href="'.url('admin/build/'.MODULE_NAME_SIT.'/edit/'.$ob[$i]->id).'">Edit</a></li><li><a href="'.url('admin/build/'.MODULE_NAME_SIT.'/items/'.$ob[$i]->id.'/add').'">Add item</a></li>';
			$content .= '<li><a href="'.url('admin/build/'.MODULE_NAME_SIT.'/items/'.$ob[$i]->id).'">Items</a></li>';
			$title_enabled = $ob[$i]->enabled ? 'Disable' : 'Enable';
			$content .= '<li><a href="'.url('admin/build/'.MODULE_NAME_SIT.'/enable/'.$ob[$i]->id).'">'.$title_enabled.'</a></li>';
			$content .= '<li><a href="'.url('admin/build/'.MODULE_NAME_SIT.'/delete/'.$ob[$i]->id).'">Delete</a></li></ul></td>';
		    $content .= '</tr>';
		}
		$content .= '</table>';
	}
	else {
		$content .= '<p>No available '.BLOCK_NAME.'</p>';
	}
	
    return $content;
	
}

function my_sliderimgtop_add_ob($ob) {
	
	$form['title'] = array(
        '#type' => 'textfield',
        '#title' => t('Title'),
        '#description' => t('The title of the block (will not be displayed)'),
        '#default_value' => '',
        '#required' => TRUE,
      );
	  
	$form['display'] = array(
        '#type' => 'textfield',
        '#title' => t('Path'),
        '#description' => t('Path to the page on which the unit will be displayed. &lt;front&gt; is a path to the frontpage'),
        '#default_value' => '',
        '#required' => TRUE,
      );
	
	$form['enabled'] = array(
        '#type' => 'checkbox',
        '#title' => 'Enabled',
        '#default_value' => 1,
      );
	  
	$form['submit'] = array(
      '#type' => 'submit',
      '#value' => t('Save'),
    );
	
	return $form;
}

function my_sliderimgtop_add_ob_submit($form, &$form_state) {

    $form_values = $form_state['values'];
	
	$data = array(
       'title' => $form_values['title'],
       'display' => $form_values['display'],
       'enabled' => $form_values['enabled'],
    );
    drupal_write_record(MODULE_NAME_SIT, $data);
	$form_state['redirect'] = url('admin/build/'.MODULE_NAME_SIT.'');
	
}

function my_sliderimgtop_ob_edit($form_state, $ob) {
	
	$obj = my_sliderimgtop_db_ob($ob);
	
	$form['title'] = array(
        '#type' => 'textfield',
        '#title' => t('Title'),
        '#description' => t('The title of the block (will not be displayed)'),
        '#default_value' => $obj->title,
        '#required' => TRUE,
      );
	  
	$form['display'] = array(
        '#type' => 'textfield',
        '#title' => t('Path'),
        '#description' => t('Path to the page on which the unit will be displayed. &lt;front&gt; is a path to the frontpage'),
        '#default_value' => $obj->display,
        '#required' => TRUE,
      );
	
	$form['enabled'] = array(
        '#type' => 'checkbox',
        '#title' => 'Enabled',
        '#default_value' => $obj->enabled,
      );
	  
	$form['id'] = array(
        '#type' => 'hidden',
        '#value' => $ob,
    );
	  
	$form['submit'] = array(
      '#type' => 'submit',
      '#value' => t('Save'),
    );
	
	return $form;
}

function my_sliderimgtop_ob_edit_submit($form, &$form_state) {
		
	$form_values = $form_state['values'];
	db_query("UPDATE {".MODULE_NAME_SIT."} SET title='%s', display='%s', enabled=%d WHERE id=%d", $form_values['title'], $form_values['display'], $form_values['enabled'], $form_values['id']);
	drupal_goto('admin/build/'.MODULE_NAME_SIT.'');
	
}


function my_sliderimgtop_ob_items($ob) {
    	
	$ob_object = my_sliderimgtop_db_ob($ob);
    $ob_items = my_sliderimgtop_db_list_ob_items($ob);
	$content = '';
	$cnt = count($ob_items);
	$content .= '<div class="'.STYLE_SIT.'-add"><a href="'.url('admin/build/'.MODULE_NAME_SIT.'/items/'.$ob.'/add').'">Add new item of this '.BLOCK_NAME_SIT.'</a></div>';
    $content .= '<div class="'.STYLE_SIT.'-add"><a href="'.url('admin/build/'.MODULE_NAME_SIT.'').'">Go to main page of the module</a></div>';
	if($cnt) {
		$content .= '<h2>Items of "'.$ob_object->title.'"</h2>';
		$content .= '<table>';
		$content .= '<tr><th>Title</th><th>Weight</th><th>Operations</th></tr>';
		for($i = 0; $i < $cnt; $i++) {
			if($ob_items[$i]->enabled) 
			   $content .= '<tr>';
			else {
			   $content .= '<tr class="'.STYLE_SIT.'-disabled">';
			}
			$content .= '<td>'.$ob_items[$i]->title.'</td>';
			$content .= '<td>'.$ob_items[$i]->weight.'</td>';
			$content .= '<td><ul class="'.STYLE.'-op"><li><a href="'.url('admin/build/'.MODULE_NAME_SIT.'/items/'.$ob.'/edit/'.$ob_items[$i]->id).'">Edit</a></li>';
			$title_enabled = $ob_items[$i]->enabled ? 'Disable' : 'Enable';
			$content .= '<li><a href="'.url('admin/build/'.MODULE_NAME_SIT.'/items/'.$ob.'/enable/'.$ob_items[$i]->id).'">'.$title_enabled.'</a></li>';
			$content .= '<li><a href="'.url('admin/build/'.MODULE_NAME_SIT.'/items/'.$ob.'/delete/'.$ob_items[$i]->id).'">Delete</a></li></ul></td>';
		    $content .= '</tr>';
		}
		$content .= '</table>';

	}
	else {
		$content .= '<p>No available items for "'.$ob_object->title.'"</p>';
	}
	return $content;
	
}


function my_sliderimgtop_ob_items_add($form_state, $ob) {
	
	$form['#attributes'] = array('enctype' => 'multipart/form-data');
	
	$form['title'] = array(
        '#type' => 'textfield',
        '#title' => t('Title'),
        '#default_value' => '',
        '#required' => TRUE,
      );
	  
	$form['image_upload'] = array(
      '#type' => 'file',
      '#title' => t('Attach an image'),
      '#default_value' => '',
      '#required' => FALSE,
    );
	  
	$form['body'] = array(
        '#type' => 'textarea',
        '#title' => t('Body'),
        '#cols' => 5,
        '#rows' => 5,
        '#default_value' => '',
        '#required' => TRUE,
      );
      
    $form['link_url'] = array(
        '#type' => 'textfield',
        '#title' => t('URL link'),
        '#default_value' => '',
        '#required' => FALSE,
      );
	  
	$form['weight'] = array(
        '#type' => 'weight',
        '#title' => t('Weight'),
        '#default_value' => 0,
        '#required' => FALSE,
      );
	
	$form['enabled'] = array(
        '#type' => 'checkbox',
        '#title' => 'Enabled',
        '#default_value' => 1,
      );
	  
	$form['ob_id'] = array(
        '#type' => 'hidden',
        '#value' => $ob,
    );
	  
	$form['submit'] = array(
      '#type' => 'submit',
      '#value' => t('Save'),
    );
	
	return $form;
}

function my_sliderimgtop_ob_items_add_validate($form, &$form_state) {
	 if (isset($form['image_upload'])) {
		    $validators = array('file_validate_extensions' => array('png','jpg','gif','jpeg'));
		 
		    $dir = file_directory_path() . '/images';
		 
		    if(file_check_directory($dir, 1)) {
		
		      $file = file_save_upload('image_upload', $validators, $dir);
		
		      if ($file) $form_state['values']['image_file'] = $file;
		    }
     }
}

function my_sliderimgtop_ob_items_add_submit($form, &$form_state) {
		
	$form_values = $form_state['values'];
	
	$data = array(
       'title' => $form_values['title'],
       'image' => $form_values['image_file']->filepath,
       'body' => $form_values['body'],
       'link_url' => $form_values['link_url'],
       'weight' => $form_values['weight'],
       'enabled' => $form_values['enabled'],
       'ob_id' => $form_values['ob_id'],
    );
    drupal_write_record('my_sliderimgtop_items', $data);
	$form_state['redirect'] = url('admin/build/'.MODULE_NAME_SIT.'/items/'.$form_values['ob_id']);
	
}

function my_sliderimgtop_ob_items_edit($form_state, $ob, $obi) {
	
	$obj = my_sliderimgtop_db_obi($obi);
	
	$form['#attributes'] = array('enctype' => 'multipart/form-data');
		
	$form['title'] = array(
        '#type' => 'textfield',
        '#title' => t('Title'),
        '#default_value' => $obj->title,
        '#required' => TRUE,
      );
	  
	if($obj->image) {
		$form['image'] = array(
         '#type' => 'item',
         '#title' => 'Current image',
         '#value' => '<img src="/'.$obj->image.'" width="200px" />',
         '#required' => FALSE,
       );
	} 
	  
	 $form['image_upload'] = array(
         '#type' => 'file',
         '#title' => t('Attach an another image (will be removed the old image)'),
         '#default_value' => '',
         '#required' => FALSE,
       );	  
	  
	$form['body'] = array(
        '#type' => 'textarea',
        '#title' => t('Body'),
        '#cols' => 5,
        '#rows' => 5,
        '#default_value' => $obj->body,
        '#required' => TRUE,
      );     
      
    $form['link_url'] = array(
        '#type' => 'textfield',
        '#title' => t('URL link'),
        '#default_value' => $obj->link_url,
        '#required' => FALSE,
      );
	  
	$form['weight'] = array(
        '#type' => 'weight',
        '#title' => t('Weight'),
        '#default_value' => $obj->weight,
        '#required' => FALSE,
      );
	
	$form['enabled'] = array(
        '#type' => 'checkbox',
        '#title' => 'Enabled',
        '#default_value' => $obj->enabled,
      );
	  
	$form['id'] = array(
        '#type' => 'hidden',
        '#value' => $obi,
    );
	  
	$form['ob_id'] = array(
        '#type' => 'hidden',
        '#value' => $ob,
    );
	
	$form['image_path'] = array(
        '#type' => 'hidden',
        '#value' => $obj->image,
    );
	  
	$form['submit'] = array(
      '#type' => 'submit',
      '#value' => t('Save'),
    );
	
	return $form;
}

function my_sliderimgtop_ob_items_edit_validate($form, &$form_state) {
	 if (isset($form['image_upload'])) {
		    $validators = array('file_validate_extensions' => array('png','jpg','gif','jpeg'));
		 
		    $dir = file_directory_path() . '/images';
		 
		    if(file_check_directory($dir, 1)) {
		
		      $file = file_save_upload('image_upload', $validators, $dir);
		
		      if ($file) $form_state['values']['image_file'] = $file;
		    }
     }
}

function my_sliderimgtop_ob_items_edit_submit($form, &$form_state) {
		
	$form_values = $form_state['values'];
	
	if($form_values['image_file']) $need_image = $form_values['image_file']->filepath; else $need_image = $form_values['image_path'];
	
	foreach($form_values as $index => &$value) {
		if(empty($value) ) {
			$value = NULL;
		}
	}

	db_query("UPDATE {".MODULE_NAME_SIT."_items} SET title='%s', image='%s', body='%s',  link_url='%s', weight=%d, enabled=%d WHERE id=%d", $form_values['title'], $need_image, $form_values['body'],  $form_values['link_url'], $form_values['weight'], $form_values['enabled'], $form_values['id']);
	
	$form_state['redirect'] = url('admin/build/'.MODULE_NAME_SIT.'/items/'.$form_values['ob_id']);
	
}


