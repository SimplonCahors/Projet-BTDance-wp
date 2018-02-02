<?php




function antfarm_shortcode_generator_button(){

?>
    <div class="wrap wrap-for-antfarm_shortcode_generator_button">


        <div class="sg-con">
            <?php
            if($q){
                if(get_theme_mod('highlight_color') && get_theme_mod('highlight_color')!='#e74c3c'){


                   ?><style>
                        .antfarm-btn.style-hallowred{
                            box-shadow : 0 0 0 2px <?php echo get_theme_mod('highlight_color'); echo ' inset'; ?>;
                            color: <?php echo get_theme_mod('highlight_color'); ?>;
                        }

                        .antfarm-btn.color-highlight,.antfarm-btn.style-highlight-dark, .antfarm-btn.style-default:hover, .antfarm-btn.style-black:hover, .antfarm-btn.style-hallowred:hover, .antfarm-btn.style-hallowblack:hover {

                            background-color: <?php echo get_theme_mod('highlight_color'); ?>;
                        }
                    </style>
                    <?php
                }
            }
            ?>
            <input class="the-button-style-json" type="hidden"/>
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
                'class'=>'dzs-style-me opener-listbuttons',
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
                'class'=>'dzs-style-me opener-listbuttons',
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
                'class'=>'dzs-style-me opener-listbuttons',
                'seekval'=>'',
            ));

            ?>
            <ul class="dzs-style-me-feeder">
                <li ><span href="#" class="antfarm-btn "><?php echo esc_html__("BUTTON"); ?></span></li>
                <li ><span href="#" class="antfarm-btn rounded"><?php echo esc_html__("BUTTON"); ?></span></li>
            </ul>
        </div>
        <div class="setting  mode-any ">
            <h3><?php echo esc_html__("Link"); ?></h3>
            <?php


            $lab = 'link';
            echo DZSHelpers::generate_input_text($lab, array(
                'class'=>'regular-text',
                'seekval'=>'',
            ));

            ?>
        </div>
        <div class="setting  mode-any ">
            <h3><?php echo esc_html__("Link Target"); ?></h3>
            <?php


            $lab = "link_target";


            $arr_opts = array(
                array(
                    'label'=>esc_html__("Same Window"),
                    'value'=>'',
                ),
                array(
                    'label'=>esc_html__("New Window"),
                    'value'=>'_blank',
                ),
            );


            echo DZSHelpers::generate_select($lab, array(
                'options'=>$arr_opts,
                'class'=>'dzs-style-me ',
                'seekval'=>'',
            ));

            ?>
        </div>
        <div class="setting  mode-any ">
            <h3><?php echo esc_html__("Icon"); ?></h3>
            <?php


            $lab = 'the_icon';
            ?>



            <div class="iconselector" data-type="fa">
                <p><span class="iconselector-preview"></span><input type="text" name="<?php echo $lab; ?>" class="style-iconselector iconselector-waiter"/><span class="iconselector-btn"><i class="fa fa-caret-down"></i></span></p>

                <div class="iconselector-clip">
                    <input type="text" class="icon-search-field textfield" placeholder="<?php echo esc_html__("Search Icons"); ?>"/><br>
                </div>
                </div>

            <?php

            ?>
        </div>
        <div class="setting  mode-any ">
            <h3><?php echo esc_html__("Content"); ?></h3>
            <?php


            $content = '';
            $editor_id = 'content';

            wp_editor( $content, $editor_id,array(
                'wpautop'=>false,
                'media_buttons'=>false,
                'teeny'=>true,
                'tinymce'=>false,
                'textarea_rows'=>1,
            ) );
            ?>
        </div>

            <br>
            <br>
            <button id="insert_tests" class="button-primary insert-shortcode"><?php echo esc_html__("Insert Button"); ?></button>

            <div class="shortcode-output"></div>
            <div class="feedbacker"><i class="fa fa-circle-o-notch fa-spin"></i> <?php echo esc_html__("Loading"); ?>... </div>
        </div>
    </div>
    <?php

}