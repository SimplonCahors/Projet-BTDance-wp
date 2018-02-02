<?php
$id = 'feedback_text';

global $dzspgb_templates;
$dzspgb_templates[$id] = array(
    'id' => $id,
    'admin_str_function' => 'admin_str_function_'.$id,
);


if(!function_exists('admin_str_function_'.$id)){
    function admin_str_function_feedback_text($pargs=array()){

        $id = 'feedback_text';


        $margs = array(
            'section_index' => '0',
            'container_index' => '0',
            'row_index' => '0',
            'row_part_index' => '0',
            'element_index' => '0',
            'type' => 'element',
            'type_element' => $id,
            'type_pb' => "Full",
            'txt_choose' => esc_html__("Choose"),
            'type_elements' => "newelement", // -- newelement (js) or dzspgb (php) ( legit )
            'feedback_text_content' => "",
            'feedback_text_height' => "10",
            'item' => array(),
            'success_text'=>esc_html__("Thank you for your feedback"),
            'error_text'=>'',
            'is_required'=>'',
        );


        if(is_array($pargs)){
            $margs = array_merge($margs,$pargs);
        }





        $fout = '';
        $ind='';
        $element_edit_str='';



        if($margs['type_pb']==='Full'){
            if($margs['section_index']!==''){
                $ind.='['.$margs['section_index'].']';
            }
            if($margs['container_index']!==''){
                $ind.='['.$margs['container_index'].']';
            }
        }

        $ind.='['.$margs['row_index'].']['.$margs['row_part_index'].']['.$margs['element_index'].']';










        $lab = 'success_text';
        $nam = ''.$margs['type_elements'].$ind.'['.$lab.']';


        $element_edit_str.='<span class="setting">
        <span class="setting-label">'.esc_html__('Success Text').'</span>
'.DZSHelpers::generate_input_text($nam, array('class'=>'',
                'seekval'=>addslashes($margs[$lab]),)).'
<span class="sidenote">'.esc_html__("Text to display in case of message success.").'</span>
</span>';


        $lab = 'error_text';
        $nam = ''.$margs['type_elements'].$ind.'['.$lab.']';


        $element_edit_str.='<span class="setting">
        <span class="setting-label">'.esc_html__('Error Text').'</span>
'.DZSHelpers::generate_input_text($nam, array('class'=>'','seekval'=>$margs[$lab],)).'
<span class="sidenote">'.esc_html__("Text to display in case of message success.").'</span>
</span>';










        $element_edit_str.='<p class="buttons-con"><button class="button-primary btn-delete-itm btn-delete-element">'.esc_html__('Delete Element').'</button> <button class="button button--secondary btn-done-editing"><span class="button-label">'.esc_html__('Done Editing').'</span></button> </p>
        ';








        // -- screen in editor
        $fout.='<div class="dzspgb-element-con">
        <div class="hidden-content"';




        $fout.='>'.$element_edit_str.'</div>
        <span class="dzspgb-element-type the-type-'.$id.'" data-type="'.$id.'">
            <span class="move-handler-for-elements"><i class="fa fa-hand-rock-o" aria-hidden="true"></i></span>
            <span class="clone-handler-for-elements"><i class="fa fa-clone" aria-hidden="hidden"></i></span>
            <span class="icon-con"><i class="fa fa-check-square" aria-hidden="hidden"></i></span><h5>'.esc_html__('Feedback Text').'</h5><p class="the-excerpt">'.esc_html__("This is some text you can have to let your users now if the form has been succesfully sent.").'</p><span class="dzspgb-button dzspgb-button-choose">'.$margs['txt_choose'].'
            </span>
        </span>
        <input type="hidden" name="'.$margs['type_elements'].$ind.'[type_element]" value="'.$id.'"/>
        </div><!-- END dzspgb-element-con -->';



        return $fout;
    }
}




if(!function_exists('antfarm_sanitize_text')){

    function antfarm_sanitize_text($content=''){


        $content = str_replace('{replacequotquot}','"',$content);
        return $content;
    }
}

if(!function_exists('antfarm_shortcode_feedback_text')){
    function antfarm_shortcode_feedback_text($pargs=array(),$content=''){



        $fout = '';



        $margs = array(
            'input_height' => '10',
            'is_negative' => 'off',
            'is_required'=>'',
            'input_label_name'=>'',
            'input_type'=>'input',
            'input_name'=>'',
            'success_text'=>esc_html__("Thank you for your feedback"),
            'error_text'=>'',
            'feedback_text_content'=>esc_html__("Submit"),
        );


        if(is_array($pargs)){
            $margs = array_merge($margs,$pargs);
        }



        $margs['success_text'] = antfarm_sanitize_text($margs['success_text']);
        $margs['error_text'] = antfarm_sanitize_text($margs['error_text']);


        $fout.='<div class="shortcode-feedback-text form-feedback" style="">';


        $fout.='<div class="success-text">'.($margs['success_text']).'</div>';
        $fout.='<div class="error-text">'.$margs['error_text'].'</div>';




        $fout.='</div>';


        return $fout;
    }
}