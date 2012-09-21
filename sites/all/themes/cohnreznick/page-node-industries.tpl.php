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
</head>

<body>
<div id="sideleft">
  <div id="hover_img" class="column"></div>
  <div id="center" class="column">
  		<img src="/<?php echo path_to_theme() ?>/images/services_photo.jpg" width="240" height="990" alt=""/>
        <div class="title" style="position: absolute; top:415px; opacity:0.9; background:#000;">
          <h3>featured</h3>
          <h2>John smidlouer</h2>
        </div>
  </div>
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
  <div class="div1 column" data-jsmodules="homeInsReinsScroll">
  <?php require_once('right_top.php'); ?>
    <div class="main_content">
      <div class="share"><a href="#"><img src="/<?php echo path_to_theme() ?>/images/share.png" width="78" height="20" alt="share this button"/></a></div>
      <h1>Services</h1>
		<p class="bluetext"><i>Nam libero tempore, cum voluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus,omnis voluptas assumenda.</i></p>     
      <div class="nivoslider-wrapper">
        <div id="nivoSlider" class="nivoSlider">
         <img src="/<?php echo path_to_theme() ?>/images/nivoslider1.jpg" alt="" title="#htmlcaption1"/> 
         <img src="/<?php echo path_to_theme() ?>/images/nivoslider2.jpg" alt="" title="#htmlcaption2" />
         <img src="/<?php echo path_to_theme() ?>/images/nivoslider3.jpg" alt="" title="#htmlcaption3"/>
        </div>
      </div>
      <div id="htmlcaption1" class="nivo-html-caption">
        <p class="greentext"><b><i>Lorem Ipsm dolore tilerier 1</i></b></p>
      	<p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod mro tempore, cum soluta nobis est. Nam libero tempore, cum soluta nobis.</p>
      </div>
      <div id="htmlcaption2" class="nivo-html-caption">
      	<p class="greentext"><b><i>Lorem Ipsm dolore tilerier 2</i></b></p>
      	<p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod mro tempore, cum soluta nobis est. Nam libero tempore, cum soluta nobis.</p>
      </div>
      <div id="htmlcaption3" class="nivo-html-caption">
      	<p class="greentext"><b><i>Lorem Ipsm dolore tilerier 3</i></b></p>
      	<p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod mro tempore, cum soluta nobis est. Nam libero tempore, cum soluta nobis.</p>
      </div>
      <?php echo $content; ?>
    </div>
  
    <?php echo $threehorimg ?>
  </div>
    <?php  echo $psearch; ?>
    <?php echo $workus; ?>
</div>
<?php require_once('footer.php'); ?>
</body>
</html>
