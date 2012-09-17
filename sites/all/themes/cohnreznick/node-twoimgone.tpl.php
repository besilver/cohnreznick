<?php require_once('functions.php'); ?>
<h3><?php echo $node->title ?></h3>
<?php if($content) : ?>
<p><?php echo $content ?></p>
<?php endif; ?>
<table>
	<tr>
		 <td>
		 	<?php if($node->field_limage) : ?>		 	
		       	    <?php if(getNodeFieldValue($node, 'field_llink')) : ?>
		       	        <a href="<?php echo url(getNodeFieldValue($node, 'field_llink')) ?>"><?php echo getNodeImage($node, 'field_limage', array('width'=>200)) ?></a>
		       	    <?php else : ?>
		       	    	<?php echo getNodeImage($node, 'field_limage', array('width' => 200)) ?>
		       	    <?php endif; ?>
		    <?php endif; ?>
		    <h3>
		    		<?php if(getNodeFieldValue($node, 'field_llink')) : ?>
		       	        <a href="<?php echo url(getNodeFieldValue($node, 'field_llink')) ?>"><?php echo getNodeFieldValue($node, 'field_ltitle') ?></a>
		       	    <?php else : ?>
		       	    	<?php echo getNodeFieldValue($node, 'field_ltitle') ?>
		       	    <?php endif; ?>
		    </h3>	
		    <?php if($node->field_ltext) : ?>
		    <p><?php echo getNodeFieldValue($node, 'field_ltext') ?></p>
		    <?php endif; ?>
	     </td>
	     <td>
	     	<?php if($node->field_rimage) : ?>		 	
		       	    <?php if(getNodeFieldValue($node, 'field_rlink')) : ?>
		       	        <a href="<?php echo url(getNodeFieldValue($node, 'field_rlink')) ?>"><?php echo getNodeImage($node, 'field_rimage', array('width'=>200)) ?></a>
		       	    <?php else : ?>
		       	    	<?php echo getNodeImage($node, 'field_rimage', array('width'=>200)) ?>
		       	    <?php endif; ?>
		    <?php endif; ?>
		    <h3>
		    		<?php if(getNodeFieldValue($node, 'field_rlink')) : ?>
		       	        <a href="<?php echo url(getNodeFieldValue($node, 'field_rlink')) ?>"><?php echo getNodeFieldValue($node, 'field_rtitle') ?></a>
		       	    <?php else : ?>
		       	    	<?php echo getNodeFieldValue($node, 'field_rtitle') ?>
		       	    <?php endif; ?>
		    </h3>	
		    <?php if($node->field_rtext) : ?>
		    <p><?php echo getNodeFieldValue($node, 'field_rtext') ?></p>
		    <?php endif; ?>
	     </td>
	</tr>
	<tr>
		<td colspan="2">
		   		 	<?php if($node->field_bimage) : ?>		 	
		       	    <?php if(getNodeFieldValue($node, 'field_blink')) : ?>
		       	        <a href="<?php echo url(getNodeFieldValue($node, 'field_blink')) ?>"><?php echo getNodeImage($node, 'field_bimage', array('width'=>200)) ?></a>
		       	    <?php else : ?>
		       	    	<?php echo getNodeImage($node, 'field_bimage', array('width'=>200)) ?>
		       	    <?php endif; ?>
		    <?php endif; ?>
		    <h3>
		    		<?php if(getNodeFieldValue($node, 'field_blink')) : ?>
		       	        <a href="<?php echo url(getNodeFieldValue($node, 'field_blink')) ?>"><?php echo getNodeFieldValue($node, 'field_btitle') ?></a>
		       	    <?php else : ?>
		       	    	<?php echo getNodeFieldValue($node, 'field_btitle') ?>
		       	    <?php endif; ?>
		    </h3>	
		    <?php if($node->field_btext) : ?>
		    <p><?php echo getNodeFieldValue($node, 'field_btext') ?></p>
		    <?php endif; ?>
	    </td>
	</tr>
</table>
 

