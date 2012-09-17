<div class="shadow_box">
   <h3>Follow Us</h3>
   <ul class="social_footer">
       <?php if($block->facebook_link) : ?><li><a href="<?php echo $block->facebook_link ?>" class="facebook">Facebook</a></li><?php endif; ?>
       <?php if($block->twitter_link) : ?><li><a href="<?php echo $block->twitter_link ?>" class="twitter">Twitter</a></li><?php endif; ?>
       <?php if($block->linkedin_link) : ?><li><a href="<?php echo $block->linkedin_link ?>" class="linkedin">LinkedIn</a></li><?php endif; ?>
       <?php if($block->rss_link) : ?><li><a href="<?php echo $block->rss_link ?>" class="rss">Rss</a></li><?php endif; ?>
   </ul>
</div>