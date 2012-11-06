<h1><?php echo __('Register'); ?></h1>

<form action="<?php echo url_for('register/index') ?>" method="POST">
  <table>
    <?php echo $form ?>
    <tr>
      <td colspan="2">
        <input type="submit" value="<?php echo __('Submit'); ?>" />
      </td>
    </tr>
  </table>
</form>