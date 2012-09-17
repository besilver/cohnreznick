<?php if ($teaser) : ?>
	<li><span class="greentext"><?php echo $title ?></span>
	          <p><?php echo $content; ?></p>
	          <p><a class="more" href="<?php echo url("node/$node->nid") ?>">Read more</a></p>
	</li>
<?php else : ?>
	<h3 class="greentext"><?php echo $title ?></h3>
	<?php echo $content; ?>
<?php endif; ?>