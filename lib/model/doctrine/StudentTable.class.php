<?php

/**
 * StudentTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class StudentTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object StudentTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Student');
    }
    
   
}