<?php

function my_pretext_db_list_ob() {
	
	$result = db_query("SELECT * FROM {".MODULE_NAME_PRETEXT."} mob");
	$ob = array();
    while ($record = db_fetch_object($result)) {
       $ob[] = $record;
    }
	
    return $ob;
	
}

function my_pretext_db_ob($ob) {
	
	$result = db_query("SELECT * FROM {".MODULE_NAME_PRETEXT."} mob
	                    WHERE id=%d", $ob);
    $record = db_fetch_object($result);
    return $record;
	
}

function my_pretext_admin() {
	
	$ob = my_pretext_db_list_ob();
	
	$content = '';
	$cnt = count($ob);
	$content .= '<div class="'.STYLE.'-add"><a href="'.url('admin/build/'.MODULE_NAME_PRETEXT.'/add').'">Add new '.BLOCK_NAME_PRETEXT.'</a></div>';
	if($cnt) {
		$content .= '<h2>Existing blocks</h2>';
		$content .= '<table>';
		$content .= '<tr><th>Title</th><th>Path</th><th>Operations</th></tr>';
		for($i = 0; $i < $cnt; $i++) {
			if($ob[$i]->enabled) 
			   $content .= '<tr>';
			else {
			   $content .= '<tr class="'.STYLE.'-disabled">';
			}
			$content .= '<td>'.$ob[$i]->title.'</td>';
			$content .= '<td>'.htmlspecialchars($ob[$i]->display).'</td>';
			$content .= '<td><ul class="'.STYLE.'-op"><li><a href="'.url('admin/build/'.MODULE_NAME_PRETEXT.'/edit/'.$ob[$i]->id).'">Edit</a></li>';
			$title_enabled = $ob[$i]->enabled ? 'Disable' : 'Enable';
			$content .= '<li><a href="'.url('admin/build/'.MODULE_NAME_PRETEXT.'/enable/'.$ob[$i]->id).'">'.$title_enabled.'</a></li>';
			$content .= '<li><a href="'.url('admin/build/'.MODULE_NAME_PRETEXT.'/delete/'.$ob[$i]->id).'">Delete</a></li></ul></td>';
		    $content .= '</tr>';
		}
		$content .= '</table>';
	}
	else {
		$content .= '<p>No available '.BLOCK_NAME_PRETEXT.'</p>';
	}
	
    return $content;
	
}

function my_pretext_add_ob($ob) {
	
	$form['display'] = array(
        '#type' => 'textfield',
        '#title' => t('Path'),
        '#description' => t('Path to the page on which the unit will be displayed. &lt;front&gt; is a path to the frontpage'),
        '#default_value' => '',
        '#required' => TRUE,
      );
	
	$form['title'] = array(
        '#type' => 'textfield',
        '#title' => t('Title'),
        '#description' => t('The title of the block (will not be displayed)'),
        '#default_value' => '',
        '#required' => TRUE,
      );
	
	$form['body'] = array(
        '#type' => 'textarea',
        '#title' => t('Body'),
        '#cols' => 5,
        '#rows' => 3,
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

function my_pretext_add_ob_submit($form, &$form_state) {

    $form_values = $form_state['values'];
	
	$data = array(
       'title' => $form_values['title'],
       'display' => $form_values['display'],
       'body' => $form_values['body'],
       'enabled' => $form_values['enabled'],
    );
    drupal_write_record(MODULE_NAME_PRETEXT, $data);
	$form_state['redirect'] = url('admin/build/'.MODULE_NAME_PRETEXT.'');
	
}

function my_pretext_ob_edit($form_state, $ob) {
	
	$obj = my_pretext_db_ob($ob);
	
	$form['display'] = array(
        '#type' => 'textfield',
        '#title' => t('Path'),
        '#description' => t('Path to the page on which the unit will be displayed. &lt;front&gt; is a path to the frontpage'),
        '#default_value' => $obj->display,
        '#required' => TRUE,
      );
	
	$form['title'] = array(
        '#type' => 'textfield',
        '#title' => t('Title'),
        '#description' => t('The title of the block (will not be displayed)'),
        '#default_value' => $obj->title,
        '#required' => TRUE,
      );
	  
	$form['body'] = array(
        '#type' => 'textarea',
        '#title' => t('Body'),
        '#cols' => 5,
        '#rows' => 3,
        '#default_value' => $obj->body,
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

function my_pretext_ob_edit_submit($form, &$form_state) {
		
	$form_values = $form_state['values'];
	db_query("UPDATE {".MODULE_NAME_PRETEXT."} SET title='%s', display='%s', body='%s', enabled=%d WHERE id=%d", $form_values['title'], $form_values['display'], $form_values['body'], $form_values['enabled'], $form_values['id']);
	drupal_goto('admin/build/'.MODULE_NAME_PRETEXT.'');
	
}
