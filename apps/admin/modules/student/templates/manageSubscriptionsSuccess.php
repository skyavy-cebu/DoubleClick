<h1><?php echo __('Manage %student_name%\'s Subscriptions', array('%student_name%' => $student->getName()))?></h1>

<?php foreach ($settlements as $settlement) :?>
<form action="<?php echo url_for('@settlement-change-status?id=' . $settlement->getId())?>" method="POST">
  <?php $changeSettlementStatusForm = new ChangeSettlementStatusForm($settlement->getRawValue());?>
  <?php echo $changeSettlementStatusForm['status']->render()?>
  <?php echo $changeSettlementStatusForm->renderHiddenFields()?>
  <input type="submit" value="<?php echo __('Update')?>"/>
</form>
<div>
  <?php echo date('M j, Y', strtotime($settlement->getCreatedAt()))?>
  <?php echo $settlement->getPrice()?>円
  <?php foreach ($settlement->getSubscription() as $subscription) :?>
  <div>
    <?php echo $subscription->getSubscriptionPlan()->getName()?>
    <?php if (1 == $settlement->getStatus()) :?>
    <form action="<?php echo url_for('@subscription-change-status?id=' . $subscription->getId())?>" method="POST">
      <?php $changeSubscriptionStatusForm = new ChangeSubscriptionStatusForm($subscription->getRawValue());?>
      <?php echo $changeSubscriptionStatusForm['is_active']->render()?>
      <?php echo $changeSubscriptionStatusForm->renderHiddenFields()?>
      <input type="submit" value="<?php echo __('Update')?>"/>
    </form>
    <?php endif;?>
  </div>
  <?php endforeach;?>
</div>
<?php endforeach;?>