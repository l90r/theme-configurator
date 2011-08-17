<?php function thcfg_tpl_list_control() { ?>
    <ul class="thcfg_control">
        <li class="thcfg_add"><a href="#" class="button">Add</a></li>
        <li class="thcfg_edit"><a href="#" class="button">Edit</a></li>
        <li class="thcfg_remove"><a href="#" class="button">Remove</a></li>
        <li class="thcfg_up"><a href="#" class="button">Move Up</a></li>
        <li class="thcfg_down"><a href="#" class="button">Move Down</a></li>
    </ul>
<?php } ?>

<?php function thcfg_tpl_detail_control() { ?>
    <a href="#" class="thcfg_save_add button thcfg_add_only">Save</a>
    <a href="#" class="thcfg_save_edit button thcfg_edit_only" style="display:none">Save</a>
    <a href="#" class="thcfg_cancel button" class="button">Cancel</a>
<?php } ?>

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
            <?php thcfg_tpl_list_control() ?>
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
            <?php thcfg_tpl_detail_control() ?>
        </div>
    </div>
    <div id="thcfg_section_dimension" class="thcfg_section" style="display:none">
        <div class="thcfg_overview">
            <h3>Dimensions</h3>
            <select id="thcfg_list_dimension" size="10">
<?php foreach( $dimensions as $dimension ) : ?>
                <option value="<?php echo $dimension->slug ?>">
                    <?php echo htmlspecialchars($dimension->title) ?>
                    (<?php echo htmlspecialchars($dimension->id) ?>)
                </option>
<?php endforeach ?>
            </select>
            <?php thcfg_tpl_list_control() ?>
        </div>
        <div class="thcfg_detail" style="display:none">
            <h3 class="thcfg_add_only">Add Dimension</h3>
            <h3 class="thcfg_edit_only" style="display:none">Edit Dimension</h3>
            <ul>
                <li>
                    <label for="thcfg_dimension_name">Name</label>
                    <input type="text" id="thcfg_dimension_id"/>
                </li>
                <li>
                    <label for="thcfg_dimension_title">Title</label>
                    <input type="text" id="thcfg_dimension_title"/>
                </li>
                <li>
                    <label for="thcfg_dimension_title">Minimum</label>
                    <input type="text" id="thcfg_dimension_min"/>
                </li>
                <li>
                    <label for="thcfg_dimension_title">Maximum</label>
                    <input type="text" id="thcfg_dimension_max"/>
                </li>
            </ul>
            <?php thcfg_tpl_detail_control() ?>
        </div>
    </div>
    <div id="thcfg_section_text" class="thcfg_section" style="display:none">
        <div class="thcfg_overview">
            <h3>Text</h3>
            <select id="thcfg_list_text" size="10">
<?php foreach( $text as $txt ) : ?>
                <option value="<?php echo $txt->slug ?>">
                    <?php echo htmlspecialchars($txt->title) ?>
                    (<?php echo htmlspecialchars($txt->id) ?>)
                </option>
<?php endforeach ?>
            </select>
            <?php thcfg_tpl_list_control() ?>
        </div>
        <div class="thcfg_detail" style="display:none">
            <h3 class="thcfg_add_only">Add Text Field</h3>
            <h3 class="thcfg_edit_only" style="display:none">Edit Text Field</h3>
            <ul>
                <li>
                    <label for="thcfg_text_name">Name</label>
                    <input type="text" id="thcfg_text_id"/>
                </li>
                <li>
                    <label for="thcfg_text_title">Title</label>
                    <input type="text" id="thcfg_text_title"/>
                </li>
            </ul>
            <?php thcfg_tpl_detail_control() ?>
        </div>
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


