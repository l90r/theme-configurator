(function($) {
    var tabs = ['colors', 'dimensions', 'text', 'general'];
    
    function click_tab(tab) {
        for(var i=0; i<tabs.length; i++) {
            $('#thcfg_section_' + tabs[i]).toggle(tabs[i] == tab);
            var j = $('#thcfg_tab_' + tabs[i]);
            if(tabs[i] == tab) {
                j.addClass('thcfg_selected');
            } else {
                j.removeClass('thcfg_selected');
            }
        }
        return false;
    }

    function click_tab_handler(tab) {
        return function() {
            return click_tab(tab);
        };
    }

    function tab_events() {
        for(var i=0; i<tabs.length; i++) {
            {
                var tab = tabs[i];
                $('#thcfg_tab_' + tab).click(click_tab_handler(tab));
            }
        }
    }

    $(function() {
        tab_events();
    });
    
})(jQuery);