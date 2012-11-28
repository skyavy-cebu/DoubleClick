<h1><?php echo __('Contact'); ?></h1>

<form action="<?php echo url_for('@contact') ?>" method="POST">
  <table>
    <tr>
      <td><?php echo $form['name']->renderRow()?></td>
    </tr>
    <tr>
      <td><?php echo $form['contact']->renderRow()?></td>
    </tr>
    <tr>
      <td><?php echo $form['email']->renderRow()?></td>
    </tr>
    <tr>
      <td><?php echo $form['cemail']->renderRow()?></td>
    </tr>
    <tr>
      <td><?php echo $form['inquiry']->renderRow()?></td>
    </tr>
    <tr>
      <td colspan="3">
        <input type="submit" value="Submit" />
      </td>
    </tr>
     <?php echo $form->renderHiddenFields()?>
     
  </table>
  
</form>
