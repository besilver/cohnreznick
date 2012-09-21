<?php

   require_once('functions.php');

   define(COUNT_BEFORE_MORE, 10);
   define(COUNT_AFTER_MORE, 15);

   function getAllPeople() {
		$query_people = db_query("SELECT nid FROM {node} WHERE type='people' AND status=1 ORDER BY title");
		$nid_people= array();
	    while ($record = db_result($query_people)) {
	       $nid_people[] = $record;	
		}
		return $nid_people;
   }
   
   function displayPeopleItem($id) {
   	
   	       $node = node_load($id);
		   $node_url = url("node/$node->nid");

   	       $content =  '';
		   
		   // image output
		   if($node->field_photo[0]['filepath']) 
	               $content .= '<a href="'.$node_url.'">'.getNodeImage($node, 'field_photo', array('width' => 99, 'class' => 'left')).'</a>';
	       else
		   	       $content .= '<a href="'.$node_url.'"><img src="/sites/all/themes/cohnreznick/images/no_photo.jpg" width="99" class="left" /></a>';

		   $content .= '<p class="name greentext"><a href="'.$node_url.'">'.getNodeFieldValue($node, 'field_name') .'</a></p>'; // name output
		   
		   if(getNodeFieldValue($node, 'field_job_title')) $content .= '<p class="job"><b>'.getNodeFieldValue($node, 'field_job_title').'</b></p>'; //job title output
           $content .= '<p>'.getShortText($node->body,30).'</p>';
		   $content .= '<p><a href="'.$node_url.'" class="more">More About '. getNodeFieldValue($node, 'field_name').'</a></p>'; // link more output
		  
		  // small left output
		   $content_small = '';
		   if(getNodeFieldValue($node, 'field_email')) $content_small .= '<p><span class="email-icon icon">'.getNodeFieldValue($node, 'field_email').'</span></p>';
		   if(getNodeFieldValue($node, 'field_phone')) $content_small .= '<p><span class="tel-icon icon">'.getNodeFieldValue($node, 'field_phone').'</span></p>';
		   if(getNodeFieldValue($node, 'field_snet_flink')) $content_small .= '<a href="'.url(getNodeFieldValue($node, 'field_snet_flink')).'"><span class="facebook-icon icon"></span></a>';
		   if(getNodeFieldValue($node, 'field_snet_twitter')) $content_small .= '<a href="'.url(getNodeFieldValue($node, 'field_snet_twitter')).'"><span class="twitter-icon icon"></span></a>';
		   if(getNodeFieldValue($node, 'field_snet_linkedin')) $content_small .= '<a href="'.url(getNodeFieldValue($node, 'field_snet_linkedin')).'"><span class="linkedin-icon icon"></span></a>';
		   $content .= '<div class="gray_icons small left">'.$content_small.'</div>';
		    
		   if(getFilePath($node, 'field_vcard')) $content .= '<p><a href="'.url(getFilePath($node, 'field_vcard')).'"><span class="vcard_icon icon">Download vCard</span></a></p>'; // vcard link output	
		   
		   return $content;
		   
   }
   
    // get all people 
    $people = getAllPeople();
   
 //   $first = !empty($_GET['page']) && (int) $_GET['page'] > 0 ? ((int) $_GET['page'] -1)*COUNT_BEFORE_MORE +1 : 0;
//	$first += COUNT_BEFORE_MORE;
	
	$page = empty($_GET['page']) ? 0 : (int) $_GET['page'];
?>
    
    <ul class="listing separatorlist">
    <?php for($i = 0; $i < COUNT_BEFORE_MORE; $i++) { ?>
	      <li><?php echo displayPeopleItem($people[$i]); ?></li>
	<?php } ?>
   </ul>
   
   <form action="<?php echo url('taxonomy/term/5') ?>">
   	    <input type="hidden" name="page" value="<?php echo ($page+1); ?>">
   	    <input type="submit" value="More" />
   </form>
   
   <?php if($page > 0) : ?>
   <?php  $count_after_more = min(COUNT_BEFORE_MORE + COUNT_AFTER_MORE*$page, count($people));  ?>
		   <ul class="listing separatorlist">
		    <?php for($i = COUNT_BEFORE_MORE; $i < $count_after_more; $i++) { ?>
			      <li><?php  echo displayPeopleItem($people[$i]); ?></li>
			<?php } ?>
		   </ul>
   <?php endif; ?>
