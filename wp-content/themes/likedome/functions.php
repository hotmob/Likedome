<?php

define('PADD_THEME_NAME','Likedome');
define('PADD_THEME_VERS','1.0');
define('PADD_THEME_SLUG','likedome');
define('PADD_NAME_SPACE','padd');
define('PADD_GALL_THUMB_W',960);
define('PADD_GALL_THUMB_H',400);
define('PADD_LIST_THUMB_W',270);
define('PADD_LIST_THUMB_H',144);
define('PADD_YTUBE_W',255);
define('PADD_YTUBE_H',180);
define('PADD_THEME_FWVER','2.6.7');

define('PADD_THEME_PATH',get_theme_root() . DIRECTORY_SEPARATOR . PADD_THEME_SLUG);
define('PADD_FUNCT_PATH',PADD_THEME_PATH . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR);

remove_action('wp_head','wp_generator');

add_theme_support('post-thumbnails');
add_theme_support('automatic-feed-links');

register_nav_menus(array(
	'main' => 'Main Menu',
));

set_post_thumbnail_size(PADD_LIST_THUMB_W,PADD_LIST_THUMB_H,true);
add_image_size(PADD_THEME_SLUG . '-thumbnail',PADD_LIST_THUMB_W,PADD_LIST_THUMB_H,true);
add_image_size(PADD_THEME_SLUG . '-gallery',PADD_GALL_THUMB_W,PADD_GALL_THUMB_H,true);
add_image_size(PADD_THEME_SLUG . '-related-posts',136,70,true);

function padd_widgets_init() {
//	register_sidebar(array(
//		'name' => '赛事热点',
//		'before_widget' => '<div id="%1$s" class="margin-l18 flo width-600">',
//		'after_widget' => '</div></div>',
//		'before_title' => '<div class="title"><h2>',
//		'after_title' => '</h2></div><div class="interior">',
//	));
	register_sidebar(array(
		'name' => '侧边区域',
		'before_widget' => '<div id="%1$s" class="margin-r18 fro width-300">',
		'after_widget' => '</div></div>',
		'before_title' => '<div class="title2"><h3 class="flo">',
		'after_title' => '</h3></div><div class="tab1">',
	));
}
add_action('widgets_init','padd_widgets_init');

require PADD_FUNCT_PATH . 'library.php';
require PADD_FUNCT_PATH . 'hooks.php';

require PADD_FUNCT_PATH . 'classes' . DIRECTORY_SEPARATOR . 'socialnetwork.php';
require PADD_FUNCT_PATH . 'classes' . DIRECTORY_SEPARATOR . 'socialbookmark.php';
require PADD_FUNCT_PATH . 'classes' . DIRECTORY_SEPARATOR . 'widgets.php';
require PADD_FUNCT_PATH . 'classes' . DIRECTORY_SEPARATOR . 'twitter.php';
require PADD_FUNCT_PATH . 'classes' . DIRECTORY_SEPARATOR . 'pagination.php';
require PADD_FUNCT_PATH . 'classes' . DIRECTORY_SEPARATOR . 'walker.php';
require PADD_FUNCT_PATH . 'classes' . DIRECTORY_SEPARATOR . 'input' . DIRECTORY_SEPARATOR . 'input-option.php';
require PADD_FUNCT_PATH . 'classes' . DIRECTORY_SEPARATOR . 'input' . DIRECTORY_SEPARATOR . 'input-socialnetwork.php';

require PADD_FUNCT_PATH . 'defaults.php';

require PADD_FUNCT_PATH . 'administration' . DIRECTORY_SEPARATOR . 'options-functions.php';
require PADD_FUNCT_PATH . 'administration' . DIRECTORY_SEPARATOR . 'posting-functions.php';

require PADD_FUNCT_PATH . 'launch.php';

function mytheme_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;?>
    <li>
        <div class="comment-listInfo"><?php printf(__('<span>%s</span>'), get_comment_author_link()) ?><?php printf(__('<span>%s</span>'), get_comment_author_ip()) ?><?php printf(__('<span>%s</span>'), comment_time()) ?></div>
        <p><?php comment_text() ?> </p>
    </li>
    <?php
}