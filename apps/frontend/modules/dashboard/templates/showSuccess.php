  <?php use_helper('Text') ?>
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
        <div class="contentContentNewsletterContent">
         <div>
          <div class="contentContentHeaderLeft"><h1>配信日: <?php echo $newsletters->getPublishDate() ?></h1></div>
          <div class="clear"></div>
          <div class="contentContentHeaderLeft"><h1>タイトル： <?php echo $newsletters->getTitle() ?></h1></div>
          <div class="clear"></div>
          <div class="contentContentHeaderLeft"><h1>記事： </h1></div>
          <div class="clear"></div>
          <div class="contentContentHeaderLeft">
             <?php echo simple_format_text($newsletters->getContent()) ?>
          </div>
            <div class="clear"></div>
        </div>
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