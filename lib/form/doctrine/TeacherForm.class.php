<?php

/**
 * Teacher form.
 *
 * @package    DOUBLECLICK
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TeacherForm extends BaseTeacherForm
{
  public function configure()
  {
	$this->useFields(array('portfolio','details'));
  }
}
