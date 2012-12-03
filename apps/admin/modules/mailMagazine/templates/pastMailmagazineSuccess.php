<h1>List of Past Mail magazine</h1>
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
    <?php foreach ($pastmailmagazines as $pastmailmagazine): ?>
    <tr>
	  <td><?php echo $pastmailmagazine->getPublishDate() ?></td>
      <td><a href="<?php echo url_for('@past-mailmagazine-detail?id='.$pastmailmagazine->getId()) ?>"><?php echo $pastmailmagazine->getTitle() ?></a></td>
       </tr>
    <?php endforeach; ?>
  </tbody>
</table>


