<?php


class Antfarm_Latest_Posts extends WP_Widget {

    /**
     * Sets up the widgets name etc
     */
    public function __construct() {
        $widget_ops = array(
            'classname' => 'Antfarm_Latest_Posts',
            'description' => esc_html__("Your site's latest posts",'antfarm'),
        );
        parent::__construct( 'Antfarm_Latest_Posts', 'Qu '.esc_html__("Latest Posts",'antfarm'), $widget_ops );
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget( $args, $instance ) {







        $margs = array(
            'title'=>esc_html__("Latest Posts",'antfarm'),
            'count'=>'5',
            'thumb_dimension'=>'',
        );




        if(is_array($instance)){
            $margs = array_merge($margs, $instance);
        }





        echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
        }

        echo '<ul class="antfarm-latest-posts sidebar-count-list sidebar-count-list-latest-posts">';

        $wpqargs['post_type']='post';
        $wpqargs['posts_per_page']=$instance['count'];
        $wpqargs['orderby']="date";
        $wpqargs['order']="DESC";



        $query = new WP_Query($wpqargs);
        foreach($query->posts as $it) {
            $the_src = wp_get_attachment_image_src(get_post_thumbnail_id($it->ID), 'full');
            $thumbnail_src = $the_src[0];

            $date = get_the_date("d M Y");

            echo '<li><a class="ajax-link do-not-inherit-color sidebar-latest-post" href="'.get_permalink($it->ID).'"><span class="cat-thumb" style="background-image: url('.$thumbnail_src.');';

            if($margs['thumb_dimension']){
                echo ' width:'.$margs['thumb_dimension'].'px;';
                echo ' height:'.$margs['thumb_dimension'].'px;';
            }

            echo '"></span><span class="post-meta"><span class="post-title font-group-12">'.$it->post_title.'</span><span class="post-date font-group-3">'.$date.'</span></span></a></li>';
        }


        echo '</ul>';




        echo $args['after_widget'];
    }

    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form( $instance ) {
       // -- outputs the options form on admin

        $margs = array(
            'title'=>esc_html__("Latest Posts",'antfarm'),
            'count'=>'5',
            'thumb_dimension'=>'',
        );




        if(is_array($instance)){
            $margs = array_merge($margs, $instance);
        }



        ?>
        <div class="setting">
        <h5 for="<?php echo $this->get_field_id('title'); ?>"><?php echo esc_html__("Title",'antfarm'); ?></h5>
        <input type="text" name="<?php echo $this->get_field_name('title') ?>" id="<?php echo $this->get_field_id('title') ?> " value="<?php echo $margs['title'] ?>" size="20"/>
        </div>

        <?php
        $lab = 'count';
        ?>
        <div class="setting">
        <h5><?php echo esc_html__("Count",'antfarm'); ?></h5>
            <input class="" type="text" name="<?php echo $this->get_field_name($lab) ?>" id="<?php echo $this->get_field_id($lab) ?> " value="<?php echo htmlspecialchars($margs[$lab]) ?>" size="20"/>
        </div>

        <?php
        $lab = 'thumb_dimension';
        ?>
        <div class="setting">
        <h5><?php echo esc_html__("Thumbnail Dimension",'antfarm'); ?></h5>
            <input class="" type="text" name="<?php echo $this->get_field_name($lab) ?>" id="<?php echo $this->get_field_id($lab) ?> " value="<?php echo htmlspecialchars($margs[$lab]) ?>" size="5"/>
        </div>
        <br>
        <?php
    }

    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     */
}
class Antfarm_Contact extends WP_Widget {

    /**
     * Sets up the widgets name etc
     */
    public function __construct() {
        $widget_ops = array(
            'classname' => 'Antfarm_Contact',
            'description' => esc_html__("Your site's latest posts",'antfarm'),
        );
        parent::__construct( 'Antfarm_Contact', 'Qu '.esc_html__("Contact Widget",'antfarm'), $widget_ops );
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget( $args, $instance ) {
       // -- outputs the content of the widget

        echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
        }




        $margs = array(

            'address'=>'',
            'telephone'=>'',
            'email'=>'',
        );


        if(is_array($instance)){
            $margs = array_merge($margs, $instance);
        }




        ?>
        <div class="contact-block font-group-6"><i class="fa fa-map-marker"></i><div class="the-text font-group-6"><?php echo wpautop($margs['address']); ?></div></div>
        <div class="contact-block font-group-6"><i class="fa fa-phone"></i><div class="the-text font-group-6"><?php echo wpautop($margs['telephone']); ?></div></div>
        <div class="contact-block font-group-6"><a class="color-highlight-on-hover custom-a weight-from-anchor text-size-from-font-group-6" href="<?php echo $margs['email']; ?>"><i class="fa fa-envelope"></i><div class="the-text text-size-from-font-group-6-target weight-from-anchor"><?php echo $margs['email']; ?></div></a></div>

        <?php




        echo $args['after_widget'];
    }

    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form( $instance ) {
       // -- outputs the options form on admin

        $margs = array(
            'title'=>esc_html__("Contact",'antfarm'),
            'address'=>'',
            'telephone'=>'',
            'email'=>'',
        );




        if(is_array($instance)){
            $margs = array_merge($margs, $instance);
        }



        ?>
        <div class="setting">
        <h5 for="<?php echo $this->get_field_id('title'); ?>"><?php echo esc_html__("Title",'antfarm'); ?></h5>
        <input type="text" name="<?php echo $this->get_field_name('title') ?>" id="<?php echo $this->get_field_id('title') ?> " value="<?php echo $margs['title'] ?>" size="20"/>
        </div>

        <?php
        $lab = 'address';
        ?>
        <div class="setting">
        <h5><?php echo esc_html__("Address",'antfarm'); ?></h5>
            <textarea class="" type="text" name="<?php echo $this->get_field_name($lab) ?>" id="<?php echo $this->get_field_id($lab) ?> " value="" rows="2"><?php echo htmlspecialchars($margs[$lab]) ?></textarea>
        </div>

        <?php
        $lab = 'telephone';
        ?>
        <div class="setting">
        <h5><?php echo esc_html__("Telephone",'antfarm'); ?></h5>
            <textarea class="" type="text" name="<?php echo $this->get_field_name($lab) ?>" id="<?php echo $this->get_field_id($lab) ?> " value="" rows="2"><?php echo ($margs[$lab]) ?></textarea>
        </div>

        <?php
        $lab = 'email';
        ?>
        <div class="setting">
        <h5><?php echo esc_html__("Email",'antfarm'); ?></h5>
            <input class="" type="text" name="<?php echo $this->get_field_name($lab) ?>" id="<?php echo $this->get_field_id($lab) ?> " value="<?php echo ($margs[$lab]) ?>" size="20"/>
        </div>
        <br>
        <?php
    }

    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     */
}
class Antfarm_Search extends WP_Widget {

    /**
     * Sets up the widgets name etc
     */
    public function __construct() {
        $widget_ops = array(
            'classname' => 'Antfarm_Search',
            'description' => esc_html__("Your site's latest posts",'antfarm'),
        );
        parent::__construct( 'Antfarm_Search', 'Qu '.esc_html__("Search",'antfarm'), $widget_ops );
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget( $args, $instance ) {
       // -- outputs the content of the widget



        if($instance['title']){
            $args['before_widget'] = str_replace('sidebar-block', 'sidebar-block sidebar-has-title',$args['before_widget']);
        }


        echo $args['before_widget'];




        global $antfarm;





        if(isset($instance['heading_style_title']) && $instance['heading_style_title']  && $antfarm){


            $h_wrap_start = $antfarm->generate_heading_wrap_start($instance['heading_style_title'], array(
                'extra_classes'=>'the-variable-heading widget-title  ',
            ));


            $h_wrap_end = $antfarm->generate_heading_wrap_end($instance['heading_style_title'], array());



            echo $h_wrap_start;
            echo apply_filters( 'widget_title', $instance['title'] );
            echo $h_wrap_end;

        }else{
            if ( ! empty( $instance['title'] ) ) {
                echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
            }
        }



        $margs = array(

            'address'=>'',
            'telephone'=>'',
            'email'=>'',
        );


        if(is_array($instance)){
            $margs = array_merge($margs, $instance);
        }



        $button_text = esc_html__("Search",'antfarm');


        if(isset($margs['button_text']) && $margs['button_text']){
            $button_text = $margs['button_text'];
        }





        ?>
        <div class="antfarm-widget-search widget_search">
        <form role="search" method="get" class="search-form" action="<?php echo site_url(); ?>">
            <label>
                <input type="search" class="search-field" placeholder="<?php echo esc_html__("Search",'antfarm'); ?> .." value="" name="s">
            </label>
            <button  class="search-submit   <?php
            if(isset($instance['heading_style_button']) && $instance['heading_style_button'] ){


                echo $instance['heading_style_button'];

            }else{
                echo 'h6';
            }

            ?>" value="<?php echo $button_text; ?>" ><?php echo $button_text; ?></button>
        </form>
        </div>

        <?php




        echo $args['after_widget'];
    }

    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form( $instance ) {
       // -- outputs the options form on admin

        $margs = array(
            'title'=>'',
            'address'=>'',
            'telephone'=>'',
            'email'=>'',
            'heading_style_title'=>'',
            'heading_style_button'=>'',
            'button_text'=>'',
        );




        if(is_array($instance)){
            $margs = array_merge($margs, $instance);
        }



        ?>


        <?php
        $lab = 'title';
        ?>
        <div class="setting">
        <h5><?php echo esc_html__("Title",'antfarm'); ?></h5>
            <input type="text" class="" type="text" name="<?php echo $this->get_field_name($lab) ?>" id="<?php echo $this->get_field_id($lab) ?> " value="<?php echo htmlspecialchars($margs[$lab]); ?>" rows="2"/>
        </div>



        <?php
        $lab = 'button_text';
        ?>
        <div class="setting">
            <h5><?php echo esc_html__("Button Text",'antfarm'); ?></h5>
            <input type="text" class="" type="text" name="<?php echo $this->get_field_name($lab) ?>" id="<?php echo $this->get_field_id($lab) ?> " value="<?php echo htmlspecialchars($margs[$lab]); ?>" rows="2"/>
        </div>


        <?php



        $lab = 'heading_style_button';
        ?>

        <div class="setting">
            <h5><?php echo esc_html__("Heading Style",'antfarm'); ?> <?php echo esc_html__("for Button",'antfarm'); ?></h5>

            <?php

            echo DZSHelpers::generate_select($this->get_field_name($lab),array(
                    'extraattr'=>' id="'.$this->get_field_id($lab).'"',
                    'seekval'=>$margs[$lab],
                    'class'=>'dzs-style-me skin-beige',
                    'options'=>array(
                        array(
                            'label'=>esc_html__("Default",'antfarm'),
                            'value'=>'',
                        ),
                        array(
                            'label'=>@sprintf(esc_html__("Heading %s",'antfarm'),'1'),
                            'value'=>'h1',
                        ),
                        array(
                            'label'=>@sprintf(esc_html__("Heading %s",'antfarm'),'2'),
                            'value'=>'h2',
                        ),
                        array(
                            'label'=>@sprintf(esc_html__("Heading %s",'antfarm'),'3'),
                            'value'=>'h3',
                        ),
                        array(
                            'label'=>@sprintf(esc_html__("Heading %s",'antfarm'),'4'),
                            'value'=>'h4',
                        ),
                        array(
                            'label'=>@sprintf(esc_html__("Heading %s",'antfarm'),'5'),
                            'value'=>'h5',
                        ),
                        array(
                            'label'=>@sprintf(esc_html__("Heading %s",'antfarm'),'6'),
                            'value'=>'h6',
                        ),
                        array(
                            'label'=>@sprintf(esc_html__("Heading Group %s",'antfarm'),'1'),
                            'value'=>'h-group-1',
                        ),
                        array(
                            'label'=>@sprintf(esc_html__("Heading Group %s",'antfarm'),'2'),
                            'value'=>'h-group-2',
                        ),
                    ),
            ))
            ?>

        </div>




        <?php
        $lab = 'email';
        ?>

        <br>
        <?php
    }

    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     */
}



class Antfarm_Categories extends WP_Widget {

    /**
     * Sets up the widgets name etc
     */
    public function __construct() {
        $widget_ops = array(
            'classname' => 'Antfarm_Categories',
            'description' => esc_html__("A list of site categories",'antfarm'),
        );
        parent::__construct( 'Antfarm_Categories', 'Qu '.esc_html__("Categories",'antfarm'), $widget_ops );
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget( $args, $instance ) {
       // -- outputs the content of the widget

        echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
        }

        $margs = array(

            'address'=>'',
            'telephone'=>'',
            'email'=>'',
            'cat'=>array(),
        );


        if(is_array($instance)){
            $margs = array_merge($margs, $instance);
        }


        $cats = get_categories();





        echo '<ul class="antfarm-widget-categories sidebar-count-list">';

        if(is_array($margs['cat']) && count($margs['cat'])){

            foreach ($margs['cat'] as $itid){
                $it = get_category($itid);



                if($it){

	                $category_link = get_category_link( $it->term_id );
	                echo '<li><a class=\'ajax-link custom-a do-not-inherit-color  weight-from-anchor\' href="'.$category_link.'"><span class="cat-name font-group-4">'.$it->name.'</span><span class="the-count">'.$it->count.'</span></a></li>';
                }
            }
        }else{

            foreach($cats as $it) {
	            if($it && isset($it->term_id)) {
		            $category_link = get_category_link( $it->term_id );
		            echo '<li><a class=\'ajax-link custom-a do-not-inherit-color weight-from-anchor\' href="' . $category_link . '"><span class="cat-name font-group-4">' . $it->name . '</span><span class="the-count">' . $it->count . '</span></a></li>';
	            }
            }
        }



        echo '</ul>';




        echo $args['after_widget'];
    }

    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form( $instance ) {
       // -- outputs the options form on admin

        $margs = array(
            'title'=>esc_html__("Categories",'antfarm'),
            'count'=>'5',
            'cat'=>array(),
        );




        if(is_array($instance)){
            $margs = array_merge($margs, $instance);
        }




        ?>
        <div class="setting">
        <h5 for="<?php echo $this->get_field_id('title'); ?>"><?php echo esc_html__("Title",'antfarm'); ?></h5>
        <input type="text" name="<?php echo $this->get_field_name('title') ?>" id="<?php echo $this->get_field_id('title') ?> " value="<?php echo $margs['title'] ?>" size="20"/>
        </div>

        <?php




        $lab = 'cat[]';
        ?>

        <div class="setting">
        <h5 for="<?php echo $this->get_field_id($lab); ?>"><?php echo esc_html__("Categories",'antfarm'); ?></h5>
            <?php
            $terms = get_terms( 'category', array(
                'hide_empty' => false,
            ) );

            foreach ($terms as $te){
                echo '<div>';
                echo '<label>';
                echo DZSHelpers::generate_input_checkbox($this->get_field_name($lab),array(

                        'id'=>$this->get_field_name($lab),
                        'val'=>$te->term_id,
                        'seekval'=>$margs['cat'],
                ));
                echo ' '.$te->name;
                echo '</label>';
                echo '</div>';
            }


            ?>
            <div class="sidenote"><?php echo esc_html__("Select only some categories or leave nothing selected to display all categories",'antfarm'); ?></div>
        </div>
        <?php



    }

    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     */
}




class Antfarm_Image extends WP_Widget {

    /**
     * Sets up the widgets name etc
     */
    public function __construct() {
        $widget_ops = array(
            'classname' => 'Antfarm_Image',
            'description' => esc_html__("A image",'antfarm'),
        );
        parent::__construct( 'Antfarm_Image', 'Qu '.esc_html__("Image",'antfarm'), $widget_ops );
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget( $args, $instance ) {
       // -- outputs the content of the widget

        echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
        }

        $margs = array(

            'address'=>'',
            'telephone'=>'',
            'title'=>'',
            'img'=>'',
        );


        if(is_array($instance)){
            $margs = array_merge($margs, $instance);
        }


        $cats = get_categories();




        echo '<img class="antfarm-widget-image fullwidth" src="'.antfarm_sanitize_id_to_src($margs['img']).'"/>';




        echo $args['after_widget'];
    }

    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form( $instance ) {
       // -- outputs the options form on admin

        $margs = array(
            'title'=>esc_html__("Widget Title",'antfarm'),
            'count'=>'5',
            'img'=>'',
        );




        if(is_array($instance)){
            $margs = array_merge($margs, $instance);
        }



        ?>
        <div class="setting">
            <?php
            $lab = 'title';
            ?>
        <h5 for="<?php echo $this->get_field_id($lab); ?>"><?php echo esc_html__("Title",'antfarm'); ?></h5>

        <input type="text" name="<?php echo $this->get_field_name($lab) ?>" id="<?php echo $this->get_field_id($lab) ?> " value="<?php echo $margs[$lab] ?>" size="20"/>
        </div>
        <div class="setting">
            <?php
            $lab = 'img';
            ?>
        <h5 ><?php echo esc_html__("Image",'antfarm'); ?></h5>



            <?php

            global $antfarm;

            if($antfarm){
                echo $antfarm->vc_antfarm_add_media_att(array(
'library_type'=>'image',
'param_name'=>$this->get_field_name($lab),
                ), $margs[$lab]);
            }



            ?>


        </div>

        <?php
    }

    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     */
}









class Antfarm_Social extends WP_Widget {

    /**
     * Sets up the widgets name etc
     */
    public function __construct() {
        $widget_ops = array(
            'classname' => 'Antfarm_Social',
            'description' => esc_html__("A list of social links",'antfarm'),
        );
        parent::__construct( 'Antfarm_Social', 'Qu '.esc_html__("Social",'antfarm'), $widget_ops );
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget( $args, $instance ) {
       // -- outputs the content of the widget

        echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
        }



        $cats = get_categories();




        $margs = array(
            'title'=>esc_html__("Widget Title",'antfarm'),
            'repeater'=>'[]',
            'count'=>'5',
        );




        if(is_array($instance)){
            $margs = array_merge($margs, $instance);
        }




        $socials = json_decode($margs['repeater'],true);



        if(is_array($socials) && count($socials)){

	        echo '<ul class="antfarm-widget-social social-list">';
	        foreach($socials as $it) {

	            if($it['title']){

		            echo '<li class="font-group-6 "><a class="custom-a weight-from-anchor" href="'.$it['link'].'"><span class="icon-con"><i class="fa fa-'.$it['icon'].'" aria-hidden="true"></i></span><span class="text-con ">'.$it['title'].'</span></a></li>';
                }
	        }


	        echo '</ul>';
        }





        echo $args['after_widget'];
    }

    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form( $instance ) {
       // -- outputs the options form on admin

        $margs = array(
            'title'=>esc_html__("Widget Title",'antfarm'),
            'repeater'=>'[]',
            'count'=>'5',
        );




        if(is_array($instance)){
            $margs = array_merge($margs, $instance);
        }



        ?>


        <div class="setting">
            <h5 for="<?php echo $this->get_field_id('title'); ?>"><?php echo esc_html__("Title",'antfarm'); ?></h5>
            <input type="text" name="<?php echo $this->get_field_name('title') ?>" id="<?php echo $this->get_field_id('title') ?> " value="<?php echo $margs['title'] ?>" size="20"/>
        </div>

        <div class="setting">
        <h5 for="<?php echo $this->get_field_id('repeater'); ?>"><?php echo ''; ?></h5>
        <input type="text" class="disabled repeater-con-target" name="<?php echo $this->get_field_name('repeater') ?>" id="<?php echo $this->get_field_id('repeater') ?> " value='<?php echo $margs['repeater'] ?>' size="20"/>
            <div class="repeater-main-con">
                <div class="repeaters-con">
                    <div class="repeater-con repeater-con-for-clone">

                        <div class="repeater-con--header">

                            <div class="table-row">
                                <div class="table-cell-full">
                                    <div class="the-title"><?php echo esc_html__("Title",'antfarm'); ?></div>
                                </div>

                                <div class="table-cell-right">
                                    <div class="repeater-btn delete-btn">
                                        <i aria-hidden="true"  class="fa fa-times"></i>
                                    </div>
                                    <div class="repeater-btn move-btn">
                                        <i aria-hidden="true"  class="fa fa-arrows-v"></i>
                                    </div>
                                </div>
                            </div>



                        </div>

                        <div class="repeater-con--body">



                        <div class="setting">

                            <h6><span class="customize-control-title"><?php echo esc_html__("Title",'antfarm'); ?></span></h6>
                            <input type="text" class="repeater-field" value=""  data-repeater_name="title" />
                        </div>

                        <div class="setting">
                        <h6><span class="customize-control-title"><?php echo esc_html__("Link",'antfarm'); ?></span></h6>
                        <input type="text" class="repeater-field" value=""  data-repeater_name="link" />
                        </div>


                        <div class="setting">
                        <h6 class="customize-control-title"><?php echo esc_html__("Icon",'antfarm'); ?></h6>
                        <div class="iconselector" data-type=""> <p><span class="iconselector-preview"></span><input type="text" data-repeater_name="icon" class="style-iconselector iconselector-waiter repeater-field   "  data-repeater_name="icon" value=""/><span class="iconselector-btn"><i class="fa fa-caret-down"></i></span></p> <div class="iconselector-clip"> <input type="text" class="icon-search-field textfield" placeholder=""/><br> </div> </div>
                        </div>
                        </div>

                    </div>
                </div>


                <p><button class="btn-add-repeater-field button-secondary" href="#"><?php echo esc_html__("Add New",'antfarm'); ?></button></p>
            </div>

        </div>

        <?php
    }

    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     */
}
class Antfarm_Links extends WP_Widget {

    /**
     * Sets up the widgets name etc
     */
    public function __construct() {
        $widget_ops = array(
            'classname' => 'Antfarm_links',
            'description' => esc_html__("A list of links",'antfarm'),
        );
        parent::__construct( 'Antfarm_links', 'Qu '.esc_html__("Links",'antfarm'), $widget_ops );
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget( $args, $instance ) {
       // -- outputs the content of the widget

        echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
        }



        $cats = get_categories();




        $margs = array(
            'title'=>esc_html__("Widget Title",'antfarm'),
            'repeater'=>'[]',
            'count'=>'5',
        );




        if(is_array($instance)){
            $margs = array_merge($margs, $instance);
        }




        $socials = json_decode($margs['repeater']);




        echo '<ul class="antfarm-widget-links links-list">';

        foreach($socials as $it) {
            echo '<li class="font-group-6" ><a class="color-highlight-on-hover" href="'.$it->link.'"><span class="text-con">'.$it->title.'</span></a></li>';
        }


        echo '</ul>';




        echo $args['after_widget'];
    }

    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form( $instance ) {
       // -- outputs the options form on admin

        $margs = array(
            'title'=>esc_html__("Widget Title",'antfarm'),
            'repeater'=>'[]',
            'count'=>'5',
        );




        if(is_array($instance)){
            $margs = array_merge($margs, $instance);
        }



        ?>


        <div class="setting">
            <h5 for="<?php echo $this->get_field_id('title'); ?>"><?php echo esc_html__("Title",'antfarm'); ?></h5>
            <input type="text" name="<?php echo $this->get_field_name('title') ?>" id="<?php echo $this->get_field_id('title') ?> " value="<?php echo $margs['title'] ?>" size="20"/>
        </div>

        <div class="setting">
        <h5 for="<?php echo $this->get_field_id('repeater'); ?>"><?php echo '' ?></h5>
        <input type="text" class="disabled repeater-con-target" name="<?php echo $this->get_field_name('repeater') ?>" id="<?php echo $this->get_field_id('repeater') ?> " value='<?php echo $margs['repeater'] ?>' size="20"/>
            <div class="repeater-main-con">
                <div class="repeaters-con">
                    <div class="repeater-con repeater-con-for-clone">

                        <div class="repeater-con--header">

                            <div class="table-row">
                                <div class="table-cell-full">
                                    <div class="the-title"><?php echo esc_html__("Title",'antfarm'); ?></div>
                                </div>

                                <div class="table-cell-right">
                                    <div class="repeater-btn delete-btn">
                                        <i aria-hidden="true"  class="fa fa-times"></i>
                                    </div>
                                    <div class="repeater-btn move-btn">
                                        <i aria-hidden="true"  class="fa fa-arrows-v"></i>
                                    </div>
                                </div>
                            </div>



                        </div>

                        <div class="repeater-con--body">



                        <div class="setting">

                            <h6><span class="customize-control-title"><?php echo esc_html__("Title",'antfarm'); ?></span></h6>
                            <input type="text" class="repeater-field" value=""  data-repeater_name="title" />
                        </div>

                        <div class="setting">
                        <h6><span class="customize-control-title"><?php echo esc_html__("Link",'antfarm'); ?></span></h6>
                        <input type="text" class="repeater-field" value=""  data-repeater_name="link" />
                        </div>


                        </div>

                    </div>
                </div>


                <p><button class="btn-add-repeater-field button-secondary" href="#"><?php echo esc_html__("Add New",'antfarm'); ?></button></p>
            </div>

        </div>

        <?php
    }

    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     */
}
class Antfarm_WorkingHours extends WP_Widget {

    /**
     * Sets up the widgets name etc
     */
    public function __construct() {
        $widget_ops = array(
            'classname' => 'Antfarm_WorkingHours',
            'description' => esc_html__("Working Hours",'antfarm'),
        );
        parent::__construct( 'Antfarm_WorkingHours', 'Qu '.esc_html__("Working Hours",'antfarm'), $widget_ops );
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget( $args, $instance ) {
       // -- outputs the content of the widget

        echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
        }



        $cats = get_categories();




        $margs = array(
            'title'=>esc_html__("Widget Title",'antfarm'),
            'small_desc'=>'',
            'repeater'=>'[]',
            'count'=>'5',
        );




        if(is_array($instance)){
            $margs = array_merge($margs, $instance);
        }





        echo '<div class="small-desc font-group-6">'.wpautop($margs['small_desc']).'</div>';


        $socials = json_decode($margs['repeater']);




        echo '<ul class="working-hours-list h-group-1">';
        foreach($socials as $it) {
            echo '<li><span class="time-of-the-week">'.$it->title.'</span><span class="time-of-the-day">'.$it->time.'</span></li>';
        }


        echo '</ul>';




        echo $args['after_widget'];
    }

    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form( $instance ) {
       // -- outputs the options form on admin

        $margs = array(
            'title'=>esc_html__("Widget Title",'antfarm'),
            'small_desc'=>'',
            'repeater'=>'[]',
            'count'=>'5',
        );




        if(is_array($instance)){
            $margs = array_merge($margs, $instance);
        }



        ?>


        <div class="setting">
            <h5 for="<?php echo $this->get_field_id('title'); ?>"><?php echo esc_html__("Title",'antfarm'); ?></h5>
            <input type="text" name="<?php echo $this->get_field_name('title') ?>" id="<?php echo $this->get_field_id('title') ?> " value="<?php echo $margs['title'] ?>" size="20"/>
        </div>


        <?php
        $lab = 'small_desc';
        ?>

        <div class="setting">
            <h5 for="<?php echo $this->get_field_id($lab); ?>"><?php echo esc_html__("Small Description",'antfarm'); ?></h5>
        <textarea class="" type="text" name="<?php echo $this->get_field_name($lab) ?>" id="<?php echo $this->get_field_id($lab) ?> " value="" rows="2"><?php echo htmlspecialchars($margs[$lab]) ?></textarea>
        </div>

        <?php
        $lab = 'repeater';
        ?>
        <div class="setting">
        <h5 for="<?php echo $this->get_field_id($lab); ?>"><?php echo ''; ?></h5>
        <input type="text" class="disabled repeater-con-target" name="<?php echo $this->get_field_name($lab) ?>" id="<?php echo $this->get_field_id($lab) ?> " value='<?php echo $margs[$lab] ?>' size="20"/>
            <div class="repeater-main-con">
                <div class="repeaters-con">
                    <div class="repeater-con repeater-con-for-clone">

                        <div class="repeater-con--header">

                            <div class="table-row">
                                <div class="table-cell-full">
                                    <div class="the-title"><?php echo esc_html__("Title",'antfarm'); ?></div>
                                </div>

                                <div class="table-cell-right">
                                    <div class="repeater-btn delete-btn">
                                        <i aria-hidden="true"  class="fa fa-times"></i>
                                    </div>
                                    <div class="repeater-btn move-btn">
                                        <i aria-hidden="true"  class="fa fa-arrows-v"></i>
                                    </div>
                                </div>
                            </div>



                        </div>

                        <div class="repeater-con--body">



                        <div class="setting">

                            <h6><span class="customize-control-title"><?php echo esc_html__("Title",'antfarm'); ?></span></h6>
                            <input type="text" class="repeater-field" value=""  data-repeater_name="title" />
                        </div>

                        <div class="setting">
                        <h6><span class="customize-control-title"><?php echo esc_html__("Time",'antfarm'); ?></span></h6>
                        <input type="text" class="repeater-field" value=""  data-repeater_name="time" />
                        </div>


                        </div>

                    </div>
                </div>


                <p><button class="btn-add-repeater-field button-secondary" href="#"><?php echo esc_html__("Add New",'antfarm'); ?></button></p>
            </div>

        </div>

        <?php
    }

    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     */
}
class Antfarm_LatestWorks extends WP_Widget {

    /**
     * Sets up the widgets name etc
     */
    public function __construct() {
        $widget_ops = array(
            'classname' => 'Antfarm_LatestWorks',
            'description' => esc_html__("Latest portfolio items",'antfarm'),
        );
        parent::__construct( 'Antfarm_LatestWorks', 'Qu '.esc_html__("Latest Works",'antfarm'), $widget_ops );
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget( $args, $instance ) {
       // -- outputs the content of the widget

        echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
        }


        $margs = array(
            'cats'=>'',
            'nr_columns'=>'3',
            'count'=>'9',
        );
        $margs = array_merge($margs, $instance);


        global $antfarm;



        $wpqargs['post_type']='antfarm_port_items';
        $wpqargs['posts_per_page']=$margs['count'];
        $wpqargs['orderby']="date";
        $wpqargs['order']="DESC";

        $margs['cats'] = array_values($margs['cats']);

        if($margs['cats']){
            $wpqargs['tax_query']=array(
                array(
                    'taxonomy' => $antfarm->name_port_item_cat,
                    'field' => 'id',
                    'terms' => $margs['cats'],
                    'operator' => 'IN'
                ),
            );
        };


        echo '<div class="antfarm-widget-latest-works featured-works-con';

        if($margs['nr_columns']=='2'){
            echo ' two-columns';
        }
        if($margs['nr_columns']=='4'){
            echo ' four-columns';
        }

        echo '">';


        $query = new WP_Query($wpqargs);


        foreach($query->posts as $it){

            $the_src = wp_get_attachment_image_src(get_post_thumbnail_id($it->ID), 'full');
            $thumbnail_src = $the_src[0];


            echo '<a class="ajax-link custom-a dzstooltip-con js for-hover" href="'.get_permalink($it->ID).'">
    <span class="dzstooltip   transition-slidein arrow-bottom align-center  skin-blackwhite   width-auto" style=" bottom: 100%; top: auto; white-space:nowrap;"><span class="tooltip-title h-group-1">'.$it->post_title.'</span>';

            echo '</span>
            <div class="latest-work-image-con"><div class="imagediv height-same-as-width" style="background-image:url('.$thumbnail_src.');"></div></div>
</a>';

        }

        echo '</div>';


        if(defined('QUCREATIVE_THEME_URL')){

	        wp_enqueue_script('antfarm_tooltip', QUCREATIVE_THEME_URL . 'libs/tooltip/tooltip.js');
	        wp_enqueue_style('antfarm_tooltip', QUCREATIVE_THEME_URL . 'libs/tooltip/tooltip.css');
        }else{

            global $antfarm;
	        wp_enqueue_script('antfarm_tooltip', $antfarm->base_url . 'libs/dzstooltip/dzstooltip.js',array('jquery'));
	        wp_enqueue_style('antfarm_tooltip', $antfarm->base_url . 'libs/dzstooltip/dzstooltip.css');

        }




        echo $args['after_widget'];
    }

    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form( $instance ) {


        $margs = array(
            'title'=>esc_html__("Widget Title",'antfarm'),
            'count'=>'9',
            'nr_columns'=>'3',
            'cats'=>'',
        );




        if(is_array($instance)){
            $margs = array_merge($margs, $instance);
        }


	    global $antfarm;

	    $terms = get_terms( $antfarm->name_port_item_cat, array(
            'hide_empty' => false,
        ) );



        ?>
        <div class="setting">
        <h5 for="<?php echo $this->get_field_id('title'); ?>"><?php echo esc_html__("Title",'antfarm'); ?></h5>
        <input type="text" name="<?php echo $this->get_field_name('title') ?>" id="<?php echo $this->get_field_id('title') ?> " value="<?php echo $margs['title'] ?>" size="20"/>
        </div>

        <?php
        $lab = 'nr_columns';
        ?>
        <div class="setting">
        <h5><?php echo esc_html__("Number of Columns",'antfarm'); ?></h5>
            <?php

            echo DZSHelpers::generate_select($this->get_field_name($lab), array(
                'options'=>array(
                    array(
                      'label'=>@sprintf(esc_html__("%s Columns",'antfarm'),'2')  ,
                      'value'=>2  ,
                    ),
                    array(
                      'label'=>@sprintf(esc_html__("%s Columns",'antfarm'),'3')  ,
                      'value'=>3  ,
                    ),
                    array(
                      'label'=>@sprintf(esc_html__("%s Columns",'antfarm'),'4')  ,
                      'value'=>4  ,
                    ),
                ),
                'seekval'=> $margs[$lab],
                'extraattr'=> ' id="'.$this->get_field_id($lab).'"',
            ))


            ?>
        </div>

        <?php
        $lab = 'count';
        ?>
        <div class="setting">
        <h5><?php echo esc_html__("Count",'antfarm'); ?></h5>
            <input class="" type="text" name="<?php echo $this->get_field_name($lab) ?>" id="<?php echo $this->get_field_id($lab) ?> " value="<?php echo htmlspecialchars($margs[$lab]) ?>" size="20"/>
        </div>


        <br>

        <?php
        $lab = 'cats';


        ?>
        <div class="setting">
        <h5><?php echo esc_html__("Categories",'antfarm'); ?></h5>
            <?php

            foreach ($terms as $term){

                echo '<label><input type="checkbox"';

                if(is_array($margs[$lab])){
                    foreach ($margs[$lab] as $mr){



                        if($mr==$term->term_id){
                            echo ' checked';
                        }
                    }
                }


                echo ' id="'.$this->get_field_id($lab).'" name="'.$this->get_field_name( $lab ).'[]" value="'.$term->term_id.'">'.$term->name.'</label><br>';
            }

            ?>
        </div>
        <br>
        <?php
    }

    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     */
}
class Antfarm_LightboxGallery extends WP_Widget {

    /**
     * Sets up the widgets name etc
     */
    public function __construct() {
        $widget_ops = array(
            'classname' => 'Antfarm_LightboxGallery',
            'description' => esc_html__("Latest portfolio items",'antfarm'),
        );
        parent::__construct( 'Antfarm_LightboxGallery', 'Qu '.esc_html__("Lightbox Gallery",'antfarm'), $widget_ops );
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget( $args, $instance ) {
       // -- outputs the content of the widget

        echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
        }


        $margs = array(
            'cats'=>'',
            'count'=>'9',
            'nr_columns'=>'3',
        );
        $margs = array_merge($margs, $instance);



        $wpqargs['post_type']='antfarm_port_items';
        $wpqargs['posts_per_page']=$margs['count'];

        $wpqargs['orderby']="date";
        $wpqargs['order']="DESC";


        if(is_array($margs['cats'])){

	        $margs['cats'] = array_values($margs['cats']);
        }else{
	        $margs['cats'] = array();
        }

        global $antfarm;

        if($margs['cats']){
            $wpqargs['tax_query']=array(
                array(
                    'taxonomy' => $antfarm->name_port_item_cat,
                    'field' => 'id',
                    'terms' => $margs['cats'],
                    'operator' => 'IN'
                ),
            );
        };


        echo '<div class="antfarm-widget-lightbox-gallery featured-works-con';



        if($margs['nr_columns']=='2'){
            echo ' two-columns';
        }
        if($margs['nr_columns']=='4'){
            echo ' four-columns';
        }


        echo '">';


        $query = new WP_Query($wpqargs);


        foreach($query->posts as $it){

            $the_src = wp_get_attachment_image_src(get_post_thumbnail_id($it->ID), 'full');
            $thumbnail_src = $the_src[0];


            $big_img = get_post_meta($it->ID,'qucreative_meta_post_media',true);



            if(strpos($big_img, '.mp4')!==false || strpos($big_img, '.m4v')!==false){



                wp_enqueue_style('antfarm-video-player', QUCREATIVE_THEME_URL . 'libs/videogallery/vplayer.css');
                wp_enqueue_script('antfarm-video-player', QUCREATIVE_THEME_URL . 'libs/videogallery/vplayer.js');

            }

            echo '<div class="imagediv-con  zoombox" data-lightbox-title="'.$it->post_title.'" data-src="'.$big_img.'" data-biggallery="footer-featured-works">';
            echo '<div class="image-container " >';
            echo '<div class="imagediv " style="background-image:url('.$thumbnail_src.');"></div>';
	        echo '</div>';



            echo  '<div class="zoombox-larger-description"><h3>' . get_post_meta($it->ID, 'qucreative_meta_port_subtitle', true) . '</h3><p>' . strip_shortcodes($it->post_content) . '</p></div>';
            ?>
            <div class="the-overlay"><i class="fa fa-search"></i></div>
            <?php
            echo '</div>';

        }

        echo '</div>';


        global $antfarm;
        $base_url = $antfarm->base_url;
        if(defined('QUCREATIVE_THEME_URL')){
	        $base_url = QUCREATIVE_THEME_URL;
        }

	    if(defined('QUCREATIVE_THEME_URL')){

		    wp_enqueue_script('antfarm_tooltip', QUCREATIVE_THEME_URL . 'libs/tooltip/tooltip.js');
		    wp_enqueue_style('antfarm_tooltip', QUCREATIVE_THEME_URL . 'libs/tooltip/tooltip.css');
	    }else{

		    global $antfarm;
		    wp_enqueue_script('antfarm_tooltip', $antfarm->base_url . 'libs/dzstooltip/dzstooltip.js',array('jquery'));
		    wp_enqueue_style('antfarm_tooltip', $antfarm->base_url . 'libs/dzstooltip/dzstooltip.css');

	    }





	    wp_enqueue_style('qucreative_lightbox', $base_url . 'libs/zoombox/zoombox.css');
	    wp_enqueue_script('qucreative_lightbox', $base_url . 'libs/zoombox/zoombox.js');

        echo $args['after_widget'];
    }

    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form( $instance ) {
       // -- outputs the options form on admin

        $margs = array(
            'title'=>esc_html__("Widget Title",'antfarm'),
            'count'=>'9',
            'nr_columns'=>'3',
            'cats'=>'',
        );




        if(is_array($instance)){
            $margs = array_merge($margs, $instance);
        }

        global $antfarm;

        $terms = get_terms( $antfarm->name_port_item_cat, array(
            'hide_empty' => false,
        ) );



        ?>
        <div class="setting">
        <h5 for="<?php echo $this->get_field_id('title'); ?>"><?php echo esc_html__("Title",'antfarm'); ?></h5>
        <input type="text" name="<?php echo $this->get_field_name('title') ?>" id="<?php echo $this->get_field_id('title') ?> " value="<?php echo $margs['title'] ?>" size="20"/>
        </div>

        <?php
        $lab = 'count';
        ?>
        <div class="setting">
        <h5><?php echo esc_html__("Count",'antfarm'); ?></h5>
            <input class="" type="text" name="<?php echo $this->get_field_name($lab) ?>" id="<?php echo $this->get_field_id($lab) ?> " value="<?php echo htmlspecialchars($margs[$lab]) ?>" size="20"/>
        </div>



        <?php
        $lab = 'nr_columns';
        ?>
        <div class="setting">
            <h5><?php echo esc_html__("Number of Columns",'antfarm'); ?></h5>
            <?php

            echo DZSHelpers::generate_select($this->get_field_name($lab), array(
                'options'=>array(
                    array(
                        'label'=>@sprintf(esc_html__("%s Columns",'antfarm'),'2')  ,
                        'value'=>2  ,
                    ),
                    array(
                        'label'=>@sprintf(esc_html__("%s Columns",'antfarm'),'3')  ,
                        'value'=>3  ,
                    ),
                    array(
                        'label'=>@sprintf(esc_html__("%s Columns",'antfarm'),'4')  ,
                        'value'=>4  ,
                    ),
                ),
                'seekval'=> $margs[$lab],
                'extraattr'=> ' id="'.$this->get_field_id($lab).'"',
            ))


            ?>
        </div>

        <br>
        <?php
        $lab = 'cats';


        ?>
        <div class="setting">
        <h5><?php echo esc_html__("Categories",'antfarm'); ?></h5>
            <?php

            foreach ($terms as $term){

	            if($term && isset($term->term_id)){
                echo '<label><input type="checkbox"';

                if(is_array($margs[$lab])){
                    foreach ($margs[$lab] as $mr){




                        if($mr==$term->term_id){
                            echo ' checked';
                        }
                    }
                }


                echo ' id="'.$this->get_field_id($lab).'" name="'.$this->get_field_name( $lab ).'[]" value="'.$term->term_id.'">'.$term->name.'</label><br>';
	            }
            }

            ?>
        </div>
        <br>
        <?php
    }

    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     */
}





class Antfarm_Archive extends WP_Widget {

    /**
     * Sets up the widgets name etc
     */
    public function __construct() {
        $widget_ops = array(
            'classname' => 'Antfarm_Archive',
            'description' => esc_html__("A monthly archive of your site Posts.",'antfarm'),
        );
        parent::__construct( 'Antfarm_Archive', 'Qu '.esc_html__("Archive",'antfarm'), $widget_ops );
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget( $args, $instance ) {
       // -- outputs the content of the widget

        echo $args['before_widget'];
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
        }


        $margs = array(
            'cats'=>'',
            'count'=>'',
        );
        $margs = array_merge($margs, $instance);




        $limit = '';
        if($margs['count']){
            $limit = $margs['count'];
        }

        $args3 = array(
            'type'            => 'monthly',
            'limit'           => '',
            'format'          => 'html',
            'before'          => '',
            'after'           => '',
            'show_post_count' => true,
            'echo'            => 0,
            'limit'            => $limit,
            'order'           => 'DESC',
            'post_type'     => 'post'
        );
        $query = wp_get_archives( $args3 );

        echo '<ul class="antfarm-widget-archive sidebar-count-list q-archive-widget">';

        $query = preg_replace("/<li><a(.*?)>(.*?)<\/a>&nbsp;\((.*?)\)<\/li>/", "<li><a$1 class='ajax-link custom-a do-not-inherit-color weight-from-anchor'><span class=\"cat-name font-group-4\">$2</span><span class=\"the-count\">$3</span></a></li>", $query);
        echo $query;
        echo '</ul>';




        if(isset($args['after_widget'])){

            echo $args['after_widget'];
        }
    }

    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form( $instance ) {
       // -- outputs the options form on admin

        $margs = array(
            'title'=>esc_html__("Archive",'antfarm'),
            'count'=>'9',
            'cats'=>'',
        );




        if(is_array($instance)){
            $margs = array_merge($margs, $instance);
        }


	    global $antfarm;

	    $terms = get_terms( $antfarm->name_port_item_cat, array(
            'hide_empty' => false,
        ) );



        ?>
        <div class="setting">
        <h5 for="<?php echo $this->get_field_id('title'); ?>"><?php echo esc_html__("Title",'antfarm'); ?></h5>
        <input type="text" name="<?php echo $this->get_field_name('title') ?>" id="<?php echo $this->get_field_id('title') ?> " value="<?php echo $margs['title'] ?>" size="20"/>
        </div>


        <?php
        $lab = 'count';
        ?>
        <div class="setting">
            <h5><?php echo esc_html__("Count",'antfarm'); ?></h5>
            <input class="" type="text" name="<?php echo $this->get_field_name($lab) ?>" id="<?php echo $this->get_field_id($lab) ?> " value="<?php echo htmlspecialchars($margs[$lab]) ?>" size="20"/>
        </div>

        <br>
        <?php
    }

    /**
     * Processing widget options on save
     *
     *
     */
}



function antfarm_register_widgets() {





	register_widget('Antfarm_Latest_Posts');
	register_widget('Antfarm_Contact');

	register_widget('Antfarm_Search');



	register_widget('Antfarm_Categories');
	register_widget('Antfarm_Image');
	register_widget('Antfarm_Social');
	register_widget('Antfarm_Links');
	register_widget('Antfarm_WorkingHours');

	register_widget('Antfarm_LatestWorks');
	register_widget('Antfarm_LightboxGallery');


	register_widget('Antfarm_Archive');
}


add_action( 'widgets_init', 'antfarm_register_widgets',3 );