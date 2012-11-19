
<!-- content -->
<div class="contentWrapper">
  <div class="content">
    <div class="contentLeft">
      <div>
       <div class="contentLeftColumnHeader">???</div>
        <div class="contentLeftColumnContent">
			<ul>
				<?php  foreach ($teacherslist as $i => $teachers):?>
					<li>
					  <span>&nbsp;</span>
					  <p>
						<a href="<?php echo url_for('dashboard-teacher-newsletter',$teachers) ?>">
						  <?php echo $teachers->getTitle() ?>
						</a>
					  </p>
					</li>
				<?php endforeach ?>
			</ul>
        </div>
      </div>  
    </div>
    <div class="contentContent">
   <div class="contentContentList">
        <div class="contentContentListHeader">
          <?php echo $teacher->getTitle() ?>
        </div>
        <div class="contentContentListContent2">
		<ul>
			<?php  foreach ($studentteachers as $i => $studentteacher):?>
        <?php  foreach ($studentnewsletters as $y => $studentnewsletter):?>
          <?php foreach ($teacher->getNewsletter() as $i => $newsletterlist):?> 
            <?php if ($teacher['id'] == $studentteacher['id']):?>
						<?php if ($newsletterlist->getID() == $studentnewsletter['newsletter_id'] AND ($studentnewsletter['student_id'] == $user->getId())):?>
                <li>
                  <span> <?php echo $newsletterlist->getPublishDate() ?></span>
                  <p>
                  <a href="<?php echo url_for('dashboard-newsletter',$newsletterlist) ?>">
                    <?php echo $newsletterlist->getTitle() ?>
                  </a>
                  </p>
                </li>
              <?php endif ?>
            <?php endif ?>		
          <?php endforeach ?>
        <?php endforeach ?>
			<?php endforeach ?>
			<?php  foreach ($studentforsubscribeteachers as $i => $studentforsubscribeteacher):?>
				<?php IF ($teacher['id'] != $studentforsubscribeteacher['id']):?>
					<div class="contentContentSubscribeContent">
						<a title="" alt="" href=""></a>
					</div>
				<?php endif ?>
			<?php endforeach ?>
            <div class="clear"></div>
		</ul>
        </div>
      </div>
    </div><!-- end Contentcontent -->
    <div class="clear"></div>
  </div><!-- end content -->
</div><!-- end-contentWrapper -->


<div class="bannersWrapper">
  <div class="banners">
    <a href="" title="" alt=""><img src="/images/banner-finance.png" title="" alt="" /></a>
    <a href="" title="" alt=""><img src="/images/banner-association.png" title="" alt="" /></a>
    <a href="" title="" alt=""><img src="/images/banner-minus-6.png" title="" alt="" /></a>
    <a href="" title="" alt=""><img src="/images/banner-eco.png" title="" alt="" /></a>
  </div>
</div>