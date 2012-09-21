<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9" />
	<?php print $head ?>
	<title><?php print $head_title ?></title>
	<?php print $styles ?>
	<?php print $scripts ?>
	<link href="/<?php echo path_to_theme() ?>/css/main.css" rel="stylesheet" type="text/css"/>
	<link href="/<?php echo path_to_theme() ?>/css/bx_styles.css" rel="stylesheet" type="text/css"/>
	<link href="/<?php echo path_to_theme() ?>/css/nivo-slider.css" rel="stylesheet" type="text/css" />
<script src="/<?php echo path_to_theme() ?>/js/jquery-1.8.0.min.js" type="application/javascript"></script>
		<script src="/<?php echo path_to_theme() ?>/js/jquery.bxSlider.js" type="text/javascript"></script>
		<script src="/<?php echo path_to_theme() ?>/js/general.js" type="text/javascript"></script>
		<script src="/<?php echo path_to_theme() ?>/js/fixedElemScroll.js" type="text/javascript"></script>
		<script src="/<?php echo path_to_theme() ?>/js/jquery.effects.core.js" type="text/javascript"></script>
		<script src="/<?php echo path_to_theme() ?>/js/jquery.effects.slide.js" type="text/javascript"></script>
		<script src="/<?php echo path_to_theme() ?>/js/jquery.nivo.slider.pack.js" type="text/javascript"></script>
		<script src="/<?php echo path_to_theme() ?>/js/jquery.cookie.js" type="text/javascript"></script>
		<script src="/<?php echo path_to_theme() ?>/js/jquery.ui.widget.min.js" type="text/javascript"></script>
		<script src="/<?php echo path_to_theme() ?>/js/jquery.ui.tabs.min.js" type="text/javascript"></script>
		<script src="/<?php echo path_to_theme() ?>/js/jquery.ui.core.min.js" type="text/javascript"></script>
		<script src="/<?php echo path_to_theme() ?>/js/jquery.toningImage.js" type="text/javascript"></script>
	
	<script type="text/javascript">
	  
			jQuery(document).ready(function () {
				
				 <?php if(empty($_GET['psearch']) && empty($_GET['page'])) : ?>
		     		jQuery("#right_slide_panel_people .slide_content").width(jQuery(document).width() / 2 + 240);
			    	jQuery('#right_slide_panel_people .slide_content').css('display','block');	
				<?php endif; ?>	
				jQuery('#search_people input[type=submit]').click(function () {
						jQuery("#right_slide_panel_people .slide_content").animate({
				            width: 'toggle'
				       });
				
				});
});

    </script>

</head>

<body>
<div id="sideleft">
  <div id="hover_img" class="column"></div>
  <div id="center" class="column"></div>
  <div class="left_sidebar"> <a href="index.html" id="home">Cohn Reznick</a>
    <?php echo $main_menu; ?>
    <a href="#" class="client_login_link">Client Login</a>
    <hr />
    <a href="#">Financial Managers<br/>
    Learning Forum &raquo;</a>
    <?php echo $follow_us_left; ?>
    <a href="#" id="nexia"><img src="/<?php echo path_to_theme() ?>/images/nexia_logo.png" width="120" height="51" alt="Nexia"/></a> </div>
</div>
<div id="sideright">
<img src="/<?php echo path_to_theme() ?>/images/country.png" width="244" height="29" alt="Country / Language"  id="country"/>
  <div class="div1 column"   data-jsmodules="homeInsReinsScroll">
    <?php require_once('right_top.php') ?>
    <div class="main_content">
      <div class="share"><a href="#"><img src="/<?php echo path_to_theme() ?>/images/share.png" width="78" height="20" alt="share this button"/></a></div>
      
      <?php 
         if(isset($_GET['psearch'])) : ?>
                <h1>People Results</h1>
      			<?php echo $presults;
		 else : ?>
	        	 <?php echo $pretext; ?>
	        	 <?php echo $plist; ?>
      <?php endif; ?>
    </div>
    <?php echo $threehorimg; ?>
  </div>
  
  <?php  echo $psearch; ?>
  <?php echo $workus; ?>
</div>
  <?php require_once('footer.php') ?>
</body>
</html>



