<?php
namespace Joomla\Plugin\Content\EmbedGoogleMap\Extension;

/**
 * @copyright   Copyright (C) 2014-2025 Petteri Kivimäki. All rights reserved.
 * @license     GNU General Public License version 3; see LICENSE
 * @author	    Petteri Kivimäki
 */
 require_once __DIR__ . '/EmbedGoogleMapClassicHtmlBuilder.php';
 require_once __DIR__ . '/EmbedGoogleMapNewHtmlBuilder.php';
 require_once __DIR__ . '/EmbedGoogleMapEmbedAPIHtmlBuilder.php';

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
