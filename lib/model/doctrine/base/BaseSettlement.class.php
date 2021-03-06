<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Settlement', 'doctrine');

/**
 * BaseSettlement
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property enum $status
 * @property decimal $price
 * @property timestamp $paid_at
 * @property timestamp $updated_at
 * @property timestamp $created_at
 * @property Doctrine_Collection $Subscription
 * 
 * @method integer             getId()           Returns the current record's "id" value
 * @method enum                getStatus()       Returns the current record's "status" value
 * @method decimal             getPrice()        Returns the current record's "price" value
 * @method timestamp           getPaidAt()       Returns the current record's "paid_at" value
 * @method timestamp           getUpdatedAt()    Returns the current record's "updated_at" value
 * @method timestamp           getCreatedAt()    Returns the current record's "created_at" value
 * @method Doctrine_Collection getSubscription() Returns the current record's "Subscription" collection
 * @method Settlement          setId()           Sets the current record's "id" value
 * @method Settlement          setStatus()       Sets the current record's "status" value
 * @method Settlement          setPrice()        Sets the current record's "price" value
 * @method Settlement          setPaidAt()       Sets the current record's "paid_at" value
 * @method Settlement          setUpdatedAt()    Sets the current record's "updated_at" value
 * @method Settlement          setCreatedAt()    Sets the current record's "created_at" value
 * @method Settlement          setSubscription() Sets the current record's "Subscription" collection
 * 
 * @package    DOUBLECLICK
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseSettlement extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('settlement');
        $this->hasColumn('id', 'integer', 8, array(
             'type' => 'integer',
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('status', 'enum', 1, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => '0',
              1 => '1',
              2 => '2',
              3 => '3',
             ),
             'default' => '0',
             'notnull' => true,
             'length' => 1,
             ));
        $this->hasColumn('price', 'decimal', 9, array(
             'type' => 'decimal',
             'unsigned' => true,
             'default' => '0.00',
             'notnull' => true,
             'length' => 9,
             'scale' => '2',
             ));
        $this->hasColumn('paid_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'notnull' => false,
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
        $this->hasMany('Subscription', array(
             'local' => 'id',
             'foreign' => 'settlement_id'));

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