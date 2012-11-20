<?php

/**
 * static actions.
 *
 * @package    DOUBLECLICK
 * @subpackage static
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class dynamicActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
   public function executeFeedback(sfWebRequest $request)
  {
     $this->feedbacks = Doctrine_Core::getTable('Feedback')->getFeedbacks();
  }
   public function executeOption(sfWebRequest $request)
  {
    
  }
   public function executeCfd(sfWebRequest $request)
  {
    
  }
  public function executeList(sfWebRequest $request)
  {
    
  }
  public function executeTeacherIntroduction(sfWebRequest $request)
  {
    
  }
  public function executeTeacherIntroductionDetail(sfWebRequest $request)
  {
    
  }
  public function executeTeacherPerformance(sfWebRequest $request)
  {
    
  }
  public function executeRegistrationMessage(sfWebRequest $request)
  {
    
  }
}
