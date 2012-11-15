<h1><?php echo __('Login'); ?></h1>

<form action="<?php echo url_for('@login') ?>" method="POST">
  <table>
    <tr>
      <td><?php echo $form?></td>
    </tr>
    <tr>
      <td colspan="3">
        <input type="submit" value="<?php echo __('Login'); ?>" />
      </td>
    </tr>
  </table>
</form>