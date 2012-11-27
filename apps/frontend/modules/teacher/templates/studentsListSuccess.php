<div class="studentSearchBox">
  <form action="<?php echo url_for('@teacher-students')?>" method="GET">
  <?php echo $searchForm['name']->renderRow()?><?php echo $searchForm['email']->renderRow()?>
  <input type="submit" value="<?php echo __('Search') ?>">
  </form>
</div>

<?php include_partial('teacher/searchStudentResult', array('searchForm' => $searchForm, 'pager' => $pager))?>