
<!-- content -->
<div class="contentWrapper">
  <div class="content">
    <div class="contentLeft">
      <div>
       <div class="contentLeftColumnHeader">先生一覧</div>
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
                    <div class="contentContentTeacherIntroductionContentHeaderTitle"><?php echo $teachers->getTitle() .'の新着配信' ?></div>
										<div class="contentContentTeacherIntroductionContentHeaderLink"><a href="<?php echo url_for('dashboard-teacher-newsletter',$teachers) ?>">もっと見る</a></div>
                  </div>
                   <div class="contentContentSubscriptionContent">
                    <ul>
											<?php $b=(($i % 2) );?>
											<?php  foreach ($studentteachers as $i => $studentteacher):?>
												<?php if($studentteacher->getTeacherId() == $teachers->getId()):?>
													<?php  foreach ($studentnewsletters as $i => $studentnewsletter):?>
														<?php if($studentteacher->getId() == $studentnewsletter->getId()):?>
															<li>
																<span> <?php echo $studentnewsletter->getPublishDate() ?></span>
																<p>
																<a href="<?php echo url_for('dashboard-newsletter',$studentnewsletter) ?>">
																	<?php echo $studentnewsletter->getTitle() ?>
																</a>
																</p>
															</li>
														<?php endif ?>
													<?php endforeach ?>
												<?php endif ?>
											<?php endforeach ?>
											<?php  foreach ($availableTeachersToSubscribeTo as $i => $teachersToSubscribe):?>
												<?php if($teachersToSubscribe->getId() == $teachers->getId()):?>
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