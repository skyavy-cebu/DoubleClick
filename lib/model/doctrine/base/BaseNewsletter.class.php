<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Newsletter', 'doctrine');

/**
 * BaseNewsletter
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $teacher_id
 * @property string $title
 * @property blob $content
 * @property timestamp $publish_date
 * @property timestamp $updated_at
 * @property timestamp $created_at
 * @property Teacher $Teacher
 * @property Doctrine_Collection $NewsletterXStudent
 * 
 * @method integer             getId()                 Returns the current record's "id" value
 * @method integer             getTeacherId()          Returns the current record's "teacher_id" value
 * @method string              getTitle()              Returns the current record's "title" value
 * @method blob                getContent()            Returns the current record's "content" value
 * @method timestamp           getPublishDate()        Returns the current record's "publish_date" value
 * @method timestamp           getUpdatedAt()          Returns the current record's "updated_at" value
 * @method timestamp           getCreatedAt()          Returns the current record's "created_at" value
 * @method Teacher             getTeacher()            Returns the current record's "Teacher" value
 * @method Doctrine_Collection getNewsletterXStudent() Returns the current record's "NewsletterXStudent" collection
 * @method Newsletter          setId()                 Sets the current record's "id" value
 * @method Newsletter          setTeacherId()          Sets the current record's "teacher_id" value
 * @method Newsletter          setTitle()              Sets the current record's "title" value
 * @method Newsletter          setContent()            Sets the current record's "content" value
 * @method Newsletter          setPublishDate()        Sets the current record's "publish_date" value
 * @method Newsletter          setUpdatedAt()          Sets the current record's "updated_at" value
 * @method Newsletter          setCreatedAt()          Sets the current record's "created_at" value
 * @method Newsletter          setTeacher()            Sets the current record's "Teacher" value
 * @method Newsletter          setNewsletterXStudent() Sets the current record's "NewsletterXStudent" collection
 * 
 * @package    DOUBLECLICK
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseNewsletter extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('newsletter');
        $this->hasColumn('id', 'integer', 8, array(
             'type' => 'integer',
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('teacher_id', 'integer', 8, array(
             'type' => 'integer',
             'unsigned' => true,
             'notnull' => true,
             'length' => 8,
             ));
        $this->hasColumn('title', 'string', 150, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 150,
             ));
        $this->hasColumn('content', 'blob', null, array(
             'type' => 'blob',
             'notnull' => false,
             'length' => '',
             ));
        $this->hasColumn('publish_date', 'timestamp', 25, array(
             'type' => 'timestamp',
             'notnull' => true,
             'length' => 25,
             ));
        $this->hasColumn('updated_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'notnull' => false,
             'length' => 25,
             ));
        $this->hasColumn('created_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'notnull' => false,
             'length' => 25,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Teacher', array(
             'local' => 'teacher_id',
             'foreign' => 'id'));

        $this->hasMany('NewsletterXStudent', array(
             'local' => 'id',
             'foreign' => 'newsletter_id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             'created_at' => 
             array(
              'type' => 'timestamp(25)',
              'expression' => 'NOW()',
             ),
             'updated_at' => 
             array(
              'type' => 'timestamp(25)',
              'expression' => 'NOW()',
             ),
             ));
        $this->actAs($timestampable0);
    }
}