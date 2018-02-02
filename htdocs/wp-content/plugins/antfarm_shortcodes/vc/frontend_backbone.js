window.vc_antfarm_sc_video_buffer = null;

window.InlineShortcodeView_sc_video = window.InlineShortcodeView.extend({



    render: function(arg) {
        window.InlineShortcodeView_sc_video.__super__.render.call(this);
//        console.info(jQuery('.dzs-progress-bar'));

        var _tel = this.$el;

        //console.info(_tel, this);


        // console.info('render', this, _tel, arg);

        var _data_class = _tel.attr('class');
        var _data_tag = _tel.attr('data-tag');
        var _data_sc_controls = _tel.attr('data-shortcode-controls');
        var _data_model_id = _tel.attr('data-model-id');


        // console.info(_tel.parent().parent().parent().parent().parent())

        if(_tel.parent().parent().parent().parent().parent().hasClass('vc_row')){
            var _con = _tel.parent().parent().parent().parent().parent();

            var _rtel = _con.next();

            // _rtel.addClass(_data_class);
            // _rtel.attr('data-tag', _data_tag);
            // _rtel.attr('data-shortcode-controls', _data_sc_controls);
            // _rtel.attr('data-model-id', _data_model_id);

            // _rtel.append(_tel);
            //
            // if(_tel.prev().hasClass('featured-media-con')){
            //     _tel.append(_tel.prev());
            // }

            _tel.append(_rtel);
        }else{
            if(window.vc_antfarm_sc_video_buffer){

                _tel.append(window.vc_antfarm_sc_video_buffer);
                window.vc_antfarm_sc_video_buffer = null;
            }
        }



        // console.info(_tel.html());
        _tel.find('.vplayer,.vplayer-tobe').each(function(){
            var _t = jQuery(this);
           console.info(_t);

            if(_t.hasClass('inited')){
                //if(typeof(_t.get(0))!='undefined' && typeof(_t.get(0).api_restart_and_reinit)!='undefined'){
                //    _t.get(0).api_restart_and_reinit();
                //}

            }else{
                if(window.dzsvp_init){

                    window.dzsvp_init(_t);
                }else{
                    console.log('zoomtimeline not definied');
                }
            }



        });
//
//
//        setTimeout(function(){
//            jQuery(window).trigger('resize');
//        },50);
        return this;
    }
    // ,edit: function(arg){
    //     console.info('edit' , arg)
    //     window.InlineShortcodeView_sc_video.__super__.update.call(arg);
    //     return this;
    // }
    ,update: function(arg){
        console.info('update' , arg)

        var _tel = this.$el;


        window.vc_antfarm_sc_video_buffer = '<!-- section start --> <div class="the-content-sheet"> <!-- section featured media - video --> <div class="featured-media-con" style="height: auto;"> <!-- video player markup --> <div class="vplayer-tobe auto-init-from-q skin_pro" data-src="'+arg.attributes.params.media+'" style="" data-options=\'\'> <!-- cover image markup --> <div class="cover-image" style="background-image: url(img/secondary_content/video_cover.jpg); "> <svg class="cover-play-btn" version="1.1" baseProfile="tiny" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="120px" height="120px" viewBox="0 0 120 120" overflow="auto" xml:space="preserve"> <path fill-rule="evenodd" fill="#ffffff" d="M79.295,56.914c2.45,1.705,2.45,4.468,0,6.172l-24.58,17.103 c-2.45,1.704-4.436,0.667-4.436-2.317V42.129c0-2.984,1.986-4.022,4.436-2.318L79.295,56.914z M0.199,54.604 c-0.265,2.971-0.265,7.821,0,10.792c2.57,28.854,25.551,51.835,54.405,54.405c2.971,0.265,7.821,0.265,10.792,0 c28.854-2.57,51.835-25.551,54.405-54.405c0.265-2.971,0.265-7.821,0-10.792C117.231,25.75,94.25,2.769,65.396,0.198 c-2.971-0.265-7.821-0.265-10.792,0C25.75,2.769,2.769,25.75,0.199,54.604z M8.816,65.394c-0.309-2.967-0.309-7.82,0-10.787 c2.512-24.115,21.675-43.279,45.79-45.791c2.967-0.309,7.821-0.309,10.788,0c24.115,2.512,43.278,21.675,45.79,45.79 c0.309,2.967,0.309,7.821,0,10.788c-2.512,24.115-21.675,43.279-45.79,45.791c-2.967,0.309-7.821,0.309-10.788,0 C30.491,108.672,11.328,89.508,8.816,65.394z"/> </svg> <!-- description block --> <div class="big-description"> <span class="headline">WORKING AT</span><br> Q Creative Studio </div> </div> <!-- cover image markup END --> </div> </div> </div> <!-- section END -->';

        // _tel.append();


        // console.info('_tel added', _tel, _tel.html())


        window.InlineShortcodeView_sc_video.__super__.update.call(this, arg);
        return this;
    }

});

window.InlineShortcodeView_progress_bar = window.InlineShortcodeView.extend({



    render: function(arg) {
        window.InlineShortcodeView_progress_bar.__super__.render.call(this);
//        console.info(jQuery('.dzs-progress-bar'));

        var _tel = this.$el;

        //console.info(_tel, this);


         console.info('render', this, _tel, arg);

        var _data_class = _tel.attr('class');
        var _data_tag = _tel.attr('data-tag');
        var _data_sc_controls = _tel.attr('data-shortcode-controls');
        var _data_model_id = _tel.attr('data-model-id');







        //console.log(document.getElementById("vc_inline-frame"), document.getElementById("vc_inline-frame").contentWindow.init_progress_markers);

        setTimeout(function() {
            document.getElementById("vc_inline-frame").contentWindow.init_progress_markers();
            document.getElementById("vc_inline-frame").contentWindow.q_reinit();

        },500);

        if(window.init_progress_markers){

        }else{
            //console.log('no init progress markers ( maybe qcreative.js not inited yet ? )')
        }
//
//
//        setTimeout(function(){
//            jQuery(window).trigger('resize');
//        },50);
        return this;
    }
    // ,edit: function(arg){
    //     console.info('edit' , arg)
    //     window.InlineShortcodeView_sc_video.__super__.update.call(arg);
    //     return this;
    // }
    ,update: function(arg){
        console.info('update' , arg)

        var _tel = this.$el;


        window.InlineShortcodeView_progress_bar.__super__.update.call(this, arg);
        return this;
    }

});

window.InlineShortcodeView_antfarm_image_slider = window.InlineShortcodeView.extend({



    render: function(arg) {
        window.InlineShortcodeView_antfarm_image_slider.__super__.render.call(this);
//        console.info(jQuery('.dzs-progress-bar'));

        var _tel = this.$el;

        //console.info(_tel, this);


         console.info('render antfarm_image_slider', this, _tel, arg);



        setTimeout(function() {
            document.getElementById("vc_inline-frame").contentWindow.init_advanced_scrollers();
            document.getElementById("vc_inline-frame").contentWindow.q_reinit();

        },500);

//
//
//        setTimeout(function(){
//            jQuery(window).trigger('resize');
//        },50);
        return this;
    }
    // ,edit: function(arg){
    //     console.info('edit' , arg)
    //     window.InlineShortcodeView_sc_video.__super__.update.call(arg);
    //     return this;
    // }
    ,update: function(arg){
        console.info('update' , arg)

        var _tel = this.$el;


        window.InlineShortcodeView_antfarm_image_slider.__super__.update.call(this, arg);
        return this;
    }

});

window.InlineShortcodeView_antfarm_carousel = window.InlineShortcodeView.extend({



    render: function(arg) {
        window.InlineShortcodeView_antfarm_carousel.__super__.render.call(this);
//        console.info(jQuery('.dzs-progress-bar'));

        var _tel = this.$el;

        //console.info(_tel, this);


         console.info('render antfarm_carousel', this, _tel, arg);



        setTimeout(function() {
            document.getElementById("vc_inline-frame").contentWindow.init_advanced_scrollers();
            document.getElementById("vc_inline-frame").contentWindow.q_reinit();

        },500);

//
//
//        setTimeout(function(){
//            jQuery(window).trigger('resize');
//        },50);
        return this;
    }
    // ,edit: function(arg){
    //     console.info('edit' , arg)
    //     window.InlineShortcodeView_sc_video.__super__.update.call(arg);
    //     return this;
    // }
    ,update: function(arg){
        console.info('update' , arg)

        var _tel = this.$el;


        window.InlineShortcodeView_antfarm_carousel.__super__.update.call(this, arg);
        return this;
    }

});




















window.InlineShortcodeView_antfarm_portfolio = window.InlineShortcodeView.extend({



    render: function(arg) {
        window.InlineShortcodeView_antfarm_portfolio.__super__.render.call(this);
//        console.info(jQuery('.dzs-progress-bar'));

        var _tel = this.$el;

        //console.info(_tel, this);


        console.info('render', this, _tel, arg);

        return this;
    }
    // ,edit: function(arg){
    //     console.info('edit' , arg)
    //     window.InlineShortcodeView_sc_video.__super__.update.call(arg);
    //     return this;
    // }
    ,update: function(arg){
        console.info('update' , arg)

        var _tel = this.$el;


        window.InlineShortcodeView_antfarm_portfolio.__super__.update.call(this, arg);
        return this;
    },
    edit: function(e) {


        console && console.log('ZfolioElement: editElement method called.');
        // window.InlineShortcodeView_antfarm_portfolio.__super__.update.call(this, e);

        // console.info(this);

        setTimeout(function(){

            dzssel_init('select.dzs-style-me', {init_each: true});
            // console.info(jQuery('.iconselector .iconselector-waiter'))
            //console.info('jQuery(\'.option-con > span\') - ',jQuery('.option-con > span'));


            jQuery('.option-con > span.height200important').each(function(){
                var _t23 = jQuery(this);



                var args = {
                    // set itemSelector so .grid-sizer is not used in layout
                    itemSelector: '.dummy-item'
                    ,percentPosition: true
                    ,masonry: {
                        // use element for option
                        columnWidth: '.grid-sizer'
                    }
                    ,packery: {
                        // use element for option
                        columnWidth: '.grid-sizer'
                    }
                    ,layoutMode: 'packery'
                };

                console.info('_t23 - ',_t23);
                console.info('args - ',args);

                _t23.isotope(args)

            })

            jQuery('.iconselector .iconselector-waiter').trigger('change');
            jQuery('.dzs-dependency-field,*[name=zfolio-mode]').trigger('change');

        },1000);

        _.isObject(e) && e.preventDefault() && e.stopPropagation(), "edit_element" === vc.activePanelName() && vc.active_panel.model && vc.active_panel.model.get("id") === this.model.get("id") || (vc.closeActivePanel(), vc.edit_element_block_view.render(this.model))
    }

});



window.InlineShortcodeView_sc_antfarm_portfolio = window.InlineShortcodeView.extend({



    render: function(arg) {
        window.InlineShortcodeView_sc_antfarm_portfolio.__super__.render.call(this);
//        console.info(jQuery('.dzs-progress-bar'));

        var _tel = this.$el;

        //console.info(_tel, this);


        console.info('render', this, _tel, arg);

        return this;
    }
    // ,edit: function(arg){
    //     console.info('edit' , arg)
    //     window.InlineShortcodeView_sc_video.__super__.update.call(arg);
    //     return this;
    // }
    ,update: function(arg){
        console.info('update' , arg)

        var _tel = this.$el;


        window.InlineShortcodeView_sc_antfarm_portfolio.__super__.update.call(this, arg);
        return this;
    }

});


// window.InlineShortcodeView_antfarm_audio_playlist = window.InlineShortcodeView.extend({
//
//
//
//     render: function(arg) {
//         window.InlineShortcodeView_antfarm_audio_playlist.__super__.render.call(this);
// //        console.info(jQuery('.dzs-progress-bar'));
//
//         var _tel = this.$el;
//
//         console.info(_tel, this);
//
//
//
//         function dzsap_handle_play(argcthis){
//
//
//             //console.info(argcthis);
//
//
//             $('.audioplayer').each(function(){
//                 var _t = $(this);
//                 if(_t.get(0)!=argcthis.get(0)){
//                     if(_t.get(0).api_seek_to_perc){
//                         _t.get(0).api_seek_to_perc(0);
//                     }
//                 }
//             })
//         }
//
//         var settings_ap = {
//             disable_volume: 'off'
//             ,disable_scrub: 'default'
//             ,design_skin: 'skin-redlights'
//             ,skinwave_dynamicwaves:'off'
//             ,skinwave_enableSpectrum:'off'
//             ,settings_backup_type:'full'
//             ,skinwave_enableReflect:'on'
//             ,skinwave_comments_enable:'on'
//             ,skinwave_timer_static:'off'
//             ,disable_player_navigation: 'off'
//             ,skinwave_mode: 'normal'
//             ,default_volume:'last' // -- number / set the default volume 0-1 or "last" for the last known volume
//             ,skinwave_comments_retrievefromajax:'off'
//
//             ,soundcloud_apikey:"be48604d903aebd628b5bac968ffd14d"//insert api key here
//             ,embed_code:"You can enable embed button for your viewers to embed on their site, the code will auto generate. &lt;iframe src=&quot;http://yoursite.com/bridge.php?type=gallery&amp;id=gal1&quot; &gt;&lt;/iframe&gt;"
//             ,init_each: true
//             ,settings_php_handler : ''
//             ,action_audio_play2: dzsap_handle_play
//         };
//
//
//         // console.info(_tel.html());
//         _tel.find('.audiogallery').each(function(){
//             var _t2 = jQuery(this);
//
//             // console.warn(_t2.get(0).innerHTML);
//
//             _t2.find('.audioplayer-tobe').unwrap();
//
//             console.warn(_t2.html());
//             window.dzsag_init(_t2,{
//                 'transition':'fade'
//                 ,'cueFirstMedia' : 'off'
//                 ,'autoplay' : 'on'
//                 ,'autoplayNext' : 'on'
//                 ,design_menu_position:'bottom'
//                 ,'settings_ap':settings_ap
//                 ,embedded: 'off'
//                 ,init_each: true
//                 ,enable_easing: 'on'
//                 ,design_menu_height: 200
//                 ,settings_mode: "mode-showall"
//                 ,design_menu_state: 'open' // -- options are "open" or "closed", this sets the initial state of the menu, even if the initial state is "closed", it can still be opened by a button if you set design_menu_show_player_state_button to "on"
//                 ,design_menu_show_player_state_button: 'on' // -- show a button that allows to hide or show the menu
//
//             });
//
//
//         });
// //
// //
// //        setTimeout(function(){
// //            jQuery(window).trigger('resize');
// //        },50);
//         return this;
//     }
//     // ,edit: function(arg){
//     //     console.info('edit' , arg)
//     //     window.InlineShortcodeView_sc_video.__super__.update.call(arg);
//     //     return this;
//     // }
//     ,update: function(arg){
//         console.info('update' , arg)
//
//         var _tel = this.$el;
//
//
//
//         window.InlineShortcodeView_sc_video.__super__.update.call(this, arg);
//         return this;
//     }
//
// });










window.InlineShortcodeView_antfarm_tta_tabs = window.InlineShortcodeView_vc_tta_tabs.extend({
    events: {
        "click > .vc_controls .vc_control-btn-prepend": "addtab",
        mouseenter: "resetActive",
        mouseleave: "holdActive"
    },
    addtab:function(){
        console.info("CEVA");
    },

    addSection: function(prepend) {
        console.info('antfarm_tta_tabs ADDED SECTION', this);
        var shortcode, params, i;

        var _el = this.$el;



        for (shortcode = this.childTag, params = {
            shortcode: shortcode,
            parent_id: this.model.get("id"),
            isActiveSection: !0,
            params: {
                title: this.defaultSectionTitle
            }
        }, prepend && (vc.activity = "prepend", params.order = this.getSiblingsFirstPositionIndex()), vc.builder.create(params), i = vc.builder.models.length - 1; i >= 0; i--) shortcode = vc.builder.models[i].get("shortcode"), "undefined" != typeof window.vc_settings_presets[shortcode] && (vc.builder.models[i].attributes.params = _.extend(vc.builder.models[i].attributes.params, window.vc_settings_presets[shortcode]), "vc_tta_section" === shortcode && "undefined" != typeof vc.builder.models[i].attributes.params.tab_id && (vc.builder.models[i].attributes.params.tab_id = vc_guid() + "-cl"));
        vc.builder.render()



        setTimeout(function(){

            console.info(_el.find('.dzs-tabs'), _el.find('.dzs-tabs').eq(0).get(0).api_reinit);
            _el.find('.dzs-tabs').eq(0).get(0).api_reinit();
        },1000);
    },

    render: function () {


        console.info('antfarm_tta_tabs render', this);

        var _el = this.$el;
        var _this = jQuery(this);
        var __this = this;
        var model_id = _el.attr('data-model-id');

        console.info(model_id, _el.data("modelId"));

        setTimeout(function(){

            // console.info(_);
            // this.buildSortableNavigation();

            // _.defer(this.buildSortableNavigation)

            __this.buildSortableNavigation();

            console.info(_this, window.InlineShortcodeView_antfarm_tta_tabs);
        },1000);

        return window.InlineShortcodeView_vc_tta_tabs.__super__.render.call(this),_.bindAll(this, "buildSortableNavigation", "updateSortingNavigation");
    }




    ,buildSortableNavigation: function() {

        console.info('build sortable navigation', this.$el.find(".vc_tta-tabs-list"));
        this.$el.find(".vc_tta-tabs-list").sortable({
            items: ".tab-menu-con",
            forcePlaceholderSize: !0,
            placeholder: "vc_tta-tab vc_placeholder-tta-tab",
            helper: this.renderSortingHelper,
            start: function(event, ui) {
                ui.placeholder.width(ui.item.width())
            },
            over: function(event, ui) {
                ui.placeholder.css({
                    maxWidth: ui.placeholder.parent().width()
                }), ui.placeholder.removeClass("vc_hidden-placeholder")
            },
            update: this.updateSortingNavigation
        })
    }


    ,updateSorting: function(event, ui) {

        console.info("UPDATE SORTING");
        window.InlineShortcodeView_vc_tta_tabs.__super__.updateSorting.call(this, event, ui), this.updateTabsPositions(this.getPanelsList())
    }
    ,updateSortingNavigation: function() {
        var $tabs, self;

        // console.info('updateSortingNavigation', $tabs, this.$el, ajaxurl);

        var _el = this.$el;


        self = this;

        // console.info(self, this.$el.data('model-id'), self.$el.data('model-id'));


        $tabs = this.$el.find(".vc_tta-tabs-list");


        var _dzstabs = _el.find('.dzs-tabs').eq(0);
        var _dzstabs_content = _dzstabs.find('.tabs-content').eq(0);



        _dzstabs.children('.vc_element').remove();


        var aux_arr = [];
        $tabs.find("> .vc_tta-tab").each(function() {
            var _t3 =  jQuery(this);
            var curr_id = _t3.attr('data-target-id');
            aux_arr.push(curr_id);
        });


        var data = {
            action: 'antfarm_tabs_sort'
            ,post_id: get_query_arg(window.location.href, 'post_id')
            ,tabs_items_id: JSON.stringify(aux_arr)
            ,tabs_id: _el.children('.dzs-tabs').attr('data-tabs-id')
    };

        jQuery('.vc_btn-save').trigger('click');


        // -- save first please

        setTimeout(function(){

            jQuery.post(ajaxurl, data, function(response) {
                if(window.console !=undefined ){
                    console.log('Got this from the server: ' + response);
                }

                window.location.reload();

            });

        },1000);




        $tabs.find("> .vc_tta-tab").each(function() {
            var shortcode, modelId, $li;

            // parsing the tabs


            var _t3 =  jQuery(this);
            var ind = _t3.parent().children().index(_t3);

            // console.warn(_t3, ind, self.getIndex(jQuery(this)));


            // insertAtIndex(_dzstabs, _dzstabs.children('.vc_element[data-model-id="'+_t3.attr("data-vc-target-model-id")+'"]'), ind)
            // insertAtIndex(_dzstabs_content, _dzstabs_content.children('.vc_vc_tta_section[data-model-id="'+_t3.attr("data-vc-target-model-id")+'"]'), ind);


            var prev_el = null;


            var prev_id = '';
            var curr_id = '';


            // console.info(_el.children('.dzs-tabs').attr('data-tabs-id'), prev_id, curr_id);





            $li = jQuery(this).removeAttr("style")
                // ,modelId = $li.data("vcTargetModelId")
                ,modelId = self.$el.data('model-id')
                , shortcode = vc.shortcodes.get(modelId)
                ,shortcode.save({
                order: self.getIndex($li)
            }, {
                silent: !0
            })
        }), this.updatePanelsPositions($tabs)
    }
    ,updatePanelsPositions: function($tabs) {
        var $elements, tabSortableData, $panels;
        $panels = this.getPanelsList(), $elements = [], tabSortableData = $tabs.sortable("toArray", {
            attribute: "data-vc-target-model-id"
        }), _.each(tabSortableData, function(value) {
            $elements.push($panels.find('[data-model-id="' + value + '"]'))
        }, this), $panels.prepend($elements), this.buildPagination()
    },
});






function insertAtIndex(_con, _el, i) {
    if(i === 0) {
        _con.prepend(_el);
        return;
    }


    console.info(_con, _el, _con.children('.vc_element'), _con.children('.vc_element').eq(i), i);
    _con.children('.vc_vc_tta_section').eq(i).after(_el);
}
