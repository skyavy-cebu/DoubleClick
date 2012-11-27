<?php if (0 < count($pager->getResults())) :?>
<table summary="list of Students">
  <tr>
    <th><?php echo __('Name')?></th>
    <th><?php echo __('Furigana')?></th>
    <th><?php echo __('Email')?></th>
  </tr>
  <?php foreach ($pager->getResults() as $student) :?>
  <tr>
    <td><?php echo $student->getName()?></td>
    <td><?php echo $student->getFurigana()?></td>
    <td><?php echo $student->getEmail()?></td>
  </tr>
  <?php endforeach;?>
</table>
<?php else:?>
<div><?php echo __('No Subscribed Student')?></div>
<?php endif;?>

<?php if ($pager->haveToPaginate()) :?>
<div id="navv">
<?php echo link_to('<<', url_for('@teacher-students?' . http_build_query($searchForm->getValues()) . '&page=' . $pager->getFirstPage()), 'class="pager"')?>
<?php echo link_to('<', url_for('@teacher-students?' . http_build_query($searchForm->getValues()) . '&page=' . $pager->getPreviousPage()), 'class="pager"' )?>
  <?php foreach ($pager->getLinks() as $page) :?>
  <?php echo ($page == $pager->getPage()) ? $page : link_to($page, url_for('@teacher-students?' . http_build_query($searchForm->getValues()) . '&page=' . $page), 'class="pager"')?>
  <?php endforeach;?>
<?php echo link_to('>', url_for('@teacher-students?' . http_build_query($searchForm->getValues()) . '&page=' . $pager->getNextPage()),'class="pager"')?>
<?php echo link_to('>>', url_for('@teacher-students?' . http_build_query($searchForm->getValues()) . '&page=' . $pager->getLastPage()), 'class="pager"')?>
<?php endif;?>
</div>