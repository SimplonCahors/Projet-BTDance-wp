<?php
/**
 * Template Name: Portfolio
 *
 * @package WordPress
 * @subpackage qucreative
 */

get_header();


$args = array(
    'query_type'=>'single-post',
    'template_type'=>'portfolio',
);

qucreative_get_view("", "content_page", $args);


get_footer();
