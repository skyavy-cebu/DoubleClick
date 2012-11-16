
<!-- content -->
<div class="contentWrapper">
  <div class="content">
    <div class="contentLeft">
      
      <div>
        <div class="contentLeftColumnHeader">コラム</div>
        <div class="contentLeftColumnContent">
          <ul>
            <li>
              <span>&nbsp;</span>
              <p>OP先生配信履歴</p>
            </li>
            <li>
              <span>&nbsp;</span>
              <p>CFD先生配信履歴</p>
            </li>
            <li>
              <span>&nbsp;</span>
              <p>シロネコ先生配信履歴</p>
            </li>
            <li>
              <span>&nbsp;</span>
              <p>白虎先生配信履歴</p>
            </li>
            <li>
              <span>&nbsp;</span>
              <p>スイング先生配信履歴</p>
            </li>
          </ul>
        </div>
      </div>  
    </div>
    <div class="contentContent">
   <div>
        <div class="contentContentTeachersHeader">
          先生紹介
        </div>
        <div class="contentContentSubscriptionWrapper">
            <ul class="contentDasboardContent1">
              <table><tr>
              <?php  foreach ($teacherslist as $i => $teacher):?>
              <td>
              <div>
                <li>
                  <div class="contentContentTeacherIntroductionContentHeader">
                    <div class="contentContentTeacherIntroductionContentHeaderTitle"> <?php echo $teacher->getTitle() ?></div>
                    <div class="contentContentTeacherIntroductionContentHeaderLink"><a href="<?php echo url_for('dashboard-teacher-newsletter',$teacher) ?>">詳細を見る</a></div>
                  </div>
                   <div class="contentContentSubscriptionContent">
                    <ul>
                      <?php $b=(($i % 2) );?>
                      <?php foreach ($teacher->getNewsletter() as $i => $newsletter): ?>
                        <li>
                          <span> <?php echo $newsletter->getPublishDate() ?></span>
                          <p>
                            <a href="<?php echo url_for('dashboard-newsletter',$newsletter) ?>">
                              <?php echo $newsletter->getTitle() ?>
                            </a>
                          </p>
                        </li>
                      <?php endforeach ?>
                    </ul> 
                    <div class="clear"></div>
                  </div>
                </li>
              </div>
              </td>
              <?php if ($b == 1) {
                echo "</tr><tr>";
               } 
                ?>
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