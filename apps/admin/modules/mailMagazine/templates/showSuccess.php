<table>
  <tbody>
    <tr>
    <th>Date of Sending:</th>
      <td><?php echo $mailmagazine->getPublishDate() ?></td>
    </tr>
    <tr>
      <th>Title:</th>
      <td><?php echo $mailmagazine->getTitle() ?></td>
    </tr>
    <tr>
      <th>Content:</th>
      <td><?php echo $mailmagazine->getContent() ?></td>
    </tr>
  </tbody>
</table>

<?php echo link_to('Delete', 'mailMagazine/delete?id='.$mailmagazine->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>

