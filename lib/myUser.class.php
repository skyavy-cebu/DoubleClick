<?php

class myUser extends sfBasicSecurityUser
{
  public function __construct()
  {
    parent::__contruct();
    
    $this->getUser()->setCulture('ja_JP');
  }
}