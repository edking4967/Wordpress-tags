<?php
/*
Plugin Name: Show tags
Plugin URI: http://github.com/edking4967/wordpress-tags
Description: Show tags at the top of a post.
Version: 1.0
Author: Edward King
Author URI: http://github.com/edking4967
License: GPL
*/

add_filter('the_content','show_tags');

//Callback function
function show_tags($content)
{
    $posttags = get_the_tags();
    $tags = "";
    if (in_category('Stories') && in_the_loop() && $posttags )
    {
        foreach($posttags as $tag) {
            $tags = $tags . "<a href=\"" . site_url() . "/stories/" . str_replace(' ', '-', $tag->name) . "\">";
            $tags = $tags . "#" . $tag->name  ;
            $tags = $tags . "</a> ";
         }
    }
    return $tags . $content;
}

?>
