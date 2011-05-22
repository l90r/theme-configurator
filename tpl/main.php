        <fieldset class="colors">
            <h3>Color Scheme</h3>
            <ul class="selector">
<?php $first = true; foreach($structure->colors as $item) : $id = $item->id; $title = htmlspecialchars($item->title) ?>
                <li class="colorselector colorselector_<?php echo $id ?><?php if($first) { echo ' selected'; $first=false; } ?>">
                    <div class="color-sample" id="thcfg_sample_<?php echo $id ?>" style="background-color:<?php echo htmlspecialchars($colors[$id]) ?>"></div>
                    <a href="#<?php echo $id ?>" id="thcfg_color_link_<?php echo "{$id}" ?>"><?php echo $title ?></a>
                </li>
<?php endforeach ?>
            </ul>
            <ul class="values">
<?php $first = true; foreach($structure->colors as $item) : $id = $item->id; $title = htmlspecialchars($item->title) ?>
                <li class="colorvalue colorvalue_<?php echo $id ?><?php if($first) { echo ' selected'; $first=false; } ?>">
                    <label for="thcfg_col_<?php echo "{$id}" ?>">Color code</label>
                    <input type="text" class="colorvalue" id="thcfg_col_<?php echo $id ?>" name="<?php echo $id ?>" value="<?php echo htmlspecialchars($colors[$id]) ?>">
                </li>
<?php endforeach ?>
            </ul>
        </fieldset>
    
        <fieldset class="images">
            <h3>Images</h3>
            <ul class="inside">
<?php foreach($structure->images as $item) : $id = $item->id; $title = htmlspecialchars($item->title) ?>
                <li>
                    <label for="thcfg_img_<?php echo $id ?>"><?php echo $title ?></label>
                    <input class="imagevalue" type="text" id="thcfg_img_<?php echo $id ?>" name="<?php echo $id ?>" value="<?php echo htmlspecialchars($images[$id]) ?>">
                </li>
<?php endforeach; ?>
            </ul>
        </fieldset>
        
        <fieldset class="phrases">
            <h3>Text Phrases</h3>
            <ul class="inside">
<?php foreach($structure->phrases as $item) : $id = $item->id; $title = htmlspecialchars($item->title) ?>
                <li>
                    <label for="thcfg_txt_<?php echo "{$id}" ?>"><?php echo $title ?></label>
                    <input class="phrasevalue" type="text" id="thcfg_txt_<?php echo $id ?>" name="<?php echo $id ?>" value="<?php echo htmlspecialchars($phrases[$id]) ?>">
                </li>
<?php endforeach ?>
            </ul>
        </fieldset>
        <div>
            <a id="thcfg_showadvanced" href="#">Advanced options</a>
        </div>
        <div id="thcfg_advanced" style="display:none">
            Go to <a href="<?php echo $uri_admin ?>">Theme Configuration Structure page &raquo;</a>
            <label class="saveas"><select id="thcfg_saveas" name="saveas">
                <option value="db" selected="selected">Save to Database</option>
                <option value="theme">Save as file to current theme</option>
                <option value="see">See code</option>
            </select></label>
        </div>
        </div>
