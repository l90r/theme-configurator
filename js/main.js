
(function($) {
    function update_color(value, id) {
        $('#thcfg_sample_' + id).css('background-color', value);
    }

    function collect() {
        var data = {};
        $('.thcfg input.colorvalue,.thcfg input.phrasevalue,.thcfg input.contentvalue,.thcfg input.imagevalue')
            .each(function(idx, elem) {
            var obj = $(elem);
            data[obj.attr('name')] = obj.val();
        });
        return data;
    }
    
    $(function() {
        $('#thcfg_form').submit(function() {
            var code = JSON.stringify(collect());
            if($('#thcfg_saveas :selected').val() == 'see') {
                alert(code);
                return false;
            }
            return true;
        });
        
        $('#thcfg_showadvanced').click(function() {
            $('#thcfg_advanced').toggle();
            return false;
        });
        $('#thcfg_settings input.colorvalue').each(function() {
            var id = $(this).attr('id').replace(/thcfg_col_/,'');
            $(this).change(function() {
                update_color($(this).val(), id);
            });
            var source = $(this);
            $(this).after('<div id="colorpicker_' + id + '"></div>');
            var picker = $.farbtastic('#colorpicker_' + id, function(color) {
                $('#thcfg_col_' + id).val(color);
                update_color(color, id);
            });
            picker.setColor($(this).val());
            $('#colorpicker_' + id).css('margin-top', '20px');
        });
        $('#thcfg_settings .colorselector').click(function() {
            var dest = $(this).children('a').attr('href');
            var id = dest.substr(1);
            $('#thcfg_settings .colorselector').removeClass('selected');
            $('#thcfg_settings .colorselector_' + id).addClass('selected');
            $('#thcfg_settings li.colorvalue').hide();
            $('#thcfg_settings li.colorvalue_' + id).show();
            return false;
        })
    });
})(jQuery);
