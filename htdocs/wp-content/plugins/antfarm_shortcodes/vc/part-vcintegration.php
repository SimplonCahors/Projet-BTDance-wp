<?php




if(function_exists('vc_map')){


    $label = '';


    
    global $antfarm;

    if(defined('QUCREATIVE_VERSION')){
        $label = 'QuCreative'.' - ';
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


    $arr_forms = array(
        array(
            'label'=>esc_html__("Square"),
            'val'=>'form-default',
        ),
        array(
            'label'=>esc_html__("Circle"),
            'val'=>'form-circle',
        ),
        array(
            'label'=>esc_html__("Hexagon"),
            'val'=>'form-hexagon',
        ),
    );

    $arr_aligment = array(
        array(
            'label'=>esc_html__("Icon Left"),
            'val'=>'',
        ),
        array(
            'label'=>esc_html__("Icon Right"),
            'val'=>'icon-align-right',
        ),
    );

    $arr_headings = array(
        array(
            'label'=>esc_html__("Heading 1"),
            'val'=>'h1',
        ),
        array(
            'label'=>esc_html__("Heading 2"),
            'val'=>'h2',
        ),
        array(
            'label'=>esc_html__("Heading 3"),
            'val'=>'h3',
        ),
        array(
            'label'=>esc_html__("Heading 4"),
            'val'=>'h4',
        ),
        array(
            'label'=>esc_html__("Heading 5"),
            'val'=>'h5',
        ),
        array(
            'label'=>esc_html__("Heading 6"),
            'val'=>'h6',
        ),
        array(
            'label'=>esc_html__("Heading Group 1"),
            'val'=>'h-group-1',
        ),
        array(
            'label'=>esc_html__("Heading Group 2"),
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



    $arr_btn_paddings = array(
        array(
            'label'=>esc_html__("Normal"),
            'val'=>'',
        ),
        array(
            'label'=>esc_html__("Small"),
            'val'=>'padding-small',
        ),
        array(
            'label'=>esc_html__("Medium"),
            'val'=>'padding-medium',
        ),
    );



    vc_map(array(
        "name" => $label.esc_html__("Icon Box"),
        "base" => "antfarm_bullet_feature",
        "class" => "",
        "icon" => $this->base_url . "assets/icons/icon_box.png", // -- Simply pass url to your icon here
        "category" => esc_html__("QuCreative Elements"),
        "js_view" => 'ViewInitSelector',
        "params" => array(



            array(

                'type' => 'antfarm_icon_selector',
                'heading' => esc_html__('Style'),
                'param_name' => 'style',
                "holder" => "div",
                'value' => array(
                    array(
                        'label'=>sprintf(esc_html__("Style %",'antfarm'),'1'),
                        'value'=>'style-1',
                        "icon" => $this->base_url . "assets/icons/iconbox_style_1.png",
                    ),
                    array(
                        'label'=>sprintf(esc_html__("Style %",'antfarm'),'2'),
                        'value'=>'style-2',
                        "icon" => $this->base_url . "assets/icons/iconbox_style_2.png",
                    ),
                    array(
                        'label'=>sprintf(esc_html__("Style %",'antfarm'),'3'),
                        'value'=>'style-3',
                        "icon" => $this->base_url . "assets/icons/iconbox_style_3.png",
                    ),
                    array(
                        'label'=>sprintf(esc_html__("Style %",'antfarm'),'4'),
                        'value'=>'style-4',
                        "icon" => $this->base_url . "assets/icons/iconbox_style_4.png",
                    ),
                    array(
                        'label'=>sprintf(esc_html__("Style %",'antfarm'),'5'),
                        'value'=>'style-5',
                        "icon" => $this->base_url . "assets/icons/iconbox_style_5.png",
                    ),
                ),
                'description' => esc_html__('select the style of the icon box')
            ),

            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Feature'),
                'param_name' => 'feature',
                'value' =>  array(
                    array(
                        'label'=>esc_html__("Font Awesome"),
                        'val'=>'feature-type-fa',
                    ),
                    array(
                        'label'=>esc_html__("Elegant Fonts "),
                        'val'=>'feature-type-et',
                    ),
                    array(
                        'label'=>esc_html__("Image"),
                        'val'=>'image',
                    ),
                ),
                'description' => esc_html__('select image or elegant fonts icon, or fontawesome icon')
            ),


            // -- et - style1,3,5
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Aligment'),
                'param_name' => 'icon_aligment',
                'value' => $arr_aligment,
                'description' => esc_html__('select the aligment of the icon'),
                "dependency" => array(
                    "element" => "style",
                    "value" => array("style-3","style-4"),
                ),
            ),


            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Text Aligment'),
                'param_name' => 'text_aligment',
                'value' => array(
                    array(
                    'label'=>esc_html__("Align Left"),
                    'value'=>'align-left',
                ),
                    array(
                    'label'=>esc_html__("Align Center"),
                    'value'=>'align-center',
                ),
                    array(
                    'label'=>esc_html__("Align Right"),
                    'value'=>'align-right',
                ),
                    ),


                'std' => 'align-center',
                'description' => esc_html__('select the aligment of the icon'),
                "dependency" => array(
                    "element" => "style",
                    "value" => array("style-1"),
                ),
            ),




            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Icon Theme'),
                'param_name' => 'icon_theme',
                'value' => array(
                    array(
                        'label'=>esc_html__("Icon Light"),
                        'value'=>' ',
                    ),
                    array(
                        'label'=>esc_html__("Icon Dark"),
                        'value'=>'icon-theme-dark',
                    ),
                ),


                'std' => '',
                'description' => esc_html__('select the theme of the icon'),
                "dependency" => array(
                    "element" => "style",
                    "value" => array("style-4"),
                ),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Icon Background Shape'),
                'param_name' => 'form',
                'value' => $arr_forms,
                'description' => __('select the form of the background of the icon'),
                "dependency" => array(
                    "element" => "style",
                    "value" => array("style-4"),
                ),
            ),


            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Title"),
                "param_name" => "title",
                "value" => "",
                "description" => esc_html__('the title')
            ),



            array(
                "type" => "textarea_html",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Content"),
                "param_name" => "content",
                "value" => "",
                "description" => esc_html__('the text to display')
            ),



            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Icon Size"),
                "param_name" => "et_icon_font_size",
                "value" => 'default',
                "description" => esc_html__('icon font size in px'),
                "dependency" => array(
        "element" => "feature",
        "value" => array("feature-type-et","feature-type-fa","fa","et"),
    ),
            ),



            array(
                "type" => "colorpicker",
                "class" => "",
                "heading" => esc_html__("Icon Color"),
                "param_name" => "icon_color",
                "value" => '',
                "description" => esc_html__("icon color"),
                "dependency" => array(
        "element" => "feature",
        "value" => array("feature-type-et","feature-type-fa","fa","et"),
    ),
            ),

            array(
                "type" => "dzsqcr_faiconselector",
                "class" => "",
                "holder" => "div",
                "heading" => esc_html__("FA Icon"),
                "param_name" => "faicon",
                "icon_type" => "fa",
                "value" => "",
                "dependency" => array(
                    "element" => "feature",
                    "value" => array("feature-type-fa","fa"),
                ),
            ),
            array(
                "type" => "dzsqcr_faiconselector",
                "class" => "",
                "holder" => "div",
                "heading" => esc_html__("ET Icon"),
                "param_name" => "eticon",
                "icon_type" => "et",
                "value" => "",
                "dependency" => array(
                    "element" => "feature",
                    "value" => array("feature-type-et","et"),
                ),
            ),


            array(
                "type" => "attach_image",

                "class" => "fullwidth",
                "heading" => esc_html__("Image"),
                "param_name" => "media",
                "value" => "",
                "description" => esc_html__('This is the image'),
                "dependency" => array(
"element" => "feature",
"value" => array("image"),
),
            ),

            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Read More Text"),
                "param_name" => "read_more",
                "value" => '',
                "description" => esc_html__('the title'),
            ),

            array(
                "type" => "textfield",

                "class" => "",
                "heading" => esc_html__("Read More Link"),
                "param_name" => "read_more_link",
                "value" => '#',
                "description" => esc_html__('link'),
            ),



            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => esc_html__("Link Target"),
                "param_name" => "link_target",
                "value" =>  array(
                    array(
                        'label'=>esc_html__("Same Window"),
                        'value'=>'',
                    ),
                    array(
                        'label'=>esc_html__("New Window"),
                        'value'=>'_blank',
                    ),
                ),
                "std" => '',
                "description" => '',
            ),







            array(
                "type" => "antfarm_button_customizer",
                "holder" => "",
                "class" => "",
                "heading" => esc_html__("Button Style"),
                "param_name" => "button_style",
                "value" => '{"style":"color-highlight","padding":"","rounded":"rounded"}',
            ),





            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Heading Style'),
                'param_name' => 'heading',
                'value' => $arr_headings,
                'std' => 'h6',
                'description' => esc_html__('select another heading type'),
            ),


        )
    ));









    vc_map(array(
        "name" => $label.esc_html__("Image for Sideways"),
        "base" => "antfarm_image_for_sideways",
        "class" => "",
        "icon" => $this->base_url . "assets/icons/image_box.png", // -- Simply pass url to your icon here

        "category" => esc_html__("QuCreative Elements"),
        "params" => array(


            array(
                "type" => "antfarm_add_media",
                "holder" => "img",
                "class" => "fullwidth",
                "heading" => esc_html__("Media"),
                "param_name" => "media",
                "value" => "",
                "description" => esc_html__('This is the image')
            ),
        )
    ));






    $terms = get_terms( $antfarm->name_port_item_cat, array(
        'hide_empty' => false,
    ) );






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



    $arr_modes = array();

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

            'value'=>$tr->slug,
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
        "name" => $label.esc_html__("Portfolio"). ' / '.esc_html__("Gallery"),
        "base" => "antfarm_portfolio",
        "class" => "",
        "icon" => $this->base_url . "assets/icons/portfolio.png", // -- Simply pass url to your icon here

        "category" => esc_html__("QuCreative Elements"),
        "js_view" => 'ZfolioElement',
        "params" => array(



            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Skin'),
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
                'description' => esc_html__('select the style')
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Thumbnail Height'),
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
                'description' => esc_html__('even - the thumbnails are proportional to width').' / '.esc_html__('masonry - the thumbnails are positioned based on their height'),

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
                'heading' => esc_html__('Layout'),
                'param_name' => 'layout',

                'description' => sprintf(esc_html__('edit the grids from %shere%s','antfarm'),'<a target="_blank" href="edit.php?post_type=zfolio_grid">','</a>'),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Item links to'),
                'param_name' => 'link_whole_item',
                'value' => $arr_links_to,
                'description' => esc_html__('select where clicking the item links')
            ),





            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Gap'),
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
                'description' => esc_html__('select the gap'),
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
                'heading' => esc_html__('Items Per Page'),
                'param_name' => 'posts_per_page',
                'value' => '',
                'description' => esc_html__('leave blank to show all items'),
            ),








            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Pagination Method'),
                'param_name' => 'pagination_method',
                'description' => esc_html__('select a pagination method'),
                'value' => array(
                    array(
                        'label'=>esc_html__("None").' ( '.esc_html__("Simple Load").' )',
                        'val'=>'off',
                    ),
                    array(
                        'label'=>esc_html__("Pagination"),
                        'val'=>'pagination',
                    ),
                    array(
                        'label'=>esc_html__("Infinite Scroll W/ Lazy Loading"),
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
                'heading' => esc_html__('Title Hover'),
                'param_name' => 'title_hover',
                'description' => esc_html__('show title on hover'),
                'value' => $arr_on_off,
                'std' => 'on',
                "dependency" => array(
                    "element" => "skin",
                    "value" => array("skin-silver","skin-gazelia skin-gazelia--transparent"),
                ),
            ),

            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Enable bordered design'),
                'param_name' => 'enable_bordered_design',

                'value' => $arr_on_off,
                'std' => 'off',

                "dependency" => array(
                    "element" => "skin",
                    "value" => array("skin-melbourne"),
                ),
            ),


            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Category'),
                'param_name' => 'cat',
                'value' => $arr_cats_parent,
                'description' => esc_html__('leave no category selected to show all categories')
            ),





            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Enable Filters'),
                'param_name' => 'filters_enable',
                'description' => esc_html__('enable filters'),
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
                'heading' => esc_html__('Filters Position'),
                'param_name' => 'filters_position',
                'description' => esc_html__('filters position'),
                'value' => array(
                    array(
                        'label'=>esc_html__("Left"),
                        'val'=>'left',
                    ),
                    array(
                        'label'=>esc_html__("Center"),
                        'val'=>'center',
                    ),
                    array(
                        'label'=>esc_html__("Right"),
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
                'heading' => esc_html__('Pagination Position'),
                'param_name' => 'pagination_position',
                'description' => esc_html__('pagination position'),
                'value' => array(
                    array(
                        'label'=>esc_html__("Left"),
                        'val'=>'left',
                    ),
                    array(
                        'label'=>esc_html__("Center"),
                        'val'=>'center',
                    ),
                    array(
                        'label'=>esc_html__("Right"),
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
                'heading' => esc_html__('Tablet Responsive Fallback'),
                'group' => esc_html__('Responsive Options'),
                'param_name' => 'responsive_fallback_tablet',
                'std' => 'default',
                
                'value' => array(
                    array(
                        'label'=>esc_html__("Default"),
                        'value'=>'default',
                    ),
                    
                    array(
                        'label'=>esc_html__("Force five columns"),
                        'value'=>'dzs-layout--5-cols',
                    ),
                    array(
                        'label'=>esc_html__("Force four columns"),
                        'value'=>'dzs-layout--4-cols',
                    ),
                    array(
                        'label'=>esc_html__("Force three columns"),
                        'value'=>'dzs-layout--3-cols',
                    ),
                    array(
                        'label'=>esc_html__("Force two columns"),
                        'value'=>'dzs-layout--2-cols',
                    ),
                    array(
                        'label'=>esc_html__("Force one column"),
                        'value'=>'dzs-layout--1-cols',
                    ),
                ),
                'description' => sprintf(esc_html__('leave %sdefault%s for default behaviour'),'<strong>','</strong>'),
            ),



            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Mobile Responsive Fallback'),
                'group' => esc_html__('Responsive Options'),
                'param_name' => 'responsive_fallback_mobile',
                'std' => 'default',
                
                'value' => array(
                    array(
                        'label'=>esc_html__("Default"),
                        'value'=>'default',
                    ),
                    
                    array(
                        'label'=>esc_html__("Force five columns"),
                        'value'=>'dzs-layout--5-cols',
                    ),
                    array(
                        'label'=>esc_html__("Force four columns"),
                        'value'=>'dzs-layout--4-cols',
                    ),
                    array(
                        'label'=>esc_html__("Force three columns"),
                        'value'=>'dzs-layout--3-cols',
                    ),
                    array(
                        'label'=>esc_html__("Force two columns"),
                        'value'=>'dzs-layout--2-cols',
                    ),
                    array(
                        'label'=>esc_html__("Force one column"),
                        'value'=>'dzs-layout--1-cols',
                    ),
                ),
                'description' => sprintf(esc_html__('leave %sdefault%s for default behaviour'),'<strong>','</strong>'),
            ),







            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Heading style for Title'),
                'group' => esc_html__('Heading Styles'),
                'param_name' => 'heading_style_title',
                
                'std'=>'',
                'value' => array(
                    array(
                        'label'=>esc_html__("Default"),
                        'val'=>'',
                    ),
                    array(
                        'label'=>esc_html__("Heading 1"),
                        'val'=>'h1',
                    ),
                    array(
                        'label'=>esc_html__("Heading 2"),
                        'val'=>'h2',
                    ),
                    array(
                        'label'=>esc_html__("Heading 3"),
                        'val'=>'h3',
                    ),
                    array(
                        'label'=>esc_html__("Heading 4"),
                        'val'=>'h4',
                    ),
                    array(
                        'label'=>esc_html__("Heading 5"),
                        'val'=>'h5',
                    ),
                    array(
                        'label'=>esc_html__("Heading 6"),
                        'val'=>'h6',
                    ),
                    array(
                        'label'=>esc_html__("Heading Group 1"),
                        'val'=>'h-group-1',
                    ),
                    array(
                        'label'=>esc_html__("Heading Group 2"),
                        'val'=>'h-group-2',
                    ),
                ),
                'description' => sprintf(esc_html__('leave %sdefault%s for default behaviour'),'<strong>','</strong>'),
            ),



            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Heading style for Description'),
                'group' => esc_html__('Heading Styles'),
                'param_name' => 'heading_style_desc',
                
                'std'=>'',
                'value' => array(
                    array(
                        'label'=>esc_html__("Default"),
                        'val'=>'',
                    ),
                    array(
                        'label'=>esc_html__("Heading 1"),
                        'val'=>'h1',
                    ),
                    array(
                        'label'=>esc_html__("Heading 2"),
                        'val'=>'h2',
                    ),
                    array(
                        'label'=>esc_html__("Heading 3"),
                        'val'=>'h3',
                    ),
                    array(
                        'label'=>esc_html__("Heading 4"),
                        'val'=>'h4',
                    ),
                    array(
                        'label'=>esc_html__("Heading 5"),
                        'val'=>'h5',
                    ),
                    array(
                        'label'=>esc_html__("Heading 6"),
                        'val'=>'h6',
                    ),
                    array(
                        'label'=>esc_html__("Heading Group 1"),
                        'val'=>'h-group-1',
                    ),
                    array(
                        'label'=>esc_html__("Heading Group 2"),
                        'val'=>'h-group-2',
                    ),
                ),
                'description' => sprintf(esc_html__('leave %sdefault%s for default behaviour'),'<strong>','</strong>'),
            ),
        )
    ));


    vc_map(array(
        "name" => $label.esc_html__("Latest Posts"),
        "base" => "antfarm_latest_posts",
        "class" => "",
        "icon" => $this->base_url . "assets/icons/latest_blog_posts.png", // -- Simply pass url to your icon here
        
        "category" => esc_html__("QuCreative Elements"),
        "params" => array(




            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "vc-title",
                "heading" => esc_html__("Count"),
                "param_name" => "count",
                "value" => 6,
            ),
        )
    ));


    vc_map(array(
        "name" => $label.esc_html__("Latest Posts").' '.'2',
        "base" => "antfarm_latest_posts_2",
        "class" => "",
        "icon" => $this->base_url . "assets/icons/latest_blog_posts.png", // -- Simply pass url to your icon here

        
        "category" => esc_html__("QuCreative Elements"),
        "js_view" => 'ViewInitSelector',
        "params" => array(




            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Posts per Row'),
                'param_name' => 'nr_per_row',
                'std' => '2',
                'value' => array(
                    array(
                      'label'=>esc_html__("Two columns"),
                      'value'=>'2',
                    ),
                    array(
                      'label'=>esc_html__("Three columns"),
                      'value'=>'3',
                    ),
                    array(
                      'label'=>esc_html__("Four columns"),
                      'value'=>'4',
                    ),
                ),
                'description' => esc_html__('select the style of the heading')
            ),


            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "vc-title",
                "heading" => esc_html__("Number of posts"),
                "param_name" => "count",
                "value" => 4,
            ),







            array(
                "type" => "textfield",
                "holder" => "",
                "class" => "vc-title",
                "heading" => esc_html__("Excerpt Length"),
                "param_name" => "excerpt_length",
                "value" => 400,
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
                
                "heading" => esc_html__("Read More Text"),
                "param_name" => "read_more_text",
                "value" => esc_html__("Read More"),
            ),




            array(
                "type" => "textfield",
                "holder" => "",
                "class" => "vc-title",
                "heading" => esc_html__("Custom Thumbnail Height"),
                "param_name" => "custom_thumbnail_height",
                "value" => '',
            ),

        )
    ));




    $arr_styles = array(
        array(
            'label'=>esc_html__("Progress Line"),
            'val'=>'line',
        ),
        array(
            'label'=>esc_html__("Progress Circle"),
            'val'=>'circle',
        ),
        array(
            'label'=>esc_html__("Progress Rectangle"),
            'val'=>'rect',
        ),
    );


    $args = array(
        "name" => $label.esc_html__("Progress Marker"),
        "base" => "antfarm_progress_bar",
        "class" => "",
        "icon" => $this->base_url . "assets/icons/progress_marker.png", // -- Simply pass url to your icon here
        "category" => esc_html__("QuCreative Elements"),
        
        "params" => array(



            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Style'),
                'param_name' => 'style',
                'value' => $arr_styles,
                'description' => __('select the style of the heading')
            ),



            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "vc-title",
                "heading" => esc_html__("Title"),
                "param_name" => "title",
                "value" => "",
            ),
            array(
                "type" => "textfield",
                "holder" => "",
                "class" => "",
                "heading" => esc_html__("Progress"),
                "param_name" => "progress",
                "value" => "",
                "description" => esc_html__("enter a number"),
            ),


            

            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Convert 1000 to "k"'),
                'param_name' => 'convert_1000_to_k',
                'value' => $arr_on_off,
                'description' => esc_html__('select the style')
            ),





            array(
                "type" => "dzsqcr_faiconselector",
                "class" => "",
                "heading" => esc_html__("Icon"),
                "param_name" => "icon",
                "icon_type" => "et",
                "value" => "",
                "dependency" => array(
                    "element" => "style",
                    "value" => array("rect"),
                ),
            ),


            array(
                "type" => "textarea_html",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Description"),
                "param_name" => "content",
                "value" => "",
                "description" => esc_html__('the text to display'),

                "dependency" => array(
                    "element" => "style",
                    "value" => array("circle"),
                ),
            ),


            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Heading Style'),
                'param_name' => 'heading_style',
                'value' => $arr_headings,
                'std' => 'h6',
                'description' => esc_html__('select another heading type'),

                "dependency" => array(
                    "element" => "style",
                    "value" => array("circle"),
                ),
            ),


        )
    );

    

    vc_map($args);




    $arr_styles = array(
        array(
            'label'=>esc_html__("Text"),
            'val'=>'text',
        ),
        array(
            'label'=>esc_html__("Phone Number"),
            'val'=>'phone_number',
        ),
        array(
            'label'=>esc_html__("Social Icons"),
            'val'=>'social_icons',
        ),
    );

    vc_map(array(
        "name" => $label.esc_html__("Contact Info"),
        "base" => "antfarm_contact_info",
        "icon" => $this->base_url . "assets/icons/contact_info.png", // -- Simply pass url to your icon here
        "class" => "",
        "category" => esc_html__("QuCreative Elements"),
        "js_view" => 'ViewTestElement',
        "params" => array(



            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Style'),
                'param_name' => 'style',
                'value' => $arr_styles,
                'description' => __('select the type')
            ),



            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Icon Style'),
                'param_name' => 'icon-style',
                'value' => array(
                    array(
                        'label'=>esc_html__("Default"),
                        'val'=>'default',
                    ),
                    array(
                        'label'=>esc_html__("Style Grey"),
                        'val'=>'grey',
                    ),
                ),
                'description' => esc_html__('select the type'),
                "dependency" => array(
                    "element" => "style",
                    "value" => array("social_icons"),
                ),
            ),



            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "strong",
                "heading" => esc_html__("Heading"),
                "param_name" => "heading",
                "value" => "",
            ),



            array(
                "type" => "textarea_html",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Content"),
                "param_name" => "content",
                "value" => "",
                "dependency" => array(
                    "element" => "style",
                    "value" => array("text","phone_number"),
                ),
            ),


            array(
                "type" => "dzsqcr_faiconselector",
                "class" => "",
                "heading" => esc_html__("Icon"),
                "param_name" => "icon",
                "icon_type" => "et",
                "value" => "",
            ),



            array(
                'type' => 'param_group',
                'value' => '',
                "class" => "",
                'param_name' => 'titles',
                'heading' => esc_html__("Links"),
                // -- Note params is mapped inside param-group:
                'params' => array(


                    array(
                        "type" => "dzsqcr_faiconselector",
                        "holder" => "div",
                        "class" => "",
                        "heading" => esc_html__("Icon"),
                        "param_name" => "faicon",
                        "icon_type" => "fa",
                        "value" => "",
                    ),
                    array(
                        'type' => 'textfield',
                        'value' => '#',
                        'heading' => 'Link',
                        'param_name' => 'link',
                    )
                ),
                "dependency" => array(
                    "element" => "style",
                    "value" => array("social_icons"),
                ),
            ),




        )
    ));

    vc_map(array(
        "name" => $label.esc_html__("Clients List"),
        "base" => "antfarm_client_list",
        "icon" => $this->base_url . "assets/icons/clients_list.png", // -- Simply pass url to your icon here
        "class" => "",
        "category" => esc_html__("QuCreative Elements"),

        "params" => array(



            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "strong",
                "heading" => esc_html__("Extra Classes"),
                "param_name" => "extra_classes",
                "value" => "",
            ),



            array(
                'type' => 'param_group',
                'value' => '',
                "class" => "",
                'param_name' => 'titles',
                'heading' => esc_html__("Links"),
                // -- Note params is mapped inside param-group:
                'params' => array(


                    array(
                        "type" => "antfarm_add_media",
                        "holder" => "",
                        "class" => "",
                        "heading" => esc_html__("Image"),
                        "param_name" => "media",
                        "icon_type" => "",
                        "value" => "",
                    ),
                    array(
                        'type' => 'textfield',
                        'value' => '#',
                        'heading' => 'Link',
                        'param_name' => 'link',
                    )
                ),
            ),




        )
    ));



    $arr_cfs = array();



    $arr_posts = get_posts(array(
        'orderby'          => 'title',
        'order'            => 'DESC',
        'post_type'        => 'antfarm_contact_form',
        'post_status'      => 'publish',
    ));



    foreach ($arr_posts as $po){
        $aux = array(
            'label'=>$po->post_title,
            'value'=>$po->post_name,
        );



        array_push($arr_cfs, $aux);
    }

    $admin_email = get_option('admin_email');

    vc_map(array(
        "name" => $label.esc_html__("Contact Form"),
        "base" => "antfarm_contact_form",
        "class" => "",
        "icon" => $this->base_url . "assets/icons/contact_form.png", // -- Simply pass url to your icon here
        "category" => esc_html__("QuCreative Elements"),

        "params" => array(



            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Contact Form Layout'),
                'param_name' => 'layout',
                'value' => $arr_cfs,
                'description' => esc_html__('select the type')
            ),






            array(
                "type" => "textfield",
                "holder" => "",
                "class" => "",
                "heading" => esc_html__("Email To..."),
                "param_name" => "email_target",
                "value" => $admin_email,
            ),


        )
    ));



    $arr_styles = array(
        array(
            'label'=>esc_html__("Transparent"),
            'val'=>'transparent',
        ),
        array(
            'label'=>esc_html__("Style 1"),
            'val'=>'style-1',
        ),
        array(
            'label'=>esc_html__("Style 2"),
            'val'=>'style-2',
        ),
        array(
            'label'=>esc_html__("Style 3"),
            'val'=>'style-3',
        ),

        array(
            'label'=>esc_html__("Style 5"),
            'val'=>'style-5',
        ),
    );
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
        "name" => $label.esc_html__("Divider"),
        "base" => "antfarm_separator",
        "icon" => $this->base_url . "assets/icons/divider.png", // -- Simply pass url to your icon here
        "class" => "",
        "category" => esc_html__("QuCreative Elements"),
        "js_view" => 'ViewTestElement',
        "params" => array(



            array(

                'type' => 'antfarm_icon_selector',
                'heading' => esc_html__('Style'),
                "holder" => "div",
                'param_name' => 'style',
                'value' => array(
                    array(
                        'label'=>esc_html__("Transparent"),
                        'value'=>'transparent',
                        "icon" => $this->base_url . "assets/icons/divider_style_1.png",
                    ),
                    array(
                        'label'=>esc_html__("Style 1"),
                        'value'=>'style-1',
                        "icon" => $this->base_url . "assets/icons/divider_style_1.png",
                    ),
                    array(
                        'label'=>esc_html__("Style 2"),
                        'value'=>'style-2',
                        "icon" => $this->base_url . "assets/icons/divider_style_2.png",
                    ),
                    array(
                        'label'=>esc_html__("Style 3"),
                        'value'=>'style-3',
                        "icon" => $this->base_url . "assets/icons/divider_style_3.png",
                    ),

                    array(
                        'label'=>esc_html__("Style 5"),
                        'value'=>'style-5',
                        "icon" => $this->base_url . "assets/icons/divider_style_4.png",
                    ),
                ),
                'description' => __('select the style of the heading')
            ),



            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Bottom Spacing"),
                "param_name" => "height",
                "value" => "",

            ),




            array(
                'type' => 'colorpicker',
                'value' => '',
                'heading' => __('Custom Color'),
                'param_name' => 'custom_color',
                "dependency" => array(
                    "element" => "style",
                    "value" => array("style-1","style-2","style-3","style-4","style-5"),
                ),
            ),

        )
    ));

    vc_map(array(
        "name" => $label.esc_html__("Blockquote"),
        "base" => "antfarm_blockquote",
        "class" => "",
        "icon" => $this->base_url . "assets/icons/blockquote.png", // -- Simply pass url to your icon here
        "category" => esc_html__("QuCreative Elements"),

        "params" => array(



            array(
                "type" => "textarea_html",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Text Area"),
                "param_name" => "content",
                "value" => "",
            ),


            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Author"),
                "param_name" => "author",
                "value" => "",
            ),

        )
    ));

    vc_map(array(
        "name" => $label.esc_html__("Video Player"),
        "base" => "antfarm_video_player",
        "class" => "",
        "icon" => $this->base_url . "assets/icons/video_player.png", // -- Simply pass url to your icon here
        "category" => esc_html__("QuCreative Elements"),

        "params" => array(






            array(
                'type' => 'antfarm_add_media_att',
                'value' => '',
                "class" => "",
                'heading' => esc_html__("Media"),
                'param_name' => 'media',
                'library_type' => 'video',
                "description" => __('Input the youtube video link or vimeo video link or select a self hosted video')
            ),



            array(
                "type" => "attach_image",
                "holder" => "",
                "class" => "",
                "heading" => esc_html__("Cover"),
                "param_name" => "video_cover",
                "value" => "",
                "description" => __('Optional Cover Image')
            ),


        )
    ));

    $arr_target=array(
        array(
            'label'=>esc_html__("Self"),
            'value'=>'',
        ),
        array(
            'label'=>esc_html__("Blank"),
            'value'=>'_blank',
        ),
    );

    vc_map(array(
        "name" => $label.esc_html__("Menu Item"),
        "base" => "antfarm_menu_item",
        "class" => "",
        "icon" => $this->base_url . "assets/icons/menu_item.png", // -- Simply pass url to your icon here
        "category" => esc_html__("QuCreative Elements"),

        "params" => array(






            array(
                "type" => "attach_image",
                'value' => '',
                "class" => "",
                'heading' => esc_html__("Photo"),
                'param_name' => 'media',
                'library_type' => 'image',
                "description" => esc_html__('The products\'s thumbnail')
            ),



            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "strong",
                "heading" => esc_html__("Title"),
                "param_name" => "title",
                "value" => "",
                "description" => esc_html__('the text to display')
            ),



            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Price"),
                "param_name" => "price",
                "value" => "",
                "description" => esc_html__('the text to display')
            ),



            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Ingredients"),
                "param_name" => "ingredients",
                "value" => "",
                "description" => esc_html__('the text to display')
            ),



            array(
                'type' => 'param_group',
                'value' => '',
                "class" => "",
                'param_name' => 'titles',
                'heading' => esc_html__("Mentions"),
                // -- Note params is mapped inside param-group:
                'params' => array(

                    array(
                        'type' => 'textfield',
                        'value' => '',
                        'heading' => __('Label'),
                        'param_name' => 'label',
                    ),
                    array(
                        'type' => 'colorpicker',
                        'value' => '',
                        'heading' => __('Color'),
                        'param_name' => 'color',
                    ),

                )
            ),




            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Heading Style'),
                'param_name' => 'heading_style_title',
                'value' => $arr_headings,
                'std' => 'h5',
                'description' => esc_html__('for title'),
            ),



            array(
                'type' => 'dropdown',
                'heading' => __('Heading Style'),
                'param_name' => 'heading_style_price',
                'value' => $arr_headings,
                'std' => 'h5',
                'description' => esc_html__('for price'),
            ),




        )
    ));

    $arr_target=array(
        array(
            'label'=>esc_html__("Self"),
            'value'=>'',
        ),
        array(
            'label'=>esc_html__("Blank"),
            'value'=>'_blank',
        ),
    );

    vc_map(array(
        "name" => $label.esc_html__("Audio Player"),
        "base" => "antfarm_audio_player",
        'allowed_container_element' => 'antfarm_audio_playlist',
        'content_element' => true,
        "class" => "",
        "icon" => $this->base_url . "assets/icons/audio_file.png", // -- Simply pass url to your icon here
        "category" => esc_html__("QuCreative Elements"),

        "params" => array(




            array(
                'type' => 'antfarm_add_media_att',
                'value' => '',
                "class" => "",
                'heading' => esc_html__("Media"),
                'param_name' => 'media',
                'library_type' => 'audio',
                "description" => __('Input the soundcloud link or select a self hosted audio')
            ),



            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Song Title"),
                "param_name" => "title",
                "value" => "",
                "description" => __('the text to display')
            ),



            // --  params group
            array(
                'type' => 'param_group',
                'value' => '',
                "class" => "",
                'param_name' => 'links',
                'heading' => esc_html__("Buttons"),
                // -- Note params is mapped inside param-group:
                'params' => array(

                    array(
                        'type' => 'textfield',
                        'value' => '',
                        'heading' => __('Link'),
                        'param_name' => 'link',
                    ),

                    array(
                        'type' => 'textfield',
                        'value' => '',
                        'heading' => __('Label'),
                        'param_name' => 'label',
                    ),

                    array(
                        'type' => 'dropdown',
                        'heading' => __('Target'),
                        'param_name' => 'target',
                        'value' => $arr_target,
                        'description' => __('select the target')
                    ),
                )
            ),




        )
    ));

    vc_map(array(
        "name" => $label.esc_html__("Audio Playlist"),
        "base" => "antfarm_audio_playlist",
        "as_parent" => array('only' => 'antfarm_audio_player'),
        "icon" => $this->base_url . "assets/icons/audio_playlist.png", // -- Simply pass url to your icon here


        'is_container' => true,
        'content_element' => true,
        "show_settings_on_create" => false,
        "class" => "",
        "category" => esc_html__("QuCreative Elements"),

        "params" => array(







        ),
        "js_view" => 'VcColumnView',
    ));

    $args = generate_settings_for_antfarm_section();
    vc_map($args);


    $tabs_id = 'tabs-'.rand(1,9999999);

    vc_map(array(

        'name' => $label.esc_html__( ' Tabs'. ' / '. esc_html__("Accordions"), 'qu' ),
        'base' => 'antfarm_tta_tabs',

        "icon" => $this->base_url . "assets/icons/tabs.png", // -- Simply pass url to your icon here
        'is_container' => true,
        'show_settings_on_create' => false,
        'as_parent' => array(
            'only' => 'vc_tta_section,antfarm_audio_playlist',

        ),
        'category' => esc_html__( 'Qu', 'antfarm' ),
        'description' => esc_html__( 'Tabbed content', 'antfarm' ),
        'params' => array(
            array(
                'type' => 'textfield',
                'param_name' => 'antfarm_id',
                'heading' => esc_html__( 'The ID', 'antfarm' ),
                'value' => $tabs_id,
                'description' => esc_html__( 'enter a unique id for the tabs', 'antfarm' ),
            ),
            array(
                'type' => 'dropdown',
                'param_name' => 'is_always_accordion',
                'value' => array(
                    esc_html__( 'No') => 'off',
                    esc_html__( 'Yes') => 'on',
                ),
                'heading' => esc_html__( 'Is Accordion?', 'antfarm' ),
                'description' => esc_html__( 'Will make this an accordion', 'antfarm' ),
                'std' => 'off',
            ),
            array(
                'type' => 'dropdown',
                'param_name' => 'skin',
                'value' => array(
                    esc_html__( 'Default Skin') => 'skin-qucreative',
                    esc_html__( 'Menu Skin') => 'skin-menu',
                ),
                'heading' => esc_html__( 'Skin', 'antfarm' ),
                'description' => esc_html__( 'the styling of the tabs', 'antfarm' ),
                'std' => 'off',
            ),

            array(
                'type' => 'textfield',
                'param_name' => 'inner_padding',
                'heading' => esc_html__( 'Content Padding', 'antfarm' ),
                'value' => 20,
                'description' => esc_html__( 'the content padding ( in px )', 'antfarm' ),
            ),

            array(
                'type' => 'textfield',
                'param_name' => 'active_section',
                'heading' => esc_html__( 'Active section', 'antfarm' ),
                'value' => 0,
                'description' => esc_html__( 'Enter active section number (Note: to have all sections closed on initial load enter non-existing number).', 'antfarm' ),
            ),
            array(
                'type' => 'textfield',
                'heading' => esc_html__( 'Extra class name', 'antfarm' ),
                'param_name' => 'el_class',
                'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'antfarm' ),
            ),
            array(
                'type' => 'css_editor',
                'heading' => esc_html__( 'CSS box', 'antfarm' ),
                'param_name' => 'css',
                'group' => esc_html__( 'Design Options', 'antfarm' ),
            ),
        ),



        'js_view' => 'VcBackendTtaTabsView',
        'custom_markup' => '
<div class="vc_tta-container" data-vc-action="collapse">
	<div class="vc_general vc_tta vc_tta-tabs vc_tta-color-backend-tabs-white vc_tta-style-flat vc_tta-shape-rounded vc_tta-spacing-1 vc_tta-tabs-position-top vc_tta-controls-align-left">
		<div class="vc_tta-tabs-container">'
            . '<ul class="vc_tta-tabs-list">'
            . '<li class="vc_tta-tab" data-vc-tab data-vc-target-model-id="{{ model_id }}" data-element_type="vc_tta_section"><a href="javascript:;" data-vc-tabs data-vc-container=".vc_tta" data-vc-target="[data-model-id=\'{{ model_id }}\']" data-vc-target-model-id="{{ model_id }}"><span class="vc_tta-title-text">{{ section_title }}</span></a></li>'
            . '</ul>
		</div>
		<div class="vc_tta-panels vc_clearfix {{container-class}}">
		  {{ content }}
		</div>
	</div>
</div>',
        'default_content' => '
[vc_tta_section title="' . sprintf( '%s %d', esc_html__( 'Tab', 'antfarm' ), 1 ) . '"][/vc_tta_section]
[vc_tta_section title="' . sprintf( '%s %d', esc_html__( 'Tab', 'antfarm' ), 2 ) . '"][/vc_tta_section]

	',
        'admin_enqueue_js' => array(

        ),
    ));




    $arr_styles = array(
        array(
            'label'=>esc_html__("Style 1"),
            'val'=>'heading-style-1',
        ),
        array(
            'label'=>esc_html__("Style 2"),
            'val'=>'heading-style-2',
        ),
        array(
            'label'=>esc_html__("Style 3"),
            'val'=>'heading-style-3',
        ),
        array(
            'label'=>esc_html__("Style 4"),
            'val'=>'heading-style-4',
        ),
        array(
            'label'=>esc_html__("Style 5"),
            'val'=>'heading-style-5',
        ),
    );
    $arr_styles = array(
        array(
            'label'=>esc_html__("One Line"),
            'val'=>'one-line',
        ),
        array(
            'label'=>esc_html__("Two Lines"),
            'val'=>'two-lines',
        ),
    );
    $arr_aligment = array(
        array(
            'label'=>esc_html__("Header Left"),
            'val'=>'',
        ),
        array(
            'label'=>esc_html__("Header Center"),
            'val'=>'heading-is-center',
        ),
        array(
            'label'=>esc_html__("Header Right"),
            'val'=>'heading-is-right',
        ),
    );
    vc_map(array(
        "name" => $label.esc_html__("Section Title"),
        "base" => "antfarm_section_title",
        "class" => "",
        "icon" => $this->base_url . "assets/icons/section_title.png", // -- Simply pass url to your icon here

        "category" => esc_html__("QuCreative Elements"),
        'is_container' => false,
        'content_element' => true,
        "params" => array(



            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Style'),
                'param_name' => 'style',
                'value' => $arr_styles,
                'description' => esc_html__('select the style of the heading')
            ),


            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Aligment'),
                'param_name' => 'aligment',
                'value' => $arr_aligment,
                'description' => esc_html__('select the aligment of the heading')
            ),


            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Section Number"),
                "param_name" => "section_number",
                "value" => "",
                "description" => esc_html__('display a section number alongside the header')
            ),


            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("First Line"),
                "param_name" => "line1",
                "value" => "",
                "description" => esc_html__('the text to display')
            ),


            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Second Line"),
                "param_name" => "line2",
                "value" => "",
                "description" => esc_html__('the text to display'),
                "dependency" => array(
                    "element" => "style",
                    "value" => array(
                        "two-lines",
                    ),
                ),
            ),

        )
    ));



    $arr_aligment = array(
        array(
            'label'=>esc_html__("Left"),
            'val'=>'left',
        ),
        array(
            'label'=>esc_html__("Right"),
            'val'=>'right',
        ),
    );
    vc_map(array(
        "name" => $label.esc_html__("Image Box"),
        "base" => "antfarm_image_box",
        "holder" => "",
        "class" => "",
        "icon" => $this->base_url . "assets/icons/image_for_sideways.png", // -- Simply pass url to your icon here

        "category" => esc_html__("QuCreative Elements"),
        'is_container' => false,
        'content_element' => true,
        "params" => array(


            array(
                "type" => "attach_image",
                "holder" => "div",
                "class" => "fullwidth",
                "heading" => esc_html__("Image"),
                "param_name" => "media",
                "value" => "",
                "description" => esc_html__('This is the image')
            ),


            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Aligment'),
                'param_name' => 'aligment',
                'value' => $arr_aligment,
                'description' => esc_html__('select the aligment of the heading')
            ),




            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Text Aligment'),
                'param_name' => 'text_aligment',
                'value' => array(array(
                    'label'=>esc_html__("Default"),
                    'val'=>'',
                ),
                array(
                    'label'=>esc_html__("Align Left"),
                    'val'=>'text-align-left',
                ),
                array(
                    'label'=>esc_html__("Align Right"),
                    'val'=>'text-align-right',
                ),
                array(
                    'label'=>esc_html__("Align Center"),
                    'val'=>'text-align-center',
                )),
                'description' => esc_html__('select the aligment of the text')
            ),



            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Heading"),
                "param_name" => "heading",
                "value" => "",
                "description" => esc_html__('the heading')
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Heading Style'),
                'param_name' => 'heading_style',
                'value' => $arr_headings,
                'description' => esc_html__('select the heading style'),
                'std' => 'h6',

            ),

            array(
                "type" => "textarea_html",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Content"),
                "param_name" => "content",
                "value" => "",
                "description" => esc_html__('the text to display')
            ),


        )
    ));




    $arr_styles = array(
        array(
            'label'=>esc_html__("Style 1"),
            'val'=>'team-member-element',
        ),
        array(
            'label'=>esc_html__("Style 2"),
            'val'=>'team-member-element-2',
        ),
    );
    $arr_square = array(
        array(
            'label'=>esc_html__("No"),
            'val'=>'off',
        ),
        array(
            'label'=>esc_html__("Yes, please"),
            'val'=>'on',
        ),
    );

    vc_map(
        array(
            "name" => $label.esc_html__("Team Member"),
            'base' => 'antfarm_team_member',
            "category" => esc_html__("QuCreative Elements"),
            "icon" => $this->base_url . "assets/icons/team_members.png", // -- Simply pass url to your icon here
            "js_view" => 'ViewTestElement',
            'params' => array(
                array(

                    'type' => 'antfarm_icon_selector',
                    'heading' => esc_html__('Style'),
                    'param_name' => 'style',
                    'value' => array(
                            array(
                                    'label'=>sprintf(esc_html__("Style %s",'antfarm'),'1'),
                                    'value'=>'team-member-element',
                                    "icon" => $this->base_url . "assets/icons/team_member_style_1.png",
                            ),
                            array(
                                    'label'=>sprintf(esc_html__("Style %s",'antfarm'),'2'),
                                    'value'=>'team-member-element-2',
                                    "icon" => $this->base_url . "assets/icons/team_member_style_2.png",
                            ),
                    ),
                    'description' => esc_html__('select the style')
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Shape'),
                    'param_name' => 'shape',
                    'value' => array(
                        array(
                            'label'=>esc_html__("Default"),
                            'val'=>'',
                        ),
                        array(
                            'label'=>esc_html__("Circle"),
                            'val'=>'circle',
                        ),
                    ),
                    'description' => esc_html__('select the shape of the avatar')
                ),

                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Heading Style'),
                    'param_name' => 'heading_style',
                    'value' => $arr_headings,
                    'description' => esc_html__('select the heading style'),
                    'std' => 'h5',
                "dependency" => array(
        "element" => "style",
        "value" => array("team-member-element"),
    ),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Heading Style'),
                    'param_name' => 'heading_style_2',
                    'std' => 'h6',
                    'value' => $arr_headings,
                    'description' => esc_html__('select the heading style'),
                "dependency" => array(
        "element" => "style",
        "value" => array("team-member-element-2"),
    ),
                ),
                array(
                    'type' => 'antfarm_add_media',
                    'value' => '',
                    "class" => "",
                    'heading' => esc_html__("Avatar"),
                    'param_name' => 'avatar',
                ),
                array(
                    'type' => 'textfield',
                    'value' => '',
                    "holder" => "div",
                    "class" => "",
                    'heading' => esc_html__("First Name"),
                    'param_name' => 'first_name',
                ),
                array(
                    'type' => 'textfield',
                    'value' => '',
                    "holder" => "div",
                    "class" => "",
                    'heading' => esc_html__("Last Name"),
                    'param_name' => 'last_name',
                ),
                array(
                    'type' => 'textfield',
                    'value' => '',
                    "holder" => "div",
                    "class" => "",
                    'heading' => esc_html__("Position"),
                    'param_name' => 'position',
                ),

                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Aligment'),
                    'param_name' => 'aligment',
                    'value' => $arr_aligment,
                    'description' => esc_html__('select the aligment of the heading')
                ),

                array(
                    'type' => 'param_group',
                    'value' => '',
                    "class" => "",
                    'param_name' => 'titles',
                    'heading' => esc_html__("Links"),
                    // -- Note params is mapped inside param-group:
                    'params' => array(


                        array(
                            "type" => "dzsqcr_faiconselector",
                            "holder" => "div",
                            "class" => "",
                            "heading" => esc_html__("Icon"),
                            "param_name" => "faicon",
                            "icon_type" => "fa",
                            "value" => "",
                        ),
                        array(
                            'type' => 'textfield',
                            'value' => '',
                            'heading' => 'Link',
                            'param_name' => 'title',
                        )
                    )
                ),
            )
        )
    );




    $arr_enable = array(
        array(
            'label'=>esc_html__("No"),
            'val'=>'off',
        ),
        array(
            'label'=>esc_html__("Yes"),
            'val'=>'on',
        ),
    );



    vc_map(
        array(
            "name" => $label.esc_html__("Pricing Table"),
            'base' => 'antfarm_pricing_table',
            "category" => esc_html__("QuCreative Elements"),
            "icon" => $this->base_url . "assets/icons/pricing_tables.png", // -- Simply pass url to your icon here

            'params' => array(
                array(
                    'type' => 'textfield',
                    'value' => '',
                    "holder" => "div",
                    "class" => "",
                    'heading' => esc_html__("Title"),
                    'param_name' => 'title',
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => esc_html__('Is Featured ? '),
                    'param_name' => 'is_featured',
                    'value' => $arr_enable,
                    'description' => esc_html__('select if this pricing table will be emphasized ')
                ),
                array(
                    'type' => 'textfield',
                    'value' => '',
                    "holder" => "",
                    "class" => "",
                    'heading' => esc_html__("Price"),
                    'param_name' => 'price',
                ),
                array(
                    'type' => 'textfield',
                    'value' => '',
                    "holder" => "",
                    "class" => "",
                    'heading' => esc_html__("Quota"),
                    'param_name' => 'quota',
                ),
                // --  params group
                array(
                    'type' => 'param_group',
                    'value' => '',
                    "class" => "",
                    'param_name' => 'items',
                    'heading' => esc_html__("Items"),
                    // -- Note params is mapped inside param-group:
                    'params' => array(


                        array(
                            'type' => 'textfield',
                            'value' => '',
                            'heading' => 'Item',
                            'param_name' => 'item',
                        )
                    )
                ),
                array(
                    'type' => 'textfield',
                    'value' => '',
                    "holder" => "",
                    "class" => "",
                    'heading' => esc_html__("Sign Up Text"),
                    'param_name' => 'sign_up_text',
                ),
                array(
                    'type' => 'textfield',
                    'value' => '',
                    "holder" => "",
                    "class" => "",
                    'heading' => esc_html__("Sign Up Link"),
                    'param_name' => 'sign_up_link',
                ),
            )
        )
    );



    vc_map(
        array(
            "name" => $label.esc_html__("List"),
            'base' => 'antfarm_list',
            "category" => esc_html__("QuCreative Elements"),
            "icon" => $this->base_url . "assets/icons/list.png", // -- Simply pass url to your icon here
            "js_view" => 'ViewTestElement',
            'params' => array(
                // --  params group
                array(
                    'type' => 'param_group',
                    'value' => '',
                    "class" => "",
                    'param_name' => 'titles',
                    'heading' => esc_html__("Links"),
                    // -- Note params is mapped inside param-group:
                    'params' => array(


                        array(
                            "type" => "dzsqcr_faiconselector",
                            "holder" => "div",
                            "class" => "",
                            "heading" => esc_html__("Icon"),
                            "param_name" => "faicon",
                            "icon_type" => "fa",
                            "value" => "",
                        ),
                        array(
                            'type' => 'textfield',
                            'value' => '',
                            'heading' => esc_html__("Text"),
                            'param_name' => 'text',
                        )
                    )
                ),
            )
        )
    );



    vc_map(
        array(
            "name" => $label.esc_html__("Carousel"),
            'base' => 'antfarm_carousel',
            "category" => esc_html__("QuCreative Elements"),
            "icon" => $this->base_url . "assets/icons/image_carousel.png", // -- Simply pass url to your icon here

            'params' => array(
                // --  params group
                array(
                    'type' => 'param_group',
                    'value' => '',
                    "class" => "",
                    'param_name' => 'items',
                    'heading' => esc_html__("Items"),
                    // -- Note params is mapped inside param-group:
                    'params' => array(


                        array(
                            'type' => 'attach_image',
                            'value' => '',
                            'heading' => esc_html__("Image"),
                            'param_name' => 'image',
                        ),
                        array(
                            'type' => 'textfield',
                            'value' => '',
                            'heading' => esc_html__("Link"),
                            'param_name' => 'link',
                        ),
                        array(
                            'type' => 'textfield',
                            'value' => '',
                            'heading' => esc_html__("Title"),
                            'param_name' => 'title',
                        ),
                    )
                ),
            )
        )
    );



    vc_map(
        array(
            "name" => $label.esc_html__("Image Slider"),
            'base' => 'antfarm_image_slider',
            "category" => esc_html__("QuCreative Elements"),
            "icon" => $this->base_url . "assets/icons/image_slider.png", // -- Simply pass url to your icon here

            'params' => array(
                // --  params group

                array(
                    'type' => 'attach_images',
                    'value' => '',
                    "holder" => "",
                    "class" => "",
                    'heading' => esc_html__("Images"),
                    'param_name' => 'images',
                ),
            )
        )
    );






    $arr_count = array(
        array(
            'label'=>esc_html__("One Column"),
            'val'=>'1',
        ),
        array(
            'label'=>esc_html__("Two Columns"),
            'val'=>'2',
        ),
    );

    vc_map(array(
        "name" => $label.esc_html__("Services Lightbox"),
        "base" => "antfarm_service_lightbox",
        "class" => "",
        "icon" => $this->base_url . "assets/icons/services_lightbox.png", // -- Simply pass url to your icon here
        "content_element" => true,
                "js_view" => 'ViewTestElement',

        "category" => esc_html__("QuCreative Elements"),
        "params" => array(





            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Title"),
                "param_name" => "title",
                "value" => "",
                "description" => ''
            ),

            array(
                "type" => "textarea",
                "class" => "",
                "heading" => esc_html__("Content"),
                "param_name" => "content_main",
                "value" => "",
                "description" => ''
            ),

            array(
                "type" => "dzsqcr_faiconselector",
                "class" => "",
                "heading" => esc_html__("Icon"),
                "param_name" => "icon",
                "icon_type" => "et",
                "value" => "",
            ),



            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Number of Columns'),
                'param_name' => 'columns',
                'value' => $arr_count,
                'description' => esc_html__('the number of columns'),
                "group" => esc_html__("Lightbox Options"),
            ),


            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Main Title"),
                "param_name" => "title_lightbox",
                "value" => "",
                "description" => '',
                "group" => esc_html__("Lightbox Options"),
            ),
            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Title"),
                "param_name" => "title_1",
                "value" => "",
                "description" => __('title for the first column'),
                "group" => esc_html__("Lightbox Options"),
            ),

            array(
                "type" => "textarea",
                "class" => "",
                "heading" => esc_html__("Content"),
                "param_name" => "content_1",
                "value" => "",
                "description" => __('content for the first column'),
                "group" => esc_html__("Lightbox Options"),
            ),


            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Heading Style'),
                'param_name' => 'heading_style',
                'value' => $arr_headings,
                'std' => 'h6',
                'description' => esc_html__('select the heading style'),
            ),


            array(
                "type" => "textfield",
                "class" => "",
                "heading" => esc_html__("Title"),
                "param_name" => "title_2",
                "value" => "",
                "description" => '',
                "group" => esc_html__("Lightbox Options"),
                "dependency" => array(
                    "element" => "columns",
                    "value" => array("2"),
                ),
            ),

            array(
                "type" => "textarea",
                "class" => "",
                "heading" => esc_html__("Content"),
                "param_name" => "content_2",
                "value" => "",
                "description" => '',
                "group" => esc_html__("Lightbox Options"),
                "dependency" => array(
                    "element" => "columns",
                    "value" => array("2"),
                ),
            ),


        )
    ));


    vc_map(array(
        "name" => $label.esc_html__("Call to Action"),
        "base" => "antfarm_call_to_action",
        "class" => "",
        "icon" => $this->base_url . "assets/icons/call_to_action.png", // -- Simply pass url to your icon here

        "admin_enqueue_js" => $this->base_url.'vc/backbone.js',
        "front_enqueue_js" => $this->base_url.'vc/frontend_backbone.js',
        "category" => esc_html__("QuCreative Elements"),
        "js_view" => 'ViewInitSelector',
        "params" => array(





            array(
                "type" => "textfield",
                "holder" => "div",
                "class" => "",
                "heading" => esc_html__("Title"),
                "param_name" => "title",
                "value" => "",
                "description" => ''
            ),

            array(
                "type" => "textarea_html",
                "class" => "",
                "heading" => esc_html__("Content"),
                "param_name" => "content",
                "value" => "",
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
                "value" => "",
                "description" => '',
            ),

            array(
                "type" => "dropdown",
                "class" => "",
                "heading" => esc_html__("Link Target"),
                "param_name" => "link_target",
                "value" =>  array(
                    array(
                        'label'=>esc_html__("Same Window"),
                        'value'=>'',
                    ),
                    array(
                        'label'=>esc_html__("New Window"),
                        'value'=>'_blank',
                    ),
                ),
                "std" => '',
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
                "description" => __('Leave no value ( default ) or enter a value ( in px ) to constrict the box size'),
            ),


            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Heading Style'),
                'param_name' => 'heading',
                'value' => $arr_headings,
                'std' => 'h-group-2',
                'description' => esc_html__('select another heading type'),
            ),




        )
    ));
}



function vc_dzsqcr_faiconselector($settings, $value) {

    $dependency = '';

    if(function_exists('vc_generate_dependencies_attributes')){

        $dependency = vc_generate_dependencies_attributes($settings);
    }

    /*
     *
     *
     */
    return '<div class="iconselector" data-type="'.$settings['icon_type'].'">
                <p><span class="iconselector-preview"></span><input type="text" class="style-iconselector iconselector-waiter wpb_vc_param_value wpb-textinput  '.$settings['param_name'].' '.$settings['type'].'_field " name="'.$settings['param_name'].'" value="'.$value.'" ' . $dependency.'/><span class="iconselector-btn"><i class="fa fa-caret-down"></i></span></p> <div class="iconselector-clip"> <input type="text" class="icon-search-field textfield" placeholder="'.esc_html__("Search Icons").'"/><br>
                </div>
            </div>';

}




if(function_exists('vc_antfarm_multiple_checkbox')==false) {
    function vc_antfarm_multiple_checkbox($settings, $value) {

        $dependency = '';

        if(function_exists('vc_generate_dependencies_attributes')){

            $dependency = vc_generate_dependencies_attributes($settings);
        }



        $fout = '<div class="vc_antfarm_multiple_checkbox-con" ' . $dependency . '>
                <input type="text" class="vc_antfarm_multiple_checkbox-input wpb_vc_param_value wpb-textinput  ' . $settings['param_name'] . ' ' . $settings['type'] . '_field " name="' . $settings['param_name'] . '" value="' . $value . '"  style="display:none"/>
';

$multi_values = array();

        $multi_values = explode(',',$value);

        $fout.='<ul>
            ';

        foreach ($settings['value'] as $arr){
            $fout.='<li>
                        <label>
                            <input class="vc_antfarm_multiple_checkbox-checkbox" type="checkbox" value="'.$arr['value'].'" '.checked( in_array( $arr['value'], $multi_values ) ).' /> '.$arr['label'].'
                        </label>
                    </li>';
        }


        $fout.='</ul>';
        $fout.='</div>';
        return $fout;

    }
}



if(function_exists('vc_antfarm_button_customizer')==false) {
    function vc_antfarm_button_customizer($settings, $value) {

        $dependency = '';

        if(function_exists('vc_generate_dependencies_attributes')){

            $dependency = vc_generate_dependencies_attributes($settings);
        }


        $fout = '';


        $fout = '<div class="vc_antfarm_button-customizer-con" ' . $dependency . '>
                <input type="text" class="vc_antfarm_multiple_checkbox-input the-button-style-json wpb_vc_param_value wpb-textinput  ' . $settings['param_name'] . ' ' . $settings['type'] . '_field " name="' . $settings['param_name'] . '" value="' . htmlentities($value) . '"  style="display:hidden:"/>
';



        ob_start();



        ?>


<div class="wrap-for-antfarm_shortcode_generator_button">
<div class="setting  mode-any">
    <h3><?php echo esc_html__("Style"); ?></h3>
    <?php


    $lab = "style";


    $arr_opts = array(
        'style-default',
        'style-black',
        'color-highlight',
        'style-highlight-dark',
        'style-hallowred',
        'style-hallowblack',
    );


    echo DZSHelpers::generate_select($lab, array(
        'options'=>$arr_opts,
        'class'=>'dzs-style-me opener-listbuttons do-not-trigger-change-on-reinit do-not-trigger-change-on-init',
        'seekval'=>'',
    ));

    ?>
    <ul class="dzs-style-me-feeder">
        <li ><span href="#" class="antfarm-btn style-default"><?php echo esc_html__("BUTTON"); ?></span></li>
        <li ><span href="#" class="antfarm-btn style-black"><?php echo esc_html__("BUTTON"); ?></span></li>
        <li ><span href="#" class="antfarm-btn color-highlight"><?php echo esc_html__("BUTTON"); ?></span></li>
        <li ><span href="#" class="antfarm-btn style-highlight-dark"><?php echo esc_html__("BUTTON"); ?></span></li>
        <li ><span href="#" class="antfarm-btn style-hallowred"><?php echo esc_html__("BUTTON"); ?></span></li>
        <li ><span href="#" class="antfarm-btn style-hallowblack"><?php echo esc_html__("BUTTON"); ?></span></li>
    </ul>
</div>
<div class="setting  mode-any setting-padding">
    <h3><?php echo esc_html__("Padding"); ?></h3>
    <?php


    $lab = "padding";


    $arr_opts = array(
        '',
        'padding-medium',
        'padding-small',
    );


    echo DZSHelpers::generate_select($lab, array(
        'options'=>$arr_opts,
        'class'=>'dzs-style-me opener-listbuttons  do-not-trigger-change-on-reinit do-not-trigger-change-on-init',
        'seekval'=>'',
    ));

    ?>
    <ul class="dzs-style-me-feeder">
        <li ><span href="#" class="antfarm-btn "><?php echo esc_html__("BUTTON"); ?></span></li>
        <li ><span href="#" class="antfarm-btn padding-medium"><?php echo esc_html__("BUTTON"); ?></span></li>
        <li ><span href="#" class="antfarm-btn padding-small"><?php echo esc_html__("BUTTON"); ?></span></li>
    </ul>
</div>
<div class="setting  mode-any setting-rounded">
    <h3><?php echo esc_html__("Rounded"); ?></h3>
    <?php


    $lab = "rounded";


    $arr_opts = array(
        '',
        'rounded',
    );


    echo DZSHelpers::generate_select($lab, array(
        'options'=>$arr_opts,
        'class'=>'dzs-style-me opener-listbuttons  do-not-trigger-change-on-reinit do-not-trigger-change-on-init',
        'seekval'=>'',
    ));

    ?>
    <ul class="dzs-style-me-feeder">
        <li ><span href="#" class="antfarm-btn "><?php echo esc_html__("BUTTON"); ?></span></li>
        <li ><span href="#" class="antfarm-btn rounded"><?php echo esc_html__("BUTTON"); ?></span></li>
    </ul>
</div>
</div>
<?php



        $fout.=ob_get_clean();




        $fout.='</div>';
        return $fout;

    }
}





if(function_exists('antfarm_generate_big_option')==false) {
    function antfarm_generate_big_option($pargs) {

        $margs = array(

            'perc'=>'20',
            'label'=> esc_html__("Grid"),
            'extra_class'=>'',
            'extra_attr'=>'',
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
            )
        );

        $fout = '';


        $margs = array_merge($margs, $pargs);











        $fout.='<div class="bigoption '.$margs['extra_class'].'" style="display: inline-block; vertical-align: top; margin-right: 5px; margin-bottom: 5px;" '.$margs['extra_attr'].'>
                            <div class="option-con" style="display: inline-block; vertical-align: top; padding: 14px 10px 10px 10px; background-color: #444;  margin-right: 5px;  margin-bottom: 5px;  ">
                            <div class="height200important" style="position: relative; top:0; left:0;width: 150px; height: 200px; overflow:hidden; display: inline-block; vertical-align: top; font-size:0;"><div class="grid-sizer money-maker" style="width: '.$margs['perc'].'%; height: 1px;"></div>';
                            foreach ($margs['items'] as $it){




                                $fout.='<div class="dummy-item" style="width: '.(floatval($it['w']) * floatval($margs['perc'])).'%; ';


                                if($margs['extra_class']){

                                    $fout.=' display: inline-block;';
                                }else{

                                    $fout.=' display: block; float:left;';
                                }









                                $fout.='">';



                                $pt = (intval($it['h'])/intval($it['w']) * intval(100));

                                $spacings = intval($it['w'])-1;

                                $str_spacings = '';

                                if($spacings){
                                    $str_spacings = ' - '.($spacings*2).'px';
                                }

                                $std_h = intval(147 / (100/intval($margs['perc'])));

                                $h = intval($it['h']) * $std_h;


                                $h = 100/ ( floatval($it['w'])/floatval($it['h']));


                                $extra_spacing = intval($it['h']) - 1;




                                $fout.='<div class="dummy-item-inner" style=" display: block; padding-top:'.$h.'%; position:relative;">';


                                $fout.='<div class="" style="  background-color: #ddd;  display: block; padding-right: 1px;     
                                width: calc(100% - 2px);
                                height: calc(100% - 2px);
    position: absolute;
    top: 0;
    left: 0;">';
                                $fout.='</div>';





                                $fout.='</div>';
                                $fout.='</div>';
                            }
                            $fout.='</div><div class="option-label">'.$margs['label'].'</div>
</div>
                            </div>';



        return $fout;

    }
}

if(function_exists('vc_dzstln_toggle_end')==false){
    function vc_dzstln_toggle_end($settings, $value) {
        $dependency = vc_generate_dependencies_attributes($settings);
        return '</div></div>';

    }
}


function generate_settings_for_antfarm_section(){
    if ( ! defined( 'ABSPATH' ) ) {
        die( '-1' );
    }

    $parent_tag = vc_post_param( 'parent_tag', '' );
    $include_icon_params = ( 'vc_tta_pageable' !== $parent_tag );

    if ( $include_icon_params ) {
        require_once vc_path_dir( 'CONFIG_DIR', 'content/vc-icon-element.php' );
        $icon_params = array(
            array(
                'type' => 'checkbox',
                'param_name' => 'add_icon',
                'heading' => esc_html__( 'Add icon?', 'antfarm' ),
                'description' => esc_html__( 'Add icon next to section title.', 'antfarm' ),
            ),
            array(
                'type' => 'dropdown',
                'param_name' => 'i_position',
                'value' => array(
                    esc_html__( 'Before title', 'antfarm' ) => 'left',
                    esc_html__( 'After title', 'antfarm' ) => 'right',
                ),
                'dependency' => array(
                    'element' => 'add_icon',
                    'value' => 'true',
                ),
                'heading' => esc_html__( 'Icon position', 'antfarm' ),
                'description' => esc_html__( 'Select icon position.', 'antfarm' ),
            ),
        );
        $icon_params = array_merge( $icon_params, (array) vc_map_integrate_shortcode( vc_icon_element_params(), 'i_', '', array(
            // -- we need only type, icon_fontawesome, icon_.., NOT color and etc
            'include_only_regex' => '/^(type|icon_\w*)/',
        ), array(
            'element' => 'add_icon',
            'value' => 'true',
        ) ) );
    } else {
        $icon_params = array();
    }

    $params = array_merge( array(
        array(
            'type' => 'textfield',
            'param_name' => 'title',
            'heading' => esc_html__( 'Title', 'antfarm' ),
            'description' => esc_html__( 'Enter section title (Note: you can leave it empty).', 'antfarm' ),
        ),
        array(
            'type' => 'el_id',
            'param_name' => 'tab_id',
            'settings' => array(
                'auto_generate' => true,
            ),
            'heading' => esc_html__( 'Section ID', 'antfarm' ),
            'description' => esc_html__( 'Enter section ID (Note: make sure it is unique and valid according to <a href="%s" target="_blank">w3c specification</a>).', 'antfarm' ),
        ),
    ), $icon_params, array(
        array(
            'type' => 'textfield',
            'heading' => esc_html__( 'Extra class name', 'antfarm' ),
            'param_name' => 'el_class',
            'description' => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'antfarm' ),
        ),
    ) );

    return array(
        'name' => esc_html__( 'Tab Section', 'antfarm' ),
        'base' => 'antfarm_section',
        'icon' => 'icon-wpb-ui-tta-section',
        'allowed_container_element' => 'vc_row',
        'is_container' => true,
        'show_settings_on_create' => false,
        'as_child' => array(
            'only' => 'vc_tta_tour,vc_tta_tabs,antfarm_tta_tabs,vc_tta_accordion',
        ),
        'category' => esc_html__( 'QuCreative Elements', 'antfarm' ),
        'description' => esc_html__( 'Section for Tabs, Tours, Accordions.', 'antfarm' ),
        'params' => $params,
        'js_view' => 'VcBackendTtaSectionView',
        'custom_markup' => '
		<div class="vc_tta-panel-heading">
		    <h4 class="vc_tta-panel-title vc_tta-controls-icon-position-left"><a href="javascript:;" data-vc-target="[data-model-id=\'{{ model_id }}\']" data-vc-accordion data-vc-container=".vc_tta-container"><span class="vc_tta-title-text">{{ section_title }}</span><i class="vc_tta-controls-icon vc_tta-controls-icon-plus"></i></a></h4>
		</div>
		<div class="vc_tta-panel-body">
			{{ editor_controls }}
			<div class="{{ container-class }}">
			{{ content }}
			</div>
		</div>',
        'default_content' => '',
    );

}




// -- Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
if ( class_exists( 'WPBakeryShortCode_VC_Tta_Section' ) ) {
    class WPBakeryShortCode_antfarm_Section extends WPBakeryShortCode_VC_Tta_Section {

        protected  function content($atts,$content=null){
            if ( ! defined( 'ABSPATH' ) ) {
                die( '-1' );
            }

            /**
             * Shortcode attributes
             * @var $atts
             * @var $content - shortcode content
             * @var $this WPBakeryShortCode_VC_Tta_Section
             */
            $this->resetVariables( $atts, $content );
            WPBakeryShortCode_VC_Tta_Section::$self_count ++;
            WPBakeryShortCode_VC_Tta_Section::$section_info[] = $atts;
            $isPageEditable = vc_is_page_editable();

            $output = '';

            $output .= '<div class="' . esc_attr( $this->getElementClasses() ) . ' hmm-from-dzs yes-yes"';
            $output .= ' id="' . esc_attr( $this->getTemplateVariable( 'tab_id' ) ) . '"';
            $output .= ' data-vc-content=".vc_tta-panel-body">';
            $output .= '<div class="vc_tta-panel-heading">';
            $output .= $this->getTemplateVariable( 'heading' );
            $output .= '</div>';
            $output .= '<div class="vc_tta-panel-body">';
            if ( $isPageEditable ) {
                $output .= '<div data-js-panel-body>'; // fix for fe - shortcodes container, not required in b.e.
            }
            $output .= $this->getTemplateVariable( 'content' );
            if ( $isPageEditable ) {
                $output .= '</div>';
            }


            $output .= '</div>';
            $output .= '</div>';

            return $output;

        }
    }
}
if ( class_exists( 'WPBakeryShortCode_VC_Tta_Tabs' ) ) {
    class WPBakeryShortCode_antfarm_Tta_Tabs extends WPBakeryShortCode_VC_Tta_Tabs {
    }
}
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_antfarm_Audio_Playlist extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_antfarm_Audio_Player extends WPBakeryShortCode {
    }
}

