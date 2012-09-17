<div id="slider" style="height:95px;">
	   <?php 
	       $cnt = count($block->title);
		   for($i = 0; $i < $cnt; $i++) {
	   ?>
        <div> <span class="greentext"><?php echo $block->title[$i] ?></span>
          <p><?php echo $block->body[$i] ?></p>
          <p><a href="#" class="more"><?php echo $block->link_title[$i] ?></a></p>
        </div>
        <?php } ?>
</div>
<hr />