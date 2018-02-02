<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage qucreative
 */

global $post;



$args = array(
	'query_type'=>'page',
);

if($post){
	if(is_single($post->ID)){
		$args['query_type']='single-post';
	}
}





global $qucreative_theme_data;
global $antfarm;


$margs = array(

	'template'=>'global',
	'query_type'=>'page', // -- "page" or "single-post" or "loop"
	'type'=>'header', // -- this is constant
	'title'=>'', // -- this is default title

);

if($args){
	$margs = array_merge($margs, $args);
}

$title = $margs['title'];

$qucreative_theme_data['post_for_meta'] = $post; // -- the post that contains the page meta

if(is_home() || is_search()){



	$posts_page = get_option( 'page_for_posts' );

	if($posts_page){

		$qucreative_theme_data['post_for_meta'] = get_post($posts_page);
	}else{
		$title = esc_html__("Blog",'qucreative');

		$qucreative_theme_data['post_for_meta'] = null;

	}



	if(get_option( 'page_for_posts' )){

	}else{

		$page2 = get_page_by_title( 'Blog Meta' );



		if($page2){


			if($page2->post_status=='publish' && $margs['query_type']!='single-post'){
				$qucreative_theme_data['post_for_meta'] = $page2;
			}else{


				// -- blog posts without static page default title
				$title = esc_html__("Blog",'qucreative');
			}

		}else{


			// -- blog posts without static page default title
			$title = esc_html__("Blog",'qucreative');
        }

	}


}


$title_allowed_tags = array(
	'a' => array(
		'href' => array(),
		'title' => array()
	),
	'br' => array(),
	'em' => array(),
	'strong' => array(),
);
if($qucreative_theme_data['post_for_meta']){

	$title = $qucreative_theme_data['post_for_meta']->post_title;


	if (get_post_meta($qucreative_theme_data['post_for_meta']->ID,'qucreative_'.'meta_custom_title'.$qucreative_theme_data['page_extra_meta_label'],true)) {
		$title = wp_kses(get_post_meta($qucreative_theme_data['post_for_meta']->ID,'qucreative_'.'meta_custom_title'.$qucreative_theme_data['page_extra_meta_label'],true),$title_allowed_tags);
	}
}




if(is_404()){
	$title = esc_html__("Oops",'qucreative');
}


if($margs['query_type']=='single-post'){



    // -- single post
	if(get_option( 'page_for_posts' )){
		$page_posts = get_post(get_option( 'page_for_posts' ));

		$title = $page_posts->post_title;
		if (get_post_meta($page_posts->ID,'qucreative_'.'meta_custom_title'.$qucreative_theme_data['page_extra_meta_label'],true)) {
			$title = wp_kses(get_post_meta($page_posts->ID,'qucreative_'.'meta_custom_title'.$qucreative_theme_data['page_extra_meta_label'],true),$title_allowed_tags);
		}


	}else{



        // -- single post
		$page2 = get_page_by_title( 'Blog Meta' );



		if($page2 && $page2->post_status=='publish'){




				$qucreative_theme_data['post_for_meta'] = $page2;



            $title = $page2->post_title;
            if (get_post_meta($page2->ID,'qucreative_'.'meta_custom_title'.$qucreative_theme_data['page_extra_meta_label'],true)) {
                $title = wp_kses(get_post_meta($page2->ID,'qucreative_'.'meta_custom_title'.$qucreative_theme_data['page_extra_meta_label'],true),$title_allowed_tags);
            }

		}else{

		    // -- single post default title

		    $title = esc_html__("Blog",'qucreative');
        }

	}
}


$sidebar = '';

$sidebar = qucreative_get_sidebar();



?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php



	$font_data_str = qucreative_get_theme_mod_and_sanitize('font_data');


	$font_data = array();

	parse_str($font_data_str, $font_data);






	if($font_data_str && $font_data_str!=QUCREATIVE_DEFAULT_TYPOGRAPHY){
		qucreative_generate_font_for_inclusion(array(


			'font_data'=>$font_data,
			'label_prefix'=>'h1',
			'selector'=>'h1',
		));

		qucreative_generate_font_for_inclusion(array(


			'font_data'=>$font_data,
			'label_prefix'=>'h2',
			'selector'=>'h2',
		));

		qucreative_generate_font_for_inclusion(array(


			'font_data'=>$font_data,
			'label_prefix'=>'h3',
			'selector'=>'h3',
		));

		qucreative_generate_font_for_inclusion(array(


			'font_data'=>$font_data,
			'label_prefix'=>'h4',
			'selector'=>'h4',
		));

		qucreative_generate_font_for_inclusion(array(


			'font_data'=>$font_data,
			'label_prefix'=>'h5',
			'selector'=>'h5',
		));

		qucreative_generate_font_for_inclusion(array(


			'font_data'=>$font_data,
			'label_prefix'=>'h6',
			'selector'=>'h6',
		));
		qucreative_generate_font_for_inclusion(array(


			'font_data'=>$font_data,
			'label_prefix'=>'h-group-1',
		));

		qucreative_generate_font_for_inclusion(array(


			'font_data'=>$font_data,
			'label_prefix'=>'h-group-2',
		));


		qucreative_generate_font_for_inclusion(array(


			'font_data'=>$font_data,
			'label_prefix'=>'p',
			'font'=>'body_font',
		));

		qucreative_generate_font_for_inclusion(array(


			'font_data'=>$font_data,
			'label_prefix'=>'hyperlink',
			'font'=>'body_font',
		));


		qucreative_generate_font_for_inclusion(array(


			'font_data'=>$font_data,
			'label_prefix'=>'font-group-1',
			'selector'=>'font-group-1',
			'font'=>'body_font',
		));

		qucreative_generate_font_for_inclusion(array(


			'font_data'=>$font_data,
			'label_prefix'=>'font-group-2',
			'selector'=>'font-group-2',
			'font'=>'body_font',
		));

		qucreative_generate_font_for_inclusion(array(


			'font_data'=>$font_data,
			'label_prefix'=>'font-group-3',
			'selector'=>'font-group-3',
			'font'=>'body_font',
		));

		qucreative_generate_font_for_inclusion(array(


			'font_data'=>$font_data,
			'label_prefix'=>'font-group-4',
			'selector'=>'font-group-4',
			'font'=>'body_font',
		));

		qucreative_generate_font_for_inclusion(array(


			'font_data'=>$font_data,
			'label_prefix'=>'font-group-5',
			'selector'=>'font-group-5',
			'font'=>'body_font',
		));

		qucreative_generate_font_for_inclusion(array(


			'font_data'=>$font_data,
			'label_prefix'=>'font-group-6',
			'selector'=>'font-group-6',
			'font'=>'body_font',
		));

		qucreative_generate_font_for_inclusion(array(


			'font_data'=>$font_data,
			'label_prefix'=>'font-group-7',
			'selector'=>'font-group-7',
			'font'=>'body_font',
		));

		qucreative_generate_font_for_inclusion(array(


			'font_data'=>$font_data,
			'label_prefix'=>'font-group-8',
			'selector'=>'font-group-8',
			'font'=>'body_font',
		));

		qucreative_generate_font_for_inclusion(array(


			'font_data'=>$font_data,
			'label_prefix'=>'font-group-9',
			'selector'=>'font-group-9',
			'font'=>'body_font',
		));

		qucreative_generate_font_for_inclusion(array(


			'font_data'=>$font_data,
			'label_prefix'=>'font-group-10',
			'selector'=>'font-group-10',
			'font'=>'body_font',
		));

		qucreative_generate_font_for_inclusion(array(


			'font_data'=>$font_data,
			'label_prefix'=>'font-group-11',
			'selector'=>'font-group-11',
			'font'=>'body_font',
		));

		qucreative_generate_font_for_inclusion(array(


			'font_data'=>$font_data,
			'label_prefix'=>'font-group-12',
			'selector'=>'font-group-12',
			'font'=>'body_font',
		));

		qucreative_generate_font_for_inclusion(array(


			'font_data'=>$font_data,
			'label_prefix'=>'blockquote',
			'selector'=>'blockquote',
			'font'=>'body_font',
		));



		qucreative_generate_font_for_inclusion(array(


			'font_data'=>$font_data,
			'label_prefix'=>'menu',
			'selector'=>'body .qucreative--nav-con ul.the-actual-nav li > a',
			'font'=>'menu_font',
		));

		qucreative_generate_font_for_inclusion(array(


			'font_data'=>$font_data,
			'label_prefix'=>'copyright',
			'selector'=>'body .qucreative--nav-con ul.the-actual-nav li > a',
			'font'=>'menu_font',
		));


		qucreative_generate_font_for_inclusion(array(


			'font_data'=>$font_data,
			'label_prefix'=>'section_title_one_first',
			'font'=>'section_title_one_first_font',
		));


		qucreative_generate_font_for_inclusion(array(


			'font_data'=>$font_data,
			'label_prefix'=>'section_title_two_first',
			'font'=>'section_title_two_font',
		));


		qucreative_generate_font_for_inclusion(array(


			'font_data'=>$font_data,
			'label_prefix'=>'section_title_two_second',
			'font'=>'section_title_two_font',
		));


		qucreative_generate_font_for_inclusion(array(


			'font_data'=>$font_data,
			'label_prefix'=>'section_title_two_second',
			'font'=>'section_title_two_second_font',
		));


		qucreative_generate_font_for_inclusion(array(


			'font_data'=>$font_data,
			'label_prefix'=>'section_title_two_number',
			'font'=>'section_title_two_number_font',
		));


		qucreative_generate_font_for_inclusion(array(


			'font_data'=>$font_data,
			'label_prefix'=>'page_title',
			'selector'=>'.the-content-con > h1',
			'font'=>'page_title_font',
		));




		foreach ($qucreative_theme_data['font_used'] as $lab => $fu){





			$i5 = 0;
			$finalfamily = '';
			foreach ($fu as $fui){

				if($i5){
					$finalfamily.=',';
				}


				$finalfamily.=$fui;

				$i5++;
			}


			qucreative_enqueue_google_font($lab.$finalfamily, $lab,$finalfamily);
		}

	}else{



	    // -- default typography


		qucreative_enqueue_google_font('Open+Sans:400,600italic,600,400italic,800', 'Open+Sans', '400,600italic,600,400italic,800');
		qucreative_enqueue_google_font('Lato:700,400,900italic,700italic,900', 'Lato', '700,400,900italic,700italic,900');
		qucreative_enqueue_google_font('Playfair+Display:900italic', 'Playfair+Display', '900italic');

	}






	// -- end font inclusions

	?>
	<?php


	$page_type = 'page-normal';

	if($post){
		if(get_post_meta( $post->ID, '_wp_page_template', true )=='template-qucreative-slider.php'){
			$page_type = 'page-homepage';
		}
		if(get_post_meta( $post->ID, '_wp_page_template', true )=='template-portfolio.php'){
			$page_type = 'page-portfolio';
		}
		if(get_post_meta( $post->ID, '_wp_page_template', true )=='template-gallery-creative.php'){
			$page_type = 'page-gallery-w-thumbs';
		}
	}

	if(is_home() || is_search() || is_archive()){
		$page_type = 'page-blogsingle';
	}

	if(is_single()){
		if($post){
			if($post->post_type=='post'){

				$page_type = 'page-blogsingle';
			}
		}
	}

	$qucreative_theme_data['page_type'] = $page_type;





	if(is_search()){
		$title = esc_html__("SEARCH",'qucreative');
	}
	if(is_archive()){
		$title = esc_html__("ARCHIVE",'qucreative');
	}






	global $wp_query;



	$qucreative_theme_data['wp_query'] = $wp_query;

	if($wp_query ){
		if(isset($wp_query->query_vars)){
			if(isset($wp_query->query_vars['antfarm_port_items_cat'])){
				$post_for_meta = null;


			}
		}
	}




	// -- we are in customizer so update values
	if($qucreative_theme_data['sw_is_in_customizer']){

		$qucreative_theme_data['menu_type'] = get_theme_mod('menu_type');

	}



	if($qucreative_theme_data['menu_type']=='menu-type-9' || $qucreative_theme_data['menu_type']=='menu-type-10' || $qucreative_theme_data['menu_type']=='menu-type-13' || $qucreative_theme_data['menu_type']=='menu-type-14' || $qucreative_theme_data['menu_type']=='menu-type-15' || $qucreative_theme_data['menu_type']=='menu-type-16' || $qucreative_theme_data['menu_type']=='menu-type-17' || $qucreative_theme_data['menu_type']=='menu-type-18'){

		$qucreative_theme_data['menu_type_attr']='qucreative-horizontal-menu';
	}



	if($post && $post->post_type=='antfarm_port_items'){

		$page_type=' page-portfolio-single ';
		$page_type.=' page-portfolio-type-'.get_post_meta($post->ID,'qucreative_'.'meta_post_media_type'.$qucreative_theme_data['page_extra_meta_label'],true);

		if(get_post_meta( $post->ID, 'qucreative_'.'meta_is_fullscreen'.$qucreative_theme_data['page_extra_meta_label'], true )=='on'){
			$page_type.=' single-antfarm_port_items-fullscreen';
		}else{

			$page_type.=' single-antfarm_port_items-notfullscreen';
		}


	}


	if($post){
		$page_type.= ' post-media-type-'.esc_attr(get_post_meta($post->ID,'qucreative_'.'meta_post_media_type'.$qucreative_theme_data['page_extra_meta_label'],true));

	}







	if($qucreative_theme_data['menu_type']==''){
		$qucreative_theme_data['menu_type']='menu-type-1';
    }


	if($qucreative_theme_data['menu_type']=='' || $qucreative_theme_data['menu_type']=='menu-type-1' || $qucreative_theme_data['menu_type']=='menu-type-2' || $qucreative_theme_data['menu_type']=='menu-type-3' || $qucreative_theme_data['menu_type']=='menu-type-4'){

		$qucreative_theme_data['menu_type_attr']='qucreative-vertical-menu';
	}




	$page_title_align = get_theme_mod('page_title_align');





	if($qucreative_theme_data['sw_is_in_customizer']){
		$lab = 'content_enviroment_style';

		$qucreative_theme_data['theme_mods'][$lab] = get_theme_mod($lab);
	}













	$lab = 'menu_enviroment_opacity';
	$menu_enviroment_opacity = $qucreative_theme_data['theme_mods'][$lab];

	$content_enviroment_opacity = '';

	if($qucreative_theme_data['sw_is_in_customizer']){

		$menu_enviroment_opacity = get_theme_mod($lab);
	}
	if ($menu_enviroment_opacity == '') {
		$menu_enviroment_opacity = '';
	}



	$lab = 'content_enviroment_opacity';
	$content_enviroment_opacity = $qucreative_theme_data['theme_mods'][$lab];


	if($qucreative_theme_data['sw_is_in_customizer']){

		$content_enviroment_opacity = get_theme_mod($lab);
	}

	if ($content_enviroment_opacity == '') {
		$content_enviroment_opacity = '30';
	}




	if( $content_enviroment_opacity!='30') {
		$content_enviroment_opacity_val = floatval($qucreative_theme_data['theme_mods']['content_enviroment_opacity']) / 100;
	}else{
		$content_enviroment_opacity_val = '0.3';
	}





	?>




	<?php

	$content_enviroment_opacity = $qucreative_theme_data['theme_mods']['content_enviroment_opacity'];

	if ($content_enviroment_opacity == '') {
		$content_enviroment_opacity = '30';
	}

	if( $content_enviroment_opacity!='30') {
		$content_enviroment_opacity_val = floatval($qucreative_theme_data['theme_mods']['content_enviroment_opacity']) / 100;
	}else{
		$content_enviroment_opacity_val = '0.3';
	}



	$style_data_for_env = '';





	$the_content_con_identifier = '';


	if($qucreative_theme_data['post_for_meta']){
		$the_content_con_identifier = '.the-content-con-for-post-id-'.$qucreative_theme_data['post_for_meta']->ID;
	}




	$enable_bordered_design = 'on';
	$enable_bordered_design_from_post = '';

	if($qucreative_theme_data['post_for_meta']){
		if(get_post_meta($qucreative_theme_data['post_for_meta']->ID,'qucreative_'.'meta_bordered_design'.$qucreative_theme_data['page_extra_meta_label'],true)){

			$enable_bordered_design = esc_attr(get_post_meta($qucreative_theme_data['post_for_meta']->ID,'qucreative_'.'meta_bordered_design'.$qucreative_theme_data['page_extra_meta_label'],true));
			$enable_bordered_design_from_post = esc_attr(get_post_meta($qucreative_theme_data['post_for_meta']->ID,'qucreative_'.'meta_bordered_design'.$qucreative_theme_data['page_extra_meta_label'],true));



		}else{

			if(get_theme_mod('enable_bordered_design')=='on'){

			}else{
				if(get_theme_mod('enable_bordered_design')){

					$enable_bordered_design = get_theme_mod('enable_bordered_design');
				}
			}
		}
	}






	if($content_enviroment_opacity_val==1 || $enable_bordered_design_from_post=='on'){




		if($qucreative_theme_data['sw_is_in_customizer']){

		}




		if($enable_bordered_design=='on'){
			if($qucreative_theme_data['theme_mods']['content_enviroment_style']=='body-style-light' || $enable_bordered_design_from_post=='on'){



				$style_data_for_env.= ''.$the_content_con_identifier.' .portfolio-link-con .portfolio-link--title { color: #aaaaaa; } ';
				$style_data_for_env.= ''.$the_content_con_identifier.'.page-portfolio-single .the-content-inner { border-left: 1px solid #ddd; border-top: 1px solid #ddd; 
    border-right: 1px solid #ddd; } ';
				$style_data_for_env.= '.main-container '.$the_content_con_identifier.' .zfolio.skin-qucreative .zfolio-item.active .the-overlay, '.$the_content_con_identifier.' .slider-con .zfolio.skin-qucreative .zfolio-item.active .the-overlay { box-shadow: inset 0px 0px 0px 5px #222222; } ';
				$style_data_for_env.= ''.$the_content_con_identifier.' .the-content-inner .portfolio-link-con .portfolio-link--title, '.$the_content_con_identifier.' .the-content-inner .portfolio-link-con .portfolio-link--toback { background-color: #ffffff; border-top: 1px solid #ddd; }          ';
				$style_data_for_env.= ' '.$the_content_con_identifier.' .zfolio.skin-qucreative .items > .excerpt-content-con .excerpt-content{  box-shadow: inset 0px 0px 0px 1px #ddd;   }      ';
				$style_data_for_env.= ' '.$the_content_con_identifier.'  .the-content-inner .portfolio-link-con .portfolio-link--toback.center-td { background-color: #eeeeee;  } .portfolio-link-con .portfolio-link--toback.center-td i , '.$the_content_con_identifier.' .portfolio-link-con .portfolio-link--title.left-td:before, '.$the_content_con_identifier.' .portfolio-link-con .portfolio-link--title.right-td:before{ color: #222; } '.$the_content_con_identifier.' .portfolio-link-con .portfolio-link--toback.center-td:hover i, '.$the_content_con_identifier.' .portfolio-link-con .portfolio-link--title.left-td:hover:before, '.$the_content_con_identifier.' .portfolio-link-con .portfolio-link--title.right-td:hover:before { color: #fff; } ';
				$style_data_for_env.= ''.$the_content_con_identifier.' a.zfolio-item--inner  { display:block; } ';
				$style_data_for_env.= 'body.body-style-light '.$the_content_con_identifier.'.page-blogsingle .blog-link-con .portfolio-link--title.left-td, body.body-style-light '.$the_content_con_identifier.'.page-blogsingle .blog-link-con .portfolio-link--title.right-td, body.body-style-light '.$the_content_con_identifier.'.page-blogsingle .blog-link-con .portfolio-link--toback.center-td > a{ background-color: #eeeeee; }';
				$style_data_for_env.= ' body.body-style-light '.$the_content_con_identifier.' .sidebar-main .sidebar-block { background-color: #f9f9f9; } ';
				$style_data_for_env.= 'body.body-style-light '.$the_content_con_identifier.' .the-content-sheet:not(.the-content-sheet-dark):not(.the-content-sheet-for-sc), body.body-style-light '.$the_content_con_identifier.' .sidebar-main .sidebar-block, body.body-style-light '.$the_content_con_identifier.'.page-blogsingle .blog-link-con .portfolio-link--title.left-td, body.body-style-light.page-blogsingle .blog-link-con .portfolio-link--title.right-td, body.body-style-light '.$the_content_con_identifier.'.page-blogsingle .blog-link-con .portfolio-link--toback.center-td > a, body.body-style-light '.$the_content_con_identifier.' .the-content-inner > .vc_row{ border: 1px solid #dddddd; } ';
				$style_data_for_env.= 'body '.$the_content_con_identifier.' .vc_section.from-post-type .the-content-sheet:after  { display:none; } ';
				$style_data_for_env.= 'body.body-style-light '.$the_content_con_identifier.' .the-content-sheet.has-featured-media  { border-top: 0; } ';
				$style_data_for_env.= 'body.body-style-light '.$the_content_con_identifier.' .the-content-sheet.has-media { border-top: 0px solid rgba(0,0,0,0); } ';
				$style_data_for_env.= 'body div.main-container '.$the_content_con_identifier.' .sidebar-main .widget_search .search-form .search-submit:hover { border-color: #222222; } ';
				$style_data_for_env.= 'body.body-style-light '.$the_content_con_identifier.' .the-content-sheet.has-media .featured-media-con  { width: auto ; margin-left: -1px; margin-right: -1px; } ';

// -- search
				$style_data_for_env.= 'body.body-style-light '.$the_content_con_identifier.'  .sidebar-main .widget_search .search-submit-con, body.body-style-light '.$the_content_con_identifier.'  .sidebar-main .widget_search .search-submit { background-color: #222222;  } ';
				$style_data_for_env.= 'body.body-style-light '.$the_content_con_identifier.'  .sidebar-main .widget_search .search-submit:after { color: #fff; } ';
				$style_data_for_env.= ' body.body-style-light '.$the_content_con_identifier.'  .sidebar-main .widget_search input[type=text]:hover, body.body-style-light '.$the_content_con_identifier.' .sidebar-main .widget_search .search-field:hover,   body.body-style-light '.$the_content_con_identifier.' .sidebar-main .widget_search input[type=text]:first-child,   body.body-style-light '.$the_content_con_identifier.' .sidebar-main .widget_search .search-field { background-color: #ffffff; color: #777; } ';
				$style_data_for_env.= 'body.body-style-light '.$the_content_con_identifier.' .widget_search .search-field::-webkit-input-placeholder { color: #777; } ';
				$style_data_for_env.= 'body.body-style-light '.$the_content_con_identifier.' .widget_search .search-field::-moz-placeholder { color: #777; } ';
				$style_data_for_env.= 'body.body-style-light '.$the_content_con_identifier.' .widget_search .search-field::-ms-input-placeholder { color: #777; } ';
				$style_data_for_env.= 'body.body-style-light '.$the_content_con_identifier.'.page-portfolio .zfolio.skin-melbourne .item-meta { border-left: 1px solid #ddd; border-bottom: 1px solid #ddd; border-right: 1px solid #ddd; } ';






				$style_data_for_env.= 'body.body-style-light '.$the_content_con_identifier.' .sidebar-main .widget_search input[type=text]:first-child,body.body-style-light '.$the_content_con_identifier.' .sidebar-main  .widget_search .search-field{ border-color: #222222; } ';
				$style_data_for_env.= ' body.body-style-light '.$the_content_con_identifier.' .sidebar-main  .widget_search .search-form:after{ color: #ffffff; } ';
// -- search
			}else{


				$style_data_for_env.= ' '.$the_content_con_identifier.' .the-content-sheet:not(.the-content-sheet-dark) .zfolio.skin-qucreative .items > .excerpt-content-con .excerpt-content{  box-shadow: inset 0px 0px 0px 1px #ddd;   }      ';



				$style_data_for_env.= ''.$the_content_con_identifier.' .the-content-sheet.the-content-sheet-dark { border: 1px solid #555555 ; } ';
				$style_data_for_env.= ''.$the_content_con_identifier.' .the-content-sheet.the-content-sheet-dark.has-media { border-top: 0px solid rgba(0,0,0,0); } ';
				$style_data_for_env.= ''.$the_content_con_identifier.' .the-content-sheet.the-content-sheet-dark.has-media .featured-media-con  { width: auto ; margin-left: -1px; margin-right: -1px; } ';
			}












		}
	}



	if($enable_bordered_design=='on' || $enable_bordered_design_from_post=='on') {
		if ($content_enviroment_opacity_val > 0.6 || $enable_bordered_design_from_post=='on') {

			$style_data_for_env.= 'body.body-style-light ' . $the_content_con_identifier . ' .selector-con-for-skin-melbourne .a-category { color: #222222; } ';
			$style_data_for_env.= 'body.body-style-light ' . $the_content_con_identifier . ' .selector-con.selector-con-for-skin-melbourne .categories .a-category:hover,body.body-style-light ' . $the_content_con_identifier . ' .selector-con.selector-con-for-skin-melbourne .categories .a-category.active { color: #ffffff; } ';
		}
		if ($content_enviroment_opacity_val >= 1 || $enable_bordered_design_from_post=='on') {

			$style_data_for_env.= ''.$the_content_con_identifier.' .the-content-sheet:not(.the-content-sheet-dark) .zfolio.skin-melbourne .item-meta{ border-left: 1px solid #ddd; border-bottom: 1px solid #ddd; border-right: 1px solid #ddd; } ';
		}
	}




	if( (is_home() || is_search()) == false && $qucreative_theme_data['post_for_meta']){
		if (get_post_meta($qucreative_theme_data['post_for_meta']->ID, 'qucreative_'.'meta_custom_section_margin_bottom'.$qucreative_theme_data['page_extra_meta_label'], true) || get_post_meta($qucreative_theme_data['post_for_meta']->ID, 'qucreative_'.'meta_custom_section_margin_bottom'.$qucreative_theme_data['page_extra_meta_label'], true)==='0') {



			$style_data_for_env.='
			
            body .main-container .the-content-con-for-post-id-'.$qucreative_theme_data['post_for_meta']->ID.' .the-content-sheet{
                margin-bottom: '.esc_html(get_post_meta($qucreative_theme_data['post_for_meta']->ID, 'qucreative_'.'meta_custom_section_margin_bottom'.$qucreative_theme_data['page_extra_meta_label'], true)).'px;
            }

            body  .the-content-con-for-post-id-'.$qucreative_theme_data['post_for_meta']->ID.' .the-content-inner+.footer-conglomerate{
                margin-top: '. esc_html(get_post_meta($qucreative_theme_data['post_for_meta']->ID, 'qucreative_'.'meta_custom_section_margin_bottom'.$qucreative_theme_data['page_extra_meta_label'], true)) .'px;
            }
            ';


		}
	}


	// -- end $style_data_for_env


	qucreative_generate_inline_css_for_enviroment();
	qucreative_generate_inline_css_for_font_data();
	qucreative_generate_inline_css_for_highlight();
	qucreative_generate_inline_css_for_contain();

	

    wp_add_inline_style('qucreative',($style_data_for_env.$qucreative_theme_data['css_data_overlay_opacity'].$qucreative_theme_data['css_data_typography'].$qucreative_theme_data['css_data_highlight'].$qucreative_theme_data['css_data_contain']));





    qucreative_generate_inline_javascript_for_options();








	do_action('qucreative_hook_head');

	wp_head();


	?>
</head>
<body   <?php echo body_class(); ?> >
<?php



if($qucreative_theme_data['post_for_meta']){
	if(get_post_meta( $qucreative_theme_data['post_for_meta']->ID, '_wp_page_template', true )=='template-portfolio.php' && get_post_meta( $qucreative_theme_data['post_for_meta']->ID, 'qucreative_'.'meta_is_fullscreen'.$qucreative_theme_data['page_extra_meta_label'], true )=='on'){


	}
}



?>

<div class="main-container<?php  ?>">
	<div class="main-bg-con main-bg-con--placeholder">
		<figure class="main-bg" style=""></figure>
	</div>
	<?php




	?><div class="the-content-con <?php echo ' '.$page_type;


	if($qucreative_theme_data['has_footer']){
		echo ' has-footer';
	}

	$sw_page_is_fullwidth = false;


	if( strpos($page_type,'page-gallery-w-thumbs')!==false||strpos($page_type,'page-homepage')!==false ){

		$sw_page_is_fullwidth = true;
	}

	if($qucreative_theme_data['post_for_meta']){


		echo ' the-content-con-for-post-id-'.$qucreative_theme_data['post_for_meta']->ID.'';
	}



	if(is_home()){
		echo ' posts-page';
	}


	if( $post && ($post->post_type=='antfarm_port_items' || $post->post_type=='dzsvcs_port_items') && get_post_meta( $post->ID, 'qucreative_'.'meta_is_fullscreen'.$qucreative_theme_data['page_extra_meta_label'], true )!='on'){

		$portfolio_page = get_post(get_theme_mod('portfolio_page'));

//		print_rr($portfolio_page);



		if($portfolio_page && isset($portfolio_page->post_title)){

			$title=$portfolio_page->post_title;


			if (get_post_meta($portfolio_page->ID,'qucreative_'.'meta_custom_title'.$qucreative_theme_data['page_extra_meta_label'],true)) {
				$title = esc_html(get_post_meta($portfolio_page->ID,'qucreative_'.'meta_custom_title'.$qucreative_theme_data['page_extra_meta_label'],true));
			}
        }





	}



	if($qucreative_theme_data['sw_is_in_customizer']){
		$lab = 'content_align';

		$qucreative_theme_data['theme_mods'][$lab] = get_theme_mod($lab);
	}


	if($qucreative_theme_data['post_for_meta']){
		if($qucreative_theme_data['post_for_meta']->ID && get_post_meta( $qucreative_theme_data['post_for_meta']->ID, 'qucreative_'.'meta_is_fullscreen'.$qucreative_theme_data['page_extra_meta_label'], true )!='on'){



			echo ' ' . $qucreative_theme_data['theme_mods']['content_align'];

		}



		if(get_post_meta( $qucreative_theme_data['post_for_meta']->ID, '_wp_page_template', true )=='default'){






			$output_array = array();



			preg_match_all("/\[vc_row/", $post->post_content, $output_array);


			if ($output_array[0] && count($output_array[0]) == 1) {



				$prefix = 'antfarm';
				if($antfarm){
					$prefix = $antfarm->name_prefix;
				}

				preg_match_all("/\[".$prefix."_portfolio.*?skin=\"(.*?)\".*?cat=\"(.*?)\"/", $post->post_content, $output_array);



				if ($output_array[0] && count($output_array[0]) == 1) {

					if (isset($output_array[1][0])) {

						$qucreative_theme_data['template_is_portfolio_skin'] = $output_array[1][0];




						echo ' template-is-default-and-has-one-zfolio';


						if($qucreative_theme_data['template_is_portfolio_skin']=='skin-gazelia skin-gazelia--transparent'){

							echo ' template-is-default-and-has-one-zfolio-gazelia';
						}
					}


				}

			}


		}
	}






	$post_type_for_portfolio = 'antfarm_port_items';

	if($antfarm && isset($antfarm->name_port_item)){
		$post_type_for_portfolio = $antfarm->name_port_item;
	}


	if( $qucreative_theme_data['post_for_meta'] && (get_post_meta( $qucreative_theme_data['post_for_meta']->ID, '_wp_page_template', true )=='template-portfolio.php'|| ( $qucreative_theme_data['post_for_meta']->post_type==$post_type_for_portfolio) ||$qucreative_theme_data['post_for_meta']->post_type=='page') && get_post_meta( $qucreative_theme_data['post_for_meta']->ID, 'qucreative_'.'meta_is_fullscreen'.$qucreative_theme_data['page_extra_meta_label'], true )=='on'){

		echo ' fullit';

		$qucreative_theme_data['page_is_fullscreen'] = true;
		$sw_page_is_fullwidth = true;

		if(get_post_meta( $post->ID, '_wp_page_template', true )=='template-portfolio.php'||$post->post_type==$post_type_for_portfolio){

			$title='';
		}

		echo ' fullit-type-'.esc_html(get_post_meta( $qucreative_theme_data['post_for_meta']->ID, 'qucreative_'.'meta_is_fullscreen_stretch'.$qucreative_theme_data['page_extra_meta_label'], true ));
	}



	if ($post && get_post_meta($post->ID, 'qucreative_'.'meta_rev_slider', true) ) {
		echo ' has-header-slider';
	}

	$original_title = $title;


	if($title==='  ' || $title===' ' || $title==='none'){
		$title ='';
	}



	if($sw_page_is_fullwidth){
		echo ' page-is-fullwidth';
	}






	?>" <?php






	$scrollbar_theme = 'default';




	if(strpos($qucreative_theme_data['body_class'],'body-style-light')!==false){

		$scrollbar_theme = 'default';
    }else{
		$scrollbar_theme = 'light';
    }



	if($post){
	    if(get_post_meta($post->ID,'qucreative_'.'meta_scrollbar_theme'.$qucreative_theme_data['page_extra_meta_label'],true)!=='default'){

		    $scrollbar_theme = get_post_meta($post->ID,'qucreative_'.'meta_scrollbar_theme'.$qucreative_theme_data['page_extra_meta_label'],true);
        }

	}

	if($scrollbar_theme=='light'){

		echo ' data-scrollbar-theme="light"';

	}



	?> style=";">
		<?php


		if($post){
			if (get_post_meta($post->ID, 'qucreative_'.'meta_rev_slider'.$qucreative_theme_data['page_extra_meta_label'], true) ) {


				$str_w = '100%';
				$str_h = '100vh';
				$str_l = '0';
				$str_t = '0';
				$str_mar_top = '0';
				$str_pad_bot = '0';
				$str_pad_top = '0';
				$str_pad_lef = '0';


				$slider_type = 'fullscreen';

				$sliderAlias = esc_html(get_post_meta($post->ID, 'qucreative_'.'meta_rev_slider'.$qucreative_theme_data['page_extra_meta_label'], true));


				if(class_exists('RevSliderOutput')){

					$gal_ids = '';
					$settings = array();
					$order = '';

					ob_start();
					if(!empty($gal_ids)){

						// -- add a gallery based slider
						$slider = RevSliderOutput::putSlider($sliderAlias, '', $gal_ids);
					}else{
						$slider = RevSliderOutput::putSlider($sliderAlias, '', array(), $settings, $order);
					}
					$content = ob_get_contents();
					ob_clean();
					ob_end_clean();;
					$slider_type = $slider->getParam("slider_type","");





				}



				if($qucreative_theme_data['menu_type']=='menu-type-1' || $qucreative_theme_data['menu_type']=='menu-type-2'){

					$str_w='calc(100% - 250px)';



					$str_pad_lef='250px';

				}



				if($qucreative_theme_data['menu_type']=='menu-type-5' || $qucreative_theme_data['menu_type']=='menu-type-6'){

					$str_w='calc(100% - 280px)';

					$str_pad_lef='280px';

				}


				if($qucreative_theme_data['menu_type']=='menu-type-7' || $qucreative_theme_data['menu_type']=='menu-type-8'){

					$str_w='calc(100% - 290px)';

					$str_pad_lef='290px';

				}


				if($qucreative_theme_data['menu_type']=='menu-type-13'  || $qucreative_theme_data['menu_type']=='menu-type-14' || $qucreative_theme_data['menu_type']=='menu-type-17' || $qucreative_theme_data['menu_type']=='menu-type-18'){

					$str_h='calc(100vh - 100px)';


					if($qucreative_theme_data['theme_mods']['menu_is_sticky']=='on'){

						$str_h='calc(100vh)';

						$str_pad_top = '100px';
					}

				}



				if($slider_type=='fullwidth'){
					$str_h = 'auto';
				}



				if(get_post_meta($post->ID, 'qucreative_'.'meta_rev_slider_height_mode', true)=='custom_height' &&get_post_meta($post->ID, 'qucreative_'.'meta_rev_slider_custom_height', true)){

					$str_h=esc_html(get_post_meta($post->ID, 'qucreative_'.'meta_rev_slider_custom_height', true)).'px';

				}


				echo '<div class="big-revslider-con';

				if($slider_type=='fullwidth'){
					echo ' fullwidth';
				}

				if($slider_type=='fullscreen'){
					echo ' fullwidth fullscreen';
				}

				echo '" style="width: '.$str_w.';height: '.$str_h.';left: '.$str_l.';top: '.$str_t.';padding-bottom: '.$str_pad_bot.';margin-top: '.$str_mar_top.';';

				if($str_pad_top){
					echo ' padding-top: '.$str_pad_top.';';
				}
				if($str_pad_lef){
					echo ' padding-left: '.$str_pad_lef.';';
				}

				echo '">';

				echo do_shortcode('[rev_slider alias="'.esc_attr(get_post_meta($post->ID, 'qucreative_'.'meta_rev_slider'.$qucreative_theme_data['page_extra_meta_label'], true)).'"]');

				echo '</div>';


			}

		}




		if($post==false || ( get_post_meta( $post->ID, '_wp_page_template', true )!='template-qucreative-slider.php' ) ){
		?>









		<div class="the-content <?php




		if($post && ( get_post_meta( $post->ID, '_wp_page_template', true )=='template-gallery-creative.php' ) ){

			echo 'gallery-thumbs--image-container';
		}







		$prefix = 'antfarm';
		if($antfarm && isset($antfarm->name_prefix)){
			$prefix = $antfarm->name_prefix;
		}




		if(strpos($page_type,'page-portfolio') !== false){

			$qucreative_theme_data['template_is_portfolio'] = true;


			$output_array = array();



			preg_match_all("/\[".$prefix."_portfolio.*?skin=\"(.*?)\".*?cat=\"(.*?)\"/", $post->post_content, $output_array);



			if($output_array[0] && count($output_array[0])==1){

				if(isset($output_array[1][0])){

					$qucreative_theme_data['template_is_portfolio_skin'] = $output_array[1][0];
				}





				$output_array2 = array();

				preg_match_all("/\['.$prefix.'_portfolio.*?gap=\"(.*?)\"/", $post->post_content, $output_array2);


				if(isset($output_array[2]) && $output_array[2][0]){

					$arr_cats = explode(',',$output_array[2][0]);


					foreach ($arr_cats as $catid){

						$catid = qucreative_sanitize_term_slug_to_id($catid,'antfarm_port_items_cat');
						$term = get_term($catid,'antfarm_port_items_cat');





						$the_cat_id = $catid;
						$term_id = $the_cat_id;
						$taxonomy_name = 'antfarm_port_items_cat';




						$term_id = qucreative_sanitize_term_slug_to_id($term_id);

						$termchildren = get_term_children( $term_id, $taxonomy_name );


						if(is_array($qucreative_theme_data['template_is_portfolio_term_children'])==false){

							$qucreative_theme_data['template_is_portfolio_term_children'] = array();
						}
						foreach ($termchildren as $tc){
							$term = get_term($tc, $taxonomy_name);



							array_push($qucreative_theme_data['template_is_portfolio_term_children'], $term);
						}


					}





				}




				if(count($qucreative_theme_data['template_is_portfolio_term_children'])==0){
					echo ' template-is-portfolio-no-filters';
				}







				if(isset($output_array2[1]) && isset($output_array2[1][0]) && $output_array2[1][0]){

					$qucreative_theme_data['template_is_portfolio_gap'] = $output_array2[1][0];
				}



				if(get_post_meta($post->ID,'qucreative_'.'meta_portfolio_bounds'.$qucreative_theme_data['page_extra_meta_label'],true)){
					$qucreative_theme_data['template_is_portfolio_gap'] = esc_html(get_post_meta($post->ID,'qucreative_'.'meta_portfolio_bounds'.$qucreative_theme_data['page_extra_meta_label'],true));
				}





			}
		}




		if($title && $original_title!='none' && $original_title!=' '){

		}else{
		    echo ' the-content--no-title';
        }


		// -- this is .the-content div

		?>" style="<?php



        $sw_set_margin_top_0 = false;

		if($original_title==' ' || $original_title==='none'){
			$sw_set_margin_top_0 = true;
		}

		if( $qucreative_theme_data['post_for_meta'] &&  ( get_post_meta( $qucreative_theme_data['post_for_meta']->ID, 'qucreative_'.'meta_content_starts_at_pixel'.$qucreative_theme_data['page_extra_meta_label'], true ) )){
			$sw_set_margin_top_0 = false;
        }

		if($sw_set_margin_top_0){



		    $val = 0;
			if($qucreative_theme_data['menu_type_attr']=='qucreative-horizontal-menu'){






				if($qucreative_theme_data['sw_is_in_customizer']){
					$lab = 'menu_is_sticky';

					$qucreative_theme_data['theme_mods'][$lab] = qucreative_get_theme_mod_and_sanitize($lab);
				}




				if($qucreative_theme_data['theme_mods']['menu_is_sticky']=='on'){
					$val+=100;


				}else{

				}
			}

			echo 'margin-top:'.$val.'px;';


		}

		?>" <?php
		if($qucreative_theme_data['template_is_portfolio_gap']){
			echo ' data-portfolio-gap="'.$qucreative_theme_data['template_is_portfolio_gap'].'"';
		}
		?>
		>
			<?php

			if($title && $original_title!='none' && $original_title!=' '){
				?>
				<h1 class="main-page-title<?php




				if($qucreative_theme_data['post_for_meta'] && get_post_meta( $qucreative_theme_data['post_for_meta']->ID, 'qucreative_'.'meta_is_fullscreen'.$qucreative_theme_data['page_extra_meta_label'], true )=='on'){

					if($page_title_align=='page-title-align-right'){
						echo ' margin-right-blur-margin';
					}
					if($page_title_align=='page-title-align-left'){
						echo ' margin-left-blur-margin';
					}
				}


				?>"><?php echo $title; ?></h1>
				<?php
			}



			if( $post && (get_post_meta( $post->ID, '_wp_page_template', true )=='template-portfolio.php' && get_post_meta( $post->ID, 'qucreative_'.'meta_is_fullscreen'.$qucreative_theme_data['page_extra_meta_label'], true )=='on') || ( $post && $post->post_type=='antfarm_port_items' && get_post_meta( $post->ID, 'qucreative_'.'meta_is_fullscreen'.$qucreative_theme_data['page_extra_meta_label'], true )=='on') ){

			}else{
				?>

				<div class="translucent-con translucent-con--for-the-content ">
					<div class="translucent-bg  for-parallaxer"></div>
					<canvas class="translucent-canvas"></canvas>
					<div class="translucent-overlay"></div>
				</div>

				<?php
			}
			?>


			<div class="the-content-inner<?php

			if($post && get_post_meta( $post->ID, '_wp_page_template', true )=='template-portfolio.php' && get_post_meta( $post->ID, 'qucreative_'.'meta_is_fullscreen'.$qucreative_theme_data['page_extra_meta_label'], true )=='on'){
				echo ' zfolio-portfolio-fullscreen-con';
			}










			if($qucreative_theme_data['content_acts_as_sheet']){
				echo ' the-content-inner-acts-as-sheet';
			}

			if($post && $post->post_type=='post'){
				echo ' post-type-post';
			}

			?>"><?php


				if($qucreative_theme_data['template_is_portfolio']){


					$output_array = array();

					preg_match_all("/\[antfarm_portfolio.*?skin=\"(.*?)\".*?cat=\"(.*?)\"/", $post->post_content, $output_array);


					if($qucreative_theme_data['template_is_portfolio_skin']=='skin-silver' || $qucreative_theme_data['template_is_portfolio_skin']=='skin-melbourne' || $qucreative_theme_data['template_is_portfolio_skin']=='skin-melbourne' || $qucreative_theme_data['template_is_portfolio_skin']=='skin-gazelia skin-gazelia--transparent' || $qucreative_theme_data['template_is_portfolio_skin']=='skin-qucreative zfolio-portfolio-expandable'){




						$output_array2 = array();

						preg_match_all("/\[antfarm_portfolio.*?gap=\"(.*?)\"/", $post->post_content, $output_array2);




						echo '<div class="selector-con selector-con-for-skin-melbourne selector-con-for-zfolio-for-portfolio"  style=""><div class="categories" style="margin-top: 0px;">';


						if(isset($output_array[2]) && $output_array[2][0]){

							$arr_cats = explode(',',$output_array[2][0]);



							foreach ($arr_cats as $catid){
								$term = get_term($catid,'antfarm_port_items_cat');




							}


						}

						echo '</div></div>';

						echo '<div class="translucent-layer';


						$qucreative_theme_data['post_content_has_translucent_layer'] = true;

						$translucent_layer_custom_color = false;
						$translucent_layer_custom_opacity = false;




						if( $qucreative_theme_data['theme_mods']['content_enviroment_opacity']=='100'){

							echo ' colorize-layers';

							// -- lets do the rest in qucreative.js / reinit()
						}

						if(get_post_meta($qucreative_theme_data['post_for_meta']->ID,'qucreative_'.'meta_is_fullscreen'.$qucreative_theme_data['page_extra_meta_label'],true)=='on' && get_post_meta($qucreative_theme_data['post_for_meta']->ID,'qucreative_'.'meta_overlay_color',true)){

							$translucent_layer_custom_color = true;

							echo ' custom-color';
						}
						if(get_post_meta($qucreative_theme_data['post_for_meta']->ID,'qucreative_'.'meta_is_fullscreen'.$qucreative_theme_data['page_extra_meta_label'],true)=='on' && get_post_meta($qucreative_theme_data['post_for_meta']->ID,'qucreative_'.'meta_overlay_opacity',true) ){


							$translucent_layer_custom_opacity = true;

							echo ' custom-opacity';
						}





						echo '"';
						echo ' style="';


						if($translucent_layer_custom_opacity && $translucent_layer_custom_color){


							$hex = get_post_meta($qucreative_theme_data['post_for_meta']->ID,'qucreative_'.'meta_overlay_color'.$qucreative_theme_data['page_extra_meta_label'],true);
							list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");


							echo 'background-color: rgba('.$r.','.$g.','.$b.','.floatval(floatval(get_post_meta($qucreative_theme_data['post_for_meta']->ID,'qucreative_'.'meta_overlay_opacity'.$qucreative_theme_data['page_extra_meta_label'],true))/100).');';

						}else{
							if($translucent_layer_custom_color){


								$hex = esc_attr(get_post_meta($qucreative_theme_data['post_for_meta']->ID,'qucreative_'.'meta_overlay_color'.$qucreative_theme_data['page_extra_meta_label'],true));
								list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");


								echo 'background-color: rgba('.$r.','.$g.','.$b.','.floatval(floatval($qucreative_theme_data['theme_mods']['content_enviroment_opacity'])/100).');';
							}else{
								if($translucent_layer_custom_opacity){



									if($qucreative_theme_data['theme_mods']['content_enviroment_style']=='body-style-light'){

										$hex = '#ffffff';
									}else{

										$hex = '#000000';
									}



									list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");


									echo 'background-color: rgba('.$r.','.$g.','.$b.','.floatval(floatval(get_post_meta($qucreative_theme_data['post_for_meta']->ID,'qucreative_'.'meta_overlay_opacity'.$qucreative_theme_data['page_extra_meta_label'],true))/100).');';
								}
							}
						}


						echo '"';




						if($qucreative_theme_data['template_is_portfolio_gap']=='10px'){

							echo ' data-gap="'.$qucreative_theme_data['template_is_portfolio_gap'].'"';
						}



						echo '>';



					}

				}
				if( $qucreative_theme_data['post_for_meta'] && ($qucreative_theme_data['post_for_meta']->post_type=='antfarm_port_items') && get_post_meta( $qucreative_theme_data['post_for_meta']->ID, 'qucreative_'.'meta_is_fullscreen'.$qucreative_theme_data['page_extra_meta_label'], true )=='on'){




					$str_slider = '';

					if($qucreative_theme_data['post_for_meta'] && $qucreative_theme_data['post_for_meta']->post_type == 'antfarm_port_items' && get_post_meta($qucreative_theme_data['post_for_meta']->ID, 'qucreative_'.'meta_post_media_type'.$qucreative_theme_data['page_extra_meta_label'],true)=='slider'){


						// -- fullscreen and slider




						$product_image_gallery = '';




						$lab = 'qucreative_'.'meta_image_gallery'.$qucreative_theme_data['page_extra_meta_label'];
						if (get_post_meta($qucreative_theme_data['post_for_meta']->ID, $lab, true)) {


							$product_image_gallery = esc_html(get_post_meta($qucreative_theme_data['post_for_meta']->ID, $lab, true));


						}
						$lab = 'qucreative_'.'meta_image_gallery_in_meta'.$qucreative_theme_data['page_extra_meta_label'];
						if (get_post_meta($qucreative_theme_data['post_for_meta']->ID, $lab, true)) {


							$product_image_gallery = esc_html(get_post_meta($qucreative_theme_data['post_for_meta']->ID, $lab, true));
						}



						if($product_image_gallery){



							$attachments = array_filter(explode(',', $product_image_gallery));


							wp_enqueue_script('qucreative_lightbox', QUCREATIVE_THEME_URL . 'libs/zoombox/zoombox.js');
							wp_enqueue_style('qucreative_lightbox', QUCREATIVE_THEME_URL . 'libs/zoombox/zoombox.css');

							if ($attachments) {


								$str_slider .= '<div class=" advancedscroller skin-nonav auto-init-from-q" style="margin-bottom: 0;" data-options=\'{
"settings_mode": "onlyoneitem"
,"design_arrowsize": "0"
,"settings_swipe": "on"
,"settings_autoHeight": "off"
,"settings_swipeOnDesktopsToo": "on"
,"settings_slideshow": "off"
,"settings_slideshowTime": "150"
}\'>
                                <ul class="items">';


								$i3 = 0;
								foreach ($attachments as $attachment_id) {

									if ($i3 > 0) {
									}

									$img_full = wp_get_attachment_image_src($attachment_id, 'full');





									$str_slider.='<li class="item-tobe needs-loading">
                                        <div class="imagediv" style="background-image: url('.$img_full[0].')" style=""></div>
                                    </li>';
									$i3++;
								}




								$str_slider.=' </ul>
                            </div>';

							}


						}

						;
					}



					if($wp_query ){
						if(isset($wp_query->query_vars)){
							if(isset($wp_query->query_vars['antfarm_port_items_cat'])){

								$qucreative_theme_data['body_class'].=' page-type-archive';
							}
						}
					}

					if(strpos($qucreative_theme_data['body_class'],'page-type-archive')===false){
						echo '<div class="row ">
                    <div class="col-md-12 advancedscroller-con-placeholder-con"><!-- from here -->
                        <div class="advancedscroller-con-placeholder"></div>
                        <div class="advancedscroller-con as-for-portfolio-single-fullscreen  ';


						if($str_slider){
							echo ' responsive-featured-media-con--target';
						}


						echo'">
			
			'.$str_slider.'



                            <div class="portfolio-single-liquid-title">
                                <h3>'.$qucreative_theme_data['post_for_meta']->post_title.'</h3>

                                <div class="portfolio-single-liquid-info">
                                    <i class="fa fa-info"></i>
                                </div>
                            </div>
                        </div>




                    </div><!-- end .col-md-12 -->

                    <div class="responsive-featured-media-con">

                    </div>

                    <div class="clear"></div>
                    </div>';
					}



					if(strpos($qucreative_theme_data['body_class'],'page-type-archive')===false) {
						echo '
                    <div class="row">
                    <div class="col-md-12">
                        <div class=" desc-content-wrapper from-header">';



						if ($qucreative_theme_data['post_for_meta'] && $qucreative_theme_data['post_for_meta']->post_type == 'antfarm_port_items' && esc_html(get_post_meta($qucreative_theme_data['post_for_meta']->ID, 'qucreative_'.'meta_post_media_type'.$qucreative_theme_data['page_extra_meta_label'].$qucreative_theme_data['page_extra_meta_label'], true)) == 'slider') {
							echo '<div class="arrow-left-for-skin-qucreative bg-color-hg-on-hover"></div>
                            <div class="arrow-right-for-skin-qucreative bg-color-hg-on-hover"></div>';
						}


						echo '<div class="quater-bg"></div><!-- first quater-bg -->
                            <div class="col-md-9" style=";">
                                <h3 style="">' . get_the_title($qucreative_theme_data['post_for_meta']->ID) . '</h3>';


						if ($qucreative_theme_data['post_for_meta'] && get_post_meta($qucreative_theme_data['post_for_meta']->ID, 'qucreative_'.'meta_port_subtitle'.$qucreative_theme_data['page_extra_meta_label'], true)) {
							echo '<div class="portfolio-single-subtitle">' . wp_kses(get_post_meta($qucreative_theme_data['post_for_meta']->ID, 'qucreative_'.'meta_port_subtitle'.$qucreative_theme_data['page_extra_meta_label'], true),array(
									'a' => array(
										'href' => array(),
										'title' => array()
									),
									'br' => array(),
									'em' => array(),
									'strong' => array(),
								)) . '</div>';


						}
					}

				}
				if( $qucreative_theme_data['post_for_meta'] && ($qucreative_theme_data['post_for_meta']->post_type=='antfarm_port_items') && get_post_meta( $qucreative_theme_data['post_for_meta']->ID, 'qucreative_'.'meta_is_fullscreen'.$qucreative_theme_data['page_extra_meta_label'], true )=='on'){

					// -- if is fullscreen



					$str_slider = '';











				}
				if( $qucreative_theme_data['post_for_meta'] && ( get_post_meta( $qucreative_theme_data['post_for_meta']->ID, '_wp_page_template', true )=='template-gallery-creative.php' )){




					$str_slider = '';



					if (get_post_meta($qucreative_theme_data['post_for_meta']->ID, 'qucreative_'.'meta_image_gallery'.$qucreative_theme_data['page_extra_meta_label'], true)) {
						$product_image_gallery = esc_html(get_post_meta($qucreative_theme_data['post_for_meta']->ID, 'qucreative_'.'meta_image_gallery', true));

						$attachments = array_filter(explode(',', $product_image_gallery));



						if ($attachments) {


							$str_slider .= '<div id="as-gallery-w-thumbs" class="advancedscroller skin-karma-inset auto-init-from-q" style="width:100%;"><div class="preloader"></div><ul class="items">';


							$i3 = 0;
							foreach ($attachments as $attachment_id) {

								if ($i3 > 0) {
								}

								$img_full = wp_get_attachment_image_src($attachment_id, 'full');
								$img_thumb = wp_get_attachment_image_src($attachment_id, array(100,100));




								if(get_post_meta($attachment_id, 'qucreative_'.'meta_att_video',true)){

									$str_slider.='<li class="item-tobe " data-source="'.get_post_meta($attachment_id, 'qucreative_'.'meta_att_video',true).'" data-gallery-thumbnail="'.$img_thumb[0].'" data-type="video"  data-width-for-gallery="960" data-height-for-gallery="540">
                            <!-- space for description -->';





									$lab = 'qucreative_'.'meta_att_enable_video_cover';
									$seekval = esc_attr(get_post_meta($attachment_id, $lab,true));


									if($seekval=='on'){

										$str_slider.='<div class="cover-image" style="background-image: url('.$img_full[0].'); ">
<svg class="cover-play-btn" version="1.1" baseProfile="tiny" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
     x="0px" y="0px" width="120px" height="120px" viewBox="0 0 120 120" overflow="auto" xml:space="preserve">
<path fill-rule="evenodd" fill="#ffffff" d="M79.295,56.914c2.45,1.705,2.45,4.468,0,6.172l-24.58,17.103
    c-2.45,1.704-4.436,0.667-4.436-2.317V42.129c0-2.984,1.986-4.022,4.436-2.318L79.295,56.914z M0.199,54.604
    c-0.265,2.971-0.265,7.821,0,10.792c2.57,28.854,25.551,51.835,54.405,54.405c2.971,0.265,7.821,0.265,10.792,0
    c28.854-2.57,51.835-25.551,54.405-54.405c0.265-2.971,0.265-7.821,0-10.792C117.231,25.75,94.25,2.769,65.396,0.198
    c-2.971-0.265-7.821-0.265-10.792,0C25.75,2.769,2.769,25.75,0.199,54.604z M8.816,65.394c-0.309-2.967-0.309-7.82,0-10.787
    c2.512-24.115,21.675-43.279,45.79-45.791c2.967-0.309,7.821-0.309,10.788,0c24.115,2.512,43.278,21.675,45.79,45.79
    c0.309,2.967,0.309,7.821,0,10.788c-2.512,24.115-21.675,43.279-45.79,45.791c-2.967,0.309-7.821,0.309-10.788,0
    C30.491,108.672,11.328,89.508,8.816,65.394z"/>
</svg>
                            </div>';
									}



									$po = get_post($attachment_id);

									if($po->post_content || $po->post_excerpt){
										$str_slider.='<div class="description-wrapper">
                                <div class="feed-description">
                                    <h4>'.$po->post_excerpt.'</h4>
                                    <p>'.$po->post_content.'</p>
                                </div>
                            </div>';
									}



									$str_slider.='</li>';



									wp_enqueue_style('antfarm-video-player', QUCREATIVE_THEME_URL . 'libs/videogallery/vplayer.css');
									wp_enqueue_script('antfarm-video-player', QUCREATIVE_THEME_URL . 'libs/videogallery/vplayer.js', array('jquery'));
								}else{



									$str_slider.='<li class="item-tobe " data-divimage_source="'.$img_full[0].'" data-gallery-thumbnail="'.$img_thumb[0].'" data-type="image">                            <!-- space for description -->';

									$po = get_post($attachment_id);

									if($po->post_content || $po->post_excerpt){
										$str_slider.='<div class="description-wrapper">
                                <div class="feed-description">
                                    <h4>'.$po->post_excerpt.'</h4>
                                    <p>'.$po->post_content.'</p>
                                </div>
                            </div>';
									}



									$str_slider.='</li>';
								}




								$i3++;
							}




							$str_slider.=' </ul>
</div>';

						}


					}

					echo $str_slider;








				}



				if($sidebar){
				?>
				<div class="row row-with-sidebar">
					<!-- content comes next -->
					<div class="col-sm-8 col-content ">
						<?php
						}
						?>
<?php
}

