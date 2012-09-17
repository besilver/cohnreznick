<?php
require_once('functions.php');

function phptemplate_preprocess_page(&$vars) {
	
  $parent_categories = array(
     'page-taxonomy-term-2' => 'page-about',
     'page-taxonomy-term-4' => 'page-services',
     'page-taxonomy-term-5' => 'page-people',
     'page-taxonomy-term-6' => 'page-industries',
     'page-taxonomy-term-7' => 'page-insights',
     'page-taxonomy-term-8' => 'page-careers',
     'page-taxonomy-term-13' => 'page-office_locations',
     'page-taxonomy-term-66' => 'page-events',
  );	
  
  $child = 'detail';
	
  $vars['tabs2'] = menu_secondary_local_tasks();

  if(arg(0) == 'taxonomy' && arg(1) == 'term') {
  	 
	  $real_template = getRealTemplate(arg(2), $parent_categories);
  	  if($real_template)  $vars['template_files'][] = $real_template;
	  else {
	  	  $parent_template = getParentTemplate(arg(2), $parent_categories);
  	      if($parent_template)  $vars['template_files'][] = $parent_template.'-'.$child;
	  } 

  }
  
  	if (isset ($vars['node']) && isset($vars['node']->type)) {
		$vars['template_files'][] = 'page-node-'.$vars['node']->type;
	}
  
  $vars['templates'] = print_r($vars['template_files'], true);

  // Hook into color.module
  if (module_exists('color')) {
    _color_page_alter($vars);
  }
} 