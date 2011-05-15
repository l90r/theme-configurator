<div id="thcfg_admin" class="wrap thcfg">
    <h2>Theme Configuration Structure</h2>
    
<?php if($msg) : ?>
    <div id="message" class="updated"><p>
        <?php echo htmlspecialchars($msg) ?>
    </p></div>
<?php endif ?>

    <form id="thcfg_form" method="post">
        <h3>Colors</h3>
        <table class="wp-list-table widefat fixed">
            <thead>
                <tr>
                    <th class="draghandle"></th>
                    <th class="id">ID</th>
                    <th class="title">Title</th>                
                    <th class="itemrem"></th>                
                </tr>
            </thead>
            <tbody id="thcfg_colors">
            </tbody>
            <tfoot>
                <tr><th colspan="4">
                    <a href="#" id="thcfg-add-color" class="button">Add Color</a>
                </th></tr>
            </tfoot>
        </table>
        
        <h3>Contents</h3>
        <table class="wp-list-table widefat fixed">
            <thead>
                <tr>
                    <th class="draghandle"></th>
                    <th class="id">ID</th>
                    <th class="title">Title</th>                
                    <th class="type">Type</th>                
                    <th class="itemrem"></th>                
                </tr>
            </thead>
            <tbody id="thcfg_contents">
            </tbody>
            <tfoot>
                <tr><th colspan="5">
                    <a href="#" id="thcfg-add-content" class="button">Add Content Links</a>
                </th></tr>
            </tfoot>
        </table>
    
        <h3>Images</h3>
        <table class="wp-list-table widefat fixed">
            <thead>
                <tr>
                    <th class="draghandle"></th>
                    <th class="id">ID</th>
                    <th class="title">Title</th>                
                    <th class="itemrem"></th>                
                </tr>
            </thead>
            <tbody id="thcfg_images">
            </tbody>
            <tfoot>
                <tr><th colspan="4">
                    <a href="#" id="thcfg-add-image" class="button">Add Image</a>
                </th></tr>
            </tfoot>
        </table>
        
        <h3>Text Phrases</h3>
        <table class="wp-list-table widefat fixed">
            <thead>
                <tr>
                    <th class="draghandle"></th>
                    <th class="id">ID</th>
                    <th class="title">Title</th>                
                    <th class="itemrem"></th>                
                </tr>
            </thead>
            <tbody id="thcfg_phrases">
            </tbody>
            <tfoot>
                <tr><th colspan="4">
                    <a href="#" id="thcfg-add-phrase" class="button">Add Phrase</a>
                </th></tr>
            </tfoot>
        </table>

        <div id="thcfg_advanced">
            &laquo; Go back to <a href="<?php echo $uri_main ?>">Theme Settings page</a>
            <label class="saveas"><select id="thcfg_saveas" name="saveas">
                <option value="db" selected="selected">Save to Database</option>
                <option value="theme">Save as file to current theme</option>
                <option value="see">See code</option>
            </select></label>
        </div>
              <input type="submit" name="submit" id="submit" class="button-primary" value="Save Changes">
        </div>
    </form>
    <div class="credits">
        See information on how to make your theme configurable <a href="http://www.l90r.com/posts/wordpress-theme-configurator">here</a>
    </div>
    
</div>


