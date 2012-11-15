<h1><?php echo __('Change Password'); ?></h1>

<?php if ($showForm) :?>
<form action="<?php echo url_for('@change-password?code='.$code) ?>" method="POST">
  <table>
    <tr>
      <td><?php echo $form?></td>
    </tr>
    <tr>
      <td colspan="3">
        <input type="submit" value="<?php echo __('Change Password'); ?>" />
      </td>
    </tr>
  </table>
  <?php echo $form->renderHiddenFields()?>
</form>
<?php else :?>
<p>Password changed successfully.</p>
<?php endif;?>