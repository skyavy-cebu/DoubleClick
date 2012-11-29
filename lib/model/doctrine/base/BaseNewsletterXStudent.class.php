<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('NewsletterXStudent', 'doctrine');

/**
 * BaseNewsletterXStudent
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $newsletter_id
 * @property integer $student_id
 * @property Newsletter $Newsletter
 * @property Student $Student
 * 
 * @method integer            getNewsletterId()  Returns the current record's "newsletter_id" value
 * @method integer            getStudentId()     Returns the current record's "student_id" value
 * @method Newsletter         getNewsletter()    Returns the current record's "Newsletter" value
 * @method Student            getStudent()       Returns the current record's "Student" value
 * @method NewsletterXStudent setNewsletterId()  Sets the current record's "newsletter_id" value
 * @method NewsletterXStudent setStudentId()     Sets the current record's "student_id" value
 * @method NewsletterXStudent setNewsletter()    Sets the current record's "Newsletter" value
 * @method NewsletterXStudent setStudent()       Sets the current record's "Student" value
 * 
 * @package    DOUBLECLICK
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseNewsletterXStudent extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('newsletter_x_student');
        $this->hasColumn('newsletter_id', 'integer', 8, array(
             'type' => 'integer',
             'unsigned' => true,
             'primary' => true,
             'length' => 8,
             ));
        $this->hasColumn('student_id', 'integer', 8, array(
             'type' => 'integer',
             'unsigned' => true,
             'primary' => true,
             'length' => 8,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Newsletter', array(
             'local' => 'newsletter_id',
             'foreign' => 'id'));

        $this->hasOne('Student', array(
             'local' => 'student_id',
             'foreign' => 'id'));
    }
}