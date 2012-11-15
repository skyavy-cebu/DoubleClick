<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Settlement', 'doctrine');

/**
 * BaseSettlement
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $status
 * @property timestamp $paid_at
 * @property Doctrine_Collection $Subscription
 * 
 * @method integer             getId()           Returns the current record's "id" value
 * @method integer             getStatus()       Returns the current record's "status" value
 * @method timestamp           getPaidAt()       Returns the current record's "paid_at" value
 * @method Doctrine_Collection getSubscription() Returns the current record's "Subscription" collection
 * @method Settlement          setId()           Sets the current record's "id" value
 * @method Settlement          setStatus()       Sets the current record's "status" value
 * @method Settlement          setPaidAt()       Sets the current record's "paid_at" value
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
             'fixed' => 0,
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('status', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => '0',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 1,
             ));
        $this->hasColumn('paid_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
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
             'created' => 
             array(
              'name' => 'created_at',
              'type' => 'timestamp(25)',
              'expression' => 'NOW()',
             ),
             'updated' => 
             array(
              'name' => 'updated_at',
              'type' => 'timestamp(25)',
              'expression' => 'NOW()',
             ),
             ));
        $this->actAs($timestampable0);
    }
}