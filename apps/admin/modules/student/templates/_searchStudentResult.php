<?php if (0 < count($pager->getResults())) :?>
<table summary="list of Students">
  <tr>
    <th><?php echo __('Name')?></th>
    <th><?php echo __('Subscriptions')?></th>
    <th><?php echo __('Valid Until')?></th>
    <th><?php echo __('Status')?></th>
  </tr>
  <?php foreach ($pager->getResults() as $student) :?>
  <tr>
    <td><?php echo link_to($student->getName(), url_for('@student-details?id=' . $student->getId()))?></td>
    <td><?php echo ('' != $student->_getActiveSubscriptions()) ? $student->_getActiveSubscriptions() : __('No active Subscription')?></td>
    <td><?php echo ($student->getLastSubscriptionToExpire()) ? $student->getLastSubscriptionToExpire()->getValidUntil() : '--'?></td>
    <td><?php echo $student->_getStatus()?></td>
  </tr>
  <?php endforeach;?>
</table>
<?php else:?>
<div><?php echo __('No Student to show')?></div>
<?php endif;?>

<?php if ($pager->haveToPaginate()) :?>
<div id="navv">
<?php echo link_to('<<', url_for('@students?' . http_build_query($searchForm->getValues()) . '&page=' . $pager->getFirstPage()), 'class="pager"')?>
<?php echo link_to('<', url_for('@students?' . http_build_query($searchForm->getValues()) . '&page=' . $pager->getPreviousPage()), 'class="pager"' )?>
  <?php foreach ($pager->getLinks() as $page) :?>
  <?php echo ($page == $pager->getPage()) ? $page : link_to($page, url_for('@students?' . http_build_query($searchForm->getValues()) . '&page=' . $page), 'class="pager"')?>
  <?php endforeach;?>
<?php echo link_to('>', url_for('@students?' . http_build_query($searchForm->getValues()) . '&page=' . $pager->getNextPage()),'class="pager"')?>
<?php echo link_to('>>', url_for('@students?' . http_build_query($searchForm->getValues()) . '&page=' . $pager->getLastPage()), 'class="pager"')?>
<?php endif;?>
</div>