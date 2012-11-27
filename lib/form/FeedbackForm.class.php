<?php

/**
 * Feedback form.
 *
 */
class FeedbackForm extends BaseForm
{
  public function configure()
  {
    
    $this->setWidgets(array(
      'publish_date'      => new sfWidgetFormInputText(array('label' => 'Publish Date')),
      'customer_name'     => new sfWidgetFormInputText(array('label' => 'Customer Name')),
      'body'   => new sfWidgetFormTextarea(array('label' => 'Details'))
    ));
    
    $this->setValidators(array(
      'publish_date'      => new sfValidatorString(array('required' => true)),
      'customer_name'     => new sfValidatorString(array('required' => true)),
      'body'   => new sfValidatorString(array('required' => true))
    ));
       
    $this->widgetSchema->setNameFormat('feedback[%s]');
  }
  
}
