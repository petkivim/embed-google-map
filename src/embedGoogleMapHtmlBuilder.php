<?php
/**
* @version		$Id: Embed Google Map v2.0.1 2015-03-28 16:06 $
* @package		Joomla 1.6
* @copyright	Copyright (C) 2014-2015 Petteri Kivimäki. All rights reserved.
* @author		Petteri Kivimäki
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
*/

  abstract class EmbedGoogleMapHtmlBuilder {
    abstract public function buildHtml(&$params);

    protected function getUrl(&$params, $baseUrl) {
      $url = "";
      if($params->isLink() == 0 && $params->isGoogleMapsEngine() == 1) {
        $url = $params->getAddress();
      } else if($params->isGoogleMapsEngine() == 0) {
        $url = $params->getAddress();
        $alternatives = array("/edit", "/viewer");
        $url = str_replace($alternatives,'/embed', $url);
      } else {
        $url = $baseUrl;
      }
      if($params->getHttps() == 0) {
        $url = str_replace('http://','https://', $url);
      }
      return $url;
    }
	
	protected function getIFrameBegin(&$params) {
	  $width="width='".$params->getWidth()."'";
      $height="height='".$params->getHeight()."'";
      $style="style='border: ".$params->getBorder()."px ".$params->getBorderStyle()." ".$params->getBorderColor()."'";
      return "\n<iframe $width $height $style ";
	}
	
	protected function getLinkHtml($url, $label) {
	  return "<div><a href='$url' target='new'>$label</a></div>\n";
	}

  }

?>