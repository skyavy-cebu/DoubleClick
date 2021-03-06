<?php

/**
 * SettlementTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class SettlementTable extends Doctrine_Table
{
  /**
   * Returns an instance of this class.
   *
   * @return object SettlementTable
   */
  public static function getInstance()
  {
    return Doctrine_Core::getTable('Settlement');
  }
  
  public function getByStudentQuery($studentId)
  {
    $q = $this->createQuery('set')
      ->leftJoin('set.Subscription sub')
      ->where('sub.student_id = ?', $studentId);
      
    return $q;
  }
}