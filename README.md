# Embed Google Map

Embed Google Map is a plugin for embedding one or more Google Maps to Joomla articles. Adding maps to an article is very simple, just add the address or the coordinates which location you want to show an a map inside google_maps tags to an article, and that's it! It's also possible to define the version of Google Maps (Google Maps, Google Maps Classic, Google Maps Embed API), the type of the map (normal, satellite, hybrid, terrain), the size of the map, the language of the Google Maps interface, zoom level, border layout and link to the full size map. Embedding maps created in Google Maps Engine is supported as well.

## Features

* It's possible to embed one or more Google Maps within an artice.
* The address or the coordinates which location is shown on a map is given as a parameter.
* Define Google Maps version to be used: Google Maps (no API key), Google Maps Classic (no API key), Google Maps Embed API ([API key](https://developers.google.com/maps/documentation/embed/guide#api_key) required)
* Define the type of the map.
  * Google Maps: normal, satellite
  * Google Maps Embed API: roadmap (default), satellite
  * Google Maps Classic: normal, satellite, hybrid, terrain
* Define the size of the map.
* Define the language of the Google Maps interface. List of language codes.
* Define the zoom level.
* Define custom labels. Supported by Google Maps Classic only.
* Hide/show the info label. Supported by Google Maps Classic only.
* Define the border width, border style and border color.
* Define the `title` attribute of the map's `iframe` element.
* Add link to the full size map. Supported by Google Maps and Google Maps Classic only.
* Define the link label and link position (above or below the map). Supported by Google Maps and Google Maps Classic only.
* Support for HTTP and HTTPS.
* Embed maps created in Google Maps Engine.
* Multilingual features for front-end:
  * Use the system language as Google Map language.
  * Use translatable strings as map label, e.g. {TRANSLATABLE_STRING}.
* Improve performance by loading Google Maps after the rest of the page has loaded.
* Disable mouse scrolling on embeded Google Map:
  * click the map to enable scroll
  * when mouse leaves the map, disable scroll.
* English, French, Hungarian, Italian, Japanese and Finnish language support for back-end.

## Syntax

* {google_map}address{/google_map}
* {google_map}address|version:classic{/google_map}
* {google_map}address|zoom:10{/google_map}
* {google_map}address|zoom:10|lang:it{/google_map}
* {google_map}address|lang:system{/google_map}
* {google_map}address|width:200|height:200|border:1|border_style:solid|border_color:#000000{/google_map}
* {google_map}address|width:200|height:200|link:yes|link_label:Label|link_position:top{/google_map}
* {google_map}address|link:yes{/google_map}
* {google_map}address|type:satellite{/google_map}
* {google_map}address|show_info:yes|info_label:Label{/google_map}
* {google_map}address|link_full:yes{/google_map}
* {google_map}address|title:iframe title attribute{/google_map}
* {google_map}address|https:yes{/google_map}<br />
* \* {google_map}latitude,longitude{/google_map}

\* latitude,longitude = coordinates in decimal degrees

### Example 1

Replace the "address" string with the address which location you want to show on the map.

```
{google_map}Sunset Boulevard West Hollywood{/google_map}
```

### Example 2

Replace the "latitude" and "longitude" strings with the coordinates which location you want to show on the map. The coordinates must be expressed as decimal degrees.

```
{google_map}60.1705,24.9384{/google_map}
```

## Version

The plugin supports Google Maps, Google Maps Classic and Google Maps Embed API. The version to be used can be set by using the Version setting (supported values: new, classic, embed). The default version is defined in the Backend, but it can be overridden for individual maps.

```
{google_map}address|version:new{/google_map}
{google_map}address|version:classic{/google_map}
{google_map}address|version:embed{/google_map}
```

Google Maps and Google Maps Classic do not require an API key, but for Google Maps Embed API an [API key](https://developers.google.com/maps/documentation/embed/guide#api_key) is required. Not all the parameters are supported by all the versions. Please see the supported parameters below.

**Google Maps**

* map type (normal, satellite)
* zoom level
* language - By default, visitors will see a map in their own language which is defined by the locale of their browser. The setting takes effect only when a map is opened through the additional link to Google Maps
* add link
* link position
* link label
* height
* width
* border
* border style
* border color
* HTTPS
* title (`iframe`)

**Google Maps Classic (deprecated)**

* map type (normal, satellite, hybrid, terrain)
* zoom level
* language
* add link
* link position
* link label
* link to full screen
* show info
* info label
* height
* width
* border
* border style
* border color
* HTTPS
* title (`iframe`)

**Google Maps Embed API**

* map type (roadmap, satellite)
* zoom level
* language
* add link
* link label
* height
* width
* border
* border style
* border color
* HTTPS
* title (`iframe`)

## Multilingual features

This plugin supports English, French, Italian, Japanese, Hungarian and Finnish languages for back-end.

In the front-end it's possible to use the system language as a Google Map language. In multilingual sites this means that it's enough to set the default language to 'system', and the language of the map is set according to the language that the user has chosen. For individual maps the default setting can be overridden by using the 'lang' parameter. Setting the system language for individual maps can be done by setting the 'lang' parameter to 'system'

```
{google_map}address|lang:system{/google_map}
```

It's also possible to use translatable strings as map label, e.g. {TRANSLATABLE_STRING}.

## Border styles

The default border style can be set in the admin panel, but it can be overridden by using the border_style variable. The following values are supported.

* none
* hidden
* dashed
* dotted
* solid
* double

## Border color

The default border color can be set in the admin panel, but it can be overridden by using the border_color variable. Border color must be given in hexadecimal format. The default value is "#000000".

## Maps created in Google Maps Engine

It's possible to embed maps created in Google Maps Engine. Before embedding a map please make sure that the map is public and can be viewed by anyone. Please see how to [share your map](https://support.google.com/mymaps/answer/3024935?hl=en&ref_topic=3526007).

The map is shared by using its URL:

```
{google_map}http://mapsengine.google.com/map/embed?mid=zfQVCQIZMXcw.k_hSHl4b24jM{/google_map}
```

**NB!** Only border width, border style, border color, add link, link label, http/https and language parameters can be used with maps created in Google Maps Engine. All the other parameters are ignored.

## Language codes

The default language can be set in the admin panel, but it can be overridden by using the lang variable. When using the lang variable, the code of the selected language must be given as a parameter. Below there's a list of languages supported by Google Maps.

<table>
	<tbody>
		<tr>
			<td>
				<b>Code</b></td>
			<td>
				<b>Language</b></td>
		</tr>
		<tr>
			<td>
				ar</td>
			<td>
				Arabic</td>
		</tr>
		<tr>
			<td>
				eu</td>
			<td>
				Basque</td>
		</tr>
		<tr>
			<td>
				bn</td>
			<td>
				Bengali</td>
		</tr>
		<tr>
			<td>
				bg</td>
			<td>
				Bulgarian</td>
		</tr>
		<tr>
			<td>
				ca</td>
			<td>
				Catalan</td>
		</tr>
		<tr>
			<td>
				zh-CN</td>
			<td>
				Chinese (simplified)</td>
		</tr>
		<tr>
			<td>
				zh-TW</td>
			<td>
				Chinese (traditional)</td>
		</tr>
		<tr>
			<td>
				hr</td>
			<td>
				Croatian</td>
		</tr>
		<tr>
			<td>
				cs</td>
			<td>
				Czech</td>
		</tr>
		<tr>
			<td>
				da</td>
			<td>
				Danish</td>
		</tr>
		<tr>
			<td>
				nl</td>
			<td>
				Dutch</td>
		</tr>
		<tr>
			<td>
				en</td>
			<td>
				English</td>
		</tr>
		<tr>
			<td>
				en-AU</td>
			<td>
				English (Australian)</td>
		</tr>
		<tr>
			<td>
				en-GB</td>
			<td>
				English (Great Britain)</td>
		</tr>
		<tr>
			<td>
				fa</td>
			<td>
				Farsi</td>
		</tr>
		<tr>
			<td>
				fil</td>
			<td>
				Filipino</td>
		</tr>
		<tr>
			<td>
				fi</td>
			<td>
				Finnish</td>
		</tr>
		<tr>
			<td>
				fr</td>
			<td>
				French</td>
		</tr>
		<tr>
			<td>
				gl</td>
			<td>
				Galician</td>
		</tr>
		<tr>
			<td>
				de</td>
			<td>
				German</td>
		</tr>
		<tr>
			<td>
				el</td>
			<td>
				Greek</td>
		</tr>
		<tr>
			<td>
				gu</td>
			<td>
				Gujarati</td>
		</tr>
		<tr>
			<td>
				iw</td>
			<td>
				Hebrew</td>
		</tr>
		<tr>
			<td>
				hi</td>
			<td>
				Hindi</td>
		</tr>
		<tr>
			<td>
				hu</td>
			<td>
				Hungarian</td>
		</tr>
		<tr>
			<td>
				id</td>
			<td>
				Indonesian</td>
		</tr>
		<tr>
			<td>
				it</td>
			<td>
				Italian</td>
		</tr>
		<tr>
			<td>
				ja</td>
			<td>
				Japanese</td>
		</tr>
		<tr>
			<td>
				kn</td>
			<td>
				Kannada</td>
		</tr>
		<tr>
			<td>
				ko</td>
			<td>
				Korean</td>
		</tr>
		<tr>
			<td>
				lv</td>
			<td>
				Latvian</td>
		</tr>
		<tr>
			<td>
				lt</td>
			<td>
				Lithuanian</td>
		</tr>
		<tr>
			<td>
				ml</td>
			<td>
				Malayalam</td>
		</tr>
		<tr>
			<td>
				mr</td>
			<td>
				Marathi</td>
		</tr>
		<tr>
			<td>
				no</td>
			<td>
				Norwegian</td>
		</tr>
		<tr>
			<td>
				nn</td>
			<td>
				Norwegian Nynorsk</td>
		</tr>
		<tr>
			<td>
				or</td>
			<td>
				Oriya</td>
		</tr>
		<tr>
			<td>
				pl</td>
			<td>
				Polish</td>
		</tr>
		<tr>
			<td>
				pt</td>
			<td>
				Portuguese</td>
		</tr>
		<tr>
			<td>
				pt-BR</td>
			<td>
				Portuguese (Brazil)</td>
		</tr>
		<tr>
			<td>
				pt-PT</td>
			<td>
				Portuguese (Portugal)</td>
		</tr>
		<tr>
			<td>
				ro</td>
			<td>
				Romanian</td>
		</tr>
		<tr>
			<td>
				rm</td>
			<td>
				Romansch</td>
		</tr>
		<tr>
			<td>
				ru</td>
			<td>
				Russian</td>
		</tr>
		<tr>
			<td>
				sk</td>
			<td>
				Slovak</td>
		</tr>
		<tr>
			<td>
				sl</td>
			<td>
				Slovenian</td>
		</tr>
		<tr>
			<td>
				sr</td>
			<td>
				Serbian</td>
		</tr>
		<tr>
			<td>
				es</td>
			<td>
				Spanish</td>
		</tr>
		<tr>
			<td>
				sv</td>
			<td>
				Swedish</td>
		</tr>
		<tr>
			<td>
				tl</td>
			<td>
				Tagalog</td>
		</tr>
		<tr>
			<td>
				ta</td>
			<td>
				Tamil</td>
		</tr>
		<tr>
			<td>
				te</td>
			<td>
				Telugu</td>
		</tr>
		<tr>
			<td>
				th</td>
			<td>
				Thai</td>
		</tr>
		<tr>
			<td>
				tr</td>
			<td>
				Turkish</td>
		</tr>
		<tr>
			<td>
				uk</td>
			<td>
				Ukrainian</td>
		</tr>
		<tr>
			<td>
				vi</td>
			<td>
				Vietnamese</td>
		</tr>
	</tbody>
</table>
