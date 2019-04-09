<?php

// Add our custom settings to the customizer
add_action('customize_register', 'addCustomizerSettings');
function addCustomizerSettings ($wp_customize) {
  $fileName        = __DIR__ . '/../config.json';
  $jsonFileHandler = fopen($fileName, 'r');
  $rawContent      = fread($jsonFileHandler, filesize($fileName));
  $content         = json_decode($rawContent);
  $sections        = $content->sections;

  foreach ($sections as $section) {
    $sectionName        = $section->name;
    $sectionSlug        = sanitize_title_with_dashes($sectionName); 
    $sectionDescription = $section->description;
    $sectionSettings    = $section->settings;

    $wp_customize->add_section($sectionSlug, array(
      'title'       => $sectionName,
      'description' => $sectionDescription,
    ));

    foreach ($sectionSettings as $setting) {
      $wp_customize->add_setting($setting->id, array(
        "default" => $setting->default,
        "type"    => $setting->type,
        'capability'     => 'edit_theme_options',
      ));
      $wp_customize->add_control($setting->id . '_control', array(
        'label'    => $setting->label,
        'section'  => $sectionSlug,
        'settings' => $setting->id,
      ));
    }
  }
}