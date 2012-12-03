<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Feedback', 'doctrine');

/**
 * BaseFeedback
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $customer_name
 * @property blob $body
 * @property timestamp $publish_date
 * @property timestamp $updated_at
 * @property timestamp $created_at
 * 
 * @method integer   getId()            Returns the current record's "id" value
 * @method string    getCustomerName()  Returns the current record's "customer_name" value
 * @method blob      getBody()          Returns the current record's "body" value
 * @method timestamp getPublishDate()   Returns the current record's "publish_date" value
 * @method timestamp getUpdatedAt()     Returns the current record's "updated_at" value
 * @method timestamp getCreatedAt()     Returns the current record's "created_at" value
 * @method Feedback  setId()            Sets the current record's "id" value
 * @method Feedback  setCustomerName()  Sets the current record's "customer_name" value
 * @method Feedback  setBody()          Sets the current record's "body" value
 * @method Feedback  setPublishDate()   Sets the current record's "publish_date" value
 * @method Feedback  setUpdatedAt()     Sets the current record's "updated_at" value
 * @method Feedback  setCreatedAt()     Sets the current record's "created_at" value
 * 
 * @package    DOUBLECLICK
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseFeedback extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('feedback');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('customer_name', 'string', 80, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 80,
             ));
        $this->hasColumn('body', 'blob', null, array(
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