
/*
 * Author: Audio Player with Playlist
 * Website: http://digitalzoomstudio.net/
 * Portfolio: http://bit.ly/nM4R6u
 * Version: 2.60
 * */


function htmlEncode(arg){
    return jQuery('<div/>').text(arg).html();
}

function htmlDecode(value){
    return jQuery('<div/>').html(arg).text();
}


var dzsap_list = [];
var dzsap_ytapiloaded = false;
var dzsap_globalidind = 20;


window.dzsap_self_options = {};

(function($) {

    $.fn.prependOnce = function(arg, argfind) {
        var _t = $(this) // It's your element


//        console.info(argfind);
        if(typeof(argfind) =='undefined'){
            var regex = new RegExp('class="(.*?)"');
            var auxarr = regex.exec(arg);


            if(typeof auxarr[1] !='undefined'){
                argfind = '.'+auxarr[1];
            }
        }


        // we compromise chaining for returning the success
        if(_t.children(argfind).length<1){
            _t.prepend(arg);
            return true;
        }else{
            return false;
        }
    };
    $.fn.appendOnce = function(arg, argfind) {
        var _t = $(this) // It's your element


        if(typeof(argfind) =='undefined'){
            var regex = new RegExp('class="(.*?)"');
            var auxarr = regex.exec(arg);


            if(typeof auxarr[1] !='undefined'){
                argfind = '.'+auxarr[1];
            }
        }
        // we compromise chaining for returning the success
        if(_t.children(argfind).length<1){
            _t.append(arg);
            return true;
        }else{
            return false;
        }
    };
    $.fn.audioplayer = function(o) {
        var defaults = {
            design_skin: 'skin-default'
            ,autoplay: 'off'
            ,cue: 'on'
            ,loop: 'off'
            ,swf_location: "ap.swf"//==the location of the flash backup
            ,swffull_location: "apfull.swf"//==the location of the flash backup
            ,settings_backup_type: 'light' // == light or full

            ,settings_extrahtml: '' // == some extra html - can be rates, plays, likes
            ,settings_extrahtml_in_float_left: '' // -- some extra html that you may want to add inside the player, to the right
            ,settings_extrahtml_in_float_right: '' // -- some extra html that you may want to add inside the player, to the right

            ,settings_trigger_resize : '0'
            ,design_thumbh: "default"//thumbnail size
            ,design_thumbw: "200"
            ,disable_volume: 'default'
            ,disable_scrub: 'default'
            ,disable_player_navigation: 'off'
            ,disable_timer: 'default'
            ,type: 'audio'
            ,embed_code: ''
            ,skinwave_dynamicwaves: 'off' // -- dynamic scale based on volume for no spectrum wave
            ,soundcloud_apikey: '' // -- set the sound cloud api key
            ,parentgallery: null
            ,skinwave_enableSpectrum: 'off' // off or on
            ,skinwave_enableReflect: 'on'
            ,settings_useflashplayer: 'auto' // off or on or auto
            ,skinwave_spectrummultiplier: '1' // == number
            ,settings_php_handler: '' // -- the path of the publisher.php file, this is used to handle comments, likes etc.
            ,php_retriever: 'soundcloudretriever.php'
            ,skinwave_mode: 'normal' // --- "normal" or "small"

            ,skinwave_comments_enable: 'off' // -- enable the comments, publisher.php must be in the same folder as this html
            ,skinwave_comments_playerid: ''
            ,skinwave_comments_account: 'none'
            ,skinwave_comments_process_in_php: 'off' // -- select wheter the comment text should be processed in javascript "off" / or in php, later "on"
            ,skinwave_comments_retrievefromajax: 'off'// --- retrieve the comment form ajax
            ,skinwave_comments_displayontime: 'on'// --- display the comment when the scrub header is over it
            ,skinwave_comments_avatar: 'http://www.gravatar.com/avatar/00000000000000000000000000000000?s=20'// -- default image
            ,skinwave_comments_allow_post_if_not_logged_in: 'on'// -- default image

            ,skinwave_timer_static: 'off'
            ,skinwave_spectrum_wavesbg: '4f4949' // == number
            ,skinwave_spectrum_wavesprog: 'ae1919' // == number
            ,default_volume: '1' // -- number / set the default volume 0-1 or "last" for the last known volume
            ,design_menu_show_player_state_button: 'off' // -- show a button that allows to hide or show the menu
            ,playfrom: 'off' //off or specific number of settings or set to "last"
            ,scrubbar_tweak_overflow_hidden: 'off' // -- replace overflow hidden that is used for  with a
            ,design_animateplaypause: 'default'
            ,embedded: 'off' // // -- if embedded in a iframe
            ,embedded_iframe_id: '' // // -- if embedded in a iframe, specify the iframe id here
            ,sample_time_start: '0' // --- if this is a sample to a complete song, you can write here start times, if not, leave to 0.
            ,sample_time_end: '0' // -- if this is a sample to a complete song, you can write here start times, if not, leave to 0.
            ,sample_time_total: '0'// -- if this is a sample to a complete song, you can write here start times, if not, leave to 0.
            ,google_analytics_send_play_event: 'off' // -- send the play event to google analytics, you need to have google analytics script already on your page
            ,fakeplayer: null // -- if this is a fake player, it will feed
            ,type_for_fake_feed: '' // -- if this is a fake player, this is the type he is reffering to
            ,failsafe_repair_media_element: '' // -- some scripts might effect the media element used by zoomsounds, this is how we replace the media element in a certain time
            ,action_audio_play: null // -- set a outer play function ( for example for tracking your analytics )
            ,action_audio_play2: null // -- set a outer play function ( for example for tracking your analytics )
            ,action_audio_end: null // -- set a outer ended function ( for example for tracking your analytics )
            ,action_audio_comment: null // -- set a outer commented function ( for example for tracking your analytics )
            ,type_audio_stop_buffer_on_unfocus: 'off' // -- if set to on, when the audio player goes out of focus, it will unbuffer the file so that it will not load anymore, useful if you want to stop buffer on large files


            ,settings_exclude_from_list: 'off' // -- a audioplayer list is formed at runtime so that when


        };



        //console.info(o);
        if(typeof o =='undefined'){
            if(typeof $(this).attr('data-options')!='undefined'  && $(this).attr('data-options')!=''){
                var aux = $(this).attr('data-options');


                try{
                    o = $.extend({},JSON.parse(aux) );

                }catch(err){

                }




            }
        }

        o = $.extend(defaults, o);
        //console.info(o);


        this.each(function() {
            var cthis = $(this);
            var cchildren = cthis.children()
                ,cthisId = 'ap1'
            ;
            var currNr = -1;
            var busy = true;
            var i = 0;
            var ww
                , wh
                , tw
                , th
                ,cw //controls width
                ,ch //controls height
                ,sw = 0//scrubbar width
                ,sh
                ,spos = 0 //== scrubbar prog pos
            ;
            var _audioplayerInner
                ,_apControls = null
                ,_apControlsLeft = null
                ,_apControlsRight = null
                ,_conControls
                ,_conPlayPause
                ,_controlsVolume
                ,_scrubbar
                ,_theMedia
                ,_cmedia
                ,_theThumbCon
                ,_metaArtistCon

                ,_commentsHolder = null
                ,_commentsWriter = null
                ,_currTime = null
                ,_totalTime = null
                ,_feed_fakePlayer = null
            ;
            var busy = false
                ,playing = false
                ,muted = false
                ,loaded=false
                ,destroyed = false
                ,google_analytics_sent_play_event = false
                ,destroyed_for_rebuffer = false
            ;
            var time_total = 0
                ,time_curr=0
                ,real_time_curr=0
                ,real_time_total = 0
                ,sample_time_start=0
                ,sample_time_end=0
                ,sample_time_total=0
                ,sample_perc_start=0
                ,sample_perc_end=0
                ,currTime_outerWidth = 0
            ;
            var index_extrahtml_toloads = 0;
            var last_vol = 1
                ,last_vol_before_mute = 1
                ,the_player_id = ''
            ;
            var inter_check
                ,inter_checkReady
                ,inter_audiobuffer_workaround_id = 0
                ,inter_trigger_resize
            ;
            var skin_minimal_canvasplay
                ,skin_minimal_canvaspause
            ;
            var is_flashplayer = false
            ;
            var data_source
            ;

            var res_thumbh = false
                ,debug_var = false
                ,volume_dragging = false


            ; // resize thumb height

            var str_ie8 = '';

            //===spectrum stuff

            var javascriptNode = null;
            var audioCtx = null;
            var audioBuffer = null;
            var sourceNode = null;
            var analyser = null;
            var lastarray = null;
            var webaudiosource = null;
            var canw = 100;
            var canh = 100;
            var barh = 100
                ,design_thumbh
            ;
            var type = '';

            var sposarg = 0; // the % at which the comment will be placed

            var arr_the_comments = [];

            var str_audio_element = '';

            var lasttime_inseconds = 0;

            var controls_left_pos = 0;
            var controls_right_pos = 0;

            var ajax_view_submitted = 'auto'
                ,increment_views = 0
            ;

            var starrating_index = 0
                ,starrating_nrrates = 0
                ,starrating_alreadyrated = -1
            ;

            var playfrom = 'off'
                ,playfrom_ready = false
            ;

            var defaultVolume = 1;

            var currIp = '127.0.0.1';
            var action_audio_end = null
                ,action_audio_play = null
                ,action_audio_play2 = null
                ,action_audio_comment = null
            ; // -- set a outer ended function ( for example for tracking your analytics


            var sw_suspend_enter_frame = false
            ;

            if(isNaN(parseInt(o.design_thumbh, 10))==false){
                o.design_thumbh = parseInt(o.design_thumbh, 10);

            }
            if(String(o.design_thumbw).indexOf('%')==-1){
                o.design_thumbw = parseInt(o.design_thumbw, 10);

            }

            if(Number(o.sample_time_start)>0){
                sample_time_start = Number(o.sample_time_start);
                if(Number(o.sample_time_end)>0){
                    sample_time_end = Number(o.sample_time_end);

                    if(Number(o.sample_time_total)>0){
                        sample_time_total = Number(o.sample_time_total);


                        sample_perc_start = sample_time_start/ sample_time_total;
                        sample_perc_end = sample_time_end/ sample_time_total;

                    }
                }

            }




            //console.info(sample_perc_start,sample_perc_end);

            o.settings_trigger_resize = parseInt(o.settings_trigger_resize, 10);

            if(cthis.children('.extra-html').length>0 && o.settings_extrahtml==''){
                o.settings_extrahtml = cthis.children('.extra-html').eq(0).html();



                var re_ratesubmitted = /{{ratesubmitted=(.?)}}/g;
                if(re_ratesubmitted.test(String(o.settings_extrahtml))){
                    re_ratesubmitted.lastIndex = 0;
                    var auxa = (re_ratesubmitted.exec(String(o.settings_extrahtml)));


                    starrating_alreadyrated = auxa[1];

                    o.settings_extrahtml = String(o.settings_extrahtml).replace(re_ratesubmitted, '');

                    if(o.parentgallery && $(o.parentgallery).get(0)!=undefined && $(o.parentgallery).get(0).api_player_rateSubmitted!=undefined){
                        $(o.parentgallery).get(0).api_player_rateSubmitted();
                    }
                }


                cthis.children('.extra-html').remove();
            }

            if(cthis.children('.extra-html-in-controls-right').length>0 && o.settings_extrahtml_in_float_right==''){
                o.settings_extrahtml_in_float_right = cthis.children('.extra-html-in-controls-right').eq(0).html();


            }

            if(cthis.children('.extra-html-in-controls-left').length>0 && o.settings_extrahtml_in_float_left==''){
                o.settings_extrahtml_in_float_left = cthis.children('.extra-html-in-controls-left').eq(0).html();


            }




            init();
            function init(){
                //console.log(typeof(o.parentgallery)=='undefined');

                if(o.design_skin==''){
                    o.design_skin = 'skin-default';
                }

                if(cthis.attr('class').indexOf("skin-")==-1){
                    cthis.addClass(o.design_skin);
                }

                if(cthis.hasClass('skin-redlights')){
                    o.design_skin = 'skin-redlights';
                }


                //console.info(o.design_skin, o.disable_volume);

                if(cthis.attr('data-viewsubmitted')=='on'){
                    ajax_view_submitted='on';
                }
                if(cthis.attr('data-userstarrating')){
                    starrating_alreadyrated=Number(cthis.attr('data-userstarrating'));
                }
//                console.info(starrating_alreadyrated);







                if(o.design_skin=='skin-redlights'){
                    o.disable_timer='on';
                    o.disable_volume='off';
                    if(o.design_animateplaypause=='default'){
                        o.design_animateplaypause = 'on';
                    }

                }



                if(o.design_thumbh=='default'){
                    design_thumbh= 200;
                }
                if(o.embed_code==''){
                    if(cthis.find('div.feed-embed-code').length>0){
                        o.embed_code = cthis.find('div.feed-embed-code').eq(0).html();
                    }
                }

                if(o.design_animateplaypause=='default'){
                    o.design_animateplaypause = 'off';
                }

                if(o.design_animateplaypause=='on'){
                    cthis.addClass('design-animateplaypause');
                }
//                console.info(the_player_id, o.skinwave_comments_enable, o.skinwave_comments_playerid);

                if(o.skinwave_comments_playerid==''){
                    if(typeof(cthis.attr('id'))!='undefined'){
                        the_player_id = cthis.attr('id');
                    }
                }else{
                    the_player_id = o.skinwave_comments_playerid;

                    if(typeof(cthis.attr('id'))=='undefined'){
                        cthis.attr('id', the_player_id);
                    }
                }

                if(the_player_id==''){
                    o.skinwave_comments_enable='off';

                }


                if(cthis.attr('data-fakeplayer')){
                    if(cthis.attr('data-type') && (is_android() || is_ios())==false){

                        o.fakeplayer = $(cthis.attr('data-fakeplayer')).eq(0);
                        o.type_for_fake_feed=  cthis.attr('data-type');
                        cthis.attr('data-type','fake');
                        o.type='fake';
                        type='fake';

                    }
                }


                playfrom = o.playfrom;

                if(isValid(cthis.attr('data-playfrom'))){
                    playfrom = cthis.attr('data-playfrom');
                }

                if(isNaN(parseInt(playfrom,10))==false){
                    playfrom = parseInt(playfrom,10);
                }



//                console.info(the_player_id, o.skinwave_comments_enable);

                if(cthis.attr('data-type')=='youtube'){
                    o.type='youtube';

                    type='youtube';
                }
                if(cthis.attr('data-type')=='soundcloud'){
                    o.type='soundcloud';
                    type = 'soundcloud';
                }
                if(cthis.attr('data-type')=='shoutcast'){
                    o.type='shoutcast';
                    type = 'audio';
                    o.disable_timer='on';
                    //===might still use it for skin-wave

                    if(o.design_skin=='skin-default'){
                        o.disable_scrub='on';
                    }
//                    o.disable_scrub = 'on';
                }

                if(type==''){
                    type='audio';
                }

                //====we disable the function if audioplayer inited
                if(cthis.hasClass('audioplayer')){
                    return;
                }
                //console.info('ceva');

                if(cthis.attr('id')!=undefined){
                    cthisId = cthis.attr('id');
                }else{
                    cthisId = 'ap' + dzsap_globalidind++;
                }

                if(is_ie8()){
                    if(o.cue=='off'){
                        o.cue='on';
                    }
                }



                cthis.removeClass('audioplayer-tobe');
                cthis.addClass('audioplayer');


                if(cthis.find('.the-comments').length>0 && cthis.find('.the-comments').eq(0).children().length>0){
                    arr_the_comments = cthis.find('.the-comments').eq(0).children();
                }else{
                    if(o.skinwave_comments_retrievefromajax=='on'){

                        var data = {
                            action: 'dzsap_get_comments',
                            postdata: '1',
                            playerid: the_player_id
                        };





                        if(o.settings_php_handler){
                            $.ajax({
                                type: "POST",
                                url: o.settings_php_handler,
                                data: data,
                                success: function(response) {
                                    //if(typeof window.console != "undefined" ){ console.log('Ajax - get - comments - ' + response); }

                                    cthis.prependOnce('<div class="the-comments"></div>', '.the-comments');

                                    if(response.indexOf('a-comment')>-1){

                                        response = response.replace(/a-comment/g, 'a-comment dzstooltip-con');
                                        response = response.replace(/dzstooltip arrow-bottom/g, 'dzstooltip arrow-from-start transition-slidein arrow-bottom');

                                    }
                                    cthis.find('.the-comments').eq(0).html(response);

                                    arr_the_comments = cthis.find('.the-comments').eq(0).children();

                                    setup_controls_commentsHolder();

                                },
                                error:function(arg){
                                    if(typeof window.console != "undefined" ){ console.log('Got this from the server: ' + arg, arg); };
                                }
                            });
                        }

                    }
                }



                //===ios does not support volume controls so just let it die
                //====== .. or autoplay FORCE STAFF
                if(is_ios()){
                    o.disable_volume='on';
                    o.autoplay = 'off';
                }

                if(is_android()){

                    o.autoplay = 'off';
                }

                if(type=='youtube'){
                    if(dzsap_ytapiloaded==false){
                        var tag = document.createElement('script');

                        tag.src = "https://www.youtube.com/iframe_api";
                        var firstScriptTag = document.getElementsByTagName('script')[0];
                        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
                        dzsap_ytapiloaded = true;
                    }
                }
                data_source = cthis.attr('data-source');



                //====sound cloud INTEGRATION //
                if(cthis.attr('data-source')!=undefined && String(cthis.attr('data-source')).indexOf('https://soundcloud.com/')>-1){
                    type='soundcloud';
                }
                //console.info(o.type);
                if(type=='soundcloud'){

                    if(o.soundcloud_apikey==''){
                        alert('soundcloud api key not defined, read docs!');
                    }
                    var aux = 'http://api.' + 'soundcloud.com' + '/resolve?url='+data_source+'&format=json&consumer_key=' + o.soundcloud_apikey;
                    //console.info(aux);



                    aux = encodeURIComponent(aux);
                    $.getJSON((o.php_retriever+'?scurl='+aux), function(data) {
                        //console.log(data, data.waveform_url);
                        type='audio';






//                        if(window.console) { console.info(data); };

                        cthis.attr('data-source', data.stream_url + '?consumer_key='+ o.soundcloud_apikey+'&origin=localhost');


                        if(o.cue=='on'){
                            setup_media();
                        }



                    });
//                    type='audio';
                }
                //====END soundcloud INTEGRATION//


                if((can_play_mp3()==false && cthis.attr('data-sourceogg')==undefined) || is_ie8() || o.settings_useflashplayer=='on'){
                    is_flashplayer=true;
                }

                setup_structure();

                //console.info(cthis, is_ios(), o.type);
                //trying to access the youtube api with ios did not work

                //console.log(is_flashplayer)


                if(o.scrubbar_tweak_overflow_hidden=='on'){

                    cthis.addClass('scrubbar-tweak-overflow-hidden-on');
                }else{

                    cthis.removeClass('scrubbar-tweak-overflow-hidden-on');
                }





//                console.info(o.design_skin, type, o.skinwave_comments_enable, o.design_skin=='skin-wave' && (type=='audio'||type=='soundcloud') && o.skinwave_comments_enable=='on');

                //console.log(o.design_skin, type, o.skinwave_comments_enable)




                if(o.settings_extrahtml!=''){

                    //if(cthis.hasClass('alternate-layout')){
                    //    _apControls.append('<div class="extra-html">'+o.settings_extrahtml+'</div>');
                    //}else{
                    //}
                    cthis.append('<div class="extra-html">'+o.settings_extrahtml+'</div>');

                }

                if(type=='youtube'){
                    if(dzsap_list){
                        dzsap_list.push(cthis);
                    }

                    _theMedia.append('<div id="ytplayer_'+cthisId+'"></div>');
                    cthis.get(0).fn_yt_ready = check_yt_ready;

                    if(window.YT){
                        check_yt_ready();
                    }
                }




                //console.info();






                if(type=='audio'){


//                    img = document.createElement('img');
//                    img.onerror = function(){
//                        return;
//                        if(cthis.children('.meta-artist').length>0){
//                            _audioplayerInner.children('.meta-artist').html('audio not found...');
//                        }else{
//                            _audioplayerInner.append('<div class="meta-artist">audio not found...</div>');
//                            _audioplayerInner.children('.meta-artist').eq(0).wrap('<div class="meta-artist-con"></div>');
//                        }
//                    };
//                    img.src= cthis.attr('data-source');

                }

                if(o.autoplay=='on' && o.cue=='on'){
                    increment_views=1;
                }


                if(type=='youtube' && is_ios()){
                    if(cthis.height()<200){
                        cthis.height(200);
                    }
                    aux = '<iframe width="100%" height="100%" src="//www.youtube.com/embed/'+data_source+'" frameborder="0" allowfullscreen></iframe>';
                    cthis.html(aux);
                    return;
                }else{
                    //soundcloud will setupmedia when api done
                    if(o.cue=='on' && type!='soundcloud'){
                        setup_media();
                    }else{

                        cthis.find('.playbtn').bind('click', click_for_setup_media);
                        cthis.find('.scrubbar').bind('click', click_for_setup_media);
                        handleResize();
                    }

                }

                setInterval(function(){
                    debug_var = true;
                },1000);

                // -- we call the api functions here
                //console.info('api sets');

                cthis.get(0).api_destroy = destroy_it; // -- destroy the player and the listeners
                cthis.get(0).api_play = play_media; // -- play the media
                cthis.get(0).api_click_for_setup_media = click_for_setup_media; // -- play the media
                cthis.get(0).api_handleResize = handleResize; // -- force resize event
                cthis.get(0).api_set_playback_speed = set_playback_speed; // -- set the playback speed, only works for local hosted mp3
                cthis.get(0).api_change_media = change_media; // -- change the media file from the API
                cthis.get(0).api_seek_to_perc = seek_to_perc; // -- seek to percentage ( for example seek to 0.5 skips to half of the song )
                cthis.get(0).api_seek_to_onlyvisual = seek_to_onlyvisual; // -- seek to perchange but only visually ( does not actually skip to that ) , good for a fake player
                cthis.get(0).api_set_volume = set_volume; // -- set a volume
                cthis.get(0).api_destroy_listeners = destroy_listeners; // -- set a volume

                cthis.get(0).api_pause_media = pause_media; // -- pause the media
                cthis.get(0).api_pause_media_visual = pause_media_visual; // -- pause the media, but only visually
                cthis.get(0).api_play_media = play_media;// -- play the media
                cthis.get(0).api_play_media_visual = play_media_visual; // -- play the media, but only visually
                cthis.get(0).api_change_visual_target = change_visual_target; // -- play the media, but only visually

                cthis.get(0).api_set_action_audio_play = function(arg){
                    action_audio_play = arg;
                };
                cthis.get(0).api_set_action_audio_end = function(arg){
                    action_audio_end = arg;
                };
                cthis.get(0).api_set_action_audio_comment = function(arg){
                    action_audio_comment = arg;
                };

                //console.log(cthis.get(0));

                //console.info(o);
                if(o.action_audio_play){  action_audio_play = o.action_audio_play;  };
                if(o.action_audio_play2){ action_audio_play2 = o.action_audio_play2;  };

                if(o.action_audio_end){
                    action_audio_end = o.action_audio_end;
                }



                $(window).bind('resize', handleResize);
                handleResize();


                cthis.find('.prev-btn').eq(0).bind('click',click_prev_btn);
                cthis.find('.next-btn').eq(0).bind('click',click_next_btn);
                cthis.find('.btn-menu-state').eq(0).bind('click',click_menu_state);
            }

            function select_all(el) {
                if (typeof window.getSelection != "undefined" && typeof document.createRange != "undefined") {
                    var range = document.createRange();
                    range.selectNodeContents(el);
                    var sel = window.getSelection();
                    sel.removeAllRanges();
                    sel.addRange(range);
                } else if (typeof document.selection != "undefined" && typeof document.body.createTextRange != "undefined") {
                    var textRange = document.body.createTextRange();
                    textRange.moveToElementText(el);
                    textRange.select();
                }
            }

            function change_visual_target(arg,pargs){
                // -- change the visual target, the main is the main palyer playing and the visual target is the player which is a visual representation of this

                //console.info(arg);

                var margs = {

                }




                if(pargs){
                    margs = $.extend(margs,pargs);
                }


                _feed_fakePlayer = arg;

            }


            function change_media(arg,pargs){
                // -- change media source for the player / change_media("song.mp3", {type:"audio", fakeplayer_is_feeder:"off"});


                var margs = {
                    type: ''
                    ,fakeplayer_is_feeder : 'off'
                }

                var handle_resize_delay = 500;
                if(pargs){
                    margs = $.extend(margs,pargs);
                }


                //console.info(_feed_fakePlayer,margs.fakeplayer_is_feeder);
                if(_feed_fakePlayer){
                    _feed_fakePlayer.get(0).api_pause_media_visual();
                }

                //console.log(cthis, _feed_fakePlayer, arg);
                if(margs.fakeplayer_is_feeder=='on'){
                    _feed_fakePlayer = arg;
                }



                // --- if the media is the same DON'T CHANGE IT
                if(cthis.attr('data-source')==arg.attr('data-source')){
                    return false;
                }

                //console.info('change_media()',arg,pargs);


                cthis.removeClass('errored-out');




                destroy_media();



                var _arg = arg;


                //console.info(cthis);
                cthis.attr('data-source', arg.attr('data-source'));
                if(margs.type){

                    cthis.attr('data-type', margs.type);
                    type = margs.type;
                    o.type = margs.type;
                }

                loaded=false;






                if(o.design_skin=='skin-silver'){




                    if(_arg.find('.meta-artist').length>0) {

                        var aux_l = 0;



                        if(_metaArtistCon && _metaArtistCon.length>0){

                            aux_l = _metaArtistCon.offset().left - cthis.offset().left - 13;


                            //console.log(aux_l);
                            _metaArtistCon.css({

                                'position': 'absolute'
                                , 'top': '0px'
                                , 'left': aux_l + 'px'
                            });
                            _metaArtistCon.animate({

                                'top': '-50px'
                                , 'opacity': '0'
                            }, {
                                duration: 300
                            })

                        }else{
                            aux_l = 0;
                        }

                    }



                    // -- still skin-silver
                    if(_arg.find('.meta-artist').eq(0).html()){

                        cthis.addClass('transitioning-change-media');
                        _apControlsRight.append('<div class="meta-artist-con transitioning" style="top:55px;"><div class="meta-artist">'+_arg.find('.meta-artist').eq(0).html()+'</div></div>');

                        if(aux_l==0){
                            aux_l = cthis.width() - _apControlsRight.find('.meta-artist-con.transitioning').last().width()
                        }

                        cthis.find('.meta-artist-con').last().css({
                            'top' : '50px'
                            ,'position': 'relative'
                        })
                        cthis.find('.meta-artist-con').last().animate({

                            'top':'0px'
                        }, {
                            duration: 500
                        });

                        setTimeout(function(){
                            if(cthis.find('.meta-artist-con').length>1){
                                cthis.find('.meta-artist-con').eq(0).remove();
                                _metaArtistCon = cthis.find('.meta-artist-con').eq(0);
                                _metaArtistCon.css({
                                    'position':'relative'
                                    ,'left':'0'
                                })

                            }else{

                                _metaArtistCon = cthis.find('.meta-artist-con').eq(0);
                                _metaArtistCon.css({
                                    'position':'relative'
                                    ,'left':'0'
                                })
                            }


                            cthis.removeClass('transitioning-change-media');
                        }, 900);
                    }

                    handle_resize_delay = 100;
                }


                setup_media();


                if(type=='fake') {
                    return false;

                }


                setTimeout(function(){

                    play_media();
                },500)
                setTimeout(function(){

                    handleResize();
                },handle_resize_delay)
            }


            function setup_controls_commentsHolder(){


                for(i=0;i<arr_the_comments.length;i++){
                    if(_commentsHolder && arr_the_comments[i]!=null){
                        _commentsHolder.append(arr_the_comments[i]);

                    }
                }
            }

            function destroy_listeners(){





                if(destroyed) { return false; }



                sw_suspend_enter_frame = true;

            }

            function destroy_it(){


                if(destroyed) { return false; }

                if(playing){
                    pause_media();
                }

                cthis.remove();
                cthis = null;

                destroyed = true;
            }

            function click_for_setup_media(e, pargs){
                //console.info('click_for_setup_media', cthis, pargs);

                //console.info(e.target);
                //cthis.unbind('click', click_for_setup_media);



                var margs = {

                    'do_not_autoplay' : false
                };

                if(pargs){
                    margs = $.extend(margs,pargs);
                }

                cthis.find('.playbtn').unbind('click', click_for_setup_media);
                cthis.find('.scrubbar').unbind('click', click_for_setup_media);

                setup_media(margs);
            }

            function blur_ap(){
                //console.log('ceva');
                hide_comments_writer();
            }

            function click_menu_state(e){

                if(o.parentgallery && typeof(o.parentgallery.get(0))!="undefined"){
                    o.parentgallery.get(0).api_toggle_menu_state();
                }
            }

            function click_comments_bg(e){
                var _t = $(this);
                var lmx = parseInt(e.clientX, 10) - _t.offset().left;
                sposarg = (lmx / _t.width()) * 100 + '%';
                var argcomm = htmlEncode('');

                if(o.skinwave_comments_allow_post_if_not_logged_in=='off' && o.skinwave_comments_account=='none'){

                    return false;
                }

                var sw = true;

                _commentsHolder.children().each(function(){
                    var _t2 = $(this);
                    //console.info(_t2);

                    if(_t2.hasClass('placeholder') || _t2.hasClass('the-bg')){
                        return;
                    }

                    var lmx2 = _t2.offset().left - _t.offset().left;

                    //console.info(lmx2, Math.abs(lmx2-lmx));

                    if(Math.abs(lmx2-lmx) < 20){
                        _commentsHolder.find('.dzstooltip-con.placeholder').remove();
                        sw = false;

                        return false;
                    }
                })


                if(!sw){
                    return false;
                }

                if(_commentsWriter.hasClass('active')==false){
                    _commentsWriter.css({
                        'height' : _commentsWriter.find('.comments-writer-inner').eq(0).outerHeight() + 20
                    })
                    _commentsWriter.addClass('active');

                    cthis.addClass('comments-writer-active');

                    if(o.parentgallery && $(o.parentgallery).get(0)!=undefined && $(o.parentgallery).get(0).api_handleResize!=undefined){
                        $(o.parentgallery).get(0).api_handleResize();
                    }
                }

                if(o.skinwave_comments_account!='none'){
                    cthis.find('input[name=comment-email]').remove();
                }

                _commentsHolder.find('.dzstooltip-con.placeholder').remove();
                _commentsHolder.append('<span class="dzstooltip-con placeholder" style="left:'+sposarg+';"><div class="the-avatar" style="background-image: url('+o.skinwave_comments_avatar+')"></div></span>');



                //cthis.unbind('focusout', blur_ap);
                //cthis.bind('blur', blur_ap);
            }




            function check_yt_ready_phase_two(arg){

                //console.log(arg);
                init_loaded();
            }
            function change_yt_state(arg){
                //console.log(arg);
            }
            function check_ready(pargs){
                //console.log('check_ready()', cthis, _cmedia);
                //=== do a little ready checking



                var margs = {

                    'do_not_autoplay' : false
                };


                if(pargs){
                    margs = $.extend(margs,pargs);
                }

                //console.log(_cmedia.readyState);
                if(type=='youtube'){

                }else{
                    if(typeof(_cmedia)!='undefined'){//|| o.type=='soundcloud'

//                        console.info(_cmedia.readyState, o.type);


//                        return false;
                        if(_cmedia.nodeName!="AUDIO" || o.type=='shoutcast' ){
                            init_loaded(margs);
                        }else{
                            if(_cmedia.readyState>=2){
                                //console.info("CALL INIT LOADED FROM ",_cmedia.readyState);
                                init_loaded(margs);
                                clearInterval(inter_checkReady);
                            }
                        }
                    }

                }
            }
            function setup_structure(){
                //alert('ceva');
                cthis.append('<div class="audioplayer-inner"></div>');
                _audioplayerInner = cthis.children('.audioplayer-inner');
                _audioplayerInner.append('<div class="the-media"></div>');
                _audioplayerInner.append('<div class="ap-controls"></div>');
                _theMedia = _audioplayerInner.children('.the-media').eq(0);
                _apControls = _audioplayerInner.children('.ap-controls').eq(0);


                var aux_str_scrubbar = '<div class="scrubbar">';
                var aux_str_con_controls = '';
                var aux_str_con_controls_part2 = '';


                aux_str_scrubbar+='<div class="scrub-bg"></div><div class="scrub-buffer"></div><div class="scrub-prog"></div><div class="scrubBox"></div><div class="scrubBox-prog"></div><div class="scrubBox-hover"></div>';




                if(sample_perc_start){

                    aux_str_scrubbar+='<div class="sample-block-start" style="width: '+(sample_perc_start*100)+'%"></div>'
                }
                if(sample_perc_end){

                    aux_str_scrubbar+='<div class="sample-block-end" style="left: '+(sample_perc_end*100)+'%; width: '+(100 - (sample_perc_end*100) )+'%"></div>'
                }

                aux_str_scrubbar+='</div>';// -- end scrubbar

                aux_str_con_controls+='<div class="con-controls"><div class="the-bg"></div><div class="con-playpause"><div class="playbtn"><div class="play-icon"></div><div class="play-icon-hover"></div></div><div class="pausebtn" style="display:none"><div class="pause-icon"><div class="pause-part-1"></div><div class="pause-part-2"></div></div><div class="pause-icon-hover"></div></div></div>';

                if(o.settings_extrahtml_in_float_left){
                    aux_str_con_controls+= o.settings_extrahtml_in_float_left;
                }







                aux_str_con_controls+='</div>';// -- end con-controls
                //console.info(o.disable_timer, aux_str_con_controls);


                if(o.design_skin == 'skin-wave' && o.skinwave_mode=='small'){


                }else{

                    if(o.design_skin == 'skin-aria' || o.design_skin=='skin-silver' || o.design_skin=='skin-redlights' || o.design_skin=='skin-steel'){


                        var playbtn_svg = '<svg version="1.2" baseProfile="tiny" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="25px" height="30px" viewBox="0 0 25 30" xml:space="preserve"> <path d="M24.156,13.195L2.406,0.25C2.141,0.094,1.867,0,1.555,0C0.703,0,0.008,0.703,0.008,1.562H0v26.875h0.008 C0.008,29.297,0.703,30,1.555,30c0.32,0,0.586-0.109,0.875-0.266l21.727-12.93C24.672,16.375,25,15.727,25,15 S24.672,13.633,24.156,13.195z"/> </svg>';
                        var pausebtn_svg = '<svg version="1.2" baseProfile="tiny" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="25px" height="30px" viewBox="0 0 25 30" xml:space="preserve"> <path d="M24.156,13.195L2.406,0.25C2.141,0.094,1.867,0,1.555,0C0.703,0,0.008,0.703,0.008,1.562H0v26.875h0.008 C0.008,29.297,0.703,30,1.555,30c0.32,0,0.586-0.109,0.875-0.266l21.727-12.93C24.672,16.375,25,15.727,25,15 S24.672,13.633,24.156,13.195z"/> </svg>';

                        if(o.design_skin=='skin-silver'){
                            playbtn_svg = '<svg version="1.2" baseProfile="tiny" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="15px" height="30px" viewBox="0 0 25 30" xml:space="preserve"> <path d="M24.156,13.195L2.406,0.25C2.141,0.094,1.867,0,1.555,0C0.703,0,0.008,0.703,0.008,1.562H0v26.875h0.008 C0.008,29.297,0.703,30,1.555,30c0.32,0,0.586-0.109,0.875-0.266l21.727-12.93C24.672,16.375,25,15.727,25,15 S24.672,13.633,24.156,13.195z"/> </svg>';
                            pausebtn_svg = '<svg version="1.2" baseProfile="tiny" id="Layer_2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="15px" height="30px" viewBox="0 0 25 30" xml:space="preserve"> <path d="M9.812,29.7c0,0.166-0.178,0.3-0.398,0.3H2.461c-0.22,0-0.398-0.134-0.398-0.3V0.3c0-0.166,0.178-0.3,0.398-0.3h6.953 c0.22,0,0.398,0.134,0.398,0.3V29.7z"/> <path d="M23.188,29.7c0,0.166-0.178,0.3-0.398,0.3h-6.953c-0.22,0-0.398-0.134-0.398-0.3V0.3c0-0.166,0.178-0.3,0.398-0.3h6.953 c0.22,0,0.398,0.134,0.398,0.3V29.7z"/> </svg>';
                        }

                        if(o.design_skin=='skin-redlights'||o.design_skin=='skin-steel'){
                            playbtn_svg = '';
                            pausebtn_svg = '';
                        }

                        aux_str_con_controls = '<div class="the-bg"></div><div class="ap-controls-left"><div class="con-playpause"><div class="playbtn"><div class="play-icon">'+playbtn_svg+'</div><div class="play-icon-hover"></div></div><div class="pausebtn" style="display:none"><div class="pause-icon">'+pausebtn_svg+'</div><div class="pause-icon-hover"></div></div></div>';




                        aux_str_con_controls+='</div>';

                        //console.info(o.settings_extrahtml_in_float_right);


                        if(o.settings_extrahtml_in_float_right){
                            aux_str_con_controls+='<div class="controls-right">'+o.settings_extrahtml_in_float_right+'</div>';

                            //console.info(o._gall)
                            //console.info('dada');

                            if(o.design_skin=='skin-redlights'){

                                //console.info(o.parentgallery, o.parentgallery.get(0).api_skin_redlights_give_controls_right_to_all);
                                if(o.parentgallery && o.parentgallery.get(0).api_skin_redlights_give_controls_right_to_all){
                                    o.parentgallery.get(0).api_skin_redlights_give_controls_right_to_all();
                                }
                            }
                        }
                        //console.info('ceva');


                        aux_str_con_controls+='<div class="ap-controls-right">';

                        if(o.design_skin=='skin-silver'){

                            aux_str_con_controls+='<div class="controls-volume controls-volume-vertical"><div class="volumeicon"></div><div class="volume-holder"><div class="volume_static"></div><div class="volume_active"></div><div class="volume_cut"></div></div></div>';

                            if(o.disable_timer!='on'){
                                aux_str_con_controls+='<div class="total-time">00:00</div>';
                            }

                            aux_str_con_controls+='</div>'+aux_str_scrubbar;
                        }else{



                            if(o.design_skin=='skin-redlights' ){

                                if(o.disable_volume!='on'){
                                    aux_str_con_controls+='<div class="controls-volume"><div class="volumeicon"></div><div class="volume_static"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="57px" height="12px" viewBox="0 0 57 12" enable-background="new 0 0 57 12" xml:space="preserve"> <rect y="9" fill="#414042" width="3" height="3"/> <rect x="6" y="8" fill="#414042" width="3" height="4"/> <rect x="12" y="7" fill="#414042" width="3" height="5"/> <rect x="18" y="5.958" fill="#414042" width="3" height="6"/> <rect x="24" y="4.958" fill="#414042" width="3" height="7"/> <rect x="30" y="4" fill="#414042" width="3" height="8"/> <rect x="36" y="3" fill="#414042" width="3" height="9"/> <rect x="42" y="2" fill="#414042" width="3" height="10"/> <rect x="48" y="1" fill="#414042" width="3" height="11"/> <rect x="54" fill="#414042" width="3" height="12"/> </svg></div><div class="volume_active"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="57px" height="12px" viewBox="0 0 57 12" enable-background="new 0 0 57 12" xml:space="preserve"> <rect y="9" fill="#414042" width="3" height="3"/> <rect x="6" y="8" fill="#414042" width="3" height="4"/> <rect x="12" y="7" fill="#414042" width="3" height="5"/> <rect x="18" y="5.958" fill="#414042" width="3" height="6"/> <rect x="24" y="4.958" fill="#414042" width="3" height="7"/> <rect x="30" y="4" fill="#414042" width="3" height="8"/> <rect x="36" y="3" fill="#414042" width="3" height="9"/> <rect x="42" y="2" fill="#414042" width="3" height="10"/> <rect x="48" y="1" fill="#414042" width="3" height="11"/> <rect x="54" fill="#414042" width="3" height="12"/> </svg></div><div class="volume_cut"></div></div>';
                                }

                                aux_str_con_controls+='<div class="clear"></div>';
                            }

                            aux_str_con_controls+=aux_str_scrubbar;


                            if(o.disable_timer!='on'){
                                aux_str_con_controls+='<div class="total-time">00:00</div>';
                            }
                        }







                        if(o.design_skin=='skin-silver'){

                        }else{
                            aux_str_con_controls+='</div>';
                        }


                        _apControls.append(aux_str_con_controls);



                    }else{





                        if(cthis.hasClass('alternate-layout')){

                            _apControls.append(aux_str_con_controls+aux_str_scrubbar);

                        }else{
                            _apControls.append(aux_str_scrubbar+aux_str_con_controls);
                        }
                    }


                }

                if(_apControls.find('.ap-controls-left').length>0){
                    _apControlsLeft = _apControls.find('.ap-controls-left').eq(0);
                }
                if(_apControls.find('.ap-controls-right').length>0){
                    _apControlsRight = _apControls.find('.ap-controls-right').eq(0);
                }





                if(o.disable_timer!='on'){
                    _currTime = cthis.find('.curr-time').eq(0);
                    _totalTime = cthis.find('.total-time').eq(0);

                    if(o.design_skin == 'skin-steel'){
                        if(_currTime.length==0){
                            _totalTime.before('<div class="curr-time">00:00</div> <span class="separator-slash">/</span> ');
                            //console.info('WHAT WHAT IN THE BUTT', _totalTime, _totalTime.prev(),  cthis.find('.curr-time'));

                            _currTime = _totalTime.prev().prev();

                        }
                    }

                    //console.info(_currTime, _totalTime);
                }



                if(Number(o.sample_time_total)>0){

                    time_total = Number(o.sample_time_total);

                    //console.info(_currTime,time_total);
                    if(_totalTime){
                        _totalTime.html(formatTime(time_total));
                    }

                    //console.info(_totalTime.html());

                    //return false;
                }

                _scrubbar = _apControls.find('.scrubbar').eq(0);
                _conControls = _apControls.children('.con-controls');
                _conPlayPause = cthis.find('.con-playpause').eq(0);


                _controlsVolume = cthis.find('.controls-volume').eq(0);

                if(!_metaArtistCon){
                    if(cthis.children('.meta-artist').length>0){
                        //console.info(cthis.hasClass('alternate-layout'));
                        if(cthis.hasClass('alternate-layout')){
                            //console.info(_conControls.children().last());

                            if(_conControls.children().last().hasClass('clear')){
                                _conControls.children().last().remove();
                            }
                            _conControls.append(cthis.children('.meta-artist'));
                        }else{
                            _audioplayerInner.append(cthis.children('.meta-artist'));
                        }

                    }
                    _audioplayerInner.find('.meta-artist').eq(0).wrap('<div class="meta-artist-con"></div>');

                    //console.info('ceva');

                    _metaArtistCon = _audioplayerInner.children('.meta-artist-con').eq(0);


                    if(o.design_skin == 'skin-redlights' || o.design_skin=='skin-steel'){
                        _apControlsRight.prepend('<div class="clear"></div>');
                        _apControlsRight.prepend(_metaArtistCon);


                    }

                }

                cthis.addClass('meta-loaded');


                var str_thumbh = "";
                if(design_thumbh!=''){
                    str_thumbh = ' height:'+o.design_thumbh+'px;';
                }


                if(cthis.attr('data-thumb')!=undefined && cthis.attr('data-thumb')!=''){


                    var aux_thumb_con_str = '';

                    if(cthis.attr('data-thumb_link')){
                        aux_thumb_con_str += '<a href="'+cthis.attr('data-thumb_link')+'"';
                    }else{
                        aux_thumb_con_str += '<div';
                    }
                    aux_thumb_con_str+=' class="the-thumb-con"><div class="the-thumb" style="'+str_thumbh+' background-image:url('+cthis.attr('data-thumb')+')"></div>';


                    if(cthis.attr('data-thumb_link')){
                        aux_thumb_con_str += '</a>';
                    }else{
                        aux_thumb_con_str += '</div>';
                    }


                    if(o.design_skin == 'skin-wave' && o.skinwave_mode=='small'){

                        _apControlsLeft.prepend(aux_thumb_con_str);
                    }else if(o.design_skin == 'skin-steel'){



                        _apControlsLeft.append(aux_thumb_con_str);
                    }else{

                        _audioplayerInner.prepend(aux_thumb_con_str);
                    }

                    _theThumbCon = _audioplayerInner.children('.the-thumb-con').eq(0);
                }

                //console.info(cthis, o.disable_volume,_controlsVolume);
                if(o.disable_volume=='on'){
                    _controlsVolume.hide();
                }
                if(o.disable_volume=='off'){
                    _controlsVolume.show();
                }
                if(o.disable_scrub=='on'){
                    _scrubbar.hide();
                }




                //                console.info(o.embed_code);




                if(o.design_skin=='skin-wave'){

                }
                // --- END skin-wave



                //console.info(o.parentgallery, o.disable_player_navigation);
                if(typeof(o.parentgallery)!='undefined' && o.disable_player_navigation!='on'){
//                    _conControls.appendOnce('<div class="prev-btn"></div><div class="next-btn"></div>','.prev-btn');

                }

                if(cthis.hasClass('skin-minion')){
                    if(cthis.find('.menu-description').length>0){
                        //console.log('ceva');
                        _conPlayPause.addClass('with-tooltip');
                        _conPlayPause.prepend('<span class="dzstooltip" style="left:-7px;">'+cthis.find('.menu-description').html()+'</span>');
                        //console.info(_conPlayPause.children('span').eq(0), _conPlayPause.children('span').eq(0).textWidth());
                        _conPlayPause.children('span').eq(0).css('width', _conPlayPause.children('span').eq(0).textWidth() + 10);
                    }
                }



                // === setup_structore for both flash and html5
                if(o.parentgallery && typeof(o.parentgallery)!='undefined' && o.disable_player_navigation!='on'){
                    //console.info('ceva', is_flashplayer , o.settings_backup_type);

                    var prev_btn_str = '<div class="prev-btn"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="10px" height="13.325px" viewBox="0 0 10 13.325" enable-background="new 0 0 10 13.325" xml:space="preserve"> <g id="Layer_2"> <polygon opacity="0.5" fill="#E6E7E8" points="3.208,7.674 5.208,9.104 5.208,5.062 3.208,5.652 "/> </g> <g id="Layer_1"> <rect x="0.306" y="3.074" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -1.4203 4.7299)" fill="#E6E7E8" width="9.386" height="2.012"/> <rect x="0.307" y="8.29" transform="matrix(0.7072 0.707 -0.707 0.7072 8.0362 -0.8139)" fill="#E6E7E8" width="9.387" height="2.012"/> </g> </svg></div>';

                    var next_btn_str = '<div class="next-btn"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="10px" height="13.325px" viewBox="0 0 10 13.325" enable-background="new 0 0 10 13.325" xml:space="preserve"> <g id="Layer_2"> <polygon opacity="0.5" fill="#E6E7E8" points="7.035,5.695 5.074,4.292 5.074,8.257 7.035,7.678 "/> </g> <g id="Layer_1"> <rect x="0.677" y="8.234" transform="matrix(-0.7071 0.7071 -0.7071 -0.7071 15.532 12.0075)" fill="#E6E7E8" width="9.204" height="1.973"/> <rect x="0.674" y="3.118" transform="matrix(-0.7072 -0.707 0.707 -0.7072 6.1069 10.7384)" fill="#E6E7E8" width="9.206" height="1.974"/> </g> </svg></div>';

                    if(o.design_skin == 'skin-steel'){

                        prev_btn_str = '<div class="prev-btn"><svg class="svg1" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="10px" height="13.325px" viewBox="0 0 10 13.325" enable-background="new 0 0 10 13.325" xml:space="preserve"> <g id="Layer_2"> <polygon opacity="0.5" fill="#E6E7E8" points="3.208,7.674 5.208,9.104 5.208,5.062 3.208,5.652 "/> </g> <g id="Layer_1"> <rect x="0.306" y="3.074" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -1.4203 4.7299)" fill="#E6E7E8" width="9.386" height="2.012"/> <rect x="0.307" y="8.29" transform="matrix(0.7072 0.707 -0.707 0.7072 8.0362 -0.8139)" fill="#E6E7E8" width="9.387" height="2.012"/> </g> </svg> <svg class="svg2"  version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="10px" height="13.325px" viewBox="0 0 10 13.325" enable-background="new 0 0 10 13.325" xml:space="preserve"> <g id="Layer_2"> <polygon opacity="0.5" fill="#E6E7E8" points="3.208,7.674 5.208,9.104 5.208,5.062 3.208,5.652 "/> </g> <g id="Layer_1"> <rect x="0.306" y="3.074" transform="matrix(0.7071 -0.7071 0.7071 0.7071 -1.4203 4.7299)" fill="#E6E7E8" width="9.386" height="2.012"/> <rect x="0.307" y="8.29" transform="matrix(0.7072 0.707 -0.707 0.7072 8.0362 -0.8139)" fill="#E6E7E8" width="9.387" height="2.012"/> </g> </svg></div>';


                        next_btn_str = '<div class="next-btn"><svg class="svg1" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="10px" height="13.325px" viewBox="0 0 10 13.325" enable-background="new 0 0 10 13.325" xml:space="preserve"> <g id="Layer_2"> <polygon opacity="0.5" fill="#E6E7E8" points="7.035,5.695 5.074,4.292 5.074,8.257 7.035,7.678 "/> </g> <g id="Layer_1"> <rect x="0.677" y="8.234" transform="matrix(-0.7071 0.7071 -0.7071 -0.7071 15.532 12.0075)" fill="#E6E7E8" width="9.204" height="1.973"/> <rect x="0.674" y="3.118" transform="matrix(-0.7072 -0.707 0.707 -0.7072 6.1069 10.7384)" fill="#E6E7E8" width="9.206" height="1.974"/> </g> </svg><svg class="svg2" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="10px" height="13.325px" viewBox="0 0 10 13.325" enable-background="new 0 0 10 13.325" xml:space="preserve"> <g id="Layer_2"> <polygon opacity="0.5" fill="#E6E7E8" points="7.035,5.695 5.074,4.292 5.074,8.257 7.035,7.678 "/> </g> <g id="Layer_1"> <rect x="0.677" y="8.234" transform="matrix(-0.7071 0.7071 -0.7071 -0.7071 15.532 12.0075)" fill="#E6E7E8" width="9.204" height="1.973"/> <rect x="0.674" y="3.118" transform="matrix(-0.7072 -0.707 0.707 -0.7072 6.1069 10.7384)" fill="#E6E7E8" width="9.206" height="1.974"/> </g> </svg></div>';

                    }




                    var auxs = prev_btn_str + next_btn_str;


                    //console.info(o.parentgallery);

                    if(o.parentgallery.hasClass('mode-showall')==false){
                        if(o.design_skin == 'skin-wave' && o.skinwave_mode=='small') {

                        }else{
                            if(o.design_skin == 'skin-wave'){


                            }else if(o.design_skin == 'skin-steel'){

                                _apControlsLeft.prependOnce(prev_btn_str,'.prev-btn');

                                if(_apControlsLeft.children('.the-thumb-con').length>0){
                                    console.info(_theThumbCon.prev());

                                    if(_apControlsLeft.children('.the-thumb-con').eq(0).length>0){
                                        if(_apControlsLeft.children('.the-thumb-con').eq(0).prev().hasClass('next-btn')==false){
                                            _apControlsLeft.children('.the-thumb-con').eq(0).before(next_btn_str);
                                        }
                                    }

                                }else{

                                    _apControlsLeft.appendOnce(next_btn_str,'.next-btn');
                                }
                            }else{

                                _audioplayerInner.appendOnce(auxs,'.prev-btn');
                            }
                        }
                    }


                }





                if(cthis.children('.afterplayer').length>0){
                    //console.log(cthis.children('.afterplayer'));

                    cthis.append(cthis.children('.afterplayer'));
                }

                //console.log(o.settings_extrahtml);

                if(o.settings_extrahtml!=''){

                    //console.log(o.settings_extrahtml, index_extrahtml_toloads);

                    if(String(o.settings_extrahtml).indexOf('{{get_likes}}')>-1 && is_ie8()==false){
                        index_extrahtml_toloads++;
                        ajax_get_likes();
                    }
                    if(String(o.settings_extrahtml).indexOf('{{get_plays}}')>-1 && is_ie8()==false){
                        index_extrahtml_toloads++;
                        ajax_get_views();
                    }else{
                        if(increment_views===1){
                            ajax_submit_views();
                            increment_views=2;
                        }
                    }

                    if(String(o.settings_extrahtml).indexOf('{{get_rates}}')>-1){
                        index_extrahtml_toloads++;
                        ajax_get_rates();
                    }

                    if(index_extrahtml_toloads==0){
                        //console.info('lel',cthis.find('.extra-html'))

                        cthis.find('.extra-html').addClass('active');
                        setTimeout(function(){

                            //console.info('lel',cthis.find('.extra-html'))
                            cthis.find('.extra-html').addClass('active');
                        },1000);
                    }

                }


            }
            function ajax_get_likes(argp){
                //only handles ajax call + result
                var mainarg = argp;
                var data = {
                    action: 'dzsap_get_likes',
                    postdata: mainarg,
                    playerid: the_player_id
                };




                if(o.settings_php_handler){


                    $.ajax({
                        type: "POST",
                        url: o.settings_php_handler,
                        data: data,
                        success: function(response) {
                            if(typeof window.console != "undefined" ){ console.log('Got this from the server: ' + response); }

                            var auxls = false;
                            if(response.indexOf('likesubmitted')>-1){
                                response = response.replace('likesubmitted', '');
                                auxls = true;
                            }


                            if(response==''){
                                response=0;
                            }


                            var auxhtml = cthis.find('.extra-html').eq(0).html();
                            auxhtml = auxhtml.replace('{{get_likes}}', response);
                            cthis.find('.extra-html').eq(0).html(auxhtml);
                            index_extrahtml_toloads--;
                            if(auxls){
                                cthis.find('.extra-html').find('.btn-like').addClass('active');
                            }



                            //console.log(index_extrahtml_toloads);
                            if(index_extrahtml_toloads==0){
                                cthis.find('.extra-html').addClass('active');
                            }

                        },
                        error:function(arg){
                            if(typeof window.console != "undefined" ){ console.log('Got this from the server: ' + arg, arg); };
                            index_extrahtml_toloads--;
                            if(index_extrahtml_toloads==0){
                                cthis.find('.extra-html').addClass('active');
                            }
                        }
                    });
                }

            }
            function ajax_get_rates(argp){
                //only handles ajax call + result
                var mainarg = argp;
                var data = {
                    action: 'dzsap_get_rate',
                    postdata: mainarg,
                    playerid: the_player_id
                };


                if(o.settings_php_handler) {

                    $.ajax({
                        type: "POST",
                        url: o.settings_php_handler,
                        data: data,
                        success: function (response) {
                            if (typeof window.console != "undefined") {
                                console.log('Got this from the server: ' + response);
                            }

                            var auxls = false;
                            if (response.indexOf('likesubmitted') > -1) {
                                response = response.replace('likesubmitted', '');
                                auxls = true;
                            }


                            if (response == '') {
                                response = '0|0';
                            }


                            var auxresponse = response.split('|');


                            starrating_nrrates = auxresponse[1];
                            cthis.find('.extra-html .counter-rates .the-number').eq(0).html(starrating_nrrates);
                            index_extrahtml_toloads--;


                            cthis.find('.star-rating-set-clip').width(auxresponse[0] * (parseInt(cthis.find('.star-rating-bg').width(), 10) / 5));


                            //===ratesubmitted
                            if (typeof(auxresponse[2]) != 'undefined') {
                                starrating_alreadyrated = auxresponse[2];


                                if (o.parentgallery && $(o.parentgallery).get(0) != undefined && $(o.parentgallery).get(0).api_player_rateSubmitted != undefined) {
                                    $(o.parentgallery).get(0).api_player_rateSubmitted();
                                }
                            }


                            if (index_extrahtml_toloads <= 0) {
                                cthis.find('.extra-html').addClass('active');
                            }

                        },
                        error: function (arg) {
                            if (typeof window.console != "undefined") {
                                console.log('Got this from the server: ' + arg, arg);
                            }
                            ;
                            index_extrahtml_toloads--;
                            if (index_extrahtml_toloads <= 0) {
                                cthis.find('.extra-html').addClass('active');
                            }
                        }
                    });
                }
            }
            function ajax_get_views(argp){
                //only handles ajax call + result
                var mainarg = argp;
                var data = {
                    action: 'dzsap_get_views',
                    postdata: mainarg,
                    playerid: the_player_id
                };




                if(o.settings_php_handler) {

                    $.ajax({
                        type: "POST",
                        url: o.settings_php_handler,
                        data: data,
                        success: function (response) {
                            if (typeof window.console != "undefined") {
                                console.log('Got this from the server: ' + response);
                            }

//                        console.info(response);


                            if (response.indexOf('viewsubmitted') > -1) {
                                response = response.replace('viewsubmitted', '');
                                ajax_view_submitted = 'on';
                                increment_views = 0;
                            }

                            if (response == '') {
                                response = 0;
                            }


                            if (String(response).indexOf('{{theip') > -1) {

                                var auxa = /{{theip-(.*?)}}/g.exec(response);
                                if (auxa[1]) {
                                    currIp = auxa[1];
                                }

                                response = response.replace(/{{theip-(.*?)}}/g, '');


                            }


                            //console.info('increment_views', increment_views);
                            if (increment_views == 1) {
                                ajax_submit_views();
                                //console.info('response iz '+response);
                                response = Number(response) + increment_views;
                                ;
                                //console.info(response);
                                increment_views = 2;
                            }

                            var auxhtml = cthis.find('.extra-html').eq(0).html();
                            auxhtml = auxhtml.replace('{{get_plays}}', response);
                            cthis.find('.extra-html').eq(0).html(auxhtml);
                            index_extrahtml_toloads--;


                            if (index_extrahtml_toloads == 0) {
                                cthis.find('.extra-html').addClass('active');
                            }

                        },
                        error: function (arg) {
                            if (typeof window.console != "undefined") {
                                console.log('Got this from the server: ' + arg, arg);
                            }
                            ;
                            index_extrahtml_toloads--;
                            if (index_extrahtml_toloads == 0) {
                                cthis.find('.extra-html').addClass('active');
                            }
                        }
                    });
                }
            }


            function ajax_submit_rating(argp){
                //only handles ajax call + result
                var mainarg = argp;
                var data = {
                    action: 'dzsap_submit_rate',
                    postdata: mainarg,
                    playerid: the_player_id
                };

                if(starrating_alreadyrated>-1){
                    return;
                }



                if(o.settings_php_handler) {
                    $.ajax({
                        type: "POST",
                        url: o.settings_php_handler,
                        data: data,
                        success: function (response) {
                            if (typeof window.console != "undefined") {
                                console.log('Got this from the server: ' + response);
                            }
                            ;


                            var aux = cthis.find('.star-rating-set-clip').outerWidth() / cthis.find('.star-rating-bg').outerWidth();
                            var nrrates = parseInt(cthis.find('.counter-rates .the-number').html(), 10);

                            nrrates++;

                            var aux2 = ( (nrrates - 1) * (aux * 5) + starrating_index) / (nrrates)

//                        console.info(aux, aux2, nrrates);
                            cthis.find('.star-rating-set-clip').width(aux2 * (parseInt(cthis.find('.star-rating-bg').width(), 10) / 5));
                            cthis.find('.counter-rates .the-number').html(nrrates);

                            if (o.parentgallery  && $(o.parentgallery).get(0) != undefined && $(o.parentgallery).get(0).api_player_rateSubmitted != undefined) {
                                $(o.parentgallery).get(0).api_player_rateSubmitted();
                            }

                        },
                        error: function (arg) {
                            if (typeof window.console != "undefined") {
                                console.log('Got this from the server: ' + arg, arg);
                            }
                            ;


                            var aux = cthis.find('.star-rating-set-clip').outerWidth() / cthis.find('.star-rating-bg').outerWidth();
                            var nrrates = parseInt(cthis.find('.counter-rates .the-number').html(), 10);

                            nrrates++;

                            var aux2 = ( (nrrates - 1) * (aux * 5) + starrating_index) / (nrrates)

//                        console.info(aux, aux2, nrrates);
                            cthis.find('.star-rating-set-clip').width(aux2 * (parseInt(cthis.find('.star-rating-bg').width(), 10) / 5));
                            cthis.find('.counter-rates .the-number').html(nrrates);

                            if (o.parentgallery && $(o.parentgallery).get(0) != undefined && $(o.parentgallery).get(0).api_player_rateSubmitted != undefined) {
                                $(o.parentgallery).get(0).api_player_rateSubmitted();
                            }

                        }
                    });
                }
            };


            function ajax_submit_download(argp){
                //only handles ajax call + result
                var mainarg = argp;
                var data = {
                    action: 'dzsap_submit_download',
                    postdata: mainarg,
                    playerid: the_player_id
                };

                if(starrating_alreadyrated>-1){
                    return;
                }

                if(o.settings_php_handler) {

                    $.ajax({
                        type: "POST",
                        url: o.settings_php_handler,
                        data: data,
                        success: function (response) {
                            if (typeof window.console != "undefined") {
                                console.log('Got this from the server: ' + response);
                            }
                            ;


                        },
                        error: function (arg) {
                            if (typeof window.console != "undefined") {
                                console.log('Got this from the server: ' + arg, arg);
                            }
                            ;


                        }
                    });
                }
            };


            function ajax_submit_views(argp){

                //console.info('ajax_submit_views()',argp);

                var data = {
                    action: 'dzsap_submit_views',
                    postdata: 1,
                    playerid: the_player_id,
                    currip : currIp
                };


//                console.info(ajax_view_submitted);


                if(o.settings_php_handler) {
                    $.ajax({
                        type: "POST",
                        url: o.settings_php_handler,
                        data: data,
                        success: function (response) {
                            if (typeof window.console != "undefined") {
                                console.log('Got this from the server: ' + response);
                            }

                            var auxnr = cthis.find('.counter-hits .the-number').html();
                            auxnr = parseInt(auxnr, 10);
                            if (increment_views != 2) {
                                auxnr++;
                            }

                            cthis.find('.counter-hits .the-number').html(auxnr);

                            ajax_view_submitted = 'on';
                        },
                        error: function (arg) {
                            if (typeof window.console != "undefined") {
                                console.log('Got this from the server: ' + arg, arg);
                            }
                            ;


                            var auxlikes = cthis.find('.counter-hits .the-number').html();
                            auxlikes = parseInt(auxlikes, 10);
                            auxlikes++;
                            cthis.find('.counter-hits .the-number').html(auxlikes);

                            ajax_view_submitted = 'on';
                        }
                    });
                }
            }

            function ajax_submit_like(argp){
                //only handles ajax call + result
                var mainarg = argp;
                var data = {
                    action: 'dzsap_submit_like',
                    postdata: mainarg,
                    playerid: the_player_id
                };


                if(o.settings_php_handler) {

                    $.ajax({
                        type: "POST",
                        url: o.settings_php_handler,
                        data: data,
                        success: function (response) {
                            if (typeof window.console != "undefined") {
                                console.log('Got this from the server: ' + response);
                            }

                            cthis.find('.btn-like').addClass('active');
                            var auxlikes = cthis.find('.counter-likes .the-number').html();
                            auxlikes = parseInt(auxlikes, 10);
                            auxlikes++;
                            cthis.find('.counter-likes .the-number').html(auxlikes);
                        },
                        error: function (arg) {
                            if (typeof window.console != "undefined") {
                                console.log('Got this from the server: ' + arg, arg);
                            }
                            ;


                            cthis.find('.btn-like').addClass('active');
                            var auxlikes = cthis.find('.counter-likes .the-number').html();
                            auxlikes = parseInt(auxlikes, 10);
                            auxlikes++;
                            cthis.find('.counter-likes .the-number').html(auxlikes);
                        }
                    });
                }
            }
            function ajax_retract_like(argp){
                //only handles ajax call + result
                var mainarg = argp;
                var data = {
                    action: 'dzsap_retract_like',
                    postdata: mainarg,
                    playerid: the_player_id
                };



                if(o.settings_php_handler) {
                    $.ajax({
                        type: "POST",
                        url: o.settings_php_handler,
                        data: data,
                        success: function (response) {
                            if (typeof window.console != "undefined") {
                                console.log('Got this from the server: ' + response);
                            }

                            cthis.find('.btn-like').removeClass('active');
                            var auxlikes = cthis.find('.counter-likes .the-number').html();
                            auxlikes = parseInt(auxlikes, 10);
                            auxlikes--;
                            cthis.find('.counter-likes .the-number').html(auxlikes);
                        },
                        error: function (arg) {
                            if (typeof window.console != "undefined") {
                                console.log('Got this from the server: ' + arg, arg);
                            }
                            ;

                            cthis.find('.btn-like').removeClass('active');
                            var auxlikes = cthis.find('.counter-likes .the-number').html();
                            auxlikes = parseInt(auxlikes, 10);
                            auxlikes--;
                            cthis.find('.counter-likes .the-number').html(auxlikes);
                        }
                    });
                }
            }
            function skinwave_comment_publish(argp){
                // -- only handles ajax call + result
                var mainarg = argp;
                var data = {
                    action: 'dzsap_front_submitcomment',
                    postdata: mainarg,
                    playerid: the_player_id
                    ,comm_position: sposarg
                    ,skinwave_comments_process_in_php: o.skinwave_comments_process_in_php
                    ,skinwave_comments_avatar: o.skinwave_comments_avatar
                    ,skinwave_comments_account: o.skinwave_comments_account
                };

                if(cthis.find('*[name=comment-email]').length>0){

                    data.email = cthis.find('*[name=comment-email]').eq(0).val();
                }



                if(o.settings_php_handler) {
                    $.ajax({
                        type: "POST",
                        url: o.settings_php_handler,
                        data: data,
                        success: function (response) {
                            if (response.charAt(response.length - 1) == '0') {
                                response = response.slice(0, response.length - 1);
                            }
                            if (typeof window.console != "undefined") {
                                console.log('Got this from the server: ' + response);
                            }

                            //console.info(data.postdata);


                            var aux = '';
                            if (o.skinwave_comments_process_in_php != 'on') {

                                // -- process the comment now, in javascript
                                aux = (data.postdata);

                            } else {

                                // -- process php
                                aux = '';


                                aux += '<span class="dzstooltip-con" style="left:' + sposarg + '"><span class="dzstooltip arrow-from-start transition-slidein arrow-bottom skin-black" style="width: 250px;"><span class="the-comment-author">@' + o.skinwave_comments_account + '</span> says:<br>';
                                aux += htmlEncode(data.postdata);


                                aux += '</span><div class="the-avatar" style="background-image: url(' + o.skinwave_comments_avatar + ')"></div></span>';


                            }
                            _commentsHolder.append(aux);


                            if(action_audio_comment){
                                action_audio_comment(cthis, aux);
                            }


                            //jQuery('#save-ajax-loading').css('visibility', 'hidden');
                        },
                        error: function (arg) {
                            if (typeof window.console != "undefined") {
                                console.log('Got this from the server: ' + arg, arg);
                            }
                            ;
                            _commentsHolder.append(data.postdata);
                        }
                    });
                }
            }
            function setup_media(pargs){
                // -- order = init, setup_media, init_loaded


//                return;


                var margs = {

                    'do_not_autoplay' : false
                };


                if(pargs){
                    margs = $.extend(margs,pargs);
                }
                //console.info('--- setup_media()', o.cue,ajax_view_submitted, margs, loaded, cthis);

                if(o.cue=='off'){
                    //console.info(ajax_view_submitted);
                    if(ajax_view_submitted=='auto'){


                        // -- why is view submitted ?
                        increment_views = 1;

                        if(String(o.settings_extrahtml).indexOf('{{get_plays}}')>-1){
                            ajax_view_submitted = 'on'
                        }else{
                            ajax_view_submitted = 'off';
                        };
                    }
                }






                //console.info(type, o.type, loaded);

                if(loaded==true){
                    return;
                }




                if(type=='youtube'){
                    if(is_ie()){
                        _theMedia.css({
                            'left' : '-478em'
                        })
                    }
                    return;
                }


                var aux = '';


                aux+= '<audio>';
                if(cthis.attr('data-source')!=undefined){
                    data_source = cthis.attr('data-source');
                    aux+='<source src="'+data_source+'" type="audio/mpeg">';
                    if(cthis.attr('data-sourceogg')!=undefined){
                        aux+='<source src="'+cthis.attr('data-sourceogg')+'" type="audio/ogg">';
                    }
                }
                aux+= '</audio>';

                //alert(is_ie8());
                if(is_ie8() && dzsap_list && dzsap_list.length>0){

                    str_ie8 = '&isie8=on';
                }

                //<embed src="'+ o.swf_location+'" width="100" height="100" allowScriptAccess="always">
                //console.log(aux, _theMedia);

                str_audio_element = aux;
                _theMedia.append(aux);

                //return;
                //_theMedia.children('audio').get(0).autoplay = false;
                _cmedia = (_theMedia.children('audio').get(0));

                if(_cmedia && _cmedia.addEventListener){
                    _cmedia.addEventListener('error', function(e) {
                        var noSourcesLoaded = (this.networkState===HTMLMediaElement.NETWORK_NO_SOURCE);
                        if(noSourcesLoaded) console.log("could not load audio source");

                        cthis.addClass('errored-out');
                        cthis.append('<div class="feedback-text">error - file does not exist.. </div>');
                    }, true);
                }

                if(is_flashplayer && o.settings_backup_type=='light'){
                    setTimeout(function(){
                        _cmedia = (_theMedia.find('object').eq(0).get(0));
                    }, 500)
                }


                //console.info(cthis,type);
                if(type!='fake'){

                    //return false;
                }

                //alert(_cmedia);



                //console.info("TRY TO CHECK READY", cthis);
                if(is_ios() || is_ie8() || is_flashplayer==true){
                    if(o.settings_backup_type=='full'){
                        init_loaded(margs);
                    }else{
                        setTimeout(function(){
                            init_loaded(margs);
                        },1000);
                    }

                }else{

                    // -- check_ready() will fire init_loaded()
                    inter_checkReady = setInterval(function(){
                        check_ready(margs);
                    },50);
                    //= setInterval(check_ready, 50);
                }

                if(o.failsafe_repair_media_element){
                    setTimeout(function(){

                        if(_theMedia.children().eq(0).get(0) && _theMedia.children().eq(0).get(0).nodeName == "AUDIO"){
                            //console.info('ceva');
                            return false;
                        }
                        _theMedia.html('');
                        _theMedia.append(str_audio_element);

                        var aux_wasplaying = playing;

                        pause_media();
                        //return;
                        //_theMedia.children('audio').get(0).autoplay = false;
                        _cmedia = (_theMedia.children('audio').get(0));
                        if(is_flashplayer && o.settings_backup_type=='light'){
                            setTimeout(function(){

                                _cmedia = (_theMedia.find('object').eq(0).get(0));

                            }, 10)
                        }


                        if(aux_wasplaying){
                            aux_wasplaying=false;
                            setTimeout(function(){

                                play_media();
                            },20);
                        }
                    }, o.failsafe_repair_media_element);

                    o.failsafe_repair_media_element='';

                }


                cthis.addClass('media-setuped');

            }

            function destroy_media(){
                //console.info("destroy_media()", cthis)
                pause_media();



                if(_cmedia){

                    //console.log(_cmedia, _cmedia.src);
                    if(_cmedia.children){

                        //_cmedia.children().remove();
                    }

                    //console.log(_cmedia.innerHTML);
                    if(o.type=='audio'){
                        _cmedia.innerHTML='';
                        _cmedia.load();
                    }
                    //console.log(_cmedia.innerHTML);

                    //_cmedia.remove();
                }
                if(_theMedia){

                    _theMedia.children().remove();
                    loaded = false;
                }
            }
            function setup_listeners(){


                //console.info('setup_listeners()');


                _scrubbar.bind('mousemove', mouse_scrubbar);
                _scrubbar.bind('mouseleave', mouse_scrubbar);
                _scrubbar.bind('click', mouse_scrubbar);


                _controlsVolume.find('.volumeicon').bind('click', click_mute);

                if(o.design_skin=='skin-redlights'){
                    _controlsVolume.bind('mousemove',mouse_volumebar);
                    _controlsVolume.bind('mousedown',mouse_volumebar);


                    $(document).off(window, 'mouseup', mouse_volumebar);
                    $(document).delegate(window, 'mouseup', mouse_volumebar);
                }else{

                    _controlsVolume.find('.volume_active').bind('click', mouse_volumebar);
                    _controlsVolume.find('.volume_static').bind('click', mouse_volumebar);
                }

                _conPlayPause.bind('click', click_playpause);

                var scrubbar_moving = false;
                var scrubbar_moving_x =0 ;

                var aux3 = 0;

                _scrubbar.bind('touchstart', function(e){
                    scrubbar_moving = true;
                })
                $(document).bind('touchmove', function(e){
                    if(scrubbar_moving){
                        scrubbar_moving_x = e.originalEvent.touches[0].pageX;


                        aux3 = scrubbar_moving_x - _scrubbar.offset().left;

                        if(aux3<0){ aux3 = 0; }
                        if(aux3>_scrubbar.width()){ aux3 = _scrubbar.width(); }

                        seek_to_perc(aux3/_scrubbar.width());


                        //console.info(aux3);


                    }
                })

                $(document).bind('touchend', function(e){
                    scrubbar_moving = false;
                })

                $(document).delegate('.btn-like','click', click_like);


                $(document).delegate('.star-rating-con', 'mousemove', mouse_starrating);
                $(document).delegate('.star-rating-con', 'mouseleave', mouse_starrating);
                $(document).delegate('.star-rating-con', 'click', mouse_starrating);


//                console.log('setup_listeners()');

                setTimeout(handleResize,1000);
                setTimeout(handleResize,2000);

                if(o.settings_trigger_resize > 0){
                    inter_trigger_resize = setInterval(handleResize, o.settings_trigger_resize);
                }






                return false;

//                console.info('ceva');
            }

            function click_like(){
                var _t = $(this);
                if(cthis.has(_t).length==0){
                    return;
                }
                if(_t.hasClass('active')){
                    ajax_retract_like();
                }else{
                    ajax_submit_like();
                }
            }

            function init_loaded(pargs){

                //console.info('init_loaded()', pargs, cthis, cthis.hasClass('loaded'));


                var margs = {

                    'do_not_autoplay' : false
                };


                if(pargs){
                    margs = $.extend(margs,pargs);
                }

                if(cthis.hasClass('dzsap-loaded')){
                    return;
                }


                if(is_flashplayer==false){
                    totalDuration = _cmedia.duration;
                }else{
                    if(o.settings_backup_type=='light'){

                        if(typeof(_cmedia)!="undefined" && _cmedia.fn_getSoundDuration){
                            eval("totalDuration = parseFloat(_cmedia.fn_getsoundduration"+cthisId+"())");
                        }
                    }
                }
                if(typeof(_cmedia)!="undefined"){
                    if(_cmedia.nodeName=='AUDIO'){
                        //console.info(_cmedia);
                        _cmedia.addEventListener('ended', handle_end);
                    }else{

                    }
                }


                //console.info("CLEAR THE TIMEOUT HERE")
                clearInterval(inter_checkReady);
                clearTimeout(inter_checkReady);
                setup_listeners();
                //console.info('setuped_listeners', cthis.hasClass('dzsap-loaded'), cthis)

                if(is_ie8()){
                    cthis.addClass('lte-ie8')
                }

                setTimeout(function(){

                    //console.log(_currTime, )
                    if(_currTime && _currTime.outerWidth()>0){
                        currTime_outerWidth = _currTime.outerWidth();
                    }
                },1000);





                //===ie7 and ie8 does not have the indexOf property so let us add it
                if(is_ie8()){
                    if (!Array.prototype.indexOf)
                    {
                        Array.prototype.indexOf = function(elt)
                        {
                            var len = this.length >>> 0;

                            var from = Number(arguments[1]) || 0;
                            from = (from < 0)
                                ? Math.ceil(from)
                                : Math.floor(from);
                            if (from < 0)
                                from += len;

                            for (; from < len; from++)
                            {
                                if (from in this &&
                                    this[from] === elt)
                                    return from;
                            }
                            return -1;
                        };
                    }
                }

                //console.info('type - ',type);
                if(type!='fake'){
                    if(o.settings_exclude_from_list!='on' && dzsap_list && dzsap_list.indexOf(cthis)==-1){
                        dzsap_list.push(cthis);
                    }



                    if(o.type_audio_stop_buffer_on_unfocus=='on'){


                        cthis.data('type_audio_stop_buffer_on_unfocus', 'on');

                        cthis.get(0).api_destroy_for_rebuffer = function(){

                            if(o.type=='audio'){
                                playfrom = _cmedia.currentTime;
                            }
                            //console.log(playfrom);
                            destroy_media();

                            destroyed_for_rebuffer = true;
                        }

                    }
                }

                //console.info("CHECK TIME",cthis);


                if(o.design_skin=='skin-wave'){

                }

                //console.info(ajax_view_submitted);

                if(ajax_view_submitted=='auto'){
                    setTimeout(function(){
                        if(ajax_view_submitted=='auto'){
                            ajax_view_submitted = 'off';
                        }
                    }, 1000);
                }

                //console.info('---- ADDED LOADED BUT FROM WHERE', cthis);
                loaded=true;
                cthis.addClass('dzsap-loaded');

//                console.info(playfrom);

                if(isNaN(Number(o.default_volume))==false){
                    o.default_volume = Number(o.default_volume);
                    defaultVolume = o.default_volume;
                }else{
                    if(o.default_volume=='last'){


                        if (localStorage != null && the_player_id) {

                            //console.info(the_player_id);


                            if(localStorage.getItem('dzsap_last_volume_'+the_player_id)){

                                defaultVolume = localStorage.getItem('dzsap_last_volume_'+the_player_id);
                            }else{

                                defaultVolume = 1;
                            }
                        }else{

                            defaultVolume = 1;
                        }
                    }
                }


                set_volume(defaultVolume);

                if(isInt(playfrom)){
                    seek_to(playfrom);
                }
                if(playfrom=='last'){
                    if(typeof Storage!='undefined'){
                        setTimeout(function(){
                            playfrom_ready = true;
                        })


                        if(typeof localStorage['dzsap_'+the_player_id+'_lastpos']!='undefined'){
                            seek_to(localStorage['dzsap_'+the_player_id+'_lastpos']);
                        }
                    }
                }

//                console.info(cthis, o.autoplay);

                //console.info(margs);
                if(margs.do_not_autoplay!=true){

                    if(is_ie8()==false && o.autoplay=='on'){
                        play_media();
                    };
                }



                check_time();

                setTimeout(function(){
                    //console.info(cthis.find('.wave-download'));
                    cthis.find('.wave-download').bind('click',handle_mouse);
                },500);


            }


            function isInt(n) {
                return typeof n == 'number' && Math.round(n) % 1 == 0;
            }
            function isValid(n) {
                return typeof n != 'undefined' && n!='';
            }

            function handle_mouse(e){
                var _t = $(this);
                if(e.type=='click'){
                    if(_t.hasClass('wave-download')){
                        ajax_submit_download();
                    }
                }
            }

            function mouse_starrating(e){
                var _t = $(this);


                if(cthis.has(_t).length==0){
                    return;
                }

                if(e.type=='mouseout' || e.type=='mouseleave'){
                    cthis.find('.star-rating-prog-clip').css({
                        'width': 0
                    })


                    cthis.find('.star-rating-set-clip').css({
                        'opacity': 1
                    })


                }
                if(e.type=='mousemove'){
                    //console.log(_t);
                    var mx = e.pageX - _t.offset().left;
                    var my = e.pageX - _t.offset().left;

                    //console.info(Math.round(mx/ (_t.outerWidth()/5)) );


                    if(starrating_alreadyrated>-1){
                        starrating_index = starrating_alreadyrated;
                    }else{
                        starrating_index = mx/ (_t.outerWidth()/5);
                    }



                    if(starrating_index> 4){
                        starrating_index = 5;
                    }else{
                        starrating_index = Math.round(starrating_index);
                    }

//                    console.info(starrating_index, cthis.find('.star-rating-prog-clip'));
                    cthis.find('.star-rating-prog-clip').css({
                        'width': _t.outerWidth()/5 * starrating_index
                    })



                    cthis.find('.star-rating-set-clip').css({
                        'opacity': 0
                    })
                }
                if(e.type=='click'){


                    if(starrating_alreadyrated>-1){
                        return;
                    }

                    ajax_submit_rating(starrating_index);
                }


            }



            function onError(){

            }


            ;




            // log if an error occurs
            function onError(e) {
                console.log(e);
            }

            function click_prev_btn(){

                if(o.parentgallery && typeof(o.parentgallery.get(0))!="undefined"){
                    o.parentgallery.get(0).api_goto_prev();
                }
            }
            function click_next_btn(){
                if(o.parentgallery && typeof(o.parentgallery.get(0))!="undefined"){
                    o.parentgallery.get(0).api_goto_next();
                }
            }
            function check_time(){


                if(cthis.attr('id')=='131'){

                    //console.log(cthis,'check');
                }
                if(destroyed ) { return false; }

                if(debug_var){
                    //console.info('check_time()' , cthis);
                    debug_var=false;
                }


                if(sw_suspend_enter_frame){
                    return false;
                }


                if(type=='youtube'){
                    if(_cmedia && _cmedia.getDuration){
                        real_time_total = _cmedia.getDuration();
                        real_time_curr = _cmedia.getCurrentTime();
                    }



                    if(playfrom=='last' && playfrom_ready){
                        if(typeof Storage!='undefined'){
                            localStorage['dzsap_'+the_player_id+'_lastpos'] = time_curr;
                        }
                    }
                }
                if(type=='audio'){
                    if(is_flashplayer==true){
                        if(o.settings_backup_type=='light'){
                            if(str_ie8=='' && typeof(_cmedia)!="undefined"){

                                eval("if(typeof _cmedia.fn_getsoundduration"+cthisId+" != 'undefined'){time_total = parseFloat(_cmedia.fn_getsoundduration"+cthisId+"())};");
                                eval("if(typeof _cmedia.fn_getsoundcurrtime"+cthisId+" != 'undefined'){time_curr = parseFloat(_cmedia.fn_getsoundcurrtime"+cthisId+"())};");
                            }
                        }


                        //console.log(_cmedia.fn_getSoundCurrTime());
                    }else{
                        if(o.type!='shoutcast'){
                            if(_cmedia){
                                real_time_total = _cmedia.duration;
                                if(inter_audiobuffer_workaround_id==0){

                                    real_time_curr = _cmedia.currentTime;
                                }
                            }

//                            console.info(time_curr, time_total, inter_audiobuffer_workaround_id);
//                            console.info(audioBuffer, audioCtx, webaudiosource);
                            if(audioBuffer && audioBuffer!='placeholder'){
//                                console.info(time_curr);
//                                time_total = audioBuffer.duration;
//                                time_curr = audioCtx.currentTime;
//                                console.log(audioBuffer, audioBuffer.currentTime, audioBuffer.duration);

                            }

                            if(audioCtx && is_firefox()){
//                                time_curr = audioCtx.currentTime;
                            }

                            if(playfrom=='last' && playfrom_ready){
                                if(typeof Storage!='undefined'){
                                    localStorage['dzsap_'+the_player_id+'_lastpos'] = time_curr;
//                                    console.info(localStorage['dzsap_'+the_player_id+'_lastpos']);
                                }
                            }

                            if(o.design_skin=='skin-wave'){

                            }
                        }

                    }
                }

                //if(cthis.hasClass("skin-minimal")){ console.log(time_curr, time_total) };

//                console.info(time_curr, time_total, sw);

                //console.info(time_curr,type);
                if(type=='fake'){
                    //console.info(time_curr);
                    real_time_curr = time_curr;
                    real_time_total = time_total;
                }

                time_curr = real_time_curr;
                time_total = real_time_total;

                if(sample_time_start>0){
                    time_curr = sample_time_start + real_time_curr;
                }
                if(sample_time_total>0){
                    time_total = sample_time_total;
                }

                if(cthis.hasClass('is-playing')){

                    //console.info(sw);
                }
                //--- incase of new skin - watch sw it will be 0
                spos = (time_curr / time_total) * sw;
                if(isNaN(spos)){
                    spos = 0;
                }
                if(spos>sw){
                    spos = sw;
                }

                //console.info(time_curr, time_total, sw);

                //console.log(_scrubbar, _scrubbar.children('.scrub-prog'), spos, time_total, '-timecurr ', time_curr, sw);


//                console.info(audioBuffer);


                if(audioBuffer==null){
                    //console.info(spos, _scrubbar.width());
                    _scrubbar.children('.scrub-prog').css({
                        'width' : spos
                    })
                    if(o.skinwave_enableReflect=='on'){
                        _scrubbar.children('.scrub-prog-reflect').css({
                            'width' : spos
                        })
                    }
                }

                if(debug_var){

                    //console.info(cthis, _feed_fakePlayer, time_curr/time_total);
                    //debug_var = false;
                }


                //console.log(cthis, _feed_fakePlayer);

                if(_feed_fakePlayer){
                    //console.log(cthis, _feed_fakePlayer);
                    _feed_fakePlayer.get(0).api_seek_to_onlyvisual(time_curr/time_total);
                }

                if(o.design_skin=='skin-pro'){
//                    console.info(spos,sw,spos/sw,Math.easeOutQuart(spos/sw, 0, sw,1));

                    var spos_eased = parseInt(Math.easeOutQuad(spos/sw, 0, sw,1), 10);

                    _scrubbar.children('.scrub-prog').css({
                        'width' : spos_eased
                    })
                }






//                console.info(o.design_skin);
                if(o.design_skin=='skin-wave'){



                }
                if(_currTime){
                    //console.info(_currTime, time_curr, formatTime(time_curr))
                    //console.info("CEVA");
                    _currTime.html(formatTime(time_curr));
                    _totalTime.html(formatTime(time_total));
                }

//                console.log(time_curr, time_total);
                if(time_total>0 && time_curr >= time_total - 0.07){
                    handle_end();
                }




                if(is_flashplayer==true || type=='youtube'){
                    inter_check = setTimeout(check_time, 500);
                }else{
                    requestAnimFrame(check_time);
                }

            }
            function click_playpause(e){
                //console.log('click_playpause');
                var _t = $(this);
                //console.log(_t);


                if(o.design_skin == 'skin-minimal'){

                    var center_x = _t.offset().left + 50;
                    var center_y = _t.offset().top + 50;
                    var mouse_x = e.pageX;
                    var mouse_y = e.pageY;
                    var pzero_x = center_x + 50;
                    var pzero_y = center_y;

                    //var angle = Math.acos(mouse_x - center_x);

                    //console.log(pzero_x, pzero_y, mouse_x, mouse_y, center_x, center_y, mouse_x - center_x, angle);

                    //A = center, B = mousex, C=pointzero

                    var AB = Math.sqrt(Math.pow((mouse_x - center_x),2) + Math.pow((mouse_y - center_y),2));
                    var AC = Math.sqrt(Math.pow((pzero_x - center_x),2) + Math.pow((pzero_y - center_y),2));
                    var BC = Math.sqrt(Math.pow((pzero_x - mouse_x),2) + Math.pow((pzero_y - mouse_y),2));


                    var angle = Math.acos((AB + AC + BC)/(2*AC*AB));
                    var angle2 = Math.acos((mouse_x - center_x)/50);

                    //console.info(AB, AC, BC, angle, (mouse_x - center_x), angle2, Math.PI);

                    var perc = -(mouse_x - center_x - 50) * 0.005;//angle2 / Math.PI / 2;


                    if(mouse_y < center_y){
                        perc = 0.5 + (0.5 - perc)
                    }

                    if( !(is_flashplayer==true && is_firefox()) && AB > 20){
                        seek_to_perc(perc);
                        return;
                    }
                }



                //unghi = acos (x - centruX) = asin(centruY - y)


                if(playing==false){
                    play_media();
                }else{
                    pause_media();
                }

            }
            function handle_end(){
                //console.log('end');
                seek_to(0);


                if(o.loop=='on'){
                    play_media();
                    return false;
                }else{
                    pause_media();
                }

                if(o.parentgallery && typeof(o.parentgallery)!='undefined'){
                    //console.log(o.parentgallery);
                    o.parentgallery.get(0).api_handle_end();
                }





                if(action_audio_end){
                    action_audio_end(cthis);
                }
            }

            Math.easeOutQuart = function (t, b, c, d) {
                t /= d;
                t--;
                return -c * (t*t*t*t - 1) + b;
            };
            Math.easeOutQuad = function (t, b, c, d) {
                t /= d;
                return -c * t*(t-2) + b;
            };


            function handleResize() {

                if(destroyed){
                    return;
                }
                ww = $(window).width();
                tw = cthis.width();
                th = cthis.height();

                //console.info('handleResize', _commentsHolder)

                if(tw<=720){
                    cthis.addClass('under-720');
                }else{

                    cthis.removeClass('under-720');
                }


                sw = tw;
                if(o.design_skin=='skin-default'){
                    sw = tw;
                }
                if(o.design_skin=='skin-pro'){
                    sw = tw;
                }
                if(o.design_skin=='skin-silver'){
                    sw = tw;

                    sw = _scrubbar.width();
                    //console.info(sw);




                    if(o.scrubbar_tweak_overflow_hidden=='on'){
                        sw = tw - _apControlsLeft.width() - _apControlsRight.outerWidth()-15;
                        _scrubbar.css({
                            'left' : _apControlsLeft.width()
                            ,'width' : sw
                        })
                    }

                }

                if(o.design_skin=='skin-justthumbandbutton'){
                    tw = cthis.children('.audioplayer-inner').outerWidth();
                    sw = tw;
                }
                if(o.design_skin=='skin-redlights' || o.design_skin=='skin-steel') {
                    sw = _scrubbar.width();
                }


                //console.info(sw);




                if(o.design_skin=='skin-wave'){
                    sw = _scrubbar.outerWidth(false);
                    //console.info(sw);




                }

                //console.info(o.design_skin, tw, sw);


                if(res_thumbh==true){

//                    console.info(cthis.get(0).style.height);


                    if(o.design_skin=='skin-default'){


                        if(cthis.get(0)!=undefined){
                            // if the height is auto then
                            if(cthis.get(0).style.height=='auto'){
                                cthis.height(200);
                            }
                        }

                        var cthis_height = _audioplayerInner.height();
                        if(typeof cthis.attr('data-initheight') == 'undefined' && cthis.attr('data-initheight')!=''){
                            cthis.attr('data-initheight', _audioplayerInner.height());
                        }else{
                            cthis_height = Number(cthis.attr('data-initheight'));
                        }

                        console.info('cthis_height - ',cthis_height, cthis.attr('data-initheight'));

                        if(o.design_thumbh=='default'){

                            design_thumbh = cthis_height - 44;
                        }

                    }

                    _audioplayerInner.find('.the-thumb').eq(0).css({
                        'height': design_thumbh
                    })
                }


                //===display none + overflow hidden hack does not work .. yeah
                //console.log(cthis, _scrubbar.children('.scrub-bg').width());

                if(cthis.css('display')!='none'){
                    _scrubbar.find('.scrub-bg-img').eq(0).css({
                        'width' : _scrubbar.children('.scrub-bg').width()
                    });
                    _scrubbar.find('.scrub-prog-img').eq(0).css({
                        'width' : _scrubbar.children('.scrub-bg').width()
                    });

                    _scrubbar.find('.scrub-prog-img-reflect').eq(0).css({
                        'width' : _scrubbar.children('.scrub-bg').width()
                    });

                }



                cthis.removeClass('under-240 under-400');
                if(tw<=240){
                    cthis.addClass('under-240');
                }
                if(tw<=400){
                    cthis.addClass('under-400');
                    if(_controlsVolume){
                        if(o.disable_volume=='on'){
                            _controlsVolume.hide();
                        }else{
                            _controlsVolume.hide();
                        }
                    }

                }else{

                    if(o.disable_volume=='on'){
                        _controlsVolume.hide();
                    }else{
                        _controlsVolume.show();
                    }
                }





                //console.info(_conPlayPause.outerWidth(), o.design_skin);

                var aux2 = 50;




                if(o.embedded=='on'){
                    //console.info(window.frameElement)
                    if(window.frameElement){
                        //window.frameElement.height = cthis.height();
                        //console.info(window.frameElement.height, cthis.outerHeight())


                        var args = {
                            height: cthis.outerHeight()
                        };


                        if(o.embedded_iframe_id){

                            args.embedded_iframe_id = o.embedded_iframe_id;
                        }


                        var message = {name: "resizeIframe", params: args};
                        window.parent.postMessage(message, '*');
                    }

                }

            }
            function mouse_volumebar(e){
                var _t = $(this);

                //var mx = e.clientX - _controlsVolume.offset().left;

                if(destroyed){
                    return false;
                }
                if(e.type=='mousemove'){

                    //console.info(volume_dragging, mx);


                    if(volume_dragging){
                        aux = (e.pageX - (_controlsVolume.find('.volume_static').eq(0).offset().left)) / (_controlsVolume.find('.volume_static').eq(0).width());

                        if(_t.parent().hasClass('volume-holder')){


                            aux = 1-( (e.pageY - (_controlsVolume.find('.volume_static').eq(0).offset().top)) / (_controlsVolume.find('.volume_static').eq(0).height()) );

                        }

                        if(o.design_skin == 'skin-redlights'){
                            aux*=10;

                            aux=Math.round(aux);

                            //console.info(aux);
                            aux/=10;
                        }


                        set_volume(aux);
                        muted=false;
                    }

                }
                if(e.type=='mouseleave'){

                }
                if(e.type=='click'){

                    //console.log(_t, _t.offset().left)

                    aux = (e.pageX - (_controlsVolume.find('.volume_static').eq(0).offset().left)) / (_controlsVolume.find('.volume_static').eq(0).width());

                    if(_t.parent().hasClass('volume-holder')){


                        aux = 1-( (e.pageY - (_controlsVolume.find('.volume_static').eq(0).offset().top)) / (_controlsVolume.find('.volume_static').eq(0).height()) );

                    }

                    //console.info(aux);

                    set_volume(aux);
                    muted=false;
                }

                if(e.type=='mousedown'){

                    volume_dragging= true;
                    cthis.addClass('volume-dragging');




                    aux = (e.pageX - (_controlsVolume.find('.volume_static').eq(0).offset().left)) / (_controlsVolume.find('.volume_static').eq(0).width());

                    if(_t.parent().hasClass('volume-holder')){


                        aux = 1-( (e.pageY - (_controlsVolume.find('.volume_static').eq(0).offset().top)) / (_controlsVolume.find('.volume_static').eq(0).height()) );

                    }

                    //console.info(aux);

                    set_volume(aux);
                    muted=false;
                }
                if(e.type=='mouseup'){

                    volume_dragging = false;

                    if(cthis){

                        cthis.removeClass('volume-dragging');
                    }

                }

            }
            function mouse_scrubbar(e){
                var mousex = e.pageX;


                if($(e.target).hasClass('sample-block-start') || $(e.target).hasClass('sample-block-end')){
                    return false;
                }

                if(e.type=='mousemove'){
                    _scrubbar.children('.scrubBox-hover').css({
                        'left' : (mousex - _scrubbar.offset().left)
                    })
                }
                if(e.type=='mouseleave'){

                }
                if(e.type=='click'){


                    if(audioBuffer){
                        time_total = audioBuffer.duration;
                    }


                    var aux = ((e.pageX - (_scrubbar.offset().left)) / (sw) * time_total);
                    if(is_flashplayer==true){
                        aux = (e.pageX - (_scrubbar.offset().left)) / (sw);
                    }
                    //console.info(e.target,e.pageX, (_scrubbar.offset().left), (sw), time_total, aux);

                    if(sample_time_start>0){
                        aux-=sample_time_start;
                    }

                    if(type=='fake' && o.fakeplayer){


                        var args = {
                            type : o.type_for_fake_feed
                            ,fakeplayer_is_feeder:'on'
                        }

                        //o.fakeplayer.get(0).api_change_media(cthis, args);
                        setTimeout(function(){

                            if(o.fakeplayer.get(0) && o.fakeplayer.get(0).api_pause_media){

                                o.fakeplayer.get(0).api_seek_to_perc(aux/time_total);
                            }
                        },100);
                    }

                    seek_to(aux);

                    if(playing==false){
                        play_media();
                    }
                }

            }
            function seek_to_perc(argperc){
                seek_to((argperc * time_total));
            }
            function seek_to(arg){
                //arg = nr seconds


                //console.info(_feed_fakePlayer);

                if(type=='youtube'){
                    _cmedia.seekTo(arg);
                }

                if(type=='audio'){
                    if(audioBuffer!=null){
                        lasttime_inseconds = arg;
                        audioCtx.currentTime = lasttime_inseconds;

                        if(inter_audiobuffer_workaround_id!=0){
                            time_curr=arg;
                        }

                        pause_media({'audioapi_setlasttime':false});
                        play_media();
                    }else{
                        if(is_flashplayer==true){

                            if(o.settings_backup_type=='light'){
                                if(str_ie8==''){
                                    eval("_cmedia.fn_seek_to"+cthisId+"("+arg+")");
                                }
                            }
                            play_media();
                        }else{
                            _cmedia.currentTime = arg;
                        }
                    }

                }


            }

            function seek_to_onlyvisual(argperc){

                //if(debug_var){
                //    console.info('seek_to_onlyvisual()',argperc,cthis);
                //    debug_var = false;
                //}

                //console.info(time_total);
                if(time_total==0){


                    if(_cmedia && _cmedia.duration){
                        time_total = _cmedia.duration;
                    }
                    //
                    //if(debug_var){
                    //    //console.info('seek_to_onlyvisual()', o.type, argperc,time_curr, time_total,_cmedia, _cmedia.duration);
                    //    debug_var = false;
                    //}
                }

                time_curr = argperc * time_total;



                //console.info(time_curr,argperc,time_total);
                //check_time();
            }
            function set_playback_speed(arg) {
                //=== outputs a playback speed from 0.1 to 10

                if(type=='youtube') {
                    _cmedia.setPlaybackRate(arg);
                }
                if(type=='audio') {
                    if (is_flashplayer == false) {
                        _cmedia.playbackRate=arg;
                    }
                }

            }
            function set_volume(arg){
                //=== outputs a volume from 0 to 1
                if(type=='youtube'){
                    _cmedia.setVolume(arg*100);
                }
                if(type=='audio'){
                    if(is_flashplayer==true){


                        if(o.settings_backup_type=='light'){
                            if(str_ie8==''){
                                eval("_cmedia.fn_volumeset"+cthisId+"(arg)");
                            }
                        }
                        //play_cmedia();
                    }else{
                        _cmedia.volume = arg;
                    }
                }

                //console.log(_controlsVolume.children('.volume_active'));

                if(_controlsVolume.hasClass('controls-volume-vertical')){

                    //console.info('ceva');
                    _controlsVolume.find('.volume_active').eq(0).css({
                        'height':(_controlsVolume.find('.volume_static').eq(0).height() * arg)
                    });
                }else{

                    _controlsVolume.find('.volume_active').eq(0).css({
                        'width':(_controlsVolume.find('.volume_static').eq(0).width() * arg)
                    });
                }

                if(o.design_skin=='skin-wave' && o.skinwave_dynamicwaves=='on'){
                    //console.log(arg);
                    _scrubbar.find('.scrub-bg-img').eq(0).css({
                        'transform' : 'scaleY('+arg+')'
                    })
                    _scrubbar.find('.scrub-prog-img').eq(0).css({
                        'transform' : 'scaleY('+arg+')'
                    })

                    if(o.skinwave_enableReflect=='on'){

                        if(arg==0){
                            cthis.find('.scrub-bg-img-reflect').fadeOut('slow');
                        }else{
                            cthis.find('.scrub-bg-img-reflect').fadeIn('slow');
                        }
                    }
                }



                if (localStorage != null && the_player_id) {

                    //console.info(the_player_id);

                    localStorage.setItem('dzsap_last_volume_' + the_player_id, arg);

                }

                last_vol = arg;
            }
            function click_mute(){
                if(muted==false){
                    last_vol_before_mute = last_vol;
                    set_volume(0);
                    muted=true;
                }else{
                    set_volume(last_vol_before_mute);
                    muted=false;
                }
            }

            function pause_media_visual(){


                if(o.design_animateplaypause!='on'){
                    _conPlayPause.children('.playbtn').css({
                        'display' : 'block'
                    });
                    _conPlayPause.children('.pausebtn').css({
                        'display' : 'none'
                    });
                }else{

                    if(cthis.hasClass('is-playing')==false){
                        return false;
                    }


                    if(o.design_skin=='skin-redlights'||o.design_skin=='skin-steel'){

                        _conPlayPause.children('.pausebtn').css('opacity',1);
                        _conPlayPause.children('.pausebtn').animate({
                            'opacity':'0'
                        },{
                            queue:false
                            ,duration: 300
                        });


                        //console.info(_conPlayPause);


                        _conPlayPause.children('.playbtn').css({
                            'opacity' : 0
                            ,'visibility': 'visible'
                            ,'display' : 'block'
                        });
                        _conPlayPause.children('.playbtn').animate({
                            'opacity':'1'
                        },{
                            queue:false
                            ,duration: 300
                        });





                    }else{

                        _conPlayPause.children('.playbtn').stop().fadeIn('fast');
                        _conPlayPause.children('.pausebtn').stop().fadeOut('fast');
                    }
                }
                cthis.removeClass('is-playing');
                playing=false;

            }

            function pause_media(pargs){
                //console.log('pause_media()', cthis);

                if(_feed_fakePlayer){
                    //console.warn('has _feed_fakePlayer and will pause that too - ',_feed_fakePlayer);
                }

                var margs = {
                    'audioapi_setlasttime' : true
                    ,'donot_change_media' : false
                };

                if(destroyed){ return false; }

                if(pargs){
                    margs = $.extend(margs,pargs);
                }



                pause_media_visual();


                if(type=='youtube'){
                    _cmedia.pauseVideo();
                }
                if(type=='audio'){

                    if(audioBuffer!=null){
                        //console.log(audioCtx.currentTime, audioBuffer.duration);
                        //console.log(lasttime_inseconds);
                        ///==== on safari we need to wait a little for the sound to load
                        if(audioBuffer!='placeholder'){
                            if(margs.audioapi_setlasttime==true){
                                lasttime_inseconds = audioCtx.currentTime;
                            }
                            //console.log('trebuie doar la pauza', lasttime_inseconds);

                            webaudiosource.stop(0);
                        }
                    }else{
                        if(is_flashplayer==true && o.settings_backup_type=='light' && cthis.css('display')!='none'){
                            if(o.settings_backup_type=='light'){
                                eval("_cmedia.fn_pausemedia"+cthisId+"()");
                            }
                        }else{
                            if(_cmedia){
                                if(_cmedia.pause!=undefined){
                                    _cmedia.pause();
                                }
                            }
                        }
                    }


                }

                if(_feed_fakePlayer){

                    _feed_fakePlayer.get(0).api_pause_media_visual();
                }

                //console.info(margs.donot_change_media);
                if(margs.donot_change_media!=true){

                    if(type=='fake'){

                        //console.info(o.fakeplayer);
                        if(o.fakeplayer!=null){

                            var args = {
                                type : o.type_for_fake_feed
                                ,fakeplayer_is_feeder:'on'
                            }
                            //console.info(playing, args, o.fakeplayer);
                            o.fakeplayer.get(0).api_change_media(cthis, args);
                            setTimeout(function(){

                                if(o.fakeplayer.get(0) && o.fakeplayer.get(0).api_pause_media){

                                    o.fakeplayer.get(0).api_pause_media();
                                }
                            },600);
                        }


                    }
                }

                playing=false;
                cthis.removeClass('is-playing');

            }

            function play_media_visual(margs){

                if(o.design_animateplaypause!='on'){

                    _conPlayPause.children('.playbtn').css({
                        'display' : 'none'
                    });
                    _conPlayPause.children('.pausebtn').css({
                        'display' : 'block'
                    });
                }else{



                    if(o.design_skin=='skin-redlights'||o.design_skin=='skin-steel'){

                        _conPlayPause.children('.playbtn').css('opacity',1);
                        _conPlayPause.children('.playbtn').animate({
                            'opacity':'0'
                        },{
                            queue:false
                            ,duration: 600
                        });




                        _conPlayPause.children('.pausebtn').css({
                            'opacity' : 0
                            ,'visibility': 'visible'
                            ,'display' : 'block'
                        });
                        _conPlayPause.children('.pausebtn').animate({
                            'opacity':'1'
                        },{
                            queue:false
                            ,duration: 600
                        });





                    }else{

                        _conPlayPause.children('.playbtn').stop().fadeOut('fast');
                        _conPlayPause.children('.pausebtn').stop().fadeIn('fast');
                    }
                }




                playing=true;
                cthis.addClass('is-playing');


                //console.info(cthis, margs);

                if(action_audio_play){ action_audio_play(cthis);}
                if(action_audio_play2){  action_audio_play2(cthis); }


            }
            function play_media(pargs){
                //console.log('play_media()',pargs,cthis);

//                console.log(dzsap_list);




                var margs = {
                    'api_report_play_media' : true
                }

                if(pargs){
                    margs = $.extend(margs,pargs)
                }

                if(cthis.hasClass('media-setuped')==false){
                    console.info('warning: media not setuped, there might be issues')
                }



                //console.info(o.type);
                if(type!='fake'){

                    //return false;
                }
                for(i=0;i<dzsap_list.length;i++){

//                    console.info(!is_ie8(), dzsap_list[i].get(0), typeof dzsap_list[i].get(0)!="undefined", typeof dzsap_list[i].get(0).api_pause_media!="undefined")
                    if(!is_ie8() && typeof dzsap_list[i].get(0)!="undefined" && typeof dzsap_list[i].get(0).api_pause_media!="undefined" &&dzsap_list[i].get(0)!=cthis.get(0)){

                        //console.info('try to pause', dzsap_list[i].get(0),dzsap_list[i].data('type_audio_stop_buffer_on_unfocus'))
                        if(dzsap_list[i].data('type_audio_stop_buffer_on_unfocus') && dzsap_list[i].data('type_audio_stop_buffer_on_unfocus')=='on'){
                            dzsap_list[i].get(0).api_destroy_for_rebuffer();
                        }else{

                            dzsap_list[i].get(0).api_pause_media({'audioapi_setlasttime':false});
                        }
                    }
                }

                if(destroyed_for_rebuffer){

                    setup_media();


                    if(isInt(playfrom)){
                        seek_to(playfrom);
                    }

                    destroyed_for_rebuffer=false;
                }

                //console.info(o.google_analytics_send_play_event, window._gaq, google_analytics_sent_play_event);
                if(o.google_analytics_send_play_event=='on' && window._gaq && google_analytics_sent_play_event==false){
                    //if(window.console){ console.info( 'sent event'); }
                    window._gaq.push(['_trackEvent', 'ZoomSounds Play', 'Play', 'zoomsounds play - '+cthis.attr('data-source')]);
                    google_analytics_sent_play_event = true;
                }

                //===media functions

                if(_feed_fakePlayer){

                    //console.info(cthis, _feed_fakePlayer);
                    _feed_fakePlayer.get(0).api_play_media_visual({
                        'api_report_play_media' : false
                    });
                }

                //console.info("TYPE IS ",type);
                if(type=='fake'){

                    if(o.fakeplayer!=null){

                        //console.info(o.fakeplayer);
                        var args = {
                            type : o.type_for_fake_feed
                            ,fakeplayer_is_feeder:'on'
                        }
                        //console.info(playing, args, o.fakeplayer);
                        o.fakeplayer.get(0).api_change_media(cthis, args);
                        setTimeout(function(){

                            if(o.fakeplayer.get(0) && o.fakeplayer.get(0).api_play_media){

                                o.fakeplayer.get(0).api_play_media();
                            }
                        },600);
                    }


                }

                if(type=='youtube'){
                    //console.info(_cmedia);
                    if(_cmedia && _cmedia.playVideo){

                        _cmedia.playVideo();
                    }
                }
                if(type=='audio'){


                    //console.log('ceva', type, audioBuffer, is_flashplayer);
                    if(audioBuffer!=null){
                        //console.log(audioBuffer);
                        ///==== on safari we need to wait a little for the sound to load
                        if(audioBuffer!='placeholder'){
                            webaudiosource = audioCtx.createBufferSource();
                            webaudiosource.buffer = audioBuffer;
                            //javascriptNode.connect(audioCtx.destination);
                            webaudiosource.connect(audioCtx.destination);

                            webaudiosource.connect(analyser)
                            //analyser.connect(audioCtx.destination);
                            //console.log("play ctx", lasttime_inseconds);
                            webaudiosource.start(0, lasttime_inseconds);
                        }else{
                            return;
                        }

                    }else{
                        if(is_flashplayer==true && cthis.css('display')!='none'){
                            //alert("_cmedia.fn_playMedia"+cthisId+"()");
                            //console.log(cthis);
                            if(o.settings_backup_type=='light'){
                                eval("_cmedia.fn_playmedia"+cthisId+"()");
                            }

                        }else{
                            if(_cmedia){
                                if(typeof _cmedia.play!= 'undefined'){
                                    _cmedia.play();
                                }
                            }
                        }
                    }

                }



                play_media_visual(margs);




                //console.info(ajax_view_submitted);

                if(ajax_view_submitted=='off'){
                    ajax_submit_views();
                }
            }

            function formatTime(arg) {
                //formats the time
                var s = Math.round(arg);
                var m = 0;
                if (s > 0) {
                    while (s > 59 && s<3000000 && isFinite(s)) {
                        m++;
                        s -= 60;
                    }
                    return String((m < 10 ? "0" : "") + m + ":" + (s < 10 ? "0" : "") + s);
                } else {
                    return "00:00";
                }
            }
            return this;
        })
    }

    window.dzsap_init = function(selector, settings) {

        //console.info(selector);
        if(typeof(settings)!="undefined" && typeof(settings.init_each)!="undefined" && settings.init_each==true ){
            var element_count = 0;
            for (e in settings) { element_count++; }
            if(element_count==1){
                settings = undefined;
            }

            $(selector).each(function(){
                var _t = $(this);
                _t.audioplayer(settings)
            });
        }else{
            $(selector).audioplayer(settings);
        }

    };











    //////=======
    // AUDIO GALLERY
    /////========

    $.fn.audiogallery = function(o) {
        var defaults = {
            design_skin: 'skin-default'
            ,cueFirstMedia : 'on'
            ,autoplay: 'off'
            ,autoplayNext: 'on'
            ,design_menu_position: 'bottom'
            ,design_menu_state: 'open' // -- options are "open" or "closed", this sets the initial state of the menu, even if the initial state is "closed", it can still be opened by a button if you set design_menu_show_player_state_button to "on"
            ,design_menu_show_player_state_button: 'off' // -- show a button that allows to hide or show the menu
            ,design_menu_width: 'default'
            ,design_menu_height: '200'
            ,design_menu_space: 'default'
            ,design_menuitem_width: 'default'
            ,design_menuitem_height: 'default'
            ,design_menuitem_space: 'default'
            ,disable_menu_navigation: 'off'
            ,enable_easing: 'off'// -- enable easing for menu animation
            ,settings_ap: {}
            ,transition: 'fade' //fade or direct
            ,embedded: 'off'
            ,settings_mode: 'mode-normal'

        }




        if(typeof o =='undefined'){
            if(typeof $(this).attr('data-options')!='undefined'  && $(this).attr('data-options')!=''){
                var aux = $(this).attr('data-options');
                aux = 'var aux_opts = ' + aux;
                eval(aux);
                o = aux_opts;
            }
        }



        Math.easeIn = function(t, b, c, d) {

            return -c *(t/=d)*(t-2) + b;

        };

        o = $.extend(defaults, o);
        this.each(function() {

            //console.info("INITED");
            var cthis = $(this);
            var cchildren = cthis.children()
                ,cthisId = 'ag1'
            ;
            var currNr = -1 // -- the current player that is playing
                ,currNr_2 = -1
                ,lastCurrNr = 0
                ,tempNr = 0
            ;
            var busy = true;
            var i = 0;
            var ww
                , wh
                , tw
                , th
                ,n_maindim // -- the navmain main dimension for scrolling
                ,nc_maindim
                ,sw = 0// -- scrubbar width
                ,sh
                ,spos = 0 // --  scrubbar prog pos
            ;
            var _sliderMain
                ,_sliderClipper
                ,_navMain
                ,_navClipper
                ,_cache
            ;
            var busy = false
                ,playing = false
                ,muted = false
                ,loaded=false
                ,first=true
                ,skin_redlight_give_controls_right_to_all_players  = false// -- if the mode is mode-showall and the skin of the player is redlights, then make all players with controls right
            ;
            var time_total = 0
                ,time_curr=0
            ;
            var last_vol = 1
                ,last_vol_before_mute = 1
            ;
            var inter_check
                ,inter_checkReady
            ;
            var skin_minimal_canvasplay
                ,skin_minimal_canvaspause
            ;
            var is_flashplayer = false
            ;
            var data_source
            ;

            var aux_error = 20;//==erroring for the menu scroll

            var res_thumbh = false;

            var str_ie8 = '';

            var arr_menuitems = [];

            var str_alertBeforeRate = 'You need to comment or rate before downloading.';



            var duration_viy = 20
            ;

            var target_viy = 0
            ;

            var begin_viy = 0
            ;

            var finish_viy = 0
            ;

            var change_viy = 0
            ;


            if(window.dzsap_settings && typeof( window.dzsap_settings.str_alertBeforeRate)!='undefined'){
                str_alertBeforeRate = window.dzsap_settings.str_alertBeforeRate;
            }

            cthis.get(0).currNr_2 = -1; // -- we use this as backup currNR for mode-showall ( hack )

            init();
            function init(){




                if(o.design_menu_width=='default'){
                    o.design_menu_width = '100%';
                }
                if(o.design_menu_height=='default'){
                    o.design_menu_height = '200';
                }



                cthis.addClass(o.settings_mode);


                cthis.append('<div class="slider-main"><div class="slider-clipper"></div></div>');

                cthis.addClass('menu-position-'+ o.design_menu_position);

                _sliderMain = cthis.find('.slider-main').eq(0);


                var auxlen = cthis.find('.items').children().length;

                // --- if there is a single audio player in the gallery - theres no point of a menu
                if(auxlen==0 || auxlen==1){
                    o.design_menu_position = 'none';
                    o.settings_ap.disable_player_navigation = 'on';
                }

                if(o.design_menu_position=='top'){
                    _sliderMain.before('<div class="nav-main"><div class="nav-clipper"></div></div>');
                }
                if(o.design_menu_position=='bottom'){
                    _sliderMain.after('<div class="nav-main"><div class="nav-clipper"></div></div>');
                }


                _sliderClipper = cthis.find('.slider-clipper').eq(0);
                _navMain = cthis.find('.nav-main').eq(0);
                _navClipper = cthis.find('.nav-clipper').eq(0);

                for(i=0;i<auxlen;i++){
                    arr_menuitems.push(cthis.find('.items').children().eq(0).find('.menu-description').html())
                    //cthis.find('.items').children().eq(0).find('.menu-description').remove();


                    _sliderClipper.append(cthis.find('.items').children().eq(0));
                }

                //console.info(arr_menuitems);

                for(i=0;i<arr_menuitems.length;i++){
                    var extra_class = '';
                    if(arr_menuitems[i] && arr_menuitems[i].indexOf('<div class="menu-item-thumb-con"><div class="menu-item-thumb" style="')==-1){
                        extra_class += ' no-thumb';
                    }
                    _navClipper.append('<div class="menu-item'+extra_class+'">'+arr_menuitems[i]+'</div>')
                }

                if(o.disable_menu_navigation=='on'){
                    _navMain.hide();
                }

//                console.info(o.design_menu_height, o.design_menu_state);
                _navMain.css({
                    'height' : o.design_menu_height
                })

                if(is_ios() || is_android()){
                    _navMain.css({
                        'overflow':'auto'
                    })
                }

                if(o.design_menu_state=='closed'){

                    _navMain.css({
                        'height' : 0
                    })
                }





                if(cthis.css('opacity')==0){
                    cthis.animate({
                        'opacity' : 1
                    }, 1000);
                }

                $(window).on('resize', handleResize);
                handleResize();
                setTimeout(handleResize, 1000);



                cthis.get(0).api_skin_redlights_give_controls_right_to_all = function(){

                    // -- void f()

                    skin_redlight_give_controls_right_to_all_players = true;
                }


                if(o.settings_mode=='mode-normal'){

                    goto_item(tempNr);
                }else{

                    // console.info(_sliderClipper.find('audioplayer-tobe'));

                    _sliderClipper.find('.audioplayer-tobe').each(function(){
                        var _t = $(this);

                        //console.log(_t);

                        var ind = _t.parent().children('.audioplayer,.audioplayer-tobe').index(_t);

                        // console.warn('ind - ',ind, _t);

                        if(_t.hasClass('audioplayer-tobe')){
                            //console.info(o.settings_ap);
                            o.settings_ap.parentgallery = cthis;
                            o.settings_ap.action_audio_play = mode_showall_listen_for_play;
                            _t.audioplayer(o.settings_ap);

                            //console.info(ind);

                            ind = String(ind+1);

                            if(ind.length<2){
                                // ind='0'+ind;
                            }

                            _t.before('<div class="number-wrapper"><span class="the-number">'+ind+'</span></div>')
                            _t.after('<div class="clear for-number-wrapper"></div>')
                        }

                    })
                    //console.info('dada2', skin_redlight_give_controls_right_to_all_players);


                    if(o.settings_mode=='mode-showall'){

                        if(skin_redlight_give_controls_right_to_all_players){

                            _sliderClipper.children('.audioplayer').each(function(){

                                var _t = $(this);

                                //console.info(_t);

                                if(_t.find('.ap-controls-right').eq(0).prev().hasClass('controls-right')==false){
                                    _t.find('.ap-controls-right').eq(0).before('<div class="controls-right"> </div>');
                                }
                            });
                        }
                    }
                }


                _navClipper.children().bind('click', click_menuitem);
                cthis.find('.download-after-rate').bind('click', click_downloadAfterRate);

                cthis.get(0).api_goto_next = goto_next;
                cthis.get(0).api_goto_prev = goto_prev;
                cthis.get(0).api_goto_item = goto_item;
                cthis.get(0).api_handle_end = handle_end;
                cthis.get(0).api_toggle_menu_state = toggle_menu_state;
                cthis.get(0).api_handleResize = handleResize;
                cthis.get(0).api_player_commentSubmitted = player_commentSubmitted;
                cthis.get(0).api_player_rateSubmitted = player_rateSubmitted;




                setTimeout(init_loaded, 700);



                if(o.enable_easing=='on'){

                    handle_frame();
                }
                //console.info(cthis);

                cthis.addClass('dzsag-inited');

                cthis.addClass('transition-'+ o.transition);
            }
            function init_loaded(){

                cthis.addClass('dzsag-loaded');
            }
            function click_downloadAfterRate(){
                var _t = $(this);


                if(_t.hasClass('active')==false){
                    alert(str_alertBeforeRate)
                    return false;
                }


            }
            function mode_showall_listen_for_play(arg){

                //console.info('mode_showall_listen_for_play()',currNr, arg);

                if(o.settings_mode=='mode-showall'){

                    var ind = _sliderClipper.children('.audioplayer,.audioplayer-tobe').index(arg);
                    //console.log(ind);
                    currNr = ind;
                    cthis.get(0).currNr_2 = ind;
                    //console.info(cthis,currNr)
                }
                //console.info('mode_showall_listen_for_play()',currNr,this, cthis.get(0).currNr_2);
            }

            function handle_frame(){


                if(isNaN(target_viy)){
                    target_viy=0;
                }

                if(duration_viy===0){
                    requestAnimFrame(handle_frame);
                    return false;
                }

                begin_viy = target_viy;
                change_viy = finish_viy - begin_viy;


                //console.info('handle_frame', finish_viy, duration_viy, target_viy);

                //console.log(duration_viy);
                target_viy = Number(Math.easeIn(1, begin_viy, change_viy, duration_viy).toFixed(4));;


                if(is_ios()==false && is_android()==false){
                    _navClipper.css({
                        'transform': 'translateY('+target_viy+'px)'
                    });
                }


                //console.info(_blackOverlay,target_bo);;

                requestAnimFrame(handle_frame);
            }


            function toggle_menu_state(){
                if(_navMain.height()==0){
                    _navMain.css({
                        'height' : o.design_menu_height
                    })
                }else{

                    _navMain.css({
                        'height' : 0
                    })
                }
                setTimeout(function(){
                    handleResize();
                }, 400); // -- animation delay
            }
            function handle_end(){
                goto_next();
            }

            function player_commentSubmitted(){
                _navClipper.children('.menu-item').eq(currNr).find('.download-after-rate').addClass('active');

            }
            function player_rateSubmitted(){
                _navClipper.children('.menu-item').eq(currNr).find('.download-after-rate').addClass('active');
            }

            function calculateDims(){
//                console.info('calculateDims');
                _sliderClipper.css('height', _sliderClipper.children().eq(currNr).height());
//                _navMain.show();
                n_maindim = _navMain.height();
                nc_maindim = _navClipper.outerHeight();

//                return;
//                console.info(nc_maindim, n_maindim)
                if(nc_maindim > n_maindim && n_maindim>0){
                    _navMain.unbind('mousemove', navMain_mousemove);
                    _navMain.bind('mousemove', navMain_mousemove);
                }else{
                    _navMain.unbind('mousemove', navMain_mousemove);
                }

                if(o.embedded=='on'){
                    //console.info(window.frameElement)
                    if(window.frameElement){
                        window.frameElement.height = cthis.height();
                        //console.info(window.frameElement.height, cthis.outerHeight())
                    }
                }
            }
            function navMain_mousemove(e){
                var _t = $(this);
                var mx = e.pageX - _t.offset().left;
                var my = e.pageY - _t.offset().top;

//                console.info(nc_maindim, n_maindim, nc_maindim <= n_maindim);
                if(nc_maindim <= n_maindim){
                    return;
                }

                n_maindim = _navMain.outerHeight();

                //console.log(mx);

                var vix = 0;
                var viy = 0;

                viy = (my / n_maindim) * -(nc_maindim - n_maindim+10 + aux_error*2) + aux_error;
                //console.log(viy);
                if(viy>0){
                    viy = 0;
                }
                if(viy < -(nc_maindim - n_maindim+10)){
                    viy = -(nc_maindim - n_maindim+10);
                }

                finish_viy = viy;

                //console.log(viy, nc_maindim, n_maindim, (my / n_maindim))

                if(is_ios()==false && is_android()==false){
                    if(o.enable_easing!='on'){
                        _navClipper.css({
                            'transform': 'translateY('+finish_viy+'px)'
                        });
                    }
                }


            }
            function click_menuitem(e){
                var _t = $(this);
                var ind = _t.parent().children().index(_t);

                goto_item(ind);
            }

            function handleResize(){

                setTimeout(function(){
                    //console.info(_sliderClipper.children().eq(currNr), _sliderClipper.children().eq(currNr).height())
                    _sliderClipper.css('height', _sliderClipper.children().eq(currNr).height());
                },500);

                calculateDims();

            }

            function transition_end(){

                //console.info(_sliderClipper.children().eq(lastCurrNr));

                //_sliderClipper.children().eq(lastCurrNr).hide();

                _sliderClipper.children().eq(lastCurrNr).removeClass('transitioning-out');
                _sliderClipper.children().eq(lastCurrNr).removeClass('active');

                _sliderClipper.children().eq(currNr).removeClass('transitioning-in');
                lastCurrNr = currNr;
                busy= false;
            }
            function transition_bg_end(){
                cthis.parent().children('.the-bg').eq(0).remove();
                busy= false;
            }
            function goto_prev(){
                tempNr = currNr;
                tempNr--;
                if(tempNr<0){
                    tempNr = _sliderClipper.children().length-1;
                }
                goto_item(tempNr);
            }
            function goto_next(){
                //console.info('goto_next()', currNr,cthis.get(0).currNr_2);
                tempNr = currNr;

                if(o.settings_mode=='mode-showall'){
                    tempNr = cthis.get(0).currNr_2;
                }
                tempNr++;
                if(tempNr>=_sliderClipper.children().length){
                    tempNr = 0;
                }
                goto_item(tempNr);
            }
            function goto_item(arg){

                console.info('goto_item()', arg,busy);

                if(busy==true){
                    return;
                }
                if(currNr==arg){

                    if(_sliderClipper && _sliderClipper.children().eq(currNr).get(0) && _sliderClipper.children().eq(currNr).get(0).api_play_media){
                        _sliderClipper.children().eq(currNr).get(0).api_play_media();
                    }
                    return;
                }

                _cache = _sliderClipper.children('.audioplayer,.audioplayer-tobe').eq(arg);

                if(currNr>-1){
                    if(typeof(_sliderClipper.children().eq(currNr).get(0))!='undefined'){
                        if(typeof(_sliderClipper.children().eq(currNr).get(0).api_pause_media)!='undefined'){
                            _sliderClipper.children().eq(currNr).get(0).api_pause_media();
                        }

                    }


                    if(o.settings_mode!='mode-showall'){

                        //console.info(o.transition);
                        if(o.transition=='fade'){
                            _sliderClipper.children().eq(currNr).removeClass('active');
                            _navClipper.children().eq(currNr).removeClass('active');
                            _sliderClipper.children().eq(currNr).addClass('transitioning-out');
                            _sliderClipper.children().eq(currNr).animate({

                            },{queue:false });


                            setTimeout(transition_end, 300);

                            busy=true;
                        }
                        if(o.transition=='direct'){
                            transition_end();
                        }
                    }
                }


                //============ setting settings
                if(o.settings_ap.design_skin == 'sameasgallery'){
                    o.settings_ap.design_skin = o.design_skin;
                }

                //===if this is  the first audio
                if(currNr == -1 && o.autoplay=='on'){
                    o.settings_ap.autoplay = 'on';
                }

                //===if this is not the first audio
                if(currNr > -1 && o.autoplayNext=='on'){
                    o.settings_ap.autoplay = 'on';
                }
                o.settings_ap.parentgallery = cthis;

                o.settings_ap.design_menu_show_player_state_button = o.design_menu_show_player_state_button;
                o.settings_ap.cue = 'on';
                if(first==true){
                    if(o.cueFirstMedia=='off'){
                        o.settings_ap.cue = 'off';
                    }

                    first = false;
                }

                //============ setting settings END


                console.info('_cache - ',_cache);
                if(_cache.hasClass('audioplayer-tobe')){
                    _cache.audioplayer(o.settings_ap);
                }

                if(o.autoplayNext=='on'){
                    if(o.settings_mode=='mode-showall'){
                        currNr = cthis.get(0).currNr_2;
                    }
                    if(currNr>-1 && _cache.get(0) && _cache.get(0).api_play){
                        _cache.get(0).api_play();
                    }
                }



                if(o.settings_mode!='mode-showall') {
                    if (o.transition == 'fade') {
                        _cache.css({
                        })
                        _cache.animate({}, {queue: false})

                    }
                    if (o.transition == 'direct') {

                    }

                    _cache.addClass('transitioning-in');
                }

                _cache.addClass('active');
                _navClipper.children().eq(arg).addClass('active');


                if(_cache.attr("data-bgimage")!=undefined && cthis.parent().hasClass('ap-wrapper') && cthis.parent().children('.the-bg').length>0){
                    cthis.parent().children('.the-bg').eq(0).after('<div class="the-bg" style="background-image: url('+_cache.attr("data-bgimage")+');"></div>')
                    cthis.parent().children('.the-bg').eq(0).css({
                        'opacity':1
                    })


                    cthis.parent().children('.the-bg').eq(1).css({
                        'opacity':0
                    })
                    cthis.parent().children('.the-bg').eq(1).animate({
                        'opacity':1
                    },{queue:false, duration:1000, complete:transition_bg_end, step:function(){
                        busy=true;
                    } })
                    busy=true;
                }


                //console.info('set currNr', currNr, o.settings_mode);

                if(o.settings_mode!='mode-showall'){

                    currNr = arg;
                }

                calculateDims();
            }
        });
    }

    window.dzsag_init = function(selector, settings) {


        if(typeof(settings)!="undefined" && typeof(settings.init_each)!="undefined" && settings.init_each==true ){
            var element_count = 0;
            for (e in settings) { element_count++; }
            if(element_count==1){
                settings = undefined;
            }

            $(selector).each(function(){
                var _t = $(this);
                _t.audiogallery(settings)
            });
        }else{
            $(selector).audiogallery(settings);
        }
    };

})(jQuery);



jQuery(document).ready(function($){


    //console.info('song changers -> ', $('.audioplayer-song-changer'));


    $('audio.zoomsounds-from-audio').each(function(){
        var _t = $(this);
        //console.info(_t);

        _t.after('<div class="audioplayer-tobe auto-init skin-silver" data-source="'+_t.attr('src')+'"></div>');

        _t.remove();
    })

    //console.info($('.zoomvideogallery.auto-init'));
    // dzsap_init('.audioplayer-tobe.auto-init', {init_each: true});
    // dzsag_init('.audiogallery.auto-init', {init_each: true});


    $(document).delegate('.audioplayer-song-changer','click', function(){
        var _t = $(this);


        //console.info(_t);
        var _c = $(_t.attr('data-target')).eq(0);
        //console.info(_t, _t.attr('data-target'), _c, _c.get(0));



        if(_c && _c.get(0) && _c.get(0).api_change_media){

            _c.get(0).api_change_media(_t);
        }

        return false;
    })

    if($('.dzsap-sticktobottom.dzsap-sticktobottom-for-skin-silver').length>0){
        setInterval(function(){

            //console.info($('.dzsap-sticktobottom.dzsap-sticktobottom-for-skin-silver > .audioplayer').eq(0).hasClass('dzsap-loaded'));
            if($('.dzsap-sticktobottom.dzsap-sticktobottom-for-skin-silver > .audioplayer').eq(0).hasClass('dzsap-loaded')){
                $('.dzsap-sticktobottom.dzsap-sticktobottom-for-skin-silver').addClass('audioplayer-loaded')
            }
        },1000);
    }
    if($('.dzsap-sticktobottom.dzsap-sticktobottom-for-skin-wave-small').length>0){
        setInterval(function(){

            if($('.dzsap-sticktobottom.dzsap-sticktobottom-for-skin-wave-small > .audioplayer').eq(0).hasClass('dzsap-loaded')){
                $('.dzsap-sticktobottom.dzsap-sticktobottom-for-skin-wave-small').addClass('audioplayer-loaded')
            }
        },1000);
    }

});



function is_ios() {
    return ((navigator.platform.indexOf("iPhone") != -1) || (navigator.platform.indexOf("iPod") != -1) || (navigator.platform.indexOf("iPad") != -1)
    );
}

function is_android() {
    //return false;
    //return true;
    var ua = navigator.userAgent.toLowerCase();
    return (ua.indexOf("android") > -1);
}

function is_ie() {
    if (navigator.appVersion.indexOf("MSIE") != -1) {
        return true;
    }
    ;
    return false;
}
;
function is_firefox() {
    if (navigator.userAgent.indexOf("Firefox") != -1) {
        return true;
    }
    ;
    return false;
}
;
function is_opera() {
    if (navigator.userAgent.indexOf("Opera") != -1) {
        return true;
    }
    ;
    return false;
}
;
function is_chrome() {
    return navigator.userAgent.toLowerCase().indexOf('chrome') > -1;
}
;

function is_safari() {
    return Object.prototype.toString.call(window.HTMLElement).indexOf('Constructor') > 0;
}

function version_ie() {
    return parseFloat(navigator.appVersion.split("MSIE")[1]);
}
;
function version_firefox() {
    if (/Firefox[\/\s](\d+\.\d+)/.test(navigator.userAgent)) {
        var aversion = new Number(RegExp.$1);
        return(aversion);
    }
    ;
}
;
function version_opera() {
    if (/Opera[\/\s](\d+\.\d+)/.test(navigator.userAgent)) {
        var aversion = new Number(RegExp.$1);
        return(aversion);
    }
    ;
}
;
function is_ie8() {
    if (is_ie() && version_ie() < 9) {
        return true;
    }
    return false;
}
function is_ie9() {
    if (is_ie() && version_ie() == 9) {
        return true;
    }
    return false;
}
function can_play_mp3(){
    var a = document.createElement('audio');
    return !!(a.canPlayType && a.canPlayType('audio/mpeg;').replace(/no/, ''));
}
function can_canvas(){
    // check if we have canvas support
    var oCanvas = document.createElement("canvas");
    if (oCanvas.getContext("2d")) {
        return true;
    }
    return false;
}
function onYouTubeIframeAPIReady() {


    for(i=0;i<dzsap_list.length;i++){
        //console.log(dzsap_list[i].get(0).fn_yt_ready);
        if(dzsap_list[i].get(0)!=undefined && typeof dzsap_list[i].get(0).fn_yt_ready!='undefined'){
            dzsap_list[i].get(0).fn_yt_ready();
        }
    }
}



jQuery.fn.textWidth = function(){
    var _t = jQuery(this);
    var html_org = _t.html();
    if(_t[0].nodeName=='INPUT'){
        html_org = _t.val();
    }
    var html_calcS = '<span class="forcalc">' + html_org + '</span>';
    jQuery('body').append(html_calcS);
    var _lastspan = jQuery('span.forcalc').last();
    //console.log(_lastspan, html_calc);
    _lastspan.css({
        'font-size' : _t.css('font-size')
        ,'font-family' : _t.css('font-family')
    })
    var width =_lastspan.width() ;
    //_t.html(html_org);
    _lastspan.remove();
    return width;
};

window.requestAnimFrame = (function() {
    //console.log(callback);
    return window.requestAnimationFrame ||
        window.webkitRequestAnimationFrame ||
        window.mozRequestAnimationFrame ||
        window.oRequestAnimationFrame ||
        window.msRequestAnimationFrame ||
        function(/* function */callback, /* DOMElement */element) {
            window.setTimeout(callback, 1000 / 60);
        };
})();







