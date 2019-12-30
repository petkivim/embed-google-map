<?php

/**
 * @version	$Id: Embed Google Map v2.3.0 2019-12-30 11:19 $
 * @package	Joomla 1.6
 * @copyright	Copyright (C) 2014-2019 Petteri Kivimäki. All rights reserved.
 * @author	Petteri Kivimäki
 */
require_once __DIR__ . '/embedGoogleMapHtmlBuilder.php';

class EmbedGoogleMapClassicHtmlBuilder extends EmbedGoogleMapHtmlBuilder {

    private $baseUrl = "http://maps.google.com/";

    public function buildHtml(&$params) {
        $url = parent::getUrl($params, $this->baseUrl);

        $html = parent::getIFrameBegin($params);

        if ($params->isLink() == 1) {
            $url .= "?q=" . $params->getAddress();
            if (strlen($params->getInfoLabel()) > 0) {
                $url .= "(" . $params->getInfoLabel() . ")";
            }
        }

        if ($params->isGoogleMapsEngine() == 1) {
            $url .= "&z=" . $params->getZoomLevel();
            $url .= "&t=" . $params->getMapType();

            if (strcmp($params->getLanguage(), '-') != 0) {
                $url .= "&hl=" . $params->getLanguage();
            }

            $info = ($params->getShowInfo() == 0) ? "" : "&iwloc=near";

            // Unicode properties are available only if PCRE is compiled with "--enable-unicode-properties"
            // '\pL' = any Unicode letter
            if (preg_match('/^[^\pL]+$/u', $params->getAddress())) {
                $info = ($params->getShowInfo() == 0) ? "&iwloc=near" : "";
            }

            $url .= $info;
        }
        $html .= "src='$url&output=svembed'></iframe>\n";

        if ($params->getAddLink() == 0) {
            $output = ($params->getLinkFull() == 0) ? "&output=svembed" : "&output=classic";
            if ($params->isGoogleMapsEngine() == 0) {
                $url = str_replace('/embed', '/viewer', $url);
            } else {
                $url .= $output;
            }
            $html = parent::addLinkToHtml($html, $url, $params->getLinkLabel(), $params->getLinkPosition());
        }
        return $html;
    }

}

?>
