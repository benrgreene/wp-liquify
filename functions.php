<?php

// Get all the WP Object info to pass to liquid
function getWPObject () {
  global $wp_query;

  $data  = array();
  $posts = getWPPostObjects();

  // Add the post object(s)
  if (1 == count($posts)) {
    $data['post']  = $posts[0];
  } else {
    $data['posts'] = $posts;
  }

  // get any pagination data
  if (is_archive() || is_home()) {
    $pageNumber                 = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $data['pagination']['type'] = get_queried_object()->name;
    $data['pagination']['page'] = $pageNumber;
    if (1 < $pageNumber) {
      $data['pagination']['previous'] = get_previous_posts_page_link();
    }
    if ($pageNumber < $wp_query->max_num_pages) {
      $data['pagination']['next'] = get_next_posts_page_link();
    }
  }

  return $data;
}

// Get the page type that is displaying
function getWPTemplateName () {
  $template = 'templates/';

  if (is_archive() || is_home()) {
    $template .= 'archive';
  } else if (is_front_page()) {
    $template .= 'home';
  } else {
    $template .= 'page';
  }

  return $template . '.liquid';
}

// Get the WP Post objects to be passed to liquid
function getWPPostObjects () {
  global $post;

  $toReturn = array();
  if ( have_posts() ) { 
    while ( have_posts() ) {
      the_post();
      $toReturn[] = array(
        'id'       => $post->ID,
        'title'    => $post->post_title,
        'content'  => $post->post_content,
        'url'      => get_permalink(),
      );
    }
  }

  return $toReturn;
}