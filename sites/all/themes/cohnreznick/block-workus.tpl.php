  <div id="right_slide_panel" class="column"> <img src="/<?php echo path_to_theme() ?>/images/working.png" width="28" height="157" alt="Working With Us" class="slide_btn"  id="working_slide_btn"/>
    <div class="column slide_content">
      <div class="inner">
        <h2><?php echo $block->main_title  ?></h2>
        <?php if($block->link_type) : ?>
             <iframe width="700" height="395" src="<?php echo url($block->video_link) ?>" frameborder="0" allowfullscreen></iframe>
        <?php else: ?>
	        <object type="application/x-shockwave-flash" 
	            data="<?php echo $block->video_link ?>" width="700" height="395">
	           <param name="quality" value="high">
	           <param name="wmode" value="opaque">
	        </object>
     <?php endif; ?>
        <h4><?php echo $block->main_body  ?></h4>
        <hr />
        <div id="panelSlider">
        	
        <?php
           $cnt = count($block->title);
		   for($i=0; $i < $cnt; $i++) {
         ?>
	          <div><span class="whitetext"><?php echo $block->title[$i] ?></span>
	            <p><?php echo $block->body[$i] ?></p>
	            <?php if($block->link_url[$i]) : ?>
	            <p><a href="<?php echo $block->link_url[$i] ?>" class="more"><?php echo $block->link_title[$i] ?></a></p>
	            <?php endif; ?>
	          </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>