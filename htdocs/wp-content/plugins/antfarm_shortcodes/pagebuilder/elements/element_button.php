<?php
$id = 'button';

global $dzspgb_templates;
$dzspgb_templates[$id] = array(
    'id' => $id,
    'admin_str_function' => 'admin_str_function_'.$id,
);


if(!function_exists('admin_str_function_'.$id)){
    function admin_str_function_button($pargs=array()){

        $id = 'button';


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

            'button_height' => "10",
            'item' => array(),
            'is_negative'=>'',
            'is_required'=>'',
            'button_content'=>esc_html__("Submit"),
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








        $lab = 'button_content';
        $nam = ''.$margs['type_elements'].$ind.'['.$lab.']';


        $element_edit_str.='<span class="setting">
        <span class="setting-label">'.esc_html__('Text').'</span>
'.DZSHelpers::generate_input_text($nam, array('class'=>'','seekval'=>$margs[$lab],)).'
<span class="sidenote">'.esc_html__("Set the button text").'</span>
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
            <span class="icon-con"><i class="fa fa-hand-o-up" aria-hidden="hidden"></i></span><h5>'.esc_html__('button').'</h5><div class="the-excerpt-real">'.''.'<strong>{{button_content}}</strong></div><p class="the-excerpt">'.esc_html__("Use this element for breaking out to a full width container.").'</p><span class="dzspgb-button dzspgb-button-choose">'.$margs['txt_choose'].'
            </span>
        </span>
        <input type="hidden" name="'.$margs['type_elements'].$ind.'[type_element]" value="'.$id.'"/>
        </div><!-- END dzspgb-element-con -->';



        return $fout;
    }
}




if(!function_exists('antfarm_shortcode_button')){
    function antfarm_shortcode_button($pargs=array(),$content=''){



        $fout = '';



        $margs = array(
            'input_height' => '10',
            'is_negative' => 'off',
            'is_required'=>'',
            'input_label_name'=>'',
            'input_type'=>'input',
            'input_name'=>'',
            'button_content'=>esc_html__("Submit"),
        );


        if(is_array($pargs)){
            $margs = array_merge($margs,$pargs);
        }




        $fout.='<div class="shortcode-button" style="">';




        $fout.='<button name="action_submit_contact" class="btn-read-more btn-full-red contact-form-button h6 custom-color  ">'.$margs['button_content'].'</button>';




        $fout.='</div>';


        return $fout;
    }
}