
<form action="<?php echo url_for('@newsletter-confirm') ?>" method="POST">
  <table>
    <tr name="register-email">
      <th><?php echo __('Title')?></th>
      <td><?php echo $newsletter['title']?></td>
    </tr>
    <tr name="register-password">
      <th><?php echo __('Content')?></th>
        <td><?php echo $newsletter['content']?></td>
    </tr>
    <tr>
      <td colspan="2">
        <input type="button" value="<?php echo __('Back')?>" onclick="javascript:history.go(-1); return false;" />
        <input type="submit" value="Save" />
      </td>
    </tr>
    
  </table>
</form>