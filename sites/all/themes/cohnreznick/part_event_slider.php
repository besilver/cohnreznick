<?php 

   define(COUNT_EVENT_SLIDER, 3);
   
   $nodes_media_id = array(); $db_nodes_media_id = array();
   $result= db_query("SELECT nid FROM {node} WHERE type='media' AND status=1");
     while ($ob = db_fetch_object($result)) {
         $db_nodes_media_id[] = $ob->nid;
   }
   for($i = 0; $i < COUNT_EVENT_SLIDER; $i++)
   $nodes_media[$i] = node_load($db_nodes_media_id[$i]);
   
 /*  $result = db_query("SELECT * from {content_field_event_title}");
   //$result = db_query("SELECT * FROM {content_type_media} WHERE field_event_title_value is not null ORDER BY RAND()");
   $node_media = array();
   while ($ob = db_fetch_object($result)) {
         $node_media[] = $ob;
   }*/
   
//  print_r($nodes_media);
?>
      <div class="nivoslider-wrapper">
        <div id="nivoSlider" class="nivoSlider">
        <?php for($i = 0; $i < COUNT_EVENT_SLIDER; $i++) { ?>
         <img src="/<?php echo path_to_theme() ?>/images/nivoslider3.jpg" alt="" title="#htmlcaption<?php echo ($i+1) ?>"/> 
        <?php } ?>
        </div>
      </div>
      <?php for($i = 0; $i < COUNT_EVENT_SLIDER; $i++) { ?>
      <div id="htmlcaption<?php echo ($i+1) ?>" class="nivo-html-caption">
        <p class="greentext eventname"><b><i><?php echo $node_media[$i]->field_event_title_value ?></i></b></p>
        <p class="greentext eventdate"><?php echo  $node_media[$i]->field_event_date_value ?></p>
      	<p><?php echo $node_media[$i]->field_event_abstract_value ?></p>
      </div>
      <?php } ?>