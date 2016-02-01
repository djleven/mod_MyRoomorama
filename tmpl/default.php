<?php
/*
* @version    $Id: default.php 53 2015-11-14 23:35:00 kostas_stathakos $
* @package    Joomla
* @copyright  Copyright (C) 2014 e-leven.net All rights reserved.
* @license    GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
  defined('_JEXEC') or die('Restricted access');
 $responseEncoding  =($params->get('encoding', '0')==1)?"xml":"JSON";
  $display_location =$params->get("display_location",'1');
  $display_surface_size  =$params->get("display_surface_size",'1');
  $display_floor = $params->get("display_floor",'1');
  $display_logo     =$params->get("display_logo",'1');
  $display_image    =$params->get("display_image",'1');
  $display_rooms    =$params->get("display_rooms",'1');
  $display_rules    =$params->get("display_rules",'1');
  $display_beds     =$params->get("display_beds",'0');
  $display_desc     =$params->get("display_desc",'1');
  $display_amen     =$params->get('display_amen');
  $theme       = $params->get('display_theme');
  $debug       = $params->get('debug', '0');
  $containr   = $params->get('containrss');
  $infocss    = $params->get('infocss');
  $splitnumber = $params->get("ul_split_number",'4');
  $imgclass    = $params->get('imageclass');
  $searchbtn   = $params->get('searchbtnCSS');
  $infotbl     = $params->get('infotblCSS');
  $amen_css    = $params->get('amen_css');
  $amen_ul_css = $params->get('amen_ul_css');
  $link        = $resp->url;
  $title       = $resp->title;
  $location    = $resp->city;
  $province    = $resp->province;
  $country     = $resp->country_code;
  $surface     = $resp->surface;
  $description = $resp->description;
  $amen        = $resp->amenities;
  $amen        = str_replace('_', ' ', $amen);
  $num_rooms	    = $resp->num_rooms;
  $num_bathrooms    = $resp->num_bathrooms;
  $max_guests	    = $resp->max_guests;
  $min_stay	    = $resp->min_stay;
  $num_double_beds  = $resp->num_double_beds;
  $num_sofa_beds    = $resp->num_sofa_beds;
  $price            = $resp->price;
  $surface2    = round($surface);
  // Get currency
  $currency = $resp->currency_code;

// get image 1 url
 if ($responseEncoding=='JSON'){
	$image_uri = $resp->images[0]->image;
    } else {
	$image_uri = $resp->images[0]->image[0]->image;
}

  switch($resp->type){
    case "apartment":
      $room_type = JTEXT::_('Apartment');
      break;
    case "house":
      $room_type = "<strong>".JTEXT::_('House')."</strong>";
      break;
    case "bnb":
      $room_type = "<strong>".JTEXT::_('Bnb')."</strong>";
      break;
      /* TODO
      Complete list
      */
  }
  $width = $params->get('image_width','');


?>
 <div class="<?php echo $container; ?>">

<div class="room-header">

<?php  if($display_logo) :
   $logo_path = 'modules'.$module->module."/images/Roomorama_logo_small.png"; ?>
   <h2 class="room_title"><a href="<?php echo $link;?>" target="_blank"><?php echo $title;?></a></h2>
  <?php else : ?>
   <h2 class="room_title"><a href="<?php echo $link;?>" target="_blank"><?php echo $title;?></a></h2>
   <?php endif ;?>
   </div>
  <?php 
  // TODO: 
  if($display_image){
      echo "<div><a href=\"$link\" target=\"_blank\"><img class=\"'.$imgclass.'\" src=\"$image_uri\" alt=\"".JText::_('VIEW_DETAILS')."\" title=\"$title\" width=\"".$width."%\" ></a></div>";
    }
?>

<div class="<?php echo $containr; ?>">
<div class="<?php echo $infocss; ?>">

    <table class="<?php echo $infotbl;?>">
      <tr>
        <td class="rm_label"><?php echo JText::_('Property Type') ;?></td>
        <td><?php echo $room_type;?></td>
      </tr>
<?php if($display_rules) : ?>
      <tr>
        <td class="rm_label"><?php echo JText::_('Maximum Guests') ; ?></td><td><?php echo $max_guests . '&nbsp;' . JText::_('Guests') ;?>
        </td>
      </tr>
	<tr><td class="rm_label"><?php echo JText::_('Minimum Stay') ; ?></td><td><?php echo $min_stay . '&nbsp;' .  JText::_('Nights');?>
        </td>
      </tr> 
<?php endif;  
      if($display_rooms) : ?>
      <tr>
        <td class="rm_label"><?php echo JText::_('Number of rooms') ; ?></td><td><?php echo $num_rooms;?>
        </td>
      </tr>
      <tr>
        <td class="rm_label"><?php echo JText::_('Number of bathrooms') ; ?></td><td><?php echo $num_bathrooms;?>
        </td>
      </tr> 
<?php endif;  
      if($display_beds) : 
	  if(($num_double_beds) > 0 ): ?>
      <tr>
        <td class="rm_label"><?php echo JText::_('Number of double beds') ; ?></td><td><?php echo $num_double_beds;?>
        </td>
      </tr>
	 <?php endif;  
	   if(($num_sofa_beds) > 0 ): ?>
      <tr>
        <td class="rm_label"><?php echo JText::_('Number of sofa beds') ; ?></td><td><?php echo $num_sofa_beds;?>
        </td>
      </tr> 
<?php endif; endif; 
      if($display_surface_size) : ?>
      <tr>
        <td class="rm_label"><?php echo JText::_('Size') ; ?></td><td><?php echo $surface2 . 'm²';?>
        </td>
      </tr>
<?php endif;
      if($display_location) : ?>
      <tr>
        <td class="rm_label"><?php echo JText::_('Location') ; ?></td><td><?php echo $location .',&nbsp;'. $province .',&nbsp;'. $country;?>
        </td>
      </tr>
<?php endif; ?>
      <tr>
        <td class="rm_label"><?php echo JText::_('Per Night') ; ?></td><td><?php echo $price . '&nbsp;' . $currency;?>
        </td>
      </tr>
<?php if($resp->instantly_bookable==true) : ?>
      <tr>
        <td class="rm_label"><?php echo JText::_('INSTANTBOOK') ; ?></td><td><?php echo JText::_('INSTANTBOOK2');?>
        </td>
      </tr>
<?php endif; ?>
  </table>
	
  <?php 
   if($display_amen=='1') 
      {
      echo  '<div><strong><p class="'.$amen_css.'">'.JText::_('Amenities').':</p></strong></div>';
      echo '<div class="'.$amen_css.'">';
      //explode contents into array
       $data = explode(",", $amen); 
          if($splitnumber =='0')
            {
             $splitnumber= count ($data);
            }   
        $lists = array_chunk($data, $splitnumber);
	foreach ($lists as $list) {
	echo '<ul class="'.$amen_ul_css.'">';
	echo '<li>' . implode('</li><li>', $list) . '</li>';
	echo '</ul>';
          }
      echo '</div>';
      }
    elseif($display_amen=='2')
	{
        echo  '<div><strong><p class="'.$amen_css.'">'.JText::_('Amenities').':</p></strong><p>';
        echo $amen;
        echo '</p></div>';
	}
  ?>
</div>
<div id="roomorama-search-widget"></div>
</div>
 <?php if($display_desc){
	echo "<div>";
	echo "$description";
 
  echo "</div>"; }
?>

</div>
	
 


