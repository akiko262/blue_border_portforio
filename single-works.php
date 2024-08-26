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
                        <h4>Skills</h4>
                        <div class="skill-wrapper">
                        <ul class="skill-list">
                        <?php
        // ACFのカスタムフィールドから選択された言語を取得
        $skills = get_field('skills'); // フィールド名が 'skills' の場合
        
        // 使用言語に対応するFontAwesomeのクラス名を設定
        $icons = array(
            'HTML' => 'fa-brands fa-html5 fa-4x custom-icon',
            'CSS' => 'fa-brands fa-css3-alt fa-4x custom-icon',
            'JavaScript' => 'fa-brands fa-js fa-4x custom-icon',
            'PHP' => 'fa-brands fa-php fa-4x custom-icon',
            'wordpress' => 'fa-brands fa-wordpress fa-4x custom-icon',
        );

        // チェックボックスで選択された言語をループ
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
                            <?php
                            $github_link = get_field('github_link');
                            if ($github_link) {
                                echo '<a href="' . esc_url($github_link) . '" target="_blank">GitHubでコードを見る</a>';
                            } else {
                                echo '<p>GitHubリンクはありません</p>';
                            }
                            ?>
                        </div>
                        <div class="project-info">
                            <h4>Point</h4>
                            <?php
                            $design_tips = get_field('design_tips');
                            if ($design_tips) {
                                echo '<details class="accordion-003">';
                                echo '<summary>工夫やこだわったところ</summary>';
                                echo '<ul>';
                                $tips = explode("\n", $design_tips);
                                foreach ($tips as $tip) {
                                    if (!empty(trim($tip))) {
                                        echo '<li>' . esc_html(trim($tip)) . '</li>';
                                    }
                                }
                                echo '</ul>';
                                echo '</details>';
                            } else {
                                echo '<p>工夫やこだわったところはありません。</p>';
                            }

                            $challenges = get_field('challenges');
                            if ($challenges) {
                                echo '<details class="accordion-003">';
                                echo '<summary>苦労したところ</summary>';
                                echo '<ul>';
                                $challenges_list = explode("\n", $challenges);
                                foreach ($challenges_list as $challenge) {
                                    if (!empty(trim($challenge))) {
                                        echo '<li>' . esc_html(trim($challenge)) . '</li>';
                                    }
                                }
                                echo '</ul>';
                                echo '</details>';
                            } else {
                                echo '<p>苦労したところはありません。</p>';
                            }

                            $production_period = get_field('Production_period');
                            if ($production_period) {
                                echo '<h4>製作期間</h4>';
                                echo '<p>' . esc_html($production_period) . '</p>';
                            } else {
                                echo '<h4>製作期間</h4>';
                                echo '<p>情報がありません。</p>';
                            }
                            ?>
                        </div>
                    </section>
                </div>
            </article>
        <?php endwhile; ?>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
