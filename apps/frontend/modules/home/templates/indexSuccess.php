<div class="visualWrapper">
  <div class="visual">
    <div class="visualContent">
      <h1>お客様の資産運用ニーズにお応えするため、<br />我々は挑戦し続けます。</h1>
    </div>
  </div>
</div>

<!-- content -->
<div class="contentWrapper">
  <div class="content">
    <div class="contentLeft">
      <a href="<?php echo url_for('@register') ?>" alt="" title=""><img src="/images/content-signup.png" alt="" title=""></a>
      
      <div class="contentLeftLogin">
        <div class="contentLeftLoginHeader">会員ログイン</div>
        <div class="contentLeftLoginContent">
          <form action="<?php echo url_for('@login')?>" method="POST">
            <div><?php echo $loginForm['email']->render(array('placeholder' => 'メールアドレス'))?></div>
            <div><?php echo $loginForm['password']->render(array('placeholder' => 'パスワード'))?></div>
            
            <!--input type="checkbox" /><span>次回から自動的にログイン</span-->
            <?php echo $loginForm->renderHiddenFields()?>
            <input type="submit" value="">
          </form>
          
          <a href="<?php echo url_for('@remind-password')?>" alt="" title="Password Reminder"><?php echo __('Forgot your password?')?></a>
          
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
      <div class="contentContentAbout">
        <div class="contentContentAboutHeader">
          暁投資顧問とは?
        </div>
        <div class="contentContentAboutContent">
          <p>簡単な説明文が入ります。簡単な説明文が入ります。簡単な説明文が入ります。簡単な説 明文が入ります。簡単な説明文が入ります。簡単な説明文が入ります。簡単な説明文が入 ります。簡単な説明文が入ります。簡単な説明文が入ります。</p>
          <a href="" alt="" title=""></a>
        </div>
      </div>
      
      <div class="contentContentMenu">
        <div class="contentContentMenuHeader">
          暁投資顧問メニュー
        </div>
        <div class="contentContentMenuContent">
          <div>
            <ul class="contentContentMenuContent1">
              <li><a href="<?php echo url_for('@page1?id=1')?>" alt="" title="">
                <h3>オプションとは?</h3>
                <h5>オプション取引の基礎知識</h5>
              </a></li>
              <li><a href="<?php echo url_for('@page2?id=2')?>" alt="" title="">
                <h3>先物とは?</h3>
                <h5>将来の株価指数の動きを予想する</h5>
              </a></li>
              <li><a href="<?php echo url_for('@page3?id=3')?>" alt="" title="">
                <h3>FXとは?</h3>
                <h5>為替取引の仕組みや特徴、FXについて</h5>
              </a></li>
            </ul>
            <ul class="contentContentMenuContent2">
              <li><a href="<?php echo url_for('@page4?id=4')?>" alt="" title="">
                <h3>CFDとは?</h3>
                <h5>ＣＦＤの基礎知識と魅力</h5>
              </a></li>
              <li><a href="<?php echo url_for('@page5?id=5')?>" alt="" title="">
                <h3>株式取引とは?</h3>
                <h5>株式取引について</h5>
              </a></li>
              <li><a href="<?php echo url_for('@page6?id=6')?>" alt="" title="">
                <h3>Q&Aはこちら</h3>
                <h5>よくあるご質問</h5>
              </a></li>
            </ul>
            <div class="clear"></div>
          </div>
        </div>
      </div>
      
      <div class="contentContentNews">
        <div class="contentContentNewsHeader">
          経済ニュース
        </div>
        <div class="contentContentNewsContent">
          <ul>
            <li>
              <span>2012.10.02</span>
              <p>東証大引け、景気懸念で8800円割れ</p>
            </li>
            <li>
              <span>2012.10.02</span>
              <p>東証大引け、景気懸念で8800円割れ</p>
            </li>
            <li>
              <span>2012.10.02</span>
              <p>東証大引け、景気懸念で8800円割れ</p>
            </li>
            <li>
              <span>2012.10.02</span>
              <p>東証大引け、景気懸念で8800円割れ</p>
            </li>
            <li>
              <span>2012.10.02</span>
              <p>東証大引け、景気懸念で8800円割れ</p>
            </li>
          </ul>
          <div class="clear"></div>
        </div>
      </div>
      
      <div class="contentContentBlog">
        <div class="contentContentBlogHeader">
          投資関連最新ブログ記事
        </div>
        <div class="contentContentBlogContent">
          <ul>
            <li>
              <span>OP先生ブログ 2012.10.02</span>
              <p>投資関連最新ブログ記事</p>
            </li>
            <li>
              <span>CFD先生ブログ 2012.10.02</span>
              <p>東証大引け、景気懸念で8800円割れ</p>
            </li>
            <li>
              <span>シロネコ先生ブログ 2012.10.02</span>
              <p>東証大引け、景気懸念で8800円割れ</p>
            </li>
            <li>
              <span>白虎先生ブログ 2012.10.02</span>
              <p>東証大引け、景気懸念で8800円割れ</p>
            </li>
            <li>
              <span>スイング先生ブログ 2012.10.02</span>
              <p>東証大引け、景気懸念で8800円割れ</p>
            </li>
          </ul>
          <div class="clear"></div>
        </div>
      </div>
      <div class="clear"></div>
      
      <div class="contentContentLatestColumn">
        <div class="contentContentLatestColumnHeader">
          <div class="contentContentLatestColumnHeaderTitle">最新コラム</div>
          <div class="contentContentLatestColumnHeaderLink"><a alt="See more" href="">もっと見る</a></div>
        </div>
        <div class="contentContentLatestColumnContent">
          <ul>
            <li>
              <span>2012.10.02</span>
              <p> コラムタイトル</p>
            </li>
            <li>
              <span>2012.10.02</span>
              <p> コラムタイトル</p>
            </li>
            <li>
              <span>2012.10.02</span>
              <p> コラムタイトル</p>
            </li>
            <li>
              <span>2012.10.02</span>
              <p> コラムタイトル</p>
            </li>
            <li>
              <span>2012.10.02</span>
              <p> コラムタイトル</p>
            </li>
          </ul>
          <div class="clear"></div>
        </div>
      </div>
       <div class="clear"></div>
      <div class="contentContentTeachers">
        <div class="contentContentTeachersHeader">
          先生の実績
        </div>
        <div class="contentContentTeachersContent">
           <table><tr>
           <?php  foreach ($teacherslist as $i => $teachers):?>
           <td>
            <ul class="contentContentTeachersContent1">
              <li>
                 <?php $b=(($i % 2) );?>
                <img src="/images/teachers-no-image.png" />
                <h3><?php echo $teachers->getTitle() ?></h3>
                <h5><?php echo truncate_text($teachers['details'], 50); ?></h5>
                <h5><span> <a href="<?php echo url_for('@teacher-details?id=' . $teachers['id'])?>" alt="" title="">詳しく見る</a></span></h5>
              </li>
              </td>
              <?php if ($b == 1):?> 
                </tr><tr >
               <?php endif ?>
              <?php endforeach ?>
              </tr>
              </table>
            <div class="clear"></div>
        </div>
      </div>
    </div>
    

    
    <div class="clear"></div>
  </div>
</div><!-- end-content -->


<div class="bannersWrapper">
  <div class="banners">
    <a href="" title="" alt=""><img src="/images/banner-finance.png" title="" alt="" /></a>
    <a href="" title="" alt=""><img src="/images/banner-association.png" title="" alt="" /></a>
    <a href="" title="" alt=""><img src="/images/banner-minus-6.png" title="" alt="" /></a>
    <a href="" title="" alt=""><img src="/images/banner-eco.png" title="" alt="" /></a>
  </div>
</div>