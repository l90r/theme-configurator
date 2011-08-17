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
        
    function section_controller(section) {
        
        var self = this;
        
        function get_index() {
            return $('#thcfg_list_' + section + ' option:selected').index();
        }

        this.update_selection = function() {
            var idx = get_index();
            var len = $('#thcfg_list_' + section + ' option').size();
            var selector = '#thcfg_section_' + section + ' ';
            $(selector + '.thcfg_edit,' + selector + '.thcfg_remove').toggle(idx>=0);
            $(selector + '.thcfg_up').toggle(idx>0);
            $(selector + '.thcfg_down').toggle(idx>=0 && idx<len-1);
            return true;
        }
        
        this.click_add = function() {
            $('#thcfg_' + section + '_id').val('');
            $('#thcfg_' + section + '_title').val('');
            
            self.show_add(true);
            self.show_detail(true);
            return false;
        }
        
        this.click_edit = function() {
            var idx = get_index();
            $('#thcfg_' + section + '_id').val(thcfg_data[section][idx].id);
            $('#thcfg_' + section + '_title').val(thcfg_data[section][idx].title);
            
            self.show_add(false);
            self.show_detail(true);
            return false;
        }
        
        this.click_save_add = function() {
            var id = $('#thcfg_' + section + '_id').val();
            var title = $('#thcfg_' + section + '_title').val();
            $('#thcfg_tpl_option').tmpl({"id": id, "title": title}).appendTo('#thcfg_list_' + section);
            thcfg_data[section].push({ "id": id, "title": title });
    
            self.show_detail(false);
            return false;
        }
    
        this.click_save_edit = function() {
            var idx = get_index();
            var id = $('#thcfg_' + section + '_id').val();
            var title = $('#thcfg_' + section + '_title').val();
            thcfg_data[section][idx] =  { "id": id, "title": title };
            $('#thcfg_list_' + section + ' option').eq(idx).replaceWith($('#thcfg_tpl_option').tmpl({"id": id, "title": title}));
    
            self.show_detail(false);
            return false;
        }
    
        this.click_cancel = function() {
            self.show_detail(false);
            return false;
        }
    
        this.show_detail = function(detail) {
            $('#thcfg_section_' + section + ' .thcfg_overview').toggle(!detail);
            $('#thcfg_section_' + section + ' .thcfg_detail').toggle(detail);
            self.update_selection();
        }
    
        this.show_add = function(add) {
            $('#thcfg_section_' + section + ' .thcfg_add_only').toggle(add);
            $('#thcfg_section_' + section + ' .thcfg_edit_only').toggle(!add);
        }
    
        this.click_remove = function() {
            var idx = get_index();
            thcfg_data[section].splice(idx, 1);
            $('#thcfg_list_' + section + ' option').eq(idx).remove();
            self.update_selection();
            return false;
        }
    
        this.click_up = function() {
            var idx = get_index();
            var tmp = thcfg_data[section][idx];
            thcfg_data[section][idx] = thcfg_data[section][idx-1];
            thcfg_data[section][idx-1] = tmp;
            var opt = $('#thcfg_list_' + section + ' option').eq(idx);
            opt.insertBefore(opt.prev());
            self.update_selection();
            return false;
        }
    
        this.click_down = function() {
            var idx = get_index();
            var tmp = thcfg_data[section][idx];
            thcfg_data[section][idx] = thcfg_data[section][idx+1];
            thcfg_data[section][idx+1] = tmp;
            var opt = $('#thcfg_list_' + section + ' option').eq(idx);
            opt.insertAfter(opt.next());
            self.update_selection();
            return false;
        }
        
        this.bind = function() {
            var control_selector = '#thcfg_section_' + section + ' ';
            $(control_selector + '.thcfg_add').click(this.click_add);
            $(control_selector + '.thcfg_edit').click(this.click_edit);
            $(control_selector + '.thcfg_remove').click(this.click_remove);
            $(control_selector + '.thcfg_up').click(this.click_up);
            $(control_selector + '.thcfg_down').click(this.click_down);
            $(control_selector + '.thcfg_cancel').click(this.click_cancel);
            $(control_selector + '.thcfg_save_add').click(this.click_save_add);
            $(control_selector + '.thcfg_save_edit').click(this.click_save_edit);
            $('#thcfg_list_' + section).change(this.update_selection);
            this.update_selection(section);
        }
    }

    function bind_tabs() {
        $('#thcfg_tab_color').click(function() { click_tab('color') });
        $('#thcfg_tab_dimension').click(function() { click_tab('dimension') });
        $('#thcfg_tab_text').click(function() { click_tab('text') });
        $('#thcfg_tab_general').click(function() { click_tab('general') });
    }
    
    function bind_events() {
        bind_tabs();
        
        var colors = new section_controller('color');
        var dimensions = new section_controller('dimension');
        var text = new section_controller('text');
        
        colors.bind();
        dimensions.bind();
        text.bind();        
    }
    
    $(function() {
        bind_events();
    });
    
})(jQuery);