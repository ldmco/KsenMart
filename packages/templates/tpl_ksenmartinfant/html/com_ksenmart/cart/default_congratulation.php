<?php defined('_JEXEC') or die; ?>
<div id="end">
	<h1><?php echo JText::_('KSM_CART_CONGRATULATION_INTRO'); ?></h1>
	<div class="txt">
		<div class="info">
			<?php echo JText::sprintf($this->params->get('printforms_congritulation_message_template', 'KSM_CART_CONGRATULATION_ORDER_NUMBES'), $this->order->id); ?>
		</div>
	</div>
</div>