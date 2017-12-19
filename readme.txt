=== Disable Search ===

Contributors: littlebizzy
Donate link: https://www.patreon.com/littlebizzy
Tags: disable, search, form, queries, strings
Requires at least: 4.4
Tested up to: 4.9
Requires PHP: 7.0
Multisite support: No
Stable tag: 1.0.8
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html
Prefix: DSBSRC

Completely disables the built-in WordPress search function to prevent snoopers or bots from querying your database or slowing down your website.

== Description ==

Completely disables the built-in WordPress search function to prevent snoopers or bots from querying your database or slowing down your website.

* [Plugin Homepage](https://wordpress.org/plugins/disable-search-littlebizzy/)
* [Plugin GitHub](https://github.com/littlebizzy/disable-search)
* [SlickStack](https://slickstack.io)

#### The Long Version ####

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
* Premium Version Available: Yes ([SEO Genius](https://www.littlebizzy.com/plugins/seo-genius))
* Includes Media (Images, Icons, Etc): No
* Includes CSS: No
* Database Storage: Yes
  * Transients: No
  * Options: Yes
  * Creates New Tables: No
* Database Queries: Backend Only (Options API)
* Must-Use Support: Yes (Use With [Autoloader](https://github.com/littlebizzy/autoloader))
* Multisite Support: No
* Uninstalls Data: Yes

#### WP Admin Notices ####

This plugin generates multiple [Admin Notices](https://codex.wordpress.org/Plugin_API/Action_Reference/admin_notices) in the WP Admin dashboard. The first is a notice that fires during plugin activation which recommends several related free plugins that we believe will enhance this plugin's features; this notice will re-appear approximately once every 6 months as our code and recommendations evolve. The second is a notice that fires a few days after plugin activation which asks for a 5-star rating of this plugin on its WordPress.org profile page. This notice will re-appear approximately once every 9 months. These notices can be dismissed by clicking the **(x)** symbol in the upper right of the notice box. These notices may annoy or confuse certain users, but are appreciated by the majority of our userbase, who understand that these notices support our free contributions to the WordPress community while providing valuable (free) recommendations for optimizing their website.

If you feel that these notices are too annoying, than we encourage you to consider one or more of our upcoming premium plugins that combine several free plugin features into a single control panel, or even consider developing your own plugins for WordPress, if supporting free plugin authors is too frustrating for you. A final alternative would be to place the defined constant mentioned below inside of your `wp-config.php` file to manually hide this plugin's nag notices:

    define('DISABLE_NAG_NOTICES', true);

Note: This defined constant will only affect the notices mentioned above, and will not affect any other notices generated by this plugin or other plugins, such as one-time notices that communicate with admin-level users.

#### Code Inspiration ####

This plugin was partially inspired either in "code or concept" by the open-source software and discussions mentioned below:

* [Disable Search](https://wordpress.org/plugins/disable-search/)

#### Recommended Plugins ####

We invite you to check out a few other related free plugins that our team has also produced that you may find especially useful:

* [404 To Homepage](https://wordpress.org/plugins/404-to-homepage-littlebizzy/)
* [CloudFlare](https://wordpress.org/plugins/cf-littlebizzy/)
* [Disable Author Pages](https://wordpress.org/plugins/disable-author-pages-littlebizzy/)
* [Disable Cart Fragments](https://wordpress.org/plugins/disable-cart-fragments-littlebizzy/)
* [Disable Embeds](https://wordpress.org/plugins/disable-embeds-littlebizzy/)
* [Disable Emojis](https://wordpress.org/plugins/disable-emojis-littlebizzy/)
* [Disable Empty Trash](https://wordpress.org/plugins/disable-empty-trash-littlebizzy/)
* [Disable Image Compression](https://wordpress.org/plugins/disable-image-compression-littlebizzy/)
* [Disable Search](https://wordpress.org/plugins/disable-search-littlebizzy/)
* [Disable WooCommerce Status](https://wordpress.org/plugins/disable-wc-status-littlebizzy/)
* [Disable WooCommerce Styles](https://wordpress.org/plugins/diable-wc-styles-littlebizzy/)
* [Disable XML-RPC](https://wordpress.org/plugins/disable-xml-rpc-littlebizzy/)
* [Download Media](https://wordpress.org/plugins/download-media-littlebizzy/)
* [Download Plugin](https://wordpress.org/plugins/download-plugin-littlebizzy/)
* [Download Theme](https://wordpress.org/plugins/download-theme-littlebizzy/)
* [Duplicate Post](https://wordpress.org/plugins/duplicate-post-littlebizzy/)
* [Export Database](https://wordpress.org/plugins/export-database-littlebizzy/)
* [Force HTTPS](https://wordpress.org/plugins/force-https-littlebizzy/)
* [Force Strong Hashing](https://wordpress.org/plugins/force-strong-hashing-littlebizzy/)
* [Google Analytics](https://wordpress.org/plugins/ga-littlebizzy/)
* [Index Autoload](https://wordpress.org/plugins/index-autoload-littlebizzy/)
* [Maintenance Mode](https://wordpress.org/plugins/maintenance-mode-littlebizzy/)
* [Profile Change Alerts](https://wordpress.org/plugins/profile-change-alerts-littlebizzy/)
* [Remove Category Base](https://wordpress.org/plugins/remove-category-base-littlebizzy/)
* [Remove Query Strings](https://wordpress.org/plugins/remove-query-strings-littlebizzy/)
* [Server Status](https://wordpress.org/plugins/server-status-littlebizzy/)
* [StatCounter](https://wordpress.org/plugins/sc-littlebizzy/)
* [View Defined Constants](https://wordpress.org/plugins/view-defined-constants-littlebizzy/)
* [Virtual Robots.txt](https://wordpress.org/plugins/virtual-robotstxt-littlebizzy/)

#### Premium Plugins ####

We invite you to check out a few premium plugins that our team has also produced that you may find especially useful:

* [Purge Them All](https://www.littlebizzy.com/plugins/purge-them-all)
* [Speed Demon](https://www.littlebizzy.com/plugins/speed-demon)
* [SEO Genius](https://www.littlebizzy.com/plugins/seo-genius)
* [Great Migration](https://www.littlebizzy.com/plugins/great-migration)
* [Security Guard](https://www.littlebizzy.com/plugins/security-guard)
* [Genghis Khan](https://www.littlebizzy.com/plugins/genghis-khan)

#### Related Services ####

The following paid services are available on a case-by-case basis to upstanding members of the WordPress community:

* [SSL Setup](https://www.littlebizzy.com/services/ssl)
* [DNSSEC Setup](https://www.littlebizzy.com/services/dnssec)
* [G Suite Setup](https://www.littlebizzy.com/services/google-apps)
* [SendGrid Setup](https://www.littlebizzy.com/services/sendgrid)
* [MailGun Setup](https://www.littlebizzy.com/services/mailgun)

#### Special Thanks ####

We thank the following groups for their generous contributions to the WordPress community which have particularly benefited us in developing our own free plugins and paid services:

* [Automattic](https://automattic.com)
* [Daniel Auener](http://www.danielauener.com)
* [Delicious Brains](https://deliciousbrains.com)
* [Greg Rickaby](https://gregrickaby.com)
* [Matt Mullenweg](https://ma.tt)
* [Mika Epstein](https://halfelf.org)
* [Samuel Wood](http://ottopress.com)
* [Scott Reilly](http://coffee2code.com)
* [Jan Dembowski](https://profiles.wordpress.org/jdembowski)
* [Jeff Starr](https://perishablepress.com)
* [Jeff Chandler](https://jeffc.me)
* [Jeff Matson](https://jeffmatson.net)
* [John James Jacoby](https://jjj.blog)
* [Leland Fiegel](https://leland.me)
* [Rahul Bansal](https://profiles.wordpress.org/rahul286)
* [Roots](https://roots.io)
* [rtCamp](https://rtcamp.com)
* [WP Chat](https://wpchat.com)
* [WP Tavern](https://wptavern.com)

#### Disclaimer ####

We released this plugin in response to our managed hosting clients asking for better access to their server, and our primary goal will remain supporting that purpose. Although we are 100% open to fielding requests from the WordPress community, we kindly ask that you keep the above mentioned goals in mind, thanks!

== Installation ==

1. Upload to `/wp-content/plugins/disable-search-littlebizzy`
2. Activate via WP Admin > Plugins
3. Verify search queries will "404" by appending `/?s=foo` to site URL

== FAQ ==

= Does this plugin alter anything related to Appearance? =

No, and it's not meant to. Search widgets, themes, menus, CSS, or otherwise are not altered whatsoever.

= How can I change this plugin's settings? =

This plugin does not have a settings page and is designed for speed and simplicity.

= I have a suggestion, how can I let you know? =

Please avoid leaving negative reviews in order to get a feature implemented. Instead, we kindly ask that you post your feedback on the wordpress.org support forums by tagging this plugin in your post. If needed, you may also contact our homepage.

== Changelog ==

= 1.0.8 =
* tested with WP 4.9
* added support for `define('DISABLE_NAG_NOTICES', true);`

= 1.0.7 =
* optimized plugin code
* reset admin notices timestamps

= 1.0.6 =
* optimized admin notices
* updated recommended plugins

= 1.0.5 =
* fixed rating request (again)

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
