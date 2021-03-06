<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Teacher', 'doctrine');

/**
 * BaseTeacher
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $title
 * @property string $email
 * @property string $password
 * @property string $sender_email
 * @property string $portfolio
 * @property string $details
 * @property string $picture
 * @property string $change_password
 * @property timestamp $updated_at
 * @property timestamp $created_at
 * @property Doctrine_Collection $Newsletter
 * @property Doctrine_Collection $SubscriptionPlan
 * 
 * @method integer             getId()               Returns the current record's "id" value
 * @method string              getTitle()            Returns the current record's "title" value
 * @method string              getEmail()            Returns the current record's "email" value
 * @method string              getPassword()         Returns the current record's "password" value
 * @method string              getSenderEmail()      Returns the current record's "sender_email" value
 * @method string              getPortfolio()        Returns the current record's "portfolio" value
 * @method string              getDetails()          Returns the current record's "details" value
 * @method string              getPicture()          Returns the current record's "picture" value
 * @method string              getChangePassword()   Returns the current record's "change_password" value
 * @method timestamp           getUpdatedAt()        Returns the current record's "updated_at" value
 * @method timestamp           getCreatedAt()        Returns the current record's "created_at" value
 * @method Doctrine_Collection getNewsletter()       Returns the current record's "Newsletter" collection
 * @method Doctrine_Collection getSubscriptionPlan() Returns the current record's "SubscriptionPlan" collection
 * @method Teacher             setId()               Sets the current record's "id" value
 * @method Teacher             setTitle()            Sets the current record's "title" value
 * @method Teacher             setEmail()            Sets the current record's "email" value
 * @method Teacher             setPassword()         Sets the current record's "password" value
 * @method Teacher             setSenderEmail()      Sets the current record's "sender_email" value
 * @method Teacher             setPortfolio()        Sets the current record's "portfolio" value
 * @method Teacher             setDetails()          Sets the current record's "details" value
 * @method Teacher             setPicture()          Sets the current record's "picture" value
 * @method Teacher             setChangePassword()   Sets the current record's "change_password" value
 * @method Teacher             setUpdatedAt()        Sets the current record's "updated_at" value
 * @method Teacher             setCreatedAt()        Sets the current record's "created_at" value
 * @method Teacher             setNewsletter()       Sets the current record's "Newsletter" collection
 * @method Teacher             setSubscriptionPlan() Sets the current record's "SubscriptionPlan" collection
 * 
 * @package    DOUBLECLICK
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTeacher extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('teacher');
        $this->hasColumn('id', 'integer', 8, array(
             'type' => 'integer',
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('title', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 100,
             ));
        $this->hasColumn('email', 'string', 80, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 80,
             ));
        $this->hasColumn('password', 'string', 50, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 50,
             ));
        $this->hasColumn('sender_email', 'string', 80, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 80,
             ));
        $this->hasColumn('portfolio', 'string', null, array(
             'type' => 'string',
             'notnull' => false,
             'length' => '',
             ));
        $this->hasColumn('details', 'string', null, array(
             'type' => 'string',
             'notnull' => false,
             'length' => '',
             ));
        $this->hasColumn('picture', 'string', 42, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 42,
             ));
        $this->hasColumn('change_password', 'string', 255, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 255,
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
        $this->hasMany('Newsletter', array(
             'local' => 'id',
             'foreign' => 'teacher_id'));

        $this->hasMany('SubscriptionPlan', array(
             'local' => 'id',
             'foreign' => 'teacher_id'));

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