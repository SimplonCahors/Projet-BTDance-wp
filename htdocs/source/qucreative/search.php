<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 * @subpackage qucreative
 *
 */

get_header();
qucreative_get_view("", "loop", array(
    'type'=>'search',
));


get_footer();

