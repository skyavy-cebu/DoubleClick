<?php

/**
 * auth actions.
 *
 * @package    DOUBLECLICK
 * @subpackage auth
 * @author     Jane Lois E. de Veyra
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
    
    $this->userType = $request->getParameter('userType');
    
    if ('teacher' == $this->userType)
    {
      $redirect = '@dashboard'; // temp
    }
    else
    {
      $redirect = '@dashboard';
    }
    
    if ($this->getUser()->isAuthenticated())
    {
      $this->redirect($redirect);
    }
    
    $this->form = new LoginForm(null, array('userType' => $this->userType));
    
    if ($request->isMethod('post'))
    {
      $login = $request->getParameter('login');
      $this->form->bind($login);
      
      if ($this->form->isValid())
      {
        if ('teacher' == $this->userType)
        {
          $oUser= TeacherTable::getInstance()->findOneByEmail($login['email']);
        }
        else
        {
          $oUser = StudentTable::getInstance()->findOneByEmail($login['email']);
        }
        
        $this->getUser()->signIn(('' == $this->userType) ? 'student' : $this->userType, $oUser);
        $this->redirect($redirect);
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
    $this->userType = $request->getParameter('userType');
    
    $this->showForm = true;
    $this->form = new PasswordReminderForm(null, array('userType' => $this->userType));
    
    if ($request->isMethod('post'))
    {
      $passwordReminder = $request->getParameter('password-reminder');
      $this->form->bind($passwordReminder);
      
      if ($this->form->isValid())
      {
        $this->showForm = false;
        $passwordHash = md5(md5(time()) . sfConfig::get('app_system_salt'));
        
        if ('teacher' == $this->userType)
        {
          $oUser = TeacherTable::getInstance()->findOneByEmail($passwordReminder['email']);
          $oUser->setChangePassword($passwordHash);
          $oUser->save();
          
          $changePasswordUrl = $this->getController()->genUrl('@change-password?userType=teacher&code=' . $passwordHash, true);
        }
        else
        {
          $oUser = StudentTable::getInstance()->findOneByEmail($passwordReminder['email']);
          $oUser->setActivation($passwordHash);
          $oUser->save();
          
          $changePasswordUrl = $this->getController()->genUrl('@change-password?code=' . $passwordHash, true);
        }
        
        // send activation mail
        $message = $this->getMailer()->compose(
          /* from */
          array('admin@doubleclick.co.jp' => 'DoubleClick Admin'),
          /* to */
          $oUser->getEmail(),
          /* subject */
          'パスワードを忘れた方へ',
          /* body */
          <<<EOF
以下のURLをクリックして、パスワードを変更出来ます。

{$changePasswordUrl}

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
    
    $this->userType = $request->getParameter('userType');
    
    if ('teacher' == $this->userType)
    {
      $oUser = TeacherTable::getInstance()->findOneByChangePassword($this->code);
    }
    else
    {
      $oUser = StudentTable::getInstance()->findOneByActivation($this->code);
    }
    
    $this->forward404Unless($oUser);
    
    $this->showForm = true;
    $this->form = new ChangePasswordForm(null, array('userType' => $this->userType, 'code' => $this->code));
    
    if ($request->isMethod('post'))
    {
      $changePassword = $request->getParameter('change-password');
      $this->form->bind($changePassword);
      
      if ($this->form->isValid())
      {
        $this->showForm = false;
        $oUser->setPassword(md5(md5($changePassword['newpassword']) . sfConfig::get('app_system_salt')));
    
        if ('teacher' == $this->userType)
        {
          $oUser->setChangePassword(NULL);
        }
        else
        {
          $oUser->setActivation(NULL);
        }
        
        $oUser->save();
      }
    }
  }
}
