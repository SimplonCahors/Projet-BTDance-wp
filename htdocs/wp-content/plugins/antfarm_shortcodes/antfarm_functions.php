<?php

if (!function_exists('dzs_savemeta')) {

    function dzs_savemeta($id, $arg2, $arg3 = '') {

        if ($arg3 == 'html') {
            update_post_meta($id, $arg2, htmlentities($_POST[$arg2]));
            return;
        }


        if (isset($_POST[$arg2]))
            update_post_meta($id, $arg2, esc_attr(strip_tags($_POST[$arg2])));
        else
        if ($arg3 == 'checkbox')
            update_post_meta($id, $arg2, "off");
    }

}



if (!function_exists('antfarm_sanitize_id_to_src')) {


	function antfarm_sanitize_id_to_src($arg){


		if(is_numeric($arg)){

			$imgsrc = wp_get_attachment_image_src($arg, 'full');


			return $imgsrc[0];
		}else{
			return $arg;
		}


	}
}
if (!function_exists('dzs_checked')) {

    function dzs_checked($arg1, $arg2, $arg3 = 'checked', $echo = true) {
        $func_output = '';
        if (isset($arg1) && $arg1 == $arg2) {
            $func_output = $arg3;
        }
        if ($echo == true)
            echo $func_output;
        else
            return $func_output;
    }

}


if (!function_exists('dzs_sanitize_attr')) {
    function dzs_sanitize_attr($arg){
        $fout = $arg;

        $fout = str_replace('"','',$fout);

        return $fout;
    }
}
if (!function_exists('dzs_find_string')) {

    function dzs_find_string($arg, $arg2) {
        $pos = strpos($arg, $arg2);

        if ($pos === false)
            return false;

        return true;
    }

}

if (!function_exists('print_rr')) {


    function print_rr($arg, $pargs=array()){
        $margs = array(
            'echo'=>true,
        );

        if($pargs){
            $margs = array_merge($margs,$pargs);
        }


        $fout = '';
        if($margs['echo']==false){
            ob_start();
        }

        echo '<pre>';
        print_r($arg);
        echo '</pre>';


        if($margs['echo']==false){
            $fout = ob_get_clean();

            return $fout;
        }


    }


}

if (!function_exists('dzs_find_string')) {

    function dzs_find_string($arg, $arg2) {
        $pos = strpos($arg, $arg2);

        if ($pos === false)
            return false;

        return true;
    }

}


if (!function_exists('dzs_get_excerpt')) {



    function dzs_get_excerpt($pid = 0, $pargs = array()) {

        global $post;
        $fout = '';
        $excerpt = '';
        if ($pid == 0 && isset($post->ID)) {
            $pid = $post->ID;
        }

        if(function_exists('get_post')){
            $po = (get_post($pid));
        }
        

        $margs = array(
            'maxlen' => 400
            , 'striptags' => false
            , 'stripshortcodes' => false
            , 'forceexcerpt' => false //if set to true will ignore the manual post excerpt
            , 'try_to_close_unclosed_tags' => false // -- this will try to close unclosed tags
            , 'readmore' => 'auto'
            , 'readmore_markup' => ''
            , 'content' => ''
        );
        $margs = array_merge($margs, $pargs);



        if ($margs['content'] != '') {
            $margs['readmore'] = 'off';
            $margs['forceexcerpt'] = true;
        }


        if (isset($po->post_excerpt) && $po->post_excerpt != '' && $margs['forceexcerpt'] == false) {
            $fout = $po->post_excerpt;


            // -- = replace the read more with given markup or theme function or default
            if ($margs['readmore_markup'] != '') {
                $fout = str_replace('{readmore}', $margs['readmore_markup'], $fout);
            } else {
                if (function_exists('continue_reading_link')) {
                    $fout = str_replace('{readmore}', continue_reading_link($pid), $fout);
                } else {
                    $fout = str_replace('{readmore}', '<div class="readmore-con"><a href="' . get_permalink($pid) . '">' . esc_html__('Read More') . '</a></div>', $fout);
                }
            }
            // -- = replace the read more with given markup or theme function or default END
            return $fout;
        }

        $content = '';
        if ($margs['content'] != '') {
            $content = $margs['content'];
        } else {
            if ($margs['striptags'] != true) {
                $content = $po->post_content;
            } else {
                $content = strip_tags($po->post_content);
                ;
            }
        }


        $maxlen = intval($margs['maxlen']);
        if ($margs['stripshortcodes'] === true) {
            if(function_exists('strip_shortcodes')){

                $excerpt = strip_shortcodes(stripslashes($excerpt));
            }
        }

        if (strlen($content) > $maxlen) {
            // -- if the content is longer then the max limit
            $excerpt.=substr($content, 0, $maxlen);




            if ($margs['striptags'] != true && $margs['try_to_close_unclosed_tags']) {



                if(strpos($excerpt, '<')===strlen($excerpt)-1){

                    $excerpt = substr($excerpt,0,strlen($excerpt)-1);
                }
                if(strpos($excerpt, '</')===strlen($excerpt)-2){

                    $excerpt = substr($excerpt,0,strlen($excerpt)-2);
                }
                if(strpos($excerpt, '</p')===strlen($excerpt)-3){

                    $excerpt = substr($excerpt,0,strlen($excerpt)-3);
                }

                if(class_exists('DOMDocument')){
                    $doc = new DOMDocument();
                    @$doc->loadHTML($excerpt);

                    $aux_body_html = '';


                    $children = $doc->childNodes;
                    $scriptTags = $doc->getElementsByTagName('script');


                    foreach ($scriptTags as $script) {
                        if ($script->childNodes->length && $script->firstChild->nodeType == 4) {
                            $cdata = $script->removeChild($script->firstChild);
                            $text = $doc->createTextNode($cdata->nodeValue);
                            $script->appendChild($text);
                        }
                    }

                    foreach ($children as $child) {


                        $aux_body_html .= $child->ownerDocument->saveXML($child);
                    }


                    $aux_body_html = str_replace('<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd"><html><body>','',$aux_body_html);
                    $aux_body_html = str_replace('</body></html>','',$aux_body_html);

                    $aux_body_html = str_replace(array('<![CDATA['),'',$aux_body_html);
                    $aux_body_html = str_replace(array('&#13;'),'',$aux_body_html);

                }
            }



            if ($margs['striptags'] == true) {
                $excerpt = strip_tags($excerpt);
            }

            if ($margs['stripshortcodes'] == false && function_exists('do_shortcode')) {
                $excerpt = do_shortcode(stripslashes($excerpt));
            }

            $fout.=$excerpt;
            if ($margs['readmore'] == 'auto') {
                $fout .= '{readmore}';
            }
        } else {
            // -- if the content is not longer then the max limit just add the content
            $fout.=$content;
            if ($margs['readmore'] == 'on') {
                $fout .= '{readmore}';
            }
        }

        // -- = replace the read more with given markup or theme function or default
        if ($margs['readmore_markup'] != '') {
            $fout = str_replace('{readmore}', $margs['readmore_markup'], $fout);
        } else {
            if (function_exists('continue_reading_link')) {
                $fout = str_replace('{readmore}', continue_reading_link($pid), $fout);
            } else {
                if(function_exists('get_permalink')){
                    $fout = str_replace('{readmore}', '<div class="readmore-con"><a href="' . get_permalink($pid) . '">' . esc_html__('read more') . ' &raquo;</a></div>', $fout);
                }
                
            }
        }
        // -- = replace the read more with given markup or theme function or default END
        return $fout;
    }

}


if (!function_exists('dzs_print_menu')) {

    function dzs_print_menu() {
        $args = array('menu' => 'mainnav', 'menu_class' => 'menu sf-menu', 'container' => false, 'theme_location' => 'primary', 'echo' => '0');
        $aux = wp_nav_menu($args);
        $aux = preg_replace('/<ul>/', '<ul class="sf-menu">', $aux, 1);
        if (preg_match('/<div class="sf-menu">/', $aux)) {
            $aux = preg_replace('/<div class="sf-menu">/', '', $aux, 1);
            $aux = $rest = substr($aux, 0, -7);
        }


        print_r($aux);
    }

}
if (!function_exists('dzs_post_date')) {

    function dzs_post_date($pid) {
        $po = get_post($pid);

        if ($po) {
            echo mysql2date('l M jS, Y', $po->post_date);
        }
    }

}


if (!function_exists('dzs_pagination')) {

    function dzs_pagination($pages = '', $range = 2, $pargs = array()) {
        global $paged;



        $margs = array(

            'container_class'=>'dzs-pagination  qucreative-pagination',
            'include_raquo'=>true,
            'style'=>'div',
            'paged'=>'',
            'a_class'=>'pagination-link',
            'wrap_before_text'=>'',
            'wrap_after_text'=>'',
        );


        if($pargs){
            $margs = array_merge($margs,$pargs);
        }



        $fout = '';
        $showitems = ($range * 2) + 1;

        if (empty($paged))
            $paged = 1;





        if ($margs['paged']) {
            $paged = $margs['paged'];
        }




        if ($pages == '') {
            global $wp_query;
            $pages = $wp_query->max_num_pages;
            if (!$pages) {
                $pages = 1;
            }
        }

        if (1 != $pages) {

            if($margs['style']=='div'){

                $fout.= "<div class='".$margs['container_class']."'>";
            }
            if($margs['style']=='ul'){

                $fout.= "<ul class='".$margs['container_class']."'>";
            }

            if($margs['include_raquo']){

                if ($paged > 2 && $paged > $range + 1 && $showitems < $pages)
                    $fout.= "<a href='" . get_pagenum_link(1) . "'>&laquo;</a>";
                if ($paged > 1 && $showitems < $pages)
                    $fout.= "<a href='" . get_pagenum_link($paged - 1) . "'>&lsaquo;</a>";
            }

            for ($i = 1; $i <= $pages; $i++) {
                if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems )) {



                    $link = get_pagenum_link($i);


                    $li_class = '';

                    if($paged==$i) {

                        $link = '#';


                        if($margs['style']=='div') {
                            $li_class.=' current';
                        }
                        if($margs['style']=='ul') {
                            $li_class.=' active';
                        }
                    }


                    if($margs['style']=='div') {
                        $fout.="<a href='".$link."' class='" . $margs['a_class'] . "".$li_class." inactive' >";
                    }


                    if($margs['style']=='ul') {

                        $fout.='<li class="'.$li_class.'"><a class="'.$margs['a_class'].'" href="'. $link .'">';
                    }


                    $fout.=$margs['wrap_before_text'];

                    $fout.=$i;
                    $fout.=$margs['wrap_after_text'];



                    if($margs['style']=='div') {
                        $fout.="</a>";
                    }


                    if($margs['style']=='ul') {

                        $fout.='</a></li>';
                    }


                }
            }

            if($margs['include_raquo']) {
                if ($paged < $pages && $showitems < $pages) $fout .= "<a class='raquo-left' href='" . get_pagenum_link($paged + 1) . "'>&rsaquo;</a>";
                if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages) $fout .= "<a href='" . get_pagenum_link($pages) . "' class='raquo-right'>&raquo;</a>";
            }



            if($margs['style']=='div') {
                $fout .= '<div class="clearfix"></div>';
                $fout .= "</div>";
            }
            if($margs['style']=='ul') {
                $fout .= '</ul>';
            }
        }
        return $fout;
    }

}




if (!function_exists('dzs_curr_url')) {

    function dzs_curr_url($pargs=array()) {

        $margs = array(

            'get_page_url_too'=>true,
            'get_script_name'=>false,
        );


        if($pargs){
            $margs = array_merge($margs,$pargs);
        }



        $page_url = '';
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
            $page_url .= "https://";
        } else {
            $page_url = 'http://';
        }


        $request_uri = $_SERVER["REQUEST_URI"];

        if($margs['get_script_name']){

            if($_SERVER['SCRIPT_NAME']){
                $request_uri = $_SERVER['SCRIPT_NAME'];
            }
        }

        if ($_SERVER["SERVER_PORT"] != "80") {
            $page_url .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $request_uri;
        } else {
            $page_url .= $_SERVER["SERVER_NAME"] . $request_uri;
        }

        if($margs['get_page_url_too']===false){
            $aux_arr = explode('/',$page_url);



            $page_url = '';
            for($i=0;$i<count($aux_arr)-1;$i++){
                $page_url.=$aux_arr[$i].'/';
            }
        }




        return $page_url;
    }

}





if (!function_exists('dzs_addAttr')) {

    function dzs_addAttr($arg1, $arg2) {
        $fout = '';

        if (isset($arg2) && $arg2 != "undefined" && $arg2 != '')
            $fout.= ' ' . $arg1 . "='" . $arg2 . "' ";
        return $fout;
    }

}


if(!function_exists('dzs_addSwfAttr')){
    function dzs_addSwfAttr($arg1, $arg2, $first=false) {
        $fout='';



        $lb   = array('"' ,"\r\n", "\n", "\r", "&", "`", '???', "'");
        $arg2 = str_replace(' ', '%20', $arg2);

        $arg2 = str_replace($lb, '', $arg2);

        if (isset ($arg2)  && $arg2 != "undefined" && $arg2 != ''){
            if($first==false){
                $fout.='&amp;';
            }
            $fout.= $arg1 . "=" . $arg2 . "";
        }
        return $fout;
    }
}


if (!function_exists('dzs_clean')) {

    function dzs_clean($var) {
        if (!function_exists('sanitize_text_field')) {
            return $var;
        } else {
            return sanitize_text_field($var);
        }
    }

}

if (!class_exists('DZSHelpers')) {

    class DZSHelpers {

        static function get_contents($url, $pargs = array()) {
            $margs = array(
                'force_file_get_contents' => 'off',
            );
            $margs = array_merge($margs, $pargs);
            if (function_exists('curl_init') && $margs['force_file_get_contents'] == 'off') { // if cURL is available, use it...
                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_setopt($ch, CURLOPT_TIMEOUT, 10);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $cache = curl_exec($ch);
                curl_close($ch);
            } else {

                $ctx = stream_context_create(array(
                    'http'=>array(
                        'timeout' => 15,
                    )
                ));

                echo file_get_contents($url, false, $ctx);
            }
            return $cache;
        }

        function get_post_meta_all($post_id){
            global $wpdb;
            $data   =   array();
            $wpdb->query("
SELECT `meta_key`, `meta_value`
FROM $wpdb->postmeta
WHERE `post_id` = $post_id
");
            foreach($wpdb->last_result as $k => $v){
                $data[$v->meta_key] =   $v->meta_value;
            };
            return $data;
        }

        static function replace_in_matrix($arg1, $arg2, &$argarray) {
            foreach ($argarray as &$newi) {

                if (is_array($newi)) {
                    foreach ($newi as &$newj) {
                        if (is_array($newj)) {
                            foreach ($newj as &$newk) {
                                if (!is_array($newk)) {
                                    $newk = str_replace($arg1, $arg2, $newk);
                                }
                            }
                        } else {
                            $newj = str_replace($arg1, $arg2, $newj);
                        }
                    }
                } else {
                    $newi = str_replace($arg1, $arg2, $newi);
                }
            }
        }

        static function remove_wpautop( $content, $autop = false ) {

            if ($autop && function_exists('wpautop')){
                $content = wpautop( preg_replace( '/<\/?p\>/', "\n", $content ) . "\n" );
            }
            if(function_exists('shortcode_unautop')){
                return do_shortcode( shortcode_unautop( $content) );
            }else{
                return $content;
            }
            
        }

        static function wp_savemeta($id, $arg2, $arg3 = '') {

            if ($arg3 == 'html') {
                update_post_meta($id, $arg2, htmlentities($_POST[$arg2]));
                return;
            }


            if (isset($_POST[$arg2]))
                update_post_meta($id, $arg2, esc_attr(strip_tags($_POST[$arg2])));
            else
            if ($arg3 == 'checkbox')
                update_post_meta($id, $arg2, "off");
        }

        static function wp_get_excerpt($pid = 0, $pargs = array()) {

            global $post;
            $fout = '';
            $excerpt = '';
            if ($pid == 0) {
                $pid = $post->ID;
            } else {
                $pid = $pid;
            }


            $po = (get_post($pid));

            $margs = array(
                'maxlen' => 400
                , 'striptags' => false
                , 'stripshortcodes' => false
                , 'forceexcerpt' => false //if set to true will ignore the manual post excerpt
                , 'aftercutcontent_html' => '' // you can put here something like [..]
                , 'readmore' => 'auto'
                , 'readmore_markup' => ''
                , 'content' => '' // forced content
            );
            $margs = array_merge($margs, $pargs);

            if ($margs['content'] != '') {
                $margs['readmore'] = 'off';
                $margs['forceexcerpt'] = true;
            }


            $margs['readmore_markup'] = str_replace("{{theid}}", $pid, $margs['readmore_markup']);
            $margs['readmore_markup'] = str_replace("{{thepostpermalink}}", get_the_permalink($pid), $margs['readmore_markup']);







            if ($po->post_excerpt != '' && $margs['forceexcerpt'] == false) {
                $fout = do_shortcode($po->post_excerpt);

                if ($margs['readmore'] == 'on') {
                    $fout .= '{readmore}';
                }

                // -- = replace the read more with given markup or theme function or default
                if ($margs['readmore_markup'] != '') {
                    $fout = str_replace('{readmore}', $margs['readmore_markup'], $fout);
                } else {
                    if (function_exists('continue_reading_link')) {
                        $fout = str_replace('{readmore}', continue_reading_link($pid), $fout);
                    } else {
                        if (function_exists('dzs_excerpt_read_more')) {
                            $fout = str_replace('{readmore}', dzs_excerpt_read_more($pid), $fout);
                        } else {
                            // -- maybe in the original function you can parse readmore

                        }
                    }
                }
                // -- = replace the read more with given markup or theme function or default END
                return $fout;
            }
            
            

            $content = '';
            if ($margs['content'] != '') {
                $content = $margs['content'];
            } else {
                if ($margs['striptags'] == false) {
                    if ($margs['stripshortcodes'] == false) {
                        $content = do_shortcode($po->post_content);
                    }else{
                        $content = $po->post_content;
                    }
                    
                } else {

                    $content = strip_tags($po->post_content);

                }
            }



            $maxlen = intval($margs['maxlen']);
            


            if (strlen($content) > $maxlen) {

                $excerpt.=substr($content, 0, $maxlen);

                if ($margs['striptags'] == true) {
                    $excerpt = strip_tags($excerpt);

                }
                if ($margs['stripshortcodes'] == false) {
                    $excerpt = do_shortcode(stripslashes($excerpt));
                } else {
                    $excerpt = strip_shortcodes(stripslashes($excerpt));
                    $excerpt = str_replace('[/one_half]', '', $excerpt);
                    $excerpt = str_replace("\n", " ", $excerpt);
                    $excerpt = str_replace("\r", " ", $excerpt);
                    $excerpt = str_replace("\t", " ", $excerpt);
                }

                $fout.=$excerpt.$margs['aftercutcontent_html'];
                if ($margs['readmore'] == 'auto') {
                    $fout .= '{readmore}';
                }
            } else {
                // -- if the content is not longer then the max limit just add the content
                $fout.=$content;
                if ($margs['readmore'] == 'on') {
                    $fout .= '{readmore}';
                }
            }

            // -- = replace the read more with given markup or theme function or default
            if ($margs['readmore_markup'] != '') {
                $fout = str_replace('{readmore}', $margs['readmore_markup'], $fout);
            } else {
                if (function_exists('continue_reading_link')) {
                    $fout = str_replace('{readmore}', continue_reading_link($pid), $fout);
                } else {
                    if (function_exists('dzs_excerpt_read_more')) {
                        $fout = str_replace('{readmore}', dzs_excerpt_read_more($pid), $fout);
                    } else {
                        // -- maybe in the original function you can parse readmore

                    }
                }
            }

            // -- = replace the read more with given markup or theme function or default END
            return $fout;
        }

        static function generate_input_text($argname, $otherargs = array()) {
            $fout = '';

            $margs = array(
                'class' => '',
                'val' => '', // --  default value
                'seekval' => '', // -- the value to be seeked
                'type' => '',
                'extraattr'=>'',
                'input_type'=>'text',
            );
            $margs = array_merge($margs, $otherargs);

            $fout.='<input type="'.$margs['input_type'].'"';
            $fout.=' name="' . $argname . '"';


            if ($margs['type'] == 'colorpicker') {
                $margs['class'].=' with_colorpicker';
            }



            if ($margs['class'] != '') {
                $fout.=' class="' . $margs['class'] . '"';
            }
            if (isset($margs['seekval']) && $margs['seekval'] != '') {

                $fout.=' value="' . $margs['seekval'] . '"';
            } else {
                $fout.=' value="' . $margs['val'] . '"';
            }
            
            
            if ($margs['extraattr'] != '') {
                $fout.='' . $margs['extraattr'] . '';
            }
            
            $fout.='/>';




            if ($margs['type'] == 'slider') {
                $fout.='<div id="' . $argname . '_slider" style="width:200px;"></div>';
                $fout.='<script>
jQuery(document).ready(function($){
$( "#' . $argname . '_slider" ).slider({
range: "max",
min: 8,
max: 72,
value: 15,
stop: function( event, ui ) {

$( "*[name=' . $argname . ']" ).val( ui.value );
$( "*[name=' . $argname . ']" ).trigger( "change" );
}
});
});</script>';
            }
            if ($margs['type'] == 'colorpicker') {
                $fout.='<div class="picker-con"><div class="the-icon"><svg
   xmlns:dc="http://purl.org/dc/elements/1.1/"
   xmlns:cc="http://web.resource.org/cc/"
   xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
   xmlns:svg="http://www.w3.org/2000/svg"
   xmlns="http://www.w3.org/2000/svg"
   xmlns:sodipodi="http://inkscape.sourceforge.net/DTD/sodipodi-0.dtd"
   xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
   sodipodi:docname="Colorwheel.svg"
   inkscape:version="0.41"
   sodipodi:version="0.32"
   viewBox="0 0 540 540"
   height="20"
   width="20">
  <defs />
  <metadata>
    <rdf:RDF>
      <cc:Work>
        <dc:format>image/svg+xml</dc:format>
        <dc:type rdf:resource="http://purl.org/dc/dcmitype/StillImage" />
        <dc:creator>
          <cc:Agent>
            <dc:title>MarianSigler, mariansigler@gmail.com</dc:title>
          </cc:Agent>
        </dc:creator>
        <cc:license rdf:resource="http://web.resource.org/cc/PublicDomain" />
        <dc:title></dc:title>
      </cc:Work>
      <cc:License rdf:about="http://web.resource.org/cc/PublicDomain">
        <cc:permits rdf:resource="http://web.resource.org/cc/Reproduction" />
        <cc:permits rdf:resource="http://web.resource.org/cc/Distribution" />
        <cc:permits rdf:resource="http://web.resource.org/cc/DerivativeWorks" />
        <cc:requires rdf:resource="http://web.resource.org/cc/ShareAlike" />
      </cc:License>
    </rdf:RDF>
  </metadata>
  <path style="fill:#0247fe; fill-opacity:1; fill-rule:evenodd; stroke:none"
        d="M 205.29524,511.48146 C 160.86265,499.57578 125.75022,479.30361 93.223305,446.77670 L 270.00000,270.00000 L 205.29524,511.48146 z " />
  <path style="fill:#0391CE; fill-opacity:1; fill-rule:evenodd; stroke:none"
        d="M 334.70476,511.48146 C 290.27217,523.38713 249.72783,523.38713 205.29524,511.48146 L 270.00000,270.00000 L 334.70476,511.48146 z " />
  <path style="fill:#66B032; fill-opacity:1; fill-rule:evenodd; stroke:none"
        d="M 446.77670,446.77670 C 414.24978,479.30361 379.13735,499.57578 334.70476,511.48146 L 270.00000,270.00000 L 446.77670,446.77670 z " />
  <path style="fill:#D0EA2B; fill-opacity:1; fill-rule:evenodd; stroke:none"
        d="M 511.48146,334.70476 C 499.57578,379.13735 479.30361,414.24978 446.77670,446.77670 L 270.00000,270.00000 L 511.48146,334.70476 z " />
  <path style="fill:#FEFE33; fill-opacity:1; fill-rule:evenodd; stroke:none"
        d="M 511.48146,205.29524 C 523.38713,249.72783 523.38713,290.27217 511.48146,334.70476 L 270.00000,270.00000 L 511.48146,205.29524 z " />
  <path style="fill:#FABC02; fill-opacity:1; fill-rule:evenodd; stroke:none"
        d="M 446.77669,93.223304 C 479.30361,125.75022 499.57578,160.86265 511.48146,205.29524 L 270.00000,270.00000 L 446.77669,93.223304 z " />
  <path style="fill:#FB9902; fill-opacity:1; fill-rule:evenodd; stroke:none"
        d="M 334.70476,28.518543 C 379.13735,40.424219 414.24978,60.696393 446.77669,93.223304 L 270.00000,270.00000 L 334.70476,28.518543 z " />
  <path style="fill:#FD5308; fill-opacity:1; fill-rule:evenodd; stroke:none"
        d="M 205.29524,28.518543 C 249.72783,16.612867 290.27217,16.612867 334.70476,28.518543 L 270.00000,270.00000 L 205.29524,28.518543 z " />
  <path style="fill:#3d01A4; fill-opacity:1; fill-rule:evenodd; stroke:none"
        d="M 93.223305,446.77670 C 60.696393,414.24978 40.424220,379.13735 28.518543,334.70476 L 270.00000,270.00000 L 93.223305,446.77670 z " />
  <path style="fill:#8601AF; fill-opacity:1; fill-rule:evenodd; stroke:none"
        d="M 28.518543,334.70476 C 16.612867,290.27217 16.612867,249.72783 28.518543,205.29524 L 270.00000,270.00000 L 28.518543,334.70476 z " />
  <path style="fill:#FE2712; fill-opacity:1; fill-rule:evenodd; stroke:none"
        d="M 93.223305,93.223305 C 125.75022,60.696393 160.86265,40.424220 205.29524,28.518543 L 270.00000,270.00000 L 93.223305,93.223305 z " />
  <path style="fill:#A7194B; fill-opacity:1; fill-rule:evenodd; stroke:none"
        d="M 28.518543,205.29524 C 40.424219,160.86265 60.696393,125.75022 93.223305,93.223305 L 270.00000,270.00000 L 28.518543,205.29524 z " />
  <path style="fill:#FFFFFF; fill-opacity:1; fill-rule:evenodd; stroke:none"
        d="M 423.79581,270.00000 C 423.79581,354.89529 354.89529,423.79581 270.00000,423.79581 C 185.10471,423.79581 116.20419,354.89529 116.20419,270.00000 C 116.20419,185.10471 185.10471,116.20419 270.00000,116.20419 C 354.89529,116.20419 423.79581,185.10471 423.79581,270.00000 z " />
</svg></div><div class="picker"></div></div>';
                $fout.='<script>
jQuery(document).ready(function($){
jQuery(".with_colorpicker").each(function(){
        var _t = $(this);
        if(_t.hasClass("treated")){
            return;
        }
        if(jQuery.fn.farbtastic){
        
        _t.next().find(".picker").farbtastic(function(arg){
        _t.val(arg);
        
        _t.trigger("change");
        });
            
        }else{ if(window.console){ console.info("declare farbtastic..."); } };
        _t.addClass("treated");

        _t.bind("change", function(){
            
            jQuery("#customstyle_body").html("body{ background-color:" + $("input[name=color_bg]").val() + "} .dzsportfolio, .dzsportfolio a{ color:" + $("input[name=color_main]").val() + "} .dzsportfolio .portitem:hover .the-title, .dzsportfolio .selector-con .categories .a-category.active { color:" + $("input[name=color_high]").val() + " }");
        });
        _t.trigger("change");
        _t.bind("click", function(){
            if(_t.next().hasClass("picker-con")){
                _t.next().find(".the-icon").eq(0).trigger("click");
            }
        })
    });
});</script>';
            }

            return $fout;
        }

        static function generate_input_checkbox($argname, $argopts) {
            $fout = '';
            $auxtype = 'checkbox';

            if (isset($argopts['type'])) {
                if ($argopts['type'] == 'radio') {
                    $auxtype = 'radio';
                }
            }
            $fout.='<input type="' . $auxtype . '"';
            $fout.=' name="' . $argname . '"';
            if (isset($argopts['class'])) {
                $fout.=' class="' . $argopts['class'] . '"';
            }

            if (isset($argopts['id'])) {
                $fout.=' id="' . $argopts['id'] . '"';
            }
            $theval = 'on';
            if (isset($argopts['val'])) {
                $fout.=' value="' . $argopts['val'] . '"';
                $theval = $argopts['val'];
            } else {
                $fout.=' value="on"';
            }

            if (isset($argopts['seekval'])) {
                $auxsw = false;
                if (is_array($argopts['seekval'])) {

                    foreach ($argopts['seekval'] as $opt) {

                        if ($opt == $argopts['val']) {
                            $auxsw = true;
                        }
                    }
                } else {

                    if ($argopts['seekval'] == $theval) {

                        $auxsw = true;
                    }
                }
                if ($auxsw == true) {
                    $fout.=' checked="checked"';
                }
            }
            $fout.='/>';
            return $fout;
        }

        static function generate_input_textarea($argname, $otherargs = array()) {
            $fout = '';
            $fout.='<textarea';
            $fout.=' name="' . $argname . '"';

            $margs = array(
                'class' => '',
                'val' => '',
                'seekval' => '',
                'type' => '',
                'extraattr'=>'',
            );
            $margs = array_merge($margs, $otherargs);



            if ($margs['class'] != '') {
                $fout.=' class="' . $margs['class'] . '"';
            }
            if ($margs['extraattr'] != '') {
                $fout.='' . $margs['extraattr'] . '';
            }
            $fout.='>';
            if (isset($margs['seekval']) && $margs['seekval'] != '') {
                $fout.='' . $margs['seekval'] . '';
            } else {
                $fout.='' . $margs['val'] . '';
            }
            $fout.='</textarea>';

            return $fout;
        }
        static function generate_select($argname, $pargopts) {

            
            $fout = '';
            $auxtype = 'select';

            if($pargopts==false){
                $pargopts = array();
            }
            
            $margs = array(
                'options' => array(),
                'class' => '',
                'seekval' => '',
                'extraattr'=>'',
            );

            $margs = array_merge($margs, $pargopts);

            $fout.='<select';
            $fout.=' name="' . $argname . '"';
            if (isset($margs['class'])) {
                $fout.=' class="'.$margs['class'].'"';
            }
            if ($margs['extraattr'] != '') {
                $fout.='' . $margs['extraattr'] . '';
            }
            
            $fout.='>';
            


            if(is_array($margs['options'])){
                foreach ($margs['options'] as $opt) {
                    $val = '';
                    $lab = '';



                    if (is_array($opt) && isset($opt['lab']) && isset($opt['val'])) {
                        $val = $opt['val'];
                        $lab = $opt['lab'];
                    } else {
                        if (is_array($opt) && isset($opt['label']) && isset($opt['value'])) {

                            $val = $opt['value'];
                            $lab = $opt['label'];
                        }else{
                            $val = $opt;
                            $lab = $opt;
                        }

                    }


                    $fout.='<option value="' . $val . '"';
                    if ($margs['seekval'] != '' && $margs['seekval'] == $val) {
                        $fout.=' selected';
                    }

                    $fout.='>' . $lab . '</option>';
                }

            }
            $fout.='</select>';
            return $fout;
        }
        static function get_query_arg($url, $key) {


            if(strpos($url, $key)!==false){


                $pattern = '/[?&]'.$key.'=.+/';
                preg_match($pattern, $url, $matches);

                if($matches && $matches[0]){
                    return $matches[0];
                }

            }
        }





        static function transform_to_str_size($arg) {

            $fout = $arg;
            if(strpos($arg,'auto')!==false || strpos($arg,'%')!==false){

            }else{
                $fout.='px';
            }
            return $fout;
        }

    }

}