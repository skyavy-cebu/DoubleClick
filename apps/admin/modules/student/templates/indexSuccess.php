<h1><?php echo __('Users Management')?></h1>

<div class="studentSearchBox">
  <h2><?php echo __('User Search')?></h2>
  <form action="<?php echo url_for('@students')?>" method="GET">
  <?php echo $searchForm?>
  <input type="submit" value="<?php echo __('Search') ?>">
  </form>
</div>

<div class="studentsList">
  <h2><?php echo __('List of Users')?></h2>
  <?php include_partial('student/searchStudentResult', array('searchForm' => $searchForm, 'pager' => $pager))?>
</div>