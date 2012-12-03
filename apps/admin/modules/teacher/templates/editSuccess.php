
<form action="<?php echo url_for('@teacher-portfolio-edit?id='.$teacher->getId()) ?>" method="POST">
  <table>
    <tr>
      <td><?php echo $form['portfolio']->renderRow()?></td>
    </tr>
    <tr>
      <td><?php echo $form['details']->renderRow()?></td>
    </tr>
    
    <tr>
      <td colspan="3">
        <input type="submit" value="Submit" />
      </td>
	  
    </tr>
     <?php echo $form->renderHiddenFields()?>
  </table>

</form>