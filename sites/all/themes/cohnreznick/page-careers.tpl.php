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
<?php require_once('left_side.php') ?>
<div id="sideright">
<img src="/<?php echo path_to_theme() ?>/images/country.png" width="244" height="29" alt="Country / Language"  id="country"/>
  <div class="div1 column"   data-jsmodules="homeInsReinsScroll">
    <?php require_once('right_top.php') ?>
    <div class="main_content">
      <div class="share"><a href="#"><img src="/<?php echo path_to_theme() ?>/images/share.png" width="78" height="20" alt="share this button"/></a></div>
      <h3>Move Your Career Forward</h3>
      <h1 style="margin-top:-20px;">@ Cohn Reznick</h1>
      <div class="rightimg">
        <h2>Search Jobs</h2>
        <p class="bluetext"><i>Nam libero tempore, cum voluta nobis est<br/>
          eligendi optio cumque nihil impedit quo<br/>
          minus id quod maxime placeat facere.</i></p>
        <div class="learn_more_small"><a href="#">Search Lorem!</a></div>
        <?php echo $follow_us_careers; ?>
        <img src="/<?php echo path_to_theme() ?>/images/career.png" width="227" height="304" alt="Search Jobs" style="position:absolute; right:0; bottom: 0;"/> </div>
      <div id="slider">
        <div><img src="/<?php echo path_to_theme() ?>/images/promo.jpg" width="200" height="110" alt=""/> <span class="greentext">Titling Here Lorem Ipsum</span>
          <p>Nam libero tempore, cum soluta nobis est eligendi optio 
            cumque nihil impedit quo minus id quod mro tempore, cum 
            soluta nobis</p>
          <p><a href="#" class="more">Link Lorem</a></p>
        </div>
        <div> <img src="/<?php echo path_to_theme() ?>/images/promo.jpg" width="200" height="110" alt=""/> <span class="greentext">Titling Here Lorem Ipsum</span>
          <p>Nam libero tempore, cum soluta nobis est eligendi optio 
            cumque nihil impedit quo minus id quod mro tempore, cum 
            soluta nobis</p>
          <p><a href="#" class="more">Link Lorem</a></p>
        </div>
      </div>
      <hr/>
      
      <?php echo $sliderimgtop; ?>
      
      <ul class="listing">
        <li> <img src="/<?php echo path_to_theme() ?>/images/promo_1.png" width="127" height="79" alt=""/> <span class="greentext">Benefits</span>
          <p>Nam libero tempore, cum soluta nobis est eligendi optio 
            cumque nihil impedit quo minus id quod mro tempore, cum 
            soluta nobis est.</p>
          <p><a href="#" class="more">Link Lorem</a></p>
        </li>
        <li> <img src="/<?php echo path_to_theme() ?>/images/promo_1.png" width="127" height="79" alt=""/> <span class="greentext">Culture</span>
          <p>Nam libero tempore, cum soluta nobis est eligendi optio 
            cumque nihil impedit quo minus id quod mro tempore, cum 
            soluta nobis est.</p>
          <p><a href="#" class="more">Link Lorem</a></p>
        </li>
      </ul>
    </div>
    <?php echo $threehorimg; ?>
  </div>
  <?php  echo $psearch; ?>
  <?php echo $workus; ?>
</div>
  <?php require_once('footer.php') ?>
</body>
</html>
