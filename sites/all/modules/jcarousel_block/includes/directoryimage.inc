<?php

/**
 * @file
 * directoryimage plugin.
 */
// Implementation of jcarousel_block_PLUGIN_exists
function jcarousel_block_directoryimage_exists($nid) {
  return _jcarousel_block_directoryimage_load($nid);
}

// Implementation of _jcarousel_block_PLUGIN_preprocess_images
function _jcarousel_block_directoryimage_preprocess_images(&$variables) {
  $variables['imagefield_type'] = 'directoryimage';

  $files = _jcarousel_block_directoryimage_load($variables['node']->nid);

  $thumb_prefix = variable_get('jcarousel_block_directoryimage_prefix', 'thumb_');

  foreach ($files as $key => $file) {
    if (substr($key, 0, strlen($thumb_prefix)) == $thumb_prefix) {
      // It's a thumbnail image.
      continue;
    }

    $image_filepath = $files[$key]->filename;
    if (isset($files[$thumb_prefix . $key])) {
      // Thumbnail image exists.
      $thumb_filepath = $files[$thumb_prefix . $key]->filename;
    }
    else {
      // Thumbnail image does not exists, use the original image.
      $thumb_filepath = $image_filepath;
    }

    list($width, $height, $type, $image_attributes) = getimagesize($thumb_filepath);

    $formatted_image = array();
    $formatted_image['path'] = base_path() . $image_filepath;
    $formatted_image['thumb_path'] = base_path() . $thumb_filepath;
    $formatted_image['rel'] = $variables['image_rel'];
    $formatted_image['width'] = $width;
    $formatted_image['height'] = $height;
    $formatted_image['alt'] = '';
    $variables['images'][] = $formatted_image;
  }
}

function _jcarousel_block_directoryimage_load($nid, $show_error = false) {
  $directory = variable_get('jcarousel_block_directoryimage_directory', '/pictures/$nid');
  $directory = str_replace('$nid', $nid, $directory);

  $path = file_directory_path() . $directory;
  if(!is_dir($path)) {
    if ($show_error) {
      drupal_set_message(t('Error opening directory: %path', array('%path' => $path)), 'error');
    }
    return array();
  }

  $files = file_scan_directory($path, '\.(png|jpg|gif)$', array('.', '..', 'CVS'), 0, FALSE, 'basename');

  return $files;
}

