<?php

/*
@package Photolensor
  ==================
      ADMIN PAGE
  ==================
 */

 

 function Photolensor_add_admin_page() {

  add_menu_page( 'Photolensor Theme Options', //Page Title
                 'Photolensor', //Menu Title
                 'manage_options', //Capability
                 'photolensor', //Menu Slug
                 'photolensor_theme_create_page', //Callback
                 'dashicons-email', //Icon URL
                  110 //Position
                );

  add_submenu_page( 'photolensor', //Parent Slug
                    'Photolensor Theme Options', //Page Title
                    'Settings', //Menu Title
                    'manage_options', //Capability
                    'photolensor', //Menu Slug
                    'photolensor_theme_create_page' //Callback
                    );

  add_submenu_page( 'photolensor', //Parent Slug
                    'Photolensor Contact Options', //Page Title
                    'Contact Form', // Menu Title
                    'manage_options', //Capability
                    'photolensor_contact', //Menu Slug
                    'nikos_photolensor_theme_contact' //Callback 
                  );

  //Activate Custom Settings
  add_action( 'admin_init', 'photolensor_custom_settings' );
 }

 add_action( 'admin_menu', 'Photolensor_add_admin_page' );

 function nikos_photolensor_theme_contact() {
    //create admin page
    require_once( get_template_directory() . '/inc/templates/photolensor-admin.php');
 }



 function photolensor_custom_settings() {
   //contact form options
    register_setting( 'photolensor-contact-options', 'activate_contact_form' );

    add_settings_section(   'photolensor-contact-section', // Id
                            'Contact Form',                // Title
                            'photolensor_contact_section', // Callback
                            'nikos_photolensor_theme_contact' // Page
                          );

    add_settings_field( 'activate-form', // Id
                        'Activate Contact Form', // Title 
                        'photolensor_activate_contact', // Callback
                        'nikos_photolensor_theme_contact', // page
                        'photolensor-contact-section' //Section
                        );
 }

 function photolensor_contact_section() {
   echo 'Activate and Deactivate the Built-in Contact Form';
 }

 function photolensor_activate_contact() {
   $options = get_option( 'activate_contact_form' );
   $checked = ( @$options == 1 ? 'checked' : '' );
   echo '<label><input type="checkbox" id="custom_form" name="activate_contact_form" value="1" ' . $checked . ' /></label>'; 
 }



