<?php
/*
Plugin Name: Apt
Description: Appointment booking system for doctors and patients.
Version: 1.0.0
Author: dariyatum
*/

function daa_create_tables() {
    dbDelta("CREATE TABLE {$wpdb->prefix}daa_doctors (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    name VARCAR(100),
    specialty VARCHAR(100)
    ) $charset;");
}