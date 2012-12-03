<?php

/**
 * Project form base class.
 *
 * @package    DOUBLECLICK
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormBaseTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
abstract class BaseFormDoctrine extends sfFormDoctrine
{
  public function setup()
  {
    
    sfValidatorBase::setDefaultMessage('required', sfContext::getInstance()->getI18N()->__('Required', array(), 'messages'));
    sfValidatorBase::setDefaultMessage('invalid', sfContext::getInstance()->getI18N()->__('Invalid', array(), 'messages'));
  }
}
