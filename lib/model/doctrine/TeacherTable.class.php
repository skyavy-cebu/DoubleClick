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
    public function getTeacherNewsletters()
    {
       $q = $this->createQuery('c')
        ->leftJoin('c.Newsletter n');
   
      return $q->execute();
    }
    public function getNewsletters()
    {
      $student=1;
       $q = $this->createQuery('c')
       ->leftJoin('c.SubscriptionXTeacher sx')
        ->leftJoin('sx.Subscription s')
        ->leftJoin('s.Student st')
       ->where('s.student_id = ?', $student);
      return $q->execute();
    }
	public function getStudentTeachers()
    {
		$student =1;
        $q = $this->createQuery('a')
        ->leftJoin('a.SubscriptionXTeacher x')
		->leftJoin('x.Subscription b')
       ->where('student_id = ?', $student);
         
      return $q->execute();
    }
	public function getStudentForSubscribeTeachers()
    {
		$student =1;
        $q = $this->createQuery('a')
        ->leftJoin('a.SubscriptionXTeacher x')
		->leftJoin('x.Subscription b')
        ->where('student_id != ?', $student);
         
      return $q->execute();
    }
	public function getTeachersPortfolio()
    {
	   $teacher_id =1;
	   $q = $this->createQuery('a')
	  ->where('id = ?', $teacher_id);
      
	  return $q->execute();
	}
}
