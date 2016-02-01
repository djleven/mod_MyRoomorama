<?php
/* @version    $Id: helper.php 50 2014-11-25 23:00:00 gerrit_hoekstra and kostas_stathakos $
* @package    Joomla
* @copyright  Copyright (C) 2012 www.hoekstra.co.uk and 2014 e-leven.net All rights reserved.
* @license    GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
// no direct access
defined('_JEXEC') or die('Restricted access');

require_once("functions.php");

class mod_myroomorama {
  public static function getMyRoomorama(&$params) {
    global $mainframe;

    $debug                = $params->get('debug','0');
    $apiid                = $params->get('apiid','0');
    $responseEncoding     =($params->get('encoding', '0')==1)?"xml":"JSON";
    $itemid               = $params->get('itemid', '129600');
    $PropertyItemID           = urlencode($itemid);
    $affiliate_enable     = $params->get('affiliate_enable', '0');
    $affiliate_trackingid = $params->get('affiliate_trackingid', '0');
    $affiliate_partner    = $params->get('affiliate_partner', '0');
    $endpoint   = "http://api.roomorama.com/v1.0/rooms/"; 
    $apicall = "$endpoint"
     . "$PropertyItemID"
     . ".$responseEncoding";
    
    if($debug){
      echo "<strong>API Call to Roomoramma:</strong><br/>";
      echo $apicall."<br/>";
      echo "<strong>PHP Configuration:</strong><br/>";
      echo "file_get_contents".((IsFileGetContentsOK())?" is ":" is not ")."supported.<br/n>";
      echo "cURL library".((IscURLInstalled())?" is ":" is not ")."installed.<br/n>";
    }
    // Load the call and capture the document returned by Roomoramma API
    // If allow_url_fopen=off or allow_url_include=off use curl instead:
    if(IsFileGetContentsOK()){
      if ($responseEncoding=='JSON'){
        // New style JSON
        $resp = json_decode(file_get_contents($apicall));

      } else {
        // Old-style XML
        $resp = simplexml_load_file($apicall);
      }
    }else{
      if(IscURLInstalled()){
        if ($responseEncoding=='JSON'){
          $resp = json_decode(curl_get_contents($apicall));
        }else{
          $resp = simplexml_load_string(curl_get_contents($apicall));
        }
      }else{
        JError::raiseWarning(103,JTEXT::sprintf('ERROR_PHP_CONFIG',JTEXT::_('MODULE'),$PropertyItemID),JTEXT::_('ERROR_PHP_CONFIG_INFO'));
      }
    }

   if ($resp->result) {
      return $resp->result;
 } if ($resp->room) {
      return $resp->room;

   
    }else{
      JError::raiseWarning(102,JTEXT::sprintf('ERROR_API_ITEM',JTEXT::_('MODULE'),$PropertyItemID),JTEXT::_('ERROR_API_ITEM_INFO'));
      return;
    }
  }
}
