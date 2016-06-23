<?php
// $Id$

/**
 * @file
 * This file will determine how the dynamic banner block will display
 */

// input variables need to have the same name as the theme definitions

global $base_url;
// Url
$url;
// Text (optional)
$text;
// Link (optional)
$link;
// display setting
$display_setting;
// display errors
$display_errors;

// default the output
$output = "";

// decide how to output based on what the display setting is
if ($display_setting == 'urltext') {
  // check for variables
  if ($url && $text) {
    // form the html snippet and print
    $output .= "<div id='banner-left' style='background:linear-gradient(rgba(0,0,0,0.2), rgba(0,0,0,0.2)), url($base_url/$url);'>"; // match this up with your css
    // $output .= "<img src='/membership/$url' class='jpg' alt='banner' />";
    $output .= "<p id='bannerTitle'>" . $text . "</p>";
    $output .= "</div><div id='banner-right'>"; // if you have text in your banner match this up with your css
    $output .= "</div>";
  }
  elseif ( $display_errors) {
    $output .= "banner problem";
  }
}
elseif ($display_setting == 'url') {
  // just an image url came in
  if ($url) {
    $output .= "<div id='banner'>";
    $output .= "<img src='$base_url/$url' class='jpg' alt='banner' />";
    $output .= "</div>";
  }
  elseif ( $display_errors) {
    $output .= "banner problem";
  }
}
elseif ($display_setting == 'text') {
  // just text came in
  if ($url) {
    $output .= "<div id='banner'>";
    $output .= "<p>$text</p>";
    $output .= "</div>";
  }
  elseif ( $display_errors) {
    $output .= "banner problem";
  }
}
elseif ($display_setting == 'urllink') {
  if ($url && $link) {
    $output .= "<div id='banner'>";
    $output .= "<a class='link' href='$link'><img class='jpg' alt='banner' src='/membership/$url'></a>";
    $output .= "</div>";
  }
  elseif ($display_errors) {
    $output .= "banner problem";
  }
}
print $output;
