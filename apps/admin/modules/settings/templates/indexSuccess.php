

<form action="<?php echo url_for('@account-settings') ?>" method="POST">
  <table>
    <tr>
      <td><?php echo $form['email']->renderRow()?></td>
    </tr>
    <tr>
      <td><?php echo $form['cemail']->renderRow()?></td>
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