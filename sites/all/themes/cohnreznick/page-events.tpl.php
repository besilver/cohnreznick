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
  <div class="div1 column" data-jsmodules="homeInsReinsScroll">
    <?php require_once('right_top.php') ?>
    <div class="main_content">
      <div class="share"><a href="#"><img src="/<?php echo path_to_theme() ?>/images/share.png" width="78" height="20" alt="share this button"/></a></div>
      <h1>Events</h1> 
      <?php require_once('part_event_slider.php') ?>
      <hr/>
      <h2>Upcoming Events</h2>
      <ul class="listing">
        <li><img src="/<?php echo path_to_theme() ?>/images/event.jpg" width="108" height="84" alt="Event Name Goes Here" class="left"/><p class="greentext eventname">Event Name Goes Here</p>
          <span class="greentext eventdate">05.07.2012</span>
          <p class="eventtext">Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id.</p>
          <a  href="#" class="more">Link to Registration</a>
        </li>
        <li><img src="/<?php echo path_to_theme() ?>/images/event.jpg" width="108" height="84" alt="Event Name Goes Here" class="left"/><p class="greentext eventname"><p class="greentext eventname">Event Name Goes Here</p>
          <span class="greentext eventdate">05.07.2012</span>
          <p class="eventtext">Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id.</p>
          <a  href="#" class="more">Link to Registration</a>
        </li>
      </ul>
      <hr/>
      <h4>Previous Events</h4>
      <ul class="listing">
        <li><p class="greentext eventname">Event Name Goes Here</p>
          <span class="greentext eventdate">05.07.2012</span>
          <p class="eventtext">Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod mro tempore, cum soluta nobis est eligendi.</p>
          <a  href="#" class="more">More</a>
        </li>
        <li><p class="greentext eventname">Event Name Goes Here</p>
          <span class="greentext eventdate">05.07.2012</span>
          <p class="eventtext">Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod mro tempore, cum soluta nobis est eligendi.</p>
          <a  href="#" class="more">More</a>
        </li>
      </ul>
      <hr/>
      	<ul class="recent_ev_photo">
        	<li><a href="#"><img src="/<?php echo path_to_theme() ?>/images/event2.jpg" width="102" height="74" alt=""/></a></li>
            <li><a href="#"><img src="/<?php echo path_to_theme() ?>/images/event3.jpg" width="102" height="74" alt=""/></a></li>
            <li><a href="#"><img src="/<?php echo path_to_theme() ?>/images/event4.jpg" width="102" height="74" alt=""/></a></li>
            <li><a href="#"><img src="/<?php echo path_to_theme() ?>/images/event5.jpg" width="102" height="74" alt=""/></a></li>
            <li><a href="#"><img src="/<?php echo path_to_theme() ?>/images/event2.jpg" width="102" height="74" alt=""/></a></li>
            <li><a href="#"><img src="/<?php echo path_to_theme() ?>/images/event3.jpg" width="102" height="74" alt=""/></a></li>
            <li><a href="#"><img src="/<?php echo path_to_theme() ?>/images/event4.jpg" width="102" height="74" alt=""/></a></li>
            <li><a href="#"><img src="/<?php echo path_to_theme() ?>/images/event5.jpg" width="102" height="74" alt=""/></a></li>
        </ul>
        <div class="gradient_block" id="event_contact">
        	<img src="/<?php echo path_to_theme() ?>/images/event_contact.jpg" width="178" height="115" alt="" class="right"/>
        	<h3>Event<br/>Contact</h3>
            <p class="greentext"><b><i>John Doe, Title Name Here</i></b></p>
            <p class="small">Tel: +1 202 441-3434<br/>Fax: +1 202 441-3434</p>
            <p class="small email">John Doe@lorenipsum.com</p>
        </div>
      
      
      
    </div>
    <div class="bottom">
      <h2><b>Capabilities</b><br/>
        Helping You Move Forward</h2>
      <p class="bluetext">There are many variations of passages of Lorem Ipsum available, but the mrandomised words which don't look even slightly believable.</p>
      <div class="promo">
        <div class="left"> <img src="/<?php echo path_to_theme() ?>/images/promo_1.png" width="127" height="79" alt=""/> <a href="#" class="greentext">Lorem Ipsm Titling Goes Here </a> </div>
        <div class="left"> <img src="/<?php echo path_to_theme() ?>/images/promo_2.png" width="127" height="79" alt=""/> <a href="#" class="greentext">Lorem Ipsm Titling Goes Here </a> </div>
        <div class="right"> <img src="/<?php echo path_to_theme() ?>/images/promo_3.png" width="127" height="79" alt=""/> <a href="#" class="greentext">Lorem Ipsm Titling Goes Here </a> </div>
      </div>
    </div>
    <?php  echo $psearch; ?>
    <?php echo $workus; ?>
  </div>
  <?php require_once('footer.php') ?>
</body>
</html>
