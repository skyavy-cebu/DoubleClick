


<form action="<?php echo url_for('mailMagazine/new') ?>" method="POST">
  <table>
    <tr>
      <td><?php echo $form['publish_date']->renderRow(array('id' => 'datepicker'))?></td>

    </tr>
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
<script>
    $(function() {
       $( "#datepicker" ).datepicker().attr('readonly','readonly');
    });
    </script>
</form>
