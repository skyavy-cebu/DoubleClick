<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Student', 'doctrine');

/**
 * BaseStudent
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property string $furigana
 * @property string $email
 * @property string $password
 * @property enum $status
 * @property enum $login_type
 * @property string $zipcode1
 * @property string $zipcode2
 * @property integer $state_id
 * @property integer $city_id
 * @property string $address
 * @property string $contact
 * @property string $picture
 * @property string $activation
 * @property timestamp $updated_at
 * @property timestamp $created_at
 * @property City $City
 * @property State $State
 * @property Doctrine_Collection $NewsletterXStudent
 * @property Doctrine_Collection $Subscription
 * 
 * @method integer             getId()                 Returns the current record's "id" value
 * @method string              getName()               Returns the current record's "name" value
 * @method string              getFurigana()           Returns the current record's "furigana" value
 * @method string              getEmail()              Returns the current record's "email" value
 * @method string              getPassword()           Returns the current record's "password" value
 * @method enum                getStatus()             Returns the current record's "status" value
 * @method enum                getLoginType()          Returns the current record's "login_type" value
 * @method string              getZipcode1()           Returns the current record's "zipcode1" value
 * @method string              getZipcode2()           Returns the current record's "zipcode2" value
 * @method integer             getStateId()            Returns the current record's "state_id" value
 * @method integer             getCityId()             Returns the current record's "city_id" value
 * @method string              getAddress()            Returns the current record's "address" value
 * @method string              getContact()            Returns the current record's "contact" value
 * @method string              getPicture()            Returns the current record's "picture" value
 * @method string              getActivation()         Returns the current record's "activation" value
 * @method timestamp           getUpdatedAt()          Returns the current record's "updated_at" value
 * @method timestamp           getCreatedAt()          Returns the current record's "created_at" value
 * @method City                getCity()               Returns the current record's "City" value
 * @method State               getState()              Returns the current record's "State" value
 * @method Doctrine_Collection getNewsletterXStudent() Returns the current record's "NewsletterXStudent" collection
 * @method Doctrine_Collection getSubscription()       Returns the current record's "Subscription" collection
 * @method Student             setId()                 Sets the current record's "id" value
 * @method Student             setName()               Sets the current record's "name" value
 * @method Student             setFurigana()           Sets the current record's "furigana" value
 * @method Student             setEmail()              Sets the current record's "email" value
 * @method Student             setPassword()           Sets the current record's "password" value
 * @method Student             setStatus()             Sets the current record's "status" value
 * @method Student             setLoginType()          Sets the current record's "login_type" value
 * @method Student             setZipcode1()           Sets the current record's "zipcode1" value
 * @method Student             setZipcode2()           Sets the current record's "zipcode2" value
 * @method Student             setStateId()            Sets the current record's "state_id" value
 * @method Student             setCityId()             Sets the current record's "city_id" value
 * @method Student             setAddress()            Sets the current record's "address" value
 * @method Student             setContact()            Sets the current record's "contact" value
 * @method Student             setPicture()            Sets the current record's "picture" value
 * @method Student             setActivation()         Sets the current record's "activation" value
 * @method Student             setUpdatedAt()          Sets the current record's "updated_at" value
 * @method Student             setCreatedAt()          Sets the current record's "created_at" value
 * @method Student             setCity()               Sets the current record's "City" value
 * @method Student             setState()              Sets the current record's "State" value
 * @method Student             setNewsletterXStudent() Sets the current record's "NewsletterXStudent" collection
 * @method Student             setSubscription()       Sets the current record's "Subscription" collection
 * 
 * @package    DOUBLECLICK
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseStudent extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('student');
        $this->hasColumn('id', 'integer', 8, array(
             'type' => 'integer',
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('name', 'string', 100, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 100,
             ));
        $this->hasColumn('furigana', 'string', 100, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 100,
             ));
        $this->hasColumn('email', 'string', 80, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 80,
             ));
        $this->hasColumn('password', 'string', 50, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 50,
             ));
        $this->hasColumn('status', 'enum', 1, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => '0',
              1 => '1',
              2 => '2',
              3 => '3',
              4 => '4',
             ),
             'default' => '0',
             'notnull' => true,
             'length' => 1,
             ));
        $this->hasColumn('login_type', 'enum', 1, array(
             'type' => 'enum',
             'values' => 
             array(
              0 => '0',
              1 => '1',
             ),
             'default' => '0',
             'notnull' => true,
             'length' => 1,
             ));
        $this->hasColumn('zipcode1', 'string', 3, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 3,
             ));
        $this->hasColumn('zipcode2', 'string', 4, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 4,
             ));
        $this->hasColumn('state_id', 'integer', 2, array(
             'type' => 'integer',
             'unsigned' => true,
             'notnull' => true,
             'length' => 2,
             ));
        $this->hasColumn('city_id', 'integer', 2, array(
             'type' => 'integer',
             'unsigned' => true,
             'notnull' => false,
             'length' => 2,
             ));
        $this->hasColumn('address', 'string', 150, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 150,
             ));
        $this->hasColumn('contact', 'string', 20, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 20,
             ));
        $this->hasColumn('picture', 'string', 42, array(
             'type' => 'string',
             'notnull' => false,
             'length' => 42,
             ));
        $this->hasColumn('activation', 'string', 255, array(
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
        $this->hasOne('City', array(
             'local' => 'city_id',
             'foreign' => 'id'));

        $this->hasOne('State', array(
             'local' => 'state_id',
             'foreign' => 'id'));

        $this->hasMany('NewsletterXStudent', array(
             'local' => 'id',
             'foreign' => 'student_id'));

        $this->hasMany('Subscription', array(
             'local' => 'id',
             'foreign' => 'student_id'));

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