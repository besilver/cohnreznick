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
</head>

<body>
<?php require_once('left_side.php') ?>
<div id="sideright">
<img src="/<?php echo path_to_theme() ?>/images/country.png" width="244" height="29" alt="Country / Language"  id="country"/>
  <div class="div1 column"   data-jsmodules="homeInsReinsScroll">
    <?php require_once('right_top.php') ?>
    <div class="main_content">
        <div class="share"><a href="#"><img src="/<?php echo path_to_theme() ?>/images/share.png" width="78" height="20" alt="share this button"/></a></div>
      <?php echo $pretext; ?>
      <?php echo $sliderimgtop; ?>
      
      <form name="subscribe" id="subscribe_form">
        <h3>Subscribe/Sign Up for Insights Feature</h3>
        <input type="text" value="Name"/>
        <input type="text" value="Email"/>
        <input type="submit" value="Submit" class="right"/>
      </form>
      <h4>Newsletter</h4>
      <ul class="listing">
   <li>
          <p>Nam libero tempore, cum soluta nobis est eligendi optio 
            cumque nihil impedit quo minus id quod mro tempore, cum 
            soluta nobis est.</p>
          <p><a href="#" class="more">Link Lorem</a></p>
        </li>
      </ul>
      <h4>Practice Brochure</h4>
      <ul class="listing">
        <li>
          <p>Nam libero tempore, cum soluta nobis est eligendi optio 
            cumque nihil impedit quo minus id quod mro tempore, cum 
            soluta nobis est.</p>
          <p><a href="#" class="more">Link Lorem</a></p>
        </li>
      </ul>
      <hr/>
      <h4>Whitepapers</h4>
      <ul class="listing">
        <li> <span class="date"><a href="#">05.07.2012</a></span>
          <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod mro tempore, cum soluta nobis est eligendi.</p>
        </li>
        <li> <span class="date"><a href="#">05.07.2012</a></span>
          <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod mro tempore, cum soluta nobis est eligendi.</p>
        </li>
        
      </ul>
      <hr/>
      <h4>Most Popular</h4>
      <div class="links"> <a href="#" class="more">LINK LOR LINK GOUER RHM</a><br/>
        <a href="#" class="more">LINK LOR LINK GOUER RHM</a><br/>
        <a href="#" class="more">LINK LOR LINK GOUER RHM</a><br/>
      </div>
      <hr/>
      <h4>Recommended Resources</h4>
      <div class="links"> <a href="#" class="more">LINK LOR LINK GOUER RHM</a><br/>
        <a href="#" class="more">LINK LOR LINK GOUER RHM</a><br/>
        <a href="#" class="more">LINK LOR LINK GOUER RHM</a><br/>
      </div>
    </div>
    <?php echo $threehorimg; ?>
  </div>
  <?php echo $workus; ?>
</div>
  <?php require_once('footer.php') ?>
</body>
</html>
