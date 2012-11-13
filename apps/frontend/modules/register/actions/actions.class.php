<?php

/**
 * register actions.
 *
 * @package    DOUBLECLICK
 * @subpackage register
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class registerActions extends sfActions
{
 /**
  * Executes index action.
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    //$this->setLayout('layoutRegister');
    
    $this->form = new RegisterForm();
    
    if ($request->isMethod('post'))
    {
      $register = $request->getParameter('register');
      $this->form->bind($register);
      
      if ($this->form->isValid())
      {
        $this->getUser()->setAttribute('register', $register);
        $this->redirect('@register-confirm');
      }
    }
  }
  
 /**
  * Executes confirm action.
  *
  * @param sfRequest $request A request object
  */
  public function executeConfirm(sfWebRequest $request)
  {
    $this->forward404Unless($this->register = $this->getUser()->getAttribute('register'));
    
    $this->stateName = StateTable::getInstance()->findOneById($this->register['state_id'])->getName();
    
    $durations = array('1ヶ月コース', '3ヶ月コース', '6ヶ月コース');
    $this->durationLbl = $durations[$this->register['duration']];
    
    /* uncomment when teachers are set in the db */
    // $teachers = TeacherTable::getInstance()->findByDql('id IN ?', array($this->register['teacher_id']));
    
    /* temporary teachers array */
    $teachers = array(
      array('id' => 0, 'title' => 'OP先生'),
      array('id' => 1, 'title' => 'CFD先生'),
      array('id' => 2, 'title' => 'シロネコ先生'),
      array('id' => 3, 'title' => '白虎先生'),
      array('id' => 4, 'title' => 'スイング先生')
    );
    
    $teacherTitles = array();
    foreach ($teachers as $teacher)
    {
      if (in_array($teacher['id'], $this->register['teacher_id']))
      {
        $teacherTitles[] = $teacher['title'];
      }
    }
    
    $this->teacherTitlesStr = implode(', ', $teacherTitles);
    
    // if confirmed
    if ($request->isMethod('post'))
    {
      echo 'Registered';
      // hash password;
      // $salt = sfConfig::get('app_system_salt');
      // $password = md5(md5($this->register['password']).$salt);
      // $activation = md5(md5(time()).$salt);
      
      // save new Student
      // $student = new Student();
      // $student->setName($this->register['name']);
      // $student->setFurigana($this->register['furigana']);
      // $student->setZipcode1($this->register['zipcode1']);
      // $student->setZipcode2($this->register['zipcode2']);
      // $student->setStateId($this->register['state_id']);
      // $student->setAddress($this->register['address']);
      // $student->setContact($this->register['contact']);
      // $student->setEmail($this->register['email']);
      // $student->setPassword($password);
      // $student->save();
      
      // save new Subscription(s)
      // if (0 < count($this->register['teacher_id'])) {
        // foreach ($this->register['teacher_id'] as $teacherId) {
          // $subscription = new Subscription();
          // $subscription->setTeacherId($teacherId);
          // $subscription->setStudentId($student->getId());
          // $subscription->setDuration($this->register['duration']);
          // $subscription->save();
        // }
      // }
      
      // send activation mail
      
      /* destroy session variable: register */
      $this->getUser()->getAttributeHolder()->remove('register');
    }
  }
}
