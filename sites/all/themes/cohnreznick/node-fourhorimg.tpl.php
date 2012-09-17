	 <div class="bottom">
      <h2><?php echo $node->title ?></h2>
            <?php if(getNodeFieldValue($node, 'field_toptext')) : ?>
      <p class="bluetext"><?php echo getNodeFieldValue($node, 'field_toptext') ?></p>
      <?php endif; ?>
      <div class="promo">
        <div class="left"> 
        	<?php if($node->field_limage) : ?>		 	
		       	    <?php if(getNodeFieldValue($node, 'field_llink')) : ?>
		       	        <a href="<?php echo url(getNodeFieldValue($node, 'field_llink')) ?>"><?php echo getNodeImage($node, 'field_limage', array('width'=>147)) ?></a>
		       	    <?php else : ?>
		       	    	<?php echo getNodeImage($node, 'field_limage', array('width' => 147)) ?>
		       	    <?php endif; ?>
		    <?php endif; ?>
		    <a class="greentext" href="<?php echo url(getNodeFieldValue($node, 'field_llink')) ?>"><?php echo getNodeFieldValue($node, 'field_ltitle') ?></a>
        </div>
        <div class="left">
        	<?php if($node->field_cimage) : ?>		 	
		       	    <?php if(getNodeFieldValue($node, 'field_clink')) : ?>
		       	        <a href="<?php echo url(getNodeFieldValue($node, 'field_clink')) ?>"><?php echo getNodeImage($node, 'field_cimage', array('width'=>147)) ?></a>
		       	    <?php else : ?>
		       	    	<?php echo getNodeImage($node, 'field_cimage', array('width' => 147)) ?>
		       	    <?php endif; ?>
		    <?php endif; ?> 
		    <a class="greentext" href="<?php echo url(getNodeFieldValue($node, 'field_clink')) ?>"><?php echo getNodeFieldValue($node, 'field_ctitle') ?></a>       	
       </div>
          <div class="left">
        	<?php if($node->field_c2image) : ?>		 	
		       	    <?php if(getNodeFieldValue($node, 'field_c2link')) : ?>
		       	        <a href="<?php echo url(getNodeFieldValue($node, 'field_c2link')) ?>"><?php echo getNodeImage($node, 'field_c2image', array('width'=>147)) ?></a>
		       	    <?php else : ?>
		       	    	<?php echo getNodeImage($node, 'field_c2image', array('width' => 147)) ?>
		       	    <?php endif; ?>
		    <?php endif; ?> 
		    <a class="greentext" href="<?php echo url(getNodeFieldValue($node, 'field_c2link')) ?>"><?php echo getNodeFieldValue($node, 'field_c2title') ?></a>       	
       </div>
        <div class="right"> 
        	<?php if($node->field_rimage) : ?>		 	
		       	    <?php if(getNodeFieldValue($node, 'field_rlink')) : ?>
		       	        <a href="<?php echo url(getNodeFieldValue($node, 'field_rlink')) ?>"><?php echo getNodeImage($node, 'field_rimage', array('width' => 147, 'height' => '79')) ?></a>
		       	    <?php else : ?>
		       	    	<?php echo getNodeImage($node, 'field_rimage', array('width' => 147, 'height' => '79')) ?>
		       	    <?php endif; ?>
		    <?php endif; ?> 
		    <a class="greentext" href="<?php echo url(getNodeFieldValue($node, 'field_rlink')) ?>"><?php echo getNodeFieldValue($node, 'field_rtitle') ?></a>       	
        </div>
      </div>
    </div>
