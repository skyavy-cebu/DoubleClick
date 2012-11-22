<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('teacher/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td class="portfolio-save" colspan="2">
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
     <tr>
        <td class="portfolio-form-title"><?php echo $form['portfolio']->renderLabel()?></td>
     </tr>
     <tr>
        <td class="portfolio-form-content"><?php echo $form['portfolio']->render(array("cols"=>70))?></td>
     </tr>
     <tr>
        <td class="portfolio-form-title"><?php echo $form['details']->renderLabel()?></td>
      </tr>
      <tr>
        <td class="portfolio-form-content"><?php echo $form['details']->render(array("cols"=>70))?></td>
      </tr>
    </tbody>
  </table>
</form>
<script type="text/javascript">
				CKEDITOR.replace( 'teacher_details', {toolbar : 'MyToolbar'});
</script>