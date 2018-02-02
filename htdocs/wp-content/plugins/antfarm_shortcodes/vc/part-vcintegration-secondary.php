<?php





if(function_exists('vc_map')){



    $label = '';

    $label = 'QuCreative ';

    $arr_headings = array(
        array(
            'label'=>@sprintf(esc_html__("Heading %s",'antfarm'),'1'),
            'val'=>'h1',
        ),
        array(
            'label'=>@sprintf(esc_html__("Heading %s",'antfarm'),'2'),
            'val'=>'h2',
        ),
        array(
            'label'=>@sprintf(esc_html__("Heading %s",'antfarm'),'3'),
            'val'=>'h3',
        ),
        array(
            'label'=>@sprintf(esc_html__("Heading %s",'antfarm'),'4'),
            'val'=>'h4',
        ),
        array(
            'label'=>@sprintf(esc_html__("Heading %s",'antfarm'),'5'),
            'val'=>'h5',
        ),
        array(
            'label'=>@sprintf(esc_html__("Heading %s",'antfarm'),'6'),
            'val'=>'h6',
        ),
        array(
            'label'=>@sprintf(esc_html__("Heading Group %s",'antfarm'),'1'),
            'val'=>'h-group-1',
        ),
        array(
            'label'=>@sprintf(esc_html__("Heading Group %s",'antfarm'),'2'),
            'val'=>'h-group-2',
        ),
    );





    $arr_btn_styles = array(
        array(
            'label'=>esc_html__("Highlight"),
            'val'=>'color-highlight',
        ),
        array(
            'label'=>esc_html__("Black"),
            'val'=>'style-black',
        ),
        array(
            'label'=>esc_html__("Simple"),
            'val'=>' ',
        ),
        array(
            'label'=>esc_html__("Transparent Highlight"),
            'val'=>'style-hallowred',
        ),
        array(
            'label'=>esc_html__("Transparent Black"),
            'val'=>'style-hallowblack',
        ),
    );






    vc_map(array(
        "name" => $label. esc_html__("Secondary Content"). ' - '.esc_html__("Video"),
        "base" => "antfarm_sc_video",
        "class" => "",
        'as_child' => array(
            'only' => 'sc_section',
        ),
        "icon" => $this->base_url . "assets/icons/sc_video_player.png", // -- Simply pass url to your icon here
 
        "category" => esc_html__("Content"),
        "params" => array(





            array(
                "type" => "antfarm_add_media_att",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Media"),
                "param_name" => "media",
                "value" => '',
                "description" => esc_html__('Input the youtube video link or vimeo video link or select a self hosted video'),
            ),


            array(
                "type" => "attach_image",
                "holder" => "",
                "class" => "",
                "heading" => esc_html__("Cover"),
                "param_name" => "video_cover",
                "value" => '',
                "description" => esc_html__('Optional Cover Image')
            ),



            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("First Line"),
                "param_name" => "line1",
                "value" => '',
                "description" => __('the text to display')
            ),


            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Second Line"),
                "param_name" => "line2",
                "value" => '',
                "description" => esc_html__('the text to display'),

            ),




            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Heading Style'),
                'param_name' => 'heading_style_line_1',
                'value' => $arr_headings,
                'std' => 'h5',
                'description' => esc_html__('for line 1'),
            ),


            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Heading Style'),
                'param_name' => 'heading_style_line_2',
                'value' => $arr_headings,
                'std' => 'h2',
                'description' => __('for line 2'),
            ),


        )
    ));
    $admin_email = get_option('admin_email');

    vc_map(array(
        "name" => $label. esc_html__("Secondary Content - Contact Form"),
        "base" => "antfarm_sc_contact_form",
        'as_child' => array(
            'only' => 'sc_section',
        ),
        "icon" => $this->base_url . "assets/icons/sc_contact_form.png", // -- Simply pass url to your icon here
        "class" => "",
 
        "category" => esc_html__("Content"),
        "params" => array(






            array(
                "type" => "antfarm_add_media_att",
                "holder" => "",
                "class" => " button-setting-input-url with-colorpicker",
                "heading" => esc_html__("Background"),
                "param_name" => "bg",
                "value" => '',
                'library_type' => 'image',
                "description" => esc_html__("This is the background",'antfarm')
            ),



            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Overlay Opacity"),
                "param_name" => "overlay_opacity",
                "value" => 50,
                "description" => __('input the black overlay opacity - the one above the featured image  '),
            ),




            array(
                "type" => "textfield",
                "holder" => "",
                "class" => "",
                "heading" => esc_html__("Email To..."),
                "param_name" => "email_target",
                "value" => $admin_email,
            ),





            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Send Message Text"),
                "param_name" => "translate_send_message",
                "value" => '',
                "description" => __('replace the SEND MESSAGE text'),
            ),


        )
    ));







    vc_map(array(
        "name" => $label. esc_html__("Secondary Content").' - '.esc_html__("Call to Action"),
        "base" => "antfarm_sc_call_to_action",
        "class" => "",
        'as_child' => array(
            'only' => 'sc_section',
        ),
        "icon" => $this->base_url . "assets/icons/sc_call_to_action.png", // -- Simply pass url to your icon here
 
        "category" => esc_html__("Content"),
        "js_view" => 'ViewInitSelector',
        "params" => array(






            array(
                "type" => "antfarm_add_media_att",
                "holder" => "",
                "class" => " button-setting-input-url with-colorpicker",
                "heading" => esc_html__("Background"),
                "param_name" => "bg",
                "value" => '',
                'library_type' => 'image',
                "description" => esc_html__("This is the background",'antfarm'),
            ),





            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Overlay Opacity"),
                "param_name" => "overlay_opacity",
                "value" => 50,
                "description" => esc_html__('input the black overlay opacity - the one above the featured image  '),
            ),


            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Title"),
                "param_name" => "title",
                "value" => '',
                "description" => ''
            ),

            array(
                "type" => "textarea_html",
                "class" => "",
                "heading" => esc_html__("Content"),
                "param_name" => "content",
                "value" => '',
                "description" => ''
            ),


            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Read More Text"),
                "param_name" => "read_more_text",
                "value" => esc_html__("READ MORE"),
                "description" => '',
            ),

            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Read More Link"),
                "param_name" => "read_more_link",
                "value" => '',
                "description" => '',
            ),






            array(
                "type" => "antfarm_button_customizer",
                "holder" => "",
                "class" => "",
                "heading" => esc_html__("Button Style"),
                "param_name" => "button_style",
                "value" => '',
            ),






            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Box Width"),
                "param_name" => "box_width",
                "value" => '',
                "description" => esc_html__('Leave no value ( default ) or enter a value ( in px ) to constrict the box size'),
            ),



            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Heading Style'),
                'param_name' => 'heading',
                'value' => $arr_headings,
                'std' => 'h-group-2',
                'description' => esc_html__('select the heading style for author'),
            ),




        )
    ));


    vc_map(array(
        "name" => $label. esc_html__("Secondary Content").' - '.esc_html__("Quote"),
        "base" => "antfarm_sc_blockquote",
        "class" => "",

        'as_child' => array(
            'only' => 'sc_section',
        ),
        "icon" => $this->base_url . "assets/icons/sc_quote.png", // -- Simply pass url to your icon here
 
        "category" => esc_html__("Content"),
        "params" => array(




            array(
                "type" => "antfarm_add_media_att",
                "holder" => "",
                "class" => " button-setting-input-url with-colorpicker",
                "heading" => esc_html__("Background"),
                "param_name" => "bg",
                "value" => '',
                'library_type' => 'image',
                "description" => esc_html__("This is the background",'antfarm')
            ),



            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Overlay Opacity"),
                "param_name" => "overlay_opacity",
                "value" => 50,
                "description" => __('input the black overlay opacity - the one above the featured image  '),
            ),



            array(
                "type" => "textarea_html",
                "class" => "",
                "holder" => "div",
                "heading" => esc_html__("Content"),
                "param_name" => "content",
                "value" => '',
                "description" => ''
            ),


            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Author"),
                "param_name" => "author",
                "value" => '',
                "description" => '',
            ),





            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Box Width"),
                "param_name" => "box_width",
                "value" => '',
                "description" => esc_html__('Leave no value ( default ) or enter a value ( in px ) to constrict the box size'),
            ),


            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Author').' '.esc_html__('Heading Style'),
                'param_name' => 'heading_style',
                'value' => $arr_headings,
                'std' => 'h6',
                'description' => esc_html__('select the heading style for author'),
            ),




        )
    ));


    vc_map(array(
        "name" => $label. esc_html__("Secondary Content").' - '.esc_html__("Media and Text"),
        "base" => "antfarm_sc_video_text",
        "class" => "",
        "icon" => $this->base_url . "assets/icons/sc_text_and_image_or_video.png", // -- Simply pass url to your icon here
 
        "category" => esc_html__("Content"),
        "js_view" => 'ShowParamsElement',
        'as_child' => array(
            'only' => 'sc_section',
        ),
        "params" => array(





            array(
                "type" => "antfarm_add_media_att",
                "holder" => "",
                "class" => " button-setting-input-url with-colorpicker",
                "heading" => esc_html__("Background"),
                "param_name" => "bg",
                "value" => '',
                'library_type' => 'image',
                "description" => esc_html__("This is the background",'antfarm')
            ),



            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Overlay Opacity"),
                "param_name" => "overlay_opacity",
                "value" => 50,
                "description" => esc_html__('input the black overlay above the featured image opacity'),
            ),




            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Featured Media Type'),
                'param_name' => 'featured_media_type',
                'value' =>
                     array(
                        array(
                            'label'=>esc_html__("Video"),
                            'val'=>'video',
                        ),
                        array(
                            'label'=>esc_html__("Image"),
                            'val'=>'image',
                        ),
                    ),
                'std' => 'h5',
                'description' => esc_html__('select the featured media type'),
            ),


            array(
                "type" => "antfarm_add_media_att",
                "holder" => "",
                "class" => " button-setting-input-url",
                "heading" => esc_html__("Video"),
                "param_name" => "media_video",
                "value" => '',
                'library_type' => 'video',
                "description" => esc_html__('Input a vimeo / youtube link or upload a local video'),
                "dependency" => array(
                    "element" => "featured_media_type",
                    "value" => array("video"),
                ),
            ),

            array(
                "type" => "antfarm_add_media_att",
                "holder" => "",
                "class" => " try-preview-image button-setting-input-url",
                "heading" => esc_html__("Video Cover"),
                "param_name" => "video_cover",
                "value" => '',
                'library_type' => 'image',
                "description" => esc_html__('Select a image cover from the library'),
                "dependency" => array(
                    "element" => "featured_media_type",
                    "value" => array("video"),
                ),
            ),


            array(
                "type" => "antfarm_add_media_att",
                "holder" => "",
                "class" => " try-preview-image button-setting-input-url",
                "heading" => esc_html__("Image"),
                "param_name" => "image",
                "value" => '',
                'library_type' => 'image',
                "description" => __('Select a image from the library'),
                "dependency" => array(
                    "element" => "featured_media_type",
                    "value" => array("image"),
                ),
            ),

            array(
	            "type" => "textfield",
	            "class" => "",
	            "heading" => esc_html__("Image Description"),
	            "param_name" => "image_alt",
	            "holder" => "",
	            "value" => '',
	            "description" => '',
	            "dependency" => array(
		            "element" => "featured_media_type",
		            "value" => array("image"),
	            ),
            ),



            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Text Aligment'),
                "holder" => "",
                "std" => "text-right",
                'param_name' => 'caption_aligment',
                'value' => array(
                    array(
                        'label'=>esc_html__("Text Left"),
                        'val'=>'text-left',
                    ),
                    array(
                        'label'=>esc_html__("Text Right"),
                        'val'=>'text-right',
                    ),
                ),
                'description' => esc_html__('select the style of the new section')
            ),

            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Heading"),
                "param_name" => "title",
                "holder" => "div",
                "value" => '',
                "description" => '',
            ),



            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Heading Style'),
                'param_name' => 'heading',
                'value' => $arr_headings,
                'std' => 'h5',
                'description' => esc_html__('select the heading style'),
            ),




            array(
                "type" => "textarea_html",
                "class" => "",
                "heading" => esc_html__("Content"),
                "param_name" => "content",
                "value" => '',
                "description" => ''
            ),




        )
    ));






    vc_map(array(
        "name" => $label. esc_html__("Secondary Content").' - '.esc_html__("Three Columns"),
        "base" => "antfarm_sc_three_cols",
        "class" => "",
        "icon" => $this->base_url . "assets/icons/sc_3_box_content.png", // -- Simply pass url to your icon here
 
        "category" => esc_html__("Content"),
        'as_child' => array(
            'only' => 'sc_section',
        ),
        "js_view" => 'ViewInitSelector',
        "params" => array(




            array(
                "type" => "antfarm_add_media_att",
                "holder" => "",
                "class" => " button-setting-input-url with-colorpicker",
                "heading" => esc_html__("Background"),
                "param_name" => "bg_1",
                "value" => '',
                'library_type' => 'image',
                "description" => esc_html__("This is the background",'antfarm')
            ),



            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Overlay Opacity"),
                "param_name" => "overlay_opacity_1",
                "value" => 50,
                "description" => esc_html__('input the black overlay opacity - the one above the background image  '),
            ),




            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Heading"),
                "param_name" => "title_1",
                "value" => '',
                "description" => '',
            ),



            array(
                "type" => "textarea",
                "class" => "",
                "heading" => esc_html__("Content"),
                "param_name" => "content_1",
                "value" => '',
                "description" => ''
            ),





            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Read More Text"),
                "param_name" => "read_more_text_1",
                "value" => '',
                "description" => '',
            ),

            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Read More Link"),
                "param_name" => "read_more_link_1",
                "value" => '',
                "description" => '',
            ),




            array(
                "type" => "antfarm_button_customizer",
                "holder" => "",
                "class" => "",
                "heading" => esc_html__("Button Style"),
                "param_name" => "button_style_1",
                "value" => '{"style":"style-hallowred","padding":"padding-medium","rounded":"rounded"}',
            ),







            array(
                "type" => "antfarm_add_media_att",
                "holder" => "",
                "class" => " button-setting-input-url with-colorpicker",
                "heading" => esc_html__("Background"),
                "param_name" => "bg_2",
                "value" => '',
                'library_type' => 'image',
                "description" => esc_html__("This is the background",'antfarm')
            ),







            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Overlay Opacity"),
                "param_name" => "overlay_opacity_2",
                "value" => 50,
                "description" => esc_html__('input the black overlay opacity - the one above the background image  '),
            ),



            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Heading"),
                "param_name" => "title_2",
                "value" => '',
                "description" => '',
            ),



            array(
                "type" => "textarea",
                "class" => "",
                "heading" => esc_html__("Content"),
                "param_name" => "content_2",
                "value" => '',
                "description" => ''
            ),




            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Read More Text"),
                "param_name" => "read_more_text_2",
                "value" => '',
                "description" => '',
            ),

            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Read More Link"),
                "param_name" => "read_more_link_2",
                "value" => '',
                "description" => '',
            ),


            array(
                "type" => "antfarm_button_customizer",
                "holder" => "",
                "class" => "",
                "heading" => esc_html__("Button Style"),
                "param_name" => "button_style_2",
                "value" => '{"style":"style-hallowred","padding":"padding-medium","rounded":"rounded"}',
            ),











            array(
                "type" => "antfarm_add_media_att",
                "holder" => "",
                "class" => " button-setting-input-url with-colorpicker",
                "heading" => esc_html__("Background"),
                "param_name" => "bg_3",
                "value" => '',
                'library_type' => 'image',
                "description" => esc_html__("This is the background",'antfarm')
            ),






            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Overlay Opacity"),
                "param_name" => "overlay_opacity_3",
                "value" => 50,
                "description" => esc_html__('input the black overlay opacity - the one above the background image  '),
            ),




            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Heading"),
                "param_name" => "title_3",
                "value" => '',
                "description" => '',
            ),



            array(
                "type" => "textarea",
                "class" => "",
                "heading" => esc_html__("Content"),
                "param_name" => "content_3",
                "value" => '',
                "description" => ''
            ),




            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Read More Text"),
                "param_name" => "read_more_text_3",
                "value" => '',
                "description" => '',
            ),

            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Read More Link"),
                "param_name" => "read_more_link_3",
                "value" => '',
                "description" => '',
            ),



            array(
                "type" => "antfarm_button_customizer",
                "holder" => "",
                "class" => "",
                "heading" => esc_html__("Button Style"),
                "param_name" => "button_style_3",
                "value" => '{"style":"style-hallowred","padding":"padding-medium","rounded":"rounded"}',
            ),












            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Box Width"),
                "param_name" => "box_width",
                "value" => '',
                "description" => esc_html__('Leave no value ( default ) or enter a value ( in px ) to constrict the box size'),
            ),



            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Heading Style'),
                'param_name' => 'heading',
                'value' => $arr_headings,
                'std' => 'h5',
                'description' => esc_html__('select the heading style'),
            ),








        )
    ));






    vc_map(array(
        "name" => $label. esc_html__("Secondary Content - Contact Box"),
        "base" => "antfarm_sc_contact_box",
        "class" => "",
        "icon" => $this->base_url . "assets/icons/sc_contact_details.png", // -- Simply pass url to your icon here
 
        "category" => esc_html__("Content"),
        'as_child' => array(
            'only' => 'sc_section',
        ),
        "params" => array(







            array(
                "type" => "antfarm_add_media_att",
                "holder" => "",
                "class" => " button-setting-input-url with-colorpicker",
                "heading" => esc_html__("Background"),
                "param_name" => "bg",
                "value" => '',
                'library_type' => 'image',
                "description" => esc_html__("This is the background",'antfarm')
            ),








            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Overlay Opacity"),
                "param_name" => "overlay_opacity",
                "value" => 50,
                "description" => esc_html__('input the black overlay opacity - the one above the featured image  '),
            ),


            array(
                "type" => "textfield",
                "holder" => "",
                "class" => "",
                "heading" => esc_html__("View Map"),
                "param_name" => "view_map_str",
                "value" => '',
                "description" => ''
            ),







            array(
                "type" => "textarea_html",
                "holder" => "",
                "class" => "",
                "heading" => esc_html__("Content"),
                "param_name" => "content",
                "value" => '',
                "description" => ''
            ),







            array(
                "type" => "textfield",
                "holder" => "",
                "class" => "",
                "heading" => esc_html__("Latitude"),
                "param_name" => "lat",
                "value" => '',
                "description" => ''
            ),




            array(
                "type" => "textfield",
                "holder" => "",
                "class" => "",
                "heading" => esc_html__("Longitude"),
                "param_name" => "long",
                "value" => '',
                "description" => ''
            ),



            array(
                'type' => 'param_group',
                'value' => '',
                "class" => "",
                'param_name' => 'titles',
                'heading' => esc_html__("Social Links"),
                // -- Note params is mapped inside param-group:
                'params' => array(


                    array(
                        "type" => "dzsqcr_faiconselector",
                        "holder" => "div",
                        "class" => "",
                        "heading" => esc_html__("Icon"),
                        "param_name" => "faicon",
                        "icon_type" => "fa",
                        "value" => '',
                    ),
                    array(
                        'type' => 'textfield',
                        'value' => '',
                        'heading' => 'Link',
                        'param_name' => 'link',
                    )
                ),

            ),



        )
    ));


    vc_map(array(
        "name" => $label. esc_html__("Secondary Content").' - '.__('Small Map'),
        "base" => "antfarm_sc_small_map",
        "class" => "",
        "icon" => $this->base_url . "assets/icons/sc_small_map.png", // -- Simply pass url to your icon here
 
        "category" => esc_html__("Content"),
        'as_child' => array(
            'only' => 'sc_section',
        ),
        "params" => array(









            array(
                "type" => "textfield",
                "holder" => "",
                "class" => "",
                "heading" => esc_html__("Heading "),
                "param_name" => "heading_text",
                "value" => '',
                "description" => ''
            ),







            array(
                "type" => "textfield",
                "holder" => "",
                "class" => "",
                "heading" => esc_html__("Content"),
                "param_name" => "content_text",
                "value" => '',
                "description" => ''
            ),






            array(
                "type" => "textfield",
                "holder" => "",
                "class" => "",
                "heading" => esc_html__("Button Text"),
                "param_name" => "button_text",
                "value" => '',
                "description" => ''
            ),



            array(
                "type" => "textfield",
                "holder" => "",
                "class" => "",
                "heading" => esc_html__("Button Link"),
                "param_name" => "button_link",
                "value" => '',
                "description" => ''
            ),




            array(
                "type" => "textfield",
                "holder" => "",
                "class" => "",
                "heading" => esc_html__("Box Width"),
                "param_name" => "map_width",
                "value" => '',
                "description" => ''
            ),



            array(
                "type" => "textfield",
                "holder" => "",
                "class" => "",
                "heading" => esc_html__("Box Offset"),
                "param_name" => "map_margin_left",
                "value" => '',
                "description" => ''
            ),





            array(
                "type" => "textfield",
                "holder" => "",
                "class" => "",
                "heading" => esc_html__("Latitude"),
                "param_name" => "lat",
                "value" => '-33.890542',
                "description" => ''
            ),




            array(
                "type" => "textfield",
                "holder" => "",
                "class" => "",
                "heading" => esc_html__("Longitude"),
                "param_name" => "long",
                "value" => '151.274856',
                "description" => ''
            ),



            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Heading Style'),
                'param_name' => 'heading_style',
                'value' => $arr_headings,
                'std' => 'h6',
                'description' => esc_html__("for top title"),
            ),







        )
    ));



    vc_map(array(
        "name" => $label. esc_html__("Secondary Content - Testimonials"),
        "base" => "antfarm_sc_testimonials",
        "class" => "",

        'as_child' => array(
            'only' => 'sc_section',
        ),
        "icon" => $this->base_url . "assets/icons/sc_testimonials.png", // -- Simply pass url to your icon here
 
        "category" => esc_html__("Content"),
        "params" => array(






            array(
                "type" => "antfarm_add_media_att",
                "holder" => "",
                "class" => " button-setting-input-url with-colorpicker",
                "heading" => esc_html__("Background"),
                "param_name" => "media",
                "value" => '',
                'library_type' => 'image',
                "description" => esc_html__("This is the background",'antfarm')
            ),



            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Overlay Opacity"),
                "param_name" => "overlay_opacity",
                "value" => 50,
                "description" => esc_html__('input the black overlay opacity - the one above the featured image  '),
            ),


            array(
                'type' => 'param_group',
                'value' => '',
                "class" => "",
                'param_name' => 'tests',
                'heading' => esc_html__("Testimonials"),
                // -- Note params is mapped inside param-group:
                'params' => array(


                    array(
                        'type' => 'textfield',
                        'value' => esc_html__("TESTIMONIAL"),
                        'heading' => esc_html__("Title"),
                        'param_name' => 'title',
                    ),
                    array(
                        'type' => 'textfield',
                        'value' => '',
                        'heading' => esc_html__("Name"),
                        'param_name' => 'name',
                    ),
 
 
 
 
 
 
 
 
 
 
 
 
                    array(
                        'type' => 'textfield',
                        'value' => '',
                        'heading' => esc_html__("Occupation"),
                        'param_name' => 'position',
                    ),


                    array(
                        "type" => "textarea",
                        "holder" => "div",
                        "class" => "",
                        "heading" => esc_html__("Quote"),
                        "param_name" => "the_test",
                        "value" => '',
                        "description" => esc_html__('the text to display'),

                    ),



                )
            ),



            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Heading Style'),
                'param_name' => 'heading_style',
                'value' => $arr_headings,
                'std' => 'h6',
                'description' => esc_html__('for the testimonial title'),
            ),

            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Heading Style Name'),
                'param_name' => 'heading_style_name',
                'value' => $arr_headings,
                'std' => 'h2',
                'description' => esc_html__('for the name'),
            ),

            array(
                'type' => 'dropdown',
                'heading' => __('Heading Style Subtitle'),
                'param_name' => 'heading_style_subtitle',
                'value' => $arr_headings,
                'std' => 'h6',
                'description' => esc_html__('for the job position'),
            ),

        )
    ));



    vc_map(array(
        "name" => $label. esc_html__("Secondary Content - Client Slider"),
        "base" => "antfarm_sc_client_slider",
        "class" => "",
        "js_view" => 'DivImageElement',
        "icon" => $this->base_url . "assets/icons/sc_client_slider.png", // -- Simply pass url to your icon here
 
        "category" => esc_html__("Content"),
        'as_child' => array(
            'only' => 'sc_section',
        ),
        "params" => array(






            array(
                "type" => "antfarm_add_media_att",
                "holder" => "",
                "class" => " button-setting-input-url with-colorpicker",
                "heading" => esc_html__("Background"),
                "param_name" => "media",
                "value" => '',
                'library_type' => 'image',
                "description" => esc_html__("This is the background",'antfarm')
            ),



            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Overlay Opacity"),
                "param_name" => "overlay_opacity",
                "value" => 50,
                "description" => esc_html__('input the black overlay opacity - the one above the featured image  '),
            ),


            array(
                'type' => 'param_group',
                'value' => '',
                "class" => "",
                'param_name' => 'client',
                'heading' => esc_html__("Client Logos"),
                // -- Note params is mapped inside param-group:
                'params' => array(



                    array(
                        "type" => "attach_image",
                        "heading" => esc_html__("Logo"),
                        "param_name" => "logo",
                        "value" => '',
                        "description" => esc_html__('This is the logo')
                    ),
                )
            ),

        )
    ));

    if(defined('QUCREATIVE_VERSION')){



        $arr_types = array(
            array(
                'label'=>esc_html__("Image"),
                'val'=>'image',
            ),
            array(
                'label'=>esc_html__("Map"),
                'val'=>'map',
            ),
        );



        $arr_styles = array(
            array(
                'label'=>esc_html__("Light"),
                'val'=>'light',
            ),
            array(
                'label'=>esc_html__("Dark"),
                'val'=>'dark',
            ),
        );


        // -- this element is adapted only to "Q Creative" theme
;

    }


    $arr_on_off = array(
        array(
            'label'=>esc_html__("No"),
            'val'=>'off',
        ),
        array(
            'label'=>esc_html__("Yes"),
            'val'=>'on',
        ),
    );

    vc_map(array(
        "name" => $label. esc_html__("Secondary Content - Progress"),
        "base" => "antfarm_sc_progress",
        "class" => "",

        'as_child' => array(
            'only' => 'sc_section',
        ),
        "icon" => $this->base_url . "assets/icons/sc_numbers.png", // -- Simply pass url to your icon here
 
        "category" => esc_html__("Content"),
        "params" => array(




            array(
                "type" => "antfarm_add_media_att",
                "holder" => "",
                "class" => " button-setting-input-url with-colorpicker",
                "heading" => esc_html__("Background"),
                "param_name" => "bg",
                "value" => '',
                'library_type' => 'image',
                "description" => esc_html__("This is the background",'antfarm')
            ),


            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Overlay Opacity"),
                "param_name" => "overlay_opacity",
                "value" => 50,
                "description" => __('input the black overlay opacity - the one above the featured image  '),
            ),



            array(
                'type' => 'dropdown',
                'heading' => __('Convert 1000 to "k"'),
                'param_name' => 'convert_1000_to_k',
                'value' => $arr_on_off,
                'description' => __('select the style')
            ),


            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("First Title"),
                "param_name" => "title_1",
                "value" => '',
                "description" => ''
            ),

            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("First Progress Number"),
                "param_name" => "progress_1",
                "value" => "100",
                "description" => ''
            ),

            array(
                "type" => "dzsqcr_faiconselector",
                "class" => "",
                "heading" => esc_html__("Icon"),
                "param_name" => "eticon_1",
                "icon_type" => "et",
                "value" => '',
            ),



            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Second Title"),
                "param_name" => "title_2",
                "value" => '',
                "description" => ''
            ),

            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Second Progress Number"),
                "param_name" => "progress_2",
                "value" => "200",
                "description" => ''
            ),

            array(
                "type" => "dzsqcr_faiconselector",
                "class" => "",
                "heading" => esc_html__("Icon"),
                "param_name" => "eticon_2",
                "icon_type" => "et",
                "value" => '',
            ),




            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Third Title"),
                "param_name" => "title_3",
                "value" => '',
                "description" => ''
            ),

            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Third Progress Number"),
                "param_name" => "progress_3",
                "value" => "300",
                "description" => ''
            ),

            array(
                "type" => "dzsqcr_faiconselector",
                "class" => "",
                "heading" => esc_html__("Icon"),
                "param_name" => "eticon_3",
                "icon_type" => "et",
                "value" => '',
            ),

            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Fourth Title"),
                "param_name" => "title_4",
                "value" => '',
                "description" => ''
            ),

            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Fourth Progress Number"),
                "param_name" => "progress_4",
                "value" => "400",
                "description" => ''
            ),

            array(
                "type" => "dzsqcr_faiconselector",
                "class" => "",
                "heading" => esc_html__("Icon"),
                "param_name" => "eticon_4",
                "icon_type" => "et",
                "value" => '',
            ),



            array(
                'type' => 'dropdown',
                'heading' => __('Heading style'),

                'param_name' => 'heading_style_number',
                 
                'std'=>'h2',
                'value' => $arr_headings,
                'description' => esc_html__("for number",'antfarm'),
            ),

            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Heading style','antfarm'),
 
                'param_name' => 'heading_style',
                 
                'std'=>'h6',
                'value' => $arr_headings,
                'description' => esc_html__("for title",'antfarm'),
            ),


        )
    ));


    vc_map(array(
        "name" => $label. esc_html__("Secondary Content - Social Links",'antfarm'),
        "base" => "antfarm_sc_social_links",
        "class" => "",
        "icon" => $this->base_url . "assets/icons/sc_social.png", // -- Simply pass url to your icon here
 
        "category" => esc_html__("Content",'antfarm'),
        "js_view" => 'DivImageElement',

        'as_child' => array(
            'only' => 'sc_section',
        ),
        "params" => array(




            array(
                "type" => "antfarm_add_media_att",
                "holder" => "",
                "class" => " button-setting-input-url with-colorpicker",
                "heading" => esc_html__("Background"),
                "param_name" => "media",
                "value" => '',
                'library_type' => 'image',
                "description" => __("This is the background",'antfarm')
            ),



            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Overlay Opacity"),
                "param_name" => "overlay_opacity",
                "value" => 50,
                "description" => __('input the black overlay opacity - the one above the featured image  '),
            ),


            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("First Title"),
                "param_name" => "title_1",
                "value" => '',
                "description" => ''
            ),

            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("First Social Network"),
                "param_name" => "social_1",
                "value" => '',
                "description" => ''
            ),
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Link"),
                "param_name" => "link_1",
                "value" => esc_html__("#"),
                "description" => ''
            ),

            array(
                "type" => "dzsqcr_faiconselector",
                "class" => "",
                "heading" => esc_html__("Icon"),
                "param_name" => "icon_1",
                "icon_type" => "fa",
                "value" => '',
            ),



            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Second Title"),
                "param_name" => "title_2",
                "value" => '',
                "description" => ''
            ),

            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Second Social Network"),
                "param_name" => "social_2",
                "value" => '',
                "description" => ''
            ),

            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Link"),
                "param_name" => "link_2",
                "value" => esc_html__("#"),
                "description" => ''
            ),
            array(
                "type" => "dzsqcr_faiconselector",
                "class" => "",
                "heading" => esc_html__("Icon"),
                "param_name" => "icon_2",
                "icon_type" => "fa",
                "value" => '',
            ),




            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Third Title"),
                "param_name" => "title_3",
                "value" => '',
                "description" => ''
            ),

            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Third Social Network"),
                "param_name" => "social_3",
                "value" => '',
                "description" => ''
            ),
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Link"),
                "param_name" => "link_3",
                "value" => esc_html__("#"),
                "description" => ''
            ),

            array(
                "type" => "dzsqcr_faiconselector",
                "class" => "",
                "heading" => esc_html__("Icon"),
                "param_name" => "icon_3",
                "icon_type" => "fa",
                "value" => '',
            ),

            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Fourth Title"),
                "param_name" => "title_4",
                "value" => '',
                "description" => ''
            ),

            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Fourth Social Network"),
                "param_name" => "social_4",
                "value" => '',
                "description" => ''
            ),

            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Link"),
                "param_name" => "link_4",
                "value" => esc_html__("#"),
                "description" => ''
            ),
            array(
                "type" => "dzsqcr_faiconselector",
                "class" => "",
                "heading" => esc_html__("Icon"),
                "param_name" => "icon_4",
                "icon_type" => "fa",
                "value" => '',
            ),










            array(
                'type' => 'dropdown',
                'heading' => __('Heading Style'),
                'param_name' => 'heading_style',
                'value' => $arr_headings,
                'std' => 'h6',
                'description' => __('for circle label'),
            ),

            array(
                'type' => 'dropdown',
                'heading' => __('Heading Style Title'),
                'param_name' => 'heading_style_title',
                'value' => $arr_headings,
                'std' => 'h4',
                'description' => __('for the title'),
            ),

        )
    ));














    global $antfarm;





    $terms = get_terms( $antfarm->name_port_item_cat, array(
        'hide_empty' => false,
    ) );
 





    $arr_skins = array(
        array(
            'label'=>esc_html__("Skin Gazelia "),
            'value'=>'skin-gazelia',
        ),
        array(
            'label'=>esc_html__("Skin Gazelia Transparent"),
            'value'=>'skin-gazelia skin-gazelia--transparent',
        ),
        array(
            'label'=>esc_html__("Skin Lazarus"),
            'value'=>'skin-lazarus',
        ),
        array(
            'label'=>esc_html__("Skin Melbourne"),
            'value'=>'skin-melbourne',
        ),
        array(
            'label'=>esc_html__("Skin Silver"),
            'value'=>'skin-silver',
        ),
        array(
            'label'=>esc_html__("Skin Portfolio Expandable"),
            'value'=>'skin-qucreative zfolio-portfolio-expandable',
        ),
    );

    $arr_layout = array(
        array(
            'label'=>esc_html__("Three Columns"),
            'value'=>'dzs-layout--3-cols',
        ),
        array(
            'label'=>esc_html__("Four Columns"),
            'value'=>'dzs-layout--4-cols',
        ),
        array(
            'label'=>esc_html__("Five Columns"),
            'value'=>'dzs-layout--5-cols',
        ),
 
 
 
 
    );



    $arr_modes = array(
        array(
            'label'=>esc_html__("Even Height"),
            'value'=>'',
        ),
        array(
            'label'=>esc_html__("Masonry"),
            'value'=>'mode-cols',
        ),
    );


    $arr_gap = array(
        array(
            'label'=>sprintf(esc_html__("%s px"),'0'),
            'value'=>'0',
        ),
        array(
            'label'=>sprintf(esc_html__("%s px"),'1'),
            'value'=>'1px',
        ),
        array(
            'label'=>sprintf(esc_html__("%s px"),'2'),
            'value'=>'2px',
        ),
        array(
            'label'=>sprintf(esc_html__("%s px"),'3'),
            'value'=>'3px',
        ),
        array(
            'label'=>sprintf(esc_html__("%s px"),'5'),
            'value'=>'5px',
        ),
        array(
            'label'=>sprintf(esc_html__("%s px"),'10'),
            'value'=>'10px',
        ),
        array(
            'label'=>sprintf(esc_html__("%s px"),'20'),
            'value'=>'20px',
        ),
        array(
            'label'=>esc_html__("Theme Column Gap"),
            'value'=>'theme-column-gap',
        ),
    );

    $arr_cats_parent = array(
        array(
            'label'=>esc_html__("All Categories"),
            'value'=>'all',
        ),
    );



    $terms_parent = get_terms( $antfarm->name_port_item_cat, array(
        'hide_empty' => false,
        'parent' => '0',
    ) );

    foreach ($terms_parent as $tr){

        $aux = array(
            'value'=>$tr->term_id,
            'label'=>$tr->name,
        );

        array_push($arr_cats_parent, $aux);
    }





    $arr_links_to = array(
        array(
            'label'=>esc_html__("Portfolio Item"),
            'val'=>'portfolio_item',
        ),
        array(
            'label'=>esc_html__("Lightbox"),
            'val'=>'zoombox',
        ),
        array(
            'label'=>esc_html__("Item Lightbox"),
            'val'=>'zoombox_item',
        ),
        array(
            'label'=>esc_html__("Item Excerpt"),
            'val'=>'item_excerpt',
        ),
        array(
            'label'=>esc_html__("No Link"),
            'val'=>'none',
        ),
    );


    vc_map(array(
        "name" => $label.' SC '.esc_html__("Portfolio"). ' / '.esc_html__("Gallery"),
        "base" => "antfarm_sc_antfarm_portfolio",
        "class" => "",
        'as_child' => array(
            'only' => 'sc_section',
        ),
        "icon" => $this->base_url . "assets/icons/sc_portfolio_gallery.png", // -- Simply pass url to your icon here
 
        "category" => __('Qu'),
        "js_view" => 'ZfolioElement',
        "params" => array(



            array(
                'type' => 'dropdown',
                'heading' => __('Skin'),
                'param_name' => 'skin',
                'value' =>array(

                    array(
                        'label'=>'Qu - '.esc_html__("Ultra Gallery"),
                        'value'=>'skin-gazelia skin-gazelia--transparent',
                    ),
                     
                     
                     
                     
                    array(
                        'label'=>'Qu - '.esc_html__("Classic Portfolio"),
                        'value'=>'skin-melbourne',
                    ),
                    array(
                        'label'=>'Qu - '.esc_html__("Stack Portfolio"),
                        'value'=>'skin-silver',
                    ),
                    array(
                        'label'=>'Qu - '.esc_html__("Expandable Portfolio"),
                        'value'=>'skin-qucreative zfolio-portfolio-expandable',
                    ),
                ),
                'description' => __('select the style')
            ),
            array(
                'type' => 'dropdown',
                'heading' => __('Thumbnail Height'),
                'param_name' => 'zfolio-mode',
                'admin_label'=>true,
                'value' => array(
                    array(
                        'label'=>esc_html__("Even Height"),
                        'value'=>'mode-normal',
                    ),
                    array(
                        'label'=>esc_html__("Masonry"),
                        'value'=>'mode-cols',
                    ),
                ),
                'description' => __('even - the thumbnails are proportional to width').' / '.__('masonry - the thumbnails are positioned based on their height'),

                "dependency" => array(
                    "element" => "skin",
                    "value" => array(
                        "skin-melbourne",
                        "skin-gazelia skin-gazelia--transparent",
                        "skin-silver",
                    ),
                ),
            ),
             
             
             
             
             
             
             
            array(
                'type' => 'antfarm_layout_chooser',
                'heading' => esc_html__('Layout','antfarm'),
                'param_name' => 'layout',
                 
                 
                'description' => sprintf(__('edit the grids from %shere%s','antfarm'),'<a target="_blank" href="edit.php?post_type=zfolio_grid">','</a>'),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Item links to','antfarm'),
                'param_name' => 'link_whole_item',
                'value' => $arr_links_to,
                'description' => __('select where clicking the item links')
            ),





            array(
                'type' => 'dropdown',
                'heading' => __('Gap'),
                'param_name' => 'gap',
                'std' => 'theme-column-gap',
                'value' => array(
                    array(
                        'label'=>sprintf(esc_html__("%s px"),'0'),
                        'value'=>'0',
                    ),
                    array(
                        'label'=>sprintf(esc_html__("%s px"),'1'),
                        'value'=>'1px',
                    ),
                    array(
                        'label'=>sprintf(esc_html__("%s px"),'2'),
                        'value'=>'2px',
                    ),
                    array(
                        'label'=>sprintf(esc_html__("%s px"),'3'),
                        'value'=>'3px',
                    ),
                    array(
                        'label'=>sprintf(esc_html__("%s px"),'5'),
                        'value'=>'5px',
                    ),
                    array(
                        'label'=>sprintf(esc_html__("%s px"),'10'),
                        'value'=>'10px',
                    ),
                    array(
                        'label'=>sprintf(esc_html__("%s px"),'20'),
                        'value'=>'20px',
                    ),
                    array(
                        'label'=>esc_html__("Theme Column Gap"),
                        'value'=>'theme-column-gap',
                    ),
                ),
                'description' => esc_html__('select the gap','antfarm'),
                "dependency" => array(
                    "element" => "skin",
                    "value" => array("skin-melbourne",
                                     "skin-gazelia skin-gazelia--transparent",
                                     "skin-silver",
                                     "skin-qucreative zfolio-portfolio-expandable",
                    ),
                ),
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Items Per Page'),
                'param_name' => 'posts_per_page',
                'value' => '',
                'description' => __('leave blank to show all items'),
            ),







            array(
                'type' => 'dropdown',
                'heading' => __('Pagination Method'),
                'param_name' => 'pagination_method',
                'description' => __('select a pagination method','antfarm'),
                'value' => array(
                    array(
                        'label'=>esc_html__("No pagination",'antfarm'),
                        'val'=>'off',
                    ),
                    array(
                        'label'=>esc_html__("Pagination",'antfarm'),
                        'val'=>'pagination',
                    ),
                    array(
                        'label'=>esc_html__("Infinite Scroll W/ Lazy Loading",'antfarm'),
                        'val'=>'scroll',
                    ),
                ),
                'std' => 'pagination',
                "dependency" => array(
                    "element" => "skin",
                    "value" => array("skin-melbourne",
                                     "skin-gazelia skin-gazelia--transparent",
                                     "skin-silver",
                    ),
                ),

            ),


            array(
                'type' => 'dropdown',
                'heading' => __('Hide Title','antfarm'),
                'param_name' => 'hide_title',
                'description' => __('hide the title','antfarm'),
                'value' => $arr_on_off,
                'std' => 'off',

            ),
            array(
                'type' => 'dropdown',
                'heading' => __('Title Hover','antfarm'),
                'param_name' => 'title_hover',
                'description' => __('show title on hover'),
                'value' => $arr_on_off,
                'std' => 'on',
                "dependency" => array(
                    "element" => "skin",
                    "value" => array("skin-silver","skin-gazelia skin-gazelia--transparent"),
                ),
            ),

            array(
                'type' => 'dropdown',
                'heading' => __('Enable bordered design','antfarm'),
                'param_name' => 'enable_bordered_design',
                 
                'value' => $arr_on_off,
                'std' => 'off',

                "dependency" => array(
                    "element" => "skin",
                    "value" => array("skin-melbourne"),
                ),
            ),

            array(
                'type' => 'textfield',
                'heading' => __('Extra Classes','antfarm'),
                'param_name' => 'extra_classes',
                'value' => '',
                'description' => __('leave blank to show all items','antfarm')
            ),

             
             
             
             
             
             
             

            array(
                'type' => 'dropdown',
                'heading' => __('Category','antfarm'),
                'param_name' => 'cat',
                'value' => $arr_cats_parent,
                'description' => __('leave no category selected to show all categories')
            ),





            array(
                'type' => 'dropdown',
                'heading' => __('Enable Filters','antfarm'),
                'param_name' => 'filters_enable',
                'description' => __('enable filters','antfarm'),
                'value' => $arr_on_off,
                'std' => 'on',

                "dependency" => array(
                    "element" => "skin",
                    "value" => array(
                        "skin-melbourne",
                        "skin-gazelia skin-gazelia--transparent",
                        "skin-silver",
                    ),
                ),
            ),



            array(
                'type' => 'dropdown',
                'heading' => __('Filters Position','antfarm'),
                'param_name' => 'filters_position',
                'description' => __('filters position','antfarm'),
                'value' => array(
                    array(
                        'label'=>esc_html__("Left",'antfarm'),
                        'val'=>'left',
                    ),
                    array(
                        'label'=>esc_html__("Center",'antfarm'),
                        'val'=>'center',
                    ),
                    array(
                        'label'=>esc_html__("Right",'antfarm'),
                        'val'=>'right',
                    ),
                ),
                'std' => 'left',


                "dependency" => array(
                    "element" => "filters_enable",
                    "value" => array("on",
                    ),
                ),

            ),







            array(
                'type' => 'dropdown',
                'heading' => __('Pagination Position','antfarm'),
                'param_name' => 'pagination_position',
                'description' => __('pagination position','antfarm'),
                'value' => array(
                    array(
                        'label'=>esc_html__("Left",'antfarm'),
                        'val'=>'left',
                    ),
                    array(
                        'label'=>esc_html__("Center",'antfarm'),
                        'val'=>'center',
                    ),
                    array(
                        'label'=>esc_html__("Right",'antfarm'),
                        'val'=>'right',
                    ),
                ),
                'std' => 'left',


                "dependency" => array(
                    "element" => "pagination_method",
                    "value" => array(
                        "pagination",
                    ),
                ),

            ),



            array(
                'type' => 'dropdown',
                'heading' => __('Tablet Responsive Fallback','antfarm'),
                'group' => __('Responsive Options','antfarm'),
                'param_name' => 'responsive_fallback_tablet',
                'std' => 'default',
                 
                'value' => array(
                    array(
                        'label'=>esc_html__("Default"),
                        'value'=>'default',
                    ),
                     
                     
                     
                     
                    array(
                        'label'=>esc_html__("Force five columns",'antfarm'),
                        'value'=>'dzs-layout--5-cols',
                    ),
                    array(
                        'label'=>esc_html__("Force four columns",'antfarm'),
                        'value'=>'dzs-layout--4-cols',
                    ),
                    array(
                        'label'=>esc_html__("Force three columns",'antfarm'),
                        'value'=>'dzs-layout--3-cols',
                    ),
                    array(
                        'label'=>esc_html__("Force two columns",'antfarm'),
                        'value'=>'dzs-layout--2-cols',
                    ),
                    array(
                        'label'=>esc_html__("Force one column",'antfarm'),
                        'value'=>'dzs-layout--1-cols',
                    ),
                ),
                'description' => sprintf(__('leave %sdefault%s for default behaviour','antfarm'),'<strong>','</strong>'),
            ),



            array(
                'type' => 'dropdown',
                'heading' => __('Mobile Responsive Fallback','antfarm'),
                'group' => __('Responsive Options','antfarm'),
                'param_name' => 'responsive_fallback_mobile',
                'std' => 'default',
                 
                'value' => array(
                    array(
                        'label'=>esc_html__("Default",'antfarm'),
                        'value'=>'default',
                    ),
                     
                     
                     
                     
                    array(
                        'label'=>esc_html__("Force five columns",'antfarm'),
                        'value'=>'dzs-layout--5-cols',
                    ),
                    array(
                        'label'=>esc_html__("Force four columns",'antfarm'),
                        'value'=>'dzs-layout--4-cols',
                    ),
                    array(
                        'label'=>esc_html__("Force three columns",'antfarm'),
                        'value'=>'dzs-layout--3-cols',
                    ),
                    array(
                        'label'=>esc_html__("Force two columns",'antfarm'),
                        'value'=>'dzs-layout--2-cols',
                    ),
                    array(
                        'label'=>esc_html__("Force one column",'antfarm'),
                        'value'=>'dzs-layout--1-cols',
                    ),
                ),
                'description' => wp_kses(sprintf(__('leave %sdefault%s for default behaviour','antfarm'),'<strong>','</strong>'),array(
                	'strong'=>array(),
                )),
            ),







            array(
                'type' => 'dropdown',
                'heading' => __('Heading style for Title'),
                'group' => __('Heading Styles'),
                'param_name' => 'heading_style_title',
                 
                'std'=>'',
                'value' => array(
                    array(
                        'label'=>esc_html__("Default"),
                        'val'=>'',
                    ),
                    array(
	                    'label'=>@sprintf(esc_html__("Heading %s",'antfarm'),'1'),
	                    'val'=>'h1',
                    ),
                    array(
	                    'label'=>@sprintf(esc_html__("Heading %s",'antfarm'),'2'),
	                    'val'=>'h2',
                    ),
                    array(
	                    'label'=>@sprintf(esc_html__("Heading %s",'antfarm'),'3'),
	                    'val'=>'h3',
                    ),
                    array(
	                    'label'=>@sprintf(esc_html__("Heading %s",'antfarm'),'4'),
	                    'val'=>'h4',
                    ),
                    array(
	                    'label'=>@sprintf(esc_html__("Heading %s",'antfarm'),'5'),
	                    'val'=>'h5',
                    ),
                    array(
	                    'label'=>@sprintf(esc_html__("Heading %s",'antfarm'),'6'),
	                    'val'=>'h6',
                    ),
                    array(
	                    'label'=>@sprintf(esc_html__("Heading Group %s",'antfarm'),'1'),
	                    'val'=>'h-group-1',
                    ),
                    array(
	                    'label'=>@sprintf(esc_html__("Heading Group %s",'antfarm'),'2'),
	                    'val'=>'h-group-2',
                    ),
                ),
                'description' => sprintf(__('leave %sdefault%s for default behaviour'),'<strong>','</strong>'),
            ),



            array(
                'type' => 'dropdown',
                'heading' => __('Heading style for Description'),
                'group' => __('Heading Styles'),
                'param_name' => 'heading_style_desc',
                 
                'std'=>'',
                'value' => array(
                    array(
                        'label'=>esc_html__("Default"),
                        'val'=>'',
                    ),
                    array(
	                    'label'=>@sprintf(esc_html__("Heading %s",'antfarm'),'1'),
	                    'val'=>'h1',
                    ),
                    array(
	                    'label'=>@sprintf(esc_html__("Heading %s",'antfarm'),'2'),
	                    'val'=>'h2',
                    ),
                    array(
	                    'label'=>@sprintf(esc_html__("Heading %s",'antfarm'),'3'),
	                    'val'=>'h3',
                    ),
                    array(
	                    'label'=>@sprintf(esc_html__("Heading %s",'antfarm'),'4'),
	                    'val'=>'h4',
                    ),
                    array(
	                    'label'=>@sprintf(esc_html__("Heading %s",'antfarm'),'5'),
	                    'val'=>'h5',
                    ),
                    array(
	                    'label'=>@sprintf(esc_html__("Heading %s",'antfarm'),'6'),
	                    'val'=>'h6',
                    ),
                    array(
	                    'label'=>@sprintf(esc_html__("Heading Group %s",'antfarm'),'1'),
	                    'val'=>'h-group-1',
                    ),
                    array(
	                    'label'=>@sprintf(esc_html__("Heading Group %s",'antfarm'),'2'),
	                    'val'=>'h-group-2',
                    ),
                ),
                'description' => sprintf(__('leave %sdefault%s for default behaviour'),'<strong>','</strong>'),
            ),
        )
    ));














































    $arr_types = array(
        array(
            'label'=>esc_html__("Image",'antfarm'),
            'val'=>'image',
        ),
        array(
            'label'=>esc_html__("Image Slider",'antfarm'),
            'val'=>'slider',
        ),
        array(
            'label'=>esc_html__("Image Slider with Captions",'antfarm'),
            'val'=>'slider_with_captions',
        ),
        array(
            'label'=>esc_html__("Video",'antfarm'),
            'val'=>'video',
        ),
        array(
            'label'=>esc_html__("Map",'antfarm'),
            'val'=>'map',
        ),
    );



    $opt_rev_sliders = array();
    if(defined('RS_PLUGIN_FILE_PATH')){
        array_push($arr_types, array(
            'label'=>esc_html__("Revolution Slider",'antfarm'),
            'val'=>'rev_slider',

        ));


        $do_order = 'id';
        $order_direction = 'ASC';
        $where = "`type` != 'template' OR `type` IS NULL";


        global $wpdb;

        




        $results = $wpdb->get_results( 'SELECT * FROM '.RevSliderGlobals::$table_sliders.' ' , OBJECT );

        


        foreach ($results as $revsld){


            $aux = array(
                'label'=>$revsld->title,
                'value'=>$revsld->alias,
            );
            array_push($opt_rev_sliders, $aux);

        }


    }






    $arr_styles = array(
        array(
            'label'=>esc_html__("Light",'antfarm'),
            'val'=>'light',
        ),
        array(
            'label'=>esc_html__("Dark",'antfarm'),
            'val'=>'dark',
        ),
    );


    $arr_shapes = array(
        array(
            'label'=>esc_html__("None"),
            'val'=>'',
        ),
        array(
            'label'=>esc_html__("Triangle Center Bottom",'antfarm'),
            'val'=>'shape-1',
        ),
        array(
            'label'=>esc_html__("Small Triangle Middle",'antfarm'),
            'val'=>'shape-2',
        ),
        array(
            'label'=>esc_html__("Triangle Left",'antfarm'),
            'val'=>'shape-3',
        ),
        array(
            'label'=>esc_html__("Triangle Right",'antfarm'),
            'val'=>'shape-4',
        ),
        array(
            'label'=>esc_html__("Rectangle",'antfarm'),
            'val'=>'shape-5',
        ),
    );

    $arr_aligment = array(
        array(
            'label'=>esc_html__("Left",'antfarm'),
            'val'=>'left',
        ),
        array(
            'label'=>esc_html__("Center",'antfarm'),
            'val'=>'center',
        ),
        array(
            'label'=>esc_html__("Right",'antfarm'),
            'val'=>'right',
        ),
    );

    $params = array(

        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Shape','antfarm'),
            "holder" => "",
            'param_name' => 'shape',
            'value' => $arr_shapes,
            'description' => esc_html__('this will add a SVG shape at the top of the section')
        ),



        array(
            'type' => 'colorpicker',
            'value' => '',
            'heading' => esc_html__('Shape Color','antfarm'),
            'param_name' => 'shape_color',
            'std' => '#1D8B43',
            "dependency" => array(
                "element" => "shape",
                "value" => array("shape-1","shape-2","shape-3","shape-4","shape-5"),
            ),
        ),



        array(
            'type' => 'textfield',
            'value' => '',
            'heading' => esc_html__('Shape Custom Height','antfarm'),
            'param_name' => 'shape_height',
            'std' => '',
            "dependency" => array(
                "element" => "shape",
                "value" => array("shape-1","shape-2","shape-3","shape-4","shape-5"),
            ),
        ),

        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Featured Media Type','antfarm'),
            "holder" => "",
            'param_name' => 'type',
            'value' => $arr_types,
            'description' => esc_html__('select the style of the new section','antfarm')
        ),

        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Revolution Slider','antfarm'),
            "holder" => "",
            'param_name' => 'rev_slider',
            'value' => $opt_rev_sliders,
            'description' => __('select the slider'),
            "dependency" => array(
                "element" => "type",
                "value" => array("rev_slider"),
            ),
        ),






        array(
            "type" => "antfarm_add_media_att",
            "holder" => "",
            "class" => "",
            "heading" => esc_html__("Video"),
            "param_name" => "antfarm_sc_video",
            "value" => '',
            "library_type" => 'video',
            "description" => __('This is the media you are going to use.'),
            "dependency" => array(
                "element" => "type",
                "value" => array("video"),
            ),
        ),


        array(
            "type" => "antfarm_add_media_att",
            "holder" => "",
            "class" => "",
            "library_type" => 'image',
            "heading" => esc_html__("Featured Image"),
            "param_name" => "media",
            "value" => '',
            "description" => __('This is the media you are going to use.'),
            "dependency" => array(
                "element" => "type",
                "value" => array("image"),
            ),
        ),


        array(
            "type" => "attach_images",
            "holder" => "",
            "class" => "",
            "heading" => esc_html__("Images"),
            "param_name" => "slider_images",
            "value" => '',
            "description" => __('Images in slider'),
            "dependency" => array(
                "element" => "type",
                "value" => array("slider"),
            ),
        ),






        array(
            'type' => 'param_group',
            'value' => '',
            "class" => "",
            'param_name' => 'caption_images',
            'heading' => esc_html__("Images"),
            // -- Note params is mapped inside param-group:
            'params' => array(



                array(
                    'type' => 'dropdown',
                    'heading' => __('Caption Aligment'),
                    "holder" => "",
                    'param_name' => 'caption_aligment',
                    'value' => $arr_aligment,
                    'description' => __('select the style of the new section')
                ),

                array(
                    'type' => 'textfield',
                    'value' => '',
                    'heading' => esc_html__("Caption Number"),
                    'param_name' => 'caption_number',
                ),
                array(
                    'type' => 'textarea',
                    'value' => '',
                    'heading' => esc_html__("Caption Description"),
                    'param_name' => 'caption_desc',
                ),


                array(
                    "type" => "attach_image",
                    "holder" => "",
                    "class" => "",
                    "heading" => esc_html__("Image"),
                    "param_name" => "image",
                    "value" => '',
                ),
            ),

            "dependency" => array(
                "element" => "type",
                "value" => array("slider_with_captions"),
            ),
        ),





        array(
            "type" => "textfield",
            "holder" => "",
            "class" => "",
            "heading" => esc_html__("Latitude"),
            "param_name" => "lat",
            "value" => '',
            "description" => '',
            "dependency" => array(
                "element" => "type",
                "value" => array("map"),
            ),
        ),





        array(
            "type" => "textfield",
            "holder" => "",
            "class" => "",
            "heading" => esc_html__("Longitude"),
            "param_name" => "long",
            "value" => '',
            "description" => '',
            "dependency" => array(
                "element" => "type",
                "value" => array("map"),
            ),
        ),


        array(
            "type" => "antfarm_add_media",
            "holder" => "",
            "class" => "",
            "heading" => esc_html__("Section Background"),
            "param_name" => "section_bg_image",
            "value" => '',
            "description" => esc_html__('This is the media you are going to use.'),
        ),

        array(
            "type" => "antfarm_add_media_att",
            "holder" => "",
            "class" => " with-colorpicker with-only-colorpicker",
            "heading" => esc_html__("Section Background Color"),
            "param_name" => "section_bg_color",
            "value" => '',
            "description" => esc_html__('section custom background color'),
        ),




        array(
            "type" => "checkbox",
            "holder" => "",
            "class" => "",

            "heading" => esc_html__("Hide Background on Tablet"),
            "param_name" => "bg_hide_on_tablet",
            "value" => 'on',
            "description" => '',

        ),


        array(
            "type" => "checkbox",
            "holder" => "",
            "class" => "",

            "heading" => esc_html__("Hide Background on Mobile"),
            "param_name" => "bg_hide_on_mobile",
            "value" => 'on',
            "description" => '',

        ),






        array(
            'type' => 'dropdown',
            'heading' => esc_html__('Style'),
            "holder" => "",
            'param_name' => 'style',
            'value' => $arr_styles,
            'description' => esc_html__('select the style of the new section')
        ),
    );

    foreach ($params as $pr){

        vc_add_param( 'vc_section', $pr ); // Note: 'vc_message' was used as a base for "Message box" element
    }



    $settings = array (
        'as_parent' => array(
            'only' => 'vc_row,antfarm_sc_video,antfarm_sc_contact_form,antfarm_sc_blockquote,antfarm_sc_testimonials,antfarm_sc_call_to_action,antfarm_sc_video_text,antfarm_sc_three_cols,antfarm_sc_contact_box,antfarm_sc_small_map,antfarm_sc_client_slider,antfarm_sc_new_section,antfarm_sc_progress,antfarm_sc_social_links,antfarm_sc_antfarm_portfolio',
        ),
    );
    vc_map_update( 'vc_section', $settings ); // Note: 'vc_message' was used as a base for "Message box" element


}


