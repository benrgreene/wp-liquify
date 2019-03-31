<?php

// Load Liquid into the theme
include 'loader.php';
$loader = new PackageLoader\PackageLoader();
$loader->load(__DIR__ . "/Liquid");

// ensure the correct classes are loaded in
use Liquid\Liquid;
use Liquid\Template;

// Load the base template
$templateBasePath = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'theme-templates' . DIRECTORY_SEPARATOR;
// Get the correct template
$templateFile     = getWPTemplateName();
// Build out the liquid template object
$liquid           = new Template($templateBasePath);
$liquid->parse(file_get_contents($templateBasePath . $templateFile));

// Get the correct objects to pass to the templates
$wp_info = getWPObject();

echo $liquid->render($wp_info);