<?php





global $qucreative_theme_data;

$upload_dir = wp_upload_dir();






$debug = false;






$upload_dir_path = $upload_dir['path'];
$upload_dir_url = $upload_dir['url'];

$taxonomy = 'antfarm_port_items_cat';

$logo_url = QUCREATIVE_THEME_URL.'placeholders/qlogo.png';
$logo_url_summer_resort = QUCREATIVE_THEME_URL.'placeholders/logo-summer-resort.png';
$logo_url_coffee_shop = QUCREATIVE_THEME_URL.'placeholders/logo-coffee-shop.png';
$logo_url_models_agency = QUCREATIVE_THEME_URL.'placeholders/logo-models-agency.png';
$logo_url_mountain_resort = QUCREATIVE_THEME_URL.'placeholders/logo-mountain-resort.png';
$logo_url_rock_band = QUCREATIVE_THEME_URL.'placeholders/logo-rock-band.png';
$logo_url_beauty_salon = QUCREATIVE_THEME_URL.'placeholders/logo-beauty-salon.png';
$logo_url_footer = QUCREATIVE_THEME_URL.'placeholders/footer_logo.png';
$logo_black_url = QUCREATIVE_THEME_URL.'placeholders/qlogo-black.png';
$logo_spa = QUCREATIVE_THEME_URL.'placeholders/logo-spa.png';
$logo_gym = QUCREATIVE_THEME_URL.'placeholders/logo-gym.png';
$logo_restaurant = QUCREATIVE_THEME_URL.'placeholders/logo-restaurant.png';
$logo_blogger = QUCREATIVE_THEME_URL.'placeholders/logo-blogger.png';
$logo_digital_agency = QUCREATIVE_THEME_URL.'placeholders/logo-digital-agency.png';
$logo_freelancer = QUCREATIVE_THEME_URL.'placeholders/logo-freelancer.png';
$logo_photoshoot = QUCREATIVE_THEME_URL.'placeholders/logo-photoshoot.png';
$logo_pictures = QUCREATIVE_THEME_URL.'placeholders/logo-pictures.png';
$logo_digital_amateur = QUCREATIVE_THEME_URL.'placeholders/logo-digital-amateur.png';
$logo_slider = QUCREATIVE_THEME_URL.'placeholders/logo-slider.png';
$logo_showcase = QUCREATIVE_THEME_URL.'placeholders/logo-showcase.png';







if ( ! wp_verify_nonce( $_REQUEST['nonce'], 'qucreative-import-demo-nonce' ) ) {
    die( 'Security check' );

} else {
    
    


}


$menu_locations = get_theme_mod('nav_menu_locations');
$menu_id = '1';

if(is_array($menu_locations)){
    if(isset($menu_locations['primary'])){
        $menu_id = $menu_locations['primary'];

    }
}






if($_REQUEST['demo']=='summer-resort'){
















    $img_name = '500x500.jpg';
    $img_url = QUCREATIVE_THEME_URL.'placeholders/500x500.jpg';


    $img_path = QUCREATIVE_THEME_DIR.'placeholders/500x500.jpg';



    $new_path = $upload_dir_path.'/'.$img_name;

    try{

        if (!copy($img_path, $new_path)) {

        }else{
            $img_url = $upload_dir_url.'/'.$img_name;
            $new_path = $img_path;
        }
    }catch(Exception $e){
        print_rr($e);
    }

	$attach_id = qucreative_import_demo_create_attachment($img_url, '1', $new_path);


	$qucreative_theme_data['import_demo_last_attach_id'] = $attach_id;



	$img_name = '500x500.jpg';
	$img_url = QUCREATIVE_THEME_URL . 'placeholders/500x500.jpg';


	$img_path = QUCREATIVE_THEME_DIR . 'placeholders/500x500.jpg';


	$new_path = $upload_dir_path . '/' . $img_name;












	$term = qucreative_import_demo_create_term_if_it_does_not_exist(array(
		'description' => '',
		'term_name' => 'Gallery 1',
		'slug' => 'gallery-1',
		'taxonomy' => $taxonomy,

	));


	if (is_array($term)) {

		$term_id = $term['term_id'];
	} else {

		$term_id = $term->term_id;
	}









	$args = array(

        'post_title'=>'WIND BOAT',
        'post_content'=>'',
        'post_status'=>'publish',
        'img_url'=>$img_url,
        'img_path'=>$new_path,
        'term'=>$term,
        'taxonomy'=>$taxonomy,
        'attach_id'=>$qucreative_theme_data['import_demo_last_attach_id'],
    )
    ;



    $port_id = qucreative_import_demo_insert_post_complete($args);






    $args = array(

        'post_title'=>'YACHTING',
        'post_content'=>'',
        'post_status'=>'publish',
        'img_url'=>$img_url,
        'img_path'=>$new_path,
        'term'=>$term,
        'taxonomy'=>$taxonomy,
        'attach_id'=>$qucreative_theme_data['import_demo_last_attach_id'],
    )
    ;

    $port_id = qucreative_import_demo_insert_post_complete($args);



    if($debug){

    }else{




        $args = array(

            'post_title'=>'THE BED',
            'post_content'=>'',
            'post_status'=>'publish',
            'img_url'=>$img_url,
            'img_path'=>$new_path,
            'term'=>$term,
            'taxonomy'=>$taxonomy,
            'attach_id'=>$qucreative_theme_data['import_demo_last_attach_id'],
        )
        ;



        $port_id = qucreative_import_demo_insert_post_complete($args);

        $args = array(

            'post_title'=>'THE ROOM',
            'post_content'=>'',
            'post_status'=>'publish',
            'img_url'=>$img_url,
            'img_path'=>$new_path,
            'term'=>$term,
            'taxonomy'=>$taxonomy,
            'attach_id'=>$qucreative_theme_data['import_demo_last_attach_id'],
        )
        ;



        $port_id = qucreative_import_demo_insert_post_complete($args);

        $args = array(

            'post_title'=>'HOTEL',
            'post_content'=>'',
            'post_status'=>'publish',
            'img_url'=>$img_url,
            'img_path'=>$new_path,
            'term'=>$term,
            'taxonomy'=>$taxonomy,
            'attach_id'=>$qucreative_theme_data['import_demo_last_attach_id'],
        )
        ;



        $port_id = qucreative_import_demo_insert_post_complete($args);

        $args = array(

            'post_title'=>'THE BEACH',
            'post_content'=>'',
            'post_status'=>'publish',
            'img_url'=>$img_url,
            'img_path'=>$new_path,
            'term'=>$term,
            'taxonomy'=>$taxonomy,
            'attach_id'=>$qucreative_theme_data['import_demo_last_attach_id'],
        )
        ;



        $port_id = qucreative_import_demo_insert_post_complete($args);

        $args = array(

            'post_title'=>'ACCOMODATION',
            'post_content'=>'',
            'post_status'=>'publish',
            'img_url'=>$img_url,
            'img_path'=>$new_path,
            'term'=>$term,
            'taxonomy'=>$taxonomy,
            'attach_id'=>$qucreative_theme_data['import_demo_last_attach_id'],
        )
        ;



        $port_id = qucreative_import_demo_insert_post_complete($args);

        $args = array(

            'post_title'=>'THE HOTEL',
            'post_content'=>'',
            'post_status'=>'publish',
            'img_url'=>$img_url,
            'img_path'=>$new_path,
            'term'=>$term,
            'taxonomy'=>$taxonomy,
            'attach_id'=>$qucreative_theme_data['import_demo_last_attach_id'],
        )
        ;



        $port_id = qucreative_import_demo_insert_post_complete($args);

        $args = array(

            'post_title'=>'DIVING',
            'post_content'=>'',
            'post_status'=>'publish',
            'img_url'=>$img_url,
            'img_path'=>$new_path,
            'term'=>$term,
            'taxonomy'=>$taxonomy,
            'attach_id'=>$qucreative_theme_data['import_demo_last_attach_id'],
        )
        ;



        $port_id = qucreative_import_demo_insert_post_complete($args);

        $args = array(

            'post_title'=>'SURFING',
            'post_content'=>'',
            'post_status'=>'publish',
            'img_url'=>$img_url,
            'term'=>$term,
            'taxonomy'=>$taxonomy,
            'attach_id'=>$qucreative_theme_data['import_demo_last_attach_id'],
        )
        ;



        $port_id = qucreative_import_demo_insert_post_complete($args);

        $args = array(

            'post_title'=>'BOATING',
            'post_content'=>'',
            'post_status'=>'publish',
            'img_url'=>$img_url,
            'img_path'=>$new_path,
            'term'=>$term,
            'taxonomy'=>$taxonomy,
            'attach_id'=>$qucreative_theme_data['import_demo_last_attach_id'],
        )
        ;



        $port_id = qucreative_import_demo_insert_post_complete($args);

        $args = array(

            'post_title'=>'SKI JET',
            'post_content'=>'',
            'post_status'=>'publish',
            'img_url'=>$img_url,
            'img_path'=>$new_path,
            'term'=>$term,
            'taxonomy'=>$taxonomy,
            'attach_id'=>$qucreative_theme_data['import_demo_last_attach_id'],
        )
        ;



        $port_id = qucreative_import_demo_insert_post_complete($args);

        $args = array(

            'post_title'=>'WINDSURFING',
            'post_content'=>'',
            'post_status'=>'publish',
            'img_url'=>$img_url,
            'img_path'=>$new_path,
            'term'=>$term,
            'taxonomy'=>$taxonomy,
            'attach_id'=>$qucreative_theme_data['import_demo_last_attach_id'],
        )
        ;



        $port_id = qucreative_import_demo_insert_post_complete($args);

        $args = array(

            'post_title'=>'LUXURY RESORT',
            'post_content'=>'',
            'post_status'=>'publish',
            'img_url'=>$img_url,
            'img_path'=>$new_path,
            'term'=>$term,
            'taxonomy'=>$taxonomy,
            'attach_id'=>$qucreative_theme_data['import_demo_last_attach_id'],
        )
        ;



        $port_id = qucreative_import_demo_insert_post_complete($args);

        $args = array(

            'post_title'=>'THE POOL',
            'post_content'=>'',
            'post_status'=>'publish',
            'img_url'=>$img_url,
            'img_path'=>$new_path,
            'term'=>$term,
            'taxonomy'=>$taxonomy,
            'attach_id'=>$qucreative_theme_data['import_demo_last_attach_id'],
        )
        ;



        $port_id = qucreative_import_demo_insert_post_complete($args);

        $args = array(

            'post_title'=>'UMBRELLA',
            'post_content'=>'',
            'post_status'=>'publish',
            'img_url'=>$img_url,
            'img_path'=>$new_path,
            'term'=>$term,
            'taxonomy'=>$taxonomy,
            'attach_id'=>$qucreative_theme_data['import_demo_last_attach_id'],
        )
        ;



        $port_id = qucreative_import_demo_insert_post_complete($args);
    }









    

    // -- summer resort
    




    






    $cont = '[vc_section shape=""  style="light"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="heading-is-center" section_number="01" line1="welcome to the amazing" line2="qu resort"][/vc_column][/vc_row][vc_row][vc_column width="1/3"][antfarm_bullet_feature style="style-4" feature="feature-type-fa" icon_aligment="" icon_theme=" " form="form-circle" title="FIVE STAR RESORT" faicon="star"]Lorem ipsum dolor sit amet, consectet adipiscing elitis met Donec tincidunt eros veli mase.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-4" feature="feature-type-fa" icon_aligment="" icon_theme=" " form="form-circle" title="RELAXATION PARADISE" faicon="umbrella"]Lorem ipsum dolor sit amet, consectet adipiscing elitis met Donec tincidunt eros veli mase.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-4" feature="feature-type-fa" icon_aligment="" icon_theme=" " form="form-circle" title="ORGANIC CUISINE" faicon="leaf"]Lorem ipsum dolor sit amet, consectet adipiscing elitis met Donec tincidunt eros veli mase.[/antfarm_bullet_feature][/vc_column][/vc_row][vc_row][vc_column width="1/3"][antfarm_bullet_feature style="style-4" feature="feature-type-fa" icon_aligment="" icon_theme=" " form="form-circle" title="AWESOME ACTIVITIES" faicon="flag"]Lorem ipsum dolor sit amet, consectet adipiscing elitis met Donec tincidunt eros veli mase.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-4" feature="feature-type-fa" icon_aligment="" icon_theme=" " form="form-circle" title="ALWAYS SUNNY" faicon="sun-o"]Lorem ipsum dolor sit amet, consectet adipiscing elitis met Donec tincidunt eros veli mase.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-4" feature="feature-type-fa" icon_aligment="" icon_theme=" " form="form-circle" title="AMAZING REVIEWS" faicon="heart"]Lorem ipsum dolor sit amet, consectet adipiscing elitis met Donec tincidunt eros veli mase.[/antfarm_bullet_feature][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_sc_progress bg="'.$img_url.'" overlay_opacity="50" convert_1000_to_k="on" title_1="AMAZING REVIEWS" progress_1="19000" eticon_1="icon-chat" title_2="ULTRA FUN ACTIVITIES" progress_2="32" eticon_2="icon-bike" title_3="SUPER HAPPY GUESTS" progress_3="27000" eticon_3="icon-happy" title_4="COUNTRIES WE ARE IN" progress_4="04" eticon_4="icon-map" media="'.$img_url.'"][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="heading-is-center" section_number="02" line1="a few words" line2="about us"][/vc_column][/vc_row][vc_row][vc_column width="1/2"][vc_empty_space height="25px"][vc_column_text]
<h5>Have The Perfect Vacation</h5>
[antfarm_divider height="30" style="style-1"][/antfarm_divider]

Etiam faucibus et nisi sit amet tincidunt. Etiam vehicula eros libero, id lobortis ipsum pretium tempus. Quisque ut massa non lacus ultricies congue. Ut sed sem diam. Fusce eu nunc tellus. Sed semper placerat felis, quis tristique ex consequat sit amet. Suspendisse condimentum nulla eget vestibulum condimentum. Duis sed gravida erat. Nam bibendum urna convallis, eleifend magna sit amet, sollicitudin risus. Duis a arcu mauris integrale.[/vc_column_text][vc_row_inner][vc_column_inner width="1/2"][antfarm_list titles="%5B%7B%22faicon%22%3A%22check%22%2C%22text%22%3A%22International%20cuisine%22%7D%2C%7B%22faicon%22%3A%22check%22%2C%22text%22%3A%22Super%20fun%20activities%22%7D%2C%7B%22faicon%22%3A%22check%22%2C%22text%22%3A%22Beautibul%20landscapes%22%7D%5D"][/vc_column_inner][vc_column_inner width="1/2"][antfarm_list titles="%5B%7B%22faicon%22%3A%22check%22%2C%22text%22%3A%22Huge%20parking%22%7D%2C%7B%22faicon%22%3A%22check%22%2C%22text%22%3A%22Luxury%20accommodation%22%7D%2C%7B%22faicon%22%3A%22check%22%2C%22text%22%3A%22Great%20client%20reviews%22%7D%5D"][/vc_column_inner][/vc_row_inner][/vc_column][vc_column width="1/2"][vc_single_image image="'.$attach_id.'" img_size="full" alignment="right"][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_sc_call_to_action bg="'.$img_url.'" overlay_opacity="50" title="You Deserve The Best Vacations" read_more_link="#" button_style="{``style``:``style-black``,``padding``:````,``rounded``:``rounded``}"]Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque ullamcorper tortor turpis, id ullamcorper diam venenatis vel. Interdum et menuati.[/antfarm_sc_call_to_action][/vc_column][/vc_row][/vc_section][vc_section shape="" type="image" section_bg_image="" bg_hide_on_mobile="true" style="light"][vc_row][vc_column width="1/2"][/vc_column][vc_column width="1/2"][antfarm_section_title style="two-lines" aligment="" section_number="03" line1="some amazing resort" line2="photos"][/vc_column][/vc_row][vc_row][vc_column width="1/2"][/vc_column][vc_column width="1/2"][antfarm_portfolio skin="skin-gazelia skin-gazelia--transparent" zfolio-mode="mode-normal" link_whole_item="zoombox" gap="1px" title_hover="off" cat="gallery-1" responsive_fallback_mobile="dzs-layout--4-cols" hide_title="on" layout="dzs-layout--4-cols"][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_sc_video media="https://www.youtube.com/watch?v=SFQ41choY1E" video_cover="'.$img_url.'" line1="video representation of" line2="Qu Resort"][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="heading-is-center" section_number="04" line1="why you should definetely" line2="pay us a visit"][/vc_column][/vc_row][vc_row][vc_column][antfarm_tta_tabs dzsvcs_id="tabs-2758610" skin="skin-menu" inner_padding="0" active_section="0"][vc_tta_section title="ACTIVITIES" tab_id="1492446939188-a605556f-5e9c"][vc_row_inner][vc_column_inner width="1/3"][antfarm_bullet_feature style="style-1" feature="image" title="LIVE SHOWS" media="'.$img_url.'" button_padding="padding-small" button_rounded="on"]Lorem ipsum dolor sit amet, consectet adipiscing elit. Donec tincidunt eros veliti volutpat nisl malesuada nec in sodale.[/antfarm_bullet_feature][/vc_column_inner][vc_column_inner width="1/3"][antfarm_bullet_feature style="style-1" feature="image" title="WATER SPORTS" media="'.$img_url.'" button_style="color-highlight" button_padding="padding-small" button_rounded="on"]Lorem ipsum dolor sit amet, consectet adipiscing elit. Donec tincidunt eros veliti volutpat nisl malesuada nec in sodale.[/antfarm_bullet_feature][/vc_column_inner][vc_column_inner width="1/3"][antfarm_bullet_feature style="style-1" feature="image" title="BOAT SAILING" media="'.$img_url.'" button_style="color-highlight" button_padding="padding-small" button_rounded="on"]Lorem ipsum dolor sit amet, consectet adipiscing elit. Donec tincidunt eros veliti volutpat nisl malesuada nec in sodale.[/antfarm_bullet_feature][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner width="1/3"][antfarm_bullet_feature style="style-1" feature="image" title="MASSAGE AND SPA" media="'.$img_url.'" button_style="color-highlight" button_padding="padding-small" button_rounded="on"]Lorem ipsum dolor sit amet, consectet adipiscing elit. Donec tincidunt eros veliti volutpat nisl malesuada nec in sodale.[/antfarm_bullet_feature][/vc_column_inner][vc_column_inner width="1/3"][antfarm_bullet_feature style="style-1" feature="image" title="THE BEST PARTIES" media="'.$img_url.'" button_style="color-highlight" button_padding="padding-small" button_rounded="on"]Lorem ipsum dolor sit amet, consectet adipiscing elit. Donec tincidunt eros veliti volutpat nisl malesuada nec in sodale.[/antfarm_bullet_feature][/vc_column_inner][vc_column_inner width="1/3"][antfarm_bullet_feature style="style-1" feature="image" title="GYM AND FITNESS" media="'.$img_url.'" button_style="color-highlight" button_padding="padding-small" button_rounded="on"]Lorem ipsum dolor sit amet, consectet adipiscing elit. Donec tincidunt eros veliti volutpat nisl malesuada nec in sodale.[/antfarm_bullet_feature][/vc_column_inner][/vc_row_inner][/vc_tta_section][vc_tta_section title="PRICING" tab_id="1492447185517-b47d7dab-3d08"][vc_row_inner][vc_column_inner width="1/3"][antfarm_pricing_table title="STARTER PACKAGE" is_featured="off" price="690$" items="%5B%7B%22item%22%3A%22Personalized%20T-shirt%22%7D%2C%7B%22item%22%3A%22Unlimited%20internet%20bandwidth%22%7D%2C%7B%22item%22%3A%22Personal%20kitchen%22%7D%2C%7B%22item%22%3A%22Ocean%20view%22%7D%2C%7B%22item%22%3A%22Free%20zoo%20trips%22%7D%5D" sign_up_text="SIGN UP"][/vc_column_inner][vc_column_inner width="1/3"][antfarm_pricing_table title="PREMIUM PACKAGE" is_featured="on" price="1290$" items="%5B%7B%22item%22%3A%22Full%20wardrobe%22%7D%2C%7B%22item%22%3A%22Indoor%20pool%22%7D%2C%7B%22item%22%3A%22Jacuzzi%22%7D%2C%7B%22item%22%3A%22Ocean%20view%22%7D%2C%7B%22item%22%3A%22Personal%20car%20for%20your%20stay%22%7D%2C%7B%22item%22%3A%22Unlimited%20minibar%20refills%22%7D%5D" sign_up_text="SIGN UP"][/vc_column_inner][vc_column_inner width="1/3"][antfarm_pricing_table title="EXTRA PACKAGE" is_featured="off" price="990$" items="%5B%7B%22item%22%3A%22Beyonce\'s%20T-shirt%22%7D%2C%7B%22item%22%3A%22Unlimited%20subway%20tickets%22%7D%2C%7B%22item%22%3A%22Personal%20trainer%22%7D%2C%7B%22item%22%3A%22Ocean%20view%22%7D%2C%7B%22item%22%3A%22Dolphin%20swimming%22%7D%5D" sign_up_text="SIGN UP"][/vc_column_inner][/vc_row_inner][/vc_tta_section][vc_tta_section title="VACATION" tab_id="1492447185646-0c13399a-498e"][vc_row_inner][vc_column_inner][antfarm_video_player media="https://vimeo.com/178787440" video_cover="231"][/vc_column_inner][/vc_row_inner][/vc_tta_section][/antfarm_tta_tabs][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_sc_contact_box bg="'.$img_url.'" overlay_opacity="50" view_map_str="VIEW MAP" lat="40.69" long="-73.89" titles="%5B%7B%22faicon%22%3A%22facebook-square%22%7D%2C%7B%22faicon%22%3A%22behance%22%7D%2C%7B%22faicon%22%3A%22pinterest%22%7D%2C%7B%22faicon%22%3A%22twitter%22%7D%2C%7B%22faicon%22%3A%22linkedin-square%22%7D%5D"]
<h6>HEADQUARTERS</h6>

<hr class="qucreative-hr-small" />

75 Central Park Avenue
60488, West Virginia, USA
<h6>PHONE / FAX</h6>

<hr class="qucreative-hr-small" />

0040 75.67.43.604
0040 43.56.98.652
<h6>EMAIL</h6>

<hr class="qucreative-hr-small" />

<a href="#">office@company.com</a>[/antfarm_sc_contact_box][/vc_column][/vc_row][/vc_section]';





    $args = array(
        'post_title'    => wp_strip_all_tags( 'SUMMER RESORT' ),
        'post_content'  => $cont,
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_type'   => 'page',

    );


    $page_id = wp_insert_post( $args );


    update_post_meta(  $page_id ,'qucreative_'.'meta_custom_section_margin_bottom','0');
    update_post_meta(  $page_id ,'qucreative_'.'meta_content_starts_at','pixel-position');
    update_post_meta(  $page_id ,'qucreative_'.'meta_content_starts_at_pixel','0');
    update_post_meta(  $page_id ,'qucreative_'.'meta_custom_title',' ');
    update_post_meta(  $page_id ,'qucreative_'.'meta_bg_image',$img_url);


    $ser_data = 'a:38:{s:14:"portfolio_page";s:0:"";s:11:"mail_method";s:7:"wp_mail";s:12:"blur_ammount";s:2:"26";s:23:"menu_enviroment_opacity";s:3:"100";s:26:"content_enviroment_opacity";s:2:"65";s:24:"secondary_content_height";s:3:"300";s:13:"gmaps_api_key";s:39:"AIzaSyAckyD3QGvcqBv07cmFAcFraXXwuWZMyxo";s:13:"content_align";s:18:"content-align-left";s:16:"page_title_align";s:22:"page-title-align-right";s:16:"page_title_style";s:18:"page-title-style-2";s:12:"width_column";s:2:"40";s:9:"width_gap";s:2:"30";s:17:"width_blur_margin";s:2:"30";s:16:"width_section_bg";s:0:"";s:12:"border_width";s:1:"0";s:12:"border_color";s:7:"#ffffff";s:9:"menu_type";s:11:"menu-type-4";s:14:"menu_is_sticky";s:3:"off";s:28:"menu_horizontal_shadow_style";s:4:"none";s:12:"social_icons";s:169:"[{"link":"#","icon":"facebook-square"},{"link":"#","icon":"behance"},{"link":"#","icon":"pinterest"},{"link":"#","icon":"twitter"},{"link":"#","icon":"linkedin-square"}]";s:23:"meta_options_post_types";b:0;s:4:"logo";s:'.strlen($logo_url_summer_resort).':"'.$logo_url_summer_resort.'";s:17:"copyright_textbox";s:14:"ANTFARM THEMES";s:31:"copyright_textbox_heading_style";s:9:"h-group-1";s:38:"footer_copyright_textbox_heading_style";s:9:"h-group-1";s:9:"font_data";s:3836:"headings_font=Raleway&h1_weight=600&h1_size=70&h1_line_height=1.15&h1_responsive_slider=25&h2_weight=600&h2_size=50&h2_line_height=1.15&h2_responsive_slider=25&h3_weight=600&h3_size=40&h3_line_height=1.15&h3_responsive_slider=15&h4_weight=600&h4_size=30&h4_line_height=1.15&h4_responsive_slider=0&h5_weight=600&h5_size=20&h5_line_height=1.15&h5_responsive_slider=0&h6_weight=600&h6_size=14&h6_line_height=1.57&h6_responsive_slider=0&h-group-1_weight=700&h-group-1_size=11&h-group-1_line_height=1.54&h-group-1_responsive_slider=0&h-group-2_weight=600&h-group-2_size=25&h-group-2_line_height=1.28&h-group-2_responsive_slider=0&body_font=Open+Sans&p_weight=regular&p_size=13&p_line_height=1.92&p_color=%23444444&p_color_for_light=%23bbbbbb&hyperlink_weight=600&font-group-1_weight=600italic&font-group-1_size=14&font-group-1_line_height=1.42&font-group-2_weight=600&font-group-2_size=14&font-group-2_line_height=1.42&font-group-3_weight=600italic&font-group-3_size=11&font-group-3_line_height=1.27&font-group-4_weight=regular&font-group-4_size=14&font-group-4_line_height=1.42&font-group-5_weight=600&font-group-5_size=14&font-group-5_line_height=1.42&font-group-6_weight=regular&font-group-6_size=13&font-group-6_line_height=1.46&font-group-7_weight=italic&font-group-7_size=13&font-group-7_line_height=1.46&font-group-8_weight=600&font-group-8_size=13&font-group-8_line_height=1.92&font-group-9_weight=regular&font-group-9_size=14&font-group-9_line_height=1.8&font-group-10_weight=600&font-group-10_size=16&font-group-10_line_height=1.68&font-group-11_weight=800&font-group-11_size=24&font-group-11_line_height=1.29&font-group-12_weight=regular&font-group-12_size=13&font-group-12_line_height=1.46&blockquote_weight=italic&blockquote_size=17&blockquote_line_height=1.58&menu_font=Raleway&menu_weight=600&menu_size=12&menu_line_height=1&copyright_font_link_to=headings&copyright_weight=700&copyright_size=11&copyright_line_height=1.4&page_title_font=Raleway&page_title_weight=100&page_title_size=70&page_title_line_height=1.14&page_title_color=%23FFFFFF&page_title_responsive_slider=0&page_title_orientation=horizontal&section_title_two_font=Seaweed+Script&section_title_two_first_weight=regular&section_title_two_first_size=22&section_title_two_first_line_height=1&section_title_two_first_color=%23222222&section_title_two_first_color_for_light=%23ffffff&section_title_two_first_responsive_slider=&section_title_two_second_font=Cinzel&section_title_two_second_weight=700&section_title_two_second_size=45&section_title_two_second_line_height=1&section_title_two_second_color=%23222222&section_title_two_second_color_for_light=%23ffffff&section_title_two_second_responsive_slider=0&line_spacing=0&section_title_two_number_font=Cinzel&section_title_two_number_weight=700&section_title_two_number_size=20&section_title_two_number_line_height=1&section_title_two_number_color=%23000000&section_title_two_number_color_for_light=%23ffffff&section_title_two_divider_divider_style=style-fullwidth&section_title_two_divider_color=%23444444&section_title_two_divider_color_for_light=%23ffffff&title_divider_spacing_two=20&section_title_one_first_font=Lato&section_title_one_first_weight=900&section_title_one_first_size=25&section_title_one_first_line_height=1.28&section_title_one_first_color=%23444444&section_title_one_first_color_for_light=%23ffffff&section_title_one_first_responsive_slider=0&section_title_one_divider_divider_style=style-fullwidth&section_title_one_divider_color=%23444444&section_title_one_divider_color_for_light=%23ffffff&title_divider_spacing=20&home_slider_font_link_to=headings&home_slider_weight=100&home_slider_size=50&home_slider_line_height=1.20&home_slider_color=%23ffffff&home_slider_color_for_light=%23222222&home_number_font_link_to=headings&home_number_weight=100&home_number_size=135&home_number_line_height=1";s:32:"typography_sidebar_heading_style";s:2:"h6";s:31:"typography_footer_heading_style";s:2:"h6";s:24:"content_enviroment_style";s:16:"body-style-light";s:17:"greyscale_ammount";s:1:"0";s:21:"section_margin_bottom";s:2:"30";s:15:"highlight_color";s:7:"#74d6e7";s:23:"enable_native_scrollbar";s:2:"on";s:13:"bg_transition";s:9:"slidedown";s:11:"enable_ajax";s:2:"on";s:13:"bg_isparallax";s:2:"on";s:18:"custom_css_post_id";i:-1;s:18:"nav_menu_locations";a:2:{s:7:"primary";i:'.$menu_id.';s:6:"social";i:0;}}';






	qucreative_import_demo_update_preset($ser_data,array(

		'preseter_slug' => 'summer-resort',
		'preseter_name' => 'Summer Resort',
	));








    






    update_option( 'page_on_front', $page_id );
    update_option( 'show_on_front', 'page' );














	$option_name = 'sidebars_widgets';
	$option_value = 'a:4:{s:19:"wp_inactive_widgets";a:0:{}s:9:"sidebar-1";a:0:{}s:14:"sidebar-footer";a:4:{i:0;s:6:"text-2";i:1;s:17:"antfarm_contact-2";i:2;s:16:"antfarm_social-2";i:3;s:15:"antfarm_links-2";}s:13:"array_version";i:3;}';

	qucreative_import_demo_update_widget($option_name,$option_value);






	$option_name = 'widget_text';
	$option_value = 'a:2:{i:2;a:4:{s:5:"title";s:0:"";s:4:"text";s:227:"<img src="http://creativewpthemes.net/main-demo/summer-resort/wp-content/uploads/sites/2/2017/06/footer_logo.png" /><br><br>Duis nec nulla turpis. Nulla lacinia laoreet odio, non lacinia nisse felimml met malesuada velleisquat.";s:6:"filter";b:1;s:6:"visual";b:1;}s:12:"_multiwidget";i:1;}';

	qucreative_import_demo_update_widget($option_name,$option_value);






	$option_name = 'widget_antfarm_contact';
	$option_value = 'a:2:{i:2;a:4:{s:5:"title";s:16:"BECOME OUR GUEST";s:7:"address";s:38:"3506 Beverly Hills 780<br>CA 5609, USA";s:9:"telephone";s:32:"044 569 450 45<br>044 407 695 45";s:5:"email";s:20:"contact@quresort.com";}s:12:"_multiwidget";i:1;}';

	qucreative_import_demo_update_widget($option_name,$option_value);






	$option_name = 'widget_antfarm_social';
	$option_value = 'a:2:{i:2;a:2:{s:5:"title";s:16:"LET\'S GET SOCIAL";s:8:"repeater";s:182:"[{"title":"Friends on Facebook","link":"#","icon":"facebook"},{"title":"Follow on Pinterest","link":"#","icon":"pinterest"},{"title":"Follow on Twitter","link":"#","icon":"twitter"}]";}s:12:"_multiwidget";i:1;}';

	qucreative_import_demo_update_widget($option_name,$option_value);






	$option_name = 'widget_antfarm_links';
	$option_value = 'a:2:{i:2;a:2:{s:5:"title";s:12:"USEFUL LINKS";s:8:"repeater";s:157:"[{"title":"Client Reviews","link":"#"},{"title":"Trip Advisor","link":"#"},{"title":"Qu Resort Awards","link":"#"},{"title":"Book Your Vacation","link":"#"}]";}s:12:"_multiwidget";i:1;}';

	qucreative_import_demo_update_widget($option_name,$option_value);











    $temp_text = '3506 Beverly Hills 780<br>
CA 5609, USA';

    $temp_text = preg_replace( "/\r|\n/", "", $temp_text );;


    $temp_text2 = '044 569 450 45<br>
044 407 695 45';

    $temp_text2 = preg_replace( "/\r|\n/", "", $temp_text2 );;




































}













$dmeo_slug = 'coffee-shop';


if($_REQUEST['demo']=='coffee-shop' || $_REQUEST['demo']=='qucreative-coffee-shop') {














    $img_name = '500x500.jpg';
    $img_url = QUCREATIVE_THEME_URL . 'placeholders/500x500.jpg';


    $img_path = QUCREATIVE_THEME_DIR . 'placeholders/500x500.jpg';


    $new_path = $upload_dir_path . '/' . $img_name;

    try {

        if (!copy($img_path, $new_path)) {

        } else {
            $img_url = $upload_dir_url . '/' . $img_name;
            $new_path = $img_path;
        }
    } catch (Exception $e) {
        print_rr($e);
    }




	$attach_id = qucreative_import_demo_create_attachment($img_url, '1', $new_path);


	$qucreative_theme_data['import_demo_last_attach_id'] = $attach_id;





	$img_name_500_100 = '500x100.jpg';
    $img_url_500_100 = QUCREATIVE_THEME_URL . 'placeholders/'.$img_name_500_100;


    $img_path_500_100 = QUCREATIVE_THEME_DIR . 'placeholders/'.$img_name_500_100;


    $new_path_500_100 = $upload_dir_path . '/' . $img_name_500_100;

    try {

        if (!copy($img_path_500_100, $new_path_500_100)) {

        } else {
            $img_url_500_100 = $upload_dir_url . '/' . $img_name_500_100;
            $new_path_500_100 = $img_path_500_100;
        }
    } catch (Exception $e) {
        print_rr($e);
    }






    $img_name_100_400 = '100x400.jpg';
    $img_url_100_400 = QUCREATIVE_THEME_URL . 'placeholders/'.$img_name_100_400;


    $img_path_100_400 = QUCREATIVE_THEME_DIR . 'placeholders/'.$img_name_100_400;


    $new_path_100_400 = $upload_dir_path . '/' . $img_name_100_400;

    try {

        if (!copy($img_path_100_400, $new_path_100_400)) {

        } else {
            $img_url_100_400 = $upload_dir_url . '/' . $img_name_100_400;
            $new_path_100_400 = $img_path_100_400;
        }
    } catch (Exception $e) {
        print_rr($e);
    }









    




	$term = qucreative_import_demo_create_term_if_it_does_not_exist(array(
		'description' => '',
		'term_name' => 'CoffeeShop Gallery',
		'slug' => 'coffeeshop-gallery',
		'taxonomy' => $taxonomy,

	));


	if (is_array($term)) {

		$term_id = $term['term_id'];
	} else {

		$term_id = $term->term_id;
	}




	$args = array(

            'post_title' => 'Coffee with friends',
            'post_content' => '',
            'post_status' => 'publish',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
        );


        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'French roast',
            'post_content' => '',
            'post_status' => 'publish',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'Happy coffee',
            'post_content' => '',
            'post_status' => 'publish',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'Morning coffee',
            'post_content' => '',
            'post_status' => 'publish',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'To go',
            'post_content' => '',
            'post_status' => 'publish',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);





















        $cont = '{"grid_cols":"5","items_arr":[{"w":"2","h":"2"},{"w":"2","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"}],"loop":"on"}';





        $args = array(
            'post_title'    => wp_strip_all_tags( 'Coffee gallery' ),
            'post_content'  => $cont,
            'post_name'  => 'coffee-gallery',
            'post_status'   => 'publish',
            'post_author'   => 1,
            'post_type'   => 'zfolio_grid',

        );


        $page_id = wp_insert_post( $args );


































    $attach_id_500_100 = qucreative_import_demo_create_attachment($img_url_500_100, '1', $new_path_500_100);


    $qucreative_theme_data['import_demo_last_attach_id_500_100'] = $attach_id_500_100;




    $attach_id_100_400 = qucreative_import_demo_create_attachment($img_url_100_400, '1', $new_path_100_400);


    $qucreative_theme_data['import_demo_last_attach_id_100_400'] = $attach_id_100_400;












    $cont = '[vc_section shape=""  style="light"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="heading-is-right" section_number="chapter one" line1="Coffee Shop" line2="this is a place where friends spend time together"][/vc_column][/vc_row][vc_row][vc_column width="1/3"][antfarm_bullet_feature style="style-1" feature="image" title="Cup Of Coffee" media="'.$img_url.'" button_style="color-highlight" heading="h5" button_padding="padding-small"]Lorem ipsum dolor sit amet, maur consectetur adipiscing elit, et vivamus sed turpis sit amet dolor finibust.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-1" feature="image" title="Have Some Tea" media="'.$img_url.'" button_style="color-highlight" heading="h5" button_padding="padding-small"]Lorem ipsum dolor sit amet, maur consectetur adipiscing elit, et vivamus sed turpis sit amet dolor finibust.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-1" feature="image" title="Delightful Pastry" media="'.$img_url.'" button_style="color-highlight" heading="h5" button_padding="padding-small"]Lorem ipsum dolor sit amet, maur consectetur adipiscing elit, et vivamus sed turpis sit amet dolor finibust.[/antfarm_bullet_feature][/vc_column][/vc_row][vc_row css=".vc_custom_1499994659931{margin-bottom: 45px !important;}"][vc_column][vc_single_image image="'.$attach_id_500_100.'" img_size="full" alignment="center"][/vc_column][/vc_row][vc_row][vc_column width="1/2"][vc_single_image image="'.$attach_id.'" img_size="full" alignment="center"][/vc_column][vc_column width="1/2"][vc_empty_space height="40px"][vc_column_text]
<h5>Coffee is all about intimacy</h5>
<p>[antfarm_divider height="30" style="style-1"][/antfarm_divider]</p><p>Suspendisse egestas pharetra tellus, eget commodo magna tincidunt in. Donec purus lectus, mattis sed purus nec, suscipit lobortis ex. Curabitur accumsan, purus eu semper varius, erat nibh volutpat est, ac facilisis libero nisi vel augue. Vivamus et sem bibendum, vestibulum nibh eget, rutrum eros. Cras est magna, dapibus ac nibh vitae, luctus.</p><p>[antfarm_button style="style-hallowblack" padding="padding-medium" rounded="rounded" the_icon=""]RECIPES[/antfarm_button] [antfarm_button style="color-highlight" padding="padding-medium" rounded="rounded" the_icon=""]LOCATION[/antfarm_button]</p>[/vc_column_text][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_sc_antfarm_portfolio skin="skin-gazelia skin-gazelia--transparent" zfolio-mode="mode-normal" link_whole_item="zoombox" gap="0" pagination_method="off" cat="2" filters_enable="off" overlay_opacity="50" mode="" cat="coffeeshop-gallery" layout="coffee-gallery"][/vc_column][/vc_row][/vc_section][vc_section shape="" type="image" section_bg_image="" style="light"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="heading-is-center" line1="About Us" line2="the story behind our small family business"][/vc_column][/vc_row][vc_row css=".vc_custom_1499994744089{margin-bottom: 0px !important;}"][vc_column width="2/12"][vc_single_image image="'.$qucreative_theme_data['import_demo_last_attach_id_100_400'].'" img_size="full" alignment="center"][/vc_column][vc_column width="8/12"][vc_single_image image="'.$qucreative_theme_data['import_demo_last_attach_id_500_100'].'" img_size="full" alignment="center"][vc_empty_space height="20px"][vc_column_text]
<p style="text-align: center;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec orci velit, laoreet nec lorem laoreet, suscipit condimentum eros. Pellentesque semper quam sit amet velit porttitor, sit amet ultricies nisl hendrerit. Nullam eu sagittis mi, ac viverra mi. Nunc sodales lacus at odio aliquam tincidunt. Pellentesque porttitor vel arcu vitae mattis. Maecenas commodo eget massa sit amet rutrum.</p>
<p style="text-align: center;">Praesent id pretium massa, vel venenatis erat. Sed pulvinar, nisi ut elementum mollis, nunc tellus tincidunt massa, non commodo dui enim ac mi. Nullam tempus elit sed magna ultrices semper. Vivamus ut ex interdum, accumsan elit vitae, cursus nisl. Nullam velit nisl, ultricies id tempus at, sagittis vel quam. Suspendisse eu ipsum mi. Sed sollicitudin libero vel sollicitudin consectetur. Duis convallis nibh mi, rhoncus convallis leo rhoncus eu. Curabitur vel sem placerat, fringilla ante vel, tristique ex. Praesent fermentum sit amet sapien sit.</p>
[/vc_column_text][vc_empty_space height="20px"][/vc_column][vc_column width="2/12"][vc_single_image image="'.$qucreative_theme_data['import_demo_last_attach_id_100_400'].'" img_size="full" alignment="center"][/vc_column][/vc_row][vc_row][vc_column][vc_single_image image="'.$qucreative_theme_data['import_demo_last_attach_id_500_100'].'" img_size="full" alignment="center"][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_sc_three_cols bg_1="#b39b93" overlay_opacity_1="50" title_1="It\'s All About Friends" content_1="Lorem ipsum dolor sit amet, maur consectetur adipiscing elit, et vivamus sed turpis sit amet dolor finibust." read_more_text_1="READ MORE" read_more_link_1="#" button_style_1="{``style``:``style-black``,``padding``:``padding-medium``,``rounded``:``rounded``}" bg_2="'.$img_url.'" overlay_opacity_2="0" button_style_2="color-highlight" bg_3="#91aa9d" overlay_opacity_3="50" title_3="It\'s All About Coffee" content_3="Lorem ipsum dolor sit amet, maur consectetur adipiscing elit, et vivamus sed turpis sit amet dolor finibust." read_more_text_3="READ MORE" read_more_link_3="#" button_style_3="{``style``:``style-black``,``padding``:``padding-medium``,``rounded``:``rounded``}" button_padding_1="`{`object Object`}`"][/vc_column][/vc_row][/vc_section][vc_section shape="" type="image" section_bg_image="" style="dark"  section_bg_color="#111111"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="chapter three" line1="The Menu" line2="we want to satisfy all kinds of tastes"][/vc_column][/vc_row][vc_row][vc_column][antfarm_tta_tabs dzsvcs_id="tabs-3627792" skin="skin-menu" inner_padding="30" active_section="0"][vc_tta_section title="COFFEE" tab_id="1492771977356-6ee2a222-ffd6"][vc_row_inner][vc_column_inner width="1/2"][antfarm_menu_item media="'.$img_url.'" title="Ristretto" price="$5.5" ingredients="Lorem ipsum dolor sit amet" titles="%5B%7B%7D%5D"][antfarm_menu_item media="'.$img_url.'" title="Espresso" price="$3.4" ingredients="Praesent placerat consectetur" titles="%5B%7B%7D%5D"][antfarm_menu_item media="'.$img_url.'" title="Cafe Crema" price="$2.9" ingredients="Aliquam vitae malesuada nulla" titles="%5B%7B%7D%5D"][antfarm_menu_item media="'.$img_url.'" title="Cafe Lungo" price="$4.7" ingredients="Quisque hendrerit ex justo" titles="%5B%7B%7D%5D"][/vc_column_inner][vc_column_inner width="1/2"][antfarm_menu_item media="'.$img_url.'" title="Machiatto" price="$3.8" ingredients="Lorem ipsum dolor sit amet" titles="%5B%7B%7D%5D"][antfarm_menu_item media="'.$img_url.'" title="Irish Coffee" price="$4.3" ingredients="Sed id ipsum ut nulla pharetra pretium" titles="%5B%7B%7D%5D"][antfarm_menu_item media="'.$img_url.'" title="Mocha" price="$2.9" ingredients="Cras eu sem vestibulum lacinia quam at" titles="%5B%7B%7D%5D"][antfarm_menu_item media="'.$img_url.'" title="Cappucino" price="$4.3" ingredients="Ut malesuada ipsum eu varius consequat" titles="%5B%7B%7D%5D"][/vc_column_inner][/vc_row_inner][/vc_tta_section][vc_tta_section title="TEA" tab_id="1492771977408-cee18824-157d"][vc_row_inner][vc_column_inner width="1/2"][antfarm_menu_item title="Green" price="$4.25" ingredients="Green Ecstasy, Ryokucha, Jasmine, Matcha Bowl" titles="%5B%7B%7D%5D"][antfarm_menu_item title="Black" price="$4" ingredients="English Breakfast, California Rose" titles="%5B%7B%7D%5D"][antfarm_menu_item title="Herbal" price="$3.5" ingredients="Spearmint Sage, Turmeric Spice" titles="%5B%7B%7D%5D"][antfarm_menu_item title="Iced" price="$4.7" ingredients="Cold Brewed Matcha, Masala Chai" titles="%5B%7B%7D%5D"][/vc_column_inner][vc_column_inner width="1/2"][antfarm_menu_item title="Sweet Coconut Shake" price="$5.25" ingredients="Rose-infused Arnold Palmer, Miso Chai" titles="%5B%7B%7D%5D"][antfarm_menu_item title="While Bowl" price="$4.5" ingredients="Classic Herbal, Local Honey" titles="%5B%7B%7D%5D"][antfarm_menu_item title="Japanese Classic" price="$7" ingredients="Miso tahini, Sweet Matcha Shake" titles="%5B%7B%7D%5D"][antfarm_menu_item title="Cold Brewed" price="$4.3" ingredients="Maldon Salt, Furikake, Sauerkraut" titles="%5B%7B%7D%5D"][/vc_column_inner][/vc_row_inner][/vc_tta_section][vc_tta_section title="PASTRY" tab_id="1492796377421-2840e4e4-00b8"][vc_row_inner][vc_column_inner width="1/2"][antfarm_menu_item title="ALMOND CROISSANT" price="$3.50" ingredients="traditional croissant, baked twice" titles="%5B%7B%7D%5D"][antfarm_menu_item title="BANANA CREAM PIE" price="$6.50" ingredients="flaky pie crust filled with fresh bananas and pastry cream" titles="%5B%7B%7D%5D"][antfarm_menu_item title="BLACKBERRY DANISH" price="$3.5" ingredients="traditional croissant dough baked with a pistachio praline" titles="%5B%7B%7D%5D"][antfarm_menu_item title="BRIOCHE" price="$2.25" ingredients="rich, buttery French breakfast bread" titles="%5B%7B%7D%5D"][/vc_column_inner][vc_column_inner width="1/2"][antfarm_menu_item title="BRIOCHE PEPIN" price="$3.75" ingredients="vanilla bean pastry cream and milk chocolate" titles="%5B%7B%7D%5D"][antfarm_menu_item title="BROWNIE" price="$3.00" ingredients="riple chocolate fudge brownie with pecans" titles="%5B%7B%7D%5D"][antfarm_menu_item title="CROISSANT" price="$3.00" ingredients="classic French breakfast pastry" titles="%5B%7B%7D%5D"][antfarm_menu_item title="GINGER COOKIE" price="$2.25" ingredients="chewy spiced cookie featuring crystallized ginger" titles="%5B%7B%7D%5D"][/vc_column_inner][/vc_row_inner][/vc_tta_section][vc_tta_section title="SWEETS" tab_id="1492797442404-7d82476a-790a"][vc_row_inner][vc_column_inner width="1/2"][antfarm_menu_item title="PARIS BREST" price="$4.50" ingredients="a choux pastry top and bottom" titles="%5B%7B%7D%5D"][antfarm_menu_item title="PAIN AU CHOCOLAT" price="$3.25" ingredients="chocolate wrapped in our traditional croissant dough" titles="%5B%7B%7D%5D"][antfarm_menu_item title="SCONE" price="$3.75" ingredients="a selection of delicious scones, both savoury and sweet" titles="%5B%7B%7D%5D"][antfarm_menu_item title="DUCHESS CAKE" price="$4.55" ingredients="raspberry jam, pastry cream, and whipped cream" titles="%5B%7B%7D%5D"][/vc_column_inner][vc_column_inner width="1/2"][antfarm_menu_item title="DUKE CAKE" price="$5.85" ingredients="salted caramel and whipped chocolate ganache" titles="%5B%7B%7D%5D"][antfarm_menu_item title="TART AMELIE" price="$6.25" ingredients="black currant compote, sour cream mousse" titles="%5B%7B%7D%5D"][antfarm_menu_item title="CHERRY PIE" price="$7.25" ingredients="honey soaked mini-madeleines and fresh berries" titles="%5B%7B%7D%5D"][antfarm_menu_item title="MACARON" price="$2.00" ingredients="almond flour meringue cookies" titles="%5B%7B%7D%5D"][/vc_column_inner][/vc_row_inner][/vc_tta_section][/antfarm_tta_tabs][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_sc_contact_box bg="'.$img_url.'" overlay_opacity="50" view_map_str="VIEW MAP" lat="34.084680" long="-118.408804" titles="%5B%7B%22faicon%22%3A%22facebook-square%22%7D%2C%7B%22faicon%22%3A%22behance%22%7D%2C%7B%22faicon%22%3A%22pinterest%22%7D%2C%7B%22faicon%22%3A%22twitter%22%7D%2C%7B%22faicon%22%3A%22linkedin-square%22%7D%5D"]
<h6>HEADQUARTERS</h6>

<hr class="qucreative-hr-small" />

75 Central Park Avenue
60488, West Virginia, USA
<h6>PHONE / FAX</h6>

<hr class="qucreative-hr-small" />

0040 75.67.43.604
0040 43.56.98.652
<h6>EMAIL</h6>

<hr class="qucreative-hr-small" />

<a href="#">office@company.com</a>[/antfarm_sc_contact_box][/vc_column][/vc_row][/vc_section][vc_section shape="" type="image" section_bg_image="" bg_hide_on_mobile="true" style="dark"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="heading-is-right" section_number="chapter four" line1="Have A Break" line2="have a cup of hot coffee with your friends"][/vc_column][/vc_row][vc_row][vc_column width="1/3"][vc_empty_space height="42px"][antfarm_bullet_feature style="style-4" feature="fa" icon_aligment="icon-align-right" form="form-circle" title="ALL COFFEE STYLES" faicon="coffee"]Lorem ipsum dolor sit amet, consectet adipiscing elitis met Donec tincidunt.[/antfarm_bullet_feature][vc_empty_space height="55px"][antfarm_bullet_feature style="style-4" feature="fa" icon_aligment="icon-align-right" form="form-circle" title="MORNING DISCOUNTS" faicon="tags"]Lorem ipsum dolor sit amet, consectet adipiscing elitis met Donec tincidunt.[/antfarm_bullet_feature][vc_empty_space height="55px"][antfarm_bullet_feature style="style-4" feature="fa" icon_aligment="icon-align-right" form="form-circle" title="AMAZING REVIEWS" faicon="comments"]Lorem ipsum dolor sit amet, consectet adipiscing elitis met Donec tincidunt.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][vc_single_image image="'.$qucreative_theme_data['import_demo_last_attach_id'].'" img_size="full"][/vc_column][vc_column width="1/3"][vc_empty_space height="42px"][antfarm_bullet_feature style="style-4" feature="fa" icon_aligment="" form="form-circle" title="ORGANIC INGREDIENTS" faicon="leaf"]Lorem ipsum dolor sit amet, consectet adipiscing elitis met Donec tincidunt.[/antfarm_bullet_feature][vc_empty_space height="55px"][antfarm_bullet_feature style="style-4" feature="fa" icon_aligment="" form="form-circle" title="FREE WIFI" faicon="wifi"]Lorem ipsum dolor sit amet, consectet adipiscing elitis met Donec tincidunt.[/antfarm_bullet_feature][vc_empty_space height="55px"][antfarm_bullet_feature style="style-4" feature="fa" icon_aligment="" form="form-circle" title="LOVELY HAVING YOU" faicon="heart"]Lorem ipsum dolor sit amet, consectet adipiscing elitis met Donec tincidunt.[/antfarm_bullet_feature][/vc_column][/vc_row][vc_row][vc_column][antfarm_separator style="transparent" height="360"][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_sc_video_text bg="'.$img_url.'" overlay_opacity="50" featured_media_type="video" video_cover="'.$img_url.'" title="Our ingredients are all natural" video="https://www.youtube.com/watch?v=hJ10tsVJsow"]Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque ullamcorper tortor turpis, id ullamcorper diam venenatis vel.

[antfarm_button style="color-highlight" padding="padding-small" rounded="rounded" the_icon=""]READ MORE[/antfarm_button] [antfarm_button style="style-black" padding="padding-small" rounded="rounded" the_icon=""]CONTACT[/antfarm_button][/antfarm_sc_video_text][/vc_column][/vc_row][/vc_section]';





        $args = array(
            'post_title'    => wp_strip_all_tags( 'Qu Coffee Shop' ),
            'post_content'  => $cont,
            'post_status'   => 'publish',
            'post_author'   => 1,
            'post_type'   => 'page',

        );


        $page_id = wp_insert_post( $args );






        update_post_meta(  $page_id ,'qucreative_'.'meta_content_starts_at','pixel-position');
        update_post_meta(  $page_id ,'qucreative_'.'meta_content_starts_at_pixel','0');
        update_post_meta(  $page_id ,'qucreative_'.'meta_custom_title',' ');
        update_post_meta(  $page_id ,'qucreative_'.'meta_bg_image',$img_url);












        update_option( 'page_on_front', $page_id );
        update_option( 'show_on_front', 'page' );






















	$option_name = 'sidebars_widgets';
	$option_value = 'a:4:{s:19:"wp_inactive_widgets";a:0:{}s:9:"sidebar-1";a:0:{}s:14:"sidebar-footer";a:3:{i:0;s:17:"antfarm_contact-2";i:1;s:22:"antfarm_workinghours-2";i:2;s:15:"antfarm_image-2";}s:13:"array_version";i:3;}';

	qucreative_import_demo_update_widget($option_name,$option_value);






	$option_name = 'widget_antfarm_contact';
	$option_value = 'a:2:{i:2;a:4:{s:5:"title";s:8:"Location";s:7:"address";s:42:"3506 Beverly Hills 780 CA 5609, USA, Earth";s:9:"telephone";s:32:"044 569 450 45<br>044 407 695 45";s:5:"email";s:23:"creative@cooffeeshop.me";}s:12:"_multiwidget";i:1;}';

	qucreative_import_demo_update_widget($option_name,$option_value);






	$option_name = 'widget_antfarm_workinghours';
	$option_value = 'a:2:{i:2;a:3:{s:5:"title";s:13:"Working Hours";s:10:"small_desc";s:73:"Duis nec nulla turpis. Nulla mis lacinia laoreet odio, non, mauris certi.";s:8:"repeater";s:92:"[{"title":"MONDAY - SATURDAY","time":"08AM - 11PM"},{"title":"SUNDAY","time":"09AM - 06PM"}]";}s:12:"_multiwidget";i:1;}';

	qucreative_import_demo_update_widget($option_name,$option_value);








	$option_name = 'widget_antfarm_image';
	$option_value = 'a:2:{i:2;a:2:{s:5:"title";s:0:"";s:3:"img";s:'.strlen($qucreative_theme_data['import_demo_last_attach_id']).':"'.$qucreative_theme_data['import_demo_last_attach_id'].'";}s:12:"_multiwidget";i:1;}';

	qucreative_import_demo_update_widget($option_name,$option_value);






	$option_name = 'widget_archives';
	$option_value = 'a:2:{i:3;a:3:{s:5:"title";s:8:"Archives";s:5:"count";i:0;s:8:"dropdown";i:0;}s:12:"_multiwidget";i:1;}';

	qucreative_import_demo_update_widget($option_name,$option_value);



















	$ser_data = 'a:38:{s:14:"portfolio_page";s:0:"";s:11:"mail_method";s:7:"wp_mail";s:12:"blur_ammount";s:2:"26";s:23:"menu_enviroment_opacity";s:2:"30";s:26:"content_enviroment_opacity";s:2:"30";s:24:"secondary_content_height";s:3:"380";s:13:"gmaps_api_key";s:39:"AIzaSyAckyD3QGvcqBv07cmFAcFraXXwuWZMyxo";s:13:"content_align";s:19:"content-align-right";s:16:"page_title_align";s:22:"page-title-align-right";s:16:"page_title_style";s:18:"page-title-style-2";s:12:"width_column";s:2:"40";s:9:"width_gap";s:2:"30";s:17:"width_blur_margin";s:2:"50";s:16:"width_section_bg";s:2:"70";s:12:"border_width";s:1:"0";s:12:"border_color";s:7:"#ffffff";s:9:"menu_type";s:11:"menu-type-8";s:14:"menu_is_sticky";s:3:"off";s:28:"menu_horizontal_shadow_style";s:4:"none";s:12:"social_icons";s:169:"[{"link":"#","icon":"facebook-square"},{"link":"#","icon":"behance"},{"link":"#","icon":"pinterest"},{"link":"#","icon":"twitter"},{"link":"#","icon":"linkedin-square"}]";s:23:"meta_options_post_types";b:0;s:4:"logo";s:'.strlen($logo_url_coffee_shop).':"'.$logo_url_coffee_shop.'";s:17:"copyright_textbox";s:14:"ANTFARM THEMES";s:31:"copyright_textbox_heading_style";s:9:"h-group-1";s:38:"footer_copyright_textbox_heading_style";s:9:"h-group-1";s:9:"font_data";s:3898:"headings_font=Unkempt&h1_weight=700&h1_size=70&h1_line_height=1.15&h1_responsive_slider=20&h2_weight=700&h2_size=50&h2_line_height=1.15&h2_responsive_slider=15&h3_weight=700&h3_size=40&h3_line_height=1.15&h3_responsive_slider=10&h4_weight=700&h4_size=31&h4_line_height=1.4&h4_responsive_slider=0&h5_weight=700&h5_size=21&h5_line_height=1.15&h5_responsive_slider=0&h6_weight=700&h6_size=15&h6_line_height=1.57&h6_responsive_slider=0&h-group-1_weight=700&h-group-1_size=13&h-group-1_line_height=1.54&h-group-1_responsive_slider=0&h-group-2_weight=700&h-group-2_size=25&h-group-2_line_height=1.28&h-group-2_responsive_slider=0&body_font=Merriweather&p_weight=regular&p_size=13&p_line_height=1.92&p_color=%23999999&p_color_for_light=%23bbbbbb&hyperlink_weight=700&font-group-1_weight=700italic&font-group-1_size=14&font-group-1_line_height=1.42&font-group-2_weight=700&font-group-2_size=14&font-group-2_line_height=1.42&font-group-3_weight=700italic&font-group-3_size=11&font-group-3_line_height=1.27&font-group-4_weight=regular&font-group-4_size=14&font-group-4_line_height=1.42&font-group-5_weight=700&font-group-5_size=14&font-group-5_line_height=1.42&font-group-6_weight=regular&font-group-6_size=13&font-group-6_line_height=1.65&font-group-7_weight=italic&font-group-7_size=13&font-group-7_line_height=1.46&font-group-8_weight=700&font-group-8_size=13&font-group-8_line_height=1.92&font-group-9_weight=regular&font-group-9_size=15&font-group-9_line_height=1.8&font-group-10_weight=700&font-group-10_size=16&font-group-10_line_height=1.68&font-group-11_weight=900&font-group-11_size=24&font-group-11_line_height=1.29&font-group-12_weight=regular&font-group-12_size=13&font-group-12_line_height=1.46&blockquote_weight=italic&blockquote_size=17&blockquote_line_height=1.58&menu_font=Unkempt&menu_weight=700&menu_size=20&menu_line_height=0.5&copyright_font_link_to=headings&copyright_weight=700&copyright_size=10&copyright_line_height=1.4&page_title_font=Unkempt&page_title_weight=regular&page_title_size=70&page_title_line_height=1.14&page_title_color=%23FFFFFF&page_title_responsive_slider=0&page_title_orientation=horizontal&section_title_two_font=Unkempt&section_title_two_first_weight=700&section_title_two_first_size=65&section_title_two_first_line_height=1&section_title_two_first_color=%23222222&section_title_two_first_color_for_light=%23ffffff&section_title_two_first_responsive_slider=20&section_title_two_second_font=Merriweather&section_title_two_second_weight=regular&section_title_two_second_size=17&section_title_two_second_line_height=1.35&section_title_two_second_color=%23b39b93&section_title_two_second_color_for_light=%23b39b93&section_title_two_second_responsive_slider=10&line_spacing=9&section_title_two_number_font=Unkempt&section_title_two_number_weight=regular&section_title_two_number_size=25&section_title_two_number_line_height=1&section_title_two_number_color=%23dddddd&section_title_two_number_color_for_light=%23777777&section_title_two_divider_enable=on&section_title_two_divider_divider_style=style-fullwidth&section_title_two_divider_color=%23b39b93&section_title_two_divider_color_for_light=%23b39b93&title_divider_spacing_two=15&section_title_one_first_font=Lato&section_title_one_first_weight=900&section_title_one_first_size=25&section_title_one_first_line_height=1.28&section_title_one_first_color=%23444444&section_title_one_first_color_for_light=%23ffffff&section_title_one_first_responsive_slider=0&section_title_one_divider_divider_style=style-fullwidth&section_title_one_divider_color=%23444444&section_title_one_divider_color_for_light=%23ffffff&title_divider_spacing=20&home_slider_font_link_to=headings&home_slider_weight=regular&home_slider_size=50&home_slider_line_height=1.20&home_slider_color=%23ffffff&home_slider_color_for_light=%23222222&home_number_font_link_to=headings&home_number_weight=regular&home_number_size=135&home_number_line_height=1";s:32:"typography_sidebar_heading_style";s:2:"h6";s:31:"typography_footer_heading_style";s:2:"h4";s:24:"content_enviroment_style";s:16:"body-style-light";s:17:"greyscale_ammount";s:1:"0";s:21:"section_margin_bottom";s:2:"20";s:15:"highlight_color";s:7:"#d55978";s:23:"enable_native_scrollbar";s:3:"off";s:13:"bg_transition";s:9:"slidedown";s:11:"enable_ajax";s:2:"on";s:13:"bg_isparallax";s:2:"on";s:18:"custom_css_post_id";i:172;s:18:"nav_menu_locations";a:2:{s:7:"primary";i:'.$menu_id.';s:6:"social";i:0;}}';





        qucreative_import_demo_update_preset($ser_data,array(

            'preseter_slug' => 'coffee-shop',
            'preseter_name' => 'Coffee Shop',
        ));




    


}




$demo_slug = 'mountain-resort';
$demo_name = 'Mountain Resort';
if($_REQUEST['demo']==$demo_slug) {







	$img_name = '500x500.jpg';
	$img_url = QUCREATIVE_THEME_URL . 'placeholders/500x500.jpg';


	$img_path = QUCREATIVE_THEME_DIR . 'placeholders/500x500.jpg';


	$new_path = $upload_dir_path . '/' . $img_name;

	try {

		if (!copy($img_path, $new_path)) {

		} else {
			$img_url = $upload_dir_url . '/' . $img_name;
			$new_path = $img_path;
		}
	} catch (Exception $e) {
		print_rr($e);
	}


	$attach_id = qucreative_import_demo_create_attachment($img_url, '1', $img_path);


	$qucreative_theme_data['import_demo_last_attach_id'] = $attach_id;









    $img_name = '500x500.jpg';
    $img_url = QUCREATIVE_THEME_URL . 'placeholders/500x500.jpg';


    $img_path = QUCREATIVE_THEME_DIR . 'placeholders/500x500.jpg';


    $new_path = $upload_dir_path . '/' . $img_name;

    try {

        if (!copy($img_path, $new_path)) {

        } else {
            $img_url = $upload_dir_url . '/' . $img_name;
            $new_path = $img_path;
        }
    } catch (Exception $e) {
        print_rr($e);
    }





    $term = get_term_by('slug', $demo_slug, $taxonomy);






    $term = qucreative_import_demo_create_term_if_it_does_not_exist(array(
        'description' => '',
        'term_name' => $demo_name,
        'slug' => $demo_slug,
        'taxonomy' => $taxonomy,


    ));









        if ($debug) {

        }else{
            $args = array(

                'post_title' => 'Climb',
                'post_content' => '',
                'post_status' => 'publish',
                'img_url' => $img_url,
                'img_path'=>$new_path,
                'term' => $term,
                'taxonomy' => $taxonomy,
            );


            $port_id = qucreative_import_demo_insert_post_complete($args);


            $args = array(

                'post_title' => 'Sky lift',
                'post_content' => '',
                'post_status' => 'publish',
                'img_url' => $img_url,
                'img_path'=>$new_path,
                'term' => $term,
                'taxonomy' => $taxonomy,
                'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
            );

            $port_id = qucreative_import_demo_insert_post_complete($args);


            $args = array(

                'post_title' => 'Hiking',
                'post_content' => '',
                'post_status' => 'publish',
                'img_url' => $img_url,
                'img_path'=>$new_path,
                'term' => $term,
                'taxonomy' => $taxonomy,
                'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
            );

            $port_id = qucreative_import_demo_insert_post_complete($args);


            $args = array(

                'post_title' => 'Big rock',
                'post_content' => '',
                'post_status' => 'publish',
                'img_url' => $img_url,
                'img_path'=>$new_path,
                'term' => $term,
                'taxonomy' => $taxonomy,
                'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
            );

            $port_id = qucreative_import_demo_insert_post_complete($args);


            $args = array(

                'post_title' => 'Clouds',
                'post_content' => '',
                'post_status' => 'publish',
                'img_url' => $img_url,
                'img_path'=>$new_path,
                'term' => $term,
                'taxonomy' => $taxonomy,
                'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
            );

            $port_id = qucreative_import_demo_insert_post_complete($args);


            $args = array(

                'post_title' => 'Snowboarding',
                'post_content' => '',
                'post_status' => 'publish',
                'img_url' => $img_url,
                'img_path'=>$new_path,
                'term' => $term,
                'taxonomy' => $taxonomy,
                'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
            );

            $port_id = qucreative_import_demo_insert_post_complete($args);


            $args = array(

                'post_title' => 'Snowy trees',
                'post_content' => '',
                'post_status' => 'publish',
                'img_url' => $img_url,
                'img_path'=>$new_path,
                'term' => $term,
                'taxonomy' => $taxonomy,
                'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
            );

            $port_id = qucreative_import_demo_insert_post_complete($args);


            $args = array(

                'post_title' => 'Lake',
                'post_content' => '',
                'post_status' => 'publish',
                'img_url' => $img_url,
                'img_path'=>$new_path,
                'term' => $term,
                'taxonomy' => $taxonomy,
                'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
            );

            $port_id = qucreative_import_demo_insert_post_complete($args);




        }




	$content = '
 .the-content-con.content-align-right{
margin-right:0!important;
}';




	$args = array(

		'post_title' => 'qucreative',
		'post_content' => $content,
		'post_type' => 'custom_css',
		'post_status' => 'publish',
		'qucreative_'.'meta_post_media' => 'none',



	);

	$port_id = qucreative_import_demo_insert_post_complete($args);


        $taxonomy = 'category';




    $term_acc = get_term_by('slug', 'accomodation-rooms', $taxonomy);

    if($term_acc) {

    }else {

        $term_acc = wp_insert_term('Accommodation rooms', $taxonomy, array(
            'description' => '',
            'slug' => 'accomodation-rooms',

        ));

    }


    $term_cr = get_term_by('slug', 'client-reviews', $taxonomy);

    if($term_cr) {

    }else {


        $term_cr = wp_insert_term('Client reviews', $taxonomy, array(
            'description' => '',
            'slug' => 'client-reviews',

        ));

    }


    $term_vt = get_term_by('slug', 'skiing-video-tutorials', $taxonomy);

    if($term_cr) {

    }else {


        $term_cr = wp_insert_term('Skiing video tutorials', $taxonomy, array(
            'description' => '',
            'slug' => 'skiing-video-tutorials',

        ));

    }


    $term_ne = get_term_by('slug', 'news', $taxonomy);

    if($term_cr) {

    }else {


        $term_cr = wp_insert_term('News', $taxonomy, array(
            'description' => '',
            'slug' => 'news',

        ));

    }


    $term_ne = get_term_by('slug', 'events', $taxonomy);

    if($term_cr) {

    }else {


        $term_cr = wp_insert_term('Events', $taxonomy, array(
            'description' => '',
            'slug' => 'events',

        ));

    }









        $args = array(

            'post_title' => 'Curabitur et turpis a nibh maximus semper',
            'custom_title' => 'This is a cool featured image example',
            'qucreative_'.'meta_post_media_type' => 'vimeo',
            'qucreative_'.'meta_post_media' => 'https://vimeo.com/199855572',
            'post_content' => 'Etiam sodales blandit augue malesuada fermentum. Nam fringilla et ligula et facilisis. Vestibulum commodo nec lacus in pretium. Etiam ac bibendum purus, quis consectetur massa. Vivamus quis est ut enim sollicitudin blandit. Maecenas iaculis eget magna placerat pretium. Proin dictum mi vel lacus ultrices, ut placerat nulla tristique. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse potenti. Proin gravida justo ac sapien euismod aliquet.
<blockquote>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</blockquote>
Pellentesque eu nunc porta, elementum risus eu, lobortis nulla. Donec eget dui nec purus vehicula posuere. Ut mauris nibh, lobortis quis facilisis non, eleifend nec erat. Cras porta, dui a imperdiet suscipit, erat nulla rhoncus purus, sed faucibus nulla enim eu justo. Pellentesque sit amet turpis enim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque sed tincidunt eros, ut sodales lorem. Quisque rhoncus non nibh vel commodo. Sed tellus elit, semper a elementum sit amet, congue non sapien. Phasellus rhoncus bibendum vehicula. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque laoreet mi scelerisque, posuere odio at, condimentum lorem. Phasellus sollicitudin elit nec consequat vehicula. Suspendisse nec pellentesque tortor, et faucibus erat. Duis sem turpis, rutrum fringilla diam ac, pulvinar suscipit turpis.',
            'post_status' => 'publish',
            'post_type' => 'post',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term_acc,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);
     update_post_meta(  $port_id ,'qucreative_'.'meta_bg_image',$img_url);



        $args = array(

            'post_title' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
            'custom_title' => 'This is a cool featured image example',
            'qucreative_'.'meta_post_media_type' => 'vimeo',
            'qucreative_'.'meta_post_media' => 'https://vimeo.com/47955106',
            'post_content' => 'Donec consequat est pellentesque scelerisque mattis. Nam scelerisque justo sit amet elit feugiat commodo. Nulla auctor lacus in massa rhoncus, eget interdum mauris pharetra. Aenean facilisis justo in arcu tempor, et pretium ipsum aliquet. Cras ullamcorper aliquet neque non porttitor. Curabitur et dapibus purus. Proin fringilla mattis leo, id tempus justo commodo cursus. Aenean varius tristique mauris ut imperdiet. Cras sollicitudin quis magna in porta. Suspendisse at urna purus. Etiam nec nisl sollicitudin, elementum diam blandit, bibendum mauris. Phasellus neque nisl, imperdiet vitae aliquam sit amet, luctus in mauris. Aliquam iaculis elit non dolor hendrerit, sit amet mollis ante finibus. Nulla gravida enim felis, nec ultrices augue hendrerit sed. Vivamus sodales nec mauris et ultrices.

Maecenas metus libero, molestie id diam nec, placerat mollis enim. Aenean et dictum dolor. Sed vel urna lorem. Sed eu accumsan purus. Nunc luctus nibh in metus faucibus euismod. Aliquam lacinia dui ac ultricies eleifend. Cras justo lectus, imperdiet a mauris ut, ultrices porttitor magna. Donec pellentesque venenatis nunc nec elementum. Proin odio magna, pharetra sed porttitor sit amet, tincidunt et risus. Aenean a leo hendrerit, pellentesque mi id, tincidunt tellus. Etiam placerat magna ligula, non ornare nisi vestibulum quis. Ut at diam iaculis ante convallis tristique.',
            'post_status' => 'publish',
            'post_type' => 'post',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term_cr,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);
    update_post_meta(  $port_id ,'qucreative_'.'meta_bg_image',$img_url);



        $args = array(

            'post_title' => 'Vestibulum vitae tempus tortor, ac sodales nibh',
            'custom_title' => 'This is a cool featured image example',
            'qucreative_'.'meta_post_media_type' => 'vimeo',
            'qucreative_'.'meta_post_media' => 'https://vimeo.com/62193160',
            'post_content' => 'Proin turpis felis, imperdiet a scelerisque sed, ornare sit amet nulla. Fusce lacinia lorem vitae massa finibus sollicitudin. Sed facilisis leo nec magna sodales, ut imperdiet sapien porta. Cras neque sapien, pharetra sit amet risus nec, hendrerit tempor eros. Fusce eleifend velit eget venenatis interdum. Integer dolor mauris, interdum ut turpis ac, imperdiet vulputate magna. Etiam laoreet ante id arcu pretium maximus. Ut nec vestibulum lacus, a malesuada mi. In pulvinar tristique pellentesque. Fusce vel erat sagittis ligula ultrices vestibulum eleifend et tellus. Vestibulum efficitur laoreet vulputate. Aliquam finibus malesuada nunc vel venenatis. Mauris in posuere erat.

Proin fringilla eget sapien lacinia tempus. Praesent eleifend risus id ipsum tempus euismod. Pellentesque eget leo non leo dignissim euismod in nec risus. Cras mattis sapien sit amet quam ultricies, id malesuada neque euismod. Sed vel gravida magna, non porta tortor. Proin vel nulla suscipit, ultrices felis quis, laoreet arcu. Nulla interdum purus fermentum nisi lacinia, eget placerat augue viverra. Sed egestas est at pulvinar ornare. Sed eleifend fermentum ex at posuere. Aliquam dignissim luctus lectus, eu euismod nunc ullamcorper eget. Sed pulvinar nunc tempor neque ullamcorper placerat. Nulla aliquet orci leo, non tempus urna viverra non. Sed aliquam metus vestibulum posuere sagittis.',
            'post_status' => 'publish',
            'post_type' => 'post',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term_cr,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);
    update_post_meta(  $port_id ,'qucreative_'.'meta_bg_image',$img_url);

        $args = array(

            'post_title' => 'Lorem Ipsum felis imperdiet',
            'custom_title' => 'This is a cool featured image example',
            'qucreative_'.'meta_post_media_type' => 'vimeo',
            'qucreative_'.'meta_post_media' => 'https://vimeo.com/62193160',
            'post_content' => 'Proin turpis felis, imperdiet a scelerisque sed, ornare sit amet nulla. Fusce lacinia lorem vitae massa finibus sollicitudin. Sed facilisis leo nec magna sodales, ut imperdiet sapien porta. Cras neque sapien, pharetra sit amet risus nec, hendrerit tempor eros. Fusce eleifend velit eget venenatis interdum. Integer dolor mauris, interdum ut turpis ac, imperdiet vulputate magna. Etiam laoreet ante id arcu pretium maximus. Ut nec vestibulum lacus, a malesuada mi. In pulvinar tristique pellentesque. Fusce vel erat sagittis ligula ultrices vestibulum eleifend et tellus. Vestibulum efficitur laoreet vulputate. Aliquam finibus malesuada nunc vel venenatis. Mauris in posuere erat.

Proin fringilla eget sapien lacinia tempus. Praesent eleifend risus id ipsum tempus euismod. Pellentesque eget leo non leo dignissim euismod in nec risus. Cras mattis sapien sit amet quam ultricies, id malesuada neque euismod. Sed vel gravida magna, non porta tortor. Proin vel nulla suscipit, ultrices felis quis, laoreet arcu. Nulla interdum purus fermentum nisi lacinia, eget placerat augue viverra. Sed egestas est at pulvinar ornare. Sed eleifend fermentum ex at posuere. Aliquam dignissim luctus lectus, eu euismod nunc ullamcorper eget. Sed pulvinar nunc tempor neque ullamcorper placerat. Nulla aliquet orci leo, non tempus urna viverra non. Sed aliquam metus vestibulum posuere sagittis.',
            'post_status' => 'publish',
            'post_type' => 'post',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term_vt,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);
    update_post_meta(  $port_id ,'qucreative_'.'meta_bg_image',$img_url);



        $args = array(

            'post_title' => 'Nullam elit augue, porttitor a pharetra ut, sodales vitae',
            'custom_title' => 'This is a cool featured image example',
            'qucreative_'.'meta_post_media_type' => 'youtube',
            'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=9HC2o59SP6k',
            'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sodales nulla ligula, fringilla sollicitudin leo interdum sit amet. Vestibulum et est sed ipsum fringilla rhoncus. Aenean convallis nisi consectetur, pellentesque eros a, pellentesque turpis. Nunc tortor lectus, blandit elementum dui quis, elementum commodo justo. Pellentesque lacinia leo velit, sed consequat sapien lobortis dapibus. Curabitur volutpat orci arcu, fermentum pulvinar orci luctus eget. In hac habitasse platea dictumst. Duis orci ipsum, imperdiet eu ipsum et, egestas convallis augue.

Proin turpis felis, imperdiet a scelerisque sed, ornare sit amet nulla. Fusce lacinia lorem vitae massa finibus sollicitudin. Sed facilisis leo nec magna sodales, ut imperdiet sapien porta. Cras neque sapien, pharetra sit amet risus nec, hendrerit tempor eros. Fusce eleifend velit eget venenatis interdum. Integer dolor mauris, interdum ut turpis ac, imperdiet vulputate magna. Etiam laoreet ante id arcu pretium maximus. Ut nec vestibulum lacus, a malesuada mi. In pulvinar tristique pellentesque. Fusce vel erat sagittis ligula ultrices vestibulum eleifend et tellus. Vestibulum efficitur laoreet vulputate. Aliquam finibus malesuada nunc vel venenatis. Mauris in posuere erat.

Proin fringilla eget sapien lacinia tempus. Praesent eleifend risus id ipsum tempus euismod. Pellentesque eget leo non leo dignissim euismod in nec risus. Cras mattis sapien sit amet quam ultricies, id malesuada neque euismod. Sed vel gravida magna, non porta tortor. Proin vel nulla suscipit, ultrices felis quis, laoreet arcu. Nulla interdum purus fermentum nisi lacinia, eget placerat augue viverra. Sed egestas est at pulvinar ornare. Sed eleifend fermentum ex at posuere. Aliquam dignissim luctus lectus, eu euismod nunc ullamcorper eget. Sed pulvinar nunc tempor neque ullamcorper placerat. Nulla aliquet orci leo, non tempus urna viverra non. Sed aliquam metus vestibulum posuere sagittis.',
            'post_status' => 'publish',
            'post_type' => 'post',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term_cr,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);
    update_post_meta(  $port_id ,'qucreative_'.'meta_bg_image',$img_url);



        $args = array(

            'post_title' => 'Quisque blandit sollicitudin tortor, sit amet consectetur',
            'custom_title' => 'This is a cool featured image example',

            'post_content' => 'Praesent malesuada consectetur arcu, eget cursus nibh commodo eget. Phasellus id risus tincidunt, tempus arcu sed, facilisis est. Nulla arcu ex, ultrices eget lorem ac, rutrum lacinia quam. Pellentesque dignissim augue id tortor auctor, ut vulputate tortor rhoncus. Proin ullamcorper pulvinar pellentesque. Maecenas at est sit amet odio convallis laoreet eget a lorem. Integer tempor, ipsum id congue sagittis, quam ligula ullamcorper elit, at semper odio risus rutrum metus. In quis erat malesuada, pretium nisl ac, eleifend odio. Nam ligula felis, congue non dolor eu, mollis tincidunt orci. Nullam orci magna, commodo id arcu eu, iaculis bibendum ante. Mauris eget libero sed metus feugiat ornare. Suspendisse pulvinar erat sed nulla pellentesque mattis. Donec venenatis ultrices lorem nec blandit.

Quisque at dui nec nisi venenatis suscipit. Donec bibendum lacinia arcu non lobortis. Proin mollis maximus dui gravida consequat. Etiam maximus mollis facilisis. Vivamus placerat ut magna tempor convallis. Sed nec ligula metus. Pellentesque euismod purus eget lacus accumsan, ac condimentum neque volutpat. Sed nec blandit nibh. Quisque accumsan turpis a cursus tempor. Mauris vel consectetur purus. Vestibulum vehicula neque sed consequat consequat.

Donec mollis libero et ex molestie egestas. Interdum et malesuada fames ac ante ipsum primis in faucibus. Integer quis lacinia purus, sit amet rhoncus dolor. Donec nec nibh malesuada lorem dignissim lobortis non vel justo. Sed euismod ultricies odio, at fermentum quam dapibus sit amet. Proin maximus dui quis posuere finibus. Maecenas egestas imperdiet est, nec pharetra eros gravida sit amet. Nulla quam quam, fermentum et massa at, placerat molestie nisi.',
            'post_status' => 'publish',
            'post_type' => 'post',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term_ne,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);
    update_post_meta(  $port_id ,'qucreative_'.'meta_bg_image',$img_url);
































        $cont = '';





        $args = array(
            'post_title'    => wp_strip_all_tags( 'Blog' ),
            'post_content'  => $cont,
            'post_status'   => 'publish',
            'post_author'   => 1,
            'post_type'   => 'page',

        );


        $page_id = wp_insert_post( $args );




        update_post_meta(  $page_id ,'qucreative_'.'meta_custom_title','our blog');
        update_post_meta(  $page_id ,'qucreative_'.'meta_bg_image',$img_url);


        update_option( 'page_for_posts', $page_id );










        $cont = '[vc_section shape="shape-4" shape_color="#aacc20" shape_height="20" type="image" style="light"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="heading-is-center" line1="Welcome" line2="say hello to the best vacation of your life"][/vc_column][/vc_row][vc_row][vc_column width="1/4"][antfarm_bullet_feature style="style-1" feature="image" title="Five Star Hotel" media="'.$img_url.'" read_more="Read More" button_style="style-hallowblack" heading="h5" button_padding="padding-small" button_rounded="on"]Nam id dolor eget metus consecte scelerisque. Curabitur lobortis varius porta congue roin vel conva.[/antfarm_bullet_feature][/vc_column][vc_column width="1/4"][antfarm_bullet_feature style="style-1" feature="image" title="State Of The Art Spa" media="'.$img_url.'" read_more="Read More" button_style="style-hallowblack" heading="h5" button_padding="padding-small" button_rounded="on"]Nam id dolor eget metus consecte scelerisque. Curabitur lobortis varius porta congue roin vel conva.[/antfarm_bullet_feature][/vc_column][vc_column width="1/4"][antfarm_bullet_feature style="style-1" feature="image" title="Rock Solid Gym" media="'.$img_url.'" read_more="Read More" button_style="style-hallowblack" heading="h5" button_padding="padding-small" button_rounded="on"]Nam id dolor eget metus consecte scelerisque. Curabitur lobortis varius porta congue roin vel conva.[/antfarm_bullet_feature][/vc_column][vc_column width="1/4"][antfarm_bullet_feature style="style-1" feature="image" title="Amazing Cuisine" media="'.$img_url.'" read_more="Read More" button_style="style-hallowblack" heading="h5" button_padding="padding-small" button_rounded="on"]Nam id dolor eget metus consecte scelerisque. Curabitur lobortis varius porta congue roin vel conva.[/antfarm_bullet_feature][/vc_column][/vc_row][/vc_section][vc_section shape="" type="image" section_bg_color="#ffffff" style="light"][vc_row][vc_column][antfarm_sc_antfarm_portfolio skin="skin-gazelia skin-gazelia--transparent" zfolio-mode="mode-cols" link_whole_item="zoombox" gap="1px" cat="'.$demo_slug.'" overlay_opacity="50" mode="mode-cols" layout="dzs-layout--4-cols"][/vc_column][/vc_row][/vc_section][vc_section shape="shape-3" shape_color="#aacc20" shape_height="20" type="image" section_bg_image="" bg_hide_on_tablet="true" bg_hide_on_mobile="true" style="light"][vc_row css=".vc_custom_1501259538758{margin-bottom: 30px !important;}"][vc_column width="1/2"][antfarm_section_title style="two-lines" aligment="" line1="About Us" line2="it all started as a small family business"][/vc_column][vc_column width="1/2"][/vc_column][/vc_row][vc_row][vc_column width="1/2"][antfarm_image_slider images="'.$qucreative_theme_data['import_demo_last_attach_id'].','.$qucreative_theme_data['import_demo_last_attach_id'].'"][vc_column_text]
<h5>You Will Be Treated Like Royalty</h5>
[antfarm_divider height="30" style="style-1"][/antfarm_divider]

Etiam faucibus et nisi sit amet tincidunt. Etiam vehicula eros libero, id lobortis ipsum pretium tempus. Quisque ut massa non lacus ultricies congue. Ut sed sem diam. Fusce eu nunc tellus. Sed semper placerat felis, quis tristique ex consequat sit amet. Suspendisse condimentum nulla eget vestibulum condimentum. Duis sed gravida erat. Nam bibendum urna convallis, eleifend magna sit amet, sollicitudin risus. Duis a arcu mauris integrale.

[antfarm_button style="style-hallowblack" padding="padding-medium" rounded="rounded" the_icon=""]Restaurant[/antfarm_button]  [antfarm_button style="style-hallowblack" padding="padding-medium" rounded="rounded" the_icon=""]Activities[/antfarm_button][/vc_column_text][/vc_column][vc_column width="1/2"][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_sc_three_cols bg_1="'.$img_url.'" overlay_opacity_1="50" title_1="Single Deluxe" content_1="Donec quis efficitur ipsum am dapibus nislim enim viverra blandit. Quisque metes faucibus erat eget nulla." read_more_text_1="READ MORE" read_more_link_1="#" button_style_1="{``style``:``color-highlight``,``padding``:````,``rounded``:``rounded``}" bg_2="'.$img_url.'" overlay_opacity_2="50" title_2="Double Deluxe" content_2="Donec quis efficitur ipsum am dapibus nislim enim viverra blandit. Quisque metes faucibus erat eget nulla." read_more_text_2="READ MORE" read_more_link_2="#" button_style_2="{``style``:``color-highlight``,``padding``:````,``rounded``:``rounded``}" bg_3="'.$img_url.'" overlay_opacity_3="50" title_3="Apartment Deluxe" content_3="Donec quis efficitur ipsum am dapibus nislim enim viverra blandit. Quisque metes faucibus erat eget nulla." read_more_text_3="READ MORE" read_more_link_3="#" button_style_3="{``style``:``color-highlight``,``padding``:````,``rounded``:``rounded``}" box_width="270" button_padding_1="color-highlight"][/vc_column][/vc_row][/vc_section][vc_section shape="shape-4" shape_color="#aacc20" shape_height="20" type="image" style="light"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="heading-is-center" line1="Activities" line2="rest assured, you will not get bored here"][/vc_column][/vc_row][vc_row][vc_column][antfarm_image_box media="'.$img_url.'" aligment="left" text_aligment="`{`object Object`}`" heading="Ski And Snowboarding" heading_style="h4"]Etiam faucibus et nisi sit amet tincidunt. Etiam vehicula eros libero, id lobortis ipsum pretium tempus. Quisque ut massa non lacus ultricies congue. Ut sed sem diam. Fusce eu nunc tellus. Sed semper placerat felis, quis tristique ex consequat sit amet. Suspendisse condimentum nulla eget vestibulum condimentum. Duis sed gravida erat. Nam bibendum urna convallis.

[antfarm_button style="color-highlight" padding="padding-medium" rounded="rounded" the_icon=""]Book Activity[/antfarm_button][/antfarm_image_box][antfarm_image_box media="'.$img_url.'" aligment="right" text_aligment="`{`object Object`}`" heading="Mountain Biking" heading_style="h4"]Etiam faucibus et nisi sit amet tincidunt. Etiam vehicula eros libero, id lobortis ipsum pretium tempus. Quisque ut massa non lacus ultricies congue. Ut sed sem diam. Fusce eu nunc tellus. Sed semper placerat felis, quis tristique ex consequat sit amet. Suspendisse condimentum nulla eget vestibulum condimentum. Duis sed gravida erat. Nam bibendum urna convallis.

[antfarm_button style="color-highlight" padding="padding-medium" rounded="rounded" the_icon=""]Book Activity[/antfarm_button][/antfarm_image_box][antfarm_image_box media="'.$img_url.'" aligment="left" text_aligment="`{`object Object`}`" heading="Ski And Snowboarding" heading_style="h4"]Etiam faucibus et nisi sit amet tincidunt. Etiam vehicula eros libero, id lobortis ipsum pretium tempus. Quisque ut massa non lacus ultricies congue. Ut sed sem diam. Fusce eu nunc tellus. Sed semper placerat felis, quis tristique ex consequat sit amet. Suspendisse condimentum nulla eget vestibulum condimentum. Duis sed gravida erat. Nam bibendum urna convallis.

[antfarm_button style="color-highlight" padding="padding-medium" rounded="rounded" the_icon=""]Book Activity[/antfarm_button][/antfarm_image_box][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_sc_video_text bg="'.$img_url.'" overlay_opacity="50" featured_media_type="video" video_cover="'.$img_url.'" caption_aligment="text-left" title="See our ski teachers in action" video="https://www.youtube.com/watch?v=95kD2JTQW_A"]Etiam faucibus et nisi sit amet tincidunt. Etiam vehicula eros libero, id lobortis ipsum pretium tempus. Quisque ut massa non lacus ultricies congue. Ut sed sem diam. Fusce eu nunc tellus. Sed semper placerat felis, quis tristique.

[antfarm_button style="color-highlight" padding="padding-medium" rounded="rounded" the_icon=""]Try Out[/antfarm_button] [antfarm_button style="style-black" padding="padding-medium" rounded="rounded" the_icon=""]Read More[/antfarm_button][/antfarm_sc_video_text][/vc_column][/vc_row][/vc_section][vc_section shape="shape-3" shape_color="#aacc20" shape_height="20" type="image" style="light"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" line1="Latest News" line2="things happen quickly around here, so stay in touch"][/vc_column][/vc_row][vc_row][vc_column][antfarm_latest_posts_2 nr_per_row="3" count="3" excerpt_length="297" button_style="{``style``:``color-highlight``,``padding``:``padding-medium``,``rounded``:``rounded``}" custom_thumbnail_height="220"][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_sc_contact_form bg="'.$img_url.'"][/vc_column][/vc_row][/vc_section][vc_section shape="shape-4" shape_color="#aacc20" shape_height="20" type="image" section_bg_image="" style="light"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="heading-is-center" line1="Our Prices" line2="the best holidays of your life, for affordable pricing"][/vc_column][/vc_row][vc_row][vc_column width="1/3"][antfarm_pricing_table title="STARTER PACKAGE" is_featured="off" price="$530" quota="ONE TIME FEE" items="%5B%7B%22item%22%3A%22T-shirt%20and%20toaster%22%7D%2C%7B%22item%22%3A%22Rihanna%E2%80%99s%20email%22%7D%2C%7B%22item%22%3A%22Telepathic%20support%22%7D%2C%7B%22item%22%3A%22Foldable%20time%20machine%22%7D%2C%7B%22item%22%3A%22Real%20life%20undo%20button%22%7D%5D" sign_up_text="Sign Up"][/vc_column][vc_column width="1/3"][antfarm_pricing_table title="PREMIUM PACKAGE" is_featured="on" price="$1250" quota="ONE TIME FEE" items="%5B%7B%22item%22%3A%22T-shirt%20and%20toaster%22%7D%2C%7B%22item%22%3A%22Rihanna%E2%80%99s%20email%22%7D%2C%7B%22item%22%3A%22Telepathic%20support%22%7D%2C%7B%22item%22%3A%22Foldable%20time%20machine%22%7D%2C%7B%22item%22%3A%22Real%20life%20undo%20button%22%7D%5D" sign_up_text="Sign Up"][/vc_column][vc_column width="1/3"][antfarm_pricing_table title="STARTER PACKAGE" is_featured="off" price="$530" quota="ONE TIME FEE" items="%5B%7B%22item%22%3A%22T-shirt%20and%20toaster%22%7D%2C%7B%22item%22%3A%22Rihanna%E2%80%99s%20email%22%7D%2C%7B%22item%22%3A%22Telepathic%20support%22%7D%2C%7B%22item%22%3A%22Foldable%20time%20machine%22%7D%2C%7B%22item%22%3A%22Real%20life%20undo%20button%22%7D%5D" sign_up_text="Sign Up"][/vc_column][/vc_row][/vc_section]<style>.the-content-con.content-align-right{
margin-right:0!important;
}</style>';






        $args = array(
            'post_title'    => wp_strip_all_tags( 'Qu '.$demo_name ),
            'post_content'  => $cont,
            'post_status'   => 'publish',
            'post_author'   => 1,
            'post_type'   => 'page',

        );


        $page_id = wp_insert_post( $args );





        update_post_meta(  $page_id ,'qucreative_'.'meta_custom_section_margin_bottom','0');
        update_post_meta(  $page_id ,'qucreative_'.'meta_bordered_design','off');
        update_post_meta(  $page_id ,'qucreative_'.'meta_content_starts_at_pixel','0');
        update_post_meta(  $page_id ,'qucreative_'.'meta_scrollbar_theme','light');
        update_post_meta(  $page_id ,'qucreative_'.'meta_custom_title',' ');
        update_post_meta(  $page_id ,'qucreative_'.'meta_bg_image',$img_url);












        update_option( 'page_on_front', $page_id );
        update_option( 'show_on_front', 'page' );















        $option_name = 'sidebars_widgets';
        $option_value = 'a:4:{s:19:"wp_inactive_widgets";a:0:{}s:9:"sidebar-1";a:5:{i:0;s:16:"antfarm_search-3";i:1;s:25:"antfarm_lightboxgallery-2";i:2;s:20:"antfarm_categories-3";i:3;s:16:"antfarm_social-3";i:4;s:22:"antfarm_workinghours-2";}s:14:"sidebar-footer";a:4:{i:0;s:16:"antfarm_search-2";i:1;s:20:"antfarm_categories-2";i:2;s:22:"antfarm_latest_posts-2";i:3;s:16:"antfarm_social-2";}s:13:"array_version";i:3;}';

        qucreative_import_demo_update_widget($option_name,$option_value);






        $option_name = 'widget_search';
        $option_value = 'a:3:{i:6;a:1:{s:5:"title";s:0:"";}i:7;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;}';

        qucreative_import_demo_update_widget($option_name,$option_value);


        $option_name = 'widget_antfarm_search';
        $option_value = 'a:3:{i:2;a:3:{s:5:"title";s:14:"Search Website";s:11:"button_text";s:6:"Search";s:20:"heading_style_button";s:0:"";}i:3;a:3:{s:5:"title";s:0:"";s:11:"button_text";s:0:"";s:20:"heading_style_button";s:0:"";}s:12:"_multiwidget";i:1;}';

        qucreative_import_demo_update_widget($option_name,$option_value);


        $option_name = 'widget_antfarm_categories';
        $option_value = 'a:3:{i:2;a:2:{s:5:"title";s:15:"Blog Categories";s:3:"cat";a:4:{i:0;s:1:"3";i:1;s:1:"4";i:2;s:1:"6";i:3;s:1:"5";}}i:3;a:2:{s:5:"title";s:10:"CATEGORIES";s:3:"cat";a:6:{i:0;s:1:"3";i:1;s:1:"4";i:2;s:1:"6";i:3;s:1:"8";i:4;s:1:"7";i:5;s:1:"5";}}s:12:"_multiwidget";i:1;}';

        qucreative_import_demo_update_widget($option_name,$option_value);


        $option_name = 'widget_antfarm_latest_posts';
        $option_value = 'a:2:{i:2;a:3:{s:5:"title";s:11:"Latest News";s:5:"count";s:1:"2";s:15:"thumb_dimension";s:0:"";}s:12:"_multiwidget";i:1;}';

        qucreative_import_demo_update_widget($option_name,$option_value);


        $option_name = 'widget_antfarm_social';
        $option_value = 'a:3:{i:2;a:2:{s:5:"title";s:16:"Social Platforms";s:8:"repeater";s:188:"[{"title":"Like us on Facebook","link":"#","icon":"facebook"},{"title":"Follow us on pinterest","link":"#","icon":"pinterest"},{"title":"Follow us on Twitter","link":"#","icon":"twitter"}]";}i:3;a:2:{s:5:"title";s:12:"SOCIAL LINKS";s:8:"repeater";s:151:"[{"title":"Facebook","link":"#","icon":"facebook"},{"title":"Twitter","link":"#","icon":"twitter"},{"title":"Instagram","link":"#","icon":"instagram"}]";}s:12:"_multiwidget";i:1;}';

        qucreative_import_demo_update_widget($option_name,$option_value);


        $option_name = 'widget_antfarm_workinghours';
        $option_value = 'a:2:{i:2;a:3:{s:5:"title";s:10:"RESTAURANT";s:10:"small_desc";s:134:"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla in eleifend enim. Nam eu porttitor elit. Phasellus vel ultricies neque.";s:8:"repeater";s:91:"[{"title":"MONDAY - SATURDAY","time":"09AM - 9PM"},{"title":"SUNDAY","time":"11AM - 10PM"}]";}s:12:"_multiwidget";i:1;}';

        qucreative_import_demo_update_widget($option_name,$option_value);


        $option_name = 'widget_antfarm_lightboxgallery';
        $option_value = 'a:2:{i:2;a:3:{s:5:"title";s:10:"RESTAURANT";s:10:"small_desc";s:134:"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla in eleifend enim. Nam eu porttitor elit. Phasellus vel ultricies neque.";s:8:"repeater";s:91:"[{"title":"MONDAY - SATURDAY","time":"09AM - 9PM"},{"title":"SUNDAY","time":"11AM - 10PM"}]";}s:12:"_multiwidget";i:1;}';

        qucreative_import_demo_update_widget($option_name,$option_value);








        $option_name = 'widget_calendar';
        $option_value = 'a:3:{i:2;a:1:{s:5:"title";s:8:"Calendar";}i:3;a:1:{s:5:"title";s:8:"Calendar";}s:12:"_multiwidget";i:1;}';

        qucreative_import_demo_update_widget($option_name,$option_value);






        $option_name = 'widget_meta';
        $option_value = 'a:2:{i:3;a:1:{s:5:"title";s:4:"Meta";}s:12:"_multiwidget";i:1;}';

        qucreative_import_demo_update_widget($option_name,$option_value);






        $option_name = 'widget_archives';
        $option_value = 'a:2:{i:3;a:3:{s:5:"title";s:8:"Archives";s:5:"count";i:0;s:8:"dropdown";i:0;}s:12:"_multiwidget";i:1;}';

        qucreative_import_demo_update_widget($option_name,$option_value);


















        $ser_data = 'a:46:{s:14:"portfolio_page";s:0:"";s:11:"mail_method";s:7:"wp_mail";s:12:"blur_ammount";s:1:"0";s:23:"menu_enviroment_opacity";s:2:"30";s:26:"content_enviroment_opacity";s:3:"100";s:24:"secondary_content_height";s:3:"400";s:13:"gmaps_api_key";s:0:"";s:13:"content_align";s:19:"content-align-right";s:16:"page_title_align";s:21:"page-title-align-left";s:16:"page_title_style";s:18:"page-title-style-2";s:12:"width_column";s:2:"60";s:9:"width_gap";s:2:"30";s:17:"width_blur_margin";s:1:"0";s:16:"width_section_bg";s:2:"70";s:24:"content_add_extra_pixels";s:0:"";s:12:"border_width";s:1:"0";s:12:"border_color";s:7:"#ffffff";s:9:"menu_type";s:12:"menu-type-11";s:14:"menu_is_sticky";s:3:"off";s:28:"menu_horizontal_shadow_style";s:4:"none";s:12:"social_icons";s:167:"[{"link":"#","icon":"facebook-square"},{"link":"#","icon":"pinterest"},{"link":"#","icon":"twitter"},{"link":"#","icon":"google-plus"},{"link":"#","icon":"instagram"}]";s:23:"meta_options_post_types";b:0;s:4:"logo";s:'.strlen($logo_url_mountain_resort).':"'.$logo_url_mountain_resort.'";s:6:"logo_x";s:7:"default";s:13:"logo_x_custom";s:0:"";s:6:"logo_y";s:7:"default";s:10:"logo_width";s:0:"";s:11:"logo_height";s:0:"";s:13:"logo_y_custom";s:0:"";s:17:"copyright_textbox";s:14:"ANTFARM THEMES";s:31:"copyright_textbox_heading_style";s:9:"h-group-1";s:38:"footer_copyright_textbox_heading_style";s:2:"h6";s:9:"font_data";s:3860:"headings_font=Quattrocento&h1_weight=700&h1_size=70&h1_line_height=1.15&h1_responsive_slider=0&h2_weight=700&h2_size=50&h2_line_height=1.15&h2_responsive_slider=0&h3_weight=700&h3_size=40&h3_line_height=1.15&h3_responsive_slider=0&h4_weight=700&h4_size=30&h4_line_height=1.15&h4_responsive_slider=0&h5_weight=700&h5_size=20&h5_line_height=1.15&h5_responsive_slider=0&h6_weight=700&h6_size=15&h6_line_height=1.57&h6_responsive_slider=0&h-group-1_weight=700&h-group-1_size=11&h-group-1_line_height=1.54&h-group-1_responsive_slider=0&h-group-2_weight=700&h-group-2_size=25&h-group-2_line_height=1.28&h-group-2_responsive_slider=0&body_font=Raleway&p_weight=regular&p_size=14&p_line_height=2&p_color=%23777777&p_color_for_light=%23bbbbbb&hyperlink_weight=700&font-group-1_weight=700&font-group-1_size=15&font-group-1_line_height=1.42&font-group-2_weight=600&font-group-2_size=15&font-group-2_line_height=1.42&font-group-3_weight=600&font-group-3_size=11&font-group-3_line_height=1.27&font-group-4_weight=700&font-group-4_size=14&font-group-4_line_height=1.42&font-group-5_weight=600&font-group-5_size=14&font-group-5_line_height=1.42&font-group-6_weight=regular&font-group-6_size=14&font-group-6_line_height=1.46&font-group-7_weight=500&font-group-7_size=11&font-group-7_line_height=1.46&font-group-8_weight=600&font-group-8_size=14&font-group-8_line_height=1.46&font-group-9_weight=regular&font-group-9_size=16&font-group-9_line_height=1.8&font-group-10_weight=600&font-group-10_size=17&font-group-10_line_height=1.68&font-group-11_weight=800&font-group-11_size=24&font-group-11_line_height=1.29&font-group-12_weight=600&font-group-12_size=13&font-group-12_line_height=1.46&blockquote_weight=600&blockquote_size=18&blockquote_line_height=1.58&menu_font=Quattrocento&menu_weight=700&menu_size=40&menu_line_height=1&copyright_font_link_to=headings&copyright_weight=700&copyright_size=10&copyright_line_height=1.4&page_title_font=Quattrocento&page_title_weight=700&page_title_size=70&page_title_line_height=1&page_title_color=%23ffffff&page_title_responsive_slider=0&page_title_orientation=horizontal&section_title_two_font=Great+Vibes&section_title_two_first_weight=regular&section_title_two_first_size=70&section_title_two_first_line_height=1&section_title_two_first_color=%23222222&section_title_two_first_color_for_light=%23ffffff&section_title_two_first_responsive_slider=0&section_title_two_second_font=Raleway&section_title_two_second_weight=regular&section_title_two_second_size=15&section_title_two_second_line_height=1&section_title_two_second_color=%23999999&section_title_two_second_color_for_light=%23ffffff&section_title_two_second_responsive_slider=0&line_spacing=4&section_title_two_number_font=Lato&section_title_two_number_weight=900&section_title_two_number_size=130&section_title_two_number_line_height=1&section_title_two_number_color=%23eeeeee&section_title_two_number_color_for_light=%23444444&section_title_two_divider_enable=on&section_title_two_divider_divider_style=style-fullwidth&section_title_two_divider_color=%23444444&section_title_two_divider_color_for_light=%23ffffff&title_divider_spacing_two=20&section_title_one_first_font=Lato&section_title_one_first_weight=900&section_title_one_first_size=25&section_title_one_first_line_height=1.28&section_title_one_first_color=%23444444&section_title_one_first_color_for_light=%23ffffff&section_title_one_first_responsive_slider=0&section_title_one_divider_divider_style=style-fullwidth&section_title_one_divider_color=%23444444&section_title_one_divider_color_for_light=%23ffffff&title_divider_spacing=20&home_slider_font_link_to=headings&home_slider_weight=regular&home_slider_size=50&home_slider_line_height=1.20&home_slider_color=%23ffffff&home_slider_color_for_light=%23222222&home_number_font_link_to=headings&home_number_weight=regular&home_number_size=135&home_number_line_height=1";s:32:"typography_sidebar_heading_style";s:2:"h5";s:31:"typography_footer_heading_style";s:2:"h5";s:24:"content_enviroment_style";s:16:"body-style-light";s:17:"greyscale_ammount";s:1:"0";s:21:"section_margin_bottom";s:2:"30";s:15:"highlight_color";s:7:"#aacc20";s:22:"enable_bordered_design";s:2:"on";s:23:"enable_native_scrollbar";s:2:"on";s:13:"bg_transition";s:9:"slidedown";s:11:"enable_ajax";s:2:"on";s:13:"bg_isparallax";s:3:"off";s:18:"custom_css_post_id";i:1581;s:18:"nav_menu_locations";a:2:{s:7:"primary";i:'.$menu_id.';s:6:"social";i:0;}}';





        qucreative_import_demo_update_preset($ser_data,array(

            'preseter_slug' => $demo_slug,
            'preseter_name' => $demo_name,
        ));















}































$demo_slug = 'models-agency';
$demo_name = 'Models Agency';
if($_REQUEST['demo']==$demo_slug) {














    $img_name = '500x500.jpg';
    $img_url = QUCREATIVE_THEME_URL . 'placeholders/500x500.jpg';


    $img_path = QUCREATIVE_THEME_DIR . 'placeholders/500x500.jpg';


    $new_path = $upload_dir_path . '/' . $img_name;

    try {

        if (!copy($img_path, $new_path)) {

        } else {
            $img_url = $upload_dir_url . '/' . $img_name;
            $new_path = $img_path;
        }
    } catch (Exception $e) {
        print_rr($e);
    }





    $term = get_term_by('slug', 'female-models', $taxonomy);




    if ($term) {

    } else {

        if ($debug) {
        } else {

            $term = wp_insert_term('Female Models', $taxonomy, array(
                'description' => '',
                'slug' => 'female-models',

            ));

        }
    }


    if(is_array($term)){

        $term_id = $term['term_id'];
    }else{

        $term_id = $term->term_id;
    }

        $args = array(

            'post_title' => 'Nina O',
            'post_content' => '',
            'post_status' => 'publish',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
        );


        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'Jackie L ',
            'post_content' => '',
            'post_status' => 'publish',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'Maria H ',
            'post_content' => '',
            'post_status' => 'publish',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'Sonya J ',
            'post_content' => '',
            'post_status' => 'publish',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'Mona C ',
            'post_content' => '',
            'post_status' => 'publish',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'Laura K ',
            'post_content' => '',
            'post_status' => 'publish',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'Tina B ',
            'post_content' => '',
            'post_status' => 'publish',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'Lisa H ',
            'post_content' => '',
            'post_status' => 'publish',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'Summer O ',
            'post_content' => '',
            'post_status' => 'publish',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);












	$term = qucreative_import_demo_create_term_if_it_does_not_exist(array(
		'description' => '',
		'term_name' => 'Male Models',
		'slug' => 'male-models',
		'taxonomy' => $taxonomy,

	));


	if (is_array($term)) {

		$term_id = $term['term_id'];
	} else {

		$term_id = $term->term_id;
	}




        $args = array(

            'post_title' => 'John P ',
            'post_content' => '',
            'post_status' => 'publish',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);



        $args = array(

            'post_title' => 'Nick K ',
            'post_content' => '',
            'post_status' => 'publish',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);



        $args = array(

            'post_title' => 'Jack V',
            'post_content' => '',
            'post_status' => 'publish',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);



        $args = array(

            'post_title' => 'Rob C ',
            'post_content' => '',
            'post_status' => 'publish',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);



        $args = array(

            'post_title' => 'Andy H ',
            'post_content' => '',
            'post_status' => 'publish',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);



        $args = array(

            'post_title' => 'Viktor L ',
            'post_content' => '',
            'post_status' => 'publish',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);



        $args = array(

            'post_title' => 'Pete D ',
            'post_content' => '',
            'post_status' => 'publish',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);



        $args = array(

            'post_title' => 'Vladimir Q ',
            'post_content' => '',
            'post_status' => 'publish',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);










































        $cont = '[vc_section shape=""  style="dark"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="AGENCY" line1="Agency" line2="our agency has the best fashion models"][/vc_column][/vc_row][vc_row][vc_column][antfarm_image_box media="'.$img_url.'" aligment="left" text_aligment="text-align-center" heading="THE ULTIMATE MODELS" heading_style="h5"]Nam id dolor eget metus consectetur scelerisque. Curabitur lobortis felis varius porta congue. Proin vel convallis orci. Integer iaculis vitae erat sed efficitur mauris phaellis certimat, faris euforia.

[antfarm_button style="style-black" padding="" rounded="rounded" the_icon=""]Read more[/antfarm_button][/antfarm_image_box][antfarm_image_box media="'.$img_url.'" aligment="right" text_aligment="text-align-center" heading="HIGHLY SKILLED PROFESSIONALS" heading_style="h5"]Nam id dolor eget metus consectetur scelerisque. Curabitur lobortis felis varius porta congue. Proin vel convallis orci. Integer iaculis vitae erat sed efficitur mauris phaellis certimat, faris euforia.

[antfarm_button style="style-black" padding="" rounded="rounded" the_icon=""]Read more[/antfarm_button][/antfarm_image_box][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_sc_testimonials media="'.$img_url.'" overlay_opacity="50" tests="%5B%7B%22title%22%3A%22TESTIMONIALS%22%2C%22name%22%3A%22James%20Williams%22%2C%22position%22%3A%22CCO%20at%20Orange%20Studios%22%2C%22the_test%22%3A%22Nunc%20sed%20orci%20vel%20nunc%20maximus%20maximus%20in%20id%20ex.%20Nulla%20a%20velit%20eget%20magna%20ultrices%20convallis.%20Phasellus%20bibendum%20luctus%20orci%20sit%20amet%20dapibus.%20Fusce%20turpis%20nisl%2C%20fermentum%20non%20libero%20eu%2C%20facilisis%20mau.%22%7D%2C%7B%22title%22%3A%22TESTIMONIALS%22%2C%22name%22%3A%22Francis%20Benneton%22%2C%22position%22%3A%22CCO%20at%20Tuarec%22%2C%22the_test%22%3A%22Lorem%20ipsum%20dolor%20sit%20amet%2C%20consectetur%20adipiscing%20elit.%20Aliquam%20consectetur%20metus%20nisi%2C%20eget%20tristique%20purus%20tristique%20sed.%20Mauris%20dignissim%20mi%20scelerisque%20sem%20varius%2C%20at%20molestie%20ante%20mollis.%22%7D%2C%7B%22title%22%3A%22TESTIMONIALS%22%2C%22name%22%3A%22Jessica%20Oliver%22%2C%22position%22%3A%22Designer%20at%20News%20Facts%22%2C%22the_test%22%3A%22Vivamus%20dapibus%20justo%20sit%20amet%20nibh%20dignissim%2C%20eget%20faucibus%20arcu%20auctor.%20Integer%20scelerisque%20nisi%20non%20tincidunt%20rutrum.%20Vestibulum%20ultrices%20at%20neque%20eget%20tincidunt.%20Quisque%20quis%20tinci%20mauris%20etiquet.%22%7D%5D"][/vc_column][/vc_row][/vc_section][vc_section shape="" type="image" style="dark"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="CATWALK" line1="Catwalk" line2="professionalism defines our models"][/vc_column][/vc_row][vc_row][vc_column width="1/2"][vc_column_text]
<h5>VESTIBULUM PELLENTESQUE PORTA</h5>
[antfarm_divider height="30" style="style-1"][/antfarm_divider]

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent in lacus dapibus, facilisis ipsum vel, vehicula dui. Ut at mi rutrum, scelerisque eros ac, consequat ante. Proin congue leo sed pharetra sollicitudin. Sed tincidunt eu ante ut dapibus. Maecenas dui eros, consequat feugiat ante in, ornare vulputate augue mauris certimus.[/vc_column_text][/vc_column][vc_column width="1/2"][vc_column_text]
<h5>MAECENAS PELLENTESQUE DIAM ERAT</h5>
[antfarm_divider height="30" style="style-1"][/antfarm_divider]

Nunc est ligula, vehicula blandit odio sed, ornare viverra mauris. Suspendisse convallis blandit pulvinar. Fusce venenatis diam et libero varius vehicula. Suspendisse commodo ac ipsum dictum vulputate. Praesent lectus ligula, ultrices non nunc in, luctus pharetra metus. Cras felis metus, faucibus ac sem sit amet, fermentum vehicula mi.[/vc_column_text][/vc_column][/vc_row][vc_row][vc_column][antfarm_video_player media="https://vimeo.com/18433850" video_cover="27"][vc_empty_space height="20px"][antfarm_client_list titles="%5B%7B%22media%22%3A%22http%3A%2F%2Fcreativewpthemes.net%2Fmain-demo%2Fmodels-agency%2Fwp-content%2Fuploads%2Fsites%2F4%2F2017%2F04%2Fclient6.png%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22media%22%3A%22http%3A%2F%2Fcreativewpthemes.net%2Fmain-demo%2Fmodels-agency%2Fwp-content%2Fuploads%2Fsites%2F4%2F2017%2F04%2Fclient5.png%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22media%22%3A%22http%3A%2F%2Fcreativewpthemes.net%2Fmain-demo%2Fmodels-agency%2Fwp-content%2Fuploads%2Fsites%2F4%2F2017%2F04%2Fclient4.png%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22media%22%3A%22http%3A%2F%2Fcreativewpthemes.net%2Fmain-demo%2Fmodels-agency%2Fwp-content%2Fuploads%2Fsites%2F4%2F2017%2F04%2Fclient3.png%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22media%22%3A%22http%3A%2F%2Fcreativewpthemes.net%2Fmain-demo%2Fmodels-agency%2Fwp-content%2Fuploads%2Fsites%2F4%2F2017%2F04%2Fclient2.png%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22media%22%3A%22http%3A%2F%2Fcreativewpthemes.net%2Fmain-demo%2Fmodels-agency%2Fwp-content%2Fuploads%2Fsites%2F4%2F2017%2F04%2Fclient1.png%22%2C%22link%22%3A%22%23%22%7D%5D"][antfarm_separator style="style-2" is_style_black="off"][/vc_column][/vc_row][/vc_section][vc_section shape="" type="image" style="dark"][vc_row][vc_column][antfarm_sc_blockquote bg="'.$img_url.'" overlay_opacity="50" author="STEVE JOBS"]
<h4>Design is not just what it looks like and feels like. Design is how it works.</h4>
[/antfarm_sc_blockquote][/vc_column][/vc_row][/vc_section][vc_section shape="" type="image" style="dark"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="MODELS" line1="Models" line2="let us help you improve your image"][/vc_column][/vc_row][vc_row][vc_column width="1/2"][vc_column_text]
<h4>Male Models</h4>
[/vc_column_text][antfarm_portfolio skin="skin-gazelia skin-gazelia--transparent" zfolio-mode="mode-normal" link_whole_item="zoombox" gap="0" cat="male-models" responsive_fallback_mobile="dzs-layout--2-cols" hide_title="on" layout="dzs-layout--3-cols"][/vc_column][vc_column width="1/2"][vc_column_text]
<h4>Female Models</h4>
[/vc_column_text][antfarm_portfolio skin="skin-gazelia skin-gazelia--transparent" zfolio-mode="mode-normal" link_whole_item="zoombox" gap="0" cat="female-models" responsive_fallback_mobile="dzs-layout--2-cols" hide_title="on" layout="dzs-layout--3-cols"][/vc_column][/vc_row][vc_row][vc_column width="1/3"][antfarm_bullet_feature style="style-3" feature="et" icon_aligment="" title="Phasellus interdum" eticon="icon-heart" heading="h5"]Lorem ipsum dolor sit amet, mauris consectetur adipiscing elit. Nullam a orci in enim elementum aliquet.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-3" feature="et" icon_aligment="" title="Aenean posuere arcu" eticon="icon-hourglass" heading="h5"]Maecenas feugiat malesuada fringilla. Suspendisse fringilla augue sed erat vulputate, vel iaculis lorem vestib.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-3" feature="et" icon_aligment="" title="Duis eu velit venenatis" eticon="icon-flag" heading="h5"]Praesent sit amet porttitor est. Praesent condimentum vitae justo id euismod. Nunc gravida nunc et lacina.[/antfarm_bullet_feature][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_sc_call_to_action bg="118" overlay_opacity="50" title="Do you want to become a model?" read_more_text="Read More" read_more_link="#" button_style="{``style``:``style-black``,``padding``:````,``rounded``:``rounded``}" box_width="720"]Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque ullamcorper tortor turpis, id ullamcorper diam venenatis vel. Interdum et menuati lorem opsum, certaimua mauris phaellis menuare nunc velittatis vestibulum estef.[/antfarm_sc_call_to_action][/vc_column][/vc_row][/vc_section][vc_section shape="" type="image"   style="dark"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="SERVICES" line1="Services" line2="we provide our clients high quality services"][/vc_column][/vc_row][vc_row][vc_column width="1/3"][antfarm_service_lightbox title="Phasellus interdum" content_main="Lorem ipsum dolor sit amet, mauris consectetur adipiscing elit. Nullam a orci in enim elementum aliquet." icon="icon-lightbulb" columns="2" title_lightbox="Phasellus interdum" title_1="OUR MODELS HAVE REACHED PHYSICAL PERFECTION" content_1="In augue sapien, placerat eget varius ut, venenatis non neque. Nunc risus est, lacinia vel dolor et, lacinia gravida nunc. Phasellus aliquam fringilla felis, a dignissim nulla aliquet et. Proin ligula urna, commodo vitae orci ut, rutrum congue neque. Maecenas vestibulum feugiat est. Etiam placerat facilisis enim, sit amet condimentum massa vestibulum sit amet. Vivamus eleifend quam vel nunc vehicula iaculis. Vivamus lobortis eget est at ullamcorper. Donec finibus posuere lacus vitae fermentum. Sed non vestibulum lectus. Mauris faucibus odio eget interdum vestibulum." heading_style="h5" title_2="OUR MODELS ARE HIGHLY TRAINED PROFESSIONALS" content_2="Pellentesque vel eros a ex porttitor tincidunt vitae ac enim. Fusce et nisl pharetra, pellentesque massa id, mollis nisl. Proin ullamcorper enim magna, ac egestas sem efficitur a. Etiam rhoncus hendrerit viverra. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam non purus nulla. Quisque nec finibus risus. Quisque ultrices ligula sem, non faucibus erat venenatis et. Interdum et malesuada fames ac ante ipsum primis in faucibus. Phasellus dapibus, odio at blandit blandit, ante nibh lobortis sem, at efficitur elit est vel libero. Ut venenatis ac nisi ac egestas."][/vc_column][vc_column width="1/3"][antfarm_service_lightbox title="Lorem ipsum" content_main="Lorem ipsum dolor sit amet, mauris consectetur adipiscing elit. Nullam a orci in enim elementum aliquet." icon="icon-megaphone" columns="1" title_lightbox="Lorem ipsum" title_1="OUR TEAM IS MADE OF PROS" content_1="Pellentesque vel eros a ex porttitor tincidunt vitae ac enim. Fusce et nisl pharetra, pellentesque massa id, mollis nisl. Proin ullamcorper enim magna, ac egestas sem efficitur a. Etiam rhoncus hendrerit viverra. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam non purus nulla. Quisque nec finibus risus. Quisque ultrices ligula sem, non faucibus erat venenatis et. Interdum et malesuada fames ac ante ipsum primis in faucibus. Phasellus dapibus, odio at blandit blandit, ante nibh lobortis sem, at efficitur elit est vel libero. Ut venenatis ac nisi ac egestas." heading_style="h5"][vc_empty_space height="30px"][antfarm_service_lightbox title="Maximus magna" content_main="Lorem ipsum dolor sit amet, mauris consectetur adipiscing elit. Nullam a orci in enim elementum aliquet." icon="icon-magnifying-glass" columns="2" title_lightbox="Maximus magna" title_1="DON\'T HESITATE, THERE\'S NO ONE BETTER THAN US" content_1="In augue sapien, placerat eget varius ut, venenatis non neque. Nunc risus est, lacinia vel dolor et, lacinia gravida nunc. Phasellus aliquam fringilla felis, a dignissim nulla aliquet et. Proin ligula urna, commodo vitae orci ut, rutrum congue neque. Maecenas vestibulum feugiat est. Etiam placerat facilisis enim, sit amet condimentum massa vestibulum sit amet. Vivamus eleifend quam vel nunc vehicula iaculis. Vivamus lobortis eget est at ullamcorper. Donec finibus posuere lacus vitae fermentum. Sed non vestibulum lectus. Mauris faucibus odio eget interdum vestibulum." heading_style="h5" title_2="DELIVERING THE BEST SERVICES SINCE 1994" content_2="Pellentesque vel eros a ex porttitor tincidunt vitae ac enim. Fusce et nisl pharetra, pellentesque massa id, mollis nisl. Proin ullamcorper enim magna, ac egestas sem efficitur a. Etiam rhoncus hendrerit viverra. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam non purus nulla. Quisque nec finibus risus. Quisque ultrices ligula sem, non faucibus erat venenatis et. Interdum et malesuada fames ac ante ipsum primis in faucibus. Phasellus dapibus, odio at blandit blandit, ante nibh lobortis sem, at efficitur elit est vel libero. Ut venenatis ac nisi ac egestas."][/vc_column][vc_column width="1/3"][antfarm_service_lightbox title="Mauris certimus" content_main="Lorem ipsum dolor sit amet, mauris consectetur adipiscing elit. Nullam a orci in enim elementum aliquet." icon="icon-pricetags" columns="2" title_lightbox="Mauris certimus" title_1="WE HAVE THE HIGHEST STANDARDS" content_1="Pellentesque vel eros a ex porttitor tincidunt vitae ac enim. Fusce et nisl pharetra, pellentesque massa id, mollis nisl. Proin ullamcorper enim magna, ac egestas sem efficitur a. Etiam rhoncus hendrerit viverra. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam non purus nulla. Quisque nec finibus risus. Quisque ultrices ligula sem, non faucibus erat venenatis et. Interdum et malesuada fames ac ante ipsum primis in faucibus. Phasellus dapibus, odio at blandit blandit, ante nibh lobortis sem, at efficitur elit est vel libero. Ut venenatis ac nisi ac egestas." heading_style="h5" title_2="DELIVERING NOTHING BUT THE BEST" content_2="In augue sapien, placerat eget varius ut, venenatis non neque. Nunc risus est, lacinia vel dolor et, lacinia gravida nunc. Phasellus aliquam fringilla felis, a dignissim nulla aliquet et. Proin ligula urna, commodo vitae orci ut, rutrum congue neque. Maecenas vestibulum feugiat est. Etiam placerat facilisis enim, sit amet condimentum massa vestibulum sit amet. Vivamus eleifend quam vel nunc vehicula iaculis. Vivamus lobortis eget est at ullamcorper. Donec finibus posuere lacus vitae fermentum. Sed non vestibulum lectus. Mauris faucibus odio eget interdum vestibulum."][/vc_column][/vc_row][/vc_section]';





        $args = array(
            'post_title'    => wp_strip_all_tags( 'Qu '.$demo_name ),
            'post_content'  => $cont,
            'post_status'   => 'publish',
            'post_author'   => 1,
            'post_type'   => 'page',

        );


        $page_id = wp_insert_post( $args );





        update_post_meta(  $page_id ,'qucreative_'.'meta_custom_section_margin_bottom','0');
        update_post_meta(  $page_id ,'qucreative_'.'meta_content_starts_at','pixel-position');
        update_post_meta(  $page_id ,'qucreative_'.'meta_content_starts_at_pixel','0');
        update_post_meta(  $page_id ,'qucreative_'.'meta_scrollbar_theme','light');
        update_post_meta(  $page_id ,'qucreative_'.'meta_custom_title',' ');
        update_post_meta(  $page_id ,'qucreative_'.'meta_bg_image',$img_url);












        update_option( 'page_on_front', $page_id );
        update_option( 'show_on_front', 'page' );















        $option_name = 'sidebars_widgets';
        $option_value = 'a:4:{s:19:"wp_inactive_widgets";a:0:{}s:9:"sidebar-1";a:5:{i:0;s:14:"recent-posts-2";i:1;s:17:"recent-comments-2";i:2;s:10:"archives-2";i:3;s:12:"categories-2";i:4;s:6:"meta-2";}s:14:"sidebar-footer";a:4:{i:0;s:6:"text-3";i:1;s:15:"antfarm_links-2";i:2;s:15:"antfarm_links-3";i:3;s:17:"antfarm_contact-2";}s:13:"array_version";i:3;}';





        qucreative_import_demo_update_widget($option_name,$option_value);






        $option_name = 'widget_recent-comments';
        $option_value = 'a:2:{i:2;a:2:{s:5:"title";s:0:"";s:6:"number";i:5;}s:12:"_multiwidget";i:1;}';

        qucreative_import_demo_update_widget($option_name,$option_value);




        $option_name = 'widget_text';
        $option_value = 'a:3:{i:1;a:0:{}i:2;a:3:{s:5:"title";s:5:"About";s:4:"text";s:141:"Duis nec nulla turpis. Nulla lacinia laoreet odio, non lacinia nisse felimml malesuada vel. Aenean malesuada imense fermentum motivi par que.";s:6:"filter";b:0;}s:12:"_multiwidget";i:1;}';

        qucreative_import_demo_update_widget($option_name,$option_value);






        $option_name = 'widget_recent-posts';
        $option_value = 'a:2:{i:2;a:2:{s:5:"title";s:0:"";s:6:"number";i:5;}s:12:"_multiwidget";i:1;}';

        qucreative_import_demo_update_widget($option_name,$option_value);




        $option_name = 'widget_text';
        $option_value = 'a:3:{i:1;a:0:{}i:3;a:4:{s:5:"title";s:5:"About";s:4:"text";s:141:"Duis nec nulla turpis. Nulla lacinia laoreet odio, non lacinia nisse felimml malesuada vel. Aenean malesuada imense fermentum motivi par que.";s:6:"filter";b:1;s:6:"visual";b:1;}s:12:"_multiwidget";i:1;}';

        qucreative_import_demo_update_widget($option_name,$option_value);

        $option_name = 'widget_antfarm_links';
        $option_value = 'a:3:{i:2;a:2:{s:5:"title";s:11:"The Company";s:8:"repeater";s:167:"[{"title":"Company history","link":"#"},{"title":"The creative team","link":"#"},{"title":"Internation awards","link":"#"},{"title":"Highest rated models","link":"#"}]";}i:3;a:2:{s:5:"title";s:6:"Models";s:8:"repeater";s:152:"[{"title":"Male models","link":"#"},{"title":"Female models","link":"#"},{"title":"Choldren models","link":"#"},{"title":"Plus size models","link":"#"}]";}s:12:"_multiwidget";i:1;}';

        qucreative_import_demo_update_widget($option_name,$option_value);


        $option_name = 'widget_antfarm_contact';
        $option_value = 'a:2:{i:2;a:4:{s:5:"title";s:7:"Contact";s:7:"address";s:38:"3506 Beverly Hills 780<br>CA 5609, USA";s:9:"telephone";s:32:"044 569 450 45<br>044 407 695 45";s:5:"email";s:20:"creative@qutheme.com";}s:12:"_multiwidget";i:1;}';

        qucreative_import_demo_update_widget($option_name,$option_value);



















        $ser_data = 'a:46:{s:14:"portfolio_page";s:0:"";s:11:"mail_method";s:7:"wp_mail";s:12:"blur_ammount";s:1:"0";s:23:"menu_enviroment_opacity";s:2:"30";s:26:"content_enviroment_opacity";s:3:"100";s:24:"secondary_content_height";s:3:"400";s:13:"gmaps_api_key";s:0:"";s:13:"content_align";s:20:"content-align-center";s:16:"page_title_align";s:22:"page-title-align-right";s:16:"page_title_style";s:18:"page-title-style-2";s:12:"width_column";s:2:"60";s:9:"width_gap";s:2:"30";s:17:"width_blur_margin";s:2:"30";s:16:"width_section_bg";s:2:"50";s:12:"border_width";s:1:"0";s:12:"border_color";s:7:"#ffffff";s:9:"menu_type";s:12:"menu-type-12";s:14:"menu_is_sticky";s:3:"off";s:28:"menu_horizontal_shadow_style";s:4:"none";s:12:"social_icons";s:2:"[]";s:23:"meta_options_post_types";b:0;s:4:"logo";s:'.strlen($logo_url_models_agency).':"'.$logo_url_models_agency.'";s:6:"logo_x";s:7:"default";s:13:"logo_x_custom";s:0:"";s:6:"logo_y";s:7:"default";s:10:"logo_width";s:0:"";s:11:"logo_height";s:0:"";s:13:"logo_y_custom";s:0:"";s:17:"copyright_textbox";s:0:"";s:31:"copyright_textbox_heading_style";s:9:"h-group-1";s:38:"footer_copyright_textbox_heading_style";s:2:"h6";s:9:"font_data";s:3924:"headings_font=Abril+Fatface&h1_weight=regular&h1_size=70&h1_line_height=1.15&h1_responsive_slider=20&h2_weight=regular&h2_size=50&h2_line_height=1.15&h2_responsive_slider=15&h3_weight=regular&h3_size=40&h3_line_height=1.15&h3_responsive_slider=10&h4_weight=regular&h4_size=30&h4_line_height=1.15&h4_responsive_slider=10&h5_weight=regular&h5_size=21&h5_line_height=1.4&h5_responsive_slider=0&h6_weight=regular&h6_size=15&h6_line_height=1.57&h6_responsive_slider=0&h-group-1_weight=regular&h-group-1_size=11&h-group-1_line_height=1.54&h-group-1_responsive_slider=0&h-group-2_weight=regular&h-group-2_size=25&h-group-2_line_height=1.28&h-group-2_responsive_slider=0&body_font=Merriweather&p_weight=regular&p_size=13&p_line_height=1.98&p_color=%23aaaaaa&p_color_for_light=%23bbbbbb&hyperlink_weight=700&font-group-1_weight=700italic&font-group-1_size=15&font-group-1_line_height=1.42&font-group-2_weight=700&font-group-2_size=15&font-group-2_line_height=1.42&font-group-3_weight=700italic&font-group-3_size=12&font-group-3_line_height=1.27&font-group-4_weight=italic&font-group-4_size=15&font-group-4_line_height=1.42&font-group-5_weight=700&font-group-5_size=15&font-group-5_line_height=1.42&font-group-6_weight=regular&font-group-6_size=14&font-group-6_line_height=1.53&font-group-7_weight=italic&font-group-7_size=14&font-group-7_line_height=1.46&font-group-8_weight=700&font-group-8_size=14&font-group-8_line_height=1.46&font-group-9_weight=700&font-group-9_size=15&font-group-9_line_height=1.8&font-group-10_weight=700&font-group-10_size=17&font-group-10_line_height=1.68&font-group-11_weight=900&font-group-11_size=25&font-group-11_line_height=1.29&font-group-12_weight=regular&font-group-12_size=13&font-group-12_line_height=1.46&blockquote_weight=700italic&blockquote_size=17&blockquote_line_height=1.70&menu_font=Merriweather&menu_weight=700&menu_size=40&menu_line_height=1&copyright_font_link_to=headings&copyright_weight=regular&copyright_size=10&copyright_line_height=1.4&page_title_font=Abril+Fatface&page_title_weight=regular&page_title_size=70&page_title_line_height=1&page_title_color=%23FFFFFF&page_title_responsive_slider=0&page_title_orientation=horizontal&section_title_two_font=Abril+Fatface&section_title_two_first_weight=regular&section_title_two_first_size=80&section_title_two_first_line_height=1&section_title_two_first_color=%23222222&section_title_two_first_color_for_light=%23ffffff&section_title_two_first_responsive_slider=20&section_title_two_second_font=Great+Vibes&section_title_two_second_weight=regular&section_title_two_second_size=30&section_title_two_second_line_height=1&section_title_two_second_color=%23777777&section_title_two_second_color_for_light=%23777777&section_title_two_second_responsive_slider=0&line_spacing=15&section_title_two_number_font=Abril+Fatface&section_title_two_number_weight=regular&section_title_two_number_size=140&section_title_two_number_line_height=0.9&section_title_two_number_color=%23333333&section_title_two_number_color_for_light=%23333333&section_title_two_divider_divider_style=style-fullwidth&section_title_two_divider_color=%23444444&section_title_two_divider_color_for_light=%23ffffff&title_divider_spacing_two=20&section_title_one_first_font=Lato&section_title_one_first_weight=900&section_title_one_first_size=25&section_title_one_first_line_height=1.28&section_title_one_first_color=%23444444&section_title_one_first_color_for_light=%23ffffff&section_title_one_first_responsive_slider=0&section_title_one_divider_divider_style=style-fullwidth&section_title_one_divider_color=%23444444&section_title_one_divider_color_for_light=%23ffffff&title_divider_spacing=20&home_slider_font_link_to=headings&home_slider_weight=regular&home_slider_size=50&home_slider_line_height=1.20&home_slider_color=%23ffffff&home_slider_color_for_light=%23222222&home_number_font_link_to=headings&home_number_weight=regular&home_number_size=135&home_number_line_height=1";s:32:"typography_sidebar_heading_style";s:2:"h4";s:31:"typography_footer_heading_style";s:2:"h4";s:24:"content_enviroment_style";s:15:"body-style-dark";s:17:"greyscale_ammount";s:1:"0";s:21:"section_margin_bottom";s:2:"30";s:15:"highlight_color";s:7:"#c926ff";s:22:"enable_bordered_design";s:3:"off";s:23:"enable_native_scrollbar";s:3:"off";s:13:"bg_transition";s:9:"slidedown";s:11:"enable_ajax";s:2:"on";s:13:"bg_isparallax";s:2:"on";s:18:"custom_css_post_id";i:178;s:18:"nav_menu_locations";a:2:{s:7:"primary";i:'.$menu_id.';s:6:"social";i:0;}s:24:"content_add_extra_pixels";s:2:"15";}';





        qucreative_import_demo_update_preset($ser_data,array(

            'preseter_slug' => $demo_slug,
            'preseter_name' => $demo_name,
        ));































}














































$demo_slug = 'rock-band';
$demo_name = 'Rock Band';
if($_REQUEST['demo']==$demo_slug) {














    $img_name = '500x500.jpg';
    $img_url = QUCREATIVE_THEME_URL . 'placeholders/500x500.jpg';


    $img_path = QUCREATIVE_THEME_DIR . 'placeholders/500x500.jpg';


    $new_path = $upload_dir_path . '/' . $img_name;

    try {

        if (!copy($img_path, $new_path)) {

        } else {
            $img_url = $upload_dir_url . '/' . $img_name;
            $new_path = $img_path;
        }
    } catch (Exception $e) {
        print_rr($e);
    }





    $term = get_term_by('slug', $demo_slug, $taxonomy);















	$term = qucreative_import_demo_create_term_if_it_does_not_exist(array(
		'description' => '',
		'term_name' => $demo_name,
		'slug' => $demo_slug,
		'taxonomy' => $taxonomy,

	));


	if (is_array($term)) {

		$term_id = $term['term_id'];
	} else {

		$term_id = $term->term_id;
	}



	$args = array(

            'post_title' => 'Flint ',
            'post_content' => '',
            'post_status' => 'publish',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
        );


        $port_id = qucreative_import_demo_insert_post_complete($args);





        $arr_names = array(
            'Moe',
            'Gina',
            'Syd',
            'Bob',
            'Mike',
            'Luke',
            'Jack',
            'Nick',
            'Jess',
        );



        foreach ($arr_names as $it_name){

            $args = array(

                'post_title' => $it_name,
                'post_content' => '',
                'post_status' => 'publish',
                'img_url' => $img_url,
                'img_path'=>$new_path,
                'term' => $term,
                'taxonomy' => $taxonomy,
                'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
            );

            $port_id = qucreative_import_demo_insert_post_complete($args);
        }









        $taxonomy = 'category';




	$term_vi = qucreative_import_demo_create_term_if_it_does_not_exist(array(
		'description' => '',
		'term_name' => 'Videos',
		'slug' => 'videos',
		'taxonomy' => $taxonomy,

	));



	$term_ne = qucreative_import_demo_create_term_if_it_does_not_exist(array(
		'description' => '',
		'term_name' => 'News',
		'slug' => 'news',
		'taxonomy' => $taxonomy,

	));



	$term_ev = qucreative_import_demo_create_term_if_it_does_not_exist(array(
		'description' => '',
		'term_name' => 'Events',
		'slug' => 'events',
		'taxonomy' => $taxonomy,

	));






        $args = array(

            'post_title' => 'Setting fire to the stage',
            'custom_title' => 'This is a cool featured image example',
            'qucreative_'.'meta_post_media_type' => 'vimeo',
            'qucreative_'.'meta_post_media' => 'https://vimeo.com/199855572',
            'post_content' => 'Etiam sodales blandit augue malesuada fermentum. Nam fringilla et ligula et facilisis. Vestibulum commodo nec lacus in pretium. Etiam ac bibendum purus, quis consectetur massa. Vivamus quis est ut enim sollicitudin blandit. Maecenas iaculis eget magna placerat pretium. Proin dictum mi vel lacus ultrices, ut placerat nulla tristique. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse potenti. Proin gravida justo ac sapien euismod aliquet.
<blockquote>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</blockquote>
Pellentesque eu nunc porta, elementum risus eu, lobortis nulla. Donec eget dui nec purus vehicula posuere. Ut mauris nibh, lobortis quis facilisis non, eleifend nec erat. Cras porta, dui a imperdiet suscipit, erat nulla rhoncus purus, sed faucibus nulla enim eu justo. Pellentesque sit amet turpis enim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque sed tincidunt eros, ut sodales lorem. Quisque rhoncus non nibh vel commodo. Sed tellus elit, semper a elementum sit amet, congue non sapien. Phasellus rhoncus bibendum vehicula. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque laoreet mi scelerisque, posuere odio at, condimentum lorem. Phasellus sollicitudin elit nec consequat vehicula. Suspendisse nec pellentesque tortor, et faucibus erat. Duis sem turpis, rutrum fringilla diam ac, pulvinar suscipit turpis.',
            'post_status' => 'publish',
            'post_type' => 'post',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term_vi,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);








        $args = array(

            'post_title' => 'Craziest drum solo Martin Helgif ever did',
            'custom_title' => 'This is a cool featured image example',
            'qucreative_'.'meta_post_media_type' => 'vimeo',
            'qucreative_'.'meta_post_media' => 'https://vimeo.com/47955106',
            'post_content' => 'Donec consequat est pellentesque scelerisque mattis. Nam scelerisque justo sit amet elit feugiat commodo. Nulla auctor lacus in massa rhoncus, eget interdum mauris pharetra. Aenean facilisis justo in arcu tempor, et pretium ipsum aliquet. Cras ullamcorper aliquet neque non porttitor. Curabitur et dapibus purus. Proin fringilla mattis leo, id tempus justo commodo cursus. Aenean varius tristique mauris ut imperdiet. Cras sollicitudin quis magna in porta. Suspendisse at urna purus. Etiam nec nisl sollicitudin, elementum diam blandit, bibendum mauris. Phasellus neque nisl, imperdiet vitae aliquam sit amet, luctus in mauris. Aliquam iaculis elit non dolor hendrerit, sit amet mollis ante finibus. Nulla gravida enim felis, nec ultrices augue hendrerit sed. Vivamus sodales nec mauris et ultrices.

Maecenas metus libero, molestie id diam nec, placerat mollis enim. Aenean et dictum dolor. Sed vel urna lorem. Sed eu accumsan purus. Nunc luctus nibh in metus faucibus euismod. Aliquam lacinia dui ac ultricies eleifend. Cras justo lectus, imperdiet a mauris ut, ultrices porttitor magna. Donec pellentesque venenatis nunc nec elementum. Proin odio magna, pharetra sed porttitor sit amet, tincidunt et risus. Aenean a leo hendrerit, pellentesque mi id, tincidunt tellus. Etiam placerat magna ligula, non ornare nisi vestibulum quis. Ut at diam iaculis ante convallis tristique.',
            'post_status' => 'publish',
            'post_type' => 'post',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term_vi,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);



        $args = array(

            'post_title' => 'Live in Dulbin',
            'custom_title' => 'This is a cool featured image example',
            'qucreative_'.'meta_post_media_type' => 'vimeo',
            'qucreative_'.'meta_post_media' => 'https://vimeo.com/62193160',
            'post_content' => 'Proin turpis felis, imperdiet a scelerisque sed, ornare sit amet nulla. Fusce lacinia lorem vitae massa finibus sollicitudin. Sed facilisis leo nec magna sodales, ut imperdiet sapien porta. Cras neque sapien, pharetra sit amet risus nec, hendrerit tempor eros. Fusce eleifend velit eget venenatis interdum. Integer dolor mauris, interdum ut turpis ac, imperdiet vulputate magna. Etiam laoreet ante id arcu pretium maximus. Ut nec vestibulum lacus, a malesuada mi. In pulvinar tristique pellentesque. Fusce vel erat sagittis ligula ultrices vestibulum eleifend et tellus. Vestibulum efficitur laoreet vulputate. Aliquam finibus malesuada nunc vel venenatis. Mauris in posuere erat.

Proin fringilla eget sapien lacinia tempus. Praesent eleifend risus id ipsum tempus euismod. Pellentesque eget leo non leo dignissim euismod in nec risus. Cras mattis sapien sit amet quam ultricies, id malesuada neque euismod. Sed vel gravida magna, non porta tortor. Proin vel nulla suscipit, ultrices felis quis, laoreet arcu. Nulla interdum purus fermentum nisi lacinia, eget placerat augue viverra. Sed egestas est at pulvinar ornare. Sed eleifend fermentum ex at posuere. Aliquam dignissim luctus lectus, eu euismod nunc ullamcorper eget. Sed pulvinar nunc tempor neque ullamcorper placerat. Nulla aliquet orci leo, non tempus urna viverra non. Sed aliquam metus vestibulum posuere sagittis.',
            'post_status' => 'publish',
            'post_type' => 'post',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term_ev,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);



        $args = array(

            'post_title' => 'Crazy riffs with Mickey Rogers, out guitarist',
            'custom_title' => 'This is a cool featured image example',
            'qucreative_'.'meta_post_media_type' => 'youtube',
            'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=9HC2o59SP6k',
            'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sodales nulla ligula, fringilla sollicitudin leo interdum sit amet. Vestibulum et est sed ipsum fringilla rhoncus. Aenean convallis nisi consectetur, pellentesque eros a, pellentesque turpis. Nunc tortor lectus, blandit elementum dui quis, elementum commodo justo. Pellentesque lacinia leo velit, sed consequat sapien lobortis dapibus. Curabitur volutpat orci arcu, fermentum pulvinar orci luctus eget. In hac habitasse platea dictumst. Duis orci ipsum, imperdiet eu ipsum et, egestas convallis augue.

Proin turpis felis, imperdiet a scelerisque sed, ornare sit amet nulla. Fusce lacinia lorem vitae massa finibus sollicitudin. Sed facilisis leo nec magna sodales, ut imperdiet sapien porta. Cras neque sapien, pharetra sit amet risus nec, hendrerit tempor eros. Fusce eleifend velit eget venenatis interdum. Integer dolor mauris, interdum ut turpis ac, imperdiet vulputate magna. Etiam laoreet ante id arcu pretium maximus. Ut nec vestibulum lacus, a malesuada mi. In pulvinar tristique pellentesque. Fusce vel erat sagittis ligula ultrices vestibulum eleifend et tellus. Vestibulum efficitur laoreet vulputate. Aliquam finibus malesuada nunc vel venenatis. Mauris in posuere erat.

Proin fringilla eget sapien lacinia tempus. Praesent eleifend risus id ipsum tempus euismod. Pellentesque eget leo non leo dignissim euismod in nec risus. Cras mattis sapien sit amet quam ultricies, id malesuada neque euismod. Sed vel gravida magna, non porta tortor. Proin vel nulla suscipit, ultrices felis quis, laoreet arcu. Nulla interdum purus fermentum nisi lacinia, eget placerat augue viverra. Sed egestas est at pulvinar ornare. Sed eleifend fermentum ex at posuere. Aliquam dignissim luctus lectus, eu euismod nunc ullamcorper eget. Sed pulvinar nunc tempor neque ullamcorper placerat. Nulla aliquet orci leo, non tempus urna viverra non. Sed aliquam metus vestibulum posuere sagittis.',
            'post_status' => 'publish',
            'post_type' => 'post',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term_ne,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);



        $args = array(

            'post_title' => 'Paying a tribute to one of the greatest drummers',
            'custom_title' => 'This is a cool featured image example',

            'post_content' => 'Praesent malesuada consectetur arcu, eget cursus nibh commodo eget. Phasellus id risus tincidunt, tempus arcu sed, facilisis est. Nulla arcu ex, ultrices eget lorem ac, rutrum lacinia quam. Pellentesque dignissim augue id tortor auctor, ut vulputate tortor rhoncus. Proin ullamcorper pulvinar pellentesque. Maecenas at est sit amet odio convallis laoreet eget a lorem. Integer tempor, ipsum id congue sagittis, quam ligula ullamcorper elit, at semper odio risus rutrum metus. In quis erat malesuada, pretium nisl ac, eleifend odio. Nam ligula felis, congue non dolor eu, mollis tincidunt orci. Nullam orci magna, commodo id arcu eu, iaculis bibendum ante. Mauris eget libero sed metus feugiat ornare. Suspendisse pulvinar erat sed nulla pellentesque mattis. Donec venenatis ultrices lorem nec blandit.

Quisque at dui nec nisi venenatis suscipit. Donec bibendum lacinia arcu non lobortis. Proin mollis maximus dui gravida consequat. Etiam maximus mollis facilisis. Vivamus placerat ut magna tempor convallis. Sed nec ligula metus. Pellentesque euismod purus eget lacus accumsan, ac condimentum neque volutpat. Sed nec blandit nibh. Quisque accumsan turpis a cursus tempor. Mauris vel consectetur purus. Vestibulum vehicula neque sed consequat consequat.

Donec mollis libero et ex molestie egestas. Interdum et malesuada fames ac ante ipsum primis in faucibus. Integer quis lacinia purus, sit amet rhoncus dolor. Donec nec nibh malesuada lorem dignissim lobortis non vel justo. Sed euismod ultricies odio, at fermentum quam dapibus sit amet. Proin maximus dui quis posuere finibus. Maecenas egestas imperdiet est, nec pharetra eros gravida sit amet. Nulla quam quam, fermentum et massa at, placerat molestie nisi.',
            'post_status' => 'publish',
            'post_type' => 'post',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term_vi,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);






        $args = array(

            'post_title' => 'We re gonna have a new show in Denver next month',
            'custom_title' => 'This is a cool featured image example',

            'post_content' => 'Praesent malesuada consectetur arcu, eget cursus nibh commodo eget. Phasellus id risus tincidunt, tempus arcu sed, facilisis est. Nulla arcu ex, ultrices eget lorem ac, rutrum lacinia quam. Pellentesque dignissim augue id tortor auctor, ut vulputate tortor rhoncus. Proin ullamcorper pulvinar pellentesque. Maecenas at est sit amet odio convallis laoreet eget a lorem. Integer tempor, ipsum id congue sagittis, quam ligula ullamcorper elit, at semper odio risus rutrum metus. In quis erat malesuada, pretium nisl ac, eleifend odio. Nam ligula felis, congue non dolor eu, mollis tincidunt orci. Nullam orci magna, commodo id arcu eu, iaculis bibendum ante. Mauris eget libero sed metus feugiat ornare. Suspendisse pulvinar erat sed nulla pellentesque mattis. Donec venenatis ultrices lorem nec blandit.

Quisque at dui nec nisi venenatis suscipit. Donec bibendum lacinia arcu non lobortis. Proin mollis maximus dui gravida consequat. Etiam maximus mollis facilisis. Vivamus placerat ut magna tempor convallis. Sed nec ligula metus. Pellentesque euismod purus eget lacus accumsan, ac condimentum neque volutpat. Sed nec blandit nibh. Quisque accumsan turpis a cursus tempor. Mauris vel consectetur purus. Vestibulum vehicula neque sed consequat consequat.

Donec mollis libero et ex molestie egestas. Interdum et malesuada fames ac ante ipsum primis in faucibus. Integer quis lacinia purus, sit amet rhoncus dolor. Donec nec nibh malesuada lorem dignissim lobortis non vel justo. Sed euismod ultricies odio, at fermentum quam dapibus sit amet. Proin maximus dui quis posuere finibus. Maecenas egestas imperdiet est, nec pharetra eros gravida sit amet. Nulla quam quam, fermentum et massa at, placerat molestie nisi.',
            'post_status' => 'publish',
            'post_type' => 'post',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term_ne,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);





























        $cont = '';





        $args = array(
            'post_title'    => wp_strip_all_tags( 'Blog' ),
            'post_content'  => $cont,
            'post_status'   => 'publish',
            'post_author'   => 1,
            'post_type'   => 'page',

        );


        $page_id = wp_insert_post( $args );




        update_post_meta(  $page_id ,'qucreative_'.'meta_custom_title','our blog');
        update_post_meta(  $page_id ,'qucreative_'.'meta_bg_image',$img_url);


        update_option( 'page_for_posts', $page_id );











    $img_name_500_100 = '500x100.jpg';
    $img_url_500_100 = QUCREATIVE_THEME_URL . 'placeholders/'.$img_name_500_100;


    $img_path_500_100 = QUCREATIVE_THEME_DIR . 'placeholders/'.$img_name_500_100;


    $new_path_500_100 = $upload_dir_path . '/' . $img_name_500_100;

    try {

        if (!copy($img_path_500_100, $new_path_500_100)) {

        } else {
            $img_url_500_100 = $upload_dir_url . '/' . $img_name_500_100;
            $new_path_500_100 = $img_path_500_100;
        }
    } catch (Exception $e) {
        print_rr($e);
    }






    $attach_id_500_100 = qucreative_import_demo_create_attachment($img_url_500_100, '1', $new_path_500_100);


    $qucreative_theme_data['import_demo_last_attach_id_500_100'] = $attach_id_500_100;













        $cont = '[vc_section shape="" type="image" section_bg_color="#181818" style="dark"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="heading-is-center" section_number="01" line1="About" line2="THE AWESOME BAND"][/vc_column][/vc_row][vc_row][vc_column width="1/3"][vc_empty_space height="52px"][antfarm_bullet_feature style="style-4" feature="feature-type-fa" icon_aligment="icon-align-right" icon_theme="icon-theme-dark" form="form-circle" title="The Band" faicon="music"]Lorem ipsum dolor sit amet, consectetori adipiscing elitis met Donec tincidunt eros veli mase mauris phaellis, certimus est.

[antfarm_button style="style-black" padding="padding-small" rounded="rounded" the_icon="" link="#"]read more[/antfarm_button][/antfarm_bullet_feature][vc_empty_space height="70px"][antfarm_bullet_feature style="style-4" feature="feature-type-fa" icon_aligment="icon-align-right" icon_theme="icon-theme-dark" form="form-circle" title="Upcoming Events" faicon="calendar-o"]Lorem ipsum dolor sit amet, consectetori adipiscing elitis met Donec tincidunt eros veli mase mauris phaellis, certimus est.

[antfarm_button style="style-black" padding="padding-small" rounded="rounded" the_icon="" link="#"]read more[/antfarm_button][/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][vc_single_image image="'.$qucreative_theme_data['import_demo_last_attach_id'].'" img_size="full" alignment="center"][/vc_column][vc_column width="1/3"][vc_empty_space height="52px"][antfarm_bullet_feature style="style-4" feature="feature-type-fa" icon_aligment="" icon_theme="icon-theme-dark" form="form-circle" title="The Members" faicon="users"]Lorem ipsum dolor sit amet, consectetori adipiscing elitis met Donec tincidunt eros veli mase mauris phaellis, certimus est.

[antfarm_button style="style-black" padding="padding-small" rounded="rounded" the_icon="" link="#"]read more[/antfarm_button][/antfarm_bullet_feature][vc_empty_space height="70px"][antfarm_bullet_feature style="style-4" feature="feature-type-fa" icon_aligment="" icon_theme="icon-theme-dark" form="form-circle" title="Fan Base" faicon="envelope"]Lorem ipsum dolor sit amet, consectetori adipiscing elitis met Donec tincidunt eros veli mase mauris phaellis, certimus est.

[antfarm_button style="style-black" padding="padding-small" rounded="rounded" the_icon="" link="#"]read more[/antfarm_button][/antfarm_bullet_feature][/vc_column][/vc_row][vc_row][vc_column][vc_single_image image="'.$qucreative_theme_data['import_demo_last_attach_id_500_100'].'" img_size="full" alignment="center"][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_sc_video media="https://www.youtube.com/watch?v=nURh9LsyUhQ" video_cover="'.$img_url.'" line1="Our Latest Video" line2="Rock This Way"][/vc_column][/vc_row][/vc_section][vc_section shape="" type="image" section_bg_image="" bg_hide_on_mobile="true" style="light"][vc_row][vc_column width="1/2"][antfarm_section_title style="two-lines" aligment="" line1="The Songs" line2="OUR LATEST RELEASES"][/vc_column][vc_column width="1/2"][/vc_column][/vc_row][vc_row][vc_column width="1/2"][vc_column_text]
<h6>Check This Out</h6>
[antfarm_divider height="30" style="style-1" color="#0a0a0a"][/antfarm_divider]

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque id aliquam urna. In hendrerit auctor nisi, sed pulvinar nisl aliquam imperdiet. Vestibulum ut odio consequat nisi sagittis commodo et a elit. Cras quam eros, ornare eget pretium convallis, ultricies eget eros. Sed ligula ex, tempor vel blandit nec, dapibus quis eros. Aenean in erat quis ligula congue bibendum a ut lorem. Fusce lacinia metus cursus odio aliquet faucibus.

[antfarm_button style="style-black" padding="" rounded="" the_icon="shopping-cart"]Buy Album[/antfarm_button] [antfarm_button style="style-hallowblack" padding="" rounded="" the_icon="youtube-play"]Watch Video[/antfarm_button][/vc_column_text][/vc_column][vc_column width="1/2"][/vc_column][/vc_row][vc_row][vc_column width="1/2"][antfarm_audio_playlist][antfarm_audio_player media="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3" title="James" links="%5B%7B%7D%5D"][antfarm_audio_player media="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3" title="My Dream" links="%5B%7B%7D%5D"][antfarm_audio_player media="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3" title="Born A Wise Man" links="%5B%7B%7D%5D"][antfarm_audio_player media="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3" title="The Speedway" links="%5B%7B%7D%5D"][antfarm_audio_player media="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3" title="Troublebound" links="%5B%7B%7D%5D"][/antfarm_audio_playlist][/vc_column][vc_column width="1/2"][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_sc_social_links media="'.$img_url.'" overlay_opacity="50" title_1="like us on" social_1="Facebook" icon_1="facebook-square" title_2="follow us on" social_2="Twitter" icon_2="twitter" title_3="pin this on" social_3="Pinterest" icon_3="pinterest" title_4="appreciate us on" social_4="Google+" icon_4="google-plus"][/vc_column][/vc_row][/vc_section][vc_section shape="" type="image" section_bg_image="" bg_hide_on_mobile="true" style="dark"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="heading-is-center" section_number="03" line1="Gallery" line2="BECAUSE YOU GUYS ASKED FOR IT"][/vc_column][/vc_row][vc_row][vc_column][antfarm_portfolio skin="skin-gazelia skin-gazelia--transparent" zfolio-mode="mode-normal" link_whole_item="zoombox" gap="0" title_hover="off" cat="rock-band" responsive_fallback_mobile="dzs-layout--2-cols" layout="dzs-layout--5-cols"][/vc_column][/vc_row][vc_row][vc_column width="1/4"][vc_single_image image="'.$qucreative_theme_data['import_demo_last_attach_id'].'" img_size="full" alignment="center"][/vc_column][vc_column width="1/2"][vc_column_text]
<h5 style="text-align: center;"><span style="color: #ebcb46;">Win Two Tickets To Our Show</span></h5>
<p style="text-align: center;">[antfarm_divider height="30" style="style-1" color="#ffffff"][/antfarm_divider]</p>
<p style="text-align: center;"><span style="color: #ffffff;">Lorem ipsum dolor sit amet, consectetori adipiscing elitis met Donec tincidunt eros veli mase mauris phaellNam nec hendrerit nunc. Etiam sit amet lectus purus. Nam lobortis tellus erat. Sed orci ex, molestie sit amet eros vitae, vestibulum tincidunt quam. Nam suscipit sapien ut porttitor matti.</span></p>
<p style="text-align: center;">[antfarm_button style="style-black" padding="" rounded="rounded" the_icon="shopping-cart"]buy album[/antfarm_button]</p>
[/vc_column_text][/vc_column][vc_column width="1/4"][vc_single_image image="'.$qucreative_theme_data['import_demo_last_attach_id'].'" img_size="full" alignment="right"][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_sc_blockquote bg="'.$img_url.'" overlay_opacity="50" author="Steve Jobs"]Design is not just what it looks like and feels like. Design is how it works.[/antfarm_sc_blockquote][/vc_column][/vc_row][/vc_section][vc_section shape="" type="image" section_bg_image="" style="light"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="04" line1="Members" line2="WE LOVE MAKING MUSIC"][/vc_column][/vc_row][vc_row][vc_column width="1/2"][antfarm_team_member style="team-member-element" shape="circle" avatar="'.$img_url.'" first_name="Markus" last_name="Washington" position="GUITAR, BACKGING VOCALS" aligment="left" titles="%5B%7B%22faicon%22%3A%22github%20fa-fw%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22pinterest%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22twitter%22%2C%22title%22%3A%22%23%22%7D%5D"][/vc_column][vc_column width="1/2"][antfarm_team_member style="team-member-element" shape="circle" avatar="'.$img_url.'" first_name="Terry" last_name="Rogers" position="BASS GUITAR, VOCALS" aligment="left" titles="%5B%7B%22faicon%22%3A%22github%20fa-fw%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22pinterest%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22twitter%22%2C%22title%22%3A%22%23%22%7D%5D"][/vc_column][/vc_row][vc_row][vc_column width="1/2"][antfarm_team_member style="team-member-element" shape="circle" avatar="'.$img_url.'" first_name="Francis John" last_name="Peterson" position="DRUMS, PERCUSSION" aligment="right" titles="%5B%7B%22faicon%22%3A%22github%20fa-fw%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22pinterest%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22twitter%22%2C%22title%22%3A%22%23%22%7D%5D"][/vc_column][vc_column width="1/2"][antfarm_team_member style="team-member-element" shape="circle" avatar="'.$img_url.'" first_name="William" last_name="Richardson" position="KEYBOARDS, SAXOPHONE" aligment="right" titles="%5B%7B%22faicon%22%3A%22github%20fa-fw%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22pinterest%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22twitter%22%2C%22title%22%3A%22%23%22%7D%5D"][/vc_column][/vc_row][/vc_section][vc_section shape="" type="image" section_bg_image="'.$img_url.'" style="light"][vc_row][vc_column][antfarm_sc_contact_form bg="'.$img_url.'" overlay_opacity="50" translate_send_message="send message"][/vc_column][/vc_row][/vc_section][vc_section shape="" type="image" section_bg_image="" style="dark"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="heading-is-center" section_number="05" line1="News" line2="LATEST STUFF ABOUT THE BAND"][/vc_column][/vc_row][vc_row][vc_column][antfarm_latest_posts count="6"][/vc_column][/vc_row][/vc_section]';





        $args = array(
            'post_title'    => wp_strip_all_tags( 'Qu '.$demo_name ),
            'post_content'  => $cont,
            'post_status'   => 'publish',
            'post_author'   => 1,
            'post_type'   => 'page',

        );

// Insert the post into the database
        $page_id = wp_insert_post( $args );





        update_post_meta(  $page_id ,'qucreative_'.'meta_custom_section_margin_bottom','0');
        update_post_meta(  $page_id ,'qucreative_'.'meta_content_starts_at','pixel-position');
        update_post_meta(  $page_id ,'qucreative_'.'meta_content_starts_at_pixel','400');
        update_post_meta(  $page_id ,'qucreative_'.'meta_scrollbar_theme','light');
        update_post_meta(  $page_id ,'qucreative_'.'meta_custom_title','Howdy');
        update_post_meta(  $page_id ,'qucreative_'.'meta_bg_image',"#777777");












        update_option( 'page_on_front', $page_id );
        update_option( 'show_on_front', 'page' );



















	$option_name = 'sidebars_widgets';
	$option_value = 'a:4:{s:19:"wp_inactive_widgets";a:0:{}s:9:"sidebar-1";a:4:{i:0;s:16:"antfarm_search-2";i:1;s:20:"antfarm_categories-2";i:2;s:25:"antfarm_lightboxgallery-2";i:3;s:16:"antfarm_social-2";}s:14:"sidebar-footer";a:1:{i:0;s:15:"antfarm_image-2";}s:13:"array_version";i:3;}';



	qucreative_import_demo_update_widget($option_name,$option_value);






	$option_name = 'widget_antfarm_search';
	$option_value = 'a:2:{i:2;a:3:{s:5:"title";s:0:"";s:11:"button_text";s:0:"";s:20:"heading_style_button";s:0:"";}s:12:"_multiwidget";i:1;}';

	qucreative_import_demo_update_widget($option_name,$option_value);












	$img_name_500_100 = '500x100.jpg';
	$img_url_500_100 = QUCREATIVE_THEME_URL . 'placeholders/'.$img_name_500_100;


	$img_path_500_100 = QUCREATIVE_THEME_DIR . 'placeholders/'.$img_name_500_100;


	$new_path_500_100 = $upload_dir_path . '/' . $img_name_500_100;

	try {

		if (!copy($img_path_500_100, $new_path_500_100)) {

		} else {
			$img_url_500_100 = $upload_dir_url . '/' . $img_name_500_100;
			$new_path_500_100 = $img_path_500_100;
		}
	} catch (Exception $e) {
		print_rr($e);
	}




	$attach_id_500_100 = qucreative_import_demo_create_attachment($img_url_500_100, '1', $new_path_500_100);


	$qucreative_theme_data['import_demo_last_attach_id_500_100'] = $attach_id_500_100;





	$option_name = 'widget_antfarm_image';
	$option_value = 'a:2:{i:2;a:2:{s:5:"title";s:0:"";s:3:"img";s:'.strlen($attach_id_500_100).':"'.($attach_id_500_100).'";}s:12:"_multiwidget";i:1;}';

	qucreative_import_demo_update_widget($option_name,$option_value);


	$option_name = 'widget_antfarm_categories';
	$option_value = 'a:2:{i:2;a:2:{s:5:"title";s:10:"categories";s:3:"cat";a:3:{i:0;s:1:"8";i:1;s:2:"10";i:2;s:1:"9";}}s:12:"_multiwidget";i:1;}';

	qucreative_import_demo_update_widget($option_name,$option_value);


	$option_name = 'widget_antfarm_social';
	$option_value = 'a:2:{i:2;a:2:{s:5:"title";s:10:"get social";s:8:"repeater";s:251:"[{"title":"facebook","link":"#","icon":"facebook"},{"title":"twitter","link":"#","icon":"twitter"},{"title":"instagram","link":"#","icon":"instagram"},{"title":"youtube","link":"#","icon":"youtube-play"},{"title":"pint","link":"#","icon":"pinterest"}]";}s:12:"_multiwidget";i:1;}';

	qucreative_import_demo_update_widget($option_name,$option_value);




	$option_name = 'widget_antfarm_lightboxgallery';
	$option_value = 'a:2:{i:2;a:4:{s:5:"title";s:11:"the gallery";s:5:"count";s:1:"8";s:10:"nr_columns";s:1:"4";s:4:"cats";a:1:{i:0;s:'.strlen($term_id).':"'.$term_id.'";}}s:12:"_multiwidget";i:1;}';

	qucreative_import_demo_update_widget($option_name,$option_value);






	$option_name = 'widget_calendar';
	$option_value = 'a:3:{i:2;a:1:{s:5:"title";s:8:"Calendar";}i:3;a:1:{s:5:"title";s:8:"Calendar";}s:12:"_multiwidget";i:1;}';

	qucreative_import_demo_update_widget($option_name,$option_value);






	$option_name = 'widget_meta';
	$option_value = 'a:2:{i:3;a:1:{s:5:"title";s:4:"Meta";}s:12:"_multiwidget";i:1;}';

	qucreative_import_demo_update_widget($option_name,$option_value);






	$option_name = 'widget_archives';
	$option_value = 'a:2:{i:3;a:3:{s:5:"title";s:8:"Archives";s:5:"count";i:0;s:8:"dropdown";i:0;}s:12:"_multiwidget";i:1;}';

	qucreative_import_demo_update_widget($option_name,$option_value);






    $temp_text = 'https://dummyimage.com/900x100/aaaaaa/aaaaaa';























        $ser_data = 'a:51:{s:14:"portfolio_page";s:0:"";s:11:"mail_method";s:7:"wp_mail";s:12:"blur_ammount";s:2:"26";s:23:"menu_enviroment_opacity";s:2:"30";s:26:"content_enviroment_opacity";s:3:"100";s:24:"secondary_content_height";s:3:"400";s:13:"gmaps_api_key";s:0:"";s:13:"gmaps_styling";s:0:"";s:13:"content_align";s:20:"content-align-center";s:16:"page_title_align";s:22:"page-title-align-right";s:16:"page_title_style";s:18:"page-title-style-2";s:12:"width_column";s:2:"60";s:9:"width_gap";s:2:"30";s:17:"width_blur_margin";s:1:"0";s:16:"width_section_bg";s:2:"70";s:24:"content_add_extra_pixels";s:0:"";s:12:"border_width";s:1:"0";s:12:"border_color";s:7:"#ffffff";s:37:"content_section_title_two_lines_space";s:2:"30";s:43:"content_section_title_two_lines_use_divider";s:0:"";s:49:"content_section_title_two_lines_use_divider_color";s:0:"";s:9:"menu_type";s:11:"menu-type-9";s:14:"menu_is_sticky";s:3:"off";s:28:"menu_horizontal_shadow_style";s:4:"none";s:12:"social_icons";s:161:"[{"link":"#","icon":"facebook-square"},{"link":"#","icon":"instagram"},{"link":"#","icon":"pinterest"},{"link":"#","icon":"twitter"},{"link":"#","icon":"apple"}]";s:23:"meta_options_post_types";b:0;s:4:"logo";s:'.strlen($logo_url_rock_band).':"'.$logo_url_rock_band.'";s:6:"logo_x";s:7:"default";s:13:"logo_x_custom";s:0:"";s:6:"logo_y";s:7:"default";s:10:"logo_width";s:0:"";s:11:"logo_height";s:0:"";s:13:"logo_y_custom";s:0:"";s:17:"copyright_textbox";s:14:"ANTFARM THEMES";s:31:"copyright_textbox_heading_style";s:9:"h-group-1";s:38:"footer_copyright_textbox_heading_style";s:2:"h6";s:9:"font_data";s:3860:"headings_font=Rock+Salt&h1_weight=regular&h1_size=70&h1_line_height=1.15&h1_responsive_slider=25&h2_weight=regular&h2_size=50&h2_line_height=1.15&h2_responsive_slider=25&h3_weight=regular&h3_size=40&h3_line_height=1.15&h3_responsive_slider=20&h4_weight=regular&h4_size=30&h4_line_height=1.15&h4_responsive_slider=20&h5_weight=regular&h5_size=21&h5_line_height=1.15&h5_responsive_slider=0&h6_weight=regular&h6_size=15&h6_line_height=1.57&h6_responsive_slider=0&h-group-1_weight=regular&h-group-1_size=11&h-group-1_line_height=1.54&h-group-1_responsive_slider=0&h-group-2_weight=regular&h-group-2_size=24&h-group-2_line_height=1.28&h-group-2_responsive_slider=0&body_font=Raleway&p_weight=500&p_size=14&p_line_height=1.92&p_color=%23777777&p_color_for_light=%23aaaaaa&hyperlink_weight=700&font-group-1_weight=700&font-group-1_size=15&font-group-1_line_height=1.42&font-group-2_weight=700&font-group-2_size=15&font-group-2_line_height=1.42&font-group-3_weight=700&font-group-3_size=12&font-group-3_line_height=1.27&font-group-4_weight=600&font-group-4_size=15&font-group-4_line_height=1.42&font-group-5_weight=700&font-group-5_size=15&font-group-5_line_height=1.42&font-group-6_weight=600&font-group-6_size=14&font-group-6_line_height=1.46&font-group-7_weight=600&font-group-7_size=14&font-group-7_line_height=1.46&font-group-8_weight=700&font-group-8_size=14&font-group-8_line_height=1.46&font-group-9_weight=600&font-group-9_size=16&font-group-9_line_height=1.8&font-group-10_weight=700&font-group-10_size=17&font-group-10_line_height=1.68&font-group-11_weight=800&font-group-11_size=25&font-group-11_line_height=1.29&font-group-12_weight=600&font-group-12_size=13&font-group-12_line_height=1.46&blockquote_weight=600&blockquote_size=17&blockquote_line_height=1.58&menu_font=Raleway&menu_weight=600&menu_size=13&menu_line_height=1&copyright_font_link_to=headings&copyright_weight=regular&copyright_size=10&copyright_line_height=1.4&page_title_font=Rock+Salt&page_title_weight=regular&page_title_size=120&page_title_line_height=1.14&page_title_color=%23000000&page_title_responsive_slider=0&page_title_orientation=horizontal&section_title_two_font=Rock+Salt&section_title_two_first_weight=regular&section_title_two_first_size=80&section_title_two_first_line_height=1.3&section_title_two_first_color=%23eccb46&section_title_two_first_color_for_light=%23eccb46&section_title_two_first_responsive_slider=30&section_title_two_second_font=Raleway&section_title_two_second_weight=800&section_title_two_second_size=20&section_title_two_second_line_height=1&section_title_two_second_color=%23222222&section_title_two_second_color_for_light=%23ffffff&section_title_two_second_responsive_slider=0&line_spacing=15&section_title_two_number_font=Rock+Salt&section_title_two_number_weight=regular&section_title_two_number_size=80&section_title_two_number_line_height=1.3&section_title_two_number_color=%23333333&section_title_two_number_color_for_light=%23333333&section_title_two_divider_divider_style=style-fullwidth&section_title_two_divider_color=%23444444&section_title_two_divider_color_for_light=%23ffffff&title_divider_spacing_two=20&section_title_one_first_font=Lato&section_title_one_first_weight=100&section_title_one_first_size=25&section_title_one_first_line_height=1.28&section_title_one_first_color=%23444444&section_title_one_first_color_for_light=%23ffffff&section_title_one_first_responsive_slider=0&section_title_one_divider_divider_style=style-fullwidth&section_title_one_divider_color=%23444444&section_title_one_divider_color_for_light=%23ffffff&title_divider_spacing=20&home_slider_font_link_to=headings&home_slider_weight=regular&home_slider_size=50&home_slider_line_height=1.20&home_slider_color=%23ffffff&home_slider_color_for_light=%23222222&home_number_font_link_to=headings&home_number_weight=regular&home_number_size=135&home_number_line_height=1";s:32:"typography_sidebar_heading_style";s:2:"h6";s:31:"typography_footer_heading_style";s:2:"h6";s:24:"content_enviroment_style";s:15:"body-style-dark";s:17:"greyscale_ammount";s:1:"0";s:21:"section_margin_bottom";s:2:"30";s:15:"highlight_color";s:7:"#eccb46";s:22:"enable_bordered_design";s:3:"off";s:23:"enable_native_scrollbar";s:3:"off";s:13:"bg_transition";s:9:"slidedown";s:11:"enable_ajax";s:2:"on";s:13:"bg_isparallax";s:2:"on";s:18:"custom_css_post_id";i:1575;s:17:"soundcloud_apikey";s:32:"be48604d903aebd628b5bac968ffd14d";s:18:"nav_menu_locations";a:2:{s:7:"primary";i:'.$menu_id.';s:6:"social";i:0;}}';





        qucreative_import_demo_update_preset($ser_data,array(

            'preseter_slug' => $demo_slug,
            'preseter_name' => $demo_name,
        ));






























}









































$demo_slug = 'beauty-salon';
$demo_name = 'Beauty Salon';
if($_REQUEST['demo']==$demo_slug) {














    $img_name = '500x500.jpg';
    $img_url = QUCREATIVE_THEME_URL . 'placeholders/500x500.jpg';


    $img_path = QUCREATIVE_THEME_DIR . 'placeholders/500x500.jpg';


    $new_path = $upload_dir_path . '/' . $img_name;

    try {

        if (!copy($img_path, $new_path)) {

        } else {
            $img_url = $upload_dir_url . '/' . $img_name;
            $new_path = $img_path;
        }
    } catch (Exception $e) {
        print_rr($e);
    }









	$term = qucreative_import_demo_create_term_if_it_does_not_exist(array(
		'description' => '',
		'term_name' => 'Gallery with Description',
		'slug' => 'gallery-w-description',
		'taxonomy' => $taxonomy,

	));


	if (is_array($term)) {

		$term_id = $term['term_id'];
	} else {

		$term_id = $term->term_id;
	}



	$args = array(

            'post_title' => 'Brows  ',
            'post_content' => '',
            'post_status' => 'publish',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
        );


        $port_id = qucreative_import_demo_insert_post_complete($args);





        $arr_names = array(
            'Cheek ',
            'Gasp ',
            'Eyelids ',
            'Nails',
            'Lips',
            'Hair',

        );



        foreach ($arr_names as $it_name){

            $args = array(

                'post_title' => $it_name,
                'post_content' => '',
                'post_status' => 'publish',
                'img_url' => $img_url,
                'img_path'=>$new_path,
                'term' => $term,
                'taxonomy' => $taxonomy,
                'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
            );

            $port_id = qucreative_import_demo_insert_post_complete($args);
        }










	$term = qucreative_import_demo_create_term_if_it_does_not_exist(array(
		'description' => '',
		'term_name' => 'Main Gallery',
		'slug' => 'main-gallery',
		'taxonomy' => $taxonomy,

	));


	if (is_array($term)) {

		$term_id = $term['term_id'];
	} else {

		$term_id = $term->term_id;
	}





        $arr_names = array(
            'Mary ',
            'Jess ',
            'Iryna ',
            'Sarah',
            'Nelly',
            'Carmen',
            'Nina',
            'Jessica',
            'Iryna',
            'Carmen',

        );



        foreach ($arr_names as $it_name){

            $args = array(

                'post_title' => $it_name,
                'post_content' => '',
                'post_status' => 'publish',
                'img_url' => $img_url,
                'img_path'=>$new_path,
                'term' => $term,
                'taxonomy' => $taxonomy,
                'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
            );

            $port_id = qucreative_import_demo_insert_post_complete($args);
        }















	$cont = '{"grid_cols":"4","items_arr":[{"w":"2","h":"2"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"2","h":"1"},{"w":"1","h":"2"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"2","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"}],"loop":"off"}';





	$args = array(
		'post_title'    => wp_strip_all_tags( $demo_name ),
		'post_name'    => $demo_slug,
		'post_content'  => $cont,
		'post_status'   => 'publish',
		'post_author'   => 1,
		'post_type'   => 'zfolio_grid',

	);


	$page_id = wp_insert_post( $args );

































	$cont = '[vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="01" line1="THE SALON" line2="Sed a quam ornare efficitur ipsum et, vehicula urna."][/vc_column][/vc_row][vc_row][vc_column width="1/3"][antfarm_bullet_feature style="style-1" feature="image" title="YOU WILL GET THE BEST HAIR" media="'.$img_url.'" button_style="color-highlight" heading="h5" button_padding="padding-medium" button_rounded="on"]Donec ut feugiat lacus. Nulla vulputate sodales ante ultriceseme scelerisque. Mauris sed nisl maximus, pulvinar sapien initia, malesuada eros. Donec vitae ante luctus, pretium augue.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-1" feature="image" title="AND THE BEST MAKEUP" media="'.$img_url.'" button_style="color-highlight" heading="h5" button_padding="padding-medium" button_rounded="on"]Donec ut feugiat lacus. Nulla vulputate sodales ante ultriceseme scelerisque. Mauris sed nisl maximus, pulvinar sapien initia, malesuada eros. Donec vitae ante luctus, pretium augue.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-1" feature="image" title="AND SOME AMAZING NAILS" media="'.$img_url.'" button_style="color-highlight" heading="h5" button_padding="padding-medium" button_rounded="on"]Donec ut feugiat lacus. Nulla vulputate sodales ante ultriceseme scelerisque. Mauris sed nisl maximus, pulvinar sapien initia, malesuada eros. Donec vitae ante luctus, pretium augue.[/antfarm_bullet_feature][/vc_column][/vc_row][/vc_section][vc_section shape="" type="image" section_bg_color=" #e677a1" style="light"][vc_row][vc_column][antfarm_sc_video_text bg="#ff6699" overlay_opacity="0" featured_media_type="image" image="'.$img_url.'" title="World Class Beauty Center" heading="h4"]Maecenas nec nibh sit amet tellus convallis scelerisque eget non tortor. Aliquam mollis nisi etiamu cursus placerat. Aliquam erat volutpat. Suspendisse nec finibus nulla. Sed vehicula nec eros atem dapibus. Phasellus diam nibh, vehicula vitae tortor et, blandit tempus eros. Phasellus ac eros at turpis tempor lobortis eget vel arcu. Donec semper sagittis justo, a lacinia tortor maurisest.

[antfarm_button style="style-black" padding="" rounded="rounded" the_icon=""]OUR SERVICES[/antfarm_button] [antfarm_button style="style-hallowblack" padding="" rounded="rounded" the_icon=""]THE GALLERY[/antfarm_button][/antfarm_sc_video_text][/vc_column][/vc_row][/vc_section][vc_section shape="" type="image" section_bg_image="" style="light"][vc_row][vc_column width="1/3"][antfarm_section_title style="two-lines" aligment="" line1="SERVICES" line2="Sed a quam ornare efficitur ipsum et, vehicula urna."][vc_empty_space height="70px"][vc_row_inner][vc_column_inner][vc_single_image image="'.$qucreative_theme_data['import_demo_last_attach_id'].'" img_size="full" alignment="center"][/vc_column_inner][/vc_row_inner][/vc_column][vc_column width="2/3"][antfarm_portfolio skin="skin-gazelia skin-gazelia--transparent" zfolio-mode="mode-normal" link_whole_item="zoombox_item" gap="1px" cat="gallery-w-description" layout="dzs-layout--4-cols"][/vc_column][/vc_row][vc_row][vc_column width="1/6"][/vc_column][vc_column width="2/3"][antfarm_call_to_action title="WE ARE THE BEST IN THE BUSINESS!" read_more_text="" box_width="700"]Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque ullamcorper tortor turpis, id ullamcorper diametrins.

[antfarm_button style="color-highlight" padding="" rounded="rounded" the_icon=""]READ MORE[/antfarm_button][/antfarm_call_to_action][/vc_column][vc_column width="1/6"][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_sc_three_cols bg_1="#05dcf3" overlay_opacity_1="0" title_1="Oustanding Services" content_1="Lorem ipsum dolor sit amet, consectetur adipiscing elitima. Nullam congue fermentum pellentesque. Fusce eu dolo laoreet tellus aliquam rutrum a imperdiet do. " read_more_text_1="READ MORE" read_more_link_1="#" button_style_1="{``style``:``style-black``,``padding``:````,``rounded``:``rounded``}" bg_2="#c5d37c" overlay_opacity_2="0" title_2="True Professionals" content_2="Lorem ipsum dolor sit amet, consectetur adipiscing elitima. Nullam congue fermentum pellentesque. Fusce eu dolo laoreet tellus aliquam rutrum a imperdiet do. " read_more_text_2="READ MORE" read_more_link_2="#" button_style_2="{``style``:``style-black``,``padding``:````,``rounded``:``rounded``}" bg_3="#ebd765" overlay_opacity_3="0" title_3="The Ultimate Fashion" content_3="Lorem ipsum dolor sit amet, consectetur adipiscing elitima. Nullam congue fermentum pellentesque. Fusce eu dolo laoreet tellus aliquam rutrum a imperdiet do. " read_more_text_3="READ MORE" read_more_link_3="#" button_style_3="{``style``:``style-black``,``padding``:````,``rounded``:``rounded``}" heading="h4"][/vc_column][/vc_row][/vc_section][vc_section shape="shape-3" shape_color="#e677a1" shape_height="170" type="image" section_bg_image="" style="light"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="heading-is-center" section_number="03" line1="THE TEAM" line2="Sed a quam ornare efficitur ipsum et, vehicula urna."][/vc_column][/vc_row][vc_row][vc_column width="1/4"][antfarm_team_member style="team-member-element-2" shape="`{`object Object`}`" heading_style_2="h4" avatar="'.$img_url.'" first_name="JENNIFER" last_name="MARKS" position="nails expert" aligment="left" titles="%5B%7B%22faicon%22%3A%22facebook%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22linkedin%22%7D%2C%7B%22faicon%22%3A%22twitter%22%7D%5D" is_square="on"][/vc_column][vc_column width="1/4"][antfarm_team_member style="team-member-element-2" shape="`{`object Object`}`" heading_style_2="h4" avatar="'.$img_url.'" first_name="ANGELA" last_name="BENETTON" position="makeup artist" aligment="left" titles="%5B%7B%22faicon%22%3A%22facebook%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22linkedin%22%7D%2C%7B%22faicon%22%3A%22twitter%22%7D%5D" is_square="on"][/vc_column][vc_column width="1/4"][antfarm_team_member style="team-member-element-2" shape="`{`object Object`}`" heading_style_2="h4" avatar="'.$img_url.'" first_name="FRANCESCA" last_name="DINERO" position="hair stylist" aligment="left" titles="%5B%7B%22faicon%22%3A%22facebook%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22linkedin%22%7D%2C%7B%22faicon%22%3A%22twitter%22%7D%5D" is_square="on"][/vc_column][vc_column width="1/4"][antfarm_team_member style="team-member-element-2" shape="`{`object Object`}`" heading_style_2="h4" avatar="'.$img_url.'" first_name="LAURA" last_name="JOHNSON" position="fashion expert" aligment="left" titles="%5B%7B%22faicon%22%3A%22facebook%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22linkedin%22%7D%2C%7B%22faicon%22%3A%22twitter%22%7D%5D" is_square="on"][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_sc_blockquote bg="#e677a1" overlay_opacity="0" author="STEVE JOBS"]
<h2>Design is not just what it looks like and feels like.
Design is how it works.</h2>
[/antfarm_sc_blockquote][/vc_column][/vc_row][/vc_section][vc_section shape="" type="image" section_bg_image="" bg_hide_on_mobile="true" style="light"][vc_row][vc_column width="1/2"][/vc_column][vc_column width="1/2"][antfarm_section_title style="two-lines" aligment="" section_number="04" line1="PRICING" line2="Sed a quam ornare efficitur ipsum et,"][vc_empty_space height="70px"][antfarm_menu_item title="Eyes Makeup" price="$19" ingredients="Lorem ipsum dolor sit amet, consectetur adipiscing elit" titles="%5B%7B%7D%5D"][antfarm_menu_item title="Eyebrows" price="$17" ingredients="Duis sit amet enim non nisl placerat consequat at in diam" titles="%5B%7B%7D%5D"][antfarm_menu_item title="Lashes" price="$14" ingredients="Nulla vulputate sodales ante ultrices scelerisque" titles="%5B%7B%7D%5D"][antfarm_menu_item title="Hair Styling" price="$218" ingredients="Etiam mattis laoreet tortor, in lobortis urna pellentesque et" titles="%5B%7B%7D%5D"][antfarm_menu_item title="Haircut" price="$32" ingredients="Lorem ipsum dolor sit amet, consectetur adipiscing elit" titles="%5B%7B%7D%5D"][antfarm_menu_item title="Manicure" price="$28" ingredients="Duis sit amet enim non nisl placerat consequat at in diam" titles="%5B%7B%7D%5D"][antfarm_menu_item title="Gel Nails" price="$14" ingredients="Nulla vulputate sodales ante ultrices scelerisque" titles="%5B%7B%7D%5D"][antfarm_menu_item title="Nail Paintings" price="$97" ingredients="Etiam mattis laoreet tortor, in lobortis urna pellentesque et" titles="%5B%7B%7D%5D"][/vc_column][/vc_row][/vc_section][vc_section shape="" type="image" section_bg_color=" #26d3dd" style="light"][vc_row][vc_column][antfarm_sc_testimonials media="#26d3dd" overlay_opacity="0" tests="%5B%7B%22title%22%3A%22CLIENT%20TESTIMONIALS%22%2C%22name%22%3A%22JAMES%20WILLIAMS%22%2C%22position%22%3A%22CCO%20at%20Orange%20Studios%22%2C%22the_test%22%3A%22Sed%20ut%20urna%20fermentum%20urna%20mattis%20consectetur%20quis%20quis%20justo.%20Maecenas%20venenatis%20enim%20metus%2C%20id%20blandit%20purus%20varius%20nec.%20Pellentesque%20quis%20nunc%20consectetur%20eros%20tempor%20finibus.%20Vivamus%20vitae%20eros%20iaculis%2C%20sodales%20enim%20eget%2C%20consequat%20libero.%20Suspendisse%20a%20nulla%20lorem.%20Praesent%20non%20neque%20luctus%2C%20suscipit%20tellus%20placerat.%22%7D%2C%7B%22title%22%3A%22CLIENT%20TESTIMONIALS%22%2C%22name%22%3A%22JAMES%20WILLIAMS%22%2C%22position%22%3A%22CCO%20at%20Orange%20Studios%22%2C%22the_test%22%3A%22Sed%20ut%20urna%20fermentum%20urna%20mattis%20consectetur%20quis%20quis%20justo.%20Maecenas%20venenatis%20enim%20metus%2C%20id%20blandit%20purus%20varius%20nec.%20Pellentesque%20quis%20nunc%20consectetur%20eros%20tempor%20finibus.%20Vivamus%20vitae%20eros%20iaculis%2C%20sodales%20enim%20eget%2C%20consequat%20libero.%20Suspendisse%20a%20nulla%20lorem.%20Praesent%20non%20neque%20luctus%2C%20suscipit%20tellus%20placerat.%22%7D%2C%7B%22title%22%3A%22CLIENT%20TESTIMONIALS%22%2C%22name%22%3A%22JAMES%20WILLIAMS%22%2C%22position%22%3A%22CCO%20at%20Orange%20Studios%22%2C%22the_test%22%3A%22Sed%20ut%20urna%20fermentum%20urna%20mattis%20consectetur%20quis%20quis%20justo.%20Maecenas%20venenatis%20enim%20metus%2C%20id%20blandit%20purus%20varius%20nec.%20Pellentesque%20quis%20nunc%20consectetur%20eros%20tempor%20finibus.%20Vivamus%20vitae%20eros%20iaculis%2C%20sodales%20enim%20eget%2C%20consequat%20libero.%20Suspendisse%20a%20nulla%20lorem.%20Praesent%20non%20neque%20luctus%2C%20suscipit%20tellus%20placerat.%22%7D%2C%7B%22title%22%3A%22CLIENT%20TESTIMONIALS%22%2C%22name%22%3A%22JAMES%20WILLIAMS%22%2C%22position%22%3A%22CCO%20at%20Orange%20Studios%22%2C%22the_test%22%3A%22Sed%20ut%20urna%20fermentum%20urna%20mattis%20consectetur%20quis%20quis%20justo.%20Maecenas%20venenatis%20enim%20metus%2C%20id%20blandit%20purus%20varius%20nec.%20Pellentesque%20quis%20nunc%20consectetur%20eros%20tempor%20finibus.%20Vivamus%20vitae%20eros%20iaculis%2C%20sodales%20enim%20eget%2C%20consequat%20libero.%20Suspendisse%20a%20nulla%20lorem.%20Praesent%20non%20neque%20luctus%2C%20suscipit%20tellus%20placerat.%22%7D%2C%7B%22title%22%3A%22CLIENT%20TESTIMONIALS%22%2C%22name%22%3A%22JAMES%20WILLIAMS%22%2C%22position%22%3A%22CCO%20at%20Orange%20Studios%22%2C%22the_test%22%3A%22Sed%20ut%20urna%20fermentum%20urna%20mattis%20consectetur%20quis%20quis%20justo.%20Maecenas%20venenatis%20enim%20metus%2C%20id%20blandit%20purus%20varius%20nec.%20Pellentesque%20quis%20nunc%20consectetur%20eros%20tempor%20finibus.%20Vivamus%20vitae%20eros%20iaculis%2C%20sodales%20enim%20eget%2C%20consequat%20libero.%20Suspendisse%20a%20nulla%20lorem.%20Praesent%20non%20neque%20luctus%2C%20suscipit%20tellus%20placerat.%22%7D%5D" heading_style="h5"][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="05" line1="GALLERY" line2="Sed a quam ornare efficitur ipsum et, vehicula urna."][/vc_column][/vc_row][vc_row][vc_column width="1/2"][vc_row_inner][vc_column_inner width="1/2"][vc_column_text]
<h4>The Ultimate Look</h4>
[antfarm_divider height="30" style="style-1" color="#000000"][/antfarm_divider]

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam cursus augue id justo mollis, a suscipit eros mollis. Aliquam tempus, metus id facilisis blandit, elit neque gravida mauris, at viverra turpis sapien nec libero. Vestibulum varius ligula ac elit luctus malesuada. Aenean accumsan rutrum massa.

[/vc_column_text][/vc_column_inner][vc_column_inner width="1/2"][vc_column_text]
<h4>Born To Shine</h4>
[antfarm_divider height="30" style="style-1" color="#000000"][/antfarm_divider]

Quisque ex arcu, venenatis vestibulum elit quis, consectetur molestie metus. Maecenas rutrum mi pellentesque, cursus mauris vitae, tempor tellus. In viverra nisi sit amet lorem rhoncus ultrices. Quisque hendrerit magna eget ex pellentesque, vel pellentesque arcu vulputate. Cras pulvinar ac tellus maximus.[/vc_column_text][/vc_column_inner][/vc_row_inner][antfarm_tta_tabs dzsvcs_id="tabs-209299" is_always_accordion="on" skin="skin-qucreative" inner_padding="30" active_section="0"][vc_tta_section title="Vivamus scelerisque consequat sollicitudin semper est at metus" tab_id="1494619526404-e123a1e6-7426"][vc_column_text]Vivamus scelerisque consequat sollicitudin. Nullam semper est at metus auctor, eget fringilla purus convallis. Donec quis feugiat lorem. Sed lorem massa, sollicitudin vel turpis id, fermentum hendrerit ipsum. Cras vestibulum consectetur turpis, ut vestibulum nisi varius nec. Suspendisse at ex condimentum, vulputate elit vel, hendrerit ipsum. Etiam placerat felis sem, vel aliquam diam laoreet vel. Nullam eget purus quis diam euismod sagittis vel non enim. Nullam facilisis orci vel sapien varius dictum. Curabitur placerat leo nec felis.[/vc_column_text][/vc_tta_section][vc_tta_section title="Aliquam non arcu et mi viverra luctus et eu magna" tab_id="1494619526471-17b134ca-c8da"][vc_column_text]Vivamus scelerisque consequat sollicitudin. Nullam semper est at metus auctor, eget fringilla purus convallis. Donec quis feugiat lorem. Sed lorem massa, sollicitudin vel turpis id, fermentum hendrerit ipsum. Cras vestibulum consectetur turpis, ut vestibulum nisi varius nec. Suspendisse at ex condimentum, vulputate elit vel, hendrerit ipsum. Etiam placerat felis sem, vel aliquam diam laoreet vel. Nullam eget purus quis diam euismod sagittis vel non enim. Nullam facilisis orci vel sapien varius dictum. Curabitur placerat leo nec felis.[/vc_column_text][/vc_tta_section][vc_tta_section title="Pellentesque quis urna a mi dictum imperdiet sed mauris et tortor" tab_id="1494619532400-6aaafb5e-ade0"][vc_column_text]Vivamus scelerisque consequat sollicitudin. Nullam semper est at metus auctor, eget fringilla purus convallis. Donec quis feugiat lorem. Sed lorem massa, sollicitudin vel turpis id, fermentum hendrerit ipsum. Cras vestibulum consectetur turpis, ut vestibulum nisi varius nec. Suspendisse at ex condimentum, vulputate elit vel, hendrerit ipsum. Etiam placerat felis sem, vel aliquam diam laoreet vel. Nullam eget purus quis diam euismod sagittis vel non enim. Nullam facilisis orci vel sapien varius dictum. Curabitur placerat leo nec felis.[/vc_column_text][/vc_tta_section][/antfarm_tta_tabs][/vc_column][vc_column width="1/2"][vc_row_inner][vc_column_inner][antfarm_portfolio skin="skin-gazelia skin-gazelia--transparent" zfolio-mode="mode-normal" link_whole_item="zoombox" gap="1px" pagination_method="off" cat="main-gallery" filters_enable="off" layout="'.$demo_slug.'"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_sc_small_map heading_text="GET IN TOUCH WITH" content_text="Qu Beauty Salon" button_text="CONTACT US" button_link="#" map_width="450"][/vc_column][/vc_row][/vc_section]';





        $args = array(
            'post_title'    => wp_strip_all_tags( 'Qu '.$demo_name ),
            'post_content'  => $cont,
            'post_status'   => 'publish',
            'post_author'   => 1,
            'post_type'   => 'page',

        );


        $page_id = wp_insert_post( $args );





        update_post_meta(  $page_id ,'qucreative_'.'meta_custom_section_margin_bottom','0');
        update_post_meta(  $page_id ,'qucreative_'.'meta_content_starts_at','pixel-position');
        update_post_meta(  $page_id ,'qucreative_'.'meta_content_starts_at_pixel','400');
        update_post_meta(  $page_id ,'qucreative_'.'meta_scrollbar_theme','light');
        update_post_meta(  $page_id ,'qucreative_'.'meta_custom_title',' ');
        update_post_meta(  $page_id ,'qucreative_'.'meta_bg_image',$img_url);






    update_post_meta(  $page_id ,'qucreative_'.'meta_is_fullscreen','on');
    update_post_meta(  $page_id ,'qucreative_'.'meta_is_fullscreen_stretch','contain');






        update_option( 'page_on_front', $page_id );
        update_option( 'show_on_front', 'page' );















	$option_name = 'sidebars_widgets';
	$option_value = 'a:4:{s:19:"wp_inactive_widgets";a:0:{}s:9:"sidebar-1";a:0:{}s:14:"sidebar-footer";a:4:{i:0;s:15:"antfarm_image-2";i:1;s:16:"antfarm_social-2";i:2;s:15:"antfarm_links-2";i:3;s:22:"antfarm_workinghours-2";}s:13:"array_version";i:3;}';



	qucreative_import_demo_update_widget($option_name,$option_value);






	$option_name = 'widget_antfarm_image';
	$option_value = 'a:2:{i:2;a:2:{s:5:"title";s:0:"";s:3:"img";s:'.strlen($qucreative_theme_data['import_demo_last_attach_id']).':"'.$qucreative_theme_data['import_demo_last_attach_id'].'";}s:12:"_multiwidget";i:1;}';

	qucreative_import_demo_update_widget($option_name,$option_value);



	$option_name = 'widget_antfarm_social';
	$option_value = 'a:2:{i:2;a:2:{s:5:"title";s:14:"AROUND THE WEB";s:8:"repeater";s:259:"[{"title":"Like Us On Facebook","link":"#","icon":"facebook"},{"title":"Check Us Out On Pinterest","link":"#","icon":"pinterest"},{"title":"Follow Us On Twiter","link":"#","icon":"twitter"},{"title":"YouTube Video Tutorials","link":"#","icon":"youtube-play"}]";}s:12:"_multiwidget";i:1;}';

	qucreative_import_demo_update_widget($option_name,$option_value);



	$option_name = 'widget_antfarm_links';
	$option_value = 'a:2:{i:2;a:2:{s:5:"title";s:16:"THE PRESENTATION";s:8:"repeater";s:184:"[{"title":"Qu Salon Presentation","link":"#"},{"title":"Expert Video Tutorials","link":"#"},{"title":"The Philosophy Behind Qu","link":"#"},{"title":"High Profile Clients","link":"#"}]";}s:12:"_multiwidget";i:1;}';

	qucreative_import_demo_update_widget($option_name,$option_value);



	$option_name = 'widget_antfarm_workinghours';
	$option_value = 'a:2:{i:2;a:3:{s:5:"title";s:13:"WORKING HOURS";s:10:"small_desc";s:91:"Duis nec nulla turpis. Nulla lacinia laoreet odio, non lacinia nisse felimml malesuada vel.";s:8:"repeater";s:96:"[{"title":"MONDAY - SATURDAY","time":"08 AM - 11 PM"},{"title":"SUNDAY","time":"10 AM - 09 PM"}]";}s:12:"_multiwidget";i:1;}';

	qucreative_import_demo_update_widget($option_name,$option_value);






	$option_name = 'widget_calendar';
	$option_value = 'a:3:{i:2;a:1:{s:5:"title";s:8:"Calendar";}i:3;a:1:{s:5:"title";s:8:"Calendar";}s:12:"_multiwidget";i:1;}';

	qucreative_import_demo_update_widget($option_name,$option_value);






	$option_name = 'widget_meta';
	$option_value = 'a:2:{i:3;a:1:{s:5:"title";s:4:"Meta";}s:12:"_multiwidget";i:1;}';

	qucreative_import_demo_update_widget($option_name,$option_value);






	$option_name = 'widget_archives';
	$option_value = 'a:2:{i:3;a:3:{s:5:"title";s:8:"Archives";s:5:"count";i:0;s:8:"dropdown";i:0;}s:12:"_multiwidget";i:1;}';

	qucreative_import_demo_update_widget($option_name,$option_value);











        $temp_text = '[
    {
        "featureType": "administrative",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "color": "#444444"
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "all",
        "stylers": [
            {
                "color": "#f2f2f2"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "all",
        "stylers": [
            {
                "saturation": -100
            },
            {
                "lightness": 45
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "transit",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "all",
        "stylers": [
            {
                "color": "#ed61b6"
            },
            {
                "visibility": "on"
            }
        ]
    }
]';


        $temp_text = preg_replace( "/\r|\n/", "", $temp_text );;






        $ser_data = 'a:50:{s:14:"portfolio_page";s:0:"";s:11:"mail_method";s:7:"wp_mail";s:12:"blur_ammount";s:1:"0";s:23:"menu_enviroment_opacity";s:3:"100";s:26:"content_enviroment_opacity";s:2:"30";s:24:"secondary_content_height";s:3:"450";s:13:"gmaps_api_key";s:39:"AIzaSyAckyD3QGvcqBv07cmFAcFraXXwuWZMyxo";s:13:"gmaps_styling";s:'.strlen($temp_text).':"'.$temp_text.'";s:13:"content_align";s:20:"content-align-center";s:16:"page_title_align";s:22:"page-title-align-right";s:16:"page_title_style";s:18:"page-title-style-2";s:12:"width_column";s:3:"100";s:9:"width_gap";s:2:"30";s:17:"width_blur_margin";s:1:"0";s:16:"width_section_bg";s:0:"";s:24:"content_add_extra_pixels";s:2:"20";s:12:"border_width";s:1:"0";s:12:"border_color";s:7:"#ffffff";s:37:"content_section_title_two_lines_space";s:1:"0";s:43:"content_section_title_two_lines_use_divider";s:0:"";s:49:"content_section_title_two_lines_use_divider_color";s:0:"";s:9:"menu_type";s:12:"menu-type-17";s:14:"menu_is_sticky";s:3:"off";s:28:"menu_horizontal_shadow_style";s:8:"shadow_2";s:12:"social_icons";s:168:"[{"link":"#","icon":"pinterest"},{"link":"#","icon":"instagram"},{"link":"#","icon":"facebook-square"},{"link":"#","icon":"twitter"},{"link":"#","icon":"youtube-play"}]";s:23:"meta_options_post_types";b:0;s:4:"logo";s:'.strlen($logo_url_beauty_salon).':"'.$logo_url_beauty_salon.'";s:6:"logo_x";s:7:"default";s:13:"logo_x_custom";s:0:"";s:6:"logo_y";s:15:"custom_position";s:10:"logo_width";s:0:"";s:11:"logo_height";s:0:"";s:13:"logo_y_custom";s:3:"100";s:17:"copyright_textbox";s:0:"";s:31:"copyright_textbox_heading_style";s:9:"h-group-1";s:38:"footer_copyright_textbox_heading_style";s:2:"h6";s:9:"font_data";s:3852:"headings_font=Oswald&h1_weight=500&h1_size=71&h1_line_height=1.15&h1_responsive_slider=30&h2_weight=500&h2_size=51&h2_line_height=1.15&h2_responsive_slider=25&h3_weight=500&h3_size=42&h3_line_height=1.15&h3_responsive_slider=20&h4_weight=500&h4_size=34&h4_line_height=1.15&h4_responsive_slider=10&h5_weight=500&h5_size=25&h5_line_height=1.15&h5_responsive_slider=0&h6_weight=500&h6_size=18&h6_line_height=1.57&h6_responsive_slider=0&h-group-1_weight=500&h-group-1_size=14&h-group-1_line_height=1.54&h-group-1_responsive_slider=0&h-group-2_weight=500&h-group-2_size=28&h-group-2_line_height=1.28&h-group-2_responsive_slider=0&body_font=Merriweather&p_weight=regular&p_size=15&p_line_height=1.92&p_color=%23777777&p_color_for_light=%23bbbbbb&hyperlink_weight=700&font-group-1_weight=italic&font-group-1_size=14&font-group-1_line_height=1.42&font-group-2_weight=700&font-group-2_size=17&font-group-2_line_height=1.42&font-group-3_weight=700italic&font-group-3_size=13&font-group-3_line_height=1.27&font-group-4_weight=italic&font-group-4_size=16&font-group-4_line_height=1.42&font-group-5_weight=regular&font-group-5_size=16&font-group-5_line_height=1.42&font-group-6_weight=regular&font-group-6_size=15&font-group-6_line_height=1.46&font-group-7_weight=italic&font-group-7_size=16&font-group-7_line_height=1.46&font-group-8_weight=regular&font-group-8_size=15&font-group-8_line_height=1.55&font-group-9_weight=regular&font-group-9_size=16&font-group-9_line_height=1.8&font-group-10_weight=regular&font-group-10_size=17&font-group-10_line_height=1.68&font-group-11_weight=900&font-group-11_size=24&font-group-11_line_height=1.29&font-group-12_weight=regular&font-group-12_size=15&font-group-12_line_height=1.46&blockquote_weight=italic&blockquote_size=20&blockquote_line_height=1.58&menu_font=Oswald&menu_weight=regular&menu_size=20&menu_line_height=1&copyright_font_link_to=headings&copyright_weight=200&copyright_size=10&copyright_line_height=1.4&page_title_font=Oswald&page_title_weight=200&page_title_size=70&page_title_line_height=1.14&page_title_color=%23FFFFFF&page_title_responsive_slider=0&page_title_orientation=horizontal&section_title_two_font=Oswald&section_title_two_first_weight=700&section_title_two_first_size=90&section_title_two_first_line_height=1&section_title_two_first_color=%23222222&section_title_two_first_color_for_light=%23ffffff&section_title_two_first_responsive_slider=30&section_title_two_second_font=Seaweed+Script&section_title_two_second_weight=regular&section_title_two_second_size=25&section_title_two_second_line_height=1&section_title_two_second_color=%23222222&section_title_two_second_color_for_light=%23ffffff&section_title_two_second_responsive_slider=0&line_spacing=15&section_title_two_number_font=Oswald&section_title_two_number_weight=200&section_title_two_number_size=90&section_title_two_number_line_height=1&section_title_two_number_color=%23e677a1&section_title_two_number_color_for_light=%23e677a1&section_title_two_divider_divider_style=style-fullwidth&section_title_two_divider_color=%23444444&section_title_two_divider_color_for_light=%23ffffff&title_divider_spacing_two=20&section_title_one_first_font=Lato&section_title_one_first_weight=100&section_title_one_first_size=25&section_title_one_first_line_height=1.28&section_title_one_first_color=%23444444&section_title_one_first_color_for_light=%23ffffff&section_title_one_first_responsive_slider=0&section_title_one_divider_divider_style=style-fullwidth&section_title_one_divider_color=%23444444&section_title_one_divider_color_for_light=%23ffffff&title_divider_spacing=20&home_slider_font_link_to=headings&home_slider_weight=200&home_slider_size=50&home_slider_line_height=1.20&home_slider_color=%23ffffff&home_slider_color_for_light=%23222222&home_number_font_link_to=headings&home_number_weight=200&home_number_size=135&home_number_line_height=1";s:32:"typography_sidebar_heading_style";s:2:"h6";s:31:"typography_footer_heading_style";s:2:"h4";s:24:"content_enviroment_style";s:15:"body-style-dark";s:17:"greyscale_ammount";s:1:"0";s:21:"section_margin_bottom";s:2:"30";s:15:"highlight_color";s:7:"#e677a1";s:22:"enable_bordered_design";s:2:"on";s:23:"enable_native_scrollbar";s:2:"on";s:13:"bg_transition";s:9:"slidedown";s:11:"enable_ajax";s:2:"on";s:13:"bg_isparallax";s:3:"off";s:18:"custom_css_post_id";i:-1;s:18:"nav_menu_locations";a:2:{s:7:"primary";i:'.$menu_id.';s:6:"social";i:0;}}';





        qucreative_import_demo_update_preset($ser_data,array(

            'preseter_slug' => $demo_slug,
            'preseter_name' => $demo_name,
        ));































}




































$demo_slug = 'spa';
$demo_name = 'Spa';
if($_REQUEST['demo']==$demo_slug) {














    $img_name = '500x500.jpg';
    $img_url = QUCREATIVE_THEME_URL . 'placeholders/500x500.jpg';


    $img_path = QUCREATIVE_THEME_DIR . 'placeholders/500x500.jpg';


    $new_path = $upload_dir_path . '/' . $img_name;

    try {

        if (!copy($img_path, $new_path)) {

        } else {
            $img_url = $upload_dir_url . '/' . $img_name;
            $new_path = $img_path;
        }
    } catch (Exception $e) {
        print_rr($e);
    }





	$attach_id = qucreative_import_demo_create_attachment($img_url, '1', $new_path);


	$qucreative_theme_data['import_demo_last_attach_id'] = $attach_id;







	$term = qucreative_import_demo_create_term_if_it_does_not_exist(array(
		'description' => '',
		'term_name' => $demo_name,
		'slug' => $demo_slug,
		'taxonomy' => $taxonomy,

	));


	if (is_array($term)) {

		$term_id = $term['term_id'];
	} else {

		$term_id = $term->term_id;
	}




	$args = array(

            'post_title' => 'Rocks  ',
            'post_content' => '',
            'post_status' => 'publish',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
        );


        $port_id = qucreative_import_demo_insert_post_complete($args);





        $arr_names = array(
            'Coconuts ',
            'Flowers ',
            'Salt ',
            'Massage',
            'Nature',
            'Honey',
            'Relax',

        );



        foreach ($arr_names as $it_name){

            $args = array(

                'post_title' => $it_name,
                'post_content' => '',
                'post_status' => 'publish',
                'img_url' => $img_url,
                'img_path'=>$new_path,
                'term' => $term,
                'taxonomy' => $taxonomy,
                'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
            );

            $port_id = qucreative_import_demo_insert_post_complete($args);
        }















































        $cont = '[vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column width="1/3"][antfarm_bullet_feature style="style-1" feature="image" title="Total relaxation" media="'.$img_url.'" read_more="Read more" button_style="{``style``:``style-hallowblack``,``padding``:````,``rounded``:``rounded``}" heading="h5" button_padding="padding-medium" button_rounded="on"]Nam id dolor eget metus consectetur scelerisque. Curabitur lobortis felis varius porta congue. Proin vel convallis orci. Integer iaculis vitae erat sed efficitur.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-1" feature="image" title="Body recharging" media="'.$img_url.'" read_more="Read more" button_style="style-hallowblack" heading="h5" button_padding="padding-medium" button_rounded="on"]Nam id dolor eget metus consectetur scelerisque. Curabitur lobortis felis varius porta congue. Proin vel convallis orci. Integer iaculis vitae erat sed efficitur.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-1" feature="image" title="Best procedures" media="'.$img_url.'" read_more="Read more" button_style="style-hallowblack" heading="h5" button_padding="padding-medium" button_rounded="on"]Nam id dolor eget metus consectetur scelerisque. Curabitur lobortis felis varius porta congue. Proin vel convallis orci. Integer iaculis vitae erat sed efficitur.[/antfarm_bullet_feature][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_sc_video_text bg="'.$img_url.'" overlay_opacity="50" featured_media_type="image" image="'.$img_url.'" title="The ultimate pampering" heading="h4"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec non blandit augue, ac placerat purus. Donec non augue a risus ornare blandit at vitae lorem. Nunc vel malesuada ex. Maecenas quis mauris libero. Aenean non vehicula lectus. Nunc faucibus sagittis enim. Vivamus aliquam eros at convallis fringilla.

[antfarm_button style="style-highlight-dark" padding="" rounded="rounded" the_icon=""]Create appointment[/antfarm_button] [antfarm_button style="style-hallowblack" padding="" rounded="rounded" the_icon=""]Client reviews[/antfarm_button][/antfarm_sc_video_text][/vc_column][/vc_row][/vc_section][vc_section shape="" type="image" section_bg_image="" style="light"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="heading-is-center" line1="A few reasons this is" line2="The Best Spa"][/vc_column][/vc_row][vc_row][vc_column][antfarm_image_box media="'.$img_url.'" aligment="left" text_aligment="text-align-left" heading="Latest procedures" heading_style="h4"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec non blandit augue, ac placerat purus. Donec non augue a risus ornare blandit at vitae lorem. Nunc vel malesuada ex. Maecenas quis mauris libero. Aenean non vehicula lectus. Nunc faucibus sagittis enim. Vivamus aliquam eros at convallis fringilla.[/antfarm_image_box][antfarm_image_box media="'.$img_url.'" aligment="right" text_aligment="text-align-right" heading="Highly qualified staff" heading_style="h4"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec non blandit augue, ac placerat purus. Donec non augue a risus ornare blandit at vitae lorem. Nunc vel malesuada ex. Maecenas quis mauris libero. Aenean non vehicula lectus. Nunc faucibus sagittis enim. Vivamus aliquam eros at convallis fringilla.[/antfarm_image_box][antfarm_image_box media="'.$img_url.'" aligment="left" text_aligment="text-align-left" heading="Luxurious facility" heading_style="h4"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec non blandit augue, ac placerat purus. Donec non augue a risus ornare blandit at vitae lorem. Nunc vel malesuada ex. Maecenas quis mauris libero. Aenean non vehicula lectus. Nunc faucibus sagittis enim. Vivamus aliquam eros at convallis fringilla.[/antfarm_image_box][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_sc_social_links media="'.$img_url.'" overlay_opacity="50" title_1="LIKE US ON" social_1="Facebook" icon_1="facebook-square" title_2="FOLLOW US ON" social_2="Twitter" icon_2="twitter" title_3="PIN THIS ON" social_3="Pinterest" icon_3="pinterest" title_4="APPRECIATE US ON" social_4="Google+" icon_4="google-plus"][/vc_column][/vc_row][/vc_section][vc_section shape="" type="image" section_bg_image="" style="light"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="heading-is-center" line1="Some of our amazing" line2="Procedures"][/vc_column][/vc_row][vc_row][vc_column width="1/3"][antfarm_bullet_feature style="style-1" feature="image" text_aligment="align-left" title="Lava stones" media="'.$img_url.'" read_more="Create appointment" button_style="{``style``:``style-hallowblack``,``padding``:````,``rounded``:````}" heading="h5" button_padding="padding-medium" button_rounded="on"]Nam id dolor eget metus consectetur scelerisque. Curabitur lobortis felis varius porta congue. Proin vel convallis orci. Integer iaculis vitae erat sed efficitur.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-1" feature="image" text_aligment="align-left" title="Facial masks" media="'.$img_url.'" read_more="Create appointment" button_style="{``style``:``style-hallowblack``,``padding``:````,``rounded``:``rounded``}" heading="h5" button_padding="padding-medium" button_rounded="on"]Nam id dolor eget metus consectetur scelerisque. Curabitur lobortis felis varius porta congue. Proin vel convallis orci. Integer iaculis vitae erat sed efficitur.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-1" feature="image" text_aligment="align-left" title="Aromotherapy" media="'.$img_url.'" read_more="Create appointment" button_style="style-hallowblack" heading="h5" button_padding="padding-medium" button_rounded="on"]Nam id dolor eget metus consectetur scelerisque. Curabitur lobortis felis varius porta congue. Proin vel convallis orci. Integer iaculis vitae erat sed efficitur.[/antfarm_bullet_feature][/vc_column][/vc_row][vc_row][vc_column width="1/3"][antfarm_bullet_feature style="style-1" feature="image" text_aligment="align-left" title="Regenerating peeling" media="'.$img_url.'" read_more="Create appointment" button_style="{``style``:``style-hallowblack``,``padding``:````,``rounded``:``rounded``}" heading="h5" button_padding="padding-medium" button_rounded="on"]Nam id dolor eget metus consectetur scelerisque. Curabitur lobortis felis varius porta congue. Proin vel convallis orci. Integer iaculis vitae erat sed efficitur.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-1" feature="image" text_aligment="align-left" title="Relaxation massage" media="'.$img_url.'" read_more="Create appointment" button_style="{``style``:``style-hallowblack``,``padding``:````,``rounded``:``rounded``}" heading="h5" button_padding="padding-medium" button_rounded="on"]Nam id dolor eget metus consectetur scelerisque. Curabitur lobortis felis varius porta congue. Proin vel convallis orci. Integer iaculis vitae erat sed efficitur.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-1" feature="image" text_aligment="align-left" title="Indian therapy" media="'.$img_url.'" read_more="Create appointment" button_style="{``style``:``style-hallowblack``,``padding``:````,``rounded``:``rounded``}" heading="h5" button_padding="padding-medium" button_rounded="on"]Nam id dolor eget metus consectetur scelerisque. Curabitur lobortis felis varius porta congue. Proin vel convallis orci. Integer iaculis vitae erat sed efficitur.[/antfarm_bullet_feature][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_sc_blockquote bg="'.$img_url.'" overlay_opacity="50" author="STEVE JOBS"]
<h3> Design is not just what it looks like and feels like. Design is how it works.</h3>
[/antfarm_sc_blockquote][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="heading-is-center" line1="You should definitely" line2="Choose Qu"][/vc_column][/vc_row][vc_row][vc_column width="1/2"][vc_single_image image="'.$qucreative_theme_data['import_demo_last_attach_id'].'" img_size="full" alignment="right"][/vc_column][vc_column width="1/2"][vc_empty_space height="100px"][vc_column_text]
<h5>The best choice for your body</h5>
[antfarm_divider height="30" style="style-1"][/antfarm_divider]

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris non lorem ante. Vestibulum commodo eleifend hendrerit. Donec varius lectus a lacus dictum lacinia. Ut mattis ultrices viverra. Curabitur turpis diam, ultrices ut quam vel, accumsan suscipit felis. Phasellus vitae posuere orci, ac gravida lorem. Phasellus tincidunt, mauris ut hendrerit luctus, mauris odio tristique enim, dictum tristique lacus sem id lacus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Orci varius natoque penatibus et magnis.[/vc_column_text][vc_row_inner][vc_column_inner width="1/2"][antfarm_list titles="%5B%7B%22faicon%22%3A%22check%22%2C%22text%22%3A%22The%20best%20equipment%22%7D%2C%7B%22faicon%22%3A%22check%22%2C%22text%22%3A%22The%20ultimate%20procedures%22%7D%2C%7B%22faicon%22%3A%22check%22%2C%22text%22%3A%22Highly%20qualified%20staff%22%7D%5D"][/vc_column_inner][vc_column_inner width="1/2"][antfarm_list titles="%5B%7B%22faicon%22%3A%22check%22%2C%22text%22%3A%22Luxurious%20location%22%7D%2C%7B%22faicon%22%3A%22check%22%2C%22text%22%3A%22Free%20client%20parking%22%7D%2C%7B%22faicon%22%3A%22check%22%2C%22text%22%3A%22Big%20discounts%20for%20groups%22%7D%5D"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row][vc_column width="1/4"][antfarm_progress_bar style="rect" title="HAPPY CLIENTS" progress="200000" convert_1000_to_k="on" icon="icon-happy"][/antfarm_progress_bar][/vc_column][vc_column width="1/4"][antfarm_progress_bar style="rect" title="PROCEDURES" progress="32" convert_1000_to_k="`{`object Object`}`" icon="icon-layers"][/antfarm_progress_bar][/vc_column][vc_column width="1/4"][antfarm_progress_bar style="rect" title="LOCATIONS" progress="09" convert_1000_to_k="`{`object Object`}`" icon="icon-map"][/antfarm_progress_bar][/vc_column][vc_column width="1/4"][antfarm_progress_bar style="rect" title="AWESOME AWARDS" progress="64" convert_1000_to_k="`{`object Object`}`" icon="icon-trophy"][/antfarm_progress_bar][/vc_column][/vc_row][/vc_section]';





        $args = array(
            'post_title'    => wp_strip_all_tags( 'Qu '.$demo_name ),
            'post_content'  => $cont,
            'post_status'   => 'publish',
            'post_author'   => 1,
            'post_type'   => 'page',

        );


        $page_id = wp_insert_post( $args );





        update_post_meta(  $page_id ,'qucreative_'.'meta_custom_section_margin_bottom','0');



        update_post_meta(  $page_id ,'qucreative_'.'meta_is_fullscreen','on');
        update_post_meta(  $page_id ,'qucreative_'.'meta_is_fullscreen_stretch','contain');
        update_post_meta(  $page_id ,'qucreative_'.'meta_custom_title',' ');
        update_post_meta(  $page_id ,'qucreative_'.'meta_bg_image','#ffffff');












        update_option( 'page_on_front', $page_id );
        update_option( 'show_on_front', 'page' );















	$option_name = 'sidebars_widgets';
	$option_value = 'a:4:{s:19:"wp_inactive_widgets";a:0:{}s:9:"sidebar-1";a:0:{}s:14:"sidebar-footer";a:4:{i:0;s:6:"text-3";i:1;s:15:"antfarm_links-2";i:2;s:16:"antfarm_social-2";i:3;s:25:"antfarm_lightboxgallery-2";}s:13:"array_version";i:3;}';



	qucreative_import_demo_update_widget($option_name,$option_value);






	$option_name = 'widget_search';
	$option_value = 'a:3:{i:6;a:1:{s:5:"title";s:0:"";}i:7;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;}';

	qucreative_import_demo_update_widget($option_name,$option_value);






	$option_name = 'widget_antfarm_social';
	$option_value = 'a:2:{i:2;a:2:{s:5:"title";s:16:"Let\'s Get Social";s:8:"repeater";s:187:"[{"title":"Like us on Facebook","link":"#","icon":"facebook"},{"title":"Share us on Pinterest","link":"#","icon":"pinterest"},{"title":"Follow us on Twitter","link":"#","icon":"twitter"}]";}s:12:"_multiwidget";i:1;}';

	qucreative_import_demo_update_widget($option_name,$option_value);



	$option_name = 'widget_antfarm_links';
	$option_value = 'a:2:{i:2;a:2:{s:5:"title";s:12:"Useful Links";s:8:"repeater";s:164:"[{"title":"The creative concept","link":"#"},{"title":"Our clients say","link":"#"},{"title":"Top three awards","link":"#"},{"title":"The hall of fame","link":"#"}]";}s:12:"_multiwidget";i:1;}';

	qucreative_import_demo_update_widget($option_name,$option_value);



	$option_name = 'widget_antfarm_lightboxgallery';
	$option_value = 'a:2:{i:2;a:4:{s:5:"title";s:11:"Spa Gallery";s:5:"count";s:1:"8";s:10:"nr_columns";s:1:"4";s:4:"cats";a:1:{i:0;s:'.strlen($term_id).':"'.$term_id.'";}}s:12:"_multiwidget";i:1;}';

	qucreative_import_demo_update_widget($option_name,$option_value);






	$option_name = 'widget_meta';
	$option_value = 'a:2:{i:3;a:1:{s:5:"title";s:4:"Meta";}s:12:"_multiwidget";i:1;}';

	qucreative_import_demo_update_widget($option_name,$option_value);



	$option_name = 'widget_text';
	$option_value = 'a:3:{i:1;a:0:{}i:3;a:4:{s:5:"title";s:13:"About The Spa";s:4:"text";s:179:"Duis nec nulla turpis. Nulla lacinia laoreet odio, non lacinia nisse felimml malesuada vel. Aenean malesuada imense fermentum motivi par que. Lorem ipsum dolor sit amet mauris ce.";s:6:"filter";b:1;s:6:"visual";b:1;}s:12:"_multiwidget";i:1;}';

	qucreative_import_demo_update_widget($option_name,$option_value);






	$option_name = 'widget_archives';
	$option_value = 'a:2:{i:3;a:3:{s:5:"title";s:8:"Archives";s:5:"count";i:0;s:8:"dropdown";i:0;}s:12:"_multiwidget";i:1;}';

	qucreative_import_demo_update_widget($option_name,$option_value);








        $temp_text = '';


        $temp_text = preg_replace( "/\r|\n/", "", $temp_text );;






        $ser_data = 'a:50:{s:14:"portfolio_page";s:0:"";s:11:"mail_method";s:7:"wp_mail";s:12:"blur_ammount";s:2:"26";s:23:"menu_enviroment_opacity";s:3:"100";s:26:"content_enviroment_opacity";s:1:"0";s:24:"secondary_content_height";s:3:"500";s:13:"gmaps_api_key";s:0:"";s:13:"gmaps_styling";s:0:"";s:13:"content_align";s:20:"content-align-center";s:16:"page_title_align";s:22:"page-title-align-right";s:16:"page_title_style";s:18:"page-title-style-2";s:12:"width_column";s:2:"70";s:9:"width_gap";s:2:"30";s:17:"width_blur_margin";s:1:"0";s:16:"width_section_bg";s:0:"";s:24:"content_add_extra_pixels";s:2:"25";s:12:"border_width";s:1:"0";s:12:"border_color";s:7:"#ffffff";s:37:"content_section_title_two_lines_space";s:1:"0";s:43:"content_section_title_two_lines_use_divider";b:0;s:49:"content_section_title_two_lines_use_divider_color";s:7:"#303030";s:9:"menu_type";s:12:"menu-type-18";s:14:"menu_is_sticky";s:2:"on";s:28:"menu_horizontal_shadow_style";s:8:"shadow_1";s:12:"social_icons";s:2:"[]";s:23:"meta_options_post_types";b:0;s:4:"logo";s:'.strlen($logo_spa).':"'.$logo_spa.'";s:6:"logo_x";s:7:"default";s:13:"logo_x_custom";s:0:"";s:6:"logo_y";s:7:"default";s:10:"logo_width";s:0:"";s:11:"logo_height";s:0:"";s:13:"logo_y_custom";s:0:"";s:17:"copyright_textbox";s:0:"";s:31:"copyright_textbox_heading_style";s:9:"h-group-1";s:38:"footer_copyright_textbox_heading_style";s:2:"h6";s:9:"font_data";s:3921:"headings_font=Playfair+Display&h1_weight=700&h1_size=70&h1_line_height=1.15&h1_responsive_slider=30&h2_weight=700&h2_size=50&h2_line_height=1.15&h2_responsive_slider=25&h3_weight=700&h3_size=40&h3_line_height=1.15&h3_responsive_slider=20&h4_weight=700&h4_size=30&h4_line_height=1.15&h4_responsive_slider=15&h5_weight=700&h5_size=21&h5_line_height=1.15&h5_responsive_slider=&h6_weight=700&h6_size=16&h6_line_height=1.57&h6_responsive_slider=0&h-group-1_weight=700&h-group-1_size=11&h-group-1_line_height=1.54&h-group-1_responsive_slider=0&h-group-2_weight=700&h-group-2_size=25&h-group-2_line_height=1.28&h-group-2_responsive_slider=0&body_font=Open+Sans&p_weight=regular&p_size=14&p_line_height=1.92&p_color=%23777777&p_color_for_light=%23bbbbbb&hyperlink_weight=600&font-group-1_weight=600italic&font-group-1_size=15&font-group-1_line_height=1.42&font-group-2_weight=600&font-group-2_size=15&font-group-2_line_height=1.42&font-group-3_weight=600italic&font-group-3_size=12&font-group-3_line_height=1.27&font-group-4_weight=600italic&font-group-4_size=15&font-group-4_line_height=1.42&font-group-5_weight=600&font-group-5_size=15&font-group-5_line_height=1.42&font-group-6_weight=regular&font-group-6_size=14&font-group-6_line_height=1.46&font-group-7_weight=italic&font-group-7_size=14&font-group-7_line_height=1.46&font-group-8_weight=600&font-group-8_size=14&font-group-8_line_height=1.55&font-group-9_weight=regular&font-group-9_size=16&font-group-9_line_height=1.8&font-group-10_weight=600&font-group-10_size=17&font-group-10_line_height=1.68&font-group-11_weight=800&font-group-11_size=25&font-group-11_line_height=1.29&font-group-12_weight=regular&font-group-12_size=14&font-group-12_line_height=1.46&blockquote_weight=italic&blockquote_size=18&blockquote_line_height=1.58&menu_font=Playfair+Display&menu_weight=700&menu_size=18&menu_line_height=1&copyright_font_link_to=headings&copyright_weight=regular&copyright_size=10&copyright_line_height=1.4&page_title_font=Playfair+Display&page_title_weight=regular&page_title_size=70&page_title_line_height=1.14&page_title_color=%23FFFFFF&page_title_responsive_slider=0&page_title_orientation=horizontal&section_title_two_font=Great+Vibes&section_title_two_first_weight=regular&section_title_two_first_size=40&section_title_two_first_line_height=1&section_title_two_first_color=%23aaaaaa&section_title_two_first_color_for_light=%23ffffff&section_title_two_first_responsive_slider=25&section_title_two_second_font=Playfair+Display&section_title_two_second_weight=700&section_title_two_second_size=80&section_title_two_second_line_height=1&section_title_two_second_color=%23c5dc46&section_title_two_second_color_for_light=%23c5dc46&section_title_two_second_responsive_slider=30&line_spacing=-7&section_title_two_number_font=Lato&section_title_two_number_weight=100&section_title_two_number_size=130&section_title_two_number_line_height=1&section_title_two_number_color=%23eeeeee&section_title_two_number_color_for_light=%23444444&section_title_two_divider_enable=on&section_title_two_divider_divider_style=style-box&section_title_two_divider_color=%23444444&section_title_two_divider_color_for_light=%23ffffff&title_divider_spacing_two=23&section_title_one_first_font=Lato&section_title_one_first_weight=100&section_title_one_first_size=25&section_title_one_first_line_height=1.28&section_title_one_first_color=%23444444&section_title_one_first_color_for_light=%23ffffff&section_title_one_first_responsive_slider=0&section_title_one_divider_divider_style=style-fullwidth&section_title_one_divider_color=%23444444&section_title_one_divider_color_for_light=%23ffffff&title_divider_spacing=20&home_slider_font_link_to=headings&home_slider_weight=regular&home_slider_size=50&home_slider_line_height=1.20&home_slider_color=%23ffffff&home_slider_color_for_light=%23222222&home_number_font_link_to=headings&home_number_weight=regular&home_number_size=135&home_number_line_height=1";s:32:"typography_sidebar_heading_style";s:2:"h5";s:31:"typography_footer_heading_style";s:2:"h5";s:24:"content_enviroment_style";s:15:"body-style-dark";s:17:"greyscale_ammount";s:1:"0";s:21:"section_margin_bottom";s:2:"30";s:15:"highlight_color";s:7:"#c6dc47";s:22:"enable_bordered_design";s:2:"on";s:23:"enable_native_scrollbar";s:3:"off";s:13:"bg_transition";s:9:"slidedown";s:11:"enable_ajax";s:2:"on";s:13:"bg_isparallax";s:3:"off";s:18:"custom_css_post_id";i:-1;s:18:"nav_menu_locations";a:2:{s:7:"primary";i:'.$menu_id.';s:6:"social";i:0;}}';





        qucreative_import_demo_update_preset($ser_data,array(

            'preseter_slug' => $demo_slug,
            'preseter_name' => $demo_name,
        ));
































}
































$demo_slug = 'gym';
$demo_name = 'Fitness';
if($_REQUEST['demo']==$demo_slug) {







	// -- gym demo no widgets







    $img_name = '500x500.jpg';
    $img_url = QUCREATIVE_THEME_URL . 'placeholders/500x500.jpg';


    $img_path = QUCREATIVE_THEME_DIR . 'placeholders/500x500.jpg';


    $new_path = $upload_dir_path . '/' . $img_name;

    try {

        if (!copy($img_path, $new_path)) {

        } else {
            $img_url = $upload_dir_url . '/' . $img_name;
            $new_path = $img_path;
        }
    } catch (Exception $e) {
        print_rr($e);
    }





    $the_slug = $demo_slug;
    $args = array(
        'name'        => $the_slug,
        'post_type'   => 'page',
        'post_status' => 'publish',
        'numberposts' => 1
    );
    $my_posts = get_posts($args);





    if ($my_posts) {

    } else {



























    }






    $cont = '[vc_section shape="" type="image" section_bg_image="" style="dark"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="01" line1="get" line2="STRONGER"][/vc_column][/vc_row][vc_row][vc_column width="1/3"][antfarm_bullet_feature style="style-1" feature="image" title="Mental Strength" media="'.$img_url.'" read_more="READ MORE" button_style="{``style``:``style-hallowblack``,``padding``:````,``rounded``:````}" heading="h5"]Maecenas id commodo arcu. Sed pharetra enim sit amet semper viverra. Nulla eu augue eu ante tristique facilisis vel ac leo auctor mauris.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-1" feature="image" title="Physical Strentgh" media="'.$img_url.'" read_more="READ MORE" button_style="{``style``:``style-hallowblack``,``padding``:````,``rounded``:````}" heading="h5"]Donec vitae lorem a magna sagittis convallis. Nullam id augue in leo pharetra ultrices. Ut ut sollicitudin nibh. Suspendisse a lorem at mauris mattis.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-1" feature="image" title="Time To Get Fit" media="'.$img_url.'" read_more="READ MORE" button_style="{``style``:``style-hallowblack``,``padding``:````,``rounded``:````}" heading="h5"]Nullam venenatis pellentesque facilisis. Aliquam erat volutpat. Aliquam sagittis ligula eu nisl laoreet, vitae egestas lorem tristique. Nulla iaculis felis.[/antfarm_bullet_feature][/vc_column][/vc_row][/vc_section][vc_section shape="" type="image" section_bg_image="'.$img_url.'" bg_hide_on_tablet="true" bg_hide_on_mobile="true" style="light"][vc_row][vc_column width="1/2"][/vc_column][vc_column width="1/2"][antfarm_section_title style="two-lines" aligment="" line1="it\'s" line2="THE BEST"][/vc_column][/vc_row][vc_row][vc_column width="1/2"][/vc_column][vc_column width="1/2"][antfarm_bullet_feature style="style-4" feature="feature-type-fa" icon_aligment="" icon_theme=" " form="form-hexagon" title="State of the art equipment" faicon="leaf" heading="h5" aligment=""]Maecenas id commodo arcu. Sed pharetra enim sit amet semper viverra. Nulla eu augue eu ante tristique facilisis vel ac leo. Sed auctor urna quis ipsum finibus consequat. Duis pretium lacinia leo vel porttitor.[/antfarm_bullet_feature][vc_empty_space height="50px"][antfarm_bullet_feature style="style-4" feature="feature-type-fa" icon_aligment="" icon_theme=" " form="form-hexagon" title="The most awesome classes" faicon="flag" heading="h5" aligment=""]Etiam quis finibus nunc, lacinia venenatis nulla. Duis euismod felis id placerat accumsan. Sed ut nisi ligula. Duis dignissim tincidunt lorem ac rhoncus. Lorem ipsum dolor sit amet, consectetur adipiscing elit.[/antfarm_bullet_feature][vc_empty_space height="50px"][antfarm_bullet_feature style="style-4" feature="feature-type-fa" icon_aligment="" icon_theme=" " form="form-hexagon" title="The best trainers" faicon="thumbs-o-up" heading="h5" aligment=""]Proin arcu orci, volutpat nec lectus id, aliquam condimentum dolor. Nunc dignissim, lacus sit amet laoreet pharetra, nisi metus dictum tellus, vitae accumsan quam nisl pharetra orci. Nulla eget turpis a nunc.[/antfarm_bullet_feature][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_sc_three_cols bg_1="#91AA9D" overlay_opacity_1="50" title_1="Weight Lifting" content_1="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eget turpis hendrerit, accumsan orci vel, rutrum eros." read_more_text_1="READ MORE" read_more_link_1="#" button_style_1="{``style``:``style-hallowblack``,``padding``:``padding-medium``,``rounded``:````}" bg_2="#3E606F" overlay_opacity_2="50" title_2="Aerobics Training" content_2="Praesent id rhoncus elit. Vestibulum elementum finibus elit a tincidunt. Nam semper risus commodo, viverra massa quis." read_more_text_2="READ MORE" read_more_link_2="#" button_style_2="{``style``:``style-hallowblack``,``padding``:``padding-medium``,``rounded``:````}" bg_3="#193441" overlay_opacity_3="50" title_3="Speed Training" content_3="Cras egestas augue neque, vel vehicula mauris pharetra non. Aliquam felis metus, molestie nec posuere facilisis lorem certimas." read_more_text_3="READ MORE" read_more_link_3="#" button_style_3="{``style``:``style-hallowblack``,``padding``:``padding-medium``,``rounded``:````}" box_width="300"][/vc_column][/vc_row][/vc_section][vc_section shape="" type="image" section_bg_image="" style="light"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="03" line1="pricing" line2="PACKAGES"][/vc_column][/vc_row][vc_row][vc_column width="1/3"][vc_empty_space height="50px"][antfarm_bullet_feature style="style-4" feature="feature-type-fa" icon_aligment="" icon_theme=" " form="form-default" title="Get stronger" faicon="trophy" heading="h5" aligment="align-right"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. In faucibus turpis non arcu accumsan luctus. Class aptent taciti sociosqu ad litora torquent.[/antfarm_bullet_feature][vc_empty_space height="50px"][antfarm_bullet_feature style="style-4" feature="feature-type-fa" icon_aligment="" icon_theme=" " form="form-default" title="Get healthier" faicon="heart" heading="h5" aligment="align-right"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. In faucibus turpis non arcu accumsan luctus. Class aptent taciti sociosqu ad litora torquent.[/antfarm_bullet_feature][vc_empty_space height="50px"][antfarm_bullet_feature style="style-4" feature="feature-type-fa" icon_aligment="" icon_theme=" " form="form-default" title="It\'s up to you" faicon="key" heading="h5" aligment="align-right"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. In faucibus turpis non arcu accumsan luctus. Class aptent taciti sociosqu ad litora torquent.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_image_for_sideways media="'.$img_url.'"][/vc_column][vc_column width="1/3"][vc_empty_space height="50px"][antfarm_bullet_feature style="style-4" feature="feature-type-fa" icon_aligment="icon-align-right" icon_theme=" " form="form-default" title="Conquer the world" faicon="thumbs-up" heading="h5" aligment=""]Lorem ipsum dolor sit amet, consectetur adipiscing elit. In faucibus turpis non arcu accumsan luctus. Class aptent taciti sociosqu ad litora torquent.[/antfarm_bullet_feature][vc_empty_space height="50px"][antfarm_bullet_feature style="style-4" feature="feature-type-fa" icon_aligment="icon-align-right" icon_theme=" " form="form-default" title="Go further" faicon="paper-plane" heading="h5" aligment=""]Lorem ipsum dolor sit amet, consectetur adipiscing elit. In faucibus turpis non arcu accumsan luctus. Class aptent taciti sociosqu ad litora torquent.[/antfarm_bullet_feature][vc_empty_space height="50px"][antfarm_bullet_feature style="style-4" feature="feature-type-fa" icon_aligment="icon-align-right" icon_theme=" " form="form-default" title="The time is now" faicon="clock-o" heading="h5" aligment=""]Lorem ipsum dolor sit amet, consectetur adipiscing elit. In faucibus turpis non arcu accumsan luctus. Class aptent taciti sociosqu ad litora torquent.[/antfarm_bullet_feature][/vc_column][/vc_row][vc_row][vc_column width="1/3"][antfarm_pricing_table title="SILVER MEMBERSHIP" is_featured="off" price="$138" quota="MONTHLY" items="%5B%7B%22item%22%3A%22Three%20sessions%20weekly%22%7D%2C%7B%22item%22%3A%22Cardio%20access%22%7D%2C%7B%22item%22%3A%22Fitness%20studio%20access%22%7D%2C%7B%22item%22%3A%22Kickboxing%20gym%20access%22%7D%2C%7B%22item%22%3A%22Swimming%20pool%20access%22%7D%5D" sign_up_text="SIGN UP" sign_up_link="#"][/vc_column][vc_column width="1/3"][antfarm_pricing_table title="VIP MEMBERSHIP" is_featured="on" price="$745" quota="MONTHLY" items="%5B%7B%22item%22%3A%22Unlimited%20sessions%22%7D%2C%7B%22item%22%3A%22Access%20to%20all%20facilities%22%7D%2C%7B%22item%22%3A%22Personal%20trainers%22%7D%2C%7B%22item%22%3A%22Free%20supplemments%22%7D%2C%7B%22item%22%3A%22Three%20massages%20weekly%22%7D%2C%7B%22item%22%3A%22Training%20equipment%22%7D%5D" sign_up_text="SIGN UP" sign_up_link="#"][/vc_column][vc_column width="1/3"][antfarm_pricing_table title="GOLD MEMBERSHIP" is_featured="off" price="$340" quota="MONTHLY" items="%5B%7B%22item%22%3A%22Unlimited%20sessions%22%7D%2C%7B%22item%22%3A%22Cardio%20and%20fitness%22%7D%2C%7B%22item%22%3A%22Kickboxing%20sessions%22%7D%2C%7B%22item%22%3A%22Swimming%20pool%20access%22%7D%2C%7B%22item%22%3A%22Aerobics%20access%22%7D%5D" sign_up_text="SIGN UP" sign_up_link="#"][/vc_column][/vc_row][/vc_section][vc_section shape="" type="image" section_bg_image="" style="dark"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="04" line1="the" line2="TRAINERS"][/vc_column][/vc_row][vc_row][vc_column width="1/2"][antfarm_team_member style="team-member-element" shape="circle" heading_style="h4" avatar="'.$img_url.'" first_name="Frank Johnson" position="weight lifting expert" aligment="left" titles="%5B%7B%22faicon%22%3A%22facebook%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22instagram%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22twitter%22%2C%22title%22%3A%22%23%22%7D%5D"][/vc_column][vc_column width="1/2"][antfarm_team_member style="team-member-element" shape="circle" heading_style="h4" avatar="'.$img_url.'" first_name="Jessica Watson" position="aerobics expert" aligment="left" titles="%5B%7B%22faicon%22%3A%22facebook%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22twitter%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22linkedin%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22pinterest%22%2C%22title%22%3A%22%23%22%7D%5D"][/vc_column][/vc_row][vc_row][vc_column width="1/2"][antfarm_team_member style="team-member-element" shape="circle" heading_style="h4" avatar="'.$img_url.'" first_name="Markus Anders" position="fitness trainer" aligment="right" titles="%5B%7B%22faicon%22%3A%22facebook%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22linkedin%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22google-plus%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22twitter%22%2C%22title%22%3A%22%23%22%7D%5D"][/vc_column][vc_column width="1/2"][antfarm_team_member style="team-member-element" shape="circle" heading_style="h4" avatar="'.$img_url.'" first_name="Francis Robins" position="muay thai trainer" aligment="right" titles="%5B%7B%22faicon%22%3A%22facebook%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22linkedin%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22youtube-play%22%2C%22title%22%3A%22%23%22%7D%5D"][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_sc_video_text bg="#818c03" overlay_opacity="0" featured_media_type="video" media_video="https://vimeo.com/8761639" title="Hit the gym, stop postponing!" video="https://vimeo.com/8761639"]Proin ornare aliquam convallis. Maecenas ut lorem nec odio laoreet ultricies in vestibulum lacus. Praesent vel sollicitudin ipsum. Vestibulum posuere enim eu dolor congue, in varius orci cursus. Nullam vehicula, erat non laoreet maximus, sapien enim vulputate justo, sit amet.

[antfarm_button style="style-hallowblack" padding="padding-medium" rounded="" the_icon="" link="#"]THE TRAINERS[/antfarm_button] [antfarm_button style="style-black" padding="padding-medium" rounded="" the_icon="" link="#"]OUR CLASSES[/antfarm_button][/antfarm_sc_video_text][/vc_column][/vc_row][/vc_section][vc_section shape="" type="image" style="dark"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="07" line1="our" line2="CLASSES"][/vc_column][/vc_row][vc_row][vc_column width="1/3"][antfarm_bullet_feature style="style-1" feature="image" text_aligment="align-left" title="Weight Lifting" media="'.$img_url.'" read_more="SIGN UP" button_style="{``style``:``style-hallowblack``,``padding``:````,``rounded``:````}" heading="h5"]Vivamus at augue sit amet metus facilisis sodales. Vestibulum ac efficitur erat, eget lacinia sem. Nunc eget sollicitudin nibh. Vestibulum sollicitudin at nulla vel mollis. Etiam in varius justo.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-1" feature="image" text_aligment="align-left" title="Muay Thai" media="'.$img_url.'" read_more="SIGN UP" button_style="{``style``:``style-hallowblack``,``padding``:````,``rounded``:````}" heading="h5"]Fusce quis tellus eget nunc fermentum maximus id nec purus. In a enim ut risus vestibulum rhoncus sit amet non neque. Curabitur ullamcorper id leo non elementum. Nunc eget faucibus tortor.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-1" feature="image" text_aligment="align-left" title="Aerobics" media="'.$img_url.'" read_more="SIGN UP" button_style="{``style``:``style-hallowblack``,``padding``:````,``rounded``:````}" heading="h5"]Praesent ultricies ex dui, eget convallis ex placerat ac. Sed mollis sit amet sem vel tincidunt. Quisque pulvinar, quam eget dignissim gravida, augue metus maximus eros, nec tincidunt.[/antfarm_bullet_feature][/vc_column][/vc_row][vc_row][vc_column width="1/3"][antfarm_bullet_feature style="style-1" feature="image" text_aligment="align-left" title="Speed Training" media="'.$img_url.'" read_more="SIGN UP" button_style="{``style``:``style-hallowblack``,``padding``:````,``rounded``:````}" heading="h5"]Quisque pulvinar, quam eget dignissim gravida, augue metus maximus eros, nec tincidunt lectus tortor sollicitudin sapien. Sed non fermentum justo. Nullam posuere, augue et consequat tristique.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-1" feature="image" text_aligment="align-left" title="Power Cycling" media="'.$img_url.'" read_more="SIGN UP" button_style="{``style``:``style-hallowblack``,``padding``:````,``rounded``:````}" heading="h5"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut auctor erat quis pulvinar dictum. Sed blandit lacus in magna scelerisque iaculis. Phasellus convallis quam est, id cursus.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-1" feature="image" text_aligment="align-left" title="Extreme Conditioning" media="'.$img_url.'" read_more="SIGN UP" button_style="{``style``:``style-hallowblack``,``padding``:````,``rounded``:````}" heading="h5"]Interdum et malesuada fames ac ante ipsum primis in faucibus. Curabitur vitae elit turpis. Etiam elementum massa vitae urna tincidunt, id laoreet lectus lobortis. In eros leo, tincidunt.[/antfarm_bullet_feature][/vc_column][/vc_row][/vc_section][vc_section shape="" type="image" section_bg_image="'.$img_url.'" bg_hide_on_tablet="true" bg_hide_on_mobile="true" style="light"][vc_row][vc_column width="1/2"][/vc_column][vc_column width="1/2"][vc_custom_heading text="THE VERY BEST CLASSES WITH THE" font_container="tag:h6|text_align:left|color:%23a8b700|line_height:1.2" google_fonts="font_family:Open%20Sans%3A300%2C300italic%2Cregular%2Citalic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic|font_style:400%20regular%3A400%3Anormal"][vc_custom_heading text="BEST TRAINERS" font_container="tag:h2|text_align:left|line_height:1.1" google_fonts="font_family:Open%20Sans%3A300%2C300italic%2Cregular%2Citalic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic|font_style:700%20bold%20regular%3A700%3Anormal"][vc_custom_heading text="Lorem ipsum dolor sit amet, consectetur adipiscing elit.
Ut auctor erat quis pulvinar dictum." font_container="tag:h2|font_size:18|text_align:left|color:%230a0a0a|line_height:1.5" google_fonts="font_family:Open%20Sans%3A300%2C300italic%2Cregular%2Citalic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic|font_style:300%20light%20regular%3A300%3Anormal"][vc_empty_space height="15"][vc_column_text]Interdum et malesuada fames ac ante ipsum primis in faucibus. Curabitur vitae elit turpis. Etiam elementum massa vitae urna tincidunt, id laoreet lectus lobortis. In eros leo, tincidunt vitae rhoncus in, viverra vel arcu. Quisque dignissim odio vel lectus posuere consequat. Curabitur leo dui, convallis vel euismod eget, sagittis eu risus. Vestibulum feugiat suscipit nunc.

[antfarm_button style="color-highlight" padding="" rounded="" the_icon="flag" link="#"]GO TO THE GYM[/antfarm_button][/vc_column_text][/vc_column][/vc_row][/vc_section]';





    $args = array(
        'post_title'    => wp_strip_all_tags( 'Qu '.$demo_name ),
        'post_content'  => $cont,
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_type'   => 'page',

    );


    $page_id = wp_insert_post( $args );





    update_post_meta(  $page_id ,'qucreative_'.'meta_disable_footer','on');
    update_post_meta(  $page_id ,'qucreative_'.'meta_custom_section_margin_bottom','0');
    update_post_meta(  $page_id ,'qucreative_'.'meta_content_starts_at','pixel-position');
    update_post_meta(  $page_id ,'qucreative_'.'meta_content_starts_at_pixel','0');
    update_post_meta(  $page_id ,'qucreative_'.'meta_scrollbar_theme','light');
    update_post_meta(  $page_id ,'qucreative_'.'meta_is_fullscreen','on');
    update_post_meta(  $page_id ,'qucreative_'.'meta_is_fullscreen_stretch','contain');
    update_post_meta(  $page_id ,'qucreative_'.'meta_custom_title',' ');
    update_post_meta(  $page_id ,'qucreative_'.'meta_bg_image','#111111');












    update_option( 'page_on_front', $page_id );
    update_option( 'show_on_front', 'page' );












    $temp_text = '';


    $temp_text = preg_replace( "/\r|\n/", "", $temp_text );;






    $ser_data = 'a:51:{s:14:"portfolio_page";s:0:"";s:11:"mail_method";s:7:"wp_mail";s:12:"blur_ammount";s:1:"0";s:23:"menu_enviroment_opacity";s:3:"100";s:26:"content_enviroment_opacity";s:3:"100";s:24:"secondary_content_height";s:3:"450";s:13:"gmaps_api_key";s:0:"";s:17:"soundcloud_apikey";s:0:"";s:13:"gmaps_styling";s:0:"";s:13:"content_align";s:20:"content-align-center";s:16:"page_title_align";s:22:"page-title-align-right";s:16:"page_title_style";s:18:"page-title-style-2";s:12:"width_column";s:2:"57";s:9:"width_gap";s:2:"30";s:17:"width_blur_margin";s:1:"0";s:16:"width_section_bg";s:0:"";s:24:"content_add_extra_pixels";s:2:"30";s:12:"border_width";s:1:"0";s:12:"border_color";s:7:"#ffffff";s:37:"content_section_title_two_lines_space";s:1:"0";s:43:"content_section_title_two_lines_use_divider";s:0:"";s:49:"content_section_title_two_lines_use_divider_color";s:0:"";s:9:"menu_type";s:11:"menu-type-3";s:14:"menu_is_sticky";s:3:"off";s:28:"menu_horizontal_shadow_style";s:4:"none";s:12:"social_icons";s:168:"[{"link":"#","icon":"youtube-play"},{"link":"#","icon":"facebook-square"},{"link":"#","icon":"twitter"},{"link":"#","icon":"pinterest"},{"link":"#","icon":"instagram"}]";s:23:"meta_options_post_types";b:0;s:4:"logo";s:'.strlen($logo_gym).':"'.$logo_gym.'";s:6:"logo_x";s:7:"default";s:13:"logo_x_custom";s:0:"";s:6:"logo_y";s:7:"default";s:10:"logo_width";s:0:"";s:11:"logo_height";s:0:"";s:13:"logo_y_custom";s:0:"";s:17:"copyright_textbox";s:14:"ANTFARM THEMES";s:31:"copyright_textbox_heading_style";s:9:"h-group-1";s:38:"footer_copyright_textbox_heading_style";s:9:"h-group-1";s:9:"font_data";s:3868:"headings_font=Cuprum&h1_weight=700&h1_size=73&h1_line_height=1.15&h1_responsive_slider=30&h2_weight=700&h2_size=53&h2_line_height=1.15&h2_responsive_slider=25&h3_weight=700&h3_size=43&h3_line_height=1.15&h3_responsive_slider=20&h4_weight=700&h4_size=33&h4_line_height=1.15&h4_responsive_slider=10&h5_weight=700&h5_size=23&h5_line_height=1.15&h5_responsive_slider=0&h6_weight=700&h6_size=18&h6_line_height=1.57&h6_responsive_slider=0&h-group-1_weight=700&h-group-1_size=14&h-group-1_line_height=1.54&h-group-1_responsive_slider=0&h-group-2_weight=700&h-group-2_size=28&h-group-2_line_height=1.28&h-group-2_responsive_slider=0&body_font=Open+Sans&p_weight=regular&p_size=13&p_line_height=1.92&p_color=%236b6b6b&p_color_for_light=%23bbbbbb&hyperlink_weight=600&font-group-1_weight=600italic&font-group-1_size=14&font-group-1_line_height=1.42&font-group-2_weight=600&font-group-2_size=14&font-group-2_line_height=1.42&font-group-3_weight=600italic&font-group-3_size=11&font-group-3_line_height=1.27&font-group-4_weight=italic&font-group-4_size=14&font-group-4_line_height=1.42&font-group-5_weight=600&font-group-5_size=14&font-group-5_line_height=1.42&font-group-6_weight=regular&font-group-6_size=13&font-group-6_line_height=1.46&font-group-7_weight=italic&font-group-7_size=13&font-group-7_line_height=1.46&font-group-8_weight=regular&font-group-8_size=14&font-group-8_line_height=1.55&font-group-9_weight=600&font-group-9_size=15&font-group-9_line_height=1.8&font-group-10_weight=600&font-group-10_size=16&font-group-10_line_height=1.68&font-group-11_weight=800&font-group-11_size=24&font-group-11_line_height=1.29&font-group-12_weight=600&font-group-12_size=13&font-group-12_line_height=1.46&blockquote_weight=italic&blockquote_size=17&blockquote_line_height=1.58&menu_font=Cuprum&menu_weight=regular&menu_size=18&menu_line_height=0.8&copyright_font_link_to=headings&copyright_weight=700&copyright_size=10&copyright_line_height=1.4&page_title_font=Lato&page_title_weight=900&page_title_size=70&page_title_line_height=1.14&page_title_color=&page_title_responsive_slider=0&page_title_orientation=horizontal&section_title_two_font=Cuprum&section_title_two_first_weight=700italic&section_title_two_first_size=100&section_title_two_first_line_height=1&section_title_two_first_color=%23222222&section_title_two_first_color_for_light=%23ffffff&section_title_two_first_responsive_slider=50&section_title_two_second_font=Lato&section_title_two_second_weight=900&section_title_two_second_size=73&section_title_two_second_line_height=1&section_title_two_second_color=%23222222&section_title_two_second_color_for_light=%23ffffff&section_title_two_second_responsive_slider=50&line_spacing=-5&section_title_two_number_font=Cuprum&section_title_two_number_weight=700italic&section_title_two_number_size=210&section_title_two_number_line_height=0.9&section_title_two_number_color=%23eeeeee&section_title_two_number_color_for_light=%23333333&section_title_two_divider_divider_style=style-box&section_title_two_divider_color=%23444444&section_title_two_divider_color_for_light=%23ffffff&title_divider_spacing_two=20&section_title_one_first_font=Lato&section_title_one_first_weight=900&section_title_one_first_size=25&section_title_one_first_line_height=1.28&section_title_one_first_color=%23444444&section_title_one_first_color_for_light=%23ffffff&section_title_one_first_responsive_slider=0&section_title_one_divider_enable=on&section_title_one_divider_divider_style=style-fullwidth&section_title_one_divider_color=%23444444&section_title_one_divider_color_for_light=%23ffffff&title_divider_spacing=20&home_slider_font_link_to=headings&home_slider_weight=regular&home_slider_size=50&home_slider_line_height=1.20&home_slider_color=%23ffffff&home_slider_color_for_light=%23222222&home_number_font_link_to=headings&home_number_weight=regular&home_number_size=135&home_number_line_height=1";s:32:"typography_sidebar_heading_style";s:2:"h6";s:31:"typography_footer_heading_style";s:2:"h6";s:24:"content_enviroment_style";s:15:"body-style-dark";s:17:"greyscale_ammount";s:1:"0";s:21:"section_margin_bottom";s:1:"0";s:15:"highlight_color";s:7:"#a8b700";s:22:"enable_bordered_design";s:3:"off";s:23:"enable_native_scrollbar";s:2:"on";s:13:"bg_transition";s:9:"slidedown";s:11:"enable_ajax";s:2:"on";s:13:"bg_isparallax";s:3:"off";s:18:"custom_css_post_id";i:3332;s:18:"nav_menu_locations";a:2:{s:7:"primary";i:'.$menu_id.';s:6:"social";i:0;}}';





    qucreative_import_demo_update_preset($ser_data,array(

        'preseter_slug' => $demo_slug,
        'preseter_name' => $demo_name,
    ));








}


























$demo_slug = 'restaurant';
$demo_name = 'Restaurant';
if($_REQUEST['demo']==$demo_slug) {








	// -- restaurant demo has no widgets






    $img_name = '500x500.jpg';
    $img_url = QUCREATIVE_THEME_URL . 'placeholders/500x500.jpg';


    $img_path = QUCREATIVE_THEME_DIR . 'placeholders/500x500.jpg';


    $new_path = $upload_dir_path . '/' . $img_name;

    try {

        if (!copy($img_path, $new_path)) {

        } else {
            $img_url = $upload_dir_url . '/' . $img_name;
            $new_path = $img_path;
        }
    } catch (Exception $e) {
        print_rr($e);
    }


	$attach_id = qucreative_import_demo_create_attachment($img_url, '1', $img_path);


	$qucreative_theme_data['import_demo_last_attach_id'] = $attach_id;



    $the_slug = $demo_slug;
    $args = array(
        'name'        => $the_slug,
        'post_type'   => 'page',
        'post_status' => 'publish',
        'numberposts' => 1
    );
    $my_posts = get_posts($args);
















    $img_name_500_100 = '500x100.jpg';
    $img_url_500_100 = QUCREATIVE_THEME_URL . 'placeholders/'.$img_name_500_100;


    $img_path_500_100 = QUCREATIVE_THEME_DIR . 'placeholders/'.$img_name_500_100;


    $new_path_500_100 = $upload_dir_path . '/' . $img_name_500_100;

    try {

        if (!copy($img_path_500_100, $new_path_500_100)) {

        } else {
            $img_url_500_100 = $upload_dir_url . '/' . $img_name_500_100;
            $new_path_500_100 = $img_path_500_100;
        }
    } catch (Exception $e) {
        print_rr($e);
    }






    $attach_id_500_100 = qucreative_import_demo_create_attachment($img_url_500_100, '1', $new_path_500_100);


    $qucreative_theme_data['import_demo_last_attach_id_500_100'] = $attach_id_500_100;




    $cont = '[vc_section shape=""  section_bg_image="" style="light"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="01" line1="Qu Ristorante" line2="the italian cuisine"][/vc_column][/vc_row][vc_row][vc_column width="1/2"][vc_single_image image="'.$qucreative_theme_data['import_demo_last_attach_id'].'" img_size="full"][vc_empty_space height="10px"][/vc_column][vc_column width="1/2"][vc_empty_space height="30px"][vc_column_text]
<h5>True Italian Cuisine</h5>
[antfarm_divider height="30" style="style-1" color="#222222"][/antfarm_divider]

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris luctus sagittis sodales. Curabitur non vestibulum erat, nec lacinia erat. Vestibulum feugiat tempor erat, vitae rhoncus lectus imperdiet acreditas mauris phaellis certimus. Quisque ut mollis ligula, ac tincidunt nulla. Nullam ac ante porttitor, sagittis.

[antfarm_button style="style-black" padding="padding-medium" rounded="rounded" the_icon=""]OUR MENU[/antfarm_button]  [antfarm_button style="color-highlight" padding="padding-medium" rounded="rounded" the_icon=""]THE GALLERY[/antfarm_button][/vc_column_text][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_sc_testimonials media="'.$img_url.'" overlay_opacity="50" tests="%5B%7B%22title%22%3A%22SIMPLY%20AWESOME%22%2C%22name%22%3A%22Jennifer%20Donovan%22%2C%22position%22%3A%22CEO%20at%20ORANGE%20INK%22%2C%22the_test%22%3A%22Cum%20sociis%20natoque%20penatibus%20et%20magnis%20dis%20parturient%20montes%2C%20nascetur%20ridiculus%20mus.%20Nam%20tincidunt%20elit%20nulla.%20Cras%20turpis%20urna%2C%20vestibulum%20at%20posuere%20sit%20amet.%22%7D%2C%7B%22title%22%3A%22AMAZING%20FOOD%22%2C%22name%22%3A%22Michael%20Fergusson%22%2C%22position%22%3A%22Web%20Developer%20at%20SMART%22%2C%22the_test%22%3A%22Nunc%20nec%20faucibus%20ipsum%2C%20rutrum%20imperdiet%20sapien.%20Nam%20faucibus%2C%20elit%20id%20venenatis%20hendrerit%2C%20sem%20lacus%20accumsan%20lectus%2C%20vitae%20imperdiet%20ligula%20urna%20quis%20ipsum.%20Vestibulum%20ac%20lobortis%20nunc.%22%7D%2C%7B%22title%22%3A%22THIS%20IS%20GREAT%22%2C%22name%22%3A%22Will%20Cameron%22%2C%22position%22%3A%22Graphician%20at%20SALVADOR%22%2C%22the_test%22%3A%22Cum%20sociis%20natoque%20penatibus%20et%20magnis%20dis%20parturient%20montes%2C%20nascetur%20ridiculus%20mus.%20Nam%20tincidunt%20elit%20nulla.%20Cras%20turpis%20urna%2C%20vestibulum%20at%20posuere%20sit%20amet%2C%20tristique.%22%7D%5D" heading_style_name="h4"][/vc_column][/vc_row][/vc_section][vc_section shape="" type="image" section_bg_image="" bg_hide_on_tablet="true" bg_hide_on_mobile="true" style="light"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="02" line1="The Chefs" line2="are simply amazing"][/vc_column][/vc_row][vc_row][vc_column width="1/3"][antfarm_team_member style="team-member-element-2" shape="circle" avatar="'.$img_url.'" first_name="FRANCESCO FIRENZE" position="italian cuisine" aligment="left" titles="%5B%7B%22faicon%22%3A%22facebook%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22twitter%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22pinterest%22%2C%22title%22%3A%22%23%22%7D%5D" is_square="off"][/vc_column][vc_column width="1/3"][antfarm_team_member style="team-member-element-2" shape="circle" avatar="'.$img_url.'" first_name="JOSHUA MELLINGON" position="international cuisine" aligment="left" titles="%5B%7B%22faicon%22%3A%22google-plus%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22linkedin%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22instagram%22%2C%22title%22%3A%22%23%22%7D%5D" is_square="off"][/vc_column][vc_column width="1/3"][antfarm_team_member style="team-member-element-2" shape="circle" avatar="'.$img_url.'" first_name="MICHAEL BALTIMORE" position="deserts specialist" aligment="left" titles="%5B%7B%22faicon%22%3A%22facebook%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22google-plus%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22twitter%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22linkedin%22%2C%22title%22%3A%22%23%22%7D%5D" is_square="off"][/vc_column][/vc_row][vc_row][vc_column][vc_single_image image="'.$qucreative_theme_data['import_demo_last_attach_id_500_100'].'" img_size="full" alignment="center"][/vc_column][/vc_row][vc_row][vc_column width="1/2"][vc_empty_space height="20px"][vc_column_text]
<h5>An Oustanding Experience</h5>
[antfarm_divider height="30" style="style-1" color="#222222"][/antfarm_divider]

Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam tincidunt elit nulla. Cras turpis urna, vestibulum at posuere sit amet, tristique ut metus. Nunc nec faucibus ipsum, rutrum imperdiet sapien. Nam faucibus, elit id venenatis hendrerit, sem lacus accumsan lectus vitae.[/vc_column_text][vc_row_inner][vc_column_inner width="1/2"][antfarm_list titles="%5B%7B%22faicon%22%3A%22star%22%2C%22text%22%3A%22Five%20stars%20restaurant%22%7D%2C%7B%22faicon%22%3A%22leaf%22%2C%22text%22%3A%22Natural%20ingredients%22%7D%5D"][/vc_column_inner][vc_column_inner width="1/2"][antfarm_list titles="%5B%7B%22faicon%22%3A%22glass%22%2C%22text%22%3A%22Finest%20wine%20list%22%7D%2C%7B%22faicon%22%3A%22smile-o%22%2C%22text%22%3A%22Friendliest%20staff%22%7D%5D"][/vc_column_inner][/vc_row_inner][/vc_column][vc_column width="1/2"][vc_single_image image="'.$qucreative_theme_data['import_demo_last_attach_id'].'" img_size="full"][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_sc_video media="https://vimeo.com/70604410" video_cover="3172" line1="see the Chefs" line2="IN ACTION"][/vc_column][/vc_row][/vc_section][vc_section shape="" type="image" section_bg_image="" bg_hide_on_mobile="true" style="dark"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="03" line1="Noble Wines" line2="private production"][/vc_column][/vc_row][vc_row][vc_column width="1/2"][/vc_column][vc_column width="1/2"][antfarm_menu_item title="Chardonette" price="$47.50" ingredients="One of the most appreciated wines" titles="%5B%7B%22label%22%3A%22POPULAR%22%2C%22color%22%3A%22%23ff8000%22%7D%5D"][antfarm_menu_item title="Chateau D\'Or" price="$54.49" ingredients="French noble wine from the Loir" titles="%5B%7B%7D%5D"][antfarm_menu_item title="Busuioaca De Bohotin" price="$34.90" ingredients="Noble Romanian wine from Bohotin" titles="%5B%7B%7D%5D"][antfarm_menu_item title="Orin Smith" price="$37.70" ingredients="Noble wine from the fields of California" titles="%5B%7B%7D%5D"][antfarm_menu_item media="1585" title="Namaglia" price="$48.99" ingredients="Noble wine from the fields of Alentejo" titles="%5B%7B%7D%5D"][/vc_column][/vc_row][/vc_section]';





    $args = array(
        'post_title'    => wp_strip_all_tags( 'Qu '.$demo_name ),
        'post_content'  => $cont,
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_type'   => 'page',

    );


    $page_id = wp_insert_post( $args );






    update_post_meta(  $page_id ,'qucreative_'.'meta_content_starts_at','pixel-position');

    update_post_meta(  $page_id ,'qucreative_'.'meta_scrollbar_theme','light');
        update_post_meta(  $page_id ,'qucreative_'.'meta_disable_footer','on');


    update_post_meta(  $page_id ,'qucreative_'.'meta_custom_title','Welcome');
    update_post_meta(  $page_id ,'qucreative_'.'meta_bg_image',$img_url);












    update_option( 'page_on_front', $page_id );
    update_option( 'show_on_front', 'page' );












    $temp_text = '';


    $temp_text = preg_replace( "/\r|\n/", "", $temp_text );;






    $ser_data = 'a:51:{s:14:"portfolio_page";s:0:"";s:11:"mail_method";s:7:"wp_mail";s:12:"blur_ammount";s:2:"26";s:23:"menu_enviroment_opacity";s:2:"90";s:26:"content_enviroment_opacity";s:2:"30";s:24:"secondary_content_height";s:3:"300";s:13:"gmaps_api_key";s:0:"";s:17:"soundcloud_apikey";s:0:"";s:13:"gmaps_styling";s:0:"";s:13:"content_align";s:20:"content-align-center";s:16:"page_title_align";s:22:"page-title-align-right";s:16:"page_title_style";s:18:"page-title-style-2";s:12:"width_column";s:2:"40";s:9:"width_gap";s:2:"30";s:17:"width_blur_margin";s:2:"30";s:16:"width_section_bg";s:0:"";s:24:"content_add_extra_pixels";s:0:"";s:12:"border_width";s:1:"0";s:12:"border_color";s:7:"#ffffff";s:37:"content_section_title_two_lines_space";s:1:"0";s:43:"content_section_title_two_lines_use_divider";s:0:"";s:49:"content_section_title_two_lines_use_divider_color";s:0:"";s:9:"menu_type";s:11:"menu-type-5";s:14:"menu_is_sticky";s:3:"off";s:28:"menu_horizontal_shadow_style";s:4:"none";s:12:"social_icons";s:2:"[]";s:23:"meta_options_post_types";b:0;s:4:"logo";s:'.strlen($logo_restaurant).':"'.$logo_restaurant.'";s:6:"logo_x";s:7:"default";s:13:"logo_x_custom";s:0:"";s:6:"logo_y";s:7:"default";s:10:"logo_width";s:0:"";s:11:"logo_height";s:0:"";s:13:"logo_y_custom";s:0:"";s:17:"copyright_textbox";s:22:"Default copyright text";s:31:"copyright_textbox_heading_style";s:9:"h-group-1";s:38:"footer_copyright_textbox_heading_style";s:9:"h-group-1";s:9:"font_data";s:3888:"headings_font=Sansita&h1_weight=regular&h1_size=75&h1_line_height=1.15&h1_responsive_slider=25&h2_weight=regular&h2_size=55&h2_line_height=1.15&h2_responsive_slider=20&h3_weight=regular&h3_size=45&h3_line_height=1.15&h3_responsive_slider=15&h4_weight=700&h4_size=35&h4_line_height=1.15&h4_responsive_slider=10&h5_weight=regular&h5_size=25&h5_line_height=1.15&h5_responsive_slider=0&h6_weight=regular&h6_size=19&h6_line_height=1.57&h6_responsive_slider=0&h-group-1_weight=regular&h-group-1_size=14&h-group-1_line_height=1.54&h-group-1_responsive_slider=0&h-group-2_weight=regular&h-group-2_size=30&h-group-2_line_height=1.28&h-group-2_responsive_slider=0&body_font=Open+Sans&p_weight=regular&p_size=13&p_line_height=1.92&p_color=%236b6b6b&p_color_for_light=%23ffffff&hyperlink_weight=700&font-group-1_weight=600italic&font-group-1_size=14&font-group-1_line_height=1.42&font-group-2_weight=700&font-group-2_size=14&font-group-2_line_height=1.42&font-group-3_weight=600italic&font-group-3_size=11&font-group-3_line_height=1.27&font-group-4_weight=italic&font-group-4_size=14&font-group-4_line_height=1.42&font-group-5_weight=600&font-group-5_size=14&font-group-5_line_height=1.42&font-group-6_weight=regular&font-group-6_size=13&font-group-6_line_height=1.46&font-group-7_weight=italic&font-group-7_size=13&font-group-7_line_height=1.46&font-group-8_weight=600&font-group-8_size=13&font-group-8_line_height=1.46&font-group-9_weight=600&font-group-9_size=15&font-group-9_line_height=1.8&font-group-10_weight=regular&font-group-10_size=16&font-group-10_line_height=1.68&font-group-11_weight=regular&font-group-11_size=24&font-group-11_line_height=1.29&font-group-12_weight=600&font-group-12_size=13&font-group-12_line_height=1.46&blockquote_weight=italic&blockquote_size=17&blockquote_line_height=1.58&menu_font=Sansita&menu_weight=regular&menu_size=17&menu_line_height=0.9&copyright_font_link_to=headings&copyright_weight=700&copyright_size=10&copyright_line_height=1.4&page_title_font=Sacramento&page_title_weight=regular&page_title_size=70&page_title_line_height=1&page_title_color=%23FFFFFF&page_title_responsive_slider=30&page_title_orientation=horizontal&section_title_two_font=Sansita&section_title_two_first_weight=regular&section_title_two_first_size=55&section_title_two_first_line_height=1&section_title_two_first_color=%23222222&section_title_two_first_color_for_light=%23ffffff&section_title_two_first_responsive_slider=30&section_title_two_second_font=Sacramento&section_title_two_second_weight=regular&section_title_two_second_size=30&section_title_two_second_line_height=1&section_title_two_second_color=%23222222&section_title_two_second_color_for_light=%23ffffff&section_title_two_second_responsive_slider=0&line_spacing=7&section_title_two_number_font=Sacramento&section_title_two_number_weight=regular&section_title_two_number_size=40&section_title_two_number_line_height=1.4&section_title_two_number_color=%23222222&section_title_two_number_color_for_light=%23ffffff&section_title_two_divider_divider_style=style-fullwidth&section_title_two_divider_color=%23444444&section_title_two_divider_color_for_light=%23ffffff&title_divider_spacing_two=20&section_title_one_first_font=Lato&section_title_one_first_weight=900&section_title_one_first_size=25&section_title_one_first_line_height=1.28&section_title_one_first_color=%23444444&section_title_one_first_color_for_light=%23ffffff&section_title_one_first_responsive_slider=0&section_title_one_divider_divider_style=style-fullwidth&section_title_one_divider_color=%23444444&section_title_one_divider_color_for_light=%23ffffff&title_divider_spacing=20&home_slider_font_link_to=headings&home_slider_weight=900&home_slider_size=50&home_slider_line_height=1.20&home_slider_color=%23ffffff&home_slider_color_for_light=%23222222&home_number_font_link_to=headings&home_number_weight=900&home_number_size=135&home_number_line_height=1";s:32:"typography_sidebar_heading_style";s:2:"h6";s:31:"typography_footer_heading_style";s:2:"h6";s:24:"content_enviroment_style";s:15:"body-style-dark";s:17:"greyscale_ammount";s:1:"0";s:21:"section_margin_bottom";s:2:"30";s:15:"highlight_color";s:7:"#db6030";s:22:"enable_bordered_design";s:2:"on";s:23:"enable_native_scrollbar";s:3:"off";s:13:"bg_transition";s:9:"slidedown";s:11:"enable_ajax";s:2:"on";s:13:"bg_isparallax";s:3:"off";s:18:"custom_css_post_id";i:-1;s:18:"nav_menu_locations";a:2:{s:7:"primary";i:'.$menu_id.';s:6:"social";i:0;}}';





    qucreative_import_demo_update_preset($ser_data,array(

        'preseter_slug' => $demo_slug,
        'preseter_name' => $demo_name,
    ));





















}







































































$demo_slug = 'blogger';
$demo_name = 'Blogger';
if($_REQUEST['demo']==$demo_slug) {














    $img_name = '500x500.jpg';
    $img_url = QUCREATIVE_THEME_URL . 'placeholders/500x500.jpg';


    $img_path = QUCREATIVE_THEME_DIR . 'placeholders/500x500.jpg';


    $new_path = $upload_dir_path . '/' . $img_name;

    try {

        if (!copy($img_path, $new_path)) {

        } else {
            $img_url = $upload_dir_url . '/' . $img_name;
            $new_path = $img_path;
        }
    } catch (Exception $e) {
        print_rr($e);
    }





    $taxonomy = 'category';



	$term_be = qucreative_import_demo_create_term_if_it_does_not_exist(array(
		'description' => '',
		'term_name' => 'Beautiful Things',
		'slug' => 'beautiful-things',
		'taxonomy' => $taxonomy,

	));






	$term_cu = qucreative_import_demo_create_term_if_it_does_not_exist(array(
		'description' => '',
		'term_name' => 'Current Trends',
		'slug' => 'current-trends',
		'taxonomy' => $taxonomy,

	));







	$term_li = qucreative_import_demo_create_term_if_it_does_not_exist(array(
		'description' => '',
		'term_name' => 'Lifestyle',
		'slug' => 'lifestyle',
		'taxonomy' => $taxonomy,

	));







	$term_ph = qucreative_import_demo_create_term_if_it_does_not_exist(array(
		'description' => '',
		'term_name' => 'Photography',
		'slug' => 'photography',
		'taxonomy' => $taxonomy,

	));













	$args = array(

            'post_title' => 'Awesome, I can host my own videos too',
            'custom_title' => 'This is a cool featured image example',
            'qucreative_'.'meta_post_media_type' => 'vimeo',
            'qucreative_'.'meta_post_media' => 'https://vimeo.com/199855572',
            'post_content' => 'Etiam sodales blandit augue malesuada fermentum. Nam fringilla et ligula et facilisis. Vestibulum commodo nec lacus in pretium. Etiam ac bibendum purus, quis consectetur massa. Vivamus quis est ut enim sollicitudin blandit. Maecenas iaculis eget magna placerat pretium. Proin dictum mi vel lacus ultrices, ut placerat nulla tristique. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse potenti. Proin gravida justo ac sapien euismod aliquet.
<blockquote>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</blockquote>
Pellentesque eu nunc porta, elementum risus eu, lobortis nulla. Donec eget dui nec purus vehicula posuere. Ut mauris nibh, lobortis quis facilisis non, eleifend nec erat. Cras porta, dui a imperdiet suscipit, erat nulla rhoncus purus, sed faucibus nulla enim eu justo. Pellentesque sit amet turpis enim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque sed tincidunt eros, ut sodales lorem. Quisque rhoncus non nibh vel commodo. Sed tellus elit, semper a elementum sit amet, congue non sapien. Phasellus rhoncus bibendum vehicula. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque laoreet mi scelerisque, posuere odio at, condimentum lorem. Phasellus sollicitudin elit nec consequat vehicula. Suspendisse nec pellentesque tortor, et faucibus erat. Duis sem turpis, rutrum fringilla diam ac, pulvinar suscipit turpis.',
            'post_status' => 'publish',
            'post_type' => 'post',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term_be,
            'taxonomy' => $taxonomy,
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);










	$attach_id = qucreative_import_demo_create_attachment($img_url, '1', $img_path);


	$qucreative_theme_data['import_demo_last_attach_id'] = $attach_id;





	$args = array(

            'post_title' => 'Hey, that is great, Vimeo is supported',
            'custom_title' => 'This is a cool featured image example',
            'qucreative_'.'meta_post_media_type' => 'vimeo',
            'qucreative_'.'meta_post_media' => 'https://vimeo.com/47955106',
            'post_content' => 'Donec consequat est pellentesque scelerisque mattis. Nam scelerisque justo sit amet elit feugiat commodo. Nulla auctor lacus in massa rhoncus, eget interdum mauris pharetra. Aenean facilisis justo in arcu tempor, et pretium ipsum aliquet. Cras ullamcorper aliquet neque non porttitor. Curabitur et dapibus purus. Proin fringilla mattis leo, id tempus justo commodo cursus. Aenean varius tristique mauris ut imperdiet. Cras sollicitudin quis magna in porta. Suspendisse at urna purus. Etiam nec nisl sollicitudin, elementum diam blandit, bibendum mauris. Phasellus neque nisl, imperdiet vitae aliquam sit amet, luctus in mauris. Aliquam iaculis elit non dolor hendrerit, sit amet mollis ante finibus. Nulla gravida enim felis, nec ultrices augue hendrerit sed. Vivamus sodales nec mauris et ultrices.

Maecenas metus libero, molestie id diam nec, placerat mollis enim. Aenean et dictum dolor. Sed vel urna lorem. Sed eu accumsan purus. Nunc luctus nibh in metus faucibus euismod. Aliquam lacinia dui ac ultricies eleifend. Cras justo lectus, imperdiet a mauris ut, ultrices porttitor magna. Donec pellentesque venenatis nunc nec elementum. Proin odio magna, pharetra sed porttitor sit amet, tincidunt et risus. Aenean a leo hendrerit, pellentesque mi id, tincidunt tellus. Etiam placerat magna ligula, non ornare nisi vestibulum quis. Ut at diam iaculis ante convallis tristique.',
            'post_status' => 'publish',
            'post_type' => 'post',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term_li,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);



        $args = array(

            'post_title' => 'Well, everybody likes a video with cover',
            'custom_title' => 'This is a cool featured image example',
            'qucreative_'.'meta_post_media_type' => 'vimeo',
            'qucreative_'.'meta_post_media' => 'https://vimeo.com/62193160',
            'post_content' => 'Proin turpis felis, imperdiet a scelerisque sed, ornare sit amet nulla. Fusce lacinia lorem vitae massa finibus sollicitudin. Sed facilisis leo nec magna sodales, ut imperdiet sapien porta. Cras neque sapien, pharetra sit amet risus nec, hendrerit tempor eros. Fusce eleifend velit eget venenatis interdum. Integer dolor mauris, interdum ut turpis ac, imperdiet vulputate magna. Etiam laoreet ante id arcu pretium maximus. Ut nec vestibulum lacus, a malesuada mi. In pulvinar tristique pellentesque. Fusce vel erat sagittis ligula ultrices vestibulum eleifend et tellus. Vestibulum efficitur laoreet vulputate. Aliquam finibus malesuada nunc vel venenatis. Mauris in posuere erat.

Proin fringilla eget sapien lacinia tempus. Praesent eleifend risus id ipsum tempus euismod. Pellentesque eget leo non leo dignissim euismod in nec risus. Cras mattis sapien sit amet quam ultricies, id malesuada neque euismod. Sed vel gravida magna, non porta tortor. Proin vel nulla suscipit, ultrices felis quis, laoreet arcu. Nulla interdum purus fermentum nisi lacinia, eget placerat augue viverra. Sed egestas est at pulvinar ornare. Sed eleifend fermentum ex at posuere. Aliquam dignissim luctus lectus, eu euismod nunc ullamcorper eget. Sed pulvinar nunc tempor neque ullamcorper placerat. Nulla aliquet orci leo, non tempus urna viverra non. Sed aliquam metus vestibulum posuere sagittis.',
            'post_status' => 'publish',
            'post_type' => 'post',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term_ph,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);



        $args = array(

            'post_title' => 'Hi, I am a YouTube video, nice to meet you',
            'custom_title' => 'This is a cool featured image example',
            'qucreative_'.'meta_post_media_type' => 'youtube',
            'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=9HC2o59SP6k',
            'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sodales nulla ligula, fringilla sollicitudin leo interdum sit amet. Vestibulum et est sed ipsum fringilla rhoncus. Aenean convallis nisi consectetur, pellentesque eros a, pellentesque turpis. Nunc tortor lectus, blandit elementum dui quis, elementum commodo justo. Pellentesque lacinia leo velit, sed consequat sapien lobortis dapibus. Curabitur volutpat orci arcu, fermentum pulvinar orci luctus eget. In hac habitasse platea dictumst. Duis orci ipsum, imperdiet eu ipsum et, egestas convallis augue.

Proin turpis felis, imperdiet a scelerisque sed, ornare sit amet nulla. Fusce lacinia lorem vitae massa finibus sollicitudin. Sed facilisis leo nec magna sodales, ut imperdiet sapien porta. Cras neque sapien, pharetra sit amet risus nec, hendrerit tempor eros. Fusce eleifend velit eget venenatis interdum. Integer dolor mauris, interdum ut turpis ac, imperdiet vulputate magna. Etiam laoreet ante id arcu pretium maximus. Ut nec vestibulum lacus, a malesuada mi. In pulvinar tristique pellentesque. Fusce vel erat sagittis ligula ultrices vestibulum eleifend et tellus. Vestibulum efficitur laoreet vulputate. Aliquam finibus malesuada nunc vel venenatis. Mauris in posuere erat.

Proin fringilla eget sapien lacinia tempus. Praesent eleifend risus id ipsum tempus euismod. Pellentesque eget leo non leo dignissim euismod in nec risus. Cras mattis sapien sit amet quam ultricies, id malesuada neque euismod. Sed vel gravida magna, non porta tortor. Proin vel nulla suscipit, ultrices felis quis, laoreet arcu. Nulla interdum purus fermentum nisi lacinia, eget placerat augue viverra. Sed egestas est at pulvinar ornare. Sed eleifend fermentum ex at posuere. Aliquam dignissim luctus lectus, eu euismod nunc ullamcorper eget. Sed pulvinar nunc tempor neque ullamcorper placerat. Nulla aliquet orci leo, non tempus urna viverra non. Sed aliquam metus vestibulum posuere sagittis.',
            'post_status' => 'publish',
            'post_type' => 'post',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term_cu,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);



        $args = array(

            'post_title' => 'Ahoy there, this is a nice slideshow',
            'custom_title' => 'This is a cool featured image example',

            'post_content' => 'Praesent malesuada consectetur arcu, eget cursus nibh commodo eget. Phasellus id risus tincidunt, tempus arcu sed, facilisis est. Nulla arcu ex, ultrices eget lorem ac, rutrum lacinia quam. Pellentesque dignissim augue id tortor auctor, ut vulputate tortor rhoncus. Proin ullamcorper pulvinar pellentesque. Maecenas at est sit amet odio convallis laoreet eget a lorem. Integer tempor, ipsum id congue sagittis, quam ligula ullamcorper elit, at semper odio risus rutrum metus. In quis erat malesuada, pretium nisl ac, eleifend odio. Nam ligula felis, congue non dolor eu, mollis tincidunt orci. Nullam orci magna, commodo id arcu eu, iaculis bibendum ante. Mauris eget libero sed metus feugiat ornare. Suspendisse pulvinar erat sed nulla pellentesque mattis. Donec venenatis ultrices lorem nec blandit.

Quisque at dui nec nisi venenatis suscipit. Donec bibendum lacinia arcu non lobortis. Proin mollis maximus dui gravida consequat. Etiam maximus mollis facilisis. Vivamus placerat ut magna tempor convallis. Sed nec ligula metus. Pellentesque euismod purus eget lacus accumsan, ac condimentum neque volutpat. Sed nec blandit nibh. Quisque accumsan turpis a cursus tempor. Mauris vel consectetur purus. Vestibulum vehicula neque sed consequat consequat.

Donec mollis libero et ex molestie egestas. Interdum et malesuada fames ac ante ipsum primis in faucibus. Integer quis lacinia purus, sit amet rhoncus dolor. Donec nec nibh malesuada lorem dignissim lobortis non vel justo. Sed euismod ultricies odio, at fermentum quam dapibus sit amet. Proin maximus dui quis posuere finibus. Maecenas egestas imperdiet est, nec pharetra eros gravida sit amet. Nulla quam quam, fermentum et massa at, placerat molestie nisi.',
            'post_status' => 'publish',
            'post_type' => 'post',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term_be,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);






        $args = array(

            'post_title' => 'This is a cool featured image example',
            'custom_title' => 'This is a cool featured image example',

            'post_content' => 'Praesent malesuada consectetur arcu, eget cursus nibh commodo eget. Phasellus id risus tincidunt, tempus arcu sed, facilisis est. Nulla arcu ex, ultrices eget lorem ac, rutrum lacinia quam. Pellentesque dignissim augue id tortor auctor, ut vulputate tortor rhoncus. Proin ullamcorper pulvinar pellentesque. Maecenas at est sit amet odio convallis laoreet eget a lorem. Integer tempor, ipsum id congue sagittis, quam ligula ullamcorper elit, at semper odio risus rutrum metus. In quis erat malesuada, pretium nisl ac, eleifend odio. Nam ligula felis, congue non dolor eu, mollis tincidunt orci. Nullam orci magna, commodo id arcu eu, iaculis bibendum ante. Mauris eget libero sed metus feugiat ornare. Suspendisse pulvinar erat sed nulla pellentesque mattis. Donec venenatis ultrices lorem nec blandit.

Quisque at dui nec nisi venenatis suscipit. Donec bibendum lacinia arcu non lobortis. Proin mollis maximus dui gravida consequat. Etiam maximus mollis facilisis. Vivamus placerat ut magna tempor convallis. Sed nec ligula metus. Pellentesque euismod purus eget lacus accumsan, ac condimentum neque volutpat. Sed nec blandit nibh. Quisque accumsan turpis a cursus tempor. Mauris vel consectetur purus. Vestibulum vehicula neque sed consequat consequat.

Donec mollis libero et ex molestie egestas. Interdum et malesuada fames ac ante ipsum primis in faucibus. Integer quis lacinia purus, sit amet rhoncus dolor. Donec nec nibh malesuada lorem dignissim lobortis non vel justo. Sed euismod ultricies odio, at fermentum quam dapibus sit amet. Proin maximus dui quis posuere finibus. Maecenas egestas imperdiet est, nec pharetra eros gravida sit amet. Nulla quam quam, fermentum et massa at, placerat molestie nisi.',
            'post_status' => 'publish',
            'post_type' => 'post',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term_li,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);






        $args = array(

            'post_title' => 'A nice Vimeo video of a car',
            'custom_title' => 'This is a cool featured image example',
            'qucreative_'.'meta_post_media_type' => 'vimeo',
            'qucreative_'.'meta_post_media' => 'https://vimeo.com/199855572',
            'post_content' => 'Etiam sodales blandit augue malesuada fermentum. Nam fringilla et ligula et facilisis. Vestibulum commodo nec lacus in pretium. Etiam ac bibendum purus, quis consectetur massa. Vivamus quis est ut enim sollicitudin blandit. Maecenas iaculis eget magna placerat pretium. Proin dictum mi vel lacus ultrices, ut placerat nulla tristique. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse potenti. Proin gravida justo ac sapien euismod aliquet.
<blockquote>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</blockquote>
Pellentesque eu nunc porta, elementum risus eu, lobortis nulla. Donec eget dui nec purus vehicula posuere. Ut mauris nibh, lobortis quis facilisis non, eleifend nec erat. Cras porta, dui a imperdiet suscipit, erat nulla rhoncus purus, sed faucibus nulla enim eu justo. Pellentesque sit amet turpis enim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque sed tincidunt eros, ut sodales lorem. Quisque rhoncus non nibh vel commodo. Sed tellus elit, semper a elementum sit amet, congue non sapien. Phasellus rhoncus bibendum vehicula. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque laoreet mi scelerisque, posuere odio at, condimentum lorem. Phasellus sollicitudin elit nec consequat vehicula. Suspendisse nec pellentesque tortor, et faucibus erat. Duis sem turpis, rutrum fringilla diam ac, pulvinar suscipit turpis.',
            'post_status' => 'publish',
            'post_type' => 'post',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term_be,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);






        $args = array(

            'post_title' => 'A very good example of a slider',
            'custom_title' => 'This is a cool featured image example',
            'qucreative_'.'meta_post_media_type' => 'slider',
            'qucreative_'.'meta_post_media' => $qucreative_theme_data['import_demo_last_attach_id'].','.$qucreative_theme_data['import_demo_last_attach_id'],
            'qucreative_'.'meta_image_gallery_in_meta' => $qucreative_theme_data['import_demo_last_attach_id'].','.$qucreative_theme_data['import_demo_last_attach_id'],
            'post_content' => 'Etiam sodales blandit augue malesuada fermentum. Nam fringilla et ligula et facilisis. Vestibulum commodo nec lacus in pretium. Etiam ac bibendum purus, quis consectetur massa. Vivamus quis est ut enim sollicitudin blandit. Maecenas iaculis eget magna placerat pretium. Proin dictum mi vel lacus ultrices, ut placerat nulla tristique. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse potenti. Proin gravida justo ac sapien euismod aliquet.
<blockquote>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</blockquote>
Pellentesque eu nunc porta, elementum risus eu, lobortis nulla. Donec eget dui nec purus vehicula posuere. Ut mauris nibh, lobortis quis facilisis non, eleifend nec erat. Cras porta, dui a imperdiet suscipit, erat nulla rhoncus purus, sed faucibus nulla enim eu justo. Pellentesque sit amet turpis enim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque sed tincidunt eros, ut sodales lorem. Quisque rhoncus non nibh vel commodo. Sed tellus elit, semper a elementum sit amet, congue non sapien. Phasellus rhoncus bibendum vehicula. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque laoreet mi scelerisque, posuere odio at, condimentum lorem. Phasellus sollicitudin elit nec consequat vehicula. Suspendisse nec pellentesque tortor, et faucibus erat. Duis sem turpis, rutrum fringilla diam ac, pulvinar suscipit turpis.',
            'post_status' => 'publish',
            'post_type' => 'post',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term_be,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);









        $args = array(

            'post_title' => 'Qu can showcase any type of media',
            'custom_title' => 'This is a cool featured image example',

            'post_content' => 'Etiam sodales blandit augue malesuada fermentum. Nam fringilla et ligula et facilisis. Vestibulum commodo nec lacus in pretium. Etiam ac bibendum purus, quis consectetur massa. Vivamus quis est ut enim sollicitudin blandit. Maecenas iaculis eget magna placerat pretium. Proin dictum mi vel lacus ultrices, ut placerat nulla tristique. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse potenti. Proin gravida justo ac sapien euismod aliquet.
<blockquote>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</blockquote>
Pellentesque eu nunc porta, elementum risus eu, lobortis nulla. Donec eget dui nec purus vehicula posuere. Ut mauris nibh, lobortis quis facilisis non, eleifend nec erat. Cras porta, dui a imperdiet suscipit, erat nulla rhoncus purus, sed faucibus nulla enim eu justo. Pellentesque sit amet turpis enim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque sed tincidunt eros, ut sodales lorem. Quisque rhoncus non nibh vel commodo. Sed tellus elit, semper a elementum sit amet, congue non sapien. Phasellus rhoncus bibendum vehicula. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque laoreet mi scelerisque, posuere odio at, condimentum lorem. Phasellus sollicitudin elit nec consequat vehicula. Suspendisse nec pellentesque tortor, et faucibus erat. Duis sem turpis, rutrum fringilla diam ac, pulvinar suscipit turpis.',
            'post_status' => 'publish',
            'post_type' => 'post',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term_be,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);



























        $cont = '';





        $args = array(
            'post_title'    => wp_strip_all_tags( 'Blog Meta' ),
            'post_content'  => $cont,
            'post_status'   => 'publish',
            'post_author'   => 1,
            'post_type'   => 'page',

        );


        $page_id = wp_insert_post( $args );




        update_post_meta(  $page_id ,'qucreative_'.'meta_custom_section_margin_bottom','0');
        update_post_meta(  $page_id ,'qucreative_'.'meta_bordered_design','on');
        update_post_meta(  $page_id ,'qucreative_'.'meta_content_starts_at_pixel','0');
        update_post_meta(  $page_id ,'qucreative_'.'meta_scrollbar_theme','light');
        update_post_meta(  $page_id ,'qucreative_'.'meta_custom_title','BLOG');
        update_post_meta(  $page_id ,'qucreative_'.'meta_use_sidebar','on');
        update_post_meta(  $page_id ,'qucreative_'.'meta_bg_image','#dddddd');



























        update_option( 'page_for_posts', '' );
        update_option( 'show_on_front', 'posts' );














	$option_name = 'sidebars_widgets';
	$option_value = 'a:4:{s:19:"wp_inactive_widgets";a:0:{}s:9:"sidebar-1";a:6:{i:0;s:16:"antfarm_search-2";i:1;s:20:"antfarm_categories-2";i:2;s:22:"antfarm_latest_posts-2";i:3;s:16:"antfarm_social-2";i:4;s:17:"antfarm_archive-2";i:5;s:10:"calendar-2";}s:14:"sidebar-footer";a:0:{}s:13:"array_version";i:3;}';



	qucreative_import_demo_update_widget($option_name,$option_value);






	$option_name = 'widget_antfarm_search';
	$option_value = 'a:2:{i:2;a:3:{s:5:"title";s:0:"";s:11:"button_text";s:0:"";s:20:"heading_style_button";s:0:"";}s:12:"_multiwidget";i:1;}';

	qucreative_import_demo_update_widget($option_name,$option_value);


	$option_name = 'widget_antfarm_latest_posts';
	$option_value = 'a:2:{i:2;a:3:{s:5:"title";s:12:"Latest Posts";s:5:"count";s:1:"3";s:15:"thumb_dimension";s:0:"";}s:12:"_multiwidget";i:1;}';

	qucreative_import_demo_update_widget($option_name,$option_value);


	$option_name = 'widget_antfarm_categories';
	$option_value = 'a:2:{i:2;a:1:{s:5:"title";s:10:"Categories";}s:12:"_multiwidget";i:1;}';

	qucreative_import_demo_update_widget($option_name,$option_value);


	$option_name = 'widget_antfarm_social';
	$option_value = 'a:2:{i:2;a:2:{s:5:"title";s:6:"Social";s:8:"repeater";s:198:"[{"title":"Like us on Facebook","link":"#","icon":"facebook-square"},{"title":"Follow us on Twitter","link":"#","icon":"twitter"},{"title":"Check us out on Pinterest","link":"#","icon":"pinterest"}]";}s:12:"_multiwidget";i:1;}';

	qucreative_import_demo_update_widget($option_name,$option_value);


	$option_name = 'widget_antfarm_archive';
	$option_value = 'a:2:{i:2;a:2:{s:5:"title";s:7:"Archive";s:5:"count";s:1:"9";}s:12:"_multiwidget";i:1;}';

	qucreative_import_demo_update_widget($option_name,$option_value);





	$option_name = 'widget_search';
	$option_value = 'a:3:{i:6;a:1:{s:5:"title";s:0:"";}i:7;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;}';

	qucreative_import_demo_update_widget($option_name,$option_value);



	$option_name = 'widget_calendar';
	$option_value = 'a:3:{i:2;a:1:{s:5:"title";s:8:"Calendar";}i:3;a:1:{s:5:"title";s:8:"Calendar";}s:12:"_multiwidget";i:1;}';

	qucreative_import_demo_update_widget($option_name,$option_value);






	$option_name = 'widget_meta';
	$option_value = 'a:2:{i:3;a:1:{s:5:"title";s:4:"Meta";}s:12:"_multiwidget";i:1;}';

	qucreative_import_demo_update_widget($option_name,$option_value);






	$option_name = 'widget_archives';
	$option_value = 'a:2:{i:3;a:3:{s:5:"title";s:8:"Archives";s:5:"count";i:0;s:8:"dropdown";i:0;}s:12:"_multiwidget";i:1;}';

	qucreative_import_demo_update_widget($option_name,$option_value);















	$ser_data = 'a:51:{s:14:"portfolio_page";s:0:"";s:11:"mail_method";s:7:"wp_mail";s:12:"blur_ammount";s:2:"26";s:23:"menu_enviroment_opacity";s:3:"100";s:26:"content_enviroment_opacity";s:3:"100";s:24:"secondary_content_height";s:3:"300";s:13:"gmaps_api_key";s:0:"";s:17:"soundcloud_apikey";s:0:"";s:13:"gmaps_styling";s:0:"";s:13:"content_align";s:20:"content-align-center";s:16:"page_title_align";s:22:"page-title-align-right";s:16:"page_title_style";s:18:"page-title-style-2";s:12:"width_column";s:2:"40";s:9:"width_gap";s:2:"30";s:17:"width_blur_margin";s:2:"30";s:16:"width_section_bg";s:0:"";s:24:"content_add_extra_pixels";s:0:"";s:12:"border_width";s:1:"0";s:12:"border_color";s:7:"#ffffff";s:37:"content_section_title_two_lines_space";s:1:"0";s:43:"content_section_title_two_lines_use_divider";s:0:"";s:49:"content_section_title_two_lines_use_divider_color";s:0:"";s:9:"menu_type";s:11:"menu-type-6";s:14:"menu_is_sticky";s:3:"off";s:28:"menu_horizontal_shadow_style";s:4:"none";s:12:"social_icons";s:2:"[]";s:23:"meta_options_post_types";b:0;s:4:"logo";s:'.strlen($logo_blogger).':"'.$logo_blogger.'";s:6:"logo_x";s:7:"default";s:13:"logo_x_custom";s:0:"";s:6:"logo_y";s:7:"default";s:10:"logo_width";s:0:"";s:11:"logo_height";s:0:"";s:13:"logo_y_custom";s:0:"";s:17:"copyright_textbox";s:22:"Default copyright text";s:31:"copyright_textbox_heading_style";s:9:"h-group-1";s:38:"footer_copyright_textbox_heading_style";s:9:"h-group-1";s:9:"font_data";s:3879:"headings_font=Playfair+Display&h1_weight=700&h1_size=70&h1_line_height=1.15&h1_responsive_slider=30&h2_weight=700&h2_size=50&h2_line_height=1.15&h2_responsive_slider=25&h3_weight=700&h3_size=40&h3_line_height=1.15&h3_responsive_slider=20&h4_weight=700&h4_size=30&h4_line_height=1.15&h4_responsive_slider=11&h5_weight=700&h5_size=20&h5_line_height=1.15&h5_responsive_slider=0&h6_weight=700&h6_size=14&h6_line_height=1.57&h6_responsive_slider=0&h-group-1_weight=700&h-group-1_size=11&h-group-1_line_height=1.54&h-group-1_responsive_slider=0&h-group-2_weight=700&h-group-2_size=25&h-group-2_line_height=1.28&h-group-2_responsive_slider=0&body_font=Open+Sans&p_weight=regular&p_size=13&p_line_height=1.92&p_color=%236b6b6b&p_color_for_light=%23bbbbbb&hyperlink_weight=600&font-group-1_weight=600italic&font-group-1_size=14&font-group-1_line_height=1.42&font-group-2_weight=600&font-group-2_size=14&font-group-2_line_height=1.42&font-group-3_weight=600italic&font-group-3_size=11&font-group-3_line_height=1.27&font-group-4_weight=italic&font-group-4_size=14&font-group-4_line_height=1.42&font-group-5_weight=600&font-group-5_size=14&font-group-5_line_height=1.42&font-group-6_weight=regular&font-group-6_size=13&font-group-6_line_height=1.46&font-group-7_weight=italic&font-group-7_size=13&font-group-7_line_height=1.46&font-group-8_weight=regular&font-group-8_size=13&font-group-8_line_height=1.46&font-group-9_weight=600&font-group-9_size=15&font-group-9_line_height=1.8&font-group-10_weight=600&font-group-10_size=16&font-group-10_line_height=1.68&font-group-11_weight=800&font-group-11_size=24&font-group-11_line_height=1.29&font-group-12_weight=regular&font-group-12_size=13&font-group-12_line_height=1.46&blockquote_weight=italic&blockquote_size=17&blockquote_line_height=1.58&menu_font=Playfair+Display&menu_weight=regular&menu_size=14&menu_line_height=1&copyright_font_link_to=headings&copyright_weight=700&copyright_size=10&copyright_line_height=1.4&page_title_font=Lato&page_title_weight=900&page_title_size=100&page_title_line_height=1.14&page_title_color=%23ffffff&page_title_responsive_slider=30&page_title_orientation=skewed&section_title_two_font=Lato&section_title_two_first_weight=300&section_title_two_first_size=50&section_title_two_first_line_height=1.1&section_title_two_first_color=%23222222&section_title_two_first_color_for_light=%23ffffff&section_title_two_first_responsive_slider=0&section_title_two_second_font=Lato&section_title_two_second_weight=900&section_title_two_second_size=100&section_title_two_second_line_height=1.1&section_title_two_second_color=%23222222&section_title_two_second_color_for_light=%23ffffff&section_title_two_second_responsive_slider=0&line_spacing=0&section_title_two_number_font=Lato&section_title_two_number_weight=900italic&section_title_two_number_size=50&section_title_two_number_line_height=1.1&section_title_two_number_color=%23222222&section_title_two_number_color_for_light=%23ffffff&section_title_two_divider_divider_style=style-box&section_title_two_divider_color=%23444444&section_title_two_divider_color_for_light=%23ffffff&title_divider_spacing_two=20&section_title_one_first_font=Lato&section_title_one_first_weight=900&section_title_one_first_size=25&section_title_one_first_line_height=1.28&section_title_one_first_color=%23444444&section_title_one_first_color_for_light=%23ffffff&section_title_one_first_responsive_slider=0&section_title_one_divider_enable=on&section_title_one_divider_divider_style=style-fullwidth&section_title_one_divider_color=%23444444&section_title_one_divider_color_for_light=%23ffffff&title_divider_spacing=20&home_slider_font_link_to=headings&home_slider_weight=900&home_slider_size=50&home_slider_line_height=1.20&home_slider_color=%23ffffff&home_slider_color_for_light=%23222222&home_number_font_link_to=headings&home_number_weight=900&home_number_size=135&home_number_line_height=1";s:32:"typography_sidebar_heading_style";s:2:"h6";s:31:"typography_footer_heading_style";s:2:"h6";s:24:"content_enviroment_style";s:16:"body-style-light";s:17:"greyscale_ammount";s:1:"0";s:21:"section_margin_bottom";s:2:"30";s:15:"highlight_color";s:7:"#ff8598";s:22:"enable_bordered_design";s:2:"on";s:23:"enable_native_scrollbar";s:2:"on";s:13:"bg_transition";s:9:"slidedown";s:11:"enable_ajax";s:2:"on";s:13:"bg_isparallax";s:3:"off";s:18:"custom_css_post_id";i:-1;s:18:"nav_menu_locations";a:2:{s:7:"primary";i:'.$menu_id.';s:6:"social";i:0;}}';





        qucreative_import_demo_update_preset($ser_data,array(

            'preseter_slug' => $demo_slug,
            'preseter_name' => $demo_name,
        ));









}























































$demo_slug = 'digital-agency';
$demo_name = 'Digital Agency';
if($_REQUEST['demo']==$demo_slug) {














    $img_name = '500x500.jpg';
    $img_url = QUCREATIVE_THEME_URL . 'placeholders/500x500.jpg';


    $img_path = QUCREATIVE_THEME_DIR . 'placeholders/500x500.jpg';


    $new_path = $upload_dir_path . '/' . $img_name;

    try {

        if (!copy($img_path, $new_path)) {

        } else {
            $img_url = $upload_dir_url . '/' . $img_name;
            $new_path = $img_path;
        }
    } catch (Exception $e) {
        print_rr($e);
    }












    $term = qucreative_import_demo_create_term_if_it_does_not_exist(array(
        'description' => '',
        'term_name' => $demo_name,
        'slug' => $demo_slug,
        'taxonomy' => $taxonomy,

    ));


    if (is_array($term)) {

        $term_id = $term['term_id'];
    } else {

        $term_id = $term->term_id;
    }



    $term_im = qucreative_import_demo_create_term_if_it_does_not_exist(array(
        'description' => '',
        'term_name' => "Images",
        'slug' => 'full-images',
        'taxonomy' => $taxonomy,
        'parent'=> $term_id,

    ));



    $term_mi = qucreative_import_demo_create_term_if_it_does_not_exist(array(
        'description' => '',
        'term_name' => "Mixed",
        'slug' => 'full-mixed',
        'taxonomy' => $taxonomy,
        'parent'=> $term_id,

    ));






    $term_sl = qucreative_import_demo_create_term_if_it_does_not_exist(array(
        'description' => '',
        'term_name' => "Slider",
        'slug' => 'full-slider',
        'taxonomy' => $taxonomy,
        'parent'=> $term_id,

    ));










        $attach_id = qucreative_import_demo_create_attachment($img_url, '1', $img_path);


        $qucreative_theme_data['import_demo_last_attach_id'] = $attach_id;

        $args = array(

            'post_title' => 'THE ACTRESS',
            'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'slider',
            'qucreative_'.'meta_post_media' => $attach_id.','.$attach_id,
            'qucreative_'.'meta_image_gallery_in_meta' => $attach_id.','.$attach_id,
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term_sl,
            'taxonomy' => $taxonomy,
        );


        $port_id = qucreative_import_demo_insert_post_complete($args);




        $args = array(

            'post_title' => 'HIP HOP WORLD',
            'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'vimeo',
            'qucreative_'.'meta_post_media' => 'https://vimeo.com/60588549',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term_mi,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'PATRICIA SMITH',
            'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'slider',
            'qucreative_'.'meta_post_media' => $attach_id.','.$attach_id,
            'qucreative_'.'meta_post_media' => $attach_id.','.$attach_id,
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term_sl,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'THE BEATS',
            'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'youtube',
            'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=6Qlz_Y4R4ok',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'SERIOUS MEN',
            'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'image',
            'qucreative_'.'meta_post_media' => $img_url,
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term_im,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'JACK\'S COFFEE SHOP',
            'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_post_media_type' => 'image',
            'qucreative_'.'meta_post_media' => $img_url,
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term_im,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'JASON THE JEWELER',
            'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'image',
            'qucreative_'.'meta_post_media' => $img_url,
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term_im,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'VERONICA SWIFT',
            'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'youtube',
            'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=6Qlz_Y4R4ok',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'CITY OF LIGHTS',
            'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'youtube',
            'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=QNZOOSxfQn8',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'BLUE EROTICA',
            'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'youtube',
            'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=6Qlz_Y4R4ok',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term_mi,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'JUNGLE BOOK',
            'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'youtube',
            'qucreative_'.'meta_video_cover_image' => $img_url,
            'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=6Qlz_Y4R4ok',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'DNG MOTORS',
            'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'vimeo',
            'qucreative_'.'meta_post_media' => 'https://vimeo.com/22884674',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term_mi,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'MY SMARTPHONE',
            'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'image',
            'qucreative_'.'meta_post_media' => $img_url,
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term_im,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'DJ BRONX',
            'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'slider',
            'qucreative_'.'meta_image_gallery_in_meta' => $attach_id.','.$attach_id,
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term_sl,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);




















































        $cont = '{"grid_cols":"5","items_arr":[{"w":"2","h":"2"},{"w":"2","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"}],"loop":"on"}';





        $args = array(
            'post_title'    => wp_strip_all_tags( $demo_name ),
            'post_name'    => $demo_slug,
            'post_content'  => $cont,
            'post_status'   => 'publish',
            'post_author'   => 1,
            'post_type'   => 'zfolio_grid',

        );


        $page_id = wp_insert_post( $args );








        $cont = '[vc_row][vc_column][antfarm_portfolio skin="skin-silver" zfolio-mode="mode-normal" link_whole_item="zoombox_item" gap="1px" cat="'.$demo_slug.'" mode="" layout="'.$demo_slug.'"][/vc_column][/vc_row]';





        $args = array(
            'post_title'    => wp_strip_all_tags( 'Qu '.$demo_name ),
            'post_content'  => $cont,
            'post_status'   => 'publish',
            'post_author'   => 1,
            'post_type'   => 'page',

        );


        $page_id = wp_insert_post( $args );





        update_post_meta( $page_id, '_wp_page_template', 'template-portfolio.php' );;
        update_post_meta(  $page_id ,'qucreative_'.'meta_custom_section_margin_bottom','0');
        update_post_meta(  $page_id ,'qucreative_'.'meta_content_starts_at','pixel-position');
        update_post_meta(  $page_id ,'qucreative_'.'meta_content_starts_at_pixel','0');
        update_post_meta(  $page_id ,'qucreative_'.'meta_disable_footer','on');
        update_post_meta(  $page_id ,'qucreative_'.'meta_overlay_opacity','85');
        update_post_meta(  $page_id ,'qucreative_'.'meta_overlay_color','#000000');

        update_post_meta(  $page_id ,'qucreative_'.'meta_is_fullscreen','on');


        update_post_meta(  $page_id ,'qucreative_'.'meta_bg_image',$img_url);












        update_option( 'page_on_front', $page_id );
        update_option( 'show_on_front', 'page' );















        $temp_text = '';


        $temp_text = preg_replace( "/\r|\n/", "", $temp_text );;






        $ser_data = 'a:51:{s:14:"portfolio_page";s:0:"";s:11:"mail_method";s:7:"wp_mail";s:12:"blur_ammount";s:2:"26";s:23:"menu_enviroment_opacity";s:2:"50";s:26:"content_enviroment_opacity";s:2:"30";s:24:"secondary_content_height";s:3:"300";s:13:"gmaps_api_key";s:0:"";s:17:"soundcloud_apikey";s:0:"";s:13:"gmaps_styling";s:0:"";s:13:"content_align";s:20:"content-align-center";s:16:"page_title_align";s:22:"page-title-align-right";s:16:"page_title_style";s:18:"page-title-style-2";s:12:"width_column";s:2:"40";s:9:"width_gap";s:2:"30";s:17:"width_blur_margin";s:2:"30";s:16:"width_section_bg";s:0:"";s:24:"content_add_extra_pixels";s:0:"";s:12:"border_width";s:1:"0";s:12:"border_color";s:7:"#ffffff";s:37:"content_section_title_two_lines_space";s:1:"0";s:43:"content_section_title_two_lines_use_divider";s:0:"";s:49:"content_section_title_two_lines_use_divider_color";s:0:"";s:9:"menu_type";s:11:"menu-type-1";s:14:"menu_is_sticky";s:3:"off";s:28:"menu_horizontal_shadow_style";s:4:"none";s:12:"social_icons";s:162:"[{"link":"#","icon":"facebook-square"},{"link":"#","icon":"behance"},{"link":"#","icon":"pinterest"},{"link":"#","icon":"twitter"},{"link":"#","icon":"linkedin"}]";s:23:"meta_options_post_types";b:0;s:4:"logo";s:'.strlen($logo_digital_agency).':"'.$logo_digital_agency.'";s:6:"logo_x";s:7:"default";s:13:"logo_x_custom";s:0:"";s:6:"logo_y";s:7:"default";s:10:"logo_width";s:0:"";s:11:"logo_height";s:0:"";s:13:"logo_y_custom";s:0:"";s:17:"copyright_textbox";s:14:"ANTFARM THEMES";s:31:"copyright_textbox_heading_style";s:9:"h-group-1";s:38:"footer_copyright_textbox_heading_style";s:9:"h-group-1";s:9:"font_data";s:3826:"headings_font=Lato&h1_weight=900&h1_size=70&h1_line_height=1.15&h1_responsive_slider=25&h2_weight=900&h2_size=50&h2_line_height=1.15&h2_responsive_slider=20&h3_weight=700&h3_size=40&h3_line_height=1.15&h3_responsive_slider=15&h4_weight=700&h4_size=30&h4_line_height=1.15&h4_responsive_slider=10&h5_weight=700&h5_size=20&h5_line_height=1.15&h5_responsive_slider=0&h6_weight=700&h6_size=14&h6_line_height=1.57&h6_responsive_slider=0&h-group-1_weight=900&h-group-1_size=11&h-group-1_line_height=1.54&h-group-1_responsive_slider=0&h-group-2_weight=900&h-group-2_size=25&h-group-2_line_height=1.28&h-group-2_responsive_slider=0&body_font=Open+Sans&p_weight=regular&p_size=13&p_line_height=1.92&p_color=%236b6b6b&p_color_for_light=%23ffffff&hyperlink_weight=700&font-group-1_weight=600italic&font-group-1_size=14&font-group-1_line_height=1.42&font-group-2_weight=700&font-group-2_size=14&font-group-2_line_height=1.42&font-group-3_weight=600italic&font-group-3_size=11&font-group-3_line_height=1.27&font-group-4_weight=italic&font-group-4_size=14&font-group-4_line_height=1.42&font-group-5_weight=600&font-group-5_size=14&font-group-5_line_height=1.42&font-group-6_weight=regular&font-group-6_size=13&font-group-6_line_height=1.46&font-group-7_weight=italic&font-group-7_size=13&font-group-7_line_height=1.46&font-group-8_weight=regular&font-group-8_size=13&font-group-8_line_height=1.46&font-group-9_weight=600&font-group-9_size=15&font-group-9_line_height=1.8&font-group-10_weight=regular&font-group-10_size=16&font-group-10_line_height=1.68&font-group-11_weight=regular&font-group-11_size=24&font-group-11_line_height=1.29&font-group-12_weight=600&font-group-12_size=13&font-group-12_line_height=1.46&blockquote_weight=italic&blockquote_size=17&blockquote_line_height=1.58&menu_font=Lato&menu_weight=regular&menu_size=18&menu_line_height=1&copyright_font_link_to=headings&copyright_weight=700&copyright_size=10&copyright_line_height=1.4&page_title_font=Lato&page_title_weight=900&page_title_size=70&page_title_line_height=1.14&page_title_color=%23FFFFFF&page_title_responsive_slider=0&page_title_orientation=horizontal&section_title_two_font=Lato&section_title_two_first_weight=900&section_title_two_first_size=50&section_title_two_first_line_height=1.14&section_title_two_first_color=%23222222&section_title_two_first_color_for_light=%23222222&section_title_two_first_responsive_slider=0&section_title_two_second_font=Lato&section_title_two_second_weight=900&section_title_two_second_size=50&section_title_two_second_line_height=1.14&section_title_two_second_color=%23222222&section_title_two_second_color_for_light=%23222222&section_title_two_second_responsive_slider=0&line_spacing=20&section_title_two_number_font=Lato&section_title_two_number_weight=900&section_title_two_number_size=130&section_title_two_number_line_height=1&section_title_two_number_color=%23444444&section_title_two_number_color_for_light=%23ffffff&section_title_two_divider_divider_style=style-fullwidth&section_title_two_divider_color=%23444444&section_title_two_divider_color_for_light=%23ffffff&title_divider_spacing_two=20&section_title_one_first_font=Lato&section_title_one_first_weight=900&section_title_one_first_size=25&section_title_one_first_line_height=1.28&section_title_one_first_color=%23444444&section_title_one_first_color_for_light=%23ffffff&section_title_one_first_responsive_slider=0&section_title_one_divider_divider_style=style-fullwidth&section_title_one_divider_color=%23444444&section_title_one_divider_color_for_light=%23ffffff&title_divider_spacing=20&home_slider_font_link_to=headings&home_slider_weight=900&home_slider_size=50&home_slider_line_height=1.20&home_slider_color=%23ffffff&home_slider_color_for_light=%23222222&home_number_font_link_to=headings&home_number_weight=900&home_number_size=135&home_number_line_height=1";s:32:"typography_sidebar_heading_style";s:2:"h6";s:31:"typography_footer_heading_style";s:2:"h6";s:24:"content_enviroment_style";s:15:"body-style-dark";s:17:"greyscale_ammount";s:3:"100";s:21:"section_margin_bottom";s:2:"30";s:15:"highlight_color";s:7:"#3acfe0";s:22:"enable_bordered_design";s:2:"on";s:23:"enable_native_scrollbar";s:2:"on";s:13:"bg_transition";s:9:"slidedown";s:11:"enable_ajax";s:2:"on";s:13:"bg_isparallax";s:3:"off";s:18:"custom_css_post_id";i:-1;s:18:"nav_menu_locations";a:2:{s:7:"primary";i:'.$menu_id.';s:6:"social";i:0;}}';









        qucreative_import_demo_update_preset($ser_data,array(

            'preseter_slug' => $demo_slug,
            'preseter_name' => $demo_name,
        ));




























}













































$demo_slug = 'freelancer';
$demo_name = 'Freelancer';
if($_REQUEST['demo']==$demo_slug) {













    $img_name = '500x500.jpg';
    $img_url = QUCREATIVE_THEME_URL . 'placeholders/500x500.jpg';


    $img_path = QUCREATIVE_THEME_DIR . 'placeholders/500x500.jpg';


    $new_path = $upload_dir_path . '/' . $img_name;

    try {

        if (!copy($img_path, $new_path)) {

        } else {
            $img_url = $upload_dir_url . '/' . $img_name;
            $new_path = $img_path;
        }
    } catch (Exception $e) {
        print_rr($e);
    }








	$term = qucreative_import_demo_create_term_if_it_does_not_exist(array(
		'description' => '',
		'term_name' => $demo_name,
		'slug' => $demo_slug,
		'taxonomy' => $taxonomy,

	));


	if (is_array($term)) {

		$term_id = $term['term_id'];
	} else {

		$term_id = $term->term_id;
	}









    $term_im = qucreative_import_demo_create_term_if_it_does_not_exist(array(
        'description' => '',
        'term_name' => "Images",
        'slug' => 'pc-images',
        'taxonomy' => $taxonomy,
        'parent'=> $term_id,

    ));






    $term_mi = qucreative_import_demo_create_term_if_it_does_not_exist(array(
        'description' => '',
        'term_name' => "Mixed",
        'slug' => 'pc-mixed',
        'taxonomy' => $taxonomy,
        'parent'=> $term_id,

    ));






    $term_sl = qucreative_import_demo_create_term_if_it_does_not_exist(array(
        'description' => '',
        'term_name' => "Slider",
        'slug' => 'pc-slider',
        'taxonomy' => $taxonomy,
        'parent'=> $term_id,

    ));













        $attach_id = qucreative_import_demo_create_attachment($img_url, '1', $img_path);


        $qucreative_theme_data['import_demo_last_attach_id'] = $attach_id;

        $args = array(

            'post_title' => 'THE ACTRESS',
            'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'slider',
            'qucreative_'.'meta_image_gallery_in_meta' => $attach_id.','.$attach_id,
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term_sl,
            'taxonomy' => $taxonomy,
        );


        $port_id = qucreative_import_demo_insert_post_complete($args);




        $args = array(

            'post_title' => 'HIP HOP WORLD',
            'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'vimeo',
            'qucreative_'.'meta_post_media' => 'https://vimeo.com/60588549',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term_mi,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'PATRICIA SMITH',
            'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'slider',
            'qucreative_'.'meta_image_gallery_in_meta' => $attach_id.','.$attach_id,
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term_sl,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'THE BEATS',
            'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'youtube',
            'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=6Qlz_Y4R4ok',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'SERIOUS MEN',
            'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'image',
            'qucreative_'.'meta_post_media' => $img_url,
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term_im,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'JACK\'S COFFEE SHOP',
            'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_post_media_type' => 'image',
            'qucreative_'.'meta_post_media' => $img_url,
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term_im,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'JASON THE JEWELER',
            'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'image',
            'qucreative_'.'meta_post_media' => $img_url,
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term_im,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'VERONICA SWIFT',
            'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'youtube',
            'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=6Qlz_Y4R4ok',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'CITY OF LIGHTS',
            'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'youtube',
            'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=QNZOOSxfQn8',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'BLUE EROTICA',
            'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'youtube',
            'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=6Qlz_Y4R4ok',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term_mi,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'JUNGLE BOOK',
            'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'youtube',
            'qucreative_'.'meta_video_cover_image' => $img_url,
            'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=6Qlz_Y4R4ok',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'DNG MOTORS',
            'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'vimeo',
            'qucreative_'.'meta_post_media' => 'https://vimeo.com/22884674',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term_sl,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'MY SMARTPHONE',
            'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'image',
            'qucreative_'.'meta_post_media' => $img_url,
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term_im,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'DJ BRONX',
            'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'slider',
            'qucreative_'.'meta_image_gallery_in_meta' => $attach_id.','.$attach_id,
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term_sl,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);






















































        $cont = '[vc_row][vc_column][antfarm_portfolio skin="skin-melbourne" zfolio-mode="mode-normal" link_whole_item="portfolio_item" gap="2px" pagination_method="off" cat="'.$demo_slug.'" mode="" layout="dzs-layout--4-cols"][/vc_column][/vc_row]';





        $args = array(
            'post_title'    => wp_strip_all_tags( 'Qu '.$demo_name ),
            'post_content'  => $cont,
            'post_status'   => 'publish',
            'post_author'   => 1,
            'post_type'   => 'page',

        );


        $page_id = wp_insert_post( $args );





        update_post_meta( $page_id, '_wp_page_template', 'template-portfolio.php' );;
        update_post_meta(  $page_id ,'qucreative_'.'meta_custom_section_margin_bottom','0');
        update_post_meta(  $page_id ,'qucreative_'.'meta_content_starts_at','pixel-position');
        update_post_meta(  $page_id ,'qucreative_'.'meta_content_starts_at_pixel','0');
        update_post_meta(  $page_id ,'qucreative_'.'meta_disable_footer','on');



        update_post_meta(  $page_id ,'qucreative_'.'meta_is_fullscreen','on');

        update_post_meta(  $page_id ,'qucreative_'.'meta_custom_title',' ');
        update_post_meta(  $page_id ,'qucreative_'.'meta_bg_image',$img_url);












        update_option( 'page_on_front', $page_id );
        update_option( 'show_on_front', 'page' );













        $temp_text = '';


        $temp_text = preg_replace( "/\r|\n/", "", $temp_text );;






        $ser_data = 'a:51:{s:14:"portfolio_page";s:'.strlen($page_id).':"'.$page_id.'";s:11:"mail_method";s:7:"wp_mail";s:12:"blur_ammount";s:2:"26";s:23:"menu_enviroment_opacity";s:2:"30";s:26:"content_enviroment_opacity";s:2:"50";s:24:"secondary_content_height";s:3:"300";s:13:"gmaps_api_key";s:0:"";s:17:"soundcloud_apikey";s:0:"";s:13:"gmaps_styling";s:0:"";s:13:"content_align";s:20:"content-align-center";s:16:"page_title_align";s:22:"page-title-align-right";s:16:"page_title_style";s:18:"page-title-style-2";s:12:"width_column";s:2:"45";s:9:"width_gap";s:2:"30";s:17:"width_blur_margin";s:2:"50";s:16:"width_section_bg";s:0:"";s:24:"content_add_extra_pixels";s:0:"";s:12:"border_width";s:1:"0";s:12:"border_color";s:7:"#ffffff";s:37:"content_section_title_two_lines_space";s:1:"0";s:43:"content_section_title_two_lines_use_divider";s:0:"";s:49:"content_section_title_two_lines_use_divider_color";s:0:"";s:9:"menu_type";s:11:"menu-type-7";s:14:"menu_is_sticky";s:3:"off";s:28:"menu_horizontal_shadow_style";s:4:"none";s:12:"social_icons";s:162:"[{"link":"#","icon":"behance"},{"link":"#","icon":"facebook-square"},{"link":"#","icon":"twitter"},{"link":"#","icon":"linkedin"},{"link":"#","icon":"pinterest"}]";s:23:"meta_options_post_types";b:0;s:4:"logo";s:'.strlen($logo_freelancer).':"'.$logo_freelancer.'";s:6:"logo_x";s:7:"default";s:13:"logo_x_custom";s:0:"";s:6:"logo_y";s:7:"default";s:10:"logo_width";s:0:"";s:11:"logo_height";s:0:"";s:13:"logo_y_custom";s:0:"";s:17:"copyright_textbox";s:22:"Default copyright text";s:31:"copyright_textbox_heading_style";s:9:"h-group-1";s:38:"footer_copyright_textbox_heading_style";s:9:"h-group-1";s:9:"font_data";s:3844:"headings_font=Oswald&h1_weight=500&h1_size=70&h1_line_height=1.15&h1_responsive_slider=25&h2_weight=500&h2_size=50&h2_line_height=1.15&h2_responsive_slider=20&h3_weight=500&h3_size=40&h3_line_height=1.15&h3_responsive_slider=15&h4_weight=500&h4_size=30&h4_line_height=1.15&h4_responsive_slider=10&h5_weight=500&h5_size=20&h5_line_height=1.15&h5_responsive_slider=0&h6_weight=500&h6_size=15&h6_line_height=1.57&h6_responsive_slider=0&h-group-1_weight=500&h-group-1_size=11&h-group-1_line_height=1.54&h-group-1_responsive_slider=0&h-group-2_weight=500&h-group-2_size=25&h-group-2_line_height=1.28&h-group-2_responsive_slider=0&body_font=Open+Sans&p_weight=regular&p_size=13&p_line_height=1.92&p_color=%236b6b6b&p_color_for_light=%23bbbbbb&hyperlink_weight=600&font-group-1_weight=600italic&font-group-1_size=14&font-group-1_line_height=1.42&font-group-2_weight=600&font-group-2_size=14&font-group-2_line_height=1.42&font-group-3_weight=600italic&font-group-3_size=11&font-group-3_line_height=1.27&font-group-4_weight=italic&font-group-4_size=14&font-group-4_line_height=1.42&font-group-5_weight=600&font-group-5_size=14&font-group-5_line_height=1.42&font-group-6_weight=regular&font-group-6_size=13&font-group-6_line_height=1.46&font-group-7_weight=italic&font-group-7_size=13&font-group-7_line_height=1.46&font-group-8_weight=regular&font-group-8_size=13&font-group-8_line_height=1.46&font-group-9_weight=600&font-group-9_size=15&font-group-9_line_height=1.8&font-group-10_weight=600&font-group-10_size=16&font-group-10_line_height=1.68&font-group-11_weight=800&font-group-11_size=24&font-group-11_line_height=1.29&font-group-12_weight=600&font-group-12_size=13&font-group-12_line_height=1.46&blockquote_weight=italic&blockquote_size=17&blockquote_line_height=1.58&menu_font=Oswald&menu_weight=500&menu_size=20&menu_line_height=1&copyright_font_link_to=headings&copyright_weight=700&copyright_size=10&copyright_line_height=1.4&page_title_font=Lato&page_title_weight=900&page_title_size=70&page_title_line_height=1.14&page_title_color=&page_title_responsive_slider=0&page_title_orientation=horizontal&section_title_two_font=Lato&section_title_two_first_weight=300&section_title_two_first_size=50&section_title_two_first_line_height=1.1&section_title_two_first_color=%23222222&section_title_two_first_color_for_light=%23ffffff&section_title_two_first_responsive_slider=0&section_title_two_second_font=Lato&section_title_two_second_weight=900&section_title_two_second_size=100&section_title_two_second_line_height=1.1&section_title_two_second_color=%23222222&section_title_two_second_color_for_light=%23ffffff&section_title_two_second_responsive_slider=0&line_spacing=0&section_title_two_number_font=Lato&section_title_two_number_weight=900italic&section_title_two_number_size=50&section_title_two_number_line_height=1.1&section_title_two_number_color=%23222222&section_title_two_number_color_for_light=%23ffffff&section_title_two_divider_divider_style=style-box&section_title_two_divider_color=%23444444&section_title_two_divider_color_for_light=%23ffffff&title_divider_spacing_two=20&section_title_one_first_font=Lato&section_title_one_first_weight=900&section_title_one_first_size=25&section_title_one_first_line_height=1.28&section_title_one_first_color=%23444444&section_title_one_first_color_for_light=%23ffffff&section_title_one_first_responsive_slider=0&section_title_one_divider_enable=on&section_title_one_divider_divider_style=style-fullwidth&section_title_one_divider_color=%23444444&section_title_one_divider_color_for_light=%23ffffff&title_divider_spacing=20&home_slider_font_link_to=headings&home_slider_weight=200&home_slider_size=50&home_slider_line_height=1.20&home_slider_color=%23ffffff&home_slider_color_for_light=%23222222&home_number_font_link_to=headings&home_number_weight=200&home_number_size=135&home_number_line_height=1";s:32:"typography_sidebar_heading_style";s:2:"h6";s:31:"typography_footer_heading_style";s:2:"h6";s:24:"content_enviroment_style";s:15:"body-style-dark";s:17:"greyscale_ammount";s:1:"0";s:21:"section_margin_bottom";s:2:"30";s:15:"highlight_color";s:7:"#c2d300";s:22:"enable_bordered_design";s:2:"on";s:23:"enable_native_scrollbar";s:3:"off";s:13:"bg_transition";s:9:"slidedown";s:11:"enable_ajax";s:2:"on";s:13:"bg_isparallax";s:2:"on";s:18:"custom_css_post_id";i:-1;s:18:"nav_menu_locations";a:2:{s:7:"primary";i:'.$menu_id.';s:6:"social";i:0;}}';





        qucreative_import_demo_update_preset($ser_data,array(

            'preseter_slug' => $demo_slug,
            'preseter_name' => $demo_name,
        ));





























        
}


































$demo_slug = 'showcase';
$demo_name = 'Showcase';
if($_REQUEST['demo']==$demo_slug) {


    $img_name = '500x500.jpg';
    $img_url = QUCREATIVE_THEME_URL . 'placeholders/500x500.jpg';


    $img_path = QUCREATIVE_THEME_DIR . 'placeholders/500x500.jpg';


    $new_path = $upload_dir_path . '/' . $img_name;

    try {

        if (!copy($img_path, $new_path)) {

        } else {
            $img_url = $upload_dir_url . '/' . $img_name;
            $new_path = $img_path;
        }
    } catch (Exception $e) {
        print_rr($e);
    }




	$term = qucreative_import_demo_create_term_if_it_does_not_exist(array(
		'description' => '',
		'term_name' => $demo_name,
		'slug' => $demo_slug,
		'taxonomy' => $taxonomy,

	));




	if(is_array($term)){

		$term_id = $term['term_id'];
	}else{

		$term_id = $term->term_id;
	}








	$attach_id = qucreative_import_demo_create_attachment($img_url, '1', $img_path);


        $qucreative_theme_data['import_demo_last_attach_id'] = $attach_id;

        $args = array(

            'post_title' => 'FAST AND BEAUTIFUL',
            'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'slider',
            'qucreative_'.'meta_post_media' => $attach_id.','.$attach_id,
            'qucreative_'.'meta_post_media_type' => 'vimeo',
            'qucreative_'.'meta_post_media' => 'https://vimeo.com/60588549',
            'qucreative_'.'meta_post_layout_for_excerpt' => 'small',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
        );


        $port_id = qucreative_import_demo_insert_post_complete($args);




        $args = array(

            'post_title' => 'SAFARI ADVENTURE',
            'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'vimeo',
            'qucreative_'.'meta_post_media' => 'https://vimeo.com/60588549',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'UNDERWATER',
            'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco..',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'slider',
            'qucreative_'.'meta_image_gallery_in_meta' => $attach_id.','.$attach_id,
            'qucreative_'.'meta_post_layout_for_excerpt' => 'small',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'EROTICA BLUE',
            'post_content' => 'Pellentesque luctus semper eros, eu pellentesque arcu ornare ac. Nam gravida accumsan mi, sit amet egestas magna ullamcorper ut. Mauris consequat mollis erat, ut commodo ipsum faucibus ut. Donec quis bibendum ante. Maecenas nec urna sem. Nunc non eleifend augue. Fusce nec massa pharetra, luctus risus at, vulputate nulla. Integer consequat arcu accumsan massa maximus feugiat. Etiam sapien tellus, dignissim et egestas in, pellentesque vitae lacus. Ut ante nibh, efficitur a eros non, porta pretium augue. Aenean at dictum dolor. Aliquam consectetur posuere ante non volutpat. In porttitor tincidunt cursus. Duis blandit suscipit mauris quis varius. Mauris tristique lorem id ornare cursus. Nunc eget dignissim lectus. Cras dignissim tincidunt volutpat. Maecenas volutpat pellentesque vestibulum. Vivamus accumsan viverra nunc, et rhoncus diam vulputate ut.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'youtube',
            'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=6Qlz_Y4R4ok',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'I AM STRONG',
            'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'image',
            'qucreative_'.'meta_post_media' => $img_url,
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'ADRENALINE RUSH',
            'post_content' => '[vc_row][vc_column width="1/2"][vc_column_text]Lorem ipsum dolor sit amet mauris, consectetur adipiscing elit. Maecenas ex mauris, scelerisque sed justo ut, fermentum ultricies ante. Aliquam ultrices purus quis lacinia vulputate. Nullam volutpat lectus et justo iaculis, a convallis diam eleifend cremittas. Pellentesque vulputate magna ac quam laoreet, ornare venenatis erat vulputate. Suspendisse nec libero nec sem hendrerit faucibus eget a elit. Cras et suscipit justo, ut suscipit ante. Aenean leo urna, vestibulum non odio nec, mollis aliquam orci.[/vc_column_text][/vc_column][vc_column width="1/2"][vc_column_text]Nunc aliquet purus lorem, at lacinia elit auctor et. Proin laoreet mest sollicitudin condimentum. Curabitur id ultricies odio. Etiam ut dapibus metus. Morbi suscipit justo eget metus fermentum, quis porta lorem imperdiet. Quisque facilisis vitae ipsum eu lobortis. Fusce in nulla ac urna iaculis iaculis dignissim eu tellus. Fusce tellus leo, facilisis sit amet cursus eget, rutrum eu arcu. Aenean tristique orci elit, suscipit pulvinar risus mattis vel. Vivamus accumsan viverra nunc, et rhoncus maxim.[/vc_column_text][/vc_column][/vc_row]',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_post_media_type' => 'image',
            'qucreative_'.'meta_post_media' => $img_url,
            'qucreative_'.'meta_post_media_type' => 'youtube',
            'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=6Qlz_Y4R4ok',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'THE HORSE RIDER',
            'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'image',
            'qucreative_'.'meta_post_layout_for_excerpt' => 'small',
            'qucreative_'.'meta_post_media' => $img_url,
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'THE HAPPY SHOP',
            'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'youtube',
            'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=6Qlz_Y4R4ok',
            'qucreative_'.'meta_post_media_type' => 'image',

            'qucreative_'.'meta_post_media' => $img_url,
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'COOLEST CITY',
            'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'youtube',
            'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=QNZOOSxfQn8',
            'qucreative_'.'meta_post_media_type' => 'vimeo',
            'qucreative_'.'meta_post_media' => 'https://vimeo.com/60588549',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'BLUE EROTICA',
            'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'youtube',
            'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=6Qlz_Y4R4ok',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'CLASSIC CARS',
            'post_content' => '[vc_row][vc_column width="1/2"][vc_column_text]Lorem ipsum dolor sit amet mauris, consectetur adipiscing elit. Maecenas ex mauris, scelerisque sed justo ut, fermentum ultricies ante. Aliquam ultrices purus quis lacinia vulputate. Nullam volutpat lectus et justo iaculis, a convallis diam eleifend cremittas. Pellentesque vulputate magna ac quam laoreet, ornare venenatis erat vulputate. Suspendisse nec libero nec sem hendrerit faucibus eget a elit.[/vc_column_text][/vc_column][vc_column width="1/2"][vc_column_text]Nunc aliquet purus lorem, at lacinia elit auctor et. Proin laoreet mest sollicitudin condimentum. Curabitur id ultricies odio. Etiam ut dapibus metus. Morbi suscipit justo eget metus fermentum, quis porta lorem imperdiet. Quisque facilisis vitae ipsum eu lobortis. Fusce in nulla ac urna iaculis iaculis dignissim eu tellus. Fusce tellus leo, facilisis sit amet cursus eget, rutrum eu arcu.[/vc_column_text][/vc_column][/vc_row]',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'youtube',

            'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=6Qlz_Y4R4ok',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'FROM ABOVE',
            'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'slider',
            'qucreative_'.'meta_post_media' => $attach_id.','.$attach_id,

            'qucreative_'.'meta_image_gallery_in_meta' => $img_url,
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'WILLIAMS WEAR',
            'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean dignissim tortor eget lorem imperdiet auctor. Curabitur in rhoncus risus, quis ornare dolor. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque varius sit amet neque in sagittis. Nulla facilisi. Sed et diam at arcu laoreet sodales. Ut nec pharetra lacus. Cras et suscipit justo, ut suscipit ante. Aenean leo urna, vestibulum non odio nec, mollis aliquam orci.

Pellentesque non auctor quam. Aenean tristique orci elit, suscipit pulvinar risus mattis vel. Proin ullamcorper condimentum tristique. Aenean nulla nisl, tincidunt non posuere mollis, scelerisque eu velit. Suspendisse eget lectus sagittis, volutpat est vel, hendrerit arcu. Aliquam vitae sagittis velit. Nunc porttitor velit at pellentesque tincidunt. Phasellus eu finibus leo. Praesent congue arcu vitae orci ullamcorper, in auctor lacus placerat.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'image',
            'qucreative_'.'meta_post_media' => $img_url,
            'qucreative_'.'meta_post_media_type' => 'slider',
            'qucreative_'.'meta_post_media' => $attach_id.','.$attach_id,
            'qucreative_'.'meta_image_gallery_in_meta' => $attach_id.','.$attach_id,
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);











        $cont = '{"grid_cols":"4","items_arr":[{"w":"2","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"2","h":"2"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"}],"loop":"off"}';





        $args = array(
            'post_title'    => wp_strip_all_tags( $demo_name ),
            'post_name'    => $demo_slug,
            'post_content'  => $cont,
            'post_status'   => 'publish',
            'post_author'   => 1,
            'post_type'   => 'zfolio_grid',

        );


        $page_id = wp_insert_post( $args );














        $cont = '[vc_row][vc_column][antfarm_portfolio skin="skin-qucreative zfolio-portfolio-expandable" link_whole_item="item_excerpt" gap="0" cat="'.$demo_slug.'" extra_classes=" add-loaded-on-images-animation" mode="" layout="'.$demo_slug.'"][/vc_column][/vc_row]';





        $args = array(
            'post_title'    => wp_strip_all_tags( 'Qu '.$demo_name ),
            'post_content'  => $cont,
            'post_status'   => 'publish',
            'post_author'   => 1,
            'post_type'   => 'page',

        );


        $page_id = wp_insert_post( $args );





        update_post_meta( $page_id, '_wp_page_template', 'template-portfolio.php' );;
        update_post_meta(  $page_id ,'qucreative_'.'meta_custom_section_margin_bottom','0');
        update_post_meta(  $page_id ,'qucreative_'.'meta_content_starts_at','pixel-position');
        update_post_meta(  $page_id ,'qucreative_'.'meta_content_starts_at_pixel','0');
        update_post_meta(  $page_id ,'qucreative_'.'meta_disable_footer','on');



        update_post_meta(  $page_id ,'qucreative_'.'meta_is_fullscreen','on');

        update_post_meta(  $page_id ,'qucreative_'.'meta_custom_title',' ');
        update_post_meta(  $page_id ,'qucreative_'.'meta_bg_image',$img_url);












        update_option( 'page_on_front', $page_id );
        update_option( 'show_on_front', 'page' );













        $temp_text = '';


        $temp_text = preg_replace( "/\r|\n/", "", $temp_text );;






        $ser_data = 'a:51:{s:14:"portfolio_page";s:0:"";s:11:"mail_method";s:7:"wp_mail";s:12:"blur_ammount";s:2:"26";s:23:"menu_enviroment_opacity";s:2:"30";s:26:"content_enviroment_opacity";s:3:"100";s:24:"secondary_content_height";s:3:"300";s:13:"gmaps_api_key";s:0:"";s:17:"soundcloud_apikey";s:0:"";s:13:"gmaps_styling";s:0:"";s:13:"content_align";s:20:"content-align-center";s:16:"page_title_align";s:22:"page-title-align-right";s:16:"page_title_style";s:18:"page-title-style-2";s:12:"width_column";s:2:"40";s:9:"width_gap";s:2:"30";s:17:"width_blur_margin";s:2:"30";s:16:"width_section_bg";s:0:"";s:24:"content_add_extra_pixels";s:0:"";s:12:"border_width";s:1:"0";s:12:"border_color";s:7:"#ffffff";s:37:"content_section_title_two_lines_space";s:1:"0";s:43:"content_section_title_two_lines_use_divider";s:0:"";s:49:"content_section_title_two_lines_use_divider_color";s:0:"";s:9:"menu_type";s:12:"menu-type-12";s:14:"menu_is_sticky";s:3:"off";s:28:"menu_horizontal_shadow_style";s:4:"none";s:12:"social_icons";s:165:"[{"link":"#","icon":"facebook-square"},{"link":"#","icon":"twitter"},{"link":"#","icon":"linkedin"},{"link":"#","icon":"behance"},{"link":"#","icon":"youtube-play"}]";s:23:"meta_options_post_types";b:0;s:4:"logo";s:'.strlen($logo_showcase).':"'.$logo_showcase.'";s:6:"logo_x";s:15:"custom_position";s:13:"logo_x_custom";s:2:"20";s:6:"logo_y";s:15:"custom_position";s:10:"logo_width";s:0:"";s:11:"logo_height";s:0:"";s:13:"logo_y_custom";s:1:"0";s:17:"copyright_textbox";s:14:"ANTFARM THEMES";s:31:"copyright_textbox_heading_style";s:9:"h-group-1";s:38:"footer_copyright_textbox_heading_style";s:9:"h-group-1";s:9:"font_data";s:3857:"headings_font=Oswald&h1_weight=700&h1_size=70&h1_line_height=1.15&h1_responsive_slider=25&h2_weight=700&h2_size=50&h2_line_height=1.15&h2_responsive_slider=20&h3_weight=700&h3_size=40&h3_line_height=1.15&h3_responsive_slider=15&h4_weight=700&h4_size=30&h4_line_height=1.15&h4_responsive_slider=10&h5_weight=700&h5_size=20&h5_line_height=1.15&h5_responsive_slider=0&h6_weight=700&h6_size=14&h6_line_height=1.57&h6_responsive_slider=0&h-group-1_weight=700&h-group-1_size=11&h-group-1_line_height=1.54&h-group-1_responsive_slider=0&h-group-2_weight=700&h-group-2_size=25&h-group-2_line_height=1.28&h-group-2_responsive_slider=0&body_font=Open+Sans&p_weight=regular&p_size=13&p_line_height=1.92&p_color=%236b6b6b&p_color_for_light=%23bbbbbb&hyperlink_weight=600&font-group-1_weight=600italic&font-group-1_size=14&font-group-1_line_height=1.42&font-group-2_weight=600&font-group-2_size=14&font-group-2_line_height=1.42&font-group-3_weight=600italic&font-group-3_size=11&font-group-3_line_height=1.27&font-group-4_weight=italic&font-group-4_size=14&font-group-4_line_height=1.42&font-group-5_weight=600&font-group-5_size=14&font-group-5_line_height=1.42&font-group-6_weight=regular&font-group-6_size=13&font-group-6_line_height=1.46&font-group-7_weight=italic&font-group-7_size=13&font-group-7_line_height=1.46&font-group-8_weight=regular&font-group-8_size=13&font-group-8_line_height=1.46&font-group-9_weight=600&font-group-9_size=15&font-group-9_line_height=1.8&font-group-10_weight=600&font-group-10_size=16&font-group-10_line_height=1.68&font-group-11_weight=800&font-group-11_size=24&font-group-11_line_height=1.29&font-group-12_weight=600&font-group-12_size=13&font-group-12_line_height=1.46&blockquote_weight=italic&blockquote_size=17&blockquote_line_height=1.58&menu_font=Oswald&menu_weight=700&menu_size=20&menu_line_height=1&copyright_font_link_to=headings&copyright_weight=regular&copyright_size=10&copyright_line_height=1.4&page_title_font=Pacifico&page_title_weight=regular&page_title_size=70&page_title_line_height=1.14&page_title_color=&page_title_responsive_slider=30&page_title_orientation=horizontal&section_title_two_font=Lato&section_title_two_first_weight=300&section_title_two_first_size=50&section_title_two_first_line_height=1.1&section_title_two_first_color=%23222222&section_title_two_first_color_for_light=%23ffffff&section_title_two_first_responsive_slider=0&section_title_two_second_font=Lato&section_title_two_second_weight=900&section_title_two_second_size=100&section_title_two_second_line_height=1.1&section_title_two_second_color=%23222222&section_title_two_second_color_for_light=%23ffffff&section_title_two_second_responsive_slider=0&line_spacing=0&section_title_two_number_font=Lato&section_title_two_number_weight=900italic&section_title_two_number_size=50&section_title_two_number_line_height=1.1&section_title_two_number_color=%23222222&section_title_two_number_color_for_light=%23ffffff&section_title_two_divider_divider_style=style-box&section_title_two_divider_color=%23444444&section_title_two_divider_color_for_light=%23ffffff&title_divider_spacing_two=20&section_title_one_first_font=Lato&section_title_one_first_weight=900&section_title_one_first_size=25&section_title_one_first_line_height=1.28&section_title_one_first_color=%23444444&section_title_one_first_color_for_light=%23ffffff&section_title_one_first_responsive_slider=0&section_title_one_divider_enable=on&section_title_one_divider_divider_style=style-fullwidth&section_title_one_divider_color=%23444444&section_title_one_divider_color_for_light=%23ffffff&title_divider_spacing=20&home_slider_font_link_to=headings&home_slider_weight=200&home_slider_size=50&home_slider_line_height=1.20&home_slider_color=%23ffffff&home_slider_color_for_light=%23222222&home_number_font_link_to=headings&home_number_weight=200&home_number_size=135&home_number_line_height=1";s:32:"typography_sidebar_heading_style";s:2:"h6";s:31:"typography_footer_heading_style";s:2:"h6";s:24:"content_enviroment_style";s:16:"body-style-light";s:17:"greyscale_ammount";s:1:"0";s:21:"section_margin_bottom";s:2:"30";s:15:"highlight_color";s:7:"#ff6600";s:22:"enable_bordered_design";s:2:"on";s:23:"enable_native_scrollbar";s:3:"off";s:13:"bg_transition";s:9:"slidedown";s:11:"enable_ajax";s:2:"on";s:13:"bg_isparallax";s:3:"off";s:18:"custom_css_post_id";i:-1;s:18:"nav_menu_locations";a:2:{s:7:"primary";i:'.$menu_id.';s:6:"social";i:0;}}';





        qucreative_import_demo_update_preset($ser_data,array(

            'preseter_slug' => $demo_slug,
            'preseter_name' => $demo_name,
        ));














}




















$demo_slug = 'photoshoot';
$demo_name = 'Photoshoot';
if($_REQUEST['demo']==$demo_slug) {














    $img_name = '500x500.jpg';
    $img_url = QUCREATIVE_THEME_URL . 'placeholders/500x500.jpg';


    $img_path = QUCREATIVE_THEME_DIR . 'placeholders/500x500.jpg';


    $new_path = $upload_dir_path . '/' . $img_name;

    try {

        if (!copy($img_path, $new_path)) {

        } else {
            $img_url = $upload_dir_url . '/' . $img_name;
            $new_path = $img_path;
        }
    } catch (Exception $e) {
        print_rr($e);
    }





    $term = get_term_by('slug', $demo_slug, $taxonomy);




    if ($term) {

    } else {

        if ($debug) {
        } else {







        }


    }




    $term = qucreative_import_demo_create_term_if_it_does_not_exist(array(
        'description' => '',
        'term_name' => "Photoshoot",
        'slug' => 'photoshoot',
        'taxonomy' => $taxonomy,


    ));






    if(is_array($term)){

        $term_id = $term['term_id'];
    }else{

        $term_id = $term->term_id;
    }




    $attach_id = qucreative_import_demo_create_attachment($img_url, '1', $img_path);


        $qucreative_theme_data['import_demo_last_attach_id'] = $attach_id;

        $args = array(

            'post_title' => 'ADMIRATION',
            'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'slider',
            'qucreative_'.'meta_post_media' => $attach_id.','.$attach_id,
            'qucreative_'.'meta_post_media_type' => 'vimeo',
            'qucreative_'.'meta_post_media' => 'https://vimeo.com/60588549',
            'qucreative_'.'meta_post_layout_for_excerpt' => 'small',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
        );


        $port_id = qucreative_import_demo_insert_post_complete($args);




        $args = array(

            'post_title' => 'THE DREAM',
            'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'vimeo',
            'qucreative_'.'meta_post_media' => 'https://vimeo.com/60588549',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'UNDERWATER',
            'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco..',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'image',
            'qucreative_'.'meta_post_media' => $attach_id,
            'qucreative_'.'meta_post_layout_for_excerpt' => 'small',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'WAITING',
            'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'youtube',
            'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=6Qlz_Y4R4ok',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'SMOKING HOT',
            'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'image',
            'qucreative_'.'meta_post_media' => $img_url,
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'HAPPY CHAIR',
            'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_post_media_type' => 'image',
            'qucreative_'.'meta_post_media' => $img_url,
            'qucreative_'.'meta_post_media_type' => 'youtube',
            'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=6Qlz_Y4R4ok',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'WILD SIDE',
            'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'image',
            'qucreative_'.'meta_post_layout_for_excerpt' => 'small',
            'qucreative_'.'meta_post_media' => $img_url,
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'POSING NICELY',
            'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'youtube',
            'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=6Qlz_Y4R4ok',
            'qucreative_'.'meta_post_media_type' => 'image',

            'qucreative_'.'meta_post_media' => $img_url,
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'MORNING',
            'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'youtube',
            'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=QNZOOSxfQn8',
            'qucreative_'.'meta_post_media_type' => 'vimeo',
            'qucreative_'.'meta_post_media' => 'https://vimeo.com/60588549',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'BLUE EROTICA',
            'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'youtube',
            'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=6Qlz_Y4R4ok',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'THE ELEGANCE',
            'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'youtube',

            'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=6Qlz_Y4R4ok',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'THINKING',
            'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'image',


            'qucreative_'.'meta_post_media' => $img_url,
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'I WANT',
            'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'image',
            'qucreative_'.'meta_post_media' => $img_url,

            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'THE TRAVELER',
            'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'image',
            'qucreative_'.'meta_post_media' => $img_url,

            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'TOUGH GUY',
            'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'image',
            'qucreative_'.'meta_post_media' => $img_url,

            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'OMG',
            'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'image',
            'qucreative_'.'meta_post_media' => $img_url,

            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'I FEEL LOVE',
            'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'image',
            'qucreative_'.'meta_post_media' => $img_url,

            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'HIDING IN LA',
            'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'image',
            'qucreative_'.'meta_post_media' => $img_url,

            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'LONG LEGS',
            'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'image',
            'qucreative_'.'meta_post_media' => $img_url,

            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'DA BIZZ',
            'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'image',
            'qucreative_'.'meta_post_media' => $img_url,

            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'EROTICA',
            'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'image',
            'qucreative_'.'meta_post_media' => $img_url,

            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'I WANT',
            'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'image',
            'qucreative_'.'meta_post_media' => $img_url,

            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'SAMANTHA',
            'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'image',
            'qucreative_'.'meta_post_media' => $img_url,

            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'I WANT',
            'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'image',
            'qucreative_'.'meta_post_media' => $img_url,

            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'IT IS FASHION',
            'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'image',
            'qucreative_'.'meta_post_media' => $img_url,

            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'I WANT',
            'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'image',
            'qucreative_'.'meta_post_media' => $img_url,

            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'COOL ENOUGH',
            'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'image',
            'qucreative_'.'meta_post_media' => $img_url,

            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'THIS IS ME',
            'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'image',
            'qucreative_'.'meta_post_media' => $img_url,

            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'ON THE ROAD',
            'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'image',
            'qucreative_'.'meta_post_media' => $img_url,

            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'THE JEWEL',
            'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'image',
            'qucreative_'.'meta_post_media' => $img_url,

            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'MOVIE STARS',
            'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'image',
            'qucreative_'.'meta_post_media' => $img_url,

            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'LOCAL VIDEO',
            'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'image',
            'qucreative_'.'meta_post_media' => $img_url,

            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'NIGHT IN PARIS',
            'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'image',
            'qucreative_'.'meta_post_media' => $img_url,

            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'HAPPY GIRLS',
            'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'image',
            'qucreative_'.'meta_post_media' => $img_url,

            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);






        $args = array(

            'post_title' => 'NICE ONE',
            'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'image',
            'qucreative_'.'meta_post_media' => $img_url,

            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);






        $args = array(

            'post_title' => 'WHY NOT',
            'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'image',
            'qucreative_'.'meta_post_media' => $img_url,

            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);






        $args = array(

            'post_title' => 'WESTERN',
            'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'image',
            'qucreative_'.'meta_post_media' => $img_url,

            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);

























































        $cont = '[vc_row][vc_column][antfarm_portfolio skin="skin-gazelia skin-gazelia--transparent" zfolio-mode="mode-cols" link_whole_item="zoombox" gap="10px" pagination_method="scroll" cat="'.$demo_slug.'" mode="mode-cols" layout="dzs-layout--5-cols"][/vc_column][/vc_row]';





        $args = array(
            'post_title'    => wp_strip_all_tags( 'Qu '.$demo_name ),
            'post_content'  => $cont,
            'post_status'   => 'publish',
            'post_author'   => 1,
            'post_type'   => 'page',

        );


        $page_id = wp_insert_post( $args );





        update_post_meta( $page_id, '_wp_page_template', 'template-portfolio.php' );;
        update_post_meta(  $page_id ,'qucreative_'.'meta_custom_section_margin_bottom','0');


        update_post_meta(  $page_id ,'qucreative_'.'meta_disable_footer','on');



        update_post_meta(  $page_id ,'qucreative_'.'meta_is_fullscreen','on');
        update_post_meta(  $page_id ,'qucreative_'.'meta_is_fullscreen_stretch','contain');

        update_post_meta(  $page_id ,'qucreative_'.'meta_bg_image',$img_url);












        update_option( 'page_on_front', $page_id );
        update_option( 'show_on_front', 'page' );













        $temp_text = '';


        $temp_text = preg_replace( "/\r|\n/", "", $temp_text );;






        $ser_data = 'a:51:{s:14:"portfolio_page";s:0:"";s:11:"mail_method";s:7:"wp_mail";s:12:"blur_ammount";s:2:"50";s:23:"menu_enviroment_opacity";s:2:"77";s:26:"content_enviroment_opacity";s:2:"85";s:24:"secondary_content_height";s:3:"300";s:13:"gmaps_api_key";s:0:"";s:17:"soundcloud_apikey";s:0:"";s:13:"gmaps_styling";s:0:"";s:13:"content_align";s:20:"content-align-center";s:16:"page_title_align";s:22:"page-title-align-right";s:16:"page_title_style";s:18:"page-title-style-2";s:12:"width_column";s:2:"50";s:9:"width_gap";s:2:"30";s:17:"width_blur_margin";s:2:"30";s:16:"width_section_bg";s:0:"";s:24:"content_add_extra_pixels";s:0:"";s:12:"border_width";s:1:"0";s:12:"border_color";s:7:"#ffffff";s:37:"content_section_title_two_lines_space";s:1:"0";s:43:"content_section_title_two_lines_use_divider";s:0:"";s:49:"content_section_title_two_lines_use_divider_color";s:0:"";s:9:"menu_type";s:12:"menu-type-18";s:14:"menu_is_sticky";s:2:"on";s:28:"menu_horizontal_shadow_style";s:8:"shadow_1";s:12:"social_icons";s:2:"[]";s:23:"meta_options_post_types";b:0;s:4:"logo";s:'.strlen($logo_photoshoot).':"'.$logo_photoshoot.'";s:6:"logo_x";s:7:"default";s:13:"logo_x_custom";s:0:"";s:6:"logo_y";s:7:"default";s:10:"logo_width";s:0:"";s:11:"logo_height";s:0:"";s:13:"logo_y_custom";s:0:"";s:17:"copyright_textbox";s:22:"Default copyright text";s:31:"copyright_textbox_heading_style";s:9:"h-group-1";s:38:"footer_copyright_textbox_heading_style";s:9:"h-group-1";s:9:"font_data";s:3840:"headings_font=Lato&h1_weight=700&h1_size=70&h1_line_height=1.15&h1_responsive_slider=25&h2_weight=700&h2_size=50&h2_line_height=1.15&h2_responsive_slider=20&h3_weight=700&h3_size=40&h3_line_height=1.15&h3_responsive_slider=15&h4_weight=700&h4_size=30&h4_line_height=1.15&h4_responsive_slider=10&h5_weight=700&h5_size=20&h5_line_height=1.15&h5_responsive_slider=0&h6_weight=700&h6_size=14&h6_line_height=1.57&h6_responsive_slider=0&h-group-1_weight=700&h-group-1_size=11&h-group-1_line_height=1.54&h-group-1_responsive_slider=0&h-group-2_weight=700&h-group-2_size=25&h-group-2_line_height=1.28&h-group-2_responsive_slider=0&body_font=Open+Sans&p_weight=regular&p_size=13&p_line_height=1.92&p_color=%236b6b6b&p_color_for_light=%23bbbbbb&hyperlink_weight=600&font-group-1_weight=600italic&font-group-1_size=14&font-group-1_line_height=1.42&font-group-2_weight=600&font-group-2_size=14&font-group-2_line_height=1.42&font-group-3_weight=600italic&font-group-3_size=11&font-group-3_line_height=1.27&font-group-4_weight=italic&font-group-4_size=14&font-group-4_line_height=1.42&font-group-5_weight=600&font-group-5_size=14&font-group-5_line_height=1.42&font-group-6_weight=regular&font-group-6_size=13&font-group-6_line_height=1.46&font-group-7_weight=italic&font-group-7_size=13&font-group-7_line_height=1.46&font-group-8_weight=regular&font-group-8_size=13&font-group-8_line_height=1.46&font-group-9_weight=600&font-group-9_size=15&font-group-9_line_height=1.8&font-group-10_weight=600&font-group-10_size=16&font-group-10_line_height=1.68&font-group-11_weight=800&font-group-11_size=24&font-group-11_line_height=1.29&font-group-12_weight=600&font-group-12_size=13&font-group-12_line_height=1.46&blockquote_weight=italic&blockquote_size=17&blockquote_line_height=1.58&menu_font=Lato&menu_weight=700&menu_size=15&menu_line_height=1&copyright_font_link_to=headings&copyright_weight=700&copyright_size=10&copyright_line_height=1.4&page_title_font=Lato&page_title_weight=900&page_title_size=70&page_title_line_height=1.14&page_title_color=&page_title_responsive_slider=0&page_title_orientation=horizontal&section_title_two_font=Lato&section_title_two_first_weight=300&section_title_two_first_size=50&section_title_two_first_line_height=1.1&section_title_two_first_color=%23222222&section_title_two_first_color_for_light=%23ffffff&section_title_two_first_responsive_slider=0&section_title_two_second_font=Lato&section_title_two_second_weight=900&section_title_two_second_size=100&section_title_two_second_line_height=1.1&section_title_two_second_color=%23222222&section_title_two_second_color_for_light=%23ffffff&section_title_two_second_responsive_slider=0&line_spacing=0&section_title_two_number_font=Lato&section_title_two_number_weight=900italic&section_title_two_number_size=50&section_title_two_number_line_height=1.1&section_title_two_number_color=%23222222&section_title_two_number_color_for_light=%23ffffff&section_title_two_divider_divider_style=style-box&section_title_two_divider_color=%23444444&section_title_two_divider_color_for_light=%23ffffff&title_divider_spacing_two=20&section_title_one_first_font=Lato&section_title_one_first_weight=900&section_title_one_first_size=25&section_title_one_first_line_height=1.28&section_title_one_first_color=%23444444&section_title_one_first_color_for_light=%23ffffff&section_title_one_first_responsive_slider=0&section_title_one_divider_enable=on&section_title_one_divider_divider_style=style-fullwidth&section_title_one_divider_color=%23444444&section_title_one_divider_color_for_light=%23ffffff&title_divider_spacing=20&home_slider_font_link_to=headings&home_slider_weight=900&home_slider_size=50&home_slider_line_height=1.20&home_slider_color=%23ffffff&home_slider_color_for_light=%23222222&home_number_font_link_to=headings&home_number_weight=900&home_number_size=135&home_number_line_height=1";s:32:"typography_sidebar_heading_style";s:2:"h6";s:31:"typography_footer_heading_style";s:2:"h6";s:24:"content_enviroment_style";s:15:"body-style-dark";s:17:"greyscale_ammount";s:1:"0";s:21:"section_margin_bottom";s:2:"30";s:15:"highlight_color";s:7:"#f200d5";s:22:"enable_bordered_design";s:2:"on";s:23:"enable_native_scrollbar";s:2:"on";s:13:"bg_transition";s:9:"slidedown";s:11:"enable_ajax";s:2:"on";s:13:"bg_isparallax";s:3:"off";s:18:"custom_css_post_id";i:-1;s:18:"nav_menu_locations";a:2:{s:7:"primary";i:'.$menu_id.';s:6:"social";i:0;}}';





        qucreative_import_demo_update_preset($ser_data,array(

            'preseter_slug' => $demo_slug,
            'preseter_name' => $demo_name,
        ));
















}










































$demo_slug = 'pictures';
$demo_name = 'Pictures';
if($_REQUEST['demo']==$demo_slug) {














    $img_name = '500x500.jpg';
    $img_url = QUCREATIVE_THEME_URL . 'placeholders/500x500.jpg';


    $img_path = QUCREATIVE_THEME_DIR . 'placeholders/500x500.jpg';


    $new_path = $upload_dir_path . '/' . $img_name;

    try {

        if (!copy($img_path, $new_path)) {

        } else {
            $img_url = $upload_dir_url . '/' . $img_name;
            $new_path = $img_path;
        }
    } catch (Exception $e) {
        print_rr($e);
    }







	$term = qucreative_import_demo_create_term_if_it_does_not_exist(array(
		'description' => '',
		'term_name' => $demo_name,
		'slug' => $demo_slug,
		'taxonomy' => $taxonomy,

	));


	if (is_array($term)) {

		$term_id = $term['term_id'];
	} else {

		$term_id = $term->term_id;
	}





    $term_im = qucreative_import_demo_create_term_if_it_does_not_exist(array(
        'description' => '',
        'term_name' => "Images",
        'slug' => 'images',
        'taxonomy' => $taxonomy,
        'parent'=> $term_id,

    ));



    $term_mi = qucreative_import_demo_create_term_if_it_does_not_exist(array(
        'description' => '',
        'term_name' => "Mixed",
        'slug' => 'mixed',
        'taxonomy' => $taxonomy,
        'parent'=> $term_id,

    ));






    $term_sl = qucreative_import_demo_create_term_if_it_does_not_exist(array(
        'description' => '',
        'term_name' => "Slider",
        'slug' => 'slider',
        'taxonomy' => $taxonomy,
        'parent'=> $term_id,

    ));













        $attach_id = qucreative_import_demo_create_attachment($img_url, '1', $img_path);


        $qucreative_theme_data['import_demo_last_attach_id'] = $attach_id;

        $args = array(

            'post_title' => 'THE ACTRESS',
            'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'slider',
            'qucreative_'.'meta_post_media' => $attach_id.','.$attach_id,
            'qucreative_'.'meta_image_gallery_in_meta' => $attach_id.','.$attach_id,
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term_sl,
            'taxonomy' => $taxonomy,
        );


        $port_id = qucreative_import_demo_insert_post_complete($args);




        $args = array(

            'post_title' => 'HIP HOP WORLD',
            'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'vimeo',
            'qucreative_'.'meta_post_media' => 'https://vimeo.com/60588549',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term_vi,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'PATRICIA SMITH',
            'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'slider',
            'qucreative_'.'meta_image_gallery_in_meta' => $attach_id.','.$attach_id,
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term_sl,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'THE BEATS',
            'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'youtube',
            'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=6Qlz_Y4R4ok',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'SERIOUS MEN',
            'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'image',
            'qucreative_'.'meta_post_media' => $img_url,
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term_im,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'JACK\'S COFFEE SHOP',
            'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_post_media_type' => 'image',
            'qucreative_'.'meta_post_media' => $img_url,
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term_im,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'JASON THE JEWELER',
            'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'image',
            'qucreative_'.'meta_post_media' => $img_url,
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term_im,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'VERONICA SWIFT',
            'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'youtube',
            'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=6Qlz_Y4R4ok',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'CITY OF LIGHTS',
            'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'youtube',
            'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=QNZOOSxfQn8',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'BLUE EROTICA',
            'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'youtube',
            'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=6Qlz_Y4R4ok',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term_vi,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'JUNGLE BOOK',
            'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'youtube',
            'qucreative_'.'meta_video_cover_image' => $img_url,
            'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=6Qlz_Y4R4ok',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'DNG MOTORS',
            'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'vimeo',
            'qucreative_'.'meta_post_media' => 'https://vimeo.com/22884674',
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term_vi,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'MY SMARTPHONE',
            'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'image',
            'qucreative_'.'meta_post_media' => $img_url,
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term_im,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);


        $args = array(

            'post_title' => 'DJ BRONX',
            'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
            'post_status' => 'publish',
            'qucreative_'.'meta_port_subtitle' => 'identity design',
            'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
            'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
            'qucreative_'.'meta_port_website' => 'https://www.website.com',
            'qucreative_'.'meta_post_media_type' => 'slider',
            'qucreative_'.'meta_image_gallery_in_meta' => $attach_id.','.$attach_id,
            'img_url' => $img_url,
            'img_path'=>$new_path,
            'term' => $term_sl,
            'taxonomy' => $taxonomy,
            'attach_id' => $qucreative_theme_data['import_demo_last_attach_id'],
        );

        $port_id = qucreative_import_demo_insert_post_complete($args);




















































        $cont = '{"grid_cols":"4","items_arr":[{"w":"2","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"2","h":"2"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"2","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"2","h":"1"}],"loop":"on"}';





        $args = array(
            'post_title'    => wp_strip_all_tags( $demo_name ),
            'post_name'    => $demo_slug,
            'post_content'  => $cont,
            'post_status'   => 'publish',
            'post_author'   => 1,
            'post_type'   => 'zfolio_grid',

        );


        $page_id = wp_insert_post( $args );


















        $cont = '[vc_row][vc_column][antfarm_portfolio skin="skin-gazelia skin-gazelia--transparent" zfolio-mode="mode-normal" link_whole_item="zoombox" gap="3px" posts_per_page="30" title_hover="off" cat="'.$demo_slug.'" filters_position="right" mode="" layout="'.$demo_slug.'"][/vc_column][/vc_row]';





        $args = array(
            'post_title'    => wp_strip_all_tags( 'Qu '.$demo_name ),
            'post_content'  => $cont,
            'post_status'   => 'publish',
            'post_author'   => 1,
            'post_type'   => 'page',

        );


        $page_id = wp_insert_post( $args );





        update_post_meta( $page_id, '_wp_page_template', 'template-portfolio.php' );;
        update_post_meta(  $page_id ,'qucreative_'.'meta_custom_section_margin_bottom','0');
        update_post_meta(  $page_id ,'qucreative_'.'meta_content_starts_at','pixel-position');
        update_post_meta(  $page_id ,'qucreative_'.'meta_content_starts_at_pixel','0');
        update_post_meta(  $page_id ,'qucreative_'.'meta_disable_footer','on');
        update_post_meta(  $page_id ,'qucreative_'.'meta_overlay_opacity','85');
        update_post_meta(  $page_id ,'qucreative_'.'meta_overlay_color','#000000');
        update_post_meta(  $page_id ,'qucreative_'.'meta_scrollbar_theme','light');


        update_post_meta(  $page_id ,'qucreative_'.'meta_custom_title',' ');
        update_post_meta(  $page_id ,'qucreative_'.'meta_bg_image',$img_url);












        update_option( 'page_on_front', $page_id );
        update_option( 'show_on_front', 'page' );













        $temp_text = '';


        $temp_text = preg_replace( "/\r|\n/", "", $temp_text );;






        $ser_data = 'a:51:{s:14:"portfolio_page";s:0:"";s:11:"mail_method";s:7:"wp_mail";s:12:"blur_ammount";s:2:"26";s:23:"menu_enviroment_opacity";s:2:"30";s:26:"content_enviroment_opacity";s:3:"100";s:24:"secondary_content_height";s:3:"300";s:13:"gmaps_api_key";s:0:"";s:17:"soundcloud_apikey";s:0:"";s:13:"gmaps_styling";s:0:"";s:13:"content_align";s:18:"content-align-left";s:16:"page_title_align";s:21:"page-title-align-left";s:16:"page_title_style";s:18:"page-title-style-2";s:12:"width_column";s:2:"40";s:9:"width_gap";s:2:"30";s:17:"width_blur_margin";s:2:"30";s:16:"width_section_bg";s:0:"";s:24:"content_add_extra_pixels";s:0:"";s:12:"border_width";s:1:"0";s:12:"border_color";s:7:"#ffffff";s:37:"content_section_title_two_lines_space";s:1:"0";s:43:"content_section_title_two_lines_use_divider";s:0:"";s:49:"content_section_title_two_lines_use_divider_color";s:0:"";s:9:"menu_type";s:12:"menu-type-11";s:14:"menu_is_sticky";s:3:"off";s:28:"menu_horizontal_shadow_style";s:4:"none";s:12:"social_icons";s:163:"[{"link":"#","icon":"instagram"},{"link":"#","icon":"facebook-square"},{"link":"#","icon":"youtube-play"},{"link":"#","icon":"vine"},{"link":"#","icon":"twitter"}]";s:23:"meta_options_post_types";b:0;s:4:"logo";s:'.strlen($logo_pictures).':"'.$logo_pictures.'";s:6:"logo_x";s:7:"default";s:13:"logo_x_custom";s:0:"";s:6:"logo_y";s:7:"default";s:10:"logo_width";s:0:"";s:11:"logo_height";s:0:"";s:13:"logo_y_custom";s:0:"";s:17:"copyright_textbox";s:14:"ANTFARM THEMES";s:31:"copyright_textbox_heading_style";s:9:"h-group-1";s:38:"footer_copyright_textbox_heading_style";s:9:"h-group-1";s:9:"font_data";s:3844:"headings_font=Lato&h1_weight=700&h1_size=70&h1_line_height=1.15&h1_responsive_slider=25&h2_weight=700&h2_size=50&h2_line_height=1.15&h2_responsive_slider=20&h3_weight=700&h3_size=40&h3_line_height=1.15&h3_responsive_slider=15&h4_weight=700&h4_size=30&h4_line_height=1.15&h4_responsive_slider=10&h5_weight=700&h5_size=20&h5_line_height=1.15&h5_responsive_slider=0&h6_weight=700&h6_size=14&h6_line_height=1.57&h6_responsive_slider=0&h-group-1_weight=700&h-group-1_size=11&h-group-1_line_height=1.54&h-group-1_responsive_slider=0&h-group-2_weight=700&h-group-2_size=25&h-group-2_line_height=1.28&h-group-2_responsive_slider=0&body_font=Open+Sans&p_weight=regular&p_size=13&p_line_height=1.92&p_color=%236b6b6b&p_color_for_light=%23bbbbbb&hyperlink_weight=600&font-group-1_weight=600italic&font-group-1_size=14&font-group-1_line_height=1.42&font-group-2_weight=600&font-group-2_size=14&font-group-2_line_height=1.42&font-group-3_weight=600italic&font-group-3_size=11&font-group-3_line_height=1.27&font-group-4_weight=italic&font-group-4_size=14&font-group-4_line_height=1.42&font-group-5_weight=600&font-group-5_size=14&font-group-5_line_height=1.42&font-group-6_weight=regular&font-group-6_size=13&font-group-6_line_height=1.46&font-group-7_weight=italic&font-group-7_size=13&font-group-7_line_height=1.46&font-group-8_weight=regular&font-group-8_size=13&font-group-8_line_height=1.46&font-group-9_weight=600&font-group-9_size=15&font-group-9_line_height=1.8&font-group-10_weight=600&font-group-10_size=16&font-group-10_line_height=1.68&font-group-11_weight=800&font-group-11_size=24&font-group-11_line_height=1.29&font-group-12_weight=600&font-group-12_size=13&font-group-12_line_height=1.46&blockquote_weight=italic&blockquote_size=17&blockquote_line_height=1.58&menu_font=Lato&menu_weight=regular&menu_size=30&menu_line_height=1&copyright_font_link_to=headings&copyright_weight=700&copyright_size=10&copyright_line_height=1.4&page_title_font=Lato&page_title_weight=900&page_title_size=70&page_title_line_height=1.14&page_title_color=&page_title_responsive_slider=0&page_title_orientation=horizontal&section_title_two_font=Lato&section_title_two_first_weight=300&section_title_two_first_size=50&section_title_two_first_line_height=1.1&section_title_two_first_color=%23222222&section_title_two_first_color_for_light=%23ffffff&section_title_two_first_responsive_slider=0&section_title_two_second_font=Lato&section_title_two_second_weight=900&section_title_two_second_size=100&section_title_two_second_line_height=1.1&section_title_two_second_color=%23222222&section_title_two_second_color_for_light=%23ffffff&section_title_two_second_responsive_slider=0&line_spacing=0&section_title_two_number_font=Lato&section_title_two_number_weight=900italic&section_title_two_number_size=50&section_title_two_number_line_height=1.1&section_title_two_number_color=%23222222&section_title_two_number_color_for_light=%23ffffff&section_title_two_divider_divider_style=style-box&section_title_two_divider_color=%23444444&section_title_two_divider_color_for_light=%23ffffff&title_divider_spacing_two=20&section_title_one_first_font=Lato&section_title_one_first_weight=900&section_title_one_first_size=25&section_title_one_first_line_height=1.28&section_title_one_first_color=%23444444&section_title_one_first_color_for_light=%23ffffff&section_title_one_first_responsive_slider=0&section_title_one_divider_enable=on&section_title_one_divider_divider_style=style-fullwidth&section_title_one_divider_color=%23444444&section_title_one_divider_color_for_light=%23ffffff&title_divider_spacing=20&home_slider_font_link_to=headings&home_slider_weight=900&home_slider_size=50&home_slider_line_height=1.20&home_slider_color=%23ffffff&home_slider_color_for_light=%23222222&home_number_font_link_to=headings&home_number_weight=900&home_number_size=135&home_number_line_height=1";s:32:"typography_sidebar_heading_style";s:2:"h6";s:31:"typography_footer_heading_style";s:2:"h6";s:24:"content_enviroment_style";s:16:"body-style-light";s:17:"greyscale_ammount";s:1:"0";s:21:"section_margin_bottom";s:2:"30";s:15:"highlight_color";s:7:"#00dded";s:22:"enable_bordered_design";s:2:"on";s:23:"enable_native_scrollbar";s:3:"off";s:13:"bg_transition";s:9:"slidedown";s:11:"enable_ajax";s:2:"on";s:13:"bg_isparallax";s:2:"on";s:18:"custom_css_post_id";i:-1;s:18:"nav_menu_locations";a:2:{s:7:"primary";i:'.$menu_id.';s:6:"social";i:0;}}';





        qucreative_import_demo_update_preset($ser_data,array(

            'preseter_slug' => $demo_slug,
            'preseter_name' => $demo_name,
        ));





























}













































$demo_slug = 'digital-amateur';
$demo_name = 'Digital Amateur';
if($_REQUEST['demo']==$demo_slug) {














    $img_name = '500x500.jpg';
    $img_url = QUCREATIVE_THEME_URL . 'placeholders/500x500.jpg';


    $img_path = QUCREATIVE_THEME_DIR . 'placeholders/500x500.jpg';


    $new_path = $upload_dir_path . '/' . $img_name;

    try {

        if (!copy($img_path, $new_path)) {

        } else {
            $img_url = $upload_dir_url . '/' . $img_name;
            $new_path = $img_path;
        }
    } catch (Exception $e) {
        print_rr($e);
    }








    $img_name = '500x500-150x150.jpg';
    $img_url_2 = QUCREATIVE_THEME_URL . 'placeholders/'.$img_name;


    $img_path_2 = QUCREATIVE_THEME_DIR . 'placeholders/'.$img_name;


    $new_path_2 = $upload_dir_path . '/' . $img_name;

    try {

        if (!copy($img_path_2, $new_path_2)) {

        } else {
            $img_url_2 = $upload_dir_url . '/' . $img_name;
            $new_path_2 = $img_path_2;
        }
    } catch (Exception $e) {
        print_rr($e);
    }






    $the_slug = $demo_slug;
    $args = array(
        'name'        => $the_slug,
        'post_type'   => 'page',
        'post_status' => 'publish',
        'numberposts' => 1
    );
    $my_posts = get_posts($args);





    if ($my_posts) {

    } else {















    }





    $attach_id = qucreative_import_demo_create_attachment($img_url, '1', $new_path);


    $qucreative_theme_data['import_demo_last_attach_id'] = $attach_id;

















































    $cont = '';





    $args = array(
        'post_title'    => wp_strip_all_tags( 'Qu '.$demo_name ),
        'name'    => $demo_slug,
        'post_name'    => $demo_slug,
        'post_content'  => $cont,
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_type'   => 'page',

    );


    $page_id = wp_insert_post( $args );





    update_post_meta( $page_id, '_wp_page_template', 'template-gallery-creative.php' );;


    $attach_id = qucreative_import_demo_create_attachment($img_url, $page_id, $new_path);
    $attach_id_1 = $attach_id;


    $qucreative_theme_data['import_demo_last_attach_id'] = $attach_id;


    $attach_id_2 = qucreative_import_demo_create_attachment($img_url, $page_id, $new_path);
    $my_post = array(
        'ID'           => $attach_id_2,
        'post_excerpt'   => 'COOL IMAGE',
        'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor mauris incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip estimat.',
    );


    wp_update_post( $my_post );



    $attach_id = qucreative_import_demo_create_attachment($img_url, $page_id, $new_path);
    $attach_id_3 = $attach_id;
    update_post_meta(  $attach_id ,'qucreative_'.'meta_att_video','https://www.youtube.com/watch?v=TEru6QoFUl0');



    $attach_id = qucreative_import_demo_create_attachment($img_url, $page_id, $new_path);
    $attach_id_4 = $attach_id;
    update_post_meta(  $attach_id ,'qucreative_'.'meta_att_video','https://vimeo.com/19530316');




    $attach_id = qucreative_import_demo_create_attachment($img_url, $page_id, $new_path);
    $attach_id_5 = $attach_id;
    update_post_meta(  $attach_id ,'qucreative_'.'meta_att_video','https://vimeo.com/19530316');




    $attach_id = qucreative_import_demo_create_attachment($img_url, $page_id, $new_path);
    $attach_id_6 = $attach_id;
    update_post_meta(  $attach_id ,'qucreative_'.'meta_att_video','https://vimeo.com/55461555');
    update_post_meta(  $attach_id ,'qucreative_'.'meta_att_enable_video_cover','on');




    $attach_id = qucreative_import_demo_create_attachment($img_url, $page_id, $new_path);
    $attach_id_7 = $attach_id;
    $my_post = array(
        'ID'           => $attach_id,
        'post_excerpt'   => 'COOL IMAGE',
        'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor mauris incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip estimat.',
    );


    wp_update_post( $my_post );



    $attach_id = qucreative_import_demo_create_attachment($img_url, $page_id, $new_path);
    $attach_id_8 = $attach_id;
    update_post_meta(  $attach_id ,'qucreative_'.'meta_att_video','https://vimeo.com/55461555');
    update_post_meta(  $attach_id ,'qucreative_'.'meta_att_enable_video_cover','on');






    $attach_id = qucreative_import_demo_create_attachment($img_url, $page_id, $new_path);
    $attach_id_9 = $attach_id;







    $attach_id = qucreative_import_demo_create_attachment($img_url, $page_id, $new_path);
    $attach_id_10 = $attach_id;
    update_post_meta(  $attach_id ,'qucreative_'.'meta_post_excerpt','COOL IMAGE');
    update_post_meta(  $attach_id ,'qucreative_'.'meta_post_content','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor mauris incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip estimat.');







    $attach_id = qucreative_import_demo_create_attachment($img_url, $page_id, $new_path);
    $attach_id_11 = $attach_id;






    $attach_id = qucreative_import_demo_create_attachment($img_url, $page_id, $new_path);
    $attach_id_12 = $attach_id;
    $my_post = array(
        'ID'           => $attach_id,
        'post_excerpt'   => 'COOL IMAGE',
        'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor mauris incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip estimat.',
    );


    wp_update_post( $my_post );




    $attach_id = qucreative_import_demo_create_attachment($img_url, $page_id, $new_path);
    $attach_id_13 = $attach_id;
    $my_post = array(
        'ID'           => $attach_id,
        'post_excerpt'   => 'COOL IMAGE',
        'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor mauris incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip estimat.',
    );


    wp_update_post( $my_post );




    $attach_id = qucreative_import_demo_create_attachment($img_url, $page_id, $new_path);
    $attach_id_14 = $attach_id;






    $attach_id = qucreative_import_demo_create_attachment($img_url, $page_id, $new_path);
    $attach_id_15 = $attach_id;
    $my_post = array(
        'ID'           => $attach_id,
        'post_excerpt'   => 'COOL IMAGE',
        'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor mauris incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip estimat.',
    );


    wp_update_post( $my_post );




    $attach_id = qucreative_import_demo_create_attachment($img_url, $page_id, $new_path);
    $attach_id_16 = $attach_id;






    $attach_id = qucreative_import_demo_create_attachment($img_url, $page_id, $new_path);
    $attach_id_17 = $attach_id;
    update_post_meta(  $attach_id ,'qucreative_'.'meta_post_excerpt','COOL IMAGE');
    update_post_meta(  $attach_id ,'qucreative_'.'meta_post_content','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor mauris incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip estimat.');








    $attach_id = qucreative_import_demo_create_attachment($img_url, $page_id, $new_path);
    $attach_id_18 = $attach_id;
    $my_post = array(
        'ID'           => $attach_id,
        'post_excerpt'   => 'COOL IMAGE',
        'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor mauris incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip estimat.',
    );


    wp_update_post( $my_post );





    $attach_id = qucreative_import_demo_create_attachment($img_url, $page_id, $new_path);
    $attach_id_19 = $attach_id;










    $attach_id = qucreative_import_demo_create_attachment($img_url, $page_id, $new_path);
    $attach_id_20 = $attach_id;
    $my_post = array(
        'ID'           => $attach_id,
        'post_excerpt'   => 'COOL IMAGE',
        'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor mauris incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip estimat.',
    );


    wp_update_post( $my_post );







    update_post_meta(  $page_id ,'qucreative_'.'meta_image_gallery',$attach_id_1.','.$attach_id_2.','.$attach_id_3.','.$attach_id_4.','.$attach_id_5.','.$attach_id_6.','.$attach_id_7.','.$attach_id_8.','.$attach_id_9.','.$attach_id_10.','.$attach_id_11.','.$attach_id_12.','.$attach_id_13.','.$attach_id_14.','.$attach_id_15.','.$attach_id_16.','.$attach_id_17.','.$attach_id_18.','.$attach_id_19.','.$attach_id_20);
    update_post_meta(  $page_id ,'qucreative_'.'meta_bg_image',$img_url);












    update_option( 'page_on_front', $page_id );
    update_option( 'show_on_front', 'page' );













    $temp_text = '';


    $temp_text = preg_replace( "/\r|\n/", "", $temp_text );;






    $ser_data = 'a:51:{s:14:"portfolio_page";s:0:"";s:11:"mail_method";s:7:"wp_mail";s:12:"blur_ammount";s:2:"26";s:23:"menu_enviroment_opacity";s:3:"100";s:26:"content_enviroment_opacity";s:3:"100";s:24:"secondary_content_height";s:3:"300";s:13:"gmaps_api_key";s:0:"";s:17:"soundcloud_apikey";s:0:"";s:13:"gmaps_styling";s:0:"";s:13:"content_align";s:20:"content-align-center";s:16:"page_title_align";s:22:"page-title-align-right";s:16:"page_title_style";s:18:"page-title-style-2";s:12:"width_column";s:2:"40";s:9:"width_gap";s:2:"30";s:17:"width_blur_margin";s:2:"30";s:16:"width_section_bg";s:0:"";s:24:"content_add_extra_pixels";s:0:"";s:12:"border_width";s:1:"0";s:12:"border_color";s:7:"#ffffff";s:37:"content_section_title_two_lines_space";s:1:"0";s:43:"content_section_title_two_lines_use_divider";s:0:"";s:49:"content_section_title_two_lines_use_divider_color";s:0:"";s:9:"menu_type";s:11:"menu-type-1";s:14:"menu_is_sticky";s:3:"off";s:28:"menu_horizontal_shadow_style";s:4:"none";s:12:"social_icons";s:163:"[{"link":"#","icon":"facebook-square"},{"link":"#","icon":"pinterest"},{"link":"#","icon":"instagram"},{"link":"#","icon":"behance"},{"link":"#","icon":"twitter"}]";s:23:"meta_options_post_types";b:0;s:4:"logo";s:'.strlen($logo_digital_amateur).':"'.$logo_digital_amateur.'";s:6:"logo_x";s:7:"default";s:13:"logo_x_custom";s:0:"";s:6:"logo_y";s:7:"default";s:10:"logo_width";s:0:"";s:11:"logo_height";s:0:"";s:13:"logo_y_custom";s:0:"";s:17:"copyright_textbox";s:14:"ANTFARM THEMES";s:31:"copyright_textbox_heading_style";s:9:"h-group-1";s:38:"footer_copyright_textbox_heading_style";s:9:"h-group-1";s:9:"font_data";s:3844:"headings_font=Lato&h1_weight=700&h1_size=70&h1_line_height=1.15&h1_responsive_slider=25&h2_weight=700&h2_size=50&h2_line_height=1.15&h2_responsive_slider=20&h3_weight=700&h3_size=40&h3_line_height=1.15&h3_responsive_slider=15&h4_weight=700&h4_size=30&h4_line_height=1.15&h4_responsive_slider=10&h5_weight=700&h5_size=20&h5_line_height=1.15&h5_responsive_slider=0&h6_weight=700&h6_size=14&h6_line_height=1.57&h6_responsive_slider=0&h-group-1_weight=700&h-group-1_size=11&h-group-1_line_height=1.54&h-group-1_responsive_slider=0&h-group-2_weight=700&h-group-2_size=25&h-group-2_line_height=1.28&h-group-2_responsive_slider=0&body_font=Open+Sans&p_weight=regular&p_size=13&p_line_height=1.92&p_color=%236b6b6b&p_color_for_light=%23bbbbbb&hyperlink_weight=600&font-group-1_weight=600italic&font-group-1_size=14&font-group-1_line_height=1.42&font-group-2_weight=600&font-group-2_size=14&font-group-2_line_height=1.42&font-group-3_weight=600italic&font-group-3_size=11&font-group-3_line_height=1.27&font-group-4_weight=italic&font-group-4_size=14&font-group-4_line_height=1.42&font-group-5_weight=600&font-group-5_size=14&font-group-5_line_height=1.42&font-group-6_weight=regular&font-group-6_size=13&font-group-6_line_height=1.46&font-group-7_weight=italic&font-group-7_size=13&font-group-7_line_height=1.46&font-group-8_weight=regular&font-group-8_size=13&font-group-8_line_height=1.46&font-group-9_weight=600&font-group-9_size=15&font-group-9_line_height=1.8&font-group-10_weight=600&font-group-10_size=16&font-group-10_line_height=1.68&font-group-11_weight=800&font-group-11_size=24&font-group-11_line_height=1.29&font-group-12_weight=600&font-group-12_size=13&font-group-12_line_height=1.46&blockquote_weight=italic&blockquote_size=17&blockquote_line_height=1.58&menu_font=Lato&menu_weight=regular&menu_size=18&menu_line_height=1&copyright_font_link_to=headings&copyright_weight=700&copyright_size=10&copyright_line_height=1.4&page_title_font=Lato&page_title_weight=900&page_title_size=70&page_title_line_height=1.14&page_title_color=&page_title_responsive_slider=0&page_title_orientation=horizontal&section_title_two_font=Lato&section_title_two_first_weight=300&section_title_two_first_size=50&section_title_two_first_line_height=1.1&section_title_two_first_color=%23222222&section_title_two_first_color_for_light=%23ffffff&section_title_two_first_responsive_slider=0&section_title_two_second_font=Lato&section_title_two_second_weight=900&section_title_two_second_size=100&section_title_two_second_line_height=1.1&section_title_two_second_color=%23222222&section_title_two_second_color_for_light=%23ffffff&section_title_two_second_responsive_slider=0&line_spacing=0&section_title_two_number_font=Lato&section_title_two_number_weight=900italic&section_title_two_number_size=50&section_title_two_number_line_height=1.1&section_title_two_number_color=%23222222&section_title_two_number_color_for_light=%23ffffff&section_title_two_divider_divider_style=style-box&section_title_two_divider_color=%23444444&section_title_two_divider_color_for_light=%23ffffff&title_divider_spacing_two=20&section_title_one_first_font=Lato&section_title_one_first_weight=900&section_title_one_first_size=25&section_title_one_first_line_height=1.28&section_title_one_first_color=%23444444&section_title_one_first_color_for_light=%23ffffff&section_title_one_first_responsive_slider=0&section_title_one_divider_enable=on&section_title_one_divider_divider_style=style-fullwidth&section_title_one_divider_color=%23444444&section_title_one_divider_color_for_light=%23ffffff&title_divider_spacing=20&home_slider_font_link_to=headings&home_slider_weight=900&home_slider_size=50&home_slider_line_height=1.20&home_slider_color=%23ffffff&home_slider_color_for_light=%23222222&home_number_font_link_to=headings&home_number_weight=900&home_number_size=135&home_number_line_height=1";s:32:"typography_sidebar_heading_style";s:2:"h6";s:31:"typography_footer_heading_style";s:2:"h6";s:24:"content_enviroment_style";s:15:"body-style-dark";s:17:"greyscale_ammount";s:1:"0";s:21:"section_margin_bottom";s:2:"30";s:15:"highlight_color";s:7:"#ff8000";s:22:"enable_bordered_design";s:2:"on";s:23:"enable_native_scrollbar";s:3:"off";s:13:"bg_transition";s:9:"slidedown";s:11:"enable_ajax";s:2:"on";s:13:"bg_isparallax";s:3:"off";s:18:"custom_css_post_id";i:-1;s:18:"nav_menu_locations";a:2:{s:7:"primary";i:'.$menu_id.';s:6:"social";i:0;}}';





    qucreative_import_demo_update_preset($ser_data,array(

        'preseter_slug' => $demo_slug,
        'preseter_name' => $demo_name,
    ));



















}





























$demo_slug = 'slider';
$demo_name = 'Slider';
if($_REQUEST['demo']==$demo_slug) {














    $img_name = '500x500.jpg';
    $img_url = QUCREATIVE_THEME_URL . 'placeholders/500x500.jpg';


    $img_path = QUCREATIVE_THEME_DIR . 'placeholders/500x500.jpg';


    $new_path = $upload_dir_path . '/' . $img_name;

    try {

        if (!copy($img_path, $new_path)) {

        } else {
            $img_url = $upload_dir_url . '/' . $img_name;
            $new_path = $img_path;
        }
    } catch (Exception $e) {
        print_rr($e);
    }








    $img_name = '500x500-150x150.jpg';
    $img_url_2 = QUCREATIVE_THEME_URL . 'placeholders/'.$img_name;


    $img_path_2 = QUCREATIVE_THEME_DIR . 'placeholders/'.$img_name;


    $new_path_2 = $upload_dir_path . '/' . $img_name;

    try {

        if (!copy($img_path_2, $new_path_2)) {

        } else {
            $img_url_2 = $upload_dir_url . '/' . $img_name;
            $new_path_2 = $img_path_2;
        }
    } catch (Exception $e) {
        print_rr($e);
    }





    $img_name = '500x500-darker.jpg';
    $img_url_3 = QUCREATIVE_THEME_URL . 'placeholders/'.$img_name;


    $img_path_3 = QUCREATIVE_THEME_DIR . 'placeholders/'.$img_name;


    $new_path_3 = $upload_dir_path . '/' . $img_name;

    try {

        if (!copy($img_path_3, $new_path_3)) {

        } else {
            $img_url_3 = $upload_dir_url . '/' . $img_name;
            $new_path_3 = $img_path_3;
        }
    } catch (Exception $e) {
        print_rr($e);
    }






    $the_slug = $demo_slug;
    $args = array(
        'name'        => $the_slug,
        'post_type'   => 'page',
        'post_status' => 'publish',
        'numberposts' => 1
    );
    $my_posts = get_posts($args);





    if ($my_posts) {

    } else {






















    }




    $attach_id = qucreative_import_demo_create_attachment($img_url, '1', $new_path);


    $qucreative_theme_data['import_demo_last_attach_id'] = $attach_id;

















































    $cont = '';





    $args = array(
        'post_title'    => wp_strip_all_tags( 'Qu '.$demo_name ),
        'name'    => $demo_slug,
        'post_name'    => $demo_slug,
        'post_content'  => $cont,
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_type'   => 'page',

    );


    $page_id = wp_insert_post( $args );





    update_post_meta( $page_id, '_wp_page_template', 'template-qucreative-slider.php' );;


    $attach_id = qucreative_import_demo_create_attachment($img_url, $page_id, $new_path);
    $attach_id_1 = $attach_id;
    $my_post = array(
        'ID'           => $attach_id,
        'post_excerpt'   => 'COOL INFO',

    );


    wp_update_post( $my_post );
    update_post_meta(  $attach_id ,'meta_att_aligment','right');


    $qucreative_theme_data['import_demo_last_attach_id'] = $attach_id;




    $attach_id = qucreative_import_demo_create_attachment($img_url_2, $page_id, $new_path_2);
    $attach_id_2 = $attach_id;
    $my_post = array(
        'ID'           => $attach_id,
        'post_excerpt'   => 'COOL INFO',

    );


    wp_update_post( $my_post );
    update_post_meta(  $attach_id ,'meta_att_aligment','left');



    $attach_id = qucreative_import_demo_create_attachment($img_url_3, $page_id, $new_path_3);
    $attach_id_3 = $attach_id;
    $my_post = array(
        'ID'           => $attach_id,
        'post_excerpt'   => 'COOL INFO',

    );


    wp_update_post( $my_post );
    update_post_meta(  $attach_id ,'meta_att_aligment','right');










    update_post_meta(  $page_id ,'qucreative_'.'meta_image_gallery',$attach_id_1.','.$attach_id_2.','.$attach_id_3);
    update_post_meta(  $page_id ,'qucreative_'.'meta_bg_image',$img_url);
    update_post_meta(  $page_id ,'qucreative_'.'meta_home_slideshow_time','0');












    update_option( 'page_on_front', $page_id );
    update_option( 'show_on_front', 'page' );













    $temp_text = '';


    $temp_text = preg_replace( "/\r|\n/", "", $temp_text );;






    $ser_data = 'a:51:{s:14:"portfolio_page";s:0:"";s:11:"mail_method";s:7:"wp_mail";s:12:"blur_ammount";s:2:"26";s:23:"menu_enviroment_opacity";s:2:"30";s:26:"content_enviroment_opacity";s:2:"20";s:24:"secondary_content_height";s:3:"300";s:13:"gmaps_api_key";s:0:"";s:17:"soundcloud_apikey";s:0:"";s:13:"gmaps_styling";s:0:"";s:13:"content_align";s:20:"content-align-center";s:16:"page_title_align";s:22:"page-title-align-right";s:16:"page_title_style";s:18:"page-title-style-2";s:12:"width_column";s:2:"40";s:9:"width_gap";s:2:"30";s:17:"width_blur_margin";s:2:"30";s:16:"width_section_bg";s:0:"";s:24:"content_add_extra_pixels";s:0:"";s:12:"border_width";s:1:"0";s:12:"border_color";s:7:"#ffffff";s:37:"content_section_title_two_lines_space";s:1:"0";s:43:"content_section_title_two_lines_use_divider";s:0:"";s:49:"content_section_title_two_lines_use_divider_color";s:0:"";s:9:"menu_type";s:12:"menu-type-13";s:14:"menu_is_sticky";s:3:"off";s:28:"menu_horizontal_shadow_style";s:8:"shadow_2";s:12:"social_icons";s:2:"[]";s:23:"meta_options_post_types";b:0;s:4:"logo";s:'.strlen($logo_slider).':"'.$logo_slider.'";s:6:"logo_x";s:7:"default";s:13:"logo_x_custom";s:0:"";s:6:"logo_y";s:7:"default";s:10:"logo_width";s:0:"";s:11:"logo_height";s:0:"";s:13:"logo_y_custom";s:0:"";s:17:"copyright_textbox";s:22:"Default copyright text";s:31:"copyright_textbox_heading_style";s:9:"h-group-1";s:38:"footer_copyright_textbox_heading_style";s:9:"h-group-1";s:9:"font_data";s:3392:"headings_font=Lato&h1_weight=900&h1_size=70&h1_line_height=1.15&h2_weight=900&h2_size=50&h2_line_height=1.15&h3_weight=700&h3_size=40&h3_line_height=1.15&h4_weight=700&h4_size=30&h4_line_height=1.15&h5_weight=700&h5_size=20&h5_line_height=1.15&h6_weight=700&h6_size=14&h6_line_height=1.57&h-group-1_weight=900&h-group-1_size=11&h-group-1_line_height=1.54&h-group-2_weight=900&h-group-2_size=25&h-group-2_line_height=1.28&body_font=Open+Sans&p_weight=regular&p_size=13&p_line_height=1.92&p_color=%236b6b6b&p_color_for_light=%23ffffff&hyperlink_weight=700&font-group-1_weight=600italic&font-group-1_size=14&font-group-1_line_height=1.42&font-group-2_weight=700&font-group-2_size=14&font-group-2_line_height=1.42&font-group-3_weight=600italic&font-group-3_size=11&font-group-3_line_height=1.27&font-group-4_weight=300&font-group-4_size=14&font-group-4_line_height=1.42&font-group-5_weight=600&font-group-5_size=14&font-group-5_line_height=1.42&font-group-6_weight=regular&font-group-6_size=13&font-group-6_line_height=1.46&font-group-7_weight=300&font-group-7_size=13&font-group-7_line_height=1.46&font-group-8_weight=600italic&font-group-8_size=13&font-group-8_line_height=1.46&font-group-9_weight=regular&font-group-9_size=15&font-group-9_line_height=1.8&font-group-10_weight=regular&font-group-10_size=16&font-group-10_line_height=1.68&font-group-11_weight=regular&font-group-11_size=24&font-group-11_line_height=1.29&font-group-12_weight=300&font-group-12_size=13&font-group-12_line_height=1.46&blockquote_weight=300&blockquote_size=17&blockquote_line_height=1.58&menu_font=Lato&menu_weight=regular&menu_size=14&menu_line_height=1&copyright_font=Lato&copyright_weight=700&copyright_size=10&copyright_line_height=1.4&page_title_font=Lato&page_title_weight=900&page_title_size=70&page_title_line_height=1.14&page_title_color=%23FFFFFF&page_title_orientation=horizontal&section_title_two_font=Lato&section_title_two_first_weight=900&section_title_two_first_size=50&section_title_two_first_line_height=1.14&section_title_two_first_color=%23222222&section_title_two_first_color_for_light=%23222222&section_title_two_second_font=Lato&section_title_two_second_weight=900&section_title_two_second_size=50&section_title_two_second_line_height=1.14&section_title_two_second_color=%23222222&section_title_two_second_color_for_light=%23222222&line_spacing=20&section_title_two_number_font=Lato&section_title_two_number_weight=900&section_title_two_number_size=130&section_title_two_number_line_height=1&section_title_two_number_color=%23444444&section_title_two_number_color_for_light=%23ffffff&section_title_two_divider_divider_style=style-fullwidth&section_title_two_divider_color=%23444444&section_title_two_divider_color_for_light=%23ffffff&section_title_one_first_font=Lato&section_title_one_first_weight=900&section_title_one_first_size=25&section_title_one_first_line_height=1.28&section_title_one_first_color=%23444444&section_title_one_first_color_for_light=%23ffffff&section_title_one_divider_divider_style=style-fullwidth&section_title_one_divider_color=%23444444&section_title_one_divider_color_for_light=%23ffffff&title_divider_spacing=20&home_slider_font=Lato&home_slider_weight=900&home_slider_size=50&home_slider_line_height=1.20&home_slider_color=%23ffffff&home_slider_color_for_light=%23222222&home_number_font=Lato&home_number_weight=900&home_number_size=135&home_number_line_height=1";s:32:"typography_sidebar_heading_style";s:2:"h6";s:31:"typography_footer_heading_style";s:2:"h6";s:24:"content_enviroment_style";s:15:"body-style-dark";s:17:"greyscale_ammount";s:1:"0";s:21:"section_margin_bottom";s:2:"30";s:15:"highlight_color";s:7:"#e5a932";s:22:"enable_bordered_design";s:2:"on";s:23:"enable_native_scrollbar";s:3:"off";s:13:"bg_transition";s:9:"slidedown";s:11:"enable_ajax";s:2:"on";s:13:"bg_isparallax";s:3:"off";s:18:"custom_css_post_id";i:-1;s:18:"nav_menu_locations";a:2:{s:7:"primary";i:'.$menu_id.';s:6:"social";i:0;}}';





    qucreative_import_demo_update_preset($ser_data,array(

        'preseter_slug' => $demo_slug,
        'preseter_name' => $demo_name,
    ));












}














$demo_slug = 'qucreative-home';
$demo_name = 'Main Demo';
if($_REQUEST['demo']==$demo_slug) {



    include get_parent_theme_file_path('class_parts/importdemo_home.php');





}




























die();