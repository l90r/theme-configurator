<fieldset class="colors">
    <h3>Color Scheme</h3>
    <ul class="selector">
<?php $first = true; foreach($items as $item) : $id = $item->id; $title = htmlspecialchars($item->title) ?>
        <li class="colorselector colorselector_<?php echo $id ?><?php if($first) { echo ' selected'; $first=false; } ?>">
            <div class="color-sample" id="thcfg_sample_<?php echo $id ?>" style="background-color:<?php echo htmlspecialchars($colors[$id]) ?>"></div>
            <a href="#<?php echo $id ?>" id="thcfg_color_link_<?php echo "{$id}" ?>"><?php echo $title ?></a>
        </li>
<?php endforeach ?>
    </ul>
    <ul class="values">
<?php $first = true; foreach($items as $item) : $id = $item->id; $title = htmlspecialchars($item->title) ?>
        <li class="colorvalue colorvalue_<?php echo $id ?><?php if($first) { echo ' selected'; $first=false; } ?>">
            <label for="thcfg_col_<?php echo "{$id}" ?>">Color code</label>
            <input type="text" class="colorvalue" id="thcfg_col_<?php echo $id ?>" name="<?php echo $id ?>" value="<?php echo htmlspecialchars($values[$id]) ?>">
        </li>
<?php endforeach ?>
    </ul>
</fieldset>
