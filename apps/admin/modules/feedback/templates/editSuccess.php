

<form action="<?php echo url_for('feedback/edit?id='.$cust_feedback->getId()) ?>" method="POST">
  <table>
    <tr>
      <td><?php echo $form['publish_date']->renderRow(array('id' => 'datepicker'))?></td>
    </tr>
    <tr>
      <td><?php echo $form['customer_name']->renderRow()?></td>
    </tr>
    <tr>
      <td><?php echo $form['body']->renderRow()?></td>
    </tr>
    
    <tr>
      <td colspan="3">
        <input type="submit" value="Submit" />
      </td>
	  
    </tr>
     <?php echo $form->renderHiddenFields()?>
  </table>

</form>
  <script>
    $(function() {
        $( "#datepicker" ).datepicker().attr('readonly','readonly');
    });
  </script>