<?php if ($hasAvailableTeachersToSubscribeTo) :?>
<form action="<?php echo url_for('subscription-add')?>" method="POST">
  <?php echo $form?>
  <input type="submit" value="<?php echo __('Submit')?>" />
</form>
<?php else :?>
<div><?php echo __('** No available Teacher to subscribe to')?></div>
<?php endif;?>