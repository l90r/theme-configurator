<fieldset class="text thcfg">
    <ul>
<?php foreach($items as $item) : $id = $item->id; $title = htmlspecialchars($item->title); ?>
<?php $value = $values[$id] ?>
        <li>
            <div class="thcfg_left">
                <label for="thcfg_<?php echo $id ?>"><?php echo $title ?></label>
                <input class="thcfg_slider"
                    type="text" id="thcfg_<?php echo $id ?>"
                    name="<?php echo $id ?>"
                    thcfg_min="<?php echo $item->min ?>"
                    thcfg_max="<?php echo $item->max ?>"
                    value="<?php echo $value ?>">
            </div>
            <div class="thcfg_right"><div class="thcfg_knob"></div></div>
        </li>
<?php endforeach ?>
    </ul>
</fieldset>
