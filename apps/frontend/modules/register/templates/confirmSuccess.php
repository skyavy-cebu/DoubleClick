<h1><?php echo __('Confirm Registration'); ?></h1>

<form action="<?php echo url_for('@register-confirm') ?>" method="POST">
  <table>
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
    <tr name="register-duration">
      <th><?php echo __('Courses')?></th>
      <td><?php echo $durationLbl?></td>
    </tr>
    <tr name="register-teachers">
      <th><?php echo __('Teachers')?></th>
      <td><?php echo $teacherTitlesStr?></td>
    </tr>
    <tr>
      <td colspan="2">
        <input type="button" value="<?php echo __('Back')?>" onclick="javascript:history.go(-1); return false;" />
        <input type="submit" value="<?php echo __('Register'); ?>" />
      </td>
    </tr>
  </table>
</form>