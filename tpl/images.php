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
