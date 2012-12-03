<form action="<?php echo url_for('@topic-add')?>" method="POST" enctype="multipart/form-data">

  <?php echo $form->renderGlobalErrors()?>
  
  <table summary="Add Topic form">
    <tr><td><?php echo $form['publish_date']->renderRow(array('id' => 'publish_date_datepicker'))?></td></tr>
    <tr><td><?php echo $form['title']->renderRow()?></td></tr>
    <tr><td><?php echo $form['pdf_filename']->renderRow()?></td></tr>
  </table>
  
  <?php echo $form->renderHiddenFields()?>
  
  <input type="submit" value="<?php echo __('Create New')?>" />
</form>


<script type="text/javascript">

// <![CDATA[

$().ready(function() {
  $("#publish_date_datepicker").datepicker({  minDate: new Date() }).attr('readonly', 'readonly');
});
  
// ]]>

</script>
