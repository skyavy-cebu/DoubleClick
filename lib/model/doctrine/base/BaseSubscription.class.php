<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Subscription', 'doctrine');

/**
 * BaseSubscription
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $student_id
 * @property integer $subscription_plan_id
 * @property integer $settlement_id
 * @property integer $is_active
 * @property timestamp $valid_until
 * @property timestamp $updated_at
 * @property timestamp $created_at
 * @property Student $Student
 * @property Settlement $Settlement
 * @property SubscriptionPlan $SubscriptionPlan
 * 
 * @method integer          getId()                   Returns the current record's "id" value
 * @method integer          getStudentId()            Returns the current record's "student_id" value
 * @method integer          getSubscriptionPlanId()   Returns the current record's "subscription_plan_id" value
 * @method integer          getSettlementId()         Returns the current record's "settlement_id" value
 * @method integer          getIsActive()             Returns the current record's "is_active" value
 * @method timestamp        getValidUntil()           Returns the current record's "valid_until" value
 * @method timestamp        getUpdatedAt()            Returns the current record's "updated_at" value
 * @method timestamp        getCreatedAt()            Returns the current record's "created_at" value
 * @method Student          getStudent()              Returns the current record's "Student" value
 * @method Settlement       getSettlement()           Returns the current record's "Settlement" value
 * @method SubscriptionPlan getSubscriptionPlan()     Returns the current record's "SubscriptionPlan" value
 * @method Subscription     setId()                   Sets the current record's "id" value
 * @method Subscription     setStudentId()            Sets the current record's "student_id" value
 * @method Subscription     setSubscriptionPlanId()   Sets the current record's "subscription_plan_id" value
 * @method Subscription     setSettlementId()         Sets the current record's "settlement_id" value
 * @method Subscription     setIsActive()             Sets the current record's "is_active" value
 * @method Subscription     setValidUntil()           Sets the current record's "valid_until" value
 * @method Subscription     setUpdatedAt()            Sets the current record's "updated_at" value
 * @method Subscription     setCreatedAt()            Sets the current record's "created_at" value
 * @method Subscription     setStudent()              Sets the current record's "Student" value
 * @method Subscription     setSettlement()           Sets the current record's "Settlement" value
 * @method Subscription     setSubscriptionPlan()     Sets the current record's "SubscriptionPlan" value
 * 
 * @package    DOUBLECLICK
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseSubscription extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('subscription');
        $this->hasColumn('id', 'integer', 8, array(
             'type' => 'integer',
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('student_id', 'integer', 8, array(
             'type' => 'integer',
             'unsigned' => true,
             'notnull' => true,
             'length' => 8,
             ));
        $this->hasColumn('subscription_plan_id', 'integer', 4, array(
             'type' => 'integer',
             'unsigned' => true,
             'notnull' => true,
             'length' => 4,
             ));
        $this->hasColumn('settlement_id', 'integer', 8, array(
             'type' => 'integer',
             'unsigned' => true,
             'notnull' => true,
             'length' => 8,
             ));
        $this->hasColumn('is_active', 'integer', 1, array(
             'type' => 'integer',
             'default' => '0',
             'notnull' => true,
             'length' => 1,
             ));
        $this->hasColumn('valid_until', 'timestamp', 25, array(
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
        $this->hasOne('Student', array(
             'local' => 'student_id',
             'foreign' => 'id'));

        $this->hasOne('Settlement', array(
             'local' => 'settlement_id',
             'foreign' => 'id'));

        $this->hasOne('SubscriptionPlan', array(
             'local' => 'subscription_plan_id',
             'foreign' => 'id'));

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