<h1><?php echo $title ?></h1>
<?php echo getNodeFieldValue($node, 'field_abstract')?>
<?php if($node->field_link_readmore) : ?>
      <div class="learn_more"><a href="<?php echo getNodeFieldValue($node, 'field_link_readmore') ?>">Learn More</a></div>
      <img src="<?php echo path_to_theme() ?>/images/content_img.png" width="287" height="368" alt="" style="position: absolute; right:0; bottom: 1px;"/>
<?php endif; ?> 