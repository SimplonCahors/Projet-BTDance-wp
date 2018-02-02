<?php
/**
 * qucreative functions and definitions
 *
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 */


define('QUCREATIVE_THEME_URL', get_parent_theme_file_uri() . '/');
define('QUCREATIVE_THEME_DIR', get_parent_theme_file_path() . '/');
define('QUCREATIVE_VERSION', '1.00');


// -- translation stuff
load_plugin_textdomain('qucreative', false, basename(QUCREATIVE_THEME_DIR) . '/languages');



// -- actions here



add_action('wp_ajax_qucreative_save_att_meta','qucreative_ajax_save_att_meta');
add_action('wp_ajax_qucreative_select_preset','qucreative_ajax_select_preset');
add_action('wp_ajax_qucreative_remove_preset','qucreative_ajax_remove_preset');
add_action('wp_ajax_qucreative_save_preset','qucreative_ajax_save_preset');
add_action('wp_ajax_qucreative_import_demo','qucreative_ajax_import_demo');


add_action('add_meta_boxes','qucreative_handle_add_meta_boxes');
add_action('init','qucreative_handle_init',31);
add_action('wp_head','qucreative_handle_wp_head');
add_action('admin_head','qucreative_handle_admin_head');
add_action('admin_menu','qucreative_handle_admin_menu');
add_action('wp_footer','qucreative_handle_wp_footer');
add_action('wp_footer','qucreative_handle_wp_footer_bottom',30);
add_action('save_post','qucreative_handle_admin_meta_save');
add_action( 'vc_before_init', 'qucreative_vc_before_init' );
add_action( 'get_header', 'qucreative_handle_loop_start' );


// -- END qucreative_setup
add_action( 'after_setup_theme', 'qucreative_setup' );
add_action('init', 'qucreative_init');
add_action( 'tgmpa_register', 'qucreative_register_required_plugins' );

add_action( 'widgets_init', 'qucreative_widgets_areas_init',1 );
add_action('qucreative_single_before_the_content','qucreative_action_single_before_the_content');
add_action('qucreative_single_after_the_content','qucreative_action_single_after_the_content');

add_filter('qucreative_get_only_url_of_author_link','qucreative_filter_get_only_url_of_author_link',2);
add_filter( 'body_class', 'qucreative_filter_body_classes', 10, 3 );
add_filter('the_content', 'qucreative_filter_the_content_before',2);

add_filter('excerpt_more', 'qucreative_filter_excerpt_more', 30);
add_filter('the_content_more_link', 'qucreative_filter_content_more_link', 10, 2);




function qucreative_helpers_generate_input_checkbox($argname, $argopts) {
	$fout = '';
	$auxtype = 'checkbox';

	if (isset($argopts['type'])) {
		if ($argopts['type'] == 'radio') {
			$auxtype = 'radio';
		}
	}
	$fout.='<input type="' . $auxtype . '"';
	$fout.=' name="' . $argname . '"';
	if (isset($argopts['class'])) {
		$fout.=' class="' . $argopts['class'] . '"';
	}

	if (isset($argopts['id'])) {
		$fout.=' id="' . $argopts['id'] . '"';
	}
	$theval = 'on';
	if (isset($argopts['val'])) {
		$fout.=' value="' . $argopts['val'] . '"';
		$theval = $argopts['val'];
	} else {
		$fout.=' value="on"';
	}

	if (isset($argopts['seekval'])) {
		$auxsw = false;
		if (is_array($argopts['seekval'])) {

			foreach ($argopts['seekval'] as $opt) {

				if ($opt == $argopts['val']) {
					$auxsw = true;
				}
			}
		} else {

			if ($argopts['seekval'] == $theval) {

				$auxsw = true;
			}
		}
		if ($auxsw == true) {
			$fout.=' checked="checked"';
		}
	}
	$fout.='/>';
	return $fout;
}



function qucreative_helpers_generate_input_text($argname, $otherargs = array()) {
	$fout = '';

	$margs = array(
		'class' => '',
		'val' => '', // -- default value
		'seekval' => '', // --the value to be seeked
		'type' => '',
		'extraattr'=>'',
		'slider_min'=>'10',
		'slider_max'=>'80',
		'input_type'=>'text',
	);
	$margs = array_merge($margs, $otherargs);

	$fout.='<input type="'.$margs['input_type'].'"';
	$fout.=' name="' . $argname . '"';


	if ($margs['type'] == 'colorpicker') {
		$margs['class'].=' with_colorpicker';
	}

	$val = '';


	if ($margs['class'] != '') {
		$fout.=' class="' . $margs['class'] . '"';
	}
	if (isset($margs['seekval']) && $margs['seekval'] != '') {

		$fout.=' value="' . $margs['seekval'] . '"';
		$val = $margs['seekval'];
	} else {
		$fout.=' value="' . $margs['val'] . '"';
		$val = $margs['val'];
	}

	if ($margs['type'] == 'slider') {
		$fout.=' ';
	}

	if ($margs['extraattr'] != '') {
		$fout.='' . $margs['extraattr'] . '';
	}

	$fout.='/>';






	return $fout;
}







function qucreative_helpers_generate_select($argname, $pargopts) {


	$fout = '';
	$auxtype = 'select';

	if($pargopts==false){
		$pargopts = array();
	}

	$margs = array(
		'options' => array(),
		'class' => '',
		'seekval' => '',
		'extraattr'=>'',
	);

	$margs = array_merge($margs, $pargopts);

	$fout.='<select';
	$fout.=' name="' . $argname . '"';
	if (isset($margs['class'])) {
		$fout.=' class="'.$margs['class'].'"';
	}
	if ($margs['extraattr'] != '') {
		$fout.='' . $margs['extraattr'] . '';
	}

	$fout.='>';



	if(is_array($margs['options'])){
		foreach ($margs['options'] as $opt) {
			$val = '';
			$lab = '';

			if(is_object($opt)){
				$opt = (array) $opt;
			}


			if (is_array($opt) && isset($opt['lab']) && isset($opt['val'])) {
				$val = $opt['val'];
				$lab = $opt['lab'];
			} else {
				if (is_array($opt) && isset($opt['label']) && isset($opt['value'])) {

					$val = $opt['value'];
					$lab = $opt['label'];
				}else{


					$val = $opt;
					$lab = $opt;
				}

			}




			$fout.='<option value="' . $val . '"';
			if ($margs['seekval'] != '' && $margs['seekval'] == $val) {
				$fout.=' selected';
			}

			$fout.='>' . $lab . '</option>';
		}

	}



	$fout.='</select>';
	return $fout;
}


if (!function_exists('qucreative_pagination')) {

	function qucreative_pagination($pages = '', $range = 2, $pargs = array()) {
		global $paged;



		$margs = array(

			'container_class'=>'qucreative-pagination ',
			'include_raquo'=>true,
			'style'=>'div',
			'a_class'=>'pagination-link',
		);


		if($pargs){
			$margs = array_merge($margs,$pargs);
		}




		$fout = '';
		$showitems = ($range * 2) + 1;

		if (empty($paged))
			$paged = 1;

		if ($pages == '') {
			global $wp_query;
			$pages = $wp_query->max_num_pages;
			if (!$pages) {
				$pages = 1;
			}
		}

		if (1 != $pages) {

			if($margs['style']=='div'){

				$fout.= "<div class='".$margs['container_class']."'>";
			}
			if($margs['style']=='ul'){

				$fout.= "<ul class='".$margs['container_class']."'>";
			}

			if($margs['include_raquo']){

				if ($paged > 2 && $paged > $range + 1 && $showitems < $pages) {
					$fout .= "<a class='raquo-1' href='" . get_pagenum_link( 1 ) . "'>&laquo;</a>";
				}
				if ($paged > 1 && $showitems < $pages) {
					$fout .= "<a class='raquo-2' href='" . get_pagenum_link( $paged - 1 ) . "'>&lsaquo;</a>";
				}
			}

			for ($i = 1; $i <= $pages; $i++) {
				if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems )) {


					if($paged==$i){

						if($margs['style']=='div') {
							$fout .= '<span class="current">' . $i . '</span>';
						}
						if($margs['style']=='ul') {
							$fout .= '<li class="active"><a class="'.$margs['a_class'].' " href="#">'.$i.'</a></li>';
						}
					}else{

						if($margs['style']=='div') {
							$fout.="<a href='" . get_pagenum_link($i) . "' class='inactive' >" . $i . "</a>";
						}
						if($margs['style']=='ul') {

							$fout.='<li><a class="'.$margs['a_class'].'" href="'. get_pagenum_link($i) .'">'.$i.'</a></li>';
						}
					}
				}
			}

			if($margs['include_raquo']) {
				if ($paged < $pages && $showitems < $pages) $fout .= "<a class='raquo-1' href='" . get_pagenum_link($paged + 1) . "'>&rsaquo;</a>";
				if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages) $fout .= "<a class='raquo-2' href='" . get_pagenum_link($pages) . "'>&raquo;</a>";
			}



			if($margs['style']=='div') {
				$fout .= '<div class="clearfix"></div>';
				$fout .= "</div>";
			}
			if($margs['style']=='ul') {
				$fout .= '</ul>';
			}
		}
		return $fout;
	}

}

if(!function_exists('qucreative_sanitize_id_to_src')){

	function qucreative_sanitize_id_to_src($arg){


		if(is_numeric($arg)){

			$imgsrc = wp_get_attachment_image_src($arg, 'full');

			return $imgsrc[0];
		}else{
			return $arg;
		}


	}

}








if (!function_exists('qucreative_clean')) {

	function qucreative_clean($var) {
		if (!function_exists('sanitize_text_field')) {
			return $var;
		} else {
			return sanitize_text_field($var);
		}
	}

}




if(function_exists('qucreative_get_theme_mod_and_sanitize')==false){

	function qucreative_get_theme_mod_and_sanitize($arglab){


		$arg = get_theme_mod($arglab);



		$arg = esc_html($arg);

		if($arglab=='social_icons'){
			$arg = str_replace('&quot;','"',$arg);
		}
		if($arglab=='font_data'){

			$arg = str_replace('&amp;','&',$arg);
		}

		return $arg;

	}
}





define("QUCREATIVE_DEFAULT_TYPOGRAPHY",'headings_font=Lato&h1_weight=700&h1_size=70&h1_line_height=1.15&h1_responsive_slider=30&h2_weight=700&h2_size=50&h2_line_height=1.15&h2_responsive_slider=20&h3_weight=700&h3_size=40&h3_line_height=1.15&h3_responsive_slider=10&h4_weight=700&h4_size=30&h4_line_height=1.15&h4_responsive_slider=0&h5_weight=700&h5_size=20&h5_line_height=1.15&h5_responsive_slider=0&h6_weight=700&h6_size=14&h6_line_height=1.57&h6_responsive_slider=0&h-group-1_weight=700&h-group-1_size=11&h-group-1_line_height=1.54&h-group-1_responsive_slider=0&h-group-2_weight=700&h-group-2_size=25&h-group-2_line_height=1.28&h-group-2_responsive_slider=0&body_font=Open+Sans&p_weight=regular&p_size=13&p_line_height=1.92&p_color=%236b6b6b&p_color_for_light=%23cccccc&hyperlink_weight=600&font-group-1_weight=600italic&font-group-1_size=14&font-group-1_line_height=1.42&font-group-2_weight=600&font-group-2_size=14&font-group-2_line_height=1.42&font-group-3_weight=600italic&font-group-3_size=11&font-group-3_line_height=1.27&font-group-4_weight=italic&font-group-4_size=14&font-group-4_line_height=1.42&font-group-5_weight=600&font-group-5_size=14&font-group-5_line_height=1.42&font-group-6_weight=regular&font-group-6_size=13&font-group-6_line_height=1.55&font-group-7_weight=italic&font-group-7_size=13&font-group-7_line_height=1.46&font-group-8_weight=regular&font-group-8_size=14&font-group-8_line_height=1.65&font-group-9_weight=600&font-group-9_size=15&font-group-9_line_height=1.7&font-group-10_weight=600&font-group-10_size=16&font-group-10_line_height=1.68&font-group-11_weight=800&font-group-11_size=24&font-group-11_line_height=1.29&font-group-12_weight=600&font-group-12_size=13&font-group-12_line_height=1.46&blockquote_weight=italic&blockquote_size=17&blockquote_line_height=1.58&menu_font=Lato&menu_weight=regular&menu_size=18&menu_line_height=1.2&copyright_font_link_to=headings&copyright_weight=700&copyright_size=10&copyright_line_height=1.4&page_title_font=Lato&page_title_weight=900&page_title_size=70&page_title_line_height=1&page_title_color=&page_title_responsive_slider=30&page_title_orientation=horizontal&section_title_two_font=Lato&section_title_two_first_weight=700&section_title_two_first_size=24&section_title_two_first_line_height=1.1&section_title_two_first_color=%23222222&section_title_two_first_color_for_light=%23ffffff&section_title_two_first_responsive_slider=10&section_title_two_second_font=Playfair+Display&section_title_two_second_weight=900italic&section_title_two_second_size=60&section_title_two_second_line_height=1.1&section_title_two_second_color=%23222222&section_title_two_second_color_for_light=%23ffffff&section_title_two_second_responsive_slider=30&line_spacing=3&section_title_two_number_font=Lato&section_title_two_number_weight=700italic&section_title_two_number_size=24&section_title_two_number_line_height=1.1&section_title_two_number_color=%23222222&section_title_two_number_color_for_light=%23ffffff&section_title_two_divider_divider_style=style-box&section_title_two_divider_color=%23444444&section_title_two_divider_color_for_light=%23ffffff&title_divider_spacing_two=20&section_title_one_first_font=Lato&section_title_one_first_weight=700&section_title_one_first_size=20&section_title_one_first_line_height=1.28&section_title_one_first_color=%23222222&section_title_one_first_color_for_light=%23ffffff&section_title_one_first_responsive_slider=0&section_title_one_divider_enable=on&section_title_one_divider_divider_style=style-box&section_title_one_divider_color=%23222222&section_title_one_divider_color_for_light=%23ffffff&title_divider_spacing=15&home_slider_font_link_to=headings&home_slider_weight=900&home_slider_size=50&home_slider_line_height=1.20&home_slider_color=%23ffffff&home_slider_color_for_light=%23222222&home_number_font_link_to=headings&home_number_weight=900&home_number_size=135&home_number_line_height=1');


$qucreative_theme_data = array(

	'font_data'=>array(),
	'font_vals'=>array(),
	'font_data_items'=>array(),
	'font_used'=>array(),
	'header_social_icons'=>array(),
	'social_icons'=>array(),
	'preview_cookies'=>array(),
	'arr_presets'=>array(),

	'footer_extra_zoombox_items'=>'',
	'font_data_str'=>'',
	'page_type'=>'',
	'footer_big_map_str'=>'',
	'menu_type'=>'',
	'menu_type_attr'=>'',
	'body_class'=>'',
	'footer_extra_css'=>'',
	'admin_head_extra'=>'',
	'css_data_overlay_opacity'=>'',
	'css_data_typography'=>'',
	'css_data_highlight'=>'',
	'css_data_contain'=>'',
	'replace_string_in_content_with_nada'=>'',
	'js_data_for_inline_options'=>'',
	'page_extra_meta_label'=>'',
	'import_demo_last_attach_id'=>'',
	'import_demo_last_attach_id_500_100'=>'',
	'import_demo_last_attach_id_100_400'=>'',
	'title_label'=>'QuCreative',
	'post_content_has_translucent_layer'=>false,
	'has_footer'=>false,
	'sw_is_in_customizer'=>false,
	'is_preview'=>false,
	'is_preview_blog'=>false,
	'content_acts_as_sheet'=>false,
	'preview_page'=>false,
	'content_link_to_menu_opacity'=>false,
	'post_for_meta'=>null,
	'secondary_content_height'=>300,
	'customizer_fields'=>array(
		array(
			'name'=>'portfolio_page',
			'default'=>'',
		),
		array(
			'name'=>'mail_method',
			'default'=>'wp_mail',
		),
		array(
			'name'=>'blur_ammount',
			'default'=>'26',
		),
		array(
			'name'=>'menu_enviroment_opacity',
			'default'=>'30',
		),
		array(
			'name'=>'content_enviroment_opacity',
			'default'=>'30',
		),
		array(
			'name'=>'secondary_content_height',
			'default'=>'300',
		),
		array(
			'name'=>'gmaps_api_key',
			'default'=>'',
		),
		array(
			'name'=>'soundcloud_apikey',
			'default'=>'',
		),
		array(
			'name'=>'gmaps_styling',
			'default'=>'',
		),
		array(
			'name'=>'content_align',
			'default'=>'content-align-center',
		),
		array(
			'name'=>'page_title_align',
			'default'=>'page-title-align-right',
		),
		array(
			'name'=>'page_title_style',
			'default'=>'page-title-style-2',
		),
		array(
			'name'=>'width_column',
			'default'=>'56',
		),
		array(
			'name'=>'width_gap',
			'default'=>'30',
		),
		array(
			'name'=>'width_blur_margin',
			'default'=>'30',
		),
		array(
			'name'=>'width_section_bg',
			'default'=>'',
		),
		array(
			'name'=>'content_add_extra_pixels',
			'default'=>'',
		),
		array(
			'name'=>'border_width',
			'default'=>'0',
		),
		array(
			'name'=>'border_color',
			'default'=>'#ffffff',
		),
		array(
			'name'=>'content_section_title_two_lines_space',
			'default'=>'0',
		),
		array(
			'name'=>'content_section_title_two_lines_use_divider',
			'default'=>'',
		),
		array(
			'name'=>'content_section_title_two_lines_use_divider_color',
			'default'=>'',
		),
		array(
			'name'=>'menu_type',
			'default'=>'menu-type-1',
		),
		array(
			'name'=>'menu_is_sticky',
			'default'=>'off',
		),
		array(
			'name'=>'menu_horizontal_shadow_style',
			'default'=>'none',
		),
		array(
			'name'=>'social_icons',
			'default'=>'',
		),
		array(
			'name'=>'meta_options_post_types',
			'default'=>false,
		),
		array(
			'name'=>'logo',
			'default'=>QUCREATIVE_THEME_URL.'img/qlogo.png',
		),
		array(
			'name'=>'logo_x',
			'default'=>'default',
		),
		array(
			'name'=>'logo_x_custom',
			'default'=>'',
		),
		array(
			'name'=>'logo_y',
			'default'=>'default',
		),
		array(
			'name'=>'logo_width',
			'default'=>'',
		),
		array(
			'name'=>'logo_height',
			'default'=>'',
		),
		array(
			'name'=>'logo_y_custom',
			'default'=>'',
		),
		array(
			'name'=>'copyright_textbox',
			'default'=>esc_html__("Default copyright text",'qucreative'),
		),
		array(
			'name'=>'copyright_textbox_heading_style',
			'default'=>'h-group-1',
		),
		array(
			'name'=>'footer_copyright_textbox_heading_style',
			'default'=>'h-group-1',
		),
		array(
			'name'=>'font_data',
			'default'=>QUCREATIVE_DEFAULT_TYPOGRAPHY,
		),
		array(
			'name'=>'typography_sidebar_heading_style',
			'default'=>'h6',
			'transport'=>'postMessage',
		),
		array(
			'name'=>'typography_footer_heading_style',
			'default'=>'h6',
			'transport'=>'postMessage',
		),
		array(
			'name'=>'content_enviroment_style',
			'default'=>'body-style-dark',
		),
		array(
			'name'=>'greyscale_ammount',
			'default'=>'0',
		),
		array(
			'name'=>'section_margin_bottom',
			'default'=>'30',
		),
		array(
			'name'=>'highlight_color',

			'default'=>'#97c1cf',
		),
		array(
			'name'=>'enable_bordered_design',
			'default'=>'on',
		),
		array(
			'name'=>'enable_native_scrollbar',
			'default'=>'off',
		),
		array(
			'name'=>'bg_transition',
			'default'=>'slidedown',
		),
		array(
			'name'=>'bg_slideshow_time',
			'default'=>'10',
		),
		array(
			'name'=>'enable_ajax',
			'default'=>'off',
		),
		array(
			'name'=>'bg_isparallax',
			'default'=>'off',
		),
		array(
			'name'=>'content_link_to_menu_opacity',
			'default'=>'off',
		),
		array(
			'name'=>'social_enable_gplus_share',
			'default'=>false,
		),
		array(
			'name'=>'social_enable_pinterest_share',
			'default'=>false,
		),
	),
	'default_typography'=>QUCREATIVE_DEFAULT_TYPOGRAPHY,
	'theme_mods'=>get_theme_mods(),
);


$qucreative_theme_data['allowed_html_tags'] = array(
	'a' => array(
		'href' => array(),
		'title' => array()
	),
	'br' => array(),
	'span' => array(),
	'em' => array(),
	'strong' => array(),
);














foreach($qucreative_theme_data['theme_mods'] as $lab => $tm_val){

	if(is_string($tm_val)){
		$qucreative_theme_data['theme_mods'][$lab] = esc_html($tm_val);
	}else{

	}

}

if(isset($qucreative_theme_data['theme_mods']['enable_ajax'])==false){

	$uns =  array();
	foreach ($qucreative_theme_data['customizer_fields']  as  $cf){

		$uns[$cf['name']] = $cf['default'];


	}
	$qucreative_theme_data['theme_mods'] = array_merge($uns, $qucreative_theme_data['theme_mods']) ;


	update_option('theme_mods_qucreative',$uns);




}







$blogid = get_current_blog_id();


if(defined("QUCREATIVE_PREVIEW")&&QUCREATIVE_PREVIEW=="ON"){
	$qucreative_theme_data['is_preview_blog'] = true;
}

if($blogid!='1'){
	$qucreative_theme_data['is_preview_blog']  = false;
}


$arr_labs = array(
	'highlight_color',
	'menu_type',
);

$qucreative_theme_data['menu_type']  = qucreative_get_theme_mod_and_sanitize('menu_type');


foreach ($qucreative_theme_data['customizer_fields']   as  $cf){

	$val = qucreative_get_theme_mod_and_sanitize($cf['name']);

	$qucreative_theme_data['theme_mods'][$cf['name']] = $val;



	if($val==''){

		$qucreative_theme_data['theme_mods'][$cf['name']] = $cf['default'];
	}
}


$qucreative_theme_data['theme_mods']['highlight_color'] = qucreative_get_theme_mod_and_sanitize('highlight_color');


try{
	$qucreative_theme_data['header_social_icons'] = qucreative_get_theme_mod_and_sanitize('social_icons');
	$qucreative_theme_data['theme_mods']['social_icons'] = qucreative_get_theme_mod_and_sanitize('social_icons');
	if($qucreative_theme_data['theme_mods']['social_icons']){


		if(is_array($qucreative_theme_data['theme_mods']['social_icons'])){

			$qucreative_theme_data['header_social_icons']  = $qucreative_theme_data['theme_mods']['social_icons'];
			$qucreative_theme_data['theme_mods']['social_icons'] = json_encode($qucreative_theme_data['theme_mods']['social_icons']);
		}else{
			if(is_array(json_decode($qucreative_theme_data['theme_mods']['social_icons']))){


				$qucreative_header_social_icons = json_decode($qucreative_theme_data['theme_mods']['social_icons']);
				$qucreative_theme_data['header_social_icons'] = json_decode($qucreative_theme_data['theme_mods']['social_icons']);

			}
		}
	}



}catch(Exception $e) {
	error_log('cannot decode json - '.print_rr($e, array('echo' => false)));
}


$qucreative_theme_data['arr_presets']  =  array(
	'default_q' => array(
		'id'=>'default_q',
		'default'=>true,
		'name'=>esc_html__("Default",'qucreative').' Qu',
		'data'=>'a:51:{s:14:"portfolio_page";s:3:"330";s:11:"mail_method";s:7:"wp_mail";s:12:"blur_ammount";s:2:"30";s:23:"menu_enviroment_opacity";s:2:"30";s:26:"content_enviroment_opacity";s:2:"37";s:24:"secondary_content_height";s:3:"370";s:13:"gmaps_api_key";s:39:"AIzaSyAckyD3QGvcqBv07cmFAcFraXXwuWZMyxo";s:17:"soundcloud_apikey";s:32:"be48604d903aebd628b5bac968ffd14d";s:13:"gmaps_styling";s:0:"";s:13:"content_align";s:20:"content-align-center";s:16:"page_title_align";s:22:"page-title-align-right";s:16:"page_title_style";s:18:"page-title-style-2";s:12:"width_column";s:2:"50";s:9:"width_gap";s:2:"30";s:17:"width_blur_margin";s:2:"30";s:16:"width_section_bg";s:0:"";s:24:"content_add_extra_pixels";s:0:"";s:12:"border_width";s:1:"0";s:12:"border_color";s:7:"#ffffff";s:37:"content_section_title_two_lines_space";s:1:"0";s:43:"content_section_title_two_lines_use_divider";s:0:"";s:49:"content_section_title_two_lines_use_divider_color";s:0:"";s:9:"menu_type";s:11:"menu-type-1";s:14:"menu_is_sticky";s:3:"off";s:28:"menu_horizontal_shadow_style";s:4:"none";s:12:"social_icons";s:162:"[{"link":"#","icon":"facebook-square"},{"link":"#","icon":"behance"},{"link":"#","icon":"pinterest"},{"link":"#","icon":"twitter"},{"link":"#","icon":"linkedin"}]";s:23:"meta_options_post_types";b:0;s:4:"logo";s:71:"http://creativewpthemes.net/main-demo/wp-content/themes/q/img/qlogo.png";s:6:"logo_x";s:7:"default";s:13:"logo_x_custom";s:0:"";s:6:"logo_y";s:7:"default";s:10:"logo_width";s:0:"";s:11:"logo_height";s:0:"";s:13:"logo_y_custom";s:0:"";s:17:"copyright_textbox";s:14:"ANTFARM THEMES";s:31:"copyright_textbox_heading_style";s:9:"h-group-1";s:38:"footer_copyright_textbox_heading_style";s:9:"h-group-1";s:9:"font_data";s:'.strlen(QUCREATIVE_DEFAULT_TYPOGRAPHY).':"'.QUCREATIVE_DEFAULT_TYPOGRAPHY.'";s:32:"typography_sidebar_heading_style";s:2:"h6";s:31:"typography_footer_heading_style";s:2:"h6";s:24:"content_enviroment_style";s:15:"body-style-dark";s:17:"greyscale_ammount";s:1:"0";s:21:"section_margin_bottom";s:2:"30";s:15:"highlight_color";s:7:"#97c1cf";s:22:"enable_bordered_design";s:2:"on";s:23:"enable_native_scrollbar";s:3:"off";s:13:"bg_transition";s:8:"wipedown";s:11:"enable_ajax";s:2:"on";s:13:"bg_isparallax";s:2:"on";s:18:"custom_css_post_id";i:-1;s:18:"nav_menu_locations";a:2:{s:7:"primary";i:39;s:6:"social";i:0;}}',
	),
);

$aux_presets = get_option('qucreative_presets');

if(is_array($aux_presets)){

	$qucreative_theme_data['arr_presets']  = array_merge($qucreative_theme_data['arr_presets'],  $aux_presets);
}else{
	if($aux_presets==''){

		$qucreative_theme_data['arr_presets']  = array_merge(array(), $qucreative_theme_data['arr_presets']) ;
		update_option('qucreative_presets',$qucreative_theme_data['arr_presets']) ;
	}
}






function qucreative_filter_content_more_link($more_link, $more_link_text) {
	global $post;
	return '<p class="read-more-p"><a class="read-more-a custom-a color-highlight color-border-bottom-on-hover" href="'.get_permalink($post->ID).'#more-'.$post->ID.'">'.esc_html__("Continue reading",'qucreative') .' <span class="meta-nav">&rarr;</span></a></p>';


}

function qucreative_filter_excerpt_more($more){
	global $post;


	return '<p class="read-more-p"><a class="read-more-a custom-a color-highlight color-border-bottom-on-hover" href="'.get_permalink($post->ID).'">'.esc_html__("Continue reading",'qucreative') .' <span class="meta-nav">&rarr;</span></a></p>';
}









$qucreative_theme_data['page_extra_meta_label']  = '';



function qucreative_get_preview_cookie(&$arg, $lab){

	global $qucreative_theme_data;


	if(isset($_GET['customize_changeset_uuid'])==false){



		if(isset($_GET[$lab]) && $_GET[$lab]!==''){
			$qucreative_theme_data['preview_cookies'][$lab] = $_GET[$lab];
			setcookie($lab,$_GET[$lab],time() + 3600, COOKIEPATH, COOKIE_DOMAIN);
		}else{

			if(isset($_COOKIE[$lab]) && $_COOKIE[$lab]){

				$qucreative_theme_data['preview_cookies'][$lab] = $_COOKIE[$lab];
			}
		}

		if(isset($qucreative_theme_data['preview_cookies'][$lab]) && $qucreative_theme_data['preview_cookies'][$lab]!==''){
			$arg = $qucreative_theme_data['preview_cookies'][$lab];

			if($lab=='content_enviroment_style'){


				if($arg=='linked'){
					if($qucreative_theme_data['menu_type']=='menu-type-2' || $qucreative_theme_data['menu_type']=='menu-type-4' || $qucreative_theme_data['menu_type']=='menu-type-6' || $qucreative_theme_data['menu_type']=='menu-type-8' || $qucreative_theme_data['menu_type']=='menu-type-10' || $qucreative_theme_data['menu_type']=='menu-type-12' || $qucreative_theme_data['menu_type']=='menu-type-14' || $qucreative_theme_data['menu_type']=='menu-type-16' || $qucreative_theme_data['menu_type']=='menu-type-18'){

						$arg = 'body-style-light';

					}else{
						$arg = 'body-style-dark';
					}
				}

			}
		}
	}else{



		$qucreative_theme_data['sw_is_in_customizer']  = true;
	}
}

function qucreative_import_demo_save_image($arg, $upload_dir_path){


	$file = $arg;
	$url="https://zoomthe.me/qimages/".$file;


	$save_path=$upload_dir_path.'/'.$file;


}

function qucreative_import_demo_update_widget($option_name,$option_value) {

	global $wpdb;




	if($option_name=='sidebar_widgets'){


		$table_name = $wpdb->prefix . 'options';







		$wpdb->query( $wpdb->prepare( "UPDATE $table_name SET option_value = '%s' WHERE option_name = '%s'",$option_value,$option_name) );


		return true;

	}else{

		update_option( $option_name, unserialize($option_value));

		return true;
	}

}





function qucreative_import_demo_generate_zfolio_item($pargs = array()) {



	global $antfarm;



	$margs = array(

		'tax_slug' => '',
		'post_slug' => '',
		'page_slug' => '',
		'demo_name' => '',
		'demo_slug' => '',
		'img_url' => '',

	);

	$margs = array_merge($margs, $pargs);

	?><div class="zfolio-item <?php

	$taxonomy = 'antfarm_port_items_cat';





	if($antfarm){

		$taxonomy=$antfarm->name_port_item_cat;
	}


	if($margs['tax_slug']){

		$term = get_term_by('slug', $margs['tax_slug'], $taxonomy);

		if($term){
			echo ' already-installed';
		}
	}

	$link = '';


	$demo_slug = '';
	if($margs['page_slug']){
		$link = $margs['page_slug'];
		$demo_slug = $margs['page_slug'];
	}

	if($margs['tax_slug']){
		$link = $margs['tax_slug'];
		$demo_slug = $margs['tax_slug'];
	}
	if($margs['demo_slug']){

		$demo_slug = $margs['demo_slug'];
	}



	if(isset($margs['link'])){
		$link = $margs['link'];
	}


	if($margs['page_slug']){

		$the_slug = $margs['page_slug'];
		$args = array(
			'name'        => $the_slug,
			'post_type'   => 'page',
			'post_status' => 'publish',
			'numberposts' => 1
		);
		$my_posts = get_posts($args);

		if( $my_posts ){

			echo ' already-installed';
		}else{
		}
	}


	$img_url = $demo_slug.'';
	if($margs['img_url']) {
		$img_url = $margs['img_url'];
	}
	?> " data-thumbnail="">
    <div href="#" class="zfolio-item--inner custom-a  donotchange-ajax-menu"   data-type="image">
        <div class="zfolio-item--inner--inner">
            <div class="zfolio-item--inner--inner--inner">
                <div class="the-thumb" style="background-image:url(<?php echo QUCREATIVE_THEME_URL.'placeholders/importdemo/'.$img_url.'.jpg'; ?>); ">

                </div>
                <div class="item-meta">
                    <div class="the-title  h5 ">QU <?php echo $margs['demo_name']; ?></div>
                    <div class="the-desc  font-group-1"><a href="http://creativewpthemes.net/main-demo-dev/<?php echo $link; ?>" target="_blank" class="preview-btn">preview</a> / <a href="#" class="install-btn " data-demo="<?php echo $demo_slug; ?>">install</a></div>
                </div>
                <!--end item-meta-->
            </div>
        </div>
    </div>

    <fig class="loading-overlay" >
        <i class="fa fa-circle-o-notch fa-spin loading-icon" aria-hidden="true"></i>
    </fig>
    <!--end zfolio-item--inner-->
    <div class="the-overlay-anchor">
    </div>


    </div><?php
}





function qucreative_import_demo_create_term_if_it_does_not_exist($pargs = array()) {


	$margs = array(

		'term_name' => '',
		'slug' => '',
		'taxonomy' => '',
		'description' => '',
		'parent' => '',
	);

	$margs = array_merge($margs, $pargs);

	$term = get_term_by('slug', $margs['slug'], $margs['taxonomy']);


	if ($term) {

	} else {


		$args = array(
			'description' => $margs['description'],
			'slug' => $margs['slug'],


		);

		if ($margs['parent']) {
			$args['parent'] = $margs['parent'];
		}

		$term = wp_insert_term($margs['term_name'], $margs['taxonomy'], $args);

	}
	return $term;

}


function qucreative_import_demo_update_preset($ser_data, $pargs = array()) {


	global $qucreative_theme_data;






	$margs = array(

		'preseter_slug' => '',
		'preseter_name' => '',
	);

	$margs = array_merge($margs, $pargs);




	$preseter_opts = unserialize($ser_data);




	$arr = array(
		$margs['preseter_slug']=>array(
			'name'=>$margs['preseter_name'],
			'default'=>1,
			'data'=>$ser_data,
		)
	);
	$qucreative_theme_data['arr_presets'] = array_merge($qucreative_theme_data['arr_presets'], $arr);




	update_option('qucreative_presets',$qucreative_theme_data['arr_presets']);


	$arr = array(
		'presets'=>$margs['preseter_slug'],
	);

	$qucreative_theme_data['theme_mods'] = array_merge($qucreative_theme_data['theme_mods'],$preseter_opts);
	$qucreative_theme_data['theme_mods'] = array_merge($qucreative_theme_data['theme_mods'],$arr);


	update_option('theme_mods_qucreative', $qucreative_theme_data['theme_mods']);

}



function qucreative_import_demo_create_portfolio_item($pargs = array()) {





	global $antfarm;

	$margs = array(

		'post_title'=>'',
		'post_content'=>'',
		'post_status'=>'',
		'post_type'=>$antfarm->name_port_item,
	);

	$margs = array_merge($margs, $pargs);



	$args = array(
		'post_type' => $margs['post_type'],
		'post_title' => $margs['post_title'],
		'post_content' => $margs['post_content'],
		'post_status'=>$margs['post_status'],



		// -- other default parameters you want to set
	);



	$post_id = wp_insert_post($args);

	return $post_id;


}

function qucreative_import_demo_insert_post_complete($pargs = array()) {





	global $antfarm;
	global $qucreative_theme_data;




	$post_type = 'antfarm_port_item';

	if($antfarm && $antfarm->name_port_item){
	    $post_type = $antfarm->name_port_item;
    }

	$margs = array(

		'post_title'=>'',

		'post_content'=>'',
		'post_type'=>$post_type,
		'post_status'=>'publish',
		'img_url'=>'',
		'img_path'=>'',
		'term'=>'',
		'taxonomy'=>'',
		'attach_id'=>'',
		'qucreative_'.'meta_post_media_type'=>'image',
		'qucreative_'.'meta_post_media'=>'default',
		'qucreative_'.'meta_port_optional_info_1'=>'',
		'qucreative_'.'meta_port_optional_info_2'=>'',
		'qucreative_'.'meta_port_subtitle'=>'',
		'qucreative_'.'meta_port_website'=>'',
		'qucreative_'.'meta_video_cover_image'=>'',
		'qucreative_'.'meta_image_gallery_in_meta'=>'',
		'qucreative_'.'meta_post_layout_for_excerpt'=>'',

	);

	$margs = array_merge($margs, $pargs);




	$args = array(
		'post_type' => $margs['post_type'],
		'post_title' => $margs['post_title'],
		'post_content' => $margs['post_content'],
		'post_status'=>$margs['post_status'],



		// -- other default parameters you want to set
	);

	$term = $margs['term'];
	$taxonomy = $margs['taxonomy'];
	$img_url = $margs['img_url'];
	$img_path = $margs['img_path'];


	if($margs['qucreative_'.'meta_post_media']=='default'){
		$margs['qucreative_'.'meta_post_media'] = $img_url;
	}
	if($margs['qucreative_'.'meta_post_media']=='none'){
		$margs['qucreative_'.'meta_post_media'] = '';
	}




	$port_id = qucreative_import_demo_create_portfolio_item($args);



	if($taxonomy && $term){

		wp_set_post_terms( $port_id, qucreative_sanitize_for_post_terms($term), $taxonomy );
    }


	// -- no need to sanitize as it is from developer input

	if($margs['qucreative_'.'meta_post_media_type']){
		update_post_meta($port_id,'qucreative_'.'meta_post_media_type',$margs['qucreative_'.'meta_post_media_type']);
	}

	if($margs['qucreative_'.'meta_post_media']){
		update_post_meta($port_id,'qucreative_'.'meta_post_media',$margs['qucreative_'.'meta_post_media']);
	}

	if($margs['qucreative_'.'meta_port_subtitle']){
		update_post_meta($port_id,'qucreative_'.'meta_port_subtitle',$margs['qucreative_'.'meta_port_subtitle']);
	}


	if($margs['qucreative_'.'meta_port_optional_info_1']){
		update_post_meta($port_id,'qucreative_'.'meta_port_optional_info_1',$margs['qucreative_'.'meta_port_optional_info_1']);
	}
	if($margs['qucreative_'.'meta_port_optional_info_2']){
		update_post_meta($port_id,'qucreative_'.'meta_port_optional_info_2',$margs['qucreative_'.'meta_port_optional_info_2']);
	}
	if($margs['qucreative_'.'meta_port_website']){
		update_post_meta($port_id,'qucreative_'.'meta_port_website',$margs['qucreative_'.'meta_port_website']);
	}
	if($margs['qucreative_'.'meta_video_cover_image']){
		update_post_meta($port_id,'qucreative_'.'meta_video_cover_image',$margs['qucreative_'.'meta_video_cover_image']);
	}
	if($margs['qucreative_'.'meta_image_gallery_in_meta']){
		update_post_meta($port_id,'qucreative_'.'meta_image_gallery_in_meta',$margs['qucreative_'.'meta_image_gallery_in_meta']);
	}
	if($margs['qucreative_'.'meta_post_layout_for_excerpt']){
		update_post_meta($port_id,'qucreative_'.'meta_post_layout_for_excerpt',$margs['qucreative_'.'meta_post_layout_for_excerpt']);
	}









	if($margs['attach_id']){

		set_post_thumbnail( $port_id, $margs['attach_id'] );
	}else{

	    if($img_url && $img_path){

		    $attach_id = qucreative_import_demo_create_attachment($img_url, $port_id, $img_path);
		    set_post_thumbnail( $port_id, $attach_id );

		    $qucreative_theme_data['import_demo_last_attach_id'] = $attach_id;
        }

	}





	return $port_id;



}



function qucreative_import_demo_create_attachment($img_url, $port_id, $img_path){






	$attachment = array(
		'guid'           => $img_url,
		'post_mime_type' => 'image/jpeg',
		'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $img_url ) ),
		'post_content'   => '',
		'post_status'    => 'inherit'
	);

// -- Insert the attachment.
	$attach_id = wp_insert_attachment( $attachment, $img_url, $port_id );


	require_once( ABSPATH . 'wp-admin/includes/image.php' );

// -- Generate the metadata for the attachment, and update the database record.
	$attach_data = wp_generate_attachment_metadata( $attach_id, $img_path );

	wp_update_attachment_metadata( $attach_id, $attach_data );

	return $attach_id;
}

function qucreative_ajax_import_demo(){

	include "class_parts/importdemo.php";
	die();
}

function qucreative_handle_init(){


	global $qucreative_theme_data;



	if(is_admin()) {
		setcookie('vchideactivationmsg', '1', strtotime('+3 years'), '/');
		setcookie('vchideactivationmsg_vc11', (defined('WPB_VC_VERSION') ? WPB_VC_VERSION : '1'), strtotime('+3 years'), '/');
	}

	$font_data_str = qucreative_get_theme_mod_and_sanitize('font_data');





	parse_str($font_data_str, $qucreative_theme_data['font_vals']);

	$qucreative_theme_data['secondary_content_height'] = intval(qucreative_get_theme_mod_and_sanitize('secondary_content_height'));

	if( isset($_GET['customize_changeset_uuid']) && ($_GET['customize_changeset_uuid']) ){

		$qucreative_theme_data['sw_is_in_customizer'] = true;
	}



	// -- check each variable in GET

	if($qucreative_theme_data['is_preview_blog']){


		$arr_labs = array(
			'menu_type',
			'highlight_color',
			'menu_enviroment_opacity',
			'content_enviroment_opacity',

			'content_align',
			'width_blur_margin',
			'width_column',
			'width_gap',
			'content_link_to_menu_opacity',
			'menu_is_sticky',
			'border_color',
			'border_width',
			'bg_isparallax',
			'enable_native_scrollbar',
			'blur_ammount',
			'enable_ajax',
		);


		if( (isset($_GET['clearcache']) && $_GET['clearcache']=='on' ) || ( isset($_GET['customize_changeset_uuid']) && ($_GET['customize_changeset_uuid']) ) ){


			foreach ($arr_labs as $lab) {


				setcookie($lab, '', time() - 3600);
				setcookie($lab, '', time() - 3600, COOKIEPATH, COOKIE_DOMAIN);

			}




			setcookie('content_enviroment_style', '', time() - 3600, COOKIEPATH, COOKIE_DOMAIN);


		}else{



//		    print_rr($arr_labs);
			foreach ($arr_labs as $lab){
				$qucreative_theme_data['theme_mods'][$lab] = qucreative_get_theme_mod_and_sanitize($lab);

				qucreative_get_preview_cookie($qucreative_theme_data['theme_mods'][$lab], $lab);
			}

			$qucreative_theme_data['menu_type'] = qucreative_get_theme_mod_and_sanitize('menu_type');


			qucreative_get_preview_cookie($qucreative_theme_data['menu_type'], 'menu_type');
			qucreative_get_preview_cookie($qucreative_theme_data['theme_mods']['content_enviroment_style'], 'content_enviroment_style');

			if($qucreative_theme_data['theme_mods']['content_link_to_menu_opacity']=='on'){
				$qucreative_theme_data['theme_mods']['content_enviroment_opacity'] = $qucreative_theme_data['theme_mods']['menu_enviroment_opacity'];
				$qucreative_theme_data['preview_cookies']['content_enviroment_opacity'] = $qucreative_theme_data['theme_mods']['content_enviroment_opacity'];
			}
		}

	}
}

function qucreative_get_theme_mod($arg){



	global $qucreative_theme_data;



	if($qucreative_theme_data['sw_is_in_customizer']){
		return qucreative_get_theme_mod_and_sanitize($arg);
	}

	if(isset($qucreative_theme_data['theme_mods'][$arg])){

		return $qucreative_theme_data['theme_mods'][$arg];
	}

	return '';
}



function qucreative_filter_the_content_before($content= ''){

	// -- before do_shortcode

	$fout = '';



	$fout.=$content;




	global $post;
	global $qucreative_theme_data;
	global $antfarm;





	if($qucreative_theme_data['replace_string_in_content_with_nada']){


		$fout = str_replace($qucreative_theme_data['replace_string_in_content_with_nada'],'',$fout);

	}








	$post_type_for_portfolio = 'antfarm_port_items';

	if($antfarm && isset($antfarm->name_port_item)){
		$post_type_for_portfolio = $antfarm->name_port_item;
	}









	if(strpos($content,'[vc_section')===false && !($post && ($post->post_type==$post_type_for_portfolio))  && ($qucreative_theme_data['page_type']!='page-portfolio') ){
		$qucreative_theme_data['content_acts_as_sheet'] = true;
	}





	if($post && ($antfarm && $post->post_type==$antfarm->name_port_item)){
		$qucreative_theme_data['content_acts_as_sheet'] = false;
		$fout = preg_replace("/\[vc_section.*?\]/i", "", $fout);;

		$fout = str_replace('[/vc_section]', '',$fout);
	}



	return $fout;

}


function qucreative_ajax_save_att_meta(){

    global $qucreative_theme_data;




	$arr_post = json_decode(stripslashes($_POST['postdata']),true);




	$pid = $arr_post['id'];

	$args = array(
		'ID'           => $pid,
		'post_content' => $arr_post['post_content'],
		'post_excerpt' => $arr_post['post_excerpt'],
	);


// -- Update the post into the database
	wp_update_post( $args );


	update_post_meta($pid, 'qucreative_'.'meta_att_aligment', sanitize_text_field($arr_post[$arr_post['qucreative_'.'meta_att_aligment']]));
	update_post_meta($pid, 'qucreative_'.'meta_att_video', sanitize_text_field($arr_post['qucreative_'.'meta_att_video']));
	update_post_meta($pid, 'qucreative_'.'meta_att_enable_video_cover', sanitize_text_field($arr_post['qucreative_'.'meta_att_enable_video_cover']));






	die();
}



function qucreative_ajax_select_preset(){

	global $qucreative_theme_data;


	$arr = unserialize($qucreative_theme_data['arr_presets'][$_POST['presetid']]['data']);


	$arr['presets'] = $_POST['presetid'];





	if(get_option('theme_mods_q')){
		parse_str(get_option('theme_mods_q'),$qucreative_theme_data['theme_mods']);
	}


	if(get_option('theme_mods_qucreative')){
		parse_str(get_option('theme_mods_qucreative'),$qucreative_theme_data['theme_mods']);
	}



	if(is_array($arr)){


		$arr = array_merge($qucreative_theme_data['theme_mods'], $arr);
	}


	update_option('theme_mods_q', $arr);
	update_option('theme_mods_qucreative', $arr);




	die();
}



function qucreative_ajax_remove_preset(){





	global $qucreative_theme_data;

	unset($qucreative_theme_data['arr_presets'][$_POST['presetid']]);
	update_option('qucreative_presets', $qucreative_theme_data['arr_presets']);



	die();
}

function qucreative_clean($string) {
	$string = str_replace(' ', '-', $string); // -- Replaces all spaces with hyphens.

	return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // -- Removes special chars.
}

function qucreative_check_if_post_meta_below_must_be_added($margs=array()){
	global $post;
	$fout = '';


	if($post && $post->post_type=='post'){
		$fout.= '<div class="post-meta-below">
';




		$cats = wp_get_post_categories($post->ID);

		$cats_str = '';



		if(is_array($cats) && isset($cats[0]) && $cats[0]!=1){

			$cats_str = ' / '.esc_html__("in",'qucreative').' ';

			$i3 = 0;


			$cats_str= '<div class="meta-left h-group-1">'.esc_html__("CATEGORIES",'qucreative').'</div>
  <div class="meta-right h-group-1">';

			foreach ($cats as $catid){
				$cat = get_category($catid);


				if($catid==1){
					continue;
				}

				if($i3>0){
					$cats_str.=', ';
				}

				$cats_str.='<a class="inherit-properties custom-a" href="'.get_category_link($catid).'">';
				$cats_str.=$cat->name;
				$cats_str.='</a>';

				$i3++;
			}

			$cats_str.='</div> <div class="clear"></div>';
		}




		$cats = wp_get_post_tags($post->ID);
		$str_tags = '';




		if(is_array($cats) && count($cats)>0){


			$i3 = 0;


			$str_tags= '<div class="meta-left h-group-1">'.esc_html__("TAGS",'qucreative').'</div>
  <div class="meta-right h-group-1">';

			foreach ($cats as $cat){




				if($i3>0){
					$str_tags.=', ';
				}

				$str_tags.='<a class="custom-a" href="'.get_tag_link($cat->term_id).'">';
				$str_tags.=$cat->name;
				$str_tags.='</a>';

				$i3++;
			}

			$str_tags.='</div> <div class="clear"></div>';
		}

		// -- for posts



		ob_start();
		do_action('qucreative_social_place');

		$fout.=ob_get_contents();

		ob_end_clean();



		$author = get_user_by('id', $post->post_author);



		$fout.= '<div class="post-meta-below--meta">
        <div class="separator-line"></div>
        '.$cats_str.$str_tags.'
        <div class="meta-left  h-group-1">'.esc_html__("AUTHOR",'qucreative').'</div>
        <div class="meta-right h-group-1"><a class=" custom-a" href="'.get_author_posts_url($author->ID).'">'.$author->data->user_nicename.'</a></div>
        <div class="clear"></div>
    </div>


</div>';
	}

	return $fout;
}

function qucreative_check_if_prev_next_post_must_be_added(){
	global $post;

	$fout = '';

	if($post && $post->post_type=='post'){


		$prev_post = get_previous_post();
		$next_post = get_next_post();






		$fout.= '<div class="display-table blog-link-con">';


		if($next_post){
			$fout.= '<a href="'.get_permalink($next_post->ID).'" class="left-td portfolio-link--title">
                                        ';


			$feat_image = wp_get_attachment_image_src( get_post_thumbnail_id($next_post->ID) ,'thumbnail');
			if($feat_image && $feat_image[0]){
				$fout.= '<span class="link-thumb" style="background-image: url('.$feat_image[0].');">
                                        </span>';
			}

			$fout.= '<span class="link-title h-group-1">
                                            '.($next_post->post_title).'
                                        </span>

                            </a>';
		}else{

			$fout.= '<a href="#" class="left-td portfolio-link--title empty-portfolio-link--title"><span class="link-thumb" style="background-image: url();">
                                        </span><span class="link-title h-group-1">
                                        </span></a>';


		}


		$url_page_for_posts = '';

		if(get_option( 'page_for_posts' )){
			$url_page_for_posts = get_permalink( get_option( 'page_for_posts' ) );
        }


		$fout.= '<div class="center-td from-check_if_prev_next_post_must_be_added portfolio-link--toback " style="">
    <a class="donotchange-ajax-menu ajax-link"';

		if($url_page_for_posts){
		    $fout.='  href="'.$url_page_for_posts.'"';
        }

		$fout.='>
        <i class="fa-th fa"></i>
    </a>
</div>';



		if($prev_post){

			$fout.= '<a href="'.get_permalink($prev_post->ID).'" class="right-td portfolio-link--title">
                                        <span class="link-title h-group-1">
                                            '.($prev_post->post_title).'
                                        </span>';

			$feat_image = wp_get_attachment_image_src( get_post_thumbnail_id($prev_post->ID) ,'thumbnail');
			if($feat_image && $feat_image[0]){
				$fout.= '<span class="link-thumb" style="background-image: url('.$feat_image[0].');">
                                        </span>';
			}


			$fout.='</a>';
		}else{

			$fout.= '<a href="#" class="right-td portfolio-link--title empty-portfolio-link--title"><span class="link-thumb" style="background-image: url();">
</span><span class="link-title h-group-1">
</span></a>';
		}

		$fout.='</div>';

	}

	return $fout;

}

function qucreative_ajax_save_preset(){




	global $qucreative_theme_data;


	$qucreative_theme_data['theme_mods']['presets'] = qucreative_clean($_POST['preset_name']);

	update_option('theme_mods_qucreative', $qucreative_theme_data['theme_mods']);


	unset($qucreative_theme_data['theme_mods']['presets']);
	unset($qucreative_theme_data['theme_mods']['nav_menu_locations']);
	unset($qucreative_theme_data['theme_mods']['gmaps_api_key']);
	unset($qucreative_theme_data['theme_mods']['copyright_textbox']);
	unset($qucreative_theme_data['theme_mods']['logo']);
	unset($qucreative_theme_data['theme_mods']['portfolio_page']);
	unset($qucreative_theme_data['theme_mods']['social_icons']);

	foreach ($qucreative_theme_data['theme_mods'] as $lab => $val){
		if(is_int($lab)){
			unset($qucreative_theme_data['theme_mods'][$lab]);
		}
	}


	$aux = array(
		'name'=>$_POST['preset_name'],
		'default'=>false,
		'data'=>serialize($qucreative_theme_data['theme_mods']),
	);

	$qucreative_theme_data['arr_presets'][qucreative_clean($_POST['preset_name'])] = $aux;


	foreach ($qucreative_theme_data['arr_presets'] as $lab=>$val){


		if($val['default']){
			unset($qucreative_theme_data['arr_presets'][$lab]);
		}
	}




	update_option('qucreative_presets', $qucreative_theme_data['arr_presets']);



	echo 'success';




	die();
}


function qucreative_vc_before_init() {
	vc_set_as_theme();
}

function qucreative_handle_loop_start(){
	global $post;
	global $antfarm;


	if(isset($_GET['portfolio-page']) && $_GET['portfolio-page'] && isset($_GET['return-only-items']) && $_GET['return-only-items']=='on'){

		$aux = $post->post_content;


		$output_array = array();




		$prefix = 'antfarm';
		if($antfarm){
			$prefix = $antfarm->name_prefix;
		}
		preg_match_all("/\[".$prefix."_portfolio.*?]/", $aux, $output_array);



		if(is_array($output_array) && count($output_array)>0){

			$ind = intval($_GET['slider-index']);


			$aux = $output_array[0][$ind];
		}



		echo do_shortcode($aux);
		die();

	}
}

function qucreative_handle_admin_menu(){


	add_theme_page( esc_html__("Import Demo",'qucreative'), esc_html__("Import Demo",'qucreative'), 'edit_theme_options', 'qucreative_import_demo', 'qucreative_page_import_demo' );



}


function qucreative_page_import_demo(){

	include get_parent_theme_file_path("class_parts/page_importdemo.php");


}

function qucreative_handle_admin_head(){

	global $pagenow,$qucreative_theme_data;


	if($pagenow=='widgets.php'){
		wp_enqueue_media();
	}


	$high_color = qucreative_get_theme_mod_and_sanitize("highlight_color");


	if($high_color && $high_color!='#97c1cf' ){

        echo '<style>.antfarm-btn.color-highlight, .antfarm-btn.style-default:hover, .antfarm-btn.style-black:hover, .antfarm-btn.style-hallowred:hover, .antfarm-btn.style-hallowblack:hover {
box-shadow: 0 0 0 2px '.$high_color.' inset;
background-color: '.$high_color.';
}
 .antfarm-btn.style-highlight-dark{
background-color: '.$high_color.';
}
.antfarm-btn.style-hallowred{
color: '.$high_color.';
box-shadow: 0 0 0 2px '.$high_color.' inset;
}
</style>';
	}








}



function qucreative_handle_add_meta_boxes(){




	add_meta_box('qucreative_meta_gallery', esc_html__('Page Gallery','qucreative'),'qucreative_admin_meta_gallery','page','side');
	add_meta_box('qucreative_meta_gallery', esc_html__('Page Gallery','qucreative'),'qucreative_admin_meta_gallery','post','side');




}

function qucreative_handle_wp_head(){

	global $post;




	global $qucreative_theme_data;





	if(isset($_GET) && isset($_GET['customize_theme'])){


		$font_data_str = qucreative_get_theme_mod_and_sanitize('font_data');


		parse_str($font_data_str, $qucreative_theme_data['font_vals']);
	}










	$bg_slideshow_time = '0';
	$bg_images = '';
	$force_bg = '';












	// -- if it's not set, ge the default image







	$product_image_gallery = '';





	$post_for_meta = $post;




	if($qucreative_theme_data['post_for_meta']){
		$post_for_meta = $qucreative_theme_data['post_for_meta'];
	}else{
		if(is_home()){

			if(get_option( 'page_for_posts' )){
				$post_for_meta = get_post(get_option( 'page_for_posts' ));
			}

		}
	}












	if($post_for_meta ) {
		if (get_post_meta($post_for_meta->ID, 'qucreative_'.'meta_image_gallery'.$qucreative_theme_data['page_extra_meta_label'], true) && get_post_meta( $post_for_meta->ID, '_wp_page_template', true )!='template-gallery-creative.php') {
			$product_image_gallery = esc_html(get_post_meta($post_for_meta->ID, 'qucreative_'.'meta_image_gallery', true));

			$attachments = array_filter(explode(',', $product_image_gallery));

			if ($attachments) {
				$bg_images = '';


				$i3 = 0;
				foreach ($attachments as $attachment_id) {

					if ($i3 > 0) {
						$bg_images .= ',';
					}

					$img_full = wp_get_attachment_image_src($attachment_id, 'full');

					$bg_images .= '\'' . $img_full[0] . '\'';

					$i3++;

				}
				if(qucreative_get_theme_mod_and_sanitize('bg_slideshow_time')){
					$bg_slideshow_time = intval(qucreative_get_theme_mod_and_sanitize('bg_slideshow_time'));
				}
				if(get_post_meta($post_for_meta->ID, 'qucreative_'.'meta_home_slideshow_time'.$qucreative_theme_data['page_extra_meta_label'], true)){
					$bg_slideshow_time = intval(get_post_meta($post_for_meta->ID, 'qucreative_'.'meta_home_slideshow_time'.$qucreative_theme_data['page_extra_meta_label'], true));
				}



			}
		}
	}








	if($qucreative_theme_data['sw_is_in_customizer']){
		$lab = 'width_blur_margin';
		$qucreative_theme_data['theme_mods'][$lab] = qucreative_get_theme_mod_and_sanitize($lab);
		$lab = 'width_column';
		$qucreative_theme_data['theme_mods'][$lab] = qucreative_get_theme_mod_and_sanitize($lab);
		$lab = 'width_gap';
		$qucreative_theme_data['theme_mods'][$lab] = qucreative_get_theme_mod_and_sanitize($lab);
		$lab = 'border_width';
		$qucreative_theme_data['theme_mods'][$lab] = qucreative_get_theme_mod_and_sanitize($lab);
		$lab = 'border_color';
		$qucreative_theme_data['theme_mods'][$lab] = qucreative_get_theme_mod_and_sanitize($lab);
		$lab = 'bg_isparallax';
		$qucreative_theme_data['theme_mods'][$lab] = qucreative_get_theme_mod_and_sanitize($lab);
		$lab = 'enable_native_scrollbar';
		$qucreative_theme_data['theme_mods'][$lab] = qucreative_get_theme_mod_and_sanitize($lab);
		$lab = 'blur_ammount';
		$qucreative_theme_data['theme_mods'][$lab] = qucreative_get_theme_mod_and_sanitize($lab);
		$lab = 'enable_ajax';
		$qucreative_theme_data['theme_mods'][$lab] = qucreative_get_theme_mod_and_sanitize($lab);
	}













	if ($qucreative_theme_data['post_for_meta']) {


	    if((get_post_meta($qucreative_theme_data['post_for_meta']->ID, '_wp_page_template', true) != 'template-qucreative-slider.php') && (get_post_meta($qucreative_theme_data['post_for_meta']->ID, '_wp_page_template', true) != 'template-gallery-creative.php') ){

		    $qucreative_theme_data['has_footer'] = true;
        }


        if(get_post_meta($qucreative_theme_data['post_for_meta']->ID, 'qucreative_'.'meta_disable_footer'.$qucreative_theme_data['page_extra_meta_label'],true)=='on'){

	        $qucreative_theme_data['has_footer'] = false;
        }






	}else{

		if(is_home() || is_search() || is_archive()){

			if(get_option( 'page_for_posts' )){

			}else{

				$qucreative_theme_data['has_footer'] = true;
            }

		}
    }

	$the_sidebars = wp_get_sidebars_widgets();



	if(count($the_sidebars['sidebar-footer'])){
	}else{

		$qucreative_theme_data['has_footer'] = false;
	}
}

function qucreative_handle_wp_footer_bottom(){


	global $post;
	global $qucreative_theme_data;


	if($post){



		global $antfarm;
		$prefix = 'antfarm';
		if($antfarm){
			$prefix = $antfarm->name_prefix;
		}

		if(substr_count($post->post_content,'[vc_row')==1 && ( substr_count($post->post_content,'['.$prefix.'_portfolio')) ){


			$qucreative_theme_data['js_data_for_zoombox'] = json_encode(array(
				'type'=>'zfolio_wait_for_load'
			));
			echo '<div class="qucreative-option-feed" data-rel="zfolio-wait-for-load">'.$qucreative_theme_data['js_data_for_zoombox'].'</div>';

		}
	}



	if($qucreative_theme_data['footer_extra_zoombox_items']){
		echo '<div class="footer-extra-zoombox-items">';
		echo $qucreative_theme_data['footer_extra_zoombox_items'];


		echo '<span style="display: none;">dzs2</span></div>';



		$qucreative_theme_data['js_data_for_zoombox'] = json_encode(array(
			'type'=>'whitefull'
		));
		echo '<div class="qucreative-option-feed" data-rel="zoombox-options">'.$qucreative_theme_data['js_data_for_zoombox'].'</div>';



	}else{


		$qucreative_theme_data['js_data_for_zoombox'] = json_encode(array(
			'type'=>'darkfull'
		));
		echo '<div class="qucreative-option-feed" data-rel="zoombox-options">'.$qucreative_theme_data['js_data_for_zoombox'].'</div>';




	}




	if(get_theme_mod('gmaps_styling')){
		$str_gmaps_styling = qucreative_get_theme_mod_and_sanitize('gmaps_styling');
		$str_gmaps_styling = str_replace(array("\r","\r\n","\n"),'',$str_gmaps_styling);




		$qucreative_theme_data['js_data_for_zoombox'] = json_encode(array(
			'styling'=>$str_gmaps_styling
		));

		$qucreative_theme_data['js_data_for_zoombox'] = $str_gmaps_styling;
		echo '<div class="qucreative-option-feed" data-rel="gmaps-styling">'.$qucreative_theme_data['js_data_for_zoombox'].'</div>';

	}






}

function qucreative_handle_wp_footer(){






	global $qucreative_theme_data;
	if($qucreative_theme_data['is_preview_blog']){

		wp_enqueue_script('preview.customizer',QUCREATIVE_THEME_URL . 'libs/preseter/preseter.js',array('jquery'));
		wp_enqueue_style('preview.customizer',QUCREATIVE_THEME_URL . 'libs/preseter/preseter.css');



	}
	if($qucreative_theme_data['theme_mods']['enable_native_scrollbar']=='off'){
		wp_enqueue_script('custom-scrollbar',QUCREATIVE_THEME_URL.'libs/scroller/scroller.js', array('jquery'));
	}

}

function qucreative_generate_style_for($pargs = array()) {
	$margs = array(

		'font_data'=>array(),
		'label_prefix'=>'h1',
		'selector'=>'h1, .the-content-con > h1',
		'important'=>true,
	);

	$margs = array_merge($margs, $pargs);

	$font_data = $margs['font_data'];




	$fout = '';
	$fout.= $margs['selector'].'{';
	if(isset($font_data[$margs['label_prefix'].'_size'])&&$font_data[$margs['label_prefix'].'_size']){
		$fout .= ' font-size: '.$font_data[$margs['label_prefix'].'_size'].'px';
	}


	if($margs['important']) {


		$fout.='!important;';
	}else{
		$fout.=';';
	}


	if(isset($font_data[$margs['label_prefix'].'_line_height'])&&$font_data[$margs['label_prefix'].'_line_height']) {
		$fout .= ' line-height: ' . $font_data[$margs['label_prefix'] . '_line_height'];
	}

	if($margs['important']) {


		$fout.='!important;';
	}else{
		$fout.=';';
	}


	$weight = 'regular';

	if(isset($font_data[$margs['label_prefix'].'_weight'])){

		$weight = $font_data[$margs['label_prefix'].'_weight'];
	}


	// --sanitizing
	if(strpos($weight, 'italic')!==false){
		$fout.= ' font-style: italic!important; ';
		$weight = str_replace('italic','',$weight);
	}else{

		$fout.= ' font-style: normal!important; ';
	}
	$weight = str_replace('regular','400',$weight);
	// --sanitizing END



	if($weight==''){
		$weight='400';
	}
	$fout.= ' font-weight: '.$weight.' ';


	if($margs['important']) {


		$fout.='!important';
	}else{
		$fout.=';';
	}



	$fout.=' } ';


	$lab = $margs['label_prefix'].'_responsive_slider';


	if(isset($font_data[$lab])&&$font_data[$lab]){

		$val = $font_data[$lab];

		$val = intval($val);

		if($val){
			$val = 1- floatval($val/100);

			$fout.=' @media all and (max-width: 521px){ '.$margs['selector'].' { font-size: '. intval($val * intval($font_data[$margs['label_prefix'].'_size'])).'px!important;  } } ';
		}


	}

	return $fout;

}


function qucreative_generate_font_for_inclusion($pargs = array()) {

    global $qucreative_theme_data;
	$margs = array(

		'font_data'=>array(),
		'label_prefix'=>'h1',
		'font'=>'headings_font',
		'selector'=>'h1, .the-content-con > h1',
	);

	$margs = array_merge($margs, $pargs);

	$font_data = $margs['font_data'];



	$weight = 'regular';

	if(isset($font_data[$margs['label_prefix'].'_weight'])){

		$weight = $font_data[$margs['label_prefix'].'_weight'];
	}


	// --sanitizing
	$weight = str_replace('regular','400',$weight);
	if(strpos($weight, 'italic')!==false){

	}


	if($weight=='italic'){

		$weight = '400italic';
	}
	// --sanitizing END


	$font = 'Lato';

	if(isset($margs['font']) && isset($font_data[$margs['font']])){

		$font = $font_data[$margs['font']];
	}


	if(isset($font_data[$margs['label_prefix'].'_font_link_to']) && isset($font_data[$margs['label_prefix'].'_font_link_to'])){


		$font = $font_data[$font_data[$margs['label_prefix'].'_font_link_to'].'_font'];
	}


	$font_sanitized = str_replace(' ','+',$font);

	if(isset($qucreative_theme_data['font_used'][$font_sanitized]) && is_array($qucreative_theme_data['font_used'][$font_sanitized])){

		if(in_array($weight,$qucreative_theme_data['font_used'][$font_sanitized])){

		}else{

			array_push($qucreative_theme_data['font_used'][$font_sanitized], $weight);
		}
	}else{
		$qucreative_theme_data['font_used'][$font_sanitized] = array();
		array_push($qucreative_theme_data['font_used'][$font_sanitized], $weight);
	}



}



function qucreative_handle_admin_meta_save($post_id) {
	global $post;
	global $qucreative_theme_data;


	if (!$post) {
		return;
	}

	// --  Check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}


	$is_preview = false;
	if(isset($_POST['wp-preview']) && $_POST['wp-preview']=='dopreview'){

		// -- save for preview ( append _preview maybe )
		$is_preview = true;

	}




	if (isset($_REQUEST['qucreative_'.'meta_nonce'])) {
		$nonce = $_REQUEST['qucreative_'.'meta_nonce'];
		if (!wp_verify_nonce($nonce,'qucreative_'.'meta_nonce')){
			wp_die('Security check');
		}
	}


	if (is_array($_POST)) {
		$auxa = $_POST;
		foreach ($auxa as $label => $value) {


			$label_to_save = $label;

			if($is_preview){
				$label_to_save.='_preview';
			}




			$original_value = $value;


			if(is_array($value) || $original_value===' '){

			}else{

				$value = sanitize_text_field($value);
			}


			if (strpos($label,'qucreative_'.'meta_') !== false) {
				update_post_meta($post->ID,$label_to_save,$value);
			}


		}
	}



}











function qucreative_admin_meta_gallery() {

	// -- this is the meta box
	global $post;
	global $qucreative_theme_data;
	?>
    <div id="product_images_container">
        <ul class="dzs_item_gallery_list">
			<?php
			$product_image_gallery = '';
			if (metadata_exists('post',$post->ID,'qucreative_'.'meta_image_gallery')) {
				$product_image_gallery = get_post_meta($post->ID,'qucreative_'.'meta_image_gallery',true);
			}

			$attachments = array_filter(explode(',',$product_image_gallery));

			if ($attachments) {
				foreach ($attachments as $attachment_id) {
					echo '<li class="item-element" data-id="'.$attachment_id.'">
						<div class="the-image the-handler">
'.wp_get_attachment_image($attachment_id,'thumbnail',false, array( "class" => "img-responsive " ) ).'
</div>
<div class="ui-delete"></div>
<div class="ui-edit">'.esc_html__("Edit",'qucreative').'</div>';



					$att_meta =array();

					$att_meta = wp_prepare_attachment_for_js($attachment_id);


					?>
                    <div class="ui-edit-field">
                        <div class="ui-edit-field-close"><i class="fa fa-times-circle"></i></div>

                        <input type="hidden" name="<?php echo 'qucreative_'; ?>meta_post_id" value="<?php echo $attachment_id; ?>"/>
                        <div class="setting">
                            <h5><?php echo esc_html__("Title",'qucreative'); ?></h5>
                            <input class="q-att-meta-edit-field" type="text" name="<?php echo 'qucreative_'; ?>meta_post_excerpt"  value="<?php $aux = $att_meta['caption']; $aux = str_replace('"', '', $aux); echo $aux; ?>"/>
                        </div>

                        <div class="setting for-selected-template-gallery-creative">
                            <h5><?php echo esc_html__("Description",'qucreative'); ?></h5>
                            <textarea class="q-att-meta-edit-field" type="text" name="<?php echo 'qucreative_'; ?>meta_post_content"><?php $aux = $att_meta['description']; $aux = str_replace('"', '', $aux); echo $aux; ?></textarea>
                        </div>

                        <div class="setting not-for-selected-template-gallery-creative">
                            <h5><?php echo esc_html__("Aligment",'qucreative'); ?></h5>
							<?php


							$seekval = 'right';
							$lab = 'qucreative_'.'meta_att_aligment';

							if(get_post_meta($attachment_id, $lab,true)){
								$seekval = get_post_meta($attachment_id, $lab,true);
							}



							$arr_opts = array(
								array(
									'label'=>esc_html__("Right",'qucreative'),
									'value'=>'right',
								),
								array(
									'label'=>esc_html__("Left",'qucreative'),
									'value'=>'left',
								),
							);


							echo qucreative_helpers_generate_select($lab, array(
								'class'=>'qucreative-att-meta-edit-field q-att-meta-edit-field',
								'options'=>$arr_opts,
								'seekval'=>$seekval,
							))
							?>
                        </div>



						<?php

						$lab = 'qucreative_'.'meta_att_video';
						$seekval = get_post_meta($attachment_id, $lab,true);


						?>
                        <div class="setting for-selected-template-gallery-creative">
                            <h5><?php echo esc_html__("Attached Video",'qucreative'); ?></h5>
                            <input class="qucreative-att-meta-edit-field q-att-meta-edit-field" type="text" name="<?php echo $lab; ?>" value="<?php echo $seekval; ?>"/>
                        </div>



						<?php

						$lab = 'qucreative_'.'meta_att_enable_video_cover';
						$seekval = get_post_meta($attachment_id, $lab,true);


						?>
                        <div class="setting for-selected-template-gallery-creative">
                            <h5><?php echo esc_html__("Enable Video Cover",'qucreative'); ?></h5>
							<?php




							$arr_opts = array(
								array(
									'label'=>esc_html__("Off",'qucreative'),
									'value'=>'off',
								),
								array(
									'label'=>esc_html__("On",'qucreative'),
									'value'=>'on',
								),
							);

							echo qucreative_helpers_generate_select($lab, array(
								'class'=>'q-att-meta-edit-field',
								'options'=>$arr_opts,
								'seekval'=>$seekval,
							))
							?>
                        </div>
                    </div>
					<?php


					echo '</li>';
				}
			}
			?>
        </ul>

        <input type="hidden" id="<?php echo 'qucreative_'; ?>meta_image_gallery" name="<?php echo 'qucreative_'; ?>meta_image_gallery" value="<?php echo esc_attr($product_image_gallery); ?>" />
        <button class="button-secondary dzs-add-gallery-item"><?php echo esc_html__("Add Media", 'qucreative'); ?></button>
    </div>
	<?php
}






function qucreative_generate_portfolio_item_blockquote($arg, $pargs= array()){


    global $qucreative_theme_data;
	$margs = array(
		'extra_class' => '',
	);

	$fout = '';


	if ($pargs) {
		$margs = array_merge($margs, $pargs);
	}



	$fout = '';
	$fout .= '<blockquote class="'.$margs['extra_class'].' font-group-4">';

	$i = 0;
	$i25 = 0;



	for($i=1;$i<5;$i++){



		if(get_post_meta($arg, 'qucreative_'.'meta_port_optional_info_'.$i,true)){



			if($i25>0){
				$fout.='<br>';
			}

			$fout.=get_post_meta($arg, 'qucreative_'.'meta_port_optional_info_'.$i,true);



			$i25++;
		}

	}


	if(get_post_meta($arg, 'qucreative_'.'meta_port_website',true)){

		if($i25>0){
			$fout.='<br>';
		}
		$aux = get_post_meta($arg, 'qucreative_'.'meta_port_website',true);

		$aux = str_replace('http://','',$aux);
		$aux = str_replace('https://','',$aux);



		$fout.= '<a class="custom-a color-hg-on-hover weight-from-anchor"  href="'.get_post_meta($arg, 'qucreative_'.'meta_port_website',true).'">'.$aux.'</a>';

		$i25++;

	}

	$fout .= '</blockquote>';


	return $fout;
}


function qucreative_generate_post_content_by_id($post_id, $pargs = array()) {

	$margs = array(
		'more_link_text-media-con_div' => '',
		'stripteaser' => '',
		'more_link_text' => esc_html__("Read More",'qucreative'),
	);
	if ($pargs) {
		$margs = array_merge($margs, $pargs);
	}



	$fout = '';

	global $post;
	$post = get_post($post_id);
	setup_postdata( $post, $margs['more_link_text'], $margs['stripteaser'] );

	ob_start();
	the_content();

	$fout=@ob_get_clean();
	wp_reset_postdata( $post );

	return $fout;

}


function qucreative_generate_featured_media($arg, $pargs = array()) {

	global $qucreative_theme_data;

	$margs = array(
		'include_featured-media-con_div' => true,
		'search_for_featured_media' => true, // -- search for the posts featured media con too if meta post media is not set
		'img_extra_class' => 'fullwidth',
		'call_from' => 'default',
		'item_excerpt_setup_video_height' => '',
	);

	$fout = '';


	if ($pargs) {
		$margs = array_merge($margs, $pargs);
	}




	$post_media = get_post_meta($arg, 'qucreative_'.'meta_post_media', true);
	$post_media_type = 'detect';

	$po = get_post($arg);

	if($po){
		if($po->post_type=='post'){
			if(get_post_format($arg)=='image'){



			}
			if(get_post_format($arg)=='video'){
				$co = $po->post_content;

				if(strpos($co, 'youtube.com')!==false){
					$post_media_type = 'youtube';


					preg_match_all("/http\S*?youtube.com\/watch\?v\=(\S*)/", $co, $matches);

					if(isset($matches[0][0]) && $matches[0][0]){
						$post_media = $matches[0][0];
					}

					global $post;

					if($post && $post->ID===$arg){





						$qucreative_theme_data['replace_string_in_content_with_nada'] = $post_media;


					}



				}
			}
			if(get_post_format($arg)=='image'){
				$co = $po->post_content;

				if(strpos($co, '<img')!==false){
					$post_media_type = 'image';


					preg_match_all("/<img.*?src=[\"|'](.*?)[\"|'].*?>/", $co, $matches);;



					$to_replace = '';
					if(isset($matches[0][0]) && $matches[0][0]){
						if(isset($matches[1][0]) && $matches[1][0]) {
							$post_media = $matches[1][0];
							$to_replace = $matches[0][0];
						}
					}

					global $post;

					if($to_replace && $post && $post->ID===$arg){





						$qucreative_theme_data['replace_string_in_content_with_nada'] = $to_replace;


					}



				}
			}
		}
	}


	if ($post_media) {
		if (strpos($post_media, '.mp4') || strpos($post_media, '.m4v')) {
			$post_media_type = 'video';
		}
		if (strpos($post_media, 'youtube.com/wa')) {
			$post_media_type = 'youtube';
		}
		if (strpos($post_media, 'vimeo.com/')) {
			$post_media_type = 'vimeo';
		}
	}

	if (get_post_meta($arg, 'qucreative_'.'meta_post_media_type', true) == 'slider') {
		$post_media_type = 'slider';
	}


	if ($post_media_type == 'detect') {
		$post_media_type = 'image';
	}

	if ($post_media || ($post_media_type=='slider' && ( get_post_meta($arg, 'qucreative_'.'meta_image_gallery', true) || get_post_meta($arg, 'qucreative_'.'meta_image_gallery_in_meta', true) )  ) ) {


		if ($margs['include_featured-media-con_div']) {



			$fout .= '<div class="featured-media-con from-generate_featured_media">';
		}



		if ($post_media_type == 'image') {
			$fout .= '<img alt="' . esc_html__("image",'qucreative') . '" class="' . $margs['img_extra_class'] . '" src="' . qucreative_sanitize_id_to_src($post_media) . '">';
		}
		if ($post_media_type == 'vimeo' || $post_media_type == 'youtube' || $post_media_type == 'video') {
			$fout .= '<div class="vplayer-tobe auto-init-from-q " data-src="' . $post_media . '" style="';




			wp_enqueue_script('antfarm-video-player', QUCREATIVE_THEME_URL . 'libs/videogallery/vplayer.js', array('jquery'));
			wp_enqueue_style('antfarm-video-player', QUCREATIVE_THEME_URL . 'libs/videogallery/vplayer.css');


			if($margs['call_from']=='item_excerpt_setup'){

				$fout.='height: '.$margs['item_excerpt_setup_video_height'].'px;';
			}else{
				$fout.='height: 488px; ';
			}

			$fout.='" data-options=\'\'';



			if($margs['call_from']=='item_excerpt_setup'){



			}

			$fout.='>

                                    ';


			if (get_post_meta($arg, 'qucreative_'.'meta_video_cover_image'.$qucreative_theme_data['page_extra_meta_label'], true)) {
				$fout .= '<div class="cover-image" style="background-image: url(' . get_post_meta($arg, 'qucreative_'.'meta_video_cover_image'.$qucreative_theme_data['page_extra_meta_label'], true) . '); ">
<svg class="cover-play-btn" version="1.1" baseProfile="tiny"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
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


			$fout .= '</div>';





			global $antfarm;

			if($antfarm){

				wp_enqueue_script('antfarm-video-player', $antfarm->base_url . 'libs/videogallery/vplayer.js', array('jquery'));
				wp_enqueue_style('antfarm-video-player', $antfarm->base_url . 'libs/videogallery/vplayer.css');
			}


		}

		if ($post_media_type == 'slider') {



			if($margs['call_from']=='zoombox_item'){
				$fout.=' <div class="arrow-left-for-skin-qucreative" onclick="jQuery(this).parent().find(\'.advancedscroller\').eq(0).get(0).api_gotoPrevPage();"></div>
            <div class="arrow-right-for-skin-qucreative" onclick="jQuery(this).parent().find(\'.advancedscroller\').eq(0).get(0).api_gotoNextPage();"></div>
            <div  class="advancedscroller skin-nonav " style="width:100%; "><div class="preloader-semicircles"></div><ul class="items">';
			}elseif($margs['call_from']=='item_excerpt_setup'){



				$fout .= '<div class="advancedscroller-con">
<div class="advancedscroller skin-qucreative" style="width:100%; height: auto; margin-bottom: 0;" >
		<ul class="items">';
			}else{

				$fout .= '<div class="advancedscroller-con">
                            <div class="advancedscroller skin-qucreative auto-init-from-q" style="width:100%; height: auto; margin-bottom: 0;" data-options=\'{
"settings_mode": "onlyoneitem"
,"design_arrowsize": "0"
,"settings_swipe": "on"
,"settings_autoHeight": "on"
,"settings_autoHeight_proportional": "on"
,"settings_swipeOnDesktopsToo": "on"
,"settings_slideshow": "off"
,"settings_slideshowTime": "150"
}\'>
<ul class="items">';
			}



			$product_image_gallery = '';




			$lab = 'qucreative_'.'meta_image_gallery';
			if (get_post_meta($arg, $lab.$qucreative_theme_data['page_extra_meta_label'], true)) {


				$product_image_gallery = get_post_meta($arg, $lab.$qucreative_theme_data['page_extra_meta_label'], true);


			}
			$lab = 'qucreative_'.'meta_image_gallery_in_meta';
			if (get_post_meta($arg, $lab.$qucreative_theme_data['page_extra_meta_label'], true)) {


				$product_image_gallery = get_post_meta($arg, $lab.$qucreative_theme_data['page_extra_meta_label'], true);
			}



			if($product_image_gallery){

				$attachments = array_filter(explode(',', $product_image_gallery));


				if ($attachments) {

					$i3 = 0;
					foreach ($attachments as $attachment_id) {


						$img_full = wp_get_attachment_image_src($attachment_id, 'full');


						$i3++;





						$fout .= '<li class="item-tobe needs-loading"><div class="imagediv" style="background-image: url(' . $img_full[0] . ')" ></div></li>';

					}


				}

			}

			if($margs['call_from']=='zoombox_item'){

				$fout .= '</ul>
                            </div>
                            ';
			}else{
				$fout .= '</ul>
                            </div>
                        </div>';

			}


			if($margs['call_from']=='zoombox_item'){


				$fout.='<div class="toexecute">';


				$fout.=json_encode(array(
					'type'=>'transform_slider_con',
					'settings_mode'=>'onlyoneitem',
					'design_arrowsize'=>'0',
					'settings_swipe'=>'on',
					'settings_swipeOnDesktopsToo'=>'on',
					'settings_slideshow'=>'off',
					'settings_autoHeight'=>'off',
				));

				$fout.='</div>';



			}
			if($margs['call_from']=='item_excerpt_setup'){


				$fout.='<div class="toexecute">';
				$fout.=json_encode(array(
					'type'=>'item_excerpt_setup',
					'settings_mode'=>'onlyoneitem',
					'design_arrowsize'=>'0',
					'settings_swipe'=>'on',
					'settings_swipeOnDesktopsToo'=>'on',
					'settings_slideshow'=>'off',
					'settings_autoHeight'=>'on',
					'settings_autoHeight_proportional'=>'on',
					'settings_autoHeight_proportional_max_height'=>'on',
					'settings_force_immediate_load'=>'off',
				));
				$fout.='</div>';


			}


			wp_enqueue_style('qucreative_content_scroller', QUCREATIVE_THEME_URL . 'libs/advancedscroller/plugin.css');
			wp_enqueue_script('qucreative_content_scroller', QUCREATIVE_THEME_URL . 'libs/advancedscroller/plugin.js', array('jquery'));


			// -- end slider
		}

		if ($margs['include_featured-media-con_div']) {

			$fout .= '</div>';
		}
	}else{

		if($margs['search_for_featured_media']){

			$img = qucreative_get_featured_image($arg);

			if($img){

				if ($margs['include_featured-media-con_div']) {

					$fout .= '<div class="featured-media-con from-generate_featured_media">';
				}


				if ($post_media_type == 'image') {
					$fout .= '<img alt="' . esc_html__("image",'qucreative') . '" class="' . $margs['img_extra_class'] . '" src="' . $img . '">';
				}

				if ($margs['include_featured-media-con_div']) {

					$fout .= '</div>';
				}
			}
		}

	}

	return $fout;
}


function qucreative_generate_prev_next_table($arg=0, $pargs = array()){
	global $qucreative_theme_data;


	$margs = array(
		'include_featured-media-con_div'=>true,
		'img_extra_class'=>'fullwidth',
		'cat'=>'',
	);

	$fout = '';


	if($pargs){
		$margs = array_merge($margs, $pargs);
	}






	$prev_post = get_previous_post();
	$next_post = get_next_post();

	$str_cat = '';



	if(isset($_GET['zfolio-cat']) && $_GET['zfolio-cat']){
		$str_cat = $_GET['zfolio-cat'];



		global $antfarm;




		$taxonomy_name = 'antfarm_port_items_cat';

		if($antfarm){
			$taxonomy_name = $antfarm->name_port_item_cat;
		}

		$post_type = 'antfarm_port_items';

		if($antfarm){
			$post_type = $antfarm->name_port_item;
		}



		$term_id = qucreative_sanitize_term_slug_to_id($_GET['zfolio-cat']);
		$term = get_term($term_id, $taxonomy_name);
		$term_children = get_term_children( $term_id, $taxonomy_name );



		$prev_post = null;
		$next_post = null;


		$wpqargs = array();
		$meta_key = 'dzs_meta_order_for_term_'.$term_id;

		$wpqargs['post_type']=$post_type;
		$wpqargs['posts_per_page']='-1';

		if($term_id){

			$wpqargs['orderby']=array( 'meta_key' => 'DESC','meta_value_num' => 'DESC', 'date' => 'DESC' );
			$wpqargs['meta_query']=array(
				'relation' => 'OR',
				array(
					'key'=>$meta_key,
					'compare' => 'EXISTS'
				),
				array(
					'key'=>$meta_key,
					'compare' => 'NOT EXISTS'
				)
			);
		}else{

			$wpqargs['orderby']=array('date' => 'DESC' );
		}

		$wpqargs['order']="DESC";

		if($margs['cat'] && $margs['cat']!='all'){




			$arr_cats = explode(',', $margs['cat']);

			if ($wpqargs['post_type'] == 'post') {
				$wpqargs['cat'] = $margs['cat'];
			}






			if ($wpqargs['post_type'] == $antfarm->name_port_item) {
				$wpqargs['tax_query'] = array(
					array(
						'taxonomy' => $taxonomy_name,
						'field' => 'id',
						'terms' => $arr_cats,
					)
				);




				$the_cat = get_term($margs['cat'],$taxonomy_name);



				$the_cat_id = $margs['cat'];
			}



		}
		if(isset($_GET['zfolio-cat']) && $_GET['zfolio-cat']){

			if ($wpqargs['post_type'] == $antfarm->name_port_item) {
				$wpqargs['tax_query'] = array(
					array(
						'taxonomy' => $taxonomy_name,
						'field' => 'id',
						'terms' => array(qucreative_sanitize_term_slug_to_id($_GET['zfolio-cat'])),
					)
				);

			}
		}



		// -- start the LOOP
		$args_wpqargs = array();
		// -- lets parse custom wp query args

		if(isset($margs['wpqargs']) && $margs['wpqargs']){

			$margs['wpqargs'] = html_entity_decode($margs['wpqargs']);
		}else{
			$margs['wpqargs'] = '';
		}
		parse_str($margs['wpqargs'],$args_wpqargs);


		if (!isset($args_wpqargs) || $args_wpqargs == false || is_array($args_wpqargs) == false) {
			$args_wpqargs = array();
		}
		$wpqargs = array_merge($wpqargs,$args_wpqargs);


		$query = new WP_Query($wpqargs);




		global $post;
		foreach ($query->posts as $lab=>$po){
			if($po->ID == $post->ID){





				if(isset($query->posts[$lab-1])){
					$next_post = $query->posts[$lab-1];
				}else{
					$next_post = null;
				}
				if(isset($query->posts[$lab+1])){
					$prev_post = $query->posts[$lab+1];
				}else{
					$prev_post = null;
				}
				break;
			}
		}




	}


	// -- portfolio
	$fout.= '<div class="display-table portfolio-link-con">';


	if($next_post){


		$link = get_permalink($next_post->ID);

		if($str_cat){
			$link = add_query_arg('zfolio-cat',$str_cat,$link);
		}

		$fout.= '<a href="'.$link.'" class="left-td portfolio-link--title">
                                        ';


		$feat_image = wp_get_attachment_image_src( get_post_thumbnail_id($next_post->ID) ,'thumbnail');
		if($feat_image && $feat_image[0]){
			$fout.= '<span class="link-thumb" style="background-image: url('.$feat_image[0].');">
                                        </span>';
		}

		$fout.= '<h5 class="link-title">
                                            '.($next_post->post_title).'
                                        </h5>

                            </a>';
	}else{

		$fout.= '<a href="#" class="left-td portfolio-link--title empty-portfolio-link--title"><span class="link-thumb" style="background-image: url();">
                                        </span><span class="link-title">
                                        </span></a>';


	}






	$pagePort = get_post($qucreative_theme_data['theme_mods']['portfolio_page']);




	$link = site_url();

	if(isset( $pagePort->ID )){
		$link = get_permalink( $pagePort->ID );
	}



	$fout.= '<div class="center-td portfolio-link--toback" style="">
                                <a class="custom-a portfolio-link--toback-a donotchange-ajax-menu" href="'.$link.'">

                                    <i class="fa-th fa"></i>
                                </a>
                            </div>';



	if($prev_post && isset($prev_post->ID)){



		$link = get_permalink($prev_post->ID);

		if($str_cat){
			$link = add_query_arg('zfolio-cat',$str_cat,$link);
		}

		$fout.= '<a href="'.$link.'" class="right-td portfolio-link--title">
                                        <h5 class="link-title ">
                                            '.($prev_post->post_title).'
                                        </h5>';

		$feat_image = wp_get_attachment_image_src( get_post_thumbnail_id($prev_post->ID) ,'thumbnail');
		if($feat_image && $feat_image[0]){
			$fout.= '<span class="link-thumb" style="background-image: url('.$feat_image[0].');">
                                        </span>';
		}


		$fout.='</a>';
	}else{

	}

	$fout.='</div>';
	return $fout;

}












if ( ! function_exists( 'qucreative_setup' ) ) {

	function qucreative_setup() {


		add_theme_support( 'automatic-feed-links' );



		add_post_type_support( 'page', 'excerpt' );;
		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 825, 510, true );


		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu',      'qucreative' ),
			'social'  => esc_html__( 'Social Links Menu', 'qucreative' ),
		) );


		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
		) );



		add_theme_support( 'post-formats', array( 'video') );



	}
}


/**
 * Register widget area.
 *
 */
function qucreative_widgets_areas_init() {



	$typography_sidebar_heading_style = qucreative_get_theme_mod_and_sanitize('typography_sidebar_heading_style');
	$typography_footer_heading_style = qucreative_get_theme_mod_and_sanitize('typography_footer_heading_style');

	if($typography_sidebar_heading_style){

	}else{
		$typography_sidebar_heading_style = 'h6';
	}

	if($typography_footer_heading_style){

	}else{
		$typography_footer_heading_style = 'h6';
	}


	$h_wrap_start = '<'.$typography_sidebar_heading_style.' class="the-variable-heading widget-title">';
	$h_wrap_end = '</'.$typography_sidebar_heading_style.'>';

	if($typography_sidebar_heading_style=='h-group-1'||$typography_sidebar_heading_style=='h-group-2'){

		$h_wrap_start = '<h3 class="the-variable-heading widget-title '.$typography_sidebar_heading_style.'">';
		$h_wrap_end = '</h3>';
	}


	register_sidebar( array(
		'name'          => esc_html__( 'Widget Area', 'qucreative' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'qucreative' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s sidebar-block">',
		'after_widget'  => '</div>',
		'before_title'  => $h_wrap_start,
		'after_title'   => $h_wrap_end,
	) );





	$h_wrap_start = '<'.$typography_footer_heading_style.' class="the-variable-heading widget-title">';
	$h_wrap_end = '</'.$typography_footer_heading_style.'>';

	if($typography_footer_heading_style=='h-group-1'||$typography_footer_heading_style=='h-group-2'){

		$h_wrap_start = '<h3 class="the-variable-heading widget-title '.$typography_footer_heading_style.'">';
		$h_wrap_end = '</h3>';
	}


	register_sidebar( array(
		'name'          => esc_html__( 'Footer Area', 'qucreative' ),
		'id'            => 'sidebar-footer',
		'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'qucreative' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s sidebar-block">',
		'after_widget'  => '</div>',
		'before_title'  => $h_wrap_start,
		'after_title'   => $h_wrap_end,
	) );
}







/**
 * Customizer additions.
 *
 */
require QUCREATIVE_THEME_DIR . 'inc/customizer.php';







function qucreative_render_admin_settings(){


	global $qucreative_theme_data;

	$js_opts = '
	    window.qucreative_settings = {
		    lang_edit: "'. esc_html__("Edit",'qucreative').'"
                ,lang_title: "'. esc_html__("Title",'qucreative').'"
                ,lang_description: "'. esc_html__("Description",'qucreative').'"
                ,lang_aligment: "'. esc_html__("Aligment",'qucreative').'"
                ,lang_left: "'. esc_html__("Left",'qucreative').'"
                ,lang_right: "'. esc_html__("Right",'qucreative').'"
                ,lang_add_new: "'. esc_html__("Add New",'qucreative').'"
                ,lang_delete: "'. esc_html__("Delete",'qucreative').'"
                ,lang_save_as_preset: "'. esc_html__("Save as Preset",'qucreative').'"
                ,lang_are_you_sure: "'. esc_html__("Are you sure",'qucreative').'"
                ,menu_type: "'. $qucreative_theme_data['menu_type'].'"
                ,admin_url: "'. admin_url().'"
            }';

	wp_add_inline_script('qucreative.admin',$js_opts);
}





function qucreative_init() {



	global $qucreative_theme_data;



	add_editor_style();
	add_theme_support('post-thumbnails');

	// -- Add default posts and comments RSS feed links to head
	add_theme_support('automatic-feed-links');
	add_theme_support('menus');

	set_post_thumbnail_size(160, 160, true);

	// -- Make theme available for translation
	// -- Translations can be filed in the /languages/ directory
	load_theme_textdomain('qucreative', get_parent_theme_file_path('languages'));

	$locale = get_locale();
	$locale_file = get_parent_theme_file_path('languages/$locale.php');

	if (is_readable($locale_file)){
		require_once( $locale_file );
	}

	// -- This theme uses wp_nav_menu() in one location.
	register_nav_menus(array(
		'primary' => esc_html__('Primary Navigation', 'qucreative'),
	));

	if(isset($_GET['preview']) && $_GET['preview']=='true'){
		$qucreative_theme_data['preview_page'] = true;
		$qucreative_theme_data['page_extra_meta_label'] = '_preview';

	}



	global $vc_manager;
	if ( class_exists('Vc_Manager') &&  ! $vc_manager ) {
		$vc_manager = Vc_Manager::getInstance();
		// -- Load components
		$vc_manager->loadComponents();
	}

	if($vc_manager){

		$vc_manager->setIsAsTheme(true);
	}




	if (is_admin()) {

		$url = get_parent_theme_file_path("assets/google_fonts.data");




		$cont = '';

		ob_start();
		include $url;




		$cont = ob_get_clean();




		$qucreative_theme_data['font_data'] = json_decode($cont);


		$cont = str_replace(array("\r\n", "\r", "\n"), "", $cont);
		$qucreative_theme_data['font_data_str'] = ($cont);

		if(is_array($qucreative_theme_data['font_data_str'])){
			$qucreative_theme_data['font_data_str'] = '';
		}


		if(isset($qucreative_theme_data['font_data']) && isset($qucreative_theme_data['font_data']->items)){
			$qucreative_theme_data['font_data_items'] = $qucreative_theme_data['font_data']->items;
		}



		wp_enqueue_script('media-upload');
		wp_enqueue_script('tiny_mce');
		wp_enqueue_script('qucreative.admin', QUCREATIVE_THEME_URL . 'assets/admin/admin.js', array( 'jquery' ));
		wp_enqueue_style('qucreative.admin', QUCREATIVE_THEME_URL . 'assets/admin/admin.css');




		qucreative_render_admin_settings();





		$fontawesomelink = QUCREATIVE_THEME_URL . 'libs/fontawesome/font-awesome.min.css';
		if(defined("QUCREATIVE_UPLOAD_FONTAWESOME_FROM_CDN") && QUCREATIVE_UPLOAD_FONTAWESOME_FROM_CDN=="ON"){
			$fontawesomelink = 'https://'.'maxcdn'.'bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css';
		}

		wp_enqueue_style( 'fontawesome', $fontawesomelink);


		wp_enqueue_style('qucreative.checkbox', QUCREATIVE_THEME_URL . 'assets/dzscheckbox/dzscheckbox.css');

		wp_enqueue_style('faiconselector', QUCREATIVE_THEME_URL . 'assets/dzsiconselector/dzsiconselector.css');
		wp_enqueue_script('faiconselector', QUCREATIVE_THEME_URL . 'assets/dzsiconselector/dzsiconselector.js', array( 'jquery' ));
		wp_enqueue_script('farbtastic', array( 'jquery' ));
		wp_enqueue_style('farbtastic');



		// -- tinymce buttons
		if (current_user_can('edit_posts') || current_user_can('edit_pages')) {
			if (get_user_option('rich_editing') == 'true') {
				wp_enqueue_script('thickbox');
				wp_enqueue_style('thickbox');

			}
		}
	}else{
		if(stripos($_SERVER["SCRIPT_NAME"], strrchr(wp_login_url(), '/')) !== false){

		}else{

			wp_enqueue_style('qucreative', QUCREATIVE_THEME_URL . 'libs/qucreative/qucreative.min.css');


		}






		if(isset($vc_manager) && $vc_manager){

			wp_enqueue_style('js_composer_front',$vc_manager->assetUrl('css/js_composer.min.css'));
		}




	}


}


function qucreative_get_featured_image($pid){





	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $pid ), 'single-post-thumbnail' );




	if($image){

		if(is_array($image)){
			return $image[0];
		}else{

			return $image;
		}
	}else{
		return '';
	}
}

function qucreative_action_single_after_the_content(){



	global $qucreative_theme_data;
	global $post;



	$fout = '';
	if($post){

		if(is_single()){

			if($post->post_type=='post'){
				$args = array(
					'before'           => '<div class="qucreative-pagination qucreative-pagination--wp_link_pages">',
					'after'            => '</div>',
					'link_before'      => '',
					'link_after'       => '',
					'next_or_number'   => 'number',
					'separator'        => ' ',
					'nextpagelink'     => '',
					'previouspagelink' => '',
					'pagelink'         => '<span class="the-number-con"><span class="the-number h6">%</span></span>',
					'echo'             => 0
				);
				$fout.=wp_link_pages($args);
			}
		}
	}



	$show_extra_post_meta = true;

	if($qucreative_theme_data['post_for_meta']){

		if($qucreative_theme_data['post_for_meta']->ID!=$post->ID){
			$show_extra_post_meta = false;

		}


	}

	if($qucreative_theme_data['content_acts_as_sheet']){
		$fout .= '</div>'.'</div>'.'</div>'.'</div>'.'</div>';



		if(is_single()){
			if($show_extra_post_meta) {
				$fout .= qucreative_check_if_post_meta_below_must_be_added();
			}
		}



		$fout.='</section>';
	}else{

	}



	if($show_extra_post_meta) {

		if(is_single()) {
			$fout .= qucreative_check_if_prev_next_post_must_be_added();
		}
	}


	echo $fout;

}
function qucreative_action_single_before_the_content(){


	global $qucreative_theme_data;



	global $post;
	global $antfarm;
	$content = $post->post_content;

	$fout = '';

	$post_type_for_portfolio = 'antfarm_port_items';

	if(strpos($content,'[vc_section')===false && !($post && ($post->post_type==$post_type_for_portfolio))  && ($qucreative_theme_data['page_type']!='page-portfolio') ){
		$qucreative_theme_data['content_acts_as_sheet'] = true;
	}





	if($post && ($antfarm && $post->post_type==$antfarm->name_port_item)){
		$qucreative_theme_data['content_acts_as_sheet'] = false;

	}



	if($qucreative_theme_data['content_acts_as_sheet']){
		$fout .= '<section class="vc_section the-content-sheet forced-from-no-rows';



		if($post){
			$fout.=' post-type-'.$post->post_type;
		}

		$fout.='"><div class="the-content-sheet-text forced-from-no-rows';


		if($post){
			$fout.=' post-type-'.$post->post_type;
		}

		$fout.='"><div class="vc_row wpb_row vc_row-fluid"><div class="wpb_column vc_column_container vc_col-sm-12"><div class="vc_column-inner "><div class="wpb_wrapper">';
	}

	echo $fout;
}


function qucreative_get_view($template, $type, $pargs=array()){

	global $post;


	global $qucreative_theme_data;

	$margs = array(
		'query_type'=>'page',
		'post_type'=>'post',
		'template_type'=>'normal',
		'type'=>$type,
		'call_from'=>'default',

	);

	if($post){
		$margs['post_type']=$post->post_type;
	}

	if($pargs && is_array($pargs)){
		$margs = array_merge($margs,$pargs);
	}



	if($type=='content_page'){


		if($margs['template_type']=='normal'){





		}


		// -- content page


		while ( have_posts() ){

			the_post();

			if ( current_user_can('edit_posts') )  {
				echo  "<a class='edit-btn edit-btn-for-content_page custom-a' href=\"".get_edit_post_link($post->ID).'">'.esc_html__("Edit",'qucreative').'</a>';
			}


			if( !( ( $post->post_type == 'antfarm_port_items') && get_post_meta( $post->ID, 'qucreative_'.'meta_is_fullscreen', true ).$qucreative_theme_data['page_extra_meta_label']=='on') ){

				echo qucreative_generate_featured_media($post->ID);
			}




			if($post && ( $post->post_type == 'antfarm_port_items') && get_post_meta( $post->ID, 'qucreative_'.'meta_is_fullscreen'.$qucreative_theme_data['page_extra_meta_label'], true )!='on'){


				echo '<div class="post-content-con the-content-sheet-text post-content-con-type-antfarm_port_items  desc-content-wrapper ">';
				echo '<div class="row from-antfarm_port_items-meta"><div class="col-md-4 from-antfarm_port_items-meta from-functions ">';



				echo '<h3 class="main-portfolio-single-title h-group-2" style="">'.$post->post_title.'</h3>';

				if(get_post_meta($post->ID, 'qucreative_'.'meta_port_subtitle'.$qucreative_theme_data['page_extra_meta_label'],true)){
					echo '<div class="portfolio-single-subtitle font-group-1">'.get_post_meta($post->ID, 'qucreative_'.'meta_port_subtitle'.$qucreative_theme_data['page_extra_meta_label'],true).'</div>';



					echo qucreative_generate_portfolio_item_blockquote($post->ID);
				}


				echo '</div><!--end .col-md-4-->';
				echo '<div class="col-md-8 from-antfarm_port_items-meta">';
			}



			$post_type = 'page';



			if($post && $post->post_type=='post'){

				$title = $post->post_title;


				if (get_post_meta($post->ID,'qucreative_'.'meta_custom_title'.$qucreative_theme_data['page_extra_meta_label'],true)) {
					$title = get_post_meta($post->ID,'qucreative_'.'meta_custom_title'.$qucreative_theme_data['page_extra_meta_label'],true);
				}



				$link = get_permalink($post->ID);





				echo '<section class="vc_section  from-post-type "><div class="the-content-sheet">';




				echo '<div class="post-main-link-con" style=""><div class="custom-a post-main-link ajax-link h-group-2" >'.$title.'</div></div>';


				echo qucreative_get_post_meta(array(
					'call_from'=>'single_post'
				));

				echo '</div></section>';


				$post_type = $post->post_type;


			}
			// -- Include the page content template.
			do_action('qucreative_single_before_the_content');
			get_template_part( 'content', $post_type );
			do_action('qucreative_single_after_the_content');


			if($post && ( $post->post_type == 'antfarm_port_items') && get_post_meta( $post->ID, 'qucreative_'.'meta_is_fullscreen'.$qucreative_theme_data['page_extra_meta_label'], true )!='on'){

				echo '</div><!--end .col-md-8-->';
				echo '</div><!--end .row-->';
			}


			if($post && ( $post->post_type == 'antfarm_port_items') ){




				$social_shares = qucreative_get_social_shares();


				// -- if it's fullscreen then we already have the social shares
				if(get_post_meta( $post->ID, 'qucreative_'.'meta_is_fullscreen', true )!='on'){
					if($social_shares){
						echo '<div class="social-con">'.$social_shares.'</div><!-- social con for portfolio item normal -->';
					}
				}





			}
			if($post && ( $post->post_type == 'antfarm_port_items') && get_post_meta( $post->ID, 'qucreative_'.'meta_is_fullscreen'.$qucreative_theme_data['page_extra_meta_label'], true )!='on') {
				echo '</div><!--end .the-content-sheet-text-->';
			}




			?>
            <!-- end post-content-con -->
			<?php


			if($qucreative_theme_data['post_content_has_translucent_layer']){
				echo '</div><!-- end translucent-layer-->';
			}






			if( $qucreative_theme_data['post_for_meta']->post_type=='antfarm_port_items'){

				if(get_post_meta( $qucreative_theme_data['post_for_meta']->ID, 'qucreative_'.'meta_is_fullscreen'.$qucreative_theme_data['page_extra_meta_label'], true )!='on') {
					echo qucreative_generate_prev_next_table();
				}
			}


			// -- If comments are open or we have at least one comment, load up the comment template.








			if ( $qucreative_theme_data['post_for_meta'] && ($qucreative_theme_data['post_for_meta']->post_type=='post' || $qucreative_theme_data['post_for_meta']->post_type=='page') && ($qucreative_theme_data['post_for_meta']->comment_status =='open' || intval($qucreative_theme_data['post_for_meta']->comment_count) ) ){


				echo '<div class="the-content-sheet the-content-sheet-for-comments">';
				comments_template();
				echo '</div>';
			}

			// End the loop.
		}

		if($margs['template_type']=='normal') {

		}

	}
	if($type=='loop'){

		global $wp_query;



		$searched_query = '';

		$font_type = 'h-group-2';

		if($margs['type']=='search'){
			$searched_query = get_search_query();
		}
		if($margs['type']=='archive'){
			$searched_query = single_cat_title( '', false );
			$font_type = 'h3';
		}

		if($searched_query){

			echo '<div class="searched-query '.$font_type.'">'. $searched_query.'</div>';

		}



		$i31 = 0;
		while (have_posts()){

			the_post();



			$img = '';
			if($post){
				$img = qucreative_get_featured_image($post->ID);

			}


			$featured_media = '';

			if($img){
				$featured_media = $img;
			}


			echo '<!-- the-content-sheet start --><article class="the-content-sheet blog-single-block';

			if($i31==0){
				echo ' first-loop-post';
			}

			if($featured_media==false){
				echo ' does-not-have-featured-media';
			}else{
				echo ' has-media';
			}




			$arr = get_post_class('', $post->ID);


			foreach ($arr as $pc){
				echo ' '.$pc;
			}

			echo '">';

			if ( current_user_can('edit_posts') )  {
				echo  "<a class='edit-btn custom-a' href=\"".get_edit_post_link($post->ID).'">'.esc_html__("Edit",'qucreative').'</a>';
			}


			echo qucreative_generate_featured_media($post->ID);


			echo '<div class="post-content-con">';




			$title = $post->post_title;


			if (get_post_meta($post->ID,'qucreative_'.'meta_custom_title'.$qucreative_theme_data['page_extra_meta_label'],true) && get_post_meta($post->ID,'qucreative_'.'meta_custom_title'.$qucreative_theme_data['page_extra_meta_label'],true)!=' ') {
				$title = get_post_meta($post->ID,'qucreative_'.'meta_custom_title'.$qucreative_theme_data['page_extra_meta_label'],true);
			}





			$link = get_permalink($post->ID);






			echo '<div class="post-main-link-con from-q-get-view" style=""><a class="custom-a post-main-link ajax-link h-group-2 donotchange-ajax-menu" href="'.$link.'">'.$title.'</a></div>';


			echo qucreative_get_post_meta();

			echo '<hr class="extend-margin-30">';

			// Include the page content template.
			echo '<div class="paragraph paragraph-from-excerpt">';



			if(strpos($post->post_content,'<!--more')!==false){

				$my_excerpt = get_the_content('{{replacewithreadmoretagtext}}',true);
			}else{

				$my_excerpt = get_the_excerpt();
			}

			if ( '' != $my_excerpt ) {



			}
			echo $my_excerpt;
			echo '</div>';



			echo '</div>';

			echo '</article><!-- end content sheet -->';

			// -- End the loop.
			$i31++;
		}

		if(isset($wp_query->posts) && is_array($wp_query->posts) && count($wp_query->posts)==0){

			get_template_part('content', 'none');
		}

		echo qucreative_pagination($wp_query->max_num_pages,5,array(

			'container_class'=>'qucreative-pagination from-loop',
			'include_raquo'=>false,
			'a_class'=>'pagination-link ajax-link custom-a ajax-link--blog-page bg-color-hg-on-hover color-hg-on-parent-active donotchange-ajax-menu h6',
			'style'=>'ul',
			'wrap_before_text'=>'<span class="the-number">',
			'wrap_after_text'=>'</span>',
		));





		ob_start();
		posts_nav_link();

		ob_end_clean();

	}


	if($type=='footer') {



	}


}


$qucreative_theme_data['plugins'] =  array(
	// This is an example of how to include a plugin pre-packaged with a theme
	array(
		'name'          => 'WPBakery Page Builder', // The plugin name
		'slug'          => 'js_composer', // The plugin slug (typically the folder name)
		'source'            => get_parent_theme_file_path('plugins/js_composer.zip'), // The plugin source
		'required'          => true, // If false, the plugin is only 'recommended' instead of required
		'version'           => '5.4.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
		'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
		'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
		'external_url'      => '', // If set, overrides default API URL and points to an external URL
	),
	array(
		'name'          => 'Antfarm Shortcodes', // The plugin name
		'slug'          => 'antfarm_shortcodes', // The plugin slug (typically the folder name)
		'source'            => get_parent_theme_file_path('plugins/antfarm_shortcodes.zip'), // The plugin source
		'required'          => true, // If false, the plugin is only 'recommended' instead of required
		'version'           => '1.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
		'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
		'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
		'external_url'      => '', // If set, overrides default API URL and points to an external URL
	),
	array(
		'name'          => 'Revolution Slider', // The plugin name
		'slug'          => 'revslider', // The plugin slug (typically the folder name)
		'source'            => get_parent_theme_file_path('plugins/revslider.zip'), // The plugin source
		'required'          => false, // If false, the plugin is only 'recommended' instead of required
		'version'           => '5.4.6', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
		'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
		'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
		'external_url'      => '', // If set, overrides default API URL and points to an external URL
	),
);






require_once get_parent_theme_file_path('assets/tgm/class-tgm-plugin-activation.php');











function qucreative_register_required_plugins() {

	global $qucreative_theme_data;
	$config = array(
		'id'           => 'qucreative',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.


	);

	tgmpa( $qucreative_theme_data['plugins'], $config );
}







if(function_exists('qucreative_filter_get_only_url_of_author_link')==false){
function qucreative_filter_get_only_url_of_author_link($arg){


	preg_match("/href=['|\"](.*?)['|\"]/i", $arg, $matches);


	if($matches && isset($matches[1])){

		return $matches[1];
    }else{
	    return '';
    }
}
}



if(function_exists('qucreative_get_avatar_url')==false){
	function qucreative_get_avatar_url($get_avatar){
		preg_match("/src='(.*?)'/i", $get_avatar, $matches);
		return $matches[1];
	}
}

if ( ! class_exists( 'QuCreative_Comments_Walker' ) ){

	class QuCreative_Comments_Walker extends Walker_Comment {


		public function start_el( &$output, $comment, $depth = 0, $args = array(), $id = 0 )
		{

			$depth++;
			$GLOBALS['comment_depth'] = $depth;
			$GLOBALS['comment'] = $comment;

			if ( !empty( $args['callback'] ) ) {
				ob_start();
				call_user_func( $args['callback'], $comment, $args, $depth );
				$output .= ob_get_clean();
				return;
			}

			if ( ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) && $args['short_ping'] ) {
				ob_start();
				$this->ping( $comment, $depth, $args );
				$output .= ob_get_clean();
			} elseif ( 'html5' === $args['format'] ) {
				ob_start();
				if ( !empty( $args['has_children'] ) ) {
					$this->html5_comment( $comment, $depth, $args ,true );
				} else {
					$this->html5_comment( $comment, $depth, $args );
				}
				$output .= ob_get_clean();
			} else {
				ob_start();
				$this->comment( $comment, $depth, $args );
				$output .= ob_get_clean();
			}
		}



		public function end_el( &$output, $comment, $depth = 0, $args = array() ){
			if ( !empty( $args['end-callback'] ) ) {
				ob_start();
				call_user_func( $args['end-callback'], $comment, $args, $depth );
				$output .= ob_get_clean();
				return;
			}

			if ( !empty( $args['has_children'] ) && 'html5' === $args['format']) {
				ob_start();
				$this->end_parent_html5_comment( $comment, $depth, $args );
				$output .= ob_get_clean();
			} else {
				if ( 'div' == $args['style'] ) {
					$output .= "</div>";
				} else {
					$output .= "</li>";
				}
			}
		}





		protected function html5_comment( $comment, $depth, $args, $is_parent = false ){

			global $qucreative_theme_data;


			$type = get_comment_type();

			$comment_classes = array();
			$comment_classes[] = 'media';

			// if it's a parent
			if ( $this->has_children ) {
				$comment_classes[] = 'parent';
				$comment_classes[] = 'has-children';
			}

			// if it's a child
			if ( $comment->comment_parent > 0 ) {
				$comment_classes[] = 'child';
				$comment_classes[] = 'has-parent';
				$comment_classes[] = 'parent-' . $comment->comment_parent;
			}





			if ( 'div' === $args['style'] ) {
				$tag       = 'div';
				$add_below = 'comment';
			} else {
				$tag       = 'li';
				$add_below = 'div-comment';
			}


			$avatar_url = qucreative_get_avatar_url(get_avatar( $comment->comment_author_email, $args['avatar_size'] ));



			$author_display_name = $comment->comment_author;






			$author=get_userdata($comment->user_id);

			if(isset($author->display_name) && $author->display_name){

				$author_display_name = $author->display_name;
			}



			$comment_class = get_comment_class( empty( $args['has_children'] ) ? '' : 'parent' );


			$comment_class_str = ' ';
			foreach ($comment_class as $cci){
				$comment_class_str.= ' '.$cci;
			}


			$comment_type = 'comment';

			if(strpos($comment_class_str,'pingback')!==false){
				$comment_type = 'pingback';
			}

			if(strpos($comment_class_str,'trackback')!==false){
				$comment_type = 'trackback';
			}

			$comment_classes = apply_filters( 'wp_bootstrap_comment_class', $comment_classes, $comment, $depth, $args );

			$class_str = implode(' ', $comment_classes);






			$author_link_url = apply_filters( 'qucreative_get_only_url_of_author_link',get_comment_author_link( $comment ));


			if($comment_type=='pingback' || $comment_type=='trackback') {
				?><div id="pingback-<?php comment_ID() ?>" class="pingback-inner h6"><?php
				echo '<span class="color-highlight">'.esc_html__("Pingback",'qucreative').':</span> ';
				comment_author_link( $comment ); ?> &nbsp;&nbsp; <?php edit_comment_link( esc_html__( 'Edit','qucreative' ), '<span class="edit-link">', '</span>' ); ?>
                </div><?php
			}else{

				?>
                <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $class_str, $comment ); ?>>

                <article id="div-comment-<?php comment_ID(); ?>" class="">

                    <div class="comment-meta">
						<?php
						if ( 0 != $args['avatar_size'] && 'pingback' !== $comment_type && 'trackback' !== $comment_type ) {
							?>
                        <div class="comment-thumb" style="background-image: url(<?php echo $avatar_url; ?>);"></div><?php
						}
						?>
                        <div class="comment-other-meta">
							<?php


							$author_link_tag = '';
							if($author_link_url){

								$author_link_tag = 'a';
								echo '<a href="'.$author_link_url.'"';
							}else{

								$author_link_tag = 'div';
								echo '<div ';
							}
							echo ' class="h6 custom-a author-name ';
							if($author_link_url){
								echo ' color-highlight-on-hover';
							}
							echo '">';
							echo $author_display_name;
							echo '</'.$author_link_tag.'>';

							?>
                            <span class="comment-time font-group-3"><?php echo wp_kses( sprintf( __( '%1$s at %2$s', 'qucreative' ), get_comment_date(), get_comment_time() ), $qucreative_theme_data['allowed_html_tags'] ); ?><?php edit_comment_link( ' (' . esc_html__( "Edit", 'qucreative' ) . ')', '', '' ); ?></span>
                        </div>
                    </div>
                    <div class="comment-body">
						<?php comment_text(); ?>
                    </div><!-- .reply -->

                    <div class="comment-right-meta">
                <span class="meta-comment-reply h-group-1"><?php comment_reply_link( array_merge( $args, array(
		                'add_below' => $add_below,
		                'depth'     => $depth,
		                'max_depth' => $args['max_depth'],
		                'before'    => ''
	                ) ) ); ?></span>
                    </div>
                    <div class="clear"></div>


					<?php if ( $comment->comment_approved == '0' ) {?>
                        <em class="comment-awaiting-moderation"><?php echo esc_html__( "Your comment is awaiting moderation.", 'qucreative' ); ?></em>
					<?php } ?>

                </article><!-- end article -->


				<?php
			}
		}


		protected function end_parent_html5_comment( $comment, $depth, $args )
		{
			$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
			?>
            </<?php echo $tag; ?>><!-- end parent -->


			<?php
		}





	}
}






function qucreative_get_post_meta($pargs=array()){


	global $post;
	$margs = array(

		'call_from'=>'default',
		'get_categories'=>'off',
		'post_id'=>'',
		'separator'=>' / ',
		'include_posted_on'=>true,

	);

	if($pargs){
		$margs = array_merge($margs, $pargs);
	}


	if($margs['post_id']){
		$post = get_post($margs['post_id']);
	}else{

	}


	$fout = '';

	$cats = wp_get_post_categories($post->ID);
	$comments_count = wp_count_comments( $post->ID );

	$cats_str = '';

	if(is_array($cats) && isset($cats[0]) && $cats[0]!=1){

		$cats_str = $margs['separator'].esc_html__("in",'qucreative').' ';

		$i3 = 0;

		foreach ($cats as $catid){
			$cat = get_category($catid);



			if($i3>0){
				$cats_str.=', ';
			}

			$cats_str.='<a class="ajax-link ajax-link--cat custom-a" href="'.get_category_link($catid).'">';
			$cats_str.=$cat->name;
			$cats_str.='</a>';

			$i3++;
		}
	}


	$pfx_date = get_the_date( 'F j Y', $post->id );
	$fout.= '<div class="post-meta font-group-7">';

	if($margs['include_posted_on']){
		$fout.=esc_html__("Posted on",'qucreative').' ';
	}

	$fout.=$pfx_date;

	if($cats_str){
		$fout.= $cats_str;
	}

	$link = get_permalink($post->id);

	$link_comments = $link.'#comments';


	if($margs['call_from']=='single_post'){
		$link_comments = '#comments';
	}


	if($margs['get_categories']=='on'){

	}

	if($comments_count->total_comments){




	    $str_nr_comments = '';
		if($comments_count->total_comments==1){
		    $str_nr_comments = sprintf( esc_html__( '%s comment' ,'qucreative'), $comments_count->total_comments );
		}else{

			$str_nr_comments = sprintf( esc_html__( '%s comments' ,'qucreative'), $comments_count->total_comments );
        }


		$fout.= $margs['separator'].' <a class="ajax-link custom-a" href="'.$link_comments.'">'.$str_nr_comments.'</a>';



    }


	$fout.='</div><!--end .post-meta-->';

	return $fout;

}


function qucreative_enqueue_google_font($nam, $family, $weights){

	$nam = qucreative_clean($nam);
	wp_enqueue_style($nam, add_query_arg( 'family',  $family.':'.urlencode( $weights ), "//fonts.googleapis.com/css" ));
}

function qucreative_get_sidebar($pargs=array()){


	$margs = array(

		'sidebar_name'=>'sidebar-1',

	);

	if($pargs){
		$margs = array_merge($margs, $pargs);
	}

	global $post;
	global $qucreative_theme_data;




	$sidebar = '';
	if($qucreative_theme_data['post_for_meta']){
		if(get_post_meta($qucreative_theme_data['post_for_meta']->ID, 'qucreative_'.'meta_use_sidebar'.$qucreative_theme_data['page_extra_meta_label'],true) == 'on'){
			$sidebar = $margs['sidebar_name'];
		}
	}

	if(is_home() || is_search() || is_archive()){
		$sidebar = $margs['sidebar_name'];
	}


	if(isset($qucreative_theme_data['post_for_meta']) && isset($qucreative_theme_data['post_for_meta']->ID) && isset($post) && isset($post->ID)){
		if($qucreative_theme_data['post_for_meta']->ID===$post->ID){
			if($post->post_type=='post'){

				$sidebar = $margs['sidebar_name'];
			}
		}
	}


	$sidebars_widgets = wp_get_sidebars_widgets();
	if(isset($sidebars_widgets[ $sidebar ]) && count( (array) $sidebars_widgets[ $sidebar ])==0){
		$sidebar = null;
	}



	if($qucreative_theme_data['post_for_meta']){
		if(get_post_meta($qucreative_theme_data['post_for_meta']->ID, 'qucreative_'.'meta_use_sidebar'.$qucreative_theme_data['page_extra_meta_label'],true) == 'off'){
			$sidebar = null;
		}
	}



	return $sidebar;
}

function qucreative_filter_body_classes( $classes, $class ) {


	$classes[] = 'qucreative';


	global $qucreative_theme_data;






	global $wp_query;






	global $antfarm;





	if($wp_query ){
		if(isset($wp_query->query_vars)){


			if($antfarm && isset($wp_query->query_vars[$antfarm->name_port_item_cat])){

				$qucreative_theme_data['body_class'].=' page-type-archive';
			}
		}
	}


	if( $qucreative_theme_data['menu_type']=='menu-type-13' || $qucreative_theme_data['menu_type']=='menu-type-14' || $qucreative_theme_data['menu_type']=='menu-type-15' || $qucreative_theme_data['menu_type']=='menu-type-16' || $qucreative_theme_data['menu_type']=='menu-type-17' || $qucreative_theme_data['menu_type']=='menu-type-18'){
		$qucreative_theme_data['body_class'].=' qucreative-submenu-style-highlight-color';




	}


	if($qucreative_theme_data['menu_type']=='menu-type-9' || $qucreative_theme_data['menu_type']=='menu-type-10' || $qucreative_theme_data['menu_type']=='menu-type-13' || $qucreative_theme_data['menu_type']=='menu-type-14' || $qucreative_theme_data['menu_type']=='menu-type-15' || $qucreative_theme_data['menu_type']=='menu-type-16' || $qucreative_theme_data['menu_type']=='menu-type-17' || $qucreative_theme_data['menu_type']=='menu-type-18'){
		$qucreative_theme_data['body_class'].=' qucreative-horizontal-menu';


		$qucreative_theme_data['menu_type_attr']='qucreative-horizontal-menu';
	}


	if($qucreative_theme_data['post_for_meta']) {
		if (get_post_meta($qucreative_theme_data['post_for_meta']->ID, '_wp_page_template', true) == 'template-portfolio.php' && get_post_meta($qucreative_theme_data['post_for_meta']->ID, 'qucreative_'.'meta_is_fullscreen'.$qucreative_theme_data['page_extra_meta_label'], true) == 'on') {
			$qucreative_theme_data['body_class'] .= ' with-fullbg ';

		}
	}




	$page_type = '';



	$page_type = 'page-normal';

	if($qucreative_theme_data['post_for_meta']){
		if(get_post_meta( $qucreative_theme_data['post_for_meta']->ID, '_wp_page_template', true )=='template-qucreative-slider.php'){
			$page_type = 'page-homepage';
		}
		if(get_post_meta( $qucreative_theme_data['post_for_meta']->ID, '_wp_page_template', true )=='template-portfolio.php'){
			$page_type = 'page-portfolio';
		}
		if(get_post_meta( $qucreative_theme_data['post_for_meta']->ID, '_wp_page_template', true )=='template-gallery-creative.php'){
			$page_type = 'page-gallery-w-thumbs';
		}
	}

	if(is_home() || is_search() || is_archive()){
		$page_type = 'page-blogsingle';
	}

	if(is_single()){
		if($qucreative_theme_data['post_for_meta']){
			if($qucreative_theme_data['post_for_meta']->post_type=='post'){

				$page_type = 'page-blogsingle';
			}
		}
	}

	if( qucreative_get_theme_mod_and_sanitize('menu_horizontal_shadow_style') && qucreative_get_theme_mod_and_sanitize('menu_horizontal_shadow_style')!='none' ){

		$qucreative_theme_data['body_class'].= ' menu_horizontal_'.qucreative_get_theme_mod_and_sanitize('menu_horizontal_shadow_style');
	}



	$post_type_for_portfolio = 'antfarm_port_items';

	if($antfarm && isset($antfarm->name_port_item)){
		$post_type_for_portfolio = $antfarm->name_port_item;
	}



	if($qucreative_theme_data['post_for_meta'] && $qucreative_theme_data['post_for_meta']->post_type==$post_type_for_portfolio){

		$page_type=' page-portfolio-single ';
		$page_type.=' page-portfolio-type-'.esc_attr(get_post_meta($qucreative_theme_data['post_for_meta']->ID,'qucreative_'.'meta_post_media_type'.$qucreative_theme_data['page_extra_meta_label'],true));

		if(get_post_meta( $qucreative_theme_data['post_for_meta']->ID, 'qucreative_'.'meta_is_fullscreen'.$qucreative_theme_data['page_extra_meta_label'], true )=='on'){



			if($antfarm){

				$page_type.=' single-'.$antfarm->name_port_item.'-fullscreen';
			}
		}else{



			if($antfarm) {

				$page_type .= ' single-'.$antfarm->name_port_item.'_port_items-notfullscreen';
			}
		}


	}






	if($qucreative_theme_data['post_for_meta']){
		$page_type.= ' post-media-type-'.esc_attr(get_post_meta($qucreative_theme_data['post_for_meta']->ID,'qucreative_'.'meta_post_media_type'.$qucreative_theme_data['page_extra_meta_label'],true));

	}

	if($qucreative_theme_data['theme_mods']['menu_is_sticky']=='on'){
		$qucreative_theme_data['body_class'].=' menu-is-sticky';

	}

	$qucreative_theme_data['body_class'].= ' '.$page_type.'    ';





	$qucreative_theme_data['body_class'].= ' '.'scrollbar-type-native';



	$qucreative_theme_data['body_class'].= ' '. $qucreative_theme_data['menu_type'];



	if($qucreative_theme_data['menu_type']=='' || $qucreative_theme_data['menu_type']=='menu-type-1' || $qucreative_theme_data['menu_type']=='menu-type-2' || $qucreative_theme_data['menu_type']=='menu-type-3' || $qucreative_theme_data['menu_type']=='menu-type-4'){
		$qucreative_theme_data['body_class'].=' qucreative-vertical-menu';
		$qucreative_theme_data['menu_type_attr']='qucreative-vertical-menu';
	}
	if($qucreative_theme_data['menu_type']=='menu-type-5' || $qucreative_theme_data['menu_type']=='menu-type-6'){
		$qucreative_theme_data['body_class'].=' qucreative-ribbon-menu';
	}
	if($qucreative_theme_data['menu_type']=='menu-type-11' || $qucreative_theme_data['menu_type']=='menu-type-12'){
		$qucreative_theme_data['body_class'].=' qucreative-overlay-menu';
	}
	if($qucreative_theme_data['menu_type']=='menu-type-2' || $qucreative_theme_data['menu_type']=='menu-type-4' || $qucreative_theme_data['menu_type']=='menu-type-6' || $qucreative_theme_data['menu_type']=='menu-type-8' || $qucreative_theme_data['menu_type']=='menu-type-10'  || $qucreative_theme_data['menu_type']=='menu-type-14' || $qucreative_theme_data['menu_type']=='menu-type-16' || $qucreative_theme_data['menu_type']=='menu-type-18'){
		$qucreative_theme_data['body_class'].=' qucreative-light-menu';
	}





	if($qucreative_theme_data['post_for_meta'] && get_post_meta( $qucreative_theme_data['post_for_meta']->ID, 'qucreative_'.'meta_is_fullscreen'.$qucreative_theme_data['page_extra_meta_label'], true )!='on'){
		$qucreative_theme_data['body_class'].= ' '. $qucreative_theme_data['theme_mods']['content_align'];
	}

	$page_title_align = qucreative_get_theme_mod_and_sanitize('page_title_align');







	if( qucreative_get_theme_mod_and_sanitize('menu_horizontal_shadow_style') && qucreative_get_theme_mod_and_sanitize('menu_horizontal_shadow_style')!='none' ){

		$qucreative_theme_data['body_class'].= ' menu_horizontal_'.qucreative_get_theme_mod_and_sanitize('menu_horizontal_shadow_style');
	}

	if($qucreative_theme_data['post_for_meta'] && ( $qucreative_theme_data['post_for_meta']->post_type=='antfarm_port_items')  ){

		$page_type=' page-portfolio-single ';
		$page_type.=' page-portfolio-type-'.get_post_meta($qucreative_theme_data['post_for_meta']->ID,'qucreative_'.'meta_post_media_type'.$qucreative_theme_data['page_extra_meta_label'],true);





	}


	if($qucreative_theme_data['post_for_meta']){


		if(get_post_meta($qucreative_theme_data['post_for_meta']->ID,'qucreative_'.'meta_post_media_type'.$qucreative_theme_data['page_extra_meta_label'],true)){

			$qucreative_theme_data['body_class'].= ' post-media-type-'.esc_attr(get_post_meta($qucreative_theme_data['post_for_meta']->ID,'qucreative_'.'meta_post_media_type'.$qucreative_theme_data['page_extra_meta_label'],true));
		}

	}



	if($qucreative_theme_data['sw_is_in_customizer']){
		$lab = 'content_enviroment_style';

		$qucreative_theme_data['theme_mods'][$lab] = qucreative_get_theme_mod_and_sanitize($lab);
	}

	$qucreative_theme_data['body_class'].= ' '. 'first-transition';
	$qucreative_theme_data['body_class'].= ' '. esc_attr($page_title_align);
	$qucreative_theme_data['body_class'].= ' '. qucreative_get_theme_mod_and_sanitize('page_title_style');
	$qucreative_theme_data['body_class'].= ' '. esc_attr($qucreative_theme_data['theme_mods']['content_enviroment_style']);


	if( $qucreative_theme_data['theme_mods']['menu_enviroment_opacity']=='100'){
		$qucreative_theme_data['body_class'].=' has-opaque-header-opacity';
	}
	if( $qucreative_theme_data['theme_mods']['content_enviroment_opacity']=='100'){
		$qucreative_theme_data['body_class'].=' has-opaque-content-opacity';
	}








	$classes[] = $qucreative_theme_data['body_class'];

	return $classes;
}











function qucreative_get_social_shares() {


	$fout = '';

	$lab = 'social_enable_facebook_share';


	global $qucreative_theme_data;



	if(isset($qucreative_theme_data['theme_mods'][$lab]) && $qucreative_theme_data['theme_mods'][$lab]=='1'){
		$fout.= '<a class="social-icon custom-a" href="#"  onclick=\'window.qcre_open_social_link("http://www.facebook.com/sharer.php?u={{replaceurl}}"); return false;\'><i class="fa fa-facebook-square"></i><span class="the-tooltip">'.esc_html__("SHARE ON FACEBOOK",'qucreative').'</span></a>';
	}

	$lab = 'social_enable_twitter_share';

	if(isset($qucreative_theme_data['theme_mods'][$lab]) && $qucreative_theme_data['theme_mods'][$lab]=='1'){
		$fout.= '<a class="social-icon custom-a" href="#" onclick=\'window.qcre_open_social_link("http://twitter.com/share?url={{replaceurl}}&amp;text=Check this out!&amp;via=campaignmonitor&amp;related=yarrcat"); return false;\'><i class="fa fa-twitter"></i><span class="the-tooltip">'.esc_html__("SHARE ON TWITTER",'qucreative').'</span></a>';
	}

	$lab = 'social_enable_gplus_share';

	if(isset($qucreative_theme_data['theme_mods'][$lab]) && $qucreative_theme_data['theme_mods'][$lab]=='1'){
		$fout.= '<a class="social-icon custom-a" href="#" onclick=\'window.qcre_open_social_link("https://plus.google.com/share?url={{replaceurl}}"); return false; \'><i class="fa fa-google-plus-square"></i><span class="the-tooltip">'.esc_html__("SHARE ON GOOGLE PLUS",'qucreative').'</span></a>';
	}

	$lab = 'social_enable_linkedin_share';

	if(isset($qucreative_theme_data['theme_mods'][$lab]) && $qucreative_theme_data['theme_mods'][$lab]=='1'){
		$fout.= '<a class="social-icon custom-a" href="#" onclick=\'window.qcre_open_social_link("https://www.linkedin.com/shareArticle?mini=true&url=mysite&title=Check%20this%20out%20{{replaceurl}}&summary=&source={{replaceurl}}"); return false; \'><i class="fa fa-linkedin"></i><span class="the-tooltip">'.esc_html__("SHARE ON LINKEDIN",'qucreative').'</span></a>';
	}

	$lab = 'social_enable_pinterest_share';

	if(isset($qucreative_theme_data['theme_mods'][$lab]) && $qucreative_theme_data['theme_mods'][$lab]=='1'){
		$fout.= '<a class="social-icon custom-a" href="#" onclick=\'window.qcre_open_social_link("http://pinterest.com/pin/create/button/?url={{replaceurl}}&amp;text=Check this out!&amp;via=campaignmonitor&amp;related=yarrcat"); return false;\'><i class="fa fa-pinterest"></i><span class="the-tooltip">'.esc_html__("SHARE ON PINTEREST",'qucreative').'</span></a>';
	}

	return $fout;
}



















if(function_exists('qucreative_sanitize_term_slug_to_id')==false){
	function qucreative_sanitize_term_slug_to_id($arg,$taxonomy_name=''){


		if($taxonomy_name==''){
			global $antfarm;

			$taxonomy_name=$antfarm->name_port_item_cat;
		}

		if(is_numeric($arg)){

		}else{

			$term = get_term_by('slug', $arg, $taxonomy_name);

			if($term){
				$arg = $term->term_id;
			}

		}


		return $arg;
	}
}


$qucreative_theme_data['template_is_portfolio'] = false;
$qucreative_theme_data['page_is_fullscreen'] = false;
$qucreative_theme_data['template_is_portfolio_skin'] = '';
$qucreative_theme_data['template_is_portfolio_gap'] = 'theme-column-gap';
$qucreative_theme_data['template_is_portfolio_term_children'] = array();












if(function_exists('qucreative_sanitize_to_size')==false){
	function qucreative_sanitize_to_size($arg){

		if($arg==''){
			return $arg;
		}
		if(strpos($arg,'px')===false&&strpos($arg,'%')===false&&strpos($arg,'auto')===false){
			return $arg.'px';
		}else{
			return $arg;
		}
	}
}
function qucreative_print_real_footer(){

	global $qucreative_theme_data;
	$the_sidebars = wp_get_sidebars_widgets();


	if(count($the_sidebars['sidebar-footer'])){




		?>

        <div class="footer-conglomerate">

			<?php
			if($qucreative_theme_data['post_content_has_translucent_layer']){
				echo '<div class="translucent-layer">';
			}
			?>

            <footer class="upper-footer">
                <div class="row <?php
				if(is_array($the_sidebars['sidebar-footer'])){

					$sw_is_monster = false;



					// -- we'll check widgets that include multiple widgets, to not reduce number of columns
					foreach ($the_sidebars['sidebar-footer'] as $sf){
						if(strpos($sf, 'monster')!==false){
							$sw_is_monster = true;
						}
					}

					if($sw_is_monster == false){

						if(count($the_sidebars['sidebar-footer'])=='3'){
							echo ' three-columns';
						}
						if(count($the_sidebars['sidebar-footer'])=='2'){
							echo ' two-columns';
						}
						if(count($the_sidebars['sidebar-footer'])=='1'){
							echo ' one-column';

						}
					}

				}
				?>">

					<?php

					dynamic_sidebar( 'sidebar-footer' );

					?>

                </div>
            </footer>


			<?php





			$heading_style = qucreative_get_theme_mod_and_sanitize('footer_copyright_textbox_heading_style');



			?>
            <footer class="lower-footer">


				<?php


				if($heading_style==''){
					$heading_style = 'h6';
				}
				$h_wrap_start = '<'.$heading_style.' class=" the-variable-heading footer-copyright">';
				$h_wrap_end = '</'.$heading_style.'>';

				if($heading_style=='h-group-1'||$heading_style=='h-group-2'){

					$h_wrap_start = '<h3 class="the-variable-heading footer-copyright '.$heading_style.'">';
					$h_wrap_end = '</h3>';
				}


				echo $h_wrap_start.wp_kses(get_bloginfo('description'),array(
						'a' => array(
							'href' => array(),
							'title' => array()
						),
						'br' => array(),
						'em' => array(),
						'strong' => array(),
					)).$h_wrap_end;

				?>
            </footer>


			<?php

			if($qucreative_theme_data['post_content_has_translucent_layer']){
				echo '</div>';
			}
			?>
        </div>


		<?php
	}


}

function qucreative_print_footer($pargs = array()){


}

if(!function_exists("qucreative_str_replace_first")){

	function qucreative_str_replace_first($from, $to, $subject, $from_position=0){
		$from = '/'.preg_quote($from, '/').'/';

		$aux1 = '';



		$aux2 = $subject;
		if($from_position>0){



			$aux1 = substr($subject, 0, $from_position);

			$aux2 = substr($subject, $from_position);

		}


		$aux2 = preg_replace($from, $to, $aux2, 1);

		$aux_final = $aux1.$aux2;

		return $aux_final;
	}
}
if(function_exists('qucreative_sanitize_post_name_to_id')==false){

	function qucreative_sanitize_post_name_to_id($arg, $post_type = 'post'){


		if(is_numeric($arg)){

		}else{

			$post = get_page_by_title( $arg, OBJECT, $post_type );
			return $post->ID;

		}


		return $arg;
	}
}
























function qucreative_generate_inline_javascript_for_options() {

	global $post;
	global $qucreative_theme_data;

	$post_for_meta = $post;


	$bg_images = '';
	$force_bg = '';
	$bg_slideshow_time = '0';

	if($qucreative_theme_data['post_for_meta']){
		$post_for_meta = $qucreative_theme_data['post_for_meta'];
	}else{
		if(is_home()){

			if(get_option( 'page_for_posts' )){
				$post_for_meta = get_post(get_option( 'page_for_posts' ));
			}

		}
	}






	if($post_for_meta){




		$lab = 'qucreative_'.'meta_light_bg_image';
		if( $qucreative_theme_data['is_preview_blog'] && ( $qucreative_theme_data['menu_type']=='menu-type-2' || $qucreative_theme_data['menu_type']=='menu-type-4' || $qucreative_theme_data['menu_type']=='menu-type-6' || $qucreative_theme_data['menu_type']=='menu-type-8' || $qucreative_theme_data['menu_type']=='menu-type-10' || $qucreative_theme_data['menu_type']=='menu-type-12' || $qucreative_theme_data['menu_type']=='menu-type-14' || $qucreative_theme_data['menu_type']=='menu-type-16' || $qucreative_theme_data['menu_type']=='menu-type-18' ) && get_post_meta($post_for_meta->ID, 'qucreative_'.'meta_light_bg_image'.$qucreative_theme_data['page_extra_meta_label'],true)  ) {
			$bg_images = '\''.esc_html(get_post_meta($post_for_meta->ID, 'qucreative_'.'meta_light_bg_image'.$qucreative_theme_data['page_extra_meta_label'],true)).'\'';
		}else{

			if(get_post_meta($post_for_meta->ID, 'qucreative_'.'meta_bg_image'.$qucreative_theme_data['page_extra_meta_label'],true)){
				$bg_images = '\''.esc_html(get_post_meta($post_for_meta->ID, 'qucreative_'.'meta_bg_image'.$qucreative_theme_data['page_extra_meta_label'],true)).'\'';
			}
		}
	}








	if($post_for_meta ) {
		if (get_post_meta($post_for_meta->ID, 'qucreative_'.'meta_image_gallery'.$qucreative_theme_data['page_extra_meta_label'], true) && get_post_meta( $post_for_meta->ID, '_wp_page_template', true )!='template-gallery-creative.php') {
			$product_image_gallery = esc_html(get_post_meta($post_for_meta->ID, 'qucreative_'.'meta_image_gallery', true));

			$attachments = array_filter(explode(',', $product_image_gallery));

			if ($attachments) {
				$bg_images = '';


				$i3 = 0;
				foreach ($attachments as $attachment_id) {

					if ($i3 > 0) {
						$bg_images .= ',';
					}

					$img_full = wp_get_attachment_image_src($attachment_id, 'full');

					$bg_images .= '\'' . $img_full[0] . '\'';

					$i3++;

				}
				if(qucreative_get_theme_mod_and_sanitize('bg_slideshow_time')){
					$bg_slideshow_time = intval(qucreative_get_theme_mod_and_sanitize('bg_slideshow_time'));
				}
				if(get_post_meta($post_for_meta->ID, 'qucreative_'.'meta_home_slideshow_time'.$qucreative_theme_data['page_extra_meta_label'], true)){
					$bg_slideshow_time = intval(get_post_meta($post_for_meta->ID, 'qucreative_'.'meta_home_slideshow_time'.$qucreative_theme_data['page_extra_meta_label'], true));
				}



			}
		}
	}


	if($bg_images=='' || $bg_images=="''"){

		$bg_images = '\'#aaaaaa\'';
		$bg_images = '\'#ffffff\'';
	}

	if($post_for_meta){
		if( $qucreative_theme_data['is_preview_blog'] && ( $qucreative_theme_data['menu_type']=='menu-type-2' || $qucreative_theme_data['menu_type']=='menu-type-4' || $qucreative_theme_data['menu_type']=='menu-type-6' || $qucreative_theme_data['menu_type']=='menu-type-8' || $qucreative_theme_data['menu_type']=='menu-type-10' || $qucreative_theme_data['menu_type']=='menu-type-12' || $qucreative_theme_data['menu_type']=='menu-type-14' || $qucreative_theme_data['menu_type']=='menu-type-16' || $qucreative_theme_data['menu_type']=='menu-type-18' ) && get_post_meta($post_for_meta->ID, 'qucreative_'.'meta_light_bg_image'.$qucreative_theme_data['page_extra_meta_label'],true)  ) {


		}else{


		}
	}




	if ($post_for_meta && ( $post_for_meta->post_type == 'antfarm_port_items') && get_post_meta($post_for_meta->ID, 'qucreative_'.'meta_post_media_type'.$qucreative_theme_data['page_extra_meta_label'].$qucreative_theme_data['page_extra_meta_label'], true) == 'image' && get_post_meta( $post_for_meta->ID, 'qucreative_'.'meta_is_fullscreen'.$qucreative_theme_data['page_extra_meta_label'], true )=='on' ) {



		// -- for fullscreen image
		if(get_post_meta($post_for_meta->ID, 'qucreative_'.'meta_post_media'.$qucreative_theme_data['page_extra_meta_label'], true)){


			$bg_images = '\''.esc_attr(get_post_meta($post_for_meta->ID, 'qucreative_'.'meta_post_media'.$qucreative_theme_data['page_extra_meta_label'], true)).'\'';
		}
	}

	if(is_404()){
		$frontpage_id = get_option( 'page_on_front' );

		if($frontpage_id){

			$bg_images = '\''.get_post_meta($frontpage_id, 'qucreative_'.'meta_bg_image'.$qucreative_theme_data['page_extra_meta_label'],true).'\'';

//			echo '$frontpage_id - '.$frontpage_id;
//			echo '$bg_images - '.$bg_images;
        }
    }



	$is_customize_preview= 'off';
	if ( is_customize_preview() ) {
		// -- Output a demo content
		$is_customize_preview= 'on';

	}





	$qucreative_theme_data['js_options'] = array(
		'type'=>'main_options',
		'images_arr'=>$bg_images,
		'enable_ajax'=>$qucreative_theme_data['theme_mods']['enable_ajax'],
		'soundcloud_apikey'=>qucreative_get_theme_mod_and_sanitize('soundcloud_apikey'),
		'bg_isparallax'=>$qucreative_theme_data['theme_mods']['bg_isparallax'],
		'bg_slideshow_time'=>$bg_slideshow_time,
		'bg_transition'=>$qucreative_theme_data['theme_mods']['bg_transition'],
		'site_url'=>site_url(),
		'theme_url'=>QUCREATIVE_THEME_URL,
		'blur_ammount'=>$qucreative_theme_data['theme_mods']['blur_ammount'],
		'width_column'=>$qucreative_theme_data['theme_mods']['width_column'],
		'width_section_bg'=>qucreative_get_theme_mod_and_sanitize('width_section_bg'),
		'width_gap'=>$qucreative_theme_data['theme_mods']['width_gap'],
		'border_width'=>$qucreative_theme_data['theme_mods']['border_width'],
		'border_color'=>$qucreative_theme_data['theme_mods']['border_color'],
		'translate_cancel_comment'=>esc_html__("Cancel reply",'qucreative'),
		'translate_leave_a_comment'=>esc_html__("Leave a comment",'qucreative'),
		'translate_leave_a_comment_to'=>esc_html__("Leave a comment to",'qucreative'),
		'is_customize_preview'=>$is_customize_preview,
		'width_blur_margin'=>$qucreative_theme_data['theme_mods']['width_blur_margin'],
		'gallery_w_thumbs_autoplay_videos'=>'off',
		'enable_native_scrollbar'=>$qucreative_theme_data['theme_mods']['enable_native_scrollbar'],
	);



	if(qucreative_get_theme_mod_and_sanitize('portfolio_page')){

		$qucreative_theme_data['js_options']['portfolio_page_url'] = get_permalink(qucreative_get_theme_mod_and_sanitize('portfolio_page'));


	}

	if(get_option('page_for_posts')){

		$qucreative_theme_data['js_options']['blog_posts_url'] = get_permalink(get_option( 'page_for_posts' ));


	}
	if($qucreative_theme_data['is_preview_blog']){

		$qucreative_theme_data['js_options']['preseter_img_folder'] = 'http://creativewpthemes.net/main-demo-dev/';
	}








	$lab = 'menu_enviroment_opacity';
	$menu_enviroment_opacity = $qucreative_theme_data['theme_mods'][$lab];

	if($qucreative_theme_data['sw_is_in_customizer']){

		$menu_enviroment_opacity = qucreative_get_theme_mod_and_sanitize($lab);
	}
	if ($menu_enviroment_opacity == '') {
		$menu_enviroment_opacity = '';
	}
	$val = floatval($menu_enviroment_opacity) / 100;


	$lab = 'content_enviroment_opacity';
	$content_enviroment_opacity = $qucreative_theme_data['theme_mods'][$lab];


	if($qucreative_theme_data['sw_is_in_customizer']){

		$content_enviroment_opacity = qucreative_get_theme_mod_and_sanitize($lab);
	}

	if ($content_enviroment_opacity == '') {
		$content_enviroment_opacity = '30';
	}


	$qucreative_theme_data['js_options']['content_enviroment_opacity']= $content_enviroment_opacity;
	$qucreative_theme_data['js_options']['menu_enviroment_opacity']= $menu_enviroment_opacity;










	$qucreative_theme_data['js_data_for_inline_options'].=json_encode($qucreative_theme_data['js_options']);








}
function qucreative_generate_inline_css_for_contain() {


	global $qucreative_theme_data;




	$width_col = intval($qucreative_theme_data['theme_mods']['width_column']);
	$width_gap = intval($qucreative_theme_data['theme_mods']['width_gap']);
	$width_blur_margin = intval($qucreative_theme_data['theme_mods']['width_blur_margin']);


	$content_width = $width_col * 12 + $width_gap * 13;;



	if($qucreative_theme_data['post_for_meta'] && get_post_meta( $qucreative_theme_data['post_for_meta']->ID, 'qucreative_'.'meta_is_fullscreen'.$qucreative_theme_data['page_extra_meta_label'], true )=='on' && get_post_meta( $qucreative_theme_data['post_for_meta']->ID, 'qucreative_'.'meta_is_fullscreen_stretch'.$qucreative_theme_data['page_extra_meta_label'], true )=='contain'){
		$content_width = $width_col * 12 + $width_gap * 12;;


		$qucreative_theme_data['css_data_contain'] = '';


		$qucreative_theme_data['css_data_contain'].='
                .the-content-con-for-post-id-'.$qucreative_theme_data['post_for_meta']->ID.' .the-content-sheet-text > .vc_row,.the-content-con-for-post-id-'.$qucreative_theme_data['post_for_meta']->ID.' .the-content-inner > .row-with-sidebar,.the-content-con-for-post-id-'.$qucreative_theme_data['post_for_meta']->ID.' .the-content-sheet-for-sc .feature-overlay > .row, .the-content-con-for-post-id-'.$qucreative_theme_data['post_for_meta']->ID.' .upper-footer > .row,.the-content-con-for-post-id-'.$qucreative_theme_data['post_for_meta']->ID.' .lower-footer > .row, .the-content-inner > .vc_row > .wpb_column > .vc_column-inner, body:not(.responsive-mode-sc) .flex-for-sc{
                    margin-left: auto;
                    margin-right: auto;
                    max-width: '.$content_width.'px;
                }
                body:not(.responsive-mode-sc) .flex-for-sc{

                    max-width: '.($content_width + $width_gap * 1).'px;
                }



                .the-content-con-for-post-id-'.$qucreative_theme_data['post_for_meta']->ID.' .the-content-sheet-for-sc .feature-overlay > .row{
                    left:50%;
                    transform: translate3d(-50%,-50%,0);
                }
';
	}


}
function qucreative_generate_inline_css_for_highlight() {



// -- start css highlight data gather



	global $qucreative_theme_data;





	if($qucreative_theme_data['post_for_meta']
       && get_post_meta( $qucreative_theme_data['post_for_meta']->ID, 'qucreative_'.'meta_content_starts_at'.$qucreative_theme_data['page_extra_meta_label'], true )
       && get_post_meta( $qucreative_theme_data['post_for_meta']->ID, 'qucreative_'.'meta_content_starts_at'.$qucreative_theme_data['page_extra_meta_label'], true )!='default'

       && (
               get_post_meta( $qucreative_theme_data['post_for_meta']->ID, 'qucreative_'.'meta_content_starts_at_pixel'.$qucreative_theme_data['page_extra_meta_label'], true )!==''

       )
    ){

	    /*
		||
		get_post_meta( $qucreative_theme_data['post_for_meta']->ID, 'qucreative_'.'meta_custom_title'.$qucreative_theme_data['page_extra_meta_label'], true )===' '
	    */

	    if(get_post_meta( $qucreative_theme_data['post_for_meta']->ID, 'qucreative_'.'meta_content_starts_at_pixel'.$qucreative_theme_data['page_extra_meta_label'], true )==''){

	        // -- then it is from custom title blank
		    $val = 0;
        }else{

		    $val = intval(get_post_meta( $qucreative_theme_data['post_for_meta']->ID, 'qucreative_'.'meta_content_starts_at_pixel'.$qucreative_theme_data['page_extra_meta_label'], true ));
        }



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




// -- content starts at pixel
		$qucreative_theme_data['css_data_highlight'].='
        
            body .main-container .the-content-con-for-post-id-'.$qucreative_theme_data['post_for_meta']->ID.':not(.page-gallery-w-thumbs):not(.has-header-slider)  .the-content:not(.excerpt-content){
                margin-top:'.$val.'px;
            }
            body .main-container .the-content-con-for-post-id-'.$qucreative_theme_data['post_for_meta']->ID.':not(.page-gallery-w-thumbs).has-header-slider  .big-revslider-con{
                margin-top:'.$val.'px;
            }';
	}




	if($qucreative_theme_data['sw_is_in_customizer']){


		$qucreative_theme_data['css_data_highlight'].='div form.customize-unpreviewable, div form.customize-unpreviewable input, div form.customize-unpreviewable select, div form.customize-unpreviewable button, body a.customize-unpreviewable, div area.customize-unpreviewable{
                cursor:pointer!important;
            }';

	}


	if(qucreative_get_theme_mod_and_sanitize('greyscale_ammount') && intval(qucreative_get_theme_mod_and_sanitize('greyscale_ammount') )){

		$qucreative_theme_data['css_data_highlight'].= '.translucent-con .translucent-canvas{ -webkit-filter: grayscale('.$qucreative_theme_data['theme_mods']['greyscale_ammount'].'%); -ms-filter: grayscale('.qucreative_get_theme_mod_and_sanitize('greyscale_ammount').'%); -moz-filter: grayscale('.qucreative_get_theme_mod_and_sanitize('greyscale_ammount').'%);  filter: grayscale('.qucreative_get_theme_mod_and_sanitize('greyscale_ammount').'%); }';

	}


	$high_color = qucreative_get_theme_mod_and_sanitize("highlight_color");

	if(isset($qucreative_theme_data['preview_cookies']['highlight_color']) && $qucreative_theme_data['preview_cookies']['highlight_color']){
		$high_color = $qucreative_theme_data['preview_cookies']['highlight_color'];
	}


	if($high_color && $high_color!='#97c1cf' ){


		$qucreative_theme_data['css_data_highlight'].= ' body ul.the-actual-nav:not(.ceva) li.current-menu-ancestor > a{ background-color: #fff; color: '.$high_color.';  }';



		$qucreative_theme_data['css_data_highlight'].= ' body .the-content-sheet.the-content-sheet-dark .team-member-element-2 .meta-con .social-profiles .circle-con:hover,body ul.the-actual-nav li.current-menu-item > a, ul.the-actual-nav > li:hover > a, ul.redcircle li:before, html body .the-content .antfarm-btn:hover:not(.btn-full-red), .antfarm-btn:focus:hover, .bullet-feature-form .icon-con, .bullet-feature-form.form-hexagon .icon-con, ul.the-actual-nav li ul li > a, body .dzstooltip.skin-red,body .main-container .qucreative-pagination > li.active > a,body .main-container .qucreative-pagination > li:hover > a,.btn-full-white:hover,body.page-blogsingle .blog-link-con .portfolio-link--toback.center-td:hover > a,.btn-full-red,body.page-blogsingle .blog-comments .btn-load-more-comments:hover,.selector-con-for-skin-melbourne .a-category.active, .selector-con-for-skin-melbourne .a-category:hover,body .zfolio.skin-melbourne .zfolio-item:hover .item-meta,.ajax-preloader .loader:after,.zfolio.skin-silver .selector-con .a-category.active, .zfolio.skin-silver .selector-con .a-category:hover, body .zfolio.skin-melbourne .selector-con .a-category.active, .zfolio.skin-melbourne .selector-con .a-category:hover, .zfolio.skin-gazelia .selector-con .a-category.active, .zfolio.skin-gazelia .selector-con .a-category:hover, .zfolio.skin-qucreative .selector-con .a-category.active, .zfolio.skin-qucreative .selector-con .a-category:hover,ul.sidebar-count-list > li:hover > a .the-count,.sidebar-search-con .search-submit-con:hover, .team-member-element .meta-con .social-profiles .circle-con:hover,.map-canvas-con .contact-info .services-lightbox--close:hover,body .advancedscroller.skin-qucreative > .arrowsCon > .arrow-left:hover, body .advancedscroller.skin-qucreative .arrowsCon > .arrow-right:hover,.qucreative-pricing-table a.signup-button:hover,body .advancedscroller .item .description-wrapper:hover .description-wrapper--icon-con,body .advancedscroller.skin-karma-inset .arrowsCon > .arrow-left:hover, body .advancedscroller.skin-karma-inset .arrowsCon > .arrow-right:hover,body.page-portfolio-single .the-content-con.fullit .portfolio-single-liquid-title:not(.ceva) > h3,body.page-portfolio-single .the-content-con.fullit .portfolio-single-liquid-title:not(.ceva) .portfolio-single-liquid-info:hover,.main-container .the-content-con.fullit .portfolio-single-subtitle,body.page-portfolio-single .the-content-con.fullit .arrow-left-for-skin-qucreative:hover, body.page-portfolio-single .the-content-con.fullit .arrow-right-for-skin-qucreative:hover,.zoombox-maincon.skin-whitefull .main-con > .slider-con .arrow-left-for-skin-qucreative:hover, .zoombox-maincon.skin-whitefull .main-con > .slider-con .arrow-right-for-skin-qucreative:hover,.services-lightbox-content .services-lightbox--close:hover,.advancedscroller .item .description-wrapper.active:not(.a) .description-wrapper--icon-con, ul.nostyle li > .icon-con, body .widget_search.widget .search-form>.search-submit:hover';



		if($qucreative_theme_data['menu_type'] == 'menu-type-13'){
			$qucreative_theme_data['css_data_highlight'].=' , body.menu-type-13 nav.qucreative--nav-con ul.the-actual-nav > li.current-menu-item > a, body.menu-type-13 nav.qucreative--nav-con ul.the-actual-nav > li:hover > a, body.menu-type-13 nav.qucreative--nav-con ul.the-actual-nav > li ul';
		}
		if($qucreative_theme_data['menu_type'] == 'menu-type-14'){
			$qucreative_theme_data['css_data_highlight'].=' , body.menu-type-14 nav.qucreative--nav-con ul.the-actual-nav > li.current-menu-item > a, body.menu-type-14 nav.qucreative--nav-con ul.the-actual-nav > li:hover > a, body.menu-type-14 nav.qucreative--nav-con ul.the-actual-nav > li ul';
		}
		if($qucreative_theme_data['menu_type'] == 'menu-type-15'){
			$qucreative_theme_data['css_data_highlight'].=' , body.menu-type-15 nav.qucreative--nav-con ul.the-actual-nav > li.current-menu-item > a, body.menu-type-15 nav.qucreative--nav-con ul.the-actual-nav > li:hover > a,body.menu-type-15 nav.qucreative--nav-con ul.the-actual-nav > li ul, body.menu-type-15 nav.qucreative--nav-con ul.the-actual-nav > li ul';
		}
		if($qucreative_theme_data['menu_type'] == 'menu-type-16'){
			$qucreative_theme_data['css_data_highlight'].=', body.menu-type-16 nav.qucreative--nav-con ul.the-actual-nav > li.current-menu-item > a, body.menu-type-16 nav.qucreative--nav-con ul.the-actual-nav > li:hover > a, body.menu-type-16 nav.qucreative--nav-con ul.the-actual-nav > li ul, body.menu-type-16 nav.qucreative--nav-con ul.the-actual-nav > li ul';
		}
		if($qucreative_theme_data['menu_type'] == 'menu-type-17'){
			$qucreative_theme_data['css_data_highlight'].=', body.menu-type-17 nav.qucreative--nav-con ul.the-actual-nav > li.current-menu-item > a, body.menu-type-17 nav.qucreative--nav-con ul.the-actual-nav > li:hover > a, body.menu-type-17 nav.qucreative--nav-con ul.the-actual-nav > li ul, body.menu-type-17 nav.qucreative--nav-con ul.the-actual-nav > li ul';
		}
		if($qucreative_theme_data['menu_type'] == 'menu-type-18'){
			$qucreative_theme_data['css_data_highlight'].=', body.menu-type-18 nav.qucreative--nav-con ul.the-actual-nav > li.current-menu-item > a, body.menu-type-18 nav.qucreative--nav-con ul.the-actual-nav > li:hover > a, body.menu-type-18 nav.qucreative--nav-con ul.the-actual-nav > li ul, body.menu-type-18 nav.qucreative--nav-con ul.the-actual-nav > li ul';
		}


		$qucreative_theme_data['css_data_highlight'].=', body .audioplayer.skin-redlights .ap-controls .ap-controls-left .con-playpause:hover, .team-member-element-2 .meta-con .social-profiles .circle-con:hover, body .dzs-tabs.skin-menu .tabs-menu .tab-menu-con.active .tab-menu, body .dzs-tabs.skin-menu .tabs-menu .tab-menu-con:hover .tab-menu, .element-sideways.with-fa .icon-con, body .sidebar-main .sidebar-block > .widget-title:first-of-type, html body .antfarm-btn.style-highlight:not(.ceva):not(.alceva), html body .antfarm-btn.style-black:hover:not(.ceva):not(.alceva), body ul.the-actual-nav > li:hover > a, body ul.the-actual-nav li.current-menu-item > a, body .btn-full-red, body .antfarm-btn:hover, body .antfarm-btn:focus:hover, body footer.upper-footer ul.sidebar-count-list > li:hover .the-count, body .social-list li:hover .icon-con,body div.main-container .sidebar-main .widget_search .search-form .search-submit:hover, body .antfarm-btn.style-highlight-dark, body .the-content-sheet.the-content-sheet-dark .antfarm-btn.style-default:hover, body .qucreative--520-nav-con .custom-responsive-menu .custom-menu li.current-menu-ancestor>a, body .selector-con-for-skin-melbourne.under-720 .categories .a-category, body .audioplayer .ap-controls .scrubbar .scrubBox-hover,.calendar_wrap tbody>tr>td>a, body footer.upper-footer .widget_search .search-form>.search-submit:hover{ background-color: '.$high_color.'; }  ';


		$qucreative_theme_data['css_data_highlight'].= '          body .selector-con-for-skin-melbourne .a-category.active, body .selector-con-for-skin-melbourne .a-category:hover { background-color: '.$high_color.'!important; }    ';

		$qucreative_theme_data['css_data_highlight'].= '                            body .zfolio.under-720 .selector-con div.a-category.active, body .selector-con-for-skin-melbourne.under-720 div.a-category.active{ background-color: '.$high_color.'!important; }  ';




		$qucreative_theme_data['css_data_highlight'].= ' ul.the-actual-nav li ul li.current-menu-item > a, body.qucreative-submenu-style-highlight-color .main-container nav.qucreative--nav-con ul.the-actual-nav>li ul li.current-menu-item>a, ul.the-actual-nav li ul > li:hover > a, body.qucreative-submenu-style-highlight-color .main-container:not(.ceva) ul.the-actual-nav li ul > li:hover > a, .antfarm-btn.style-hallowred, .antfarm-btn.style-hallowred:focus, .bullet-feature-red .icon-con .fa,html body a.post-main-link:not(.a):hover,body.page-blogsingle .post-meta-below a:hover,body.page-blogsingle .blog-comments ul.itemCommentsList .comment-right-meta a:hover,ul.sidebar-count-list > li:hover > a .cat-name,.post-meta a:hover,.main-gallery--descs .main-gallery--desc .big-number,.contact-info a:hover,.sidebar-block-archive > a:last-child:hover,body.page-portfolio-single .portfolio-single-meta-con a,body.page-portfolio-single blockquote a:hover';


		if($qucreative_theme_data['menu_type'] == 'menu-type-2'){

			$qucreative_theme_data['css_data_highlight'].=',body.menu-type-2 ul.the-actual-nav li ul li.current-menu-item > a, body.menu-type-2 ul.the-actual-nav li ul > li:hover > a';
		}
		if($qucreative_theme_data['menu_type'] == 'menu-type-15'){

			$qucreative_theme_data['css_data_highlight'].=',body.menu-type-15 nav.qucreative--nav-con ul.the-actual-nav > li ul li:hover > a, body.menu-type-15 nav.qucreative--nav-con ul.the-actual-nav > li ul li.current-menu-item > a';
		}
		if($qucreative_theme_data['menu_type'] == 'menu-type-16'){

			$qucreative_theme_data['css_data_highlight'].=', body.menu-type-16 nav.qucreative--nav-con ul.the-actual-nav > li ul li:hover > a, body.menu-type-16 nav.qucreative--nav-con ul.the-actual-nav > li ul li.current-menu-item > a';
		}
		if($qucreative_theme_data['menu_type'] == 'menu-type-17'){

			$qucreative_theme_data['css_data_highlight'].=', body.menu-type-17 nav.qucreative--nav-con ul.the-actual-nav > li ul li:hover > a, body.menu-type-17 nav.qucreative--nav-con ul.the-actual-nav > li ul li.current-menu-item > a';
		}
		if($qucreative_theme_data['menu_type'] == 'menu-type-18'){

			$qucreative_theme_data['css_data_highlight'].=', body.menu-type-18 nav.qucreative--nav-con ul.the-actual-nav > li ul li:hover > a, body.menu-type-18 nav.qucreative--nav-con ul.the-actual-nav > li ul li.current-menu-item > a';
		}


		$qucreative_theme_data['css_data_highlight'].=',.zoombox-maincon.skin-whitefull .main-con > .info-con blockquote a:hover,.excerpt-content blockquote a:hover,body .arrow-left-for-skin-qucreative-2:hover > i, body .arrow-right-for-skin-qucreative-2:hover > i, body .close-btn-for-skin-qucreative:hover > i, .post-meta a, footer.upper-footer ul.sidebar-count-list > li a.sidebar-latest-post:hover .post-meta .post-title, body a:hover, body .antfarm-btn.style-hallowred, .antfarm-btn.style-hallowred:focus, body .social-list li:hover .text-con, body footer.upper-footer ul.sidebar-count-list > li:hover a.sidebar-latest-post .post-meta span.post-title, body .links-list li a:hover:not(.a):not(.b), body .zoombox-maincon.skin-whitefull .main-con > .info-con .subtitle, body a:not(.custom-a):hover, html body.qucreative-submenu-style-highlight-color nav.qucreative--nav-con ul.the-actual-nav > li ul li.current-menu-ancestor > a{ color:  '.$high_color.';} .antfarm-btn.style-hallowred, .antfarm-btn.style-hallowred:focus, .bullet-feature-red .icon-con,body .arrow-left-for-skin-qucreative-2:hover, .arrow-right-for-skin-qucreative-2:hover, .close-btn-for-skin-qucreative:hover,.dzs-tabs.skin-qucreative:not(.is-toggle) .tabs-menu .tab-menu-con.active,  body .arrow-left-for-skin-qucreative-2:hover, body .arrow-right-for-skin-qucreative-2:hover, body .close-btn-for-skin-qucreative:hover{ border-color: '.$high_color.';} .bullet-feature-form.form-hexagon .icon-con:after,.selector-con.selector-con-for-skin-melbourne .categories .a-category:before,.main-container .the-content-con.fullit .zfolio.skin-silver .selector-con .categories .a-category:before, .main-container .the-content-con.fullit .zfolio.skin-melbourne .selector-con .categories .a-category:before, body .dzs-tabs.skin-menu .tabs-menu .tab-menu-con:before{ border-top-color: '.$high_color.';} .bullet-feature-form.form-hexagon .icon-con:before, body .ajax-preloader:before,body .zfolio.skin-melbourne .zfolio-item:hover .item-meta:before,body.page-portfolio-single .portfolio-single-meta-con a:hover, .post-meta a:hover{ border-bottom-color: '.$high_color.';} body .dzstooltip.skin-red.arrow-right:before{ border-left-color: '.$high_color.';} ::selection{ background-color: '.$high_color.'; } ::-moz-selection{ background-color: '.$high_color.'; } .antfarm-btn.style-hallowred:hover, .antfarm-btn.style-hallowred:focus, .bullet-feature-red .icon-con{  border-color: '.$high_color.';color: #ffffff;}  footer.upper-footer .widget_search .search-form > input[type=submit]:hover, .antfarm-sc-call-to-action .call-to-action-con .antfarm-btn.style-highlight:hover, .antfarm-btn.style-highlight, .ul.the-actual-nav li ul li > a, body .dzs-tabs.skin-qucreative.is-toggle .tabs-menu .tab-menu-con.active .tab-menu, body.qucreative-submenu-style-highlight-color nav.qucreative--nav-con ul.the-actual-nav>li.current-menu-ancestor>a, body.qucreative-submenu-style-highlight-color nav.qucreative--nav-con ul.the-actual-nav>li.current-menu-item>a, body.qucreative-submenu-style-highlight-color nav.qucreative--nav-con ul.the-actual-nav>li:hover>a ,body ul.the-actual-nav:not(.ceva) > li.current-menu-ancestor > a {  background-color: '.$high_color.';color: #ffffff;}   body .antfarm-btn.style-hallowred, body .antfarm-btn.style-hallowred:focus{ box-shadow: 0 0 0 2px '.$high_color.' inset; } ';


		$qucreative_theme_data['css_data_highlight'].='.color-highlight, .color-highlight-on-hover:hover,.color-highlight-on-hover:hover > i{ color: '.$high_color.'!important; } ';

		// -- background-color and box-shadow
		$qucreative_theme_data['css_data_highlight'].= '.main-container .btn-zoomsounds:hover,  html body .antfarm-btn.style-hallowred:hover:not(.ceva):not(.alceva), html body .antfarm-btn.style-hallowblack:hover:not(.ceva):not(.alceva),  body .antfarm-btn.style-highlight, body .antfarm-btn.style-default:hover,  body .antfarm-btn.style-black:hover,  body .antfarm-btn.style-hallowred:hover,  body .antfarm-btn.style-hallowblack:hover{  box-shadow: 0 0 0 2px '.$high_color.' inset; background-color: '.$high_color.';} ';


		// -- box shadow
		$qucreative_theme_data['css_data_highlight'].= '  body .dzs-tabs.skin-qucreative.is-toggle .tabs-menu .tab-menu-con.active .plus-sign:not(.ceva):not(.alceva):not(.altceva) rect, html body .main-container nav.qucreative--nav-con ul.the-actual-nav li .tooltip--icon path{ fill: '.$high_color.';} ';
		$qucreative_theme_data['css_data_highlight'].= ' body .zfolio.skin-qucreative .zfolio-item .zfolio-item--inner .zfolio-item--inner--inner--inner:after{ box-shadow: inset 0px 0px 0px 0px '.$high_color.'; } ';
		$qucreative_theme_data['css_data_highlight'].= ' body .main-container .dzs-tabs.skin-qucreative .tabs-menu .tab-menu-con.active:not(.ceva):not(.alceva) .tab-menu, body .qucreative--520-nav-con .custom-responsive-menu .custom-menu li:hover>a, body .qucreative--520-nav-con .custom-responsive-menu .custom-menu li.current-menu-item>a{  border-color: '.$high_color.';background-color: '.$high_color.';color: #ffffff; } ';
		$qucreative_theme_data['css_data_highlight'].= ' body .zfolio.skin-qucreative .zfolio-item:hover .zfolio-item--inner--inner--inner:after, body .zfolio.skin-qucreative .zfolio-item.active .zfolio-item--inner--inner--inner:after{ box-shadow: inset 0px 0px 0px 5px '.$high_color.'; } ';


		// -- border and background
		$qucreative_theme_data['css_data_highlight'].= 'body .the-content-sheet.the-content-sheet-dark .audioplayer.skin-redlights .ap-controls .ap-controls-left .con-playpause:hover,body .the-content-sheet.the-content-sheet-dark .audioplayer.skin-redlights .btn-zoomsounds:hover,.the-content-con.page-blogsingle .blog-link-con:not(.ceva):not(.alceva):not(.da) .portfolio-link--title:hover, body.page-blogsingle .blog-link-con .portfolio-link--toback.center-td:not(.ceva):not(.ceva2):not(.ceva3)>a:hover, body .the-content-sheet.the-content-sheet-dark .qucreative-pricing-table a.signup-button:hover{ background-color: '.$high_color.'; border-color: '.$high_color.';  } ';

		// -- border and background !important
		$qucreative_theme_data['css_data_highlight'].= ' .portfolio-link-con .portfolio-link--title:hover, .portfolio-link-con .portfolio-link--toback.center-td:hover { background-color: '.$high_color.'!important; border-color: '.$high_color.'!important;  } ';


		$qucreative_theme_data['css_data_highlight'].= '.bg-color-hg,.bg-color-hg-on-hover:hover,.active > .color-hg-on-parent-active { background-color: '.$high_color.'!important; } ';
		$qucreative_theme_data['css_data_highlight'].= '.color-hg,.color-hg-on-hover:hover { color: '.$high_color.'!important; } ';
		$qucreative_theme_data['css_data_highlight'].= '.border-hg-on-hover:hover { border-color: '.$high_color.'!important; } ';
		$qucreative_theme_data['css_data_highlight'].= '.color-border-bottom-on-hover:hover{  border-bottom-color: '.$high_color.'!important; } ';

	}



	// -- end highlight css



}
function qucreative_generate_inline_css_for_font_data() {


	$font_data_str = qucreative_get_theme_mod_and_sanitize( 'font_data' );


	$font_data = array();




	parse_str( $font_data_str, $font_data );


	global $qucreative_theme_data;



	if ( $font_data_str && $font_data_str != QUCREATIVE_DEFAULT_TYPOGRAPHY ) {


		$qucreative_theme_data['css_data_typography'].='
        h1:not(.vc_custom_heading), h2:not(.vc_custom_heading), h3:not(.vc_custom_heading), h4:not(.vc_custom_heading), h5:not(.vc_custom_heading), h6:not(.vc_custom_heading), .h1, .h2, .h3, .h4, .h5, .h6, .h-group-1, .h-group-2, .qucreative-pricing-table a.signup-button, .selector-con.selector-con-for-skin-melbourne .categories .a-category, .advancedscroller.item-skin-trumpet .item .description-wrapper--text, .audioplayer.skin-redlights .ap-controls .ap-controls-right .meta-artist-con .the-artist, .qucreative-pagination > li > a, .main-container .dzs-tabs.skin-menu .tabs-menu .tab-menu-con .tab-menu, body .main-container .audiogallery.mode-showall.skin-redlights .number-wrapper > .the-number, .meta-comment-reply > a {
            font-family: "'.esc_html($font_data['headings_font']) .'", serif !important;
        }    .the-content-sheet .element-header.two-lines,.the-content-sheet .element-header.two-lines .line-1, .the-content-sheet .element-header.two-lines h2 {
            font-family: "'.esc_html($font_data['section_title_two_font']) .'", serif !important;
        }';



		if(isset($font_data['section_title_two_second_font']) && $font_data['section_title_two_second_font']){
			$qucreative_theme_data['css_data_typography'].=' .the-content-sheet .element-header .line-2 {
            font-family: "'.esc_html($font_data['section_title_two_second_font']).'", serif !important;
        }';
		}




		if(isset($font_data['section_title_two_number_font']) && $font_data['section_title_two_number_font']){
			$qucreative_theme_data['css_data_typography'].='  .the-content-sheet .element-header .section-number {
            font-family: "'.esc_html($font_data['section_title_two_number_font']) .'", serif !important;
        } ';
		}


		if(isset($font_data['section_title_one_first_font']) && $font_data['section_title_one_first_font']){
			$qucreative_theme_data['css_data_typography'].='  .the-content-sheet .element-header.one-line, .the-content-sheet .element-header.one-line .line-1 {
            font-family: "'.esc_html($font_data['section_title_one_first_font']) .'", serif !important;
        }  ';
		}



		$qucreative_theme_data['css_data_typography'].='

        .the-content > .main-page-title {
            font-family: "'.esc_html($font_data['page_title_font']) .'", serif !important;

        }

        .copyright-text {';




		if(isset($font_data['copyright_font'])){


			$qucreative_theme_data['css_data_typography'].='
			     font-family: "'.esc_html($font_data['copyright_font']) .'", serif !important;
				}';



			if(isset($font_data['copyright_font_link_to'])){
				$qucreative_theme_data['css_data_typography'].=' font-family: "'.esc_html($font_data[$font_data['copyright_font_link_to'].'_font']) .'", serif !important;';
			}

		}
		$qucreative_theme_data['css_data_typography'].='   }';



		$qucreative_theme_data['css_data_typography'].='.weight-from-anchor {
        }';



		$qucreative_theme_data['css_data_typography'].='
        .main-gallery--descs .main-gallery--desc .big-desc {';

		$label_prefix ='home_slider';
		if(isset($font_data[$label_prefix.'_font'])){

			$qucreative_theme_data['css_data_typography'].=' font-family: "'.esc_html($font_data[$label_prefix.'_font']) .'", serif !important;
				
				';
		}

		if(isset($font_data[$label_prefix.'_font_link_to'])){
			$qucreative_theme_data['css_data_typography'].=' font-family: "'.esc_html($font_data[$font_data[$label_prefix.'_font_link_to'].'_font']) .'", serif !important;
        ';
		}

		$qucreative_theme_data['css_data_typography'].='

        }

        .main-gallery--descs .main-gallery--desc .big-number {
            ';


		$label_prefix ='home_number';
		if(isset($font_data[$label_prefix.'_font'])){
			$qucreative_theme_data['css_data_typography'].=' font-family: "'.esc_html($font_data[$label_prefix.'_font']) .'", serif !important;
            ';
		}

		if(isset($font_data[$label_prefix.'_font_link_to'])){
			$qucreative_theme_data['css_data_typography'].=' font-family: "'.esc_html($font_data[$font_data[$label_prefix.'_font_link_to'].'_font']) .'", serif !important;';
		}

		$qucreative_theme_data['css_data_typography'].='

        }

        body .qucreative--nav-con ul.the-actual-nav li > a, body .qucreative--nav-con ul.the-actual-nav li > a, .menu-toggler-target ul.the-actual-nav li > a {
            font-family: "'.esc_html($font_data['menu_font']) .'", serif !important;
        }';

		if($font_data['page_title_orientation']=='skewed'){


			if(qucreative_get_theme_mod_and_sanitize('page_title_align')=='page-title-align-left'){

				$qucreative_theme_data['css_data_typography'].= ' body .the-content-con .main-page-title{ transform: rotate(-5deg)!important;     bottom: calc(100% - '.intval(intval($font_data['page_title_size'])/2).'px)!important; } ';
			}else{

				$qucreative_theme_data['css_data_typography'].= ' body .the-content-con .main-page-title{ transform: rotate(5deg)!important;     bottom: calc(100% - '.intval(intval($font_data['page_title_size'])/2).'px)!important; } ';
			}
		}



		if($font_data['p_color'] && $font_data['p_color']!='#6b6b6b'){

			$qucreative_theme_data['css_data_typography'].='
        p, div.paragraph, .paragraph-text {
            color: '.$font_data['p_color'] .';
        }';
		}
		if($font_data['p_color_for_light'] && $font_data['p_color_for_light']!='#ffffff'){

			$qucreative_theme_data['css_data_typography'].='
        .the-content-sheet.the-content-sheet-dark p, .the-content-sheet.the-content-sheet-dark .paragraph, .the-content-sheet.the-content-sheet-dark .paragraph-text:not(.paragraph-text-for-light) {
            color: '.$font_data['p_color_for_light'] .';
        }
';
		}




		$lab = 'section_title_two_divider_color';




		if($font_data[$lab] && $font_data[$lab]!='#6b6b6b'){
			$qucreative_theme_data['css_data_typography'].='
        body .section-title-divider-fullwidth[data-for="section_title_two"] {
            background-color: '.$font_data[$lab] .';
        }

        body .section-title-divider-box[data-for="section_title_two"] {
            background-color: '.$font_data[$lab] .';
        }

        body .section-title-divider-box[data-for="section_title_two"]:before {
            background-color: '.$font_data[$lab] .';
        }

        body .section-title-divider-box[data-for="section_title_two"]:after {
            border-color: '.$font_data[$lab] .';
        }
';
		}

		$lab.='_for_light';
		if($font_data[$lab] && $font_data[$lab]!='#ffffff'){

			$qucreative_theme_data['css_data_typography'].='
        body .the-content-sheet.the-content-sheet-dark .section-title-divider-fullwidth[data-for="section_title_two"] {
            background-color: '.$font_data[$lab] .';
        }

        body .the-content-sheet.the-content-sheet-dark .section-title-divider-box[data-for="section_title_two"] {
            background-color: '.$font_data[$lab] .';
        }

        body .the-content-sheet.the-content-sheet-dark .section-title-divider-box[data-for="section_title_two"]:before {
            background-color: '.$font_data[$lab] .';
        }

        body .the-content-sheet.the-content-sheet-dark .section-title-divider-box[data-for="section_title_two"]:after {
            border-color: '.$font_data[$lab] .';
        }
';

		}




		$lab = 'section_title_one_divider_color';
		if($font_data[$lab] && $font_data[$lab]!='#6b6b6b'){

			$qucreative_theme_data['css_data_typography'].='
        .section-title-divider-fullwidth[data-for="section_title_one"] {
            background-color: '.$font_data[$lab] .';
        }

        .element-header.heading-is-center .section-title-divider-box {
            background-color: '.$font_data[$lab] .';
        }

        .section-title-divider-box[data-for="section_title_one"]:before {
            background-color: '.$font_data[$lab] .';
        }

        .section-title-divider-box[data-for="section_title_one"]:after {
            border-color: '.$font_data[$lab] .';
        }';
		}
		$lab.='_for_light';
		if($font_data[$lab] && $font_data[$lab]!='#ffffff'){

			$qucreative_theme_data['css_data_typography'].='
        .the-content-sheet.the-content-sheet-dark .section-title-divider-fullwidth[data-for="section_title_one"] {
            background-color: '.$font_data[$lab] .';
        }

        .the-content-sheet.the-content-sheet-dark .section-title-divider-box[data-for="section_title_one"]:before {
            background-color: '.$font_data[$lab] .';
        }

        .the-content-sheet.the-content-sheet-dark .section-title-divider-box[data-for="section_title_one"]:after {
            border-color: '.$font_data[$lab] .';
        }

        ';
		}






		if($font_data['section_title_one_first_color'] && $font_data['section_title_one_first_color']!='#eeeeee'){

			$qucreative_theme_data['css_data_typography'].='
        .element-header.one-line .line-1 {
            color: '.$font_data['section_title_one_first_color'] .';
        }

        ';
		}

		if($font_data['section_title_one_first_color_for_light'] && $font_data['section_title_one_first_color_for_light']!='#222222'){

			$qucreative_theme_data['css_data_typography'].='
        .the-content-sheet.the-content-sheet-dark .element-header.one-line .line-1 {
            color: '.$font_data['section_title_one_first_color_for_light'] .';
        }

        ';
		}



		if($font_data['section_title_two_first_color'] && $font_data['section_title_two_first_color']!='#222222'){

			$qucreative_theme_data['css_data_typography'].='
        .the-heading .line-1 {
            color: '.$font_data['section_title_two_first_color'] .';
        }

        ';
		}


		if($font_data['section_title_two_second_color'] && $font_data['section_title_two_second_color']!='#222222'){

			$qucreative_theme_data['css_data_typography'].='
        .the-heading .line-2 {
            color: '.$font_data['section_title_two_second_color'] .';
        }

        ';
		}



		if($font_data['section_title_two_first_color_for_light'] && $font_data['section_title_two_first_color_for_light']!='#222222'){

			$qucreative_theme_data['css_data_typography'].='
        .the-content-sheet.the-content-sheet-dark .the-heading .line-1 {
            color: '.$font_data['section_title_two_first_color_for_light'] .';
        }

        ';
		}


		if($font_data['section_title_two_second_color_for_light'] && $font_data['section_title_two_second_color_for_light']!='#222222'){

			$qucreative_theme_data['css_data_typography'].='
        .the-content-sheet.the-content-sheet-dark .the-heading .line-2 {
            color: '.$font_data['section_title_two_second_color_for_light'] .';
        }

        ';
		}


		$lab = 'section_title_two_number_color';
		if($font_data[$lab] && $font_data[$lab]!='#eeeeee'){

			$qucreative_theme_data['css_data_typography'].='
        .the-content-sheet .element-header.two-lines .section-number {
            color: '.$font_data[$lab] .';
        }

        ';
		}


		$lab = 'section_title_two_number_color_for_light';
		if(isset($font_data[$lab]) && $font_data[$lab] && $font_data[$lab]!='#444444'){

			$qucreative_theme_data['css_data_typography'].='
        body .main-container .the-content-sheet.the-content-sheet-dark .element-header.two-lines .section-number {
            color: '.$font_data[$lab] .';
        }

        ';
		}







		$lab = 'page_title_color';
		if($font_data[$lab] && $font_data[$lab]!='#ffffff'){

			$qucreative_theme_data['css_data_typography'].='
        .the-content > .main-page-title {
            color: '.$font_data[$lab] .';
        }

        ';
		}







		$lab = 'home_slider_color';
		if($font_data[$lab] && $font_data[$lab]!='#ffffff'){

			$qucreative_theme_data['css_data_typography'].='
        .main-gallery--descs .main-gallery--desc .big-desc {
            color: '.$font_data[$lab] .';
        }

        ';
		}



		$lab = 'home_slider_color_for_light';
		if($font_data[$lab] && $font_data[$lab]!='#222222'){

			$qucreative_theme_data['css_data_typography'].='
        body.body-style-light .main-gallery--descs .main-gallery--desc .big-desc {
            color: '.$font_data[$lab] .';
        }

        ';
		}





		$qucreative_theme_data['css_data_typography'].= qucreative_generate_style_for(array(


			'font_data'=>$font_data,
			'label_prefix'=>'h1',
			'selector'=>'h1:not(.vc_custom_heading):not(.main-page-title),.h1',
		));


		$qucreative_theme_data['css_data_typography'].= qucreative_generate_style_for(array(


			'font_data'=>$font_data,
			'label_prefix'=>'h2',
			'selector'=>'h2:not(.the-heading):not(.vc_custom_heading),.h2:not(.the-heading):not(.vc_custom_heading)',
		));

		$qucreative_theme_data['css_data_typography'].= qucreative_generate_style_for(array(


			'font_data'=>$font_data,
			'label_prefix'=>'h3',
			'selector'=>'h3:not(.h-group-2):not(.vc_custom_heading):not(.h-group-1),.h3',
		));

		$qucreative_theme_data['css_data_typography'].= qucreative_generate_style_for(array(


			'font_data'=>$font_data,
			'label_prefix'=>'h4',
			'selector'=>'h4:not(.vc_custom_heading)',
		));

		$qucreative_theme_data['css_data_typography'].= qucreative_generate_style_for(array(


			'font_data'=>$font_data,
			'label_prefix'=>'h5',
			'selector'=>'h5:not(.vc_custom_heading), .h5, .portfolio-link-con .portfolio-link--title, body .main-container .audiogallery.mode-showall.skin-redlights .number-wrapper > .the-number',
		));

		$qucreative_theme_data['css_data_typography'].= qucreative_generate_style_for(array(


			'font_data'=>$font_data,
			'label_prefix'=>'h6',
			'selector'=>'h6:not(.vc_custom_heading), .h6, .main-container .dzs-tabs.skin-menu .tabs-menu .tab-menu-con .tab-menu a > span, .selector-con.selector-con-for-skin-melbourne .categories .a-category, .advancedscroller.item-skin-trumpet .item .description-wrapper--text, .audioplayer.skin-redlights .ap-controls .ap-controls-right .meta-artist-con .the-artist, .qucreative-pagination > li > a,  .antfarm-btn:not(.h-group-1),.qucreative-pricing-table a.signup-button',
		));


		$qucreative_theme_data['css_data_typography'].= qucreative_generate_style_for(array(


			'font_data'=>$font_data,
			'label_prefix'=>'h-group-1',
			'selector'=>'.h-group-1, .meta-comment-reply > a',
		));


		$qucreative_theme_data['css_data_typography'].= qucreative_generate_style_for(array(


			'font_data'=>$font_data,
			'label_prefix'=>'h-group-2',
			'selector'=>'.h-group-2',
		));



		$qucreative_theme_data['css_data_typography'].= ' body,.font-group-1,.font-group-2,.font-group-3,.font-group-4,.font-group-5,.font-group-6,.font-group-7,.font-group-8,.font-group-9,.font-group-10,.font-group-11,.font-group-12 { font-family: "'.$font_data['body_font'].'", serif; } ';

		$qucreative_theme_data['css_data_typography'].= qucreative_generate_style_for(array(


			'font_data'=>$font_data,
			'label_prefix'=>'p',
			'selector'=>'p, .paragraph-text,div.paragraph,.sidebar-block, .widget.Antfarm_WorkingHours .small-desc',
			'important'=>false,
		));





		$qucreative_theme_data['css_data_typography'].= qucreative_generate_style_for(array(


			'font_data'=>$font_data,
			'label_prefix'=>'font-group-1',
			'selector'=>'.font-group-1',
		));

		$qucreative_theme_data['css_data_typography'].= qucreative_generate_style_for(array(


			'font_data'=>$font_data,
			'label_prefix'=>'font-group-2',
			'selector'=>'.font-group-2, body .main-container .dzs-tabs.skin-qucreative .tabs-menu .tab-menu-con .tab-menu, body .slider-con .dzs-tabs.skin-qucreative .tabs-menu .tab-menu-con .tab-menu',
		));

		$qucreative_theme_data['css_data_typography'].= qucreative_generate_style_for(array(


			'font_data'=>$font_data,
			'label_prefix'=>'font-group-3',
			'selector'=>'.font-group-3',
		));

		$qucreative_theme_data['css_data_typography'].= qucreative_generate_style_for(array(


			'font_data'=>$font_data,
			'label_prefix'=>'font-group-4',
			'selector'=>'.font-group-4',
		));

		$qucreative_theme_data['css_data_typography'].= qucreative_generate_style_for(array(


			'font_data'=>$font_data,
			'label_prefix'=>'font-group-5',
			'selector'=>'.font-group-5,  .widget_search .search-field',
		));

		$qucreative_theme_data['css_data_typography'].= qucreative_generate_style_for(array(


			'font_data'=>$font_data,
			'label_prefix'=>'font-group-6',
			'selector'=>'.font-group-6, .font-group-6 > p, footer.upper-footer .textwidget, Antfarm_Contact .the-text p',
		));

		$qucreative_theme_data['css_data_typography'].= qucreative_generate_style_for(array(


			'font_data'=>$font_data,
			'label_prefix'=>'font-group-7',
			'selector'=>'.font-group-7',
		));

		$qucreative_theme_data['css_data_typography'].= qucreative_generate_style_for(array(


			'font_data'=>$font_data,
			'label_prefix'=>'font-group-8',
			'selector'=>'.font-group-8',
		));

		$qucreative_theme_data['css_data_typography'].= qucreative_generate_style_for(array(


			'font_data'=>$font_data,
			'label_prefix'=>'font-group-9',
			'selector'=>'.font-group-9',
		));

		$qucreative_theme_data['css_data_typography'].= qucreative_generate_style_for(array(


			'font_data'=>$font_data,
			'label_prefix'=>'font-group-10',
			'selector'=>'.font-group-10, .contact-info p',
		));

		$qucreative_theme_data['css_data_typography'].= qucreative_generate_style_for(array(


			'font_data'=>$font_data,
			'label_prefix'=>'font-group-11',
			'selector'=>'.font-group-11',
		));
		$qucreative_theme_data['css_data_typography'].= qucreative_generate_style_for(array(


			'font_data'=>$font_data,
			'label_prefix'=>'font-group-12',
			'selector'=>'.font-group-12',
		));

		$qucreative_theme_data['css_data_typography'].= qucreative_generate_style_for(array(


			'font_data'=>$font_data,
			'label_prefix'=>'blockquote',
			'selector'=>'blockquote,blockquote > p,.font-group-blockquote',
		));





		if($qucreative_theme_data['is_preview_blog'] && ( ( isset($qucreative_theme_data['preview_cookies']['menu-type']) && $qucreative_theme_data['preview_cookies']['menu-type'] ) || ( isset($qucreative_theme_data['preview_cookies']['menu_type']) && $qucreative_theme_data['preview_cookies']['menu_type'] )   )){

		}else{

			$qucreative_theme_data['css_data_typography'].= qucreative_generate_style_for(array(


				'font_data'=>$font_data,
				'label_prefix'=>'menu',
				'selector'=>'body .qucreative--nav-con ul.the-actual-nav li > a,body .menu-toggler-target ul.the-actual-nav li > a',
			));
		}


		$qucreative_theme_data['css_data_typography'].= qucreative_generate_style_for(array(


			'font_data'=>$font_data,
			'label_prefix'=>'copyright',
			'selector'=>'body .copyright-text',
		));





		$qucreative_theme_data['css_data_typography'].= qucreative_generate_style_for(array(


			'font_data'=>$font_data,
			'label_prefix'=>'section_title_two_first',

			'selector'=>'.the-content-sheet  .element-header.two-lines .line-1',
		));
		$qucreative_theme_data['css_data_typography'].= qucreative_generate_style_for(array(


			'font_data'=>$font_data,
			'label_prefix'=>'section_title_two_second',

			'selector'=>'.the-content-sheet  .element-header.two-lines .line-2',
		));


		if(isset($font_data['section_title_two_number_enable']) && $font_data['section_title_two_number_enable']!='on'){

			$qucreative_theme_data['css_data_typography'].= ' body .section-number{ display:none; } ';
		}


		$qucreative_theme_data['css_data_typography'].= qucreative_generate_style_for(array(


			'font_data'=>$font_data,
			'label_prefix'=>'section_title_one_first',
			'selector'=>'.the-content-sheet  .element-header.one-line .line-1',
		));



		$qucreative_theme_data['css_data_typography'].= qucreative_generate_style_for(array(


			'font_data'=>$font_data,
			'label_prefix'=>'section_title_two_number',
			'selector'=>'.the-content-sheet  .element-header .section-number',
		));





		$qucreative_theme_data['css_data_typography'].= qucreative_generate_style_for(array(


			'font_data'=>$font_data,
			'label_prefix'=>'page_title',
			'selector'=>'.main-page-title',
		));


		$qucreative_theme_data['css_data_typography'].= qucreative_generate_style_for(array(


			'font_data'=>$font_data,
			'label_prefix'=>'home_slider',
			'selector'=>'.main-gallery--descs .main-gallery--desc .big-desc',
		));
		$qucreative_theme_data['css_data_typography'].= qucreative_generate_style_for(array(


			'font_data'=>$font_data,
			'label_prefix'=>'home_number',
			'selector'=>'.main-gallery--descs .main-gallery--desc .big-number',
		));
		$qucreative_theme_data['css_data_typography'].= qucreative_generate_style_for(array(


			'font_data'=>$font_data,
			'label_prefix'=>'hyperlink',
			'selector'=>' a:not(.custom-a),.weight-from-anchor',
			'important'=>true,
		));





	}


	// -- end font data
}




function qucreative_generate_inline_css_for_enviroment(){

	global $qucreative_theme_data;




	$lab = 'menu_enviroment_opacity';
	$menu_enviroment_opacity = $qucreative_theme_data['theme_mods'][$lab];

	$content_enviroment_opacity = '';

	if($qucreative_theme_data['sw_is_in_customizer']){

		$menu_enviroment_opacity = qucreative_get_theme_mod_and_sanitize($lab);
	}
	if ($menu_enviroment_opacity == '') {
		$menu_enviroment_opacity = '';
	}
	$val = floatval($menu_enviroment_opacity) / 100;


	$lab = 'content_enviroment_opacity';
	$content_enviroment_opacity = $qucreative_theme_data['theme_mods'][$lab];


	if($qucreative_theme_data['sw_is_in_customizer']){

		$content_enviroment_opacity = qucreative_get_theme_mod_and_sanitize($lab);
	}

	if ($content_enviroment_opacity == '') {
		$content_enviroment_opacity = '30';
	}




	if( $content_enviroment_opacity!='30') {
		$content_enviroment_opacity_val = floatval($qucreative_theme_data['theme_mods']['content_enviroment_opacity']) / 100;
	}else{
		$content_enviroment_opacity_val = '0.3';
	}




	if($menu_enviroment_opacity!==''){


	    $qucreative_theme_data['css_data_overlay_opacity'].='body .qucreative--520-nav-con .logo-con{ background-color: rgba(0,0,0,'.$val.'); }';
	    $qucreative_theme_data['css_data_overlay_opacity'].='body.qucreative-light-menu.responsive-mode-sc .qucreative--520-nav-con .logo-con{ background-color: rgba(255,255,255,'.$val.'); }';
		if( ($qucreative_theme_data['menu_type']=='menu-type-1' || $qucreative_theme_data['menu_type']=='menu-type-2' || $qucreative_theme_data['theme_mods']['menu_type']=='') && $menu_enviroment_opacity!='30'){
			$qucreative_theme_data['css_data_overlay_opacity'].= '.qucreative--nav-con .translucent-con .translucent-overlay{ background-color: rgba(0,0,0,'.$val.'); } ';
			$qucreative_theme_data['css_data_overlay_opacity'].= 'body.menu-type-2 .qucreative--nav-con .translucent-con .translucent-overlay { background-color: rgba(255,255,255,'.$val.'); } ';
		}

		if( ($qucreative_theme_data['menu_type']=='menu-type-3' || $qucreative_theme_data['menu_type']=='menu-type-4') && $menu_enviroment_opacity!='100'){
			$qucreative_theme_data['css_data_overlay_opacity'].= 'body.menu-type-3 .qucreative--nav-con .translucent-con .translucent-overlay { background-color: rgba(25,25,25,'.$val.'); } ';
			$qucreative_theme_data['css_data_overlay_opacity'].= 'body.menu-type-4 .qucreative--nav-con .translucent-con .translucent-overlay { background-color: rgba(255,255,255,'.$val.'); } ';
		}

		if( ($qucreative_theme_data['menu_type']=='menu-type-5') && $menu_enviroment_opacity!='90'){
			$qucreative_theme_data['css_data_overlay_opacity'].= 'body.menu-type-5 .qucreative--nav-con .translucent-con .translucent-overlay { background-color: rgba(19,19,19,'.$val.'); } ';
			$qucreative_theme_data['css_data_overlay_opacity'].= 'body.menu-type-5 .qucreative--nav-con:after{ border-color: rgba(19,19,19,'.$val.') transparent transparent transparent; } ';
		}

		if( ( $qucreative_theme_data['menu_type']=='menu-type-6') && $menu_enviroment_opacity!='100'){
			$qucreative_theme_data['css_data_overlay_opacity'].= 'body.menu-type-6 .qucreative--nav-con .translucent-con .translucent-overlay { background-color: rgba(255,255,255,'.$val.'); } ';
			$qucreative_theme_data['css_data_overlay_opacity'].= 'body.menu-type-6 .qucreative--nav-con:after{ border-color: rgba(255,255,255,'.$val.') transparent transparent transparent; } ';
		}

		if( ( $qucreative_theme_data['menu_type']=='menu-type-15' && $menu_enviroment_opacity!='70')){
			$qucreative_theme_data['css_data_overlay_opacity'].= 'body.'.$qucreative_theme_data['menu_type'].' .qucreative--nav-con .translucent-con .translucent-overlay { background-color: rgba(0,0,0,'.$val.'); } ';
			$qucreative_theme_data['css_data_overlay_opacity'].= 'body.'.$qucreative_theme_data['menu_type'].' .qucreative--nav-con:after{ border-color: rgba(255,255,255,'.$val.') transparent transparent transparent; } ';
		}

		if( ( $qucreative_theme_data['menu_type']=='menu-type-16' && $menu_enviroment_opacity!='70')){
			$qucreative_theme_data['css_data_overlay_opacity'].= 'body.'.$qucreative_theme_data['menu_type'].' .qucreative--nav-con .translucent-con .translucent-overlay { background-color: rgba(255,255,255,'.$val.'); } ';
			$qucreative_theme_data['css_data_overlay_opacity'].= 'body.'.$qucreative_theme_data['menu_type'].' .qucreative--nav-con:after{ border-color: rgba(40,40,40,'.$val.') transparent transparent transparent; } ';
		}

		if( ( $qucreative_theme_data['menu_type']=='menu-type-17' && $menu_enviroment_opacity!='70')){
			$qucreative_theme_data['css_data_overlay_opacity'].= 'body.'.$qucreative_theme_data['menu_type'].' .qucreative--nav-con .translucent-con .translucent-overlay { background-color: rgba(0,0,0,'.$val.'); } ';
			$qucreative_theme_data['css_data_overlay_opacity'].= 'body.'.$qucreative_theme_data['menu_type'].' .qucreative--nav-con:after{ border-color: rgba(255,255,255,'.$val.') transparent transparent transparent; } ';
		}

		if( ( $qucreative_theme_data['menu_type']=='menu-type-18' && $menu_enviroment_opacity!='70')){
			$qucreative_theme_data['css_data_overlay_opacity'].= 'body.'.$qucreative_theme_data['menu_type'].' .qucreative--nav-con .translucent-con .translucent-overlay { background-color: rgba(255,255,255,'.$val.'); } ';
			$qucreative_theme_data['css_data_overlay_opacity'].= 'body.'.$qucreative_theme_data['menu_type'].' .qucreative--nav-con:after{ border-color: rgba(40,40,40,'.$val.') transparent transparent transparent; } ';
		}
	}






	if($qucreative_theme_data['theme_mods']['content_enviroment_style']=='body-style-light'){
		$qucreative_theme_data['css_data_overlay_opacity'].= 'html body .main-gallery--desc .translucent-con .translucent-overlay { background-color: rgba(255,255,255,'.$content_enviroment_opacity_val.'); } ';
		$qucreative_theme_data['css_data_overlay_opacity'].= 'html body.body-style-light .main-gallery--desc .translucent-con .translucent-overlay, html body.body-style-light .the-content .translucent-con .translucent-overlay { background-color: rgba(255,255,255,'.$content_enviroment_opacity_val.'); } ';
		$qucreative_theme_data['css_data_overlay_opacity'].= 'html body.body-style-light .gallery-thumbs-con .translucent-con .translucent-overlay { background-color: rgba(255,255,255,'.$content_enviroment_opacity_val.'); } ';

	}else{

		$qucreative_theme_data['css_data_overlay_opacity'].= 'html body .main-gallery--desc .translucent-con .translucent-overlay { background-color: rgba(0,0,0,'.$content_enviroment_opacity_val.'); } ';
		$qucreative_theme_data['css_data_overlay_opacity'].= 'html body .main-gallery--desc .translucent-con .translucent-overlay, body .the-content .translucent-con .translucent-overlay { background-color: rgba(0,0,0,'.$content_enviroment_opacity_val.'); } ';
		$qucreative_theme_data['css_data_overlay_opacity'].= 'html .the-content-con .translucent-con .translucent-overlay { background-color: rgba(0,0,0,'.$content_enviroment_opacity_val.'); } ';
	}





	$secondary_content_height = qucreative_get_theme_mod_and_sanitize('secondary_content_height');

	if($secondary_content_height==''){
		$secondary_content_height='300';
	}

	if( $secondary_content_height!='300'){

		$qucreative_theme_data['css_data_overlay_opacity'].=' html body:not(.responsive-mode-sc) .antfarm-sc-contact-form, html body:not(.responsive-mode-sc) .antfarm-sc-call-to-action, html body:not(.responsive-mode-sc) .antfarm-sc-blockquote, html body:not(.responsive-mode-sc) .antfarm-sc-video-text, html body:not(.responsive-mode-sc) .antfarm-sc-three-columns, html  body:not(.responsive-mode-sc) .secondary-content--mini-gmaps {

            height: '.intval($secondary_content_height).'px;
        }



        html body:not(.responsive-mode-sc) .antfarm-sc-client-slider, html body:not(.responsive-mode-sc) .antfarm-sc-client-slider .advancedscroller  , html body:not(.responsive-mode-sc) .secondary-content--team-achievements .featured-media-con, html body:not(.responsive-mode-sc) .antfarm-sc-social-block{

            height: '.intval($secondary_content_height).'px!important;
        }

';


	}


	$section_margin_bottom = '30';

	if(qucreative_get_theme_mod_and_sanitize('section_margin_bottom')!=='' || qucreative_get_theme_mod_and_sanitize('section_margin_bottom')==='0'){
		$section_margin_bottom = qucreative_get_theme_mod_and_sanitize('section_margin_bottom');
	}


	if($section_margin_bottom!=='' && $section_margin_bottom!=30){

		$qucreative_theme_data['css_data_overlay_opacity'].='
		
        body .the-content-con.page-normal .the-content-sheet { margin-bottom: '.intval($section_margin_bottom).'px; }
        body .the-content-con.page-normal .the-content .the-content-inner + .footer-conglomerate { margin-top: '.intval($section_margin_bottom).'px; }
        ';
	}


	$width_blur_margin = '30';

	$lab = 'width_blur_margin';
	if($qucreative_theme_data['sw_is_in_customizer']){
		$qucreative_theme_data['theme_mods'][$lab] = qucreative_get_theme_mod_and_sanitize($lab);
	}
	$width_blur_margin_from_mods = $qucreative_theme_data['theme_mods'][$lab];

	if($width_blur_margin_from_mods!==''){
		$width_blur_margin = $width_blur_margin_from_mods;
	}




	if($qucreative_theme_data['page_is_fullscreen']){



		$qucreative_theme_data['template_is_portfolio_gap_int'] = intval($qucreative_theme_data['template_is_portfolio_gap']);
		if($qucreative_theme_data['template_is_portfolio_gap_int']<30){
			$qucreative_theme_data['css_data_overlay_opacity'].='
        .the-content-con.page-portfolio.fullit .zfolio+.qucreative-pagination{
            margin-bottom: '. (30 - $qucreative_theme_data['template_is_portfolio_gap_int']).'px;
        }';

		}
	}




	if($width_blur_margin!==30){


		$qucreative_theme_data['css_data_overlay_opacity'].='

        .the-content-con.page-portfolio:not(.fullit) .translucent-layer:last-child{
            padding: '. intval($width_blur_margin).'px;
        }
        .the-content-con.page-portfolio:not(.fullit) .translucent-layer:last-child{
            margin-left: -'. intval($width_blur_margin).'px;
            margin-right: -'. intval($width_blur_margin).'px;
        }
        .the-content-con.page-portfolio .zfolio+.qucreative-pagination{
            margin-top: '. (30).'px;
        }';

		if($width_blur_margin<30){
			$qucreative_theme_data['css_data_overlay_opacity'].='
        .the-content-con.page-portfolio .zfolio+.qucreative-pagination{
            margin-bottom: '. (30 - intval($width_blur_margin)).'px;
        }';
		}else{
			$qucreative_theme_data['css_data_overlay_opacity'].='
        .the-content-con.page-portfolio .zfolio+.qucreative-pagination{
            margin-bottom: -'. (intval($width_blur_margin) - (30)) .'px;
        }';
		}


		$qucreative_theme_data['css_data_overlay_opacity'].='
        .the-content-con.has-footer:not(.fullit) .the-content-inner .translucent-layer{
            padding-bottom: '. intval($width_blur_margin).'px!important;
        }
        .the-content-con.page-portfolio:not(.fullit) .footer-conglomerate .translucent-layer:last-child{
            margin-bottom: -'. intval($width_blur_margin).'px!important;
        }



        .the-content-con.page-portfolio .footer-conglomerate > .translucent-layer{
            margin-top: 0px!important;
            padding-top: 0px!important;
        }




        .the-content-con.page-portfolio:not(.has-footer) .the-content-inner > .translucent-layer{ margin-bottom: -'. intval($width_blur_margin).'px; }
        .the-content-con.fullit.page-portfolio:not(.has-footer) .the-content-inner > .translucent-layer{ margin-bottom: '. (0).'px; }
';
		$aux =$width_blur_margin-30;

		if($aux>0){
			?>


			<?php
		}
		?>
		<?php



	}













	$content_add_extra_pixels = '';

	if(qucreative_get_theme_mod_and_sanitize('content_add_extra_pixels')){
		$content_add_extra_pixels = intval(qucreative_get_theme_mod_and_sanitize('content_add_extra_pixels'));
	}


	if($content_add_extra_pixels){


		$qucreative_theme_data['css_data_overlay_opacity'].='
        body.page-normal .the-content-sheet .the-content-sheet-text:first-of-type .vc_row.wpb_row:first-of-type{
            padding-top: '. intval($content_add_extra_pixels).'px;
        }
        .body.page-normal .the-content-sheet .the-content-sheet-text:last-child .row.row-margin:last-child, body.page-normal .the-content-sheet .the-content-sheet-text:last-child > .vc_row.wpb_row:last-child{
            padding-bottom: '. intval($content_add_extra_pixels).'px;
        }';



	}





	if($qucreative_theme_data['post_for_meta']){
		if(strpos($qucreative_theme_data['post_for_meta']->post_content,'enable_bordered_design="on"')!==false){
			$qucreative_theme_data['css_data_overlay_opacity'].= '.the-content-sheet:not(.the-content-sheet-dark) .zfolio.skin-melbourne.bordered-design .zfolio-item--inner--inner--inner .item-meta{     border-bottom: 1px solid #ddd;
		border-right: 1px solid #ddd;
		border-left: 1px solid #ddd; }';
		}
	}



	$qucreative_theme_data['css_data_overlay_opacity'].= $qucreative_theme_data['footer_extra_css'];




	// -- end overlay opacity style


}


if(function_exists('qucreative_get_link_url')==false){

	function qucreative_get_link_url() {
		$has_url = get_url_in_content( get_the_content() );

		return $has_url ? $has_url : apply_filters( 'the_permalink', get_permalink() );
	}
}
if(function_exists('qucreative_sanitize_for_post_terms')==false){
	function qucreative_sanitize_for_post_terms($arg){

		// -- sanitize the term for set_post_terms



		$fout = '';


		if(is_array($arg) || is_object($arg)){


			if(count($arg)==1){

				if(isset($arg->term_id)) {
					return $arg->term_id;
				}else{
					return $arg;
				}
			}

			if(count($arg)>1){

				foreach ($arg as $it){

					if($fout){
						$fout.=',';
					}

					if(isset($it->term_id)){

						$fout.=$it->term_id;
					}else{
						return $arg;
					}
				}
			}

		}else{
			return $arg;
		}

		return $fout;
	}
}





