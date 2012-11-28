
<form action="<?php echo url_for('@contact-confirm') ?>" method="POST">
  <table>
    <tr name="register-email">
      <th><?php echo __('Name')?></th>
      <td><?php echo $contact['name']?></td>
    </tr>
    <tr name="register-email">
      <th><?php echo __('Contact')?></th>
      <td><?php echo $contact['contact']?></td>
    </tr>
    <tr name="register-email">
      <th><?php echo __('Email')?></th>
      <td><?php echo $contact['email']?></td>
    </tr>
    <tr name="register-email">
      <th><?php echo __('Inquiry')?></th>
      <td><?php echo $contact['inquiry']?></td>
    </tr>
    <tr>
      <td colspan="2">
        <input type="button" value="<?php echo __('Back')?>" onclick="javascript:history.go(-1); return false;" />
        <input type="submit" value="Save" />
      </td>
    </tr>
    
  </table>
</form>