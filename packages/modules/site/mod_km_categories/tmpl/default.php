<?php 
/**
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
 
defined('_JEXEC') or die;
?>
<div class="ksm-module-categories ksm-block <?php echo $class_sfx?>">
	<ul class="ksm-module-categories-level ksm-module-categories-level-1">
	<?php
	foreach ($list as $i => &$item) :
		$class = 'ksm-module-categories-item';
		if ($item->id == $active_id) {
			$class .= ' ksm-module-categories-item-current';
		}

		if (in_array($item->id, $path)) {
			$class .= ' ksm-module-categories-item-active ksm-module-categories-item-opened';
		}

		if ($item->deeper) {
			$class .= ' ksm-module-categories-item-deeper';
		}

		if (!empty($class)) {
			$class = ' class="'.trim($class) .'"';
		}

		echo '<li'.$class.'>';
		if ($item->deeper) {
			echo '<span class="ksm-module-categories-item-caret"></span>';
		}		

		require JModuleHelper::getLayoutPath('mod_km_categories', 'default_url');

		if ($item->deeper) {
			$class = 'ksm-module-categories-level ksm-module-categories-level-'.($item->level+1);
			if (!in_array($item->id, $path)) {
				$class .= ' ksm-module-categories-level-hide';
			}		
			echo '<ul class="'.$class.'">';
		}
		elseif ($item->shallower) {
			echo '</li>';
			echo str_repeat('</ul></li>', $item->level_diff);
		}
		else {
			echo '</li>';
		}
	endforeach;
	?>
	</ul>
</div>