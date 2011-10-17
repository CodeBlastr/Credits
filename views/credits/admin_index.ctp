<div class="credits index">
	<h2><?php __('Credits');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('credit_type_id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('amount');?></th>
			<th><?php echo $this->Paginator->sort('value');?></th>
			<th><?php echo $this->Paginator->sort('creator_id');?></th>
			<th><?php echo $this->Paginator->sort('modifier_id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($credits as $credit):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $credit['Credit']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($credit['CreditType']['name'], array('controller' => 'enumerations', 'action' => 'view', $credit['CreditType']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($credit['User']['username'], array('controller' => 'users', 'action' => 'view', $credit['User']['id'])); ?>
		</td>
		<td><?php echo $credit['Credit']['amount']; ?>&nbsp;</td>
		<td><?php echo $credit['Credit']['value']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($credit['Creator']['username'], array('controller' => 'users', 'action' => 'view', $credit['Creator']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($credit['Modifier']['username'], array('controller' => 'users', 'action' => 'view', $credit['Modifier']['id'])); ?>
		</td>
		<td><?php echo $credit['Credit']['created']; ?>&nbsp;</td>
		<td><?php echo $credit['Credit']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $credit['Credit']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $credit['Credit']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $credit['Credit']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $credit['Credit']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Credit', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Enumerations', true), array('controller' => 'enumerations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Credit Type', true), array('controller' => 'enumerations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>