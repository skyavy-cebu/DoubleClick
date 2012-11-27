<?php

/**
 * auth actions.
 *
 * @package    DOUBLECLICK
 * @subpackage page
 * @author     Maria Teresa A. Abesa
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class pageActions extends sfActions
{

   public function executePage1(sfWebRequest $request)
  {
    $this->page = Doctrine_Core::getTable('Page')->find(array($request->getParameter('id')));
  }
   public function executePage2(sfWebRequest $request)
  {
    $this->page = Doctrine_Core::getTable('Page')->find(array($request->getParameter('id')));
  }
   public function executePage3(sfWebRequest $request)
  {
    $this->page = Doctrine_Core::getTable('Page')->find(array($request->getParameter('id')));
  }
   public function executePage4(sfWebRequest $request)
  {
    $this->page = Doctrine_Core::getTable('Page')->find(array($request->getParameter('id')));
  }
   public function executePage5(sfWebRequest $request)
  {
    $this->page = Doctrine_Core::getTable('Page')->find(array($request->getParameter('id')));
  }
   public function executePage6(sfWebRequest $request)
  {
    $this->page = Doctrine_Core::getTable('Page')->find(array($request->getParameter('id')));
  }
   
}