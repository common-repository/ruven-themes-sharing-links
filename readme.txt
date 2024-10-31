===Ruven Themes: Sharing Links===

Contributors: Ruven
Tags: sharing, share, social, google, facebook, twitter
License: GPLv2 or later
Requires at least: 3.5.0
Tested up to: 4.0
Stable tag: 1.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

RT Sharing Links provides a function to output links to share a post to Facebook, Twitter, and Google+.


==Description==

This plugin provides a function to output links to share a post to Facebook, Twitter, and Google+.

Selected themes by Ruven will display the links automatically when the plugin is activated.
In other themes you will have to edit the templates in your theme in order to output the links.

Here an example of outputting the links in as list:

`<?php
if(function_exists('ruven_sharing_links')) {
	echo '<ul class="sharing-list">';
	$sharing_links = ruven_sharing_links();
	foreach($sharing_links as $sharing_link) {
	  echo "<li>$sharing_link</li>";
	}
	echo '</ul>';
}
?>`

= Usage =

`$sharing_links = ruven_sharing_links( $get_array, $include, $open_in_new_tab, $class );`

= Parameters =

**$get_array**
*(bool) (optional)* If you want the return value to be an associative array (title, URL) or an array of HTML links. By getting an associative array, you are able to customize the output more.

Default: *false*

**$include**
*(array) (optional)* If you don't want all platforms (Facebook, Twitter, and Google+) included, you can specify here which you want specifically to be returned. E.g. `array('Twitter', 'Facebook')` would only return Twitter and Facebook links.

Default: *array()*

**$open_in_new_tab**
*(bool) (optional)* If you want the sharing dialog to be opened in a new tab/window or not.

Default: *true*

**$class**
*(array) (optional)* Classes you want to add to the links. E.g. `array('sharing-button', 'big-button')`

Default: *array()*

= Return Value =

If the value of `$get_array` is `false` (default), the function returns an array of HTML links.

If the value of `$get_array` is `true`, the function returns an associative array of the title (e.g. "Twitter") and the URL to share the post.




==Changelog==

= v1.1 =
* Minor code improvements.

= v1.0 =
* Initial Release.


==Installation==

This plugin can be installed directly from your site.

1. Log in and navigate to Plugins &rarr; Add New.
2. Type "Ruven Themes: Sharing Links" into the Search input and click the "Search Plugins" button.
3. Locate the Ruven Themes: Sharing Links in the list of search results and click "Install Now".
4. Click the "Activate Plugin" link at the bottom of the install screen.


It can also be installed manually.

1. Download the "Ruven Themes: Sharing Links" plugin from WordPress.org.
2. Unzip the package and move it into your plugins directory.
3. Log into WordPress and navigate to the "Plugins" screen.
4. Locate "Ruven Themes: Sharing Links" in the list and click the "Activate" link.

