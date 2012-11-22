<h1><?php echo __('Confirm Registration'); ?></h1>

<form action="<?php echo url_for('@register-confirm') ?>" method="POST">
  <table summary="confirm user (Student) registration details">
    <tr name="register-name">
      <th><?php echo __('Name')?></th>
      <td><?php echo $register['name']?></td>
    </tr>
    <tr name="register-furigana">
      <th><?php echo __('Furigana')?></th>
      <td><?php echo $register['furigana']?></td>
    </tr>
    <tr name="register-zipcode">
      <th><?php echo __('Zip Code')?></th>
      <td><?php echo $register['zipcode1']?>-<?php echo $register['zipcode2']?></td>
    </tr>
    <tr name="register-state">
      <th><?php echo __('State')?></th>
      <td><?php echo $stateName?></td>
    </tr>
    <tr name="register-address">
      <th><?php echo __('Address')?></th>
      <td><?php echo $register['address']?></td>
    </tr>
    <tr name="register-contact">
      <th><?php echo __('Contact Info')?></th>
      <td><?php echo $register['contact']?></td>
    </tr>
    <tr name="register-email">
      <th><?php echo __('Email')?></th>
      <td><?php echo $register['email']?></td>
    </tr>
    <tr name="register-password">
      <th><?php echo __('Password')?></th>
      <td><?php echo str_repeat("*", strlen($register['password']))?></td>
    </tr>
  </table>
  
  <!-- subscriptions -->
  <h2><?php echo __('Subscriptions')?></h2>
  <table summary="confirm subscription application details">
    <?php foreach ($subscriptionPlans as $subscriptionPlan) :?>
    <tr>
      <th><?php echo $subscriptionPlan->getTeacher()->getTitle()?></th>
      <td><?php echo $subscriptionPlan->getName()?></td>
      <td><?php echo $subscriptionPlan->getDuration() . __('month(s)')?></td>
      <td><?php echo $subscriptionPlan->getPrice()?>円</td>
    </tr>
    <?php endforeach;?>
  </table>
  
  <input type="button" value="<?php echo __('Back')?>" onclick="javascript:history.go(-1); return false;" />
  <input type="submit" value="<?php echo __('Register'); ?>" />
</form>