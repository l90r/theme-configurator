<div id="thcfg_settings" class="wrap thcfg thcfg_<?php echo $section ?>">
<h2><?php echo $heading ?></h2>
    
<?php if($msg) : ?>
<div id="message" class="updated"><p>
    <?php echo htmlspecialchars($msg) ?>
</p></div>
<?php endif ?>

<form id="thcfg_form" method="post">
