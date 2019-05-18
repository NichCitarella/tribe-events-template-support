# Tribe Events Template Support

[The Events Calendar](https://theeventscalendar.com/product/wordpress-events-calendar/) is a free plugin for Wordpress that easily allows you to create an Events/Calendar setup. If you want to customize the default templates of the plug-in, you would need to create template files within your theme to override the default layout. This plugin gives you this functionality even if your theme is complete disabled by redirecting the theme template directory path to `wp-content/tribe-events`. This plugin was built for [Oxygen Builder](https://oxygenbuilder.com/) but should work with any set up where the theme is completely disables.

## Installation Instructions

1. [Download the plug-in here](https://github.com/NichCitarella/tribe-events-template-support/archive/master.zip)
2. Go to Plugins > Add New in your WordPress admin.
3. Click on `Upload Plugin`, browse for the zip file and select `Install Now`
4. Activate the Plugin.

## Alternative Installation Instructions

If you already have [Code Snippets](https://wordpress.org/plugins/code-snippets/) installed on your Wordpress site, you might find it simpler to just execute the php using a new code snippet. This is slightly more advanced than simply installing the plugin.

1. Go to [plugin.php](/plugin.php) and copy the code.
2. Go to Code Snippets > Add New in your WordPress admin.
3. In the `Enter Title Here` field, name this something you will remember like *Events Calendar Template Support*
4. Paste the code you copied from [plugin.php](/plugin.php) into the `Code` field. 
**NOTE: YOU WILL HAVE TO DELETE THE ADDITION `<?php` AT THE BEGINNING OF THE PASTED CODE!**
5. Make sure `Run snippet everywhere` is selected and press `Save Changes and Activate`.

## How to Use

In order to use the *Tribe Events Template Support* you need to create a folder named `tribe-events` in `wp-content` in which to store your custom/altered templates.

## Changelog

#### 1.0.0 May 18, 2019

- Initial Release
