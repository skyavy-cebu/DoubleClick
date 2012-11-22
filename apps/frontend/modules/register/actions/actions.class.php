<?php

/**
 * register actions.
 *
 * @package    DOUBLECLICK
 * @subpackage register
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class registerActions extends sfActions
{
 /**
  * Executes index action.
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward404If($this->getUser()->isAuthenticated(), 'Please logout to register a new User.');
    
    //$this->setLayout('layoutRegister');
    $this->form = new RegisterForm();
    
    if ($request->isMethod('post'))
    {
      $register = $request->getParameter($this->form->getName());
      $this->form->bind($register);
      
      if ($this->form->isValid())
      {
        $this->getUser()->setAttribute('register', $register);
        $this->redirect('@register-confirm');
      }
    }
  }
  
 /**
  * Executes confirm action.
  *
  * @param sfRequest $request A request object
  */
  public function executeConfirm(sfWebRequest $request)
  {
    $this->forward404Unless($this->register = $this->getUser()->getAttribute('register'));
    
    $this->stateName = StateTable::getInstance()->findOneById($this->register['state_id'])->getName();
    
    // Subscriptions
    $this->subscriptionPlans = array();
    foreach ($this->register['subscription_plans'] as $teacherId => $subscriptionPlanId)
    {
      $subscriptionPlan = SubscriptionPlanTable::getInstance()->find($subscriptionPlanId);
      $this->subscriptionPlans[$teacherId] = $subscriptionPlan;
    }
    
    // if confirmed
    if ($request->isMethod('post'))
    {
      // hash password;
      $salt = sfConfig::get('app_system_salt');
      $password = md5(md5($this->register['password']).$salt);
      $activation = md5(md5(time()).$salt);
      
      // save new Student
      $student = new Student();
      $student->setName($this->register['name']);
      $student->setFurigana($this->register['furigana']);
      $student->setZipcode1($this->register['zipcode1']);
      $student->setZipcode2($this->register['zipcode2']);
      $student->setStateId($this->register['state_id']);
      $student->setAddress($this->register['address']);
      $student->setContact($this->register['contact']);
      $student->setEmail($this->register['email']);
      $student->setPassword($password);
      $student->setActivation($activation);
      $student->save();
      
      // save new Settlment (temporary)
      $settlement = new Settlement();
      $settlement->save();
      
      // save new Subscriptions
      $totalPrice = 0;
      foreach ($this->subscriptionPlans as $teacherId => $subscriptionPlan)
      {
        $subscription = new Subscription();
        $subscription->setStudentId($student->getId());
        $subscription->setSubscriptionPlanId($subscriptionPlan->getId());
        $subscription->setSettlementId($settlement->getId());
        $subscription->save();
        
        $totalPrice += $subscriptionPlan->getPrice();
      }
      
      // set Settlement price
      $settlement->setPrice($totalPrice);
      $settlement->save();
      
      // send activation mail
      $message = $this->getMailer()->compose(
        /* from */
        array('admin@doubleclick.co.jp' => 'DoubleClick Admin'),
        /* to */
        $student->getEmail(),
        /* subject */
        '仮登録完了',
        /* body */
        <<<EOF
以下のURLをクリックして、本登録を行ってください。

{$this->getController()->genUrl('@register-activate?code='.$activation, true)}

-------------------------------
DoubleClick
{$this->getController()->genUrl('@home', true)}
EOF
      );
      
      $this->getMailer()->send($message);
      
      /* destroy session variable: register */
      $this->getUser()->getAttributeHolder()->remove('register');
      
      // redirect
      $this->redirect('@register-message');
    }
  }
  
 /**
  * Executes activate action.
  *
  * @param sfRequest $request A request object
  */
  public function executeActivate(sfWebRequest $request)
  {
    $this->forward404Unless($code = $request->getParameter('code'));
    $this->forward404Unless($student = StudentTable::getInstance()->findOneByActivation($code));
    
    $student->setStatus(1);
    $student->setActivation(NULL);
    $student->save();
    
    // send complete registration mail
    $message = $this->getMailer()->compose(
      /* from */
      array('admin@doubleclick.co.jp' => 'DoubleClick Admin'),
      /* to */
      $student->getEmail(),
      /* subject */
      '本登録完了',
      /* body */
      <<<EOF
Registration is complete.

** Other info goes here **

-------------------------------
DoubleClick
{$this->getController()->genUrl('@home', true)}
EOF
    );
    
    $this->getMailer()->send($message);
  }
}
