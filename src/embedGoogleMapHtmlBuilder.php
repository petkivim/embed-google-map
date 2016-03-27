<?php

/**
 * @version	$Id: Embed Google Map v2.0.2 2016-03-27 16:19 $
 * @package	Joomla 1.6
 * @copyright	Copyright (C) 2014-2016 Petteri Kivimäki. All rights reserved.
 * @author	Petteri Kivimäki
 */
abstract class EmbedGoogleMapHtmlBuilder {

    abstract public function buildHtml(&$params);

    protected function getUrl(&$params, $baseUrl) {
        $url = "";
        if ($params->isLink() == 0 && $params->isGoogleMapsEngine() == 1) {
            $url = $params->getAddress();
        } else if ($params->isGoogleMapsEngine() == 0) {
            $url = $params->getAddress();
            $alternatives = array("/edit", "/viewer");
            $url = str_replace($alternatives, '/embed', $url);
        } else {
            $url = $baseUrl;
        }
        if ($params->getHttps() == 0) {
            $url = str_replace('http://', 'https://', $url);
        }
        return $url;
    }

    protected function getIFrameBegin(&$params) {
        $width = "width='" . $params->getWidth() . "'";
        $height = "height='" . $params->getHeight() . "'";
        $style = "style='border: " . $params->getBorder() . "px " . $params->getBorderStyle() . " " . $params->getBorderColor() . "'";
        return "\n<iframe $width $height $style ";
    }

    protected function getLinkHtml($url, $label) {
        return "<div><a href='$url' target='new'>$label</a></div>\n";
    }

}

?>