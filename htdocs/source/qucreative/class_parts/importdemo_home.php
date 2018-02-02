<?php

























$demo_slug = 'qucreative-home';
$demo_name = 'Main Demo';


if($_REQUEST['demo']==$demo_slug) {








    global $wpdb;

    $table_name = $wpdb->prefix . 'options';




















	$img_name_500_100 = '500x200.jpg';
	$img_url_500_100 = QUCREATIVE_THEME_URL . 'placeholders/'.$img_name_500_100;


	$img_path_500_100 = QUCREATIVE_THEME_DIR . 'placeholders/'.$img_name_500_100;


	$new_path_500_100 = $upload_dir_path . '/' . $img_name_500_100;

	try {

		if (!copy($img_path_500_100, $new_path_500_100)) {

		} else {
			$img_url_500_100 = $upload_dir_url . '/' . $img_name_500_100;
			$new_path_500_100 = $img_path_500_100;
		}
	} catch (Exception $e) {
		print_rr($e);
	}




	$attach_id_500_200 = qucreative_import_demo_create_attachment($img_url_500_100, '1', $new_path_500_100);




	$img_name = '500x500.jpg';
    $img_url = QUCREATIVE_THEME_URL . 'placeholders/500x500.jpg';


    $img_path = QUCREATIVE_THEME_DIR . 'placeholders/500x500.jpg';


    $new_path = $upload_dir_path . '/' . $img_name;




	try {

        if (!copy($img_path, $new_path)) {

        } else {
            $img_url = $upload_dir_url . '/' . $img_name;
            $new_path = $img_path;
        }
    } catch (Exception $e) {
        print_rr($e);
    }







	$attach_id = qucreative_import_demo_create_attachment($img_url, '1', $new_path);


	$qucreative_import_demo_last_attach_id = $attach_id;








	$the_slug = $demo_slug;
    $args = array(
        'name'        => $the_slug,
        'post_type'   => 'page',
        'post_status' => 'publish',
        'numberposts' => 1
    );
    $my_posts = get_posts($args);





    if ($my_posts) {

    } else {
















    }














    if ($debug) {
    } else {



    }





    $cont = '{"grid_cols":"5","items_arr":[{"w":"1","h":"1"},{"w":"2","h":"2"},{"w":"2","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"2","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"2","h":"1"},{"w":"2","h":"1"}],"loop":"on"}';





    $args = array(
        'post_title'    => wp_strip_all_tags( 'EXPANDABLE 5 COLS' ),
        'post_name'    => 'expandable-5cols-example',
        'post_content'  => $cont,
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_type'   => 'zfolio_grid',

    );


    $page_id = wp_insert_post( $args );






    $cont = '{"grid_cols":"4","items_arr":[{"w":"2","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"2","h":"2"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"}],"loop":"off"}';





    $args = array(
        'post_title'    => wp_strip_all_tags( 'EXPANDABLE 4 COLS' ),
        'post_name'    => 'expandable-4cols-example',
        'post_content'  => $cont,
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_type'   => 'zfolio_grid',

    );


    $page_id = wp_insert_post( $args );












    $cont = '{"grid_cols":"4","items_arr":[{"w":"2","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"2","h":"2"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"}],"loop":"off"}';





    $args = array(
        'post_title'    => wp_strip_all_tags( 'Fullscreen Stack 5Cols Example' ),
        'post_name'    => 'fullscreen-stack-5cols-example',
        'post_content'  => $cont,
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_type'   => 'zfolio_grid',

    );


    $page_id = wp_insert_post( $args );
















    $cont = '{"grid_cols":"4","items_arr":[{"w":"2","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"2","h":"2"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"2","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"2","h":"1"}],"loop":"on"}';





    $args = array(
        'post_title'    => wp_strip_all_tags( 'Fullscreen Stack 4Cols Example' ),
        'post_name'    => 'fullscreen-stack-4cols-example',
        'post_content'  => $cont,
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_type'   => 'zfolio_grid',

    );


    $page_id = wp_insert_post( $args );











    $cont = '{"grid_cols":"5","items_arr":[{"w":"1","h":"2"},{"w":"2","h":"2"},{"w":"2","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"2","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"}],"loop":"off"}';





    $args = array(
        'post_title'    => wp_strip_all_tags( 'Fullscreen Stack 5 Cols Example' ),
        'post_name'    => 'fullscreen-stack-5cols-example',
        'post_content'  => $cont,
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_type'   => 'zfolio_grid',

    );


    $page_id = wp_insert_post( $args );




















    $cont = '[antfarm_row extra_classes="style-cosco element-form-style-sharp for-contact" column_padding="10"][antfarm_row_part part="1.2"][antfarm_element input_type="input" input_label_name="Name..." input_name="name" is_required="on" type_element="input"][/antfarm_element][/antfarm_row_part][antfarm_row_part part="1.2"][antfarm_element input_type="input" input_label_name="Email..." input_name="email" is_required="on" type_element="input"][/antfarm_element][/antfarm_row_part][/antfarm_row][antfarm_row column_padding="10"][antfarm_row_part part="1.1"][antfarm_element input_type="input" input_label_name="Subject..." input_name="subject" type_element="input"][/antfarm_element][/antfarm_row_part][/antfarm_row][antfarm_row column_padding="default"][antfarm_row_part part="1.1"][antfarm_element input_type="textarea" input_label_name="Comment..." input_name="message" is_required="on" type_element="input"][/antfarm_element][/antfarm_row_part][/antfarm_row][antfarm_row column_padding="default"][antfarm_row_part part="1.1"][antfarm_element button_content="SEND MESSAGE" type_element="button"][/antfarm_element][/antfarm_row_part][/antfarm_row]';





    $args = array(
        'post_title'    => wp_strip_all_tags( 'Contact Layout' ),
        'post_name'    => 'contact-grid',
        'post_content'  => $cont,
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_type'   => 'antfarm_contact_form',

    );


    $contact_grid_id = wp_insert_post( $args );

















    $taxonomy = 'category';






    $term_be = qucreative_import_demo_create_term_if_it_does_not_exist(array(
        'description' => '',
        'term_name' => "Beautiful Things",
        'slug' => 'beautiful-things',
        'taxonomy' => $taxonomy,


    ));









    if(is_array($term_be)){

        $term_id = $term_be['term_id'];
    }else{

        if(isset($term_be->term_id)){

            $term_id = $term_be->term_id;
        }
    }












    $term_cu = qucreative_import_demo_create_term_if_it_does_not_exist(array(
        'description' => '',
        'term_name' => "Current Trends",
        'slug' => 'current-trends',
        'taxonomy' => $taxonomy,


    ));










    $term_cu = qucreative_import_demo_create_term_if_it_does_not_exist(array(
        'description' => '',
        'term_name' => "Current Trends",
        'slug' => 'current-trends',
        'taxonomy' => $taxonomy,


    ));










    $term_li = qucreative_import_demo_create_term_if_it_does_not_exist(array(
        'description' => '',
        'term_name' => "Lifestyle",
        'slug' => 'lifestyle',
        'taxonomy' => $taxonomy,


    ));






    $term_ph = qucreative_import_demo_create_term_if_it_does_not_exist(array(
        'description' => '',
        'term_name' => "Photography",
        'slug' => 'photography',
        'taxonomy' => $taxonomy,


    ));















    $args = array(

        'post_title' => 'Awesome, I can host my own videos too',
        'custom_title' => 'This is a cool featured image example',
        'qucreative_'.'meta_post_media_type' => 'vimeo',
        'qucreative_'.'meta_post_media' => 'https://vimeo.com/199855572',
        'post_content' => 'Etiam sodales blandit augue malesuada fermentum. Nam fringilla et ligula et facilisis. Vestibulum commodo nec lacus in pretium. Etiam ac bibendum purus, quis consectetur massa. Vivamus quis est ut enim sollicitudin blandit. Maecenas iaculis eget magna placerat pretium. Proin dictum mi vel lacus ultrices, ut placerat nulla tristique. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse potenti. Proin gravida justo ac sapien euismod aliquet.
<blockquote>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</blockquote>
Pellentesque eu nunc porta, elementum risus eu, lobortis nulla. Donec eget dui nec purus vehicula posuere. Ut mauris nibh, lobortis quis facilisis non, eleifend nec erat. Cras porta, dui a imperdiet suscipit, erat nulla rhoncus purus, sed faucibus nulla enim eu justo. Pellentesque sit amet turpis enim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque sed tincidunt eros, ut sodales lorem. Quisque rhoncus non nibh vel commodo. Sed tellus elit, semper a elementum sit amet, congue non sapien. Phasellus rhoncus bibendum vehicula. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque laoreet mi scelerisque, posuere odio at, condimentum lorem. Phasellus sollicitudin elit nec consequat vehicula. Suspendisse nec pellentesque tortor, et faucibus erat. Duis sem turpis, rutrum fringilla diam ac, pulvinar suscipit turpis.',
        'post_status' => 'publish',
        'post_type' => 'post',
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term_be,
        'taxonomy' => $taxonomy,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);





    $args = array(

        'post_title' => 'Hey, that is great, Vimeo is supported',
        'custom_title' => 'This is a cool featured image example',
        'qucreative_'.'meta_post_media_type' => 'vimeo',
        'qucreative_'.'meta_post_media' => 'https://vimeo.com/47955106',
        'post_content' => 'Donec consequat est pellentesque scelerisque mattis. Nam scelerisque justo sit amet elit feugiat commodo. Nulla auctor lacus in massa rhoncus, eget interdum mauris pharetra. Aenean facilisis justo in arcu tempor, et pretium ipsum aliquet. Cras ullamcorper aliquet neque non porttitor. Curabitur et dapibus purus. Proin fringilla mattis leo, id tempus justo commodo cursus. Aenean varius tristique mauris ut imperdiet. Cras sollicitudin quis magna in porta. Suspendisse at urna purus. Etiam nec nisl sollicitudin, elementum diam blandit, bibendum mauris. Phasellus neque nisl, imperdiet vitae aliquam sit amet, luctus in mauris. Aliquam iaculis elit non dolor hendrerit, sit amet mollis ante finibus. Nulla gravida enim felis, nec ultrices augue hendrerit sed. Vivamus sodales nec mauris et ultrices.

Maecenas metus libero, molestie id diam nec, placerat mollis enim. Aenean et dictum dolor. Sed vel urna lorem. Sed eu accumsan purus. Nunc luctus nibh in metus faucibus euismod. Aliquam lacinia dui ac ultricies eleifend. Cras justo lectus, imperdiet a mauris ut, ultrices porttitor magna. Donec pellentesque venenatis nunc nec elementum. Proin odio magna, pharetra sed porttitor sit amet, tincidunt et risus. Aenean a leo hendrerit, pellentesque mi id, tincidunt tellus. Etiam placerat magna ligula, non ornare nisi vestibulum quis. Ut at diam iaculis ante convallis tristique.',
        'post_status' => 'publish',
        'post_type' => 'post',
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term_li,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);



    $args = array(

        'post_title' => 'Well, everybody likes a video with cover',
        'custom_title' => 'This is a cool featured image example',
        'qucreative_'.'meta_post_media_type' => 'vimeo',
        'qucreative_'.'meta_post_media' => 'https://vimeo.com/62193160',
        'post_content' => 'Proin turpis felis, imperdiet a scelerisque sed, ornare sit amet nulla. Fusce lacinia lorem vitae massa finibus sollicitudin. Sed facilisis leo nec magna sodales, ut imperdiet sapien porta. Cras neque sapien, pharetra sit amet risus nec, hendrerit tempor eros. Fusce eleifend velit eget venenatis interdum. Integer dolor mauris, interdum ut turpis ac, imperdiet vulputate magna. Etiam laoreet ante id arcu pretium maximus. Ut nec vestibulum lacus, a malesuada mi. In pulvinar tristique pellentesque. Fusce vel erat sagittis ligula ultrices vestibulum eleifend et tellus. Vestibulum efficitur laoreet vulputate. Aliquam finibus malesuada nunc vel venenatis. Mauris in posuere erat.

Proin fringilla eget sapien lacinia tempus. Praesent eleifend risus id ipsum tempus euismod. Pellentesque eget leo non leo dignissim euismod in nec risus. Cras mattis sapien sit amet quam ultricies, id malesuada neque euismod. Sed vel gravida magna, non porta tortor. Proin vel nulla suscipit, ultrices felis quis, laoreet arcu. Nulla interdum purus fermentum nisi lacinia, eget placerat augue viverra. Sed egestas est at pulvinar ornare. Sed eleifend fermentum ex at posuere. Aliquam dignissim luctus lectus, eu euismod nunc ullamcorper eget. Sed pulvinar nunc tempor neque ullamcorper placerat. Nulla aliquet orci leo, non tempus urna viverra non. Sed aliquam metus vestibulum posuere sagittis.',
        'post_status' => 'publish',
        'post_type' => 'post',
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term_ph,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);



    $args = array(

        'post_title' => 'Hi, I am a YouTube video, nice to meet you',
        'custom_title' => 'This is a cool featured image example',
        'qucreative_'.'meta_post_media_type' => 'youtube',
        'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=9HC2o59SP6k',
        'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sodales nulla ligula, fringilla sollicitudin leo interdum sit amet. Vestibulum et est sed ipsum fringilla rhoncus. Aenean convallis nisi consectetur, pellentesque eros a, pellentesque turpis. Nunc tortor lectus, blandit elementum dui quis, elementum commodo justo. Pellentesque lacinia leo velit, sed consequat sapien lobortis dapibus. Curabitur volutpat orci arcu, fermentum pulvinar orci luctus eget. In hac habitasse platea dictumst. Duis orci ipsum, imperdiet eu ipsum et, egestas convallis augue.

Proin turpis felis, imperdiet a scelerisque sed, ornare sit amet nulla. Fusce lacinia lorem vitae massa finibus sollicitudin. Sed facilisis leo nec magna sodales, ut imperdiet sapien porta. Cras neque sapien, pharetra sit amet risus nec, hendrerit tempor eros. Fusce eleifend velit eget venenatis interdum. Integer dolor mauris, interdum ut turpis ac, imperdiet vulputate magna. Etiam laoreet ante id arcu pretium maximus. Ut nec vestibulum lacus, a malesuada mi. In pulvinar tristique pellentesque. Fusce vel erat sagittis ligula ultrices vestibulum eleifend et tellus. Vestibulum efficitur laoreet vulputate. Aliquam finibus malesuada nunc vel venenatis. Mauris in posuere erat.

Proin fringilla eget sapien lacinia tempus. Praesent eleifend risus id ipsum tempus euismod. Pellentesque eget leo non leo dignissim euismod in nec risus. Cras mattis sapien sit amet quam ultricies, id malesuada neque euismod. Sed vel gravida magna, non porta tortor. Proin vel nulla suscipit, ultrices felis quis, laoreet arcu. Nulla interdum purus fermentum nisi lacinia, eget placerat augue viverra. Sed egestas est at pulvinar ornare. Sed eleifend fermentum ex at posuere. Aliquam dignissim luctus lectus, eu euismod nunc ullamcorper eget. Sed pulvinar nunc tempor neque ullamcorper placerat. Nulla aliquet orci leo, non tempus urna viverra non. Sed aliquam metus vestibulum posuere sagittis.',
        'post_status' => 'publish',
        'post_type' => 'post',
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term_cu,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);



    $args = array(

        'post_title' => 'Ahoy there, this is a nice slideshow',
        'custom_title' => 'This is a cool featured image example',

        'post_content' => 'Praesent malesuada consectetur arcu, eget cursus nibh commodo eget. Phasellus id risus tincidunt, tempus arcu sed, facilisis est. Nulla arcu ex, ultrices eget lorem ac, rutrum lacinia quam. Pellentesque dignissim augue id tortor auctor, ut vulputate tortor rhoncus. Proin ullamcorper pulvinar pellentesque. Maecenas at est sit amet odio convallis laoreet eget a lorem. Integer tempor, ipsum id congue sagittis, quam ligula ullamcorper elit, at semper odio risus rutrum metus. In quis erat malesuada, pretium nisl ac, eleifend odio. Nam ligula felis, congue non dolor eu, mollis tincidunt orci. Nullam orci magna, commodo id arcu eu, iaculis bibendum ante. Mauris eget libero sed metus feugiat ornare. Suspendisse pulvinar erat sed nulla pellentesque mattis. Donec venenatis ultrices lorem nec blandit.

Quisque at dui nec nisi venenatis suscipit. Donec bibendum lacinia arcu non lobortis. Proin mollis maximus dui gravida consequat. Etiam maximus mollis facilisis. Vivamus placerat ut magna tempor convallis. Sed nec ligula metus. Pellentesque euismod purus eget lacus accumsan, ac condimentum neque volutpat. Sed nec blandit nibh. Quisque accumsan turpis a cursus tempor. Mauris vel consectetur purus. Vestibulum vehicula neque sed consequat consequat.

Donec mollis libero et ex molestie egestas. Interdum et malesuada fames ac ante ipsum primis in faucibus. Integer quis lacinia purus, sit amet rhoncus dolor. Donec nec nibh malesuada lorem dignissim lobortis non vel justo. Sed euismod ultricies odio, at fermentum quam dapibus sit amet. Proin maximus dui quis posuere finibus. Maecenas egestas imperdiet est, nec pharetra eros gravida sit amet. Nulla quam quam, fermentum et massa at, placerat molestie nisi.',
        'post_status' => 'publish',
        'post_type' => 'post',
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term_be,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);






    $args = array(

        'post_title' => 'This is a cool featured image example',
        'custom_title' => 'This is a cool featured image example',

        'post_content' => 'Praesent malesuada consectetur arcu, eget cursus nibh commodo eget. Phasellus id risus tincidunt, tempus arcu sed, facilisis est. Nulla arcu ex, ultrices eget lorem ac, rutrum lacinia quam. Pellentesque dignissim augue id tortor auctor, ut vulputate tortor rhoncus. Proin ullamcorper pulvinar pellentesque. Maecenas at est sit amet odio convallis laoreet eget a lorem. Integer tempor, ipsum id congue sagittis, quam ligula ullamcorper elit, at semper odio risus rutrum metus. In quis erat malesuada, pretium nisl ac, eleifend odio. Nam ligula felis, congue non dolor eu, mollis tincidunt orci. Nullam orci magna, commodo id arcu eu, iaculis bibendum ante. Mauris eget libero sed metus feugiat ornare. Suspendisse pulvinar erat sed nulla pellentesque mattis. Donec venenatis ultrices lorem nec blandit.

Quisque at dui nec nisi venenatis suscipit. Donec bibendum lacinia arcu non lobortis. Proin mollis maximus dui gravida consequat. Etiam maximus mollis facilisis. Vivamus placerat ut magna tempor convallis. Sed nec ligula metus. Pellentesque euismod purus eget lacus accumsan, ac condimentum neque volutpat. Sed nec blandit nibh. Quisque accumsan turpis a cursus tempor. Mauris vel consectetur purus. Vestibulum vehicula neque sed consequat consequat.

Donec mollis libero et ex molestie egestas. Interdum et malesuada fames ac ante ipsum primis in faucibus. Integer quis lacinia purus, sit amet rhoncus dolor. Donec nec nibh malesuada lorem dignissim lobortis non vel justo. Sed euismod ultricies odio, at fermentum quam dapibus sit amet. Proin maximus dui quis posuere finibus. Maecenas egestas imperdiet est, nec pharetra eros gravida sit amet. Nulla quam quam, fermentum et massa at, placerat molestie nisi.',
        'post_status' => 'publish',
        'post_type' => 'post',
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term_li,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);






    $args = array(

        'post_title' => 'A nice Vimeo video of a car',
        'custom_title' => 'This is a cool featured image example',
        'qucreative_'.'meta_post_media_type' => 'vimeo',
        'qucreative_'.'meta_post_media' => 'https://vimeo.com/199855572',
        'post_content' => 'Etiam sodales blandit augue malesuada fermentum. Nam fringilla et ligula et facilisis. Vestibulum commodo nec lacus in pretium. Etiam ac bibendum purus, quis consectetur massa. Vivamus quis est ut enim sollicitudin blandit. Maecenas iaculis eget magna placerat pretium. Proin dictum mi vel lacus ultrices, ut placerat nulla tristique. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse potenti. Proin gravida justo ac sapien euismod aliquet.
<blockquote>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</blockquote>
Pellentesque eu nunc porta, elementum risus eu, lobortis nulla. Donec eget dui nec purus vehicula posuere. Ut mauris nibh, lobortis quis facilisis non, eleifend nec erat. Cras porta, dui a imperdiet suscipit, erat nulla rhoncus purus, sed faucibus nulla enim eu justo. Pellentesque sit amet turpis enim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque sed tincidunt eros, ut sodales lorem. Quisque rhoncus non nibh vel commodo. Sed tellus elit, semper a elementum sit amet, congue non sapien. Phasellus rhoncus bibendum vehicula. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque laoreet mi scelerisque, posuere odio at, condimentum lorem. Phasellus sollicitudin elit nec consequat vehicula. Suspendisse nec pellentesque tortor, et faucibus erat. Duis sem turpis, rutrum fringilla diam ac, pulvinar suscipit turpis.',
        'post_status' => 'publish',
        'post_type' => 'post',
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term_be,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);






    $args = array(

        'post_title' => 'A very good example of a slider',
        'custom_title' => 'This is a cool featured image example',
        'qucreative_'.'meta_post_media_type' => 'slider',
        'qucreative_'.'meta_post_media' => $qucreative_import_demo_last_attach_id.','.$qucreative_import_demo_last_attach_id,
        'qucreative_'.'meta_image_gallery_in_meta' => $qucreative_import_demo_last_attach_id.','.$qucreative_import_demo_last_attach_id,
        'post_content' => 'Etiam sodales blandit augue malesuada fermentum. Nam fringilla et ligula et facilisis. Vestibulum commodo nec lacus in pretium. Etiam ac bibendum purus, quis consectetur massa. Vivamus quis est ut enim sollicitudin blandit. Maecenas iaculis eget magna placerat pretium. Proin dictum mi vel lacus ultrices, ut placerat nulla tristique. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse potenti. Proin gravida justo ac sapien euismod aliquet.
<blockquote>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</blockquote>
Pellentesque eu nunc porta, elementum risus eu, lobortis nulla. Donec eget dui nec purus vehicula posuere. Ut mauris nibh, lobortis quis facilisis non, eleifend nec erat. Cras porta, dui a imperdiet suscipit, erat nulla rhoncus purus, sed faucibus nulla enim eu justo. Pellentesque sit amet turpis enim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque sed tincidunt eros, ut sodales lorem. Quisque rhoncus non nibh vel commodo. Sed tellus elit, semper a elementum sit amet, congue non sapien. Phasellus rhoncus bibendum vehicula. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque laoreet mi scelerisque, posuere odio at, condimentum lorem. Phasellus sollicitudin elit nec consequat vehicula. Suspendisse nec pellentesque tortor, et faucibus erat. Duis sem turpis, rutrum fringilla diam ac, pulvinar suscipit turpis.',
        'post_status' => 'publish',
        'post_type' => 'post',
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term_be,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);









    $args = array(

        'post_title' => 'Qu can showcase any type of media',
        'custom_title' => 'This is a cool featured image example',

        'post_content' => 'Etiam sodales blandit augue malesuada fermentum. Nam fringilla et ligula et facilisis. Vestibulum commodo nec lacus in pretium. Etiam ac bibendum purus, quis consectetur massa. Vivamus quis est ut enim sollicitudin blandit. Maecenas iaculis eget magna placerat pretium. Proin dictum mi vel lacus ultrices, ut placerat nulla tristique. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse potenti. Proin gravida justo ac sapien euismod aliquet.
<blockquote>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</blockquote>
Pellentesque eu nunc porta, elementum risus eu, lobortis nulla. Donec eget dui nec purus vehicula posuere. Ut mauris nibh, lobortis quis facilisis non, eleifend nec erat. Cras porta, dui a imperdiet suscipit, erat nulla rhoncus purus, sed faucibus nulla enim eu justo. Pellentesque sit amet turpis enim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque sed tincidunt eros, ut sodales lorem. Quisque rhoncus non nibh vel commodo. Sed tellus elit, semper a elementum sit amet, congue non sapien. Phasellus rhoncus bibendum vehicula. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque laoreet mi scelerisque, posuere odio at, condimentum lorem. Phasellus sollicitudin elit nec consequat vehicula. Suspendisse nec pellentesque tortor, et faucibus erat. Duis sem turpis, rutrum fringilla diam ac, pulvinar suscipit turpis.',
        'post_status' => 'publish',
        'post_type' => 'post',
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term_be,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);

























    $taxonomy = 'antfarm_port_items_cat';




    $term = qucreative_import_demo_create_term_if_it_does_not_exist(array(
        'description' => '',
        'term_name' => "PORTFOLIO CLASSIC",
        'slug' => 'portfolio-classic',
        'taxonomy' => $taxonomy,
        

    ));






    if(is_array($term)){

        $term_id = $term['term_id'];
    }else{

        $term_id = $term->term_id;
    }








    $term_fu = qucreative_import_demo_create_term_if_it_does_not_exist(array(
        'description' => '',
        'term_name' => "Fullscreen",
        'slug' => 'pcm-fullscreen',
        'taxonomy' => $taxonomy,
        'parent'=> $term_id,

    ));



    $term_im = qucreative_import_demo_create_term_if_it_does_not_exist(array(
        'description' => '',
        'term_name' => "Images",
        'slug' => 'pcm-images',
        'taxonomy' => $taxonomy,
        'parent'=> $term_id,

    ));




    $term_mi = qucreative_import_demo_create_term_if_it_does_not_exist(array(
        'description' => '',
        'term_name' => "Mixed",
        'slug' => 'pcm-mixed',
        'taxonomy' => $taxonomy,
        'parent'=> $term_id,

    ));






    $term_sl = qucreative_import_demo_create_term_if_it_does_not_exist(array(
        'description' => '',
        'term_name' => "Slider",
        'slug' => 'pcm-slider',
        'taxonomy' => $taxonomy,
        'parent'=> $term_id,

    ));





    $term_vi = qucreative_import_demo_create_term_if_it_does_not_exist(array(
        'description' => '',
        'term_name' => "Videos",
        'slug' => 'pcm-videos',
        'taxonomy' => $taxonomy,
        'parent'=> $term_id,

    ));














    $args = array(

        'post_title' => 'THE ACTRESS',
        'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'slider',

        'qucreative_'.'meta_image_gallery_in_meta' => $attach_id.','.$attach_id,
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term_sl,
        'taxonomy' => $taxonomy,
    );


    $port_id = qucreative_import_demo_insert_post_complete($args);




    $args = array(

        'post_title' => 'HIP HOP WORLD',
        'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'vimeo',
        'qucreative_'.'meta_post_media' => 'https://vimeo.com/60588549',
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term_vi,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'PATRICIA SMITH',
        'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'slider',

        'qucreative_'.'meta_image_gallery_in_meta' => $attach_id.','.$attach_id,
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term_sl,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'THE BEATS',
        'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'youtube',
        'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=6Qlz_Y4R4ok',
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term_fu,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'SERIOUS MEN',
        'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'image',
        'qucreative_'.'meta_post_media' => $img_url,
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term_mi,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'JACK\'S COFFEE SHOP',
        'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_post_media_type' => 'image',
        'qucreative_'.'meta_post_media' => $img_url,
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term_im,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'JASON THE JEWELER',
        'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'image',
        'qucreative_'.'meta_post_media' => $img_url,
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term_im,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'VERONICA SWIFT',
        'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'youtube',
        'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=6Qlz_Y4R4ok',
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'CITY OF LIGHTS',
        'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'youtube',
        'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=QNZOOSxfQn8',
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'BLUE EROTICA',
        'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'youtube',
        'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=6Qlz_Y4R4ok',
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term_vi,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'JUNGLE BOOK',
        'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'youtube',
        'qucreative_'.'meta_video_cover_image' => $img_url,
        'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=6Qlz_Y4R4ok',
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'DNG MOTORS',
        'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'vimeo',
        'qucreative_'.'meta_post_media' => 'https://vimeo.com/22884674',
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term_vi,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'MY SMARTPHONE',
        'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'image',
        'qucreative_'.'meta_post_media' => $img_url,
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term_im,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'DJ BRONX',
        'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'slider',

        'qucreative_'.'meta_image_gallery_in_meta' => $qucreative_import_demo_last_attach_id.','.$qucreative_import_demo_last_attach_id,
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term_sl,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);







































































	$term = qucreative_import_demo_create_term_if_it_does_not_exist(array(
		'description' => '',
		'term_name' => 'PORTFOLIO FULLSCREEN',
		'slug' => 'portfolio-fullscreen',
		'taxonomy' => $taxonomy,

	));


    if(is_array($term)){

        $term_id = $term['term_id'];
    }else{

        $term_id = $term->term_id;
    }








	$term_im = qucreative_import_demo_create_term_if_it_does_not_exist(array(
		'description' => '',
		'term_name' => 'Images',
		'slug' => 'pf-images',
		'taxonomy' => $taxonomy,
		'parent'=> $term_id,

	));







	$term_mi = qucreative_import_demo_create_term_if_it_does_not_exist(array(
		'description' => '',
		'term_name' => 'Mixed',
		'slug' => 'pf-mixed',
		'taxonomy' => $taxonomy,
		'parent'=> $term_id,

	));





	$term_sl = qucreative_import_demo_create_term_if_it_does_not_exist(array(
		'description' => '',
		'term_name' => 'Slider',
		'slug' => 'pf-slider',
		'taxonomy' => $taxonomy,
		'parent'=> $term_id,

	));













	$args = array(

        'post_title' => 'THE ACTRESS',
        'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'slider',

        'qucreative_'.'meta_image_gallery_in_meta' => $attach_id.','.$attach_id,
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term_sl,
        'taxonomy' => $taxonomy,
    );


    $port_id = qucreative_import_demo_insert_post_complete($args);




    $args = array(

        'post_title' => 'HIP HOP WORLD',
        'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'vimeo',
        'qucreative_'.'meta_post_media' => 'https://vimeo.com/60588549',
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term_vi,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'PATRICIA SMITH',
        'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'slider',

        'qucreative_'.'meta_image_gallery_in_meta' => $attach_id.','.$attach_id,
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term_sl,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'THE BEATS',
        'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'youtube',
        'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=6Qlz_Y4R4ok',
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'SERIOUS MEN',
        'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'image',
        'qucreative_'.'meta_post_media' => $img_url,
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term_mi,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'JACK\'S COFFEE SHOP',
        'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_post_media_type' => 'image',
        'qucreative_'.'meta_post_media' => $img_url,
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term_im,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'JASON THE JEWELER',
        'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'image',
        'qucreative_'.'meta_post_media' => $img_url,
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term_im,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'VERONICA SWIFT',
        'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'youtube',
        'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=6Qlz_Y4R4ok',
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'CITY OF LIGHTS',
        'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'youtube',
        'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=QNZOOSxfQn8',
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'BLUE EROTICA',
        'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'youtube',
        'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=6Qlz_Y4R4ok',
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term_vi,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'JUNGLE BOOK',
        'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'youtube',
        'qucreative_'.'meta_video_cover_image' => $img_url,
        'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=6Qlz_Y4R4ok',
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'DNG MOTORS',
        'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'vimeo',
        'qucreative_'.'meta_post_media' => 'https://vimeo.com/22884674',
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term_vi,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'MY SMARTPHONE',
        'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'image',
        'qucreative_'.'meta_post_media' => $img_url,
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term_im,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'DJ BRONX',
        'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'slider',

        'qucreative_'.'meta_image_gallery_in_meta' => $attach_id.','.$attach_id,
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term_sl,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);



























    $demo_slug = 'portfolio-fullscreen';






    $cont = '[vc_row][vc_column][antfarm_portfolio skin="skin-silver" zfolio-mode="mode-normal" link_whole_item="zoombox_item" gap="1px" cat="'.$demo_slug.'" mode="" layout="'.'fullscreen-stack-4cols-example'.'"][/vc_column][/vc_row]';





    $args = array(
        'post_title'    => wp_strip_all_tags( 'PORTFOLIO STACK EXAMPLE 1' ),
        'post_content'  => $cont,
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_type'   => 'page',

    );


    $page_id = wp_insert_post( $args );
    $page_id_pf = wp_insert_post( $args );





    update_post_meta( $page_id, '_wp_page_template', 'template-portfolio.php' );;
    update_post_meta(  $page_id ,'qucreative_'.'meta_custom_section_margin_bottom','0');
    update_post_meta(  $page_id ,'qucreative_'.'meta_content_starts_at','pixel-position');
    update_post_meta(  $page_id ,'qucreative_'.'meta_content_starts_at_pixel','0');
    update_post_meta(  $page_id ,'qucreative_'.'meta_disable_footer','on');
    update_post_meta(  $page_id ,'qucreative_'.'meta_overlay_opacity','85');
    update_post_meta(  $page_id ,'qucreative_'.'meta_overlay_color','#000000');

    update_post_meta(  $page_id ,'qucreative_'.'meta_is_fullscreen','on');


    update_post_meta(  $page_id ,'qucreative_'.'meta_bg_image',$img_url);










    $cont = '[vc_row][vc_column][antfarm_portfolio skin="skin-silver" zfolio-mode="mode-normal" link_whole_item="zoombox_item" gap="1px" cat="'.$demo_slug.'" mode="" layout="'.'fullscreen-stack-5cols-example'.'"][/vc_column][/vc_row]';





    $args = array(
        'post_title'    => wp_strip_all_tags( 'PORTFOLIO STACK' ),
        'post_content'  => $cont,
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_type'   => 'page',

    );


    $page_id = wp_insert_post( $args );
    $page_id_pf = wp_insert_post( $args );





    update_post_meta( $page_id_pf, '_wp_page_template', 'template-portfolio.php' );;
    update_post_meta(  $page_id_pf ,'qucreative_'.'meta_custom_section_margin_bottom','0');
    update_post_meta(  $page_id_pf ,'qucreative_'.'meta_content_starts_at','pixel-position');
    update_post_meta(  $page_id_pf ,'qucreative_'.'meta_content_starts_at_pixel','0');
    update_post_meta(  $page_id_pf ,'qucreative_'.'meta_disable_footer','on');
    update_post_meta(  $page_id_pf ,'qucreative_'.'meta_overlay_opacity','85');
    update_post_meta(  $page_id_pf ,'qucreative_'.'meta_overlay_color','#000000');

    update_post_meta(  $page_id_pf ,'qucreative_'.'meta_is_fullscreen','on');
    update_post_meta(  $page_id_pf ,'qucreative_'.'meta_portfolio_bounds','1px');


    update_post_meta(  $page_id_pf ,'qucreative_'.'meta_bg_image',$img_url);














    $demo_slug = 'portfolio-classic';


    $cont = '[vc_row][vc_column][antfarm_portfolio skin="skin-melbourne" zfolio-mode="mode-normal" link_whole_item="portfolio_item" gap="2px" pagination_method="off" cat="'.$demo_slug.'" mode="" layout="dzs-layout--4-cols"][/vc_column][/vc_row]';





    $args = array(
        'post_title'    => wp_strip_all_tags( 'PORTFOLIO CLASSIC' ),
        'post_content'  => $cont,
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_type'   => 'page',

    );


    $page_id = wp_insert_post( $args );


    $page_id_pc = $page_id;



    update_post_meta( $page_id, '_wp_page_template', 'template-portfolio.php' );;
    update_post_meta(  $page_id ,'qucreative_'.'meta_custom_section_margin_bottom','0');
    update_post_meta(  $page_id ,'qucreative_'.'meta_content_starts_at','pixel-position');
    update_post_meta(  $page_id ,'qucreative_'.'meta_content_starts_at_pixel','0');
    update_post_meta(  $page_id ,'qucreative_'.'meta_disable_footer','on');



    update_post_meta(  $page_id ,'qucreative_'.'meta_is_fullscreen','on');

    update_post_meta(  $page_id ,'qucreative_'.'meta_custom_title',' ');
    update_post_meta(  $page_id ,'qucreative_'.'meta_bg_image',$img_url);




















    $demo_name = 'Portfolio Expandable';
    $demo_slug = 'portfolio-expandable';






	$term = qucreative_import_demo_create_term_if_it_does_not_exist(array(
		'description' => '',
		'term_name' => 'PORTFOLIO EXPANDABLE',
		'slug' => 'portfolio-expandable',
		'taxonomy' => $taxonomy,

	));


	if(is_array($term)){

		$term_id = $term['term_id'];
	}else{

		$term_id = $term->term_id;
	}

	// -- portfolio expandable






    $args = array(

        'post_title' => 'FAST AND BEAUTIFUL',
        'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'slider',
        'qucreative_'.'meta_post_media' => $attach_id.','.$attach_id,
        'qucreative_'.'meta_image_gallery_in_meta' => $attach_id.','.$attach_id,
        'qucreative_'.'meta_post_media_type' => 'vimeo',
        'qucreative_'.'meta_post_media' => 'https://vimeo.com/60588549',
        'qucreative_'.'meta_post_layout_for_excerpt' => 'small',

        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
    );


    $port_id = qucreative_import_demo_insert_post_complete($args);




    $args = array(

        'post_title' => 'SAFARI ADVENTURE',
        'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'vimeo',
        'qucreative_'.'meta_post_media' => 'https://vimeo.com/60588549',
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'UNDERWATER',
        'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco..',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'slider',

        'qucreative_'.'meta_image_gallery_in_meta' => $qucreative_import_demo_last_attach_id.','.$qucreative_import_demo_last_attach_id,
        'qucreative_'.'meta_post_layout_for_excerpt' => 'small',
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'EROTICA BLUE',
        'post_content' => 'Pellentesque luctus semper eros, eu pellentesque arcu ornare ac. Nam gravida accumsan mi, sit amet egestas magna ullamcorper ut. Mauris consequat mollis erat, ut commodo ipsum faucibus ut. Donec quis bibendum ante. Maecenas nec urna sem. Nunc non eleifend augue. Fusce nec massa pharetra, luctus risus at, vulputate nulla. Integer consequat arcu accumsan massa maximus feugiat. Etiam sapien tellus, dignissim et egestas in, pellentesque vitae lacus. Ut ante nibh, efficitur a eros non, porta pretium augue. Aenean at dictum dolor. Aliquam consectetur posuere ante non volutpat. In porttitor tincidunt cursus. Duis blandit suscipit mauris quis varius. Mauris tristique lorem id ornare cursus. Nunc eget dignissim lectus. Cras dignissim tincidunt volutpat. Maecenas volutpat pellentesque vestibulum. Vivamus accumsan viverra nunc, et rhoncus diam vulputate ut.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'youtube',
        'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=6Qlz_Y4R4ok',
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'I AM STRONG',
        'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'image',
        'qucreative_'.'meta_post_media' => $img_url,
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'ADRENALINE RUSH',
        'post_content' => '[vc_row][vc_column width="1/2"][vc_column_text]Lorem ipsum dolor sit amet mauris, consectetur adipiscing elit. Maecenas ex mauris, scelerisque sed justo ut, fermentum ultricies ante. Aliquam ultrices purus quis lacinia vulputate. Nullam volutpat lectus et justo iaculis, a convallis diam eleifend cremittas. Pellentesque vulputate magna ac quam laoreet, ornare venenatis erat vulputate. Suspendisse nec libero nec sem hendrerit faucibus eget a elit. Cras et suscipit justo, ut suscipit ante. Aenean leo urna, vestibulum non odio nec, mollis aliquam orci.[/vc_column_text][/vc_column][vc_column width="1/2"][vc_column_text]Nunc aliquet purus lorem, at lacinia elit auctor et. Proin laoreet mest sollicitudin condimentum. Curabitur id ultricies odio. Etiam ut dapibus metus. Morbi suscipit justo eget metus fermentum, quis porta lorem imperdiet. Quisque facilisis vitae ipsum eu lobortis. Fusce in nulla ac urna iaculis iaculis dignissim eu tellus. Fusce tellus leo, facilisis sit amet cursus eget, rutrum eu arcu. Aenean tristique orci elit, suscipit pulvinar risus mattis vel. Vivamus accumsan viverra nunc, et rhoncus maxim.[/vc_column_text][/vc_column][/vc_row]',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_post_media_type' => 'image',
        'qucreative_'.'meta_post_media' => $img_url,
        'qucreative_'.'meta_post_media_type' => 'youtube',
        'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=6Qlz_Y4R4ok',
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'THE HORSE RIDER',
        'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'image',
        'qucreative_'.'meta_post_layout_for_excerpt' => 'small',
        'qucreative_'.'meta_post_media' => $img_url,
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'THE HAPPY SHOP',
        'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'youtube',
        'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=6Qlz_Y4R4ok',
        'qucreative_'.'meta_post_media_type' => 'image',

        'qucreative_'.'meta_post_media' => $img_url,
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'COOLEST CITY',
        'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'youtube',
        'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=QNZOOSxfQn8',
        'qucreative_'.'meta_post_media_type' => 'vimeo',
        'qucreative_'.'meta_post_media' => 'https://vimeo.com/60588549',
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'BLUE EROTICA',
        'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'youtube',
        'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=6Qlz_Y4R4ok',
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'CLASSIC CARS',
        'post_content' => '[vc_row][vc_column width="1/2"][vc_column_text]Lorem ipsum dolor sit amet mauris, consectetur adipiscing elit. Maecenas ex mauris, scelerisque sed justo ut, fermentum ultricies ante. Aliquam ultrices purus quis lacinia vulputate. Nullam volutpat lectus et justo iaculis, a convallis diam eleifend cremittas. Pellentesque vulputate magna ac quam laoreet, ornare venenatis erat vulputate. Suspendisse nec libero nec sem hendrerit faucibus eget a elit.[/vc_column_text][/vc_column][vc_column width="1/2"][vc_column_text]Nunc aliquet purus lorem, at lacinia elit auctor et. Proin laoreet mest sollicitudin condimentum. Curabitur id ultricies odio. Etiam ut dapibus metus. Morbi suscipit justo eget metus fermentum, quis porta lorem imperdiet. Quisque facilisis vitae ipsum eu lobortis. Fusce in nulla ac urna iaculis iaculis dignissim eu tellus. Fusce tellus leo, facilisis sit amet cursus eget, rutrum eu arcu.[/vc_column_text][/vc_column][/vc_row]',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'youtube',

        'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=6Qlz_Y4R4ok',
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'FROM ABOVE',
        'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'slider',

        'qucreative_'.'meta_image_gallery_in_meta' => $qucreative_import_demo_last_attach_id.','.$qucreative_import_demo_last_attach_id,

        'qucreative_'.'meta_post_media' => $img_url,
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'WILLIAMS WEAR',
        'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean dignissim tortor eget lorem imperdiet auctor. Curabitur in rhoncus risus, quis ornare dolor. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque varius sit amet neque in sagittis. Nulla facilisi. Sed et diam at arcu laoreet sodales. Ut nec pharetra lacus. Cras et suscipit justo, ut suscipit ante. Aenean leo urna, vestibulum non odio nec, mollis aliquam orci.

Pellentesque non auctor quam. Aenean tristique orci elit, suscipit pulvinar risus mattis vel. Proin ullamcorper condimentum tristique. Aenean nulla nisl, tincidunt non posuere mollis, scelerisque eu velit. Suspendisse eget lectus sagittis, volutpat est vel, hendrerit arcu. Aliquam vitae sagittis velit. Nunc porttitor velit at pellentesque tincidunt. Phasellus eu finibus leo. Praesent congue arcu vitae orci ullamcorper, in auctor lacus placerat.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'image',
        'qucreative_'.'meta_post_media' => $img_url,
        'qucreative_'.'meta_post_media_type' => 'slider',

        'qucreative_'.'meta_image_gallery_in_meta' => $qucreative_import_demo_last_attach_id.','.$qucreative_import_demo_last_attach_id,
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);





















    $cont = '{"grid_cols":"4","items_arr":[{"w":"2","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"2","h":"2"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"},{"w":"1","h":"1"}],"loop":"off"}';





    $args = array(
        'post_title'    => wp_strip_all_tags( "PORTFOLIO EXPANDABLE" ),
        'post_name'    => 'portfolio-expandable',
        'post_content'  => $cont,
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_type'   => 'zfolio_grid',

    );


    $page_id = wp_insert_post( $args );






















    $cont = '[vc_row][vc_column][antfarm_portfolio skin="skin-qucreative zfolio-portfolio-expandable" link_whole_item="item_excerpt" gap="0" cat="'.$demo_slug.'" extra_classes=" add-loaded-on-images-animation" mode="" layout="'.$demo_slug.'"][/vc_column][/vc_row]';





    $args = array(
        'post_title'    => wp_strip_all_tags( 'PORTFOLIO EXPANDABLE' ),
        'post_name'    => $demo_slug,
        'post_content'  => $cont,
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_type'   => 'page',

    );


    $page_id = wp_insert_post( $args );

    $page_id_expandable = $page_id;




    update_post_meta( $page_id, '_wp_page_template', 'template-portfolio.php' );;
    update_post_meta(  $page_id ,'qucreative_'.'meta_custom_section_margin_bottom','0');
    update_post_meta(  $page_id ,'qucreative_'.'meta_content_starts_at','pixel-position');
    update_post_meta(  $page_id ,'qucreative_'.'meta_content_starts_at_pixel','0');
    update_post_meta(  $page_id ,'qucreative_'.'meta_disable_footer','on');



    update_post_meta(  $page_id ,'qucreative_'.'meta_is_fullscreen','on');

    update_post_meta(  $page_id ,'qucreative_'.'meta_custom_title',' ');
    update_post_meta(  $page_id ,'qucreative_'.'meta_bg_image',$img_url);



















































    $demo_name = 'GALLERY MASONRY';
    $demo_slug = 'gallery-masonry';



	$term = qucreative_import_demo_create_term_if_it_does_not_exist(array(
		'description' => '',
		'term_name' => $demo_name,
		'slug' => $demo_slug,
		'taxonomy' => $taxonomy,

	));



	if(is_array($term)){

		$term_id = $term['term_id'];
	}else{

		$term_id = $term->term_id;
	}







    $args = array(

        'post_title' => 'ADMIRATION',
        'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'slider',

        'qucreative_'.'meta_image_gallery_in_meta' => $qucreative_import_demo_last_attach_id.','.$qucreative_import_demo_last_attach_id,
        'qucreative_'.'meta_post_media_type' => 'vimeo',
        'qucreative_'.'meta_post_media' => 'https://vimeo.com/60588549',
        'qucreative_'.'meta_post_layout_for_excerpt' => 'small',
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
    );


    $port_id = qucreative_import_demo_insert_post_complete($args);




    $args = array(

        'post_title' => 'THE DREAM',
        'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'vimeo',
        'qucreative_'.'meta_post_media' => 'https://vimeo.com/60588549',
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'UNDERWATER',
        'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco..',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'image',
        'qucreative_'.'meta_post_media' => $qucreative_import_demo_last_attach_id,
        'qucreative_'.'meta_post_layout_for_excerpt' => 'small',
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'WAITING',
        'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'youtube',
        'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=6Qlz_Y4R4ok',
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'SMOKING HOT',
        'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'image',
        'qucreative_'.'meta_post_media' => $img_url,
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'HAPPY CHAIR',
        'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_post_media_type' => 'image',
        'qucreative_'.'meta_post_media' => $img_url,
        'qucreative_'.'meta_post_media_type' => 'youtube',
        'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=6Qlz_Y4R4ok',
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'WILD SIDE',
        'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'image',
        'qucreative_'.'meta_post_layout_for_excerpt' => 'small',
        'qucreative_'.'meta_post_media' => $img_url,
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'POSING NICELY',
        'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'youtube',
        'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=6Qlz_Y4R4ok',
        'qucreative_'.'meta_post_media_type' => 'image',

        'qucreative_'.'meta_post_media' => $img_url,
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'MORNING',
        'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'youtube',
        'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=QNZOOSxfQn8',
        'qucreative_'.'meta_post_media_type' => 'vimeo',
        'qucreative_'.'meta_post_media' => 'https://vimeo.com/60588549',
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'BLUE EROTICA',
        'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'youtube',
        'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=6Qlz_Y4R4ok',
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'THE ELEGANCE',
        'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'youtube',

        'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=6Qlz_Y4R4ok',
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'THINKING',
        'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'image',


        'qucreative_'.'meta_post_media' => $img_url,
        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'I WANT',
        'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'image',
        'qucreative_'.'meta_post_media' => $img_url,

        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'THE TRAVELER',
        'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'image',
        'qucreative_'.'meta_post_media' => $img_url,

        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'TOUGH GUY',
        'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'image',
        'qucreative_'.'meta_post_media' => $img_url,

        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'OMG',
        'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'image',
        'qucreative_'.'meta_post_media' => $img_url,

        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'I FEEL LOVE',
        'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'image',
        'qucreative_'.'meta_post_media' => $img_url,

        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'HIDING IN LA',
        'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'image',
        'qucreative_'.'meta_post_media' => $img_url,

        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'LONG LEGS',
        'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'image',
        'qucreative_'.'meta_post_media' => $img_url,

        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'DA BIZZ',
        'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'image',
        'qucreative_'.'meta_post_media' => $img_url,

        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'EROTICA',
        'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'image',
        'qucreative_'.'meta_post_media' => $img_url,

        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'I WANT',
        'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'image',
        'qucreative_'.'meta_post_media' => $img_url,

        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'SAMANTHA',
        'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'image',
        'qucreative_'.'meta_post_media' => $img_url,

        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'I WANT',
        'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'image',
        'qucreative_'.'meta_post_media' => $img_url,

        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'IT IS FASHION',
        'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'image',
        'qucreative_'.'meta_post_media' => $img_url,

        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'I WANT',
        'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'image',
        'qucreative_'.'meta_post_media' => $img_url,

        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'COOL ENOUGH',
        'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'image',
        'qucreative_'.'meta_post_media' => $img_url,

        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'THIS IS ME',
        'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'image',
        'qucreative_'.'meta_post_media' => $img_url,

        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'ON THE ROAD',
        'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'image',
        'qucreative_'.'meta_post_media' => $img_url,

        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'THE JEWEL',
        'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'image',
        'qucreative_'.'meta_post_media' => $img_url,

        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'MOVIE STARS',
        'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'image',
        'qucreative_'.'meta_post_media' => $img_url,

        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'LOCAL IMAGE',
        'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'image',
        'qucreative_'.'meta_post_media' => $img_url,

        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'NIGHT IN PARIS',
        'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'image',
        'qucreative_'.'meta_post_media' => $img_url,

        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'HAPPY GIRLS',
        'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'image',
        'qucreative_'.'meta_post_media' => $img_url,

        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);






    $args = array(

        'post_title' => 'NICE ONE',
        'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'image',
        'qucreative_'.'meta_post_media' => $img_url,

        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);






    $args = array(

        'post_title' => 'WHY NOT',
        'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'image',
        'qucreative_'.'meta_post_media' => $img_url,

        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);






    $args = array(

        'post_title' => 'WESTERN',
        'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat mauris.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'image',
        'qucreative_'.'meta_post_media' => $img_url,

        'img_url' => $img_url,
        'img_path'=>$new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $qucreative_import_demo_last_attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);











    $cont = '[vc_row][vc_column][antfarm_portfolio skin="skin-gazelia skin-gazelia--transparent" zfolio-mode="mode-normal" link_whole_item="zoombox" gap="1px" cat="gallery-masonry" extra_classes=" add-loaded-on-images-animation" mode="" layout="dzs-layout--4-cols"][/vc_column][/vc_row]';





    $args = array(
        'post_title'    => wp_strip_all_tags( ''."GALLERY MASONRY" ),
        'post_content'  => $cont,
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_type'   => 'page',

    );


    $page_id = wp_insert_post( $args );

    $page_id_masonry = $page_id;




    update_post_meta( $page_id, '_wp_page_template', 'template-portfolio.php' );;
    update_post_meta(  $page_id ,'qucreative_'.'meta_custom_section_margin_bottom','0');
    update_post_meta(  $page_id ,'qucreative_'.'meta_content_starts_at','pixel-position');
    update_post_meta(  $page_id ,'qucreative_'.'meta_content_starts_at_pixel','0');
    update_post_meta(  $page_id ,'qucreative_'.'meta_disable_footer','on');



    update_post_meta(  $page_id ,'qucreative_'.'meta_is_fullscreen','on');

    update_post_meta(  $page_id ,'qucreative_'.'meta_custom_title',' ');
    update_post_meta(  $page_id ,'qucreative_'.'meta_bg_image',$img_url);















    $demo_name = 'Lights Out Gallery';
    $demo_slug = 'lights-out';
    $page_id_gc = 1;



    $the_slug = $demo_slug;
    $args = array(
        'name'        => $the_slug,
        'post_type'   => 'page',
        'post_status' => 'publish',
        'numberposts' => 1
    );
    $my_posts = get_posts($args);





















        $cont = '';


        $args = array(
            'post_title' => wp_strip_all_tags("LIGHTS OUT GALLERY"),
            'name' => $demo_slug,
            'post_name' => $demo_slug,
            'post_content' => $cont,
            'post_status' => 'publish',
            'post_author' => 1,
            'post_type' => 'page',

        );


        $page_id = wp_insert_post($args);
        $page_id_lights_out = $page_id;


        update_post_meta($page_id, '_wp_page_template', 'template-gallery-creative.php');;



        $attach_id_1 = $attach_id;





        $attach_id_2 = qucreative_import_demo_create_attachment($img_url, $page_id, $new_path);
        $my_post = array(
            'ID' => $attach_id_2,
            'post_excerpt' => 'COOL IMAGE',
            'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor mauris incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip estimat.',
        );


        wp_update_post($my_post);


        $attach_id = qucreative_import_demo_create_attachment($img_url, $page_id, $new_path);
        $attach_id_3 = $attach_id;
        update_post_meta($attach_id, 'qucreative_'.'meta_att_video', 'https://www.youtube.com/watch?v=TEru6QoFUl0');



        $attach_id = qucreative_import_demo_create_attachment($img_url, $page_id, $new_path);
        $attach_id_4 = $attach_id;
        update_post_meta($attach_id, 'qucreative_'.'meta_att_video', 'https://vimeo.com/19530316');



        $attach_id = qucreative_import_demo_create_attachment($img_url, $page_id, $new_path);
        $attach_id_5 = $attach_id;
        update_post_meta($attach_id, 'qucreative_'.'meta_att_video', 'https://vimeo.com/19530316');



        $attach_id = qucreative_import_demo_create_attachment($img_url, $page_id, $new_path);
        $attach_id_6 = $attach_id;
        update_post_meta($attach_id, 'qucreative_'.'meta_att_video', 'https://vimeo.com/55461555');
        update_post_meta($attach_id, 'qucreative_'.'meta_att_enable_video_cover', 'on');



        $attach_id = qucreative_import_demo_create_attachment($img_url, $page_id, $new_path);
        $attach_id_7 = $attach_id;
        $my_post = array(
            'ID' => $attach_id,
            'post_excerpt' => 'COOL IMAGE',
            'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor mauris incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip estimat.',
        );


        wp_update_post($my_post);


        $attach_id = qucreative_import_demo_create_attachment($img_url, $page_id, $new_path);
        $attach_id_8 = $attach_id;
        update_post_meta($attach_id, 'qucreative_'.'meta_att_video', 'https://vimeo.com/55461555');
        update_post_meta($attach_id, 'qucreative_'.'meta_att_enable_video_cover', 'on');



        $attach_id = qucreative_import_demo_create_attachment($img_url, $page_id, $new_path);
        $attach_id_9 = $attach_id;




        $attach_id = qucreative_import_demo_create_attachment($img_url, $page_id, $new_path);
        $attach_id_10 = $attach_id;
        update_post_meta($attach_id, 'qucreative_'.'meta_post_excerpt', 'COOL IMAGE');
        update_post_meta($attach_id, 'qucreative_'.'meta_post_content', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor mauris incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip estimat.');


        $attach_id = qucreative_import_demo_create_attachment($img_url, $page_id, $new_path);
        $attach_id_11 = $attach_id;




        $attach_id = qucreative_import_demo_create_attachment($img_url, $page_id, $new_path);
        $attach_id_12 = $attach_id;
        $my_post = array(
            'ID' => $attach_id,
            'post_excerpt' => 'COOL IMAGE',
            'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor mauris incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip estimat.',
        );


        wp_update_post($my_post);


        $attach_id = qucreative_import_demo_create_attachment($img_url, $page_id, $new_path);
        $attach_id_13 = $attach_id;
        $my_post = array(
            'ID' => $attach_id,
            'post_excerpt' => 'COOL IMAGE',
            'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor mauris incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip estimat.',
        );


        wp_update_post($my_post);


        $attach_id = qucreative_import_demo_create_attachment($img_url, $page_id, $new_path);
        $attach_id_14 = $attach_id;




        $attach_id = qucreative_import_demo_create_attachment($img_url, $page_id, $new_path);
        $attach_id_15 = $attach_id;
        $my_post = array(
            'ID' => $attach_id,
            'post_excerpt' => 'COOL IMAGE',
            'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor mauris incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip estimat.',
        );


        wp_update_post($my_post);


        $attach_id = qucreative_import_demo_create_attachment($img_url, $page_id, $new_path);
        $attach_id_16 = $attach_id;




        $attach_id = qucreative_import_demo_create_attachment($img_url, $page_id, $new_path);
        $attach_id_17 = $attach_id;
        update_post_meta($attach_id, 'qucreative_'.'meta_post_excerpt', 'COOL IMAGE');
        update_post_meta($attach_id, 'qucreative_'.'meta_post_content', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor mauris incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip estimat.');


        $attach_id = qucreative_import_demo_create_attachment($img_url, $page_id, $new_path);
        $attach_id_18 = $attach_id;
        $my_post = array(
            'ID' => $attach_id,
            'post_excerpt' => 'COOL IMAGE',
            'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor mauris incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip estimat.',
        );


        wp_update_post($my_post);


        $attach_id = qucreative_import_demo_create_attachment($img_url, $page_id, $new_path);
        $attach_id_19 = $attach_id;




        $attach_id = qucreative_import_demo_create_attachment($img_url, $page_id, $new_path);
        $attach_id_20 = $attach_id;
        $my_post = array(
            'ID' => $attach_id,
            'post_excerpt' => 'COOL IMAGE',
            'post_content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor mauris incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip estimat.',
        );


        wp_update_post($my_post);


        update_post_meta($page_id, 'qucreative_'.'meta_image_gallery', $attach_id_1 . ',' . $attach_id_2 . ',' . $attach_id_3 . ',' . $attach_id_4 . ',' . $attach_id_5 . ',' . $attach_id_6 . ',' . $attach_id_7 . ',' . $attach_id_8 . ',' . $attach_id_9 . ',' . $attach_id_10 . ',' . $attach_id_11 . ',' . $attach_id_12 . ',' . $attach_id_13 . ',' . $attach_id_14 . ',' . $attach_id_15 . ',' . $attach_id_16 . ',' . $attach_id_17 . ',' . $attach_id_18 . ',' . $attach_id_19 . ',' . $attach_id_20);
        update_post_meta($page_id, 'qucreative_'.'meta_bg_image', $img_url);











    $demo_slug = 'gallery-classic';
    $demo_name = 'Gallery Classic';












    $term = get_term_by('slug', $demo_slug, $taxonomy);




    if ($term) {

    } else {


        if ($debug) {
        } else {







        }




    }






    $term = qucreative_import_demo_create_term_if_it_does_not_exist(array(
        'description' => '',
        'term_name' => "Gallery Classic",
        'slug' => 'gallery-classic',
        'taxonomy' => $taxonomy,


    ));






    if (is_array($term)) {

        $term_id = $term['term_id'];
    } else {

        $term_id = $term->term_id;
    }



	$gallery1_term_id = $term_id;


    $term_im = qucreative_import_demo_create_term_if_it_does_not_exist(array(
        'description' => '',
        'term_name' => "Images",
        'slug' => 'gc-images',
        'taxonomy' => $taxonomy,
        'parent'=> $term_id,

    ));


    $term_mi = qucreative_import_demo_create_term_if_it_does_not_exist(array(
        'description' => '',
        'term_name' => "Mixed",
        'slug' => 'gc-mixed',
        'taxonomy' => $taxonomy,
        'parent'=> $term_id,

    ));

    $term_sl = qucreative_import_demo_create_term_if_it_does_not_exist(array(
        'description' => '',
        'term_name' => "Slider",
        'slug' => 'gc-slider',
        'taxonomy' => $taxonomy,
        'parent'=> $term_id,

    ));







    $args = array(

        'post_title' => 'THE ACTRESS',
        'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'slider',

        'qucreative_'.'meta_image_gallery_in_meta' => $attach_id . ',' . $attach_id,
        'img_url' => $img_url,
        'img_path' => $new_path,
        'term' => $term_sl,
        'taxonomy' => $taxonomy,
    );


    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'HIP HOP WORLD',
        'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'vimeo',
        'qucreative_'.'meta_post_media' => 'https://vimeo.com/60588549',
        'img_url' => $img_url,
        'img_path' => $new_path,
        'term' => $term_vi,
        'taxonomy' => $taxonomy,
        'attach_id' => $attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'PATRICIA SMITH',
        'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'slider',

        'qucreative_'.'meta_image_gallery_in_meta' => $attach_id . ',' . $attach_id,
        'img_url' => $img_url,
        'img_path' => $new_path,
        'term' => $term_sl,
        'taxonomy' => $taxonomy,
        'attach_id' => $attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'THE BEATS',
        'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'youtube',
        'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=6Qlz_Y4R4ok',
        'img_url' => $img_url,
        'img_path' => $new_path,
        'term' => $term_mi,
        'taxonomy' => $taxonomy,
        'attach_id' => $attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'SERIOUS MEN',
        'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'image',
        'qucreative_'.'meta_post_media' => $img_url,
        'img_url' => $img_url,
        'img_path' => $new_path,
        'term' => $term_im,
        'taxonomy' => $taxonomy,
        'attach_id' => $attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'JACK\'S COFFEE SHOP',
        'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_post_media_type' => 'image',
        'qucreative_'.'meta_post_media' => $img_url,
        'img_url' => $img_url,
        'img_path' => $new_path,
        'term' => $term_im,
        'taxonomy' => $taxonomy,
        'attach_id' => $attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'JASON THE JEWELER',
        'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'image',
        'qucreative_'.'meta_post_media' => $img_url,
        'img_url' => $img_url,
        'img_path' => $new_path,
        'term' => $term_im,
        'taxonomy' => $taxonomy,
        'attach_id' => $attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'VERONICA SWIFT',
        'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'youtube',
        'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=6Qlz_Y4R4ok',
        'img_url' => $img_url,
        'img_path' => $new_path,
        'term' => $term_mi,
        'taxonomy' => $taxonomy,
        'attach_id' => $attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'CITY OF LIGHTS',
        'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'youtube',
        'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=QNZOOSxfQn8',
        'img_url' => $img_url,
        'img_path' => $new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'BLUE EROTICA',
        'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'youtube',
        'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=6Qlz_Y4R4ok',
        'img_url' => $img_url,
        'img_path' => $new_path,
        'term' => $term_vi,
        'taxonomy' => $taxonomy,
        'attach_id' => $attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'JUNGLE BOOK',
        'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'youtube',
        'qucreative_'.'meta_video_cover_image' => $img_url,
        'qucreative_'.'meta_post_media' => 'https://www.youtube.com/watch?v=6Qlz_Y4R4ok',
        'img_url' => $img_url,
        'img_path' => $new_path,
        'term' => $term,
        'taxonomy' => $taxonomy,
        'attach_id' => $attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'DNG MOTORS',
        'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'vimeo',
        'qucreative_'.'meta_post_media' => 'https://vimeo.com/22884674',
        'img_url' => $img_url,
        'img_path' => $new_path,
        'term' => $term_vi,
        'taxonomy' => $taxonomy,
        'attach_id' => $attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'MY SMARTPHONE',
        'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'image',
        'qucreative_'.'meta_post_media' => $img_url,
        'img_url' => $img_url,
        'img_path' => $new_path,
        'term' => $term_im,
        'taxonomy' => $taxonomy,
        'attach_id' => $attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


    $args = array(

        'post_title' => 'DJ BRONX',
        'post_content' => 'Cras congue leo sed lacinia consequat. Sed rhoncus orci id leo sodales, luctus tincidunt justo consequat. In hac habitasse platea dictumst. Etiam bibendum tortor ex, at auctor velit semper ut. Nulla tempus tempor purus a accumsan. Nulla id justo velit. Etiam lacinia ligula vel ante scelerisque viverra nec sit amet enim. Curabitur nisi lectus, hendrerit at venenatis id, molestie nec orci.',
        'post_status' => 'publish',
        'qucreative_'.'meta_port_subtitle' => 'identity design',
        'qucreative_'.'meta_port_optional_info_1' => 'Walter Studios',
        'qucreative_'.'meta_port_optional_info_2' => 'March 1st 2015',
        'qucreative_'.'meta_port_website' => 'https://www.website.com',
        'qucreative_'.'meta_post_media_type' => 'slider',

        'qucreative_'.'meta_image_gallery_in_meta' => $attach_id . ',' . $attach_id,
        'img_url' => $img_url,
        'img_path' => $new_path,
        'term' => $term_sl,
        'taxonomy' => $taxonomy,
        'attach_id' => $attach_id,
    );

    $port_id = qucreative_import_demo_insert_post_complete($args);


























    $cont = '[vc_row][vc_column][antfarm_portfolio skin="skin-gazelia skin-gazelia--transparent" zfolio-mode="mode-normal" link_whole_item="zoombox" gap="3px" posts_per_page="30" title_hover="off" cat="' . $demo_slug . '" filters_position="right" mode="" layout="dzs-layout--4-cols"][/vc_column][/vc_row]';


    $args = array(
        'post_title' => wp_strip_all_tags("GALLERY ULTRA ANOTHER EXAMPLE"),
        'post_content' => $cont,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_type' => 'page',

    );


    $page_id = wp_insert_post($args);
    $page_id_gc = $page_id;


    update_post_meta($page_id, '_wp_page_template', 'template-portfolio.php');;
    update_post_meta($page_id, 'qucreative_'.'meta_custom_section_margin_bottom', '0');
    update_post_meta($page_id, 'qucreative_'.'meta_content_starts_at', 'pixel-position');
    update_post_meta($page_id, 'qucreative_'.'meta_content_starts_at_pixel', '0');
    update_post_meta($page_id, 'qucreative_'.'meta_disable_footer', 'on');
    update_post_meta($page_id, 'qucreative_'.'meta_overlay_opacity', '85');
    update_post_meta($page_id, 'qucreative_'.'meta_overlay_color', '#000000');
    update_post_meta($page_id, 'qucreative_'.'meta_scrollbar_theme', 'light');


    update_post_meta($page_id, 'qucreative_'.'meta_custom_title', ' ');
    update_post_meta($page_id, 'qucreative_'.'meta_bg_image', $img_url);





















    $demo_slug = 'Slideshow Home';
    $demo_name = 'slideshow-home';






    $img_name = '500x500.jpg';
    $img_url = QUCREATIVE_THEME_URL . 'placeholders/500x500.jpg';


    $img_path = QUCREATIVE_THEME_DIR . 'placeholders/500x500.jpg';


    $new_path = $upload_dir_path . '/' . $img_name;

    try {

        if (!copy($img_path, $new_path)) {

        } else {
            $img_url = $upload_dir_url . '/' . $img_name;
            $new_path = $img_path;
        }
    } catch (Exception $e) {
        print_rr($e);
    }








    $img_name = '500x500-150x150.jpg';
    $img_url_2 = QUCREATIVE_THEME_URL . 'placeholders/'.$img_name;


    $img_path_2 = QUCREATIVE_THEME_DIR . 'placeholders/'.$img_name;


    $new_path_2 = $upload_dir_path . '/' . $img_name;

    try {

        if (!copy($img_path_2, $new_path_2)) {

        } else {
            $img_url_2 = $upload_dir_url . '/' . $img_name;
            $new_path_2 = $img_path_2;
        }
    } catch (Exception $e) {
        print_rr($e);
    }





    $img_name = '500x500-darker.jpg';
    $img_url_3 = QUCREATIVE_THEME_URL . 'placeholders/'.$img_name;


    $img_path_3 = QUCREATIVE_THEME_DIR . 'placeholders/'.$img_name;


    $new_path_3 = $upload_dir_path . '/' . $img_name;


    try {

        if (!copy($img_path_3, $new_path_3)) {

        } else {
            $img_url_3 = $upload_dir_url . '/' . $img_name;
            $new_path_3 = $img_path_3;
        }
    } catch (Exception $e) {
        print_rr($e);
    }
















    $the_slug = $demo_slug;
    $args = array(
        'name'        => $the_slug,
        'post_type'   => 'page',
        'post_status' => 'publish',
        'numberposts' => 1
    );
    $my_posts = get_posts($args);

    $page_id_bg_slideshow = 1;




    if ($my_posts) {

    } else {



    }














    $cont = '';


    $args = array(
        'post_title' => wp_strip_all_tags('QU SLIDESHOW'),
        'name' => $demo_slug,
        'post_name' => $demo_slug,
        'post_content' => $cont,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_type' => 'page',

    );


    $page_id = wp_insert_post($args);
    $page_id_bg_slideshow = $page_id;


    update_post_meta($page_id, '_wp_page_template', 'template-qucreative-slider.php');;


    $attach_id = qucreative_import_demo_create_attachment($img_url, $page_id, $new_path);
    $attach_id_1 = $attach_id;
    $my_post = array(
        'ID' => $attach_id,
        'post_excerpt' => 'COOL INFO',

    );


    wp_update_post($my_post);
    update_post_meta($attach_id, 'meta_att_aligment', 'right');





    $attach_id = qucreative_import_demo_create_attachment($img_url_2, $page_id, $new_path_2);
    $attach_id_2 = $attach_id;
    $my_post = array(
        'ID' => $attach_id,
        'post_excerpt' => 'COOL INFO',

    );


    wp_update_post($my_post);
    update_post_meta($attach_id, 'meta_att_aligment', 'left');



    $attach_id = qucreative_import_demo_create_attachment($img_url_3, $page_id, $new_path_3);
    $attach_id_3 = $attach_id;
    $my_post = array(
        'ID' => $attach_id,
        'post_excerpt' => 'COOL INFO',

    );


    wp_update_post($my_post);
    update_post_meta($attach_id, 'meta_att_aligment', 'right');


    update_post_meta($page_id, 'qucreative_'.'meta_image_gallery', $attach_id_1 . ',' . $attach_id_2 . ',' . $attach_id_3);
    update_post_meta($page_id, 'qucreative_'.'meta_bg_image', $img_url);
    update_post_meta($page_id, 'qucreative_'.'meta_home_slideshow_time', '0');

















    $cont = '[vc_section shape="" type="video" sc_video="https://vimeo.com/69655841" style="light"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="01" line1="THE" line2="STUDIO"][/vc_column][/vc_row][vc_row][vc_column width="1/3"][antfarm_bullet_feature style="style-3" feature="feature-type-et" icon_aligment="" title="REFINED AND ELEGANT" eticon="icon-trophy" aligment="`{`object Object`}`"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec tincidunt eros.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-3" feature="feature-type-et" icon_aligment="" title="HIGH QUALITY" eticon="icon-hotairballoon" aligment="`{`object Object`}`"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec tincidunt eros.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-3" feature="feature-type-et" icon_aligment="" title="SUPER SMART" eticon="icon-layers" aligment="`{`object Object`}`"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec tincidunt eros.[/antfarm_bullet_feature][/vc_column][/vc_row][vc_row][vc_column width="1/3"][antfarm_bullet_feature style="style-3" feature="feature-type-et" icon_aligment="" title="AMAZING EXPERIENCE" eticon="icon-presentation" aligment=""]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec tincidunt eros.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-3" feature="feature-type-et" icon_aligment="" title="OUTSTANDING FEATURES" eticon="icon-tools" aligment="`{`object Object`}`"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec tincidunt eros.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-3" feature="feature-type-et" icon_aligment="" title="THE FUTURE IS NOW" eticon="icon-telescope" aligment="`{`object Object`}`"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec tincidunt eros.[/antfarm_bullet_feature][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_sc_progress bg="'.$img_url.'" overlay_opacity="50" convert_1000_to_k="off" title_1="AWESOME PROJECTS" progress_1="284" eticon_1="icon-briefcase" title_2="HAPPY CLIENTS" progress_2="97" eticon_2="icon-profile-male" title_3="PRODUCTS LAUNCHED" progress_3="125" eticon_3="icon-hotairballoon" title_4="CITIES WE ARE IN" progress_4="24" eticon_4="icon-map" media="'.$img_url.'"][/vc_column][/vc_row][/vc_section][vc_section shape="" type="image" style="light"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="02" line1="OUR" line2="SKILLS"][/vc_column][/vc_row][vc_row][vc_column width="1/2"][vc_column_text]
<h6>THINKING OUTSIDE THE BOX</h6>
[antfarm_divider height="30" style="style-1" color="#222222"][/antfarm_divider]

Sed congue leo eget tellus consectetur aliquam. Donec orci justo, mollis eget est id, venenatis ultrices quam. Morbi id interdum metus. Nulla convallis magna nisi, aliquet bibendum nunc placerat et. Aliquam aliquam ac enim volutpat porta. Proin a lacus in magna tempus porttitor eu vel nunc. Nam a tortor dignissim, laoreet velit a, ullamcorper odio. Sed sollicitudin tortor ipsum, in ultrices purus efficitur aliquet.[/vc_column_text][/vc_column][vc_column width="1/2"][vc_column_text]
<h6>WE LOVE A GOOD CHALLENGE</h6>
[antfarm_divider height="30" style="style-1" color="#222222"][/antfarm_divider]

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed mollis accumsan enim, eget cursus magna. Mauris egestas metus ut massa gravida accumsan. In gravida semper sollicitudin. Cras tempus dapibus neque, a blandit tortor placerat sit amet. Vestibulum ac tempor libero. Etiam dictum velit id sollicitudin mollis. Proin at purus sit amet sapien porta elementum eget laoreet odio. Nam tristique lobortis.[/vc_column_text][/vc_column][/vc_row][vc_row][vc_column width="1/3"][antfarm_progress_bar style="line" title="PHOTOSHOP" progress="80" convert_1000_to_k="`{`object Object`}`"][/antfarm_progress_bar][antfarm_progress_bar style="line" title="ILLUSTRATOR" progress="85" convert_1000_to_k="`{`object Object`}`"][/antfarm_progress_bar][/vc_column][vc_column width="1/3"][antfarm_progress_bar style="line" title="WORDPRESS" progress="95" convert_1000_to_k="`{`object Object`}`"][/antfarm_progress_bar][antfarm_progress_bar style="line" title="AFTER EFFECTS" progress="100" convert_1000_to_k="`{`object Object`}`"][/antfarm_progress_bar][/vc_column][vc_column width="1/3"][antfarm_progress_bar style="line" title="FRONTEND" progress="75" convert_1000_to_k="`{`object Object`}`"][/antfarm_progress_bar][antfarm_progress_bar style="line" title="CUBASE" progress="90" convert_1000_to_k="`{`object Object`}`"][/antfarm_progress_bar][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_sc_video media="http://vimeo.com/155479254" video_cover="1294" line1="welcome to" line2="OUR TEAM"][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="03" line1="MEET" line2="THE TEAM"][/vc_column][/vc_row][vc_row][vc_column width="1/2"][antfarm_team_member style="team-member-element" shape="circle" avatar="'.$img_url.'" first_name="MARKUS" last_name="WASHINGTON" position="senior backend developer" aligment="left" titles="%5B%7B%22faicon%22%3A%22facebook%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22twitter%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22pinterest%22%2C%22title%22%3A%22%23%22%7D%5D"][/vc_column][vc_column width="1/2"][antfarm_team_member style="team-member-element" shape="circle" avatar="'.$img_url.'" first_name="RAOUL" last_name="JAYARAMAN" position="senior ux designer" aligment="left" titles="%5B%7B%22faicon%22%3A%22facebook%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22twitter%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22vine%22%2C%22title%22%3A%22%23%22%7D%5D"][/vc_column][/vc_row][vc_row][vc_column width="1/2"][antfarm_team_member style="team-member-element" shape="circle" avatar="'.$img_url.'" first_name="JENNIFER" last_name="HERNANDEZ" position="senior frontend developer" aligment="right" titles="%5B%7B%22faicon%22%3A%22github%20fa-fw%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22twitter%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22instagram%22%2C%22title%22%3A%22%23%22%7D%5D"][/vc_column][vc_column width="1/2"][antfarm_team_member style="team-member-element" shape="circle" avatar="'.$img_url.'" first_name="WILLIAM" last_name="RICHARDSON" position="junior designer" aligment="right" titles="%5B%7B%22faicon%22%3A%22linkedin%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22twitter%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22dribbble%22%7D%5D"][/vc_column][/vc_row][/vc_section]';


    $args = array(
        'post_title' => wp_strip_all_tags('ABOUT'),
        'post_content' => $cont,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_type' => 'page',

    );


    $page_id = wp_insert_post($args);

    $page_id_about = $page_id;


    update_post_meta($page_id, 'qucreative_'.'meta_scrollbar_theme', 'light');


    update_post_meta($page_id, 'qucreative_'.'meta_custom_title', 'ABOUT');
    update_post_meta($page_id, 'qucreative_'.'meta_bg_image', $img_url);










    $cont = ' ';


    $args = array(
        'post_title' => wp_strip_all_tags('BLOG'),
        'post_content' => $cont,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_type' => 'page',

    );


    $page_id = wp_insert_post($args);
    $page_id_blog = $page_id;






    update_post_meta($page_id, 'qucreative_'.'meta_custom_title', 'BLOG');
    update_post_meta($page_id, 'qucreative_'.'meta_bg_image', $img_url);
    update_option( 'page_for_posts', $page_id );




	update_option( 'page_for_posts', $page_id_blog );





    $cont = '[vc_section type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_sc_contact_box bg="'.$img_url.'" view_map_str="VIEW MAP" lat="40.69" long="-73.89" titles="%5B%7B%22faicon%22%3A%22facebook-square%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22twitter%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22behance%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22pinterest%22%2C%22link%22%3A%22%23%22%7D%5D"]
<h6>HEADQUARTERS</h6>

<hr class="qucreative-hr-small" />

75 Central Park Avenue
60488, West Virginia, USA
<h6>PHONE / FAX</h6>

<hr class="qucreative-hr-small" />

0040 75.67.43.604
0040 43.56.98.652
<h6>EMAIL</h6>

<hr class="qucreative-hr-small" />

<a href="http://localhost/qcreative/qcreative/contact.html#">office@company.com</a>[/antfarm_sc_contact_box][/vc_column][/vc_row][/vc_section][vc_section type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_sc_contact_form bg="'.$img_url.'"][/vc_column][/vc_row][/vc_section]';


    $args = array(
        'post_title' => wp_strip_all_tags('CONTACT CREATIVE'),
        'post_content' => $cont,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_type' => 'page',

    );


    $page_id = wp_insert_post($args);
    $page_id_contact_creative = $page_id;



    update_post_meta($page_id, 'qucreative_'.'meta_scrollbar_theme', 'light');


    update_post_meta($page_id, 'qucreative_'.'meta_custom_title', 'CONTACT');
    update_post_meta($page_id, 'qucreative_'.'meta_bg_image', $img_url);










    $cont = '[vc_section shape="`{`object Object`}`" type="image" media="'.$img_url_500_100.'" style="light"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="01" line1="GET" line2="IN TOUCH"][/vc_column][/vc_row][vc_row][vc_column width="2/3"][antfarm_contact_form layout="'.$contact_grid_id.'" email_target="razorflashmedia@gmail.com" style="`{`object Object`}`"][/vc_column][vc_column width="1/3"][vc_column_text]
<h6>ADDRESS</h6>
Sunset Blvd, 67 Avenue, California USA[/vc_column_text][vc_column_text]
<h6>PHONE</h6>
5065 546.469.452[/vc_column_text][vc_column_text]
<h6>EMAIL</h6>
<a href="#">office@qutheme.com</a>[/vc_column_text][antfarm_contact_info style="social_icons" icon-style="default" titles="%5B%7B%22faicon%22%3A%22facebook-square%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22twitter%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22pinterest%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22linkedin%22%2C%22link%22%3A%22%23%22%7D%5D"][/antfarm_contact_info][/vc_column][/vc_row][/vc_section]';


    $args = array(
        'post_title' => wp_strip_all_tags('CONTACT IMAGE HEADER'),
        'post_content' => $cont,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_type' => 'page',

    );


    $page_id = wp_insert_post($args);
    $page_id_contact_image_header = $page_id;



    update_post_meta($page_id, 'qucreative_'.'meta_scrollbar_theme', 'light');


    update_post_meta($page_id, 'qucreative_'.'meta_custom_title', 'CONTACT');
    update_post_meta($page_id, 'qucreative_'.'meta_bg_image', $img_url);












    $cont = '[vc_section shape="`{`object Object`}`"  type="map" lat="40.690254" long="-73.981761" style="light"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="01" line1="GET" line2="IN TOUCH"][/vc_column][/vc_row][vc_row][vc_column width="2/3"][antfarm_contact_form layout="'.$contact_grid_id.'" email_target="razorflashmedia@gmail.com" style="`{`object Object`}`"][/vc_column][vc_column width="1/3"][vc_column_text]
<h6>ADDRESS</h6>
Sunset Blvd, 67 Avenue, California USA[/vc_column_text][vc_column_text]
<h6>PHONE</h6>
5065 546.469.452[/vc_column_text][vc_column_text]
<h6>EMAIL</h6>
<a href="#">office@qutheme.com</a>[/vc_column_text][antfarm_contact_info style="social_icons" icon-style="default" titles="%5B%7B%22faicon%22%3A%22facebook-square%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22twitter%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22pinterest%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22linkedin%22%2C%22link%22%3A%22%23%22%7D%5D"][/antfarm_contact_info][/vc_column][/vc_row][/vc_section]';


    $args = array(
        'post_title' => wp_strip_all_tags('CONTACT MAP HEADER'),
        'post_content' => $cont,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_type' => 'page',

    );


    $page_id = wp_insert_post($args);
    $page_id_contact_map_header = $page_id;



    update_post_meta($page_id, 'qucreative_'.'meta_scrollbar_theme', 'light');
    update_post_meta($page_id, 'qucreative_'.'meta_custom_section_margin_bottom', '0');


    update_post_meta($page_id, 'qucreative_'.'meta_custom_title', 'CONTACT');
    update_post_meta($page_id, 'qucreative_'.'meta_bg_image', $img_url);












    $cont = '[vc_section shape="" type="image" style="dark"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="01" line1="ICON" line2="BOXES"][/vc_column][/vc_row][vc_row][vc_column width="1/3"][antfarm_bullet_feature style="style-1" feature="feature-type-et" title="REFINED AND ELEGANT" eticon="icon-briefcase" read_more="YOU CAN"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec tincidunt eros.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-1" feature="feature-type-et" title="MODERN AND DIFFERENT" eticon="icon-camera" read_more="ADD BUTTONS" button_style="{``style``:``style-black``,``padding``:````,``rounded``:``rounded``}"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec tincidunt eros.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-1" feature="feature-type-et" title="SMART AND FEATURE FULL" eticon="icon-wallet" read_more="ANYWHERE" button_style="{``style``:``style-hallowblack``,``padding``:````,``rounded``:````}"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec tincidunt eros.[/antfarm_bullet_feature][/vc_column][/vc_row][vc_row][vc_column width="1/3"][antfarm_bullet_feature style="style-2" feature="feature-type-fa" title="TIME FOR AWESOMENESS" faicon="flag" read_more="READ MORE" button_style="{``style``:``style-hallowblack``,``padding``:````,``rounded``:``rounded``}"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec tincidunt eros.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-2" feature="feature-type-fa" title="NEVER SEEN BEFORE" faicon="graduation-cap" read_more="READ MORE" button_style="{``style``:``style-hallowblack``,``padding``:````,``rounded``:``rounded``}"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec tincidunt eros.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-2" feature="feature-type-fa" title="YOU\'LL LOVE IT" faicon="heart" read_more="READ MORE" button_style="{``style``:``style-hallowblack``,``padding``:````,``rounded``:``rounded``}"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec tincidunt eros.[/antfarm_bullet_feature][/vc_column][/vc_row][vc_row][vc_column width="1/3"][antfarm_bullet_feature style="style-3" feature="feature-type-et" icon_aligment="" title="REFINED AND ELEGANT" eticon="icon-hourglass" read_more="READ MORE" button_style="{``style``:``style-hallowblack``,``padding``:``padding-medium``,``rounded``:``rounded``}" aligment=""]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec tincidunt eros.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-3" feature="feature-type-et" icon_aligment="" title="MODERN AND DIFFERENT" eticon="icon-flag" read_more="READ MORE" button_style="{``style``:``style-hallowblack``,``padding``:``padding-medium``,``rounded``:``rounded``}" aligment=""]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec tincidunt eros.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-3" feature="feature-type-et" icon_aligment="" title="INNOVATING FEATURES" eticon="icon-hotairballoon" read_more="READ MORE" button_style="{``style``:``style-hallowblack``,``padding``:``padding-medium``,``rounded``:``rounded``}" aligment=""]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec tincidunt eros.[/antfarm_bullet_feature][/vc_column][/vc_row][vc_row][vc_column width="1/3"][antfarm_bullet_feature style="style-4" feature="feature-type-fa" icon_aligment="" icon_theme=" " form="form-default" title="CREATIVE AND MODERN" faicon="cube fa-fw" read_more="READ MORE" aligment="`{`object Object`}`"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec tincidunt eros.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-4" feature="feature-type-fa" icon_aligment="" icon_theme=" " form="form-circle" title="INNOVATIVE AND FRESH" faicon="leaf" read_more="READ MORE" aligment="`{`object Object`}`"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec tincidunt eros.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-4" feature="feature-type-fa" icon_aligment="" icon_theme=" " form="form-hexagon" title="HIGHLY CUSTOMIZABLE" faicon="thumbs-o-up" read_more="READ MORE" aligment="`{`object Object`}`"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec tincidunt eros.[/antfarm_bullet_feature][/vc_column][/vc_row][vc_row][vc_column width="1/3"][antfarm_bullet_feature style="style-5" feature="feature-type-et" title="ADD ANY ICON TYPE" icon_color="#31d8a6" eticon="icon-pricetags" read_more="READ MORE" button_style="{``style``:``color-highlight``,``padding``:``padding-medium``,``rounded``:``rounded``}" aligment="`{`object Object`}`"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec tincidunt eros.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-5" feature="feature-type-fa" title="CHOOSE ANY COLOR" icon_color="#e045b7" faicon="leaf" read_more="READ MORE" button_style="{``style``:``color-highlight``,``padding``:``padding-medium``,``rounded``:``rounded``}" aligment="`{`object Object`}`"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec tincidunt eros.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-5" feature="feature-type-fa" title="FOR ANY ICON BOX" icon_color="#e57824" faicon="thumbs-o-up" read_more="READ MORE" button_style="{``style``:``color-highlight``,``padding``:``padding-medium``,``rounded``:``rounded``}" aligment="`{`object Object`}`"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec tincidunt eros.[/antfarm_bullet_feature][/vc_column][/vc_row][vc_row css=".vc_custom_1501336992996{margin-bottom: 30px !important;}"][vc_column width="1/3"][antfarm_service_lightbox title="TOP NOTCH DESIGN" content_main="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec tincidunt eros." icon="icon-hotairballoon" columns="1"][/vc_column][vc_column width="1/3"][antfarm_service_lightbox title="INNOVATIVE VISUAL FX" content_main="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec tincidunt eros." icon="icon-genius" columns="1"][/vc_column][vc_column width="1/3"][antfarm_service_lightbox title="AWESOME FEATURES" content_main="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec tincidunt eros." icon="icon-tools" columns="1"][/vc_column][/vc_row][vc_row][vc_column width="1/3"][antfarm_service_lightbox title="TOP NOTCH DESIGN" content_main="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec tincidunt eros." icon="icon-hotairballoon" columns="1"][/vc_column][vc_column width="1/3"][antfarm_service_lightbox title="INNOVATIVE VISUAL FX" content_main="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec tincidunt eros." icon="icon-genius" columns="1"][/vc_column][vc_column width="1/3"][antfarm_service_lightbox title="AWESOME FEATURES" content_main="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec tincidunt eros." icon="icon-tools" columns="1"][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="image" style="dark"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="02" line1="TABS" line2="AND ACCORDION"][/vc_column][/vc_row][vc_row][vc_column width="1/2"][antfarm_tta_tabs][vc_tta_section title="Image Support" tab_id="1466631112819-06212f5f-1e7c"][vc_single_image image="'.$qucreative_import_demo_last_attach_id.'" img_size="full"][vc_column_text]
<h6>THINKING OUTSIDE THE BOX</h6>
<p class="paragraph-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit.</p>
[/vc_column_text][/vc_tta_section][vc_tta_section title="Simple text" tab_id="1466631112872-504c56e7-e7e9"][vc_column_text]
<h6 class="paragraph-heading">THINKING OUTSIDE THE BOX</h6>
<p class="paragraph-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error.
[/vc_column_text][/vc_tta_section][vc_tta_section title="Map Support" tab_id="1466671236148-58221495-1745"][vc_gmaps link="#E-8_JTNDaWZyYW1lJTIwc3JjJTNEJTIyaHR0cHMlM0ElMkYlMkZ3d3cuZ29vZ2xlLmNvbSUyRm1hcHMlMkZlbWJlZCUzRnBiJTNEJTIxMW0yMiUyMTFtMTIlMjExbTMlMjExZDYwNDYuNTUwMzEwNjU5MjQ3JTIxMmQtNzMuODY4NjE2ODQ5MzA3NDQlMjEzZDQwLjczMzk3MDU5OTU2NDY0JTIxMm0zJTIxMWYwJTIxMmYwJTIxM2YwJTIxM20yJTIxMWkxMDI0JTIxMmk3NjglMjE0ZjEzLjElMjE0bTclMjExaTAlMjEzZTYlMjE0bTAlMjE0bTMlMjEzbTIlMjExZDQwLjczMjgyNDMlMjEyZC03My44Njc5MzAyJTIxNWUwJTIxM20yJTIxMXNybyUyMTJzJTIxNHYxMzk3NDkwMzg4ODQzJTIyJTIwJTIwaGVpZ2h0JTNEJTIyMzAwJTIyJTIwJTIwc3R5bGUlM0QlMjJ3aWR0aCUzQSUyMDEwMCUyNSUzQiUyMGJvcmRlciUzQTAlMjIlM0UlM0MlMkZpZnJhbWUlM0U="][/vc_tta_section][/antfarm_tta_tabs][/vc_column][vc_column width="1/2"][antfarm_tta_tabs dzsvcs_id="tabs-5964952" is_always_accordion="on" skin="skin-qucreative" active_section="0"][vc_tta_section title="Q Creative is beautiful and innovative" tab_id="1466630924248-1568b3d9-c056"][vc_single_image image="'.$qucreative_import_demo_last_attach_id.'" img_size="full"][vc_column_text]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.[/vc_column_text][/vc_tta_section][vc_tta_section title="Q Creative is packed with awesome features" tab_id="1466630924199-4536956a-ad5e"][vc_column_text]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
Aenean commodo ultricies mauris ac tincidunt. Donec interdum sodales tortor Nunc quis purus arcu. Ut vitae imperdiet ante. Morbi semper rutrum consequat. Nullam vel lectus lacinia, placerat turpis eu, condimentum est.[/vc_column_text][/vc_tta_section][vc_tta_section title="Q Creative is truly a creative template" tab_id="1466672977247-bce6947f-63fe"][vc_gmaps link="#E-8_JTNDaWZyYW1lJTIwc3JjJTNEJTIyaHR0cHMlM0ElMkYlMkZ3d3cuZ29vZ2xlLmNvbSUyRm1hcHMlMkZlbWJlZCUzRnBiJTNEJTIxMW0yMiUyMTFtMTIlMjExbTMlMjExZDYwNDYuNTUwMzEwNjU5MjQ3JTIxMmQtNzMuODY4NjE2ODQ5MzA3NDQlMjEzZDQwLjczMzk3MDU5OTU2NDY0JTIxMm0zJTIxMWYwJTIxMmYwJTIxM2YwJTIxM20yJTIxMWkxMDI0JTIxMmk3NjglMjE0ZjEzLjElMjE0bTclMjExaTAlMjEzZTYlMjE0bTAlMjE0bTMlMjEzbTIlMjExZDQwLjczMjgyNDMlMjEyZC03My44Njc5MzAyJTIxNWUwJTIxM20yJTIxMXNybyUyMTJzJTIxNHYxMzk3NDkwMzg4ODQzJTIyJTIwJTIwaGVpZ2h0JTNEJTIyMzAwJTIyJTIwJTIwc3R5bGUlM0QlMjJ3aWR0aCUzQSUyMDEwMCUyNSUzQiUyMGJvcmRlciUzQTAlMjIlM0UlM0MlMkZpZnJhbWUlM0U="][/vc_tta_section][/antfarm_tta_tabs][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="image" style="dark"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="03" line1="USEFUL" line2="BUTTONS"][/vc_column][/vc_row][vc_row][vc_column width="1/2"][vc_column_text][antfarm_button style="" padding="padding-small" rounded=""]READ MORE[/antfarm_button] [antfarm_button style="" padding="padding-medium" rounded=""]READ MORE[/antfarm_button] [antfarm_button style="" padding="" rounded=""]READ MORE[/antfarm_button]
<p>&nbsp;</p>
[antfarm_button style="color-highlight" padding="padding-small" rounded=""]READ MORE[/antfarm_button] [antfarm_button style="color-highlight" padding="padding-medium" rounded=""]READ MORE[/antfarm_button] [antfarm_button style="color-highlight" padding="" rounded=""]READ MORE[/antfarm_button]
<p>&nbsp;</p>
[antfarm_button style="" padding="padding-small" rounded="rounded"]READ MORE[/antfarm_button] [antfarm_button style="" padding="padding-medium" rounded="rounded"]READ MORE[/antfarm_button] [antfarm_button style="" padding="" rounded="rounded"]READ MORE[/antfarm_button]
<p>&nbsp;</p>
[antfarm_button style="color-highlight" padding="padding-small" rounded="rounded"]READ MORE[/antfarm_button] [antfarm_button style="color-highlight" padding="padding-medium" rounded="rounded"]READ MORE[/antfarm_button] [antfarm_button style="color-highlight" padding="" rounded="rounded"]READ MORE[/antfarm_button]
<p>&nbsp;</p>
[antfarm_button style="style-hallowblack" padding="padding-small" rounded=""]READ MORE[/antfarm_button] [antfarm_button style="style-hallowblack" padding="padding-medium" rounded=""]READ MORE[/antfarm_button] [antfarm_button style="style-hallowblack" padding="" rounded=""]READ MORE[/antfarm_button]
<p>&nbsp;</p>
[antfarm_button style="style-black" padding="padding-small" rounded="" the_icon="briefcase"]READ MORE[/antfarm_button] [antfarm_button style="style-black" padding="padding-medium" rounded="" the_icon="briefcase"]READ MORE[/antfarm_button] [antfarm_button style="style-black" padding="" rounded="" the_icon="briefcase"]READ MORE[/antfarm_button][/vc_column_text][/vc_column][vc_column width="1/2"][vc_column_text][antfarm_button style="style-black" padding="padding-small" rounded=""]READ MORE[/antfarm_button] [antfarm_button style="style-black" padding="padding-medium" rounded=""]READ MORE[/antfarm_button] [antfarm_button style="style-black" padding="" rounded=""]READ MORE[/antfarm_button]
<p>&nbsp;</p>
[antfarm_button style="style-hallowred" padding="padding-small" rounded=""]READ MORE[/antfarm_button] [antfarm_button style="style-hallowred" padding="padding-medium" rounded=""]READ MORE[/antfarm_button] [antfarm_button style="style-hallowred" padding="" rounded=""]READ MORE[/antfarm_button]
<p>&nbsp;</p>
[antfarm_button style="style-black" padding="padding-small" rounded="rounded"]READ MORE[/antfarm_button] [antfarm_button style="style-black" padding="padding-medium" rounded="rounded"]READ MORE[/antfarm_button] [antfarm_button style="style-black" padding="" rounded="rounded"]READ MORE[/antfarm_button]
<p>&nbsp;</p>
[antfarm_button style="style-hallowred" padding="padding-small" rounded="rounded"]READ MORE[/antfarm_button] [antfarm_button style="style-hallowred" padding="padding-medium" rounded="rounded"]READ MORE[/antfarm_button] [antfarm_button style="style-hallowred" padding="" rounded=""]READ MORE[/antfarm_button]
<p>&nbsp;</p>
[antfarm_button style="style-hallowblack" padding="padding-small" rounded="rounded"]READ MORE[/antfarm_button] [antfarm_button style="style-hallowblack" padding="padding-medium" rounded="rounded"]READ MORE[/antfarm_button] [antfarm_button style="style-hallowblack" padding="" rounded="rounded"]READ MORE[/antfarm_button]
<p>&nbsp;</p>
[antfarm_button style="" padding="padding-small" rounded="" the_icon="briefcase"]READ MORE[/antfarm_button] [antfarm_button style="" padding="padding-medium" rounded="" the_icon="briefcase"]READ MORE[/antfarm_button] [antfarm_button style="" padding="" rounded="" the_icon="briefcase"]READ MORE[/antfarm_button][/vc_column_text][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="image" style="dark"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="04" line1="ELEGANT" line2="DIVIDERS"][/vc_column][/vc_row][vc_row][vc_column][antfarm_separator style="style-1" is_style_black="on"][antfarm_separator style="style-2" is_style_black="on"][antfarm_separator style="style-3" is_style_black="on"][antfarm_separator style="style-4" is_style_black="on"][antfarm_separator style="style-5" is_style_black="on"][antfarm_separator style="style-1" is_style_black="off"][antfarm_separator style="style-2" is_style_black="off"][antfarm_separator style="style-3" is_style_black="off"][antfarm_separator style="style-4" is_style_black="off"][antfarm_separator style="style-5" is_style_black="off"][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="image" style="dark"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="05" line1="CALL" line2="TO ACTION"][/vc_column][/vc_row][vc_row][vc_column][antfarm_call_to_action title="We are the best in the bussiness" read_more_link="#" button_style="{``style``:``color-highlight``,``padding``:````,``rounded``:``rounded``}"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus semper mi efficitur libero finibus, non egestas tellus convallis. Donec lacus sapien, euismod et congue ut.[/antfarm_call_to_action][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="image" style="dark"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="06" line1="PROGRESS" line2="INDICATORS"][/vc_column][/vc_row][vc_row][vc_column width="1/3"][antfarm_progress_bar style="circle" title="LAYOUT DESIGN" progress="85" convert_1000_to_k="`{`object Object`}`"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.[/antfarm_progress_bar][/vc_column][vc_column width="1/3"][antfarm_progress_bar style="circle" title="WEB DEVELOPMENT" progress="90" convert_1000_to_k="`{`object Object`}`"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.[/antfarm_progress_bar][/vc_column][vc_column width="1/3"][antfarm_progress_bar style="circle" title="JET PILOTING" progress="57" convert_1000_to_k="`{`object Object`}`"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.[/antfarm_progress_bar][/vc_column][/vc_row][vc_row][vc_column width="1/3"][antfarm_progress_bar style="line" title="PHOTOSHOP" progress="80" convert_1000_to_k="`{`object Object`}`"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.[/antfarm_progress_bar][antfarm_progress_bar style="line" title="ILLUSTRATOR" progress="85" convert_1000_to_k="`{`object Object`}`"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.[/antfarm_progress_bar][/vc_column][vc_column width="1/3"][antfarm_progress_bar style="line" title="WORDPRESS" progress="95" convert_1000_to_k="`{`object Object`}`"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.[/antfarm_progress_bar][antfarm_progress_bar style="line" title="AFTER EFFECTS" progress="100" convert_1000_to_k="`{`object Object`}`"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.[/antfarm_progress_bar][/vc_column][vc_column width="1/3"][antfarm_progress_bar style="line" title="FRONTEND" progress="75" convert_1000_to_k="`{`object Object`}`"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.[/antfarm_progress_bar][antfarm_progress_bar style="line" title="CUBASE" progress="90" convert_1000_to_k="`{`object Object`}`"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.[/antfarm_progress_bar][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="image" style="dark"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="06" line1="PRICING" line2="TABLES"][/vc_column][/vc_row][vc_row][vc_column width="1/3"][antfarm_pricing_table title="STARTER PACKAGE" is_featured="off" price="$295" quota="MONTHLY" items="%5B%7B%22item%22%3A%22T-shirt%20and%20toaster%22%7D%2C%7B%22item%22%3A%22Rihanna\'s%20email%22%7D%2C%7B%22item%22%3A%22Telephonic%20support%22%7D%2C%7B%22item%22%3A%22Foldable%20time%20machine%22%7D%2C%7B%22item%22%3A%22Real%20life%20undo%20button%22%7D%5D" sign_up_text="SIGN UP" sign_up_link="#"][/vc_column][vc_column width="1/3"][antfarm_pricing_table title="PREMIUM PACKAGE" is_featured="on" price="$1230" quota="MONTHLY" items="%5B%7B%22item%22%3A%22T-shirt%20and%20toaster%22%7D%2C%7B%22item%22%3A%22Rihanna\'s%20email%22%7D%2C%7B%22item%22%3A%22Telephonic%20support%22%7D%2C%7B%22item%22%3A%22Foldable%20time%20machine%22%7D%2C%7B%22item%22%3A%22Real%20life%20undo%20button%22%7D%5D" sign_up_text="SIGN UP" sign_up_link="#"][/vc_column][vc_column width="1/3"][antfarm_pricing_table title="EXTRA PACKAGE" is_featured="off" price="$530" quota="MONTHLY" items="%5B%7B%22item%22%3A%22T-shirt%20and%20toaster%22%7D%2C%7B%22item%22%3A%22Rihanna\'s%20email%22%7D%2C%7B%22item%22%3A%22Telephonic%20support%22%7D%2C%7B%22item%22%3A%22Foldable%20time%20machine%22%7D%2C%7B%22item%22%3A%22Real%20life%20undo%20button%22%7D%5D" sign_up_text="SIGN UP" sign_up_link="#"][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="image" style="dark"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="07" line1="MEET" line2="THE TEAM"][/vc_column][/vc_row][vc_row][vc_column width="1/2"][antfarm_team_member style="team-member-element" shape="circle" avatar="'.$img_url.'" first_name="Markus" last_name="Washington" position="senior backend developer" aligment="left" titles="%5B%7B%22faicon%22%3A%22facebook%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22pinterest%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22twitter%22%2C%22title%22%3A%22%23%22%7D%5D"][/vc_column][vc_column width="1/2"][antfarm_team_member style="team-member-element" shape="circle" avatar="'.$img_url.'" first_name="Raoul" last_name="Jayaraman" position="senior ux designer" aligment="left" titles="%5B%7B%22faicon%22%3A%22facebook%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22vine%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22linkedin%22%2C%22title%22%3A%22%23%22%7D%5D"][/vc_column][/vc_row][vc_row][vc_column width="1/2"][antfarm_team_member style="team-member-element" shape="circle" avatar="'.$img_url.'" first_name="Jennifer" last_name="Hernandez" position="senior frontend developer" aligment="right" titles="%5B%7B%22faicon%22%3A%22facebook%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22pinterest%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22twitter%22%2C%22title%22%3A%22%23%22%7D%5D"][/vc_column][vc_column width="1/2"][antfarm_team_member style="team-member-element" shape="circle" avatar="'.$img_url.'" first_name="William" last_name="Richardson" position="junior designer" aligment="right" titles="%5B%7B%22faicon%22%3A%22facebook%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22vine%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22linkedin%22%2C%22title%22%3A%22%23%22%7D%5D"][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="image" style="dark"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="08" line1="SERVICES" line2="MODULE"][/vc_column][/vc_row][vc_row css=".vc_custom_1501337011076{margin-bottom: 30px !important;}"][vc_column width="1/3"][antfarm_service_lightbox title="WEB DEVELOPMENT" content_main="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec tincidunt eros." icon="icon-laptop" columns="2" title_lightbox="WEB DEVELOPMENT" title_1="A VERY NICE HEADING" content_1="Fusce auctor quis dolor vitae rutrum. Integer malesuada eu velit et faucibus. Maecenas dictum nulla non convallis sagittis. Vestibulum lobortis urna in velit dictum, et fermentum dolor consectetur. Nam sit amet nisi dolor. Nam ipsum neque, rhoncus vitae sollicitudin sit amet, aliquet ut augue. Phasellus sed leo ut enim finibus cursus. Nullam blandit arcu nisl, a tristique erat faucibus ut mauris certiman estib." title_2="YET ANOTHER SUPERB HEADING" content_2="Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In aliquam gravida mollis. Etiam convallis odio at vulputate rhoncus. In hac habitasse platea dictumst. Donec sit amet lacus at libero congue finibus sit amet quis purus. Suspendisse pellentesque tempor iaculis. Donec facilisis dui tristique lacus placerat iaculis. Sed vehicula ullamcorper sapien viverra pharetra vel at sem."][/vc_column][vc_column width="1/3"][antfarm_service_lightbox title="MARKETING STRATEGIES" content_main="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec tincidunt eros." icon="icon-strategy" columns="2" title_lightbox="MARKETING STRATEGIES" title_1="A VERY NICE HEADING" content_1="Fusce auctor quis dolor vitae rutrum. Integer malesuada eu velit et faucibus. Maecenas dictum nulla non convallis sagittis. Vestibulum lobortis urna in velit dictum, et fermentum dolor consectetur. Nam sit amet nisi dolor. Nam ipsum neque, rhoncus vitae sollicitudin sit amet, aliquet ut augue. Phasellus sed leo ut enim finibus cursus. Nullam blandit arcu nisl, a tristique erat faucibus ut mauris certiman estib." title_2="YET ANOTHER SUPERB HEADING" content_2="Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In aliquam gravida mollis. Etiam convallis odio at vulputate rhoncus. In hac habitasse platea dictumst. Donec sit amet lacus at libero congue finibus sit amet quis purus. Suspendisse pellentesque tempor iaculis. Donec facilisis dui tristique lacus placerat iaculis. Sed vehicula ullamcorper sapien viverra pharetra vel at sem."][/vc_column][vc_column width="1/3"][antfarm_service_lightbox title="COPY WRITING" content_main="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec tincidunt eros." icon="icon-pencil" columns="2" title_lightbox="COPY WRITING" title_1="A VERY NICE HEADING" content_1="Fusce auctor quis dolor vitae rutrum. Integer malesuada eu velit et faucibus. Maecenas dictum nulla non convallis sagittis. Vestibulum lobortis urna in velit dictum, et fermentum dolor consectetur. Nam sit amet nisi dolor. Nam ipsum neque, rhoncus vitae sollicitudin sit amet, aliquet ut augue. Phasellus sed leo ut enim finibus cursus. Nullam blandit arcu nisl, a tristique erat faucibus ut mauris certiman estib." title_2="YET ANOTHER SUPERB HEADING" content_2="Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In aliquam gravida mollis. Etiam convallis odio at vulputate rhoncus. In hac habitasse platea dictumst. Donec sit amet lacus at libero congue finibus sit amet quis purus. Suspendisse pellentesque tempor iaculis. Donec facilisis dui tristique lacus placerat iaculis. Sed vehicula ullamcorper sapien viverra pharetra vel at sem."][/vc_column][/vc_row][vc_row][vc_column width="1/3"][antfarm_service_lightbox title="UX / UI DESIGN" content_main="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec tincidunt eros." icon="icon-hotairballoon" columns="2" title_lightbox="UX / UI DESIGN" title_1="A VERY NICE HEADING" content_1="Fusce auctor quis dolor vitae rutrum. Integer malesuada eu velit et faucibus. Maecenas dictum nulla non convallis sagittis. Vestibulum lobortis urna in velit dictum, et fermentum dolor consectetur. Nam sit amet nisi dolor. Nam ipsum neque, rhoncus vitae sollicitudin sit amet, aliquet ut augue. Phasellus sed leo ut enim finibus cursus. Nullam blandit arcu nisl, a tristique erat faucibus ut mauris certiman estib." title_2="YET ANOTHER SUPERB HEADING" content_2="Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In aliquam gravida mollis. Etiam convallis odio at vulputate rhoncus. In hac habitasse platea dictumst. Donec sit amet lacus at libero congue finibus sit amet quis purus. Suspendisse pellentesque tempor iaculis. Donec facilisis dui tristique lacus placerat iaculis. Sed vehicula ullamcorper sapien viverra pharetra vel at sem."][/vc_column][vc_column width="1/3"][antfarm_service_lightbox title="MOBILE APP DEVELOPMENT" content_main="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec tincidunt eros." icon="icon-phone" columns="2" title_lightbox="MOBILE APP DEVELOPMENT" title_1="A VERY NICE HEADING" content_1="Fusce auctor quis dolor vitae rutrum. Integer malesuada eu velit et faucibus. Maecenas dictum nulla non convallis sagittis. Vestibulum lobortis urna in velit dictum, et fermentum dolor consectetur. Nam sit amet nisi dolor. Nam ipsum neque, rhoncus vitae sollicitudin sit amet, aliquet ut augue. Phasellus sed leo ut enim finibus cursus. Nullam blandit arcu nisl, a tristique erat faucibus ut mauris certiman estib." title_2="YET ANOTHER SUPERB HEADING" content_2="Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In aliquam gravida mollis. Etiam convallis odio at vulputate rhoncus. In hac habitasse platea dictumst. Donec sit amet lacus at libero congue finibus sit amet quis purus. Suspendisse pellentesque tempor iaculis. Donec facilisis dui tristique lacus placerat iaculis. Sed vehicula ullamcorper sapien viverra pharetra vel at sem."][/vc_column][vc_column width="1/3"][antfarm_service_lightbox title="AUDIENCE RESEARCH" content_main="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec tincidunt eros." icon="icon-search" columns="2" title_lightbox="AUDIENCE RESEARCH" title_1="A VERY NICE HEADING" content_1="Fusce auctor quis dolor vitae rutrum. Integer malesuada eu velit et faucibus. Maecenas dictum nulla non convallis sagittis. Vestibulum lobortis urna in velit dictum, et fermentum dolor consectetur. Nam sit amet nisi dolor. Nam ipsum neque, rhoncus vitae sollicitudin sit amet, aliquet ut augue. Phasellus sed leo ut enim finibus cursus. Nullam blandit arcu nisl, a tristique erat faucibus ut mauris certiman estib." title_2="YET ANOTHER SUPERB HEADING" content_2="Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In aliquam gravida mollis. Etiam convallis odio at vulputate rhoncus. In hac habitasse platea dictumst. Donec sit amet lacus at libero congue finibus sit amet quis purus. Suspendisse pellentesque tempor iaculis. Donec facilisis dui tristique lacus placerat iaculis. Sed vehicula ullamcorper sapien viverra pharetra vel at sem."][/vc_column][/vc_row][/vc_section]';


    $args = array(
        'post_title' => wp_strip_all_tags('ELEMENTS PART 1'),
        'post_content' => $cont,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_type' => 'page',

    );


    $page_id = wp_insert_post($args);
    $page_id_elements_1 = $page_id;



    update_post_meta($page_id, 'qucreative_'.'meta_scrollbar_theme', 'light');



    update_post_meta($page_id, 'qucreative_'.'meta_custom_title', 'ELEMENTS');
    update_post_meta($page_id, 'qucreative_'.'meta_bg_image', $img_url);





















    $cont = '[vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="01" line1="CREATIVE" line2="TEXT AND IMAGE"][/vc_column][/vc_row][vc_row][vc_column][antfarm_image_box media="'.$qucreative_import_demo_last_attach_id.'" aligment="left" text_aligment="`{`object Object`}`" heading="MEET THE MIND BLOWING Q CREATIVE"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.[/antfarm_image_box][antfarm_image_box media="'.$qucreative_import_demo_last_attach_id.'" aligment="right" text_aligment="`{`object Object`}`" heading="THE MOST CREATIVE THEME OUT THERE"]
<p style="text-align: right;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
[/antfarm_image_box][antfarm_image_box media="'.$qucreative_import_demo_last_attach_id.'" aligment="left" text_aligment="`{`object Object`}`" heading="NO COMPROMISES IN BUILDING THE Q"]
<p style="text-align: left;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
[/antfarm_image_box][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="02" line1="TEXT" line2="AND IMAGE"][/vc_column][/vc_row][vc_row][vc_column width="1/3"][antfarm_bullet_feature style="style-1" feature="image" title="REFINED AND ELEGANT" media="'.$img_url.'"]
<p style="text-align: center;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec tincidunt eros.</p>
[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-1" feature="image" title="VERY COOL HEADING" media="'.$img_url.'"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec tincidunt eros.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-1" feature="image" title="VERY COOL HEADING" media="'.$img_url.'"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec tincidunt eros.[/antfarm_bullet_feature][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="04" line1="VIDEO" line2="PLAYERS"][/vc_column][/vc_row][vc_row][vc_column][antfarm_video_player media="https://vimeo.com/23237102" cover="802"][antfarm_video_player media="https://www.youtube.com/watch?v=VA770wpLX-Q" cover="1472"][antfarm_video_player media="295"][antfarm_video_player media="https://vimeo.com/94166967" video_cover="1410"][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="05" line1="AUDIO" line2="PLAYLISTS"][/vc_column][/vc_row][vc_row][vc_column][antfarm_audio_playlist][antfarm_audio_player media="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3" title="External File Example" links="%5B%7B%22link%22%3A%22%23%22%2C%22label%22%3A%22BUY%22%7D%2C%7B%22link%22%3A%22%23%22%2C%22label%22%3A%22DOWNLOAD%22%7D%5D"][antfarm_audio_player media="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3" title="Another Example" links="%5B%7B%7D%5D"][antfarm_audio_player media="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3" title="Local Audio Example" links="%5B%7B%22link%22%3A%22%23%22%2C%22label%22%3A%22DOWNLOAD%22%7D%5D"][/antfarm_audio_playlist][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="06" line1="AUDIO" line2="PLAYERS"][/vc_column][/vc_row][vc_row][vc_column][antfarm_audio_player media="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3" title="Fiddy - All Of Us Here" links="%5B%7B%22link%22%3A%22%23%22%2C%22label%22%3A%22BUY%22%7D%2C%7B%22link%22%3A%22%23%22%2C%22label%22%3A%22DOWNLOAD%22%7D%5D"][antfarm_audio_player media="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3" title="Fiddy - The Rise And Fall" links="%5B%7B%7D%5D"][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="07" line1="FANCY" line2="SLIDER"][/vc_column][/vc_row][vc_row][vc_column][antfarm_image_slider images="'.$qucreative_import_demo_last_attach_id.','.$qucreative_import_demo_last_attach_id.','.$qucreative_import_demo_last_attach_id.'"][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="08" line1="SEXY" line2="CAROUSEL"][/vc_column][/vc_row][vc_row][vc_column][antfarm_carousel items="%5B%7B%22image%22%3A%22https://placeholdit.imgix.net/~text?txtsize=33&w=300&h=300%22%2C%22title%22%3A%22OPTIONAL%20TITLE%22%7D%2C%7B%22image%22%3A%22https://placeholdit.imgix.net/~text?txtsize=33&w=300&h=300%22%2C%22title%22%3A%22OPTIONAL%20TITLE%22%7D%2C%7B%22image%22%3A%22https://placeholdit.imgix.net/~text?txtsize=33&w=300&h=300%22%2C%22title%22%3A%22OPTIONAL%20TITLE%22%7D%2C%7B%22image%22%3A%22https://placeholdit.imgix.net/~text?txtsize=33&w=300&h=300%22%2C%22title%22%3A%22OPTIONAL%20TITLE%22%7D%2C%7B%22image%22%3A%22https://placeholdit.imgix.net/~text?txtsize=33&w=300&h=300%22%2C%22title%22%3A%22OPTIONAL%20TITLE%22%7D%2C%7B%22image%22%3A%22https://placeholdit.imgix.net/~text?txtsize=33&w=300&h=300%22%2C%22title%22%3A%22OPTIONAL%20TITLE%22%7D%2C%7B%22image%22%3A%22https://placeholdit.imgix.net/~text?txtsize=33&w=300&h=300%22%2C%22title%22%3A%22OPTIONAL%20TITLE%22%7D%2C%7B%22image%22%3A%22https://placeholdit.imgix.net/~text?txtsize=33&w=300&h=300%22%2C%22title%22%3A%22OPTIONAL%20TITLE%22%7D%2C%7B%22image%22%3A%22https://placeholdit.imgix.net/~text?txtsize=33&w=300&h=300%22%2C%22title%22%3A%22OPTIONAL%20TITLE%22%7D%5D"][/vc_column][/vc_row][/vc_section]';


    $args = array(
        'post_title' => wp_strip_all_tags('ELEMENTS PART 2'),
        'post_content' => $cont,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_type' => 'page',

    );


    $page_id = wp_insert_post($args);
    $page_id_elements_2 = $page_id;







    update_post_meta($page_id, 'qucreative_'.'meta_custom_title', 'ELEMENTS');
    update_post_meta($page_id, 'qucreative_'.'meta_bg_image', $img_url);





























	$option_name = 'sidebars_widgets';
	$option_value = 'a:4:{s:19:"wp_inactive_widgets";a:0:{}s:9:"sidebar-1";a:8:{i:0;s:16:"antfarm_search-2";i:1;s:20:"antfarm_categories-2";i:2;s:22:"antfarm_latest_posts-2";i:3;s:17:"antfarm_archive-2";i:4;s:25:"antfarm_lightboxgallery-2";i:5;s:6:"text-3";i:6;s:16:"antfarm_social-4";i:7;s:10:"calendar-4";}s:14:"sidebar-footer";a:4:{i:0;s:6:"text-4";i:1;s:22:"antfarm_latest_posts-3";i:2;s:15:"antfarm_links-2";i:3;s:16:"antfarm_social-5";}s:13:"array_version";i:3;}';



	qucreative_import_demo_update_widget($option_name,$option_value);






	$option_name = 'widget_antfarm_search';
	$option_value = 'a:2:{i:2;a:3:{s:5:"title";s:0:"";s:11:"button_text";s:0:"";s:20:"heading_style_button";s:0:"";}s:12:"_multiwidget";i:1;}';

	qucreative_import_demo_update_widget($option_name,$option_value);


	$option_name = 'widget_antfarm_latest_posts';
	$option_value = 'a:3:{i:2;a:3:{s:5:"title";s:12:"LATEST POSTS";s:5:"count";s:1:"3";s:15:"thumb_dimension";s:0:"";}i:3;a:3:{s:5:"title";s:12:"LATEST POSTS";s:5:"count";s:1:"2";s:15:"thumb_dimension";s:0:"";}s:12:"_multiwidget";i:1;}';

	qucreative_import_demo_update_widget($option_name,$option_value);


	$option_name = 'widget_antfarm_categories';
	$option_value = 'a:2:{i:2;a:1:{s:5:"title";s:10:"Categories";}s:12:"_multiwidget";i:1;}';

	qucreative_import_demo_update_widget($option_name,$option_value);


	$option_name = 'widget_antfarm_archive';
	$option_value = 'a:2:{i:2;a:2:{s:5:"title";s:7:"ARCHIVE";s:5:"count";s:1:"3";}s:12:"_multiwidget";i:1;}';

	qucreative_import_demo_update_widget($option_name,$option_value);


	$option_name = 'widget_antfarm_links';
	$option_value = 'a:2:{i:2;a:2:{s:5:"title";s:13:"LINKS EXAMPLE";s:8:"repeater";s:156:"[{"title":"Hall of fame","link":"#"},{"title":"The philosophy","link":"#"},{"title":"Customer reviews","link":"#"},{"title":"About the company","link":"#"}]";}s:12:"_multiwidget";i:1;}';

	qucreative_import_demo_update_widget($option_name,$option_value);


	$option_name = 'widget_antfarm_social';
	$option_value = 'a:4:{i:2;a:2:{s:5:"title";s:12:"Widget Title";s:8:"repeater";s:43:"[{"title":"facebook","link":"#","icon":""}]";}i:4;a:2:{s:5:"title";s:10:"GET SOCIAL";s:8:"repeater";s:151:"[{"title":"Facebook","link":"#","icon":"facebook"},{"title":"Twitter","link":"#","icon":"twitter"},{"title":"Pinterest","link":"#","icon":"pinterest"}]";}i:5;a:2:{s:5:"title";s:10:"GET SOCIAL";s:8:"repeater";s:152:"[{"title":"Facebook","link":"#","icon":"facebook"},{"title":"Twitter","link":"#","icon":"twitter"},{"title":"YouTube","link":"#","icon":"youtube-play"}]";}s:12:"_multiwidget";i:1;}';

	qucreative_import_demo_update_widget($option_name,$option_value);


	$option_name = 'widget_antfarm_archive';
	$option_value = 'a:2:{i:2;a:2:{s:5:"title";s:7:"Archive";s:5:"count";s:1:"9";}s:12:"_multiwidget";i:1;}';

	qucreative_import_demo_update_widget($option_name,$option_value);


	$option_name = 'widget_antfarm_lightboxgallery';
	$option_value = 'a:2:{i:2;a:4:{s:5:"title";s:7:"GALLERY";s:5:"count";s:1:"9";s:10:"nr_columns";s:1:"3";s:4:"cats";a:1:{i:0;s:'.strlen($gallery1_term_id).':"'.$gallery1_term_id.'";}}s:12:"_multiwidget";i:1;}';

	qucreative_import_demo_update_widget($option_name,$option_value);


	$option_name = 'widget_antfarm_contact';
	$option_value = 'a:2:{i:3;a:4:{s:5:"title";s:7:"Contact";s:7:"address";s:6:"jkljkl";s:9:"telephone";s:4:"jklk";s:5:"email";s:10:"lkjljklhkl";}s:12:"_multiwidget";i:1;}';

	qucreative_import_demo_update_widget($option_name,$option_value);





	$option_name = 'widget_search';
	$option_value = 'a:3:{i:6;a:1:{s:5:"title";s:0:"";}i:7;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;}';

	qucreative_import_demo_update_widget($option_name,$option_value);



	$option_name = 'widget_calendar';
	$option_value = 'a:2:{i:4;a:1:{s:5:"title";s:13:"SEXY CALENDAR";}s:12:"_multiwidget";i:1;}';

	qucreative_import_demo_update_widget($option_name,$option_value);






	$option_name = 'widget_text';
	$option_value = 'a:4:{i:1;a:0:{}i:3;a:4:{s:5:"title";s:14:"ABOUT THE BLOG";s:4:"text";s:232:"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.";s:6:"filter";b:1;s:6:"visual";b:1;}i:4;a:4:{s:5:"title";s:8:"ABOUT US";s:4:"text";s:183:"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamc.";s:6:"filter";b:1;s:6:"visual";b:1;}s:12:"_multiwidget";i:1;}';

	qucreative_import_demo_update_widget($option_name,$option_value);






	$option_name = 'widget_archives';
	$option_value = 'a:2:{i:3;a:3:{s:5:"title";s:8:"Archives";s:5:"count";i:0;s:8:"dropdown";i:0;}s:12:"_multiwidget";i:1;}';

	qucreative_import_demo_update_widget($option_name,$option_value);





















	$cont = '[vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="01" line1="TEAM" line2="MEMBERS"][/vc_column][/vc_row][vc_row][vc_column width="1/4"][antfarm_team_member style="team-member-element-2" shape="`{`object Object`}`" avatar="'.$img_url.'" first_name="MARKUS" last_name="WASHINGTON" position="senior backend developer" aligment="left" titles="%5B%7B%22faicon%22%3A%22facebook%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22pinterest%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22twitter%22%2C%22title%22%3A%22%23%22%7D%5D" is_square="off"][/vc_column][vc_column width="1/4"][antfarm_team_member style="team-member-element-2" shape="`{`object Object`}`" avatar="'.$img_url.'" first_name="WILLIAM" last_name="SMITHENSON" position="senior frontend developer" aligment="left" titles="%5B%7B%22faicon%22%3A%22facebook%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22pinterest%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22twitter%22%2C%22title%22%3A%22%23%22%7D%5D" is_square="off"][/vc_column][vc_column width="1/4"][antfarm_team_member style="team-member-element-2" shape="`{`object Object`}`" avatar="'.$img_url.'" first_name="JESSICA" last_name="WATSON" position="senior designer" aligment="left" titles="%5B%7B%22faicon%22%3A%22facebook%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22pinterest%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22twitter%22%2C%22title%22%3A%22%23%22%7D%5D" is_square="off"][/vc_column][vc_column width="1/4"][antfarm_team_member style="team-member-element-2" shape="`{`object Object`}`" avatar="'.$img_url.'" first_name="MARY JANE" last_name="WASHINGTON" position="junior designer" aligment="left" titles="%5B%7B%22faicon%22%3A%22facebook%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22pinterest%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22twitter%22%2C%22title%22%3A%22%23%22%7D%5D" is_square="off"][/vc_column][/vc_row][vc_row][vc_column width="1/4"][antfarm_team_member style="team-member-element-2" shape="`{`object Object`}`" avatar="'.$img_url.'" first_name="MARKUS" last_name="WASHINGTON" position="senior backend developer" aligment="left" titles="%5B%7B%22faicon%22%3A%22facebook%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22pinterest%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22twitter%22%2C%22title%22%3A%22%23%22%7D%5D" is_square="on"][/vc_column][vc_column width="1/4"][antfarm_team_member style="team-member-element-2" shape="`{`object Object`}`" avatar="'.$img_url.'" first_name="MICHAEL" last_name="BALTIMORE" position="senior frontend developer" aligment="left" titles="%5B%7B%22faicon%22%3A%22facebook%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22pinterest%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22twitter%22%2C%22title%22%3A%22%23%22%7D%5D" is_square="on"][/vc_column][vc_column width="1/4"][antfarm_team_member style="team-member-element-2" shape="`{`object Object`}`" avatar="'.$img_url.'" first_name="PAMELA" last_name="JOHNSON" position="graphic designer" aligment="left" titles="%5B%7B%22faicon%22%3A%22facebook%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22pinterest%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22twitter%22%2C%22title%22%3A%22%23%22%7D%5D" is_square="on"][/vc_column][vc_column width="1/4"][antfarm_team_member style="team-member-element-2" shape="`{`object Object`}`" avatar="'.$img_url.'" first_name="JESSICA" last_name="FLOWERPOWER" position="web designer" aligment="left" titles="%5B%7B%22faicon%22%3A%22facebook%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22pinterest%22%2C%22title%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22twitter%22%2C%22title%22%3A%22%23%22%7D%5D" is_square="on"][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="03" line1="WICKED" line2="NUMBERS"][/vc_column][/vc_row][vc_row][vc_column width="1/4"][antfarm_progress_bar style="rect" title="PROJECTS" progress="198" convert_1000_to_k="`{`object Object`}`" icon="icon-briefcase"][/antfarm_progress_bar][/vc_column][vc_column width="1/4"][antfarm_progress_bar style="rect" title="COFFEE CUPS" progress="59" convert_1000_to_k="`{`object Object`}`" icon="icon-hourglass"][/antfarm_progress_bar][/vc_column][vc_column width="1/4"][antfarm_progress_bar style="rect" title="TROPHIES" progress="214" convert_1000_to_k="`{`object Object`}`" icon="icon-trophy"][/antfarm_progress_bar][/vc_column][vc_column width="1/4"][antfarm_progress_bar style="rect" title="STREET SIGNS" progress="34" convert_1000_to_k="off" icon="icon-shield"][/antfarm_progress_bar][/vc_column][/vc_row][vc_row][vc_column width="1/4"][antfarm_progress_bar style="rect" title="PROJECTS" progress="198" convert_1000_to_k="`{`object Object`}`"][/antfarm_progress_bar][/vc_column][vc_column width="1/4"][antfarm_progress_bar style="rect" title="COFFEE CUPS" progress="59" convert_1000_to_k="`{`object Object`}`"][/antfarm_progress_bar][/vc_column][vc_column width="1/4"][antfarm_progress_bar style="rect" title="TROPHIES" progress="214" convert_1000_to_k="`{`object Object`}`"][/antfarm_progress_bar][/vc_column][vc_column width="1/4"][antfarm_progress_bar style="rect" title="STREET SIGNS" progress="34" convert_1000_to_k="`{`object Object`}`"][/antfarm_progress_bar][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="04" line1="LATEST" line2="BLOG POSTS"][/vc_column][/vc_row][vc_row][vc_column][antfarm_latest_posts count="6"][/vc_column][/vc_row][vc_row][vc_column][antfarm_latest_posts_2 count="4" excerpt_length="400" button_style="{``style``:``style-hallowblack``,``padding``:``padding-medium``,``rounded``:``rounded``}"][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="05" line1="FUNKY" line2="MENU"][/vc_column][/vc_row][vc_row][vc_column][antfarm_tta_tabs dzsvcs_id="tabs-3224897" skin="skin-menu" active_section="0"][vc_tta_section title="PIZZA" tab_id="1466630016956-11a8639a-7502"][antfarm_menu_item title="Quattro Stagioni" price="$19" ingredients="Pasta di pomodor, mozarella, prosciuto crudo, mushrooms" titles="%5B%7B%22label%22%3A%22MOST%20POPULAR%22%2C%22color%22%3A%22%23ff8000%22%7D%5D"][antfarm_menu_item title="Diavola" price="$17" ingredients="Pasta di pomodor, mozarella, prosciuto crudo, mushrooms" titles="%5B%5D"][antfarm_menu_item title="Veggie" price="$14" ingredients="Pasta di pomodor, mozarella, prosciuto crudo, mushrooms" titles="%5B%7B%22label%22%3A%22MOST%20POPULAR%22%2C%22color%22%3A%22%23ff8000%22%7D%2C%7B%22label%22%3A%22VEGETARIAN%22%2C%22color%22%3A%22%2381d742%22%7D%5D"][antfarm_menu_item title="Deluxe" price="$238" ingredients="Pasta di pomodor, mozarella, prosciuto crudo, mushrooms" titles="%5B%5D"][/vc_tta_section][vc_tta_section title="PRIMI PIATTI" tab_id="1466630017029-17ad5c16-9baf"][vc_column_text]
<h6 class="paragraph-heading">PLACE ANY TYPE OF CONTENT HERE, ANY NUMBER OF COLUMNS</h6>
<div class="paragraph">

Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.

Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error.

</div>
[/vc_column_text][/vc_tta_section][vc_tta_section title="SECONDI PIATTI" tab_id="1467025778640-4cfa5861-ba4f"][vc_row_inner][vc_column_inner][antfarm_portfolio skin="skin-gazelia skin-gazelia--transparent" zfolio-mode="mode-normal" link_whole_item="zoombox" gap="1px" posts_per_page="10" pagination_method="off" cat="gallery-classic" filters_enable="off" layout="dzs-layout--5-cols"][/vc_column_inner][/vc_row_inner][/vc_tta_section][/antfarm_tta_tabs][/vc_column][/vc_row][vc_row][vc_column][antfarm_tta_tabs dzsvcs_id="tabs-3224897" skin="skin-menu" active_section="0"][vc_tta_section title="PIZZA" tab_id="1467025863460-4a3672ee-cfb2"][antfarm_menu_item media="'.$img_url.'" title="Quattro Stagioni" price="$19" ingredients="Pasta di pomodor, mozarella, prosciuto crudo, mushrooms" titles="%5B%7B%22label%22%3A%22MOST%20POPULAR%22%2C%22color%22%3A%22%23ff8000%22%7D%5D"][antfarm_menu_item media="'.$img_url.'" title="Diavola" price="$17" ingredients="Pasta di pomodor, mozarella, prosciuto crudo, mushrooms" titles="%5B%7B%7D%5D"][antfarm_menu_item media="'.$img_url.'" title="Veggie" price="$14" ingredients="Pasta di pomodor, mozarella, prosciuto crudo, mushrooms" titles="%5B%7B%22label%22%3A%22MOST%20POPULAR%22%2C%22color%22%3A%22%23ff8000%22%7D%2C%7B%22label%22%3A%22VEGETARIAN%22%2C%22color%22%3A%22%2381d742%22%7D%5D"][antfarm_menu_item media="'.$img_url.'" title="Deluxe" price="$238" ingredients="Pasta di pomodor, mozarella, prosciuto crudo, mushrooms" titles="%5B%7B%7D%5D"][/vc_tta_section][vc_tta_section title="PRIMI PIATTI" tab_id="1467025863890-dfe8dac3-d732"][vc_column_text]
<h6 class="paragraph-heading">ADD ANY CONTENT HERE, ANY NUMBER OF COLUMNS</h6>
<p class="paragraph-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error.[/vc_column_text][/vc_tta_section][vc_tta_section title="SECONDI PIATTI" tab_id="1467025864054-b74dbad5-12eb"][vc_row_inner][vc_column_inner width="1/3"][antfarm_bullet_feature style="style-3" feature="feature-type-fa" icon_aligment="" title="ADD ANY CONTENT" faicon="hand-o-right fa-fw"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc aliquam porttitor ex a dapibus. Duis euismod, neque eu efficitur rutrum, urna enim ultricies odio, id scelerisque turpis nisi rutrum velit.[/antfarm_bullet_feature][/vc_column_inner][vc_column_inner width="1/3"][antfarm_bullet_feature style="style-3" feature="feature-type-fa" icon_aligment="" title="ADD ANY CONTENT" faicon="hand-o-right fa-fw"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc aliquam porttitor ex a dapibus. Duis euismod, neque eu efficitur rutrum, urna enim ultricies odio, id scelerisque turpis nisi rutrum velit.[/antfarm_bullet_feature][/vc_column_inner][vc_column_inner width="1/3"][antfarm_bullet_feature style="style-3" feature="feature-type-fa" icon_aligment="" title="ADD ANY CONTENT" faicon="hand-o-right fa-fw"]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc aliquam porttitor ex a dapibus. Duis euismod, neque eu efficitur rutrum, urna enim ultricies odio, id scelerisque turpis nisi rutrum velit.[/antfarm_bullet_feature][/vc_column_inner][/vc_row_inner][/vc_tta_section][/antfarm_tta_tabs][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="06" line1="SIDEWAYS" line2="LINE ICONS BOXES"][/vc_column][/vc_row][vc_row][vc_column width="1/3"][antfarm_bullet_feature style="style-3" feature="feature-type-et" icon_aligment="icon-align-right" title="SUPER SMART" eticon="icon-heart" aligment="align-right"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec tincidunt eros.[/antfarm_bullet_feature][vc_empty_space height="50px"][antfarm_bullet_feature style="style-3" feature="feature-type-et" icon_aligment="icon-align-right" title="USER FRIENDLY" eticon="icon-pencil" aligment="align-right"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec tincidunt eros.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_image_for_sideways media="'.$img_url.'"][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-3" feature="feature-type-et" icon_aligment="" title="HIGH QUALITY" eticon="icon-strategy" aligment=""]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec tincidunt eros.[/antfarm_bullet_feature][vc_empty_space height="50px"][antfarm_bullet_feature style="style-3" feature="feature-type-et" icon_aligment="" title="REFINED AND ELEGANT" eticon="icon-hotairballoon" aligment=""]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec tincidunt eros.[/antfarm_bullet_feature][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="07" line1="SIDEWAYS" line2="FA ICONS BOXES"][/vc_column][/vc_row][vc_row][vc_column width="1/3"][antfarm_bullet_feature style="style-4" feature="feature-type-fa" icon_aligment="icon-align-right" icon_theme=" " form="form-circle" title="SUPER SMART" faicon="flag " aligment="align-right"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec.[/antfarm_bullet_feature][vc_empty_space height="30px"][antfarm_bullet_feature style="style-4" feature="feature-type-fa" icon_aligment="icon-align-right" icon_theme=" " form="form-circle" title="SUPER SMART" faicon="cube" aligment="align-right"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec.[/antfarm_bullet_feature][vc_empty_space height="30px"][antfarm_bullet_feature style="style-4" feature="feature-type-fa" icon_aligment="icon-align-right" icon_theme=" " form="form-circle" title="SUPER SMART" faicon="gift" aligment="align-right"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_image_for_sideways media="'.$img_url.'"][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-4" feature="feature-type-fa" icon_aligment="" icon_theme=" " form="form-default" title="SUPER SMART" faicon="toggle-on" aligment=""]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec.[/antfarm_bullet_feature][vc_empty_space height="30px"][antfarm_bullet_feature style="style-4" feature="feature-type-fa" icon_aligment="" icon_theme=" " form="form-hexagon" title="SUPER SMART" faicon="leaf" aligment=""]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec.[/antfarm_bullet_feature][vc_empty_space height="30px"][antfarm_bullet_feature style="style-4" feature="feature-type-fa" icon_aligment="" icon_theme=" " form="form-circle" title="SUPER SMART" faicon="heart" aligment=""]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec.[/antfarm_bullet_feature][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="08" line1="CLIENTS" line2="LIST"][/vc_column][/vc_row][vc_row][vc_column][antfarm_client_list titles="%5B%7B%22media%22%3A%22http%3A%2F%2Fcreativewpthemes.net%2Fmain-demo%2Fwp-content%2Fuploads%2F2016%2F05%2F1___M.png%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22media%22%3A%22http%3A%2F%2Fcreativewpthemes.net%2Fmain-demo%2Fwp-content%2Fuploads%2F2016%2F05%2F2___M.png%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22media%22%3A%22http%3A%2F%2Fcreativewpthemes.net%2Fmain-demo%2Fwp-content%2Fuploads%2F2016%2F05%2F3___M.png%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22media%22%3A%22http%3A%2F%2Fcreativewpthemes.net%2Fmain-demo%2Fwp-content%2Fuploads%2F2016%2F05%2F4___M.png%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22media%22%3A%22http%3A%2F%2Fcreativewpthemes.net%2Fmain-demo%2Fwp-content%2Fuploads%2F2016%2F05%2F5___M.png%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22media%22%3A%22http%3A%2F%2Fcreativewpthemes.net%2Fmain-demo%2Fwp-content%2Fuploads%2F2016%2F05%2F6___M.png%22%2C%22link%22%3A%22%23%22%7D%5D"][/vc_column][/vc_row][/vc_section]';


    $args = array(
        'post_title' => wp_strip_all_tags('ELEMENTS PART 3'),
        'post_content' => $cont,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_type' => 'page',

    );


    $page_id = wp_insert_post($args);

    $page_id_elements_3 = $page_id;






    update_post_meta($page_id, 'qucreative_'.'meta_custom_title', 'ELEMENTS');
    update_post_meta($page_id, 'qucreative_'.'meta_bg_image', $img_url);






























    $cont = '[vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="01" line1="PORTFOLIO CLASSIC" line2="EXAMPLES"][/vc_column][/vc_row][vc_row][vc_column][antfarm_portfolio skin="skin-melbourne" zfolio-mode="mode-normal" link_whole_item="portfolio_item" posts_per_page="6" enable_bordered_design="on" cat="portfolio-classic" layout="dzs-layout--3-cols"][/vc_column][/vc_row][vc_row][vc_column][antfarm_separator style="style-2" height="70" custom_color="#dddddd" is_style_black="off"][/vc_column][/vc_row][vc_row css=".vc_custom_1500340915550{margin-bottom: 30px !important;}"][vc_column][antfarm_portfolio skin="skin-melbourne" zfolio-mode="mode-normal" link_whole_item="portfolio_item" gap="1px" posts_per_page="8" pagination_method="off" cat="portfolio-classic" filters_enable="off" heading_style_title="h6" layout="dzs-layout--4-cols"][/vc_column][/vc_row][vc_row][vc_column][vc_custom_heading text="This is just an example, the customization options give limitless possibilities" font_container="tag:h2|font_size:27|text_align:center|color:%23222222|line_height:1.1" google_fonts="font_family:Gochi%20Hand%3Aregular|font_style:400%20regular%3A400%3Anormal"][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="02" line1="PORTFOLIO STACK" line2="EXAMPLE"][/vc_column][/vc_row][vc_row][vc_column][antfarm_portfolio skin="skin-silver" zfolio-mode="mode-normal" link_whole_item="zoombox_item" gap="1px" posts_per_page="12" cat="portfolio-fullscreen" filters_position="center" layout="expandable-5cols-example"][/vc_column][/vc_row][vc_row][vc_column][antfarm_separator style="style-2" height="70" custom_color="#dddddd" is_style_black="off"][/vc_column][/vc_row][vc_row css=".vc_custom_1500340921374{margin-bottom: 30px !important;}"][vc_column][antfarm_portfolio skin="skin-silver" zfolio-mode="mode-normal" link_whole_item="zoombox_item" gap="10px" posts_per_page="6" pagination_method="off" cat="portfolio-fullscreen" filters_position="right" layout="dzs-layout--3-cols"][/vc_column][/vc_row][vc_row][vc_column][vc_custom_heading text="This is just an example, the customization options give limitless possibilities" font_container="tag:h2|font_size:27|text_align:center|color:%23222222|line_height:1.1" google_fonts="font_family:Gochi%20Hand%3Aregular|font_style:400%20regular%3A400%3Anormal"][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="03" line1="PORTFOLIO EXPANDABLE" line2="EXAMPLE"][/vc_column][/vc_row][vc_row][vc_column][antfarm_portfolio skin="skin-qucreative zfolio-portfolio-expandable" link_whole_item="item_excerpt" gap="3px" cat="portfolio-expandable" layout="expandable-5cols-example"][/vc_column][/vc_row][vc_row][vc_column][antfarm_separator style="style-2" height="70" custom_color="#dddddd" is_style_black="off"][/vc_column][/vc_row][vc_row css=".vc_custom_1500340946628{margin-bottom: 30px !important;}"][vc_column][antfarm_portfolio skin="skin-qucreative zfolio-portfolio-expandable" link_whole_item="item_excerpt" gap="5px" posts_per_page="8" cat="portfolio-expandable" layout="dzs-layout--4-cols"][/vc_column][/vc_row][vc_row][vc_column][vc_custom_heading text="This is just an example, the customization options give limitless possibilities" font_container="tag:h2|font_size:27|text_align:center|color:%23222222|line_height:1.1" google_fonts="font_family:Gochi%20Hand%3Aregular|font_style:400%20regular%3A400%3Anormal"][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="04" line1="GALLERY ULTRA" line2="EXAMPLE"][/vc_column][/vc_row][vc_row][vc_column][antfarm_portfolio skin="skin-gazelia skin-gazelia--transparent" zfolio-mode="mode-normal" link_whole_item="zoombox" gap="1px" posts_per_page="6" cat="gallery-classic" filters_position="right" pagination_position="right" layout="dzs-layout--3-cols"][/vc_column][/vc_row][vc_row][vc_column][antfarm_separator style="style-2" height="70" custom_color="#dddddd" is_style_black="off"][/vc_column][/vc_row][vc_row][vc_column][antfarm_portfolio skin="skin-gazelia skin-gazelia--transparent" zfolio-mode="mode-normal" link_whole_item="zoombox" gap="5px" pagination_method="off" title_hover="off" cat="gallery-classic" filters_enable="off" layout="expandable-5cols-example"][/vc_column][/vc_row][vc_row][vc_column][antfarm_separator style="style-2" height="70" custom_color="#dddddd" is_style_black="off"][/vc_column][/vc_row][vc_row css=".vc_custom_1500340934402{margin-bottom: 30px !important;}"][vc_column][antfarm_portfolio skin="skin-gazelia skin-gazelia--transparent" zfolio-mode="mode-cols" link_whole_item="zoombox" gap="10px" pagination_method="scroll" cat="gallery-masonry" filters_position="right" layout="dzs-layout--4-cols"][/vc_column][/vc_row][vc_row][vc_column][vc_custom_heading text="This is just an example, the customization options give limitless possibilities" font_container="tag:h2|font_size:27|text_align:center|color:%23222222|line_height:1.1" google_fonts="font_family:Gochi%20Hand%3Aregular|font_style:400%20regular%3A400%3Anormal"][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="heading-is-center" line1="COMPLETELY CUSTOMIZE THE" line2="PORTFOLIOS AND GALLERIES"][/vc_column][/vc_row][vc_row][vc_column width="1/3"][antfarm_bullet_feature style="style-1" feature="feature-type-et" title="PORTFOLIO + SINGLE = LOVE" eticon="icon-beaker"]
<p style="text-align: center;">Choose the Portfolio/Gallery main type you want, and assign it the Single Project/Lightbox type you want. Exceptions are Portfolio Expandable and Lights Out Gallery which are tied to their singles in the same element.</p>
[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-1" feature="feature-type-et" title="GRID LAYOUT BUILDER" eticon="icon-grid"]
<p style="text-align: center;">Build your portfolios or galleries just the way you want, by controlling the size of each thumbnail with our state of the art visual builder. Of course that is purely optional, you can keep it simple with the default columns.</p>
[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-1" feature="feature-type-et" title="ADD THEM ANYWHERE" eticon="icon-scissors"]
<p style="text-align: center;">The Portfolio/Gallery engine is an element, and it can be added to any page, anywhere, just like any other element. Exception is the Lights Out Gallery, as it is a standalone and it requires its own separate page.</p>
[/antfarm_bullet_feature][/vc_column][/vc_row][vc_row][vc_column width="1/3"][antfarm_bullet_feature style="style-1" feature="feature-type-et" title="FIND ITEMS EASILY" eticon="icon-magnifying-glass"]Find the exact portfolio or gallery item you need with ease, as we added thumbnails to portfolio and gallery items, and they are perfectly organized by the categories you created. You will see, this is a total time saver.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-1" feature="feature-type-et" title="REORDER MANUALLY" eticon="icon-layers"]
<p style="text-align: center;">We know how frustrating it is to not have control over the order of your portfolio and gallery items, so we included the possibility of manually re-ordering them as you wish, both with arrows, and drag and drop.</p>
[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-1" feature="feature-type-et" title="YOUR WEBSITE, YOUR WAY" eticon="icon-trophy"]
<p style="text-align: center;">We thought about everything when building Qu, and the Portfolio/Gallery engine was no exception. You have absolute total control over everything, and the backend gems that we added are both time and life savers.</p>
[/antfarm_bullet_feature][/vc_column][/vc_row][/vc_section]';


    $args = array(
        'post_title' => wp_strip_all_tags('ELEMENTS PORTFOLIOS / GALLERIES LIGHT'),
        'post_content' => $cont,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_type' => 'page',

    );


    $page_id = wp_insert_post($args);


    $page_id_showcase = $page_id;





    update_post_meta($page_id, 'qucreative_'.'meta_custom_title', 'WORKS');
    update_post_meta($page_id, 'qucreative_'.'meta_bg_image', $img_url);






























    $cont = '[vc_row][vc_column][antfarm_portfolio skin="skin-gazelia skin-gazelia--transparent" zfolio-mode="mode-normal" link_whole_item="zoombox" gap="1px" posts_per_page="9" cat="gallery-classic" heading_style_title="h6" mode="" layout="dzs-layout--3-cols"][/vc_column][/vc_row]';


    $args = array(
        'post_title' => wp_strip_all_tags('GALLERY ULTRA CLASSIC 3 BOXED'),
        'post_content' => $cont,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_type' => 'page',

    );


    $page_id = wp_insert_post($args);









    update_post_meta( $page_id, '_wp_page_template', 'template-portfolio.php' );;











    update_post_meta($page_id, 'qucreative_'.'meta_scrollbar_theme', 'light');



    update_post_meta($page_id, 'qucreative_'.'meta_custom_title', 'GALLERY');
    update_post_meta($page_id, 'qucreative_'.'meta_bg_image', $img_url);

















    $cont = '[vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_sc_progress bg="'.$img_url.'" overlay_opacity="50" convert_1000_to_k="off" title_1="AWESOME PROJECTS" progress_1="287" eticon_1="icon-briefcase" title_2="HAPPY CLIENTS" progress_2="97" eticon_2="icon-profile-male" title_3="PRODUCTS PAUNCHED" progress_3="125" eticon_3="icon-hotairballoon" title_4="CITIES WE ARE IN" progress_4="24" eticon_4="icon-map" media="'.$img_url.'"][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="image" style="light" bg="'.$img_url.'"][vc_row][vc_column][antfarm_sc_social_links media="'.$img_url.'" title_1="LIKE US ON" social_1="Facebook" icon_1="facebook-square" title_2="FOLLOW US ON" social_2="Twitter" icon_2="twitter" title_3="PIN THIS ON" social_3="Pinterest" icon_3="pinterest" title_4="APPRECIATE US ON" social_4="Google+" icon_4="google-plus"][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_sc_contact_form bg="'.$img_url.'"][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_sc_testimonials media="'.$img_url.'" overlay_opacity="50" tests="%5B%7B%22title%22%3A%22TESTIMONIALS%22%2C%22name%22%3A%22Francis%20Watson%22%2C%22position%22%3A%22CCO%20at%20Orange%20Studios%22%2C%22the_test%22%3A%22I%20loved%20working%20with%20the%20guys%20from%20Q%20Creative%20Studio.%20They%20are%20extremely%20talented%2C%20super%20creative%20and%20the%20project%20was%20ready%20before%20the%20deadline.%20I%20strongly%20recommend%20them.%22%7D%2C%7B%22title%22%3A%22TESTIMONIALS%22%2C%22name%22%3A%22Jessica%20Donovan%22%2C%22position%22%3A%22CEO%20at%20Orlando%20Incorporated%22%2C%22the_test%22%3A%22This%20is%20the%20best%20experience%20I\'ve%20ever%20had%20so%20far%20with%20a%20design%20studio.%20The%20project%20was%20done%20quickly%20and%20the%20quality%20is%20outstanding.%22%7D%2C%7B%22title%22%3A%22TESTIMONIALS%22%2C%22name%22%3A%22Emanuel%20Schmidt%22%2C%22position%22%3A%22Developer%20at%20XS%20Arts%22%2C%22the_test%22%3A%22The%20Q%20Creative%20team%20is%20really%20impressive%2C%20and%20very%20fun%20to%20work%20with.%20I%20think%20behind%20their%20success%20is%20that%20they%20love%20what%20they\'re%20doing%2C%20so%20they%20don\'t%20feel%20like%20working.%22%7D%5D" heading_style_name="h4"][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_sc_client_slider media="'.$img_url.'" client="%5B%7B%22logo%22%3A%22'.$img_url.'%22%7D%2C%7B%22logo%22%3A%22'.$img_url.'%22%7D%2C%7B%22logo%22%3A%22'.$img_url.'%22%7D%2C%7B%22logo%22%3A%22'.$img_url.'%22%7D%2C%7B%22logo%22%3A%22'.$img_url.'%22%7D%2C%7B%22logo%22%3A%22'.$img_url.'%22%7D%2C%7B%22logo%22%3A%22'.$img_url.'%22%7D%2C%7B%22logo%22%3A%22'.$img_url.'%22%7D%5D"][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_sc_video media="https://vimeo.com/60777705" video_cover="1294" line1="WORKING AT" line2="Q Creative Studio"][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_sc_contact_box bg="'.$img_url.'" view_map_str="VIEW MAP" lat="34.084680" long="-118.408804" titles="%5B%7B%22faicon%22%3A%22facebook-square%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22twitter%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22behance%22%2C%22link%22%3A%22%23%22%7D%2C%7B%22faicon%22%3A%22pinterest%22%2C%22link%22%3A%22%23%22%7D%5D"]
<h6>HEADQUARTERS</h6>

<hr class="qucreative-hr-small" />

75 Central Park Avenue
60488, West Virginia, USA
<h6>PHONE / FAX</h6>

<hr class="qucreative-hr-small" />

0040 75.67.43.604
0040 43.56.98.652
<h6>EMAIL</h6>

<hr class="qucreative-hr-small" />

<a href="http://localhost/qcreative/qcreative/contact.html#">office@company.com</a>[/antfarm_sc_contact_box][/vc_column][/vc_row][/vc_section]';


    $args = array(
        'post_title' => wp_strip_all_tags('SECONDARY CONTENT'),
        'post_content' => $cont,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_type' => 'page',

    );


    $page_id = wp_insert_post($args);
    $page_id_secondary_1 = $page_id;







    update_post_meta($page_id, 'qucreative_'.'meta_custom_title', 'CONTENT');
    update_post_meta($page_id, 'qucreative_'.'meta_bg_image', $img_url);

















    $cont = '[vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_sc_call_to_action bg="'.$img_url.'" overlay_opacity="50" title="We are the best in the business!" read_more_link="#" button_style="{``style``:``style-hallowblack``,``padding``:````,``rounded``:``rounded``}" box_width="700"]Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque ullamcorper tortor turpis, id ullamcorper diam venenatis vel. Interdum et menuati.[/antfarm_sc_call_to_action][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_sc_blockquote bg="'.$img_url.'" overlay_opacity="50" author="STEVE JOBS"]
<h4>Design is not just what it looks like and feels like. Design is how it works.</h4>
[/antfarm_sc_blockquote][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_sc_video_text bg="'.$img_url.'" overlay_opacity="50" featured_media_type="vimeo" media_video="https://vimeo.com/60777705" video_cover="'.$img_url.'" title="Any kind of video, but with cover" video="https://vimeo.com/60777705"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua mauris certimas faecit phaelis met.

[antfarm_button style="color-highlight" padding="padding-medium" rounded="rounded" the_icon=""]READ MORE[/antfarm_button] [antfarm_button style="style-black" padding="padding-medium" rounded="rounded" the_icon=""]CONTACT[/antfarm_button][/antfarm_sc_video_text][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_sc_video_text bg="'.$img_url.'" overlay_opacity="50" featured_media_type="vimeo" media_video="https://vimeo.com/60777705" caption_aligment="text-left" title="Self hosted video" video="https://vimeo.com/60777705"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua mauris certimas faecit phaelis met.

[antfarm_button style="color-highlight" padding="padding-medium" rounded="rounded" the_icon=""]READ MORE[/antfarm_button] [antfarm_button style="style-black" padding="padding-medium" rounded="rounded" the_icon=""]CONTACT[/antfarm_button][/antfarm_sc_video_text][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_sc_video_text bg="'.$img_url.'" overlay_opacity="50" featured_media_type="video" media_video="https://vimeo.com/38738714" title="A nice Vimeo video here" video="https://vimeo.com/38738714"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua mauris certimas faecit phaelis met.

[antfarm_button style="color-highlight" padding="padding-medium" rounded="rounded" the_icon=""]READ MORE[/antfarm_button] [antfarm_button style="style-black" padding="padding-medium" rounded="rounded" the_icon=""]CONTACT[/antfarm_button][/antfarm_sc_video_text][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_sc_video_text bg="'.$img_url.'" overlay_opacity="50" featured_media_type="video" media_video="https://www.youtube.com/watch?v=VA770wpLX-Q" caption_aligment="text-left" title="YouTube in da house" video="https://www.youtube.com/watch?v=VA770wpLX-Q"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua mauris certimas faecit phaelis met.

[antfarm_button style="color-highlight" padding="padding-medium" rounded="rounded" the_icon=""]READ MORE[/antfarm_button] [antfarm_button style="style-black" padding="padding-medium" rounded="rounded" the_icon=""]CONTACT[/antfarm_button][/antfarm_sc_video_text][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_sc_video_text bg="'.$img_url.'" overlay_opacity="50" featured_media_type="image" image="'.$img_url.'" title="Nice image example" video="https://www.youtube.com/watch?v=VA770wpLX-Q"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua mauris certimas faecit phaelis met.

[antfarm_button style="color-highlight" padding="padding-medium" rounded="rounded" the_icon=""]READ MORE[/antfarm_button] [antfarm_button style="style-black" padding="padding-medium" rounded="rounded" the_icon=""]CONTACT[/antfarm_button][/antfarm_sc_video_text][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_sc_three_cols bg_1="#ff9999" overlay_opacity_1="50" title_1="Truly creative" content_1="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et dictum nulla. Aenean in lacus purus." read_more_text_1="ADD ANY" read_more_link_1="#" button_style_1="{``style``:``style-black``,``padding``:````,``rounded``:``rounded``}" bg_2="#99ff99" overlay_opacity_2="50" title_2="Beautiful and elegant" content_2="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et dictum nulla. Aenean in lacus purus." read_more_text_2="TYPE OF" read_more_link_2="#" button_style_2="{``style``:``style-hallowblack``,``padding``:````,``rounded``:````}" bg_3="#9999ff" overlay_opacity_3="50" title_3="Feature full" content_3="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et dictum nulla. Aenean in lacus purus." read_more_text_3="BUTTON" read_more_link_3="#" button_style_3="{``style``:``color-highlight``,``padding``:````,``rounded``:``rounded``}"][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_sc_three_cols bg_1="#01A2A6" overlay_opacity_1="50" title_1="Truly creative" content_1="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et dictum nulla. Aenean in lacus purus." read_more_text_1="READ MORE" read_more_link_1="#" button_style_1="{``style``:``style-hallowblack``,``padding``:````,``rounded``:``rounded``}" bg_2="#29D9C2" overlay_opacity_2="50" title_2="Beautiful and elegant" content_2="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et dictum nulla. Aenean in lacus purus." read_more_text_2="READ MORE" read_more_link_2="#" button_style_2="{``style``:``style-hallowblack``,``padding``:````,``rounded``:``rounded``}" bg_3="#FFB366" overlay_opacity_3="50" title_3="Feature full" content_3="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et dictum nulla. Aenean in lacus purus." read_more_text_3="READ MORE" read_more_link_3="#" button_style_3="{``style``:``style-hallowblack``,``padding``:````,``rounded``:``rounded``}"][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_sc_small_map heading_text="GET IN TOUCH WITH" content_text="Our Company" button_text="CONTACT US" button_link="3" lat="34.084680" long="-118.408804" bg="'.$img_url.'"][/vc_column][/vc_row][/vc_section]';


    $args = array(
        'post_title' => wp_strip_all_tags('SECONDARY CONTENT 2'),
        'post_content' => $cont,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_type' => 'page',

    );


    $page_id = wp_insert_post($args);
    $page_id_secondary_2 = $page_id;







    update_post_meta($page_id, 'qucreative_'.'meta_custom_title', 'CONTENT');
    update_post_meta($page_id, 'qucreative_'.'meta_bg_image', $img_url);
































    $cont = '[vc_section shape="" type="image" media="'.$img_url_500_100.'" style="light"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="01" line1="WE ARE" line2="VERY SKILLED"][/vc_column][/vc_row][vc_row][vc_column width="1/3"][antfarm_progress_bar style="circle" title="LAYOUT DESIGN" progress="85" convert_1000_to_k="`{`object Object`}`"]Lorem ipsum dolor sit amet, consect adipisicing elit, sed do eiusmod temporis incididunt ut labore mauris estim.[/antfarm_progress_bar][/vc_column][vc_column width="1/3"][antfarm_progress_bar style="circle" title="WEB DEVELOPMENT" progress="90" convert_1000_to_k="`{`object Object`}`"]Lorem ipsum dolor sit amet, consect adipisicing elit, sed do eiusmod temporis incididunt ut labore mauris estim.[/antfarm_progress_bar][/vc_column][vc_column width="1/3"][antfarm_progress_bar style="circle" title="JET PILOTING" progress="57" convert_1000_to_k="`{`object Object`}`"]Lorem ipsum dolor sit amet, consect adipisicing elit, sed do eiusmod temporis incididunt ut labore mauris estim.[/antfarm_progress_bar][/vc_column][/vc_row][vc_row][vc_column][antfarm_separator style="style-1" height="70" is_style_black="`{`object Object`}`"][/vc_column][/vc_row][vc_row][vc_column width="1/3"][antfarm_bullet_feature style="style-3" feature="feature-type-et" icon_aligment="icon-align-right" title="SUPER SMART" eticon="icon-layers" aligment="align-right"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec tincidunt eros.[/antfarm_bullet_feature][vc_empty_space height="55px"][antfarm_bullet_feature style="style-3" feature="feature-type-et" icon_aligment="icon-align-right" title="USER FRIENDLY" eticon="icon-pricetags" aligment="align-right"]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec tincidunt eros.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_image_for_sideways media="'.$img_url.'"][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-3" feature="feature-type-et" icon_aligment="" title="HIGH QUALITY" eticon="icon-hotairballoon" aligment=""]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec tincidunt eros.[/antfarm_bullet_feature][vc_empty_space height="55px"][antfarm_bullet_feature style="style-3" feature="feature-type-et" icon_aligment="" title="REFINED AND ELEGANT" eticon="icon-hotairballoon" aligment=""]Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec tincidunt eros.[/antfarm_bullet_feature][/vc_column][/vc_row][/vc_section][vc_section shape="" type="image" style="light"][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_sc_testimonials media="'.$img_url.'" overlay_opacity="50" tests="%5B%7B%22title%22%3A%22TESTIMONIALS%22%2C%22name%22%3A%22James%20Faraday%22%2C%22position%22%3A%22CCO%20at%20Orange%20Studios%22%2C%22the_test%22%3A%22I%20loved%20working%20with%20the%20guys%20from%20Q%20Creative%20Studio.%20They%20are%20extremely%20talented%2C%20super%20creative%20and%20the%20project%20was%20ready%20before%20the%20deadline.%20I%20strongly%20recommend%20them.%22%7D%2C%7B%22title%22%3A%22TESTIMONIALS%22%2C%22name%22%3A%22Jessica%20Watson%22%2C%22position%22%3A%22CEO%20at%20Orlando%20Incorporated%22%2C%22the_test%22%3A%22This%20is%20the%20best%20experience%20I\'ve%20had%20so%20far%20with%20a%20design%20studio.%20The%20project%20was%20done%20quickly%2C%20and%20the%20quality%20is%20outstanding.%22%7D%2C%7B%22title%22%3A%22TESTIMONIALS%22%2C%22name%22%3A%22Markus%20Mittchels%22%2C%22position%22%3A%22Developer%20at%20XS%20Arts%22%2C%22the_test%22%3A%22The%20Q%20Creative%20team%20is%20really%20impressive%2C%20and%20very%20fun%20to%20work%20with.%20I%20think%20the%20secret%20behind%20their%20success%20is%20that%20they%20love%20what%20they\'re%20doing%2C%20so%20they%20don\'t%20feel%20like%20working.%22%7D%5D" heading_style_name="h4"][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="02" line1="WHAT" line2="WE DO"][/vc_column][/vc_row][vc_row css=".vc_custom_1501337342926{margin-bottom: 30px !important;}"][vc_column width="1/3"][antfarm_service_lightbox title="WEB DEVELOPMENT" content_main="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec tincidunt eros." icon="icon-laptop" columns="2" title_lightbox="WEB DEVELOPMENT" title_1="A VERY NICE HEADING" content_1="Fusce auctor quis dolor vitae rutrum. Integer malesuada eu velit et faucibus. Maecenas dictum nulla non convallis sagittis. Vestibulum lobortis urna in velit dictum, et fermentum dolor consectetur. Nam sit amet nisi dolor. Nam ipsum neque, rhoncus vitae sollicitudin sit amet, aliquet ut augue. Phasellus sed leo ut enim finibus cursus. Nullam blandit arcu nisl, a tristique erat faucibus ut mauris certiman estib." title_2="YET ANOTHER SUPERB HEADING" content_2="Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In aliquam gravida mollis. Etiam convallis odio at vulputate rhoncus. In hac habitasse platea dictumst. Donec sit amet lacus at libero congue finibus sit amet quis purus. Suspendisse pellentesque tempor iaculis. Donec facilisis dui tristique lacus placerat iaculis. Sed vehicula ullamcorper sapien viverra pharetra vel at sem."][/vc_column][vc_column width="1/3"][antfarm_service_lightbox title="MARKETING STRATEGIES" content_main="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec tincidunt eros." icon="icon-strategy" columns="2" title_lightbox="MARKETING STRATEGIES" title_1="A VERY NICE HEADING" content_1="Fusce auctor quis dolor vitae rutrum. Integer malesuada eu velit et faucibus. Maecenas dictum nulla non convallis sagittis. Vestibulum lobortis urna in velit dictum, et fermentum dolor consectetur. Nam sit amet nisi dolor. Nam ipsum neque, rhoncus vitae sollicitudin sit amet, aliquet ut augue. Phasellus sed leo ut enim finibus cursus. Nullam blandit arcu nisl, a tristique erat faucibus ut mauris certiman estib." title_2="YET ANOTHER SUPERB HEADING" content_2="Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In aliquam gravida mollis. Etiam convallis odio at vulputate rhoncus. In hac habitasse platea dictumst. Donec sit amet lacus at libero congue finibus sit amet quis purus. Suspendisse pellentesque tempor iaculis. Donec facilisis dui tristique lacus placerat iaculis. Sed vehicula ullamcorper sapien viverra pharetra vel at sem."][/vc_column][vc_column width="1/3"][antfarm_service_lightbox title="COPY WRITING" content_main="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec tincidunt eros." icon="icon-pencil" columns="2" title_lightbox="COPY WRITING" title_1="A VERY NICE HEADING" content_1="Fusce auctor quis dolor vitae rutrum. Integer malesuada eu velit et faucibus. Maecenas dictum nulla non convallis sagittis. Vestibulum lobortis urna in velit dictum, et fermentum dolor consectetur. Nam sit amet nisi dolor. Nam ipsum neque, rhoncus vitae sollicitudin sit amet, aliquet ut augue. Phasellus sed leo ut enim finibus cursus. Nullam blandit arcu nisl, a tristique erat faucibus ut mauris certiman estib." title_2="YET ANOTHER SUPERB HEADING" content_2="Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In aliquam gravida mollis. Etiam convallis odio at vulputate rhoncus. In hac habitasse platea dictumst. Donec sit amet lacus at libero congue finibus sit amet quis purus. Suspendisse pellentesque tempor iaculis. Donec facilisis dui tristique lacus placerat iaculis. Sed vehicula ullamcorper sapien viverra pharetra vel at sem."][/vc_column][/vc_row][vc_row][vc_column width="1/3"][antfarm_service_lightbox title="UX / UI DESIGN" content_main="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec tincidunt eros." icon="icon-hotairballoon" columns="2" title_lightbox="UX / UI DESIGN" title_1="A VERY NICE HEADING" content_1="Fusce auctor quis dolor vitae rutrum. Integer malesuada eu velit et faucibus. Maecenas dictum nulla non convallis sagittis. Vestibulum lobortis urna in velit dictum, et fermentum dolor consectetur. Nam sit amet nisi dolor. Nam ipsum neque, rhoncus vitae sollicitudin sit amet, aliquet ut augue. Phasellus sed leo ut enim finibus cursus. Nullam blandit arcu nisl, a tristique erat faucibus ut mauris certiman estib." title_2="YET ANOTHER SUPERB HEADING" content_2="Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In aliquam gravida mollis. Etiam convallis odio at vulputate rhoncus. In hac habitasse platea dictumst. Donec sit amet lacus at libero congue finibus sit amet quis purus. Suspendisse pellentesque tempor iaculis. Donec facilisis dui tristique lacus placerat iaculis. Sed vehicula ullamcorper sapien viverra pharetra vel at sem."][/vc_column][vc_column width="1/3"][antfarm_service_lightbox title="MOBILE APP DEVELOPMENT" content_main="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec tincidunt eros." icon="icon-phone" columns="2" title_lightbox="MOBILE APP DEVELOPMENT" title_1="A VERY NICE HEADING" content_1="Fusce auctor quis dolor vitae rutrum. Integer malesuada eu velit et faucibus. Maecenas dictum nulla non convallis sagittis. Vestibulum lobortis urna in velit dictum, et fermentum dolor consectetur. Nam sit amet nisi dolor. Nam ipsum neque, rhoncus vitae sollicitudin sit amet, aliquet ut augue. Phasellus sed leo ut enim finibus cursus. Nullam blandit arcu nisl, a tristique erat faucibus ut mauris certiman estib." title_2="YET ANOTHER SUPERB HEADING" content_2="Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In aliquam gravida mollis. Etiam convallis odio at vulputate rhoncus. In hac habitasse platea dictumst. Donec sit amet lacus at libero congue finibus sit amet quis purus. Suspendisse pellentesque tempor iaculis. Donec facilisis dui tristique lacus placerat iaculis. Sed vehicula ullamcorper sapien viverra pharetra vel at sem."][/vc_column][vc_column width="1/3"][antfarm_service_lightbox title="AUDIENCE RESEARCH" content_main="Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed elitis me donec tincidunt eros." icon="icon-search" columns="2" title_lightbox="AUDIENCE RESEARCH" title_1="A VERY NICE HEADING" content_1="Fusce auctor quis dolor vitae rutrum. Integer malesuada eu velit et faucibus. Maecenas dictum nulla non convallis sagittis. Vestibulum lobortis urna in velit dictum, et fermentum dolor consectetur. Nam sit amet nisi dolor. Nam ipsum neque, rhoncus vitae sollicitudin sit amet, aliquet ut augue. Phasellus sed leo ut enim finibus cursus. Nullam blandit arcu nisl, a tristique erat faucibus ut mauris certiman estib." title_2="YET ANOTHER SUPERB HEADING" content_2="Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In aliquam gravida mollis. Etiam convallis odio at vulputate rhoncus. In hac habitasse platea dictumst. Donec sit amet lacus at libero congue finibus sit amet quis purus. Suspendisse pellentesque tempor iaculis. Donec facilisis dui tristique lacus placerat iaculis. Sed vehicula ullamcorper sapien viverra pharetra vel at sem."][/vc_column][/vc_row][/vc_section][vc_section shape="" type="image" style="light"][vc_row][vc_column][antfarm_sc_client_slider media="'.$img_url.'" client="%5B%7B%22logo%22%3A%22'.$img_url.'%22%7D%2C%7B%22logo%22%3A%22'.$img_url.'%22%7D%2C%7B%22logo%22%3A%22'.$img_url.'%22%7D%2C%7B%22logo%22%3A%22'.$img_url.'%22%7D%2C%7B%22logo%22%3A%22'.$img_url.'%22%7D%2C%7B%22logo%22%3A%22'.$img_url.'%22%7D%2C%7B%22logo%22%3A%22'.$img_url.'%22%7D%2C%7B%22logo%22%3A%22'.$img_url.'%22%7D%5D"][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="03" line1="AFFORDABLE" line2="PRICING"][/vc_column][/vc_row][vc_row][vc_column width="1/3"][antfarm_pricing_table title="STARTER PACKAGE" is_featured="off" price="$295" quota="MONTHLY" items="%5B%7B%22item%22%3A%22T-shirt%20and%20toaster%22%7D%2C%7B%22item%22%3A%22Rihanna\'s%20email%22%7D%2C%7B%22item%22%3A%22Telephonic%20support%22%7D%2C%7B%22item%22%3A%22Foldable%20time%20machine%22%7D%2C%7B%22item%22%3A%22Real%20life%20undo%20button%22%7D%5D" sign_up_text="SIGN UP" sign_up_link="#"][/vc_column][vc_column width="1/3"][antfarm_pricing_table title="PREMIUM PACKAGE" is_featured="on" price="$1230" quota="MONTHLY" items="%5B%7B%22item%22%3A%22T-shirt%20and%20toaster%22%7D%2C%7B%22item%22%3A%22Rihanna\'s%20email%22%7D%2C%7B%22item%22%3A%22Telephonic%20support%22%7D%2C%7B%22item%22%3A%22Foldable%20time%20machine%22%7D%2C%7B%22item%22%3A%22Real%20life%20undo%20button%22%7D%5D" sign_up_text="SIGN UP" sign_up_link="#"][/vc_column][vc_column width="1/3"][antfarm_pricing_table title="EXTRA PACKAGE" is_featured="off" price="$530" quota="MONTHLY" items="%5B%7B%22item%22%3A%22T-shirt%20and%20toaster%22%7D%2C%7B%22item%22%3A%22Rihanna\'s%20email%22%7D%2C%7B%22item%22%3A%22Telephonic%20support%22%7D%2C%7B%22item%22%3A%22Foldable%20time%20machine%22%7D%2C%7B%22item%22%3A%22Real%20life%20undo%20button%22%7D%5D" sign_up_text="SIGN UP" sign_up_link="#"][/vc_column][/vc_row][vc_row][vc_column][antfarm_separator style="style-1" height="55" is_style_black="`{`object Object`}`"][/vc_column][/vc_row][vc_row][vc_column width="1/2"][vc_column_text]
<h6>THINKING OUTSIDE THE BOX</h6>
[antfarm_divider height="30" style="style-1" color="#222222"][/antfarm_divider]

Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Nam id dolor eget metus consectetur scelerique curabir, lorem ipsum mauris certimus est. ut sementiques fas.[/vc_column_text][vc_row_inner][vc_column_inner width="1/2"][antfarm_list titles="%5B%7B%22text%22%3A%22Innovative%20design%22%7D%2C%7B%22text%22%3A%22Amazing%20UX%22%7D%2C%7B%22text%22%3A%22Highly%20Customizable%22%7D%5D"][/vc_column_inner][vc_column_inner width="1/2"][antfarm_list titles="%5B%7B%22text%22%3A%22Innovative%20design%22%7D%2C%7B%22text%22%3A%22Amazing%20UX%22%7D%2C%7B%22text%22%3A%22Highly%20Customizable%22%7D%5D"][/vc_column_inner][/vc_row_inner][/vc_column][vc_column width="1/2"][vc_single_image image="'.$qucreative_import_demo_last_attach_id.'" img_size="full" el_class="fullwidth"][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_sc_social_links media="'.$img_url.'" title_1="LIKE US ON" social_1="Facebook" icon_1="facebook-square" title_2="FOLLOW US ON" social_2="Twitter" icon_2="twitter" title_3="PIN US ON" social_3="Pinterest" icon_3="pinterest" title_4="APPRECIATE US ON" social_4="Google+" icon_4="google-plus"][/vc_column][/vc_row][/vc_section]';


    $args = array(
        'post_title' => wp_strip_all_tags('SERVICES'),
        'post_content' => $cont,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_type' => 'page',

    );


    $page_id = wp_insert_post($args);
    $page_id_services = $page_id;








    update_post_meta($page_id, 'qucreative_'.'meta_bg_image', $img_url);

































    $cont = '[vc_section type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="01" line1="HEADINGS" line2="AND TYPOGRAPHY"][/vc_column][/vc_row][vc_row][vc_column][vc_row_inner][vc_column_inner][vc_column_text]
<h1>HEADING 1</h1>
Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.[/vc_column_text][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner width="1/2"][vc_column_text]
<h2>HEADING 2</h2>
Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.[/vc_column_text][/vc_column_inner][vc_column_inner width="1/2"][vc_column_text]
<h2>HEADING 2</h2>
Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.[/vc_column_text][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row][vc_column width="1/2"][vc_column_text]
<h3>HEADING 3</h3>
Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.[/vc_column_text][/vc_column][vc_column width="1/2"][vc_column_text]
<h3>HEADING 3</h3>
Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.[/vc_column_text][/vc_column][/vc_row][vc_row][vc_column width="1/2"][vc_column_text]
<h4>HEADING 4</h4>
Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.[/vc_column_text][/vc_column][vc_column width="1/2"][vc_column_text]
<h4>HEADING 4</h4>
Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.[/vc_column_text][/vc_column][/vc_row][vc_row][vc_column width="1/2"][vc_column_text]
<h5>HEADING 5</h5>
Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.[/vc_column_text][/vc_column][vc_column width="1/2"][vc_column_text]
<h5>HEADING 5</h5>
Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.[/vc_column_text][/vc_column][/vc_row][vc_row][vc_column width="1/2"][vc_column_text]
<h6>HEADING 6</h6>
Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.[/vc_column_text][/vc_column][vc_column width="1/2"][vc_column_text]
<h6>HEADING 6</h6>
Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.[/vc_column_text][/vc_column][/vc_row][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="02" line1="SEXY" line2="BLOCKQUOTE"][/vc_column][/vc_row][vc_row][vc_column][antfarm_blockquote author="MORGAN FREEMAN"]<em>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.</em>[/antfarm_blockquote][/vc_column][/vc_row][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="03" line1="USEFUL" line2="LISTS"][/vc_column][/vc_row][vc_row][vc_column width="1/4"][antfarm_list titles="%5B%7B%22faicon%22%3A%22fa-check%22%2C%22text%22%3A%22Use%20friendly%20design%22%7D%2C%7B%22faicon%22%3A%22apple%22%2C%22text%22%3A%22Filled%20with%20options%22%7D%2C%7B%22faicon%22%3A%22wifi%22%2C%22text%22%3A%22Beautiful%20graphics%22%7D%5D"][/vc_column][vc_column width="1/4"][antfarm_list titles="%5B%7B%22faicon%22%3A%22envelope-o%22%2C%22text%22%3A%22Suitable%20for%20portfolios%22%7D%2C%7B%22faicon%22%3A%22eyedropper%22%2C%22text%22%3A%22Tons%20of%20awards%22%7D%2C%7B%22faicon%22%3A%22plane%22%2C%22text%22%3A%22Friendly%20support%22%7D%5D"][/vc_column][vc_column width="1/4"][antfarm_list titles="%5B%7B%22faicon%22%3A%22fa-check%22%2C%22text%22%3A%22Use%20friendly%20design%22%7D%2C%7B%22faicon%22%3A%22apple%22%2C%22text%22%3A%22Filled%20with%20options%22%7D%2C%7B%22faicon%22%3A%22wifi%22%2C%22text%22%3A%22Beautiful%20graphics%22%7D%5D"][/vc_column][vc_column width="1/4"][antfarm_list titles="%5B%7B%22faicon%22%3A%22envelope-o%22%2C%22text%22%3A%22Suitable%20for%20portfolios%22%7D%2C%7B%22faicon%22%3A%22eyedropper%22%2C%22text%22%3A%22Tons%20of%20awards%22%7D%2C%7B%22faicon%22%3A%22plane%22%2C%22text%22%3A%22Friendly%20support%22%7D%5D"][/vc_column][/vc_row][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="04" line1="SEXY" line2="COLUMNS"][/vc_column][/vc_row][vc_row][vc_column width="1/2"][vc_column_text]
<h6>ONE HALF</h6>
<p class="paragraph-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.</p>
[/vc_column_text][/vc_column][vc_column width="1/2"][vc_column_text]
<h6>ONE HALF</h6>
<p class="paragraph-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.</p>
[/vc_column_text][/vc_column][/vc_row][vc_row][vc_column width="1/3"][vc_column_text]
<h6>ONE THIRD</h6>
<p class="paragraph-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.</p>
[/vc_column_text][/vc_column][vc_column width="1/3"][vc_column_text]
<h6>ONE THIRD</h6>
<p class="paragraph-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.</p>
[/vc_column_text][/vc_column][vc_column width="1/3"][vc_column_text]
<h6>ONE THIRD</h6>
<p class="paragraph-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.</p>
[/vc_column_text][/vc_column][/vc_row][vc_row][vc_column width="1/4"][vc_column_text]
<h6>ONE FOURTH</h6>
<p class="paragraph-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
[/vc_column_text][/vc_column][vc_column width="1/4"][vc_column_text]
<h6>ONE FOURTH</h6>
<p class="paragraph-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
[/vc_column_text][/vc_column][vc_column width="1/4"][vc_column_text]
<h6>ONE FOURTH</h6>
<p class="paragraph-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
[/vc_column_text][/vc_column][vc_column width="1/4"][vc_column_text]
<h6>ONE FOURTH</h6>
<p class="paragraph-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
[/vc_column_text][/vc_column][/vc_row][vc_row][vc_column width="1/6"][vc_column_text]
<h6>ONE SIXTH</h6>
<p class="paragraph-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
[/vc_column_text][/vc_column][vc_column width="1/6"][vc_column_text]
<h6>ONE SIXTH</h6>
<p class="paragraph-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
[/vc_column_text][/vc_column][vc_column width="1/6"][vc_column_text]
<h6>ONE SIXTH</h6>
<p class="paragraph-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
[/vc_column_text][/vc_column][vc_column width="1/6"][vc_column_text]
<h6>ONE SIXTH</h6>
<p class="paragraph-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
[/vc_column_text][/vc_column][vc_column width="1/6"][vc_column_text]
<h6>ONE SIXTH</h6>
<p class="paragraph-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
[/vc_column_text][/vc_column][vc_column width="1/6"][vc_column_text]
<h6>ONE SIXTH</h6>
<p class="paragraph-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
[/vc_column_text][/vc_column][/vc_row][vc_row][vc_column width="1/3"][vc_column_text]
<h6>ONE THIRD</h6>
<p class="paragraph-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
[/vc_column_text][/vc_column][vc_column width="2/3"][vc_column_text]
<h6>TWO THIRDS</h6>
<p class="paragraph-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut.</p>
[/vc_column_text][/vc_column][/vc_row][vc_row][vc_column width="1/4"][vc_column_text]
<h6>ONE FOURTH</h6>
<p class="paragraph-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
[/vc_column_text][/vc_column][vc_column width="3/4"][vc_column_text]
<h6>THREE FOURTHS</h6>
<p class="paragraph-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut.</p>
[/vc_column_text][/vc_column][/vc_row][/vc_section]';


    $args = array(
        'post_title' => wp_strip_all_tags('TYPOGRAPHY - LIGHT'),
        'post_content' => $cont,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_type' => 'page',

    );


    $page_id = wp_insert_post($args);
    $page_id_typography = $page_id;







    update_post_meta($page_id, 'qucreative_'.'meta_custom_title', 'TYPOGRAPHY');
    update_post_meta($page_id, 'qucreative_'.'meta_bg_image', $img_url);



















































































































    // -- home code



    $cont = '[vc_section shape="" type="image" media="'.$img_url_500_100.'" style="light"][vc_row css=".vc_custom_1505869961736{margin-top: -10px !important;}"][vc_column][antfarm_section_title style="two-lines" aligment="heading-is-center" line1="FULLY CUSTOMIZE" line2="Your Design"][/vc_column][/vc_row][vc_row][vc_column css_animation="none" width="1/3"][antfarm_bullet_feature style="style-1" feature="feature-type-et" title="ULTRA CUSTOMIZABLE LAYOUT" eticon="icon-adjustments"]Create literally endless totally different designs, as Qu s capabilties go far beyond anything you ve seen so far.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-1" feature="feature-type-et" title="18 ULTRA CUSTOMIZABLE MENUS" eticon="icon-browser"]From light to dark, from vertical, to horizontal and to overlay, these 18 different menus are highly customizable on their own.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-1" feature="feature-type-et" title="FULLY CUSTOMIZABLE TYPOGRAPHY" eticon="icon-tools"]Qu s powerful typography panel, allows you to control every aspect of the entire typography, of the entire theme.[/antfarm_bullet_feature][/vc_column][/vc_row][vc_row css=".vc_custom_1506028532153{margin-bottom: 50px !important;}"][vc_column css_animation="none" width="1/3"][antfarm_bullet_feature style="style-1" feature="feature-type-et" title="ULTRA CUSTOMIZABLE ELEMENTS" eticon="icon-layers"]Qu comes with a complete set of highly customizable beautiful elements, with which you can create stunning websites.[/antfarm_bullet_feature][/vc_column][vc_column css_animation="none" width="1/3"][antfarm_bullet_feature style="style-1" feature="feature-type-et" title="NEVER BEFORE SEEN VISUAL FX" eticon="icon-genius"]Qu comes with features never before seen in any other theme, which can spice up your website s visual aspect.[/antfarm_bullet_feature][/vc_column][vc_column css_animation="none" width="1/3"][antfarm_bullet_feature style="style-1" feature="feature-type-et" title="LIVE CUSTOMIZER" eticon="icon-paintbrush"]See your layout design changes happen in real time, with the Live Customizer. That is the right way to design a website.[/antfarm_bullet_feature][/vc_column][/vc_row][vc_row][vc_column css_animation="none"][vc_column_text]
<p style="text-align: center;">[antfarm_button style="color-highlight" padding="" rounded="rounded" the_icon="" link="#qucreative-awesome-demos-section"]CHECK OUT THE QU DEMOS[/antfarm_button]</p>

[/vc_column_text][vc_empty_space height="20px"][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_sc_video_text bg="#8C5C9D" overlay_opacity="0" featured_media_type="image" image="'.$img_url.'" title="Read The Qu Documentation"]We do not have nearly enough space here to present all the things Qu can do. But the manual covers every detail of the capabilities of Qu, so check it out, and see for yourself why Qu is so awesome!

[antfarm_button style="style-black" padding="padding-medium" rounded="rounded" the_icon="" link="http://creativewpthemes.net/main-demo/readme/knowledge-base/" link_target="_blank"]KNOWLEDGE BASE[/antfarm_button][/antfarm_sc_video_text][/vc_column][/vc_row][/vc_section][vc_section shape="" type="image" media="'.$img_url_500_100.'" style="light"][vc_row css=".vc_custom_1505952144070{margin-bottom: 40px !important;}"][vc_column][antfarm_section_title style="two-lines" aligment="heading-is-center" line1="THE MOST VERSATILE" line2="Portfolio Engine"][/vc_column][/vc_row][vc_row][vc_column width="2/12"][/vc_column][vc_column width="8/12"][vc_custom_heading text="The portfolio and gallery engine is a piece of art on its own, as it does pretty much anything you can think about, and then some!" font_container="tag:h6|font_size:15|text_align:center|color:%23777777|line_height:1.8" google_fonts="font_family:Open%20Sans%3A300%2C300italic%2Cregular%2Citalic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic|font_style:400%20regular%3A400%3Anormal"][/vc_column][vc_column width="2/12"][/vc_column][/vc_row][vc_row css=".vc_custom_1505952401308{margin-bottom: 30px !important;}"][vc_column css_animation="none" width="1/3"][vc_single_image image="'.$qucreative_import_demo_last_attach_id.'" img_size="full"][/vc_column][vc_column css_animation="none" width="1/3"][vc_single_image image="'.$qucreative_import_demo_last_attach_id.'" img_size="full"][/vc_column][vc_column css_animation="none" width="1/3"][vc_single_image image="'.$qucreative_import_demo_last_attach_id.'" img_size="full"][/vc_column][/vc_row][vc_row css_animation="none"][vc_column width="2/12"][/vc_column][vc_column width="4/12"][vc_single_image image="'.$qucreative_import_demo_last_attach_id.'" img_size="full"][/vc_column][vc_column width="4/12"][vc_single_image image="'.$qucreative_import_demo_last_attach_id.'" img_size="full"][vc_empty_space height="20px"][/vc_column][vc_column width="2/12"][/vc_column][/vc_row][/vc_section][vc_section css_animation="none" shape="" type="image" section_bg_color="#FFF8DF" style="light"][vc_row css=".vc_custom_1506029037592{margin-bottom: 50px !important;}"][vc_column][antfarm_section_title style="one-line" aligment="heading-is-center" line1="PORTFOLIO SINGLES AND LIGHTBOXES"][/vc_column][/vc_row][vc_row css=".vc_custom_1505952641457{margin-bottom: 30px !important;}"][vc_column width="1/4"][vc_single_image image="'.$qucreative_import_demo_last_attach_id.'" img_size="full"][/vc_column][vc_column width="1/4"][vc_single_image image="'.$qucreative_import_demo_last_attach_id.'" img_size="full"][/vc_column][vc_column width="1/4"][vc_single_image image="'.$qucreative_import_demo_last_attach_id.'" img_size="full"][/vc_column][vc_column width="1/4"][vc_single_image image="'.$qucreative_import_demo_last_attach_id.'" img_size="full"][/vc_column][/vc_row][vc_row][vc_column width="1/4"][vc_single_image image="'.$qucreative_import_demo_last_attach_id.'" img_size="full"][/vc_column][vc_column width="1/4"][vc_single_image image="'.$qucreative_import_demo_last_attach_id.'" img_size="full"][/vc_column][vc_column width="1/4"][vc_single_image image="'.$qucreative_import_demo_last_attach_id.'" img_size="full"][/vc_column][vc_column width="1/4"][/vc_column][/vc_row][/vc_section][vc_section shape="" type="image" section_bg_color="#222222" style="dark"][vc_row][vc_column width="1/3"][antfarm_bullet_feature style="style-3" feature="feature-type-et" icon_aligment="" title="COMBINE THEM" icon_color="#fff8df" eticon="icon-beaker"]Choose the Portfolio/Gallery main type you want, and assign it the  single  type you want.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-3" feature="feature-type-et" icon_aligment="" title="GRID BUILDER" icon_color="#fff8df" eticon="icon-grid"]Create your own unique grid layout, with our grid builder, or simply choose the number of columns.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-3" feature="feature-type-et" icon_aligment="" title="ADD THEM ANYWHERE" icon_color="#fff8df" eticon="icon-scissors"]Just like any other element, you can add portfolios and galleries in any page you want.[/antfarm_bullet_feature][/vc_column][/vc_row][vc_row][vc_column width="1/3"][antfarm_bullet_feature style="style-3" feature="feature-type-et" icon_aligment="" title="4 THUMB STYLES" icon_color="#fff8df" eticon="icon-aperture"]Choose the thumb style you want, because it has to fit your style and your website personality.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-3" feature="feature-type-et" icon_aligment="" title="PAGINATION / LAZY LOADING" et_icon_font_size="40" icon_color="#fff8df" eticon="icon-briefcase"]Depending on your portfolio size, you can use pagination, lazy loading, or old fashioned regular loading.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-3" feature="feature-type-et" icon_aligment="" title="OPTIONAL FILTERS" et_icon_font_size="37" icon_color="#fff8df" eticon="icon-focus"]So you re talented, and you have a huge portfolio, from all areas and fields. Why not use some filters?[/antfarm_bullet_feature][/vc_column][/vc_row][vc_row][vc_column width="1/3"][antfarm_bullet_feature style="style-3" feature="feature-type-et" icon_aligment="" title="FULLSCREEN / NORMAL" icon_color="#fff8df" eticon="icon-expand"]Go fullscreen, go normal, with Qu your portfolio or gallery will look stunning. We promise![/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-3" feature="feature-type-et" icon_aligment="" title="FIND ITEMS EASILY" icon_color="#fff8df" eticon="icon-magnifying-glass"]We added thumbs in the backed for the portfolio items, so you can save time by finding them fast.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-3" feature="feature-type-et" icon_aligment="" title="REORDER MANUALLY" icon_color="#fff8df" eticon="icon-layers"]We know it is frustrating not having control over the order of your portfolio items. With Qu, you can![/antfarm_bullet_feature][/vc_column][/vc_row][/vc_section][vc_section shape="" type="image" section_bg_image="'.''.'" bg_hide_on_tablet="true" bg_hide_on_mobile="true" style="light"][vc_row][vc_column css_animation="slideInUp" width="1/2"][vc_single_image image="'.$qucreative_import_demo_last_attach_id.'" img_size="full"][/vc_column][vc_column width="1/2"][vc_empty_space height="80px"][antfarm_section_title style="two-lines" aligment="heading-is-center" line1="FULLY CUSTOMIZABLE" line2="Typography"][vc_empty_space height="40px"][vc_custom_heading text="Qu comes with an ultra powerful typography customization panel, that gives you total control over every aspect of the typography, for the entire theme." font_container="tag:h6|font_size:15|text_align:center|color:%23777777|line_height:1.8" google_fonts="font_family:Open%20Sans%3A300%2C300italic%2Cregular%2Citalic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic|font_style:400%20regular%3A400%3Anormal"][/vc_column][/vc_row][/vc_section][vc_section shape="" type="image" section_bg_color="#FFFBEA" bg_hide_on_tablet="true" bg_hide_on_mobile="true" style="light"][vc_row][vc_column width="1/2"][vc_empty_space height="80px"][antfarm_section_title style="two-lines" aligment="heading-is-center" line1="18 TOTALLY DIFFERENT" line2="Menu Styles"][vc_empty_space height="40px"][vc_custom_heading text="From vertical, to horizontal, to ribbon and overlay, from scrollable to sticky, and from light to dark, you can completely change the look and feel of your website with these awesome menu designs. Each of them is highly customizable." font_container="tag:h6|font_size:15|text_align:center|color:%23777777|line_height:1.8" google_fonts="font_family:Open%20Sans%3A300%2C300italic%2Cregular%2Citalic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic|font_style:400%20regular%3A400%3Anormal"][/vc_column][vc_column css_animation="slideInUp" width="1/2"][vc_single_image image="'.$qucreative_import_demo_last_attach_id.'" img_size="full"][/vc_column][/vc_row][/vc_section][vc_section shape="`{`object Object`}`" type="`{`object Object`}`" style="`{`object Object`}`"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="heading-is-center" line1="PACKED WITH" line2="Awesome Features"][/vc_column][/vc_row][vc_row css_animation="none"][vc_column][antfarm_image_box media="'.$img_url.'" aligment="left" text_aligment="" heading="VISUAL COMPOSER PAGE BUILDER (SAVE $34)"]Easily build and edit your website from the backend, or directly from the frontend, with probably the world s most loved drag and drop page builder, Visual Composer. Create your website in a matter of hours.[/antfarm_image_box][antfarm_image_box media="'.$img_url.'" aligment="right" text_aligment="" heading="SLIDER REVOLUTION (SAVE $25)"]Create amazing sliders with outstanding effects and animations, with this state of the artplugin. Unleash your imagination, because Slide Revolution can handle any idea you might have.[/antfarm_image_box][antfarm_image_box media="'.$img_url.'" aligment="left" text_aligment="" heading="LIVE CUSTOMIZER"]The Live Customizer does exactly what it s name suggets: it lets you preview all your settings, from typography, to layout design settings, without having to save. Design your website exactly the way you want.[/antfarm_image_box][antfarm_image_box media="'.$img_url.'" aligment="right" text_aligment="" heading="CUSTOM MADE ELEMENTS"]Qu comes with a complete set of elements, both light and dark, so you can create stunning pages. All elements ar highly customizable to suit your needs. Build beautiful pages with these beautiful elements.[/antfarm_image_box][antfarm_image_box media="'.$img_url.'" aligment="left" text_aligment="" heading="NEVER BEFORE SEEN VISUAL FX"]Spice up your website by applying an automatic translucent effect on the menu and/or content backgrounds. Customize the amount of the blur, the amount of saturation effect, the opacities and the skins of the foreground, and create your own unique look.[/antfarm_image_box][vc_empty_space height="20px"][/vc_column][/vc_row][/vc_section][vc_section shape="" type="image" media="'.$img_url_500_100.'" style="light"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="heading-is-center" line1="SAVE, EDIT, ACTIVATE, REUSE" line2="Your Designs"][/vc_column][/vc_row][vc_row][vc_column width="1/3"][vc_column_text]
<h6>CREATE YOUR DESIGN</h6>
[antfarm_divider height="30" style="style-1" color="#222222"][/antfarm_divider]

Create your own unique design. Play with the layout options, customize the typography, add visual fx, change the dimensions of your website, etc., until you love the final result.[/vc_column_text][/vc_column][vc_column width="1/3"][vc_column_text]
<h6>SAVE YOUR DESIGN</h6>
[antfarm_divider height="30" style="style-1" color="#222222"][/antfarm_divider]

Save your design as a DESIGN PRESET, which you can edit at any time. All the design settings will be remembered. You can save it under a new name, or overwrite an existing design.[/vc_column_text][/vc_column][vc_column width="1/3"][vc_column_text]
<h6>ACTIVATE YOUR DESIGN</h6>
[antfarm_divider height="30" style="style-1" color="#222222"][/antfarm_divider]

Activate the design you want, and like magic, the chosen design will be applied on your website. Activate, edit or remove any design, at any time. It s real time saver, right?[/vc_column_text][vc_empty_space height="20px"][/vc_column][/vc_row][/vc_section][vc_section shape="" type="image" style="dark"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="heading-is-center" line1="OTHER AWESOME" line2="Features"][/vc_column][/vc_row][vc_row][vc_column width="1/3"][antfarm_bullet_feature style="style-4" feature="feature-type-fa" icon_aligment="" icon_theme=" " form="form-default" title="FREE UPDATES AND UPGRADES" faicon="download" read_more_link="" button_style=""]You only pay for Qu once, and you will always receive all future upgrades and updates for free. And upgrade Qu we will, it\'s a long term commitment.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-4" feature="feature-type-fa" icon_aligment="" icon_theme=" " form="form-default" title="FAST AND FRIENDLY SUPPORT" faicon="support" read_more_link="" button_style=""]When creating Qu, we made a commitment to ourselves, and our users, that we will provide the absolute best service.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-4" feature="feature-type-fa" icon_aligment="" icon_theme=" " form="form-default" title="ONCE CLICK DEMO INSTALL" faicon="hand-o-up" read_more_link="" button_style=""]Install any demo with no hassle. As huge Qu is, as easy it is to use. Building a website has never been more fun.[/antfarm_bullet_feature][/vc_column][/vc_row][vc_row][vc_column width="1/3"][antfarm_bullet_feature style="style-4" feature="feature-type-fa" icon_aligment="" icon_theme=" " form="form-default" title="RESPONSIVE" et_icon_font_size="37" faicon="mobile-phone" read_more_link="" button_style=""]Of course Qu is responsive, and it will look perfect on any device, from desktop, to notebook, to tablet and to phone.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-4" feature="feature-type-fa" icon_aligment="" icon_theme=" " form="form-default" title="RETINA READY" faicon="eye" read_more_link="" button_style=""]Qu is retina ready, so it will look perfect on devices using the acclaimed retina display. Qu looks perfect on any device.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-4" feature="feature-type-fa" icon_aligment="" icon_theme=" " form="form-default" title="TRANSLATION AND RTL READY" faicon="file-text-o" read_more_link="" button_style=""]For users that prefer other languages besides English, we included the .po files, and the theme is Right To Left Text ready.[/antfarm_bullet_feature][vc_empty_space height="20px"][/vc_column][/vc_row][/vc_section]';





    $args = array(
        'post_title'    => wp_strip_all_tags( 'HOME' ),
        'post_content'  => $cont,
        'post_name'   => 'qucreative-home',
        'post_status'   => 'publish',
        'post_author'   => 1,
        'post_type'   => 'page',

    );


    $page_id = wp_insert_post( $args );
    $page_id_home = $page_id;







    update_post_meta(  $page_id ,'qucreative_'.'meta_content_starts_at','pixel-position');
    update_post_meta(  $page_id ,'qucreative_'.'meta_content_starts_at_pixel','0');
    update_post_meta(  $page_id ,'qucreative_'.'meta_custom_section_margin_bottom','0');




    update_post_meta(  $page_id ,'qucreative_'.'meta_is_fullscreen','off');
    update_post_meta(  $page_id ,'qucreative_'.'meta_disable_footer','on');
    update_post_meta(  $page_id ,'qucreative_'.'meta_is_fullscreen_stretch','contain');
    update_post_meta(  $page_id ,'qucreative_'.'meta_custom_title',' ');
    update_post_meta(  $page_id ,'qucreative_'.'meta_bg_image',$img_url);










    // -- setting homepage


    update_option( 'page_on_front', $page_id_home );
    update_option( 'show_on_front', 'page' );



    // -- end homepage




























	$cont = '[vc_section shape="shape-4" shape_color="#71b8ce" shape_height="450" type="image" section_bg_color="#7E8AA2" style="dark" el_id="my_awesome_section_1"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="01" line1="AMAZING" line2="QU DEMOS"][/vc_column][/vc_row][vc_row][vc_column width="1/3"][vc_single_image image="'.$qucreative_import_demo_last_attach_id.'" img_size="full" alignment="center" style="vc_box_shadow"][vc_single_image image="'.$qucreative_import_demo_last_attach_id.'" img_size="full" alignment="center" style="vc_box_shadow" onclick="custom_link" img_link_target="_blank" link="http://creativewpthemes.net/main-demo/mountain-resort/"][vc_single_image image="'.$qucreative_import_demo_last_attach_id.'" img_size="full" alignment="center" style="vc_box_shadow" onclick="custom_link" img_link_target="_blank" link="http://creativewpthemes.net/main-demo/restaurant/"][vc_single_image image="'.$qucreative_import_demo_last_attach_id.'" img_size="full" alignment="center" style="vc_box_shadow" onclick="custom_link" img_link_target="_blank" link="http://creativewpthemes.net/main-demo/gym/"][vc_single_image image="'.$qucreative_import_demo_last_attach_id.'" img_size="full" alignment="center" style="vc_box_shadow" onclick="custom_link" img_link_target="_blank" link="http://creativewpthemes.net/main-demo/freelancer/"][vc_single_image image="'.$qucreative_import_demo_last_attach_id.'" img_size="full" alignment="center" style="vc_box_shadow" onclick="custom_link" img_link_target="_blank" link="http://creativewpthemes.net/main-demo/digital-amateur/"][/vc_column][vc_column width="1/3"][vc_single_image image="'.$qucreative_import_demo_last_attach_id.'" img_size="full" alignment="center" style="vc_box_shadow" onclick="custom_link" img_link_target="_blank" link="http://creativewpthemes.net/main-demo/spa/"][vc_single_image image="'.$qucreative_import_demo_last_attach_id.'" img_size="full" alignment="center" style="vc_box_shadow" onclick="custom_link" img_link_target="_blank" link="http://creativewpthemes.net/main-demo/coffee-shop/"][vc_single_image image="'.$qucreative_import_demo_last_attach_id.'" img_size="full" alignment="center" style="vc_box_shadow" onclick="custom_link" img_link_target="_blank" link="http://creativewpthemes.net/main-demo/rock-band/"][vc_single_image image="'.$qucreative_import_demo_last_attach_id.'" img_size="full" alignment="center" style="vc_box_shadow" onclick="custom_link" img_link_target="_blank" link="http://creativewpthemes.net/main-demo/blogger/"][vc_single_image image="'.$qucreative_import_demo_last_attach_id.'" img_size="full" alignment="center" style="vc_box_shadow" onclick="custom_link" img_link_target="_blank" link="http://creativewpthemes.net/main-demo/showcase/"][vc_single_image image="'.$qucreative_import_demo_last_attach_id.'" img_size="full" alignment="center" style="vc_box_shadow" onclick="custom_link" img_link_target="_blank" link="http://creativewpthemes.net/main-demo/pictures/"][/vc_column][vc_column width="1/3"][vc_single_image image="'.$qucreative_import_demo_last_attach_id.'" img_size="full" alignment="center" style="vc_box_shadow" onclick="custom_link" img_link_target="_blank" link="http://creativewpthemes.net/main-demo/beauty-salon/"][vc_single_image image="'.$qucreative_import_demo_last_attach_id.'" img_size="full" alignment="center" style="vc_box_shadow" onclick="custom_link" img_link_target="_blank" link="http://creativewpthemes.net/main-demo/models-agency/"][vc_single_image image="'.$qucreative_import_demo_last_attach_id.'" img_size="full" alignment="center" style="vc_box_shadow" onclick="custom_link" img_link_target="_blank" link="#"][vc_single_image image="'.$qucreative_import_demo_last_attach_id.'" img_size="full" alignment="center" style="vc_box_shadow" onclick="custom_link" img_link_target="_blank" link="http://creativewpthemes.net/main-demo/digital-agency/"][vc_single_image image="'.$qucreative_import_demo_last_attach_id.'" img_size="full" alignment="center" style="vc_box_shadow" onclick="custom_link" img_link_target="_blank" link="http://creativewpthemes.net/main-demo/photoshoot/"][vc_single_image image="'.$qucreative_import_demo_last_attach_id.'" img_size="full" alignment="center" style="vc_box_shadow"][/vc_column][/vc_row][vc_row][vc_column width="1/4"][/vc_column][vc_column width="2/4"][vc_text_separator title="More To Come" style="dotted"][/vc_column][vc_column width="1/4"][/vc_column][/vc_row][/vc_section][vc_section shape="shape-3" shape_color="#f1f1f1" shape_height="150" type="image" style="light"][vc_row css=".vc_custom_1500664531084{margin-bottom: 10px !important;}"][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="02" line1="FULLY CUSTOMIZE" line2="THE DESIGN"][/vc_column][/vc_row][vc_row css=".vc_custom_1500664538269{margin-bottom: 20px !important;}"][vc_column][vc_single_image image="'.$qucreative_import_demo_last_attach_id.'" img_size="full" alignment="center"][/vc_column][/vc_row][vc_row][vc_column width="1/3"][antfarm_bullet_feature style="style-1" feature="feature-type-et" title="ULTRA CUSTOMIZABLE LAYOUT" eticon="icon-adjustments"]Create literally endless totally different designs, as Qu\'s capabilties go far beyond anything you\'ve seen so far.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-1" feature="feature-type-et" title="18 ULTRA CUSTOMIZABLE MENUS" eticon="icon-browser"]From light to dark, from vertical, to horizontal and to overlay, these 18 different menus are highly customizable on their own.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-1" feature="feature-type-et" title="FULLY CUSTOMIZABLE TYPOGRAPHY" eticon="icon-tools"]Qu\'s powerful typography panel, allows you to control every aspect of the entire typography, of the entire theme.[/antfarm_bullet_feature][/vc_column][/vc_row][vc_row css=".vc_custom_1500653231526{margin-bottom: 90px !important;}"][vc_column width="1/3"][antfarm_bullet_feature style="style-1" feature="feature-type-et" title="ULTRA CUSTOMIZABLE ELEMENTS" eticon="icon-layers"]Qu comes with a complete set of highly customizable beautiful elements, with which you can create stunning websites.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-1" feature="feature-type-et" title="NEVER BEFORE SEEN VISUAL FX" eticon="icon-genius"]Qu comes with features never before seen in any other theme, which can spice up your website\'s visual aspect.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-1" feature="feature-type-et" title="LIVE CUSTOMIZER" eticon="icon-paintbrush"]See your layout design changes happen in real time, with the Live Customizer. That\'s the right way to design a website.[/antfarm_bullet_feature][/vc_column][/vc_row][vc_row][vc_column][antfarm_section_title style="one-line" aligment="heading-is-center" line1="LAYOUT DESIGN KEY FEATURES"][/vc_column][/vc_row][vc_row][vc_column width="1/3"][antfarm_list titles="%5B%7B%22faicon%22%3A%22desktop%22%2C%22text%22%3A%22Fully%20customizable%20layout%22%7D%2C%7B%22faicon%22%3A%22cubes%22%2C%22text%22%3A%22Complete%20set%20of%20customziable%20elements%22%7D%2C%7B%22faicon%22%3A%22refresh%22%2C%22text%22%3A%22Optional%20animated%20page%20transitions%22%7D%2C%7B%22faicon%22%3A%22toggle-on%22%2C%22text%22%3A%22Light%20and%20dark%20in-page%20sections%22%7D%2C%7B%22faicon%22%3A%22desktop%22%2C%22text%22%3A%22Boxed%2C%20fullscreen%20fixed%20%2F%20liquid%20content%22%7D%2C%7B%22faicon%22%3A%22adjust%22%2C%22text%22%3A%22Customizable%20section%20backgrounds%22%7D%2C%7B%22faicon%22%3A%22map-marker%22%2C%22text%22%3A%22Custom%20maps%20with%20Snazzy%20Maps%22%7D%2C%7B%22faicon%22%3A%22refresh%22%2C%22text%22%3A%22Optional%20background%20slideshow%22%7D%2C%7B%22faicon%22%3A%22eye%22%2C%22text%22%3A%22Huge%20amount%20of%20visual%20options%22%7D%5D"][/vc_column][vc_column width="1/3"][antfarm_list titles="%5B%7B%22faicon%22%3A%22text-height%22%2C%22text%22%3A%22Fully%20customizable%20typography%22%7D%2C%7B%22faicon%22%3A%22paint-brush%22%2C%22text%22%3A%22Customizable%20colors%22%7D%2C%7B%22faicon%22%3A%22cube%20fa-fw%22%2C%22text%22%3A%22Customizable%20layout%20skins%22%7D%2C%7B%22faicon%22%3A%22bolt%22%2C%22text%22%3A%22Never%20before%20seen%20visual%20FX%22%7D%2C%7B%22faicon%22%3A%22bookmark%22%2C%22text%22%3A%22Highly%20customizable%20page%20title%22%7D%2C%7B%22faicon%22%3A%22exchange%22%2C%22text%22%3A%22Customizable%20content%20position%22%7D%2C%7B%22faicon%22%3A%22arrows-v%22%2C%22text%22%3A%22Optional%20parallax%20background%22%7D%2C%7B%22faicon%22%3A%22chevron-right%22%2C%22text%22%3A%22Custom%20content%20start%20position%22%7D%2C%7B%22faicon%22%3A%22square%22%2C%22text%22%3A%22Customizable%20site%20margins%22%7D%5D"][/vc_column][vc_column width="1/3"][antfarm_list titles="%5B%7B%22faicon%22%3A%22reorder%22%2C%22text%22%3A%2218%20ultra%20customizable%20menus%22%7D%2C%7B%22faicon%22%3A%22arrows-h%22%2C%22text%22%3A%22Custom%20website%20width%20(12%20columns)%22%7D%2C%7B%22faicon%22%3A%22cubes%22%2C%22text%22%3A%22Page%20section%20title%20builder%22%7D%2C%7B%22faicon%22%3A%22adjust%22%2C%22text%22%3A%22Customizable%20layout%20opacities%22%7D%2C%7B%22faicon%22%3A%22picture-o%22%2C%22text%22%3A%22Image%20background%20or%20solid%20color%22%7D%2C%7B%22faicon%22%3A%22sort%22%2C%22text%22%3A%22Optional%20custom%20scrollbar%22%7D%2C%7B%22faicon%22%3A%22leaf%22%2C%22text%22%3A%222%20types%20of%20icon%20fonts%22%7D%2C%7B%22faicon%22%3A%22pie-chart%20fa-fw%22%2C%22text%22%3A%22Fully%20widgetized%22%7D%2C%7B%22faicon%22%3A%22ellipsis-v%22%2C%22text%22%3A%22Optional%20sidebars%20and%20footers%22%7D%5D"][/vc_column][/vc_row][/vc_section][vc_section shape="shape-3" shape_color="#ea2e49" shape_height="700" type="image" style="dark"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="03" line1="PORTFOLIOS" line2="AND GALLERIES"][/vc_column][/vc_row][vc_row][vc_column][antfarm_section_title style="one-line" aligment="heading-is-center" line1="CHOOSE THE MAIN YOU WANT"][/vc_column][/vc_row][vc_row][vc_column][/vc_column][/vc_row][vc_row][vc_column][antfarm_section_title style="one-line" aligment="heading-is-center" line1="AND COMBINE IT WITH THE SINGLE YOU WANT"][/vc_column][/vc_row][vc_row][vc_column][/vc_column][/vc_row][vc_row][vc_column width="1/3"][antfarm_bullet_feature style="style-1" feature="feature-type-et" text_aligment="align-left" title="PORTFOLIO + SINGLE = LOVE" eticon="icon-beaker" read_more_link="" button_style="color-highlight" button_padding="padding-small"]Choose the Portfolio/Gallery main type you want, and assign it the Single Project/Lightbox type you want. Exceptions are Portfolio Expandable and Lights Out Gallery which are tied to their singles in the same element.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-1" feature="feature-type-et" text_aligment="align-left" title="GRID LAYOUT BUILDER" eticon="icon-grid" read_more_link="" button_style="color-highlight" button_padding="padding-small"]Build your portfolios or galleries just the way you want, by controlling the size of each thumbnail with our state of the art visual builder. Of course that is purely optional, you can keep it simple with the default columns.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-1" feature="feature-type-et" text_aligment="align-left" title="ADD THEM ANYWHERE" eticon="icon-scissors" read_more_link="" button_style="color-highlight" button_padding="padding-small"]The Portfolio/Gallery engine is an element, and it can be added to any page, anywhere, just like any other element. Exception is the Lights Out Gallery, as it is a standalone and it requires its own separate page.[/antfarm_bullet_feature][/vc_column][/vc_row][vc_row][vc_column width="1/3"][antfarm_bullet_feature style="style-1" feature="feature-type-et" text_aligment="align-left" title="FIND ITEMS EASILY" eticon="icon-magnifying-glass" read_more_link="" button_style="color-highlight" button_padding="padding-small"]Find the exact portfolio or gallery item you need with ease, as we added thumbnails to portfolio and gallery items, and they are perfectly organized by the categories you created. You will see, this is a total time saver.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-1" feature="feature-type-et" text_aligment="align-left" title="REORDER MANUALLY" eticon="icon-layers" read_more_link="" button_style="color-highlight" button_padding="padding-small"]We know how frustrating it is to not have control over the order of your portfolio and gallery items, so we included the possibility of manually re-ordering them as you wish, both with arrows, and drag and drop.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-1" feature="feature-type-et" text_aligment="align-left" title="YOU WEBSITE, YOUR WAY" eticon="icon-trophy" read_more_link="" button_style="color-highlight" button_padding="padding-small"]We thought about everything when building Qu, and the Portfolio/Gallery engine was no exception. You have absolute total control over everything, and the backend gems that we added are both time and life savers.[/antfarm_bullet_feature][/vc_column][/vc_row][/vc_section][vc_section shape="" type="image" section_bg_image="" bg_hide_on_tablet="true" bg_hide_on_mobile="true" style="light"][vc_row][vc_column width="1/2" css=".vc_custom_1500683800008{margin-bottom: 0px !important;}"][vc_single_image image="'.$qucreative_import_demo_last_attach_id.'" img_size="full"][/vc_column][vc_column width="1/2"][antfarm_section_title style="two-lines" aligment="" line1="TYPOGRAPHY" line2="REINVENTED"][vc_row_inner][vc_column_inner][vc_empty_space height="70px"][vc_column_text]
<h5>Fully Customize The Typography</h5>
[antfarm_divider height="30" style="style-1" color="#222222"][/antfarm_divider]

Choose from over 800 google fonts, experiment with sizes, line heights, styles, weights, combine different fonts, and change all aspects of the typography of the entire theme, to give your website the exact feel you are looking for. Qu comes with an ultra powerful typography customization panel, that gives you total control over every aspect of the typography.

[antfarm_button style="style-hallowblack" padding="" rounded="" the_icon="shopping-cart" link="#"]BUY NOW[/antfarm_button][/vc_column_text][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][/vc_section][vc_section shape="" type="image" section_bg_image="" bg_hide_on_tablet="true" bg_hide_on_mobile="true" style="light"][vc_row][vc_column width="1/2"][antfarm_section_title style="two-lines" aligment="" line1="18 DIFFERENT" line2="HEADERS"][vc_row_inner][vc_column_inner][vc_empty_space height="70px"][vc_column_text]
<h5>Fully Customize The Header</h5>
[antfarm_divider height="30" style="style-1" color="#222222"][/antfarm_divider]

Qu comes with 18 awesome and totally different menu/header designs. From vertical, to horizontal, to ribbon and overlay, from scrollable to sticky, and from light to dark, you can completely change the look and feel of your website with these awesome menu designs. Each of these menus is also highly customizable on its own, so the possibilities are endless.

[antfarm_button style="style-hallowblack" padding="" rounded="" the_icon="shopping-cart" link="#"]BUY NOW[/antfarm_button][/vc_column_text][/vc_column_inner][/vc_row_inner][/vc_column][vc_column width="1/2"][vc_single_image image="'.$qucreative_import_demo_last_attach_id.'" img_size="full" alignment="right"][/vc_column][/vc_row][/vc_section][vc_section shape="" type="image" style="light"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="06" line1="PACKED WITH" line2="AWESOMENESS"][/vc_column][/vc_row][vc_row][vc_column][antfarm_image_box media="'.$img_url.'" aligment="left" text_aligment="text-align-left" heading="Visual Composer Included (Save $34)" heading_style="h5"]Easily build and edit your website from the backend, or directly from the frontend, with probably the world most loved drag and drop page builder, Visual Composer. Save $34 on Visual Composer, as it is included in Qu[/antfarm_image_box][antfarm_image_box media="'.$img_url.'" aligment="right" text_aligment="text-align-right" heading="Slider Revolution Included (Save $25)" heading_style="h5"]Create amazing sliders with outstanding effects and animations, with this state of the artplugin. Unleash your imagination, because Slide Revolution can handle any idea you might have. Save $25, as it is included in Qu.[/antfarm_image_box][antfarm_image_box media="'.$img_url.'" aligment="left" text_aligment="text-align-left" heading="Woo Commerce Shop" heading_style="h5"]The WooCommerce update is underway and coming sooner than you think. Until the update is live, enjoy Qu $29 price tag, instead of $63, and you will receive the shop update for free, because all updates are free.[/antfarm_image_box][/vc_column][/vc_row][/vc_section][vc_section shape="" type="image" section_bg_image="" bg_hide_on_tablet="true" bg_hide_on_mobile="true" style="light"][vc_row][vc_column width="1/2"][vc_single_image image="'.$qucreative_import_demo_last_attach_id.'" img_size="full"][/vc_column][vc_column width="1/2"][antfarm_section_title style="two-lines" aligment="" line1="AWESOME" line2="VISUAL FX"][vc_empty_space height="70px"][vc_column_text]
<h5>Optional Translucency And Saturation FX</h5>
[antfarm_divider height="30" style="style-1" color="#000000"][/antfarm_divider]

Spice up your website by applying an automatic translucent effect on the menu and/or content backgrounds. Customize the amount of the blur, the amount of saturation effect, the opacities and the skins of the foreground, and create your own unique look. This smooth effect is never before seen in any theme on the planet.

[antfarm_button style="style-hallowblack" padding="" rounded="" the_icon="shopping-cart" link="#"]BUY NOW[/antfarm_button][/vc_column_text][/vc_column][/vc_row][/vc_section][vc_section shape="" type="image" section_bg_image="" style="light"][vc_row css=".vc_custom_1500654423286{margin-bottom: 20px !important;}"][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="08" line1="SAVE YOUR" line2="AWESOME DESIGNS"][/vc_column][/vc_row][vc_row css=".vc_custom_1500654406954{margin-bottom: 10px !important;}"][vc_column][vc_single_image image="'.$qucreative_import_demo_last_attach_id.'" img_size="full"][/vc_column][/vc_row][vc_row][vc_column width="1/3"][vc_column_text]
<h6>CREATE YOUR DESIGN</h6>
[antfarm_divider height="30" style="style-1" color="#000000"][/antfarm_divider]

Create your own unique design. Play with the layout options, customize the typography, add visual fx, change the dimensions of your website, etc., until you love the final result.[/vc_column_text][/vc_column][vc_column width="1/3"][vc_column_text]
<h6>SAVE YOUR DESIGN</h6>
[antfarm_divider height="30" style="style-1" color="#000000"][/antfarm_divider]

Save your design as a DESIGN PRESET, which you can edit at any time. All the design settings will be remembered. You can save it under a new name, or overwrite an existing design.[/vc_column_text][/vc_column][vc_column width="1/3"][vc_column_text]
<h6>ACTIVATE YOUR DESIGN</h6>
[antfarm_divider height="30" style="style-1" color="#000000"][/antfarm_divider]

Activate the design you want, and, like magic, the chosen design will be applied on your website. Activate, edit or remove any design, at any time. It is real time saver, right?[/vc_column_text][/vc_column][/vc_row][/vc_section][vc_section shape="" type="image" section_bg_image="" style="light"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="heading-is-center" line1="BUILD YOUR WEBSITE" line2="WITH EASE"][/vc_column][/vc_row][vc_row][vc_column][antfarm_image_box media="'.$qucreative_import_demo_last_attach_id.'"" aligment="left" text_aligment="text-align-left" heading="Live Customizer" heading_style="h5"]The Live Customizer does exactly what it is name suggets: it lets you preview all your settings, from typography, to layout design settings, without having to save. Design your website exactly the way you want.

[antfarm_button style="color-highlight" padding="" rounded="" the_icon="shopping-cart"]BUY NOW[/antfarm_button][/antfarm_image_box][antfarm_image_box media="'.$qucreative_import_demo_last_attach_id.'"" aligment="right" text_aligment="text-align-right" heading="Complete Set Of Design Elements" heading_style="h5"]Qu comes with a complete set of elements, both light and dark, so you can create stunning pages. All elements ar highly customizable to suit your needs. Build beautiful pages with these beautiful elements.

[antfarm_button style="color-highlight" padding="" rounded="" the_icon="shopping-cart"]BUY NOW[/antfarm_button][/antfarm_image_box][/vc_column][/vc_row][/vc_section][vc_section shape="" type="image" style="light"][vc_row][vc_column][antfarm_section_title style="two-lines" aligment="" section_number="10" line1="OTHER AWESOME" line2="FEATURES"][/vc_column][/vc_row][vc_row][vc_column width="1/3"][antfarm_bullet_feature style="style-4" feature="feature-type-fa" icon_aligment="" icon_theme=" " form="form-default" title="FREE UPDATES AND UPGRADES" faicon="download" read_more_link="" button_style=""]You only pay for Qu once, and you will always receive all future upgrades and updates for free. And upgrade Qu we will, it\'s a long term commitment.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-4" feature="feature-type-fa" icon_aligment="" icon_theme=" " form="form-default" title="FAST AND FRIENDLY SUPPORT" faicon="support" read_more_link="" button_style=""]When creating Qu, we made a commitment to ourselves, and our users, that we will provide the absolute best service.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-4" feature="feature-type-fa" icon_aligment="" icon_theme=" " form="form-default" title="ONCE CLICK DEMO INSTALL" faicon="hand-o-up" read_more_link="" button_style=""]Install any demo with no hassle. As huge Qu is, as easy it is to use. Building a website has never been more fun.[/antfarm_bullet_feature][/vc_column][/vc_row][vc_row][vc_column width="1/3"][antfarm_bullet_feature style="style-4" feature="feature-type-fa" icon_aligment="" icon_theme=" " form="form-default" title="RESPONSIVE" et_icon_font_size="37" faicon="mobile-phone" read_more_link="" button_style=""]Of course Qu is responsive, and it will look perfect on any device, from desktop, to notebook, to tablet and to phone.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-4" feature="feature-type-fa" icon_aligment="" icon_theme=" " form="form-default" title="RETINA READY" faicon="eye" read_more_link="" button_style=""]Qu is retina ready, so it will look perfect on devices using the acclaimed retina display. Qu looks perfect on any device.[/antfarm_bullet_feature][/vc_column][vc_column width="1/3"][antfarm_bullet_feature style="style-4" feature="feature-type-fa" icon_aligment="" icon_theme=" " form="form-default" title="TRANSLATION AND RTL READY" faicon="file-text-o" read_more_link="" button_style=""]For users that prefer other languages besides English, we included the .po files, and the theme is Right To Left Text ready.[/antfarm_bullet_feature][/vc_column][/vc_row][/vc_section]';





	$args = array(
		'post_title'    => wp_strip_all_tags( 'HOME ALTERNATIVE' ),
		'post_content'  => $cont,
		'post_name'   => 'qucreative-home-2',
		'post_status'   => 'publish',
		'post_author'   => 1,
		'post_type'   => 'page',

	);


	$page_id = wp_insert_post( $args );
	$page_id_home_2 = $page_id;







	update_post_meta(  $page_id ,'qucreative_'.'meta_content_starts_at','pixel-position');
	update_post_meta(  $page_id ,'qucreative_'.'meta_content_starts_at_pixel','0');




	update_post_meta(  $page_id ,'qucreative_'.'meta_is_fullscreen','on');
	update_post_meta(  $page_id ,'qucreative_'.'meta_is_fullscreen_stretch','contain');
	update_post_meta(  $page_id ,'qucreative_'.'meta_custom_title',' ');
	update_post_meta(  $page_id ,'qucreative_'.'meta_bg_image',$img_url);

































	$menu_name = 'QU MAIN MENU';
    $menu_id = wp_get_nav_menu_object( $menu_name );


    if( !$menu_id){
        $menu_id = wp_create_nav_menu($menu_name);


        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' =>  ('HOME'),
            'menu-item-classes' => '',
            'menu-item-object' => 'page',
            'menu-item-type' => 'post_type',
            'menu-item-object-id' => $page_id_home,
            'menu-item-status' => 'publish',
        ));

        $id_pages = wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' =>  ('PAGES'),
            'menu-item-url' => '#',
            'menu-item-status' => 'publish',
        ));

        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' =>  ('ABOUT'),

            'menu-item-object' => 'page',
            'menu-item-type' => 'post_type',
            'menu-item-object-id' => $page_id_about,
            'menu-item-status' => 'publish',
            'menu-item-parent-id' => $id_pages,
        ));

        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' =>  ('SERVICES'),

            'menu-item-object' => 'page',
            'menu-item-type' => 'post_type',
            'menu-item-object-id' => $page_id_services,
            'menu-item-status' => 'publish',
            'menu-item-parent-id' => $id_pages,
        ));


        $id_elements = wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' =>  ('ELEMENTS'),
            'menu-item-url' => '#',
            'menu-item-status' => 'publish',
        ));


        $id_elements_sub = wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' =>  ('ELEMENTS'),
            'menu-item-url' => '#',
            'menu-item-status' => 'publish',
            'menu-item-parent-id' => $id_elements,
        ));






        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' =>  ('ELEMENTS 1'),

            'menu-item-object' => 'page',
            'menu-item-type' => 'post_type',
            'menu-item-object-id' => $page_id_elements_1,
            'menu-item-status' => 'publish',
            'menu-item-parent-id' => $id_elements_sub,
        ));



        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' =>  ('ELEMENTS 2'),

            'menu-item-object' => 'page',
            'menu-item-type' => 'post_type',
            'menu-item-object-id' => $page_id_elements_2,
            'menu-item-status' => 'publish',
            'menu-item-parent-id' => $id_elements_sub,
        ));



        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' =>  ('ELEMENTS 3'),

            'menu-item-object' => 'page',
            'menu-item-type' => 'post_type',
            'menu-item-object-id' => $page_id_elements_3,
            'menu-item-status' => 'publish',
            'menu-item-parent-id' => $id_elements_sub,
        ));



        $id_elements_sc = wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' =>  ('SECONDARY'),
            'menu-item-url' => '#',
            'menu-item-status' => 'publish',
            'menu-item-parent-id' => $id_elements,
        ));




        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' =>  ('PART 1'),

            'menu-item-object' => 'page',
            'menu-item-type' => 'post_type',
            'menu-item-object-id' => $page_id_secondary_1,
            'menu-item-status' => 'publish',
            'menu-item-parent-id' => $id_elements_sc,
        ));



        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' =>  ('PART 2'),

            'menu-item-object' => 'page',
            'menu-item-type' => 'post_type',
            'menu-item-object-id' => $page_id_secondary_2,
            'menu-item-status' => 'publish',
            'menu-item-parent-id' => $id_elements_sc,
        ));



        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' =>  ('TYPOGRAPHY'),

            'menu-item-object' => 'page',
            'menu-item-type' => 'post_type',
            'menu-item-object-id' => $page_id_typography,
            'menu-item-status' => 'publish',
            'menu-item-parent-id' => $id_elements,
        ));





        $id_portfolios = wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' =>  ('PORTFOLIOS'),
            'menu-item-url' => '#',
            'menu-item-status' => 'publish',

        ));





        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' =>  ('CLASSIC'),

            'menu-item-object' => 'page',
            'menu-item-type' => 'post_type',
            'menu-item-object-id' => $page_id_pc,
            'menu-item-status' => 'publish',
            'menu-item-parent-id' => $id_portfolios,
        ));



        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' =>  ('STACK'),

            'menu-item-object' => 'page',
            'menu-item-type' => 'post_type',
            'menu-item-object-id' => $page_id_pf,
            'menu-item-status' => 'publish',
            'menu-item-parent-id' => $id_portfolios,
        ));




        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' =>  ('EXPANDABLE'),

            'menu-item-object' => 'page',
            'menu-item-type' => 'post_type',
            'menu-item-object-id' => $page_id_expandable,
            'menu-item-status' => 'publish',
            'menu-item-parent-id' => $id_portfolios,
        ));









        $id_galleries = wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' =>  ('GALLERIES'),
            'menu-item-url' => '#',
            'menu-item-status' => 'publish',

        ));






        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' =>  ('CLASSIC'),

            'menu-item-object' => 'page',
            'menu-item-type' => 'post_type',
            'menu-item-object-id' => $page_id_gc,
            'menu-item-status' => 'publish',
            'menu-item-parent-id' => $id_galleries,
        ));



        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' =>  ('MASONRY'),

            'menu-item-object' => 'page',
            'menu-item-type' => 'post_type',
            'menu-item-object-id' => $page_id_masonry,
            'menu-item-status' => 'publish',
            'menu-item-parent-id' => $id_galleries,
        ));





        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' =>  ('LIGHTS OUT'),

            'menu-item-object' => 'page',
            'menu-item-type' => 'post_type',
            'menu-item-object-id' => $page_id_lights_out,
            'menu-item-status' => 'publish',
            'menu-item-parent-id' => $id_galleries,
        ));




        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' =>  ('QU SLIDER'),

            'menu-item-object' => 'page',
            'menu-item-type' => 'post_type',
            'menu-item-object-id' => $page_id_bg_slideshow,
            'menu-item-status' => 'publish',
            'menu-item-parent-id' => $id_galleries,
        ));




        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' =>  ('OUR BLOG'),

            'menu-item-object' => 'page',
            'menu-item-type' => 'post_type',
            'menu-item-object-id' => $page_id_blog,
            'menu-item-status' => 'publish',

        ));


        $id_contact = wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' =>  ('CONTACT'),
            'menu-item-url' => '#',
            'menu-item-status' => 'publish',

        ));





        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' =>  ('CREATIVE'),

            'menu-item-object' => 'page',
            'menu-item-type' => 'post_type',
            'menu-item-object-id' => $page_id_contact_creative,
            'menu-item-status' => 'publish',
            'menu-item-parent-id' => $id_contact,
        ));





        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' =>  ('IMAGE HEADER'),

            'menu-item-object' => 'page',
            'menu-item-type' => 'post_type',
            'menu-item-object-id' => $page_id_contact_image_header,
            'menu-item-status' => 'publish',
            'menu-item-parent-id' => $id_contact,
        ));





        wp_update_nav_menu_item($menu_id, 0, array(
            'menu-item-title' =>  ('MAP HEADER'),

            'menu-item-object' => 'page',
            'menu-item-type' => 'post_type',
            'menu-item-object-id' => $page_id_contact_map_header,
            'menu-item-status' => 'publish',
            'menu-item-parent-id' => $id_contact,
        ));















    }


    if(isset($menu_id->term_id)){
	    $menu_id = $menu_id->term_id;
    }






























    



    $ser_data = 'a:51:{s:14:"portfolio_page";s:'.strlen($page_id_pc).':"'.$page_id_pc.'";s:11:"mail_method";s:7:"wp_mail";s:12:"blur_ammount";s:2:"30";s:23:"menu_enviroment_opacity";s:2:"30";s:26:"content_enviroment_opacity";s:2:"37";s:24:"secondary_content_height";s:3:"370";s:13:"gmaps_api_key";s:39:"AIzaSyAckyD3QGvcqBv07cmFAcFraXXwuWZMyxo";s:17:"soundcloud_apikey";s:32:"be48604d903aebd628b5bac968ffd14d";s:13:"gmaps_styling";s:0:"";s:13:"content_align";s:20:"content-align-center";s:16:"page_title_align";s:22:"page-title-align-right";s:16:"page_title_style";s:18:"page-title-style-2";s:12:"width_column";s:2:"50";s:9:"width_gap";s:2:"30";s:17:"width_blur_margin";s:2:"30";s:16:"width_section_bg";s:0:"";s:24:"content_add_extra_pixels";s:0:"";s:12:"border_width";s:1:"0";s:12:"border_color";s:7:"#ffffff";s:37:"content_section_title_two_lines_space";s:1:"0";s:43:"content_section_title_two_lines_use_divider";s:0:"";s:49:"content_section_title_two_lines_use_divider_color";s:0:"";s:9:"menu_type";s:11:"menu-type-1";s:14:"menu_is_sticky";s:3:"off";s:28:"menu_horizontal_shadow_style";s:4:"none";s:12:"social_icons";s:162:"[{"link":"#","icon":"facebook-square"},{"link":"#","icon":"behance"},{"link":"#","icon":"pinterest"},{"link":"#","icon":"twitter"},{"link":"#","icon":"linkedin"}]";s:23:"meta_options_post_types";b:0;s:4:"logo";s:'.strlen($logo_url).':"'.$logo_url.'";s:6:"logo_x";s:7:"default";s:13:"logo_x_custom";s:0:"";s:6:"logo_y";s:7:"default";s:10:"logo_width";s:0:"";s:11:"logo_height";s:0:"";s:13:"logo_y_custom";s:0:"";s:17:"copyright_textbox";s:14:"ANTFARM THEMES";s:31:"copyright_textbox_heading_style";s:9:"h-group-1";s:38:"footer_copyright_textbox_heading_style";s:9:"h-group-1";s:9:"font_data";s:'.strlen(QUCREATIVE_DEFAULT_TYPOGRAPHY).':"'.QUCREATIVE_DEFAULT_TYPOGRAPHY.'";s:32:"typography_sidebar_heading_style";s:2:"h6";s:31:"typography_footer_heading_style";s:2:"h6";s:24:"content_enviroment_style";s:15:"body-style-dark";s:17:"greyscale_ammount";s:1:"0";s:21:"section_margin_bottom";s:2:"30";s:15:"highlight_color";s:7:"#ff3366";s:22:"enable_bordered_design";s:2:"on";s:23:"enable_native_scrollbar";s:3:"off";s:13:"bg_transition";s:8:"wipedown";s:11:"enable_ajax";s:2:"on";s:13:"bg_isparallax";s:2:"on";s:18:"custom_css_post_id";i:-1;s:18:"nav_menu_locations";a:2:{s:7:"primary";i:'.$menu_id.';s:6:"social";i:0;}}';





    qucreative_import_demo_update_preset($ser_data,array(

        'preseter_slug' => $demo_slug,
        'preseter_name' => $demo_name,
    ));










}










