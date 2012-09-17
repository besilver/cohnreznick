<?php

/**
 * @file
 * imagefield plugin.
 */
// Implementation of jcarousel_block_PLUGIN_exists
function jcarousel_block_imagefield_exists($nid) {
  $field = variable_get('jcarousel_block_imagefield_name', 'imagefield');
  $field_type = variable_get('jcarousel_block_imagefield_type', 'imagefield');

  $node = node_load($nid);
  if (!$node) {
    return false;
  }
  if (!$node->$field) {
    return false;
  }
  $nodefield=$node->$field;
  if (!is_array($nodefield)) {
    return false;
  }
  if (!count($nodefield)) {
    return false;
  }
  if (count($nodefield)==1 && !is_array($nodefield[0])) {
    return false;
  }
  return true;
}

// Implementation of _jcarousel_block_PLUGIN_preprocess_images
function _jcarousel_block_imagefield_preprocess_images(&$variables) {
  global $base_url;
  $variables['imagefield_type'] = 'imagefield';

  $node = $variables['node'];
  $field_name = $variables['field'];
  foreach ($node->$field_name as $key => $image) {
    $thumb_path = imagefield_file_admin_thumb_path($image);
    list($width, $height, $type, $image_attributes) = @getimagesize($thumb_path);
    $formatted_image = array();
    $formatted_image['path'] = $base_url .'/'. $image['filepath'];
    $formatted_image['thumb_path'] = $base_url .'/'. $thumb_path;
    $formatted_image['rel'] = $variables['image_rel'];
    $formatted_image['width'] = $width;
    $formatted_image['height'] = $height;
    $formatted_image['alt'] = $image['data']['alt'] ? $image['data']['alt'] : '';
    $variables['images'][] = $formatted_image;
  }
}
