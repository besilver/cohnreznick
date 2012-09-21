<?php require_once('functions.php'); ?>

<!--<ul id="main_nav">
<?php
  $menu_items = getMenuItems('primary-links'); 
  foreach ($menu_items as $item) {
  	  if ($item['plid'] == 0) {
  	      $href = $item['link_path'] == "<front>" ? base_path() : base_path() . drupal_get_path_alias($item['link_path']);
		  $child_items = getChildMenuItems($menu_items, $item['mlid']);
		  if(count($child_items) > 2)
		          echo '<li class="menu3col"><a href="'. $href .'">'. $item['link_title'] .'</a>';
		  elseif(count($child_items) == 2)
		          echo '<li class="menu2col"><a href="'. $href .'">'. $item['link_title'] .'</a>';
		  elseif(count($child_items) == 0)
                  echo '<li><a href="'. $href .'">'. $item['link_title'] .'</a></li>';
		  else
		  	      echo '<li><a href="'. $href .'">'. $item['link_title'] .'</a>';
		  if($child_items) {
		  	  echo '<div>'; 
			  foreach($child_items as $child) {
			  	  $vnuk_items = getChildMenuItems($menu_items, $child['mlid']);
			  	  $href = $child['link_path'] == "<front>" ? base_path() : base_path() . drupal_get_path_alias($child['link_path']);
				  echo '<ul class="sub-menu">';
				  if(count($vnuk_items) > 0) {
                        echo '<li class="parent"><a href="'. $href .'">'. $child['link_title'] .'</a></li>';
				        foreach($vnuk_items as $vnuk) {
				        	  $href = $vnuk['link_path'] == "<front>" ? base_path() : base_path() . drupal_get_path_alias($vnuk['link_path']);
							   echo '<li><a href="'. $href .'">'. $vnuk['link_title'] .'</a></li>';
						}
                      
				  }
				  else {
					    echo '<li><a href="'. $href .'">'. $child['link_title'] .'</a></li>';
				  }
				   echo '</ul>';
			  }
			  echo '</div>';
		  }
		  if(count($child_items) > 0)
              echo '</li>';
	  }
  }
?>
</ul>
-->
<ul id="main_nav">
      <li><a href="#">About CohnReznick</a>
        <div>
          <ul class="sub-menu">
            <li><a href="#">Messages from Our CEO's</a></li>
            <li><a href="#">History</a></li>
            <li><a href="#">Facts and Figures</a></li>
            <li><a href="#">Nexia/IGAF/GLOBAL Reach</a></li>
            <li><a href="#">Awards and Recognition</a></li>
            <li><a href="#">In the Comunity</a></li>
            <li><a href="#">Offices</a></li>
            <li><a href="#">Professional Women's Program</a></li>
            <li><a href="#">The CR Experience</a></li>
            <li><a href="#">Alumni</a></li>
            <li><a href="#">CR Affiliated Companies</a></li>
          </ul>
        </div>
      </li>
      <li class="menu3col"><a href="#">Services</a>
        <div>
          <ul class="sub-menu" >
            <li class="parent"><a href="#">Accounting and Assurance</a></li>
            <li><a href="#">Audits, Reviews, and Compilations</a></li>
            <li><a href="#">Employee Benefit Plans</a></li>
            <li><a href="#">IFRS</a></li>
            <li><a href="#">SOC 1,2, and 3/SSAE 16</a></li>
            <li><a href="#">Agreed Upon Procedures (AUPs)</a></li>
            <li><a href="#">Accounting Outsourcing and Consultations</a></li>
            <li><a href="#">Public Company Services</a></li>
            <li><a href="#">IT Audit and Controls Review</a></li>
          </ul>
          <ul class="sub-menu" >
            <li class="parent"><a href="#">Tax</a></li>
            <li><a href="#">Compiliance and Preparation</a></li>
            <li><a href="#">Strategic Tax Planning</a></li>
            <li><a href="#">Corporate Tax Outsourcing</a></li>
            <li><a href="#">Private Clients</a></li>
            <li><a href="#">Federal Tax</a></li>
            <li><a href="#">Trust and Estate</a></li>
            <li><a href="#">International Tax</a></li>
            <li><a href="#">State and Local Tax</a></li>
            <li><a href="#">Mergers and Acquisition Services</a></li>
            <li><a href="#">New Market Tax Credits</a></li>
            <li><a href="#">Tax Speciality Services</a>
              <div>
                <ul class="sub-menu" >
                  <li><a href="#">ASC 740 and ASC 740-10</a></li>
                  <li><a href="#">Lorem Ipsum</a></li>
                  <li><a href="#">Lorem Ipsum</a></li>
                  <li><a href="#">Lorem Ipsum</a></li>
                  <li><a href="#">Lorem Ipsum</a></li>
                  <li><a href="#">Lorem Ipsum</a></li>
                  <li><a href="#">Lorem Ipsum</a></li>
                </ul>
              </div>
            </li>
            <li><a href="#">Tax Credit Advisory</a>
              <div>
                <ul class="sub-menu">
                  <li><a href="#">Energy</a></li>
                  <li><a href="#">Historic Releabilitions</a></li>
                  <li><a href="#">Lorem Ipsum</a></li>
                  <li><a href="#">Lorem Ipsum</a></li>
                  <li><a href="#">Lorem Ipsum</a></li>
                  <li><a href="#">Lorem Ipsum</a></li>
                </ul>
              </div>
            </li>
          </ul>
          <ul class="sub-menu">
            <li class="parent"><a href="#">Advisory</a></li>
            <li><a href="#">Management Consulting (Succession Planing sub; Wealth Management sub)</a></li>
            <li><a href="#">Valuation and Transaction Advisory</a></li>
            <li><a href="#">Goverment (cross link to Industry page)</a></li>
            <li><a href="#">Goverment, Risk and Comliance</a>
              <div>
                <ul class="sub-menu">
                  <li><a href="#">Lorem Ipsum and Lorem Ipsum</a></li>
                  <li><a href="#">Lorem Ipsum Lorem Ipsum </a></li>
                  <li><a href="#">Lorem Ipsum and Lorem Ipsum</a></li>
                  <li><a href="#">Lorem Ipsum and Lorem Ipsum</a></li>
                  <li><a href="#">Lorem Ipsum Lorem Ipsum </a></li>
                  <li><a href="#">Lorem Ipsum and Lorem Ipsum</a></li>
                  <li><a href="#">Lorem Ipsum and Lorem Ipsum</a></li>
                  <li><a href="#">Lorem Ipsum Lorem Ipsum </a></li>
                </ul>
              </div>
            </li>
            <li><a href="#">Business Investigation Services</a>
              <div>
                <ul class="sub-menu">
                  <li><a href="#">Lorem Ipsum and Lorem Ipsum</a></li>
                  <li><a href="#">Lorem Ipsum Lorem Ipsum </a></li>
                  <li><a href="#">Lorem Ipsum and Lorem Ipsum</a></li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
      </li>
      <li><a href="#">People</a></li>
      <li class="menu2col"><a href="#">Industries</a>
        <div>
          <ul class="sub-menu">
            <li><a href="#">Financial Services</a></li>
            <li><a href="#">Technology and New Media</a></li>
            <li><a href="#">Life Sci...</a></li>
            <li><a href="#">....... and Distribution</a></li>
            <li><a href="#">Goverment .....</a></li>
            <li><a href="#">Lorem Ipsum Capital</a></li>
            <li><a href="#">Lorem Ipsum Lending</a></li>
            <li><a href="#">Non-For-Profit</a></li>
            <li><a href="#">Lorem Ipsum Lore</a></li>
            <li><a href="#">Lorem Ipsum lorem</a></li>
            <li><a href="#">Lorem Ipsum Lore</a></li>
            <li><a href="#">Lorem Ipsum Lore</a></li>            
            <li><a href="#">Goverment</a>
              <div>
                <ul class="sub-menu">
                  <li><a href="#">Audit, Accounting &amp; Financial</a></li>
                  <li><a href="#">Compiliance and ...</a></li>
                  <li><a href="#">Lorem Ipsum Lorem Ipsum</a></li>
                  <li><a href="#">Program and Project Management</a></li>
                </ul>
              </div>
            </li>
          </ul>
          <ul class="sub-menu">
            <li><a href="#">Market Sectors</a></li>
            <li><a href="#">Capital Markets</a></li>
            <li><a href="#">Fortune 1000</a></li>
            <li><a href="#">International Business</a></li>
            <li><a href="#">Owner-Operated Companies</a>
              <div>
                <ul class="sub-menu">
                  <li><a href="#">Private Clients and Family Offices</a></li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
      </li>
      <li><a href="#">Insights</a>
        <div>
          <ul class="sub-menu">
            <li><a href="#">Alerts</a></li>
            <li><a href="#">Industry Trends</a></li>
            <li><a href="#">Legislative Updates</a></li>
            <li><a href="#">Newsletters</a></li>
            <li><a href="#">Practice Brochures</a></li>
            <li><a href="#">Speakers Bureau</a></li>
            <li><a href="#">Videos and Webcasts</a></li>
            <li><a href="#">White Papers</a></li>
            <li><a href="#">Economic Insight</a></li>
            <li><a href="#">Joe Torre on Management</a></li>
            <li><a href="#">Press Center</a></li>
            <li><a href="#">Newsletter SignUp</a></li>
            <li><a href="#">Events</a></li>
          </ul>
        </div>
      </li>
      <li><a href="#">Careers</a>
        <div>
          <ul class="sub-menu">
            <li><a href="#">Experienced Professionals</a></li>
            <li><a href="#">University Students</a></li>
            <li><a href="#">In the Community</a></li>
            <li><a href="#">Women @ NewCo</a></li>
            <li><a href="#">Benefits</a></li>
            <li><a href="#">Culture</a></li>
            <li><a href="#">Diversity & Inclusion</a></li>
            <li><a href="#">Message from Firm Leadership</a></li>
            <li><a href="#">Jop Openings</a></li>
            <li><a href="#">Day in the Life</a></li>
            <li><a href="#">Professional Development</a></li>
            <li><a href="#">Working Abroad</a></li>
            <li><a href="#">Recruting Calendar</a></li>
          </ul>
        </div>
      </li>
      <li><a href="">Press Center</a>
        <div>
          <ul class="sub-menu">
            <li><a href="#">In the News</a></li>
            <li><a href="#">Press Releases</a></li>
          </ul>
        </div>
      </li>
      <li><a href="#">Events</a>
        <div>
          <ul class="sub-menu">
            <li><a href="#">Upcoming Events</a></li>
            <li><a href="#">Previous Events</a></li>
            <li><a href="#">CohnReznick in the Marketplace</a></li>
            <li><a href="#">Financial Managers Learning Forum</a></li>
          </ul>
        </div>
      </li>
      <li><a href="#">Contact Us</a></li>
    </ul>

