<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $cust_feedback->getId() ?></td>
    </tr>
    <tr>
      <th>Customer name:</th>
      <td><?php echo $cust_feedback->getCustomerName() ?></td>
    </tr>
    <tr>
      <th>Body:</th>
      <td><?php echo $cust_feedback->getBody() ?></td>
    </tr>
    <tr>
      <th>Publish date:</th>
      <td><?php echo $cust_feedback->getPublishDate() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $cust_feedback->getUpdatedAt() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $cust_feedback->getCreatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('feedback/edit?id='.$cust_feedback->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('feedback/index') ?>">List</a>
