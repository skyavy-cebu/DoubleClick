<?php if (0 < count($subscriptions)) :?>
<table summary="list of Student's Subscriptions">
  <tr>
    <td><?php echo __('Status')?></td>
    <td><?php echo __('Duration')?></td>
    <td><?php echo __('Validity')?></td>
    <td><?php echo __('Price')?></td>
    <td><?php echo __('Paid?')?></td>
    <td><?php echo __('Date of Payment')?></td>
  </tr>
  <?php foreach ($subscriptions as $subscription) :?>
  <tr>
    <td><?php echo $subscription->_getIsActive()?></td>
    <td><?php echo $subscription->getSubscriptionPlan()->getDuration()?></td>
    <td><?php echo ('' != $subscription->getValidUntil()) ? date('M j, Y (h:i A)', strtotime($subscription->getValidUntil())) : '--'?></td>
    <td><?php echo $subscription->getSubscriptionPlan()->getPrice()?></td>
    <td><?php echo $subscription->getSettlement()->_getStatus()?></td>
    <td><?php echo (1 == $subscription->getSettlement()->getStatus()) ? date('M j, Y (g:i A)', strtotime($subscription->getSettlement()->getPaidAt())) : '--';?></td>
  </tr>
  <?php endforeach;?>
</table>
<?php else:?>
<div><?php echo __('** No Subscription')?></div>
<?php endif;?>

<?php echo link_to(__('Add'), url_for('@subscription-add'), true)?>
