<?php

/**
 * ChangeStudentStatus form.
 *
 * @package    DOUBLECLICK
 * @subpackage form
 * @author     Jane Lois E. de Veyra
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ChangeStudentStatusForm extends StudentForm
{
  public function configure()
  {
    $this->useFields(array('id', 'status'));
    
    $this->widgetSchema->setNameFormat('change_student_status[%s]');
  }
}
