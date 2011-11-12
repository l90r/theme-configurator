
(function($) {
    $(function() {
        $('.thcfg-slider').each(function(idx) {
            var obj = $(this);
            var min = parseInt(obj.attr('thcfg_min'));
            var max = parseInt(obj.attr('thcfg_max'));
            var knob = $('<div>');
            obj.after(knob);
            knob.slider({
                'min': min,
                'max': max,
                'slide': function( event, ui ) {
    				obj.val(ui.value);
                }
			});
        });
    });
})(jQuery);
