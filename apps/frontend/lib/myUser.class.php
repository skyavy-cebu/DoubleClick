<?php

class myUser extends sfBasicSecurityUser
{
  protected $account = null;

  public function __construct(sfEventDispatcher $dispatcher, sfStorage $storage, $options = array())
  {
    parent::__construct($dispatcher, $storage, $options);
    
    if ($this->isAuthenticated())
    {
      $this->_refreshAccountObject();
    }
  }
  
  public function __initialize(sfEventDispatcher $dispatcher, sfStorage $storage, $options = array())
  {
    parent::__initialize($dispatcher, $storage, $options);
    
    $this->getUser()->setCulture('ja_JP');
  }
  
  public function signIn($type, $account)
  {
    // authenticate user
    $this->setAuthenticated(true);
    
    // remove credentials
    $this->clearCredentials();
    
    $this->setAttribute('user_type', $type, 'doubleclick_frontend');
    $this->setAttribute('account_id', $account->getId(), 'doubleclick_frontend');
    
    $this->_refreshAccountObject();
  }
  
  public function signOut()
  {
    //delete authenticated flag
    $this->setAuthenticated(false);

    $this->getAttributeHolder()->remove('user_type', NULL, 'doubleclick_frontend');
    $this->getAttributeHolder()->remove('account_id', NULL, 'doubleclick_frontend');

    //remove credentials
    $this->clearCredentials();
  }
  
  public function getDetails() {
    return $this->account;
  }
  
  protected function _refreshAccountObject()
  {
    $accountId = $this->getAttribute('account_id', 0, 'doubleclick_frontend');
    
    switch($this->getAttribute('user_type', 'visitor', 'doubleclick_frontend'))
    {
      case 'student': $this->account = StudentTable::getInstance()->find($accountId); break;
      case 'teacher': $this->account = TeacherTable::getInstance()->find($accountId); break;
      case 'visitor': $this->account = null; break;
    }
  }
}