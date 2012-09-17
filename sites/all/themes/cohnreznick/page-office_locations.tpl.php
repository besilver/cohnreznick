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
<div id="sideright"> <img src="/<?php echo path_to_theme() ?>/images/country.png" width="244" height="29" alt="Country / Language"  id="country"/>
  <div class="div1 column" data-jsmodules="homeInsReinsScroll">
  <?php require_once('right_top.php') ?>
    <div class="main_content">
      <div class="share"><a href="#"><img src="/<?php echo path_to_theme() ?>/images/share.png" width="78" height="20" alt="share this button"/></a></div>
      <h1>Office Location</h1>
      <p class="italic">Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod mro tempore, cum soluta nobis est. Nam libero tempore, cum soluta nobis.</p>
      <div id="main_office"><img src="/<?php echo path_to_theme() ?>/images/map.png" width="450" height="220" alt=""/>
      <img src="/<?php echo path_to_theme() ?>/images/pointer.png" width="64" height="24" alt="" class="pointer"/>
      <div class="greytext location main">
      	<h4>Headquarters</h4>
        <p class="bold italic margin_b5">CohnReznick  Headquarters</p>
        <p>7563 Avenue Here<br/>
        Suite 400E<br/>
        Bethesda, MD 20814-6583<br/>
        (301) 652-9100</p>
        <p class="greentext bold italic">Contact:</p>
        <p class="small"><span class="email-icon icon">John Doe@lorenipsum.com</span></p>
        <p class="small"><span class="office-icon icon">Office Directions</span></p>
        <p class="small"><span class="info-icon icon">Visitor Information</span></p>        
      </div>
      </div>
      <hr />
      <div class="left greytext location">
      	<h4>Midatlantic</h4>
        <p class="bold italic margin_b5">CohnReznick  MidAtlantic</p>
        <p>7563 Avenue Here<br/>
        Suite 400E<br/>
        Bethesda, MD 20814-6583<br/>
        (301) 652-9100</p>
        <p class="greentext bold italic">Contact:</p>
        <p class="small"><span class="email-icon icon">John Doe@lorenipsum.com</span></p>
        <p class="small"><span class="office-icon icon">Office Directions</span></p>
        <p class="small"><span class="info-icon icon">Visitor Information</span></p>        
      </div>
       <div class="right greytext location">
      	<h4>Midwest</h4>
        <p class="bold italic margin_b5">CohnReznick  MidWest</p>
        <p>7563 Avenue Here<br/>
        Suite 400E<br/>
        Bethesda, MD 20814-6583<br/>
        (301) 652-9100</p>
        <p class="greentext bold italic">Contact:</p>
        <p class="small"><span class="email-icon icon">John Doe@lorenipsum.com</span></p>
        <p class="small"><span class="office-icon icon">Office Directions</span></p>
        <p class="small"><span class="info-icon icon">Visitor Information</span></p>        
      </div>
      <div class="clear"></div>
      <hr/>
      <div class="left greytext location">
      	<h4>Pacific</h4>
        <p class="bold italic margin_b5">CohnReznick  Pacific</p>
        <p>7563 Avenue Here<br/>
        Suite 400E<br/>
        Bethesda, MD 20814-6583<br/>
        (301) 652-9100</p>
        <p class="greentext bold italic">Contact:</p>
        <p class="small"><span class="email-icon icon">John Doe@lorenipsum.com</span></p>
        <p class="small"><span class="office-icon icon">Office Directions</span></p>
        <p class="small"><span class="info-icon icon">Visitor Information</span></p>        
      </div>
       <div class="right greytext location">
      	<h4>Lorem Ipsum</h4>
        <p class="bold italic margin_b5">CohnReznick  MidAtlantic</p>
        <p>7563 Avenue Here<br/>
        Suite 400E<br/>
        Bethesda, MD 20814-6583<br/>
        (301) 652-9100</p>
        <p class="greentext bold italic">Contact:</p>
        <p class="small"><span class="email-icon icon">John Doe@lorenipsum.com</span></p>
        <p class="small"><span class="office-icon icon">Office Directions</span></p>
        <p class="small"><span class="info-icon icon">Visitor Information</span></p>        
      </div>
      <div class="clear"></div>
    </div>
    
    <?php echo $threehorimg ?>
    
  </div>
  
  <?php echo $workus; ?>
  </div>
    
     <?php require_once('footer.php') ?>
</body>
</html>
