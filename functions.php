<?php

// Get all the WP Object info to pass to liquid
function getWPObject () {
  return array();
}

// Get the page type that is displaying
function getWPTemplateName () {
  $template = 'templates/theme.liquid';

  return $template;
}