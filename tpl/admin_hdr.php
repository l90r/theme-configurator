<script type="text/x-jquery-tmpl" id="thcfg_tpl_option">
    <option value="${id}">${title} (${id})</option>
</script>

<script type="text/javascript">
//<![CDATA[
    var thcfg_colors = <?php echo json_encode($colors) ?>;
    var thcfg_dimensions = <?php echo json_encode($dimensions) ?>;
    var thcfg_text = <?php echo json_encode($text) ?>;
//]]>
</script>

<script type="text/javascript" src="<?php echo THCFG_URL ?>/js/admin.js"></script>
<script type="text/javascript" src="<?php echo THCFG_URL ?>/3rd/jquery/jquery-tmpl.min.js"></script>
<link rel="stylesheet" href="<?php echo THCFG_URL ?>/style.css" type="text/css">

