(function($) {
    var tabs = ['color', 'dimension', 'text', 'general'];

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
        $('#thcfg_' + section + '_id').val('');
        $('#thcfg_' + section + '_title').val('');
        
        show_add(section, true);
        show_detail(section, true);
        return false;
    }
    
    function click_edit(section) {
        var idx = $('#thcfg_list_' + section + ' option:selected').index();
        $('#thcfg_' + section + '_id').val(thcfg_data[section][idx].id);
        $('#thcfg_' + section + '_title').val(thcfg_data[section][idx].title);
        
        show_add(section, false);
        show_detail(section, true);
        return false;
    }
    
    function click_save_add(section) {
        var id = $('#thcfg_' + section + '_id').val();
        var title = $('#thcfg_' + section + '_title').val();
        $('#thcfg_tpl_option').tmpl({"id": id, "title": title}).appendTo('#thcfg_list_' + section);
        thcfg_data[section].push({ "id": id, "title": title });

        show_detail(section, false);
        return false;
    }

    function click_save_edit(section) {
        var idx = $('#thcfg_list_' + section + ' option:selected').index();
        var id = $('#thcfg_' + section + '_id').val();
        var title = $('#thcfg_' + section + '_title').val();
        thcfg_data[section][idx] =  { "id": id, "title": title };
        $('#thcfg_list_' + section + ' option').eq(idx).replaceWith($('#thcfg_tpl_option').tmpl({"id": id, "title": title}));

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

    function show_add(section, add) {
        $('#thcfg_section_' + section + ' .thcfg_add_only').toggle(add);
        $('#thcfg_section_' + section + ' .thcfg_edit_only').toggle(!add);
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
        $(control_selector + '.thcfg_add').click(function() { return click_add(section)});
        $(control_selector + '.thcfg_edit').click(function() { return click_edit(section)});
        $(control_selector + '.thcfg_remove').click(function() { return click_remove(section)});
        $(control_selector + '.thcfg_up').click(function() { return click_up(section)});
        $(control_selector + '.thcfg_down').click(function() { return click_down(section)});
        $(control_selector + '.thcfg_cancel').click(function() { return click_cancel(section)});
        $(control_selector + '.thcfg_save_add').click(function() { return click_save_add(section)});
        $(control_selector + '.thcfg_save_edit').click(function() { return click_save_edit(section)});
    }

    function bind_events() {
        $('#thcfg_tab_color').click(function() { click_tab('color') });
        $('#thcfg_tab_dimension').click(function() { click_tab('dimension') });
        $('#thcfg_tab_text').click(function() { click_tab('text') });
        $('#thcfg_tab_general').click(function() { click_tab('general') });
        bind_control_events('color');
        bind_control_events('dimension');
        bind_control_events('text');
    }
    
    $(function() {
        bind_events();
    });
    
})(jQuery);