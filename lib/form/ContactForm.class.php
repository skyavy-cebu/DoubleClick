<?php

/**
 * Register form.
 *
 * @package    DOUBLECLICK
 * @subpackage form
 * @author     Danilo M. Nava Jr.
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ContactForm extends sfForm
{
  public function configure()
  {
     
    $this->setWidgets(array(
      'name'      => new sfWidgetFormInputText(array('label' => '氏名')),
      'contact'   => new sfWidgetFormInputText(array('label' => 'ふりがな')),
      'email'     => new sfWidgetFormInputText(array('label' => 'メールアドレス')),
      'cemail'    => new sfWidgetFormInputText(array('label' => 'メールアドレス確認用')),
      'inquiry'  => new sfWidgetFormTextarea(array('label' => 'お問い合わせ内容')),
    ));
    
    $this->setValidators(array(
      'name'      => new sfValidatorString(array('required'=>true)),
      'contact'   => new sfValidatorString(array('required'=>false)),
      'email'     => new sfValidatorEmail(),
      'cemail'    => new sfValidatorString(array('required'=>true)),
      'inquiry'  => new sfValidatorString(array('max_length' => 255)),
    ));
    
  }
}
