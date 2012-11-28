<?php

/**
 * ChangeSubscriptionStatus form.
 *
 * @package    DOUBLECLICK
 * @subpackage form
 * @author     Jane Lois E. de Veyra
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ChangeSubscriptionStatusForm extends SubscriptionForm
{
  public function configure()
  {
    $this->useFields(array('id', 'is_active'));
    
    $this->widgetSchema->setNameFormat('change_subscription_status[%s]');
  }
}
