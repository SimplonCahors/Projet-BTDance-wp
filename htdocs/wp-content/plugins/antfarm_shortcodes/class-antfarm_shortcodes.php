<?php



// -- the page builder elements
$dzspgb_templates = array();







class AntFarm {


    public $db_mainoptions = '';
    public $dbname_mainoptions = 'antfarm_options';


    public $name_prefix = 'antfarm';
    public $name_port_item = 'antfarm_port_items';
    public $name_port_item_cat = 'antfarm_port_items_cat';


    public $post_types = array();

    public $arr_for_select_post_type_opts = array();


    public $capability_admin = 'manage_options';

    private $adminpagename_mainoptions = 'antfarm-mo';
    private $adminpagename_batchupload = 'page-dzstln-batchupload';

    private $capability_for_menu = 'manage_options';




    public $base_url = '';
    public $base_path = '';
    public $title_label = '';

    public $shortcode_index = 0; // -- the iteration of the shortcode
    public $zfolio_index = 0; // -- the iteration of the shortcode


    public $page_is_reorder = false;




    function __construct() {





        $this->base_url = plugins_url('',__FILE__).'/';
        $this->base_path = dirname(__FILE__).'/';



        $defaultOpts = array(
            'post_types_for_meta'=>array(
                'post',
            ),
            'extra_css' => '',
        );
        $this->db_mainoptions = get_option($this->dbname_mainoptions);

        // -- default opts / inject into db
        if ($this->db_mainoptions == '') {
            $this->db_mainoptions = $defaultOpts;
            update_option($this->dbname_mainoptions, $this->db_mainoptions);
        }

        $this->db_mainoptions = array_merge($defaultOpts, $this->db_mainoptions);


        $this->arr_for_select_post_type_opts = array(
            array(
                'label'=>'post'
            ,'value'=>'post'
            ),array(
                'label'=>'page'
            ,'value'=>'page'
            ),
        );



        $this->check_posts();








        $primary_dir = $this->base_path.'pagebuilder/elements';


        if ($handle3 = opendir($primary_dir)) {



            while (false !== ($entry = readdir($handle3))) {


                if ($entry == '.' || $entry == '..' || $entry == '.DS_Store') {
                    continue;
                }




                $auxfile = $primary_dir . '/' . $entry;


                if (file_exists($auxfile)) {
                    include_once($auxfile);
                }

            }
        }









        add_action('wp_ajax_antfarm_ajax_mo',array($this,'post_save_mo'));
        add_action('wp_ajax_antfarm_get_post_thumb_url',array($this,'post_get_post_thumb_url'));
        add_action('wp_ajax_dzs_update_term_order',array($this,'post_dzs_update_term_order'));
        add_action('wp_ajax_antfarm_ajax_get_attachment_url', array($this, 'post_get_attachment_url'));
        add_action('wp_ajax_antfarm_tabs_sort', array($this, 'post_tabs_sort'));


        add_action('init',array($this,'handle_init'),30);
        add_action('init',array($this,'handle_init_end'), 99999);
        add_action('wp_head',array($this,'handle_wp_head'),40);
        add_action('admin_init',array($this,'handle_admin_init'),40);
        add_action('admin_head',array($this,'handle_admin_head'),40);
        add_action('admin_menu',array($this,'handle_admin_menu'));
        add_action('admin_footer',array($this,'handle_admin_footer'));
        add_action('add_meta_boxes',array($this,'handle_add_meta_boxes'));

        add_action( 'edit_form_after_title', array($this, 'handle_edit_form_after_title') );
        add_action( 'plugins_loaded', array($this, 'handle_plugins_loaded') );

        add_action('save_post',array($this,'handle_admin_meta_save'));



	    add_action('customize_register', array($this, 'handle_customize_register'));






	    add_shortcode('antfarm_team_member', array($this, 'shortcode_team_member'));





	    add_shortcode('antfarm_bullet_feature', array($this, 'shortcode_icon_box'));
	    add_shortcode('antfarm_section_title', array($this, 'shortcode_section_title'));
	    add_shortcode('antfarm_image_box', array($this, 'shortcode_image_box'));
        add_shortcode('antfarm_pricing_table', array($this, 'shortcode_antfarm_pricing_table'));
        add_shortcode('antfarm_list', array($this, 'shortcode_antfarm_list'));
        add_shortcode('antfarm_client_list', array($this, 'shortcode_antfarm_client_list'));
        add_shortcode('antfarm_blockquote', array($this, 'shortcode_antfarm_blockquote'));
        add_shortcode('antfarm_carousel', array($this, 'shortcode_antfarm_carousel'));
        add_shortcode('antfarm_image_slider', array($this, 'shortcode_antfarm_image_slider'));
        add_shortcode('antfarm_portfolio', array($this, 'shortcode_antfarm_portfolio'));
        add_shortcode('antfarm_latest_posts', array($this, 'shortcode_antfarm_latest_posts'));
        add_shortcode('antfarm_latest_posts_2', array($this, 'shortcode_antfarm_latest_posts_2'));
        add_shortcode('antfarm_video_player', array($this, 'shortcode_antfarm_video_player'));
        add_shortcode('antfarm_audio_player', array($this, 'shortcode_antfarm_audio_player'));
        add_shortcode('antfarm_audio_playlist', array($this, 'shortcode_antfarm_audio_playlist'));
        add_shortcode('antfarm_contact_form', array($this, 'shortcode_antfarm_contact_form'));
        add_shortcode('antfarm_menu_item', array($this, 'shortcode_antfarm_menu_item'));
        add_shortcode('antfarm_progress_bar', array($this, 'shortcode_progress_bar'));
        add_shortcode('antfarm_service_lightbox', array($this, 'shortcode_antfarm_service_lightbox'));
        add_shortcode('antfarm_call_to_action', array($this, 'shortcode_antfarm_call_to_action'));

	    add_shortcode('antfarm_team_member', array($this, 'shortcode_team_member'));
	    add_shortcode('antfarm_separator', array($this, 'shortcode_antfarm_separator'));
	    add_shortcode('antfarm_contact_info', array($this, 'shortcode_antfarm_contact_info'));
	    add_shortcode('antfarm_image_for_sideways', array($this, 'shortcode_image_for_sideways'));
	    add_shortcode('antfarm_button', array($this, 'shortcode_button'));
	    add_shortcode('antfarm_divider', array($this, 'shortcode_divider'));
	    add_shortcode('antfarm_tta_tabs', array($this, 'shortcode_antfarm_tta_tabs'));


        add_shortcode('antfarm_sc_call_to_action', array($this, 'shortcode_sc_call_to_action'));
        add_shortcode('antfarm_sc_blockquote', array($this, 'shortcode_sc_blockquote'));
        add_shortcode('antfarm_sc_video', array($this, 'shortcode_sc_video'));
        add_shortcode('antfarm_sc_video_text', array($this, 'shortcode_sc_video_text'));
        add_shortcode('antfarm_sc_three_cols', array($this, 'shortcode_sc_three_cols'));
        add_shortcode('antfarm_sc_contact_form', array($this, 'shortcode_sc_contact_form'));
        add_shortcode('antfarm_sc_contact_box', array($this, 'shortcode_sc_contact_box'));
        add_shortcode('antfarm_sc_small_map', array($this, 'shortcode_sc_small_map'));
        add_shortcode('antfarm_sc_testimonials', array($this, 'shortcode_sc_testimonials'));
        add_shortcode('antfarm_sc_client_slider', array($this, 'shortcode_sc_client_slider'));
        add_shortcode('antfarm_sc_progress', array($this, 'shortcode_sc_progress'));
        add_shortcode('antfarm_sc_social_links', array($this, 'shortcode_sc_social_links'));
	    add_shortcode('antfarm_sc_antfarm_portfolio', array($this, 'shortcode_sc_antfarm_portfolio'));

        add_shortcode('antfarm_row', array($this, 'shortcode_antfarm_row'));
        add_shortcode('antfarm_row_part', array($this, 'shortcode_antfarm_row_part'));
        add_shortcode('antfarm_element', array($this, 'shortcode_antfarm_element'));


        add_shortcode('dzspgb_row', array($this, 'shortcode_antfarm_row'));
        add_shortcode('dzspgb_row_part', array($this, 'shortcode_antfarm_row_part'));
        add_shortcode('dzspgb_element', array($this, 'shortcode_antfarm_element'));





    }





	function handle_customize_register($wp_customize){





        if(defined("QUCREATIVE_VERSION")){



	        $wp_customize->add_section(
		        'settings_social',
		        array(
			        'title' => esc_html__("Social Settings",'antfarm'),
			        'description' => esc_html__("Configure social options",'antfarm'),
			        'priority' => 35,
		        )
	        );











	        $lab = 'social_enable_facebook_share';

	        $wp_customize->add_setting(
		        $lab,
		        array(
			        'default' => false,
			        'sanitize_callback' => 'esc_html',
			        'transport' => 'refresh',
		        )
	        );

	        $wp_customize->add_control(
		        new Qucreative_Customize_Control_Checkbox_Nova(
			        $wp_customize,
			        $lab,
			        array(
				        'section' => 'settings_social',
				        'label'   => esc_html__( 'Enable Facebook Share in Blog Posts?', 'antfarm' ),
			        )
		        )
	        );



	        $lab = 'social_enable_twitter_share';

	        $wp_customize->add_setting(
		        $lab,
		        array(
			        'default' => false,
			        'sanitize_callback' => 'esc_html',
			        'transport' => 'refresh',
		        )
	        );

	        $wp_customize->add_control(
		        new Qucreative_Customize_Control_Checkbox_Nova(
			        $wp_customize,
			        $lab,
			        array(
				        'section' => 'settings_social',
				        'label'   => esc_html__( 'Enable Twitter Share in Blog Posts?', 'antfarm' ),
			        )
		        )
	        );



	        $lab = 'social_enable_gplus_share';

	        $wp_customize->add_setting(
		        $lab,
		        array(
			        'default' => false,
			        'sanitize_callback' => 'esc_html',
			        'transport' => 'refresh',
		        )
	        );

	        $wp_customize->add_control(
		        new Qucreative_Customize_Control_Checkbox_Nova(
			        $wp_customize,
			        $lab,
			        array(
				        'section' => 'settings_social',
				        'label'   => esc_html__( 'Enable Google Plus Share in Blog Posts?', 'antfarm' ),
			        )
		        )
	        );



	        $lab = 'social_enable_pinterest_share';

	        $wp_customize->add_setting(
		        $lab,
		        array(
			        'default' => false,
			        'sanitize_callback' => 'esc_html',
			        'transport' => 'refresh',
		        )
	        );

	        $wp_customize->add_control(
		        new Qucreative_Customize_Control_Checkbox_Nova(
			        $wp_customize,
			        $lab,
			        array(
				        'section' => 'settings_social',
				        'label'   => esc_html__( 'Enable Pinterest Share in Blog Posts?', 'antfarm' ),
			        )
		        )
	        );



	        $lab = 'social_enable_linkedin_share';

	        $wp_customize->add_setting(
		        $lab,
		        array(
			        'default' => false,
			        'sanitize_callback' => 'esc_html',
			        'transport' => 'refresh',
		        )
	        );

	        $wp_customize->add_control(
		        new Qucreative_Customize_Control_Checkbox_Nova(
			        $wp_customize,
			        $lab,
			        array(
				        'section' => 'settings_social',
				        'label'   => esc_html__( 'Enable LinkedIn Share in Blog Posts?', 'antfarm' ),
			        )
		        )
	        );
        }




	}



    function shortcode_antfarm_row($pargs=array(), $content=''){
        $fout = '';

        $margs = array(
            'input_height' => '10',
            'extra_classes' => '',
            'column_padding' => 'default',
        );


        if(is_array($pargs)){
            $margs = array_merge($margs,$pargs);
        }

        $fout.='<div class="antfarm-row dzs-row '.$margs['extra_classes'].'"';


        if($margs['column_padding']){
            $fout.=' data-column_padding="'.$margs['column_padding'].'"';
        }


        $fout.='>';

        $fout.=do_shortcode($content);

        $fout.='</div>';



        return $fout;

    }


    function shortcode_antfarm_row_part($pargs=array(), $content=''){
        $fout = '';

        $margs = array(
            'input_height' => '10',
            'part' => '1.1',
            'extra_classes' => '',
        );


        if(is_array($pargs)){
            $margs = array_merge($margs,$pargs);
        }

        $fout.='<div class="';


        if($margs['part']=='1.1'){
            $fout.='dzs-col-md-12 ';
        }
        if($margs['part']=='1.2'){
            $fout.='dzs-col-md-6 ';
        }

        $fout.=''.$margs['extra_classes'].' antfarm-row-part">';

        $fout.=do_shortcode($content);

        $fout.='</div>';



        return $fout;

    }
    function shortcode_antfarm_element($pargs=array(), $content=''){
        $fout = '';

        $margs = array(
            'type_element' => '',
            'extra_classes' => '',
        );


        if(is_array($pargs)){
            $margs = array_merge($margs,$pargs);
        }


        if(function_exists('antfarm_shortcode_'.$margs['type_element'])){



            $lab_func = 'antfarm_shortcode_'.$margs['type_element'];

            $fout.=$lab_func($margs,$content);
        }



        return $fout;

    }


    function filter_the_content($content){

        $fout = $content;

        echo $fout;



        return $fout;
    }

    function mail($pargs = array()){




        $margs = array(
            'sender'=>'{{admin}}',
            'target'=>'{{admin}}',
            'message'=>'',
            'subject'=>'Email',
        );



        $margs = array_merge($margs, $pargs);

        $to = $margs['target'];
        $from = $margs['sender'];



        if($from=='{{admin}}' || $from==''){
            $from = get_option('admin_email');
        }

        if($to=='{{admin}}' || $to==''){
            $to = get_option('admin_email');
        }



        $subject = $margs['subject'];
        $message = '';
        $message.= $margs['message'];
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers.= 'From: '. $from . "\r\n" .
            'Reply-To: '. $from  . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        $aux = wp_mail($to, $subject, $message, $headers);



        echo ' --- 
        
        
        tried to send mail ... -'.$to.'
        
        
        headers - '.$headers.'
        
        
        message - '.$message;
        if($aux){
            echo ' mail sent';
        }else{
            error_log("mail not sent");
        }



    }



    public function handle_plugin_activate(){
        $this->plugin_justactivated = "on";

        $this->register_links();
        flush_rewrite_rules();


    }


    function handle_add_meta_boxes(){

//        add_meta_box('qucreative_meta_options',esc_html__('Contact Form Options','antfarm'),array($this,'meta_contact_form'),'antfarm_contact_form','normal');














        add_meta_box('qucreative_meta_options',$this->title_label.' '.esc_html__("Meta Options",'antfarm'),array($this,'admin_meta_options'),'page','normal');
        add_meta_box('qucreative_meta_options',$this->title_label.' '.esc_html__("Meta Options",'antfarm'),array($this,'admin_meta_options'),'post','normal');



        add_meta_box('qucreative_meta_options',$this->title_label.' '.esc_html__("Meta Options",'antfarm'),array($this,'admin_meta_options'),$this->name_port_item,'normal');
        add_meta_box('qucreative_meta_options_portfolio',$this->title_label.' '.esc_html__("Meta Options",'antfarm'). ' '.esc_html__("Portfolio",'antfarm'),array($this,'admin_meta_options_portfolio'),$this->name_port_item,'normal');










        if(defined('QUCREATIVE_VERSION')){
            // -- we only need page gallery for the qucreative theme

	        add_meta_box('qucreative_meta_gallery', esc_html__('Page Gallery','antfarm'),array($this,'admin_meta_gallery'),$this->name_port_item,'side');
        }


    }





	function admin_meta_gallery() {

        // -- for qucreative

		// -- this is the meta box
		global $post;
		?>
        <div id="antfarm-product_images_container product_images_container">
            <ul class="dzs_item_gallery_list">
				<?php
				$product_image_gallery = '';
				if (metadata_exists('post',$post->ID,'qucreative_meta_image_gallery')) {
					$product_image_gallery = get_post_meta($post->ID,'qucreative_meta_image_gallery',true);
				}

				$attachments = array_filter(explode(',',$product_image_gallery));

				if ($attachments) {
					foreach ($attachments as $attachment_id) {
						echo '<li class="item-element" data-id="'.$attachment_id.'">
						<div class="the-image the-handler">
'.wp_get_attachment_image($attachment_id,'thumbnail',false, array( "class" => "img-responsive " ) ).'
</div>
<div class="ui-delete"></div>
<div class="ui-edit">'.esc_html__("Edit",'antfarm').'</div>';



						$att_meta =array();

						$att_meta = wp_prepare_attachment_for_js($attachment_id);


						?>
                        <div class="ui-edit-field">
                            <div class="ui-edit-field-close"><i class="fa fa-times-circle"></i></div>

                            <input type="hidden" name="qucreative_meta_post_id" value="<?php echo $attachment_id; ?>"/>
                            <div class="setting">
                                <h5><?php echo esc_html__("Title",'antfarm'); ?></h5>
                                <input class="q-att-meta-edit-field" type="text" name="qucreative_meta_post_excerpt" value="<?php $aux = $att_meta['caption']; $aux = str_replace('"', '', $aux); echo $aux; ?>"/>
                            </div>

                            <div class="setting for-selected-template-gallery-creative">
                                <h5><?php echo esc_html__("Description",'antfarm'); ?></h5>
                                <textarea class="q-att-meta-edit-field" type="text" name="qucreative_meta_post_content"><?php $aux = $att_meta['description']; $aux = str_replace('"', '', $aux); echo $aux; ?></textarea>
                            </div>

                            <div class="setting not-for-selected-template-gallery-creative">
                                <h5><?php echo esc_html__("Aligment",'antfarm'); ?></h5>
								<?php


								$seekval = 'right';

								if(get_post_meta($attachment_id, 'qucreative_meta_meta_att_aligment',true)){
									$seekval = get_post_meta($attachment_id, 'qucreative_meta_meta_att_aligment',true);
								}



								$arr_opts = array(
									array(
										'label'=>esc_html__("Right",'antfarm'),
										'value'=>'right',
									),
									array(
										'label'=>esc_html__("Left",'antfarm'),
										'value'=>'left',
									),
								);

								echo qucreative_helpers_generate_select('qucreative_meta_att_aligment', array(
									'class'=>'q-att-meta-edit-field',
									'options'=>$arr_opts,
									'seekval'=>$seekval,
								))
								?>
                            </div>



							<?php

							$lab = 'qucreative_meta_att_video';
							$seekval = get_post_meta($attachment_id, $lab,true);


							?>
                            <div class="setting for-selected-template-gallery-creative">
                                <h5><?php echo esc_html__("Attached Video",'antfarm'); ?></h5>
                                <input class="q-att-meta-edit-field" type="text" name="<?php echo $lab; ?>" value="<?php echo $seekval; ?>"/>
                            </div>



							<?php

							$lab = 'qucreative_meta_att_enable_video_cover';
							$seekval = get_post_meta($attachment_id, $lab,true);


							?>
                            <div class="setting for-selected-template-gallery-creative">
                                <h5><?php echo esc_html__("Enable Video Cover",'antfarm'); ?></h5>
								<?php




								$arr_opts = array(
									array(
										'label'=>esc_html__("Off",'antfarm'),
										'value'=>'off',
									),
									array(
										'label'=>esc_html__("On",'antfarm'),
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

            <input type="hidden" id="qucreative_meta_image_gallery" name="qucreative_meta_image_gallery" value="<?php echo esc_attr($product_image_gallery); ?>" />
            <button class="button-secondary dzs-add-gallery-item"><?php echo esc_html__("Add Media", 'antfarm'); ?></button>
        </div>
		<?php
	}




	function admin_meta_options_portfolio(){


        global $post;



        $lab = 'qucreative_meta_port_subtitle';
        ?>
        <div class="setting type-all for-antfarm_port_items">
            <h4><?php echo esc_html__("Subtitle",'antfarm'); ?></h4>
            <?php echo DZSHelpers::generate_input_text($lab, array(
                'class'=>'',
                'seekval'=>get_post_meta($post->ID, $lab, true),
            ))
            ?>
            <p class="sidenote"><?php echo esc_html__("set a custom subtitle",'antfarm'); ?></p>
        </div>


        <?php
        $lab = 'qucreative_meta_port_optional_info_1';



	    $dependency = array(

		    array(
			    'lab'=>'qucreative_meta_is_fullscreen',
			    'val'=>array('on'),
		    ),
	    );



	    $dependency = json_encode($dependency);


        ?>
        <div class="setting type-all for-antfarm_port_items" data-dependency='<?php echo $dependency; ?>'>
            <h4><?php echo esc_html__("Optional Info 1",'antfarm'); ?></h4>
            <?php echo DZSHelpers::generate_input_text($lab, array(
                'class'=>'',
                'seekval'=>get_post_meta($post->ID, $lab, true),
            ))
            ?>
            <p class="sidenote"><?php echo esc_html__("set some optional info for the portfolio item",'antfarm'); ?></p>
        </div>


        <?php
        $lab = 'qucreative_meta_port_optional_info_2';
        ?>
        <div class="setting type-all for-antfarm_port_items" data-dependency='<?php echo $dependency; ?>'>
            <h4><?php echo @sprintf(esc_html__("Optional Info %s",'antfarm'),'2'); ?></h4>
            <?php echo DZSHelpers::generate_input_text($lab, array(
                'class'=>'',
                'seekval'=>get_post_meta($post->ID, $lab, true),
            ))
            ?>
            <p class="sidenote"><?php echo esc_html__("set some optional info for the portfolio item",'antfarm'); ?></p>
        </div>


        <?php
        $lab = 'qucreative_meta_port_optional_info_3';
        ?>
        <div class="setting type-all for-antfarm_port_items" data-dependency='<?php echo $dependency; ?>'>
            <h4><?php echo @sprintf(esc_html__("Optional Info %s",'antfarm'),'3'); ?></h4>
            <?php echo DZSHelpers::generate_input_text($lab, array(
                'class'=>'',
                'seekval'=>get_post_meta($post->ID, $lab, true),
            ))
            ?>
            <p class="sidenote"><?php echo esc_html__("set some optional info for the portfolio item",'antfarm'); ?></p>
        </div>


        <?php
        $lab = 'qucreative_meta_port_optional_info_4';
        ?>
        <div class="setting type-all for-antfarm_port_items" data-dependency='<?php echo $dependency; ?>'>
            <h4><?php echo @sprintf(esc_html__("Optional Info %s",'antfarm'),'4'); ?></h4>
            <?php echo DZSHelpers::generate_input_text($lab, array(
                'class'=>'',
                'seekval'=>get_post_meta($post->ID, $lab, true),
            ))
            ?>
            <p class="sidenote"><?php echo esc_html__("set some optional info for the portfolio item",'antfarm'); ?></p>
        </div>


        <?php
        $lab = 'qucreative_meta_port_website';
        ?>
        <div class="setting type-all for-antfarm_port_items" data-dependency='<?php echo $dependency; ?>'>
            <h4><?php echo esc_html__("Portfolio Website",'antfarm'); ?></h4>
            <?php echo DZSHelpers::generate_input_text($lab, array(
                'class'=>'',
                'seekval'=>get_post_meta($post->ID, $lab, true),
            ))
            ?>
            <p class="sidenote"><?php echo esc_html__("set the project's website ",'antfarm'); ?></p>
        </div>





	    <?php
	    $lab = 'qucreative_meta_port_open_custom_link_sw';

	    $seekval = get_post_meta($post->ID, $lab, true);


	    echo DZSHelpers::generate_input_text($lab,array('id' => $lab,
                                                        'input_type' => 'hidden',
                                                        'val' => 'off',
                                                        'class' => 'fake-input',
        ))

	    ?>

        <div class="setting type-all ">
            <h4><?php echo esc_html__("Open custom link",'antfarm');  ?>?</h4>
		    <?php echo '<div class="dzscheckbox skin-nova">
'.DZSHelpers::generate_input_checkbox($lab,array('id' => $lab,'class' => 'mainsetting dzs-dependency-field', 'val' => 'on','seekval' => $seekval)).'
		<label for="'.$lab.'"></label>
</div>';
		    ?>

            <p class="sidenote"><?php echo esc_html__("open the custom link when clicking the item",'antfarm'); ?></p>
        </div>





	    <?php



	    $dependency = array(

	            'relation'=>'OR',
		    array(
			    'label'=>'qucreative_meta_port_open_custom_link_sw',
			    'value'=>array('on'),
		    ),
	            array(
		            'label'=>'qucreative_meta_is_fullscreen',
		            'value'=>array('on'),
	            ),
	    );


	    $dependency = json_encode($dependency);


	    $lab = 'qucreative_meta_port_custom_link';
        ?>
        <div class="setting type-all for-antfarm_port_items" data-dependency='<?php echo $dependency; ?>'>
            <h4><?php echo esc_html__("Custom link",'antfarm'); ?></h4>
            <?php echo DZSHelpers::generate_input_text($lab, array(
                'class'=>'',
                'seekval'=>get_post_meta($post->ID, $lab, true),
            ))
            ?>
            <p class="sidenote"><?php echo esc_html__("set a custom link ( if you want the link to be different then the portfolio website ) ",'antfarm'); ?></p>
        </div>
        <?php



            $lab = 'qucreative_meta_port_custom_link_target';

            $arr_opts = array(
	            array(
		            'label'=>esc_html__("Same tab",'antfarm'),
		            'value'=>'_self',
	            ),
	            array(
		            'label'=>esc_html__("New tab",'antfarm'),
		            'value'=>'_blank',
	            ),
            );






            ?>
        <div class="setting  type-all"  data-dependency='<?php echo $dependency; ?>'>
            <h4><?php echo esc_html__("Link target",'antfarm'); ?></h4>
		    <?php echo DZSHelpers::generate_select($lab,
			    array(
				    'class'=>'dzs-style-me skin-beige ',
				    'options'=>$arr_opts,
				    'seekval'=>get_post_meta($post->ID, $lab, true),
			    )
		    );
		    ?>

            <p class="sidenote"><?php echo esc_html__("open in same tab or new tab",'antfarm'); ?></p>
        </div><?php


    }



    function admin_meta_options(){
        global $post, $wp_version;
        $struct_uploader = '<div class="dzs-wordpress-uploader">
<a href="#" class="button-secondary">' . esc_html__("Upload",'antfarm') . '</a>
</div>';

        ?>
        <div class="qucreative_meta-meta-bigcon con-type-receiver">

            <input type="hidden" name="qucreative_meta_nonce" value="<?php echo wp_create_nonce('qucreative_meta_nonce'); ?>"/>






            <?php
            $lab = 'qucreative_meta_bg_image';
            ?>
            <div class="setting type-all setting-background-image">
                <h4><?php echo esc_html__("Background Image",'antfarm'); ?></h4>
                <?php echo DZSHelpers::generate_input_text($lab, array(
                    'class'=>'',
                    'seekval'=>get_post_meta($post->ID, $lab, true),
                ))
                ?>
                <button class="button-secondary dzsq-dzs-wordpress-uploader"><?php echo esc_html__("Upload",'antfarm'); ?></button>
                <p class="sidenote"><?php echo esc_html__("set a background image",'antfarm'); ?></p>
            </div>





            <?php





            global $qucreative_theme_data;
            if($qucreative_theme_data['is_preview_blog']) {

                $lab = 'qucreative_meta_light_bg_image';
                ?>
                <div class="setting type-all setting-background-image">
                    <h4><?php echo esc_html__("Background Image Light", 'antfarm'); ?></h4>
                    <?php echo DZSHelpers::generate_input_text($lab, array(
                        'class' => '',
                        'seekval' => get_post_meta($post->ID, $lab, true),
                    ))
                    ?>
                    <button class="button-secondary dzsq-dzs-wordpress-uploader"><?php echo esc_html__("Upload", 'antfarm'); ?></button>
                    <p class="sidenote"><?php echo esc_html__("set a background image", 'antfarm'); ?></p>
                </div>


                <?php
            }




            if($post->post_type!=$this->name_port_item){
                $lab = 'qucreative_meta_custom_title';
                ?>
                <div class="setting type-all">
                    <h4><?php echo esc_html__("Custom Title",'antfarm'); ?></h4>
                    <?php echo DZSHelpers::generate_input_text($lab, array(
                        'class'=>'',
                        'seekval'=>get_post_meta($post->ID, $lab, true),
                    ))
                    ?>
                    <p class="sidenote"><?php echo esc_html__("set a custom title",'antfarm'); ?></p>
                </div>



                <?php

                // -- Custom Margin Bottom for Section
            }

            if(defined("QUCREATIVE_VERSION")){
            }


            $lab = 'qucreative_meta_custom_section_margin_bottom';
            ?>
            <div class="setting type-all setting-custom-section-spacing">
                <h4><?php echo esc_html__("Custom Section Spacing",'antfarm'); ?></h4>
                <?php echo DZSHelpers::generate_input_text($lab, array(
                    'class'=>'',
                    'seekval'=>get_post_meta($post->ID, $lab, true),
                ))
                ?>
                <p class="sidenote"><?php echo esc_html__("This will defined a custom margin bottom for the section element ( in pixels )",'antfarm'); ?></p>
            </div><?php


            $lab = 'qucreative_meta_home_slideshow_time';
            $val = '0';

            if(get_post_meta($post->ID, $lab, true)){
                $val = get_post_meta($post->ID, $lab, true);
            }

            ?>
            <div class="setting type-all for-selected-template-qucreative-slider">
                <h4><?php echo esc_html__("Slideshow Time",'antfarm'); ?></h4>
                <?php echo DZSHelpers::generate_input_text($lab, array(
                    'class'=>'',
                    'seekval'=>$val,
                ))
                ?>
                <p class="sidenote"><?php echo esc_html__("leave 0 for no slideshow",'antfarm'); ?></p>
            </div>




            <?php
            $lab = 'qucreative_meta_post_media_type';

            $arr_opts = array(
                array(
                    'label'=>esc_html__("None",'antfarm'),
                    'value'=>'none',
                ),
                array(
                    'label'=>esc_html__("Image",'antfarm'),
                    'value'=>'image',
                ),
                array(
                    'label'=>esc_html__("Self Hosted Video",'antfarm'),
                    'value'=>'video',
                ),
                array(
                    'label'=>esc_html__("Vimeo Video",'antfarm'),
                    'value'=>'vimeo',
                ),
                array(
                    'label'=>esc_html__("YouTube Video",'antfarm'),
                    'value'=>'youtube',
                ),
                array(
                    'label'=>esc_html__("Slider",'antfarm'),
                    'value'=>'slider',
                ),
            );
            ?>
            <div class="setting type-all for-post-type-post for-post-type-antfarm_port_items">
                <h4><?php echo esc_html__("Post Media Type",'antfarm'); ?></h4>
                <?php echo DZSHelpers::generate_select($lab, array(
                    'class'=>'dzs-style-me skin-beige dzs-dependency-field',
                    'options'=>$arr_opts,
                    'seekval'=>get_post_meta($post->ID, $lab, true),
                ))
                ?>

                <p class="sidenote"><?php echo ''; ?></p>
            </div>




            <?php
            $lab = 'qucreative_meta_video_cover_image';






            $dependency = array(

                array(
                    'lab'=>'qucreative_meta_post_media_type',
                    'val'=>array('slider'),
                ),
            );




            $dependency = json_encode($dependency);

            ?>
            <div class="setting type-all"  data-dependency='<?php echo $dependency; ?>'>



                <h4><?php echo esc_html__("Slider",'antfarm'); ?></h4>
                <div id="product_images_container_in_meta">
                    <ul class="dzs_item_gallery_list">
                        <?php

                        $lab_main = 'qucreative_meta_image_gallery_in_meta';
                        $product_image_gallery = '';
                        if (metadata_exists('post',$post->ID,$lab_main)) {
                            $product_image_gallery = get_post_meta($post->ID,$lab_main,true);
                        }

                        $attachments = array_filter(explode(',',$product_image_gallery));

                        if ($attachments) {
                            foreach ($attachments as $attachment_id) {
                                echo '<li class="item-element" data-id="'.$attachment_id.'">
						<div class="the-image the-handler">
'.wp_get_attachment_image($attachment_id,'thumbnail',false, array( "class" => "img-responsive " ) ).'
</div>
<div class="ui-delete"></div>
<div class="ui-edit">'.esc_html__("Edit",'antfarm').'</div>';



                                $att_meta =array();

                                $att_meta = wp_prepare_attachment_for_js($attachment_id);


                                ?>
                                <div class="ui-edit-field">
                                    <div class="ui-edit-field-close"><i class="fa fa-times-circle"></i></div>

                                    <input type="hidden" name="qucreative_meta_post_id" value="<?php echo $attachment_id; ?>"/>
                                    <div class="setting">
                                        <h5><?php echo esc_html__("Title",'antfarm'); ?></h5>
                                        <input class="q-att-meta-edit-field" type="text" name="qucreative_meta_post_excerpt" value="<?php $aux = $att_meta['caption']; $aux = str_replace('"', '', $aux); echo $aux; ?>"/>
                                    </div>

                                    <div class="setting for-selected-template-gallery-creative">
                                        <h5><?php echo esc_html__("Description",'antfarm'); ?></h5>
                                        <textarea class="q-att-meta-edit-field" type="text" name="qucreative_meta_post_content"><?php $aux = $att_meta['description']; $aux = str_replace('"', '', $aux); echo $aux; ?></textarea>
                                    </div>

                                    <div class="setting not-for-selected-template-gallery-creative">
                                        <h5><?php echo esc_html__("Aligment",'antfarm'); ?></h5>
                                        <?php


                                        $seekval = 'right';

                                        if(get_post_meta($attachment_id, 'meta_att_aligment',true)){
                                            $seekval = get_post_meta($attachment_id, 'meta_att_aligment',true);
                                        }



                                        $arr_opts = array(
                                            array(
                                                'label'=>esc_html__("Right",'antfarm'),
                                                'value'=>'right',
                                            ),
                                            array(
                                                'label'=>esc_html__("Left",'antfarm'),
                                                'value'=>'left',
                                            ),
                                        );

                                        echo DZSHelpers::generate_select('qucreative_meta_att_aligment', array(
                                            'class'=>'q-att-meta-edit-field',
                                            'options'=>$arr_opts,
                                            'seekval'=>$seekval,
                                        ))
                                        ?>
                                    </div>



                                    <?php

                                    $lab = 'qucreative_meta_att_video';
                                    $seekval = get_post_meta($attachment_id, $lab,true);


                                    ?>
                                    <div class="setting for-selected-template-gallery-creative">
                                        <h5><?php echo esc_html__("Attached Video",'antfarm'); ?></h5>
                                        <input class="q-att-meta-edit-field" type="text" name="<?php echo $lab; ?>" value="<?php echo $seekval; ?>"/>
                                    </div>



                                    <?php

                                    $lab = 'qucreative_meta_att_enable_video_cover';
                                    $seekval = get_post_meta($attachment_id, $lab,true);


                                    ?>
                                    <div class="setting for-selected-template-gallery-creative">
                                        <h5><?php echo esc_html__("Enable Video Cover",'antfarm'); ?></h5>
                                        <?php




                                        $arr_opts = array(
                                            array(
                                                'label'=>esc_html__("Off",'antfarm'),
                                                'value'=>'off',
                                            ),
                                            array(
                                                'label'=>esc_html__("On",'antfarm'),
                                                'value'=>'on',
                                            ),
                                        );

                                        echo DZSHelpers::generate_select($lab, array(
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

                    <input type="hidden" id="<?php echo $lab_main; ?>" name="<?php echo $lab_main; ?>" value="<?php echo esc_attr($product_image_gallery); ?>" />
                    <button class="button-secondary dzs-add-gallery-item"><?php echo esc_html__("Add Media", 'antfarm'); ?></button>
                </div>

            </div>






            <?php
            $lab = 'qucreative_meta_post_media';






            $dependency = array(

                array(
                    'lab'=>'qucreative_meta_post_media_type',
                    'val'=>array('video','youtube','vimeo','image'),
                ),
            );




            $dependency = json_encode($dependency);

            ?>
            <div class="setting type-all for-post-type-post for-post-type-antfarm_port_items" data-dependency='<?php echo $dependency; ?>'>
                <h4><?php echo esc_html__("Post Media",'antfarm'); ?></h4>
                <?php echo DZSHelpers::generate_input_text($lab, array(
                    'class'=>'',
                    'seekval'=>get_post_meta($post->ID, $lab, true),
                ))
                ?>
                <button class="button-secondary dzsq-dzs-wordpress-uploader"><?php echo esc_html__("Upload",'antfarm'); ?></button>
                <p class="sidenote"><?php echo esc_html__("input the link, or upload the media you want to display.",'antfarm'); ?></p>
            </div>





            <?php
            $lab = 'qucreative_meta_video_cover_image';






            $dependency = array(

                array(
                    'lab'=>'qucreative_meta_post_media_type',
                    'val'=>array('video','youtube','vimeo'),
                ),
            );




            $dependency = json_encode($dependency);

            ?>
            <div class="setting type-all"  data-dependency='<?php echo $dependency; ?>'>
                <h4><?php echo esc_html__("Cover Image",'antfarm'); ?></h4>
                <?php echo DZSHelpers::generate_input_text($lab, array(
                    'class'=>'upload-type-image',
                    'seekval'=>get_post_meta($post->ID, $lab, true),
                ))
                ?>
                <button class="button-secondary dzsq-dzs-wordpress-uploader"><?php echo esc_html__("Upload",'antfarm'); ?></button>
                <p class="sidenote"><?php echo esc_html__("select an optional cover image",'antfarm'); ?></p>
            </div>



            <?php



            $arr_opts = array(
                array(
                    'label'=>esc_html__("Default",'antfarm'),
                    'value'=>'default',
                ),
                array(
                    'label'=>esc_html__("Dark",'antfarm'),
                    'value'=>'dark',
                ),
                array(
                    'label'=>esc_html__("Light",'antfarm'),
                    'value'=>'light',
                ),
            );

            ?>

            <?php
            $lab = 'qucreative_meta_scrollbar_theme'
            ?>
            <div class="setting type-all">
                <h4><?php echo esc_html__("Scrollbar Theme",'antfarm'); ?></h4>
                <?php echo DZSHelpers::generate_select($lab, array(
                    'class'=>'dzs-style-me skin-beige',
                    'options'=>$arr_opts,
                    'seekval'=>get_post_meta($post->ID, $lab, true),
                ))
                ?>

                <p class="sidenote"><?php echo esc_html__("default - will take the setting from the customizer",'antfarm'); ?></p>
            </div>







            <?php
            $lab = 'qucreative_meta_post_layout_for_excerpt';

            $arr_opts = array(
                array(
                    'label'=>esc_html__("Default Layout",'antfarm'),
                    'value'=>'',
                ),
                array(
                    'label'=>esc_html__("Small Layout",'antfarm'),
                    'value'=>'small',
                ),
            );
            ?>
            <div class="setting  for-post-type-antfarm_port_items">
                <h4><?php echo esc_html__("Excerpt Layout",'antfarm'); ?></h4>
                <?php echo DZSHelpers::generate_select($lab, array(
                    'class'=>' dzs-style-me skin-beige',
                    'options'=>$arr_opts,
                    'seekval'=>get_post_meta($post->ID, $lab, true),
                ))
                ?>

                <p class="sidenote"><?php echo ''; ?></p>
            </div>





            <?php




//            print_r($post);
            if($post && $post->ID && $post->ID!==get_option( 'page_for_posts' )){

                $lab = 'qucreative_meta_use_sidebar';

                $seekval = get_post_meta($post->ID, $lab, true);

                if($post->post_type=='post'){
                    if($seekval==''){
                        $seekval='on';
                    }
                }

                echo DZSHelpers::generate_input_text($lab,array('id' => $lab, 'val' => 'off','input_type'=>'hidden'));
                ?>

                <div class="setting <?php
                if($post->post_type=='post'){

                }else{
                    echo 'for-selected-default'; // -- only for default template
                }
                ?>">
                    <h4><?php echo esc_html__("Use Sidebar?",'antfarm');  ?></h4>
                    <?php echo '<div class="dzscheckbox skin-nova">
                                        '.DZSHelpers::generate_input_checkbox($lab,array('id' => $lab,'class' => 'mainsetting', 'val' => 'on','seekval' => $seekval)).'
                                        <label for="'.$lab.'"></label>
                                    </div>';
                    ?>

                    <p class="sidenote"></p>
                </div>
                <?php
            }








            $lab = 'qucreative_meta_is_fullscreen';

            $seekval = get_post_meta($post->ID, $lab, true);


            echo DZSHelpers::generate_input_text($lab,array('id' => $lab,'input_type' => 'hidden', 'val' => 'off', 'class' => 'fake-input'))

            ?>

            <!-- setting-meta-fullscreen-option -->
            <div class="setting type-all ">
                <h4><?php echo esc_html__("Is Fullscreen?",'antfarm');  ?></h4>
                <?php echo '<div class="dzscheckbox skin-nova">
'.DZSHelpers::generate_input_checkbox($lab,array('id' => $lab,'class' => 'mainsetting dzs-dependency-field', 'val' => 'on','seekval' => $seekval)).'
		<label for="'.$lab.'"></label>
</div>';
                ?>

                <p class="sidenote"></p>
            </div>






            <?php



            $lab = 'qucreative_meta_is_fullscreen_stretch';

            $arr_opts = array(
                array(
                    'label'=>esc_html__("Liquid",'antfarm'),
                    'value'=>'stretch',
                ),
                array(
                    'label'=>esc_html__("Fixed",'antfarm'),
                    'value'=>'contain',
                ),
            );
            ?>
            <div class="setting  type-all setting-fullscreen-strech-mode">
                <h4><?php echo esc_html__("Fullscreen Stretch Mode",'antfarm'); ?></h4>
                <?php echo DZSHelpers::generate_select($lab, array(
                    'class'=>'dzs-style-me skin-beige',
                    'options'=>$arr_opts,
                    'seekval'=>get_post_meta($post->ID, $lab, true),
                ))
                ?>

                <p class="sidenote"><?php echo ''; ?></p>
            </div>



            <?php
            $lab = 'qucreative_meta_bordered_design';

            $arr_opts = array(
                array(
                    'label'=>esc_html__("Leave as global",'antfarm'),
                    'value'=>'',
                ),
                array(
                    'label'=>esc_html__("Force on",'antfarm'),
                    'value'=>'on',
                ),
                array(
                    'label'=>esc_html__("Force off",'antfarm'),
                    'value'=>'off',
                ),
            );
            ?>
            <div class="setting  type-all">
                <h4><?php echo esc_html__("Bordered Design",'antfarm'); ?></h4>
                <?php echo DZSHelpers::generate_select($lab,
                    array(
                        'class'=>'dzs-style-me skin-beige dzs-dependency-field',
                        'options'=>$arr_opts,
                        'seekval'=>get_post_meta($post->ID, $lab, true),
                    )
                );
                ?>

                <p class="sidenote"><?php echo esc_html__("enable borders when content opacity overlay is set to 100%",'antfarm'); ?></p>
            </div>



            <?php
            $lab = 'qucreative_meta_content_starts_at';

            $arr_opts = array(
                array(
                    'label'=>esc_html__("Default",'antfarm'),
                    'value'=>'',
                ),
                array(
                    'label'=>esc_html__("Pixel position",'antfarm'),
                    'value'=>'pixel-position',
                ),
            );
            ?>
            <div class="setting  type-all">
                <h4><?php echo esc_html__("Content starts at",'antfarm'); ?></h4>
                <?php echo DZSHelpers::generate_select($lab,
                    array(
                        'class'=>'dzs-style-me skin-beige dzs-dependency-field',
                        'options'=>$arr_opts,
                        'seekval'=>get_post_meta($post->ID, $lab, true),
                    )
                );
                ?>

                <p class="sidenote"><?php echo ''; ?></p>
            </div>







            <?php




            $dependency = array(

                array(
                    'lab'=>'qucreative_meta_content_starts_at',
                    'val'=>array('pixel-position'),
                ),
            );




            $dependency = json_encode($dependency);

            $lab = 'qucreative_meta_content_starts_at_pixel';
            ?>
            <div class="setting type-all for-antfarm_port_items"  data-dependency='<?php echo $dependency; ?>'>
                <h4><?php echo esc_html__("Pixel Position",'antfarm'); ?></h4>
                <?php echo DZSHelpers::generate_input_text($lab, array(
                    'class'=>'',
                    'seekval'=>get_post_meta($post->ID, $lab, true),
                ))
                ?>
                <p class="sidenote"><?php echo esc_html__("set the pixel position",'antfarm'); ?></p>
            </div>










            <?php



            if(defined('RS_PLUGIN_FILE_PATH')) {


                global $wpdb;



                $opt_rev_sliders = array(array(
                                             'label'=>esc_html__("No Slider",'antfarm'),
                                             'value'=>"",
                                         ));




                $results = $wpdb->get_results( 'SELECT * FROM '.RevSliderGlobals::$table_sliders.' ' , OBJECT );


                foreach ($results as $revsld){


                    $aux = array(
                        'label'=>$revsld->title,
                        'value'=>$revsld->alias,
                    );
                    array_push($opt_rev_sliders, $aux);

                }
                $lab = 'qucreative_meta_rev_slider';

                $arr_opts = array(array('label' => esc_html__("Liquid",'antfarm'), 'value' => 'stretch',),
                                  array('label' => esc_html__("Fixed",'antfarm'), 'value' => 'contain',),);
                ?>
                <div class="setting  type-all setting-header-revolution-slider">
                    <h4><?php echo esc_html__("Header Revolution Slider",'antfarm'); ?></h4>
                    <?php echo DZSHelpers::generate_select($lab, array('class' => 'dzs-style-me skin-beige dzs-dependency-field', 'options' => $opt_rev_sliders, 'seekval' => get_post_meta($post->ID, $lab, true),))
                    ?>

                    <p class="sidenote"><?php echo ''; ?></p>
                </div>



                <?php



                $dependency = array(

                    array(
                        'lab'=>'qucreative_meta_rev_slider',
                        'val'=>array('anything_but_blank'),
                    ),
                );



                $arr_opts = array(
                    array(
                        'label'=>esc_html__("Window Height",'antfarm'),
                        'value'=>'window_height',
                    ),
                    array(
                        'label'=>esc_html__("Custom Height",'antfarm'),
                        'value'=>'custom_height',
                    ),
                );

                $dependency = json_encode($dependency);


                $lab = 'qucreative_meta_rev_slider_height_mode';
                ?>


                <div class="setting  type-all" data-dependency='<?php echo $dependency; ?>'>
                    <h4><?php echo esc_html__("Height Mode",'antfarm'); ?></h4>
                    <?php echo DZSHelpers::generate_select($lab, array('class' => 'dzs-style-me skin-beige dzs-dependency-field', 'options' => $arr_opts, 'seekval' => get_post_meta($post->ID, $lab, true),))
                    ?>

                    <p class="sidenote"><?php echo ''; ?></p>
                </div>



                <?php








                $lab = 'qucreative_meta_rev_slider_custom_height';
                $val = '';

                if(get_post_meta($post->ID, $lab, true)){
                    $val = get_post_meta($post->ID, $lab, true);
                }


                $dependency = array(

                    array(
                        'lab'=>'qucreative_meta_rev_slider_height_mode',
                        'val'=>array('custom_height'),
                    ),
                );



                $dependency = json_encode($dependency);


                ?>


                <div class="setting  type-all"  data-dependency='<?php echo $dependency; ?>'>
                    <h4><?php echo esc_html__("Custom Height",'antfarm'); ?></h4>
                    <?php echo DZSHelpers::generate_input_text($lab, array(
                        'class'=>'',
                        'seekval'=>$val,
                    ))

                    ?>

                    <p class="sidenote"><?php echo ''; ?></p>
                </div>
                <?php

            }

            $lab = 'qucreative_meta_disable_footer';

            $seekval = get_post_meta($post->ID, $lab, true);


            echo DZSHelpers::generate_input_text($lab,array('id' => $lab,'input_type' => 'hidden', 'val' => 'off'))

            ?>

            <div class="setting type-all ">
                <h4><?php echo esc_html__("Disable Footer",'antfarm');  ?>?</h4>
                <?php echo '<div class="dzscheckbox skin-nova">
'.DZSHelpers::generate_input_checkbox($lab,array('id' => $lab,'class' => 'mainsetting', 'val' => 'on','seekval' => $seekval)).'
		<label for="'.$lab.'"></label>
</div>';
                ?>

                <p class="sidenote"></p>
            </div>




            <?php



            $dependency = array(

                array(
                    'lab'=>'qucreative_meta_is_fullscreen',
                    'val'=>array('on'),
                ),
            );



            $dependency = json_encode($dependency);


            $lab = 'qucreative_meta_overlay_opacity';

            $seekval = get_post_meta($post->ID, $lab, true);

            ?>
            <div class="setting for-selected-template-portfolio" data-dependency='<?php echo $dependency; ?>' >

                <h4 class="label"><?php echo esc_html__("Overlay opacity",'antfarm'); ?></h4>
                <?php echo DZSHelpers::generate_input_text($lab, array('val' => '', 'class' => '', 'seekval' => $seekval)); ?>
                <div class="sidenote"><?php echo @sprintf(esc_html__('a value from %s to %s', 'antfarm'),0,100); ?></div>

            </div>




            <?php


            $lab = 'qucreative_meta_overlay_color';

            $seekval = get_post_meta($post->ID, $lab, true);

            ?>
            <div class="setting for-selected-template-portfolio" data-dependency='<?php echo $dependency; ?>'>

                <h4 class="label"><?php echo esc_html__("Overlay color",'antfarm'); ?></h4>
                <?php echo DZSHelpers::generate_input_text($lab, array('val' => '', 'class' => 'wp-color-picker-init ', 'seekval' => $seekval)); ?>
                <div class="sidenote"><?php echo ''; ?></div>
            </div>




            <?php


            $arr_opts = array(
                array(
                    'label'=>esc_html__("Default",'antfarm'),
                    'value'=>'',
                ),
                array(
                    'label'=>("1px"),
                    'value'=>'1px',
                ),
                array(
                    'label'=>("2px"),
                    'value'=>'2px',
                ),
                array(
                    'label'=>("3px"),
                    'value'=>'3px',
                ),
                array(
                    'label'=>("5px"),
                    'value'=>'5px',
                ),
                array(
                    'label'=>("10px"),
                    'value'=>'10px',
                ),
                array(
                    'label'=>("20px"),
                    'value'=>'20px',
                ),
                array(
                    'label'=>esc_html__("Theme Column Gap",'antfarm'),
                    'value'=>'theme-column-gap',
                ),
            );

            $lab = 'qucreative_meta_portfolio_bounds';

            $seekval = get_post_meta($post->ID, $lab, true);

            ?>
            <div class="setting for-selected-template-portfolio" data-dependency='<?php echo $dependency; ?>'>

                <h4 class="label"><?php echo esc_html__("Portfolio Bounds",'antfarm'); ?></h4>
                <?php
                echo DZSHelpers::generate_select($lab, array('class' => 'dzs-style-me skin-beige dzs-dependency-field', 'options' => $arr_opts, 'seekval' => $seekval,));

                ?>
                <div class="sidenote"><?php echo ''; ?></div>
            </div>






        </div>

        <?php
    }




    function handle_admin_meta_save($post_id) {

        global $qucreative_theme_data;

        if(defined("QUCREATIVE_VERSION")){


            return qucreative_handle_admin_meta_save($post_id);
        }

        global $post;
        if (!$post) {
            return;
        }
        if (isset($post->post_type)) {

        }
        /* -- Check autosave */
        $is_preview = false;
        if(isset($_POST['wp-preview']) && $_POST['wp-preview']=='dopreview'){


            $is_preview = true;

        }





        if (isset($_REQUEST['qucreative_meta_nonce'])) {
            $nonce = $_REQUEST['qucreative_meta_nonce'];
            if (!wp_verify_nonce($nonce,'qucreative_meta_nonce')){
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




                if (strpos($label,'qucreative_meta_') !== false) {
                    update_post_meta($post->ID,$label_to_save,$value);
                }

                if (strpos($label,'antfarm_meta_') !== false) {
                    DZSHelpers::wp_savemeta($post->ID,$label,$value);
                }
            }
        }




    }


    function handle_edit_form_after_title(){


        // -- before the wp editor


        global $post;



        if($post && $post->post_type=='antfarm_contact_form') {


	        global $dzspgb_templates;
            include_once "pagebuilder/class-dzspgb.php";


            $aux_revs = (wp_get_post_revisions($post->ID));


            if (count($aux_revs) == 0 && $post->post_content == '') {

                wp_enqueue_style('tabs.and.accordions', $this->base_url.'libs/tabsandaccordions/tabsandaccordions.css');
                wp_enqueue_script('tabs.and.accordions', $this->base_url.'libs/tabsandaccordions/tabsandaccordions.js');


                if(defined('QUCREATIVE_VERSION')){

                }




                ?>
                <h4 class="import-form-con--label" style="text-align: center"><?php echo esc_html__("Quick Start"); ?></h4>
                <div class="import-form-con">
                    <div class="import-form--head">

                        <div class="option option-blank  active">

                            <div class="the-icon">
                                <svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                     width="40px" height="40px" viewBox="0 0 129.688 132.627" enable-background="new 0 0 129.688 132.627"
                                     xml:space="preserve">
<g>
    <g>
        <g>
            <g>
                <path fill="#5A5B5D" d="M114.977,126.947H14.711c-5.79,0-10.5-4.71-10.5-10.5V16.181c0-5.79,4.71-10.5,10.5-10.5h78.533
					c0.663,0,1.299,0.263,1.768,0.732l29.732,29.733c0.469,0.469,0.732,1.104,0.732,1.768v78.533
					C125.477,122.237,120.767,126.947,114.977,126.947z M14.711,10.681c-3.033,0-5.5,2.467-5.5,5.5v100.267
					c0,3.032,2.467,5.5,5.5,5.5h100.266c3.033,0,5.5-2.468,5.5-5.5V38.95L92.209,10.681H14.711z"/>
            </g>
        </g>
        <g>
            <g>
                <path fill="#5A5B5D" d="M122.977,40.414h-21.732c-5.79,0-10.5-4.71-10.5-10.5V8.181c0-1.011,0.609-1.923,1.543-2.31
					c0.933-0.387,2.01-0.174,2.724,0.542l29.732,29.733c0.715,0.715,0.929,1.79,0.542,2.724
					C124.9,39.805,123.988,40.414,122.977,40.414z M95.745,14.216v15.698c0,3.033,2.467,5.5,5.5,5.5h15.697L95.745,14.216z"/>
            </g>
        </g>
    </g>
</g>
</svg>
                            </div>
                            <h4><?php echo esc_html__("BLANK FORM"); ?></h4>
                        </div>

                        <div class="option option-template">

                            <div class="the-icon">
                                <svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                     width="40px" height="40px" viewBox="0 0 129.688 132.627" enable-background="new 0 0 129.688 132.627"
                                     xml:space="preserve">
<g>
    <g>
        <g>
            <g>
                <path fill="#5A5B5D" d="M114.977,126.947H14.711c-5.79,0-10.5-4.71-10.5-10.5V16.181c0-5.79,4.71-10.5,10.5-10.5h78.533
					c0.663,0,1.299,0.263,1.768,0.732l29.732,29.733c0.469,0.469,0.732,1.104,0.732,1.768v78.533
					C125.477,122.237,120.767,126.947,114.977,126.947z M14.711,10.681c-3.033,0-5.5,2.467-5.5,5.5v100.267
					c0,3.032,2.467,5.5,5.5,5.5h100.266c3.033,0,5.5-2.468,5.5-5.5V38.95L92.209,10.681H14.711z"/>
            </g>
        </g>
        <g>
            <g>
                <path fill="#5A5B5D" d="M122.977,40.414h-21.732c-5.79,0-10.5-4.71-10.5-10.5V8.181c0-1.011,0.609-1.923,1.543-2.31
					c0.933-0.387,2.01-0.174,2.724,0.542l29.732,29.733c0.715,0.715,0.929,1.79,0.542,2.724
					C124.9,39.805,123.988,40.414,122.977,40.414z M95.745,14.216v15.698c0,3.033,2.467,5.5,5.5,5.5h15.697L95.745,14.216z"/>
            </g>
        </g>
    </g>
</g>
                                    <rect x="25.344" y="51.914" fill="#5A5B5D" width="79" height="6.586"/>
                                    <rect x="25.344" y="71.914" fill="#5A5B5D" width="79" height="6.586"/>
                                    <rect x="25.344" y="89.914" fill="#5A5B5D" width="79" height="6.586"/>
</svg>
                            </div>
                            <h4><?php echo esc_html__("TEMPLATE FORM"); ?></h4>
                        </div>
                    </div>

                    <div class="import-form--body animating">
                        <div class="option option-body-template"></div>

                        <div class="option option-body-template">
                            <div class="options-con">

                                <a class="template-option" onclick="document.getElementById('tabs-opts').api_goto_tab(0); return false;" href="#"><?php echo esc_html__("Basic Form"); ?></a>
<!--                                <a class="template-option" onclick="document.getElementById('tabs-opts').api_goto_tab(1); return false;" href="#">--><?php //echo esc_html__("Complex Form"); ?><!--</a>-->
                            </div>
                            <div class="tabs-con">
                                <div id="tabs-opts" class="antfarm-tabs dzs-tabs debug-target auto-init-from-q-admin skin-melbourne" data-options='{ "design_tabsposition" : "none"
,"design_transition": "slide"
,"design_tabswidth" : "default"
,"toggle_breakpoint" : "200"
,"settings_appendWholeContent":true
,"refresh_tab_height": "1000"
,"toggle_type": "accordion"}'
>

                                    <div class="dzs-tab-tobe">
                                        <div class="tab-menu with-tooltip">
                                            Fully Responsive
                                        </div>
                                        <div class="tab-content">
                                            <img class="fullwidth import-dzscfs-sample import-dzscfs-sample-1" src="//c1.staticflickr.com/8/7298/27606525992_c1291285d2_z.jpg"/>

                                        </div>
                                    </div>

                                    <div class="dzs-tab-tobe">
                                        <div class="tab-menu with-tooltip">
                                            Multiple Skins
                                        </div>
                                        <div class="tab-content">
                                            <img class="fullwidth import-dzscfs-sample import-dzsfcs-sample-2" src="//c1.staticflickr.com/8/7298/27606525992_c1291285d2_z.jpg"/>

                                        </div>
                                    </div>




                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <?php
            }
        }
    }

    function meta_contact_form(){
        global $post, $wp_version;
        ?>
        <div class="antfarm_meta-meta-bigcon con-type-receiver">

            <input type="hidden" name="antfarm_meta_nonce" value="<?php echo wp_create_nonce('antfarm_meta_nonce'); ?>"/>

            <?php
            $lab = 'antfarm_meta_input_style';

            $arr_opts = array(
                array(
                    'value'=>'style-cosco',
                    'label'=>esc_html__('Default Style'),
                ),
                array(
                    'value'=>'style-sharp',
                    'label'=>esc_html__('Sharp Style'),
                ),
            )

            ?>
            <div class="setting type-all">
                <h4><?php echo esc_html__("Forms Style"); ?></h4>
                <?php echo DZSHelpers::generate_select($lab, array(
                    'class'=>'dzs-style-me skin-beige',
                    'options'=>$arr_opts,
                    'seekval'=>get_post_meta($post->ID, $lab, true),
                ))
                ?>
                <p class="sidenote"><?php echo esc_html__("set a custom markup"); ?></p>
            </div>

            <?php



            ?>

            <?php
            $lab = 'antfarm_meta_custom_markup';
            ?>
            <div class="setting type-all">
                <h4><?php echo esc_html__("Custom Markup"); ?></h4>
                <?php echo DZSHelpers::generate_input_textarea($lab, array(
                    'class'=>'',
                    'seekval'=>get_post_meta($post->ID, $lab, true),
                ))
                ?>
                <p class="sidenote"><?php echo esc_html__("set a custom markup"); ?></p>
            </div>


        </div>

        <?php
    }

    public function handle_plugin_deactivate(){

        flush_rewrite_rules();

    }






    function register_links(){



        register_taxonomy(
            $this->name_port_item_cat,$this->name_port_item,array(
                'label' => esc_html__('Portfolio Categories','antfarm'),
                'query_var' => true,
                'show_ui' => true,
                'hierarchical' => true,
            )
        );

        $labels = array(
            'name' => esc_html__("Portfolio Items"),
            'singular_name' => esc_html__('Portfolio Item'),
        );


        $args = array(
            'labels' => $labels,
            'public' => true,
            'has_archive' => true,
            'hierarchical' => false,
            'supports' => array('title','editor','author','thumbnail','post-thumbnail','comments','excerpt','revisions', 'custom-fields'),
            'rewrite' => array('slug' => 'portfolio-item'),
            'yarpp_support' => true,

        );
        register_post_type($this->name_port_item,$args);








        $labels = array(
            'name' => esc_html__("Contact Grids"),
            'singular_name' => esc_html__('Contact Grid'),
        );






        $args = array(
            'labels' => $labels,
            'public' => true,
            'has_archive' => true,
            'hierarchical' => false,
            'show_in_nav_menus' => false,
            'supports' => array('title','editor','author','thumbnail','post-thumbnail','comments','excerpt','revisions'),
            'rewrite' => array('slug' => 'contact-form-grid'),
            'yarpp_support' => true,

        );
        register_post_type('antfarm_contact_form',$args);

        add_filter('user_can_richedit', array($this, 'disable_wyswyg_for_custom_post_type'));





        $labels = array(
            'name' => esc_html__("Portfolio Grids"),
            'singular_name' => esc_html__('Portfolio Grids'),
        );






        $args = array(
            'labels' => $labels,
            'public' => true,
            'has_archive' => true,
            'hierarchical' => false,
            'show_in_nav_menus' => false,
            'supports' => array('title','editor','author','thumbnail','post-thumbnail','comments','excerpt','revisions'),
            'rewrite' => array('slug' => 'zfolio-grid'),
            'yarpp_support' => true,

        );
        register_post_type('zfolio_grid',$args);


    }
    function disable_wyswyg_for_custom_post_type( $default ){
        global $post;
        if( $post && $post->post_type === 'antfarm_contact_form') return false;
        return $default;
    }


    function handle_init(){




        if(is_admin()){
            if (current_user_can('edit_posts') || current_user_can('edit_pages')) {


                wp_enqueue_script('jquery-ui-core');
                wp_enqueue_script('jquery-ui-sortable');
                wp_enqueue_script('jquery-ui-droppable');


                wp_enqueue_script('dzs.selector',$this->base_url.'libs/dzsselector/dzsselector.js',array('jquery'));
                wp_enqueue_style('dzs.selector',$this->base_url.'libs/dzsselector/dzsselector.css');

                wp_enqueue_script('qucreative-lightbox',$this->base_url.'assets/zoombox/zoombox.js');
                wp_enqueue_style('qucreative-lightbox',$this->base_url.'assets/zoombox/zoombox.css');

                wp_enqueue_style('fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css');
                wp_enqueue_style('faiconselector', $this->base_url . 'assets/dzsiconselector/dzsiconselector.css');
                wp_enqueue_script('faiconselector', $this->base_url . 'assets/dzsiconselector/dzsiconselector.js');


                wp_enqueue_script('antfarm.admin.global', $this->base_url . 'assets/admin/admin.js');
                wp_enqueue_style('antfarm.admin.global', $this->base_url . 'assets/admin/admin.css');



                wp_enqueue_script('toggle',$this->base_url.'assets/dzstoggle/dzstoggle.js');
                wp_enqueue_style('toggle',$this->base_url.'assets/dzstoggle/dzstoggle.css');



                if(isset($_GET['antfarm_shortcode_generator_button']) && $_GET['antfarm_shortcode_generator_button']=='on'){

                    wp_enqueue_style('remove_wp_dashboard_frames', $this->base_url . 'assets/admin/remove_wp_dashboard_frames.css');
                    wp_enqueue_style('antfarm-styles', $this->base_url . 'assets/antfarm_styles/antfarm_styles.css');
                    wp_enqueue_script('antfarm_sg', $this->base_url . 'assets/admin/shortcode_generator.js');

                }else{

                }


                if(isset($_GET['antfarm_shortcode_generator_divider']) && $_GET['antfarm_shortcode_generator_divider']=='on'){

                    wp_enqueue_style('remove_wp_dashboard_frames', $this->base_url . 'assets/admin/remove_wp_dashboard_frames.css');
                    wp_enqueue_style('antfarm-styles', $this->base_url . 'assets/antfarm_styles/antfarm_styles.css');
                    wp_enqueue_script('antfarm_sg', $this->base_url . 'assets/admin/shortcode_generator.js');


                }else{

                }

                if(defined("QUCREATIVE_THEME_URL")){

                    wp_enqueue_style('et_font', QUCREATIVE_THEME_URL . 'libs/qucreative/include_et.css');
                }
            }









        }else{


            if(defined('QUCREATIVE_THEME_URL')){

            }else{

	            wp_enqueue_script('antfarm_styles_not_qu', $this->base_url . 'assets/antfarm_styles_not_qu/antfarm_styles_not_qu.js',array('jquery'));


	            wp_enqueue_style('antfarm_styles_not_qu', $this->base_url . 'assets/antfarm_styles_not_qu/antfarm_styles_not_qu.css');
            }


        }

        $this->register_links();




        if(function_exists('vc_add_shortcode_param')){

            vc_add_shortcode_param('antfarm_add_media', array($this,'vc_antfarm_add_media') );
            vc_add_shortcode_param('antfarm_add_media_att', array($this,'vc_antfarm_add_media_att') );
            vc_add_shortcode_param('dzsqcr_faiconselector', 'vc_dzsqcr_faiconselector' );
            vc_add_shortcode_param('antfarm_multiple_checkbox', 'vc_antfarm_multiple_checkbox' );
            vc_add_shortcode_param('antfarm_icon_selector', 'vc_antfarm_icon_selector' );
            vc_add_shortcode_param('antfarm_layout_chooser', 'vc_antfarm_layout_chooser' );
            vc_add_shortcode_param('antfarm_button_customizer', 'vc_antfarm_button_customizer' );


        }
        include_once($this->base_path.'vc/part-vcintegration.php');
        include_once($this->base_path.'vc/part-vcintegration-secondary.php');


        // -- adding actions
        add_action( 'vc_frontend_editor_render', array($this,'vc_enqueue_editor_scripts_befe') );





	    if(defined('QUCREATIVE_THEME_URL')) {
		    add_action( 'qucreative_social_place', array( $this, 'handle_qucreative_social_place' ) );
	    }else{
	        add_filter('the_content', array( $this, 'filter_the_content_for_social' ),99);
        }


    }

    function filter_the_content_for_social($cont){


        global $post;
        if($post && $post->post_type=='post'){

            $fout = '';

            $fout.='<div class="social-con">';

	        $qucreative_theme_data['theme_mods'] = get_option('theme_mods_qucreative');

	        $lab = 'social_enable_facebook_share';
	        if(isset($qucreative_theme_data['theme_mods'][$lab]) && $qucreative_theme_data['theme_mods'][$lab]=='1'){
		        $fout.= '<a class="social-icon custom-a" href="#"  onclick=\'window.qcre_open_social_link("http://www.facebook.com/sharer.php?u={{replaceurl}}"); return false;\'><i class="fa fa-facebook-square"></i><span class="the-tooltip">'.esc_html__("SHARE ON FACEBOOK",'antfarm').'</span></a>';
	        }

	        $lab = 'social_enable_twitter_share';

	        if(isset($qucreative_theme_data['theme_mods'][$lab]) && $qucreative_theme_data['theme_mods'][$lab]=='1'){
		        $fout.= '<a class="social-icon custom-a" href="#" onclick=\'window.qcre_open_social_link("http://twitter.com/share?url={{replaceurl}}&amp;text=Check this out!&amp;via=campaignmonitor&amp;related=yarrcat"); return false;\'><i class="fa fa-twitter"></i><span class="the-tooltip">'.esc_html__("SHARE ON TWITTER",'antfarm').'</span></a>';
	        }

	        $lab = 'social_enable_gplus_share';

	        if(isset($qucreative_theme_data['theme_mods'][$lab]) && $qucreative_theme_data['theme_mods'][$lab]=='1'){
		        $fout.= '<a class="social-icon custom-a" href="#" onclick=\'window.qcre_open_social_link("https://plus.google.com/share?url={{replaceurl}}"); return false; \'><i class="fa fa-google-plus-square"></i><span class="the-tooltip">'.esc_html__("SHARE ON GOOGLE PLUS",'antfarm').'</span></a>';
	        }

	        $lab = 'social_enable_linkedin_share';

	        if(isset($qucreative_theme_data['theme_mods'][$lab]) && $qucreative_theme_data['theme_mods'][$lab]=='1'){
		        $fout.= '<a class="social-icon custom-a" href="#" onclick=\'window.qcre_open_social_link("https://www.linkedin.com/shareArticle?mini=true&url=mysite&title=Check%20this%20out%20{{replaceurl}}&summary=&source={{replaceurl}}"); return false; \'><i class="fa fa-linkedin"></i><span class="the-tooltip">'.esc_html__("SHARE ON LINKEDIN",'antfarm').'</span></a>';
	        }

	        $lab = 'social_enable_pinterest_share';

	        if(isset($qucreative_theme_data['theme_mods'][$lab]) && $qucreative_theme_data['theme_mods'][$lab]=='1'){
		        $fout.= '<a class="social-icon custom-a" href="#" onclick=\'window.qcre_open_social_link("http://pinterest.com/pin/create/button/?url={{replaceurl}}&amp;text=Check this out!&amp;via=campaignmonitor&amp;related=yarrcat"); return false;\'><i class="fa fa-pinterest"></i><span class="the-tooltip">'.esc_html__("SHARE ON PINTEREST",'antfarm').'</span></a>';
	        }

	        $fout.='</div>';


	        return $cont.$fout;
        }else{
            return $cont;
        }
    }

    function handle_qucreative_social_place(){
	    $social_shares = qucreative_get_social_shares();



	    if($social_shares){

		    ?><div class="social-con"><?php echo $social_shares; ?></div><?php
        }
    }

    function handle_init_end(){

        if(is_admin()){

            include_once('assets/admin/dzs_term_reorder.php');

            $dzs_term_reorder = new Dzs_Term_Reorder(array('post',$this->name_port_item), array($this->name_port_item=>array(
                $this->name_port_item_cat
            )),array($this->name_port_item_cat), $this->base_url.'assets/admin/');
        }
    }


    function handle_wp_head(){



        if ($this->db_mainoptions['extra_css']) {
            echo '<style class="style-from-qucre">';
            echo $this->db_mainoptions['extra_css'];
            echo '</style>';
        }

        global $post;

        if($post && $post->post_type=='antfarm_contact_form'){
        }
        wp_enqueue_style('antfarm-styles',$this->base_url.'assets/antfarm_styles/antfarm_styles.css');
    }
    function handle_admin_init(){



        global $dzspgb_templates;

        $post = null;


        if(isset($_GET['post']) && $_GET['post']) {
            $post = get_post($_GET['post']);
        }








        if($post && $post->post_type=='antfarm_contact_form'){

	        $base_url = $this->base_url;
            wp_enqueue_script('jquery');
	        wp_enqueue_script( 'tinymce_js', includes_url( 'js/tinymce/' ) . 'wp-tinymce.php', array( 'jquery' ), false, true );;

//            echo 'whaaa';

	        wp_enqueue_style('tabs.and.accordions', $base_url.'libs/tabsandaccordions/tabsandaccordions.css');
	        wp_enqueue_script('tabs.and.accordions', $base_url.'libs/tabsandaccordions/tabsandaccordions.js');
        }





        if( ($post && $post->post_type=='antfarm_contact_form') || (isset($_GET['action']) && $_GET['action']==='dzspgb_print_templates')  ){

        }


        wp_enqueue_style('antfarm-styles',$this->base_url.'assets/antfarm_styles/antfarm_styles.css');


        if(isset($_GET['action']) && $_GET['action']==='dzspgb_print_templates'){





            $fout = '';



            $fout .= 'var dzspgb_templates = {';


            $ij =0 ;

            foreach($dzspgb_templates as $temp){
                if($ij>0){
                    $fout.=',';
                }

                $fout.= $temp['id'];

                $fout.=':';

                $fout.='"';


                $aux = call_user_func($temp['admin_str_function'],array(
                    'txt_choose'=>esc_html__('Edit'),
                    'type_pb'=>"Row",
                ));


                $lb = array("\r\n","\n","\r");
                $aux = str_replace($lb,'',$aux);

                $aux = str_replace('"',"'q'",$aux);

                $fout.=$aux;

                $fout.='"';

                $ij++;

            }

            $fout .= '}';


            echo $fout;


            die();
        }


    }

    function handle_admin_head(){




        global $post;



        echo '<script>window.antfarm_settings = { base_url: "'.$this->base_url.'",version: "'.ANTFARM_VERSION.'",site_url : "'.site_url().'",translate_add_shortcode_button: "'.esc_html__("Add Button").'",translate_add_shortcode_divider: "'.esc_html__("Add Divider").'",translate_background_image: "'.esc_html__("Background Image").'"';


        if($post){
            echo ',post_type:"'.$post->post_type.'"';
        }

        echo ',shortcode_generator_button_url: "'.admin_url('admin.php?page='.$this->adminpagename_mainoptions) . '&antfarm_shortcode_generator_button=on'.'"';
        echo ',shortcode_generator_divider_url: "'.admin_url('admin.php?page='.$this->adminpagename_mainoptions) . '&antfarm_shortcode_generator_divider=on'.'"';


        echo ',shortcode_showcase_generator_url: "'.admin_url('admin.php?page='.$this->adminpagename_mainoptions) . '&antfarm_shortcode_showcase_builder=on'.'"};';
        echo '  </script>';







        if($post && $post->post_type=='antfarm_contact_form'){
            global $dzspgb_templates;


            include_once "pagebuilder/class-dzspgb.php";








            $dzspgb_forportal = new DZS_PageBuilder(array(
                'connect_to_db' => false,
                'is_wp'=>true,
            ));









            $struct_dzspgb_section = str_replace(array("\r","\r\n","\n"),'',$dzspgb_forportal->generate_admin_section_part1(array()).$dzspgb_forportal->generate_admin_section_part2(array()));

            $args = array();


            $struct_dzspgb_container = str_replace(array("\r","\r\n","\n"),'',$dzspgb_forportal->generate_admin_container_part1($args).$dzspgb_forportal->generate_admin_container_part2($args));

            $struct_dzspgb_row = str_replace(array("\r","\r\n","\n"),'',$dzspgb_forportal->generate_admin_row_part1(array()).$dzspgb_forportal->generate_admin_row_part2(array()));
            $struct_dzspgb_row = str_replace(array("'"),"\\'",$struct_dzspgb_row);

            $struct_dzspgb_row_empty = str_replace(array("\r","\r\n","\n"),'',$dzspgb_forportal->generate_admin_row_part1(array('empty' => false )).$dzspgb_forportal->generate_admin_row_part2(array()));
            $struct_dzspgb_row_part = str_replace(array("\r","\r\n","\n"),'',$dzspgb_forportal->generate_admin_row_part_part1(array()).$dzspgb_forportal->generate_admin_row_part_part2(array()));
            $struct_dzspgb_row_part = str_replace(array("'"),"\\'",$struct_dzspgb_row_part);
            $struct_dzspgb_row_part_nonactive = str_replace(array("\r","\r\n","\n"),'',$dzspgb_forportal->generate_admin_row_part_part1(array('part'=>'nonactive')).$dzspgb_forportal->generate_admin_row_part_part2(array('part'=>'nonactive')));
            $struct_dzspgb_row_part_nonactive = str_replace(array("'"),"\\'",$struct_dzspgb_row_part_nonactive);



            ?>
            <script>
                var dzspgb_settings={
                    is_admin: 'on'
                    , struct_row: '<?php echo $struct_dzspgb_row; ?>' // -- this is from appending PLUS
                    , struct_row_empty: '<?php echo $struct_dzspgb_row_empty; ?>' // -- this is for appending from the form
                    , struct_row_part: '<?php echo $struct_dzspgb_row_part; ?>'
                    , struct_row_part_nonactive: '<?php echo $struct_dzspgb_row_part_nonactive; ?>'
                }</script><?php








            wp_enqueue_script('dzspgb', $this->base_url . 'pagebuilder/pagebuilder.js',array('jquery'));
            wp_enqueue_style('dzspgb', $this->base_url . 'pagebuilder/pagebuilder.css');

            wp_enqueue_script('antfarm_tooltip', $this->base_url . 'libs/dzstooltip/dzstooltip.js',array('jquery'));
            wp_enqueue_style('antfarm_tooltip', $this->base_url . 'libs/dzstooltip/dzstooltip.css');

            wp_enqueue_script('jquery-ui-core');
            wp_enqueue_script('jquery-ui-slider', array('jquery', 'jquery-ui-core'));
            wp_enqueue_style('jquery-ui-base', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css');
            wp_enqueue_script('dzspgb_print_templates', admin_url('?action=dzspgb_print_templates'));



        }
        if($post && $post->post_type=='zfolio_grid'){



            wp_enqueue_script('gridbuilder', $this->base_url . 'libs/gridbuilder/gridbuilder.js');
            wp_enqueue_style('gridbuilder', $this->base_url . 'libs/gridbuilder/gridbuilder.css');
            wp_enqueue_script('dzsselector', $this->base_url . 'libs/dzsselector/dzsselector.js');
            wp_enqueue_style('dzsselector', $this->base_url . 'libs/dzsselector/dzsselector.css');




        }


        if($post){

            wp_enqueue_script('isotope', $this->base_url . 'libs/isotope/isotope.js');
        }




    }

    function handle_admin_menu(){



        $admin_cap = $this->capability_admin;
        $antfarm_page = add_menu_page('Qu '.esc_html__('Elements','antfarm'),'Qu '.esc_html__('Elements','antfarm'),$admin_cap,$this->adminpagename_mainoptions,array($this,'admin_page_mainoptions'),'div');
    }



    function handle_admin_footer(){


        global $post,$pagenow;






        if($post && $post->post_type=='zfolio_grid' && ( isset($_GET['post']) || $pagenow=='post-new.php' ) ){




        ?>


        <br>
        <br>
        <div id="grid0" class="dzs-grid-builder">

            <div class="layout-choosers">
                <button data-cols="2" class="dzs-button dzs-layout-btn padding-small"><span class="the-bg"></span><span class="the-text"><?php echo esc_html__("Two"); ?> <?php echo esc_html__("Column"); ?></span></button>
                <button data-cols="3" class="dzs-button dzs-layout-btn padding-small"><span class="the-bg"></span><span class="the-text"><?php echo esc_html__("Three"); ?> <?php echo esc_html__("Column"); ?></span></button>
                <button data-cols="4" class="dzs-button dzs-layout-btn padding-small"><span class="the-bg"></span><span class="the-text"><?php echo esc_html__("Four"); ?> <?php echo esc_html__("Column"); ?></span></button>
                <button data-cols="5" class="dzs-button dzs-layout-btn padding-small active"><span class="the-bg"></span><span class="the-text"><?php echo esc_html__("Five"); ?> <?php echo esc_html__("Column"); ?></span></button>

            </div>

            <div class="dummy-items">
                <div class="grid-sizer"></div>



            </div>

            <button class="button-secondary grid-add-item"><?php echo esc_html__("Add Item"); ?></button>


            <h5><?php echo esc_html__("Loop"); ?>?</h5>
            <select class="dzs-style-me opener-listbuttons skin-nova " name="grid_loop">
                <option value="off"></option>
                <option value="on"></option>
            </select>
            <ul class="dzs-style-me-feeder">
                <li ><span class="">Off</span></li>
                <li ><span class="">On</span></li>
            </ul>
        </div>

        <?php

        }



    }







    function handle_plugins_loaded(){
        if (isset($_GET['action']) && $_GET['action'] == 'antfarm_contact_form') {



            parse_str($_POST['postdata'], $output_arr);



            $po= get_post($output_arr['layout']);








            $field_label = '';
            $field_name = '';
            $field_val = '';



            $msg_template = '<strong>{{name_label}}</strong>: {{name_value}}<br>
{{extra_fields}}<br><br>
{{message_value}}';

	        error_log('output_arr - '.print_r($output_arr,true)) ;


            foreach ($output_arr as $lab => $it){



                $val = $it;
                $field_label = $lab;
                $field_name = $lab;
                $field_val = $val;



                if($lab === 'layout'||$lab === 'email_target'){

                    continue;
                }



                preg_match_all("/\[dzspgb_element[^dzs]*?input_name=\"".$lab."\".*?\]/", $po->post_content, $output_array2);



                if($output_array2){
                    if(is_array($output_array2[0]) && count($output_array2[0])){
                        $temp = $output_array2[0][0];


                        preg_match_all("/input_label_name=\"(.*?)\"/", $temp, $output_array);


                        if(isset($output_array[1]) && isset($output_array[1][0])){
                            $field_label = $output_array[1][0];
                        }


                    }
                }


                $field_label = str_replace('...','',$field_label);

                $countl = 0;
                $countv = 0;

                $msg_template = str_replace('{{'.$field_name.'_label}}', $field_label, $msg_template,$countl);
                $msg_template = str_replace('{{'.$field_name.'_value}}', $field_val, $msg_template,$countv);




                if($countl==0 && $countv==0 && $field_name!='subject'){
	                error_log( 'this was not found -> field_name -> '.$field_name. ' field_val -> '.$field_val);
                    $msg_template = str_replace('{{extra_fields}}', '<strong>'.$field_label.'</strong>: '.$field_val.'<br>{{extra_fields}}', $msg_template);
                }




                error_log($field_label.'  /  '.$field_name.' : '.$val. ' |||| ') ;
            }


            $msg_template = str_replace('{{extra_fields}}', '', $msg_template);

	        error_log('
            
            '.$msg_template) ;



	        $to = '{{admin}}';
	        $from = $output_arr['email'];
	        $subject = $output_arr['subject'];
	        $body = $msg_template;

	        $headers  = 'MIME-Version: 1.0' . "\r\n";
	        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	        $headers.= 'From: '. $from . "\r\n" .
	                   'Reply-To: '. $from  . "\r\n" .
	                   'X-Mailer: PHP/' . phpversion();

	        wp_mail( $to, $subject, $body, $headers );

//            $this->mail(array(
//
//                'sender'=>$output_arr['email'],
//                'target'=>'{{admin}}',
//                'message'=>$msg_template,
//                'subject'=>$output_arr['subject'],
//            ));

            error_log('mail sent');




            die();


        }

    }


    function check_posts() {

        // --- check posts
        if (isset($_GET['antfarm_shortcode_generator_button']) && $_GET['antfarm_shortcode_generator_button'] == 'on') {


            include_once($this->base_path . 'assets/admin/shortcode_generator_button/generator.php');
            define('DONOTCACHEPAGE', true);
            define('DONOTMINIFY', true);

        }
        if (isset($_GET['antfarm_shortcode_generator_divider']) && $_GET['antfarm_shortcode_generator_divider'] == 'on') {


            include_once($this->base_path . 'assets/admin/shortcode_generator_divider/generator.php');
            define('DONOTCACHEPAGE', true);
            define('DONOTMINIFY', true);


            wp_enqueue_style('wp-color-picker');
            wp_enqueue_script('wp-color-picker');

        }
    }

    function admin_page_mainoptions() {



        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_script( 'wp-color-picker' );

        if (isset($_GET['antfarm_shortcode_generator_button']) && $_GET['antfarm_shortcode_generator_button'] == 'on') {
            antfarm_shortcode_generator_button();
        }else {


            if (isset($_GET['antfarm_shortcode_generator_divider']) && $_GET['antfarm_shortcode_generator_divider'] == 'on') {
                antfarm_shortcode_generator_divider();
            } else {




                ?>

                <div class="wrap wrap-for-antfarm-mo">
                    <h2><?php echo esc_html__('Elements Main Settings', 'antfarm'); ?></h2>
                    <br/>

                    <form class="mainsettings">


                        <?php
                        do_action('antfarm_mainoptions_before_tabs');
                        ?>


                        <div class="setting">
                            <?php $lab = 'extra_css'; ?>
                            <h4 class="label"><?php echo esc_html__('Extra CSS', 'antfarm'); ?></h4>
                            <?php echo DZSHelpers::generate_input_textarea($lab, array('val' => '', 'seekval' => $this->db_mainoptions[$lab])); ?>

                        </div>





                        <?php


                        do_action('antfarm_mainoptions_extra');
                        ?>
                        <br/>
                        <a href='#'
                           class="button-primary antfarm-mo-save-mainoptions"><?php echo esc_html__('Save Options', 'antfarm'); ?></a>
                    </form>
                    <br/>

                    <div class="feedbacker" style=""><img alt="" style="" id="save-ajax-loading2"
                                                          src="<?php echo site_url(); ?>/wp-admin/images/wpspin_light.gif"/>
                    </div>
                </div>
                <div class="clear"></div><br/>
                <?php
            }
        }
    }




    function vc_antfarm_add_media($settings, $value) {

        $dependency = '';
        return '<div class="setting setting-medium setting-three-floats">
<div class="preview-media-con-left"></div>
<div class="change-media-con">
    <button class="button-secondary antfarm-btn-add-media"><i class="fa fa-plus-square-o"></i> '.esc_html__("Add Media").'</button>
</div>
<div class="setting-input type-input overflow-it">
<input style="" name="'.$settings['param_name']
            .'" class="wpb_vc_param_value wpb-textinput setting-field antfarm-preview-changer '
            .$settings['param_name'].' '.$settings['type'].'_field" type="text" value="'
            .$value.'" ' . $dependency . '/>
</div>
<div class="clear"></div>
</div>';
    }


    function vc_antfarm_add_media_att($settings, $value) {

        $dependency = '';

        $settings = array_merge(array(
            'library_type'=>'',
            'param_name'=>'',
            'type'=>'',
            'class'=>'',
        ), $settings);




        $fout = '<div class="setting setting-medium setting-three-floats">';


        if(strpos($settings['class'],'try-preview')!==false){
            $fout.='<div class="preview-media-con-left"></div>';
        }


        $fout.='<div class="change-media-con">';




        if(strpos($settings['class'],'with-only-colorpicker')===false) {
            $fout .= '
    <span class="button button-secondary antfarm-btn-add-media-att';


            if (strpos($settings['class'], 'button-setting-input-url') !== false) {
                $fout .= ' button-setting-input-url';
            }

            $fout .= '" data-library_type="' . $settings['library_type'] . '"><i class="fa fa-plus-square-o"></i> ' . esc_html__("Add Media") . '</span>';
        }

        $fout.='
</div>';


        if(strpos($settings['class'],'with-colorpicker')!==false){
            $fout.='<div class="colorpicker-con">';
            $fout.='<i class="divimage color-spectrum"></i>';
            $fout.='<div class="colorpicker--inner">';

            $fout.='<div class="farb"></div>';
            $fout.='</div>';


            $fout.='</div>';
        }

        $fout.='<div class="setting-input type-input overflow-it">
<input style="" name="'.$settings['param_name']
            .'" class="wpb_vc_param_value wpb-textinput setting-field antfarm-preview-changer '
            .$settings['param_name'].' '.$settings['type'].'_field" type="text" value="'
            .$value.'" ' . $dependency . '/>
</div>
<div class="clear"></div>
</div>';

        return $fout;
    }

    function post_get_attachment_url(){


        $bg_url = wp_get_attachment_image_src($_POST['postdata'], 'full');





        echo $bg_url[0];


        die();
    }

    function post_tabs_sort(){

        print_r($_POST);

        $order_arr = json_decode(stripslashes($_POST['tabs_items_id']));

        echo '
        
        
        ';
        print_r($order_arr);








        $po = get_post($_POST['post_id']);
        $cont = $po->post_content;




        echo '
                        
                        initial string -> '.$cont.'<--
                        
                        
                        ';



        preg_match_all("/\[antfarm_tta_tabs.*?".$_POST['tabs_id'].".*?\[\/antfarm_tta_tabs\]/s", $cont, $output_array);


        print_r($output_array);
        $input_line = '';
        if(is_array($output_array[0]) && count($output_array[0])){
            $input_line = $output_array[0][0];
        }

        $input_line = str_replace('[vc_tta_section', "\n[vc_tta_section", $input_line);



        if($input_line){
            $mem_string = '';

            echo 'input line here - '.$input_line. '|||| <- end input line';

            foreach ($order_arr as $order_it){
                preg_match("/\[vc_tta_section.*?".$order_it.".*?\[\/vc_tta_section\]/m", $input_line, $output_array2);



                echo ' |||
                '.''.'
                
                '.$order_it.' 
                ';

                $input_line2 = '';


                if(is_array($output_array2) && count($output_array2)){
                    $input_line2 = $output_array2[0];

                    echo $input_line2;

                    if($input_line2){
                        $input_line = str_replace($input_line2, '', $input_line);

                        $mem_string.=$input_line2;


                        echo '
                        
                        new string -> '.$input_line.'<--
                        
                        
                        ';
                    }
                }


            }


            $input_line = str_replace('[/antfarm_tta_tabs]',$mem_string.'[/antfarm_tta_tabs]',$input_line);

            echo '
                        
                        final string -> '.$input_line.'<--
                        
                        
                        ';


            $cont = preg_replace("/\[antfarm_tta_tabs.*?".$_POST['tabs_id'].".*?\[\/antfarm_tta_tabs\]/s", $input_line, $cont);





            echo '
                        
                        final final string -> '.$cont.'<--
                        
                        
                        ';


            $my_post = array(
                'ID'           => $_POST['post_id'],
                'post_content' => $cont,
            );


            wp_update_post( $my_post );

        }






        die();
    }


    function vc_enqueue_editor_scripts_befe(){


        wp_enqueue_style( 'antfarm-video-player', $this->base_url . 'libs/videogallery/vplayer.css');
        wp_enqueue_script( 'antfarm-video-player', $this->base_url . 'libs/videogallery/vplayer.js');





        if(defined('QUCREATIVE_THEME_URL')){

            wp_enqueue_script('audio.player', QUCREATIVE_THEME_URL . 'libs/audioplayer/audioplayer.js');
            wp_enqueue_style('audio.player', QUCREATIVE_THEME_URL . 'libs/audioplayer/audioplayer.css');
        }
    }


    function icon_box_generate_feature_icon($margs){


        $fout = '';

        if( ($margs['feature']=='et' && $margs['eticon']) || ($margs['feature']=='fa' && $margs['faicon']) || $margs['feature']=='image' ){


        $fout.='<div class="feature-icon icon-con" style="';


        if($margs['icon_color']){
            $fout.=' color: '.$margs['icon_color'].';';
        }

        $fout.='">';





        if($margs['feature']=='et'){
            $fout.='
                                    <div class="real-icon '.$margs['eticon'].'"';



            if($margs['et_icon_font_size']!='default'){
                $fout.=' style="font-size:'.$margs['et_icon_font_size'].'px"';
            }

            $fout.='>
</div>';
        }

        if($margs['feature']=='fa'){
            $fout.='<div class="">
    <i class="real-icon fa fa-'.$margs['faicon'].'" ';

            if($margs['et_icon_font_size']!='default'){
                $fout.=' style="font-size:'.$margs['et_icon_font_size'].'px"';
            }

            $fout.='></i>
</div>';


        }

        if($margs['style']=='style-1-with-img' || $margs['feature']=='image'){



            $bg_url = $this->sanitize_id_to_src($margs['media']);

            $fout.='<div class="">
    <img class="real-icon bullet--image" src="'.$bg_url.'">
</div>';


        }



            $fout.='</div>';
        }



        return $fout;
    }


    function icon_box_generate_read_more_con($margs){


        $fout = '';


        $margs = array_merge(array(
                'button_padding'=>'',
                'button_style'=>'',
                'read_more_link'=>'',
                'read_more'=>'',
                'link_target'=>'',
        ),$margs);




        if(isset($margs['style']) && $margs['style']){
            $margs['button_style']=$margs['style'];
        }
        if(isset($margs['padding']) && $margs['padding']){
            $margs['button_padding']=$margs['padding'];
        }
        if(isset($margs['rounded']) && $margs['rounded']){
            $margs['button_rounded']=$margs['rounded'];
        }




        if($margs['button_style']=='' || $margs['button_style']==' '){
            $margs['button_style'] = 'style-default';
        }





        $btn_rounded = '';

        if(isset($margs['button_rounded']) && ($margs['button_rounded']=='on' || $margs['button_rounded']=='rounded') ) {
            $btn_rounded = ' rounded';
        }

        if($margs['read_more']){



            $heading_class = 'h6';

            if(isset($margs['button_padding']) && $margs['button_padding']=='padding-small'){
                $heading_class = 'h-group-1';
            }

            $fout.='<div class="read-more-con">  <a href="'.$margs['read_more_link'].'" class="antfarm-btn btn-read-more custom-color custom-a '.$margs['button_padding'].' '.$margs['button_style'].' '.$btn_rounded.' '.$heading_class.'" ';

            if($margs['link_target']){
                $fout.=' target="'.$margs['link_target'].'"';
            }

            $fout.='>'.$margs['read_more'].'</a>  </div>';
        }



                return $fout;
    }

    function shortcode_icon_box($atts=array(), $content = ''){
        // -- [icon_box]
        $fout = '';


        $margs = array(

            'style'=>'style-1',
            'eticon'=>'',
            'faicon'=>'',
            'aligment'=>'',
            'icon_color'=>'',
            'icon_aligment'=>'',
            'feature'=>'fa',
            'et_icon_font_size'=>'default',
            'text_aligment'=>'align-center',
            'media'=>'',
            'heading'=>'h6',
            'icon_theme'=>' ',
            'title'=>'Title',
            'read_more_link'=>'#',
            'button_rounded'=>' ',
            'button_padding'=>' ',
            'button_style'=>'{"style":"style-default","padding":"","rounded":"rounded"}',

            'read_more'=>'',
        );


        if (!isset($atts) || $atts == false) {
            $atts = array();
        }

        $margs = array_merge($margs, $atts);


        $margs['feature']=str_replace('feature-type-','',$margs['feature']);




        $h_wrap_start = '<'.$margs['heading'].' class="the-variable-heading">';
        $h_wrap_end = '</'.$margs['heading'].'>';

        if($margs['heading']=='h-group-1'||$margs['heading']=='h-group-2'){

            $h_wrap_start = '<h3 class="the-variable-heading '.$margs['heading'].'">';
            $h_wrap_end = '</h3>';
        }



        $fout = '';










        $content = do_shortcode($content);
        $content = preg_replace("/^<\/p>/", "", $content);;
        $content = preg_replace("/<p>$/", "", $content);;;

        if($margs['style']=='style-1' || $margs['style']=='style-1-with-img'){
            $fout.='<div class="antfarm-icon-box bullet-feature bullet-feature-'.$margs['style'].' feature-icon-'.$margs['feature'].' '.$margs['text_aligment'];

            if($margs['feature']=='fa' ){

                if($margs['faicon']){
                    $fout.=' has-icon';
                }
            }
            if( $margs['feature']=='et'){

                if($margs['eticon']){
                    $fout.=' has-icon';
                }
            }

            $fout.='">
                                ';


            $fout.=$this->icon_box_generate_feature_icon($margs);

                                $fout.='
                                <div class="feature-content">
                                    '.$h_wrap_start.$margs['title'].$h_wrap_end.'
                                    <hr class="qucreative-hr-small">
                                    <div class="paragraph-text">'.$content.'</div>
                                    ';






            $button_style_arr = $this->parse_button_style($margs['button_style']);





            $args = array_merge($margs, $button_style_arr);


            $args['read_more_link']=$margs['read_more_link'];
            $args['button_padding']='';



            $fout.=$this->icon_box_generate_read_more_con($args);

                                $fout.='
                                    
                                </div>
                                
                            </div>';
        }


        if($margs['style']=='style-2'){
            $fout.='<div class="antfarm-icon-box  bullet-feature  bullet-feature-red  bullet-feature-'.$margs['style'].' feature-icon-'.$margs['feature'].'">

                                ';



            $fout.=$this->icon_box_generate_feature_icon($margs);

                                $fout.='<div class="feature-content">
                                    '.$h_wrap_start.$margs['title'].$h_wrap_end.'
                                    <hr class="qucreative-hr-small">
                                    <div class="paragraph-text">'.$content.'</div>
                                    ';



            $button_style_arr = $this->parse_button_style($margs['button_style']);



            $args = array_merge($margs, $button_style_arr);


            $args['read_more_link']=$margs['read_more_link'];
            $args['button_padding']='';



            $fout.=$this->icon_box_generate_read_more_con($args);



                                $fout.='
                                </div>

                            </div>';
        }
        if($margs['style']=='style-3'){
            $fout.='<div class="antfarm-icon-box bullet-feature style-3 '.$margs['icon_aligment'].'  bullet-feature-'.$margs['style'].' feature-icon-'.$margs['feature'].' '.''.'">
 ';


            $fout.=$this->icon_box_generate_feature_icon($margs);

                                $fout.='<div class="feature-content">
                                    '.$h_wrap_start.$margs['title'].$h_wrap_end.'
        <hr class="qucreative-hr-small">
    <div class="clear"></div>
        <div class="clear"></div>
        <div class="paragraph-text">'.$content.'</div>';


            $button_style_arr = $this->parse_button_style($margs['button_style']);

            $args = array_merge($margs, $button_style_arr);


            $args['read_more_link']=$margs['read_more_link'];
            $args['button_padding']='';



            $fout.=$this->icon_box_generate_read_more_con($args);

                                $fout.='
    </div>
</div>';
        }
        if($margs['style']=='style-4'){
            $fout.='<div class= "antfarm-icon-box bullet-feature bullet-feature-form '.$margs['icon_aligment'].'  bullet-feature-'.$margs['style'].' feature-icon-'.$margs['feature'].' '.''.'';


            $fout.=' '.$margs['form'];
            $fout.=' '.$margs['icon_theme'];


            $fout.='">
 ';


            $fout.=$this->icon_box_generate_feature_icon($margs);

                                $fout.='<div class="feature-content">
                                    '.$h_wrap_start.$margs['title'].$h_wrap_end.'
                                    <hr class="qucreative-hr-small">
        <div class="clear"></div>
                                    <div class="paragraph-text">'.$content.'</div>';


            $button_style_arr = $this->parse_button_style($margs['button_style']);

            $args = array_merge($margs, $button_style_arr);


            $args['read_more_link']=$margs['read_more_link'];
            $args['button_padding']='';



            $fout.=$this->icon_box_generate_read_more_con($args);

                                $fout.='
                                </div>
                            </div>';
        }
        if($margs['style']=='style-5'){
            $fout.='<div class="antfarm-icon-box bullet-feature  style-5  bullet-feature-'.$margs['style'].' feature-icon-'.$margs['feature'].'">
 ';


            $fout.=$this->icon_box_generate_feature_icon($margs);

                                $fout.='<div class="feature-content">
                                    '.$h_wrap_start.$margs['title'].$h_wrap_end.'
                                        <hr class="qucreative-hr-small">
                                        <div class="paragraph-text">'.$content.'</div>';


            $button_style_arr = $this->parse_button_style($margs['button_style']);

            $args = array_merge($margs, $button_style_arr);


            $args['read_more_link']=$margs['read_more_link'];
            $args['button_padding']='';



            $fout.=$this->icon_box_generate_read_more_con($args);

                                $fout.='
                                    </div>
                                </div>';
        };





        $this->shortcode_index++; return $fout;


    }
    function shortcode_section_title($atts=array(), $content = ''){
        // -- [section_title]
        $fout = '';

        $taxonomy = 'timeline_items_cat';

        $margs = array(

            'style'=>'two-lines',
            'aligment'=>'',
            'section_number'=>'',
            'line1'=>'',
            'line2'=>'',
        );


        if (!isset($atts) || $atts == false) {
            $atts = array();
        }

        $margs = array_merge($margs, $atts);




        global $qucreative_theme_data;


        if($qucreative_theme_data['font_vals'] && isset($qucreative_theme_data['font_vals']['divider_style']) && $qucreative_theme_data['font_vals']['divider_style']=='short'){

            if($margs['style']=='heading-style-1'){
                $margs['style'] = 'heading-style-2';
            }
        }



        if($margs['style']=='heading-style-3'){
            $margs['style'] = 'two-lines';
        }


        $fout = '';



        $con = '<h6 class="line-1">'.$margs['line1'].'</h6>';

        if($margs['line2']){



            if($qucreative_theme_data['font_vals']){





                $line_spacing = '20';
                if($qucreative_theme_data['font_vals']['line_spacing']!==''){
                    $line_spacing = $qucreative_theme_data['font_vals']['line_spacing'];
                }

                if($line_spacing!==''){

                    if(intval($line_spacing)<0){

                        $con.='<div class="q-empty-space" style="margin-top: '.$line_spacing.'px"></div>';
                    }else{

                        $con.='<div class="q-empty-space" style="height: '.$line_spacing.'px"></div>';
                    }
                }
            }


            $con .= '<span class="line-2">'.$margs['line2'].'</span>';



        }






        $lab_prefix = 'section_title_two';
        if($margs['style']=='two-lines'){
        }
        if($margs['style']=='one-line'){
            $lab_prefix = 'section_title_one';
        }
        if($qucreative_theme_data['font_vals'] &&  isset($qucreative_theme_data['font_vals'][$lab_prefix.'_divider_enable']) && $qucreative_theme_data['font_vals'][$lab_prefix.'_divider_enable']=='on'){



            if($margs['style']=='two-lines') {


                $labaux = 'title_divider_spacing_two';
                $line_spacing = '20';
                if($qucreative_theme_data['font_vals'][$labaux]!==''){
                    $line_spacing = $qucreative_theme_data['font_vals'][$labaux];
                }



                if($line_spacing!==''){

                    if(intval($line_spacing)<0){

                        $con.='<div class="q-empty-space" style="margin-top: '.$line_spacing.'px"></div>';
                    }else{

                        $con.='<div class="q-empty-space" style="height: '.$line_spacing.'px"></div>';
                    }
                }
            }

            if($margs['style']=='one-line') {



                $labaux = 'title_divider_spacing';
                $line_spacing = '20';
                if($qucreative_theme_data['font_vals'][$labaux]!==''){
                    $line_spacing = $qucreative_theme_data['font_vals'][$labaux];
                }



                if($line_spacing!==''){

                    if(intval($line_spacing)<0){

                        $con.='<div class="q-empty-space" style="margin-top: '.$line_spacing.'px"></div>';
                    }else{

                        $con.='<div class="q-empty-space" style="height: '.$line_spacing.'px"></div>';
                    }
                }
            }

            if($qucreative_theme_data['font_vals'][$lab_prefix.'_divider_divider_style']=='style-fullwidth'){

                $con.='<div class="section-title-divider-fullwidth" data-for="'.$lab_prefix.'"></div>';
            }
            if($qucreative_theme_data['font_vals'][$lab_prefix.'_divider_divider_style']=='style-box'){

                $con.='<div class="section-title-divider-box" data-for="'.$lab_prefix.'"></div>';
            }
        }



        $fout='<div class="element-header '.$margs['style'].' '.$margs['aligment'].'">
                        <div class="section-number">'.$margs['section_number'].'</div>
                        <div class="row "><div class="col-md-12"><div class="the-heading">'.$con.'</div></div></div>


                        </div>';


        $this->shortcode_index++; return $fout;


    }
    function shortcode_image_box($atts=array(), $content = ''){
        // -- [image_box]
        $fout = '';

        $taxonomy = 'timeline_items_cat';

        $margs = array(

            'aligment'=>'left',
            'media'=>'',
            'heading'=>'',
            'text_aligment'=>'',
            'line2'=>'',
            'heading_style'=>'h6',
        );


        if (!isset($atts) || $atts == false) {
            $atts = array();
        }

        $margs = array_merge($margs, $atts);




        $con = $content;

        $fout = '';

        $fout='<div class="antfarm-image-box image-box aligment-'.$margs['aligment'].' '.$margs['text_aligment'].'">';


        $bg_url = $this->sanitize_id_to_src($margs['media']);


        $str_img_box_img = '<img class="image-box--image" src="'.$bg_url.'" alt="'. esc_html__("image box image",'antfarm').'"/>';
        $str_img_box_content = '<div class="image-box--content">';






        $h_wrap_start = '<'.$margs['heading_style'].' class="the-variable-heading">';
        $h_wrap_end = '</'.$margs['heading_style'].'>';

        if($margs['heading_style']=='h-group-1'||$margs['heading_style']=='h-group-2'){

            $h_wrap_start = '<h3 class="the-variable-heading '.$margs['heading'].'">';
            $h_wrap_end = '</h3>';
        }

        if($margs['heading']){
            $str_img_box_content .= $h_wrap_start.$margs['heading'].$h_wrap_end.'<span class="style-black style-5 divider mini-divider" ></span>';
        }

        $str_img_box_content.='<div class="paragraph-text">'.wpautop(do_shortcode($content)).'</div>';


        $str_img_box_content.='</div>';





        if($margs['aligment']=='right'){

            $fout.=$str_img_box_content.$str_img_box_img;
        }else{
            $fout.=$str_img_box_img.$str_img_box_content;
        }



        $fout.='</div>';


        $this->shortcode_index++; return $fout;


    }
    function shortcode_divider($atts=array(), $content = '') {
        // -- [antfarm_divider]
        $fout = '';


        $margs = array(

            'style' => 'empty-space',
            'padding' => '',
            'rounded' => '',
            'color' => '',
            'height' => '20',
            'margin_top' => '',
            'margin_bottom' => '',
            'the_icon' => '',


        );

        if (!isset($atts) || $atts == false) {
            $atts = array();
        }

        $margs = array_merge($margs, $atts);

        $fout.='<span class="antfarm-divider q-divider qucreative-divider  '.$margs['style'].'"  ';
        if($margs['style']=='empty-space'){

            $fout.=' style="height: '.$margs['height'].'px';
        }
        if($margs['style']=='style-1'){



            $margin_top = (intval($margs['height'])/2);
            $margin_bottom = (intval($margs['height'])/2);


            if($margs['margin_top']){
                $margin_top = intval($margs['margin_top']);
            }
            if($margs['margin_bottom']){
                $margin_bottom = intval($margs['margin_bottom']);
            }


            $fout.=' style="margin-top: '.$margin_top.'px;margin-bottom: '.$margin_bottom.'px;';


        }
        $fout.='"';

        $fout.='>';


        if($margs['style']=='style-1'){
            $fout.='<span class="style-black style-5 divider qucreative-divider mini-divider" style="';



            if($margs['color']){
                $fout.=' background-color: '.$margs['color'].'; ';
            }

            $fout.=' margin-top:0; margin-bottom:0;"></span>';
        }


        $fout.='</span>';


        return $fout;

    }

    function shortcode_button($atts=array(), $content = '') {
        // -- [antfarm_button]
        $fout = '';


        $margs = array(

            'style'=>'style-default',
            'padding'=>'',
            'rounded'=>'',
            'link'=>'',
            'the_icon'=>'',
            'link_target'=>'',


        );


        if (!isset($atts) || $atts == false) {
            $atts = array();
        }

        $margs = array_merge($margs, $atts);




        if($margs['style']===''){
            $margs['style']='style-default';
        }


        $margs['style']=str_replace('color-highlight','style-highlight',$margs['style']);


        $fout.='<a class="antfarm-btn btn-read-more custom-color custom-a '.$margs['style'].' '.$margs['padding'].' '.$margs['rounded'].'';



        if($margs['the_icon']){
            $fout.=' with-icon';
        }

        if($margs['padding']=='padding-small'){
            $fout.=' h-group-1';
        }else{

            $fout.=' h6';
        }
        if($margs['padding']!='padding-small'){
        }

        $fout.='" href="'.$margs['link'].'"';

        if($margs['link_target']){
            $fout.=' target="'.$margs['link_target'].'"';
        }

        $fout.='>';


        if($margs['the_icon']){
            $fout.='<i class="fa fa-'.$margs['the_icon'].'"></i>';
        }



        $fout.=$content;



        $fout.='</a>';


        return $fout;

    }




	function sanitize_post_slug_to_id($arg, $post_type = 'post'){


		if(is_numeric($arg)){

		}else{



			$the_slug = $arg;
			$args = array(
				'name'        => $the_slug,
				'post_type'   => $post_type,
				'post_status' => 'publish',
				'numberposts' => 1
			);
			$my_posts = get_posts($args);


			if($my_posts && isset($my_posts[0])){

				return $my_posts[0]->ID;
			}else{
				return $arg;
			}

		}


		return $arg;
	}

    function shortcode_antfarm_contact_form($atts=array(), $content = '') {
        // -- [antfarm_button]
        $fout = '';


        $margs = array(

            'layout'=>'',
            'email_target'=>'',
            'rounded'=>'',
            'link'=>'',


        );


        if (!isset($atts) || $atts == false) {
            $atts = array();
        }

        $margs = array_merge($margs, $atts);





//        print_rr($margs);
        $margs['layout'] = $this->sanitize_post_slug_to_id($margs['layout'],'antfarm_contact_form');


        $po= get_post($margs['layout']);
//	    print_rr($po);



        $input_style = get_post_meta($po->ID,'antfarm_meta_input_style',true);

        if($input_style==''){
            $input_style= 'style-sharp';
        }


        $fout.='<form class="antfarm-contact-form shortcode-antfarm-contact for-contact  '.$input_style.'" method="post" action="?action=antfarm_contact_form">';


        $fout.='<input type="hidden" name="layout" value="'.$margs['layout'].'"/>';
        $fout.='<input type="hidden" name="email_target" value="'.$margs['email_target'].'"/>';


        $cont = $po->post_content;





        $cont = str_replace('[dzspgb_element input_type="input"','[dzspgb_element input_type="input" input-style="input-'.$input_style.'"',$cont);
        $cont = str_replace('[dzspgb_element input_type="textarea"','[dzspgb_element input_type="textarea" input-style="input-'.$input_style.'"',$cont);






        $fout.=do_shortcode($cont);

        $fout.='</form>';




        return $fout;

    }
    function shortcode_antfarm_menu_item($atts=array(), $content = '') {
        // -- [antfarm_button]
        $fout = '';


        $margs = array(

            'media'=>'',
            'title'=>'',
            'price'=>'',
            'ingredients'=>'',
            'titles'=>'',
            'heading_style_title'=>'h5',
            'heading_style_price'=>'h5',


        );


        if (!isset($atts) || $atts == false) {
            $atts = array();
        }

        $margs = array_merge($margs, $atts);






        $media_img = '';








        $media_img = $this->sanitize_id_to_src($margs['media']);;





        $fout.='<div class="antfarm-menu-item restaurant-menu-item';



        if($media_img){
            $fout.=' has-media-image';
        }

        $fout.='">';

        if($media_img){



            $fout.='<a href="'.$media_img.'" class="zoombox-delegated restaurant-menu-item--image">

                                                <div class="the-image" style="background-image: url('.$media_img.');">
                                                    </div>
                                                </a>';

            $fout.='<div class="restaurant-menu-item--content">';






            if(defined('QUCREATIVE_THEME_URL')) {
                wp_enqueue_script('qucreative_lightbox', QUCREATIVE_THEME_URL . 'libs/zoombox/zoombox.js');
                wp_enqueue_style('qucreative_lightbox', QUCREATIVE_THEME_URL . 'libs/zoombox/zoombox.css');
            }

        }







        $h_wrap_start = $this->generate_heading_wrap_start($margs['heading_style_title'], array(
                'extra_classes'=>'the-variable-heading the-variable-heading-title the-title ',
        ));


        $h_wrap_end = $this->generate_heading_wrap_end($margs['heading_style_title'], array());


        $fout.='<div class="flex-con"> ';




        $fout.=''.$h_wrap_start.$margs['title'].$h_wrap_end.'
<div class="dots"></div>';




        $lab = 'heading_style_price';

        $h_wrap_start = $this->generate_heading_wrap_start($margs['heading_style_price'], array(
            'extra_classes'=>'the-variable-heading the-variable-heading-price the-price ',
        ));


        $h_wrap_end = $this->generate_heading_wrap_end($margs['heading_style_price'], array());




        $fout.=''.$h_wrap_start.$margs['price'].$h_wrap_end.'
</div>
<div class="clear"></div>';


        $fout.='<div class="flex-con"> ';

        $fout.='
<div class="the-ingredients font-group-1">'.$margs['ingredients'].'</div>
 ';


        $items = vc_param_group_parse_atts( $margs['titles'] );


        if(is_array($items) && count($items)>0){






            $fout.='<div class="the-mentions">';




            foreach ($items as $it){



                if(isset($it['label']) && $it['label']){

                    $fout.='<span class="mention h-group-1" ';


                    if($it['color']){
                        $fout.='  style="background-color: '.$it['color'].'"';
                    }

                    $fout.='>'.$it['label'].'</span>';
                }


            }
            $fout.='</div>';

        }
        if($media_img){

            $fout.='</div>';
        }


        $fout.='</div>';





        $fout.='</div>';




        return $fout;

    }

    function generate_heading_wrap_start($heading_style, $pargs=array()){




        $margs = array(
            'extra_classes' => 'the-variable-heading ',
        );


        if(is_array($pargs)){
            $margs = array_merge($margs,$pargs);
        }


        $h_wrap_start = '<'.$heading_style.' class="'.$margs['extra_classes'].'">';

        if($heading_style=='h-group-1'||$heading_style=='h-group-2'){

            $h_wrap_start = '<h3 class="the-variable-heading '.$heading_style.'">';
        }

        return $h_wrap_start;
    }
    function generate_heading_wrap_end($heading_style, $pargs=array()){



        $margs = array(

        );


        if(is_array($pargs)){
            $margs = array_merge($margs,$pargs);
        }




        $h_wrap_end = '</'.$heading_style.'>';

        if($heading_style=='h-group-1'||$heading_style=='h-group-2'){

            $h_wrap_end = '</h3>';
        }
        return $h_wrap_end;
    }

    function shortcode_antfarm_tta_tabs($atts=array(), $content = '') {
        // -- [antfarm_button]
        $fout = '';


        $margs = array(

            'style'=>'',
            'padding'=>'',
            'rounded'=>'',
            'link'=>'',
            'skin'=>'skin-qucreative',


            'breakpoint'=>'260',
            'is_always_accordion'=>'off',
            'inner_padding'=>'20',
            'design_transition'=>'fade',
            'el_class'=>'',
            'active_section'=>'0',
            'antfarm_id'=>'',

        );


        if (!isset($atts) || $atts == false) {
            $atts = array();
        }

        $margs = array_merge($margs, $atts);


        if($margs['is_always_accordion']=='on'){
            $margs['breakpoint']='4000';
        }



        $fout.='<div class="antfarm-tabs dzs-tabs '.$margs['skin'].' ';




        if(defined('QUCREATIVE_VERSION')) {
            $fout.=' auto-init-from-q';
        }else{

            $fout.=' auto-init';
        }


        $fout.=' '.$margs['el_class'].'" data-options=\'{ "design_tabsposition" : "top"
                ,"design_transition": "slide"
                ,"design_tabswidth": "default"
                ,"toggle_breakpoint" : "'.$margs['breakpoint'].'"
                ,"settings_appendWholeContent" : true
                ,"design_transition" : "'.$margs['design_transition'].'"
                ,"settings_startTab" : "'.$margs['active_section'].'"
                 ,"toggle_type": "accordion"';

        if(isset($_GET['vc_editable']) && $_GET['vc_editable']=='true'){
            $fout.=',"vc_editable":true';
        }
        if($margs['inner_padding'] && $margs['inner_padding']!='20'){
            $fout.=',"inner_padding":"'.$margs['inner_padding'].'"';
        }

        $fout.='}\'';



        $fout.=' style="margin-bottom: '.(0).'px;"';


        if($margs['antfarm_id']){
            $fout.=' data-tabs-id="'.$margs['antfarm_id'].'"';
        }

        $fout.='>';


        $fout.=do_shortcode($content);



        $fout.='</div>';





        $base_url = $this->base_url;
        if(defined("QUCREATIVE_THEME_URL")){
	        $base_url = QUCREATIVE_THEME_URL;

	        wp_enqueue_style('tabs.and.accordions', $base_url.'libs/tabsandaccordions/tabsandaccordions.css');
	        wp_enqueue_script('tabs.and.accordions', $base_url.'libs/tabsandaccordions/tabsandaccordions.js');


        }else{

	        wp_enqueue_style('tabs.and.accordions', $base_url.'libs/tabsandaccordions/tabsandaccordions.css');
	        wp_enqueue_script('tabs.and.accordions', $base_url.'libs/tabsandaccordions/tabsandaccordions.js');


        }
        return $fout;

    }
    function shortcode_antfarm_pricing_table($atts=array(), $content = ''){
        // -- [section_title]
        $fout = '';

        $taxonomy = 'timeline_items_cat';

        $margs = array(

            'title'=>'',
            'price'=>'',
            'quota'=>'',
            'is_featured'=>'off',
            'items'=>'',
            'sign_up_text'=>'',
            'sign_up_link'=>'',
            'heading'=>'h6',
        );


        if (!isset($atts) || $atts == false) {
            $atts = array();
        }

        $margs = array_merge($margs, $atts);





        $h_wrap_start = '<'.$margs['heading'].' class="the-variable-heading">';
        $h_wrap_end = '</'.$margs['heading'].'>';

        if($margs['heading']=='h-group-1'||$margs['heading']=='h-group-2'){

            $h_wrap_start = '<h3 class="the-variable-heading '.$margs['heading'].'">';
            $h_wrap_end = '</h3>';
        }


        $fout = '';

        $fout='<div class="antfarm-pricing-table qucreative-pricing-table';


        if($margs['is_featured']=='on'){
            $fout.=' featured';
        }

        $fout.='">

                                    
                                    '.$h_wrap_start.$margs['title'].$h_wrap_end.'
                                    <div class="price h3">
                                        '.$margs['price'].'
                                    </div>
                                    <div class="price-date h-group-1">
                                        '.$margs['quota'].'
                                    </div>';



        $items = vc_param_group_parse_atts( $margs['items'] );


        if(is_array($items) && count($items)>0){
            $fout.='<ul class="table-features">';
        }

        foreach ($items as $it){



            $fout.='<li class="font-group-6">'.$it['item'].'</li>';


        }

        if(is_array($items) && count($items)>0){
            $fout.='</ul>';
        }


        $fout.='<p><a href="'.$margs['sign_up_link'].'" class="signup-button custom-a h6">'.$margs['sign_up_text'].'</a></p>
</div>';


        $this->shortcode_index++; return $fout;


    }
    function shortcode_antfarm_list($atts=array(), $content = ''){
        // -- [section_title]
        $fout = '';


        $margs = array(

            'items'=>'',
        );


        if (!isset($atts) || $atts == false) {
            $atts = array();
        }

        $margs = array_merge($margs, $atts);




        $fout = '';



        if(function_exists('vc_param_group_parse_atts')){
            $items = vc_param_group_parse_atts( $margs['titles'] );


            if(is_array($items) && count($items)>0){


                $sw_redcircle = true;




                $fout.='<ul class="antfarm-list ';


                $fout.='nostyle';


                $fout.='">';



                foreach ($items as $it){



                    $fout.='<li>';

                    $icon = 'fa-check';

                    if(isset($it['faicon']) && $it['faicon']){
                        $icon = 'fa-'.$it['faicon'];
                    }

                    $icon = str_replace('fa-fa-','fa-',$icon);


                    $fout.='<span class="icon-con"><i class="fa '.$icon.'"></i></span>';


                    $fout.='<span class="li-text font-group-8">'.$it['text'].'</span>';


                    $fout.='</li>';


                }
                $fout.='</ul>';

            }

        }




        $fout.='';


        $this->shortcode_index++; return $fout;


    }
    function shortcode_antfarm_client_list($atts=array(), $content = ''){
        // -- [section_title]
        $fout = '';


        $margs = array(

            'titles'=>'',
        );


        if (!isset($atts) || $atts == false) {
            $atts = array();
        }

        $margs = array_merge($margs, $atts);




        $fout = '';




        $items = vc_param_group_parse_atts( $margs['titles'] );


        if(is_array($items) && count($items)>0) {


            $sw_redcircle = true;


            $fout .= '<ul class="antfarm-client-list element-clients-list">';


            foreach ($items as $it) {



                $fout .= '<li>';

                if ($it['link']) {
                    $fout .= '<a href="' . $it['link'] . '"></a>';
                }
                $fout .= '
<img src="' . $it['media'] . '"/>';


                if ($it['link']) {
                    $fout .= '</a>';
                }

                $fout.='
</li>';



            }
            $fout .= '</ul>';
        }


        $fout.='';


        $this->shortcode_index++; return $fout;


    }
    function shortcode_antfarm_blockquote($atts=array(), $content = ''){
        // -- [section_title]
        $fout = '';


        $margs = array(

            'items'=>'',
            'author'=>'',
        );


        if (!isset($atts) || $atts == false) {
            $atts = array();
        }

        $margs = array_merge($margs, $atts);




        $fout = '';



        $fout.='<div class="antfarm-shortcode-blockquote">';


        $fout.='<blockquote class="blockquote-element">';
        $fout.=do_shortcode($content);
        $fout.='</blockquote>';


        $fout.='<h6 class="blockquote-author"><i class="fa fa-long-arrow-right"></i>&nbsp;&nbsp;'.$margs['author'].'</h6>';

        $fout.='</div>';



        $fout.='';


        $this->shortcode_index++; return $fout;


    }
    function shortcode_antfarm_carousel($atts=array(), $content = ''){
        // -- [section_title]
        $fout = '';


        $margs = array(

            'items'=>'',
        );


        if (!isset($atts) || $atts == false) {
            $atts = array();
        }

        $margs = array_merge($margs, $atts);




        $fout = '';





        $items = vc_param_group_parse_atts( $margs['items'] );


        if(is_array($items) && count($items)>0){
            $fout.='<div id="asii" class="antfarm-carousel qucreative-carousel advancedscroller ';



	        if(defined('QUCREATIVE_VERSION')) {
		        $fout.=' auto-init-from-q';
	        }else{

		        $fout.=' auto-init';
	        }

            $fout.='  skin-trumpet item-skin-trumpet auto-height item-padding-30" style="" data-options=\'{
    settings_swipe: "on"
    ,settings_swipeOnDesktopsToo: "on"
    ,design_arrowsize: "0"
    ,design_itemwidth: "25%"
    ,responsive_720_design_itemwidth: "50%"
}\'><ul class="items">';
        }

        foreach ($items as $it){


            $it_default = array(
                'image'=>'',
                'link'=>'',
                'title'=>'',
            );

            $it = array_merge($it_default, $it);







            $the_src = $this->sanitize_id_to_src($it['image']);



            $fout.='<li class="item-tobe">
<a class="custom-a" href="'.$it['link'].'"><img class="fullwidth" src="'.$the_src.'"/></a>
<div class="feed-description">'.$it['title'].'</div>
</li>';


        }

        if(is_array($items) && count($items)>0){
            $fout.='</ul></div>';
        }


        $fout.='';


        $this->shortcode_index++; return $fout;


    }
    function shortcode_antfarm_image_slider($atts=array(), $content = ''){
        // -- [section_title]
        $fout = '';


        $margs = array(

            'images'=>'',
        );


        if (!isset($atts) || $atts == false) {
            $atts = array();
        }

        $margs = array_merge($margs, $atts);




        $images = explode(",",$margs['images']);



        if(is_array($images)){




            $fout.='<div class="antfarm-image-slider advancedscroller skin-qucreative ';



	        if(defined('QUCREATIVE_VERSION')) {
		        $fout.=' auto-init-from-q';
	        }else{

		        $fout.=' auto-init';
	        }

            $fout.=' arrows-middle" style="width:100%; height: auto; margin-bottom: 0;" data-options=\'{
"settings_mode": "onlyoneitem"
,"design_arrowsize": "0"
,"settings_swipe": "on"
,"settings_autoHeight": "on"
,"settings_autoHeight_proportional": "on"
,"settings_swipeOnDesktopsToo": "on"
,"settings_slideshow": "off"
,"settings_slideshowTime": "150"
}\'><ul class="items">';





            foreach ($images as $im){


                $the_src = wp_get_attachment_image_src($im, 'full');


                $fout.='<li class="item-tobe needs-loading"> <div class="imagediv" style="background-image: url('.$the_src[0].'); height:350px;"></div></li>';
            }




            $fout.='</ul></div>';




	        $base_url = $this->base_url;
	        if(defined('QUCREATIVE_THEME_URL')){

		        $base_url = QUCREATIVE_THEME_URL;
	        }

            wp_enqueue_style('advancedscroller',$base_url.'libs/advancedscroller/plugin.css');
            wp_enqueue_script('advancedscroller',$base_url.'libs/advancedscroller/plugin.js');


        }





        $this->shortcode_index++; return $fout;


    }


    function sanitize_post_type_slug_to_id($arg, $post_type){

        if($arg && strpos($arg, 'dzs')!==0 && is_numeric($arg)==false){


            $args = array(
                'post_type'      => $post_type,
                'posts_per_page' => 1,
                'post_name__in'  => array($arg),
                'fields'         => 'ids'
            );
            $qr = get_posts( $args );


            if(isset($qr[0])){
                return $qr[0];
            }







        }



        return $arg;
    }

    function shortcode_antfarm_portfolio($atts=array(), $content = ''){
        // -- [section_title]


        global $qucreative_theme_data;

        $fout = '';


        $margs = array(

            'skin'=>'',
            'zfolio-mode'=>'',
            'layout'=>'',
            'gap'=>'theme-column-gap',
            'items'=>'',
            'wpqargs'=>'',
            'hide_title'=>'off',
            'title_hover'=>'on',
            'pagination_enable'=>'on',// -- deprecated
            'pagination_method'=>'pagination',
            'pagination_position'=>'left',
            'filters_position'=>'left',
            'filters_enable'=>'on',
            'enable_bordered_design'=>'off',

            'cat'=>'',
            'heading_style_desc'=>'',
            'heading_style_title'=>'',
            'extra_classes'=>'',
            'responsive_fallback_tablet'=>'',
            'responsive_fallback_mobile'=>'',
            'posts_per_page'=>'',
            'link_whole_item'=>'zoombox',
            'return_only_items'=>'default',
        );


        if (!isset($atts) || $atts == false) {
            $atts = array();
        }

        $margs = array_merge($margs, $atts);




        $shortcode_index = $this->shortcode_index;
        $zfolio_index = $this->zfolio_index;








        if($margs['skin']=='skin-qucreative zfolio-portfolio-expandable'){
            $margs['pagination_method']='off';
            $margs['filters_enable']='off';
            $margs['zfolio-mode']='mode-normal';
        }else{
            if($margs['link_whole_item']=='item_excerpt'){
                $margs['link_whole_item'] = 'zoombox';
            }
        }






        $h_tag = '';
        $h_class = '';



        if($margs['heading_style_title']){

            $h_tag = $margs['heading_style_title'];
        }

        if($margs['heading_style_title']=='h-group-1'||$margs['heading_style_title']=='h-group-2'){

            $h_tag = 'h3';
            $h_class = 'the-variable-heading--number '.$margs['heading_style_title'];
        }





        $h_tag_desc = '';
        $h_class_desc = '';



        if($margs['heading_style_desc']){

            $h_tag_desc = $margs['heading_style_desc'];
        }

        if(isset($margs['heading_style_desc']) && $margs['heading_style_desc']=='h-group-1'||$margs['heading_style_desc']=='h-group-2'){

            $h_tag_desc = 'h3';
            $h_class_desc = 'the-variable-heading--number '.$margs['heading_style_desc'];
        }







        if(isset($_GET['portfolio-page']) && $_GET['portfolio-page'] && isset($_GET['return-only-items']) && $_GET['return-only-items']=='on'){
            if($margs['return_only_items']=='default') {
                $margs['return_only_items'] = 'on';
            }
        }


        if(isset($_GET['slider-index']) ){
            $margs['return_only_items_slider_index']=$_GET['slider-index'];
        }

        if($margs['return_only_items']=='default'){
            $margs['return_only_items']='off';
        }



        $term_id = $margs['cat'];

        $term_id_nr = qucreative_sanitize_term_slug_to_id($term_id);

        /** @var $args */
        $wpqargs = array();
        $meta_key = 'dzs_meta_order_for_term_'.$term_id_nr;

        $wpqargs['post_type']=$this->name_port_item;
        $wpqargs['posts_per_page']='-1';




        if($term_id){

            $wpqargs['orderby']=array( 'meta_key' => 'DESC',
                                       'meta_value_num' => 'DESC',
                                       'date' => 'DESC' );
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


        if(isset($_GET['portfolio-page']) && $_GET['portfolio-page']){
            $wpqargs['paged']=$_GET['portfolio-page'];
        }


        if($margs['posts_per_page']){
            $wpqargs['posts_per_page'] = $margs['posts_per_page'];
        }


        $the_cat_id = '';
        $the_cat = null;
        $the_cat_children = array();

        if($margs['cat'] && $margs['cat']!='all'){


            $taxonomy_name = $this->name_port_item_cat;


            $arr_cats = explode(',', $margs['cat']);


            $new_cat = $margs['cat'];

            foreach ($arr_cats as $lab=>$term_id){

                if(is_numeric($term_id)){

                }else{

                    $term = get_term_by('slug', $term_id, $taxonomy_name);

                    if($term){
                        $arr_cats[$lab] = $term->term_id;
                    }

                }

            }

            if ($wpqargs['post_type'] == 'post') {
                $wpqargs['cat'] = $margs['cat'];
            }

            if ($wpqargs['post_type'] == $this->name_port_item) {
                $wpqargs['tax_query'] = array(
                    array(
                        'taxonomy' => $taxonomy_name,
                        'field' => 'id',
                        'terms' => $arr_cats,
                    )
                );
                $the_cat = get_term($margs['cat'],$taxonomy_name);




                $the_cat_id = $margs['cat'];
                $term_id = $the_cat_id;


                if(is_numeric($term_id)){

                }else{

                    $term = get_term_by('slug', $margs['cat'], $taxonomy_name);

                    if($term){
                        $term_id = $term->term_id;
                    }

                }


                $termchildren = get_term_children( $term_id, $taxonomy_name );



                foreach ($termchildren as $tc){
                    $term = get_term($tc, $taxonomy_name);



                    array_push($the_cat_children, $term);
                }
            }



        }



        // -- start the LOOP
        $args_wpqargs = array();
        // -- lets parse custom wp query args
        $margs['wpqargs'] = html_entity_decode($margs['wpqargs']);
        parse_str($margs['wpqargs'],$args_wpqargs);


        if (!isset($args_wpqargs) || $args_wpqargs == false || is_array($args_wpqargs) == false) {
            $args_wpqargs = array();
        }
        $wpqargs = array_merge($wpqargs,$args_wpqargs);


//        echo 'wpqargs - ';print_rr($wpqargs);

        $query = new WP_Query($wpqargs);


//	    echo '$query - ';print_rr($query);



        $nr_pages = $query->max_num_pages;

















        $margs['layout']=$this->sanitize_post_type_slug_to_id($margs['layout'],'zfolio_grid');



        $layout_grid = null;

        $layout_class = $margs['layout'];
        $layout_items_nr = 0;

        $custom_layout = false;


        if(is_numeric($margs['layout'])){

            $po = get_post($margs['layout']);



            if($po && isset($po->post_content)){

	            $layout_grid= json_decode($po->post_content,true);
            }




            if($layout_grid){

	            $cols = $layout_grid['grid_cols'];


	            $layout_class = 'dzs-layout--'.$cols.'-cols';
	            $layout_items_nr = count($layout_grid['items_arr']);
	            $custom_layout=true;
            }

        }else{

        }




        $link_whole_item = '';


        $str_items = '';
        $layout_ind = 0;
        foreach($query->posts as $it) {
            $the_src = wp_get_attachment_image_src(get_post_thumbnail_id($it->ID), 'full');
            $thumbnail_src = $the_src[0];



            $link_whole_item = '';

            $zoombox_link = $thumbnail_src;

            if(get_post_meta($it->ID,'qucreative_meta_post_media',true) && get_post_meta($it->ID,'qucreative_meta_post_media_type',true)!='slider'){

                $zoombox_link = get_post_meta($it->ID,'qucreative_meta_post_media',true);
            }


            $title=$it->post_title;
            $subtitle='';





            if (get_post_meta($it->ID,'qucreative_meta_custom_title',true)) {
                $title = get_post_meta($it->ID,'qucreative_meta_custom_title',true);
            }
            if (get_post_meta($it->ID, 'qucreative_meta_port_subtitle',true)) {
                $subtitle = get_post_meta($it->ID, 'qucreative_meta_port_subtitle',true);
            }


            if($margs['link_whole_item']=='zoombox'){
                $link_whole_item = $zoombox_link;
            }

            if($margs['link_whole_item']=='portfolio_item'){
                $link_whole_item = get_permalink($it->ID);



                if(strpos($margs['cat'],',')===false){
                    $link_whole_item = add_query_arg('zfolio-cat',$margs['cat'],$link_whole_item);
                }
            }

            $whole_item_classes='';

            if($margs['link_whole_item']=='zoombox'){

                $whole_item_classes.='  zoombox-delegated';
            }

            $str_items.='<div class="zfolio-item zfolio-item-id-'.$it->ID.' ';




            if($margs['skin']=='skin-silver'){


            }



            if($margs['cat'] && $margs['cat']!='all'){


                $taxonomy = $this->name_port_item_cat;
                $terms = wp_get_post_terms( $it->ID, $taxonomy);
                if(is_array($terms) && count($terms)){

                    $i24 = 0;
                    foreach ($terms as $term){



                        if($i24>0){
                            $str_items.=' ';
                        }
                        $str_items.=' termid-'.($term->term_id).' ';
                        $i24++;
                    }
                }

            }






            $str_items.='" data-thumbnail="'.$thumbnail_src.'"';





            if($layout_grid){
                if($layout_grid['items_arr']){
                    if(isset($layout_grid['items_arr'][$layout_ind])){






                        if(isset($layout_grid['items_arr'][$layout_ind]['w'])){
                            $str_items.=' data-wexpand="'.$layout_grid['items_arr'][$layout_ind]['w'].'"';
                            $str_items.=' data-hexpand="'.$layout_grid['items_arr'][$layout_ind]['h'].'"';
                        }




                    }


                    $layout_ind++;
                    if($layout_grid['loop']=='on'){
                        if($layout_ind>$layout_items_nr){
                            $layout_ind=0;
                        }
                    }
                }
            }





            if($margs['link_whole_item']=='item_excerpt'){
                $str_items.='  data-overlay_extra_class="content-opener"';


            }



            if($margs['link_whole_item']=='zoombox_item'){

                $str_items.='   data-overlay_extra_class="zoombox-delegated" data-overlay_extra_attr=\' data-src="#item_'.$shortcode_index.'_'.$it->ID.'" data-biggallery="gal'.$shortcode_index.'" data-bigwidth="{{ww}}" data-preset-name="whitefull" data-bigheight="{{wh}}" data-type="inlinecontent" data-inline_content_move="on"\'';


                if(defined("QUCREATIVE_VERSION")){


                    $social_shares = qucreative_get_social_shares();





                    $post_media_type = 'detect';


                    if(get_post_meta($it->ID,'qucreative_meta_post_media',true)){
                        if(strpos(get_post_meta($it->ID,'qucreative_meta_post_media',true),'vimeo.com/')){
                            $post_media_type = 'vimeo';
                        }
                    }

                    if($post_media_type=='detect'){
                        $post_media_type = 'image';
                    }



                    $pfx_date = get_the_date( 'F j Y', $it->id );



                    $blockquote = '';

                    if(get_post_meta($it->ID, 'qucreative_meta_port_optional_info_1',true)){

                        $blockquote='<blockquote class="portfolio-ajax-blockquote font-group-4">'.get_post_meta($it->ID, 'qucreative_meta_port_optional_info_1',true).'<br>
                                '.$pfx_date;

                        if(get_post_meta($it->ID, 'qucreative_meta_port_website',true)){

                            $blockquote.= '<br>
<a class="portfolio-ajax-blockquote--link" target="_blank" href="'.get_post_meta($it->ID, 'qucreative_meta_port_website',true).'">'.get_post_meta($it->ID, 'qucreative_meta_port_website',true).'</a>';

                        }

                        $blockquote.= '</blockquote>';
                    }


                    $qucreative_theme_data['footer_extra_zoombox_items'].='<div class="item-anchor"></div>
    <!-- this is the portfolio page, reference it via it\'s id -->
    <div id="item_'.$shortcode_index.'_'.$it->ID.'" class="main-con portfolio-ajax-item hidden-when-not-in-zoombox" style="padding: 0;">
        <div class="info-con">
            <div class="row">
                <!-- page navigation buttons -->
                <div class="col-md-6">

                    <span class="arrow-left-for-skin-qucreative-2 activate-only-when-zoombox-nav zoombox-gotoprev-galleryitem"><i class="fa fa-arrow-left"></i></span>
                    <span class="arrow-right-for-skin-qucreative-2 activate-only-when-zoombox-nav zoombox-gotonext-galleryitem"><i class="fa fa-arrow-right"></i></span>
                </div>
                <div class="col-md-6" style="text-align:right;">

                    <span class="close-btn-for-skin-qucreative btn-close-zoombox"><i class="fa fa-times"></i></span>
                </div>
                <!-- page navigation buttons END -->

            </div>
            <div class="clear"></div>
            <hr class="hr-for-skin-whitefull">
            <div class="zbox-responsive-media"></div>



            <!-- meta and small description of project -->
            <h3 class="h-group-2 portfolio-single-title">'.$it->post_title.'</h3>
            <div class="subtitle font-group-1">'.get_post_meta($it->ID,'qucreative_meta_port_subtitle',true).'</div>
            <hr class="qucreative-hr-small">

            <div class=" paragraph-text paragraph-text-for-light">'.do_shortcode(wpautop($it->post_content)).'</div>
            '.$blockquote.'

            <div class="social-con">'.$social_shares.' </div>

        </div>';

                    if(get_post_meta($it->ID,'qucreative_meta_post_media_type',true)=='vimeo' || get_post_meta($it->ID,'qucreative_meta_post_media_type',true)=='youtube' || get_post_meta($it->ID,'qucreative_meta_post_media_type',true)=='video'){

                        $qucreative_theme_data['footer_extra_zoombox_items'].='<div class="slider-con" data-element-width="960" data-element-height="540">';
                    }else{

                        $qucreative_theme_data['footer_extra_zoombox_items'].='<div class="slider-con" data-element-width="1200" data-element-height="800">';
                    }




                        $qucreative_theme_data['footer_extra_zoombox_items'].= qucreative_generate_featured_media($it->ID, array(
                            'include_featured-media-con_div'=>false,
                            'img_extra_class'=>'divimage divimage-from-here',
                            'call_from'=>'zoombox_item',
                        ));



                    $qucreative_theme_data['footer_extra_zoombox_items'].='</div><!-- end slider-con -->
    </div>
    <!-- portfolio page END -->';

                }
            }



            $str_items.='>';







            if($margs['link_whole_item']!='item_excerpt') {
            }
                $str_items .= '<a';


                if ($link_whole_item) {

	                if(get_post_meta($it->ID,'qucreative_meta_port_open_custom_link_sw',true)=='on'){
                    if($margs['link_whole_item']=='portfolio_item' && get_post_meta($it->ID, 'qucreative_meta_port_custom_link', true)){
                        $link_whole_item = get_post_meta($it->ID, 'qucreative_meta_port_custom_link', true);

                    }
	                }

                    $str_items .= ' href="' . $link_whole_item . '"';


	                if(get_post_meta($it->ID,'qucreative_meta_port_custom_link_target',true)=='_blank'){

		                $str_items .= ' target="' . get_post_meta($it->ID,'qucreative_meta_port_custom_link_target',true) . '"';
		                $whole_item_classes.=' not-ajax';
	                }
                }

            if($margs['link_whole_item']=='item_excerpt') {

                $whole_item_classes.=' for-content-opener';
            }
            if($margs['link_whole_item']=='portfolio_item') {

                $whole_item_classes.=' donotchange-ajax-menu';
            }


                $str_items .= ' class="zfolio-item--inner custom-a ' . $whole_item_classes . '"  data-biggallery="zfolio' . $shortcode_index . '" data-lightbox-title="' . $it->post_title . '"';

            if($margs['link_whole_item']=='zoombox'){
                $str_items.='  data-preset-name="darkfull"';
            }

                if(get_post_meta($it->ID, 'qucreative_meta_post_media_type', true)=='vimeo'){

                    $str_items.=' data-type="video"';
                    $str_items.=' data-videotype="'.get_post_meta($it->ID, 'qucreative_meta_post_media_type', true).'"';
                }else{
                    if(get_post_meta($it->ID, 'qucreative_meta_post_media_type', true)=='youtube'){

                        $str_items.=' data-type="video"';
                        $str_items.=' data-videotype="'.get_post_meta($it->ID, 'qucreative_meta_post_media_type', true).'"';
                    }else{

                        $str_items.=' data-type="'.get_post_meta($it->ID, 'qucreative_meta_post_media_type', true).'"';
                    }
                }

                $str_items .= '> <div class="zfolio-item--inner--inner"><div class="zfolio-item--inner--inner--inner">  ';


            $cover = get_post_meta($it->ID,'qucreative_meta_video_cover_image',true);

            if($cover) {


                if (is_numeric($cover)) {
                    $bg_url = wp_get_attachment_image_src($cover, 'full');

                    $bg_url = $bg_url[0];

                } else {
                    $bg_url = $cover;
                }


                $str_items .= '
                        <!-- cover image markup -->
                        <div class="cover-image" style="background-image: url(' . $bg_url . '); ">
                            <svg class="cover-play-btn" version="1.1" baseProfile="tiny" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
     x="0px" y="0px" width="120px" height="120px" viewBox="0 0 120 120" overflow="auto" xml:space="preserve">
<path fill-rule="evenodd" fill="#ffffff" d="M79.295,56.914c2.45,1.705,2.45,4.468,0,6.172l-24.58,17.103
    c-2.45,1.704-4.436,0.667-4.436-2.317V42.129c0-2.984,1.986-4.022,4.436-2.318L79.295,56.914z M0.199,54.604
    c-0.265,2.971-0.265,7.821,0,10.792c2.57,28.854,25.551,51.835,54.405,54.405c2.971,0.265,7.821,0.265,10.792,0
    c28.854-2.57,51.835-25.551,54.405-54.405c0.265-2.971,0.265-7.821,0-10.792C117.231,25.75,94.25,2.769,65.396,0.198
    c-2.971-0.265-7.821-0.265-10.792,0C25.75,2.769,2.769,25.75,0.199,54.604z M8.816,65.394c-0.309-2.967-0.309-7.82,0-10.787
    c2.512-24.115,21.675-43.279,45.79-45.791c2.967-0.309,7.821-0.309,10.788,0c24.115,2.512,43.278,21.675,45.79,45.79
    c0.309,2.967,0.309,7.821,0,10.788c-2.512,24.115-21.675,43.279-45.79,45.791c-2.967,0.309-7.821,0.309-10.788,0
    C30.491,108.672,11.328,89.508,8.816,65.394z"/>
</svg> </div> ';

            }


                $str_items.='<div class="item-meta">
                                                    <';



	        if($h_tag){
		        $str_items.=''.$h_tag.'';
	        }else{

		        if($margs['skin'] == 'skin-melbourne' ||  $margs['skin'] == 'skin-silver') {

			        $str_items.='h5';
		        }else{

			        $str_items.='h6';
		        }
	        }



            $str_items.=' class="the-title custom-color ';



                if($h_tag){
                    $str_items.=' '.$h_tag.' '.$h_class;
                }else{

                    if($margs['skin'] == 'skin-melbourne' ||  $margs['skin'] == 'skin-silver') {

                        $str_items.=' h5';
                    }else{

                        $str_items.=' h6';
                    }
                }



                $str_items.=' ">' . $it->post_title;

	        $str_items.='</';
	        if($h_tag){
		        $str_items.=''.$h_tag.'';
	        }else{

		        if($margs['skin'] == 'skin-melbourne' ||  $margs['skin'] == 'skin-silver') {

			        $str_items.='h5';
		        }else{

			        $str_items.='h6';
		        }
	        }
	        $str_items.='>';



                if ($margs['skin'] == 'skin-melbourne' || $margs['skin'] == 'skin-silver') {
                    $str_items .= '<div class="the-desc ';







                    if($h_tag_desc){
                        $str_items.=' '.$h_tag_desc.' '.$h_class_desc;
                    }else{

                        $str_items.=' font-group-1';

                    }



                    $str_items.='">' . get_post_meta($it->ID, 'qucreative_meta_port_subtitle', true) . '</div>';
                }

                $str_items .= '</div><!--end item-meta-->

            ';





                if ($margs['link_whole_item'] == 'zoombox') {
                    $str_items .= '<div class="zoombox-larger-description"><h5 class="zoombox-larger-description-heading">' . get_post_meta($it->ID, 'qucreative_meta_port_subtitle', true) . '</h5><p>' . strip_shortcodes($it->post_content) . '</p></div>';
                }
                $str_items .= '</div></div></a><!--end zfolio-item..inner-->';



            if($margs['link_whole_item']=='item_excerpt'){

                $str_items.='<!-- content module with slider -->
                            <div class="the-content excerpt-content transitioning-in skin-qucreative" style="">
                                <div class="dzs-colcontainer">';


                if(get_post_meta($it->ID,'qucreative_meta_post_layout_for_excerpt',true)=='small'){

                    // -- @small

                    $str_items.='<div class="dzs-col-8">

                                        ';


                    $str_items.=qucreative_generate_featured_media($it->ID, array(
                        'include_featured-media-con_div' => false,
                        'search_for_featured_media' => true, // -- search for the posts featured media con too if meta post media is not set
                        'img_extra_class' => 'fullwidth',
                        'call_from' => 'item_excerpt_setup',
                        'item_excerpt_setup_video_height' => '305',
                    ));





                    $str_items.='</div>
                        

                                    <!-- description markup-->
                                    <div class="dzs-col-4" style="padding-right: 45px;">
                                        <h5 class="heading-for-excerpt-content-small custom-color">'.$title.'</h5>
                                        <div class="subtitle ">'.$subtitle.'</div>
                                        <hr class="qucreative-hr-small custom-color">
                                        <div class=" paragraph-text paragraph-text-for-light">'.qucreative_generate_post_content_by_id($it->ID).'</div>
                                    </div>';
                }else{
                    $str_items.='<div class="dzs-col-12">';







                    $str_items.=qucreative_generate_featured_media($it->ID, array(
                        'include_featured-media-con_div' => false,
                        'search_for_featured_media' => true,
                        'img_extra_class' => 'fullwidth',
                        'call_from' => 'item_excerpt_setup',
                        'item_excerpt_setup_video_height' => '468',
                    ));




                    $str_items.='</div>
                                    <div class="clear"></div>


                                    <!-- description markup-->
                                    <div class="desc-content-wrapper desc-content-wrapper-special-1">
                                        <div class="dzs-col-4" style=";">
                                            <h3 class="h-group-2 custom-color" style="">'.$title.'</h3>
                                            <div class="subtitle">'.$subtitle.'</div>';



                    $str_items.=qucreative_generate_portfolio_item_blockquote($it->ID, array(
                        'extra_class'=>'lesser-margin',
                    ));

                    $str_items.='</div>';
                    $str_items.='<div class="dzs-col-8" style=";">
                                            <div class=" paragraph-text paragraph-text-for-light">'.qucreative_generate_post_content_by_id($it->ID).'</div>
                                        </div>
                                    </div>
                                    <!-- item description END-->

                                ';

                }





                $str_items.='</div>


                                <!-- script that setups slider on portfolio item click -->
                                
                            </div>';


            }




            $str_items.='<div class="the-overlay-anchor">
</div>';







            $str_items .='</div>';



            if($margs['return_only_items']=='on'){

                $str_items.=$qucreative_theme_data['footer_extra_zoombox_items'];
                $qucreative_theme_data['footer_extra_zoombox_items'] = '';

            }


        }


        if($margs['return_only_items']=='on'){


            if($zfolio_index==$margs['return_only_items_slider_index']){

            }
            return $str_items;
        }


        $fout = '';


        if($margs['gap']=='10px'){

        }







        $fout='<div class="antfarm-portfolio zfolio zfolio-from-shortcode zfolio'.$zfolio_index.' thumbnail-height-'.$margs['zfolio-mode'].' pagination-method-'.$margs['pagination_method'].' '.$margs['skin'].' '.$layout_class.' '.$margs['extra_classes'];


        if( ($margs['pagination_method']=='pagination' && ( $margs['posts_per_page']=='' || $margs['posts_per_page']=='-1' ) ) || ( $query->posts && is_array($query->posts) && count($query->posts)<12) ){
            $fout.=' no-posts-per-page-limit';
        }

        if(count($the_cat_children)==0){

            $fout.=' no-categories';
        }

        if($custom_layout){
            $fout.=' custom-layout';
        }

	    if(defined('QUCREATIVE_VERSION')) {
		    $fout.=' auto-init-from-q';
	    }else{

		    $fout.=' auto-init';
	    }



        if($margs['hide_title']=='on'){
            $fout.=' hide-title';
        }

        if($margs['title_hover']=='off'){
            $fout.=' disable-title-hover';
        }
        if($margs['enable_bordered_design']=='on'){
            $fout.=' bordered-design';
        }








        $fout.='" ';






        if($margs['filters_position']){
            $fout.=' data-filters-position="'.$margs['filters_position'].'"';
        }

        if($margs['pagination_position']){
            $fout.=' data-pagination-position="'.$margs['pagination_position'].'"';
        }


        if($margs['gap']=='theme-column-gap'){
            $fout.=' data-margin="theme-column-gap"';
        }
        if($margs['gap']=='20px'){
            $fout.=' data-margin="20"';
        }
        if($margs['gap']=='10px'){
            $fout.=' data-margin="10"';
        }
        if($margs['gap']=='5px'){
            $fout.=' data-margin="5"';
        }
        if($margs['gap']=='3px'){
            $fout.=' data-margin="3"';
        }
        if($margs['gap']=='2px'){
            $fout.=' data-margin="2"';
        }
        if($margs['gap']=='1px'){
            $fout.=' data-margin="1"';
        }

        if($margs['gap']=='0'){
            $fout.=' data-margin="0"';
        }

        $fout.=' data-options=\'{ "ceva":"ceva"';

        $fout.=', "selector_con_skin": "selector-con-for-skin-melbourne"';


        if($qucreative_theme_data['post_content_has_translucent_layer']){
            $fout.= ',"outer_con_selector_con":".the-content-con:not(.transitioning-out) .selector-con-for-zfolio-for-portfolio"';
        }

        if($nr_pages>1){
            $fout.= ',"pagination_selector":".qucreative-pagination-for-zfolio'.$zfolio_index.'"';
        }
        if(strpos($margs['extra_classes'],'add-loaded-on-images-animation')!==false){
            $fout.= '
, "settings_add_loaded_on_images": "on"';
        }
        if($margs['link_whole_item']=='item_excerpt'){
            $fout.= '
, "excerpt_con_transition": "wipe"
, "excerpt_con_resize_videos": "on"
, "excerpt_con_responsive_ratio": "810"';
        }


        $fout.=',"settings_add_loaded_on_images": "on"';
        $fout.=',"responsive_fallback_tablet":"'.$margs['responsive_fallback_tablet'].'"';
        $fout.=',"responsive_fallback_mobile":"'.$margs['responsive_fallback_mobile'].'"';
        $fout.=',"filters_enable":"'.$margs['filters_enable'].'"';







        $items_per_page_initial = '15';


        preg_match("/dzs-layout--(.*?)-cols/", $margs['layout'], $output_array);


        if($output_array && isset($output_array[1])){

            $items_per_page_initial = intval($output_array[1]) * 4;
        }





        if($margs['zfolio-mode']=='mode-cols'){



            $fout.=',"design_item_thumb_height":"proportional"';
        }else{
            $fout.=',"design_item_thumb_height":"1"';
        }


        $fout.=',"pagination_method":"'.$margs['pagination_method'].'"';

        if($margs['pagination_method']=='scroll'){

            $fout.=',"use_scroll_lazyloading_for_images": "on"
            ,"settings_add_loaded_on_images":"on"
            ,"settings_ajax_method":"curritems"
            ,"settings_ajax_method_curritems_per_page":"auto"
            ,"settings_ajax_method_curritems_per_page_initial":"'.$items_per_page_initial.'"
            ,"item_inner_addid": "item"';
        }


        if($margs['pagination_method']=='pagination'){

            $fout.=',"settings_ajax_method_curritems_per_page": "on"';
        }

        if(count($the_cat_children)==0){

            $fout.=',"selector_con_generate_categories":"off"';
        }


        $fout.='}\' style="">';



        foreach ($the_cat_children as $tcc){


            $fout.='<div class="feed-zfolio-zfolio-term" data-termid="'.$tcc->term_id.'">'.$tcc->name.'</div>';
        }


        $fout.='<div class="items ">';




        $fout.=$str_items;


        $fout.='</div></div>';




        // --- for portfolio
        if($margs['pagination_method']=='pagination' && $nr_pages && $nr_pages>1){
            $fout.='<ul class="qucreative-pagination from-gallery-element qucreative-pagination-for-zfolio'.$zfolio_index.'">
                        ';

            for($i=0;$i<$nr_pages;$i++){
                $fout.='<li class="';


                if($i==0){
                    $fout.=' active';
                }

                $fout.='"><a class="" href="'.add_query_arg( array(
                        'portfolio-page' => ($i+1),
                        'return-only-items' => 'on',
                        'slider-index' => $zfolio_index,
                    )).'"><span class="the-number h6">'.($i+1).'</span></a></li>';
            }
            $fout.='</ul>';
        }




        if(defined('QUCREATIVE_THEME_URL')) {

            wp_enqueue_script('qucreative_portfolio', QUCREATIVE_THEME_URL . 'libs/zfolio/zfolio.js');
            wp_enqueue_style('qucreative_portfolio', QUCREATIVE_THEME_URL . 'libs/zfolio/zfolio.css');


            wp_enqueue_script('qucreative_lightbox', QUCREATIVE_THEME_URL . 'libs/zoombox/zoombox.js');
            wp_enqueue_style('qucreative_lightbox', QUCREATIVE_THEME_URL . 'libs/zoombox/zoombox.css');

	        wp_enqueue_script('antfarm-video-player', QUCREATIVE_THEME_URL . 'libs/videogallery/vplayer.js');
	        wp_enqueue_style('antfarm-video-player', QUCREATIVE_THEME_URL . 'libs/videogallery/vplayer.css');

        }else{

	        wp_enqueue_script('antfarm-video-player', $this->base_url . 'libs/videogallery/vplayer.js');
	        wp_enqueue_style('antfarm-video-player', $this->base_url . 'libs/videogallery/vplayer.css');
        }




        $this->shortcode_index++;
        $this->zfolio_index++;
        return $fout;


    }
    function shortcode_antfarm_latest_posts($atts=array(), $content = ''){
        $fout = '';


        $margs = array(

            'count'=>'',
            'wpqargs'=>'',
        );


        if (!isset($atts) || $atts == false) {
            $atts = array();
        }

        $margs = array_merge($margs, $atts);




        $shortcode_index = $this->shortcode_index;









        /** @var $args */
        $wpqargs = array();

        $wpqargs['post_type']='post';
        $wpqargs['posts_per_page']=$margs['count'];
        $wpqargs['orderby']="date";
        $wpqargs['order']="DESC";






        // -- start the LOOP
        $args_wpqargs = array();
        // -- lets parse custom wp query args
        $margs['wpqargs'] = html_entity_decode($margs['wpqargs']);
        parse_str($margs['wpqargs'],$args_wpqargs);


        if (!isset($args_wpqargs) || $args_wpqargs == false || is_array($args_wpqargs) == false) {
            $args_wpqargs = array();
        }
        $wpqargs = array_merge($wpqargs,$args_wpqargs);


        $query = new WP_Query($wpqargs);




        $str_items = '';


        $fout.='<div class="antfarm-latest-posts">';
        $fout.='<div class="row">';
        $fout.='<div class="col-md-4 col-sm-4">';


        for($i=0;$i<count($query->posts);$i+=3){

            $it = $query->posts[$i];


            $the_src = wp_get_attachment_image_src(get_post_thumbnail_id($it->ID), 'full');
            $thumbnail_src = $the_src[0];


            $day = get_the_date('d',$it->ID);
            $mon = get_the_date('M',$it->ID);

            $fout.='<a href="'.get_permalink($it->ID).'" class="post-feature custom-a">
                                    <div class="the-image" style="background-image: url('.$thumbnail_src.');"></div>
                                    <time>
                                        <div class="the-day h-group-2">'.$day.'</div>
                                        <div class="the-month h-group-1">'.$mon.'</div>
                                    </time>
                                    <h6 class="post-title">
                                        '.$it->post_title.'
                                    </h6>
                                </a>';


        }



        $fout.= '</div>';
        $fout.='<div class="col-md-4 col-sm-4">';


        for($i=1;$i<count($query->posts);$i+=3){

            $it = $query->posts[$i];


            $the_src = wp_get_attachment_image_src(get_post_thumbnail_id($it->ID), 'full');
            $thumbnail_src = $the_src[0];


            $day = get_the_date('d',$it->ID);
            $mon = get_the_date('M',$it->ID);

            $fout.='<a href="'.get_permalink($it->ID).'" class="post-feature custom-a">
                                    <div class="the-image" style="background-image: url('.$thumbnail_src.');"></div>
                                    <time>
                                        <div class="the-day h-group-2">'.$day.'</div>
                                        <div class="the-month h-group-1">'.$mon.'</div>
                                    </time>
                                    <h6 class="post-title">
                                        '.$it->post_title.'
                                    </h6>
                                </a>';


        }



        $fout.= '</div>';
        $fout.='<div class="col-md-4 col-sm-4">';


        for($i=2;$i<count($query->posts);$i+=3){

            $it = $query->posts[$i];


            $the_src = wp_get_attachment_image_src(get_post_thumbnail_id($it->ID), 'full');
            $thumbnail_src = $the_src[0];


            $day = get_the_date('d',$it->ID);
            $mon = get_the_date('M',$it->ID);

            $fout.='<a href="'.get_permalink($it->ID).'" class="post-feature custom-a">
                                    <div class="the-image" style="background-image: url('.$thumbnail_src.');"></div>
                                    <time>
                                        <div class="the-day h-group-2">'.$day.'</div>
                                        <div class="the-month h-group-1">'.$mon.'</div>
                                    </time>
                                    <h6 class="post-title">
                                        '.$it->post_title.'
                                    </h6>
                                </a>';


        }



        $fout.= '</div>';
        $fout.= '</div>';
        $fout.= '</div>';










        $this->shortcode_index++; return $fout;


    }


    function parse_button_style($button_style){




        $button_style = str_replace('``','"',$button_style);

        $button_style_arr = array();

        try{
            $button_style_arr = json_decode($button_style,true);
        }catch(Exception $e){

        }


        if(isset($button_style_arr['style'])==false){
            $button_style_arr['style'] = '';
        }
        if(isset($button_style_arr['padding'])==false){
            $button_style_arr['padding'] = '';
        }
        if(isset($button_style_arr['rounded'])==false){
            $button_style_arr['rounded'] = '';
        }

	    $button_style_arr['style'] = str_replace('color-highlight','style-highlight', $button_style_arr['style']);

        return $button_style_arr;




    }

    function shortcode_antfarm_latest_posts_2($atts=array(), $content = ''){
        $fout = '';


        $margs = array(

            'count'=>'',
            'wpqargs'=>'',
            'read_more_text'=>esc_html__("READ MORE",'antfarm'),
            'custom_thumbnail_height'=>'',
            'nr_per_row'=>'2',
            'button_style'=>'',
            'excerpt_length'=>400,
        );


        if (!isset($atts) || $atts == false) {
            $atts = array();
        }

        $margs = array_merge($margs, $atts);




        $shortcode_index = $this->shortcode_index;





        $button_style_arr = $this->parse_button_style($margs['button_style']);








        /** @var $args */
        $wpqargs = array();

        $wpqargs['post_type']='post';
        $wpqargs['posts_per_page']=$margs['count'];
        $wpqargs['orderby']="date";
        $wpqargs['order']="DESC";


        $margs['excerpt_length']=intval($margs['excerpt_length']);







        // -- start the LOOP
        $args_wpqargs = array();
        // -- lets parse custom wp query args
        $margs['wpqargs'] = html_entity_decode($margs['wpqargs']);
        parse_str($margs['wpqargs'],$args_wpqargs);


        if (!isset($args_wpqargs) || $args_wpqargs == false || is_array($args_wpqargs) == false) {
            $args_wpqargs = array();
        }
        $wpqargs = array_merge($wpqargs,$args_wpqargs);


        $query = new WP_Query($wpqargs);




        $str_items = '';


        $fout.='<div class="antfarm-latest-posts-2">';
        $fout.='<div class="row row-from-antfarm-latest-posts row-from-antfarm-latest-posts-2">';


        $margs['nr_per_row']=intval($margs['nr_per_row']);


        $class = 'col-md-6 col-sm-6';

        if($margs['nr_per_row']==3){
            $class = 'col-md-4 col-sm-4';
        }
        if($margs['nr_per_row']==4){
            $class = 'col-md-3 col-sm-3';
        }


        for($i=0;$i<count($query->posts);$i++){


            if($i && $i%$margs['nr_per_row']==0){
                $fout.='</div>';
                $fout.='<div class="row row-from-antfarm-latest-posts row-from-antfarm-latest-posts-2">';
            }


            $fout.='<div class="'.$class.'">';

            $it = $query->posts[$i];




            $the_src = wp_get_attachment_image_src(get_post_thumbnail_id($it->ID), 'full');






            $thumbnail_src = $the_src[0];







            $day = get_the_date('d',$it->ID);
            $mon = get_the_date('M',$it->ID);


            if($thumbnail_src){

                $fout.='<a href="'.get_permalink($it->ID).'" class="featured-media-con from-generate_featured_media">';
            }


            if($thumbnail_src) {
                if ($margs['custom_thumbnail_height']) {

                    $fout .= '<div class="divimage fullwidth" style="background-image:url(' . $thumbnail_src . '); height:' . $margs['custom_thumbnail_height'] . 'px;"></div>';
                } else {
                    $fout .= '<img alt="image" class="fullwidth" src="' . $thumbnail_src . '"/>';
                }
            }



            $fout.='</a>';




            $fout.= '<div class="post-content-con">';




            $title = $it->post_title;


            if (get_post_meta($it->ID,'qucreative_meta_custom_title',true)) {
                $title = get_post_meta($it->ID,'qucreative_meta_custom_title',true);
            }




            $link = get_permalink($it->ID);







            $fout.= '<div class="post-main-link-con from-q-get-view" style=""><a class="custom-a post-main-link ajax-link h-group-2 donotchange-ajax-menu color-highlight-on-hover" href="'.$link.'">'.$title.'</a></div>';


            if(function_exists('qucreative_get_post_meta')){

                $fout.= qucreative_get_post_meta(array(
                    'post_id'=>$it->ID,
                    'separator'=>', ',
                    'include_posted_on'=>false,
                ));
            }




            $fout.='<hr class="">';


            // -- Include the page content template.
            $fout.= '<div class="paragraph-text paragraph-text-from-latests-posts-2">';
            $my_excerpt = DZSHelpers::wp_get_excerpt($it->ID , array(

            'striptags' => true
            , 'stripshortcodes' => true
            , 'maxlen' => $margs['excerpt_length']
            , 'readmore' => 'on'
            , 'forceexcerpt' => false //if set to true will ignore the manual post excerpt
            ));



            if ( '' != $my_excerpt ) {
                // Some string manipulation performed
            }



            if($margs['read_more_text']){

                $aux = '';

                $aux .= '<div class="read-more-con">';
                $aux .= '<a class="antfarm-btn btn-read-more h6 '.$button_style_arr['style'].' '.$button_style_arr['padding'].' '.$button_style_arr['rounded'].'" href="'.get_permalink($it->ID).'">';
                $aux .= $margs['read_more_text'];
                $aux .= '</a>';
                $aux .= '</div>';

                if(strpos($my_excerpt,'{readmore}')!==false){

                    $my_excerpt = str_replace('{readmore}',$aux,$my_excerpt);
                }else{

                    $my_excerpt .= $aux;
                }
            }else{

                $my_excerpt = str_replace('{readmore}','',$my_excerpt);
            }


            $fout.= $my_excerpt;
            $fout.= '</div>';



            $fout.= '</div>';


            $fout.= '</div>';


        }



        $fout.= '</div>';
        $fout.= '</div>';











        $this->shortcode_index++; return $fout;


    }
    function shortcode_antfarm_video_player($atts=array(), $content = ''){
        $fout = '';


        $margs = array(

            'media'=>'',
            'video_cover'=>'',
            'line1'=>'',
            'line2'=>'',
        );


        if (!isset($atts) || $atts == false) {
            $atts = array();
        }

        $margs = array_merge($margs, $atts);




        $shortcode_index = $this->shortcode_index;


        $src = '';

        if(is_numeric($margs['media'])){


            $src = wp_get_attachment_url( $margs['media'] );

        }else{
            $src = $margs['media'];
        }


        $fout.='<div class="antfarm-video-player vplayer-tobe ';


	    if(defined('QUCREATIVE_VERSION')) {
		    $fout.=' auto-init-from-q';
	    }else{

		    $fout.=' auto-init';
	    }

        $fout.=' " data-src="'.$src.'" style="height: 460px;" data-options=\'\'>';


        if($margs['video_cover']) {

            if (is_numeric($margs['video_cover'])) {
                $bg_url = wp_get_attachment_image_src($margs['video_cover'], 'full');

                $bg_url = $bg_url[0];


            } else {
                $bg_url = $margs['video_cover'];
            }


            $fout .= '
                        <!-- cover image markup -->
                        <div class="cover-image" style="background-image: url(' . $bg_url . '); ">
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


                        ';


            if($margs['line1']){
                $fout.='<div class="big-description">
                                    <h2 class="headline">'.$margs['line1'].'</h2>
                                    ';

                if($margs['line2']) {
                    $fout .= '<h5 class="line2-vp">'.$margs['line2'].'</h5>';
                }

                $fout.='</div>';


            }


            $fout.='</div>
                        <!-- cover image markup END -->
';
        }



        $fout.='</div>';



	    $base_url = $this->base_url;
	    if(defined('QUCREATIVE_THEME_URL')){

		    $base_url = QUCREATIVE_THEME_URL;
	    }


        wp_enqueue_script('antfarm-video-player', $base_url . 'libs/videogallery/vplayer.js');
        wp_enqueue_style('antfarm-video-player', $base_url . 'libs/videogallery/vplayer.css');







        $this->shortcode_index++; return $fout;


    }
    function shortcode_antfarm_audio_player($atts=array(), $content = ''){
        $fout = '';


        $margs = array(

            'media'=>'',
            'title'=>'',
            'links'=>'',
            'inside_gallery'=>"off",
        );


        if (!isset($atts) || $atts == false) {
            $atts = array();
        }

        $margs = array_merge($margs, $atts);



        $shortcode_index = $this->shortcode_index;


        $src = '';

        if(is_numeric($margs['media'])){

            $src = wp_get_attachment_url( $margs['media'] );


        }else{
            $src = $margs['media'];
        }



        $fout.='<div class="antfarm-audioplayer audioplayer-tobe';

        if($margs['inside_gallery']!='on'){


	        if(defined('QUCREATIVE_VERSION')) {
		        $fout.=' auto-init-from-q';
	        }else{

		        $fout.=' auto-init';
	        }

            $fout.='   skin-redlights';
        }

        $fout.='" style=" " data-type="detect" data-source="'.$src.'">
<div class="meta-artist">
<span class="the-artist h6">'.$margs['title'].'</span>
</div>';


        $items = vc_param_group_parse_atts( $margs['links'] );

        if(is_array($items) && count($items)>0 && isset($items[0]['label'])){
            $fout.='<div class="extra-html-in-controls-right">';



            foreach ($items as $it){

                $it_default = array(
                    'link'=>'',
                    'label'=>'',
                    'target'=>'',
                );

                $it= array_merge($it_default, $it);

                $fout.='<a class="btn-zoomsounds custom-a h-group-1"';

                if(isset($it['target']) && $it['target'] == '_blank'){
                    $fout.= ' '.$it['target'];
                }

                $fout.=' href="'.$it['link'].'" >'.$it['label'].'</a>';
            }

        }


        if(is_array($items) && count($items)>0 && isset($items[0]['label'])){
            $fout.='</div>';
        }









        $fout.='</div>';


        $base_url = $this->base_url;
        if(defined('QUCREATIVE_THEME_URL')){

	        $base_url = QUCREATIVE_THEME_URL;
        }
	    wp_enqueue_script('audio.player', $base_url . 'libs/audioplayer/audioplayer.js');
	    wp_enqueue_style('audio.player', $base_url . 'libs/audioplayer/audioplayer.css');






        $this->shortcode_index++; return $fout;


    }
    function shortcode_antfarm_audio_playlist($atts=array(), $content = ''){
        $fout = '';


        $margs = array(

            'media'=>'',
            'title'=>'',
            'links'=>'',
        );


        if (!isset($atts) || $atts == false) {
            $atts = array();
        }

        $margs = array_merge($margs, $atts);




        $shortcode_index = $this->shortcode_index;

        $content = preg_replace("/\[antfarm_audio_player(.*?)\]/", '[antfarm_audio_player inside_gallery="on"$1]', $content);




        $fout.='<div class="antfarm-audioplaylist ag'.$shortcode_index.' audiogallery skin-redlights" style=""><div class="items">';
        $fout .= do_shortcode($content);


        if($content=='' || (strpos($content, 'antfarm_audio_player')===false && strpos($content, 'dzsvcs_audio_player')===false)){
            $fout.=esc_html__("You need to add some audio players");
        }

        $fout.='</div></div>';


	    $base_url = $this->base_url;
	    if(defined('QUCREATIVE_THEME_URL')){

		    $base_url = QUCREATIVE_THEME_URL;
	    }
	    wp_enqueue_script('audio.player', $base_url . 'libs/audioplayer/audioplayer.js');
	    wp_enqueue_style('audio.player', $base_url . 'libs/audioplayer/audioplayer.css');





        $this->shortcode_index++; return $fout;


    }
    function shortcode_progress_bar($atts=array(), $content = ''){
        $fout = '';

        $taxonomy = 'timeline_items_cat';

        $margs = array(

            'style'=>'line',
            'aligment'=>'',
            'section_number'=>'',
            'icon'=>'',
            'title'=>esc_html__("Title",'antfarm'),
            'heading'=>'',
            'progress'=>'50',
            'heading_style'=>'h6',
            'convert_1000_to_k'=>'off',
        );


        if (!isset($atts) || $atts == false) {
            $atts = array();
        }

        $margs = array_merge($margs, $atts);



        $fout = '';



        $h_wrap_start = '<'.$margs['heading_style'].' class="the-variable-heading">';
        $h_wrap_end = '</'.$margs['heading_style'].'>';

        if($margs['heading_style']=='h-group-1'||$margs['heading_style']=='h-group-2'){

            $h_wrap_start = '<h3 class="the-variable-heading '.$margs['heading_style'].'">';
            $h_wrap_end = '</h3>';
        }


        if($margs['style']=='line'){

            $fout='<div class="antfarm-progress-line" data-animation_time="2000" data-maxperc="'.$margs['progress'].'" data-maxnr="100" data-title="'.$margs['title'].'"  data-convert-1000-to-k="'.$margs['convert_1000_to_k'].'"></div>';
        }

        if($margs['style']=='rect'){


            $fout.='<div class="antfarm-progress-rect" data-animation_time="2000" data-maxperc="100" data-maxnr="'.$margs['progress'].'" data-text="'.$margs['title'].'"  data-convert-1000-to-k="'.$margs['convert_1000_to_k'].'">';

            if($margs['icon']){
                $fout.='<div class="'.$margs['icon'].'"></div>';
            }

            $fout.='</div>';
        }




        if($margs['style']=='circle'){

            $fout='<div class="bullet-feature-2">';
            $fout.='<div class="antfarm-progress-circle" data-animation_time="2000" data-maxperc="'.$margs['progress'].'" data-maxnr="100"  data-convert-1000-to-k="'.$margs['convert_1000_to_k'].'"></div>';

            if($margs['title']){
                $fout.=$h_wrap_start.$margs['title'].$h_wrap_end;
                $fout.='<hr class="qucreative-hr-small">';
            }
            if($content){
                $fout.='<p>'.$content.'</p>';
            }


            $fout.='</div>';
        }


        if(defined('QUCREATIVE_THEME_URL')){

            wp_enqueue_script('antfarm-progress-bars', QUCREATIVE_THEME_URL . 'libs/progressbars/progressbars.js');
            wp_enqueue_style('antfarm-progress-bars', QUCREATIVE_THEME_URL . 'libs/progressbars/progressbars.css');
        }
        $this->shortcode_index++; return $fout;


    }




    function shortcode_antfarm_service_lightbox($atts=array(), $content = ''){
        $fout = '';

        $taxonomy = 'timeline_items_cat';

        $margs = array(

            'style'=>'line',
            'icon'=>'',
            'icon_color'=>'',
            'title'=>'',
            'title_1'=>'',
            'content_main'=>'',
            'section_number'=>'',
            'heading'=>'h6',
            'heading_style'=>'h6',
        );


        if (!isset($atts) || $atts == false) {
            $atts = array();
        }

        $margs = array_merge($margs, $atts);



        $h_wrap_start = '<'.$margs['heading_style'].' class="the-variable-heading">';
        $h_wrap_end = '</'.$margs['heading_style'].'>';

        if($margs['heading_style']=='h-group-1'||$margs['heading_style']=='h-group-2'){

            $h_wrap_start = '<h3 class="the-variable-heading '.$margs['heading'].'">';
            $h_wrap_end = '</h3>';
        }



        $fout = '';

        if($margs['title_1']){
            $fout.='<a href="#" class=" services-lightbox bullet-feature  service-lightbox custom-a align-center">';
        }else{

            $fout.='<div class="  bullet-feature service-lightbox align-center">';
        }


        $fout.='<div class="icon-con" style="';


        if($margs['icon_color']){
            $fout.=' color: '.$margs['icon_color'].';';
        }

        $fout.='">

                                        <div class="'.$margs['icon'].'">

                                        </div>
                                    </div>';


        $fout.='<div class="antfarm-service-lightbox feature-content">
                                        
                                    '.$h_wrap_start.$margs['title'].$h_wrap_end.'
                                        <hr class="qucreative-hr-small">
                                        <p class="paragraph-text ">'.$margs['content_main'].'</p>
                                    </div>';





        // -- not sure if paragraph text is font-group-9
        if($margs['title_1']) {
            $fout .= '<div class="lightbox-content">';
            $fout.='<div class="icon-con">

                                            <div class="' . $margs['icon'] . '">

                                            </div>
                                        </div>';


            if($margs['title_lightbox']){
                $fout.='<h2 class="">'.$margs['title_lightbox'].'</h2>
<br>';
            }

            $fout.='<div class="row">';
            if($margs['columns']=='2'){
                $fout.='<div class="col-md-6">';
            }else{

                $fout.='<div class="col-md-12">';
            }






            $fout.='<h6>'.$margs['title_1'].'</h6>';

            if($margs['content_1']){
                $fout.='<p>'.$margs['content_1'].'</p>';
            }



            $fout.='</div><!-- end col-md -->';


            if($margs['columns']=='2'){

                $fout.='<div class="col-md-6">';
                if($margs['title_2']){
                    $fout.='<h6>'.$margs['title_2'].'</h6>';
                }
                if($margs['content_2']){
                    $fout.='<p>'.$margs['content_2'].'</p>';
                }
                $fout.='</div><!-- end col-md -->';
            }





            $fout.='</div>';







            $fout.='</div>';
        }





        if($margs['title_1']){
            $fout.='</a>';
        }else{

            $fout.='</div>';
        }

        $this->shortcode_index++; return $fout;


    }
    function shortcode_antfarm_call_to_action($atts=array(), $content = ''){
        $fout = '';

        $taxonomy = 'timeline_items_cat';

        $margs = array(

            'title'=>'',
            'content'=>'',
            'button_style'=>'',
            'box_width'=>'',
            'read_more_link'=>'#',
            'heading'=>'h-group-2',
            'read_more_text'=>esc_html__("READ MORE"),
        );


        if (!isset($atts) || $atts == false) {
            $atts = array();
        }

        $margs = array_merge($margs, $atts);


        $h_wrap_start = '<'.$margs['heading'].' class="the-variable-heading">';
        $h_wrap_end = '</'.$margs['heading'].'>';

        if($margs['heading']=='h-group-1'||$margs['heading']=='h-group-2'){

            $h_wrap_start = '<h3 class="the-variable-heading '.$margs['heading'].'">';
            $h_wrap_end = '</h3>';
        }





        $fout = '<div class="antfarm-call-to-action call-to-action-con-con">';


        $fout.='<div class="call-to-action-shadow">
                                    <div class="shadow-left">

                                    </div>
                                    <div class="shadow-right">

                                    </div>
                                </div>';


        $fout .= '<div class="call-to-action-con">';


        $fout.='
<div class="call-to-action">
<div class="call-to-action--inner" style="';



        if($margs['box_width']){
            $fout.=' max-width: '.$margs['box_width'].'px; padding-left:0; padding-right:0; margin-left: auto; margin-right: auto;';
        }

        $fout.='">
    '.$h_wrap_start.$margs['title'].$h_wrap_end.'
    <hr class="qucreative-hr-small">
    <div class="the-call-text  font-group-9" style="';


        if($margs['box_width']){
            $fout.=' padding-left:0; padding-right:0;';
        }

        $fout.='">'.do_shortcode($content).'</div>
    <div class="read-more-con">
        ';


        $button_style_arr = $this->parse_button_style($margs['button_style']);



        $args = array_merge($margs, $button_style_arr);


        $args['read_more_link']=$margs['read_more_link'];
        $args['read_more']=$margs['read_more_text'];
        $fout.=$this->icon_box_generate_read_more_con($args);





        $fout.='
    </div>
    </div>
    </div>
</div>
</div>';




        $this->shortcode_index++; return $fout;


    }





    function shortcode_sc_call_to_action($atts=array(), $content = ''){
        $fout = '';

        $taxonomy = 'timeline_items_cat';

        $margs = array(

            'title'=>'',
            'content'=>'',
            'bg'=>'',
            'box_width'=>'',

            'read_more_text'=>esc_html__("READ MORE"),
            'read_more_link'=>'#',
            'heading'=>'h-group-2',
            'heading_style'=>'h-group-2',
            'button_style'=>'',

            'container_class'=>'qucreative-secondary-content  antfarm-sc-call-to-action flex-for-sc-con',
            'overlay_opacity'=>'50',
        );


        if (!isset($atts) || $atts == false) {
            $atts = array();
        }

        $margs = array_merge($margs, $atts);



        $h_wrap_start = '<'.$margs['heading'].' class="the-variable-heading">';
        $h_wrap_end = '</'.$margs['heading'].'>';

        if($margs['heading']=='h-group-1'||$margs['heading']=='h-group-2'){

            $h_wrap_start = '<h3 class="the-variable-heading '.$margs['heading'].'">';
            $h_wrap_end = '</h3>';
        }




        $bg_url = $this->sanitize_id_to_src($margs['bg']);





        $overlay_opacity = floatval($margs['overlay_opacity'])/100;


        $fout.=$this->section_start($margs);


        $fout.='<!-- section featured media - video  -->
                <div class="featured-media-con as-background" style="">
                <div class="featured-media--image divimage" style="background-image: url('.$bg_url.');  ';

        if(strpos($margs['bg'],'#')===0){
            $fout.=' background-color: '.$margs['bg'].';';
        }

        $fout.='"></div>
                        <div class="semi-black-overlay opaque" style="background-color: rgba(0,0,0,'.$overlay_opacity.');"></div>
            </div>';


        $fout .= '<div class="call-to-action-con flex-for-sc';


        if($margs['box_width']){
            $fout.=' custom-box-width';
        }

        $fout.=' " style=" ';





        if($margs['box_width']){
            $fout.=' max-width: '.$margs['box_width'].'px; padding-left:0; padding-right:0; margin-left: auto; margin-right: auto;';
        }







        $fout.='" >
<div class="call-to-action ">
    '.$h_wrap_start.$margs['title'].$h_wrap_end.'
    <hr class="qucreative-hr-small">
    <div class="the-call-text ';


        if($margs['box_width']){
            $fout.=' custom-box-width';
        }


        $fout.=' font-group-9">'.do_shortcode($content).'</div>';

        if(isset($margs['read_more_text']) && $margs['read_more_text']){

            $fout.='
   <div class="read-more-con">
        ';


        $button_style_arr = $this->parse_button_style($margs['button_style']);


        $fout .= '<a class="custom-a antfarm-btn btn-read-more h6 '.$button_style_arr['style'].' '.$button_style_arr['padding'].' '.$button_style_arr['rounded'].'" href="'.$margs['read_more_link'].'">';
        $fout .= $margs['read_more_text'];
        $fout .= '</a>';


        $fout.='
</div>';
        }

        $fout.='
</div>';



        $fout.=$this->section_end($margs);



        $this->shortcode_index++; return $fout;


    }



    function sanitize_id_to_src($arg){


        if(is_numeric($arg)){

            $imgsrc = wp_get_attachment_image_src($arg, 'full');


            return $imgsrc[0];
        }else{
            return $arg;
        }


    }


    function shortcode_sc_blockquote($atts=array(), $content = ''){
        $fout = '';


        $margs = array(

            'title'=>'',
            'content'=>'',
            'bg'=>'',
            'box_width'=>'',
            'author'=>'',
            'heading_style'=>'h6',
            'container_class'=>'qucreative-secondary-content antfarm-sc-blockquote ',
            'overlay_opacity'=>'50',
        );


        if (!isset($atts) || $atts == false) {
            $atts = array();
        }

        $margs = array_merge($margs, $atts);



        $h_wrap_start = '<'.$margs['heading_style'].' class="the-variable-heading the-author">';
        $h_wrap_end = '</'.$margs['heading_style'].'>';

        if($margs['heading_style']=='h-group-1'||$margs['heading_style']=='h-group-2'){

            $h_wrap_start = '<h3 class="the-variable-heading  the-author '.$margs['heading_style'].'">';
            $h_wrap_end = '</h3>';
        }





        $bg_url = $this->sanitize_id_to_src($margs['bg']);






        if(strpos($margs['bg'],'#')===0){
            $bg_url = $margs['bg'];
        }





        $overlay_opacity = floatval($margs['overlay_opacity'])/100;

        $fout.=$this->section_start($margs);


        $fout.='
                <!-- section featured media - video  -->
                <div class="featured-media-con as-background" style="">
                <div class="featured-media--image divimage" style="background-image: url('.$bg_url.'); ';

        if(strpos($margs['bg'],'#')===0){
            $fout.=' background-color: '.$margs['bg'].';';
        }

        $fout.='"></div>
                        <div class="semi-black-overlay opaque" style="background-color: rgba(0,0,0,'.$overlay_opacity.');"></div>
            </div>';




        $fout .= '<div class="q-quote flex-for-sc">
        <div class="quote-icon"><i class="fa fa-quote-right"></i></div>

    ';




        $fout.='<div class="h4 the-quote" style="';



        if($margs['box_width']){
            $fout.=' max-width: '.$margs['box_width'].'px; padding-left:0; padding-right:0; margin-left: auto; margin-right: auto;';
        }


        $fout.='">'.$content.'</div>';

        $fout.='
    <div class="author-con">
     '.$h_wrap_start.'<i class="fa fa-long-arrow-right"></i> <span class="the-text">'.$margs['author'].'</span>'.$h_wrap_end.'  
    </div>
';




        $fout.=$this->section_end($margs);



        $this->shortcode_index++; return $fout;


    }





    function shortcode_sc_video_text($atts=array(), $content = ''){
        $fout = '';


        $margs = array(

            'title'=>'',
            'content'=>'',
            'bg'=>'',
            'author'=>'',
            'featured_media_type'=>'video',
            'image'=>'',
            'video'=>'',
            'media_video'=>'',
            'image_alt'=>'',
            'video_cover'=>'',
            'heading'=>'h5',
            'caption_aligment'=>'text-right',
            'overlay_opacity'=>'50',
            'container_class'=>'qucreative-secondary-content antfarm-sc-video-text',
        );


        if (!isset($atts) || $atts == false) {
            $atts = array();
        }

        $margs = array_merge($margs, $atts);

        global $qucreative_theme_data;


        $h_wrap_start = '<'.$margs['heading'].' class="title-con the-variable-heading">';
        $h_wrap_end = '</'.$margs['heading'].'>';

        if($margs['heading']=='h-group-1'||$margs['heading']=='h-group-2'){

            $h_wrap_start = '<h3 class="title-con the-variable-heading '.$margs['heading'].'">';
            $h_wrap_end = '</h3>';
        }


        if($margs['video']){
            $margs['media_video'] = $margs['video'];
        }



        $bg_url = $this->sanitize_id_to_src($margs['bg']);





        $overlay_opacity = floatval($margs['overlay_opacity'])/100;




        $fout.=$this->section_start($margs);

        $fout.='
                <!-- section featured media - video  -->
                <div class="featured-media-con as-background" style="">
                <div class="featured-media--image divimage" style="background-image: url('.$bg_url.'); ';

        if(strpos($margs['bg'],'#')===0){
            $fout.=' background-color: '.$margs['bg'].';';
        }

        $fout.=' "></div>
<div class="semi-black-overlay opaque" style="background-color: rgba(0,0,0,'.$overlay_opacity.');"></div>
</div>';




        $fout .= '<div class="flex-for-sc antfarm-video-text  '.$margs['caption_aligment'].' featured-media-type-'.$margs['featured_media_type'].'">';


        $fout.='<div class="row row-width row-inline">';








        $col_feature = '<div class="col-md-6">';





        





        if($margs['featured_media_type']=='video'){





            if(is_numeric($margs['media_video'])){



                $src = wp_get_attachment_url( $margs['media_video'] );


            }else{
                $src = $margs['media_video'];
            }

            $col_feature.='<div class="vplayer-tobe ';


	        if(defined('QUCREATIVE_VERSION')) {
		        $col_feature.=' auto-init-from-q';
	        }else{

		        $col_feature.=' auto-init';
	        }

            $col_feature.='" data-src="'.$src.'" style="height: auto;';


                $col_feature.=' max-height:'.($qucreative_theme_data['secondary_content_height']-60).'px;';


            $col_feature.='" data-options=\'\'  data-responsive_ratio="detect">';


            if($margs['video_cover']){


                $bg_url = $this->sanitize_id_to_src($margs['video_cover']);


                $col_feature.='<!-- OPTIONAL cover image markup -->
<div class="cover-image" style="background-image: url('.$bg_url.'); ">
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

                                    </div>
                                    <!-- cover image markup END -->';
            }


            $col_feature.='</div>';



            if(defined("QUCREATIVE_THEME_URL")){

	            wp_enqueue_script('antfarm-video-player', QUCREATIVE_THEME_URL . 'libs/videogallery/vplayer.js');
	            wp_enqueue_style('antfarm-video-player', QUCREATIVE_THEME_URL . 'libs/videogallery/vplayer.css');
            }else{

	            wp_enqueue_script('antfarm-video-player', $this->base_url . 'libs/videogallery/vplayer.js');
	            wp_enqueue_style('antfarm-video-player', $this->base_url . 'libs/videogallery/vplayer.css');
            }


        }




        if($margs['featured_media_type']=='image'){



            $col_feature.='<img src="'.$margs['image'].' " class="" alt="'.$margs['image_alt'].'"/>';
        }




        $col_feature.='</div>';





        $col_text = '<div class="col-md-6">';

        $col_text.=''.$h_wrap_start.$margs['title'].$h_wrap_end.' <hr class="qucreative-hr-small">
   
<div class="paragraph-text font-group-8">'.wpautop(do_shortcode($content)).'</div>
';




        $col_text.='</div>';







        if($margs['caption_aligment']=='text-right'){

            $fout.=$col_feature;
            $fout.=$col_text;
        }else{

            $fout.=$col_text;
            $fout.=$col_feature;
        }




        $fout.='</div>';
        $fout.='</div>';





        $fout.=$this->section_end($margs);



        $this->shortcode_index++; return $fout;


    }


    function convert_media_to_url($arg){

        if (is_numeric($arg)) {
            $bg_url = wp_get_attachment_image_src($arg, 'full');

            $bg_url = $bg_url[0];

        } else {
            $bg_url = $arg;
        }

        return $bg_url;
    }



    function shortcode_sc_three_cols($atts=array(), $content = ''){
        $fout = '';


        $margs = array(

            'title'=>'',
            'title_1'=>'',
            'title_2'=>'',
            'title_3'=>'',
            'content_1'=>'',
            'content_2'=>'',
            'content_3'=>'',
            'read_more_link_1'=>'',
            'read_more_link_2'=>'',
            'read_more_link_3'=>'',
            'read_more_text_1'=>'',
            'read_more_text_2'=>'',
            'read_more_text_3'=>'',
            'content'=>'',
            'bg'=>'',
            'bg_1'=>'',
            'bg_2'=>'',
            'bg_3'=>'',
            'button_style_1'=>'{"style":"style-hallowred","padding":"padding-medium","rounded":"rounded"}',
            'button_style_2'=>'{"style":"style-hallowred","padding":"padding-medium","rounded":"rounded"}',
            'button_style_3'=>'{"style":"style-hallowred","padding":"padding-medium","rounded":"rounded"}',
            'author'=>'',
            'video'=>'',
            'video_cover'=>'',
            'box_width'=>'',
            'heading'=>'h5',
            'overlay_opacity'=>'50',
            'overlay_opacity_1'=>'50',
            'overlay_opacity_2'=>'50',
            'overlay_opacity_3'=>'50',
            'container_class'=>'qucreative-secondary-content antfarm-sc-three-columns',
        );


        if (!isset($atts) || $atts == false) {
            $atts = array();
        }

        $margs = array_merge($margs, $atts);




        $h_wrap_start = '<'.$margs['heading'].' class="title-con the-variable-heading">';
        $h_wrap_end = '</'.$margs['heading'].'>';

        if($margs['heading']=='h-group-1'||$margs['heading']=='h-group-2'){

            $h_wrap_start = '<h3 class="title-con the-variable-heading '.$margs['heading'].'">';
            $h_wrap_end = '</h3>';
        }










        $fout.=$this->section_start($margs);



        $fout.='<div class="flex-columns-eh">';

        $overlay_opacity = floatval($margs['overlay_opacity'])/100;


        if($margs['bg_1'] || $margs['title_1']){

            $bg_url = '';


            $bg_url = $this->convert_media_to_url($margs['bg_1']);


            $fout.='<div class="flex-section';


            if($margs['box_width']){
                $fout.=' custom-box-width';
            }

            $fout.='">';


            $bg_style = 'background-image: url('.$bg_url.'); ';

            if(strpos($bg_url,'#')===0){

                $bg_style = 'background-color: '.$bg_url.'; ';
            }

            $fout.='
                <!-- section featured media - video  -->
<div class="featured-media-con as-background" style="">
                <div class="featured-media--image divimage" style="'.$bg_style.'"></div>';


            if(strpos($bg_url,'#')===0){

            }else{

                $overlay_opacity = floatval($margs['overlay_opacity_1'])/100;

                $fout.='<div class="semi-black-overlay opaque"  style="background-color: rgba(0,0,0,'.$overlay_opacity.');"></div>';
            }



            $fout.='</div>';


            $fout.='<div class="position-relative antfarm-sc-three-cols-box" style="';


            if($margs['box_width']){
                $fout.=' max-width: '.$margs['box_width'].'px;     margin: 0 auto;';
            }

            $fout.='">';


            if($margs['title_1'] || $margs['content_1']){

                $fout.=''.$h_wrap_start.$margs['title_1'].$h_wrap_end.' <hr class="qucreative-hr-small">
   
<div class="the-desc font-group-8">'.do_shortcode($margs['content_1']).'</div>
';
            }


            if($margs['read_more_text_1']){
                $fout.='<div class="button-con">';




                $button_style_arr = $this->parse_button_style($margs['button_style_1']);











                $args = array_merge($margs, $button_style_arr);


                $args['read_more_link']=$margs['read_more_link_1'];
                $args['read_more']=$margs['read_more_text_1'];



                $fout.=$this->icon_box_generate_read_more_con($args);






                $fout.='</div>';
            }



            $fout.='</div>';
            $fout.='</div>';


        }
        if($margs['bg_2'] || $margs['title_2']){

            $bg_url = $this->convert_media_to_url($margs['bg_2']);


            $fout.='<div class="flex-section';


            if($margs['box_width']){
                $fout.=' custom-box-width';
            }

            $fout.='">';


            $bg_style = 'background-image: url('.$bg_url.'); ';

            if(strpos($bg_url,'#')===0){

                $bg_style = 'background-color: '.$bg_url.'; ';
            }





            $fout.='
                <!-- section featured media - video  -->
<div class="featured-media-con as-background" style="">
                <div class="featured-media--image divimage" style="'.$bg_style.'"></div>';


            if(strpos($bg_url,'#')===0){

            }else{

                $overlay_opacity = floatval($margs['overlay_opacity_2'])/100;

                $fout.='<div class="semi-black-overlay opaque" style="background-color: rgba(0,0,0,'.$overlay_opacity.');"></div>';
            }



            $fout.='</div>';





            $fout.='<div class="position-relative antfarm-sc-three-cols-box" style="';


            if($margs['box_width']){
                $fout.=' max-width: '.$margs['box_width'].'px;     margin: 0 auto;';
            }

            $fout.='">';

            if($margs['title_2'] || $margs['content_2']) {
                $fout .= '' . $h_wrap_start . $margs['title_2'] . $h_wrap_end . ' <hr class="qucreative-hr-small">
   
<div class="the-desc font-group-8">' . do_shortcode($margs['content_2']) . '</div>
';
            }



            if($margs['read_more_text_2']){
                $fout.='<div class="button-con">';



                $button_style_arr = $this->parse_button_style($margs['button_style_2']);




                $args = array_merge($margs, $button_style_arr);


                $args['read_more_link']=$margs['read_more_link_2'];
                $args['read_more']=$margs['read_more_text_2'];



                $fout.=$this->icon_box_generate_read_more_con($args);


                $fout.='</div>';
            }


            $fout.='</div>';
            $fout.='</div>';


        }
        if($margs['bg_3'] ||  $margs['title_3']){

            $bg_url = $this->convert_media_to_url($margs['bg_3']);


            $fout.='<div class="flex-section';


            if($margs['box_width']){
                $fout.=' custom-box-width';
            }

            $fout.='">';


            $bg_style = 'background-image: url('.$bg_url.'); ';

            if(strpos($bg_url,'#')===0){

                $bg_style = 'background-color: '.$bg_url.'; ';
            }




            $fout.='
                <!-- section featured media - video  -->
<div class="featured-media-con as-background" style="">
                <div class="featured-media--image divimage" style="'.$bg_style.'"></div>';


            if(strpos($bg_url,'#')===0){

            }else{

                $overlay_opacity = floatval($margs['overlay_opacity_3'])/100;

                $fout.='<div class="semi-black-overlay opaque" style="background-color: rgba(0,0,0,'.$overlay_opacity.');"></div>';
            }



            $fout.='</div>';





            $fout.='<div class="position-relative antfarm-sc-three-cols-box" style="';


            if($margs['box_width']){
                $fout.=' max-width: '.$margs['box_width'].'px;     margin: 0 auto;';
            }

            $fout.='">';

            if($margs['title_3'] || $margs['content_3']) {
                $fout .= '' . $h_wrap_start . $margs['title_3'] . $h_wrap_end . ' <hr class="qucreative-hr-small">
   
<div class="the-desc font-group-8">' . do_shortcode($margs['content_3']) . '</div>
';
            }



            if($margs['read_more_text_3']){
                $fout.='<div class="button-con">';



                $button_style_arr = $this->parse_button_style($margs['button_style_3']);



                $args = array_merge($margs, $button_style_arr);


                $args['read_more_link']=$margs['read_more_link_3'];
                $args['read_more']=$margs['read_more_text_3'];



                $fout.=$this->icon_box_generate_read_more_con($args);




                $fout.='</div>';
            }


            $fout.='</div>';
            $fout.='</div><!-- end last flex section --> ';


        }
        $fout.='</div><!-- end flex-columns-eh --> ';



        $fout.=$this->section_end($margs);



        $this->shortcode_index++; return $fout;


    }


    function section_start($margs){



        $fout = '';




        $container_class = '';

        if(isset($margs['container_class'])){
            $container_class = $margs['container_class'];
        }

        $fout.='<div class="'.$container_class.'" style="';


        if(isset($margs['container_class']) && strpos($margs['container_class'],'sc-testimonials')!==false){

            $secondary_content_height = '300';

            if(get_theme_mod('secondary_content_height')){
                $secondary_content_height = get_theme_mod('secondary_content_height');
            }

            $fout.=' height: '.$secondary_content_height.'px';
        }

        $fout.='">';






        return $fout;


    }


    function section_end($margs){



        $fout = '';





        $fout = '';
        $fout.='</div>';

        return $fout;


    }

    function shortcode_sc_video($atts=array(), $content = ''){
        $fout = '';

        $taxonomy = 'timeline_items_cat';

        $margs = array(

            'media'=>'',
            'video_cover'=>'',
            'line1'=>'',
            'line2'=>'',
            'shortcode'=>'sc_video',
            'heading_style_line_1'=>'h5',
            'heading_style_line_2'=>'h2',
            'container_class'=>'qucreative-secondary-content antfarm-sc-video',
        );


        if (!isset($atts) || $atts == false) {
            $atts = array();
        }

        $margs = array_merge($margs, $atts);




        $fout = '';


        $fout.=$this->section_start($margs);




        $src = '';
        if(is_numeric($margs['media'])){


            $src = wp_get_attachment_url( $margs['media'] );

        }else{
            $src = $margs['media'];
        }


        $bg_url = '';
        if($margs['video_cover']) {


        }

        $fout.='


                <!-- section featured media - video  -->
                <div class="featured-media-con is-real-content" style="height: auto;">

                    <!-- video player markup -->
                    <div class="vplayer-tobe ';


	    if(defined('QUCREATIVE_VERSION')) {
		    $fout.=' auto-init-from-q';
	    }else{

		    $fout.=' auto-init';
	    }

        $fout.='" data-src="'.$src.'"  style="" data-options=\'\' data-responsive_ratio="0.5625">

';

        if($margs['video_cover']) {

            if (is_numeric($margs['video_cover'])) {
                $bg_url = wp_get_attachment_image_src($margs['video_cover'], 'full');

                $bg_url = $bg_url[0];

            } else {
                $bg_url = $margs['video_cover'];
            }


            $fout .= '
                        <!-- cover image markup -->
                        <div class="cover-image" style="background-image: url(' . $bg_url . '); ">
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


                        ';


            if($margs['line1']){











                $lab = 'heading_style_line_1';
                $h_wrap_start = '<'.$margs[$lab].' class="line2-vp the-variable-heading-title">';
                $h_wrap_end = '</'.$margs[$lab].'>';

                if($margs[$lab]=='h-group-1' || $margs[$lab]=='h-group-2'){

                    $h_wrap_start = '<h3 class="social-heading line2-vp the-variable-heading-title '.$margs[$lab].'">';
                    $h_wrap_end = '</h3>';
                }



                $fout.='<div class="big-description">'.$h_wrap_start.$margs['line1'].$h_wrap_end.'
                                    ';

                if($margs['line2']) {


                    $lab = 'heading_style_line_2';
                    $h_wrap_start = '<'.$margs[$lab].' class="headline the-variable-heading-title">';
                    $h_wrap_end = '</'.$margs[$lab].'>';

                    if($margs[$lab]=='h-group-1' || $margs[$lab]=='h-group-2'){

                        $h_wrap_start = '<h3 class="headline the-variable-heading-title '.$margs[$lab].'">';
                        $h_wrap_end = '</h3>';
                    }

                    $fout .= ''.$h_wrap_start.$margs['line2'].$h_wrap_end.'';
                }

                $fout.='</div>';


            }


            $fout.='</div>
                        <!-- cover image markup END -->
';
        }


        $fout.='</div>

                ';





        $fout.=$this->section_end($margs);



        wp_enqueue_script('antfarm-video-player', $this->base_url . 'libs/videogallery/vplayer.js');
        wp_enqueue_style('antfarm-video-player', $this->base_url . 'libs/videogallery/vplayer.css');



        $this->shortcode_index++; return $fout;


    }


    function shortcode_sc_contact_form($atts=array(), $content = ''){
        $fout = '';

        $taxonomy = 'timeline_items_cat';

        $margs = array(

            'media'=>'',
            'bg'=>'',
            'email_target'=>'',
            'translate_send_message'=>'',
            'overlay_opacity'=>'50',
            'container_class'=>'qucreative-secondary-content  antfarm-sc-contact-form',
        );


        if (!isset($atts) || $atts == false) {
            $atts = array();
        }

        $margs = array_merge($margs, $atts);



        if($margs['translate_send_message']==''){
            $margs['translate_send_message'] = esc_html__("SEND MESSAGE",'quele');
        }else{

            $margs['translate_send_message'] = esc_html__($margs["translate_send_message"],'quele');
        }




        $fout = '';

        $bg_url = $this->sanitize_id_to_src($margs['bg']);






        $fout.=$this->section_start($margs);



        $overlay_opacity = floatval($margs['overlay_opacity'])/100;

        $fout.='
                    <div class="featured-media-con featured-media-absolute" style=" height: 100%">

                        <div class="featured-media--image divimage" style="background-image: url('.$bg_url.'); ';

        if(strpos($margs['bg'],'#')===0){
            $fout.=' background-color: '.$margs['bg'].';';
        }

        $fout.=' "></div>
                    </div>

                        <div class="semi-black-overlay opaque" style="background-color: rgba(0,0,0,'.$overlay_opacity.');"></div>
<div class="flex-for-sc">
                    <form method="post" action="?action=antfarm_contact_form" class=" contact-form shortcode-antfarm-contact for-contact">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="social-meta-con">

<div class="flex-con">
                                    <h6 class="the-variable-heading">'.esc_html__("SEND US A").'</h6>
                                    <span class="social-circle-con"><i class="fa fa-envelope"></i></span>
                                    </div>

                                    ';


        $fout.='<hr>';




        $fout.='<h4>'.esc_html__("Message").'</h4>

                                </div>
                            </div>
                            <button class="btn-full-white custom-color contact-form-button h6">'.$margs['translate_send_message'].'</button>
                            <div class="col-md-9">
                                <div class="row smaller-padding">
                                    <div class="col-md-6">

                                        <input type="text" name="name" class="input-for-name font-group-5" placeholder="'.esc_html__("Name").'..."/>
                                    </div>
                                    <div class="col-md-6">

                                        <input type="text" name="email" class="input-for-email font-group-5" placeholder="'.esc_html__("Email").'..."/>
                                    </div>
                                </div>
                                <div class="clear"></div>
                                <textarea name="message" class="input-for-feedback font-group-5" placeholder="'.esc_html__("Feedback").'..."></textarea>

                                <div class="form-feedback">'.esc_html__("THANK YOU, YOUR MESSAGE HAS BEEN SENT").'</div>
                            </div>
                        </div>
                    </form>
                    </div>

            <!-- section END -->
            ';


        $fout.=$this->section_end($margs);





        $this->shortcode_index++; return $fout;


    }
    function shortcode_sc_contact_box($atts=array(), $content = ''){
        $fout = '';

        $taxonomy = 'timeline_items_cat';

        $margs = array(

            'media'=>'',
            'bg'=>'',
            'lat'=>'',
            'long'=>'',
            'email_target'=>'',
            'view_map_str'=>esc_html__("VIEW MAP"),
            'overlay_opacity'=>'60',
            'container_class'=>'qucreative-secondary-content antfarm-sc-contact-box',
        );


        if (!isset($atts) || $atts == false) {
            $atts = array();
        }

        $margs = array_merge($margs, $atts);


        global $qucreative_theme_data;


        $fout = '';

        $bg_url = $this->sanitize_id_to_src($margs['bg']);



        $fout.=$this->section_start($margs);





        $contact_info = $content.'<hr>
                            
';

        $overlay_opacity = floatval($margs['overlay_opacity'])/100;




        $titles = vc_param_group_parse_atts( $margs['titles'] );
        foreach($titles as $ti){



            $link = '#';

            if(isset($ti['link'])){
                $link = $ti['link'];
            }

            $faicon = 'thumbs-up';

            if(isset($ti['faicon'])){
                $faicon = $ti['faicon'];
            }

            $contact_info.='<a href="'.$link.'"  class="social-circle-con"><i class="fa fa-'.$faicon.'"></i></a> ';
        }












            $qucreative_theme_data['footer_big_map_str'].='<div class="map-canvas-con">

        <div id="map-canvas" class="map-canvas big-map" data-lat="'.$margs['lat'].'" data-long="'.$margs['long'].'"></div>
        <div class="contact-info">
            '.$contact_info.'



            <div class="services-lightbox--close map-hide"><i class="fa fa-times"></i></div>

        </div>

    </div><!--end map canvas con-->';


        $fout.='

                   <div class="featured-media-con contact-featured-media-con">

                        <div class="featured-media--image divimage" style="background-image: url('.$bg_url.');  ';

        if(strpos($margs['bg'],'#')===0){
            $fout.=' background-color: '.$margs['bg'].';';
        }

        $fout.='"></div>
        

                    <div class="contact-info"  style="background-color: rgba(0,0,0,'.$overlay_opacity.');">
                            '.$contact_info.'
                            


                        </div>
                        <div class="view-map-overflower">
                            <div class="map-toggler map-show"><span class="h6 custom-color">'.$margs['view_map_str'].'</span></div>
                        </div>
                    </div>
                    ';


        $fout.=$this->section_end($margs);




        wp_enqueue_script('gmaps','https://maps.googleapis.com/maps/api/js?key='.get_theme_mod('gmaps_api_key'));


        $this->shortcode_index++; return $fout;


    }


    function shortcode_sc_small_map($atts=array(), $content = ''){
        $fout = '';


        $margs = array(

            'media'=>'',
            'bg'=>'',
            'lat'=>'',
            'long'=>'',
            'email_target'=>'',
            'view_map_str'=>'',
            'button_style'=>'',
            'map_width'=>'',
            'map_margin_left'=>'',
            'heading_style'=>'h6',
            'container_class'=>'qucreative-secondary-content secondary-content--mini-gmaps',
        );


        if (!isset($atts) || $atts == false) {
            $atts = array();
        }

        $margs = array_merge($margs, $atts);




        $fout = '';

        $bg_url = $this->sanitize_id_to_src($margs['bg']);



        $h_wrap_start = '<'.$margs['heading_style'].' class="the-variable-heading">';
        $h_wrap_end = '</'.$margs['heading_style'].'>';

        if($margs['heading_style']=='h-group-1'||$margs['heading_style']=='h-group-2'){

            $h_wrap_start = '<h3 class="the-variable-heading '.$margs['heading_style'].'">';
            $h_wrap_end = '</h3>';
        }







        $contact_info = $content.'<hr>
                            
';


        $fout.=$this->section_start($margs);







        ;

        $fout.=' <div class="map-canvas featured-media-con featured-media-absolute " style="" data-lat="'.$margs['lat'].'" data-long="'.$margs['long'].'">


                    </div>


                    <!-- description and contact button markup -->
                    <div class="flex-for-sc">
                    <div class="block-contact--floater" style="';

        if($margs['map_width']){
            $fout.=' max-width: '.$margs['map_width'].'px; ';
        }
        if($margs['map_margin_left']){
            $fout.=' margin-left: '.$margs['map_margin_left'].'px; ';
        }

        $fout.='"> <div class="social-meta-con social-meta-con--for-secondary-contact">';





        $fout.=''.$h_wrap_start.$margs['heading_text'].$h_wrap_end.'';




        $fout.='<span class="social-circle-con"><i class="fa fa-map-marker"></i></span>
                            <div class="clear"></div>

                            <hr>
                            <h4>'.$margs['content_text'].'</h4>

                        </div>
                        <div class="read-more-con">';








                            $fout.='<a href="'.$margs['button_link'].'" class="antfarm-btn btn-read-more custom-a style-black padding-medium h6">'.$margs['button_text'].'</a>';
                        $fout.='</div>
                    </div>
                    </div>
                    <!-- description and contact button markup END -->


                    <div class="clear"></div>';


        $fout.=$this->section_end($margs);



        wp_enqueue_script('gmaps','https://maps.googleapis.com/maps/api/js?key='.get_theme_mod('gmaps_api_key'));


        $this->shortcode_index++; return $fout;


    }
    function shortcode_sc_progress($atts=array(), $content = ''){
        $fout = '';

        $taxonomy = 'timeline_items_cat';

        $margs = array(

            'media'=>'',
            'bg'=>'',
            'overlay_opacity'=>'50',
            'progress_1'=>'100',
            'progress_2'=>'200',
            'progress_3'=>'300',
            'progress_4'=>'400',
            'title_1'=>'',
            'title_2'=>'',
            'title_3'=>'',
            'title_4'=>'',
            'eticon_1'=>'',
            'eticon_2'=>'',
            'eticon_3'=>'',
            'eticon_4'=>'',
            'heading_style'=>'h6',
            'heading_style_number'=>'h2',
            'convert_1000_to_k'=>'off',
            'container_class'=>'qucreative-secondary-content secondary-content--team-achievements',
        );


        if (!isset($atts) || $atts == false) {
            $atts = array();
        }

        $margs = array_merge($margs, $atts);







        $h_wrap_start = '<'.$margs['heading_style'].' class="the-variable-heading">';
        $h_wrap_end = '</'.$margs['heading_style'].'>';

        if($margs['heading_style']=='h-group-1'||$margs['heading_style']=='h-group-2'){

            $h_wrap_start = '<h3 class="the-variable-heading '.$margs['heading_style'].'">';
            $h_wrap_end = '</h3>';
        }







        $h_tag = 'h2';
        $h_class = '';
        if($margs['heading_style_number']){

            $h_tag = $margs['heading_style_number'];
        }

        if($margs['heading_style_number']=='h-group-1'||$margs['heading_style']=='heading_style_number-group-2'){

            $h_tag = $margs['heading_style_number'];
            $h_class = 'the-variable-heading--number '.$margs['heading_style_number'];
        }





        $fout = '';



        $overlay_opacity = floatval($margs['overlay_opacity'])/100;
        $bg_url = $this->sanitize_id_to_src($margs['bg']);


        $fout.=$this->section_start($margs);


        $fout.=' <!-- section featured image -->
                <div class="featured-media-con" style=" height: 300px;">
                    <div class="featured-media--image divimage" style="background-image: url('.$bg_url.'); ';

        if(strpos($margs['bg'],'#')===0){
            $fout.=' background-color: '.$margs['bg'].';';
        }

        $fout.=' "></div>
    <div class="semi-black-overlay opaque" style="background-color: rgba(0,0,0,'.$overlay_opacity.');"></div>
                </div>

                <!-- this block will come over the featured image -->
                <div class="feature-overlay ">
                    <div class="row">
                        <!-- progress bar START -->
                        <div class="col-md-3">
                            <div class="feature-overlay-block">
                                <div class="big-number">
                                    <div class="antfarm-progress-text" data-animation_time="2000" data-maxperc="100" data-maxnr="'.$margs['progress_1'].'" data-convert-1000-to-k="'.$margs['convert_1000_to_k'].'" data-h-tag="'.$h_tag.'" data-h-tag-class="'.$h_class.'"></div>

                                </div>
                                '.$h_wrap_start.$margs['title_1'].$h_wrap_end.'
                                <div class="'.$margs['eticon_1'].'">
                                </div>
                            </div>
                        </div>
                        <!-- progress bar END -->


                        <!-- progress bar START -->
                        <div class="col-md-3">
                            <div class="feature-overlay-block">
                                <div class="big-number">
                                    <div class="antfarm-progress-text" data-animation_time="2000" data-maxperc="100" data-maxnr="'.$margs['progress_2'].'" data-convert-1000-to-k="'.$margs['convert_1000_to_k'].'" data-h-tag="'.$h_tag.'" data-h-tag-class="'.$h_class.'"></div>

                                </div>
                                '.$h_wrap_start.$margs['title_2'].$h_wrap_end.'
                                <div class="'.$margs['eticon_2'].'">

                                </div>
                            </div>
                        </div>
                        <!-- progress bar END -->
                        <!-- progress bar START -->
                        <div class="col-md-3">
                            <div class="feature-overlay-block">
                                <div class="big-number">
                                    <div class="antfarm-progress-text" data-animation_time="2000" data-maxperc="100" data-maxnr="'.$margs['progress_3'].'" data-convert-1000-to-k="'.$margs['convert_1000_to_k'].'" data-h-tag="'.$h_tag.'" data-h-tag-class="'.$h_class.'"></div>

                                </div>
                                '.$h_wrap_start.$margs['title_3'].$h_wrap_end.'
                                <div class="'.$margs['eticon_3'].'">

                                </div>
                            </div>
                        </div>
                        <!-- progress bar END -->
                        <!-- progress bar START -->
                        <div class="col-md-3">
                            <div class="feature-overlay-block">
                                <div class="big-number">
                                    <div class="antfarm-progress-text" data-animation_time="2000" data-maxperc="100" data-maxnr="'.$margs['progress_4'].'" data-convert-1000-to-k="'.$margs['convert_1000_to_k'].'" data-h-tag="'.$h_tag.'" data-h-tag-class="'.$h_class.'"></div>

                                </div>
                                '.$h_wrap_start.$margs['title_4'].$h_wrap_end.'
                                <div class="'.$margs['eticon_4'].'">

                                </div>
                            </div>
                        </div>
                        <!-- progress bar END -->

                    </div>
                </div>';



        $fout.=$this->section_end($margs);




        wp_enqueue_style( 'antfarm-progress-bars', $this->base_url . 'assets/dzsprogressbars/dzsprogressbars.css');
        wp_enqueue_script( 'antfarm-progress-bars', $this->base_url . 'assets/dzsprogressbars/dzsprogressbars.js');

        $this->shortcode_index++; return $fout;


    }




    function shortcode_sc_antfarm_portfolio($atts=array(), $content = ''){


        $margs = array(

            'media'=>'',
            'overlay_opacity'=>'50',
            'skin'=>'',
            'layout'=>'',
            'gap'=>'theme-column-gap',
            'items'=>'',
            'wpqargs'=>'',
            'title_hover'=>'on',
            'cat'=>'',
            'extra_classes'=>'',
            'posts_per_page'=>'',
            'link_whole_item'=>'zoombox', // -- zoombox or
            'return_only_items'=>'default',
        );


        if (!isset($atts) || $atts == false) {
            $atts = array();
        }

        $margs = array_merge($margs, $atts);



        $fout = '';







        $fout.=$this->shortcode_antfarm_portfolio($margs,$content);










        return $fout;

    }




    function shortcode_sc_social_links2($atts=array(), $content = ''){


        return 'ceva';
    }
    function shortcode_sc_social_links($atts=array(), $content = ''){
        $fout = '';

        $margs = array(

            'media'=>'',
            'progress_1'=>'100',
            'progress_2'=>'200',
            'progress_3'=>'300',
            'progress_4'=>'400',
            'link_1'=>'',
            'link_2'=>'',
            'link_3'=>'',
            'link_4'=>'',
            'overlay_opacity'=>'50',
            'heading_style'=>'h6',
            'heading_style_title'=>'h4',
        );


        if (!isset($atts) || $atts == false) {
            $atts = array();
        }

        $margs = array_merge($margs, $atts);




        $fout = '';



        if(defined('QUCREATIVE_VERSION')) {
            // -- sc breakout

        }
        $fout.=$this->section_start($margs);

        $overlay_opacity = floatval($margs['overlay_opacity'])/100;












        $h_wrap_start = '<'.$margs['heading_style'].' class=" the-variable-heading-circle-label">';
        $h_wrap_end = '</'.$margs['heading_style'].'>';

        if($margs['heading_style']=='h-group-1' || $margs['heading_style']=='h-group-2'){

            $h_wrap_start = '<h3 class=" the-variable-heading-circle-label '.$margs['heading_style'].'">';
            $h_wrap_end = '</h3>';
        }





        $lab = 'heading_style_title';
        $h_wrap_start_title = '<'.$margs[$lab].' class="social-heading the-variable-heading-title">';
        $h_wrap_end_title = '</'.$margs[$lab].'>';

        if($margs[$lab]=='h-group-1' || $margs[$lab]=='h-group-2'){

            $h_wrap_start_title = '<h3 class="social-heading the-variable-heading-title '.$margs[$lab].'">';
            $h_wrap_end_title = '</h3>';
        }





        $fout.='

                <div class=" social-block antfarm-sc-social-block ">

<div class="featured-media-con">
                        <div class="featured-media--image divimage" style="background-image: url('.$margs['media'].');  ';

        if(strpos($margs['media'],'#')===0){
            $fout.=' background-color: '.$margs['media'].';';
        }

        $fout.=' "></div>
                        </div>
                        <div class="semi-black-overlay opaque" style="background-color: rgba(0,0,0,'.$overlay_opacity.');"></div>
                        <div class="flex-for-sc">
                        <div class="row row-width">

                            ';


        if($margs['social_1']){
            $fout.='<div class="col-md-3">
                                <a href="'.$margs['link_1'].'" class="social-meta-con custom-a">

                                    <span class="social-circle-con"><i class="fa fa-'.$margs['icon_1'].'"></i></span>
                                    '.$h_wrap_start.$margs['title_1'].$h_wrap_end.'
                                    <div class="clear"></div>

                                    <hr>
                                    <div class="social-bg">
                                    '.$h_wrap_start_title.$margs['social_1'].$h_wrap_end_title.'
                                    </div>

                                </a>
                            </div>';
        }
        if($margs['social_2']){
            $fout.='<div class="col-md-3">
                                <a href="'.$margs['link_2'].'" class="social-meta-con custom-a">

                                    <span class="social-circle-con"><i class="fa fa-'.$margs['icon_2'].'"></i></span>
                                    '.$h_wrap_start.$margs['title_2'].$h_wrap_end.'
                                    <div class="clear"></div>

                                    <hr>
                                    <div class="social-bg">
                                    '.$h_wrap_start_title.$margs['social_2'].$h_wrap_end_title.'
                                    </div>

                                </a>
                            </div>';
        }
        if($margs['social_3']){
            $fout.='<div class="col-md-3">
                                <a href="'.$margs['link_3'].'" class="social-meta-con custom-a">

                                    <span class="social-circle-con"><i class="fa fa-'.$margs['icon_3'].'"></i></span>
                                    '.$h_wrap_start.$margs['title_3'].$h_wrap_end.'
                                    <div class="clear"></div>

                                    <hr>
                                    <div class="social-bg">
                                    '.$h_wrap_start_title.$margs['social_3'].$h_wrap_end_title.'
                                    </div>

                                </a>
                            </div>';
        }



        if($margs['social_4']){
            $fout.='<div class="col-md-3">
                                <a href="'.$margs['link_4'].'" class="social-meta-con custom-a">

                                    <span class="social-circle-con"><i class="fa fa-'.$margs['icon_4'].'"></i></span>
                                    '.$h_wrap_start.$margs['title_4'].$h_wrap_end.'
                                    <div class="clear"></div>

                                    <hr>
                                    <div class="social-bg">
                                    '.$h_wrap_start_title.$margs['social_4'].$h_wrap_end_title.'
                                    </div>

                                </a>
                            </div>';
        }


        $fout.='

                        </div>
                        </div>
                    </div>';



        if(defined('QUCREATIVE_VERSION')) {
            // -- sc breakin

        }
        $fout.=$this->section_end($margs);



        wp_enqueue_style( 'progress.bars', $this->base_url . 'assets/dzsprogressbars/dzsprogressbars.css');
        wp_enqueue_script( 'progress.bars', $this->base_url . 'assets/dzsprogressbars/dzsprogressbars.js');

        $this->shortcode_index++; return $fout;


    }





    function shortcode_team_member($atts=array(), $content = ''){
        $fout = '';

        $taxonomy = 'timeline_items_cat';

        $margs = array(

            'style'=>'team-member-element',
            'media'=>'',
            'titles'=>'',
            'avatar'=>'',
            'is_square'=>'',
            'first_name'=>'',
            'last_name'=>'',
            'position'=>'',
            'shape'=>'',
            'heading_style'=>'h5',
            'heading_style_2'=>'h6',
        );


        if (!isset($atts) || $atts == false) {
            $atts = array();
        }

        $margs = array_merge($margs, $atts);




        $titles = vc_param_group_parse_atts( $margs['titles'] );

        if($margs['style']=='`{`object Object`}`'){
            $margs['style']='team-member-element';
        }








        $h_wrap_start = '<'.$margs['heading_style'].' class=" first-name the-variable-heading">';
        $h_wrap_end = '</'.$margs['heading_style'].'>';

        if($margs['heading_style']=='h-group-1'||$margs['heading_style']=='h-group-2'){

            $h_wrap_start = '<h3 class=" first-name the-variable-heading '.$margs['heading_style'].'">';
            $h_wrap_end = '</h3>';
        }


        $h_wrap_start_12 = '<'.$margs['heading_style'].' class=" sur-name the-variable-heading">';
        $h_wrap_end_12 = '</'.$margs['heading_style'].'>';

        if($margs['heading_style']=='h-group-1'||$margs['heading_style']=='h-group-2'){

            $h_wrap_start_12 = '<h3 class=" sur-name the-variable-heading '.$margs['heading_style'].'">';
            $h_wrap_end_12 = '</h3>';
        }





        $h_wrap_start_2 = '<'.$margs['heading_style_2'].' class="the-name the-variable-heading">';
        $h_wrap_end_2 = '</'.$margs['heading_style_2'].'>';

        if($margs['heading_style_2']=='h-group-1'||$margs['heading_style_2']=='h-group-2'){

            $h_wrap_start_2 = '<h3 class=" the-name the-variable-heading '.$margs['heading_style_2'].'">';
            $h_wrap_end_2 = '</h3>';
        }


        $fout.='<div class="antfarm-team-member '.$margs['style'].' ';

        if($margs['aligment']=='right'){
            $fout.=' align-right';
        }

        if($margs['is_square']=='on'){

            $fout.=' is-square';
        }

        if($margs['shape']=='circle'){
            $fout.=' shape-circle';
        }

        $fout.='">';

        $fout_pic_con = '<div class="pic-con">';






        if($margs['shape']=='circle'){
            $fout_pic_con.='<div class="divimage divimage-calculate-real-size" style="background-image:url('.$margs['avatar'].');"></div>';
        }else{
            $fout_pic_con.='<img class="divimage" src="'.$margs['avatar'].'"/>';
        }





        $fout_pic_con.='</div>';
        $fout_meta_con = '<div class="meta-con">';

        if($margs['style']=='team-member-element'){

            $fout_meta_con.=$h_wrap_start.$margs['first_name'].$h_wrap_end;
            $fout_meta_con.=$h_wrap_start_12.$margs['last_name'].$h_wrap_end_12;


        }else{

            $fout_meta_con.=$h_wrap_start_2.$margs['first_name'].' '.$margs['last_name'].$h_wrap_end_2;
        }

        $fout_meta_con.='<hr class="qucreative-hr-small">
                                            <div class="the-role ';




        $fout_meta_con.='font-group-1';

        $fout_meta_con.='">'.$margs['position'].'</div>';

        if(is_array($titles) && count($titles) &&  isset($titles[0]['title']) && $titles[0]['title']){


            $fout_meta_con.=' <div class="social-profiles">';



            foreach($titles as $ti){


                $args = array(
                        'title'=>'',
                        'faicon'=>'',
                );

                $ti = array_merge($args, $ti);



                $fout_meta_con.='<a href="'.$ti['title'].'" class="circle-con"><i class="fa fa-'.$ti['faicon'].'"></i></a>';
            }

            $fout_meta_con.='</div>';
        }


        $fout_meta_con.='
                                        </div>';


        if($margs['aligment']=='right'){


            $fout.=$fout_meta_con.$fout_pic_con;
        }else{

            $fout.=$fout_pic_con.$fout_meta_con;
        }



        $fout.='
    <div class="clear"></div>
</div>';






        $this->shortcode_index++;
        return $fout;


    }
    function shortcode_sc_testimonials($atts=array(), $content = ''){
        $fout = '';


        $margs = array(

            'bg'=>'',
            'media'=>'',
            'tests'=>'',
            'heading_style'=>'h6',
            'heading_style_name'=>'h2',
            'heading_style_subtitle'=>'h6',
            'container_class'=>'qucreative-secondary-content antfarm-sc-testimonials',
            'overlay_opacity'=>'50',
        );


        if (!isset($atts) || $atts == false) {
            $atts = array();
        }

        $margs = array_merge($margs, $atts);





        $h_wrap_start = '<'.$margs['heading_style'].' class="the-variable-heading">';
        $h_wrap_end = '</'.$margs['heading_style'].'>';

        if($margs['heading_style']=='h-group-1'||$margs['heading_style']=='h-group-2'){

            $h_wrap_start = '<h3 class="the-variable-heading '.$margs['heading_style'].'">';
            $h_wrap_end = '</h3>';
        }




        if(defined('QUCREATIVE_VERSION')) {
            // -- sc breakout

        }


        $overlay_opacity = floatval($margs['overlay_opacity'])/100;


        $fout.=$this->section_start($margs);


        $bg_url = $this->sanitize_id_to_src($margs['media']);


        $fout.='<div class="featured-media-con featured-media-absolute" style="">
    <div class="featured-media--image divimage" style="background-image: url('.$bg_url.');  ';

        if(strpos($margs['media'],'#')===0){
            $fout.=' background-color: '.$margs['media'].';';
        }

        $fout.='"></div>
    <div class="semi-black-overlay opaque" style="background-color: rgba(0,0,0,'.$overlay_opacity.');"></div>
</div>';



        $fout.='<div class="advancedscroller skin-whitefish is-thicker auto-height testimonial-ascroller" style="width:100%; height: auto;" data-options=\'{"settings_mode": "onlyoneitem"
,"design_arrowsize": "0"
,"settings_swipe": "on"
,"settings_swipeOnDesktopsToo": "on"
,"settings_slideshow": "on"
,"settings_slideshowTime": "300"
,"settings_transition":"slide"
,"settings_lazyLoading":"on"
,"settings_autoHeight":"off"
,"settings_centeritems":false
,"design_bulletspos": "bottom"
,"settings_wait_for_do_transition_call": "off"
,"settings_transition_only_when_loaded": "off"
}\'><div class="preloader"></div>
<ul class="items">';




        $titles = vc_param_group_parse_atts( $margs['tests'] );
        foreach($titles as $ti){





            $defs = array(
                   'tests_heading_style'=>'h6',
                   'name'=>'',
            );

            $ti = array_merge($defs, $ti);

            $name = '';

            if(isset($ti['first_name']) && $ti['first_name']){
                $name = $ti['first_name'].' <strong>'.$ti['last_name'].'</strong>';
            }

            if(isset($ti['name']) && $ti['name']){
                $name = $ti['name'];
            }



            $h_wrap_start = '<'.$margs['heading_style'].' class="the-variable-heading">';
            $h_wrap_end = '</'.$margs['heading_style'].'>';

            if($margs['heading_style']=='h-group-1'||$margs['heading_style']=='h-group-2'){

                $h_wrap_start = '<h3 class="the-variable-heading '.$margs['heading_style'].'">';
                $h_wrap_end = '</h3>';
            }



            $fout.='<li class="item-tobe type-inline " >
<div class="flex-for-sc-con">
<div class="flex-for-sc">
<div class="row row-width">
        <div class="col-sm-5 testimonial-col-name">
            <div class="social-meta-con">

                '.$h_wrap_start.$ti['title'].$h_wrap_end.'
                <span class="social-circle-con"><i class="fa fa-quote-right"></i></span>
                <div class="clear"></div>

                <hr>';




            $h_wrap_start = '<'.$margs['heading_style_name'].' class="the-variable-heading-name">';
            $h_wrap_end = '</'.$margs['heading_style_name'].'>';

            if($margs['heading_style_name']=='h-group-1'||$margs['heading_style_name']=='h-group-2'){

                $h_wrap_start = '<h3 class="the-variable-heading-name '.$margs['heading_style_name'].'">';
                $h_wrap_end = '</h3>';
            }



            $fout.='
                <!-- testimonial author -->
                '.$h_wrap_start.$ti['name'].$h_wrap_end;





            $lab = 'heading_style_subtitle';
            $h_wrap_start = '<'.$margs[$lab].' class="the-variable-heading-subtitle">';
            $h_wrap_end = '</'.$margs[$lab].'>';

            if($margs[$lab]=='h-group-1'||$margs[$lab]=='h-group-2'){

                $h_wrap_start = '<h3 class="the-variable-heading-subtitle testimonial-subtitle  '.$margs['heading_style_name'].'">';
                $h_wrap_end = '</h3>';
            }


            $fout.='
               '.$h_wrap_start.$ti['position'].$h_wrap_end.'

            </div>
        </div>
        <div class="col-sm-2">

        </div>
        <div class="col-sm-5 testimonial-col-quote">

            <!-- testimonial quote-->
            <div class="nicetext font-group-blockquote">'.$ti['the_test'].'</div>
        </div>
    </div>
    </div>
    </div>

</li>';
        }

        $fout.='</ul>
</div>';






        if(defined('QUCREATIVE_VERSION')) {
            // -- sc breakin
        }
        $fout.=$this->section_end($margs);






        $this->shortcode_index++;
        return $fout;


    }
    function shortcode_sc_client_slider($atts=array(), $content = ''){
        $fout = '';


        $margs = array(

            'media'=>'',
            'tests'=>'',
            'container_class'=>'qucreative-secondary-content antfarm-sc-client-slider',
            'overlay_opacity'=>'50',
        );


        if (!isset($atts) || $atts == false) {
            $atts = array();
        }

        $margs = array_merge($margs, $atts);







        if(defined('QUCREATIVE_VERSION')) {
            // -- sc breakout
        }

        $fout.=$this->section_start($margs);

        $overlay_opacity = floatval($margs['overlay_opacity'])/100;

        $bg_url = $this->sanitize_id_to_src($margs['media']);


        $fout.='<div class="featured-media-con featured-media-absolute" style="">
    <div class="featured-media--image divimage" style="background-image: url('.$bg_url.'); ';

        if(strpos($margs['media'],'#')===0){
            $fout.=' background-color: '.$margs['media'].';';
        }

        $fout.=' "></div>
    <div class="semi-black-overlay opaque" style="background-color: rgba(0,0,0,'.$overlay_opacity.');"></div>
</div>';



        $fout.='<div class="flex-for-sc">';
        $fout.='<div id="asii" class="advancedscroller  debug-target ';


	    if(defined('QUCREATIVE_VERSION')) {
		    $fout.=' auto-init-from-q';
	    }else{

		    $fout.=' auto-init';
	    }
        $fout.=' skin-whitefish clients-slider is-thicker center-v item-padding-30" style=" height: 300px; margin-left:0; margin-right:0; width: 100%; position:absolute;top:0; left:0;" >
<ul class="items">';


        $titles = vc_param_group_parse_atts( $margs['client'] );
        foreach($titles as $ti){



            $bg_url = $this->sanitize_id_to_src($ti['logo']);


            $fout.='<li class="item-tobe">
        <img class="fullwidth" alt="image" src="'.$bg_url.'"/>
</li>';
        }

        $fout.='</ul>
</div>';




        $fout.='</div>';


        if(defined('QUCREATIVE_VERSION')) {
            // -- sc breakin

        }

        $fout.=$this->section_end($margs);






        $this->shortcode_index++;
        return $fout;


    }
    function shortcode_antfarm_separator($atts=array(), $content = ''){
        $fout = '';

        $taxonomy = 'timeline_items_cat';

        $margs = array(

            'style'=>'transparent',
            'height'=>'',
            'is_style_black'=>'',
            'custom_color'=>'',
        );


        if (!isset($atts) || $atts == false) {
            $atts = array();
        }

        $margs = array_merge($margs, $atts);






        if($margs['style']=='transparent'){
            $fout.='<span style="display: block; height:'.$margs['height'].'px; "></span>';
        }else{

            $fout.='<span style="display: block; ';

            if($margs['height']){
                $fout.=' margin-bottom:'.$margs['height'].'px; ';
            }


            if($margs['custom_color']){

                $fout.='background-color: '.$margs['custom_color'];
            }


            $fout.=' "';

            $fout.=' class="'.$margs['style'].' divider qucreative-divider-from-element ';

            if($margs['is_style_black']=='on'){

                $fout.=' style-black';
            }

            $fout.='" ';


            $fout.='></span>';
        }







        $this->shortcode_index++;
        return $fout;


    }




    function shortcode_antfarm_contact_info($atts=array(), $content = ''){
        $fout = '';


        $margs = array(

            'style'=>'text',
            'height'=>'',
            'heading'=>'',
            'icon'=>'',
            'icon-style'=>'default',
        );


        if (!isset($atts) || $atts == false) {
            $atts = array();
        }

        $margs = array_merge($margs, $atts);




        $fout.='<div class="antfarm-contact-info element-contact-feature';

        $fout.=' style-'.$margs['style'];
        $fout.=' icon-style-'.$margs['icon-style'];

        if($margs['icon']){

        }else{
            $fout.=' without-icon';
        }
        if($margs['heading']){

        }else{
            $fout.=' without-heading';
        }

        $fout.='">';


        if($margs['icon']){
            $fout.='<div class="the-icon '.$margs['icon'].'"></div>';
        }

        $fout.='<h6 class="heading-title">'.$margs['heading'].'</h6>';


        $fout.='<div class="the-desc';

        if($margs['style']=='phone_number'){
            $fout.=' telephone-number font-group-11';
        }


        $fout.='">';


        if($margs['style']=='text' || $margs['style']=='phone_number'){
            $fout.=do_shortcode($content);
        }

        if($margs['style']=='social_icons'){




            $titles = vc_param_group_parse_atts( $margs['titles'] );
            foreach($titles as $ti){





                $fout.='<a href="'.$ti['link'].'"><i class="fa fa-'.$ti['faicon'].'"></i></a>';

            }

        }

        $fout.='</div>';;

        $fout.='</div>';







        $this->shortcode_index++;
        return $fout;


    }
    function shortcode_image_for_sideways($atts=array(), $content = ''){
        $fout = '';


        $margs = array(

            'media'=>'',
        );


        if (!isset($atts) || $atts == false) {
            $atts = array();
        }

        $margs = array_merge($margs, $atts);





        $fout.='<img alt="image" class="antfarm-image-for-sideways fullwidth element-image-for-fullwidth" src="'.$margs['media'].'" style="margin-top: -5px;"/>';




        $this->shortcode_index++;
        return $fout;


    }






    function post_save_mo() {

        $auxarray = array();
        // -- parsing post data
        parse_str($_POST['postdata'],$auxarray);


        $auxarray = array_merge($this->db_mainoptions, $auxarray);

        update_option($this->dbname_mainoptions,$auxarray);
        die();
    }





    function get_the_post_thumbnail_url( $post = null, $size = 'post-thumbnail' ) {
        $post_thumbnail_id = get_post_thumbnail_id( $post );
        if ( ! $post_thumbnail_id ) {
            return false;
        }
        return wp_get_attachment_image_url( $post_thumbnail_id, $size );
    }

    function post_get_post_thumb_url() {

        $auxarray = array();
        // -- parsing post data


        echo get_the_post_thumbnail_url($_POST['postdata'], array(100,100));
        die();
    }










    function post_dzs_update_term_order() {

        $auxarray = array();
        // -- parsing post data
        $arr = json_decode(stripslashes($_POST['postdata']),true);


        print_r($_POST);
        print_r($arr);

        foreach ($arr as $po){

            update_post_meta($po['id'],$_POST['meta_key'], $po['order']);
        }
        die();
    }


}


if(function_exists('vc_antfarm_layout_chooser')==false) {
    function vc_antfarm_layout_chooser($settings, $value) {

        $dependency = '';


        $fout = '<div class="vc_antfarm_layout_chooser-con" ' . $dependency . '>
                <input type="text" class="vc_antfarm_multiple_checkbox-input    " name="' . $settings['param_name'] . '" value="' . $value . '"  style="display:none"/>
';

        $multi_values = array();

        $multi_values = explode(',',$value);

















        $args = array(
            'posts_per_page'   => -1,
            'post_type'        => 'zfolio_grid',
            'post_status'      => 'publish',

        );
        $grid_arr = get_posts( $args );





        $fout.='  <select class="dzs-style-me  opener-listbuttons wpb_vc_param_value wpb-select ' . $settings['type'] . '_field  "  name="' . $settings['param_name'] . '"" >
                            <option value="dzs-layout--2-cols" ';


        if($value=='dzs-layout--2-cols'){
            $fout.=' selected';
        }

        $fout.='></option>
                            <option value="dzs-layout--3-cols" ';


        if($value=='dzs-layout--3-cols'){
            $fout.=' selected';
        }

        $fout.='></option><option value="dzs-layout--4-cols" ';


        if($value=='dzs-layout--4-cols'){
            $fout.=' selected';
        }

        $fout.='></option><option value="dzs-layout--5-cols" ';


        if($value=='dzs-layout--5-cols'){
            $fout.=' selected';
        }

        $fout.='></option>';




        foreach ($grid_arr as $gai){
            $fout.='<option value="';


            $fout.=$gai->post_name;



            $fout.='"';


            if($value==$gai->post_name){
                $fout.=' selected';
            }

            $fout.='></option>';
        }


        $fout.='
                        </select>
                        <ul class="dzs-style-me-feeder">

                            

                            '
            .antfarm_generate_big_option(array(


                'perc'=>'50',
                'label'=>'2 '.esc_html__("Columns"),
                'items'=>array(
                    array(
                        'w'=>'1',
                        'h'=>'1',
                    ),
                    array(
                        'w'=>'1',
                        'h'=>'1',
                    ),
                    array(
                        'w'=>'1',
                        'h'=>'1',
                    ),
                    array(
                        'w'=>'1',
                        'h'=>'1',
                    ),
                    array(
                        'w'=>'1',
                        'h'=>'1',
                    ),

                )
            )).''
            .antfarm_generate_big_option(array(


                'label'=>'3 '.esc_html__("Columns"),
                'perc'=>'33.333',
                'items'=>array(
                    array(
                        'w'=>'1',
                        'h'=>'1',
                    ),
                    array(
                        'w'=>'1',
                        'h'=>'1',
                    ),
                    array(
                        'w'=>'1',
                        'h'=>'1',
                    ),
                    array(
                        'w'=>'1',
                        'h'=>'1',
                    ),
                    array(
                        'w'=>'1',
                        'h'=>'1',
                    ),
                    array(
                        'w'=>'1',
                        'h'=>'1',
                    ),
                    array(
                        'w'=>'1',
                        'h'=>'1',
                    ),
                    array(
                        'w'=>'1',
                        'h'=>'1',
                    ),
                    array(
                        'w'=>'1',
                        'h'=>'1',
                    ),
                    array(
                        'w'=>'1',
                        'h'=>'1',
                    ),
                )
            )).''
            .antfarm_generate_big_option(array(


                'label'=>'4 '.esc_html__("Columns"),
                'perc'=>'25',

            )).''
            .antfarm_generate_big_option(array(

                'label'=>'5 '.esc_html__("Columns"),
                'items'=>array(

                    array(
                        'w'=>'1',
                        'h'=>'1',
                    ),
                    array(
                        'w'=>'1',
                        'h'=>'1',
                    ),
                    array(
                        'w'=>'1',
                        'h'=>'1',
                    ),
                    array(
                        'w'=>'1',
                        'h'=>'1',
                    ),
                    array(
                        'w'=>'1',
                        'h'=>'1',
                    ),
                    array(
                        'w'=>'1',
                        'h'=>'1',
                    ),
                    array(
                        'w'=>'1',
                        'h'=>'1',
                    ),
                    array(
                        'w'=>'1',
                        'h'=>'1',
                    ),
                    array(
                        'w'=>'1',
                        'h'=>'1',
                    ),
                    array(
                        'w'=>'1',
                        'h'=>'1',
                    ),
                    array(
                        'w'=>'1',
                        'h'=>'1',
                    ),
                    array(
                        'w'=>'1',
                        'h'=>'1',
                    ),
                    array(
                        'w'=>'1',
                        'h'=>'1',
                    ),
                    array(
                        'w'=>'1',
                        'h'=>'1',
                    ),
                    array(
                        'w'=>'1',
                        'h'=>'1',
                    ),
                    array(
                        'w'=>'1',
                        'h'=>'1',
                    ),
                    array(
                        'w'=>'1',
                        'h'=>'1',
                    ),
                    array(
                        'w'=>'1',
                        'h'=>'1',
                    ),
                    array(
                        'w'=>'1',
                        'h'=>'1',
                    ),
                    array(
                        'w'=>'1',
                        'h'=>'1',
                    ),
                )
            )).''
            .'';


        foreach ($grid_arr as $gai){
            $gai_arr = json_decode($gai->post_content, true);



            if(intval($gai_arr['grid_cols'])){

	            $args = array(


		            'perc'=>100/intval($gai_arr['grid_cols']),
		            'label'=>$gai->post_title,

	            );


	            $arr_its = array();

	            if(is_array($gai_arr['items_arr'])){

		            foreach ($gai_arr['items_arr'] as $gi){

			            array_push($arr_its, $gi);
		            }
	            }


	            $args['items']=$arr_its;





	            $dependency = array(

		            'relation'=>'AND',

		            array(
			            'lab'=>'zfolio-mode',
			            'value'=>array('mode-normal'),
		            ),
		            array(
			            'lab'=>'skin',
			            'value'=>array('skin-qucreative zfolio-portfolio-expandable','skin-silver','skin-lazarus','skin-gazelia','skin-gazelia skin-gazelia--transparent'),
		            ),
	            );


	            $dependency_str = '';
	            if($dependency){
		            $dependency_str = json_encode($dependency);
	            }

	            $args['extra_attr']=' data-custom-attr="data-dependency" data-custom-attr-val=\''.$dependency_str.'\'';
	            $args['extra_class']=' testa';






	            $fout.=antfarm_generate_big_option($args);
            }





        }

        $fout.='
                        </ul>';


        $fout.='</div>';
        return $fout;

    }
}

if(function_exists('vc_antfarm_icon_selector')==false) {
    function vc_antfarm_icon_selector($settings, $value) {

        $dependency = '';


        $fout = '<div class="vc_antfarm_layout_chooser-con" ' . $dependency . '>
                <input type="text" class="vc_antfarm_multiple_checkbox-input    " name="' . $settings['param_name'] . '" value="' . $value . '"  style="display:none"/>
';

        $multi_values = array();

        $multi_values = explode(',',$value);











        $fout.='  <select class="dzs-style-me  opener-listbuttons wpb_vc_param_value wpb-select ' . $settings['type'] . '_field  "  name="' . $settings['param_name'] . '"" >
                             ';


        if($value=='dzs-layout--2-cols'){
            $fout.=' selected';
        }



        $values = $settings['value'];

        foreach ($values as $opt){
            $fout.='<option value="'.$opt['value'].'" ';


            if($value==$opt['value']){
                $fout.=' selected';
            }

            $fout.='></option>';
        }







        $fout.='
                        </select>
                        <ul class="dzs-style-me-feeder">'
        ;

        foreach ($values as $opt){

            $fout.='<div class="bigoption">
<span class="option-con"><img src="'.$opt['icon'].'"><span class="option-label"></span></span>
</div>';

        }


        $fout.='
                        </ul>';


        $fout.='</div>';
        return $fout;

    }
}




add_shortcode('vc_section', 'antfarm_shortcode_vc_section');


function antfarm_shortcode_vc_section($atts=array(), $content=''){

    global $vc_manager;




    $margs = array(
        'call_from'=>'qucreative',
        'style'=>'',
        'section_bg_image'=>'',
        'section_bg_color'=>'',
        'shape_color'=>'',
        'shape_height'=>'',
        'shape'=>'',
        'type'=>'',
        'sc_video'=>'',
        'css_animation'=>'',
        'rev_slider'=>'',
        'bg_hide_on_tablet'=>'',
        'bg_hide_on_mobile'=>'',
    );


    if(is_array($atts)){
        $margs = array_merge($margs, $atts);
    }



    $el_class = $full_height = $parallax_speed_bg = $parallax_speed_video = $full_width = $flex_row = $columns_placement = $content_placement = $parallax = $parallax_image = $css = $el_id = $video_bg = $video_bg_url = $video_bg_parallax = $css_animation = '';
    $disable_element = '';
    $output = $after_output = '';


    if(function_exists('vc_map_get_attributes')){

        $atts = vc_map_get_attributes( 'vc_section', $atts );
        extract( $atts );
    }





    wp_enqueue_script( 'wpb_composer_front_js' );

	$css_animation_class = '';

	if ( '' !== $css_animation && 'none' !== $css_animation ) {
		wp_enqueue_script( 'waypoints' );
		wp_enqueue_style( 'animate-css' );
		$css_animation_class = ' wpb_animate_when_almost_visible wpb_' . $css_animation . ' ' . $css_animation;
	}

	$el_class = ' ' . $css_animation_class;

    $css_classes = array(
        'vc_section',
        $el_class,
    );

    if(function_exists('vc_map_get_attributes')){

        $css_classes = array(
            'vc_section',
            $el_class,
            vc_shortcode_custom_css_class( $css ),
        );
    }


    if(function_exists('vc_is_page_editable')){

        if ( 'yes' === $disable_element ) {
            if ( vc_is_page_editable() ) {
                $css_classes[] = 'vc_hidden-lg vc_hidden-xs vc_hidden-sm vc_hidden-md';
            } else {
                return '';
            }
        }
    }

    if(function_exists('vc_shortcode_custom_css_has_property')) {
        if (vc_shortcode_custom_css_has_property($css, array('border', 'background',)) || $video_bg || $parallax) {
            $css_classes[] = 'vc_section-has-fill';
        }
    }

    $wrapper_attributes = array();
// -- build attributes for wrapper
    if ( ! empty( $el_id ) ) {
        $wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
    }
    if ( ! empty( $full_width ) ) {
        $wrapper_attributes[] = 'data-vc-full-width="true"';
        $wrapper_attributes[] = 'data-vc-full-width-init="false"';
        if ( 'stretch_row_content' === $full_width ) {
            $wrapper_attributes[] = 'data-vc-stretch-content="true"';
        }
        $after_output .= '<div class="vc_row-full-width vc_clearfix"></div>';
    }

    if ( ! empty( $full_height ) ) {
        $css_classes[] = 'vc_row-o-full-height';
    }

    if ( ! empty( $content_placement ) ) {
        $flex_row = true;
        $css_classes[] = 'vc_section-o-content-' . $content_placement;
    }

    if ( ! empty( $flex_row ) ) {
        $css_classes[] = 'vc_section-flex';
    }


    $has_video_bg = false;
    if(function_exists('vc_extract_youtube_id')){

        $has_video_bg = ( ! empty( $video_bg ) && ! empty( $video_bg_url ) && vc_extract_youtube_id( $video_bg_url ) );
    }

    $parallax_speed = $parallax_speed_bg;
    if ( $has_video_bg ) {
        $parallax = $video_bg_parallax;
        $parallax_speed = $parallax_speed_video;
        $parallax_image = $video_bg_url;
        $css_classes[] = 'vc_video-bg-container';
        wp_enqueue_script( 'vc_youtube_iframe_api_js' );
    }

    if ( ! empty( $parallax ) ) {
        wp_enqueue_script( 'vc_jquery_skrollr_js' );
        $wrapper_attributes[] = 'data-vc-parallax="' . esc_attr( $parallax_speed ) . '"'; // parallax speed
        $css_classes[] = 'vc_general vc_parallax vc_parallax-' . $parallax;
        if ( false !== strpos( $parallax, 'fade' ) ) {
            $css_classes[] = 'js-vc_parallax-o-fade';
            $wrapper_attributes[] = 'data-vc-parallax-o-fade="on"';
        } elseif ( false !== strpos( $parallax, 'fixed' ) ) {
            $css_classes[] = 'js-vc_parallax-o-fixed';
        }
    }

    if ( ! empty( $parallax_image ) ) {
        if ( $has_video_bg ) {
            $parallax_image_src = $parallax_image;
        } else {
            $parallax_image_id = preg_replace( '/[^\d]/', '', $parallax_image );
            $parallax_image_src = wp_get_attachment_image_src( $parallax_image_id, 'full' );
            if ( ! empty( $parallax_image_src[0] ) ) {
                $parallax_image_src = $parallax_image_src[0];
            }
        }
        $wrapper_attributes[] = 'data-vc-parallax-image="' . esc_attr( $parallax_image_src ) . '"';
    }
    if ( ! $parallax && $has_video_bg ) {
        $wrapper_attributes[] = 'data-vc-video-bg="' . esc_attr( $video_bg_url ) . '"';
    }

    if(defined('VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG')){

	    $css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( array_unique( $css_classes ) ) ), 'vc_section', $atts ) );
    }




    // -- start custom qucreative properties

    $extra_class= '';

    if(strpos($content, '[vc_column][sc_')!==false || strpos($content, '[sc_')===0 || strpos($content, '[vc_column][antfarm_sc_')!==false || strpos($content, '[antfarm_sc_')===0){

        $extra_class .= ' the-content-sheet-for-sc';
    }



    if($margs['style']=='dark'){

        $extra_class.=' the-content-sheet-dark';
    }



    if($margs['css_animation'] && $margs['css_animation']!='none'){
        $extra_class.=' wpb_animate_when_almost_visible wpb_'.$margs['css_animation'].' '.$margs['css_animation'];
    }


    if($margs['bg_hide_on_mobile']){
        $extra_class.=' bg-hide-on-mobile';
    }
    if($margs['bg_hide_on_tablet']){
        $extra_class.=' bg-hide-on-tablet';
    }






    if($margs['type']=='image'){
        if(isset($margs['media']) && $margs['media']){

            $extra_class.=' has-featured-media';
        }
    }
    if($margs['type']=='slider') {
        if ($margs['slider_images']) {

            $extra_class.=' has-featured-media';

        }
    }
    if($margs['type']=='rev_slider'){
        if($margs['rev_slider']){

            $extra_class.=' has-featured-media';

        }
    }
    if($margs['type']=='slider_with_captions'){



        if($margs['caption_images']){

            $extra_class.=' has-featured-media';


        }




    }


    if($margs['type']=='map') {
        if ($margs['lat']) {

            $extra_class.=' has-featured-media';

        }
    }





	$css_class = '';

    $wrapper_attributes[] = 'class="the-content-sheet ' . esc_attr( trim( $css_class ) ) . $extra_class.'"';

    if($margs['section_bg_color'] && $margs['section_bg_color']!=' '){
        $wrapper_attributes[] = ' style="background-color: '.$margs['section_bg_color'].';"';
    }



    $output .= '<section ' . implode( ' ', $wrapper_attributes ) . '>';








    if($margs['type']=='image'){
        if(isset($margs['media']) && $margs['media']){

            global $antfarm;
            $output.='<div class="featured-media-con featured-media-con-from-section "><div class="section-featured-media featured-media--image divimage lazyloading-transition-fade" data-src="'.$antfarm->sanitize_id_to_src($margs['media']).'" style=" height:400px;"></div></div>';
        }
    }


    if($margs['type']=='video'){
        if(isset($margs['sc_video']) && $margs['sc_video']){
            $output.='<div class="featured-media-con featured-media-con-from-section ">';

            $output.='<div class="section-featured-media featured-media--video" >';





            $args = array(
                    'media'=>$margs['sc_video']
            );

            global $antfarm;;
            $output.= $antfarm->shortcode_antfarm_video_player($args);

            $output.='</div>';

            $output.='</div>';
        }
    }
    if($margs['type']=='slider'){
        if($margs['slider_images']){

            $images = explode(",",$margs['slider_images']);





            if(is_array($images)){

                $output.='<div class="advancedscroller skin-qucreative ';


	            if(defined('QUCREATIVE_VERSION')) {
		            $output.=' auto-init-from-q';
	            }else{

		            $output.=' auto-init';
	            }

                $output.=' arrows-middle" style="width:100%;  margin-bottom: 0;" data-options=\'{
settings_mode: "onlyoneitem"
,design_arrowsize: "0"
,settings_swipe: "on"
,settings_autoHeight: "on"
,settings_autoHeight_proportional: "on"
,settings_swipeOnDesktopsToo: "on"
,settings_slideshow: "off"
,settings_slideshowTime: "150"
}\'><ul class="items">';



                foreach ($images as $im){


                    $the_src = wp_get_attachment_image_src($im, 'full');


                    $output.='<li class="item-tobe needs-loading"> <div class="imagediv" style="background-image: url('.$the_src[0].'); height:350px;"></div></li>';
                }




                $output.='</ul></div>';
            }

        }
    }
    if($margs['type']=='rev_slider'){
        $output.=do_shortcode('[rev_slider alias="'.$margs['rev_slider'].'"]');
    }
    if($margs['type']=='slider_with_captions'){



        $items = vc_param_group_parse_atts( $margs['caption_images'] );


        if(is_array($items) && count($items)>0){


            $output.='<div  class="advancedscroller skin-whitefish is-thicker ';

	        if(defined('QUCREATIVE_VERSION')) {
		        $output.=' auto-init-from-q';
	        }else{

		        $output.=' auto-init';
	        }

            $output.='" style="" data-options=\'{
            settings_mode: "onlyoneitem"
            ,settings_swipe: "on"
            ,settings_swipeOnDesktopsToo: "on"
            ,design_bulletspos: "bottom"
            ,settings_slideshow: "on"
            ,settings_slideshowTime: "3000"
            ,settings_autoHeight:"on"
            ,settings_autoHeight_proportional:"on"
            ,settings_autoHeight_proportional_max_height:"600"
            ,settings_transition:"slide"
            ,settings_centeritems:false
        }\'>
        <div class="preloader-semicircles"></div>
        <ul class="items">';


            foreach ($items as $it){


                $the_src = wp_get_attachment_image_src($it['image'], 'full');

                $output.='<li class="item-tobe needs-loading">
                <div class="imagediv" style="background-image:url('.$the_src[0].')"></div>
                
                <div class="center-it-v align-'.$it['caption_aligment'].'">
                <div class="caption skin-blurred fly-in" style=" max-width: 300px; white-space: normal;">
                    <div class="blur-bg">

                    </div>
                    <div class="caption-in">
                        <div class="flex-aurora">
                            <div class="the-desc">'.$it['caption_desc'].'</div>
                            <div class="the-number">
                                '.$it['caption_number'].'
                            </div>

                        </div>
                    </div>
                </div>
                </div>
            </li>';
            }

            $output.='</ul>
</div>';







        }
    }

    if($margs['type']=='map'){
        if($margs['lat']){
            $output.='<div class="map-canvas featured-media-con indicator-red" style="height: 450px;" data-lat="'.$margs['lat'].'" data-long="'.$margs['long'].'">
</div>';
        }



        wp_enqueue_script('gmaps','https://maps.googleapis.com/maps/api/js?key='.get_theme_mod('gmaps_api_key'));
    }







    $added_content_sheet_text_section = false;


    if( $content && (   (( strpos($content, '[vc_column][sc_')===false || strpos($content, '[vc_column][sc_') > 30 )  && ( strpos($content, '[sc_')===false || strpos($content, '[sc_') > 10 ) )  &&  (( strpos($content, '[vc_column][antfarm_sc_')===false || strpos($content, '[vc_column][antfarm_sc_') > 30 )  && ( strpos($content, '[antfarm_sc_')===false || strpos($content, '[antfarm_sc_') > 10 ) )  ) ){



        $output .= '<div class="the-content-sheet-text the-content-sheet-text--section from-functions" style="';

        $added_content_sheet_text_section = true;




        if($margs['section_bg_image']){
            $output.=' background-image: url('.$margs['section_bg_image'].'); ';
        }

        $output.='">';







        if($margs['shape']){
            $output.='<figure class="the-section-shape '.$margs['shape'].'">';




            if($margs['shape']=='shape-1'){

                $h = '40';

                if($margs['shape_height']){
                    $h = $margs['shape_height'];
                }

                $output.='<svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="100%" height="'.$h.'px" viewBox="0 0 870 40" enable-background="new 0 0 870 40" xml:space="preserve"  preserveAspectRatio="none">
<path fill-rule="evenodd" clip-rule="evenodd" fill="'.$margs['shape_color'].'" d="M0,0l435,40L870,0H435H0z"/>
</svg>';
            }
            if($margs['shape']=='shape-2'){


                $h = '20';

                if($margs['shape_height']){
                    $h = $margs['shape_height'];
                }

                $output.='<svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="100%" height="'.$h.'px" viewBox="0 0 866 20" enable-background="new 0 0 866 20" xml:space="preserve"  preserveAspectRatio="none">
<path fill-rule="evenodd" clip-rule="evenodd" fill="'.$margs['shape_color'].'" d="M0,0h870v10H0V0z"/>
<path fill-rule="evenodd" clip-rule="evenodd" fill="'.$margs['shape_color'].'" d="M447,10h-12v10L447,10z"/>
<path fill-rule="evenodd" clip-rule="evenodd" fill="'.$margs['shape_color'].'" d="M423,10h12v10L423,10z"/>
</svg>';
            }
            if($margs['shape']=='shape-3'){


                $h = '145';

                if($margs['shape_height']){
                    $h = $margs['shape_height'];
                }

                $output.='<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="100%" height="'.$h.'px" viewBox="0 0 870 145" enable-background="new 0 0 870 145" xml:space="preserve"  preserveAspectRatio="none">
<path fill-rule="evenodd" clip-rule="evenodd" fill="'.$margs['shape_color'].'" d="M0,0h870L0,145V0z"/>
</svg>
';
            }
            if($margs['shape']=='shape-4'){
                $h = '145';

                if($margs['shape_height']){
                    $h = $margs['shape_height'];
                }

                $output.='<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="100%" height="'.$h.'px" viewBox="0 0 870 145" enable-background="new 0 0 870 145" xml:space="preserve" preserveAspectRatio="none">
<path fill-rule="evenodd" clip-rule="evenodd" fill="'.$margs['shape_color'].'" d="M870,0H-0.001L870,145V0z"/>
</svg>
';
            }
            if($margs['shape']=='shape-5'){


                $h = '142';

                if($margs['shape_height']){
                    $h = $margs['shape_height'];
                }


                $output.='<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="100%" height="'.$h.'px" viewBox="0 0 870 142" enable-background="new 0 0 870 142" xml:space="preserve" preserveAspectRatio="none">
<path fill-rule="evenodd" clip-rule="evenodd" fill="'.$margs['shape_color'].'" d="M0,0h870v142H0V0z"/>
</svg>
';
            }

            $output.='</figure>';
        }







    }

    if(function_exists('wpb_js_remove_wpautop')){

        $output .= wpb_js_remove_wpautop( $content );
    }else{
        $output.=do_shortcode($content);
    }

    if($added_content_sheet_text_section){

        $output .= '</div><!--end content sheet text-->';
    }




    $output .= '</section>';
    $output .= $after_output;

    return $output;


}


if(function_exists('qucreative_sanitize_term_slug_to_id')==false){
	function qucreative_sanitize_term_slug_to_id($arg,$taxonomy_name=''){


	    if($taxonomy_name==''){
	        global $antfarm;

	        $taxonomy_name= $antfarm->name_port_item_cat;
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
include_once('antfarm_widgets.php');



