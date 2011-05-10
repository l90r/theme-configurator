<div id="thcfg_settings" class="wrap">
    <h2>Theme Settings</h2>
    
    <form method="post">
        <fieldset class="colors">
            <h3>Color Scheme</h3>
            <ul class="selector">
<?php $first = true; foreach($color_def as $id => $title) : ?>
                <li class="colorselector colorselector_<?php echo $id ?><?php if($first) { echo ' selected'; $first=false; } ?>">
                    <div class="color-sample" id="thcfg_sample_<?php echo $id ?>" style="background-color:<?php echo htmlspecialchars($colors[$id]) ?>"></div>
                    <a href="#<?php echo $id ?>" id="thcfg_color_link_<?php echo "{$id}" ?>"><?php echo $title ?></a>
                </li>
<?php endforeach ?>
            </ul>
            <ul class="values">
<?php $first = true; foreach($colors as $id => $title) : ?>
                <li class="colorvalue colorvalue_<?php echo $id ?><?php if($first) { echo ' selected'; $first=false; } ?>">
                    <label for="thcfg_col_<?php echo "{$id}" ?>">Color code</label>
                    <input type="text" class="colorvalue" id="thcfg_col_<?php echo "{$id}" ?>" name="colors[<?php echo $id ?>]>" value="<?php echo htmlspecialchars($colors[$id]) ?>">
                </li>
<?php endforeach ?>
            </ul>
        </fieldset>
        
        <fieldset class="content">
            <h3>Tabs</h3>
            <ul class="inside">
                <li>
                    <label for="thcfg_tags">Tags</label>
                    <input type="text" id="thcfg_tags" name="thcfg_tags" value="<?php echo htmlspecialchars(implode(', ', $tags)) ?>">
                </li>
                <li>
                    <label for="thcfg_pages">Pages</label>
                    <input type="text" id="thcfg_pages" name="thcfg_pages" value="<?php echo htmlspecialchars(implode(', ', $pages)) ?>">
                </li>
            </ul>
        </fieldset>
    
        <fieldset class="images">
            <h3>Images</h3>
            <ul class="inside">
<?php foreach($img_def as $id => $title) : ?>
                <li>
                    <label for="thcfg_img_<?php echo $id ?>"><?php echo $title ?></label>
                    <input type="text" id="thcfg_img_<?php echo $id ?>" name="img['<?php echo $id ?>']" value="<?php echo htmlspecialchars($img[$id]) ?>">
                </li>
<?php endforeach; ?>
            </ul>
        </fieldset>
        
        <fieldset class="phrases">
            <h3>Text Phrases</h3>
            <ul class="inside">
<?php foreach($phrase_def as $id => $title) : ?>
                <li>
                    <label for="thcfg_txt_<?php echo "{$id}" ?>"><?php echo $title ?></label>
                    <input type="text" id="thcfg_txt_<?php echo $id ?>" name="thcfg_txt[<?php echo $id ?>]" value="<?php echo htmlspecialchars($phrases[$id]) ?>">
                </li>
<?php endforeach ?>
            </ul>
        </fieldset>
        <input type="submit" name="submit" id="submit" class="button-primary" value="Save Changes">
    </form>

    <div class="credits">
        The Theme Configurator plugin has been created by hacker and jazz pianist Igor Prochazka
        for his own personal blog at <a href="http://www.l90r.com/">www.l90r.com</a><br>
        For more information and feedback please go to the
        official plugin page at <a href="http://www.l90r.com/posts/wordpress-theme-configurator">
        www.l90r.com/posts/wordpress-theme-configurator</a>.<br/>
    </div>
    
</div>


