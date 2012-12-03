<!-- content -->
<div class="contentWrapper">
  <div class="content">

    <div class="contentContent">
    <div class="contentContentOption">
      <?php if ($page) : ?>
        <div class="contentContentOptionHeader">
           <?php echo $page->getTitle() ?>
        </div>
        <div class="contentContentOptionContent">
          <div class="contentContentOptionContentDetails">
            <p>CFDといは？の原稿が入ります。CFDといは？の原稿が入ります。CFDといは？の原稿が入ります。CFDといは？の原稿が入ります。CFDといは？の原稿が入ります。CFDといは？の原稿が入ります。CFDといは？の原稿が入ります。CFDといは？の原稿が入ります。CFDといは？の原稿が入ります。</p> 
          </div>
            <ul class="contentContentOptionDetails">
             <li>
              チャート①
              <div class="contentContentOptionContentDetails">
               <img src="/uploads/page/<?php echo (empty($page['image1'])) ? 'default.png' : $page['image1']; ?>"/>
              </div>
             </li>
             <li>
              利益
              <div class="contentContentOptionContentDetails">
                <p><?php echo $page->getBody() ?></p>
              </div>
             </li>
             <li>
              チャート②
              <div class="contentContentOptionContentDetails">
               <img src="/uploads/page/<?php echo (empty($page['image2'])) ? 'default.png' : $page['image2']; ?>"/>
              </div>
             </li>
             <li>
              説明
              <div class="contentContentOptionContentDetails">
                <p> <?php echo $page->getBody() ?></p>
              </div>
             </li>
            </ul>
            <div class="clear"></div>
        </div>
      </div>
    <?php else : ?>
    <h1>Not in the database</h1>
    <?php endif ?>
    </div>
  </div><!-- end-content -->    
    <div class="clear"></div>
</div>
</div><!-- end-contentWrapper -->