 	   <h3><?php echo $title ?></h3>
 	   <div>
      <?php 
            if(getBody($node->nid))
 	            echo getBody($node->nid); 
			else {
				echo $content;
			}
 	   ?>
 	   </div>