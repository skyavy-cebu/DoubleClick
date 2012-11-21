<form action="<?php echo url_for('@login')?>" method="POST">
  <table summary="Admin Login Form">
    <tr>
      <td><?php echo $form['email']->renderRow()?></td>
    </tr>
    <tr>
      <td><?php echo $form['password']->renderRow()?></td>
    </tr>
  </table>
  
  <?php echo $form->renderHiddenFields()?>
  
  <input type="submit" value="<?php echo __('Submit')?>" />
</form>