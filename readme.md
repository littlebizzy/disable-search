# Disable Search

Totally disables WordPress search

## Changelog

### 2.0.0
- completely refactored to follow WordPress standards
- improved search query blocking via `parse_query` hook
- blocks searches attempted via REST API
- added `Update URI` plugin header
- added `Text Domain` plugin header
- `Tested up to` bumped from 5.0 to 6.7
- `Requires PHP` lowered from 7.2 to 7.0
- removed `WC` headers for WooCommerce (for now)

### 1.2.0
- PBP v1.2.0
- removed search icon/input field in the top right corner of WP Admin Toolbar on frontend
- defined constant: `DISABLE_SEARCH`

### 1.1.0
- tested with WP 5.0
- updated plugin meta

### 1.0.10
- updated plugin meta

### 1.0.9
- added warning for Multisite installations
- updated recommended plugins

### 1.0.8
- tested with WP 4.9
- added support for `DISABLE_NAG_NOTICES`

### 1.0.7
- optimized plugin code
- reset admin notices timestamps

### 1.0.6
- optimized plugin code
- updated recommended plugins

### 1.0.5
- fixed admin notices timestamp calculation (again)

### 1.0.4
- fixed admin notices timestamp calculation

### 1.0.3
- optimized plugin code
- added rating request notice

### 1.0.2
- added recommended plugins notice

### 1.0.1
- tested with WP 4.8
- updated plugin meta

### 1.0.0
- initial release
