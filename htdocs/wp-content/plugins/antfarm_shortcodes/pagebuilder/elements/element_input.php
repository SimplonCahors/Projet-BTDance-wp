<?php
$id = 'input';

global $dzspgb_templates;
$dzspgb_templates[$id] = array(
    'id' => $id,
    'admin_str_function' => 'admin_str_function_'.$id,
);


if(!function_exists('admin_str_function_'.$id)){
    function admin_str_function_input($pargs=array()){

        $id = 'input';


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
            'input_height' => "10",
            'item' => array(),
            'is_negative'=>'',
            'input_type'=>'input',
            'is_required'=>'',
            'input_label_name'=>'Placeholder...',
            'input_name'=>'name',
            'default_value'=>'',
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



        $lab = ''.$margs['type_elements'].$ind.'[input_height]';





        $arr_opts = array(
            array(
                'lab' => esc_html__('Text Input'),
                'val' => 'input',
            ),
            array(
                'lab' => esc_html__('Textarea'),
                'val' => 'textarea',
            ),
        );






        $lab = 'input_type';
        $nam = ''.$margs['type_elements'].$ind.'['.$lab.']';


        $element_edit_str.='<span class="setting">
        <span class="setting-label">'.esc_html__('Input Type').'</span>
'.DZSHelpers::generate_select($nam, array('class'=>'dzs-style-me skin-beige ','options'=>$arr_opts,'seekval'=>$arr_opts,)).'
<span class="sidenote">'.esc_html__("text input - single line").'</span></span>';













        $lab = 'input_label_name';
        $nam = ''.$margs['type_elements'].$ind.'['.$lab.']';


        $element_edit_str.='<span class="setting">
        <span class="setting-label">'.esc_html__('Label').'</span>
'.DZSHelpers::generate_input_text($nam, array('class'=>'simple-input-text ','seekval'=>$margs[$lab],)).'
<span class="sidenote">'.esc_html__("The field label as displayed in the front end.").'</span>
</span>';
        // -- use sanitize_title() for the html name









        $lab = 'input_name';
        $nam = ''.$margs['type_elements'].$ind.'['.$lab.']';


        $element_edit_str.='<span class="setting">
        <span class="setting-label">'.esc_html__('Name').'</span>
'.DZSHelpers::generate_input_text($nam, array('class'=>'simple-input-text ','seekval'=>$margs[$lab],)).'
<span class="sidenote">'.esc_html__("The name of the input field for identifying purposes. You can only use letters and dashes here.").'</span>
</span>';
        // -- use sanitize_title() for the html name





        $lab = 'default_value';
        $nam = ''.$margs['type_elements'].$ind.'['.$lab.']';


        $element_edit_str.='<span class="setting">
        <span class="setting-label">'.esc_html__('Default Value').'</span>
'.DZSHelpers::generate_input_text($nam, array('class'=>'simple-input-text ','seekval'=>$margs[$lab],)).'
<span class="sidenote">'.esc_html__("the default value").'</span>
</span>';
        // -- use sanitize_title() for the html name








        $lab = 'is_required';
        $nam = ''.$margs['type_elements'].$ind.'['.$lab.']';
        $element_edit_str.='<div class="setting " data-ceva="<div>alceva</div>">
        <span class="setting-label">'.esc_html__('Is Required').'</span>
    <div class="dzscheckbox skin-nova">
                        '.DZSHelpers::generate_input_checkbox($nam,array('id' => $lab, 'val' => 'on','seekval' => $margs[$lab])).'
                        <label for="'.$nam.'"></label>
    </div>

</div>';









        $element_edit_str.='<p class="buttons-con"><button class="button-primary btn-delete-itm btn-delete-element">'.esc_html__('Delete Element').'</button> <button class="button button--secondary btn-done-editing"><span class="button-label">'.esc_html__('Done Editing').'</span></button> </p>
        ';





        // -- screen in editor
        $fout.='<div class="dzspgb-element-con">
        <div class="hidden-content">'.$element_edit_str.'</div>
        <span class="dzspgb-element-type the-type-'.$id.'" data-type="'.$id.'">
            <span class="move-handler-for-elements"><i class="fa fa-hand-rock-o"></i></span>
            <span class="clone-handler-for-elements"><i class="fa fa-clone"></i></span>
            <span class="icon-con"><i class="fa fa-pencil"></i></span><h5>'.esc_html__('Field').'</h5><div class="the-excerpt-real">'.esc_html__("Input Name - ").'<strong>{{input_name}}</strong></div><p class="the-excerpt">'.esc_html__("Use this element for breaking out to a full width container.").'</p><span class="dzspgb-button dzspgb-button-choose">'.$margs['txt_choose'].'
            </span>
        </span>
        <input type="hidden" name="'.$margs['type_elements'].$ind.'[type_element]" value="'.$id.'"/>
        </div><!-- END dzspgb-element-con -->';


        return $fout;
    }
}




if(!function_exists('antfarm_shortcode_input')){
    function antfarm_shortcode_input($pargs=array(),$content=''){



        $fout = '';



        $margs = array(
            'input_height' => '10',
            'is_negative' => 'off',
            'is_required'=>'',
            'input_label_name'=>'',
            'input_type'=>'input',
            'input_name'=>'',
            'input-style'=>'input-style-sharp',
            'default_value'=>'',
        );


        if(is_array($pargs)){
            $margs = array_merge($margs,$pargs);
        }





            $fout.='<div class="shortcode-input" style="">';


        $extra_attr = '';

        if($margs['is_required']=='on'){
            $extra_attr.=' aria-required="true"';
        }


        if($margs['input_type']=='input'){


            $extra_attr.=' placeholder="'.$margs['input_label_name'].'"';

            $fout.=DZSHelpers::generate_input_text($margs['input_name'], array(

                'seekval'=>$margs['default_value'],
                'class'=>$margs['input-style'].'  font-group-5 ',
                'extraattr'=>$extra_attr,

            ));


        }

        if($margs['input_type']=='textarea'){


            $extra_attr .=' rows="10" placeholder="'.$margs['input_label_name'].'"';

            $fout.=DZSHelpers::generate_input_textarea($margs['input_name'], array(

                'seekval'=>$margs['default_value'],
                'class'=>$margs['input-style'].' font-group-5 ',
                'extraattr'=>$extra_attr,

            ));


        }




        $fout.='</div>';


            return $fout;
    }
}