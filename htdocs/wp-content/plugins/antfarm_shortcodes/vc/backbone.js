
/*

 */



console && console.log('admin_enqueue_js.js is loaded');
// Come from vc_map -> 'js_view' => 'ViewTestElement'
window.ViewTestElement = vc.shortcode_view.extend({
    // Render method called after element is added( cloned ), and on first initialisation
    render: function () {
        // console && console.log('ViewTestElement: render method called.', this);
        window.ViewTestElement.__super__.render.call(this); //make sure to call __super__. To execute logic fron inherited view. That way you can extend original logic. Otherwise, you will fully rewrite what VC will do at this event

        return this;
    },
    ready: function (e) {
        // console && console.log('ViewTestElement: ready method called.');
        window.ViewTestElement.__super__.ready.call(this, e);

        return this;
    },
    //Called every time when params is changed/appended. Also on first initialisation
    changeShortcodeParams: function (model) {
        // console && console.log('ViewTestElement: changeShortcodeParams method called.');
        // console && console.log(model.getParam('value') + ': this was maped in vc_map() "param_name"  => "value"');
        window.ViewTestElement.__super__.changeShortcodeParams.call(this, model);

        init_dzsselector();
        setTimeout(function(){

            // console.info(jQuery('.iconselector .iconselector-waiter'))
            jQuery('.iconselector .iconselector-waiter').trigger('change');
        },1000);
    },
    changeShortcodeParent: function (model) {
        // console && console.log('ViewTestElement: changeShortcodeParent method called.');
        window.ViewTestElement.__super__.changeShortcodeParent.call(this, model);
    },
    deleteShortcode: function (e) {
        // console && console.log('ViewTestElement: deleteShortcode method called.');
        window.ViewTestElement.__super__.deleteShortcode.call(this, e);
    },
    editElement: function (e) {
        // console && console.log('ViewTestElement: editElement method called.', this, e);
        window.ViewTestElement.__super__.editElement.call(this, e);

        // console.info(this);

        init_dzsselector();
        setTimeout(function(){

            // console.info(jQuery('.iconselector .iconselector-waiter'))
            jQuery('.iconselector .iconselector-waiter').trigger('change');
        },1000);
    },
    clone: function (e) {
        // console && console.log('ViewTestElement: clone method called.');
        window.ViewTestElement.__super__.clone.call(this, e);
    }
});
// Come from vc_map -> 'js_view' => 'ViewTestElement'
window.ShowParamsElement = vc.shortcode_view.extend({
    // Render method called after element is added( cloned ), and on first initialisation
    render: function () {
        console && console.log('ShowParamsElement: render method called.', this);
        window.ShowParamsElement.__super__.render.call(this); //make sure to call __super__. To execute logic fron inherited view. That way you can extend original logic. Otherwise, you will fully rewrite what VC will do at this event

        return this;
    },
    ready: function (e) {
        // console && console.log('ViewTestElement: ready method called.');
        window.ShowParamsElement.__super__.ready.call(this, e);

        return this;
    },
    //Called every time when params is changed/appended. Also on first initialisation
    changeShortcodeParams: function (model) {
        console && console.log('ShowParamsElement: changeShortcodeParams method called.', this, model);
        // console && console.log(model.getParam('value') + ': this was maped in vc_map() "param_name"  => "value"');
        window.ShowParamsElement.__super__.changeShortcodeParams.call(this, model);

        setTimeout(function(){

            // console.info(jQuery('.iconselector .iconselector-waiter'))
            jQuery('.iconselector .iconselector-waiter').trigger('change');
        },1000);
    },
    changeShortcodeParent: function (model) {
        // console && console.log('ViewTestElement: changeShortcodeParent method called.');
        window.ShowParamsElement.__super__.changeShortcodeParent.call(this, model);
    },
    deleteShortcode: function (e) {
        // console && console.log('ViewTestElement: deleteShortcode method called.');
        window.ShowParamsElement.__super__.deleteShortcode.call(this, e);
    },
    editElement: function (e) {
        console && console.log('ShowParamsElement: editElement method called.',e , this);
        window.ShowParamsElement.__super__.editElement.call(this, e);

        // console.info(this);


        var t = this;

        
        
        

        setTimeout(function(){

            console.log("this.model -> ",t.model);
            if(t && t.model){

                console.log("this.model.attributes.params.video -> ",t.model.attributes.params.video);
                if(t.model.attributes.params.video){

                    var val = t.model.attributes.params.video;

                    console.info("jQuery('input[name=video]') -> ",jQuery('input[name=video]'));
                    if(jQuery('input[name=video]').length && $jQuery('input[name=video]').eq(0).val()==''){
                        jQuery('input[name=video]').val(val);
                    }
                    if(jQuery('input[name=media_video]').length && jQuery('input[name=media_video]').eq(0).val()==''){
                        jQuery('input[name=media_video]').val(val);
                    }
                }
            }
            // console.info(jQuery('.iconselector .iconselector-waiter'))
            jQuery('.iconselector .iconselector-waiter').trigger('change');
        },1000);
    },
    clone: function (e) {
        // console && console.log('ViewTestElement: clone method called.');
        window.ShowParamsElement.__super__.clone.call(this, e);
    }
});
window.ZfolioElement = vc.shortcode_view.extend({
    // Render method called after element is added( cloned ), and on first initialisation
    render: function () {
        console && console.log('ZfolioElement: render method called.', this);
        window.ViewTestElement.__super__.render.call(this); //make sure to call __super__. To execute logic fron inherited view. That way you can extend original logic. Otherwise, you will fully rewrite what VC will do at this event

        return this;
    },
    ready: function (e) {
        // console && console.log('ViewTestElement: ready method called.');
        window.ViewTestElement.__super__.ready.call(this, e);

        return this;
    },
    //Called every time when params is changed/appended. Also on first initialisation
    changeShortcodeParams: function (model) {
        // console && console.log('ViewTestElement: changeShortcodeParams method called.');
        console.log(model.getParam('value') + ': this was maped in vc_map() "param_name"  => "value"');
        window.ViewTestElement.__super__.changeShortcodeParams.call(this, model);


        init_dzsselector();
        init_zfolio();


        setTimeout(function(){
            jQuery('.wpb_vc_param_value[name=skin]').trigger('change');
        },1400);

    },
    changeShortcodeParent: function (model) {
        console && console.log('ZfolioElement: changeShortcodeParent called.');
        // console && console.log('ViewTestElement: changeShortcodeParent method called.');
        window.ViewTestElement.__super__.changeShortcodeParent.call(this, model);
    },
    deleteShortcode: function (e) {
        // console && console.log('ViewTestElement: deleteShortcode method called.');
        window.ViewTestElement.__super__.deleteShortcode.call(this, e);
    },
    editElement: function (e) {
        console && console.log('ZfolioElement: editElement method called.');
        window.ViewTestElement.__super__.editElement.call(this, e);

        // console.info(this);


        init_dzsselector();
        init_zfolio();


        setTimeout(function(){
            jQuery('.wpb_vc_param_value[name=skin]').trigger('change');
        },1400);


    },
    clone: function (e) {
        // console && console.log('ViewTestElement: clone method called.');
        window.ViewTestElement.__super__.clone.call(this, e);
    }
});

function init_zfolio(){

    // console.info('init_zfolio()');

    setTimeout(function(){


        // console.info("INIT_ZFOLIO() ELEMENTS -> ",jQuery('.option-con > span.height200important'));
    jQuery('.bigoption.testa > .option-con > div.height200important').each(function(){
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

        // console.info('_t23 - ',_t23);
        // console.info('args - ',args);

        _t23.isotope(args)

    })

    jQuery('.iconselector .iconselector-waiter').trigger('change');
    jQuery('.dzs-dependency-field,*[name=zfolio-mode]').trigger('change');
    },1000);

}
function init_button_style(){

    setTimeout(function(){



        window.antfarm_button_customizer_init();


    },2000);
}

function init_dzsselector(){

    setTimeout(function(){

        dzssel_init('select.dzs-style-me', {init_each: true});
        // console.info(jQuery('.iconselector .iconselector-waiter'))
        //console.info('jQuery(\'.option-con > span\') - ',jQuery('.option-con > span'));


    },1000);
}
window.ViewInitSelector = vc.shortcode_view.extend({



    render: function () {
        // console && console.log('ViewInitSelector: render method called.', this);
        window.ViewTestElement.__super__.render.call(this); //make sure to call __super__. To execute logic fron inherited view. That way you can extend original logic. Otherwise, you will fully rewrite what VC will do at this event

        return this;
    },


    //Called every time when params is changed/appended. Also on first initialisation
    changeShortcodeParams: function (model) {
        // console && console.log('ViewTestElement: changeShortcodeParams method called.');
        // console.log(model.getParam('value') + ': this was maped in vc_map() "param_name"  => "value"');
        window.ViewTestElement.__super__.changeShortcodeParams.call(this, model);
        init_dzsselector();
    },


    editElement: function (e) {
        // console && console.log('ViewInitSelector: editElement method called.');
        window.ViewTestElement.__super__.editElement.call(this, e);

        // console.info(this);

        init_dzsselector();
        init_button_style();
    },

});


window.VcColumnTextView = vc.shortcode_view.extend({
    // Render method called after element is added( cloned ), and on first initialisation
    render: function () {
        console && console.log('ViewTestElement: render method called.');
        window.ViewTestElement.__super__.render.call(this); //make sure to call __super__. To execute logic fron inherited view. That way you can extend original logic. Otherwise, you will fully rewrite what VC will do at this event

        return this;
    },
    ready: function (e) {
        console && console.log('ViewTestElement: ready method called.');
        window.ViewTestElement.__super__.ready.call(this, e);

        return this;
    },
    //Called every time when params is changed/appended. Also on first initialisation
    changeShortcodeParams: function (model) {
        console && console.log('ViewTestElement: changeShortcodeParams method called.');
        // console && console.log(model.getParam('value') + ': this was maped in vc_map() "param_name"  => "value"');
        window.ViewTestElement.__super__.changeShortcodeParams.call(this, model);
    },
    changeShortcodeParent: function (model) {
        console && console.log('ViewTestElement: changeShortcodeParent method called.');
        window.ViewTestElement.__super__.changeShortcodeParent.call(this, model);
    },
    deleteShortcode: function (e) {
        console && console.log('ViewTestElement: deleteShortcode method called.');
        window.ViewTestElement.__super__.deleteShortcode.call(this, e);
    },
    editElement: function (e) {
        console && console.log('ViewTestElement: editElement method called.');
        window.ViewTestElement.__super__.editElement.call(this, e);

        // console.info(this);

        setTimeout(function(){

            // console.info(jQuery('.iconselector .iconselector-waiter'))
            jQuery('.iconselector .iconselector-waiter').trigger('change');
        },1000);
    },
    clone: function (e) {
        // console && console.log('ViewTestElement: clone method called.');
        window.ViewTestElement.__super__.clone.call(this, e);
    }
});



function isInt(n) {
    return n % 1 === 0;
}
;
window.VcBackendTtaSectionView = window.VcColumnView.extend({
    parentObj: null,
    events: {
        "click > .wpb_element_wrapper > .vc_tta-panel-body > .vc_controls .vc_control-btn-delete": "deleteShortcode",
        "click > .wpb_element_wrapper > .vc_tta-panel-body > .vc_controls .vc_control-btn-prepend": "addElement",
        "click > .wpb_element_wrapper > .vc_tta-panel-body > .vc_controls .vc_control-btn-edit": "editElement",
        "click > .wpb_element_wrapper > .vc_tta-panel-body > .vc_controls .vc_control-btn-clone": "clone",
        "click > .wpb_element_wrapper > .vc_tta-panel-body > .vc_empty-container": "addToEmpty"
    },
    setContent: function() {
        this.$content = this.$el.find("> .wpb_element_wrapper > .vc_tta-panel-body > .vc_container_for_children")
    },
    render: function() {

        var _t= jQuery(this);

        // console.info("RENDER VCBACKEND", _t);
        var parentObj;
        return window.VcBackendTtaSectionView.__super__.render.call(this), parentObj = vc.shortcodes.get(this.model.get("parent_id")), _.isObject(parentObj) && !_.isUndefined(parentObj.view) && (this.parentObj = parentObj), this.$el.addClass("vc_tta-panel"), this.$el.attr("style", ""), this.$el.attr("data-vc-toggle", "tab"), this.replaceTemplateVars(), this
    },
    replaceTemplateVars: function() {
        var title, $panelHeading;
        title = this.model.getParam("title"), _.isEmpty(title) && (title = this.parentObj && this.parentObj.defaultSectionTitle && this.parentObj.defaultSectionTitle.length ? this.parentObj.defaultSectionTitle : window.i18nLocale.section), $panelHeading = this.$el.find(".vc_tta-panel-heading");
        var template = vc.template($panelHeading.html(), vc.templateOptions.custom);
        $panelHeading.html(template({
            model_id: this.model.get("id"),
            section_title: title
        }))
    },
    getIndex: function() {
        return this.$el.index()
    },
    editElement: function (e) {
        // console && console.log('TTA SECTION: editElement method called.', e, this);

        setTimeout(function(){

            console.warn(jQuery('.vc_ui-panel-window[data-vc-shortcode="vc_tta_section"]'));
        },1000);
        window.ViewTestElement.__super__.editElement.call(this, e);

        // console.info(this);

        setTimeout(function(){



            // console.info(jQuery('.iconselector .iconselector-waiter'))


            console.info('jQuery(\'.option-con > span\') - ',jQuery('.option-con > span'));
            jQuery('.option-con > span').isotope();
            jQuery('.iconselector .iconselector-waiter').trigger('change');
        },1000);
    },
    ready: function() {
        this.updateParentNavigation(), window.VcBackendTtaSectionView.__super__.ready.call(this)
    },
    updateParentNavigation: function() {
        _.isObject(this.parentObj) && this.parentObj.view && this.parentObj.view.notifySectionRendered && this.parentObj.view.notifySectionRendered(this.model)
    },
    deleteShortcode: function(e) {
        var answer;
        return _.isObject(e) && e.preventDefault(), answer = confirm(window.i18nLocale.press_ok_to_delete_section), !0 !== answer ? !1 : (1 === vc.shortcodes.where({
            parent_id: this.model.get("parent_id")
        }).length ? (this.model.destroy(), this.parentObj && this.parentObj.destroy()) : (this.parentObj && this.parentObj.view && this.parentObj.view.removeSection && this.parentObj.view.removeSection(this.model), this.model.destroy()), !0)
    },
    changeShortcodeParams: function(model) {
        // console && console.log('TTA SECTION: changeShortcodeParams method called.', model);
        window.VcBackendTtaSectionView.__super__.changeShortcodeParams.call(this, model), _.isObject(this.parentObj) && this.parentObj.view && this.parentObj.view.notifySectionChanged && this.parentObj.view.notifySectionChanged(model)
    }
});
