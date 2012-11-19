
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
   <div>
        <div class="contentContentTeachersHeader">
          マイページトップ
        </div>
        <div class="contentContentSubscriptionWrapper">
            <ul class="contentDasboardContent1">
              <table><tr>
              <?php  foreach ($teacherslist as $i => $teachers):?>
              <td><br>
                <li>
                  <div class="contentContentTeacherIntroductionContentHeader">
                    <div class="contentContentTeacherIntroductionContentHeaderTitle"><?php echo $teachers->getTitle() ?></div>
                    <?php $b=(($i % 2) );?>
                    <?php  foreach ($studentteachers as $i => $studentteacher):?>	
                      <?php IF ($teachers['id'] == $studentteacher['id']):?>
                        <div class="contentContentTeacherIntroductionContentHeaderLink"><a href="<?php echo url_for('dashboard-teacher-newsletter',$teachers) ?>">もっと見る</a></div>
                      <?php endif ?>		
                    <?php endforeach ?>
                  </div>
                   <div class="contentContentSubscriptionContent">
                    <ul>                  
					  <?php  foreach ($studentteachers as $i => $studentteacher):?>
              <?php  foreach ($studentnewsletters as $y => $studentnewsletter):?>	
                <?php foreach ($teachers->getNewsletter() as $i => $newsletterlist):?> 
                  <?php if ($teachers['id'] == $studentteacher['id']):?>
                    <?php if ($newsletterlist->getID() == $studentnewsletter['newsletter_id']):?>
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
						<?php IF ($teachers['id'] == $studentforsubscribeteacher['id']):?>						
							<div class="contentContentSubscribeContent">
								<a title="" alt="" href=""></a>
							</div>
						<?php endif ?>
					<?php endforeach ?>
                    </ul> 
                    <div class="clear"></div>
                  </div>
                </li>           
              </td>
              <?php if ($b == 1):?> 
                </tr><tr class="newsletterlist">
               <?php endif ?>              
              <?php endforeach ?>
              </tr>
              </table>
            </ul>
            <div class="clear"></div>
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