<?php  if ($teaser) : ?>
	      <li>
	      <?php if($node->field_photo[0]['filepath']) : ?>
	          <a href="<?php echo url("node/$node->nid") ?>"><?php echo getNodeImage($node, 'field_photo', array('width' => 99, 'class' => 'left')) ?></a>
	      <?php else : ?>
	      	  <a href="<?php echo url("node/$node->nid") ?>"><img src="/sites/all/themes/cohnreznick/images/no_photo.jpg" width="99" class="left" /></a>
	      <?php endif; ?>
          <p class="name greentext"><a href="<?php echo url("node/$node->nid") ?>"><?php echo getNodeFieldValue($node, 'field_name') ?></a></p>
          <?php if(getNodeFieldValue($node, 'field_job_title')) : ?>
          <p class="job"><b><?php echo getNodeFieldValue($node, 'field_job_title') ?></b></p>
          <?php endif; ?>
          <p><?php echo getShortText($content,30) ?></p>
          <p><a href="<?php echo url("node/$node->nid") ?>" class="more">More About <?php echo getNodeFieldValue($node, 'field_name') ?></a></p>          
          <div class="gray_icons small left">
          <?php if(getNodeFieldValue($node, 'field_email')) : ?>
             <p><span class="email-icon icon"><?php echo getNodeFieldValue($node, 'field_email') ?></span></p>
          <?php endif; ?>
          <?php if(getNodeFieldValue($node, 'field_phone')) : ?>
          <p><span class="tel-icon icon"><?php echo getNodeFieldValue($node, 'field_phone') ?></span></p>
          <?php endif; ?>
          <p>
          	<?php if(getNodeFieldValue($node, 'field_snet_flink')) : ?><a href="<?php echo url(getNodeFieldValue($node, 'field_snet_flink')) ?>"><span class="facebook-icon icon"></span></a><?php endif; ?>
          	<?php if(getNodeFieldValue($node, 'field_snet_twitter')) : ?><a href="<?php echo url(getNodeFieldValue($node, 'field_snet_twitter')) ?>"><span class="twitter-icon icon"></span></a><?php endif; ?>
          	<?php if(getNodeFieldValue($node, 'field_snet_linkedin')) : ?><a href="<?php echo url(getNodeFieldValue($node, 'field_snet_linkedin')) ?>"><span class="linkedin-icon icon"></span></a><?php endif; ?>
          </p>
          <?php if(getFilePath($node, 'field_vcard')) : ?>
             <p><a href="<?php echo url(getFilePath($node, 'field_vcard')) ?>"><span class="vcard_icon icon">Download vCard</span></a></p>    
          <?php endif; ?>
          </div> 
        </li>
<?php else : ?>
	   <div class="people_contact">
        <p class="clear"></p>
        <?php if($node->field_photo[0]['filepath']) : ?>
                <?php if($node->field_photo) : ?>
	                <?php echo getNodeImage($node, 'field_photo', array('width' => 147, 'class' => 'left')) ?>
	            <?php endif; ?>
	    <?php else : ?>
	    	    <img src="/sites/all/themes/cohnreznick/images/no_photo.jpg" width="147" class="left" />
	    <?php endif; ?>
        <h2><?php echo getNodeFieldValue($node, 'field_name') ?></h2>
        <h4><?php echo getNodeFieldValue($node, 'field_job_title') ?></h4>
        <?php if(getNodeFieldValue($node, 'field_email')) : ?>
             <p class="small"><span class="email-icon icon"><?php echo getNodeFieldValue($node, 'field_email') ?></span></p><br/>
        <?php endif; ?>
        <?php if(getNodeFieldValue($node, 'field_phone')) : ?>
             <p class="small"><span class="tel-icon icon"><?php echo getNodeFieldValue($node, 'field_phone') ?></span></p><br/>
         <?php endif; ?>

        <p class="small">
         	<?php if(getNodeFieldValue($node, 'field_snet_flink')) : ?><a href="<?php echo url(getNodeFieldValue($node, 'field_snet_flink')) ?>"><span class="facebook-icon icon"></span></a><?php endif; ?>
          	<?php if(getNodeFieldValue($node, 'field_snet_twitter')) : ?><a href="<?php echo url(getNodeFieldValue($node, 'field_snet_twitter')) ?>"><span class="twitter-icon icon"></span></a><?php endif; ?>
          	<?php if(getNodeFieldValue($node, 'field_snet_linkedin')) : ?><a href="<?php echo url(getNodeFieldValue($node, 'field_snet_linkedin')) ?>"><span class="linkedin-icon icon"></span></a><?php endif; ?>
        </p>
        <br/>
        <?php if(getFilePath($node, 'field_vcard')) : ?>
           <p class="small"><a href="/<?php echo url(getFilePath($node, 'field_vcard')) ?>"><span class="vcard_icon icon">Download vCard</span></a></p>    
        <?php endif; ?>
      </div>
      
      <?php if(getNodeFieldValue($node, 'field_profaffil')) : ?>
      <p class="greentext"><b><i>Professional Affiliations:</i></b></p>
      <?php $profaffil = explode("\n", getNodeFieldValue($node, 'field_profaffil')); ?>
      <ul class="orange_boolet lower">
      <?php foreach($profaffil as $item) : ?>
        <li><?php echo $item; ?></li>
       <?php endforeach; ?>
      </ul>
      <?php endif; ?>
      <p class="lower"><?php echo $content ?></p>
      
      <div id="contact_us_form">
      	<div id="contact_us_slide_btn"><a href="#">Contact Us</a></div>
        <form id="contact_us" name="contact_us">
        <input type="text" name="name" value="Name"/>
        <input type="text" name="email" value="Email"/>
        Phone <input type="text" class="ph1"/> - <input type="text" class="ph2"/> - <input type="text" class="ph3"/>
        <textarea>Comments...</textarea>
        <!--<input type="submit" value="Submit" class="right"/>-->
        </form>
      </div>
<?php endif; ?>
