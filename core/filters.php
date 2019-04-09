<?php

add_filter( 'liquify/page_info', function($data) {
  $data['title'] = wp_title('', false);

  return $data;
});