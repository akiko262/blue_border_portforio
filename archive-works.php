<?php get_header(); ?>
<main class="archive-works">
    <h2>Works</h2>
    <?php
    // 現在のページ番号を取得
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    // カスタムクエリの設定
    $args = array(
        'post_type' => 'works', // カスタム投稿タイプ
        'posts_per_page' => 3, // 1ページあたりの表示投稿数
        'paged' => $paged,     // ページネーションの設定
    );

    $custom_query = new WP_Query($args);

    if ($custom_query->have_posts()) :
        while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
            <article class="single-works" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h3 class="archive_h3"><?php the_title(); ?></h3>
                <?php 
                $project_screenshot_link = get_field('project_screenshot_link'); 
                ?>
                <a class="project-screenshot-link" href="<?php echo esc_url($project_screenshot_link); ?>">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('large', array('class' => 'project-thumbnail')); ?>
                    <?php endif; ?>
                </a>
                <div class="project-summary">
                    <?php the_excerpt(); ?>
                </div>
                <div class="project-details">
                    <?php
                    // スキルの表示
                    $skills = get_field('skills');
                    $icons = array(
                        'HTML' => 'fa-brands fa-html5 fa-2x',
                        'CSS' => 'fa-brands fa-css3-alt fa-2x',
                        'JavaScript' => 'fa-brands fa-js fa-2x',
                        'PHP' => 'fa-brands fa-php fa-2x',
                        'WordPress' => 'fa-brands fa-wordpress fa-2x',
                    );

                    if ($skills) : ?>
                        <h4 class="eng">Skills</h4>
                        <ul class="skill-list">
                            <?php foreach ($skills as $skill) : ?>
                                <?php if (array_key_exists($skill, $icons)) : ?>
                                    <li><i class="<?php echo esc_attr($icons[$skill]); ?>"></i> <?php echo esc_html($skill); ?></li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
                <div class="button"><a href="<?php the_permalink(); ?>" class="bgskew"><span>詳　細</span></a></div>
            </article>
        <?php endwhile; ?>

        <!-- ページネーション -->
        <div class="pagination">
            <?php
            the_posts_pagination(array(
                'mid_size'  => 2,
                'prev_text' => __('Previous', 'textdomain'),
                'next_text' => __('Next', 'textdomain'),
                'screen_reader_text' => __('Posts navigation', 'textdomain'),
            ));
            ?>
        </div>

    <?php else : ?>
        <p><?php _e('No works found.', 'textdomain'); ?></p>
    <?php endif; ?>

    <?php wp_reset_postdata(); // クエリのリセット ?>
</main>

<?php get_footer(); ?>
