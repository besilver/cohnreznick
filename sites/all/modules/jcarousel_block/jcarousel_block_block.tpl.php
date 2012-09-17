<?php
  drupal_add_js(drupal_get_path('module', 'jcarousel_block') . '/jcarousel/lib/jquery.jcarousel.min.js');
//  drupal_add_css(drupal_get_path('module', 'jcarousel_block') . '/jcarousel/lib/jquery.jcarousel.css');
  drupal_add_css(drupal_get_path('module', 'jcarousel_block') . '/jcarousel/skins/' . $skin . '/skin.css');

?>
<div id='wrap'>
    <script type="text/javascript">
      $(document).ready(function() {
       	$('#mycarousel').jcarousel();
		  });
    </script>
				
	<div class="carousel_container">
    <ul class="jcarousel-skin-<?php print $skin;?>" id="mycarousel">
<?php
    foreach($images as $key => $image){
?>
        <li><a href="<?php print $image['path'] ?>" rel="<?php print $image['rel']; ?>"><img width="<?php print $image['width'];?>" height="<?php print $image['height'];?>" alt="<?php print $image['alt'];?>" src="<?php print $image['thumb_path'];?>" /></a></li>
<?php
    } // foreach
?>
    </ul>
	</div> <!-- carousel_container -->
</div> <!-- wrap -->
