
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
   <div class="contentContentList">
        <div class="contentContentListHeader">
          <?php echo $teacher->getTitle() ?>
        </div>
        <div class="contentContentListContent2">
              <?php foreach ($teacher->getNewsletter() as $i => $newsletter): ?>
              <ul>
                <li>
                  <span> <?php echo $newsletter->getPublishDate() ?></span>
                  <p>
                    <a href="<?php echo url_for('dashboard-newsletter',$newsletter) ?>">
                      <?php echo $newsletter->getTitle() ?>
                    </a>
                  </p>
                </li>
                </ul> 
              <?php endforeach ?>
            
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