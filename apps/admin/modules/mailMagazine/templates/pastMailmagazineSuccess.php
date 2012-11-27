<h1>List of Past Mail magazine</h1>
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
    <?php foreach ($pastmailmagazines as $pastmailmagazine): ?>
    <tr>
	  <td><?php echo $pastmailmagazine->getPublishDate() ?></td>
      <td><a href="<?php echo url_for('mailMagazine/showPastMailmagazine?id='.$pastmailmagazine->getId()) ?>"><?php echo $pastmailmagazine->getTitle() ?></a></td>
       </tr>
    <?php endforeach; ?>
  </tbody>
</table>


