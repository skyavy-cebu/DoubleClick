<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('State', 'doctrine');

/**
 * BaseState
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property string $name
 * @property Doctrine_Collection $City
 * @property Doctrine_Collection $Student
 * 
 * @method integer             getId()      Returns the current record's "id" value
 * @method string              getName()    Returns the current record's "name" value
 * @method Doctrine_Collection getCity()    Returns the current record's "City" collection
 * @method Doctrine_Collection getStudent() Returns the current record's "Student" collection
 * @method State               setId()      Sets the current record's "id" value
 * @method State               setName()    Sets the current record's "name" value
 * @method State               setCity()    Sets the current record's "City" collection
 * @method State               setStudent() Sets the current record's "Student" collection
 * 
 * @package    DOUBLECLICK
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseState extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('state');
        $this->hasColumn('id', 'integer', 2, array(
             'type' => 'integer',
             'unsigned' => true,
             'primary' => true,
             'autoincrement' => true,
             'length' => 2,
             ));
        $this->hasColumn('name', 'string', 50, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 50,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('City', array(
             'local' => 'id',
             'foreign' => 'state_id'));

        $this->hasMany('Student', array(
             'local' => 'id',
             'foreign' => 'state_id'));
    }
}