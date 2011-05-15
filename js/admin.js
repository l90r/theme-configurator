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
                row.hide('fast', function() { $(this).remove(); });
                return false;
            }
        }
        
        this.getNew = function() {
            return {"id": "new_option_id", "title": "An option title here"};
        };
        
        this.display = function() {
            $(this.tmplId).tmpl(data).appendTo(this.containerId);
            $(this.containerId).sortable({ handle: '.draghandle' });
            $(this.containerId + ' .itemrem').live('click', this.remove());
        }
        
        this.collect = function(row) {
            var item = {};
            var contents = row.contents();
            item.id = row.find('input.id').val();
            item.title = row.find('input.title').val();
            return item;
        }
        
        this.dump = function() {
            var self = this;
            var output = [];
            $(this.containerId + ' tr').each(function(idx, elem) {
                output[idx] = self.collect($(elem));
            })
            
            return output;
        }
    }
    
    var colorMgr = new manager(thcfg_colors, '#thcfg_tpl_idtitle', '#thcfg_colors');
    var contentMgr = new manager(thcfg_contents, '#thcfg_tpl_contents', '#thcfg_contents');
    var imageMgr = new manager(thcfg_images, '#thcfg_tpl_idtitle', '#thcfg_images');
    var phraseMgr = new manager(thcfg_phrases, '#thcfg_tpl_idtitle', '#thcfg_phrases');
    
    contentMgr.getNew = function() {
        return {"id": "new_option_id", "title": "An option title here", "type": "pagelist"};
    }
    

    $(function() {
        colorMgr.display();
        contentMgr.display();
        imageMgr.display();
        phraseMgr.display();
        $('#thcfg-add-color').click(colorMgr.add());
        $('#thcfg-add-content').click(contentMgr.add());
        $('#thcfg-add-image').click(imageMgr.add());
        $('#thcfg-add-phrase').click(phraseMgr.add());
        
        $('#thcfg_form').submit(function() {
            var code = JSON.stringify({
                "colors": colorMgr.dump(),
                "contents": contentMgr.dump(),
                "images": imageMgr.dump(),
                "phrases": phraseMgr.dump()
            });
            if($('#thcfg_saveas option:selected').val() == 'see') {
                alert(code);
                return false;
            }
        });
    })
    
})(jQuery);