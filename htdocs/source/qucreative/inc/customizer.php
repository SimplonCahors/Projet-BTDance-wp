<?php

if(function_exists('qucreative_return_false_value')==false){
	function qucreative_return_false_value($value) {
		return $value;
	}
}


add_action('customize_controls_print_styles','qucreative_customize_controls_print_styles');





function qucreative_customize_controls_print_styles(){


	global $qucreative_theme_data;


	wp_enqueue_script('qucreative.admin', QUCREATIVE_THEME_URL . 'assets/admin/admin.js', array( 'jquery' ));
	qucreative_render_admin_settings();

	echo '<style>
	
	
.picker-con{
    display:inline-block;
    position:relative;
    z-index:5;
    margin-left: 5px;
}
.picker-con .the-icon{
    width:17px;
    height:17px;
    position:relative;
    top:2px;
    cursor:pointer;
    background-repeat:no-repeat;
    background-position:center center;
}

.picker-con .picker:before{
    content: \' \';
    position:absolute;
    top:auto; bottom: 20px;
    left:-10px;
    height: 0;
    border-top: 10px solid transparent;
    border-bottom: 10px solid transparent;

    border-right:10px solid #333;
}
.picker-con .picker{
    position:absolute;
    top:auto;
    bottom: -20px;
    left:30px;
    background:#EEEEEE;
    padding:10px;
    border-radius:5px;
    border:1px solid #aaa;
    display:none;
}</style>';

	wp_enqueue_script('farbtastic');



	$qucreative_theme_data['admin_head_extra'] = '';

	if(defined("QUCREATIVE_VERSION")) {



		if(!isset($_POST) || is_array($_POST)==false || count($_POST)==0) {
			if (qucreative_get_theme_mod('presets')) {

				if (isset($qucreative_theme_data['arr_presets'][qucreative_get_theme_mod('presets')])) {
					if ($qucreative_theme_data['arr_presets'][qucreative_get_theme_mod('presets')]['default'] == false) {
						echo '<script>window.non_default_preset="' . qucreative_get_theme_mod('presets') . '";</script>';
					}
				}
			}
		}






		if ( ! isset( $_POST ) || is_array( $_POST ) == false || count( $_POST ) == 0 ) {

			$qucreative_theme_data['admin_head_extra'] .= '<script>
                window.qucreative_font_data = \'' . $qucreative_theme_data['font_data_str'] . '\';
            </script>';


		}
	}

	echo $qucreative_theme_data['admin_head_extra'];


}



function qucreative_customize_register( $wp_customize ) {




	global $qucreative_theme_data;






	if(defined("QUCREATIVE_VERSION")){


	}




	$wp_customize->add_section(
		'settings_site',
		array(
			'title' => esc_html__("General Settings",'qucreative'),
			'description' => esc_html__("Configure site options",'qucreative'),
			'priority' => 35,
		)
	);




	$args = array(
		'sort_order' => 'asc',
		'sort_column' => 'post_title',
		'hierarchical' => 1,
		'exclude' => '',

		'meta_key' => '',
		'meta_value' => '',
		'authors' => '',
		'child_of' => 0,
		'parent' => -1,
		'exclude_tree' => '',
		'number' => '',
		'offset' => 0,
		'post_type' => 'page',
		'post_status' => 'publish'
	);
	$pages = get_pages($args);


	$arr_pages = array();




	foreach ($pages as $pg){


		$arr_pages[$pg->ID] = $pg->post_title;
	}



	foreach ($qucreative_theme_data['customizer_fields'] as $cf){


		$args = array(
			'default' => $cf['default'],

		);

		if(isset($cf['transport'])){
			$args['transport']=$cf['transport'];
		}

		$wp_customize->add_setting(
			$cf['name'],
			array_merge($args,array(
				'sanitize_callback' => 'qucreative_return_false_value',
			))
		);
	}



	$wp_customize->add_control(
		'portfolio_page',
		array(
			'label' => esc_html__("Portfolio Page",'qucreative'),
			'section' => 'settings_site',
			'type' => 'select',
			'choices' => $arr_pages,
		)
	);



	$arr_pages = array();


	$arr_pages['wp_mail'] = esc_html__("WP Mail",'qucreative');
	$arr_pages['smtp'] = esc_html__("SMTP Mail",'qucreative');

	$lab = 'mail_method';



	$wp_customize->add_control(
		$lab,
		array(
			'label' => esc_html__("Mail Method",'qucreative'),
			'section' => 'settings_site',
			'type' => 'select',
			'choices' => $arr_pages,
		)
	);




	$wp_customize->add_control(
		'blur_ammount',
		array(
			'label' => esc_html__("Blur Amount",'qucreative'),
			'section' => 'settings_site',
			'type' => 'text',
		)
	);




	$lab = 'soundcloud_apikey';

	$wp_customize->add_control(
		$lab,
		array(
			'label' => esc_html__("Soundcloud API Key",'qucreative'),
			'section' => 'settings_site',
			'type' => 'text',
		)
	);

	$lab = 'gmaps_api_key';

	$wp_customize->add_control(
		$lab,
		array(
			'label' => esc_html__("Google Maps API Key",'qucreative'),
			'section' => 'settings_site',
			'type' => 'text',
		)
	);



	$lab = 'gmaps_styling';

	$wp_customize->add_control(
		$lab,
		array(
			'label' => esc_html__("Google Maps Styling",'qucreative'),
			'section' => 'settings_site',
			'type' => 'textarea',
		)
	);


	$lab = 'secondary_content_height';

	$wp_customize->add_control(
		$lab,
		array(
			'label' => esc_html__("Secondary Content Height",'qucreative'),
			'section' => 'settings_site',
			'type' => 'text',
		)
	);








	$arr_opts = array(
		'body-style-dark'=>esc_html__("Style Dark",'qucreative'),
		'body-style-light'=>esc_html__("Style Light",'qucreative'),
	);


	$lab = 'content_enviroment_style';

	$wp_customize->add_control(
		$lab,
		array(
			'label' => esc_html__("Content Enviroment Style",'qucreative'),
			'section' => 'settings_content',
			'type' => 'select',
			'choices' => $arr_opts,
		)
	);

















	$wp_customize->add_control(
		new Qucreative_Slider_Input(
			$wp_customize,
			'content_enviroment_opacity',
			array(
				'label'      => esc_html__( 'Content Enviroment Opacity', 'qucreative' ),
				'section'    => 'settings_content',
			) )
	);










	$wp_customize->add_control(
		'greyscale_ammount',
		array(
			'label' => esc_html__("Greyscale Effect Amount",'qucreative'),
			'section' => 'settings_site',
			'type' => 'text',
		)
	);




	$wp_customize->add_control(
		'blur_ammount',
		array(
			'label' => esc_html__("Blur Amount",'qucreative'),
			'section' => 'settings_site',
			'type' => 'text',
		)
	);





	$arr_on_off = array(
		'on'=>esc_html__("Native",'qucreative'),
		'off'=>esc_html__("Custom",'qucreative'),
	);



	$wp_customize->add_control(
		'enable_native_scrollbar',
		array(
			'label' => esc_html__("Scrollbar type",'qucreative'),
			'section' => 'settings_site',
			'type' => 'select',
			'choices' => $arr_on_off,
		)
	);







	$arr_on_off = array(
		'on'=>esc_html__("Yes",'qucreative'),
		'off'=>esc_html__("No",'qucreative'),
	);



	$wp_customize->add_control(
		'bg_isparallax',
		array(
			'label' => esc_html__("Parallax Background?",'qucreative'),
			'section' => 'settings_site',
			'type' => 'select',
			'choices' => $arr_on_off,
		)
	);




	$arr_on_off = array(
		'on'=>esc_html__("Yes",'qucreative'),
		'off'=>esc_html__("No",'qucreative'),
	);



	$wp_customize->add_control(
		'enable_ajax',
		array(
			'label' => esc_html__("Enable Ajax Navigation?",'qucreative'),
			'section' => 'settings_site',
			'type' => 'select',
			'choices' => $arr_on_off,
		)
	);





	$arr_on_off = array(
		'off'=>esc_html__("Off",'qucreative'),
		'on'=>esc_html__("On",'qucreative'),
	);



	$wp_customize->add_control(
		'enable_bordered_design',
		array(
			'label' => esc_html__("Enable Bordered Design",'qucreative'),
			'section' => 'settings_site',
			'type' => 'select',
			'std' => 'on',
			'choices' => $arr_on_off,
		)
	);









	$arr_transition = array(
		'slidedown'=>esc_html__("Slide Down",'qucreative'),
		'wipedown'=>esc_html__("Wipe Down",'qucreative'),
		'fade'=>esc_html__("Fade",'qucreative'),
	);



	$wp_customize->add_control(
		'bg_transition',
		array(
			'label' => esc_html__("Site Transition",'qucreative'),
			'section' => 'settings_site',
			'type' => 'select',
			'choices' => $arr_transition,
		)
	);




	$wp_customize->add_control(
		'bg_slideshow_time',
		array(
			'label' => esc_html__("Background Transition Slideshow Time",'qucreative'),
			'section' => 'settings_site',
			'type' => 'text',

		)
	);






	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'highlight_color',
			array(
				'label'      => esc_html__( 'Highlight Color', 'qucreative' ),
				'section'    => 'settings_site',
			) )
	);

















	$wp_customize->add_section(
		'settings_typography',
		array(
			'title' => esc_html__("Typography",'qucreative'),
			'description' => esc_html__("Configure typography options",'qucreative'),
			'priority' => 35,
		)
	);











	$wp_customize->add_control(
		new Qucreative_Tabs_Start(
			$wp_customize,
			'font_data',
			array(
				'section' => 'settings_typography',
				'label'   => esc_html__( 'Enable Meta Options', 'qucreative' ),
			)
		)
	);





	$arr_headings = array(
		'h1'=>@sprintf(esc_html__("Heading %s",'qucreative'),'1'),
		'h2'=>@sprintf(esc_html__("Heading %s",'qucreative'),'2'),
		'h3'=>@sprintf(esc_html__("Heading %s",'qucreative'),'3'),
		'h4'=>@sprintf(esc_html__("Heading %s",'qucreative'),'4'),
		'h5'=>@sprintf(esc_html__("Heading %s",'qucreative'),'5'),
		'h6'=>@sprintf(esc_html__("Heading %s",'qucreative'),'6'),
		'h-group-1'=>@sprintf(esc_html__("Heading Group %s",'qucreative'),'1'),
		'h-group-2'=>@sprintf(esc_html__("Heading Group %s",'qucreative'),'2'),
	);


	$lab = 'typography_sidebar_heading_style';
	$wp_customize->add_control(
		$lab,
		array(
			'label' => esc_html__("Sidebar Widget Heading Style",'qucreative'),
			'section' => 'settings_typography',
			'type' => 'select',
			'choices' => $arr_headings,
			'std' => 'h6',
		)
	);

	$lab = 'typography_footer_heading_style';
	$wp_customize->add_control(
		$lab,
		array(
			'label' => esc_html__("Footer Widget Heading Style",'qucreative'),
			'section' => 'settings_typography',
			'type' => 'select',
			'choices' => $arr_headings,
			'std' => 'h6',
		)
	);

	$lab = 'footer_copyright_textbox_heading_style';
	$wp_customize->add_control(
		$lab,
		array(
			'label' => esc_html__("Footer Copyright Heading Style",'qucreative'),
			'section' => 'settings_typography',
			'type' => 'select',
			'choices' => $arr_headings,
			'std' => 'h-group-1',
		)
	);














	$wp_customize->add_section(
		'settings_content',
		array(
			'title' => esc_html__("Content Settings",'qucreative'),
			'description' => esc_html__("Configure content options",'qucreative'),
			'priority' => 35,
		)
	);






	$arr_opts = array(
		'content-align-center'=>esc_html__("Center",'qucreative'),
		'content-align-left'=>esc_html__("Left",'qucreative'),
		'content-align-right'=>esc_html__("Right",'qucreative'),
	);


	$lab = 'content_align';
	$wp_customize->add_control(
		$lab,
		array(
			'label' => esc_html__("Content Align",'qucreative'),
			'section' => 'settings_content',
			'type' => 'select',
			'choices' => $arr_opts,
		)
	);








	$arr_opts = array(
		'page-title-align-left'=>esc_html__("Left",'qucreative'),
		'page-title-align-center'=>esc_html__("Center",'qucreative'),
		'page-title-align-right'=>esc_html__("Right",'qucreative'),
	);


	$lab = 'page_title_align';

	$wp_customize->add_control(
		$lab,
		array(
			'label' => esc_html__("Page Title Align",'qucreative'),
			'section' => 'settings_content',
			'type' => 'select',
			'choices' => $arr_opts,
		)
	);








	$wp_customize->add_control(
		new Qucreative_Slider_Input(
			$wp_customize,
			'section_margin_bottom',
			array(
				'label'      => esc_html__( 'Section Spacing', 'qucreative' ),
				'section'    => 'settings_content',

				'json' => array(
					'min'=>0,
					'max'=>50,
				),
			) )
	);







	$wp_customize->add_control(
		'width_column',
		array(
			'label' => esc_html__("Column Width",'qucreative'),
			'section' => 'settings_content',
			'type' => 'text',
		)
	);







	$lab = 'width_gap';

	$wp_customize->add_control(
		$lab,
		array(
			'label' => esc_html__("Gap Width",'qucreative'),
			'section' => 'settings_content',
			'type' => 'text',
		)
	);





	$lab = 'width_blur_margin';

	$wp_customize->add_control(
		$lab,
		array(
			'label' => esc_html__("Content Margin Width",'qucreative'),
			'section' => 'settings_content',
			'type' => 'text',
		)
	);


	$lab = 'width_section_bg';

	$wp_customize->add_control(
		$lab,
		array(
			'label' => esc_html__("Section Background Stretch",'qucreative'),
			'section' => 'settings_content',
			'type' => 'text',
		)
	);


	$lab = 'content_add_extra_pixels';

	$wp_customize->add_control(
		$lab,
		array(
			'label' => esc_html__("Add Extra Pixels",'qucreative'),
			'section' => 'settings_content',
			'type' => 'text',
		)
	);





	$lab = 'border_width';

	$wp_customize->add_control(
		$lab,
		array(
			'label' => esc_html__("Site Border",'qucreative'),
			'section' => 'settings_content',
			'type' => 'text',
		)
	);









	$lab = 'border_color';


	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			$lab,
			array(
				'label'      => esc_html__( 'Border Color', 'qucreative' ),
				'section'    => 'settings_content',
			) )
	);












	// -- header settings



	$wp_customize->add_section(
		'settings_header',
		array(
			'title' => esc_html__("Header Settings",'qucreative'),
			'description' => 'This is a settings section.',
			'priority' => 35,
		)
	);









	$arr_on_off = array(
		'menu-type-1'=>esc_html__("Menu 1-Dark (vertical)",'qucreative'),
		'menu-type-2'=>esc_html__("Menu 2-Light (vertical)",'qucreative'),
		'menu-type-3'=>esc_html__("Menu 3-Dark (vertical)",'qucreative'),
		'menu-type-4'=>esc_html__("Menu 4-Light (vertical)",'qucreative'),
		'menu-type-5'=>esc_html__("Menu 5-Dark (vertical)",'qucreative'),
		'menu-type-6'=>esc_html__("Menu 6-Light (vertical)",'qucreative'),
		'menu-type-7'=>esc_html__("Menu 7-Dark (vertical)",'qucreative'),
		'menu-type-8'=>esc_html__("Menu 8-Light (vertical)",'qucreative'),
		'menu-type-9'=>esc_html__("Menu 9-Dark (horizontal)",'qucreative'),
		'menu-type-10'=>esc_html__("Menu 10-Light (horizontal)",'qucreative'),
		'menu-type-11'=>esc_html__("Menu 11 (overlay)",'qucreative'),
		'menu-type-12'=>esc_html__("Menu 12 (overlay)",'qucreative'),
		'menu-type-13'=>esc_html__("Menu 13-Dark (horizontal)",'qucreative'),
		'menu-type-14'=>esc_html__("Menu 14-Light (horizontal)",'qucreative'),
		'menu-type-15'=>esc_html__("Menu 15-Dark (horizontal)",'qucreative'),
		'menu-type-16'=>esc_html__("Menu 16-Light (horizontal)",'qucreative'),
		'menu-type-17'=>esc_html__("Menu 17-Dark (horizontal)",'qucreative'),
		'menu-type-18'=>esc_html__("Menu 18-Light (horizontal)",'qucreative'),
	);


	$lab = 'menu_type';


	$wp_customize->add_control(
		new Qucreative_Select_With_Dependency(
			$wp_customize
			,$lab
			,array(
				'label' => esc_html__("Menu Type",'qucreative'),
				'section' => 'settings_header',
				'type' => 'select',
				'choices' => $arr_on_off,
				'json' => array(
					'input_class'=>'dzs-dependency-field',
				),
			)
		)


	);





	$dependency = array(

		array(
			'element'=>'menu_type',
			'value'=>array('menu-type-9','menu-type-10','menu-type-13','menu-type-14','menu-type-15','menu-type-16','menu-type-17','menu-type-18'),
		),
	)
	;
	$arr_on_off = array(
		'off'=>esc_html__("No",'qucreative'),
		'on'=>esc_html__("Yes",'qucreative'),
	);

	$lab = 'menu_is_sticky';



	$wp_customize->add_control(
		new Qucreative_Select_With_Dependency(
			$wp_customize,
			$lab,
			array(
				'label'      => esc_html__( 'Menu is Sticky ? ', 'qucreative' ),
				'section'    => 'settings_header',
				'type' => 'select',
				'choices' => $arr_on_off,
				'json'    => array(
					'dependency'=>json_encode($dependency),
				),
			) )
	);





	$lab = 'menu_horizontal_shadow_style';



	$wp_customize->add_control(
		new Qucreative_Select_With_Dependency(
			$wp_customize,
			$lab,
			array(
				'label'      => esc_html__( 'Shadow Style', 'qucreative' ),
				'section'    => 'settings_header',
				'type' => 'select',
				'choices' => array(
					'none'=>esc_html__("No Shadow",'qucreative'),
					'shadow_1'=>esc_html__("Style",'qucreative').' 1',
					'shadow_2'=>esc_html__("Style",'qucreative').' 2',
					'shadow_3'=>esc_html__("Style",'qucreative').' 3',
				),
				'json'    => array(
					'dependency'=>json_encode($dependency),
				),
			) )
	);









	$dependency = array(

		array(
			'element'=>'menu_type',
			'value'=>array('menu-type-1','menu-type-2','menu-type-3','menu-type-4','menu-type-5','menu-type-6','menu-type-15','menu-type-16','menu-type-17','menu-type-18'),
		),
	)
	;

	$wp_customize->add_control(
		new Qucreative_Slider_Input(
			$wp_customize,
			'menu_enviroment_opacity',
			array(
				'label'      => esc_html__( 'Menu Enviroment Opacity', 'qucreative' ),
				'section'    => 'settings_header',
				'json'    => array(
					'dependency'=>json_encode($dependency),
				),
			) )
	);















	$args = array(
		'public'   => true,
		'_builtin' => false
	);

	$post_types = get_post_types( $args);



	$choices_arr = array();

	foreach ( $post_types  as $lab => $post_type ) {

		$choices_arr[$lab] = $post_type;
	}









	$lab = 'logo';

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $lab, array(
		'section'     => 'settings_header',
		'label'       => esc_html__("Logo", 'qucreative'),
	) ) );








	$lab = 'logo_x';

	$wp_customize->add_control(
		$lab,
		array(
			'label' => esc_html__("Logo",'qucreative').' X '.esc_html__("Position",'qucreative'),
			'section' => 'settings_header',
			'type' => 'select',

			'choices' => array(
				'default'=>esc_html__("Default",'qucreative').'',
				'custom_position'=>esc_html__("Custom Position",'qucreative').'',



			),
		)
	);




	$dependency = array(

		array(
			'element'=>'logo_x',
			'value'=>array('custom_position'),
		),
	)
	;


	add_action( 'customize_render_control_logo_x_custom', function(){
		?>
        <div class="sidenote"><?php echo esc_html__("By default, logo will center horizontally on vertical menus.",'qucreative'); ?></div>
		<?php
	});


	$lab = 'logo_x_custom';




	$wp_customize->add_control(
		new Qucreative_Input_With_Dependency(
			$wp_customize,
			$lab,
			array(
				'label' => esc_html__("Logo",'qucreative').' X '.esc_html__("Position",'qucreative').' ('.esc_html__("in",'qucreative').' px)',
				'section'    => 'settings_header',
				'type' => 'text',
				'json'    => array(
					'dependency'=>json_encode($dependency),
					'input_class'=>' text-input',
				),
			) )
	);




	$lab = 'logo_y';

	$wp_customize->add_control(
		$lab,
		array(
			'label' => esc_html__("Logo",'qucreative').' Y '.esc_html__("Position",'qucreative'),
			'section' => 'settings_header',
			'type' => 'select',

			'choices' => array(
				'default'=>esc_html__("Default",'qucreative').'',
				'custom_position'=>esc_html__("Custom Position",'qucreative').'',

			),
		)
	);




	$dependency = array(

		array(
			'element'=>'logo_y',
			'value'=>array('custom_position'),
		),
	)
	;



	add_action( 'customize_render_control_logo_y_custom', function(){
		?>
        <div class="sidenote"><?php echo esc_html__("By default, logo will center vertically on horizontal menus.",'qucreative'); ?></div>
		<?php
	});





	$lab = 'logo_y_custom';




	$wp_customize->add_control(
		new Qucreative_Input_With_Dependency(
			$wp_customize,
			$lab,
			array(
				'label' => esc_html__("Logo",'qucreative').' Y '.esc_html__("Position",'qucreative').' ('.esc_html__("in",'qucreative').' px)',
				'section'    => 'settings_header',
				'type' => 'text',
				'json'    => array(
					'dependency'=>json_encode($dependency),
					'input_class'=>' text-input',
				),
			) )
	);





	$lab = 'logo_width';


	$wp_customize->add_control(
		$lab,
		array(
			'label' => esc_html__("Logo Width",'qucreative'),
			'section' => 'settings_header',
			'type' => 'text',
		)
	);




	$lab = 'logo_height';


	$wp_customize->add_control(
		$lab,
		array(
			'label' => esc_html__("Logo Height",'qucreative'),
			'section' => 'settings_header',
			'type' => 'text',
		)
	);








	$lab = 'copyright_textbox';


	$wp_customize->add_control(
		$lab,
		array(
			'label' => esc_html__("Copyright text",'qucreative'),
			'section' => 'settings_header',
			'type' => 'text',
		)
	);






	$arr_headings = array(
		'h1'=>esc_html__("Heading",'qucreative').' 1',
		'h2'=>esc_html__("Heading",'qucreative').' 2',
		'h3'=>esc_html__("Heading",'qucreative').' 3',
		'h4'=>esc_html__("Heading",'qucreative').' 4',
		'h5'=>esc_html__("Heading",'qucreative').' 5',
		'h6'=>esc_html__("Heading",'qucreative').' 6',
		'h-group-1'=>esc_html__("Heading Group",'qucreative').' 1',
		'h-group-2'=>esc_html__("Heading Group",'qucreative').' 2',


	);
	$lab = 'copyright_textbox_heading_style';







	$wp_customize->add_setting(
		'social_icons',
		array(
			'default' => '',
			'sanitize_callback' => 'qucreative_return_false_value',
			'transport'=>'postMessage',
		)
	);

	$wp_customize->add_control(
		'social_icons',
		array(
			'label' => esc_html__("Social Icons",'qucreative'),
			'section' => 'settings_header',
			'type' => 'text',
		)
	);















	$wp_customize->add_section(
		'settings_presets',
		array(
			'title' => esc_html__("Theme Design Presets",'qucreative'),
			'description' => esc_html__("Choose a design preset",'qucreative'),
			'priority' => 1,
		)
	);





	$lab = 'presets';

	$wp_customize->add_setting(
		$lab,
		array(
			'default' => '1',
			'sanitize_callback' => 'qucreative_return_false_value',
			'transport'=>'postMessage',
		)
	);

	$wp_customize->add_control(
		new Qucreative_Customize_Control_Presets(
			$wp_customize,
			$lab,
			array(
				'section' => 'settings_presets',
				'label'   => esc_html__( 'Customizer Presets', 'qucreative' ),
			)
		)
	);


}





add_action( 'customize_register', 'qucreative_customize_register', 11 );



function qucreative_sanitize_checkbox_multiple( $values ) {

	$multi_values = !is_array( $values ) ? explode( ',', $values ) : $values;

	return !empty( $multi_values ) ? array_map( 'sanitize_text_field', $multi_values ) : array();
}



/**
 * Binds JS listener to make Customizer color_scheme control.
 *
 * Passes color scheme data as colorScheme global.
 *
 *
 */
function qucreative_customize_control_js() {



	wp_enqueue_script('qucreative-customizer', QUCREATIVE_THEME_URL . 'assets/admin/customizer.js');
	wp_enqueue_style('faiconselector', QUCREATIVE_THEME_URL . 'assets/dzsiconselector/dzsiconselector.css');
	wp_enqueue_script('faiconselector', QUCREATIVE_THEME_URL . 'assets/dzsiconselector/dzsiconselector.js');


	wp_enqueue_script('jquery-ui-slider');
	wp_enqueue_style('jquery-ui-smoothness', 'https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css');


}
add_action( 'customize_controls_enqueue_scripts', 'qucreative_customize_control_js' );

/**
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 *
 *
 */
function qucreative_customize_preview_js() {
	wp_enqueue_script( 'q-customize-preview', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20141216', true );
}
add_action( 'customize_preview_init', 'qucreative_customize_preview_js' );




/**
 * Multiple checkbox customize control class.
 *
 * @since  1.0.0
 * @access public
 */

if(class_exists('WP_Customize_Control')){
	class Qucreative_Customize_Control_Checkbox_Multiple extends WP_Customize_Control {

		/**
		 * The type of customize control being rendered.
		 *
		 * @since  1.0.0
		 * @access public
		 * @var    string
		 */
		public $type = 'checkbox-multiple';

		/**
		 * Enqueue scripts/styles.
		 *
		 * @since  1.0.0
		 * @access public
		 * @return void
		 */
		public function enqueue() {
			wp_enqueue_script( 'qucreative.admin', QUCREATIVE_THEME_URL . 'assets/admin/admin.js', array( 'jquery' ) );
		}

		/**
		 * Displays the control content.
		 *
		 * @since  1.0.0
		 * @access public
		 * @return void
		 */
		public function render_content() {

			if ( empty( $this->choices ) )
				return; ?>

			<?php if ( !empty( $this->label ) ) : ?>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php endif; ?>

			<?php if ( !empty( $this->description ) ) : ?>
                <span class="description customize-control-description"><?php echo $this->description; ?></span>
			<?php endif; ?>

			<?php $multi_values = !is_array( $this->value() ) ? explode( ',', $this->value() ) : $this->value(); ?>

            <ul>
				<?php foreach ( $this->choices as $value => $label ) : ?>

                    <li>
                        <label>
                            <input type="checkbox" value="<?php echo esc_attr( $value ); ?>" <?php checked( in_array( $value, $multi_values ) ); ?> />
							<?php echo esc_html( $label ); ?>
                        </label>
                    </li>

				<?php endforeach; ?>
            </ul>

            <input type="hidden" <?php $this->link(); ?> value="<?php echo esc_attr( implode( ',', $multi_values ) ); ?>" />
		<?php }
	}

	class Qucreative_Customize_Control_Checkbox_Nova extends WP_Customize_Control {
		public $type = 'checkbox-nova';

		public function render_content() {

			$str_checked = '';

			if($this->value()=='1'){
				$str_checked = ' checked';
			}

			?>
            <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
            <div class="dzscheckbox skin-nova">
                <input id="<?php echo (esc_html( $this->label )); ?>" type="checkbox" value="on"  <?php echo $str_checked.' '; $this->link(); ?>/>
                <label for="<?php echo (esc_html( $this->label )); ?>"></label>
            </div>
			<?php
		}
	}



	class Qucreative_Slider_Input extends WP_Customize_Control {
		public $type    = 'slider-input';
		public $removed = '';
		public $context;

		public function enqueue() {

			wp_enqueue_script('jquery-ui-core');
			wp_enqueue_script('jquery-ui-slider');
		}


		public function render_content() {



			$id = 'customize-control-' . str_replace( '[', '-', str_replace( ']', '', $this->id ) );
			?>

            <label class="check-customize-setting-link" <?php



			if(isset($this->json['dependency'])){

				echo ' data-dependency=\''.$this->json['dependency'].'\'';
			}else{
				echo ' no-dependency';
			}

			$min = 0;
			$max = 100;


			if(isset($this->json['min'])){

				$min = $this->json['min'];
			}
			if(isset($this->json['max'])){

				$max = $this->json['max'];
			}



			?>>
                <span class="customize-control-title hmm"><?php echo esc_html( $this->label ); ?></span>
                <input  class="disabled check-customize-setting-link" id="<?php echo esc_attr( $id ); ?>" type="text" value="<?php echo $this->value(); ?>" <?php $this->link(); ?>/>
                <div class="setup-slider-for-prev-input" id="<?php echo $id.'-slider'; ?>"></div>
                <script>

                    jQuery(document).ready(function($){
                        var _t = jQuery("#<?php echo $id.'-slider'; ?>");
                        var _val = _t.prev();

                        setTimeout(function(){

                            try{
                                _t.slider({

                                    value: _val.val()
                                    ,animate: "fast"
                                    ,min: <?php echo $min; ?>
                                    ,max: <?php echo $max; ?>
                                    ,step: 1
                                    ,slide: function(e,ui){

                                        var _t2 = $(this);
                                        _t2.prev().val(ui.value);
                                        _t2.prev().trigger('change');

                                    }
                                });
                            }catch(err){
                                console.warn(err);
                            }

                            _val.on('change',function(){
                                var _t = $(this);

                                _t.next().slider('value',parseInt(_t.val(),10));
                            })
                        },100);
                    })
                </script>
            </label>
			<?php
		}
	}



	class Qucreative_Input_With_Dependency extends WP_Customize_Control {
		public $type    = 'text';



		public function render_content() {

			$id = 'customize-control-' . str_replace( '[', '-', str_replace( ']', '', $this->id ) );

			?>
            <label class="check-customize-setting-link" <?php


			if(isset($this->json['dependency'])){

				echo ' data-dependency=\''.$this->json['dependency'].'\'';
			}else{
				echo ' no-dependency';
			}



			?>>
				<?php if ( ! empty( $this->label ) ) : ?>
                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php endif;
				if ( ! empty( $this->description ) ) : ?>
                    <span class="description customize-control-description"><?php echo $this->description; ?></span>
				<?php endif; ?>
                <input class=" <?php

				if(isset($this->json['input_class'])){
					echo $this->json['input_class'];
				}

				?>"  type="<?php echo esc_attr( $this->type ); ?>" <?php $this->input_attrs(); ?> value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> />
            </label>
			<?php
		}
	}






	class Qucreative_Select_With_Dependency extends WP_Customize_Control {
		public $type    = 'select';



		public function render_content() {

			$id = 'customize-control-' . str_replace( '[', '-', str_replace( ']', '', $this->id ) );

			if ( empty( $this->choices ) )
				return;

			?>
            <label class="check-customize-setting-link" <?php


			if(isset($this->json['dependency'])){

				echo ' data-dependency=\''.$this->json['dependency'].'\'';
			}else{
				echo ' no-dependency';
			}



			?>>
				<?php if ( ! empty( $this->label ) ) : ?>
                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php endif;
				if ( ! empty( $this->description ) ) : ?>
                    <span class="description customize-control-description"><?php echo $this->description; ?></span>
				<?php endif; ?>

                <select class=" <?php

				if(isset($this->json['input_class'])){
					echo $this->json['input_class'];
				}

				?>" <?php $this->link(); ?>>
					<?php
					foreach ( $this->choices as $value => $label )
						echo '<option value="' . esc_attr( $value ) . '"' . selected( $this->value(), $value, false ) . '>' . $label . '</option>';
					?>
                </select>
            </label>
			<?php
		}
	}


	class Qucreative_Customize_Control_Presets extends WP_Customize_Control {
		public $type = 'presets';

		public function render_content() {

			$id = 'customize-control-' . str_replace( '[', '-', str_replace( ']', '', $this->id ) );


			$val = $this->value();



			$sw_has_personal_presets = false;



			global $qucreative_theme_data;


			foreach ($qucreative_theme_data['arr_presets'] as $lab => $ap ) {
				if ($ap['default'] == false) {

					$sw_has_personal_presets = true;
				}
			}
			?>

            <label>
                <!--                hidden-->
                <input class="disabled" id="<?php echo esc_attr( $id ); ?>" type="" value="<?php echo $this->value(); ?>" <?php $this->link(); ?>/>
            </label>

			<?php if($sw_has_personal_presets){
				?>
                <h3 class="preset-h3"><?php echo esc_html__("My Presets",'qucreative'); ?></h3>


				<?php


				foreach ($qucreative_theme_data['arr_presets'] as $lab => $ap ){
					if($ap['default']==true){
						continue;
					}

					?>
                    <div class="preset-con user-preset <?php
					if($this->value()===$lab){
						echo ' preset-activated';
					}

					?>">
                    <span class="the-label"><?php
	                    echo $ap['name'];
	                    ?></span>
                        <span class="btn-activate-preset dzs-button-simple" data-id="<?php echo $lab; ?>"><?php echo esc_html__("ACTIVATE",'qucreative'); ?></span>
                        <span class="btn-activated-preset dzs-button-simple"><?php echo esc_html__("CURRENT THEME",'qucreative'); ?></span>

                        <span class="btn-remove-preset " data-id="<?php echo $lab; ?>"><i class="fa fa-times" aria-hidden="true"></i></span>


                    </div>
					<?php
				}

				?>
                <br>
				<?php

			}
			?>


            <h3 class="preset-h3"><?php echo esc_html__("Default Presets",'qucreative'); ?></h3>

			<?php

			foreach ($qucreative_theme_data['arr_presets'] as $lab => $ap ){

				if($ap['default']==false){
					continue;
				}
				$val = $this->value();
				if(is_numeric($lab)){
					$lab = intval($lab);
				}
				if(is_numeric($this->value())){
					$val = intval($this->value());
				}
				?>
                <div class="preset-con <?php


				if($val===$lab){
					echo ' preset-activated';
				}

				?>">
                    <span class="the-label"><?php
	                    echo $ap['name'];
	                    ?></span>
                    <span class="btn-activate-preset dzs-button-simple" data-id="<?php echo $lab; ?>"><?php echo esc_html__("ACTIVATE",'qucreative'); ?></span>
                    <span class="btn-activated-preset dzs-button-simple"><?php echo esc_html__("CURRENT THEME",'qucreative'); ?></span>

                    <span class="btn-remove-preset " data-id="<?php echo $lab; ?>"><i class="fa fa-times" aria-hidden="true"></i></span>
                </div>
				<?php
			}

			?>

			<?php
		}
	}

	class Qucreative_Tabs_Start extends WP_Customize_Control {
		public $type    = 'tabs-start';
		public $removed = '';
		public $context;

		public function enqueue() {

			wp_enqueue_style('tabs.and.accordions', QUCREATIVE_THEME_URL.'libs/tabsandaccordions/tabsandaccordions.css');
			wp_enqueue_script('tabs.and.accordions', QUCREATIVE_THEME_URL.'libs/tabsandaccordions/tabsandaccordions.js');
			wp_enqueue_style('chosen', QUCREATIVE_THEME_URL.'assets/chosen/chosen.css');
			wp_enqueue_script('chosen', QUCREATIVE_THEME_URL.'assets/chosen/chosen.js');
			wp_enqueue_style('selector', QUCREATIVE_THEME_URL.'libs/selector/selector.css');
			wp_enqueue_script('selector', QUCREATIVE_THEME_URL.'libs/selector/selector.js');

		}

		public function generate_font_conglomerate($pargs = array()){

			$margs = array(
				'arr_vals'=>array(),
				'label_prefix'=>"h1",
				'call_from'=>"",
				'heading'=>esc_html__("H1 Heading",'qucreative'),
				'default_font_size'=>70,
				'default_line_height'=>1.15,
				'default_weight'=>'700',
				'default_color'=>'#6b6b6b',
				'weight_feed_from'=>'headings_font',
				'font_conglomerate_extra_classes'=>'',
				'include_number_checkbox'=>false,
				'include_divider_select'=>false,
				'hide_font_size'=>false,
				'hide_line_height'=>false,
				'colorpicker'=>false,
				'activate_link_to'=>false, // -- link either to heading font or body font instead of font
				'responsive_slider'=>false,
				'colorpicker_for_light_too'=>false, // -- include a second color picker for dark versions
				'colorpicker_for_light_label'=>'', // -- some elements are within section so lets make available custom label for light color picker
				'font'=>'', // -- if font is set then a font selector will appear along with verifying the real font
			);


			if($pargs){
				$margs = array_merge($margs,$pargs);
			}



			$arr_vals = $margs['arr_vals'];


			if($margs['label_prefix']=='h-group-1'){

			}


			?>

            <div class="font-conglomerate <?php echo $margs['font_conglomerate_extra_classes']; ?>">

                <h3 class="preset-h3"><?php echo $margs['heading'];

					$lab = $margs['label_prefix']."_enable";


					$val = 'off';


					if(isset($arr_vals[$lab])){
						$val = $arr_vals[$lab];
					}


					if($margs['include_number_checkbox']){
						echo '<input class="number-enable-checkbox number-enable-checkbox2  font-customizer-field" type="checkbox" value="on" name="'.$lab.'"';

						if($val=='on'){
							echo ' checked';
						}

						echo '/>';
					}


					?></h3>







				<?php




				global $qucreative_theme_data;

				$arr_fonts = array();


				if(defined("QUCREATIVE_VERSION")){
					foreach ($qucreative_theme_data['font_data_items'] as $fdi){

						array_push($arr_fonts, $fdi->family);
					}
				}





				if($margs['call_from']=='section_title_two_font'){


					$lab = "section_title_two_font";

					$val = 'Lato';
					$default_val = $val;
					echo '<p class="feed-sidenote "><span class="default-val" data-for="'.$lab.'">'.$default_val.'</span></p>';



					if(isset($arr_vals[$lab]) && $arr_vals[$lab]){
						$val = $arr_vals[$lab];
					}



					echo '<h6>'.esc_html__("Font",'qucreative').'</h6>';

					echo qucreative_helpers_generate_select($lab,array(
						'options'=>$arr_fonts,
						'class'=>'dzs-style-me opener-list skin-charm font-customizer-field font-family-selector',
						'seekval'=>$val,
					));






				}


				if($margs['call_from']=='section_title_two_second_font'){


					$lab = "section_title_two_second_font";

					$val = 'Lato';
					$default_val = $val;
					echo '<p class="feed-sidenote "><span class="default-val" data-for="'.$lab.'">'.$default_val.'</span></p>';



					if(isset($arr_vals[$lab]) && $arr_vals[$lab]){
						$val = $arr_vals[$lab];
					}



					echo '<h6>'.esc_html__("Font",'qucreative').'</h6>';

					echo qucreative_helpers_generate_select($lab,array(
						'options'=>$arr_fonts,
						'class'=>'dzs-style-me opener-list skin-charm font-customizer-field font-family-selector',
						'seekval'=>$val,
					));





				}




				if($margs['font']){


					?>


                    <h6><?php echo esc_html__("Font",'qucreative'); ?></h6>

					<?php


					$lab = $margs['label_prefix']."_font";

					$val = $margs['font'];
					$default_val = $val;
					echo '<p class="feed-sidenote "><span class="default-val" data-for="'.$lab.'">'.$default_val.'</span></p>';




					if(isset($arr_vals[$lab])){
						$val = $arr_vals[$lab];
					}





					echo qucreative_helpers_generate_select($lab,array(
						'options'=>$arr_fonts,
						'class'=>'dzs-style-me opener-list skin-charm font-customizer-field font-family-selector ',
						'seekval'=>$val,
						'extraattr'=>' data-default-val="'.$margs['font'].'"',
					));
				}

				if($margs['activate_link_to']){

					?>


                    <h6><?php echo esc_html__("Use Font from",'qucreative'); ?></h6>

					<?php


					$lab = $margs['label_prefix']."_font_link_to";

					$val = 'headings';
					$default_val = $val;
					echo '<p class="feed-sidenote "><span class="default-val" data-for="'.$lab.'">'.$default_val.'</span></p>';




					if(isset($arr_vals[$lab])){
						$val = $arr_vals[$lab];
					}





					echo qucreative_helpers_generate_select($lab,array(
						'options'=>array(
							array(
								'label'=>esc_html__("Headings Font",'qucreative'),
								'value'=>'headings',
							),
							array(
								'label'=>esc_html__("Body Font",'qucreative'),
								'value'=>'body',
							),
						),
						'class'=>'dzs-style-me opener-list skin-charm font-customizer-field   link-to-selector ',
						'seekval'=>$val,
						'extraattr'=>' data-default-val="'.$default_val.'" data-label-prefix="'.$margs['label_prefix'].'"',
					));
				}


				?>


				<?php
				if($margs['default_weight']!='none'){
					?>

                    <h6><?php echo esc_html__("Font Weight / Style",'qucreative'); ?></h6>

					<?php


					$lab = $margs['label_prefix']."_weight";

					$val = $margs['default_weight'];
					$default_val = $val;
					echo '<p class="feed-sidenote "><span class="default-val" data-for="'.$lab.'">'.$default_val.'</span></p>';





					if(isset($arr_vals[$lab])){
						$val = $arr_vals[$lab];
					}

					if($val=='regular'){

					}
					if($margs['label_prefix']=='h-group-1'){

					}



					echo qucreative_helpers_generate_select($lab,array(
						'options'=>'',
						'class'=>'dzs-style-me opener-list skin-charm font-customizer-field weights-feeder weights-feeder-from-'.$margs['weight_feed_from'],
						'seekval'=>$val,
						'extraattr'=>' data-default-weight="'.$val.'"',
					));



				}

				if($margs['default_font_size']!='none'){
					?>


                    <div class="dzs-row">
						<?php

						if($margs['hide_font_size']){

						}else{

							?>
                            <div class="dzs-col-md-6">
								<?php

								$lab = $margs['label_prefix']."_size";



								?>
                                <h6><?php echo esc_html__("Font Size",'qucreative'); ?></h6>
								<?php



								$val = $margs['default_font_size'];

								if(isset($arr_vals[$lab])){
									$val = $arr_vals[$lab];
								}

								echo qucreative_helpers_generate_input_text($lab,array(

									'options'=>'',
									'class'=>'font-customizer-field small-input',
									'seekval'=>$val,
								));

								?><span class="sidenote"><?php echo esc_html__("PIXELS",'qucreative');?></span>
                            </div>
							<?php

						}
						if($margs['hide_line_height']){

						}else{

							?>
                            <div class="dzs-col-md-6">
								<?php



								$lab = $margs['label_prefix']."_line_height";




								?>
                                <h6><?php echo esc_html__("Line Height",'qucreative'); ?></h6>
								<?php



								$val = $margs['default_line_height'];

								if(isset($arr_vals[$lab])){
									$val = $arr_vals[$lab];
								}

								echo qucreative_helpers_generate_input_text($lab,array(

									'options'=>'',
									'class'=>'font-customizer-field small-input',
									'seekval'=>$val,
								));

								?><span class="sidenote"><?php echo esc_html__("EM",'qucreative');?></span>
                            </div>
							<?php

						}
						?>
                    </div>

					<?php
				}
				?>
				<?php




				if($margs['include_divider_select']){

					$lab = $margs['label_prefix']."_divider_style";

					$val = 'style-fullwidth';

					if(isset($arr_vals[$lab])){
						$val = $arr_vals[$lab];
					}
					echo qucreative_helpers_generate_select($lab,array(
						'options'=>array(
							array(
								'label'=>'Style 1 ( fullwidth )',
								'value'=>'style-fullwidth',
							),
							array(
								'label'=>'Style 2 ( box )',
								'value'=>'style-box',
							),
						),
						'class'=>'dzs-style-me opener-list skin-charm font-customizer-field chosen-select ',
						'seekval'=>$val,
					));
				}


				if($margs['colorpicker']) {
					?>
                    <div class="dzs-row">
                        <div class="dzs-col-md-12">

							<?php
							$lab = $margs['label_prefix']."_color";
							?>

                            <h6><?php echo esc_html__("Color",'qucreative'); ?></h6>
                            <p class="sidenote "><?php echo @sprintf('<span class="default-val hidden" data-for="'.$lab.'">'.$margs['default_color'].'</span>'); ?></p>
							<?php



							$val = $margs['default_color'];

							if(isset($arr_vals[$lab])){
								$val = $arr_vals[$lab];
							}

							echo qucreative_helpers_generate_input_text($lab,array(

								'options'=>'',
								'class'=>'font-customizer-field dzswp-color-picker',
								'seekval'=>$val,
							));

							?>
                        </div>
                    </div>
					<?php
				}
				if($margs['colorpicker_for_light_too']) {
					?>
                    <div class="dzs-row">
                        <div class="dzs-col-md-12">

							<?php
							$lab = $margs['label_prefix']."_color_for_light";



							$title = esc_html__("Light",'qucreative').' '.esc_html__("Color",'qucreative');

							if($margs['colorpicker_for_light_label']){
								$title = $margs['colorpicker_for_light_label'];
							}
							?>

                            <h6><?php echo $title; ?></h6>
                            <p class="sidenote "><?php echo @sprintf('<span class="default-val hidden" data-for="'.$lab.'">'.$margs['default_color_for_light'].'</span>'); ?></p>
							<?php



							$val = $margs['default_color_for_light'];

							if(isset($arr_vals[$lab])){
								$val = $arr_vals[$lab];
							}

							echo qucreative_helpers_generate_input_text($lab,array(

								'options'=>'',
								'class'=>'font-customizer-field dzswp-color-picker',
								'seekval'=>$val,
							));

							?>
                        </div>
                    </div>
					<?php
				}



				if($margs['responsive_slider']) {

					$lab = $margs['label_prefix']."_responsive_slider";;
					$val = '0';
					$default_val = $val;
					echo '<p class="feed-sidenote "><span class="default-val" data-for="'.$lab.'">'.$default_val.'</span></p>';



					if(isset($arr_vals[$lab])){
						$val = $arr_vals[$lab];
					}

					$title = esc_html__("Decrease size on mobile",'qucreative');

					?>

                    <h6><?php echo $title; ?></h6>
                    <div class="dzs-table table-for-<?php echo $lab; ?>">

                        <div class="small-col" style="width: 10%;">
							<?php

							echo qucreative_helpers_generate_input_text($lab,array(

								'options'=>'',
								'class'=>'font-customizer-field small-input',
								'seekval'=>$val,
							));

							?>
                        </div>

                        <div class="large-col" style="width: 90%;">

                            <div class="slider-for-responsive-slider"></div>
                        </div>

                    </div>
                    <span class="sidenote"><?php echo esc_html__("in PERCENT",'qucreative');?></span>
					<?php
				}
				?>

            </div>
			<?php
		}


		public function render_content() {

			$id = 'customize-control-' . str_replace( '[', '-', str_replace( ']', '', $this->id ) );

			$arr_vals = array();

			parse_str($this->value(), $arr_vals);


			?>

            <label>
                <input class="disabled" id="<?php echo esc_attr( $id ); ?>" type="text" value="<?php echo $this->value(); ?>" <?php $this->link(); ?>/>



            </label>

            <form  class="dzs-tabs typography-tabs dzs-tabs-1 auto-init skin-box " data-options='{
"design_tabsposition" : "top"
,"design_transition": "fade"
,"design_tabswidth": "default"
,"design_tabsposition":"top"
,"toggle_breakpoint" : "4000"
,"refresh_tab_height": "1000"
,"settings_appendWholeContent": true
,"design_tabswidth": "fullwidth"
,"settings_startTab": "-1"
,"toggle_type": "accordion"
}'>

				<?php


				global $qucreative_theme_data;

				$arr_fonts = array();

				foreach ($qucreative_theme_data['font_data_items'] as $fdi){

					array_push($arr_fonts, $fdi->family);
				}
				?>

                <div class="dzs-tab-tobe">
                    <div class="tab-menu ">
						<?php echo esc_html__("Headings ",'qucreative'); ?>
                    </div>
                    <div class="tab-content" data-for="headings">
                        <h3 class="preset-h3"><?php echo esc_html__("Headings Font",'qucreative'); ?></h3>

						<?php

						$lab = "headings_font";


						$val = 'Lato';
						$default_val = $val;


						if(isset($arr_vals[$lab]) && $arr_vals[$lab]){
							$val = $arr_vals[$lab];
						}
						echo '<p class="feed-sidenote "><span class="default-val" data-for="'.$lab.'">'.$default_val.'</span></p>';



						echo qucreative_helpers_generate_select($lab,array(
							'options'=>$arr_fonts,
							'class'=>'dzs-style-me opener-list skin-charm font-customizer-field font-family-selector',
							'seekval'=>$val,
						));


						$this->generate_font_conglomerate( array(
								'arr_vals'=>$arr_vals,
								'label_prefix'=>"h1",
								'heading'=>esc_html__("H1 Heading",'qucreative'),
								'default_weight'=>"700",
								'default_font_size'=>70,
								'default_line_height'=>1.15,
								'responsive_slider'=>true,
							)
						);


						$this->generate_font_conglomerate( array(
								'arr_vals'=>$arr_vals,
								'label_prefix'=>"h2",
								'heading'=>esc_html__("H2 Heading",'qucreative'),
								'default_weight'=>"700",
								'default_font_size'=>"50",
								'default_line_height'=>"1.15",
								'responsive_slider'=>true,
							)
						);


						$this->generate_font_conglomerate( array(
								'arr_vals'=>$arr_vals,
								'label_prefix'=>"h3",
								'heading'=>esc_html__("H3 Heading",'qucreative'),
								'default_weight'=>"700",
								'default_font_size'=>"40",
								'default_line_height'=>"1.15",
								'responsive_slider'=>true,
							)
						);


						$this->generate_font_conglomerate( array(
								'arr_vals'=>$arr_vals,
								'label_prefix'=>"h4",
								'heading'=>esc_html__("H4 Heading",'qucreative'),
								'default_weight'=>"700",
								'default_font_size'=>"30",
								'default_line_height'=>"1.15",
								'responsive_slider'=>true,
							)
						);


						$this->generate_font_conglomerate( array(
								'arr_vals'=>$arr_vals,
								'label_prefix'=>"h5",
								'heading'=>esc_html__("H5 Heading",'qucreative'),
								'default_weight'=>"700",
								'default_font_size'=>"20",
								'default_line_height'=>"1.15",
								'responsive_slider'=>true,
							)
						);


						$this->generate_font_conglomerate( array(
								'arr_vals'=>$arr_vals,
								'label_prefix'=>"h6",
								'heading'=>esc_html__("H6 Heading",'qucreative'),
								'default_font_size'=>"14",
								'default_weight'=>"700",
								'default_line_height'=>"1.57",
								'responsive_slider'=>true,
							)
						);


						$this->generate_font_conglomerate( array(
								'arr_vals'=>$arr_vals,
								'label_prefix'=>"h-group-1",
								'heading'=>esc_html__("Heading Group ",'qucreative').'1',
								'default_font_size'=>"11",
								'default_weight'=>"700",
								'default_line_height'=>"1.54",
								'responsive_slider'=>true,
							)
						);


						$this->generate_font_conglomerate( array(
								'arr_vals'=>$arr_vals,
								'label_prefix'=>"h-group-2",
								'heading'=>esc_html__("Heading Group ",'qucreative').'2',
								'default_font_size'=>"25",
								'default_weight'=>"700",
								'default_line_height'=>"1.28",
								'responsive_slider'=>true,
							)
						);



						?>



                        <div class="btn-return-to-defaults-con">

                            <div class="button-secondary btn-return-to-defaults" data-for="headings"><?php echo esc_html__("RETURN TO DEFAULT",'qucreative'); ?></div>
                        </div>

                    </div>
                </div>

                <div class="dzs-tab-tobe">
                    <div class="tab-menu ">
						<?php echo esc_html__("Body text ",'qucreative'); ?>
                    </div>
                    <div class="tab-content"  data-for="body-font">
                        <h3 class="preset-h3"><?php echo esc_html__("Body Font",'qucreative'); ?></h3>

						<?php

						$lab = "body_font";

						$val = 'Open Sans';

						$default_val = $val;
						echo '<p class="feed-sidenote "><span class="default-val" data-for="'.$lab.'">'.$default_val.'</span></p>';




						if(isset($arr_vals[$lab]) && $arr_vals[$lab]){
							$val = $arr_vals[$lab];
						}

						echo qucreative_helpers_generate_select("body_font",array(
							'options'=>$arr_fonts,
							'class'=>'dzs-style-me opener-list skin-charm font-customizer-field font-family-selector',
							'seekval'=>$val,
						));


						$this->generate_font_conglomerate( array(
								'arr_vals'=>$arr_vals,
								'label_prefix'=>"p",
								'heading'=>esc_html__("Paragraph",'qucreative'),
								'default_weight'=>"regular",
								'default_font_size'=>13,
								'default_line_height'=>1.92,
								'weight_feed_from'=>'body_font',

								'default_color'=>'#222222',
								'default_color_for_light'=>'#ffffff',
								'colorpicker'=>true,
								'colorpicker_for_light_too'=>true,
								'colorpicker_for_light_label' => esc_html__("Color inside Dark Section",'qucreative'),
							)
						);


						$this->generate_font_conglomerate( array(
								'arr_vals'=>$arr_vals,
								'label_prefix'=>"hyperlink",
								'heading'=>esc_html__("Hyperlink",'qucreative'),
								'default_weight'=>"600",
								'hide_font_size'=>true,
								'hide_line_height'=>true,
								'weight_feed_from'=>'body_font',
							)
						);


						$this->generate_font_conglomerate( array(
								'arr_vals'=>$arr_vals,
								'label_prefix'=>"font-group-1",
								'heading'=>esc_html__("Body text group",'qucreative').' 1',
								'default_weight'=>"600italic",
								'default_font_size'=>"14",
								'default_line_height'=>"1.42",
								'weight_feed_from'=>'body_font',
							)
						);


						$this->generate_font_conglomerate( array(
								'arr_vals'=>$arr_vals,
								'label_prefix'=>"font-group-2",
								'heading'=>esc_html__("Body text group",'qucreative').' 2',
								'default_weight'=>"600",
								'default_font_size'=>"14",
								'default_line_height'=>"1.42",
								'weight_feed_from'=>'body_font',
							)
						);

						$this->generate_font_conglomerate( array(
								'arr_vals'=>$arr_vals,
								'label_prefix'=>"font-group-3",
								'heading'=>esc_html__("Body text group",'qucreative').' 3',
								'default_weight'=>"600italic",
								'default_font_size'=>"11",
								'default_line_height'=>"1.27",
								'weight_feed_from'=>'body_font',
							)
						);

						$this->generate_font_conglomerate( array(
								'arr_vals'=>$arr_vals,
								'label_prefix'=>"font-group-4",
								'heading'=>esc_html__("Body text group",'qucreative').' 4',
								'default_weight'=>"italic",
								'default_font_size'=>"14",
								'default_line_height'=>"1.42",
								'weight_feed_from'=>'body_font',
							)
						);

						$this->generate_font_conglomerate( array(
								'arr_vals'=>$arr_vals,
								'label_prefix'=>"font-group-5",
								'heading'=>esc_html__("Body text group ",'qucreative').'5',
								'default_weight'=>"600",
								'default_font_size'=>"14",
								'default_line_height'=>"1.42",
								'weight_feed_from'=>'body_font',
							)
						);

						$this->generate_font_conglomerate( array(
								'arr_vals'=>$arr_vals,
								'label_prefix'=>"font-group-6",
								'heading'=>esc_html__("Body text group",'qucreative').' 6',
								'default_weight'=>"regular",
								'default_font_size'=>"13",
								'default_line_height'=>"1.55",
								'weight_feed_from'=>'body_font',
							)
						);

						$this->generate_font_conglomerate( array(
								'arr_vals'=>$arr_vals,
								'label_prefix'=>"font-group-7",
								'heading'=>esc_html__("Body text group",'qucreative').' 7',
								'default_weight'=>"italic",
								'default_font_size'=>"13",
								'default_line_height'=>"1.46",
								'weight_feed_from'=>'body_font',
							)
						);

						$this->generate_font_conglomerate( array(
								'arr_vals'=>$arr_vals,
								'label_prefix'=>"font-group-8",
								'heading'=>esc_html__("Body text group",'qucreative').' 8',
								'default_weight'=>"regular",
								'default_font_size'=>"14",
								'default_line_height'=>"1.65",
								'weight_feed_from'=>'body_font',
							)
						);

						$this->generate_font_conglomerate( array(
								'arr_vals'=>$arr_vals,
								'label_prefix'=>"font-group-9",
								'heading'=>esc_html__("Body text group",'qucreative').' 9',
								'default_weight'=>"600",
								'default_font_size'=>"15",
								'default_line_height'=>"1.7",
								'weight_feed_from'=>'body_font',
							)
						);

						$this->generate_font_conglomerate( array(
								'arr_vals'=>$arr_vals,
								'label_prefix'=>"font-group-10",
								'heading'=>esc_html__("Body text group",'qucreative').' 10',
								'default_weight'=>"600",
								'default_font_size'=>"16",
								'default_line_height'=>"1.68",
								'weight_feed_from'=>'body_font',
							)
						);

						$this->generate_font_conglomerate( array(
								'arr_vals'=>$arr_vals,
								'label_prefix'=>"font-group-11",
								'heading'=>esc_html__("Body text group",'qucreative').' 11',
								'default_weight'=>"800",
								'default_font_size'=>"24",
								'default_line_height'=>"1.29",
								'weight_feed_from'=>'body_font',
							)
						);

						$this->generate_font_conglomerate( array(
								'arr_vals'=>$arr_vals,
								'label_prefix'=>"font-group-12",
								'heading'=>esc_html__("Body text group",'qucreative').' 12',
								'default_weight'=>"600",
								'default_font_size'=>"13",
								'default_line_height'=>"1.46",
								'weight_feed_from'=>'body_font',
							)
						);

						$this->generate_font_conglomerate( array(
								'arr_vals'=>$arr_vals,
								'label_prefix'=>"blockquote",
								'heading'=>esc_html__("Blockquote",'qucreative').'',
								'default_weight'=>"italic",
								'default_font_size'=>"17",
								'default_line_height'=>"1.58",
								'weight_feed_from'=>'body_font',
							)
						);




						?>

                        <div class="btn-return-to-defaults-con">

                            <div class="button-secondary btn-return-to-defaults" data-for="body-font"><?php echo esc_html__("RETURN TO DEFAULT",'qucreative'); ?></div>
                        </div>

                    </div>

                </div>

                <div class="dzs-tab-tobe">
                    <div class="tab-menu ">
						<?php echo esc_html__("Menu",'qucreative'); ?>
                    </div>
                    <div class="tab-content" data-for="menu">
						<?php


						$this->generate_font_conglomerate( array(
								'arr_vals'=>$arr_vals,
								'label_prefix'=>"menu",
								'heading'=>esc_html__("Menu font settings",'qucreative').'',
								'default_weight'=>"regular",
								'default_font_size'=>"18",
								'default_line_height'=>"1.2",
								'font'=>"Lato",
								'weight_feed_from'=>'menu_font',
							)
						);


						$this->generate_font_conglomerate( array(
								'arr_vals'=>$arr_vals,
								'label_prefix'=>"copyright",
								'heading'=>esc_html__("Copyright text",'qucreative').'',
								'default_weight'=>"700",
								'default_font_size'=>"10",
								'default_line_height'=>"1.4",

								'activate_link_to'=>true,
								'weight_feed_from'=>'headings_font',
							)
						);

						?>

                        <div class="btn-return-to-defaults-con">

                            <div class="button-secondary btn-return-to-defaults" data-for="menu"><?php echo esc_html__("RETURN TO DEFAULT",'qucreative'); ?></div>
                        </div>
                    </div>
                </div>

                <div class="dzs-tab-tobe">
                    <div class="tab-menu ">
						<?php echo esc_html__("Page title",'qucreative'); ?>
                    </div>
                    <div class="tab-content" data-for="page_title">
						<?php


						$this->generate_font_conglomerate( array(
								'arr_vals'=>$arr_vals,
								'label_prefix'=>"page_title",
								'heading'=>esc_html__("Page title font settings",'qucreative').'',
								'default_weight'=>"900",
								'default_font_size'=>"70",
								'default_line_height'=>"1",
								'font'=>"Lato",
								'weight_feed_from'=>'page_title_font',
								'default_color'=>"#FFFFFF",
								'responsive_slider'=>true,


								'colorpicker'=>true,

							)
						);


						?>


						<?php
						$lab = 'page_title_orientation';


						$val = 'horizontal';

						$default_val = $val;
						echo '<p class="feed-sidenote "><span class="default-val" data-for="'.$lab.'">'.$default_val.'</span></p>';



						if(isset($arr_vals[$lab]) && $arr_vals[$lab]){
							$val = $arr_vals[$lab];
						}

						?>
                        <h3 class="preset-h3"><?php echo esc_html__("Orientation",'qucreative'); ?></h3>
                        <div class="radio-container">
                            <label><?php echo qucreative_helpers_generate_input_checkbox($lab,array(
									'type'=>'radio',
									'val'=>'horizontal',
									'class'=>' font-customizer-field',
									'seekval'=>$val,
								)); ?> <?php echo esc_html__("Horizontal",'qucreative'); ?></label>
                            <label><?php echo qucreative_helpers_generate_input_checkbox($lab,array(
									'type'=>'radio',
									'val'=>'skewed',
									'class'=>' font-customizer-field',
									'seekval'=>$val,
								)); ?> <?php echo esc_html__("Skewed",'qucreative'); ?></label>
                        </div>



                        <div class="btn-return-to-defaults-con">

                            <div class="button-secondary btn-return-to-defaults" data-for="page_title"><?php echo esc_html__("RETURN TO DEFAULT",'qucreative'); ?></div>
                        </div>

                    </div>
                </div>

                <div class="dzs-tab-tobe">
                    <div class="tab-menu ">
						<?php echo esc_html__("Section titles",'qucreative'); ?>
                    </div>
                    <div class="tab-content" data-for="section_titles">
                        <h2 class="grey-bg"><?php echo esc_html__("Two lines variation",'qucreative'); ?></h2>


						<?php




						$this->generate_font_conglomerate( array(
								'arr_vals'=>$arr_vals,
								'label_prefix'=>"section_title_two_first",
								'heading'=>esc_html__("First line",'qucreative').'',
								'default_weight'=>"700",
								'default_font_size'=>"24",
								'default_line_height'=>"1.1",
								'weight_feed_from'=>'section_title_two_font',
								'default_color'=>"#ffffff",
								'default_color_for_light'=>'#222222',
								'colorpicker'=>true,
								'call_from'=>'section_title_two_font',
								'colorpicker_for_light_too'=>true,
								'responsive_slider'=>true,
								'colorpicker_for_light_label' => esc_html__("Color inside Dark Section",'qucreative'),
							)
						);



						?>



						<?php




						$this->generate_font_conglomerate( array(
								'arr_vals'=>$arr_vals,
								'label_prefix'=>"section_title_two_second",
								'heading'=>esc_html__("Second line",'qucreative').'',
								'default_weight'=>"900",
								'default_font_size'=>"50",
								'default_line_height'=>"1",
								'weight_feed_from'=>'section_title_two_second_font',
								'call_from'=>'section_title_two_second_font',
								'default_color'=>"#ffffff",
								'default_color_for_light'=>'#222222',
								'colorpicker'=>true,
								'responsive_slider'=>true,
								'colorpicker_for_light_too'=>true,

								'colorpicker_for_light_label' => esc_html__("Color inside Dark Section",'qucreative'),
							)
						);

						?>


                        <h3 class="preset-h3"><?php echo esc_html__("Line 1 - Line 2 Spacing",'qucreative'); ?></h3>



						<?php

						$lab = 'line_spacing';
						$val = '20';
						$default_val = $val;
						echo '<p class="feed-sidenote "><span class="default-val" data-for="'.$lab.'">'.$default_val.'</span></p>';



						if(isset($arr_vals[$lab])){
							$val = $arr_vals[$lab];
						}

						?>

                        <div class="dzs-table table-for-<?php echo $lab; ?>">

                            <div class="small-col">
								<?php

								echo qucreative_helpers_generate_input_text($lab,array(

									'options'=>'',
									'class'=>'font-customizer-field small-input',
									'seekval'=>$val,
								));

								?><span class="sidenote"><?php echo esc_html__("PIXELS",'qucreative');?></span>
                            </div>

                            <div class="large-col">

                                <div id="slider-for-<?php echo $lab; ?>"></div>
                            </div>

                        </div>






						<?php

						$label_prefix = 'section_title_two_number';
						?>

                        <div class="font-conglomerate">
                            <h3 class="preset-h3"><?php echo esc_html__("Number",'qucreative');

								$lab = $label_prefix."_enable";


								$val = 'off';


								if(isset($arr_vals[$lab])){
									$val = $arr_vals[$lab];
								}



								if(0) {
									echo '<input class="number-enable-checkbox  font-customizer-field" type="checkbox" value="on" name="' . $lab . '"';

									if ($val == 'on') {
										echo ' checked';
									}

									echo '/>';
								}



								?></h3>
                        </div>


                        <h6 class=""><?php echo esc_html__("Font",'qucreative'); ?></h6>

						<?php

						$lab = "section_title_two_number_font";

						$val = 'Lato';
						$default_val = $val;
						echo '<p class="feed-sidenote "><span class="default-val" data-for="'.$lab.'">'.$default_val.'</span></p>';





						if(isset($arr_vals[$lab]) && $arr_vals[$lab]){
							$val = $arr_vals[$lab];
						}

						echo qucreative_helpers_generate_select($lab,array(
							'options'=>$arr_fonts,
							'class'=>'dzs-style-me opener-list skin-charm font-customizer-field font-family-selector',
							'seekval'=>$val,
						));




						$this->generate_font_conglomerate( array(
								'arr_vals'=>$arr_vals,
								'label_prefix'=>"section_title_two_number",
								'heading'=>'',
								'default_weight'=>"900",
								'font_conglomerate_extra_classes'=>" no-margin-top",
								'default_font_size'=>"130",
								'default_line_height'=>"1",
								'weight_feed_from'=>'section_title_two_number_font',

								'default_color'=>'#444444',
								'default_color_for_light'=>'#ffffff',
								'colorpicker'=>true,
								'colorpicker_for_light_too'=>true,
								'colorpicker_for_light_label' => esc_html__("Color inside Dark Section",'qucreative'),
							)
						);












						$this->generate_font_conglomerate( array(
								'arr_vals'=>$arr_vals,
								'label_prefix'=>"section_title_two_divider",
								'heading'=>esc_html__("Divider",'qucreative'),
								'default_weight'=>"none",
								'font_conglomerate_extra_classes'=>"",
								'default_font_size'=>"none",
								'default_line_height'=>"none",
								'weight_feed_from'=>'',
								'include_number_checkbox'=>true,
								'include_divider_select'=>true,
								'default_color'=>'#444444',
								'default_color_for_light'=>'#ffffff',
								'colorpicker'=>true,
								'colorpicker_for_light_too'=>true,
								'colorpicker_for_light_label' => esc_html__("Color inside Dark Section",'qucreative'),
							)
						);


						?>



                        <h3 class="preset-h3"><?php echo esc_html__("Title - Divider Spacing",'qucreative'); ?></h3>



						<?php

						$lab = 'title_divider_spacing_two';
						$val = '20';
						$default_val = $val;
						echo '<p class="feed-sidenote "><span class="default-val" data-for="'.$lab.'">'.$default_val.'</span></p>';



						if(isset($arr_vals[$lab])){
							$val = $arr_vals[$lab];
						}

						?>

                        <div class="dzs-table table-for-<?php echo $lab; ?>">

                            <div class="small-col">
								<?php

								echo qucreative_helpers_generate_input_text($lab,array(

									'options'=>'',
									'class'=>'font-customizer-field small-input',
									'seekval'=>$val,
								));

								?><span class="sidenote"><?php echo esc_html__("PIXELS",'qucreative');?></span>
                            </div>

                            <div class="large-col">

                                <div id="slider-for-<?php echo $lab; ?>"></div>
                            </div>

                        </div>



                        <h2 class="grey-bg" style="margin-top: 40px;"><?php echo esc_html__("One line variation",'qucreative'); ?></h2>

						<?php


						$this->generate_font_conglomerate( array(
								'arr_vals'=>$arr_vals,
								'label_prefix'=>"section_title_one_first",
								'heading'=>esc_html__("Section Title",'qucreative').'',
								'default_weight'=>"900",
								'default_font_size'=>"25",
								'default_line_height'=>"1.28",
								'font'=>"Lato",
								'weight_feed_from'=>'section_title_one_first_font',
								'default_color'=>'#444444',
								'default_color_for_light'=>'#ffffff',
								'colorpicker'=>true,
								'colorpicker_for_light_too'=>true,
								'responsive_slider'=>true,
								'colorpicker_for_light_label' => esc_html__("Color inside Dark Section",'qucreative'),
							)
						);




						$lab = 'divider_style';

						$val = 'short';
						$default_val = $val;





						$this->generate_font_conglomerate( array(
								'arr_vals'=>$arr_vals,
								'label_prefix'=>"section_title_one_divider",
								'heading'=>esc_html__("Divider",'qucreative'),
								'default_weight'=>"none",
								'font_conglomerate_extra_classes'=>"",
								'default_font_size'=>"none",
								'default_line_height'=>"none",
								'weight_feed_from'=>'',
								'include_number_checkbox'=>true,
								'include_divider_select'=>true,
								'default_color'=>'#444444',
								'default_color_for_light'=>'#ffffff',
								'colorpicker'=>true,
								'colorpicker_for_light_too'=>true,
								'colorpicker_for_light_label' => esc_html__("Color inside Dark Section",'qucreative'),
							)
						);






						?>



                        <h3 class="preset-h3"><?php echo esc_html__("Title - Divider Spacing",'qucreative'); ?></h3>



						<?php

						$lab = 'title_divider_spacing';
						$val = '20';
						$default_val = $val;
						echo '<p class="feed-sidenote "><span class="default-val" data-for="'.$lab.'">'.$default_val.'</span></p>';



						if(isset($arr_vals[$lab])){
							$val = $arr_vals[$lab];
						}

						?>

                        <div class="dzs-table table-for-<?php echo $lab; ?>">

                            <div class="small-col">
								<?php

								echo qucreative_helpers_generate_input_text($lab,array(

									'options'=>'',
									'class'=>'font-customizer-field small-input',
									'seekval'=>$val,
								));

								?><span class="sidenote"><?php echo esc_html__("PIXELS",'qucreative');?></span>
                            </div>

                            <div class="large-col">

                                <div id="slider-for-<?php echo $lab; ?>"></div>
                            </div>

                        </div>


                        <div class="btn-return-to-defaults-con">

                            <div class="button-secondary btn-return-to-defaults" data-for="section_titles"><?php echo esc_html__("RETURN TO DEFAULT",'qucreative'); ?></div>
                        </div>
                    </div>
                </div>


                <div class="dzs-tab-tobe">
                    <div class="tab-menu ">
						<?php echo 'Qu '.esc_html__("Slider",'qucreative'); ?>
                    </div>
                    <div class="tab-content" data-for="home_slider">
						<?php


						$this->generate_font_conglomerate( array(
								'arr_vals'=>$arr_vals,
								'label_prefix'=>"home_slider",
								'heading'=>esc_html__("Slide caption",'qucreative').'',
								'default_weight'=>"900",
								'default_font_size'=>"50",
								'default_line_height'=>"1.2",

								'activate_link_to'=>true,
								'weight_feed_from'=>'home_slider_font',
								'default_color'=>'#ffffff',
								'default_color_for_light'=>'#222222',
								'colorpicker'=>true,
								'colorpicker_for_light_too'=>true,
							)
						);


						$this->generate_font_conglomerate( array(
								'arr_vals'=>$arr_vals,
								'label_prefix'=>"home_number",
								'heading'=>esc_html__("Slide number",'qucreative').'',
								'default_weight'=>"900",
								'default_font_size'=>"135",
								'default_line_height'=>"1",

								'activate_link_to'=>true,
								'weight_feed_from'=>'home_number_font',
							)
						);

						?>

                        <div class="btn-return-to-defaults-con">

                            <div class="button-secondary btn-return-to-defaults" data-for="home_slider"><?php echo esc_html__("RETURN TO DEFAULT",'qucreative'); ?></div>
                        </div>
                    </div>
                </div>



            </form>


            <div class="btn-return-to-defaults-con">

                <div class="button-secondary btn-return-to-defaults" data-for="*"><?php echo esc_html__("RETURN ALL TO DEFAULT",'qucreative'); ?></div>
            </div>

            <style>
                body .dzs-tabs{
                    padding:0;
                }
            </style>
			<?php
		}
	}

}

