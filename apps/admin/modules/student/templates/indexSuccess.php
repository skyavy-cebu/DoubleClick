<div class="studentSearchBox">
  <form action="<?php echo url_for('@students')?>" method="GET">
  <?php echo $searchForm?>
  <input type="submit" value="<?php echo __('Search') ?>">
  </form>
</div>

<?php include_partial('student/searchStudentResult', array('searchForm' => $searchForm, 'pager' => $pager))?>