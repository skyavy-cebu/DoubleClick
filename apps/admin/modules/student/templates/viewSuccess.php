<h1><?php echo __('User Information')?></h1>

<table summary="Students details">
  <tr>
    <td><?php echo __('Registration Date')?></td>
    <td><?php echo $student->getCreatedAt()?></td>
  </tr>
  <tr>
    <td><?php echo __('Status')?></td>
    <td><?php echo $student->_getStatus()?></td>
  </tr>
  <tr>
    <td><?php echo __('Name')?></td>
    <td><?php echo $student->getName()?></td>
  </tr>
  <tr>
    <td><?php echo __('Furigana')?></td>
    <td><?php echo $student->getFurigana()?></td>
  </tr>
  <tr>
    <td><?php echo __('Zip Code')?></td>
    <td><?php echo $student->getZipCode1()?>-<?php echo $student->getZipCode2()?></td>
  </tr>
  <tr>
    <td><?php echo __('Contact Info')?></td>
    <td><?php echo $student->getContact()?></td>
  </tr>
  <tr>
    <td><?php echo __('Email')?></td>
    <td><?php echo $student->getEmail()?></td>
  </tr>
</table>

<?php echo link_to(__('Manage Subscriptions'), '@student-subscriptions?id=' . $student->getId())?>