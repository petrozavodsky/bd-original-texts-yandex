<?php

/*
  Plugin Name: Original texts Yandex BD fork
  Description: Позволяет добавлять ваши записи в "Оригинальные тексты Yandex Webmaster"
  Version: 1.10
  Author: evgeniy
  Author URI: http://zixn.ru
 */


if (!defined('ABSPATH')) {
    exit;
}
add_action('wp_loaded', 'ortext_plugin_init_core');

function ortext_plugin_init_core()
{
    require_once(WP_PLUGIN_DIR . '/' . dirname(plugin_basename(__FILE__)) . '/inc/ortext-core-class.php');
    require_once(WP_PLUGIN_DIR . '/' . dirname(plugin_basename(__FILE__)) . '/inc/ortext-function-class.php'); //Основной функционал плагина
    require_once(WP_PLUGIN_DIR . '/' . dirname(plugin_basename(__FILE__)) . '/inc/javascript-class.php');
    require_once(WP_PLUGIN_DIR . '/' . dirname(plugin_basename(__FILE__)) . '/inc/ui-class.php');

    $ortextbase = new OrTextBase();
    $ortextjs = new OrtextJavaScript();
    $ortextjs->addaction();
    register_deactivation_hook(__FILE__, array($ortextbase, 'deactivationPlugin'));
}