<?php
/**
 * Plugin Name: Responsive Accordion And Collapse
 * Version: 1.7.1
 * Description: Responsive Accordion is the most easiest drag & drop accordion builder for WordPress. You can generate multiple accordion and collapse with multiple colour.
 * Author: wpshopmart
 * Author URI: http://www.wpshopmart.com
 * Plugin URI: http://www.wpshopmart.com
 *
 */

/**
 * DEFINE PATHS
 */
define("wpshopmart_accordion_directory_url", plugin_dir_url(__FILE__));
define("wpshopmart_accordion_text_domain", "wpsm_accordion");

/**
 * PLUGIN Install
 */
require_once("lib/installation/installation.php");
 
/**
 * CPT CLASS
 */
require_once("lib/admin/menu.php");
/**
 * SHORTCODE
 */
require_once("front/shortcode.php"); 
 
?>