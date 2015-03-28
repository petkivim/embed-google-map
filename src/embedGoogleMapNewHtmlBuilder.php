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

  class EmbedGoogleMapNewHtmlBuilder extends EmbedGoogleMapHtmlBuilder {

    private $baseUrl = "https://www.google.com/maps";

    public function buildHtml(&$params) {
      $url = parent::getUrl($params, $this->baseUrl);

      $html = parent::getIFrameBegin($params);

      if($params->isLink() == 1) {
        $url .= "?q=".$params->getAddress();
      }

      if($params->isGoogleMapsEngine() == 1) {
        $url .= "&z=".$params->getZoomLevel();
        $url .= "&t=".$this->getMapType($params->getMapType());
		if(strcmp($params->getLanguage(),'-') != 0) {
		  $url .= "&hl=".$params->getLanguage();
		}
      }
      $html .= "src='$url&output=embed'></iframe>\n";
  
      if($params->getAddLink() == 0) {
		if($params->isGoogleMapsEngine() == 0) {
		  $url = str_replace('/embed','/viewer', $url);
		} else if($params->isLink() == 1) {
		  $url = str_replace('/maps','/maps/preview', $url);
		}
		$html .= parent::getLinkHtml($url, $params->getLinkLabel());
      }
      return $html;
    }
	
	private function getMapType($mapType) {
      if(strcmp(strtolower($mapType),'m') == 0 || strcmp(strtolower($mapType),'k') == 0) {
        return $mapType;
      } else {
        return 'm';
      }
    }
  }

?>