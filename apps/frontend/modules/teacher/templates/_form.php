<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('teacher/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php /*echo link_to('Delete', 'newsletter/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?'))*/ ?>
			<input type="button" value="<?php echo __('Back')?>" onclick="javascript:history.go(-1); return false;" />
		  <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form ?>
    </tbody>
  </table>
</form>
