<?php

function my_jcarousel_db_list_ob() {
	
	$result = db_query("SELECT * FROM {".MODULE_NAME."} mob");
	$ob = array();
    while ($record = db_fetch_object($result)) {
       $ob[] = $record;
    }
	
    return $ob;
	
}

function my_jcarousel_db_list_ob_items($ob) {
	
	$result = db_query("SELECT * FROM {".MODULE_NAME."_items} mob WHERE ob_id=%d ORDER BY weight", $ob);
	$ob = array();
    while ($record = db_fetch_object($result)) {
       $ob[] = $record;
    }
	
    return $ob;
	
}


function my_jcarousel_db_ob($ob) {
	
	$result = db_query("SELECT * FROM {".MODULE_NAME."} mob
	                    WHERE id=%d", $ob);
    $record = db_fetch_object($result);
    return $record;
	
}

function my_jcarousel_db_obi($obi) {
	
	$result = db_query("SELECT * FROM {".MODULE_NAME."_items} mobi WHERE id=%d", $obi);
    $record = db_fetch_object($result);
    return $record;
	
}

function my_jcarousel_db_count_obi($ob) {
	
	$result = db_query("SELECT count(*) FROM {".MODULE_NAME."_items} mobi WHERE ob_id=%d", $ob);
    $record = db_result($result);
    return $record;
	
}


function my_jcarousel_admin() {
	
	$ob = my_jcarousel_db_list_ob();
	
	$content = '';
	$cnt = count($ob);
	$content .= '<div style="float: left; margin: 20px;" ><p>'.DESCRIPTION.'</p><br/><br/><span>Appereance of this block:</span></div>';
	$content .= '<div style="float: left" ><img src="/sites/all/themes/cohnreznick/images/img_'.MODULE_NAME.'.png" /></div>';
	$content .= '<div style="clear: both"></div>';
	
	$content .= '<div class="'.STYLE.'-add"><a href="'.url('admin/build/'.MODULE_NAME.'/add').'">Add new '.BLOCK_NAME.'</a></div>';
	if($cnt) {
		$content .= '<h2>Existing blocks</h2>';
		$content .= '<table>';
		$content .= '<tr><th>Title</th><th>Path</th><th>Amount</th><th>Operations</th></tr>';
		for($i = 0; $i < $cnt; $i++) {
			if($ob[$i]->enabled) 
			   $content .= '<tr>';
			else {
			   $content .= '<tr class="'.STYLE.'-disabled">';
			}
			$content .= '<td>'.$ob[$i]->title.'</td>';
			$content .= '<td>'.htmlspecialchars($ob[$i]->display).'</td>';
			$content .= '<td>'.my_jcarousel_db_count_obi($ob[$i]->id).'</td>';
			$content .= '<td><ul class="'.STYLE.'-op"><li><a href="'.url('admin/build/'.MODULE_NAME.'/edit/'.$ob[$i]->id).'">Edit</a></li><li><a href="'.url('admin/build/'.MODULE_NAME.'/items/'.$ob[$i]->id.'/add').'">Add item</a></li>';
			$content .= '<li><a href="'.url('admin/build/'.MODULE_NAME.'/items/'.$ob[$i]->id).'">Items</a></li>';
			$title_enabled = $ob[$i]->enabled ? 'Disable' : 'Enable';
			$content .= '<li><a href="'.url('admin/build/'.MODULE_NAME.'/enable/'.$ob[$i]->id).'">'.$title_enabled.'</a></li>';
			$content .= '<li><a href="'.url('admin/build/'.MODULE_NAME.'/delete/'.$ob[$i]->id).'">Delete</a></li></ul></td>';
		    $content .= '</tr>';
		}
		$content .= '</table>';
	}
	else {
		$content .= '<p>No available '.BLOCK_NAME.'</p>';
	}
	
    return $content;
	
}

function my_jcarousel_add_ob($ob) {
	
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

function my_jcarousel_add_ob_submit($form, &$form_state) {

    $form_values = $form_state['values'];
	
	$data = array(
       'title' => $form_values['title'],
       'display' => $form_values['display'],
       'enabled' => $form_values['enabled'],
    );
    drupal_write_record(MODULE_NAME, $data);
	$form_state['redirect'] = url('admin/build/'.MODULE_NAME.'');
	
}

function my_jcarousel_ob_edit($form_state, $ob) {
	
	$obj = my_jcarousel_db_ob($ob);
	
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

function my_jcarousel_ob_edit_submit($form, &$form_state) {
		
	$form_values = $form_state['values'];
	db_query("UPDATE {".MODULE_NAME."} SET title='%s', display='%s', enabled=%d WHERE id=%d", $form_values['title'], $form_values['display'], $form_values['enabled'], $form_values['id']);
	drupal_goto('admin/build/'.MODULE_NAME.'');
	
}


function my_jcarousel_ob_items($ob) {
    	
	$ob_object = my_jcarousel_db_ob($ob);
    $ob_items = my_jcarousel_db_list_ob_items($ob);
	$content = '';
	$cnt = count($ob_items);
	$content .= '<div class="'.STYLE.'-add"><table><tr><a href="'.url('admin/build/'.MODULE_NAME.'/items/'.$ob.'/add').'">Add new item of this '.BLOCK_NAME.'</a></div>';
    $content .= '<div class="'.STYLE.'-add"><a href="'.url('admin/build/'.MODULE_NAME.'').'">Go to main page of the module</a></div>';
	if($cnt) {
		$content .= '<h2>Items of "'.$ob_object->title.'"</h2>';
		$content .= '<table>';
		$content .= '<tr><th>Title</th><th>Weight</th><th>Operations</th></tr>';
		for($i = 0; $i < $cnt; $i++) {
			if($ob_items[$i]->enabled) 
			   $content .= '<tr>';
			else {
			   $content .= '<tr class="'.STYLE.'-disabled">';
			}
			$content .= '<td>'.$ob_items[$i]->title.'</td>';
			$content .= '<td>'.$ob_items[$i]->weight.'</td>';
			$content .= '<td><ul class="'.STYLE.'-op"><li><a href="'.url('admin/build/'.MODULE_NAME.'/items/'.$ob.'/edit/'.$ob_items[$i]->id).'">Edit</a></li>';
			$title_enabled = $ob_items[$i]->enabled ? 'Disable' : 'Enable';
			$content .= '<li><a href="'.url('admin/build/'.MODULE_NAME.'/items/'.$ob.'/enable/'.$ob_items[$i]->id).'">'.$title_enabled.'</a></li>';
			$content .= '<li><a href="'.url('admin/build/'.MODULE_NAME.'/items/'.$ob.'/delete/'.$ob_items[$i]->id).'">Delete</a></li></ul></td>';
		    $content .= '</tr>';
		}
		$content .= '</table>';

	}
	else {
		$content .= '<p>No available items for "'.$ob_object->title.'"</p>';
	}
	return $content;
	
}


function my_jcarousel_ob_items_add($form_state, $ob) {
	
	$form['title'] = array(
        '#type' => 'textfield',
        '#title' => t('Title'),
        '#default_value' => '',
        '#required' => TRUE,
      );
	  
	$form['body'] = array(
        '#type' => 'textarea',
        '#title' => t('Body'),
        '#cols' => 5,
        '#rows' => 5,
        '#default_value' => '',
        '#required' => TRUE,
      );
      
   	$form['link_title'] = array(
        '#type' => 'textfield',
        '#title' => t('Title link'),
        '#default_value' => '',
        '#required' => FALSE,
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


function my_jcarousel_ob_items_add_submit($form, &$form_state) {
		
	$form_values = $form_state['values'];
	
	$data = array(
       'title' => $form_values['title'],
       'body' => $form_values['body'],
       'link_title' => $form_values['link_title'],
       'link_url' => $form_values['link_url'],
       'weight' => $form_values['weight'],
       'enabled' => $form_values['enabled'],
       'ob_id' => $form_values['ob_id'],
    );
    drupal_write_record('my_jcarousel_items', $data);
	$form_state['redirect'] = url('admin/build/'.MODULE_NAME.'/items/'.$form_values['ob_id']);
	
}

function my_jcarousel_ob_items_edit($form_state, $ob, $obi) {
	
	$obj = my_jcarousel_db_obi($obi);
		
	$form['title'] = array(
        '#type' => 'textfield',
        '#title' => t('Title'),
        '#default_value' => $obj->title,
        '#required' => TRUE,
      );
	  
	$form['body'] = array(
        '#type' => 'textarea',
        '#title' => t('Body'),
        '#cols' => 5,
        '#rows' => 5,
        '#default_value' => $obj->body,
        '#required' => TRUE,
      );
      
   	$form['link_title'] = array(
        '#type' => 'textfield',
        '#title' => t('Title link'),
        '#default_value' => $obj->link_title,
        '#required' => FALSE,
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
	  
	$form['submit'] = array(
      '#type' => 'submit',
      '#value' => t('Save'),
    );
	
	return $form;
}

function my_jcarousel_ob_items_edit_submit($form, &$form_state) {
		
	$form_values = $form_state['values'];
	
	foreach($form_values as $index => &$value) {
		if(empty($value) ) {
			$value = NULL;
		}
	}

	db_query("UPDATE {".MODULE_NAME."_items} SET title='%s', body='%s', link_title='%s', link_url='%s', weight=%d, enabled=%d WHERE id=%d", $form_values['title'], $form_values['body'], $form_values['link_title'], $form_values['link_url'], $form_values['weight'], $form_values['enabled'], $form_values['id']);
	
	$form_state['redirect'] = url('admin/build/'.MODULE_NAME.'/items/'.$form_values['ob_id']);
	
}


