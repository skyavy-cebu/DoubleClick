<div class="studentSearchBox">
  
</div>
<?php if (0 < count($students)) :?>
<table summary="list of Students">
  <tr>
    <th><?php echo __('Name')?></th>
    <th><?php echo __('Furigana')?></th>
    <th><?php echo __('Email')?></th>
  </tr>
  <?php foreach ($students as $student) :?>
  <tr>
    <td><?php echo link_to($student->getName(), url_for('@dashboard'))?></td>
    <td><?php echo $student->getFurigana()?></td>
    <td><?php echo $student->getEmail()?></td>
  </tr>
  <?php endforeach;?>
</table>
<?php else:?>
<div><?php echo __('No Subscribed Student')?></div>
<?php endif;?>