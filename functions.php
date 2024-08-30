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
    // jQueryを読み込む（WordPressのバンドルを使用）
    wp_enqueue_script('jquery');
    // fontawesomeのcssを読み込む
    wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v6.2.0/css/all.css', array(), null, 'all');
    // 独自のｃｓｓを読み込む
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/style.css', array(), '1.0.0', 'all');
    // 独自のスクリプトを読み込む
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/script.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'blue_border_enqueue_scripts');

// ページネーション
function custom_pagination($paged = '', $max_page = '') {
    if (!$paged) {
        $paged = get_query_var('paged');
    }
    if (!$max_page) {
        global $wp_query;
        $max_page = $wp_query->max_num_pages;
    }

    if ($max_page <= 1) return; // 1ページしかない場合、ページネーションを表示しない

    echo '<ol class="pagination-3">';
    
    // 前のページ
    if ($paged > 1) {
        echo '<li class="prev"><a href="' . get_pagenum_link($paged - 1) . '"><</a></li>';
    } else {
        echo '<li class="prev disabled"><span><</span></li>';
    }
    
    // ページ番号のループ
    for ($i = 1; $i <= $max_page; $i++) {
        if ($i == $paged) {
            echo '<li class="current"><a href="#">' . $i . '</a></li>';
        } else {
            echo '<li><a href="' . get_pagenum_link($i) . '">' . $i . '</a></li>';
        }
    }
    
    // 次のページ
    if ($paged < $max_page) {
        echo '<li class="next"><a href="' . get_pagenum_link($paged + 1) . '">></a></li>';
    } else {
        echo '<li class="next disabled"><span>></span></li>';
    }

    echo '</ol>';
}