(function($) {
    
    function manager(data) {
        this.tmplId = "#thcfg_idtitle";
        this.containerId = "#thcfg_colors";
        
        this.add = function() {
            var self = this;
            return function() {
                var item = self.getNew();
                $(self.tmplId).tmpl(item).appendTo(self.containerId);
                var li = $(this).parent();
                var index = li.parent().children().index(li);
                data.splice(index, 0, item);
                return false;
            }
        }
        
        this.remove = function() {
            var self = this;
            return function() {
                var li = $(this).parent();
                var index = li.parent().children().index(li);
                data.splice(index, 1);
                li.remove();
            }
        }
        
        this.getNew = function() {
            return { "id": "newid", "title": "New Title" };
        }
        
        this.display = function() {
            $(this.tmplId).tmpl(data).appendTo(this.containerId);
            $(this.containerId).sortable({ handle: '.draghandle' });
            $('.remove').live('click', this.remove());
        }
        
        this.dump = function() {
            return data;
        }
    }
    
    var mgr = new manager(thcfg_colors);
    
    mgr.getNew = function() {
        return {"id": "new_option_id", "two": "An option title here"};
    }

    $(function() {
        mgr.display();
        $('#thcfg-add-color').click(mgr.add());
        /* $('#dump').click(function() {
            $('#output').text(JSON.stringify(mgr.dump()));
        });*/
            
    })
    
})(jQuery);