<?php

 function getPeopleServices($nid) {
 	
 	   $query_services = db_query("SELECT c.field_related_services_nid  
 	                                                   FROM {content_field_related_services} c
 	                                                   INNER JOIN {node} ON c.field_related_services_nid = n.nid
 	                                                   WHERE n.hidden=0 AND c.nid = %d
 	                                                   ",$nid);
	  $nid_services = array();
	   while($nid = db_result($query_services)) {
		     $nid_services[] = node_load((int)$nid);
	   } 
													   
 }

  if(preg_match("/(\d+)$/",$_GET['q'], $matches)) {
  	   $nid =  (int) $matches[0];
	   if($nid > 0) {
	   	     $nodes_service = getPeopleServices($nid);
	   	     foreach($nodes_service as $node) {
	   	     	  
	   	     }
	   }
  }
  
