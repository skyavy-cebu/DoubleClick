<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Mailmagazine', 'doctrine');

/**
 * BaseMailmagazine
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property timestamp $publish_date
 * @property timestamp $updated_at
 * @property timestamp $created_at
 * 
 * @method integer      getId()           Returns the current record's "id" value
 * @method string       getTitle()        Returns the current record's "title" value
 * @method string       getContent()      Returns the current record's "content" value
 * @method timestamp    getPublishDate()  Returns the current record's "publish_date" value
 * @method timestamp    getUpdatedAt()    Returns the current record's "updated_at" value
 * @method timestamp    getCreatedAt()    Returns the current record's "created_at" value
 * @method Mailmagazine setId()           Sets the current record's "id" value
 * @method Mailmagazine setTitle()        Sets the current record's "title" value
 * @method Mailmagazine setContent()      Sets the current record's "content" value
 * @method Mailmagazine setPublishDate()  Sets the current record's "publish_date" value
 * @method Mailmagazine setUpdatedAt()    Sets the current record's "updated_at" value
 * @method Mailmagazine setCreatedAt()    Sets the current record's "created_at" value
 * 
 * @package    DOUBLECLICK
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseMailmagazine extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('mailmagazine');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('title', 'string', 150, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 150,
             ));
        $this->hasColumn('content', 'string', null, array(
             'type' => 'string',
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
        $timestampable0 = new Doctrine_Template_Timestampable(array(
             'created_at' => 
             array(
              'type' => 'timestamp(25)',
              'expre,' => 'expression: \'NOW()\'',
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