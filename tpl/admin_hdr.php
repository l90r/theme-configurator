<script type="text/x-jquery-tmpl" id="thcfg_idtitle">
    <tr>
        <td class="draghandle"></td>
        <td class="id"><input class="id" type="text" value="${id}"></td>
        <td class="title"><input class="title" type="text" value="${title}"></td>
        <td class="itemrem"><a href="#" class="itemrem">(x)</a></td>
    </tr>
</script>

<script type="text/javascript">
//<![CDATA[
    var thcfg_colors = <?php echo json_encode($this->structure->colors) ?>;
//]]>
</script>
<script type="text/javascript" src="<?php echo THCFG_URL ?>/js/admin.js"></script>
<script type="text/javascript" src="<?php echo THCFG_URL ?>/3rd/jquery/jquery-tmpl.min.js"></script>
<link rel="stylesheet" href="<?php echo THCFG_URL ?>/style.css" type="text/css">

