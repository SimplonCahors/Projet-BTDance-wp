<?php




function antfarm_shortcode_generator_divider(){
?>
    <div class="wrap wrap-for-antfarm_shortcode_generator_divider">


        <div class="sg-con">




        <div class="setting  mode-any ">
            <h3><?php echo esc_html__("Height"); ?></h3>
            <?php

            $lab = 'height';


            $val = '20';

            echo DZSHelpers::generate_input_text($lab, array(
                'class'=>'regular-text',
                'seekval'=>$val,
            ));

            ?>
        </div>



            <div class="setting  mode-any setting-rounded">
                <h3><?php echo esc_html__("Style"); ?></h3>
                <?php


                $lab = "style";


                $arr_opts = array(
                    array(
                            'label'=>esc_html__("Empty Space"),
                            'value'=>'empty-space',
                    ),
                    array(
                            'label'=>esc_html__("Style 1"),
                            'value'=>'style-1',
                    ),
                );


                echo DZSHelpers::generate_select($lab, array(
                    'options'=>$arr_opts,
                    'class'=>'dzs-style-me skin-beige',
                    'seekval'=>'',
                ));

                ?>

            </div>

            <div class="setting  mode-any setting-rounded">
                <h3><?php echo esc_html__("Color"); ?></h3>
                <?php


                $lab = "color";



                echo DZSHelpers::generate_input_text($lab, array('val' => '', 'class' => 'wp-color-picker-init '));
                ?>




            <br>
            <br>
            <button id="insert_tests" class="button-primary insert-shortcode"><?php echo esc_html__("Insert Divider"); ?></button>

            <div class="shortcode-output"></div>
            <div class="feedbacker"><i class="fa fa-circle-o-notch fa-spin"></i><?php echo  esc_html__("Loading..."); ?> </div>
        </div>
    </div>

    <?php

}