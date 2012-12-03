<?php

class MailmagazineSendTask extends sfBaseTask
{
  protected function configure()
  {
    // // add your own arguments here
    // $this->addArguments(array(
    //   new sfCommandArgument('my_arg', sfCommandArgument::REQUIRED, 'My argument'),
    // ));

    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name'),
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'doctrine'),
      // add your own options here
    ));

    $this->namespace        = 'Mailmagazine';
    $this->name             = 'Send';
    $this->briefDescription = '';
    $this->detailedDescription = <<<EOF
The [Mailmagazine:Send|INFO] task does things.
Call it with:

  [php symfony Mailmagazine:Send|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    // initialize the database connection
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = $databaseManager->getDatabase($options['connection'])->getConnection();

    // add your code here
    $today = date("Y-m-d H:00:00");
    
    //get mailmagazine that are ready to send
    $readyForSendingMailmagazines = Doctrine_Core::getTable('Mailmagazine')->getForSendingMailmagazines($today);
    
    //get all inactive students
    $inactiveStudents = Doctrine_Core::getTable('Student')->getInactiveStudents();
    
    foreach($readyForSendingMailmagazines as $i => $mailmagazine){
      foreach($inactiveStudents as $y => $inactiveStudent){
                    // send mail
    
  $mailer  = $this->getMailer();
  $mailer->composeAndSend( sfConfig::get('app_mailmagazine_email'), $inactiveStudent['email'], $mailmagazine['title'], $mailmagazine['content']);
      
      }
    }
  }
}
