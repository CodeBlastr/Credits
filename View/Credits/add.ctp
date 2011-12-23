<div class="credits form">
<?php echo $this->Form->create('Credit');?>
	<fieldset>
 		<legend><?php echo __('Add Credit'); ?></legend>
	<?php
		echo $this->Form->input('credit_type_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('amount');
		echo $this->Form->input('value');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<?php 
// set the contextual menu items
$this->set('context_menu', array('menus' => array(
	array(
		'heading' => 'Credits',
		'items' => array(
			$this->Html->link(__('List Credits', true), array('action' => 'index')),
			$this->Html->link(__('List Enumerations', true), array('controller' => 'enumerations', 'action' => 'index')),
			$this->Html->link(__('New Credit Type', true), array('controller' => 'enumerations', 'action' => 'add')),
			$this->Html->link(__('List Users', true), array('plugin' => null, 'controller' => 'users', 'action' => 'index')),
			)
		),
	)));
?>