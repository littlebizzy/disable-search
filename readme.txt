=== Disable Search ===

Contributors: littlebizzy
Donate link: https://www.patreon.com/littlebizzy
Tags: disable, search, form, queries, strings
Requires at least: 4.4
Tested up to: 5.0
Requires PHP: 7.2
Multisite support: No
Stable tag: 1.2.0
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html
Prefix: DSBSRC

Completely disables the built-in WordPress search function to prevent snoopers or bots from querying your database or slowing down your website.

== Description ==

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

== Changelog ==

= 1.2.0 =
* PBP v1.2.0
* removed search icon/input field in the top right corner of WP Admin Toolbar on frontend
* defined constant: `DISABLE_SEARCH`

= 1.1.0 =
* tested with WP 5.0
* updated plugin meta

= 1.0.10 =
* updated plugin meta

= 1.0.9 =
* added warning for Multisite installations
* updated recommended plugins

= 1.0.8 =
* tested with WP 4.9
* added support for `DISABLE_NAG_NOTICES`

= 1.0.7 =
* optimized plugin code
* reset admin notices timestamps

= 1.0.6 =
* optimized plugin code
* updated recommended plugins

= 1.0.5 =
* fixed admin notices timestamp calculation (again)

= 1.0.4 =
* fixed admin notices timestamp calculation

= 1.0.3 =
* optimized plugin code
* added rating request notice

= 1.0.2 =
* added recommended plugins notice

= 1.0.1 =
* tested with WP 4.8
* updated plugin meta

= 1.0.0 =
* initial release
