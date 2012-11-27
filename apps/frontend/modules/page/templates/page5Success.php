<!-- content -->
<div class="contentWrapper">
  <div class="content">
    <div class="contentLeft">
      <a href="" alt="" title=""><img src="/images/content-signup.png" alt="" title=""></a>
      
      <div class="contentLeftLogin">
        <div class="contentLeftLoginHeader">会員ログイン</div>
        <div class="contentLeftLoginContent">
          <div><input type="text" placeholder="メールアドレス" /></div>
          <div><input type="text" placeholder="パスワード" /></div>
          
          <input type="checkbox" /><span>次回から自動的にログイン</span>
          <input type="submit" value="">
          
          <a href="" alt="" title="">パスワードを忘れた方</a>
        </div>
      </div>
      
      <div class="contentLeftColumn">
        <div class="contentLeftColumnHeader">コラム</div>
        <div class="contentLeftColumnContent">
          <ul>
            <li>
              <span>2012.10.02</span>
              <p>暁投資顧問定期コラム Vol. 5</p>
            </li>
            <li>
              <span>2012.10.02</span>
              <p>暁投資顧問定期コラム Vol. 4</p>
            </li>
            <li>
              <span>2012.10.02</span>
              <p>暁投資顧問定期コラム Vol. 3</p>
            </li>
            <li>
              <span>2012.10.02</span>
              <p>暁投資顧問定期コラム Vol. 2</p>
            </li>
            <li>
              <span>2012.10.02</span>
              <p>暁投資顧問定期コラム Vol. 1</p>
            </li>
          </ul>
        </div>
      </div>
      
      <a href="" alt="" title="" class="contentLeftLoad"><img src="/images/content-load.png" alt="" title=""></a>
      <a href="" alt="" title="" class="contentLeftReason"><img src="/images/content-reason.png" alt="" title=""></a>
      
      <div class="contentLeftMenu">
        <ul>
          <li><a href="" alt="" title="" class="contentLeftMenu1"><span>法令順守</span></a></li>
          <li><a href="" alt="" title="" class="contentLeftMenu2"><span>利用規約</span></a></li>
          <li><a href="" alt="" title="" class="contentLeftMenu3"><span>契約前事前交付書面</span></a></li>
        </ul>
      </div>
    </div>
    
    <div class="contentContent">
    <div class="contentContentOption">
        <div class="contentContentOptionHeader">
           <?php echo $page->getTitle() ?>
        </div>
        <div class="contentContentOptionContent">
          <div class="contentContentOptionContentDetails">
            <p>株式取引とは? 文書が含まれています。株式取引とは? 文書が含まれています。株式取引とは? 文書が含まれています。株式取引とは? 文書が含まれています。株式取引とは? 文書が含まれています。</p> 
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
    </div>
  </div><!-- end-content -->    
    <div class="clear"></div>
</div>
</div><!-- end-contentWrapper -->