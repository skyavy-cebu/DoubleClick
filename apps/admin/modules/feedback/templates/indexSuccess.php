<h1>Feedbacks List</h1>

<table>
  <thead>
    <tr>
      <th>Publish date</th>
      <th>Customer name</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($feedbacks as $cust_feedback): ?>
    <tr>
	  <td><?php echo $cust_feedback->getPublishDate() ?></td>
      <td><a href="<?php echo url_for('feedback/edit?id='.$cust_feedback->getId()) ?>"><?php echo $cust_feedback->getCustomerName() ?></a></td>
      
      <td> <?php echo link_to('Delete', 'feedback/delete?id='.$cust_feedback->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('feedback/new') ?>">New</a>
