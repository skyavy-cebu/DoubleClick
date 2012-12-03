<form action="<?php echo url_for('@topic-edit?id=' . $topic->getId())?>" method="POST" enctype="multipart/form-data">

  <?php echo $form->renderGlobalErrors()?>
  
  <table summary="Edit Topic form">
    <tr><td><?php echo $form['publish_date']->renderRow(array('id' => 'publish_date_datepicker'))?></td></tr>
    <tr><td><?php echo $form['title']->renderRow()?></td></tr>
    <tr><td><?php echo $form['pdf_filename']->renderRow()?></td></tr>
  </table>
  
  <?php echo $form->renderHiddenFields()?>
  
  <input type="submit" value="<?php echo __('Edit')?>" />
</form>


<script type="text/javascript">

// <![CDATA[

$().ready(function() {
  $("#publish_date_datepicker").val("<?php echo date('m/d/Y', strtotime($form['publish_date']->getValue()))?>");
  
  $("#publish_date_datepicker").datepicker({
    minDate: new Date()
  }).attr('readonly', 'readonly');
});
  
// ]]>

</script>