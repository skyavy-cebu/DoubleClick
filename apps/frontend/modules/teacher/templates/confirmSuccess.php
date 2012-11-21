
<form action="<?php echo url_for('@teacher-account-settings-confirm') ?>" method="POST">
  <table>
    <tr name="register-email">
      <th><?php echo __('Email')?></th>
      <td><?php echo $teacher['email']?></td>
    </tr>
    <tr name="register-password">
      <th><?php echo __('Password')?></th>
      <td><?php echo str_repeat("*", strlen($teacher['password']))?></td>
    </tr>
    <tr>
      <td colspan="2">
        <input type="button" value="<?php echo __('Back')?>" onclick="javascript:history.go(-1); return false;" />
        <input type="submit" value="Save" />
      </td>
    </tr>
    
  </table>
</form>