<?php

?>

    <div class="wrap" style="max-width: 900px;">
        <br>
        <div class="white-bg"><?php

        echo esc_html__("Installing a demo provides pages, posts, images, theme options.",'qucreative');
            ?>
        </div>
        <?php
if(defined('ANTFARM_VERSION')==false){
        ?>
        <div class="white-bg white-bg--yellow"><?php

		    echo wp_kses(sprintf(__("It is recommended that the %sAntfarm Shortcodes%s plugin is activated, so that all options are imported.",'qucreative'),'<strong>','</strong>'),array(
		            'strong'=>array(),
            ));
		    ?>
        </div>
        <?php
}
        ?>

        <div class="qucreative-nonce" style="display: none;"><?php









            $nonce = wp_create_nonce( 'qucreative-import-demo-nonce' );

            echo $nonce;
            ?></div>
        <div class="zfolio zfolio-from-shortcode zfolio0 thumbnail-height-mode-normal pagination-method-pagination skin-melbourne dzs-layout--3-cols  auto-init-from-q-admin"  data-filters-position="left" data-pagination-position="left" data-margin="theme-column-gap" data-options='{
"ceva":"ceva"
,"selector_con_skin": "selector-con-for-skin-melbourne"

,"settings_add_loaded_on_images": "on"
,"responsive_fallback_tablet":""
,"responsive_fallback_mobile":""
,"filters_enable":"off"
,"design_item_thumb_height":"1"
,"pagination_method":"pagination"
,"settings_ajax_method_curritems_per_page": "on"
}' style="">

            <div class="items ">



                <?php


                qucreative_import_demo_generate_zfolio_item(array(

                    'page_slug' => 'qucreative-home',
                    'link' => '',
                    'img_url' => 'main-demo',
                    'demo_name' => 'Main Demo',
                ));





                $link_base = 'http://creativewpthemes.net/main-demo-dev/';







                $taxonomy = 'antfarm_port_items_cat';
                $term = get_term_by('slug', 'gallery-1', $taxonomy);





                qucreative_import_demo_generate_zfolio_item(array(

	                'page_slug' => 'qucreative-summer-resort',
	                'demo_slug' => 'summer-resort',
	                'link' => 'summer-resort',
	                'img_url' => 'summer-resort',
	                'demo_name' => 'Summer Resort',
                ));








                $term = get_term_by('slug', 'coffeeshop-gallery', $taxonomy);





                qucreative_import_demo_generate_zfolio_item(array(

	                'page_slug' => 'qucreative-coffee-shop',
	                'demo_slug' => 'coffee-shop',

	                'link' => 'coffee-shop',
	                'img_url' => 'coffee-shop',
	                'demo_name' => 'Coffee Shop',
                ));








                $term = get_term_by('slug', 'coffeeshop-gallery', $taxonomy);





                qucreative_import_demo_generate_zfolio_item(array(

	                'term_slug' => 'female-models',

	                'img_url' => 'models-agency',
	                'link' => 'models-agency',
	                'demo_slug' => 'models-agency',
	                'demo_name' => 'Models Agency',
                ));






                qucreative_import_demo_generate_zfolio_item(array(

                    'tax_slug' => 'mountain-resort',
                    'demo_name' => 'Mountain Resort',
                ));


                qucreative_import_demo_generate_zfolio_item(array(

                    'tax_slug' => 'rock-band',
                    'demo_name' => 'Rock Band',
                    'demo_slug' => 'rock-band',
                ));


                qucreative_import_demo_generate_zfolio_item(array(

                    'tax_slug' => 'main-gallery',
                    'demo_name' => 'Beauty Salon',
                    'demo_slug' => 'beauty-salon',
                    'link' => 'beauty-salon',
                ));






                qucreative_import_demo_generate_zfolio_item(array(

                    'tax_slug' => 'spa',

                    'demo_name' => 'Spa',
                    'demo_slug' => 'spa',
                ));


                qucreative_import_demo_generate_zfolio_item(array(

                    'page_slug' => 'gym',
                    'img_url' => 'fitness',
                    'demo_name' => 'Fitness',
                ));


                qucreative_import_demo_generate_zfolio_item(array(

                    'page_slug' => 'restaurant',
                    'demo_name' => 'Restaurant',
                ));




                qucreative_import_demo_generate_zfolio_item(array(

                    'tax_slug' => 'blogger',

                    'demo_name' => 'Blogger',
                ));


                qucreative_import_demo_generate_zfolio_item(array(

                    'page_slug' => 'digital-agency',
                    'demo_name' => 'Digital Agency',
                ));


                qucreative_import_demo_generate_zfolio_item(array(

                    'page_slug' => 'freelancer',
                    'demo_name' => 'Freelancer',
                ));



                qucreative_import_demo_generate_zfolio_item(array(

                    'tax_slug' => 'pictures',
                    'demo_name' => 'Pictures',
                ));




                qucreative_import_demo_generate_zfolio_item(array(

                    'page_slug' => 'digital-amateur',
                    'demo_name' => 'Digital Amateur',
                ));






                qucreative_import_demo_generate_zfolio_item(array(

                    'page_slug' => 'photoshoot',
                    'demo_name' => 'Photoshoot',
                ));




                qucreative_import_demo_generate_zfolio_item(array(

                    'page_slug' => 'showcase',
                    'demo_name' => 'Showcase',
                ));


                ?>
            </div>
        </div>



    </div>
<?php
