<div class="credits form">
<?php echo $this->Form->create('Credit');?>
	<fieldset>
 		<legend><?php __('Admin Edit Credit'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('credit_type_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('amount');
		echo $this->Form->input('value');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Credit.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Credit.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Credits', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Enumerations', true), array('controller' => 'enumerations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Credit Type', true), array('controller' => 'enumerations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('plugin' => null, 'controller' => 'users', 'action' => 'index')); ?> </li>
	</ul>
</div>