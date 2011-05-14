<script type="text/x-jquery-tmpl" id="thcfg_tpl_idtitle">
    <tr>
        <td class="draghandle"></td>
        <td class="id"><input class="id" type="text" value="${id}"></td>
        <td class="title"><input class="title" type="text" value="${title}"></td>
        <td class="itemrem"><a href="#" class="itemrem">(x)</a></td>
    </tr>
</script>

<script type="text/x-jquery-tmpl" id="thcfg_tpl_contents">
    <tr>
        <td class="draghandle"></td>
        <td class="id"><input class="id" type="text" value="${id}"></td>
        <td class="title"><input class="title" type="text" value="${title}"></td>
        <td class="type">
            <select id="${type}">
                <option value="post" {{if type=='post'}}selected="selected"{{/if}} >Post</option>
                <option value="page" {{if type=='page'}}selected="selected"{{/if}}>Page</option>
                <option value="tag" {{if type=='tag'}}selected="selected"{{/if}}>Tag</option>
                <option value="category" {{if type=='category'}}selected="selected"{{/if}}>Category</option>
                <option value="postlist" {{if type=='postlist'}}selected="selected"{{/if}}>Post list</option>
                <option value="pagelist" {{if type=='pagelist'}}selected="selected"{{/if}}>Page list</option>
                <option value="taglist" {{if type=='taglist'}}selected="selected"{{/if}}>Tag list</option>
                <option value="categorylist" {{if type=='categorylist'}}selected="selected"{{/if}}>Category list</option>
            </select>
        </td>
        <td class="itemrem"><a href="#" class="itemrem">(x)</a></td>
    </tr>
</script>

<script type="text/javascript">
//<![CDATA[
    var thcfg_colors = <?php echo json_encode($this->structure->colors) ?>;
    var thcfg_contents = <?php echo json_encode($this->structure->contents) ?>;
    var thcfg_images = <?php echo json_encode($this->structure->images) ?>;
    var thcfg_phrases = <?php echo json_encode($this->structure->phrases) ?>;
//]]>
</script>
<script type="text/javascript" src="<?php echo THCFG_URL ?>/js/admin.js"></script>
<script type="text/javascript" src="<?php echo THCFG_URL ?>/3rd/jquery/jquery-tmpl.min.js"></script>
<link rel="stylesheet" href="<?php echo THCFG_URL ?>/style.css" type="text/css">

