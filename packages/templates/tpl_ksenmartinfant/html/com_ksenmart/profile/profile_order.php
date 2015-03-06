<?php defined('_JEXEC' ) or die(); ?>
<table class="table table_sub">
	<thead>
		<th><?php echo JText::_('KSM_PHOTO_COLUMN_TITLE');?></th>
		<th><?php echo JText::_('KSM_PRODUCT_COLUMN_TITLE');?></th>
		<th><?php echo JText::_('KSM_QUANTITY_COLUMN_TITLE');?></th>
		<th><?php echo JText::_('KSM_PRICE_COLUMN_TITLE');?></th>
		<th><?php echo JText::_('KSM_SUBTOTAL_COLUMN_TITLE');?></th>
	</thead>
	<tbody>
		<?php foreach($order->items as $item) {
			$this->item = $item; ?>
			<tr>
				<?php require('profile_order_item.php'); ?>
			</tr>
		<?php } ?>
		<tr>
			<td colspan="5">
				<form method="POST" class="order_form clearfix">
					<?php if ($order->status_id == 2){ ?>
					<input type="submit" class="st_button btn btn-success" value="Оформить заказ" />
					<?php } else { ?>
                    <input type="submit" class="st_button btn btn-success pull-left" value="Повторить заказ" />
					<dl class="dl-horizontal pull-right">
						<dt>Адрес доставки:</dt>
						<dd><? echo $order->address_fields; ?></dd>
					</dl>
					<?php } ?>
					<input type="hidden" name="id" value="<?php echo $order->id; ?>" />
					<input type="hidden" name="task" value="profile.load_order" />
				</form>
			</td>
		</tr>
	</tbody>
</table>