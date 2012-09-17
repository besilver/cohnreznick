<h2><?php echo $block->main_title ?></h2>
      <div class="nivoslider-wrapper">
        <div id="nivoSlider" class="nivoSlider"> 
		   <?php 
		       $cnt = count($block->title);
			   for($i = 0; $i < $cnt; $i++) {
		   ?>
		   <?php if($block->image[$i]) : ?>
		   	     <?php if($block->link_url[$i]) : ?><a href="<?php echo url($block->link_url[$i]) ?>" /><?php endif; ?>
        	      <img src="<?php echo url($block->image[$i] ) ?>" alt="" title="#htmlcaption<?php echo ($i+1) ?>"/> 
        	      <?php if($block->image[$i]) : ?></a><?php endif; ?>
        	<?php endif; ?>
        	<?php } ?>
      </div>
      </div>
      <?php for($i = 0; $i < $cnt; $i++) { ?>
      <div id="htmlcaption<?php echo ($i+1) ?>" class="nivo-html-caption">
        <p class="greentext"><b><i><?php echo $block->title[$i] ?></i></b></p>
        <?php if($block->body[$i]) : ?>
        <p><?php echo $block->body[$i] ?></p>
        <?php endif; ?>
      </div>
      <?php } ?>
