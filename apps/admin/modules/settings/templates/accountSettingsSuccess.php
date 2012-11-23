

<form action="<?php echo url_for('settings/accountSettings') ?>" method="POST">
  <table>
    <tr>
      <td><?php echo $form['name']->renderRow()?></td>
    </tr>
    <tr>
      <td><?php echo $form['password']->renderRow()?></td>
    </tr>
    <tr>
      <td><?php echo $form['cpassword']->renderRow()?></td>
    </tr>
    
    <tr>
      <td colspan="3">
        <input type="submit" value="Submit" />
      </td>
    </tr>
     <?php echo $form->renderHiddenFields()?>
  </table>
</form>