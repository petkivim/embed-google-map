# Changelog

## 3.0.3 - 2026-02-28
- Fix minor compatibility bug (#103).

## 3.0.2 - 2025-05-11
- Fix PHP warning (#98).

## 3.0.1 - 2025-03-23
- Remove context-related restrictions (#94).
  - Before, only `com_content.article` and `com_content.featured` contexts were enabled.

## 3.0.0 - 2025-02-22
- Add support for Joomla 4 and Joomla 5 without the Compatibility plugin.
- Remove support for Joomla 3.

## 2.3.1 - 2022-07-21
- Fix uncaught JavaScript TypeError (#85).

## 2.3.0 - 2019-12-30
- Add title parameter (#70).
  - Can be used to define the `title` attribute of the map's `iframe`.

## 2.2.0 - 2019-08-17
- Add link position parameter.

## 2.1.2 - 2019-03-10
- Fix compatibility issue with Google Recaptcha when asynchronous loading of
Google Maps is enabled (#62).

## 2.1.1 - 2019-02-17
- Update Google Maps Embed API implementation (#64).
  - Update Google API base URL.
  - Add support for adding link to Google Maps and defining link label.
- Add Hungarian translation (#64).
- Fix problem with PHP7 (#47, #63)
