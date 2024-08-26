<?php
function blue_border_setup() {
    add_theme_support('title-tag');
    // サムネイル画像設定
    add_theme_support( 'post-thumbnails' );
    add_image_size('page_eyecatch',350,300,true);
}
add_action('after_setup_theme', 'blue_border_setup');

function blue_border_enqueue_scripts() {
    // AOSのCSSとJavaScriptを読み込む
    wp_enqueue_style('aos-css', 'https://unpkg.com/aos@next/dist/aos.css');
    wp_enqueue_script('aos-js', 'https://unpkg.com/aos@next/dist/aos.js', array(), null, true);
    // fontawesomeのcssを読み込む
    wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v6.2.0/css/all.css', array(), null, 'all');
    // 独自のｃｓｓを読み込む
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/style.css', array(), '1.0.0', 'all');
    // 独自のスクリプトを読み込む
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/script.js', array('aos-js'), '1.0.0', 'all',100);
}
add_action('wp_enqueue_scripts', 'blue_border_enqueue_scripts');
