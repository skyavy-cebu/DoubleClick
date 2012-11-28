<?php

/**
 * TeacherTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class TeacherTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object TeacherTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Teacher');
    }
    
    public function getTeachers()
    {
       $q = $this->createQuery('c');
   
      return $q->execute();
    }
    
		
    /*get student's teachers*/
	  public function getStudentTeachers($id)
    {
        $q = $this->createQuery('a')
        ->leftJoin('a.SubscriptionPlan sp')
        ->leftJoin('sp.Subscription sub')
        ->where('sub.student_id = ?', $id)
        ->andWhere('sub.valid_until >= NOW()'); // valid subscription;
        
      return $q->execute();
    }
    
}
