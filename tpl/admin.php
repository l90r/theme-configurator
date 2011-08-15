<?php

function thcfg_control_div() {
?>
    <ul class="thcfg_control">
        <li class="thcfg_add"><a href="#">Add</a></li>
        <li class="thcfg_edit"><a href="#">Edit</a></li>
        <li class="thcfg_remove"><a href="#">Remove</a></li>
        <li class="thcfg_up"><a href="#">Move Up</a></li>
        <li class="thcfg_down"><a href="#">Move Down</a></li>
    </ul>
<?php

}
?>
<div id="thcfg_admin" class="wrap thcfg">
<h2>Theme Configurator</h2>
    
<?php if($msg) : ?>
<div id="message" class="updated"><p>
    <?php echo htmlspecialchars($msg) ?>
</p></div>
<?php endif ?>

<h3>Structure</h3>

<form id="thcfg_structure" method="post">

<ul class="thcfg_tabs">
    <li id="thcfg_tab_color" class="thcfg_selected"><a href="#color">Colors</a></li>
    <li id="thcfg_tab_dimension"><a href="#dimension">Dimensions</a></li>
    <li id="thcfg_tab_text"><a href="#text">Text</a></li>
    <li id="thcfg_tab_general"><a href="#general">General</a></li>
</ul>

<div class="thcfg_tabwrap">
    <div id="thcfg_section_color" class="thcfg_section">
        <div class="thcfg_overview">
            <h3>Colors</h3>
            <select id="thcfg_list_color" size="10">
<?php foreach( $colors as $color ) : ?>
                <option value="<?php echo $color->slug ?>">
                    <?php echo htmlspecialchars($color->title) ?>
                    (<?php echo htmlspecialchars($color->id) ?>)
                </option>
<?php endforeach ?>
            </select>
            <?php thcfg_control_div() ?>
        </div>
        <div class="thcfg_detail" style="display:none">
            <h3 class="thcfg_add_only">Add Color</h3>
            <h3 class="thcfg_edit_only" style="display:none">Edit Color</h3>
            <ul>
                <li>
                    <label for="thcfg_color_name">Name</label>
                    <input type="text" id="thcfg_color_id"/>
                </li>
                <li>
                    <label for="thcfg_color_title">Title</label>
                    <input type="text" id="thcfg_color_title"/>
                </li>
            </ul>
            <a href="#" class="thcfg_save_add button thcfg_add_only">Save</a>
            <a href="#" class="thcfg_save_edit button thcfg_edit_only" style="display:none">Save</a>
            <a href="#" class="thcfg_cancel button" class="button">Cancel</a>
        </div>
        <div class="thcfg_data">

        </div>
    </div>
    <div id="thcfg_section_dimension" class="thcfg_section" style="display:none">
        Dimensions section - to be implemented
    </div>
    <div id="thcfg_section_text" class="thcfg_section" style="display:none">
        Text section - to be implemented
    </div>
    <div id="thcfg_section_general" class="thcfg_section" style="display:none">
        General section - to be implemented
    </div>
</div>

<input type="submit" name="submit" id="submit" class="button-primary" value="Save Changes">
</form>

<h3>Storage</h3>

<form id="thcfg_storage" method="post">

</form>

<div class="credits">
    More about the theme-configurator plugin <a href="http://www.l90r.com/posts/wordpress-theme-configurator">here</a>.
    Feedback and suggestions are welcome.
</div>
    
</div>


