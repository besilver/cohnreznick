<?php if ($teaser) : ?>
	  <li>
          <p><?php echo $content; ?></p>
          <p><a href="<?php echo url("node/$node->nid") ?>" class="more">Read more</a></p>
        </li>
 <?php else : ?>
 	   <h2><?php echo $title ?></h2>
 	   <div><?php echo $content; ?></div>
 <?php endif; ?>
   
