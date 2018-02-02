<?php
$id = 'divider';

global $dzspgb_templates;
$dzspgb_templates[$id] = array(
    'id' => $id,
    'admin_str_function' => 'admin_str_function_divider',
);


if(!function_exists('admin_str_function_divider')){
    function admin_str_function_divider($pargs=array()){

        $id = 'divider';


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
            'text' => "",
            'divider_height' => "10",
            'item' => array(),
            'is_negative'=>'',
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


        $lab = ''.$margs['type_elements'].$ind.'[divider_height]';

        $element_edit_str.='<div class="center-it">';


        $element_edit_str.='<div class="setting ">
        <span class="setting-label">'.esc_html__('Height').'</span>
        <div class="func-slider-con"> <!-- here should be only one input, the input first is the slider value -->
        <input type="text" class="func-slider-val" name="'.$lab.'" value="'.$margs['divider_height'].'"/>
<div class="func-slider"></div>
</div>
</div>';

        $lab = 'is_negative';
        $nam = ''.$margs['type_elements'].$ind.'['.$lab.']';
        $element_edit_str.='<div class="setting ">
        <span class="setting-label">'.esc_html__('Is Negative').'</span>
        <div class="dzscheckbox skin-nova">
                            '.DZSHelpers::generate_input_checkbox($nam,array('id' => $lab, 'val' => 'on','seekval' => $margs[$lab])).'
                            <label for="'.$nam.'"></label>
        </div>

</div>';



        $element_edit_str.='<p class="buttons-con"><button class="button-primary btn-delete-itm btn-delete-element">'.esc_html__('Delete Element').'</button> <button class="button button--secondary btn-done-editing"><span class="button-label">'.esc_html__('Done Editing').'</span></button> </p>
        ';

        $element_edit_str.='</div>';






        // -- screen in editor
        $fout.='<div class="dzspgb-element-con">
        <div class="hidden-content">'.$element_edit_str.'</div>
        <span class="dzspgb-element-type the-type-'.$id.'" data-type="'.$id.'">
            <span class="move-handler-for-elements"><i class="fa fa-hand-rock-o"  aria-hidden="true"></i></span>
            <span class="clone-handler-for-elements"><i class="fa fa-clone"  aria-hidden="true"></i></span>
            <span class="icon-con"><i class="fa fa-minus" aria-hidden="true"></i></span><h5>'.esc_html__('Divider').'</h5><p class="the-excerpt">'.esc_html__("Use this element for breaking out to a full width container.").'</p><span class="dzspgb-button dzspgb-button-choose">'.$margs['txt_choose'].'
            </span>
        </span>
        <input type="hidden" name="'.$margs['type_elements'].$ind.'[type_element]" value="'.$id.'"/>
        </div><!-- END dzspgb-element-con -->';


        return $fout;
    }
}




if(!function_exists('antfarm_shortcode_divider')){
    function antfarm_shortcode_divider($pargs=array(),$content=''){



        $fout = '';

        $margs = array(
            'divider_height' => '10',
            'is_negative' => 'off',
        );


        if(is_array($pargs)){
            $margs = array_merge($margs,$pargs);
        }


        $str_css = 'height:'.$margs['divider_height'].'px;';


        if($margs['is_negative']=='on'){

            $str_css = 'margin-top:-'.$margs['divider_height'].'px;';
        }



$fout.='<div class="shortcode-divider" style="'.$str_css.'">';
        $fout.='<div class="clear"></div>
</div>';



            return $fout;
    }
}