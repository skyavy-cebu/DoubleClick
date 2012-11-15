<h1><?php echo __('Password Reminder'); ?></h1>
<?php if ($showForm) :?>
<form action="<?php echo url_for('@remind-password') ?>" method="POST">
  <table>
    <tr>
      <td><?php echo $form['email']->renderRow()?></td>
    </tr>
    <tr>
      <td colspan="3">
        <input type="submit" value="<?php echo __('Reset Password'); ?>" />
      </td>
    </tr>
  </table>
  <?php echo $form->renderHiddenFields()?>
</form>
<?php else :?>
<p>Please check your mail to reset your password.</p>
<?php endif;?>