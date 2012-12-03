<?php

/**
 * topic actions.
 *
 * @package    DOUBLECLICK
 * @subpackage topic
 * @author     Jane Lois E. de Veyra
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class topicActions extends sfActions
{
  /**
   * Executes list action
   *
   * @param sfRequest $request A request object
   */
  public function executeList(sfWebRequest $request)
  {
    $this->topics = TopicTable::getInstance()->createQuery('top')->orderBy('top.publish_date DESC')->execute();
  }
  
  /**
   * Executes add action
   *
   * @param sfRequest $request A request object
   */
  public function executeAdd(sfWebRequest $request)
  {
    $this->form = new TopicForm();
    
    if ($request->isMethod('post'))
    {
      $formValues = $request->getParameter($this->form->getName());
      
      $this->form->bind($formValues, $request->getFiles($this->form->getName()));
      
      if ($this->form->isValid())
      {
        try
        {
          $pdf = $this->form->getValue('pdf_filename');
          $extension = $pdf->getExtension($pdf->getOriginalExtension());
          $pdfFilename = md5(time() . $pdf->getOriginalName()) . $extension;
          
          $topic = new Topic();
          $topic->setTitle($formValues['title']);
          $topic->setPdfFilename($pdfFilename);
          $topic->setPublishDate(date('Y-m-d H:i:s', strtotime($formValues['publish_date'])));
          
          $pdf->save(sfConfig::get('app_topic_upload_dir') . '/' . $pdfFilename);
        
          $topic->save();
        }
        catch (Exception $e)
        {
          echo $e;
        }
        
        $this->redirect('@topics');
      }
    }
  }
  
  /**
   * Executes edit action
   *
   * @param sfRequest $request A request object
   */
  public function executeEdit(sfWebRequest $request)
  {
    $this->topic = TopicTable::getInstance()->find($request->getParameter('id'));
    
    $this->form = new TopicForm($this->topic);
    
    if ($request->isMethod('post'))
    {
      $formValues = $request->getParameter($this->form->getName());
      
      $this->form->bind($formValues, $request->getFiles($this->form->getName()));
      
      if ($this->form->isValid())
      {
        $pdf = $this->form->getValue('pdf_filename');
        
        $this->topic->setTitle($formValues['title']);
        $this->topic->setPublishDate(date('Y-m-d H:i:s', strtotime($formValues['publish_date'])));
        
        try
        {
          $extension = $pdf->getExtension($pdf->getOriginalExtension());
          $pdf->save(sfConfig::get('app_topic_upload_dir') . '/' . $this->topic->getPdfFilename() . $extension);
        }
        catch (Exception $e)
        {
          echo $e;
        }
        
        $this->topic->save();
        
        $this->redirect('@topics');
      }
    }
  }
}
