<div class="credits view">
<h2><?php  __('Credit');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $credit['Credit']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Credit Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($credit['CreditType']['name'], array('controller' => 'enumerations', 'action' => 'view', $credit['CreditType']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($credit['User']['username'], array('controller' => 'users', 'action' => 'view', $credit['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Amount'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $credit['Credit']['amount']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Value'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $credit['Credit']['value']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Credit', true), array('action' => 'edit', $credit['Credit']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Credit', true), array('action' => 'delete', $credit['Credit']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $credit['Credit']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Credits', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Credit', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Enumerations', true), array('plugin' => null, 'controller' => 'enumerations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Credit Type', true), array('plugin' => null, 'controller' => 'enumerations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('plugin' => null, 'controller' => 'users', 'action' => 'index')); ?> </li>
	</ul>
</div>
