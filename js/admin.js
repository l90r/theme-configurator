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
    
    function click_add(section) {
        show_head_add(section, true);
        show_detail(section, true);
        return false;
    }
    
    function click_edit(section) {
        show_head_add(section, false);
        show_detail(section, true);
        return false;
    }
    
    function click_save(section) {
        alert('Save - to be implemented');
        show_detail(section, false);
        return false;
    }

    function click_cancel(section) {
        show_detail(section, false);
        return false;
    }

    function show_detail(section, detail) {
        $('#thcfg_section_' + section + ' .thcfg_overview').toggle(!detail);
        $('#thcfg_section_' + section + ' .thcfg_detail').toggle(detail);
    }

    function show_head_add(section, add) {
        $('#thcfg_section_' + section + ' .thcfg_head_add').toggle(add);
        $('#thcfg_section_' + section + ' .thcfg_head_edit').toggle(!add);
    }

    function click_remove(section) {
        alert('Remove - To be implemented');
        return false;
    }

    function click_up(section) {
        alert('Up - To be implemented');
        return false;
    }

    function click_down(section) {
        alert('Down - To be implemented');
        return false;
    }

    
    function bind_control_events(section) {
        var control_selector = '#thcfg_section_' + section + ' ';
        $(control_selector + '.thcfg_add').click(function() { click_add(section)});
        $(control_selector + '.thcfg_edit').click(function() { click_edit(section)});
        $(control_selector + '.thcfg_remove').click(function() { click_remove(section)});
        $(control_selector + '.thcfg_up').click(function() { click_up(section)});
        $(control_selector + '.thcfg_down').click(function() { click_down(section)});
        $(control_selector + '.thcfg_cancel').click(function() { click_cancel(section)});
        $(control_selector + '.thcfg_save').click(function() { click_save(section)});
    }

    function bind_events() {
        $('#thcfg_tab_colors').click(function() { click_tab('colors') });
        $('#thcfg_tab_dimensions').click(function() { click_tab('dimensions') });
        $('#thcfg_tab_text').click(function() { click_tab('text') });
        $('#thcfg_tab_general').click(function() { click_tab('general') });
        bind_control_events('colors');
        bind_control_events('dimensions');
        bind_control_events('text');
    }
    
    $(function() {
        bind_events();
    });
    
})(jQuery);