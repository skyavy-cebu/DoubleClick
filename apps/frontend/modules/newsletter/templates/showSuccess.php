  <?php use_helper('Text') ?>
<!-- content -->
<div class="contentWrapper">
  <div class="content">
    <div class="contentLeft">
      <div>
       <div class="contentLeftColumnHeader">???</div>
        <div class="contentLeftColumnContent">
			<ul>
				
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
          <div class="contentContentHeaderLeft">配信日: <?php echo $newsletter->getTitle() ?></div>
          <div class="clear"></div>
          <div class="contentContentHeaderLeft">タイトル： <?php echo $newsletter->getTitle() ?></div>
          <div class="clear"></div>
          <div class="contentContentHeaderLeft">記事：</div>
          <div class="clear"></div>
          <div class="contentContentHeaderLeft">
             <?php echo simple_format_text($newsletter->getContent()) ?>
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