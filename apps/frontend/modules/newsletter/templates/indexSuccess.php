<!-- content -->
<div class="contentWrapper">
  <div class="content">
    <div class="contentLeft">
      <div>
       <div class="contentLeftColumnHeader">???</div>
        <div class="contentLeftColumnContent">
			<ul>
				<li>
         トップ
				</li>
        <li>
          <?php foreach ($pager as $newsletter): ?>
            <a href="<?php echo url_for('@delivered-newsletters',$newsletter) ?>">配信履歴一覧</a>
          <?php endforeach; ?>
				</li>
        <li>
         <?php foreach ($pager as $newsletter): ?>
            <a href="<?php echo url_for('@new-newsletter',$newsletter) ?>">配信記事作成</a>
          <?php endforeach; ?>
				</li>
        <li>
         実績更新
				</li>
        <li>
         会員管理
				</li>
        <li>
         アカウント情報変更 名前
				</li>
        </div>
      </div>
      
    </div>
    
    <div class="contentContent">
   <div class="contentContentList">
        <div class="contentContentListHeader">
          配信履歴一覧 
        </div>
        <div class="contentContentListContent">
          <div>
            <ul>
              
              <?php foreach ($pager->getResults() as $newsletter): ?>
               
                <li>
                  <?php echo date('Y/m/d',strtotime($newsletter->getPublishDate())) ?>
                  <a href="<?php echo url_for('delivered-newsletter-detail',$newsletter) ?>"><?php echo $newsletter->getTitle() ?></a>
                </li>
              
               <?php endforeach; ?>
               <?php if ($pager->haveToPaginate()) :?>
                <div id="navv">
                  <?php echo link_to('<<', url_for('@delivered-newsletters?' . '&page=' . $pager->getFirstPage()), 'class="pager"')?>
                  <?php echo link_to('<', url_for('@delivered-newsletters?' . '&page=' . $pager->getPreviousPage()), 'class="pager"' )?>
                    <?php foreach ($pager->getLinks() as $page) :?>
                    <?php echo ($page == $pager->getPage()) ? $page : link_to($page, url_for('@delivered-newsletters?' . '&page=' . $page), 'class="pager"')?>
                    <?php endforeach;?>
                  <?php echo link_to('>', url_for('@delivered-newsletters?' . '&page=' . $pager->getNextPage()),'class="pager"')?>
                  <?php echo link_to('>>', url_for('@delivered-newsletters?' . '&page=' . $pager->getLastPage()), 'class="pager"')?>
                  <?php endif;?>
                </div>
            </ul>
            <div class="clear"></div>
          </div>
        </div>
      </div>
    </div>
  </div><!-- end-content -->    
    <div class="clear"></div>
</div>
</div><!-- end-contentWrapper -->