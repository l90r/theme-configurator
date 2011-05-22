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
