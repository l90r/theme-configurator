<?php

$default = '{
    "colors":{
        "bg": "#666",
        "border": "#000",
        "contentbg": "#fff",
        "framebg": "#eee",
        "tagtabtxt": "#fff",
        "tagtabbg": "#a00",
        "pagetabtxt": "#000",
        "pagetabbg": "#0a0",
        "hd": "#006",
        "txt": "#333",
        "lnk": "#000",
        "date": "#555"
    },
    "phrases":{
        "readon": "Read on...",
        "older": "Load older posts...",
        "counter": "Comments",
        "comments": "Comments",
        "request": "Please, leave a comment here",
        "name": "Name",
        "email": "Mail (will not be published)",
        "web": "Website",
        "submit": "Submit Comment",
        "empty": "No more posts"
    },
    "img":{
        "bg": "' . get_bloginfo('stylesheet_directory') . '/img/bg.jpg' . '",
        "title": "' . get_bloginfo('stylesheet_directory') . '/img/title.png' . '",
        "loading": "' . get_bloginfo('stylesheet_directory') . '/img/wait.gif' . '"
    },
    "tags": [ "tag1", "tag2" ],
    "pages": [ "about" ]
}';

$json = get_option('paradigma_settings', $default);
$settings = json_decode($json, true);
if(!$settings) {
    
}

pdgm_display(json_decode($default, true));

function pdgm_display($values) {
    
    extract($values);
    
    $color_def = array(
        "bg" => "Page Background",
        "border" => "Border",
        "contentbg" => "Content Background",
        "framebg" => "Frame Background",
        "tagtabbg" => "Tag Tab Background",
        "tagtabtxt" => "Tag Tab Text",
        "pagetabbg" => "Page Tab Background",
        "pagetabtxt" => "Page Tab Text",
        "hd" => "Headings",
        "txt" => "Text",
        "lnk" => "Links",
        "date" => "Dates"
    );
    
    $phrase_def = array(
        "readon" => "Go to entire post",
        "older" => "Load older posts",
        "counter" => "Comments Counter",
    );
    
    $img_def = array(
        "bg" => "Background Image URL",
        "title" => "Title Image URL",
        "loading" => "Loading Image URL"
    );

    include('template.php');
}

