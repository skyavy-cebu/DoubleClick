<?php

/**
 * auth actions.
 *
 * @package    DOUBLECLICK
 * @subpackage login
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class authActions extends sfActions
{
 /**
  * Executes login action
  *
  * @param sfRequest $request A request object
  */
  public function executeLogin(sfWebRequest $request)
  {
    // $this->setLayout('layoutLogin');
    
    if ($this->getUser()->isAuthenticated())
    {
      $this->redirect('@dashboard');
    }
    $this->form = new LoginForm();
    
    if ($request->isMethod('post'))
    {
      $login = $request->getParameter('login');
      $this->form->bind($login);
      
      if ($this->form->isValid())
      {
        $oStudent = StudentTable::getInstance()->findOneByEmail($login['email']);
        
        $this->getUser()->signIn('student', $oStudent);
        
        $this->redirect('@dashboard');
      }
    }
  }
  
 /**
  * Executes remind password action
  *
  * @param sfRequest $request A request object
  */
  public function executeLogout(sfWebRequest $request)
  {
    $this->forward404Unless($this->getUser()->isAuthenticated());
    $this->getUser()->signOut();
    
    $this->redirect('home');
  }
  
 /**
  * Executes remind password action
  *
  * @param sfRequest $request A request object
  */
  public function executeRemindPassword(sfWebRequest $request)
  {
    $this->showForm = true;
    $this->form = new PasswordReminderForm();
    
    if ($request->isMethod('post'))
    {
      $passwordReminder = $request->getParameter('password-reminder');
      $this->form->bind($passwordReminder);
      
      if ($this->form->isValid())
      {
        $this->showForm = false;
        $activation = md5(md5(time()).sfConfig::get('app_system_salt'));
        
        $oStudent = StudentTable::getInstance()->findOneByEmail($passwordReminder['email']);
        $oStudent->setActivation($activation);
        $oStudent->save();
        
        // send activation mail
        $message = $this->getMailer()->compose(
          /* from */
          array('admin@doubleclick.co.jp' => 'DoubleClick Admin'),
          /* to */
          $oStudent->getEmail(),
          /* subject */
          'パスワードを忘れた方へ',
          /* body */
          <<<EOF
以下のURLをクリックして、パスワードを変更出来ます。

{$this->getController()->genUrl('@change-password?code='.$activation, true)}

-------------------------------
DoubleClick
{$this->getController()->genUrl('@home', true)}
EOF
        );
        
        $this->getMailer()->send($message);
      }
    }
  }
  
 /**
  * Executes change password action
  *
  * @param sfRequest $request A request object
  */
  public function executeChangePassword(sfWebRequest $request)
  {
    $this->forward404Unless($this->code = $request->getParameter('code'));
    $this->forward404Unless($oStudent = StudentTable::getInstance()->findOneByActivation($this->code));
    
    $this->showForm = true;
    $this->form = new ChangePasswordForm(null, array('code' => $this->code));
    
    if ($request->isMethod('post'))
    {
      $changePassword = $request->getParameter('change-password');
      $this->form->bind($changePassword);
      
      if ($this->form->isValid())
      {
        $this->showForm = false;
        $oStudent->setPassword(md5(md5($changePassword['newpassword']).sfConfig::get('app_system_salt')));
        $oStudent->setActivation('');
        $oStudent->save();
      }
    }
  }
}
