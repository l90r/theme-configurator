<fieldset class="contents">
    <h3>Contents</h3>
    <ul class="inside">
<?php foreach($structure->contents as $item) : $id = $item->id; $title = htmlspecialchars($item->title) ?>
        <li>
            <label for="thcfg_tags"><?php echo $title ?></label>
            <input class="contentvalue" type="text" id="thcfg_content_<?php echo $id ?>" name="<?php echo $id ?>" value="<?php echo htmlspecialchars(implode(', ', $contents[$id])) ?>">
        </li>
<?php endforeach ?>
    </ul>
</fieldset>
