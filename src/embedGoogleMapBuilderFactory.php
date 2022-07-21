<?php

/**
 * @version	$Id: Embed Google Map v2.3.1 2022-07-21 16:23 $
 * @package	Joomla 1.6
 * @copyright	Copyright (C) 2014-2022 Petteri Kivimäki. All rights reserved.
 * @author	Petteri Kivimäki
 */
 require_once __DIR__ . '/embedGoogleMapClassicHtmlBuilder.php';
 require_once __DIR__ . '/embedGoogleMapNewHtmlBuilder.php';
 require_once __DIR__ . '/embedGoogleMapEmbedAPIHtmlBuilder.php';

 class EmbedGoogleMapBuilderFactory {
     public static function createBuilder($version) {
         if (strcmp($version, 'classic') == 0) {
             return new EmbedGoogleMapClassicHtmlBuilder;
         } else if (strcmp($version, 'new') == 0) {
             return new EmbedGoogleMapNewHtmlBuilder;
         } else if (strcmp($version, 'embed') == 0) {
             return new EmbedGoogleMapEmbedAPIHtmlBuilder;
         }
         return new EmbedGoogleMapNewHtmlBuilder;
     }
 }

?>
