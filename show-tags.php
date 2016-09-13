<?php
/*
Plugin Name: Show tags
Plugin URI: http://thousandonestories.com/
Description: Show tags at the top of a post.
Version: 1.0
Author: Edward King
Author URI: http://twitter.com/edjamesking
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
