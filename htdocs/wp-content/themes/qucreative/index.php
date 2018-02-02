<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 *
 *
 * @package WordPress
 * @subpackage qucreative
 */


get_header();

qucreative_get_view("", "loop", array(
    'call_from'=>'index.php'
));
get_footer(); 
