window.htmleditor_sel = '';
window.mceeditor_sel = '';
top.dzstln_startinit = '';

jQuery(document).ready(function($){
    if(typeof window.dzstln_settings == 'undefined'){
        return;
    }

    $('#wp-content-media-buttons').append('<a class="shortcode_opener" id="dzstln_shortcode" style="cursor:pointer; display: inline-block; vertical-align: middle;width:auto; height:28px; box-sizing: border-box; margin-right: 5px; background-color: #ffffff; color: #726b6b; padding-right: 10px; border: 1px solid rgba(0,0,0,0.3); border-radius:3px; line-height: 1; font-size:13px; padding-left:8px; padding-top: 5px;"><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24.077 24.077" style=" width: 14px; height: 14px; display: inline-block;  margin-right: 5px; vertical-align: middle; enable-background:new 0 0 24.077 24.077;" xml:space="preserve"> <g> <path style="fill:#030104;" d="M2,6.577v4.461h16.189l1.396-1.395c0.44-0.439,1.158-0.439,1.597,0l1.396,1.395h1.499v2h-1.5 l-1.394,1.394c-0.44,0.44-1.158,0.44-1.597,0l-1.395-1.394H2V17.5h1.42l1.397-1.396c0.44-0.439,1.158-0.439,1.597,0L7.811,17.5 h16.266v2H7.808l-1.395,1.394c-0.439,0.44-1.157,0.44-1.596,0L3.422,19.5H2v4.538H0.077H0v-24h0.077H2v4.539h6.958l1.396-1.396 c0.44-0.439,1.158-0.439,1.597,0l1.397,1.396h10.729v2h-10.73l-1.395,1.394c-0.439,0.44-1.157,0.44-1.596,0L8.96,6.577H2z"/> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> <g> </g> </svg> <span style="display: inline-block; vertical-align: middle;">'+window.dzstln_settings.translate_add_dzstln+'</span></a>');


    $('#dzstln_shortcode').bind('click', function(){



        var parsel = '';
        var sel = '';
        top.dzstln_startinit = '';
        if(window.tinyMCE == undefined || window.tinyMCE.activeEditor==null || jQuery('#content_parent').css('display')=='none'){
            var textarea = document.getElementById("content");
            var start = textarea.selectionStart;
            var end = textarea.selectionEnd;
            sel = textarea.value.substring(start, end);

            //console.log(sel);

            //textarea.value = 'ceva';
            if(sel!=''){
                parsel+='&sel=' + encodeURIComponent(sel);

                window.htmleditor_sel = sel;
            }else{
                window.htmleditor_sel = '';
            }
        }else{
            //console.log(window.tinyMCE.activeEditor);
            var ed = window.tinyMCE.activeEditor;
            sel=ed.selection.getContent();

            if(sel!=''){
                parsel+='&sel=' + encodeURIComponent(sel);
                window.mceeditor_sel = sel;
            }else{
                window.mceeditor_sel = '';
            }
            //console.log(aux);
        }

        //console.info('selis: '+sel);
        top.dzstln_startinit = sel;

        console.info('top.dzstln_startinit is: '+top.dzstln_startinit);


        window.dzszb_open(dzstln_settings.shortcode_generator_url + parsel, 'iframe', {bigwidth: 1200, bigheight: 700,forcenodeeplink: 'on', dims_scaling: 'fill'});
  
    })
});