<h1>New Newsletter</h1>

<form action="<?php echo url_for('@new-newsletter') ?>" method="POST">
  <table>
    <tr>
      <td><?php echo $form['title']->renderRow()?></td>
    </tr>
    <tr>
      <td><?php echo $form['content']->renderRow()?></td>
    </tr>
    
    <tr>
      <td colspan="3">
        <input type="submit" value="Submit" />
      </td>
    </tr>
     <?php echo $form->renderHiddenFields()?>
  </table>
</form>