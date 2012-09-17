<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9" />
		<?php print $head ?>
		<title><?php print $head_title ?></title>
		<?php print $styles ?>
		<?php print $scripts ?>
		<link href="<?php echo path_to_theme() ?>/css/main.css" rel="stylesheet" type="text/css"/>
	    <link href="<?php echo path_to_theme() ?>/css/bx_styles.css" rel="stylesheet" type="text/css"/>
	    <link href="<?php echo path_to_theme() ?>/css/nivo-slider.css" rel="stylesheet" type="text/css" />
		<script src="<?php echo path_to_theme() ?>/js/jquery-1.8.0.min.js" type="application/javascript"></script>
		<script src="<?php echo path_to_theme() ?>/js/jquery.bxSlider.js" type="text/javascript"></script>
		<script src="<?php echo path_to_theme() ?>/js/general.js" type="text/javascript"></script>
		<script src="<?php echo path_to_theme() ?>/js/fixedElemScroll.js" type="text/javascript"></script>
		<script src="<?php echo path_to_theme() ?>/js/jquery.effects.core.js" type="text/javascript"></script>
		<script src="<?php echo path_to_theme() ?>/js/jquery.effects.slide.js" type="text/javascript"></script>
		<script src="<?php echo path_to_theme() ?>/js/jquery.nivo.slider.pack.js" type="text/javascript"></script>
		<script src="<?php echo path_to_theme() ?>/js/jquery.cookie.js" type="text/javascript"></script>
		<script src="<?php echo path_to_theme() ?>/js/jquery.ui.widget.min.js" type="text/javascript"></script>
		<script src="<?php echo path_to_theme() ?>/js/jquery.ui.tabs.min.js" type="text/javascript"></script>
</head>

<body>
<?php require_once('left_side.php') ?>
<div id="sideright"> <img src="<?php echo path_to_theme() ?>/images/country.png" width="244" height="29" alt="Country / Language"  id="country"/>
  <div class="div1 column" data-jsmodules="homeInsReinsScroll">
  <?php require_once('right_top.php') ?>
    <div class="main_content">
    <?php echo $content; ?>
    </div>
    <?php echo $threehorimg; ?> 
    </div>
  </div>
  <?php echo $workus; ?>
</div>
     <?php require_once('footer.php') ?>
</body>
</html>
