# Plugins Development Repo

# List of All Submenu Functions in WordPress

- `add_dashboard_page`: Adds a submenu to the Dashboard menu.
- `add_posts_page`: Adds a submenu to the Posts menu.
- `add_media_page`: Adds a submenu to the Media menu.
- `add_links_page`: Adds a submenu to the Links menu.
- `add_pages_page`: Adds a submenu to the Pages menu.
- `add_comments_page`: Adds a submenu to the Comments menu.
- `add_theme_page`: Adds a submenu to the Appearance menu.
- `add_plugins_page`: Adds a submenu to the Plugins menu.
- `add_users_page`: Adds a submenu to the Users menu.
- `add_management_page`: Adds a submenu to the Tools menu.
- `add_options_page`: Adds a submenu to the Settings menu.

> **NOTE:** If your plugin requires only a single options page, it’s best practice to add it as a submenu to an existing menu. If you require more than one, create a custom top-level menu

## Options API

### Saving Options

```php
// Adding option with a default value of 'red'
add_option( 'pdev_plugin_color', 'red' );
```

### Saving an Array of Options

- Save multiple options at the same time has a better performance impact.

```php
$options = array(
  'color' => 'red',
  'fontsize' => '120%',
  'border' => '2px solid red'
);

update_option( 'pdev_plugin_options', $options );
```

### Updating Options

- The difference between `add_option()` and `update_option()` is that the first function does nothing if the option name already exists, whereas `update_option()` checks if the option already exists before updating its value and creates it if needed.

```php
update_option( 'pdev_plugin_color', 'blue' );
```

### Retrieving Options

The first thing to know about `get_option()` is that if the option does not exist, it will return false. The second thing is that if you store Booleans, you might get integers in return.

```php
$pdev_plugin_color = get_option( 'pdev_plugin_color' );
```

### Deleting Options

```php
delete_option( 'pdev_plugin_options' );
```

> **NOTE:** As a rule of thumb, if your options are needed by the public part of the blog, save them with autoload. If they are needed only in the admin area, save them without autoload.

## Settings API

When creating or updating user-defined options for a plugin, relying on the Settings API can make your code both simpler and more efficient.

Settings API Functions The Settings API functions consist of three steps:

1. Tell WordPress the new settings you want it to manage for you. Doing so adds your settings into a list of authorized options (also known as whitelisting).
2. Define the settings (text areas, input boxes, and any HTML form element) and how they will be visually grouped together in sections.
3. Tell WordPress to display your settings in an actual form.

## Useful Plugins and Helpers

### Tools

- [Plugin Boilerplate Generator](https://wppb.me/)

### Plugins

- [Debug Bar](https://wordpress.org/plugins/debug-bar/)

### Debugging Options in `wp-config.php`

- `WP_DEBUG`: Make the value true.
- `WP_DEBUG_LOG`: Stores all debug messages in a file named debug.log in the site's wp-content directory for later analysis.
- `WP_DEBUG_DISPLAY`: Indicates whether error messages should be displayed on the site.
- `SAVEQUERIES`: Stores database queries in a variable that can be displayed in the page footer (see https://wordpress.org/support/article/editingwp-config-php/#save-queries-for-analysis for more information).
