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

  require_once __DIR__ . '/embedGoogleMapHtmlBuilder.php';

  class EmbedGoogleMapEmbedAPIHtmlBuilder extends EmbedGoogleMapHtmlBuilder {

    private $baseUrl = "https://www.google.com/maps/embed/v1/search";

    public function buildHtml(&$params) {
      $url = parent::getUrl($params, $this->baseUrl);

      $html = parent::getIFrameBegin($params);

      if($params->isLink() == 1) {
		$url .= "?key=".$params->getEmbedAPIKey();
        $url .= "&q=".urlencode($params->getAddress());
        $url .= "&zoom=".$params->getZoomLevel();
        $url .= "&maptype=".$this->getMapType($params->getMapType());
		if(strcmp($params->getLanguage(),'-') != 0) {
		  $url .= "&language=".$params->getLanguage();
		}
      }
	  if($params->isLink() == 0 && $params->isGoogleMapsEngine() == 1) {
		$html .= "src='$url&output=embed'></iframe>\n";
	  } else {
        $html .= "src='$url'></iframe>\n";
	  }
  
      if($params->getAddLink() == 0) {
		if($params->isGoogleMapsEngine() == 0) {
		  $url = str_replace('/embed','/viewer', $url);
		  $html .= parent::getLinkHtml($url, $params->getLinkLabel());
		} else if($params->isLink() == 0) {
		  $html .= parent::getLinkHtml($url, $params->getLinkLabel());
		}		
      }
      return $html;
    }
	
	private function getMapType($mapType) {
      if(strcmp(strtolower($mapType),'m') == 0) {
        return 'roadmap';
      } else if(strcmp(strtolower($mapType),'k') == 0) {
        return 'satellite';
      } else {
        return 'roadmap';
      }
    }
  }

?>