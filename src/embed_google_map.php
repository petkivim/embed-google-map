<?php

/**
 * @version	$Id: Embed Google Map v2.1.0 2016-06-25 12:06 $
 * @package	Joomla 1.6
 * @copyright	Copyright (C) 2014-2016 Petteri Kivimäki. All rights reserved.
 * @author	Petteri Kivimäki
 */
defined('_JEXEC') or die('Restricted access');

jimport('joomla.plugin.plugin');

require_once __DIR__ . '/embedGoogleMapParameters.php';
require_once __DIR__ . '/embedGoogleMapBuilderFactory.php';
require_once __DIR__ . '/embedGoogleMapParser.php';

class plgContentembed_google_map extends JPlugin {

    function __construct(&$subject, $params) {
        parent::__construct($subject, $params);
    }

    function onContentPrepare($context, &$row, &$params, $limitstart) {
        $output = $row->text;
        $regex = "#{google_map}(.*?){/google_map}#s";
        $found = preg_match_all($regex, $output, $matches);

        $count = 0;

        if ($found) {
            foreach ($matches[0] as $value) {
                // Plugin params
                $plgParams = new EmbedGoogleMapParameters;
                // Load plugin params		
                $plgParams->setVersion($this->params->def('version', 'new'));
                $plgParams->setEmbedAPIKey($this->params->def('embed_api_key', ''));
                $plgParams->setMapType($this->params->def('map_type', 'm'));
                $plgParams->setZoomLevel($this->params->def('zoom', 14));
                $plgParams->setLanguage($this->params->def('language', '-'));
                $plgParams->setAddLink($this->params->def('add_link', 1));
                $plgParams->setLinkLabel($this->params->def('link_label', 'View Larger Map'));
                $plgParams->setLinkFull($this->params->def('link_full', 1));
                $plgParams->setShowInfo($this->params->def('show_info', 0));
                $plgParams->setHeight($this->params->def('height', 300));
                $plgParams->setWidth($this->params->def('width', 400));
                $plgParams->setBorder($this->params->def('border', 0));
                $plgParams->setBorderStyle($this->params->def('border_style', 'solid'));
                $plgParams->setBorderColor($this->params->def('border_color', '#000000'));
                $plgParams->setHttps($this->params->def('https', 1));
                $plgParams->setInfoLabel("");
                $plgParams->setLoadAsync($this->params->def('load_async', 1));
                $plgParams->setDelayMs($this->params->def('delay_ms', 2000));
                $plgParams->setScrolling($this->params->def('scrolling', 0));

                $map = $value;
                $map = str_replace('{google_map}', '', $map);
                $map = str_replace('{/google_map}', '', $map);
                $find = '|';

                if (strstr($map, $find)) {
                    // New Parser object
                    $parser = new EmbedGoogleMapParser;
                    // Parse parameters
                    $parser->parse($map, $plgParams);
                } else {
                    $plgParams->setAddress($map);
                }

                // If system language is used, get the system language code
                if (strcmp($plgParams->getLanguage(), 'system') == 0) {
                    $lng = JFactory::getLanguage();
                    $langtag = $lng->getTag();
                    $langprfx = explode('-', $langtag);
                    $plgParams->setLanguage($langprfx[0]);
                }

                // If translated string is used as link label, get the string
                if (preg_match('/{(.*?)}/', $plgParams->getLinkLabel(), $mtcs)) {
                    $plgParams->setLinkLabel(JText::_($mtcs[1]));
                }
                // Create new HTML builder
                $builder = EmbedGoogleMapBuilderFactory::createBuilder($plgParams->getVersion());
                // Generate HTML code
                $replacement[$count] = $builder->html($plgParams);
                // Increase counter
                $count++;
            }
            for ($i = 0; $i < count($replacement); $i++) {
                $row->text = preg_replace($regex, $replacement[$i], $row->text, 1);
            }
        }
        return true;
    }

}

?>
