<?php

/**
 * Topic form.
 *
 * @package    DOUBLECLICK
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TopicForm extends BaseTopicForm
{
  public function configure()
  {
    unset($this['updated_at'], $this['created_at']);
  }
  
  public function setup()
  {
    parent::setup();
    
    // setup publish_date
    $this->setWidget('publish_date', new sfWidgetFormInputText());
    $this->setValidator('publish_date', new sfValidatorDateTime());
    
    // setup pdf_filename
    $this->setWidget('pdf_filename', new sfWidgetFormInputFileEditable(array(
      'file_src'    => sfConfig::get('app_topic_upload_dir') . $this->getObject()->getPdfFilename(),
      'is_image'    => false,
      'edit_mode'   => false,
      'with_delete' => false
    )));
		$this->setValidator(
      'pdf_filename',
      new sfValidatorFile(
        array(
          'required'        => true,
          'max_size'        => 500000000000000,
          'mime_categories' => array('pdf' => array('application/pdf', 'application/x-pdf')),
          'mime_types'      => 'pdf',
          'path'            => sfConfig::get('app_topic_upload_dir')
        ),
        array(
          'max_size'   => 'ファイルサイズが大きすぎます。',
          'mime_types' => '投稿できる画像フォーマットではありません。',
          'partial'    => 'ファイルアップロードに失敗しました。もう一度、投稿してください。',
          'no_tmp_dir' => 'システムエラーです。管理者にお伝えください。',
          'cant_write' => 'システムエラーです。管理者にお伝えください。',
          'extension'  => 'システムエラーです。管理者にお伝えください。'
        )
      )
    );
  }
}
