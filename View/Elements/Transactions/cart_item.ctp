<?php 
//$product = $this->requestAction('/products/products/view/' . $transactionItem['foreign_key'] . '/1');

echo __('<h5>%s</h5>', $transactionItem['name']);

echo '<table class="table table-hover"><tr><td>';

$minQty = !empty($transactionItem['Transaction']['cart_min']) ? $transactionItem['Transaction']['cart_min'] : 0;
$maxQty = !empty($transactionItem['Transaction']['cart_max']) ? $transactionItem['Transaction']['cart_max'] : 1;

echo $this->Form->input("TransactionItem.{$i}.quantity", array(
    'label' => false,
	'class' => 'TransactionItemCartQty span5',
    'div' => false,
    'value' => $transactionItem['quantity'],
    'min' => $minQty, 'max' => $maxQty,
    'size' => 1,
    'after' => __(' %s', $this->Form->postLink('<i class="icon-trash"></i>', array('plugin' => 'transactions', 'controller' => 'transaction_items', 'action' => 'delete', $transactionItem['id']), array('title' => 'Remove from cart', 'escape' => false)))
    ));

$transactionItemCartPrice = $transactionItem['price'] * $transactionItem['quantity']; ?>

</td><td>

    <div class="TransactionItemCartPrice">
        $<span class="floatPrice"><?php echo number_format($transactionItemCartPrice, 2); ?></span>
    	<span class="priceOfOne"><?php echo number_format($transactionItem['price'], 2) ?></span>
    </div>
    
</td></tr></table>
