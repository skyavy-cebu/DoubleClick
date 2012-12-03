<h1>List of Mail magazine</h1>
<table><tr>
<td><a href="<?php echo url_for('@mailmagazines') ?>">Mail Magazine</a></td>
<td><a href="<?php echo url_for('@past-mailmagazines') ?>">Past Mail Magazine</a></td>
<td><a href="<?php echo url_for('@mailmagazine-new') ?>">Create New</a></td>
</tr>
</table>
<table>
  <thead>
    <tr>
      <th>Publish date</th>
      <th>Magazine Title</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($mailmagazines as $mailmagazine): ?>
    <tr>
	  <td><?php echo $mailmagazine->getPublishDate() ?></td>
      <td><a href="<?php echo url_for('@mailmagazine-detail?id='.$mailmagazine->getId()) ?>"><?php echo $mailmagazine->getTitle() ?></a></td>
      
      <td> <?php echo link_to('Delete', 'mailmagazine/delete?id='.$mailmagazine->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('@mailmagazine-new') ?>">New</a>
