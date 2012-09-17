<?php

function my_workus_admin() {

   $content = '<div style="float: left; margin: 20px 10px;" ><p>'.DESCRIPTION_WU.'</p><span>Appereance of this block:</span><br /><br />
                      <span class="'.STYLE_WU.'-add"><a href="'.url('admin/build/'.MODULE_NAME_WU.'/add').'">Add/edit main information</a></span>
                      </div>';
	$content .= '<div style="float: left" ><img width="300px;" src="/sites/all/themes/cohnreznick/images/img_'.MODULE_NAME_WU.'.png" /></div>';
	$content .= '<div style="clear: both"></div>';
	$content .= '<table><tr><td><h2>Jquery carousel items</h2></td><td><span class="'.STYLE_WU.'-add"><a href="'.url('admin/build/'.MODULE_NAME_WU.'/additem').'">Add new Jquery carousel item</a></span></td></tr></table>';
	
	$jcitems = my_workus_db_jcitems();
	$cnt = count($jcitems);
	
	if($cnt > 0) {
		$content .= '<table>';
		$content .= '<tr><th>Title</th><th>Weight</th><th>Operations</th></tr>';
		for($i = 0; $i < $cnt; $i++) {
			if($jcitems[$i]->enabled) 
			   $content .= '<tr>';
			else {
			   $content .= '<tr class="'.STYLE_WU.'-disabled">';
			}
			$content .= '<td>'.$jcitems[$i]->title.'</td>';
			$content .= '<td>'.$jcitems[$i]->weight.'</td>';
			$content .= '<td><ul class="'.STYLE_WU.'-op"><li><a href="'.url('admin/build/'.MODULE_NAME_WU.'/edit/'.$jcitems[$i]->id).'">Edit</a></li>';
			$title_enabled = $jcitems[$i]->enabled ? 'Disable' : 'Enable';
			$content .= '<li><a href="'.url('admin/build/'.MODULE_NAME_WU.'/enable/'.$jcitems[$i]->id).'">'.$title_enabled.'</a></li>';
			$content .= '<li><a href="'.url('admin/build/'.MODULE_NAME_WU.'/delete/'.$jcitems[$i]->id).'">Delete</a></li></ul></td>';
		    $content .= '</tr>';
		}
		$content .= '</table>';
	}
	else {
		$content .= '<p>No available items</p>';
	}
	
    return $content;
	
}

function my_workus_db_jcitems() {
	
	$result = db_query("SELECT * FROM {my_workus_items} mob ORDER BY weight");
	$ob = array();
    while ($record = db_fetch_object($result)) {
       $ob[] = $record;
    }
	
    return $ob;
	
}

function my_workus_additem_form($form_state) {
	
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
function my_workus_additem_form_submit($form, &$form_state) {
		
	$form_values = $form_state['values'];
	
	$data = array(
       'title' => $form_values['title'],
       'body' => $form_values['body'],
       'link_title' => $form_values['link_title'],
       'link_url' => $form_values['link_url'],
       'weight' => $form_values['weight'],
       'enabled' => $form_values['enabled'],
    );
    drupal_write_record('my_workus_items', $data);
	$form_state['redirect'] = url('admin/build/'.MODULE_NAME_WU);
	
}

function my_workus_edititem_form($form_state, $ob) {
		
	$form['title'] = array(
        '#type' => 'textfield',
        '#title' => t('Title'),
        '#default_value' => my_workus_item_get_field('title', $ob),
        '#required' => TRUE,
      );
	  
	$form['body'] = array(
        '#type' => 'textarea',
        '#title' => t('Body'),
        '#cols' => 5,
        '#rows' => 5,
        '#default_value' => my_workus_item_get_field('body', $ob),
        '#required' => TRUE,
      );
      
   	$form['link_title'] = array(
        '#type' => 'textfield',
        '#title' => t('Title link'),
        '#default_value' => my_workus_item_get_field('link_title', $ob),
        '#required' => FALSE,
      );
      
    $form['link_url'] = array(
        '#type' => 'textfield',
        '#title' => t('URL link'),
        '#default_value' => my_workus_item_get_field('link_url', $ob),
        '#required' => FALSE,
      );
	  
	$form['weight'] = array(
        '#type' => 'weight',
        '#title' => t('Weight'),
        '#default_value' => my_workus_item_get_field('weight', $ob),
        '#required' => FALSE,
      );
	
	$form['enabled'] = array(
        '#type' => 'checkbox',
        '#title' => 'Enabled',
        '#default_value' => my_workus_item_get_field('enabled', $ob),
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

function my_workus_item_get_field($field_name,$id) {
	
	$result = db_query("SELECT {$field_name} FROM {my_workus_items} WHERE id=%d", $id);
    $record = db_result($result);
    return $record;

}

function my_workus_edititem_form_submit($form, &$form_state) {
	  		
	$form_values = $form_state['values'];
	
	foreach($form_values as $index => &$value) {
		if(empty($value) ) {
			$value = NULL;
		}
	}

	db_query("UPDATE {".MODULE_NAME_WU."_items} SET title='%s', body='%s', link_title='%s', link_url='%s', weight=%d, enabled=%d WHERE id=%d", $form_values['title'], $form_values['body'], $form_values['link_title'], $form_values['link_url'], $form_values['weight'], $form_values['enabled'], $form_values['ob_id']);
	
	$form_state['redirect'] = url('admin/build/'.MODULE_NAME_WU);
}

function my_workus_add_form() {
	
	$form['#attributes'] = array('enctype' => 'multipart/form-data');
	
	$form['title'] = array(
        '#type' => 'textfield',
        '#title' => t('Title'),
        '#description' => t('The title of the block (will not be displayed)'),
        '#default_value' => my_workus_get_field('title'),
        '#required' => TRUE,
      );
	  
	 if(my_workus_get_field('video_link')) {
	 	
		  $link_type = db_result(db_query("SELECT link_type FROM {my_workus} mwu"));
		  $video_link = db_result(db_query("SELECT video_link FROM {my_workus} mwu"));
		  
		  if($video_link) {
		  	$form['video_url_current'] = array(
			         '#type' => 'hidden',
			         '#title' => '',
			         '#value' => my_workus_get_field('video_link'),
			         '#required' => FALSE,
			    );
			    
			  $form['video_link_type'] = array(
			         '#type' => 'hidden',
			         '#title' => '',
			         '#value' => my_workus_get_field('link_type'),
			         '#required' => FALSE,
			    );
		  }
	 	  
		  if( $link_type == 0 )
			   $form['video_current'] = array(
			         '#type' => 'item',
			         '#title' => '',
			         '#value' => '<object type="application/x-shockwave-flash" 
								            data="/'.my_workus_get_field('video_link').'" width="400" height="250">
								           <param name="quality" value="high">
								           <param name="wmode" value="opaque">
								        </object>',
			         '#required' => FALSE,
			    );
        else
        	 $form['video_current'] = array(
			         '#type' => 'item',
			         '#title' => 'Current video',
			         '#value' => '<iframe width="400" height="250" src="'.url(my_workus_get_field('video_link')).'" frameborder="0" allowfullscreen></iframe>',
			         '#required' => FALSE,
			    );
	 	
			$form['video_link'] = array(
		        '#type' => 'textfield',
		        '#title' => t('External url to the video (the old path will be removed)'),
		        '#default_value' => '',
		        '#required' => FALSE,
		      );
			  
			$form['or'] = array(
		         '#type' => 'item',
		         '#title' => 'or',
		         '#value' => '',
		         '#required' => FALSE,
		       );
		       
		     $form['video_upload'] = array(
		      '#type' => 'file',
		      '#title' => t('Upload a new video file (format *.swf)'),
		      '#description' => t('Upload a video file if you don\'t enter the file path (the old path will be removed)'),
		      '#default_value' => '',
		      '#required' => FALSE,
		    );
	 	
	 }else { 	
  
			$form['video_link'] = array(
		        '#type' => 'textfield',
		        '#title' => t('External url to the video'),
		        '#default_value' => '',
		        '#required' => FALSE,
		      );
			  
			$form['or'] = array(
		         '#type' => 'item',
		         '#title' => '',
		         '#value' => 'or',
		         '#required' => FALSE,
		       );
		  
			$form['video_upload'] = array(
		      '#type' => 'file',
		      '#title' => t('Upload a video file (format *.swf)'),
		      '#description' => t('Upload a video file if you don\'t enter the file path'),
		      '#default_value' => '',
		      '#required' => FALSE,
		    );
	
	 }
	
	$form['body'] = array(
        '#type' => 'textarea',
        '#title' => t('Text body'),
        '#description' => t('Text box below the video'),
        '#cols' => 5,
        '#rows' => 5,
        '#default_value' => my_workus_get_field('body') ,
        '#required' => FALSE,
      );
	  
	$form['submit'] = array(
      '#type' => 'submit',
      '#value' => t('Save'),
    );
	
	return $form;
}

function my_workus_get_field($field_name) {
	
	$result = db_query("SELECT {$field_name} FROM {my_workus} ");
    $record = db_result($result);
    return $record;

}

function my_workus_add_form_validate($form, &$form_state) {
	if (isset($form['video_upload'])) {
	       $validators = array('file_validate_extensions' => array('swf'));
		    $dir = file_directory_path() . '/video';
		 
		    if(file_check_directory($dir, 1)) {
		
		      $file = file_save_upload('video_upload', $validators, $dir);
		
		      if ($file) $form_state['values']['video_file'] = $file;
		    }
     }
}

function my_workus_add_form_submit($form, &$form_state) {
	
    $form_values = $form_state['values'];
	
	if($form_values['video_file']) {
		$need_video= $form_values['video_file']->filepath; 
		$link_type = 0;
	}
	else {
		$need_video = trim($form_values['video_link']);
		$link_type = 1;
	}
	
	foreach($form_values as $index => &$value) {
		if(empty($value) ) {
			$value = NULL;
		}
	}
	
	if(empty($need_video) && $form_values['video_url_current']) {
		   $need_video = $form_values['video_url_current'];
		   $link_type = $form_values['video_link_type'];
	}
	
	db_query("DELETE FROM {my_workus}");
	$data = array(
	    'title' => $form_values['title'],
	    'video_link' => $need_video,
	    'video_type' => $need_video,
	    'link_type' => $link_type,
	    'body' => $form_values['body'],
	);
    drupal_write_record('my_workus', $data);
	$form_state['redirect'] = url('admin/build/my_workus');
	
}
