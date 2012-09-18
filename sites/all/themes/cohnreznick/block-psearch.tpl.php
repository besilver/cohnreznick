   <div id="right_slide_panel_people" class="column"> <img src="/<?php echo path_to_theme() ?>/images/people.png" width="28" height="157" alt="Search Our People" class="slide_btn" id="people_slide_btn"/>
    <div class="column slide_content">
      <div class="inner">
        <h2>Search Our People</h2>
    
        <form id="search_people" name="search_people" method="get">
            <input type="text" name="psearch[name]" value="Name">
          <select name="psearch[location]">
            <option value="">Location</option>
            <?php for($i = 0; $i < count($block->locations); $i++) { ?>
            	 <?php 
            	         if($_GET['psearch']['location'] && $block->locations[$i]->tid == intval($_GET['psearch']['location']))  
						        $selected = 'selected="selected"';
						 else
						    	$selected = '';
				?>
                  	     <option <?php echo $selected?>  value="<?php echo $block->locations[$i]->tid ?>"><?php echo $block->locations[$i]->name ?></option>
            <?php } ?>
          </select>
          <select name="psearch[industry]">
            <option value="">Industry</option>
             <?php for($i = 0; $i < count($block->industries); $i++) { ?>
             	 <?php 
            	         if($_GET['psearch']['industry'] && $block->industries[$i]->tid == intval($_GET['psearch']['industry']))  
						        $selected = 'selected="selected"';
						 else
						    	$selected = '';
				?>
            	 <option  <?php echo $selected?>  value="<?php echo $block->industries[$i]->tid ?>"><?php echo $block->industries[$i]->name ?></option>
            <?php } ?>
          </select>
          <select name="psearch[service]">
            <option value="">Service</option>
            <?php for($i = 0; $i < count($block->services); $i++) { ?>
              	 <?php 
            	         if($_GET['psearch']['service'] && $block->services[$i]->nid == intval($_GET['psearch']['service']))  
						        $selected = 'selected="selected"';
						 else
						    	$selected = '';
				?>           	 
            	 <option  <?php echo $selected?>  value="<?php echo $block->services[$i]->nid ?>"><?php echo $block->services[$i]->title ?></option>
            <?php } ?>
          </select>
          <input type="submit" value="Search"/>
        </form>
        
        <div class="nivoslider-wrapper">
          <div id="nivoSlider" class="nivoSlider" style="height:430px;"> <img src="/<?php echo path_to_theme() ?>/images/nivosliderbig.jpg" alt="" title="#htmlcaption1"/> <img src="/<?php echo path_to_theme() ?>/images/nivosliderbig.jpg" alt="" title="#htmlcaption2" /> <img src="/<?php echo path_to_theme() ?>/images/nivosliderbig.jpg" alt="" title="#htmlcaption3"/> <img src="/<?php echo path_to_theme() ?>/images/nivosliderbig.jpg" alt="" title="#htmlcaption4"/> </div>
        </div>
        <div id="htmlcaption1" class="nivo-html-caption">
          <p><b><i>Titling Here Lorem Ipsum 1</i></b></p>
          <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod mro tempore, cum soluta nobis est. Nam libero tempore, cum soluta nobis.</p>
        </div>
        <div id="htmlcaption2" class="nivo-html-caption">
          <p><b><i>Titling Here Lorem Ipsum 2</i></b></p>
          <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod mro tempore, cum soluta nobis est. Nam libero tempore, cum soluta nobis.</p>
        </div>
        <div id="htmlcaption3" class="nivo-html-caption">
          <p><b><i>Titling Here Lorem Ipsum 3</i></b></p>
          <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod mro tempore, cum soluta nobis est. Nam libero tempore, cum soluta nobis.</p>
        </div>
        <div id="htmlcaption4" class="nivo-html-caption">
          <p><b><i>Titling Here Lorem Ipsum 4</i></b></p>
          <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod mro tempore, cum soluta nobis est. Nam libero tempore, cum soluta nobis.</p>
        </div>
        <div class="search_baner col1 left" style="width:437px;">
        	<img src="/<?php echo path_to_theme() ?>/images/search_people1.png" width="437" height="200" alt=""/>
            <div class="caption">
                    <p><i><b>New Markets Tax Credit Summit 2012</b></i></p>
<p>NMTC Practice Leader Gary Perlow with CDFI Fund Director Donna Gambrell.</p>
<p><a href="#" class="more">READ MORE</a></p>
            </div>
        </div>
        <div class="search_baner col2 right" style="width:234px;">
        	<img src="/<?php echo path_to_theme() ?>/images/search_people2.png" width="234" height="200" alt=""/>
            <div class="caption">
<p><i><b>Real Estate Forum magazine</b></i></p>
<p>Real Estate Forum' magazine Feature.</p>
<p><a href="#" class="more">read more</a></p>
            </div>
        </div>
      </div>
    </div>
  </div>