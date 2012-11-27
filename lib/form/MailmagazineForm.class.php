<?php

/**
 * Mailmagazine form.
 *
 */
class MailmagazineForm extends BaseForm
{
  public function configure()
  {
    
    $this->setWidgets(array(
      'publish_date'      => new sfWidgetFormInputText(array('label' => 'Publish Date')),
      'title'     => new sfWidgetFormInputText(array('label' => 'Title')),
      'content'   => new sfWidgetFormTextarea(array('label' => 'Details'))
    ));
    
    $this->setValidators(array(
      'publish_date'      => new sfValidatorString(array('required' => true)),
      'title'     => new sfValidatorString(array('required' => true)),
      'content'   => new sfValidatorString(array('required' => true))
    ));
       
    $this->widgetSchema->setNameFormat('magazine[%s]');
  }
  
}
