<h1><?php echo __('Login'); ?></h1>

<form action="<?php echo url_for('@login?userType=' . $userType) ?>" method="POST">
  <table>
    <tr>
      <td><?php echo $form['email']->renderRow()?></td>
    </tr>
    <tr>
      <td><?php echo $form['password']->renderRow()?></td>
    </tr>
    <tr>
      <td colspan="3">
        <input type="submit" value="<?php echo __('Login'); ?>" />
      </td>
    </tr>
  </table>
  <?php echo $form->renderHiddenFields()?>
</form>