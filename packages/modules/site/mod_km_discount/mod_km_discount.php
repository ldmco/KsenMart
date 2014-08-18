<?php defined('_JEXEC') or die;
/*
 *   Модуль отображения скидок
 *   
 */

JDispatcher::getInstance()->trigger('onLoadKsen', array('ksenmart', array('common'), array(), array('angularJS' => 0)));

KSLoader::loadLocalHelpers(array('common'));
if (!class_exists('KsenmartHtmlHelper')) {
	require JPATH_ROOT.DS.'components'.DS.'com_ksenmart'.DS. 'helpers'.DS.'head.php';
}
KsenmartHtmlHelper::AddHeadTags();

$km_params = JComponentHelper::getParams('com_ksenmart');
$document  = JFactory::getDocument();
//$document->addScript(JURI::base().'modules/mod_km_discount/js/default.js', 'text/javascript', true);
if($km_params->get('modules_styles', true)) {
    $document->addStyleSheet(JURI::base().'modules/mod_km_discount/css/default.css');
}

//какие скидки существуют
$discounts = JRequest::getVar('kmdiscounts', array()); 

if(!empty($discounts)){
    require_once dirname(__FILE__) . DS . 'helper.php';
	$discounts = ModKMDiscountHelper::getDiscounts($discounts);
    require JModuleHelper::getLayoutPath('mod_km_discount', $params->get('layout', 'default'));
}