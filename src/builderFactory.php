<?php
/**
* @version		$Id: Embed Google Map v2.0.0 2014-06-05 17:54 $
* @package		Joomla 1.6
* @copyright	Copyright (C) 2014 Petteri Kivimäki. All rights reserved.
* @author		Petteri Kivimäki
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
*/

require_once __DIR__ . '/classicHtmlBuilder.php';
require_once __DIR__ . '/newHtmlBuilder.php';
require_once __DIR__ . '/embedAPIHtmlBuilder.php';

  class BuilderFactory {
    public static function createBuilder($version) {
	  if(strcmp($version,'classic') == 0) {
	    return new ClassicHtmlBuilder;
	  } else if(strcmp($version,'new') == 0) {
	    return new NewHtmlBuilder;
	  } else if(strcmp($version,'embed') == 0) {
	    return new EmbedAPIHtmlBuilder;
	  }
	  return new NewHtmlBuilder;
	}
  }
?>