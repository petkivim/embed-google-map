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

require_once __DIR__ . '/embedGoogleMapClassicHtmlBuilder.php';
require_once __DIR__ . '/embedGoogleMapNewHtmlBuilder.php';
require_once __DIR__ . '/embedGoogleMapEmbedAPIHtmlBuilder.php';

  class EmbedGoogleMapBuilderFactory {
    public static function createBuilder($version) {
	  if(strcmp($version,'classic') == 0) {
	    return new EmbedGoogleMapClassicHtmlBuilder;
	  } else if(strcmp($version,'new') == 0) {
	    return new EmbedGoogleMapNewHtmlBuilder;
	  } else if(strcmp($version,'embed') == 0) {
	    return new EmbedGoogleMapEmbedAPIHtmlBuilder;
	  }
	  return new EmbedGoogleMapNewHtmlBuilder;
	}
  }
?>