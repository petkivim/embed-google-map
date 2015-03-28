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

  class EmbedGoogleMapParameters {
	private $version = "new";
    private $embedAPIKey = "";
    private $address = "";
    private $mapType = "normal";
    private $zoomLevel = 14;
    private $language = "en";
    private $addLink =  1;
    private $linkLabel = "";
    private $linkFull = 1;
    private $showInfo =  0;
    private $height = 300;
    private $width =  400;
    private $border =  0;
    private $borderStyle =  "solid";
    private $borderColor =  "#000000";
    private $https = 1;
    private $infoLabel = "";	
	
    public function setVersion($value) {
      $this->version = $value;
    }

    public function getVersion() {
      return $this->version;
    }
	
	public function setEmbedAPIKey($value) {
      $this->embedAPIKey = $value;
    }

    public function getEmbedAPIKey() {
      return $this->embedAPIKey;
    }
	
    public function setAddress($value) {
      $this->address = $value;
    }

    public function getAddress() {
      return $this->address;
    }

    public function setMapType($value) {
      $this->mapType = $value;
    }

    public function getMapType() {
      return $this->mapType;
    }

    public function setZoomLevel($value) {
      $this->zoomLevel = $value;
    }

    public function getZoomLevel() {
      return $this->zoomLevel;
    }
    public function setLanguage($value) {
      $this->language = $value;
    }

    public function getLanguage() {
      return $this->language;
    }

    public function setAddLink($value) {
      $this->addLink = $value;
    }

    public function getAddLink() {
      return $this->addLink;
    }

    public function setLinkLabel($value) {
      $this->linkLabel = $value;
    }

    public function getLinkLabel() {
      return $this->linkLabel;
    }

    public function setLinkFull($value) {
      $this->linkFull = $value;
    }

    public function getLinkFull() {
      return $this->linkFull;
    }

    public function setShowInfo($value) {
      $this->showInfo = $value;
    }

    public function getShowInfo() {
      return $this->showInfo ;
    }

    public function setHeight($value) {
      $this->height = $value;
    }

    public function getHeight() {
      return $this->height;
    }

    public function setWidth($value) {
      $this->width = $value;
    }

    public function getWidth() {
      return $this->width;
    }

    public function setBorder($value) {
      $this->border = $value;
    }

    public function getBorder() {
      return $this->border;
    }

    public function setBorderStyle($value) {
      $this->borderStyle = $value;
    }

    public function getBorderStyle() {
      return $this->borderStyle;
    }


    public function setBorderColor($value) {
      $this->borderColor = $value;
    }

    public function getBorderColor() {
      return $this->borderColor;
    }

    public function setHttps($value) {
      $this->https = $value;
    }

    public function getHttps() {
      return $this->https;
    }

    public function setInfoLabel($value) {
      $this->infoLabel = $value;
    }

    public function getInfoLabel() {
      return $this->infoLabel;
    }

    public function setIsGoogleMapsEngine($value) {
      $this->isGoogleMapsEngine = $value;
    }

    public function isGoogleMapsEngine() {
      if(preg_match('/^http(s|):\/\/mapsengine\.google\.com/i', $this->address)) {
        return 0;
      }
      return 1;
    }

    public function isLink() {
      if(preg_match('/^http(s|):\/\//i', $this->address)) {
        return 0;
      }
      return 1;				
    }

    public function toString() {
	  $str = "version:\t\t\"$this->version\"\n";
	  $str .= "embedAPIKey:\t\t\"$this->embedAPIKey\"\n";
      $str .= "address:\t\t\"$this->address\"\n";
      $str .= "mapType:\t\t\"$this->mapType\"\n";
      $str .= "zoomLevel:\t\t$this->zoomLevel\n";
      $str .= "language:\t\t\"$this->language\"\n";
      $str .= "addLink:\t\t$this->addLink\n";
      $str .= "linkLabel:\t\t\"$this->linkLabel\"\n";
      $str .= "linkFull:\t\t$this->linkFull\n";
      $str .= "showInfo:\t\t$this->showInfo\n";
      $str .= "height:\t\t\t$this->height\n";
      $str .= "width:\t\t\t$this->width\n";
      $str .= "border:\t\t\t$this->border\n";
      $str .= "borderStyle:\t\t\"$this->borderStyle\"\n";
      $str .= "borderColor:\t\t\"$this->borderColor\"\n";
      $str .= "https:\t\t\t$this->https\n";
      $str .= "infoLabel:\t\t\"$this->infoLabel\"\n";
      $str .= "isGoogleMapsEngine:\t".$this->isGoogleMapsEngine()."\n";
      $str .= "isLink:\t\t\t".$this->isLink()."\n"; 
      return $str;
    }
  }
?>