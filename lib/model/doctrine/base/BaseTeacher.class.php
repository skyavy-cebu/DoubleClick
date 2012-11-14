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
 * @property string $portfolio
 * @property string $details
 * @property timestamp $updated_at
 * @property timestamp $created_at
 * @property Doctrine_Collection $Subscription
 * 
 * @method integer             getId()           Returns the current record's "id" value
 * @method string              getTitle()        Returns the current record's "title" value
 * @method string              getEmail()        Returns the current record's "email" value
 * @method string              getPassword()     Returns the current record's "password" value
 * @method string              getPortfolio()    Returns the current record's "portfolio" value
 * @method string              getDetails()      Returns the current record's "details" value
 * @method timestamp           getUpdatedAt()    Returns the current record's "updated_at" value
 * @method timestamp           getCreatedAt()    Returns the current record's "created_at" value
 * @method Doctrine_Collection getSubscription() Returns the current record's "Subscription" collection
 * @method Teacher             setId()           Sets the current record's "id" value
 * @method Teacher             setTitle()        Sets the current record's "title" value
 * @method Teacher             setEmail()        Sets the current record's "email" value
 * @method Teacher             setPassword()     Sets the current record's "password" value
 * @method Teacher             setPortfolio()    Sets the current record's "portfolio" value
 * @method Teacher             setDetails()      Sets the current record's "details" value
 * @method Teacher             setUpdatedAt()    Sets the current record's "updated_at" value
 * @method Teacher             setCreatedAt()    Sets the current record's "created_at" value
 * @method Teacher             setSubscription() Sets the current record's "Subscription" collection
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
             'fixed' => 0,
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('title', 'string', 100, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 100,
             ));
        $this->hasColumn('email', 'string', 80, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 80,
             ));
        $this->hasColumn('password', 'string', 50, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 50,
             ));
        $this->hasColumn('portfolio', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('details', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('updated_at', 'timestamp', 25, array(
             'type' => 'timestamp',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('created_at', 'timestamp', 25, array(
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
             'foreign' => 'teacher_id'));
    }
}