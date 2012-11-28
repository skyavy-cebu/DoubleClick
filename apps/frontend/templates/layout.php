<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
  </head>
  <body>
    <!-- header -->
    <div class="headerWrapper">
      <div class="header">
        <div class="headerLeft">
          <h3>投資のことなら暁投資顧問</h3>
          <a href="<?php echo url_for('@home')?>"><img src="/images/header-logo.png" alt="Akatsuki" alt="Akatsuki" /></a>
        </div>
        
        <ul>
          <li><a href="<?php echo url_for('static/aboutCompany')?>" alt="About Company" title="About Company">会社概要</a></li>
          <li><a href="<?php echo url_for('static/privacyPolicy')?>" alt="Privacy Policy" title="Privacy Policy">プライバシーポリシー</a></li>
          <li><a href="<?php echo url_for('static/contract')?>" alt="Contract" title="Contract">契約前事前交付書面</a></li>
          <li><a href="<?php echo url_for('static/userPolicy')?>" alt="User Policy" title="User Policy">利用規約</a></li>
        </ul>
        
        <div class="header-right">
          <div>
            <h3>お電話でのお問い合わせ</h3>
            <h2>03-1234-5678</h2>
            <h4>AM9:00-PM5:00 <span>[土日・祝祭日を除く]</span></h4>
          </div>
          <a href="/" alt="" title=""></a>
        </div>
      </div>
    </div><!-- end-header -->
    
    <div class="naviWrapper">
      <div class="navi">
        <ul>
          <li><a href="<?php echo url_for('@home')?>" alt="" title="" class="navi-1"></a></li>
          <li><a href="<?php echo url_for('static/aboutUs')?>" alt="" title="" class="navi-2"></a></li>
          <li><a href="<?php echo url_for('@register')?>" alt="" title="" class="navi-3"></a></li>
          <li><a href="<?php echo url_for('@feedback')?>" alt="" title="" class="navi-4"></a></li>
          <li><a href="<?php echo url_for('@teacher-introduction')?>" alt="" title="" class="navi-5"></a></li>
          <li><a href="<?php echo url_for('static/faq')?>" alt="" title="" class="navi-6"></a></li>
          <li><a href="<?php echo url_for('@contact')?>" alt="" title="" class="navi-7"></a></li>
        </ul>
      </div>
    </div>
    
    <div class="mainBodyWrapper">
      <div class="mainBody"><?php echo $sf_content ?></div>
    </div>
    
    <!-- footer -->
    <div class="footerWrapper">
      <div class="footer">
        <ul class="footerLinks1">
          <li><a href="/" alt="" title="">ホーム</a></li>
          <li><a href="/" alt="" title="">RSS</a></li>
          <li><a href="/" alt="" title="">特定商取引に関する表記</a></li>
          <li><a href="/" alt="" title="">会社案内</a></li>
        </ul>
        
        <ul class="footerLinks2">
          <li><a href="/" alt="" title="">プライバシーポリシー</a></li>
          <li><a href="/" alt="" title="">個人情報保護方針</a></li>
          <li><a href="/" alt="" title=""> サイトマッフ</a></li>
        </ul>
        
        <div class="footerRight">
          <div class="footerRightInfo">
            <img src="/images/footer-logo.png" />
            <p>運営会社:株式会社ダブルクリック</p>
            <p>住所  :東京都中野区1-1-1</p>
            <p>関東財務局長(金商)第2654号</p>
            <p>会員番号:00000000000</p>
          </div>
          <img src="/images/footer-verisign.png" class="footerVerisign" />
        </div>
        
        <p>2012 暁投資顧問 All rights reserved.</p>
      </div>
    </div><!-- end-footer -->
  </body>
</html>