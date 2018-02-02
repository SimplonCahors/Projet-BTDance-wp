<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage qucreative
 */

get_header();

$args = array(
    'call_from'=>'page.php',
);


qucreative_get_view("", "content_page", $args);
?>


<?php get_footer(); ?>
