<?php
/*
Plugin Name: doctor Book appionment 
Description: add this plugin for ezy t create book ahpionment  in word press
Version: 1.0
Author: koem sothearith
*/

add_action('admin_menu', 'test_plugin_setup_menu');
 
function test_plugin_setup_menu(){
    add_menu_page( 
    'Appionment doctor Plugin Page',  //page tittle
    'Appionme Doctor',  //page name
    'manage_options', 
    'test-plugin', 
    'test_init' ,
    'dashicons_schedule'
    );
}
 
function test_init(){
    echo "<h1> Hello every one </h1>";
}
 
?>
