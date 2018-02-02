<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage qucreative
 */

global $post, $sidebar;
global $qucreative_theme_data;



wp_enqueue_script('qucreative', QUCREATIVE_THEME_URL . 'libs/qucreative/qucreative.js', array( 'jquery' ));
?><!--start footer()--><?php




// -- qucreative has own implementation of comment reply

if(defined('QUCREATIVE_VERSION')==false){

	wp_enqueue_script( 'comment-reply', QUCREATIVE_THEME_URL . 'libs/qucreative/qucreative.js', array( 'jquery' ), false, true );
}


$fontawesomelink = QUCREATIVE_THEME_URL . 'libs/fontawesome/font-awesome.min.css';
if(defined("QUCREATIVE_UPLOAD_FONTAWESOME_FROM_CDN") && QUCREATIVE_UPLOAD_FONTAWESOME_FROM_CDN=="ON"){
	$fontawesomelink = 'https://'.'maxcdn'.'.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css';
}

wp_enqueue_style( 'fontawesome', $fontawesomelink);


wp_enqueue_style('qucreative_content_scroller', QUCREATIVE_THEME_URL . 'libs/advancedscroller/plugin.css');
wp_enqueue_script('qucreative_content_scroller', QUCREATIVE_THEME_URL . 'libs/advancedscroller/plugin.js');

wp_enqueue_style('et_font', QUCREATIVE_THEME_URL . 'libs/qucreative/include_et.css');


if(qucreative_get_theme_mod_and_sanitize('bg_isparallax')=='on'){

	wp_enqueue_script('qucreative_parallax', QUCREATIVE_THEME_URL . 'libs/parallaxer/parallaxer.js');
	wp_enqueue_style('qucreative_parallax', QUCREATIVE_THEME_URL . 'libs/parallaxer/parallaxer.css');
}












$sidebar = '';

$sidebar = qucreative_get_sidebar();



$po = $post;

if($qucreative_theme_data['post_for_meta']){
	$po = $qucreative_theme_data['post_for_meta'];
}




$is_sidebar_page = false;


// -- footer
if ($po && (get_post_meta($po->ID, '_wp_page_template', true) != 'template-qucreative-slider.php') && $sidebar == '') {
	?>


	<?php




}




if(strpos($qucreative_theme_data['body_class'],'page-type-archive')===false) {
	if ($po && ($po->post_type == 'antfarm_port_items' ) && get_post_meta($po->ID, 'qucreative_'.'meta_is_fullscreen'.$qucreative_theme_data['page_extra_meta_label'], true) == 'on') {


		echo ' </div>   <div class="col-md-3 portfolio-single-meta-con" style=";">';


		$lab = 'qucreative_'.'meta_port_optional_info_1'.$qucreative_theme_data['page_extra_meta_label'];

		if (get_post_meta($po->ID, $lab, true)) {

			echo '<h6>' . esc_html__("CLIENT",'qucreative') . '</h6>';
			echo '<div class="portfolio-single-meta-element font-group-1">' . wp_kses(get_post_meta($po->ID, $lab, true),$qucreative_theme_data['allowed_html_tags']) . '</div>';
		}
		$lab = 'qucreative_'.'meta_port_optional_info_2'.$qucreative_theme_data['page_extra_meta_label'];
		if (get_post_meta($po->ID, $lab, true)) {

			echo '<h6>' . esc_html__("PROJECT DATE",'qucreative') . '</h6>';
			echo '<div class="portfolio-single-meta-element  font-group-1">' . wp_kses(get_post_meta($po->ID, $lab, true),$qucreative_theme_data['allowed_html_tags']) . '</div>';
		}
		$lab = 'qucreative_'.'meta_port_website'.$qucreative_theme_data['page_extra_meta_label'];
		if (get_post_meta($po->ID, $lab, true)) {

			echo '<h6>' . esc_html__("PROJECT URL",'qucreative') . '</h6>';

			$aux = wp_kses(get_post_meta($po->ID, $lab, true),$qucreative_theme_data['allowed_html_tags']);
			$aux_label = $aux;

			$aux_link = esc_html(get_post_meta($po->ID, 'qucreative_'.'meta_port_custom_link'.$qucreative_theme_data['page_extra_meta_label'], true));

			echo '<div class="portfolio-single-meta-element  font-group-1">';


			if ($aux_link) {

				echo '<a target="_blank" class="custom-a color-hg border-hg-on-hover weight-from-anchor" href="' . $aux_link . '">';
			} else {
				if (strpos($aux, 'http') !== false || strpos($aux, 'www') !== false) {


					echo '<a target="_blank" class="custom-a color-hg border-hg-on-hover weight-from-anchor" href="' . $aux . '">';

					$aux_label = str_replace('http://', '', $aux_label);
					$aux_label = str_replace('https://', '', $aux_label);
				}
			}


			echo $aux_label;


			if ($aux_link || strpos($aux, 'http') !== false || strpos($aux, 'www') !== false) {


				echo '</a>';
			}

			echo '</div>';
		}


		echo '</div>';

		echo '<div class="clear"></div>';

		do_action('qucreative_social_place');

		echo '</div>
</div>
</div><!--end row-->';


		echo qucreative_generate_prev_next_table();
		// -- portfolio item fullscreen END
	}
}


if ($po == false || (get_post_meta($po->ID, '_wp_page_template', true) != 'template-qucreative-slider.php')) {
	?>


	<?php
	if ($sidebar) {
		echo '</div>';

		echo '<div class="col-sm-4 sidebar-main">';
		?>
		<?php

		get_sidebar();
		?>
		<?php


		echo '</div>';


		echo '</div><!-- end row-->';
	}

	?>

    </div><!-- end .the-content-inner -->

	<?php





	if($qucreative_theme_data['has_footer']){

		?>

		<?php
		qucreative_print_real_footer();
		?>
		<?php
	}

	?>
    </div><!-- end .the-content -->
	<?php
}


// -- slideshow homepage
if ($post && get_post_meta($post->ID, '_wp_page_template', true) == 'template-qucreative-slider.php') {


	?>


    <!-- descriptions for gallery items container -->
    <div class="main-gallery--descs" style="height: 175px;">
		<?php


		$product_image_gallery = '';
		if (get_post_meta($post->ID, 'qucreative_'.'meta_image_gallery'.$qucreative_theme_data['page_extra_meta_label'], true)) {
			$product_image_gallery = esc_html(get_post_meta($post->ID, 'qucreative_'.'meta_image_gallery'.$qucreative_theme_data['page_extra_meta_label'], true));

			$attachments = array_filter(explode(',', $product_image_gallery));

			if ($attachments) {


				$i3 = 0;
				foreach ($attachments as $attachment_id) {

					if ($i3 > 0) {
					}

					$i3++;

					$img_full = wp_get_attachment_image_src($attachment_id, 'full');




					$att_meta = wp_prepare_attachment_for_js($attachment_id);


					$caption = $att_meta['caption'];

					$word_count = str_word_count($caption);


					if (stripos($caption, '<br>') === false) {


						$from_index = floor(strlen($caption) / 2 - 1);
						if ($word_count === 2) {
							$from_index = 1;
						}



						$caption = qucreative_str_replace_first(' ', '<br>', $caption, $from_index);
					}


					$str_i3 = $i3;

					if ($i3 < 10) {
						$str_i3 = '0' . $i3;
					}


					if ($att_meta['caption']) {
						echo '<div class="main-gallery--desc ';


						if (get_post_meta($attachment_id, 'qucreative_'.'meta_meta_att_aligment', true) == 'right' || get_post_meta($attachment_id, 'meta_att_aligment', true) == 'right') {


						} else {
							echo ' style2';
						}


						echo '"><div class="desc-inner">

                    <!-- blur markup -->
                    <div class="translucent-con translucent-con--desc-inner">
                        <div class="translucent-bg"></div>
                        <canvas class="translucent-canvas"></canvas>
                        <div class="translucent-overlay"></div>
                    </div>
                    <!-- blur markup END -->

                        <span class="big-desc">' . $caption . '</span>
                    <span class="big-number">' . $str_i3 . '</span>
                </div></div>';
					} else {
						echo '<div class="main-gallery--desc"></div>';
					}
				}


			}
		}


		?>
    </div>
    <!-- descriptions for gallery items container END-->


    <!-- button for responsive info -->
    <div class="responsive-info-btn-con">
        <figure>
            <i class="fa fa-info"></i>
        </figure>
        <div class="info-text-con"><h6> </h6></div>
    </div>
    <!-- button for responsive info END -->

    <!-- buttons for next / previous markup -->
    <div class="main-gallery-buttons-con style2">

        <div class="prev-btn-con">
            <span class="btn-text"><?php echo esc_html__("PREVIOUS SLIDE",'qucreative'); ?></span>
            <figure>
                <i class="fa fa-angle-left"></i>
            </figure>
        </div>
        <div class="next-btn-con">
            <span class="btn-text"><?php echo esc_html__("NEXT SLIDE",'qucreative'); ?></span>
            <figure>
                <i class="fa fa-angle-right"></i>
            </figure>
        </div>
    </div>
    <!-- buttons for next / previous markup END -->

	<?php
}


if ($post && get_post_meta($post->ID, '_wp_page_template', true) == 'template-gallery-creative.php') {


	?>

    <div class="gallery-thumbs-con">

        <div class="translucent-con translucent-con--for-gallery-thumbs">
            <div class="translucent-bg  "></div>
            <canvas class="translucent-canvas"></canvas>
            <div class="translucent-overlay"></div>
        </div>
        <div class="thumbs-list-con">

            <ul class="thumbs-list">

            </ul>
        </div>
    </div>

    <div class="the-content-bg-placeholder"></div>

	<?php
}



































?>
</div><!-- end .the-content-con-->


<!-- this block is the navigation -->
<nav class="qucreative--nav-con">
    <div class="translucent-con translucent-con--for-nav-con" style="">
        <div class="translucent-bg  "></div>
        <canvas class="translucent-canvas"></canvas>
        <div class="translucent-overlay"></div>
    </div>

    <!-- modify logo from here -->


	<?php



	$str_w = '';
	$str_h = '';
	$str_inner_w = 'width: 183px; ';
	$str_inner_h = 'height: 128px; ';
	$str_x = '';
	$str_y = '';

	$divlogo = false;



	if(qucreative_get_theme_mod_and_sanitize('logo_x')=='custom_position' || qucreative_get_theme_mod_and_sanitize('logo_y')=='custom_position' || qucreative_get_theme_mod_and_sanitize('logo_width')  || qucreative_get_theme_mod_and_sanitize('logo_height')  ){
		if(qucreative_get_theme_mod_and_sanitize('logo_x')=='custom_position'){
			if(qucreative_get_theme_mod_and_sanitize('logo_x_custom')!==''){
				$str_x = ' margin-left: '.qucreative_get_theme_mod_and_sanitize('logo_x_custom').'px; ';
			}
		}



		if(qucreative_get_theme_mod_and_sanitize('logo_y')=='custom_position'){
			if(qucreative_get_theme_mod_and_sanitize('logo_y_custom')!==''){
				$str_y = ' margin-top: '.qucreative_get_theme_mod_and_sanitize('logo_y_custom').'px; ';
			}
		}


		if(qucreative_get_theme_mod_and_sanitize('logo_width')){

			$str_w = ' width: '.qucreative_get_theme_mod_and_sanitize('logo_width').'px; ';
			$str_inner_w = ' width: '.qucreative_get_theme_mod_and_sanitize('logo_width').'px; ';
		}

		if(qucreative_get_theme_mod_and_sanitize('logo_height')){

			$str_h = ' height: '.qucreative_sanitize_to_size(qucreative_get_theme_mod_and_sanitize('logo_height')).'; ';
			$str_inner_h = ' height: '.qucreative_sanitize_to_size(qucreative_get_theme_mod_and_sanitize('logo_height')).'; ';
		}
	}

	if(qucreative_get_theme_mod_and_sanitize('logo_width')  || qucreative_get_theme_mod_and_sanitize('logo_height')){

		$divlogo = true;
	}




	?>

    <div class="logo-con <?php



	if(qucreative_get_theme_mod_and_sanitize('logo_x')=='custom_position' || qucreative_get_theme_mod_and_sanitize('logo_y')=='custom_position') {
		if (qucreative_get_theme_mod_and_sanitize('logo_x') == 'custom_position') {
			if (qucreative_get_theme_mod_and_sanitize('logo_x_custom') !== '') {
				echo ' custom-position-x';
			}
		}

		if (qucreative_get_theme_mod_and_sanitize('logo_y') == 'custom_position') {
			if (qucreative_get_theme_mod_and_sanitize('logo_y_custom') !== '') {
				echo ' custom-position-y';
			}
		}
	}

	if($divlogo){
		echo ' divlogo';
	}

	if($qucreative_theme_data['sw_is_in_customizer']){

		$qucreative_theme_data['menu_type'] = qucreative_get_theme_mod_and_sanitize('menu_type');
	}


	?>" style="<?php

	echo $str_x;
	echo $str_y;

	if($qucreative_theme_data['menu_type_attr']=='qucreative-vertical-menu'){

		echo ' width: 100%; ';
	}else{
		echo $str_w;
	}
	if($qucreative_theme_data['menu_type_attr']=='qucreative-horizontal-menu'){

		echo ' height: 100%; ';
	}else{
		echo qucreative_sanitize_to_size($str_h);
	}


	$logo = qucreative_get_theme_mod_and_sanitize('logo');



//	print_rr($qucreative_theme_data['preview_cookies']);

	if(isset($qucreative_theme_data['preview_cookies']['menu_type']) && $qucreative_theme_data['preview_cookies']['menu_type']){


		$valmt = $qucreative_theme_data['preview_cookies']['menu_type'];

		if($valmt=='menu-type-1' || $valmt=='menu-type-7'){
			$logo = QUCREATIVE_THEME_URL.'placeholders/logo-1-7.png';
		}

		if($valmt=='menu-type-2' || $valmt=='menu-type-8'){
			$logo = QUCREATIVE_THEME_URL.'placeholders/logo-2-8.png';
		}
		if($valmt=='menu-type-3' || $valmt=='menu-type-9' || $valmt=='menu-type-13' || $valmt=='menu-type-15' || $valmt=='menu-type-17'){
			$logo = QUCREATIVE_THEME_URL.'placeholders/logo-3-9-13-15-17.png';
		}
		if($valmt=='menu-type-4' || $valmt=='menu-type-10' || $valmt=='menu-type-14' || $valmt=='menu-type-16' || $valmt=='menu-type-18'){
			$logo = QUCREATIVE_THEME_URL.'placeholders/logo-4-10-14-16-18.png';
		}
		if($valmt=='menu-type-5'){
			$logo = QUCREATIVE_THEME_URL.'placeholders/logo-5.png';
		}
		if($valmt=='menu-type-6'){
			$logo = QUCREATIVE_THEME_URL.'placeholders/logo-6.png';
		}
		if($valmt=='menu-type-11' || $valmt=='menu-type-12'){
			$logo = QUCREATIVE_THEME_URL.'placeholders/logo-11-12.png';
		}
	}



	?>">
        <a class="custom-a" rel="home" href="<?php echo site_url(); ?>">
			<?php
			if($divlogo){
				?>
                <div class="the-logo"
                     style="<?php
				     echo $str_inner_w;
				     echo $str_inner_h;

				     ?>background-image:url(<?php echo $logo; ?>);"></div>
				<?php
			}else{
				?>
                <img alt="<?php echo esc_html__("site logo",'qucreative'); ?>" class="the-logo"
                     style="" src="<?php echo $logo; ?>"/>
				<?php
			}
			?>

        </a>
    </div>

	<?php


	$location = 'primary';

	$args = array(
		'theme_location' => $location,
		'echo' => false,
		'menu_class' => 'the-actual-nav',
		'container_class' => 'the-actual-nav',
	);
	$menu = wp_nav_menu($args);

	if (has_nav_menu($location)) {

		echo $menu;
	} else {

		echo '<div class="menu-helper-text">' . esc_html__("Please setup a menu from ",'qucreative') . '<a target="_blank" href="' . admin_url("nav-menus.php") . '">' . esc_html__("here",'qucreative') . '</a></div>';


	}


	$sw_show_nav_social_con = true;



	if (is_array($qucreative_theme_data['header_social_icons']) && count($qucreative_theme_data['header_social_icons']) && ( $qucreative_theme_data['menu_type']=='menu-type-1' || $qucreative_theme_data['menu_type']=='menu-type-2' || $qucreative_theme_data['menu_type']=='menu-type-3' || $qucreative_theme_data['menu_type']=='menu-type-4' || $qucreative_theme_data['menu_type']=='menu-type-7' || $qucreative_theme_data['menu_type']=='menu-type-8' || $qucreative_theme_data['menu_type']=='menu-type-9' || $qucreative_theme_data['menu_type']=='menu-type-10' ||  $qucreative_theme_data['menu_type']=='menu-type-11' ||  $qucreative_theme_data['menu_type']=='menu-type-12' || $qucreative_theme_data['menu_type']=='menu-type-13' || $qucreative_theme_data['menu_type']=='menu-type-14' || $qucreative_theme_data['menu_type']=='menu-type-15' || $qucreative_theme_data['menu_type']=='menu-type-16' || $qucreative_theme_data['menu_type']=='menu-type-17' || $qucreative_theme_data['menu_type']=='menu-type-18'   ) ) {

	}else{

		$sw_show_nav_social_con = false;
	}


	?>

    <div class="nav-social-con"><?php
		if($sw_show_nav_social_con) {
			?>
            <p class="social-icons">
				<?php




				if (is_array($qucreative_theme_data['header_social_icons'])) {

					foreach ($qucreative_theme_data['header_social_icons'] as $si) {
						echo '<a href="' . $si->link . '"><i class="fa fa-' . $si->icon . '"></i></a>';
					}
				}
				?>
            </p>
			<?php
		}



		$heading_style = qucreative_get_theme_mod_and_sanitize('copyright_textbox_heading_style');
		$copyright_text = qucreative_get_theme_mod_and_sanitize('copyright_textbox');

		if($heading_style==''){
			$heading_style = 'h6';
		}



		$h_wrap_start = '<'.$heading_style.' class="copyright-text the-variable-heading">';
		$h_wrap_end = '</'.$heading_style.'>';

		if($heading_style=='h-group-1'||$heading_style=='h-group-2'){

			$h_wrap_start = '<h3 class="copyright-text the-variable-heading '.$heading_style.'">';
			$h_wrap_end = '</h3>';
		}


		$h_wrap_start = '<div class="copyright-text">';
		$h_wrap_end = '</div>';




		$sw_show_copyright = true;
		if($qucreative_theme_data['menu_type']=='menu-type-8' || $qucreative_theme_data['menu_type']=='menu-type-9' ||  $qucreative_theme_data['menu_type']=='menu-type-12' || $qucreative_theme_data['menu_type']=='menu-type-13' || $qucreative_theme_data['menu_type']=='menu-type-14' || $qucreative_theme_data['menu_type']=='menu-type-15' || $qucreative_theme_data['menu_type']=='menu-type-16' || $qucreative_theme_data['menu_type']=='menu-type-17' || $qucreative_theme_data['menu_type']=='menu-type-18'   )  {



			$sw_show_copyright = false;

		}




		if( $sw_show_copyright && isset($copyright_text) && $copyright_text){
			?> <?php echo $h_wrap_start.$copyright_text.$h_wrap_end; ?> <?php
		}
		?></div>

	<?php



	?>

</nav>

<!-- end navigation -->


<!-- preloader area -->
<div class="preloader-con">

    <div class="cube-preloader"></div>
</div>
</div><!-- end .main-container -->

<?php


if ($qucreative_theme_data['footer_big_map_str']) {

	echo $qucreative_theme_data['footer_big_map_str'];
}


?>





<?php








if($qucreative_theme_data['is_preview_blog'] && $qucreative_theme_data['sw_is_in_customizer']==false){




$preseter_width = 490;

//http://creativewpthemes.net/main-demo-dev
$preseter_img_folder = site_url().'/';
?>
<div class="preseter align-right wait-for-activate preseter-opened-by-user" style="opacity:0; ">
    <div class="the-icon-con"> <i class="fa fa-chevron-left btn-show-customizer"></i> <i class="fa fa-times btn-close-customizer"></i>  </div>
    <div class="preseter-content-con auto-height overflow-x-visible " style="width: <?php echo $preseter_width; ?>px; height: auto;">
        <div class=" the-content-inner-con scroller-con">
            <div class="the-content the-content-for-preseter inner" style=" " data-targetw="-<?php echo $preseter_width; ?>">
                <div class="the-content-inner-inner">
                    <div class="the-bg"></div>

                    <h6 class="blue-bg">THESE ARE ONLY SOME OF THE LAYOUT SETTINGS</h6>

                    <div class="sidenote">
                        <em>From fully customizable typography, to fully customizable layout design, from fully customizable elements and pages, to never before seen visual FX, Qu is a new beginning in WordPress themes.</em>
                    </div>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="setting" style="position:relative;">

                                <h6>Menu Style</h6>
								<?php

								$lab = 'menu-type';
								$cookielab = 'menu_type';
								$val = 'menu-type-5';
								$val = 'menu-type-1';

								if(isset($qucreative_theme_data['preview_cookies'][$cookielab]) && $qucreative_theme_data['preview_cookies'][$cookielab]){
									$val = $qucreative_theme_data['preview_cookies'][$cookielab];
								}


								echo qucreative_helpers_generate_select($lab,array(
									'seekval'=>$val,
									'options'=>array(
										array(
											'label'=>'Menu 1-Dark (vertical)',
											'value'=>'menu-type-1',
										),
										array(
											'label'=>'Menu 2-Light (vertical)',
											'value'=>'menu-type-2',
										),
										array(
											'label'=>'Menu 3-Dark (vertical)',
											'value'=>'menu-type-3',
										),
										array(
											'label'=>'Menu 4-Light (vertical)',
											'value'=>'menu-type-4',
										),
										array(
											'label'=>'Menu 5-Dark (vertical)',
											'value'=>'menu-type-5',
										),
										array(
											'label'=>'Menu 6-Light (vertical)',
											'value'=>'menu-type-6',
										),
										array(
											'label'=>'Menu 7-Dark (vertical)',
											'value'=>'menu-type-7',
										),
										array(
											'label'=>'Menu 8-Light (vertical)',
											'value'=>'menu-type-8',
										),
										array(
											'label'=>'Menu 9-Dark (horizontal)',
											'value'=>'menu-type-9',
										),
										array(
											'label'=>'Menu 10-Light (horizontal)',
											'value'=>'menu-type-10',
										),
										array(
											'label'=>'Menu 11 (overlay)',
											'value'=>'menu-type-11',
										),
										array(
											'label'=>'Menu 12 (overlay)',
											'value'=>'menu-type-12',
										),
										array(
											'label'=>'Menu 13-Dark (horizontal)',
											'value'=>'menu-type-13',
										),
										array(
											'label'=>'Menu 14-Light (horizontal)',
											'value'=>'menu-type-14',
										),
										array(
											'label'=>'Menu 15-Dark (horizontal)',
											'value'=>'menu-type-15',
										),
										array(
											'label'=>'Menu 16-Light (horizontal)',
											'value'=>'menu-type-16',
										),
										array(
											'label'=>'Menu 17-Dark (horizontal)',
											'value'=>'menu-type-17',
										),
										array(
											'label'=>'Menu 18-Light (horizontal)',
											'value'=>'menu-type-18',
										),
									),
								))
								;
								?>

                                <label class="small-checkbox-con small-checkbox-con-menu_is_sticky" style="        top: -2px;
    right: 3px; ">
                                    sticky
									<?php



									$lab = 'menu_is_sticky';
									$cookielab = $lab;
									$val = 'on';



									if(isset($qucreative_theme_data['preview_cookies'][$cookielab]) && $qucreative_theme_data['preview_cookies'][$cookielab]){
										$val = $qucreative_theme_data['preview_cookies'][$cookielab];
									}else{



									}

									echo qucreative_helpers_generate_input_checkbox($lab, array(
										'class'=>'',
										'seekval'=>$val,
										'val'=>'on',

									))


									?>
                                </label>

                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="setting slider-ui-con">

                                <h6>Menu Opacity</h6>
								<?php



								$lab = 'menu_enviroment_opacity';
								$cookielab = $lab;
								$val = '100';



								$labmenu = 'menu-type';


								if(isset($qucreative_theme_data['preview_cookies'][$cookielab]) && $qucreative_theme_data['preview_cookies'][$cookielab]!==''){
									$val = $qucreative_theme_data['preview_cookies'][$cookielab];
								}else{


									if(isset($qucreative_theme_data['preview_cookies'][$labmenu])){
										if($qucreative_theme_data['preview_cookies'][$labmenu]){
											if($qucreative_theme_data['preview_cookies'][$labmenu]=='menu-type-4' || $qucreative_theme_data['preview_cookies'][$labmenu]=='menu-type-5'){

												$val = '100';
											}
										}
									}
								}

								echo qucreative_helpers_generate_input_text($lab, array(
									'class'=>'slider-ui-target-field',
									'seekval'=>$val,
									'input_type'=>'hidden',
								))


								?>
                                <div class="slider-ui " data-for="menu_enviroment_opacity"></div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="setting">

                                <h6>Content Position</h6>

								<?php






								$lab = 'content_align';
								$cookielab = $lab;
								$val = '';

								if(isset($qucreative_theme_data['preview_cookies'][$cookielab]) && $qucreative_theme_data['preview_cookies'][$cookielab]){
									$val = $qucreative_theme_data['preview_cookies'][$cookielab];
								}


								echo qucreative_helpers_generate_select($lab,array(
									'seekval'=>$val,
									'options'=>array(
										array(
											'label'=>'Center',
											'value'=>'content-align-center',
										),
										array(
											'label'=>'Left',
											'value'=>'content-align-left',
										),
										array(
											'label'=>'Right',
											'value'=>'content-align-right',
										),

									),
								))
								;

								?>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="setting">

                                <h6>Content Skin</h6>

								<?php


								$lab = 'content_enviroment_style';
								$cookielab = $lab;
								$val = '';

								if(isset($qucreative_theme_data['preview_cookies'][$cookielab]) && $qucreative_theme_data['preview_cookies'][$cookielab]){
									$val = $qucreative_theme_data['preview_cookies'][$cookielab];
								}


								echo qucreative_helpers_generate_select($lab,array(
									'seekval'=>$val,
									'options'=>array(
										array(
											'label'=>'Linked to Menu Skin',
											'value'=>'linked',
										),
										array(
											'label'=>'Dark',
											'value'=>'body-style-dark',
										),
										array(
											'label'=>'Light',
											'value'=>'body-style-light',
										),

									),
								))
								;

								?>

                            </div>
                        </div>
                    </div>





                    <div class="row" style="position:relative;">
                        <div class="col-md-6">
                            <div class="setting">

                                <h6>Content Margins</h6>

								<?php





								$lab = 'width_blur_margin';
								$cookielab = $lab;


								$val = '30';

								if(isset($qucreative_theme_data['preview_cookies'][$cookielab]) && $qucreative_theme_data['preview_cookies'][$cookielab]){
									$val = $qucreative_theme_data['preview_cookies'][$cookielab];
								}

								echo qucreative_helpers_generate_input_text($lab, array(
									'class'=>'small-field',
									'seekval'=>$val,
									'input_type'=>'text',
								))


								?>
                                <span class="small-sidenote">PIXELS</span>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="setting slider-ui-con">

                                <h6>Content Opacity</h6>
								<?php



								$lab = 'content_enviroment_opacity';
								$cookielab = $lab;
								$val = '30';



								$labmenu = 'menu-type';


								if(isset($qucreative_theme_data['preview_cookies'][$cookielab]) && $qucreative_theme_data['preview_cookies'][$cookielab]!==''){
									$val = $qucreative_theme_data['preview_cookies'][$cookielab];
								}else{



								}

								echo qucreative_helpers_generate_input_text($lab, array(
									'class'=>'slider-ui-target-field',
									'seekval'=>$val,
									'input_type'=>'hidden',
								))


								?>
                                <div class="slider-ui " data-for="content_enviroment_opacity"></div>
                            </div>
                        </div>

                        <label class="small-checkbox-con" style="    bottom: -28px;
    right: 15px;">
                            link to menu opacity
							<?php



							$lab = 'content_link_to_menu_opacity';
							$cookielab = $lab;
							$val = 'on';



							if(isset($qucreative_theme_data['preview_cookies'][$cookielab]) && $qucreative_theme_data['preview_cookies'][$cookielab]){
								$val = $qucreative_theme_data['preview_cookies'][$cookielab];
							}else{



							}

							echo qucreative_helpers_generate_input_checkbox($lab, array(
								'class'=>'',
								'seekval'=>$val,
								'val'=>'on',

							))


							?>
                        </label>


                    </div>

                    <hr>


                    <div class="row">
                        <div class="col-md-6">
                            <div class="setting">

                                <h6>Column Width (12 Cols)</h6>

								<?php






								$lab = 'width_column';
								$cookielab = $lab;



								$val = '50';

								if(isset($qucreative_theme_data['preview_cookies'][$cookielab]) && $qucreative_theme_data['preview_cookies'][$cookielab]){
									$val = $qucreative_theme_data['preview_cookies'][$cookielab];
								}

								echo qucreative_helpers_generate_input_text($lab, array(
									'class'=>'small-field',
									'seekval'=>$val,
									'input_type'=>'text',
								))


								?>
                                <span class="small-sidenote">PIXELS</span>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="setting">

                                <h6>Column Gap</h6>

								<?php






								$lab = 'width_gap';
								$cookielab = $lab;


								$val = '30';

								if(isset($qucreative_theme_data['preview_cookies'][$cookielab]) && $qucreative_theme_data['preview_cookies'][$cookielab]){
									$val = $qucreative_theme_data['preview_cookies'][$cookielab];
								}

								echo qucreative_helpers_generate_input_text($lab, array(
									'class'=>'small-field',
									'seekval'=>$val,
									'input_type'=>'text',
								))


								?>
                                <span class="small-sidenote">PIXELS</span>

                            </div>
                        </div>
                    </div>





                    <div class="row">
                        <div class="col-md-6">
                            <div class="setting slider-ui-con">



                                <h6>Blur Amount</h6>
								<?php



								$lab = 'blur_ammount';
								$cookielab = $lab;
								$val = '30';



								$labmenu = 'menu-type';


								if(isset($qucreative_theme_data['preview_cookies'][$cookielab]) && $qucreative_theme_data['preview_cookies'][$cookielab]!==''){
									$val = $qucreative_theme_data['preview_cookies'][$cookielab];
								}else{


								}

								echo qucreative_helpers_generate_input_text($lab, array(
									'class'=>'slider-ui-target-field',
									'seekval'=>$val,
									'input_type'=>'hidden',
								))


								?>
                                <div class="slider-ui " data-for="<?php echo $lab; ?>"></div>

                            </div>
                        </div>
                        <div class="col-md-6">


                            <div class="setting slider-ui-con">

                                <h6>Saturation Amount</h6>
                                <input type="hidden" class="slider-ui-target-field" name="saturation_ammount" value="100"/>
                                <div class="slider-ui "></div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="setting setting-for-colorpicker flex-con" >
                                <h6 style="; ">Primary Color</h6>
								<?php



								$lab = 'highlight_color';
								$cookielab = $lab;


								$val = '#ff3366';

								if(isset($qucreative_theme_data['preview_cookies'][$cookielab]) && $qucreative_theme_data['preview_cookies'][$cookielab]!==''){
									$val = $qucreative_theme_data['preview_cookies'][$cookielab];
								}

								echo qucreative_helpers_generate_input_text($lab, array(
									'class'=>'with-colorpicker',
									'seekval'=>$val,
									'input_type'=>'hidden',
								))

								?>
                                <div class="picker-con align-right">
                                    <div class="the-icon accepts-color"></div>
                                    <div class="picker"></div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="setting">

                                <div class="setting">
                                    <h6>Ajax Transitions</h6>
									<?php


									$lab = 'enable_ajax';
									$cookielab = $lab;


									$val = 'on';





									if(isset($qucreative_theme_data['preview_cookies'][$cookielab]) && $qucreative_theme_data['preview_cookies'][$cookielab]){
										$val = $qucreative_theme_data['preview_cookies'][$cookielab];
									}

									echo qucreative_helpers_generate_input_checkbox($lab, array(
										'class'=>'',
										'val'=>'on',
										'seekval'=>$val,
										'type'=>'radio',
									));
									echo ' On';
									echo '&nbsp;&nbsp;&nbsp;';
									echo '&nbsp;&nbsp;&nbsp;';


									echo qucreative_helpers_generate_input_checkbox($lab, array(
										'class'=>'',
										'val'=>'off',
										'seekval'=>$val,
										'type'=>'radio',
									));

									echo ' Off';



									?>
                                </div>
                            </div>
                        </div>





                    </div>

                    <hr>



                    <div class="row">


                        <div class="col-md-6">
                            <div class="setting">

                                <div class="setting">
                                    <h6>Parallax Background</h6>
									<?php


									$lab = 'bg_isparallax';
									$cookielab = $lab;


									$val = 'on';

									if(isset($qucreative_theme_data['preview_cookies'][$cookielab]) && $qucreative_theme_data['preview_cookies'][$cookielab]){
										$val = $qucreative_theme_data['preview_cookies'][$cookielab];
									}

									echo qucreative_helpers_generate_input_checkbox($lab, array(
										'class'=>'',
										'val'=>'on',
										'seekval'=>$val,
										'type'=>'radio',
									));
									echo ' On';
									echo '&nbsp;&nbsp;&nbsp;';
									echo '&nbsp;&nbsp;&nbsp;';


									echo qucreative_helpers_generate_input_checkbox($lab, array(
										'class'=>'',
										'val'=>'off',
										'seekval'=>$val,
										'type'=>'radio',
									));

									echo ' Off';


									?>
                                </div>
                            </div>
                        </div>



                        <div class="col-md-6">
                            <div class="setting">

                                <h6>Scrollbar Type</h6>

			                    <?php






			                    $lab = 'enable_native_scrollbar';
			                    $cookielab = $lab;

			                    $val = 'on';

			                    if(isset($qucreative_theme_data['preview_cookies'][$cookielab]) && $qucreative_theme_data['preview_cookies'][$cookielab]){
				                    $val = $qucreative_theme_data['preview_cookies'][$cookielab];
			                    }

			                    echo qucreative_helpers_generate_input_checkbox($lab, array(
				                    'class'=>'',
				                    'val'=>'on',
				                    'seekval'=>$val,
				                    'type'=>'radio',
			                    ));
			                    echo ' Native';
			                    echo '&nbsp;&nbsp;&nbsp;';
			                    echo '&nbsp;&nbsp;&nbsp;';


			                    echo qucreative_helpers_generate_input_checkbox($lab, array(
				                    'class'=>'',
				                    'val'=>'off',
				                    'seekval'=>$val,
				                    'type'=>'radio',
			                    ));

			                    echo ' Custom';

			                    ?>

                            </div>
                        </div>


                    </div>


                    <hr>
                    <div class="save-con">

                        <div style="white-space: nowrap; position: relative;"> <span class="preseter-button preseter-button--save">Save changes</span> <span class="preseter-button preseter-button--default">To default</span> </div>
                    </div>

                    <h3>Qu Demos</h3>
                    <div class="row" style="margin-bottom: -15px;">
                        <div class="col-md-6">
                            <a href="<?php echo $preseter_img_folder; ?>spa" target="_blank">
                                <img alt="theme demo" src="<?php echo QUCREATIVE_THEME_URL; ?>placeholders/preview_customizer/demo_thumb_spa.jpg"/>
                            </a>
                        </div>
                        <div class="col-md-6">
							<?php
							$slug = 'beauty-salon';
							?>
                            <a href="<?php echo $preseter_img_folder; ?><?php echo $slug; ?>" target="_blank">
                                <img alt="theme demo" src="<?php echo QUCREATIVE_THEME_URL; ?>placeholders/preview_customizer/demo_thumb_beauty_salon.jpg"/>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="<?php echo $preseter_img_folder; ?>mountain-resort" target="_blank">
                                <img alt="theme demo" src="<?php echo QUCREATIVE_THEME_URL; ?>placeholders/preview_customizer/demo_thumb_mountain_resort.jpg"/>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="<?php echo $preseter_img_folder; ?>coffee-shop" target="_blank">
                                <img alt="theme demo" src="<?php echo QUCREATIVE_THEME_URL; ?>placeholders/preview_customizer/demo_thumb_coffee_shop.jpg"/>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="<?php echo $preseter_img_folder; ?>models-agency" target="_blank">
                                <img alt="theme demo" src="<?php echo QUCREATIVE_THEME_URL; ?>placeholders/preview_customizer/demo_thumb_models_agency.jpg"/>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="<?php echo $preseter_img_folder; ?>restaurant" target="_blank">
                                <img alt="theme demo" src="<?php echo QUCREATIVE_THEME_URL; ?>placeholders/preview_customizer/demo_ristorante.jpg"/>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="<?php echo $preseter_img_folder; ?>rock-band" target="_blank">
                                <img alt="theme demo" src="<?php echo QUCREATIVE_THEME_URL; ?>placeholders/preview_customizer/demo_thumb_rock_band.jpg"/>
                            </a>
                        </div>
						<?php
						$link = $preseter_img_folder.'summer-resort';
						?>
                        <div class="col-md-6">
                            <a href="<?php echo $link; ?>" target="_blank">
                                <img alt="theme demo" src="<?php echo QUCREATIVE_THEME_URL; ?>placeholders/preview_customizer/demo_thumb_summer_resort.jpg"/>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="<?php echo $preseter_img_folder; ?>gym" target="_blank">
                                <img alt="theme demo" src="<?php echo QUCREATIVE_THEME_URL; ?>placeholders/preview_customizer/demo_fitness.jpg"/>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="<?php echo $preseter_img_folder; ?>blogger" target="_blank">
                                <img alt="theme demo" src="<?php echo QUCREATIVE_THEME_URL; ?>placeholders/preview_customizer/demo_blogger.jpg"/>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="<?php echo $preseter_img_folder; ?>digital-agency" target="_blank">
                                <img alt="theme demo" src="<?php echo QUCREATIVE_THEME_URL; ?>placeholders/preview_customizer/demo_digital_agency.jpg"/>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="<?php echo $preseter_img_folder; ?>freelancer" target="_blank">
                                <img alt="theme demo" src="<?php echo QUCREATIVE_THEME_URL; ?>placeholders/preview_customizer/demo_freelancer.jpg"/>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="<?php echo $preseter_img_folder; ?>showcase" target="_blank">
                                <img alt="theme demo" src="<?php echo QUCREATIVE_THEME_URL; ?>placeholders/preview_customizer/demo_showcase.jpg"/>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="<?php echo $preseter_img_folder; ?>photoshoot" target="_blank">
                                <img alt="theme demo" src="<?php echo QUCREATIVE_THEME_URL; ?>placeholders/preview_customizer/demo_photoshoot.jpg"/>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="<?php echo $preseter_img_folder; ?>digital-amateur" target="_blank">
                                <img alt="theme demo" src="<?php echo QUCREATIVE_THEME_URL; ?>placeholders/preview_customizer/demo_digital_amateur.jpg"/>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="<?php echo $preseter_img_folder; ?>pictures" target="_blank">
                                <img alt="theme demo" src="<?php echo QUCREATIVE_THEME_URL; ?>placeholders/preview_customizer/demo_pictures.jpg"/>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="#" >
                                <img alt="theme demo" style="width: 100%;" src="<?php echo QUCREATIVE_THEME_URL; ?>placeholders/preview_customizer/demo_thumb_hotel.jpg"/>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="#" >
                                <img alt="theme demo" style="width: 100%;" src="<?php echo QUCREATIVE_THEME_URL; ?>placeholders/preview_customizer/demo_thumb_medical.jpg"/>
                            </a>
                        </div>
                    </div>


                    <!--end the-content-->
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
	<?php





/*
 *
                    <hr>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="setting setting-for-colorpicker flex-con">
                                <h6 style="; ">Site Border Color</h6>
								<?php



								$lab = 'border_color';
								$cookielab = $lab;


								$val = '#942392';

								if(isset($qucreative_theme_data['preview_cookies'][$cookielab]) && $qucreative_theme_data['preview_cookies'][$cookielab]){
									$val = $qucreative_theme_data['preview_cookies'][$cookielab];
								}

								echo qucreative_helpers_generate_input_text($lab, array(
									'class'=>'with-colorpicker',
									'seekval'=>$val,
									'input_type'=>'hidden',
								))

								?>
                                <div class="picker-con align-right">
                                    <div class="the-icon accepts-color"></div>
                                    <div class="picker"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="setting setting-for-colorpicker flex-con">
                                <h6 style="; ">Border Size</h6>
								<?php




								$lab = 'border_width';
								$cookielab = $lab;


								$val = '0';

								if(isset($qucreative_theme_data['preview_cookies'][$cookielab]) && $qucreative_theme_data['preview_cookies'][$cookielab]){
									$val = $qucreative_theme_data['preview_cookies'][$cookielab];
								}

								echo qucreative_helpers_generate_input_text($lab, array(
									'class'=>'small-field',
									'seekval'=>$val,
									'input_type'=>'text',
								))


								?>
                                <span class="small-sidenote">PIXELS</span>
                            </div>
                        </div>
                    </div>
 */






	}?>
</div>

<?php

echo '<div class="qucreative-option-feed" data-rel="mainoptions">'.$qucreative_theme_data['js_data_for_inline_options'].'</div>';



if($qucreative_theme_data['theme_mods']['border_width']){

	if(intval($qucreative_theme_data['theme_mods']['border_width'])){
		?>
        <div class="stylish-border" style="position: fixed; top:0; left:0; width: 100%; height: <?php echo $qucreative_theme_data['theme_mods']['border_width']; ?>px; background-color: <?php echo $qucreative_theme_data['theme_mods']['border_color']; ?>; "></div>
        <div class="stylish-border" style="position: fixed; bottom:0; left:0; width: 100%; height: <?php echo $qucreative_theme_data['theme_mods']['border_width']; ?>px; background-color: <?php echo $qucreative_theme_data['theme_mods']['border_color']; ?>; "></div>
        <div class="stylish-border" style="position: fixed; top:0; left:0; width: <?php echo $qucreative_theme_data['theme_mods']['border_width']; ?>px; background-color: <?php echo $qucreative_theme_data['theme_mods']['border_color']; ?>; height: 100%; "></div>
        <div class="stylish-border" style="position: fixed; top:0; right:0; width: <?php echo $qucreative_theme_data['theme_mods']['border_width']; ?>px; background-color: <?php echo $qucreative_theme_data['theme_mods']['border_color']; ?>; height: 100%; "></div>
		<?php
	}


}
wp_footer();
?>
</body>
</html><?php
