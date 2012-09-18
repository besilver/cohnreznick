<?php

function getFilteredPeople($name = NULL, $location = NULL, $industry = NULL, $service = NULL) {
	   
	   $tid = array();
	   if ($location) $tid[] = $location;
	   if ($industry) $tid[] = $industry;
	   
	   // basic search
	   $str_query_people = "SELECT DISTINCT n.nid, tn.tid FROM {node} n";
	   $where = " WHERE n.status = 1 AND n.type = 'people'";
	   $inner = "";
	   
	   // search by name
	   if($name == 'Name') $name = '';
	   if($name) $where .= " AND n.title LIKE '%".$name."%'";
	   
	   // search by location and industry
	   if(!empty($industry) || !empty($location)) {
	   		  $inner .= " INNER JOIN {term_node} tn ON n.nid = tn.nid";
		      if(!empty($industry) && empty($location)) 
	               $where .= " AND tn.tid = ".$industry;
			  elseif (empty($industry) && !empty($location)) 
	               $where .= " AND tn.tid = ".$location;
	   }
	   
	   // search by service
	   if(!empty($service)) {
	   	     $inner .= " INNER JOIN {content_field_related_services} c  ON c.nid = n.nid";
		     $where .= " AND c.field_related_services_nid = ".$service;
	   }
	   
	   // sorting by name
	   $order = " ORDER BY n.title";
	   $str_query_people = $str_query_people . $inner . $where . $order;
	   
	   $nid_location = array();
	   $query_nid_location = db_query("SELECT DISTINCT tn.nid FROM {term_node} tn WHERE tn.tid=%d", $location);
	   	   while($nid = db_result($query_nid_location)) {
		     $nid_location[] = $nid;
	   }   
	   
	   $nid_industry = array();
	   $query_nid_industry = db_query("SELECT DISTINCT tn.nid FROM {term_node} tn WHERE tn.tid=%d", $industry);
	   	   while($nid = db_result($query_nid_industry)) {
		     $nid_industry[] = $nid;
	   } 
		   
	   //getting result
	   $query_people_nid = db_query($str_query_people);
	   $people_nid = array();
	   while($nid = db_result($query_people_nid)) {
	   	    if(!empty($industry) && !empty($location)) {
	   		      if(in_array($nid, $nid_industry) && in_array($nid, $nid_location))
	   		            $people_nid[] = $nid;
	      	} else
		          $people_nid[] = $nid;
	   }     
	   
	   return  array_unique($people_nid);
	   
}

$people_nid_all = getFilteredPeople($_GET['psearch']['name'],$_GET['psearch']['location'],$_GET['psearch']['industry'],$_GET['psearch']['service']); 
$people_all_count = count($people_nid_all);
$people_all = array();
?>
 
   	 <?php 
   	  // no result output
   	  if($people_all_count == 0) : ?>
   	 	<p>No results</p>
      <?php  // result output
                  else : ?>
     <ul class="listing separatorlist">
      <?php     for($i = 0; $i < $people_all_count; $i++) {
 	          $node = node_load($people_nid_all[$i]); 
   	 ?>
	     <li>
	     	
	      <?php if($node->field_photo[0]['filepath']) : ?>
	          <a href="<?php echo url("node/$node->nid") ?>"><?php echo getNodeImage($node, 'field_photo', array('width' => 99, 'class' => 'left')) ?></a>
	      <?php else : ?>
	      	  <a href="<?php echo url("node/$node->nid") ?>"><img src="/sites/all/themes/cohnreznick/images/no_photo.jpg" width="99" class="left" /></a>
	      <?php endif; ?>
	      	
          <p class="name greentext"><a href="<?php echo url("node/$node->nid") ?>"><?php echo getNodeFieldValue($node, 'field_name') ?></a></p>
          <?php if(getNodeFieldValue($node, 'field_job_title')) : ?>
          <p class="job"><b><?php echo getNodeFieldValue($node, 'field_job_title') ?></b></p>
          <?php endif; ?>
         <p><?php echo getShortText($node->body, 30) ?></p>
          <p><a href="<?php echo url("node/$node->nid") ?>" class="more">More About <?php echo getNodeFieldValue($node, 'field_name') ?></a></p>          
          <div class="gray_icons small left">
          <?php if(getNodeFieldValue($node, 'field_email')) : ?>
             <p><span class="email-icon icon"><?php echo getNodeFieldValue($node, 'field_email') ?></span></p>
          <?php endif; ?>
          <?php if(getNodeFieldValue($node, 'field_phone')) : ?>
          <p><span class="tel-icon icon"><?php echo getNodeFieldValue($node, 'field_phone') ?></span></p>
          <?php endif; ?>
          <p>
          	<?php if(getNodeFieldValue($node, 'field_snet_flink')) : ?><a href="<?php echo url(getNodeFieldValue($node, 'field_snet_flink')) ?>"><span class="facebook-icon icon"></span></a><?php endif; ?>
          	<?php if(getNodeFieldValue($node, 'field_snet_twitter')) : ?><a href="<?php echo url(getNodeFieldValue($node, 'field_snet_twitter')) ?>"><span class="twitter-icon icon"></span></a><?php endif; ?>
          	<?php if(getNodeFieldValue($node, 'field_snet_linkedin')) : ?><a href="<?php echo url(getNodeFieldValue($node, 'field_snet_linkedin')) ?>"><span class="linkedin-icon icon"></span></a><?php endif; ?>
          </p>
          <?php if(getFilePath($node, 'field_vcard')) : ?>
             <p><a href="<?php echo url(getFilePath($node, 'field_vcard')) ?>"><span class="vcard_icon icon">Download vCard</span></a></p>    
          <?php endif; ?>
          </div>  
          
        </li>
<?php } ?>
      </ul>
  <?php endif; ?>

