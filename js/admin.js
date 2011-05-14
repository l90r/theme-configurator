(function($) {
    
    function manager(data, tmplId, containerId) {
        this.tmplId = tmplId;
        this.containerId = containerId;
        
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
                var row = $(this).closest('tr');
                var index = row.parent().children().index(row);
                data.splice(index, 1);
                row.hide('fast', function() { $(this).remove(); });
                return false;
            }
        }
        
        this.getNew = function() {
            return { "id": "newid", "title": "New Title" };
        }
        
        this.display = function() {
            $(this.tmplId).tmpl(data).appendTo(this.containerId);
            $(this.containerId).sortable({ handle: '.draghandle' });
            $(this.containerId + ' .itemrem').live('click', this.remove());
        }
        
        this.dump = function() {
            return data;
        }
    }
    
    var colorMgr = new manager(thcfg_colors, '#thcfg_tpl_idtitle', '#thcfg_colors');
    var contentMgr = new manager(thcfg_contents, '#thcfg_tpl_contents', '#thcfg_contents');
    var imageMgr = new manager(thcfg_images, '#thcfg_tpl_idtitle', '#thcfg_images');
    var phraseMgr = new manager(thcfg_phrases, '#thcfg_tpl_idtitle', '#thcfg_phrases');
    
    var newIdTitle = function() {
        return {"id": "new_option_id", "title": "An option title here"};
    };
    
    colorMgr.getNew = newIdTitle;
    imageMgr.getNew = newIdTitle;
    phraseMgr.getNew = newIdTitle;

    contentMgr.getNew = function() {
        return {"id": "new_option_id", "title": "An option title here", "type": "pagelist"};
    }
    

    $(function() {
        colorMgr.display();
        contentMgr.display();
        imageMgr.display();
        phraseMgr.display();
        $('#thcfg-add-color').click(colorMgr.add());
        $('#thcfg-add-contents').click(contentMgr.add());
        $('#thcfg-add-images').click(imageMgr.add());
        $('#thcfg-add-phrases').click(contentMgr.add());
        
        /* $('#dump').click(function() {
            $('#output').text(JSON.stringify(mgr.dump()));
        });*/
            
    })
    
})(jQuery);