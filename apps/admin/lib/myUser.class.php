<?php

class myUser extends sfBasicSecurityUser
{
  protected $account = null;

  public function __construct(sfEventDispatcher $dispatcher, sfStorage $storage, $options = array())
  {
    parent::__construct($dispatcher, $storage, $options);
    
    if ($this->isAuthenticated())
    {
      $this->_refreshAdminObject();
    }
  }
  
  public function __initialize(sfEventDispatcher $dispatcher, sfStorage $storage, $options = array())
  {
    parent::__initialize($dispatcher, $storage, $options);
    
    $this->getUser()->setCulture('ja_JP');
  }
  
  public function signIn($id)
  {
    // authenticate user
    $this->setAuthenticated(true);
    
    // remove credentials
    $this->clearCredentials();
    
    $this->setAttribute('admin_id', $id, 'doubleclick_backend');
    
    $this->_refreshAdminObject();
  }
  
  public function signOut()
  {
    //delete authenticated flag
    $this->setAuthenticated(false);

    $this->getAttributeHolder()->remove('admin_id', NULL, 'doubleclick_backend');

    //remove credentials
    $this->clearCredentials();
  }
  
  public function getAdmin() {
    return $this->admin;
  }
  
  protected function _refreshAdminObject()
  {
    $this->admin = StudentTable::getInstance()->find($this->getAttribute('admin_id', 0, 'doubleclick_backend'));
  }
}