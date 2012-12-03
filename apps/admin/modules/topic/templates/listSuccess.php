<h1><?php echo __('List of Topics')?></h1>

<?php if (0 < count($topics)) :?>
<table summary="Topics list">
  <tr>
    <th><?php echo __('Date')?></th>
    <th><?php echo __('Title')?></th>
    <th><?php echo __('Actions')?></th>
  </tr>
  
  <?php foreach ($topics as $topic) :?>
  <tr>
    <td><?php echo date('m-d-Y', strtotime($topic->getPublishDate()))?></td>
    <td><?php echo link_to($topic->getTitle(), '/uploads/topics/' . $topic->getPdfFilename(), array('target' => 'blank'))?></td>
    <td><?php echo link_to(__('Edit'), '@topic-edit?id=' . $topic->getId())?></td>
  </tr>
  <?php endforeach;?>
</table>
<?php else :?>
<div>No Topic</div>
<?php endif;?>

<?php echo link_to(__('Add Topic'), '@topic-add')?>