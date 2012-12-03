<table>
  <tbody>
    <tr>
      <th><?php echo __('Date Updated') ?></th>
      <td><?php echo $teacher['updated_at'] ?></td>
    </tr>
    <tr>
      <th><?php echo __('Portfolio') ?></th>
      <td><?php echo $teacher['portfolio'] ?></td>
    </tr>
    <tr>
       <th><?php echo __('Detail') ?></th>
      <td><?php echo $teacher['details'] ?></td>
    </tr>
  </tbody>
</table>
<a href="<?php echo url_for('@teacher-portfolio-edit?id=' . $teacher['id']) ?>">edit</a>