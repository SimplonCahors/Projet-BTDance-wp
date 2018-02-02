<?php






class DZS_PageBuilder {


    private $main_config_options=array();
    private $dblink=array();
    private $config = array();





    function __construct($pargs = array()) {



        $margs = array(
            'connect_to_db'=>true,
            'is_wp'=>false,
        );

        $margs = array_merge($margs, $pargs);




        global  $dzsap_config;

        $this->main_config_options = $dzsap_config;

        if(is_array($this->main_config_options)==false){
            $this->main_config_options = array();
        }


        $this->main_config_options = array_merge($margs, $this->main_config_options);





        if($margs['connect_to_db']){

            $this->connect_database();
        }




        if(isset($_POST['action']) && $_POST['action']=='ajax_select_pages_array'){
            $this->ajax_select_pages_array();
        }

        if(isset($_POST['action']) && $_POST['action']=='ajax_select_templates_array'){
            $this->select_templates_array(array(
                'for_ajax' => true
            ));
        }
        if(isset($_POST['action']) && $_POST['action']=='ajax_update_page_attr'){
            $this->ajax_update_page_attr();
        }
        if(isset($_POST['action']) && $_POST['action']=='ajax_update_post_meta'){


            $this->update_post_meta($_POST['post_id'],$_POST['arglab'],$_POST['argval']);
            die();
        }
        if(isset($_POST['action']) && $_POST['action']=='ajax_update_post_meta_all'){


            $post_arr = array();
            parse_str($_POST['postdata'], $post_arr);




            foreach($post_arr as $lab => $val){

                if($lab==='post_id'){
                    continue;
                }

                $this->update_post_meta($post_arr['post_id'], $lab, $val, array(
                    'for_ajax'=>false,
                ));

            }



            die();
        }

        if(isset($_POST['action']) && $_POST['action']=='ajax_update_post'){



            $post_arr = array();
            parse_str($_POST['postdata'], $post_arr);


            $this->update_post($post_arr['post_id'],$post_arr);
            die();
        }
        if(isset($_POST['action']) && $_POST['action']=='ajax_update_page_meta'){
            $this->ajax_update_page_meta();
        }
        if(isset($_POST['action']) && $_POST['action']=='ajax_create_page'){
            $this->ajax_create_page();
        }
        if(isset($_POST['action']) && $_POST['action']=='ajax_create_template'){
            $this->ajax_create_template();
        }
        if(isset($_POST['action']) && $_POST['action']=='ajax_delete_page'){

            $args = array();



            $this->ajax_delete_page($_POST);
        }
        if(isset($_POST['action']) && $_POST['action']=='ajax_delete_template'){
            $this->ajax_delete_template();
        }
        if(isset($_POST['action']) && $_POST['action']=='save_template'){
            $this->post_save_template();
        }
        if(isset($_POST['action']) && $_POST['action']=='save_template_by_id'){
            $this->post_save_template_by_id();
        }
        if(isset($_POST['action']) && $_POST['action']=='ajax_save_mainsettings'){
            $this->ajax_save_mainsettings();
        }



    }




    function ajax_create_template(){



        $query = "SELECT `id` FROM `dzspgb_templates` WHERE `template_name` = '".$_POST['title']."'";


        $aux = $this->dblink->query($query);

        if($aux){

            if($aux->num_rows==0){


                $query="INSERT INTO `dzspgb_templates` (`template_name`) VALUES ('".$_POST['title']."')";
                $aux = $this->dblink->query($query);



                echo 'success - template inserted';


            }else{


                echo 'error - template title already exists';
            }
        }else{
        }


        die();
    }

    function ajax_delete_page($pargs = array()){




        $margs = array(
            'for_ajax'=>true,
            'table'=>'pages',
        );


        $margs = array_merge($margs,$pargs);





        $query = "SELECT `id` FROM `".$margs['table']."` WHERE `id` = '".$_POST['id']."'";


        $aux = $this->dblink->query($query);

        if($aux){

            if($aux->num_rows==0){
                echo 'error - page id does not exist';

            }else{


                $query="DELETE FROM `".$margs['table']."` WHERE id='".$_POST['id']."'";
                $aux = $this->dblink->query($query);


                echo 'success - page deleted';


            }
        }else{
        }


        die();
    }

    function ajax_delete_template(){



        $query = "SELECT `id` FROM `dzspgb_templates` WHERE `id` = '".$_POST['id']."'";


        $aux = $this->dblink->query($query);

        if($aux){

            if($aux->num_rows==0){
                echo 'error - template id does not exist';

            }else{


                $query="DELETE FROM `dzspgb_templates` WHERE id='".$_POST['id']."'";
                $aux = $this->dblink->query($query);


                echo 'success - template deleted';


            }
        }else{
        }


        die();
    }

    function post_save_template(){



        $query = "SELECT `id` FROM `dzspgb_templates` WHERE `template_name` = '".$_POST['template_name']."'";


        $aux = $this->dblink->query($query);

        if($aux){

            if($aux->num_rows==0){

                $query="INSERT INTO `dzspgb_templates` (`template_name`, `template_data`) VALUES ('".$_POST['template_name']."', '".$_POST['postdata']."')";
                $aux = $this->dblink->query($query);


                echo 'success - template_inserted';
            }else{


                $query="UPDATE `dzspgb_templates` SET `template_data`='".$_POST['postdata']."' WHERE `template_name`='".$_POST['template_name']."'";
                $aux = $this->dblink->query($query);



                $auxa = array();

                parse_str($_POST['postdata'], $auxa);
                echo $_POST['postdata']; print_r($auxa);

                echo 'success - template_updated';
            }
        }else{
        }


        die();
    }
    function post_save_template_by_id(){



        $query = "SELECT `id` FROM `dzspgb_templates` WHERE `id` = '".$_POST['template_id']."'";


        $aux = $this->dblink->query($query);

        if($aux){


                $query="UPDATE `dzspgb_templates` SET `template_data`='".$_POST['postdata']."' WHERE `id`='".$_POST['template_id']."'";
                $aux = $this->dblink->query($query);



                $auxa = array();


                echo 'success - template_updated';

        }else{
            echo 'error - template_does_not_exist';
        }


        die();
    }

    function select_templates_array($pargs = array()){


        $margs = array(
            'for_ajax'=>false
        );

        if($pargs){
            $margs = array_merge($margs,$pargs);
        }

        $query = "SELECT * FROM `dzspgb_templates`";

        $auxa = array();



        if($this->dblink){
            $aux = $this->dblink->query($query);

            if ($aux && $aux->num_rows > 0) {

                while($row = mysqli_fetch_assoc($aux)){

                    array_push($auxa, $row);
                }


            }


            if($margs['for_ajax']===true){

                echo json_encode($auxa);

                die();
            }else{

                return $auxa;

            }
        }else{
            return array();
        }



    }
    function select_template_array($arg){

        $query = "SELECT * FROM `dzspgb_templates` WHERE id='$arg'";

        $auxa = array();

        $aux = $this->dblink->query($query);

        if ($aux && $aux->num_rows > 0) {

            while($row = mysqli_fetch_assoc($aux)){

                array_push($auxa, $row);
            }


        }

        return $auxa;
    }
    function select_page($arg, $pargs=array()){

        $margs = array(
            'post_type' => 'page',
            'post_type_type' => 'event', // -- no use for it ATM
        );


        if($pargs){
            $margs = array_merge($margs,$pargs);
        }

        $table2 = 'pages';
        if($margs['post_type']!=='page'){

            $table2 = $margs['post_type'].'s';
        }

        if($margs['post_type']==='menu'){
            $table2 = 'menus';
        }

        if($margs['post_type']==='apconfig'){
            $table2 = 'apconfigs';
        }



        $query = "SELECT * FROM `$table2` WHERE id='$arg'";

        if($table2=='posts'){
            if($margs['post_type_type']){

            }
        }



        $aux_str = '';

        $aux = $this->dblink->query($query);
        if ($aux && $aux->num_rows > 0) {

            while($row = mysqli_fetch_assoc($aux)){

                $aux_str = $row;
            }


        }

        return $aux_str;
    }

    function ajax_update_page_attr(){


        $the_id = $_POST['id'];
        $arglab = $_POST['arglab'];
        $argval = $_POST['argval'];

        $table2 = 'pages';

        if(isset($_POST['post_type']) && $_POST['post_type']=='menu'){
            $table2 = 'menus';

        }
        if(isset($_POST['post_type']) && $_POST['post_type']=='apconfig'){
            $table2 = 'apconfigs';
        }

        $argval = $this->dblink->real_escape_string($argval);



        $query = "UPDATE `$table2` SET ".$arglab."='".$argval."' WHERE id='$the_id'";



        $aux = $this->dblink->query($query);


        if($aux){






            echo 'success - '.esc_html__("content saved");

        }else{
            echo 'error - '.mysqli_error($this->dblink);
        }


        die();
    }

    function ajax_update_page_meta(){


        $page_id = $_POST['page_id'];
        $arglab = $_POST['arglab'];
        $argval = $_POST['argval'];



        $query = "SELECT `id` FROM `post_meta` WHERE `lab` = '$arglab' AND post_id='$page_id'  AND post_type='page'";


        $aux = $this->dblink->query($query);

        if($aux){






            if($aux->num_rows > 0){

                $query="UPDATE `post_meta` SET `val`='".$argval."' WHERE `lab` = '$arglab' AND post_id='$page_id' AND post_type='page'";
                $aux2 = $this->dblink->query($query);



                echo 'success - settings updated';
            }else{




                $query="INSERT INTO `post_meta` (post_id,lab, val,post_type) VALUES ('$page_id', '".$arglab."', '".$argval."','page')";
                $aux2 = $this->dblink->query($query);


                echo 'success - settings added';
            }

            $auxa = array();




        }else{
            echo 'error - sql error';
        }





        die();
    }




    function update_post_meta($post_id,$arglab,$argval,$pargs=array()){

        $margs = array(
            'post_type'=>'post',
            'for_ajax'=>true,
        );

        if($pargs){
            $margs = array_merge($margs,$pargs);
        }





        $query = "SELECT `id` FROM `post_meta` WHERE `lab` = '$arglab' AND post_id='$post_id'  AND post_type='".$margs['post_type']."'";




        $aux = $this->dblink->query($query);

        if($aux){





            if($aux->num_rows > 0){

                $query="UPDATE `post_meta` SET `val`='".$argval."' WHERE `lab` = '$arglab' AND post_id='$post_id' AND post_type='".$margs['post_type']."'";
                $aux2 = $this->dblink->query($query);



                if($margs['for_ajax']) {
                    echo 'success - settings updated';
                }
            }else{




                $query="INSERT INTO `post_meta` (post_id,lab, val,post_type) VALUES ('$post_id', '".$arglab."', '".$argval."','".$margs['post_type']."')";
                $aux2 = $this->dblink->query($query);



                if($margs['for_ajax']) {
                    echo 'success - settings added';
                }
            }

            $auxa = array();



        }else{
            if($margs['for_ajax']) {
                echo 'error - sql error';
            }
        }


        if($margs['for_ajax']){
            die();
        }else{
            return 1;
        }



    }


    function update_post($post_id,$pargs=array()){

        $margs = array(

            'for_ajax'=>true,
            'table_name'=>'posts',
        );

        if($pargs){
            $margs = array_merge($margs,$pargs);
        }





        $query = "SELECT `id` FROM `".$margs['table_name']."` WHERE id='$post_id' ";


        $aux = $this->dblink->query($query);


        $i=0;
        $str_sets = '';
        foreach($margs as $lab=>$val){
            
            if($margs['table_name']=='users' && $lab==='capabilities'){
                if(is_array($val)==false){
                    if($val){
                        
                    $val = array($val);
                    }else{
                        
                    $val = array();
                    }
                }
                $val = serialize($val);
            }

            if($lab==='for_ajax'||$lab==='post_id'||$lab==='table_name'){
                continue;
            }

            if($i>0){
                $str_sets.=',';
            }


            $str_sets.=$lab.'='."'".$val."'";

            $i++;

        }





        if($aux){






            if($aux->num_rows > 0){

                $query="UPDATE `".$margs['table_name']."` SET ".$str_sets." WHERE id='$post_id' ";


                $aux2 = $this->dblink->query($query);



                if($margs['for_ajax']) {
                    echo 'success - settings updated';
                }
            }else{





            }

            $auxa = array();



        }else{
            if($margs['for_ajax']) {
                echo 'error - sql error';
            }
        }


        if($margs['for_ajax']){
            die();
        }else{
            return 1;
        }



    }

    function ajax_update_post_meta(){


        $post_id = $_POST['post_id'];
        $arglab = $_POST['arglab'];
        $argval = $_POST['argval'];
        $post_type = $_POST['post_type'];



        $query = "SELECT `id` FROM `post_meta` WHERE `lab` = '$arglab' AND post_id='$post_id'  AND post_type='$post_type'";


        $aux = $this->dblink->query($query);

        if($aux){






            if($aux->num_rows > 0){

                $query="UPDATE `post_meta` SET `val`='".$argval."' WHERE `lab` = '$arglab' AND post_id='$page_id' AND post_type='$post_type'";
                $aux2 = $this->dblink->query($query);



                echo 'success - settings updated';
            }else{




                $query="INSERT INTO `post_meta` (post_id,lab, val,post_type) VALUES ('$page_id', '".$arglab."', '".$argval."','$post_type')";
                $aux2 = $this->dblink->query($query);


                echo 'success - settings added';
            }

            $auxa = array();




        }else{
            echo 'error - sql error';
        }





        die();
    }



    function generate_element_types($pargs = array()){

        global $dzspgb_templates;
        $fout = '';

        $margs = array(
            'index' => '0',
            'type' => 'section',
        );

        $margs = array_merge($margs, $pargs);



        foreach($dzspgb_templates as $template){
            $fout.=call_user_func($template['admin_str_function']);
        }



        $fout.='<br><span class="close-element-type-label"><i class="fa fa-close"></i> <span>'.esc_html__("Close").'</span></span>';

        return $fout;
    }




    function generate_layout_types($pargs = array()){

        $fout = '';

        $margs = array(
            'index' => '0',
            'type' => 'section',
        );

        $margs = array_merge($margs, $pargs);


        $fout.='<span class="layout-type-con" data-layout="1.1"><span class="layout-type" ><span class="layout-type--block"></span></span></span><span class="layout-type-con" data-layout="1.2+1.2"><span class="layout-type" ><span class="layout-type--block"></span><span class="layout-type--block"></span></span></span><span class="layout-type-con" data-layout="2.3+1.3"><span class="layout-type" ><span class="layout-type--block"></span><span class="layout-type--block"></span></span></span><span class="layout-type-con" data-layout="3.4+1.4"><span class="layout-type" ><span class="layout-type--block"></span><span class="layout-type--block"></span></span></span><span class="layout-type-con" data-layout="1.3+2.3"><span class="layout-type" ><span class="layout-type--block"></span><span class="layout-type--block"></span></span></span><span class="layout-type-con" data-layout="1.3+1.3+1.3"><span class="layout-type" ><span class="layout-type--block"></span><span class="layout-type--block"></span><span class="layout-type--block"></span></span></span><span class="layout-type-con" data-layout="1.2+1.4+1.4"><span class="layout-type" ><span class="layout-type--block"></span><span class="layout-type--block"></span><span class="layout-type--block"></span></span></span><span class="layout-type-con" data-layout="1.4+1.2+1.4"><span class="layout-type" ><span class="layout-type--block"></span><span class="layout-type--block"></span><span class="layout-type--block"></span></span></span><span class="layout-type-con" data-layout="1.4+1.4+1.2"><span class="layout-type" ><span class="layout-type--block"></span><span class="layout-type--block"></span><span class="layout-type--block"></span></span></span><span class="layout-type-con" data-layout="1.4+1.4+1.4+1.4"><span class="layout-type" ><span class="layout-type--block"></span><span class="layout-type--block"></span><span class="layout-type--block"></span><span class="layout-type--block"></span></span></span>';

        return $fout;
    }



    function generate_admin_section_part1($pargs = array()){

        $struct_item = '';


        $margs = array(
            'section_index' => '0',
            'type' => 'section',
            'extra_classes' => '',
        );

        $margs = array_merge($margs, $pargs);




        $struct_item .= '<div class="admin-dzspgb-section"><div class="hidden-content" id=""><div class="setting"><div class="setting-label">'.esc_html__('Extra Classes').'</div><input type="text" name="dzspgb['.$margs['section_index'].'][extra_classes]" value="'.$margs['extra_classes'].'"/></div><br><p class="buttons-con"><button class="button-primary btn-delete-itm btn-delete-section">'.esc_html__('Delete Section').'</button> <button class="button-secondary btn-done-editing">'.esc_html__('Done Editing').'</button> </p></div>';


        return $struct_item;

    }



    function generate_admin_container_part1($pargs = array()){


        $struct_item = '';


        $margs = array(
            'section_index' => '0',
            'container_index' => '0',
            'type' => 'container',
            'extra_classes' => '',
            'use_template' => 'none',
            'is_content' => 'off',
            'admin_args' => array(
                'this_is_template_admin'=>false
            )
        );

        $margs = array_merge($margs, $pargs);



        $ind = '';

        if($margs['section_index']!==''){
            $ind.='['.$margs['section_index'].']';
        }
        if($margs['container_index']!==''){
            $ind.='['.$margs['container_index'].']';
        }



        $struct_item .= '<div class="admin-dzspgb-container"><div class="admin-dzspgb-label-con"><span class="admin-dzspgb-label">CONTAINER</span><div class="extra-settings-chooser dzstooltip-con js"><i class="fa fa-gear"></i><div class="dzstooltip arrow-top align-left skin-white " style="">
        <div class="dzspb_lay_con">
        <div class="dzspb_layb_one_half">
        <div class="setting"><div class="setting-label">'.esc_html__('Extra Classes').'</div><input class="dzspgb-text-changer" type="text" name="dzspgb'.$ind.'[extra_classes]" value="'.$margs['extra_classes'].'"/></div>
        </div><!-- .dzspb_layb_one_half END -->
        <div class="dzspb_layb_one_half">
        ';




        if($margs['admin_args']['this_is_template_admin']){

$lab = 'is_content';


            $nam = 'dzspgb'.$ind.'['.$lab.']';



            $struct_item.='<div class="setting">
                        <div class="setting-label">'.esc_html__('Content Container','antfarm').'</div>
                        <div class="dzscheckbox skin-nova">
                            '.DZSHelpers::generate_input_checkbox($nam,array('id' => $lab, 'val' => 'on','seekval' => $margs[$lab])).'
                            <label for="'.$nam.'"></label>
                        </div>
                        <div class="sidenote">'.esc_html__('this is where the main content of the page would come, if this option is enabled').'</div>
</div>';

        }else{
            $struct_item.='<div class="setting"><div class="setting-label">'.esc_html__('Template').'</div>';


            $arr_opts = array(
                0=>array('lab'=> 'No template', 'val'=>'none'),
            );

            $auxa = $this->select_templates_array();




            foreach($auxa as $template){
                $auxb = array();
                parse_str($template['template_data'], $auxb);


                if(isset($auxb['dzspgb']['type']) && $auxb['dzspgb']['type']==='Row'){

                    array_push($arr_opts, array('lab'=> $template['template_name'], 'val'=>$template['id']));
                }

            }



            $nam = 'dzspgb'.$ind.'[use_template]';

            $struct_item.= DZSHelpers::generate_select($nam, array('class'=>'dzs-style-me skin-beige dzspgb-text-changer', 'options'=>$arr_opts, 'seekval'=>$margs['use_template']));






            $struct_item.='</div>';
        }






        $struct_item.='</div><!-- .dzspb_layb_one_half END -->
        </div><!-- end dzspb_lay_con -->
        <div><button class="button-primary btn-delete-itm btn-delete-container" data-index="dzspgb'.$ind.'[index]">'.esc_html__('Delete Container').'</button></div></div></div><span class="mover-container-handler-con"><i class="fa fa-arrows-v"></i></span></div>
        <div class="is-content-placeholder" style="height:0;overflow:hidden;padding:0;">'.esc_html__('This is where the content from the page comes.').'</div>
        <div class="area-rows">';


        return $struct_item;

    }






    function generate_admin_row_part1($pargs = array()){

        $struct_item = '';


        $margs = array(
            'section_index' => '0',
            'container_index' => '0',
            'row_index' => '0',
            'type' => 'row',
            'empty' => true,
            'extra_classes' => '',
            'hide_when_logged_in' => '',
            'hide_when_not_logged_in' => '',
            'type_pb' => "Full",
            'column_padding' => "default",
        );

        $margs = array_merge($margs, $pargs);




        $ind = '';

        if($margs['type_pb']==='Full'){
            if($margs['section_index']!==''){
                $ind.='['.$margs['section_index'].']';
            }
            if($margs['container_index']!==''){
                $ind.='['.$margs['container_index'].']';
            }
        }

        if($margs['row_index']!==''){
            $ind.='['.$margs['row_index'].']';
        }





        $struct_item .= '<div class="admin-dzspgb-row"><div class="admin-dzspgb-label-con"><span class="admin-dzspgb-label">ROW</span>
        <div class="extra-settings-chooser dzstooltip-con js">
        <i class="fa fa-gear"></i>
        <div class="dzstooltip arrow-top align-left skin-white " style="">
        <div class="dzspb_lay_con">
            <div class="dzspb_layb_one_half">
                <span class="setting"><span class="setting-label">'.esc_html__('Extra Classes').'</span><input class="dzspgb-text-changer" type="text" name="dzspgb'.$ind.'[extra_classes]" value="'.$margs['extra_classes'].'"/></span></span>
            </div><!-- .dzspb_layb_one_half END -->
            <div class="dzspb_layb_one_half">
            ';




        if($this->main_config_options['is_wp']==false){
            $lab = 'hide_when_logged_in';


            $nam = 'dzspgb'.$ind.'['.$lab.']';
            $struct_item.='<div class="setting">
                        <div class="setting-label">'.esc_html__('Hide When Logged In','antfarm').'</div>
                        <div class="dzscheckbox skin-nova">
                            '.DZSHelpers::generate_input_checkbox($nam,array('id' => $lab, 'val' => 'on','seekval' => $margs[$lab])).'
                            <label for="'.$nam.'"></label>
                        </div>
                        </div>';


            $lab = 'hide_when_not_logged_in';


            $nam = 'dzspgb'.$ind.'['.$lab.']';

            $struct_item.='<div class="setting">
                        <div class="setting-label">'.esc_html__('Hide When Not Logged In','antfarm').'</div>
                        <div class="dzscheckbox skin-nova">
                            '.DZSHelpers::generate_input_checkbox($nam,array('id' => $lab, 'val' => 'on','seekval' => $margs[$lab])).'
                            <label for="'.$nam.'"></label>
                        </div>
                        <div class="sidenote">'.esc_html__('this is where the main content of the page would come, if this option is enabled').'</div>
</div>';

        }




        $lab = 'column_padding';





        $nam = 'dzspgb'.$ind.'['.$lab.']';



        $struct_item.='<div class="setting">
                        <div class="setting-label">'.esc_html__('Column Padding','antfarm').'</div>
                            ';



        $val = 'default';
        $struct_item.='<label>'.DZSHelpers::generate_input_checkbox($nam,
                array('id' => $lab,
                    'type' => 'radio',
                    'val' => $val,
                    'class' => 'dzspgb-text-changer val-'.$val,
                    'seekval' => $margs[$lab]
                )
            ).' '.esc_html__("Default").'</label><br>';


        $val = '10';

                            $struct_item.='<label>'.DZSHelpers::generate_input_checkbox($nam,
                array('id' => $lab,
                    'type' => 'radio',
                    'val' => $val,
                    'class' => 'dzspgb-text-changer val-'.$val,
                    'seekval' => $margs[$lab]
                )
            ).' '.esc_html__("10 Pixels").'</label><br>
                        <div class="sidenote">'.esc_html__('this is where the main content of the page would come, if this option is enabled').'</div>
</div>';





        $struct_item.='</div><!-- .dzspb_layb_one_half END -->
            </div><!-- end dzspblay_con -->

        <div><button class="button-primary btn-delete-itm btn-delete-row" data-index="dzspgb'.$ind.'[index]">'.esc_html__('Delete Row').'</button></div>
        </div>
        </div>
        <span class="layout-chooser dzstooltip-con js"><i class="fa fa-th"></i><span class="dzstooltip arrow-top align-left skin-white " style="padding-bottom:0; "><span class="layout-chooser-blocks-row">'.$this->generate_layout_types().'</span></span></span><span class="mover-row-handler-con"><i class="fa fa-arrows-v"></i></span></div>
<div class="area-row-parts">';


        if($margs['empty']===true){

            $struct_item.=$this->generate_admin_row_part_part1().$this->generate_admin_row_part_part2();
            $struct_item.=$this->generate_admin_row_part_part1(array('part'=>'nonactive')).$this->generate_admin_row_part_part2(array('part'=>'nonactive'));
            $struct_item.=$this->generate_admin_row_part_part1(array('part'=>'nonactive')).$this->generate_admin_row_part_part2(array('part'=>'nonactive'));
            $struct_item.=$this->generate_admin_row_part_part1(array('part'=>'nonactive')).$this->generate_admin_row_part_part2(array('part'=>'nonactive'));
        }



        return $struct_item;

    }

    function generate_admin_row_part_part1($pargs = array()){

        $struct_item = '';


        $margs = array(
            'section_index' => '0',
            'container_index' => '0',
            'row_index' => '0',
            'row_part_index' => '0',
            'type' => 'row_part',
            'part' => '1.1',
            'type_pb' => "Full",
        );

        $margs = array_merge($margs, $pargs);


        $struct_item.='<div class="admin-dzspgb-row-part-con';




        if($margs['part']==='1.1'){
            $struct_item.=' dzspb_layb_one_full';
        }
        if($margs['part']==='1.2'){
            $struct_item.=' dzspb_layb_one_half';
        }
        if($margs['part']==='1.3'){
            $struct_item.=' dzspb_layb_one_third';
        }
        if($margs['part']==='1.4'){
            $struct_item.=' dzspb_layb_one_fourth';
        }
        if($margs['part']==='3.4'){
            $struct_item.=' dzspb_layb_three_fourth';
        }
        if($margs['part']==='nonactive'){
            $struct_item.=' nonactive';
        }
        $struct_item.='">';
        $struct_item .= '<div class="admin-dzspgb-row-part';


        $struct_item.='">
        <div class="admin-dzspgb-label-con"><span class="admin-dzspgb-label">'.$margs['part'].'</span><span class="mover-row-part-handler-con"><i class="fa fa-arrows-h"></i></span>
        </div>';


        $ind = '';

        if($margs['type_pb']==='Full'){
            if($margs['section_index']!==''){
                $ind.='['.$margs['section_index'].']';
            }
            if($margs['container_index']!==''){
                $ind.='['.$margs['container_index'].']';
            }
        }

        $ind.='['.$margs['row_index'].']['.$margs['row_part_index'].']';


        $struct_item.='<input type="hidden" name="dzspgb';
        $struct_item.=''.$ind.'[type]" value="'.$margs['type'].'"/>';
        $struct_item.='<input type="hidden" name="dzspgb';
        $struct_item.=''.$ind.'[part]" value="'.$margs['part'].'"/>';
        $struct_item.='<div class="elements-area">';

        return $struct_item;

        // -- 2 divs to close in part 2

    }




    function generate_admin_row_part_part2($pargs = array()){

        $struct_item = '';


        $margs = array(
            'container_index' => '0',
            'section_index' => '0',
            'type' => 'row_part',
            'part' => 'one_full',
        );

        $margs = array_merge($margs, $pargs);


        $struct_item .= '</div>
        <div class="dzspgb-button-con">
            <div class="dzspgb-button dzspgb-add-element">
                <span class="add-element-label"><i class="fa fa-plus-square"></i> <span>Add Element</span></span>
                <div class="element-type-selector-con">'.$this->generate_element_types().'</div>
            </div>
        </div><!-- END dzspgb-button-con -->';




        $struct_item.='</div>';
        $struct_item.='</div>';


        return $struct_item;

    }

    function generate_admin_row_part2($pargs = array()){

        $struct_item = '';


        $margs = array(
            'section_index' => '0',
            'container_index' => '0',
            'row_index' => '0',
            'type' => 'row',
            'empty' => true,
        );

        $margs = array_merge($margs, $pargs);


        $struct_item .= '</div>';


        $ind = '';

        if($margs['section_index']!==''){
            $ind.='['.$margs['section_index'].']';
        }
        if($margs['container_index']!==''){
            $ind.='['.$margs['container_index'].']';
        }
        $ind.='['.$margs['row_index'].']';


        $struct_item.='<input type="hidden" name="dzspgb';
        $struct_item.=''.$ind.'[type]" value="'.$margs['type'].'"/>';



        $struct_item .= '</div>';


        return $struct_item;

    }



    function generate_admin_container_part2($pargs = array()){

        $struct_item = '';


        $margs = array(
            'container_index' => '0',
            'section_index' => '0',
            'type' => 'container',
        );


        $margs['type'] = 'container'; // -- we'll force this as a container is always a container :)

        $margs = array_merge($margs, $pargs);


        $struct_item .= '</div><div class="dzspgb-button-con"><span class="dzspgb-button dzspgb-add-row"><i class="fa fa-plus-square"></i><span>Add Row</span></span></div>';




        $ind = '';

        if($margs['section_index']!==''){
            $ind.='['.$margs['section_index'].']';
        }
        if($margs['container_index']!==''){
            $ind.='['.$margs['container_index'].']';
        }


        $struct_item.='<input type="hidden" name="dzspgb';
        $struct_item.=''.$ind.'[type]" value="'.$margs['type'].'"/>';

        $struct_item.='</div>';

        return $struct_item;

    }




    function generate_admin_section_part2($pargs = array()){

        $struct_item = '';


        $margs = array(
            'section_index' => '0',
            'type' => 'section',
            'extra_classes' => '',
        );

        $margs = array_merge($margs, $pargs);

        $margs['type'] = 'section'; // -- we'll force this as a section is always a section :)

        $ind = '';
        if($margs['section_index']!==''){
            $ind.='['.$margs['section_index'].']';
        }

        $struct_item .= '<div class="area-containers"></div><div class="dzspgb-button-con"><span class="dzspgb-button dzspgb-add-container"><i class="fa fa-plus-square"></i><span>Add Container</span></span></div><div class="mover-handler-con"><i class="fa fa-arrows-v"></i></div><div class="settings-button-con"><i class="fa fa-gears"></i></div>';




        $struct_item.='<input type="hidden" name="dzspgb';
        $struct_item.='['.$margs['section_index'].'][type]" value="'.$margs['type'].'"/>';

        $struct_item.='</div>';


        return $struct_item;

    }


}





