<?php

/**
 * MailmagazineTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class MailmagazineTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object MailmagazineTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Mailmagazine');
    }
    public function getMailmagazines()
    {
       $q = $this->createQuery('m')
       ->where('m.publish_date > NOW()');
   
      return $q->execute();
    }
    public function getPastMailmagazines()
    {
       $q = $this->createQuery('m')
       ->where('m.publish_date <= NOW()');
   
      return $q->execute();
    }
    public function getForSendingMailmagazines($today)
    {
             
       $q = $this->createQuery('m')
       ->where('m.publish_date = ?', $today);
   
      return $q->execute();
    }
}