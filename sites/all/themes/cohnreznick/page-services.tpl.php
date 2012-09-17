<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE9" />
		<?php print $head ?>
		<title><?php print $head_title ?></title>
		<?php print $styles ?>
		<?php print $scripts ?>
		<link href="/<?php echo path_to_theme() ?>/css/jquery-ui-1.8.23.custom.css" rel="stylesheet" type="text/css" />
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
		<script src="/<?php echo path_to_theme() ?>/js/jquery.ui.core.min.js" type="text/javascript"></script>
		<script src="/<?php echo path_to_theme() ?>/js/jquery.cookie.js" type="text/javascript"></script>
		<script src="/<?php echo path_to_theme() ?>/js/jquery.ui.widget.min.js" type="text/javascript"></script>
		<script src="/<?php echo path_to_theme() ?>/js/jquery.ui.tabs.min.js" type="text/javascript"></script>
</head>

<body class="generic-layout">
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
      <?php echo $pretext; ?>
      <div class="tabs">
      <ul>
		<li><a href="#tabs-1">Accounting & Assurance</a></li>
		<li><a href="#tabs-2">Tax Lorem Ipsum</a></li>
		<li><a href="#tabs-3">Advisory</a></li>
	</ul>
	<div id="tabs-1">		
        <div class="left" style="width:55%; margin-right:20px;">
        <h4>Headline Goes Here</h4>
        <ul class="listing">
        	<li>
            	<p><a href="#" class="more">05.07.2012</a></p>
                <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod mro tempore.</p>
            </li>
            <li>
            	<p><a href="#" class="more">05.07.2012</a></p>
                <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod mro tempore.</p>
            </li>
        </ul>
        <h4>Headline Goes Here</h4>
        <ul class="listing">
        	<li>
            	<p><a href="#" class="more">05.07.2012</a></p>
                <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod mro tempore.</p>
            </li>
            <li>
            	<p><a href="#" class="more">05.07.2012</a></p>
                <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod mro tempore.</p>
            </li>
            <li>
            	<p><a href="#" class="more">05.07.2012</a></p>
                <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod mro tempore.</p>
            </li>
        </ul>
        </div>
        <div class="right" style="width:270px;">
        	<img src="/<?php echo path_to_theme() ?>/images/service.jpg" width="268" height="197" alt="" class="margin_b10"/>
            <p class="margin_b5"><span class="greentext"><i><b>Real Estate Forum magazine</b></i></span></p>
            <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo.<br/><a href="#" class="more">read more</a></p>
            <h4>Related Articles:</h4>
            <div class="links">
			<a href="#" class="more">LINK LOR LINK GOUER RHM</a><br/>
			<a href="#" class="more">LINK LOR LINK GOUER RHM</a>
            </div>
        </div>
        <div class="clear"></div>
	</div>
	<div id="tabs-2">
		<p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.</p>
	</div>
	<div id="tabs-3">
		<p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
		<p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
	</div>
      </div>
    </div>
    
    <div class="bottom">
      <h2><b>Capabilities</b><br/>
        Helping You Move Forward</h2>
      <p class="bluetext">There are many variations of passages of Lorem Ipsum available, but the mrandomised words which don't look even slightly believable.</p>
      <div class="promo">
        <div class="left"> <img src="/<?php echo path_to_theme() ?>/images/promo_1.png" width="147" alt=""/> <a href="#" class="greentext">Lorem Ipsm Titling Goes Here </a> </div>
        <div class="left"> <img src="/<?php echo path_to_theme() ?>/images/promo_2.png" width="147" alt=""/> <a href="#" class="greentext">Lorem Ipsm Titling Goes Here </a> </div>
        <div class="left"> <img src="/<?php echo path_to_theme() ?>/images/promo_2.png" width="147" alt=""/> <a href="#" class="greentext">Lorem Ipsm Titling Goes Here </a> </div>
        <div class="right"> <img src="/<?php echo path_to_theme() ?>/images/promo_3.png" width="147" alt=""/> <a href="#" class="greentext">Lorem Ipsm Titling Goes Here </a> </div>
      </div>
    </div>
  </div>
  
  <?php echo $workus; ?>
</div>
  <?php require_once('footer.php') ?>
</body>
</html>
