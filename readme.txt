=== Disable Search ===

Contributors: littlebizzy
Tags: disable, search, form, dynamic, database, query, queries, strings
Requires at least: 4.4
Tested up to: 4.8
Requires PHP: 7.0
Stable tag: 1.0.6
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html
Prefix: DSBSRC

Completely disables the built-in WordPress search function to prevent snoopers or bots from querying your database or slowing down your website.

== Description ==

Completely disables the built-in WordPress search function to prevent snoopers or bots from querying your database or slowing down your website.

Disable Search is a simple plugin that disables the search function on a WordPress website for the purpose of preventing snoopers or robots from spying on your content. Specifically, it disables the built-in `/?s=foo` query function that comes with WordPress.

What many webmasters and developers don't realize is that even if you don't have a search feature designed into your WordPress site, tech-savvy users or bots can still query this URL directly on your given domain. This not only can hurt privacy (view content not meant to be seen in such a way), but also SEO (weird URLs indexed into search engines). Lastly, it can also hurt your website/server performance because such queries are in fact "uncached" dynamic queries, meaning that they send requests directly to your database i.e. MySQL. Theoretically such requests could be used to attack or crash your website, or for other malicious reasons such as negative SEO campaigns, etc.

Unlike other "disable search" plugins, this plugin does not alter the design or appearance of your site. In other words, if you have a search widget, form, or so forth designed into your Widgets settings, WordPress theme, or otherwise, this plugin will not remove or alter those. Instead, it blocks the query URLs directly, turning them into 404 errors (Not Found).

We decided for initial release not to have a "settings" page or allow any redirects of these search query URLs. Instead, you can pair this plugin perfectly with our other plugin called 404 To Homepage if you wish to redirect these "404 searches" automatically to your homepage.

* Test in WP 4.7 with Disable Search only activated:

GET /?s=test HTTP/1.1

Response headers:
HTTP/1.1 404 Not Found
Server: nginx/1.4.6 (Ubuntu)
Date: Wed, 14 Dec 2016 20:10:30 GMT
Transfer-Encoding: chunked
Connection: keep-alive
Expires: Wed, 11 Jan 1984 05:00:00 GMT
Cache-Control: no-cache, must-revalidate, max-age=0
Link: <http://example.com/wp-json/>; rel="https://api.w.org/"

* Test in WP 4.7 with both Disable Search and 404 To Homepage activated:

GET /?s=test HTTP/1.1

Response headers:
HTTP/1.1 301 Moved Permanently
Server: nginx/1.4.6 (Ubuntu)
Date: Wed, 14 Dec 2016 20:49:33 GMT
Transfer-Encoding: chunked
Connection: keep-alive
Location: http://example.com

#### Compatibility ####

This plugin has been designed for use on LEMP (Nginx) web servers with PHP 7.0 and MySQL 5.7 to achieve best performance. All of our plugins are meant for single site WordPress installations only; for both performance and security reasons, we highly recommend against using WordPress Multisite for the vast majority of projects.

#### Plugin Features ####

* Settings Page: No
* Upgrade Available: No
* Includes Media: No
* Includes CSS: No
* Database Storage: Yes
  * Transients: No
  * Options: Yes
* Database Queries: Backend only
* Must-Use Support: Yes
* Multi-site Support: No
* Uninstalls Data: Yes

#### Code Inspiration ####

This plugin was partially inspired either in "code or concept" by the open-source software and discussions mentioned below:

* [Disable Search](https://wordpress.org/plugins/disable-search/)

#### Recommended Plugins ####

We invite you to check out a few other related free plugins that our team has also produced that you may find especially useful:

* [Disable Author Pages](https://wordpress.org/plugins/disable-author-pages-littlebizzy/)
* [Remove Category Base](https://wordpress.org/plugins/remove-category-base-littlebizzy/)
* [Remove Query Strings](https://wordpress.org/plugins/remove-query-strings-littlebizzy/)
* [404 To Homepage](https://wordpress.org/plugins/404-to-homepage-littlebizzy/)
* [Server Status](https://wordpress.org/plugins/server-status-littlebizzy/)

#### Special Thanks ####

We thank the following groups for their generous contributions to the WordPress community which have particularly benefited us in developing our own free plugins and paid services:

* [Automattic](https://automattic.com)
* [Delicious Brains](https://deliciousbrains.com)
* [Roots](https://roots.io)
* [rtCamp](https://rtcamp.com)
* [WP Tavern](https://wptavern.com)

#### Disclaimer ####

We released this plugin in response to our managed hosting clients asking for better access to their server, and our primary goal will remain supporting that purpose. Although we are 100% open to fielding requests from the WordPress community, we kindly ask that you keep the above mentioned goals in mind, thanks!

== Installation ==

1. Upload to `/wp-content/plugins/disable-search-littlebizzy`
2. Activate via WP Admin > Plugins
3. Verify search queries are "404 error" status by appending `/?s=foo` to site URL

== FAQ ==

= Does this plugin alter anything related to Appearance? =

No, and it's not meant to. Search widgets, themes, menus, CSS, or otherwise are not altered whatsoever.

= How can I change this plugin's settings? =

This plugin does not have a settings page and is designed for speed and simplicity.

= I have a suggestion, how can I let you know? =

Please avoid leaving negative reviews in order to get a feature implemented. Instead, we kindly ask that you post your feedback on the wordpress.org support forums by tagging this plugin in your post. If needed, you may also contact our homepage.

== Changelog ==

= 1.0.6 =
* optimized admin notices
* updated recommended plugins

= 1.0.5 =
* re-fixed rating request

= 1.0.4 =
* fixed rating request

= 1.0.3 =
* minor code tweaks
* added rating request

= 1.0.2 =
* added recommended plugins

= 1.0.1 =
* tested with WordPress 4.8
* updated plugin meta

= 1.0.0 =
* initial release
