
(function($) {
    $(function() {
        $('.thcfg_slider').each(function(idx) {
            var obj = $(this);
            var min = parseInt(obj.attr('thcfg_min'));
            var max = parseInt(obj.attr('thcfg_max'));
			var knob = obj.closest('li').find('.thcfg_knob');
            knob.slider({
                'min': min,
                'max': max,
                'slide': function( event, ui ) {
    				obj.val(ui.value);
                }
			});
			knob.slider("value", obj.val());
			obj.change(function() {
				knob.slider("value", obj.val());
			});
        });
    });
})(jQuery);
