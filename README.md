# IP Address Wordpress Plugin

This is a wordpress plugin that displays a custom post type and shortcode. The shortcode stores the user's IP address in a transient for an hour and returns the IP address.

## Usage:

To use the shortcode, type `[ipaddress]` wherever you intend to display the ip address of the user.
User's Ip address is also displayed on the site's homepage.

## To Install:

(Installation instructions assume Composer is already installed):

1. `git clone` this repository.
2. `cd` into the jo-ie-plugin directory.
3. run `composer install` to install dependencies.

## Testing:

Testing is done using PHPUnit as a testing framework and WP-CLI as a command-line interface for testing. During development, to get all tests in the `/test-shortcode.php` file to work, create a .env file in the project's root directory and set `IP` to your IP address.
