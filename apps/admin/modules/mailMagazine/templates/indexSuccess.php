<h1>List of Mail magazine</h1>
<table><tr>
<td><a href="<?php echo url_for('mailMagazine/index') ?>">Mail Magazine</a></td>
<td><a href="<?php echo url_for('mailMagazine/pastMailmagazine') ?>">Past Mail Magazine</a></td>
<td><a href="<?php echo url_for('mailMagazine/new') ?>">Create New</a></td>
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
      <td><a href="<?php echo url_for('mailMagazine/show?id='.$mailmagazine->getId()) ?>"><?php echo $mailmagazine->getTitle() ?></a></td>
      
      <td> <?php echo link_to('Delete', 'mailMagazine/delete?id='.$mailmagazine->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('mailMagazine/new') ?>">New</a>
