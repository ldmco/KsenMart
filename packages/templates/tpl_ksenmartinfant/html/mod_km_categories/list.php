<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_menu
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

// Note. It is important to remove spaces between elements.
?>
<h4><?php echo $module->title?></h4>
	<ul class="toggle_content list-footer tree dynamized">
	<?php
	foreach ($list as $i => &$item) :
		$class = '';
		if ($item->id == $active_id) {
			$class .= ' current';
		}

		if (in_array($item->id, $path)) {
			$class .= ' active';
		}

		if ($item->deeper) {
			$class .= ' deeper';
		}

		if (!empty($class)) {
			$class = ' class=""';
		}

		echo '<li'.$class.'>';

		require JModuleHelper::getLayoutPath('mod_km_categories', 'default_url');

		if ($item->deeper) {
			echo '<ul class="menu-list-'.($item->level+1).'">';
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
