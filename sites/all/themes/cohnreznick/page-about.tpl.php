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
<?php require_once('left_side.php') ?>
<div id="sideright">
<img src="/<?php echo path_to_theme() ?>/images/country.png" width="244" height="29" alt="Country / Language"  id="country"/>
  <div class="div1 column" data-jsmodules="homeInsReinsScroll">
    <div class="top">
      <ul class="top_menu">
        <li><a href="#" class="active">all website content</a></li>
        <li><a href="#">people directory</a></li>
        <li><a href="#">insights library</a></li>
      </ul>
      <form name="search" method="post" id="search">
        <input type="text" />
        <input type="button" value="Search"/>
      </form>
    </div>
    <div class="main_content">
      <div class="share"><a href="#"><img src="/<?php echo path_to_theme() ?>/images/share.png" width="78" height="20" alt="share this button"/></a></div>
      <?php echo $pretext; ?>
      <hr />
      <?php echo $jcarousel; ?>
      <h2>Message From Co-CEOs</h2>
      <p class="bluetext" style="font-style: normal; font-size:14px;">Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search.</p>
      
      <div class="quoteslider-wrapper">
        <div id="quote_nivoSlider" class="nivoSlider">
         <img src="/<?php echo path_to_theme() ?>/images/quote1.jpg" alt="" title="#author1"/> 
         <img src="/<?php echo path_to_theme() ?>/images/quote1.jpg" alt="" title="#author2"/> 
         <img src="/<?php echo path_to_theme() ?>/images/quote1.jpg" alt="" title="#author3"/>
        </div>
      </div>
      <div id="author1" class="nivo-html-caption">        
      	<p>1"There are many variations of passages of Lorem Ipsum avable.ed alteration in some form."</p>
        <span class="person_name">PERSONS NAME HERE</span>
        <span class="person_job">Job Title Herea</span>
        <span class="context">Context of Why They Said it</span>
      </div>
      <div id="author2" class="nivo-html-caption">      	
      	<p>2"There are many variations of passages of Lorem Ipsum avable.ed alteration in some form."</p>
        <span class="person_name">PERSONS NAME HERE</span>
        <span class="person_job">Job Title Herea</span>
        <span class="context">Context of Why They Said it</span>
      </div>
      <div id="author3" class="nivo-html-caption">      	
      	<p>3"There are many variations of passages of Lorem Ipsum avable.ed alteration in some form."</p>
        <span class="person_name">PERSONS NAME HERE</span>
        <span class="person_job">Job Title Herea</span>
        <span class="context">Context of Why They Said it</span>
      </div>
      <hr />
      <ul class="listing">
       <?php echo $content; ?>
      </ul>
    </div>
    <?php echo $threehorimg; ?>
  </div>
  <?php echo $workus; ?>
</div>
<?php require_once('footer.php'); ?>
</body>
</html>
