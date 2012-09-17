<?php

/**
 * @file
 * imceimage plugin.
 */

// Implementation of jcarousel_block_PLUGIN_exists
function jcarousel_block_imceimage_exists($nid) {
  $field = variable_get('jcarousel_block_imagefield_name', 'imceimage');
  $field_type = variable_get('jcarousel_block_imagefield_type', 'imceimage');

  $node = node_load($nid);
  if (!$node) { 
    return false;
  } 
  else if (!$node->$field) {
    return false;
  }
  else if (!is_array($node->$field)) {
    return false;
  }
  else if (!count($node->$field)) {
    return false;
  }
  else {
    $field_content = $node->$field;
    if (!$field_content[0]['imceimage_path']) {
      return false;
    }
  }

  return true;
}

// Implementation of _jcarousel_block_PLUGIN_preprocess_images
function _jcarousel_block_imceimage_preprocess_images(&$variables) {
  $variables['imagefield_type'] = 'imceimage';

  $node = $variables['node'];
  $field_name = $variables['field'];
  foreach ($node->$field_name as $key => $image) {
    $thumb_prefix = variable_get('jcarousel_block_imagefield_imce_prefix', 'thumb_');
    $thumb_name = $thumb_prefix . basename($image['imceimage_path']);
    $thumb_path = dirname($image['imceimage_path']) ."/". $thumb_name;
    $root = file_directory_path();

    $furl = variable_get('file_downloads', '') == FILE_DOWNLOADS_PRIVATE ? url('system/files') : base_path() . file_directory_path();

    $subdir = str_replace($furl, '', dirname($image['imceimage_path']));

    $thumb_filepath = $root . $subdir .'/'. $thumb_name;
    if (is_file($thumb_filepath)) { // has thumbnail
      list($width, $height, $type, $image_attributes) = @getimagesize($thumb_filepath); //use the filepath instead of url for getimagesize(), because sometimes there is problem with open imagefile from a url
      //$thumb_path = $thumb_path;
    }
    else{ // no thumbnail, use original
      $imceimage_filepath = $root . $subdir .'/'. basename($image['imceimage_path']);
      list($width, $height, $type, $image_attributes) = @getimagesize($imceimage_filepath); //use the filepath instead of url getimagesize(), because sometimes there is problem with open imagefile from a url
      $thumb_path = $image['imceimage_path'];
    }
    $formatted_image = array();
    $formatted_image['path'] = $image['imceimage_path'];
    $formatted_image['thumb_path'] = $thumb_path;
    $formatted_image['rel'] = $variables['image_rel'];
    $formatted_image['width'] = $width;
    $formatted_image['height'] = $height;
    $formatted_image['alt'] = htmlspecialchars(check_plain($image['imceimage_alt']), ENT_NOQUOTES); // escape double quotes as we may use it in output
    $variables['images'][] = $formatted_image;
  }
}
