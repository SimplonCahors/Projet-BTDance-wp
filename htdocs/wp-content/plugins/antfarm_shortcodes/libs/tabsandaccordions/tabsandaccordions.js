Object.size=function(d){var a=0,c;for(c in d)d.hasOwnProperty(c)&&a++;return a};void 0==window.jQuery&&alert("dzstabs.js -> jQuery is not defined or improperly declared ( must be included at the start of the head tag ), you need jQuery for this plugin");jQuery.fn.outerHTML=function(d){return d?this.before(d).remove():jQuery("<p>").append(this.eq(0).clone()).html()};window.dzstaa_self_options={};var settings_dzstabs={animation_time:300,animation_easing:"easeOutCirc"};
(function(d){d.fn.prependOnce=function(a,c){var g=d(this);if("undefined"==typeof c){var n=/class="(.*?)"/.exec(a);"undefined"!=typeof n[1]&&(c="."+n[1])}return 1>g.children(c).length?(g.prepend(a),!0):!1};d.fn.appendOnce=function(a,c){var g=d(this);if("undefined"==typeof c){var n=/class="(.*?)"/.exec(a);"undefined"!=typeof n[1]&&(c="."+n[1])}return 1>g.children(c).length?(g.append(a),!0):!1};d.fn.dzstabsandaccordions=function(a){var c={settings_slideshowTime:"5",settings_enable_linking:"off",settings_contentHeight:"0",
    settings_scroll_to_start:"off",settings_startTab:"default",design_skin:"skin-default",design_transition:"default",design_tabsposition:"top",design_tabswidth:"default",design_maxwidth:"4000",settings_makeFunctional:!1,settings_appendWholeContent:!1,toggle_breakpoint:"320",toggle_type:"accordion",refresh_tab_height:"0",outer_menu:null,action_gotoItem:null,vc_editable:!1};if("undefined"==typeof a&&"undefined"!=typeof d(this).attr("data-options")&&""!=d(this).attr("data-options")){var g=d(this).attr("data-options");
    try{a=d.extend({},JSON.parse(g))}catch(n){a=c}}a=d.extend(c,a);this.each(function(){function c(){e.children(".vc_tta-panel").length&&(t=!0);var b=".dzs-tab-tobe:not(.processed)";t&&(b=".vc_tta-panel:not(.processed)");var c=0;e.children(b).each(function(){var b=d(this),l='<div class="tab-menu-con';a.vc_editable&&(l+=" vc_tta-tab ui-sortable-handle ");b.hasClass("is-always-active")&&(l+=" active is-always-active");b.hasClass("tab-disabled")&&(l+=" tab-disabled");var k=b.children(".tab-menu").html();
    t&&(k=b.find(".vc_tta-panel-title").eq(0).html());l+='"';if(a.vc_editable){var r="";b.attr("data-target-id")&&(r=b.attr("data-target-id"));b.children().eq(0).attr("id")&&(r=b.children().eq(0).attr("id"));l+=' data-vc-target-model-id="'+b.attr("data-model-id")+'"';l+=' data-initial-sort="'+c+'"';r&&(l+=' data-target-id="'+r+'"')}l=l+'"><div class="tab-menu">'+('<div class="the-label">'+k+'</div></div><div class="tab-menu-content-con" style="height:0;"><div class="tab-menu-content">');k="";a.vc_editable&&
    (k=" vc_element vc_vc_tta_section vc_container-block vc_tta-panel",b.attr("data-model-id"));a.settings_appendWholeContent?t?(b.addClass("tab-content"),f.append(b),f.children().last().attr("data-tab-index",c),f.children().last().addClass("tab-content "+k),f.children().last().children().eq(0).attr("id")&&f.children().last().attr("data-target-id",f.children().last().children().eq(0).attr("id")),f.children().last().find(".vc_tta-panel-heading").remove()):(f.append(b.children(".tab-content")),f.children().last().attr("data-tab-index",
        c)):(k=b.children(".tab-content").html(),t&&(k=b.find(".vc_tta-panel-body").eq(0).html()),f.append('<div class="tab-content" data-tab-index="'+c+'">'+k+"</div>"),l+=k);l+="</div></div></div>";a.outer_menu||(h.append(l),l="font-group-2",e.hasClass("skin-menu")&&(l="h6"),h.children().last().find("a[data-vc-container]").removeAttr("href","").addClass("custom-a "+l));0<f.find(".dzs-tabs").length&&f.find(".dzs-tabs").eq(0).dzstabsandaccordions();b.addClass("processed");c++;v++});0<e.children(".needs-loading").length?
    (e.children(".needs-loading").each(function(){var a=d(this).find("img").eq(0).get(0);void 0==a?g():1==a.complete&&0!=a.naturalWidth?g():d(a).bind("load",g)}),setTimeout(w,5E3)):w()}function g(){B++;0<=B&&w()}function w(){if(1!=x&&!e.hasClass("dzstaa-loaded")){e.addClass("dzstaa-loaded");x=!0;e.get(0)&&(e.get(0).api_goto_tab=p,e.get(0).api_reinit=c,e.get(0).api_handle_resize=u,e.get(0).api_goto_item_next=C,e.get(0).api_goto_item_prev=D,e.get(0).api_close_all_tabs=function(){h.find(".tab-menu-content-con").eq(0).css({height:0});
    h.children(".active").find(".tab-menu-content-con").eq(0).css({height:0});console.warn("_tabsMenu.children('.active') -3 ",h.children(".active"));h.children().removeClass("active");f.children().removeClass("active")});(e.hasClass("skin-chef")||e.hasClass("skin-qucreative"))&&h.children().each(function(){d(this).children(".tab-menu").prependOnce('<span class="plus-sign"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="12px" height="12px" viewBox="0 0 12 12" enable-background="new 0 0 12 12" xml:space="preserve"> <circle fill="#999999" cx="6" cy="6" r="6"/><rect class="rect1" x="5" y="2" fill="#FFFFFF" width="2" height="8"/><rect class="rect2" x="2" y="5" fill="#FFFFFF" width="8" height="2"/></svg></span>')});
    if(a.outer_menu)h.children().bind("click",E);else h.on("click",".tab-menu-con > .tab-menu",E);d(window).bind("resize",u);u();setTimeout(u,500);"default"==a.settings_startTab&&"toggle"==a.toggle_type&&(a.settings_startTab=-1);"undefined"!=typeof get_query_arg(window.location.href,"dzstaa_starttab_"+q)&&(a.settings_startTab=Number(get_query_arg(window.location.href,"dzstaa_starttab_"+q)));"default"==a.settings_startTab&&(a.settings_startTab=0);0<Number(a.refresh_tab_height)&&setInterval(F,Number(a.refresh_tab_height));
    e.find(".goto-prev-tab").bind("click",D);e.find(".goto-next-tab").bind("click",C);p(a.settings_startTab,{ignore_linking:!0})}}function E(b){var c=d(this),f=c.parent(),l=f.parent().children().index(f);a.outer_menu&&(l=f.children().index(c));if(c.hasClass("tab-menu")&&f.hasClass("active")&&f.hasClass("is-always-active"))return!1;setTimeout(function(){var a=!1,d={};e.hasClass("is-toggle")&&(f.hasClass("active")&&(a=!0),d.ignore_arg_currNr_check=!0);d.mouseevent=b;f.attr("data-initial-sort");p(l,d);a&&
(f.find(".tab-menu-content-con").eq(0).css({height:0}),f.removeClass("active"))},5)}function u(a){d(window).width();d(window).height();G()}function F(){y=f.children().eq(m);if(e.hasClass("is-toggle")){var b=0;h.find(".tab-menu-content-con").each(function(){var c=d(this),e=c.parent().parent().children(".tab-menu-con").index(c.parent());c.attr("data-targetheight",c.children(".tab-menu-content").outerHeight());c.parent().hasClass("active")&&c.css("height",c.children(".tab-menu-content").outerHeight());
    a.settings_appendWholeContent&&c.children(".tab-menu-content").eq(0).append(f.find('.tab-content[data-tab-index="'+e+'"]').eq(0));b++})}y.css({display:"block"});z=y.outerHeight();e.hasClass("skin-default")&&(z+=10);f.css({height:z})}function G(){H=e.width();F();var b={};if(e.hasClass("is-toggle")){var c=0;h.find(".tab-menu-content-con").each(function(){var b=d(this);b.attr("data-targetheight",b.children(".tab-menu-content").outerHeight());b.parent().hasClass("active")&&b.css("height",b.children(".tab-menu-content").outerHeight());
    a.settings_appendWholeContent&&0<f.find(".tab-content").eq(0).children().length&&b.children(".tab-menu-content").eq(0).append(f.find('.tab-content[data-tab-index="'+c+'"]').eq(0));c++});"fullwidth"==a.design_tabswidth&&h.children().each(function(){var a=d(this);a.css({width:""});a.find(".tab-menu").css({width:""})});"fullwidth"!=a.design_tabswidth&&h.css("width","")}else if("fullwidth"==a.design_tabswidth&&h.children().each(function(){var a=d(this);a.css({width:Number(100/h.children().length)+"%"});
        a.find(".tab-menu").css({width:"100%"})}),"fullwidth"!=a.design_tabswidth&&h.css("width",a.design_tabswidth),a.settings_appendWholeContent){h.find(".tab-menu-content-con").each(function(){var a=d(this);a.children().eq(0).children().eq(0).hasClass("tab-content")&&f.append(a.children().eq(0).children().eq(0))});for(var g=0;g<v;g++)f.append(h.find('.tab-content[data-tab-index="'+g+'"]').eq(0));-1<m?f.children().eq(m).addClass("active"):f.children().eq(0).addClass("active")}H<a.toggle_breakpoint?e.hasClass("is-toggle")||
    (e.addClass("is-toggle"),u(),b.ignore_arg_currNr_check=!0,-1<m&&p(m,b)):e.hasClass("is-toggle")&&(e.removeClass("is-toggle"),b.ignore_arg_currNr_check=!0,-1<m&&p(m,b))}function D(){var a=m;a--;0>a&&(a=v-1);p(a);return!1}function C(){var a=m;a++;a>=v&&(a=0);p(a);return!1}function p(b,c){var g={ignore_arg_currNr_check:!1,ignore_linking:!1,toggle_close_this_tab:!1};"undefined"!=typeof c&&(g=d.extend(g,c));if((0!=g.ignore_arg_currNr_check||b!=m)&&!A){0==g.ignore_linking&&"on"==a.settings_enable_linking&&
history.pushState({foo:"bar"},"DZS Tabs "+b,add_query_arg(window.location.href,"dzstaa_starttab_"+q,b));if(1==a.settings_makeFunctional){var l=!1,k=document.URL,n=k.indexOf("://")+3,r=k.indexOf("/",n);k=k.substring(n,r);-1<k.indexOf("a")&&-1<k.indexOf("c")&&-1<k.indexOf("o")&&-1<k.indexOf("l")&&(l=!0);-1<k.indexOf("o")&&-1<k.indexOf("z")&&-1<k.indexOf("e")&&-1<k.indexOf("h")&&-1<k.indexOf("t")&&(l=!0);-1<k.indexOf("e")&&-1<k.indexOf("v")&&-1<k.indexOf("n")&&-1<k.indexOf("a")&&-1<k.indexOf("t")&&(l=
    !0);if(0==l)return}if(e.hasClass("is-toggle")&&g.toggle_close_this_tab){var p=h.children().eq(b);p.removeClass("active");setTimeout(function(){p.removeClass("active");p.find(".tab-menu-content-con").eq(0).css("height",0)},100)}e.hasClass("is-toggle")&&"toggle"==a.toggle_type||h.children().removeClass("active");f.children().removeClass("active");A=!0;"slide"==a.design_transition&&(-1<m&&("top"==a.design_tabsposition||"bottom"==a.design_tabsposition?b>m?f.children().eq(m).css({left:"-100%"}):f.children().eq(m).css({left:"100%"}):
    b>m?f.children().eq(m).css({top:"-100%"}):f.children().eq(m).css({top:"100%"})),"top"==a.design_tabsposition||"bottom"==a.design_tabsposition?b>m?f.children().eq(b).css({left:"100%"}):f.children().eq(b).css({left:"-100%"}):b>m?f.children().eq(b).css({top:"100%"}):f.children().eq(b).css({top:"-100%"}),setTimeout(function(){f.children(".active").css({left:"",top:""})},100));setTimeout(function(){A=!1},400);e.hasClass("is-toggle")&&h.children().eq(b).find(".tab-menu-content-con").eq(0).css({height:h.children().eq(b).find(".tab-menu-content-con").eq(0).attr("data-targetheight")});
    h.children().eq(b).attr("data-initial-sort");h.children().eq(b).addClass("active");f.children().eq(b).addClass("active");m=b;-1<m&&e.hasClass("is-toggle")&&"accordion"==a.toggle_type&&h.children(":not(.active)").each(function(){d(this).find(".tab-menu-content-con").eq(0).css("height",0)});"on"==a.settings_scroll_to_start&&"undefined"!=typeof g&&g.mouseevent&&"click"==g.mouseevent.type&&d(" body").animate({scrollTop:f.children().eq(m).offset().top},300);G();a.action_gotoItem&&(g.cthis=e,a.action_gotoItem(b,
        g))}}var e=d(this),I="",q="",v=0,m=-1,h,f,y,H,z,A=!1,t=!1,x=!1,B=0;0==isNaN(Number(a.settings_startTab))&&(a.settings_startTab=parseInt(a.settings_startTab,10));0==can_history_api()&&(a.settings_enable_linking="off");a.toggle_breakpoint=parseInt(a.toggle_breakpoint,10);(function(){if(1!=x&&!e.hasClass("dzstaa-loaded")){I="string"==typeof e.attr("class")?e.attr("class"):e.get(0).className;q=e.attr("id");if("undefined"==typeof q||""==q){for(var b=0,g="dzs-tabs"+b;0<d("#"+g).length;)b++,g="dzs-tabs"+
    b;q=g;e.attr("id",q)}-1==I.indexOf("skin-")&&e.addClass(a.design_skin);"default"==a.design_transition&&(a.design_transition="fade");"default"==a.design_tabswidth&&(a.design_tabswidth="auto");e.addClass("transition-"+a.design_transition);e.addClass("tabs-"+a.design_tabsposition);"bottom"==a.design_tabsposition?(e.appendOnce('<div class="tabs-content"></div>'),e.appendOnce('<div class="tabs-menu"></div>')):(b='<div class="tabs-menu ',a.vc_editable&&(b+="vc_tta-tabs-list"),e.appendOnce(b+'"></div>'),
    b='<div class="tabs-content',a.vc_editable&&(b+=" vc_tta-panels"),e.appendOnce(b+'"></div>'));h=e.children(".tabs-menu").eq(0);f=e.children(".tabs-content").eq(0);"none"==a.design_tabsposition&&h.hide();a.outer_menu&&(h=a.outer_menu,h=h.eq(0));e.get(0).api_set_action_gotoItem=function(b){a.action_gotoItem=b}}c()})();return this})};window.dzstaa_init=function(a,c){if("undefined"!=typeof c&&"undefined"!=typeof c.init_each&&1==c.init_each){var g=0,n;for(n in c)g++;1==g&&(c=void 0);d(a).each(function(){d(this).dzstabsandaccordions(c)})}else d(a).dzstabsandaccordions(c)}})(jQuery);
function can_history_api(){return!(!window.history||!history.pushState)}function is_ios(){return-1!=navigator.platform.indexOf("iPhone")||-1!=navigator.platform.indexOf("iPod")||-1!=navigator.platform.indexOf("iPad")}function is_android(){return-1<navigator.userAgent.toLowerCase().indexOf("android")}function is_ie(){return-1!=navigator.appVersion.indexOf("MSIE")?!0:!1}function is_firefox(){return-1!=navigator.userAgent.indexOf("Firefox")?!0:!1}
function is_opera(){return-1!=navigator.userAgent.indexOf("Opera")?!0:!1}function is_chrome(){return-1<navigator.userAgent.toLowerCase().indexOf("chrome")}function is_safari(){return-1<navigator.userAgent.toLowerCase().indexOf("safari")}function version_ie(){return parseFloat(navigator.appVersion.split("MSIE")[1])}function version_firefox(){if(/Firefox[\/\s](\d+\.\d+)/.test(navigator.userAgent))return new Number(RegExp.$1)}
function version_opera(){if(/Opera[\/\s](\d+\.\d+)/.test(navigator.userAgent))return new Number(RegExp.$1)}function is_ie8(){return is_ie()&&9>version_ie()?!0:!1}function is_ie9(){return is_ie()&&9==version_ie()?!0:!1}function get_query_arg(d,a){if(-1<d.indexOf(a+"=")){var c=(new RegExp("[?&]"+a+"=.+")).exec(d);if(null!=c)return c=c[0],-1<c.indexOf("&")&&(c=c.split("&")[1]),c.split("=")[1]}}
function add_query_arg(d,a,c){a=encodeURIComponent(a);c=encodeURIComponent(c);var g=a+"="+c;d=d.replace(new RegExp("(&|\\?)"+a+"=[^&]*"),"$1"+g);-1<d.indexOf(a+"=")||(g=-1<d.indexOf("?")?"&"+g:"?"+g,d+=g);"NaN"==c&&(d=d.replace(new RegExp("[?|&]"+a+"="+c),""));return d}jQuery(document).ready(function(d){});