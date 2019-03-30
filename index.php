<?php

// Load Liquid into the theme
include 'loader.php';
$loader = new PackageLoader\PackageLoader();
$loader->load(__DIR__ . "/Liquid");

// ensure the correct classes are loaded in
use Liquid\Liquid;
use Liquid\Template;

// Get the correct template


// Load the template
$protectedPath = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'theme-templates' . DIRECTORY_SEPARATOR;
$liquid = new Template($protectedPath);
$liquid->parse(file_get_contents($protectedPath . 'test.liquid'));

// get the correct objects to pass to the templates
$wp_info = array();

echo $liquid->render($wp_info);