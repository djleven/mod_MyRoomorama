<?php
/*
* @version    $Id: default.php 53 2015-11-14 23:35:00 kostas_stathakos $
* @package    Joomla
* @copyright  Copyright (C) 2014 e-leven.net
* @license    GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
// no direct access
defined('_JEXEC') or die('Restricted access');

require_once ('helper.php');

$resp= mod_myroomorama::getMyRoomorama($params);
if($resp){
  require(JModuleHelper::getLayoutPath('mod_myroomorama'));
}
?>
