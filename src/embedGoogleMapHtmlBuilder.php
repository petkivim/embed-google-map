<?php

/**
 * @version	$Id: Embed Google Map v2.1.0 2016-06-25 12:06 $
 * @package	Joomla 1.6
 * @copyright	Copyright (C) 2014-2016 Petteri Kivimäki. All rights reserved.
 * @author	Petteri Kivimäki
 */
abstract class EmbedGoogleMapHtmlBuilder {

    private static $scriptDeclarationAdded = false;
    private static $scrollingDeclarationAdded = false;
    private static $mapCounter = 1;

    abstract protected function buildHtml(&$params);

    public function html(&$params) {
        $html = $this->buildHtml($params);
        if ($params->getLoadAsync() == 0 && self::$scriptDeclarationAdded == false) {
            $this->addLoadAsyncScript($params->getDelayMs());
            self::$scriptDeclarationAdded = true;
        }
        if ($params->getScrolling() == 1) {
            if (self::$scrollingDeclarationAdded == false) {
                $this->addLoadNoScrollCss();
                $this->addLoadNoScrollScript();
                self::$scrollingDeclarationAdded = true;
            }
            $html = '<div class="embedGoogleMapWrapper" id="embedGoogleMapWrapper-' . self::$mapCounter . '">' . $html . '</div>';
        }
        self::$mapCounter += 1;
        return $html;
    }

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
        $styleClass = "class='embedGoogleMap'";
        return "\n<iframe $styleClass $width $height $style ";
    }

    protected function getLinkHtml($url, $label) {
        return "<div><a href='$url' target='new'>$label</a></div>\n";
    }

    private function addLoadAsyncScript($delayMs) {
        $document = JFactory::getDocument();

        $document->addScriptDeclaration('
            jQuery(function($) {
                // Array for frame sources
                var sources = [];

                $(document).ready(function () {
                    // Loop through all the iframes on the page
                    $("iframe").each(function () {
                        // Get the value of src
                        var src = $(this).attr(\'src\');
                        // Set src to empty
                        $(this).attr(\'src\', \'\');
                        // Store src in the array
                        sources.push(src);
                    });
                });

                $(window).load(function () {
                    function loadGMaps() {
                        var i = 0;
                        // Loop through all the iframes on the page
                        $("iframe").each(function () {
                            // Get src value from the array
                            $(this).attr(\'src\', sources[i]);
                            i++;
                        });
                    }
                    // Set 2 seconds delay for loading Google Maps
                    setTimeout(loadGMaps, ' . $delayMs . ');
                });
            });
        ');
    }

    private function addLoadNoScrollCss() {
        $document = JFactory::getDocument();
        $document->addStyleDeclaration('
			iframe.embedGoogleMap {
				pointer-events: none;
			}
		');
    }

    private function addLoadNoScrollScript() {
        $document = JFactory::getDocument();
        $document->addScriptDeclaration('
            jQuery(document).ready(function($){
                $("div[id^=\'embedGoogleMapWrapper-\']").click(function () {
                    $(this).find(\'iframe.embedGoogleMap\').css("pointer-events", "auto");
                });

                $("div[id^=\'embedGoogleMapWrapper-\']").mouseleave(function() {
                    $(this).find(\'iframe.embedGoogleMap\').css("pointer-events", "none");
                });
            });
        ');
    }

}

?>