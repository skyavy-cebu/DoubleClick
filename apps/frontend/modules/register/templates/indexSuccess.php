<h1><?php echo __('Register'); ?></h1>

<form action="<?php echo url_for('@register') ?>" method="POST">
  <table summary="User (Student) registration form">
    <tr>
      <td><?php echo $form['name']->renderRow()?></td>
    </tr>
    <tr>
      <td><?php echo $form['furigana']->renderRow()?></td>
    </tr>
    <tr>
      <th><?php echo __('Zip Code')?></th>
      <td><?php echo $form['zipcode1']->renderError()?><?php echo $form['zipcode1']->render()?>-<?php echo $form['zipcode2']->renderError()?><?php echo $form['zipcode2']->render()?></td>
    </tr>
    <tr>
      <td><?php echo $form['state_id']->renderRow()?></td>
    </tr>
    <tr>
      <td><?php echo $form['address']->renderRow()?></td>
    </tr>
    <tr>
      <td><?php echo $form['contact']->renderRow()?></td>
    </tr>
    <tr>
      <td><?php echo $form['email']->renderRow()?></td>
    </tr>
    <tr>
      <td><?php echo $form['cemail']->renderRow()?></td>
    </tr>
    <tr>
      <td><?php echo $form['password']->renderRow()?></td>
    </tr>
    <tr>
      <td><?php echo $form['cpassword']->renderRow()?></td>
    </tr>
  </table>
  
  <?php if ($form->hasGlobalErrors()) echo $form->renderGlobalErrors()?>
  
  <table summary="available Subscription Plans application form">
    <?php foreach ($form['subscription_plans'] as $subsPlansForm) :?>
    <tr>
      <td><?php echo $subsPlansForm['subs_plans']->renderRow()?></td>
    </tr>
    <?php endforeach;?>
  </table>
  
  <input type="submit" value="<?php echo __('Confirm Registration'); ?>" />
  <?php echo $form->renderHiddenFields()?>
</form>