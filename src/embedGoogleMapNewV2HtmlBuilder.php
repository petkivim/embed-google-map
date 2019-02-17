<?php

/**
 * @version	$Id: Embed Google Map v2.1.0 2016-06-25 12:06 $
 * @package	Joomla 1.6
 * @copyright	Copyright (C) 2014-2016 Petteri Kivimäki. All rights reserved.
 * @author	Petteri Kivimäki, yozmag (https://github.com/yozmag)
 */
require_once __DIR__ . '/embedGoogleMapHtmlBuilder.php';

class EmbedGoogleMapNewV2HtmlBuilder extends EmbedGoogleMapHtmlBuilder {

    private $baseUrl = "https://www.google.com/maps/embed/v1/";

    public function buildHtml(&$params) {
        $url = parent::getUrl($params, $this->baseUrl);

        $html = parent::getIFrameBegin($params);

        if ($params->isLink() == 1) {
            $url .= "place?q=" . $params->getAddress();
        }

        if ($params->isGoogleMapsEngine() == 1) {
            $url .= "&zoom=" . $params->getZoomLevel();

             $url .= "&maptype=" . $this->getMapType($params->getMapType());
         /*  if (strcmp($params->getLanguage(), '-') != 0) {
                $url .= "&hl=" . $params->getLanguage();
            }*/
        }
        $url .= "&key=" . $params->getEmbedAPIKey();
        $html .= "src='$url' allowfullscreen ></iframe>\n";

       /* if ($params->getAddLink() == 0) {
            if ($params->isGoogleMapsEngine() == 0) {
                $url = str_replace('/embed', '/viewer', $url);
            } else if ($params->isLink() == 1) {
                $url = str_replace('/maps', '/maps/preview', $url);
            }
            $html .= parent::getLinkHtml($url, $params->getLinkLabel());
        }*/
        return $html;
    }

    private function getMapType($mapType) {
        if (strcmp(strtolower($mapType), 'm') == 0) {
            return 'roadmap';
        } else if (strcmp(strtolower($mapType), 'k') == 0) {
            return 'satellite';
        } else {
            return 'roadmap';
        }
    }

}

?>
