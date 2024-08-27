<?php get_header(); ?>
<main class="project-detail">
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <article class="single-works" data-aos="fade-right" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h2>Works</h2>
                <?php 
                $project_screenshot_link = get_field('project_screenshot_link'); 
                ?>
                <a class="h3-hover project-screenshot-link" href="<?php echo esc_url($project_screenshot_link); ?>">
                    <h3 class="project-title single-h3"><?php the_title(); ?></h3>
                </a>
                <div class="works-wrapper">
                    <div class="project-header">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php echo esc_url($project_screenshot_link); ?>" class="project-screenshot-link">
                                <figure class="project-screenshot-figure">
                                    <?php the_post_thumbnail('page_eyecatch'); ?>
                                </figure>
                            </a>
                        <?php endif; ?>
                    </div>
                    <?php the_content(); ?>
                    <section class="works-contents">
                        <h4><span class="eng">Skills</span></h4>
                        <div class="skill-wrapper">
                            <ul class="skill-list">
                            <?php
                            // ACFのカスタムフィールドから選択されたスキルを取得
                            $skills = get_field('skills'); // フィールド名が 'skills' の場合

                            // 使用言語に対応するFontAwesomeのクラス名を設定
                            $icons = array(
                                'HTML' => 'fa-brands fa-html5 fa-4x custom-icon',
                                'CSS' => 'fa-brands fa-css3-alt fa-4x custom-icon',
                                'JavaScript' => 'fa-brands fa-js fa-4x custom-icon',
                                'PHP' => 'fa-brands fa-php fa-4x custom-icon',
                                'WordPress' => 'fa-brands fa-wordpress fa-4x custom-icon',
                            );

                            // チェックボックスで選択されたスキルをループ
                            if( $skills ):
                                foreach( $skills as $skill ):
                                    // クラス名が設定されていれば表示
                                    if( array_key_exists( $skill, $icons ) ): ?>
                                        <li><i class="<?php echo esc_attr( $icons[$skill] ); ?>"></i></li>
                                    <?php
                                    endif;
                                endforeach;
                            endif;
                            ?>
                            </ul>
                        </div>
                        <?php
// 詳細を表示
$detail = get_field('detail');  // "detail" はフィールド名
if ($detail) {
    echo '<details class="accordion-003">';
    echo '<summary>詳細</summary>';
    echo '<ul>';
    $detail_list = explode("\n", $detail);
    foreach ($detail_list as $item) {
        if (!empty(trim($item))) {
            echo '<li>' . esc_html(trim($item)) . '</li>';
        }
    }
    echo '</ul>';
    echo '</details>';
} else {
    echo '<p>詳細はありません。</p>';
}

// 学びを表示
$study = get_field('study');  // "study" はフィールド名
if ($study) {
    echo '<details class="accordion-003">';
    echo '<summary>学び</summary>';
    echo '<ul>';
    $study_list = explode("\n", $study);
    foreach ($study_list as $item) {
        if (!empty(trim($item))) {
            echo '<li>' . esc_html(trim($item)) . '</li>';
        }
    }
    echo '</ul>';
    echo '</details>';
} else {
    echo '<p>学びはありません。</p>';
}
?>


                    
                        <?php
                        // 製作期間を表示
                        $production_period = get_field('Production_period');
                        if ($production_period) {
                            echo '<h4 class="eng-2">製作期間</h4>';
                            echo '<p>' . esc_html($production_period) . '</p>';
                        } else {
                            echo '<h4 class="eng-2">製作期間</h4>';
                            echo '<p>情報がありません。</p>';
                        }
                        ?>
                    </section>
                </div>
            </article>
        <?php endwhile; ?>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
