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

<form id="thcfg_structure_form" method="post">

<ul class="thcfg_tabs">
    <li id="thcfg_tab_color" class="thcfg_selected"><a href="#color">Colors</a></li>
    <li id="thcfg_tab_dimension"><a href="#dimension">Dimensions</a></li>
    <li id="thcfg_tab_text"><a href="#text">Text</a></li>
    <li id="thcfg_tab_general"><a href="#general">General</a></li>
</ul>

<div class="thcfg_tabwrap">
    <div id="thcfg_section_color" class="thcfg_section">
        <div class="thcfg_overview">
            <h4>Colors</h4>
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
            <h4 class="thcfg_add_only">Add Color</h4>
            <h4 class="thcfg_edit_only" style="display:none">Edit Color</h4>
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
            <h4>Dimensions</h4>
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
            <h4 class="thcfg_add_only">Add Dimension</h4>
            <h4 class="thcfg_edit_only" style="display:none">Edit Dimension</h4>
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
            <h4>Text</h4>
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
            <h4 class="thcfg_add_only">Add Text Field</h4>
            <h4 class="thcfg_edit_only" style="display:none">Edit Text Field</h4>
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
        <h4>Visibility</h4>
        <ul class="htcfg_visibility">
            <li>
                <label for="thcfg_visibility_color">Show Colors screen</label>
                <input type="checkbox" id="thcfg_visibility_color" name="screens[]" value="color" <?php if(in_array('color', $screens)) : ?>checked="checked"<?php endif ?>>
            </li>
            <li>
                <label for="thcfg_visibility_dimension">Show Dimensions screen</label>
                <input type="checkbox" id="thcfg_visibility_dimension" name="screens[]" value="dimension" <?php if(in_array('dimension', $screens)) : ?>checked="checked"<?php endif ?>>
            </li>
            <li>
                <label for="thcfg_visibility_text">Show Text screen</label>
                <input type="checkbox" id="thcfg_visibility_text" name="screens[]" value="text" <?php if(in_array('text', $screens)) : ?>checked="checked"<?php endif ?>>
            </li>
        </ul>            
        <h4>Representation</h4>
        <ul class="htcfg_representation">
            <li>
                <label for="thcfg_prefix">Prefix for Wordpress options</label>
                <input type="text" id="thcfg_prefix" name="prefix" value="<?php echo htmlspecialchars($prefix) ?>">
            </li>
        </ul>
            
    </div>
</div>
<input type="hidden" name="structure" id="thcfg_structure">
<input type="submit" name="action" id="submit" class="button-primary" value="Save Changes">
</form>

<p><a href="#" id="thcfg_show_storage">Show storage options...</a></p>
<div id="thcfg_storage" style="display:none">
<p><a href="#" id="thcfg_hide_storage">Hide storage options...</a></p>
<h3>Storage</h3>
<?php switch($dirty) : ?>
<?php   case THCFG_DEFAULT: ?>
<p>You are currently using sample settings, retreived from the plugin itself.</p>
<?php   break; case THCFG_CLEAN: ?>
<p>Settings in the database and on your theme are in sync.</p>
<?php   break; case THCFG_DIRTY: ?>
<p>Settings in the database have been modified.</p>
<?php   break ?>
<?php endswitch ?>
<form action="#" method="post">
<input type="submit" name="save_to_theme" value="Update theme's settings" class="button-primary" />
<input type="submit" name="reset_to_theme" value="Reset to theme's settings" class="button" />
<input type="submit" name="reset_to_default" value="Reset to plugin defaults" class="button" />
</form>
<p>Alternatively you can manually save
<a href="admin-ajax.php?action=thcfg_structure">structure</a> and
<a href="admin-ajax.php?action=thcfg_settings">settings</a> data as thcfg-structure.json and thcfg-settings.json respectively
within your theme's root directory, in order to distribute your current settings with your theme.</p>
</div>
<form id="thcfg_storage" method="post">

</form>

<div class="credits">
    More about the theme-configurator plugin <a href="http://www.l90r.com/posts/wordpress-theme-configurator">here</a>.
    Feedback and suggestions are welcome.
</div>
    
</div>


