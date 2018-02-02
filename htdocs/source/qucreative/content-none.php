<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 *
 *
 * @package WordPress
 * @subpackage qucreative
 */


echo '<!-- the-content-sheet start --><article class="the-content-sheet ';

echo '">';





echo '<div class="the-content-sheet-text">';


echo '<div class="row row-margin"><div class="col-md-4"><h2 class="header-404">';
echo esc_html__("Nothing Found",'qucreative');
echo '</h2>';

echo '<p class="font-group-1 text-404">';
echo esc_html__("Maybe searching again might help",'qucreative');
echo '</p>';



echo '</div>';



echo '<div class="col-md-8">
            <div class="widget sidebar-block widget_search widget_search_404">
                <form role="search" method="get" class="search-form" action="http://localhost/wordpress/">
                    <label>
                        <span class="screen-reader-text">'. esc_html__("Search for:",'qucreative').'</span>
                        <input type="search" class="search-field h5" placeholder="'. esc_html__("Search",'qucreative') .'" value="" name="s">
                    </label>
                    <input type="submit" class="search-submit  " value="'.  esc_html__("Search",'qucreative') .'">
                </form>
            </div>
        </div>
';

echo '</div>';

echo "</div>";
echo "</article><!-- the-content-sheet END -->";