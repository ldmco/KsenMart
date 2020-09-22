<?php
/**
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JEventDispatcher::getInstance()->trigger('onLoadKsen', array('ksenmart.KSM', array('common'), array(), array('angularJS' => 0)));
KSLoader::loadLocalHelpers(array('common'));
if (!class_exists('KsenmartHtmlHelper'))
{
	require JPATH_ROOT . DS . 'components' . DS . 'com_ksenmart' . DS . 'helpers' . DS . 'head.php';
}
KsenmartHtmlHelper::AddHeadTags();

$app       = JFactory::getApplication();
$km_params = JComponentHelper::getParams('com_ksenmart');
$document  = JFactory::getDocument();
JHtml::script('mod_km_filter/default.js', false, true);
if ($km_params->get('modules_styles', true))
{
	JHtml::stylesheet('mod_km_filter/default.css', false, true);
}

require_once dirname(__file__) . '/helper.php';
$modKMFilterHelper = new modKMFilterHelper();

$modKMFilterHelper->init($params);
$mod_params    = $modKMFilterHelper->mod_params;
$price_min     = $modKMFilterHelper->price_min;
$price_max     = $modKMFilterHelper->price_max;
$manufacturers = $modKMFilterHelper->manufacturers;
$countries     = $modKMFilterHelper->countries;
$properties    = $modKMFilterHelper->properties;
$categories    = $modKMFilterHelper->categories;
$tree          = $modKMFilterHelper->tree;
$selected      = $modKMFilterHelper->getSelected();
$class_sfx     = htmlspecialchars($params->get('moduleclass_sfx', ''));
$form_action   = JRoute::_('index.php?option=com_ksenmart&view=catalog&Itemid=' . KSSystem::getShopItemid());

\Joomla\Utilities\ArrayHelper::toInteger($categories);
$price_less = $app->input->get('price_less', $price_min);
$price_more = $app->input->get('price_more', $price_max);
$order_type = $app->input->get('order_type', 'ordering');
$order_dir  = $app->input->get('order_dir', 'asc');
unset($document->_scripts['/media/system/js/mootools-core.js']);
unset($document->_scripts['/media/system/js/mootools-more.js']);
$headData           = $document->getHeadData();
$headData['script'] = str_replace("var JTooltips", '// var JTooltips', $headData['script']);
$document->setHeadData($headData);

require JModuleHelper::getLayoutPath('mod_km_filter', $params->get('layout', 'default'));