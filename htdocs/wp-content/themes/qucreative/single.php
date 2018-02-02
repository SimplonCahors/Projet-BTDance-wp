<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage qucreative
 *
 */

get_header();


$args = array(
	'query_type'=>'single-post',
    'call_from'=>'single.php',
);

qucreative_get_view("", "content_page", $args);

get_footer();
