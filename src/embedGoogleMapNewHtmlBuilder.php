<?php

/**
 * @version	$Id: Embed Google Map v2.3.1 2022-07-21 16:23 $
 * @package	Joomla 1.6
 * @copyright	Copyright (C) 2014-2022 Petteri Kivimäki. All rights reserved.
 * @author	Petteri Kivimäki
 */
require_once __DIR__ . '/embedGoogleMapHtmlBuilder.php';

class EmbedGoogleMapNewHtmlBuilder extends EmbedGoogleMapHtmlBuilder {

    private $baseUrl = "https://www.google.com/maps";

    public function buildHtml(&$params) {
        $url = parent::getUrl($params, $this->baseUrl);

        $html = parent::getIFrameBegin($params);

        if ($params->isLink() == 1) {
            $url .= "?q=" . $params->getAddress();
        }

        if ($params->isGoogleMapsEngine() == 1) {
            $url .= "&z=" . $params->getZoomLevel();
            $url .= "&t=" . $this->getMapType($params->getMapType());
            if (strcmp($params->getLanguage(), '-') != 0) {
                $url .= "&hl=" . $params->getLanguage();
            }
        }
        $html .= "src='$url&output=embed'></iframe>\n";

        if ($params->getAddLink() == 0) {
            if ($params->isGoogleMapsEngine() == 0) {
                $url = str_replace('/embed', '/viewer', $url);
            } else if ($params->isLink() == 1) {
                $url = str_replace('/maps', '/maps/preview', $url);
            }
            $html = parent::addLinkToHtml($html, $url, $params->getLinkLabel(), $params->getLinkPosition());
        }
        return $html;
    }

    private function getMapType($mapType) {
        if (strcmp(strtolower($mapType), 'm') == 0 || strcmp(strtolower($mapType), 'k') == 0) {
            return $mapType;
        } else {
            return 'm';
        }
    }

}

?>
