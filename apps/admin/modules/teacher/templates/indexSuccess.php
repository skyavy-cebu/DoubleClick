<h1>Teacher List</h1>

<table>
  <thead>
    <tr>
      <th>Name</th>
      <th></th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($teacherslist as $teacher): ?>
    <tr>
	  <td><?php echo $teacher->getTitle() ?></td>
      <td><a href="<?php echo url_for('@teacher-newsletters?id=' . $teacher['id']) ?>">sent mail magazine</a></td>
      
      <td><a href="<?php echo url_for('@teacher-portfolio?id=' . $teacher['id']) ?>">portfolio</a></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
