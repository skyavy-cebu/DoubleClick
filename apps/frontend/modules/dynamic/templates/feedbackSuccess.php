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
       
      
      <div class="contentContentFeedback">
        <div class="contentContentFeedbackHeader">
          お客様の声
        </div>
        <div class="contentContentFeedbackContent">
         
            <ul class="contentContentFeedbackContent">
              <?php  foreach ($feedbacks as $i => $feedback):?>
                <li>
                  <div class="contentContentFeedbackContentHeader">
                    <div class="contentContentFeedbackContentHeaderTitle"><?php echo $feedback->getCustomerName() ?></div>
                    
                    <div class="contentContentFeedbackContentHeaderDate"><?php echo date('Y/m/d',strtotime($feedback->getPublishDate())) ?></div>
                  </div>
                   <div class="contentContentFeedbackContentDetails">
                    <p>
                      <?php echo $feedback->getBody() ?>
                   </p> 
                  </div>
                </li>
              <?php endforeach ?>		
            </ul>
            <div class="clear"></div>
        </div>
      </div>
    </div>
  </div><!-- end-content -->    
    <div class="clear"></div>
</div>
</div><!-- end-contentWrapper -->