<?php get_header( ); ?>
<div class="content">
<main class="wrapper">
    <div class="main-view" data-aos="fade-right">
         <figure class="main-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/imgs/sea.png" alt="海"></figure>
         <P class="main-text">blue border portforio</P>
    </div>
    <section id="skills">
        <h2>Skills</h2>
        <div class="card-container" data-aos="fade-left">
            <div class="card">
                <i class="fa-brands fa-html5 fa-8x custom-icon"></i>
                <div class="card__content">
                    <h3 class="card__title">HTML</h3>
                    <br class="card__text">適切なタグを使用し、ユーザーにとって利用しやすいサイトをコーディングいたします。</ｂ>
                </div>
            </div>
            <div class="card">
                <i class="fa-brands fa-css3-alt fa-8x custom-icon"></i>
                <div class="card__content">
                    <h3 class="card__title">CSS</h3>
                    <br class="card__text">基本的なレイアウトはもちろん、グリッドレイアウトやアニメーションの実装が可能です。</br>Bootstrapの使用も可能です。</p>
                </div>
            </div>
            <div class="card">
                <i class="fa-brands fa-js fa-8x custom-icon"></i>
                <div class="card__content">
                    <h3 class="card__title">Javascript</h3>
                    <br class="card__text">jqueryを用いた軽微なアニメーションから、リッチなアニメーションが実装可能です。</br>GSAP AOS Seiper.jsのライブラリの使用も可能です。</p>
                </div>
            </div>
            <div class="card">
                <i class="fa-brands fa-php fa-8x custom-icon"></i>
                <div class="card__content">
                    <h3 class="card__title">PHP</h3>
                    <br class="card__text">静的サイトからの共通化、</br>お問い合わせフォームの実装が可能です。</p>
                </div>
            </div>
            <div class="card">
                <i class="fa-brands fa-wordpress fa-8x custom-icon"></i>
                <div class="card__content">
                    <h3 class="card__title">Wordpess</h3>
                    <br class="card__text">既存テーマの製作から、</br>HTMLからのwordpress化、cssカスタマイズも可能です。</p>
                </div>
            </div>
            <div class="card">
                <i class="fa-brands fa-github fa-8x custom-icon"></i>
                <div class="card__content">
                    <h3 class="card__title">Git/GitHub</h3>
                    <br class="card__text">commit,push,branchの作成など、</br>基本的な操作が可能です。</p>
                </div>
            </div>
        </div>
    </section>
    <div class="full-width-bg" id="works-bg">
        <!-- カスタム投稿から投稿内容を抜粋 -->
        <section id="works">
    <h2>Works</h2>
    <div class="grid-container" data-aos="fade-right">
        <?php
        $args = array(
            'post_type' => 'works', // カスタム投稿タイプ「works」
            'posts_per_page' => -1,  // 全ての投稿を表示
        );
        $works_query = new WP_Query($args);
        if ($works_query->have_posts()) :
            while ($works_query->have_posts()) : $works_query->the_post();
                // リンクのURLを取得
                $work_url = get_permalink();
        ?>
            <div class="grid-item">
                <a href="<?php echo esc_url($work_url); ?>">
                    <?php 
                    if (has_post_thumbnail()) {
                        the_post_thumbnail('medium'); // 投稿に設定されたサムネイルを表示
                    } else {
                        // 画像が設定されていない場合のデフォルト画像
                        echo '<img src="' . esc_url(get_template_directory_uri()) . '/imgs/default-image.png" alt="Default Image">';
                    }
                    ?>
                </a>
                <p><?php the_title(); ?></p>
            </div>
        <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </div>
</section>
    </div>
    <section id="about">
        <h2>About</h2>
        <div class="about-innner" data-aos="fade-left">
            <div class="about-innner-wrapper">
            <figure class="profile-image"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/imgs/アイコン.png"></figure>
            <div class="about-massage">
              <h3 class="about-h3">メッセージ</h3>
              <p>はじめまして。コーダーのakikoと申します。現在web製作のコーディング業務に従事しております。</p>
              <p>前職では、長年看護師としての医療業務に従事しておりました。</p> 
              <p>その経験から『相手に寄り添う』ことの本質を日々追及し、患者様、医療スタッフ、そして家族との深い信頼関係を築いてきました。</p> 
              この貴重な経験をWeb制作の世界に活かし、
              クライアント様とそのお客様の声を真摯に受け止め、その背景を熟考し、ニーズを的確に捉えた制作を心がけます。技術力はもちろん、人間力を大切にしたコーディングで、心に響くWeb製作のお手伝いがきればと考えています。</p>
              <P>好きなこと：ヨガ、読書、自転車で近所のカフェ、パン屋さん巡り、地元愛知県、在住の福岡市、<br>糸島の海</P>
              <h3 class="about-h3">対応時間について</h3>
              <h4 class="eng-3">稼働時間について</h4>
              <ul class="list-1">
                <li>平日：９：００～１５：００頃</li>
                <li>土日、祝日：不定期</li>
            </ul>
              <h4 class="eng-3">対応できる時間帯</h4>
              <ul class="list-1">
                <li>平日：９：００～１７：００頃</li>
                <li>土日、祝日：状況による</li>
                <p>☆メッセージに関しては迅速対応を心がけております</p>
              </ul>
            </div>
            </div>
        </div>
    </section>
    <div class="full-width-bg" id="works-bg">
        <section id="contact" data-aos="fade-right">
        <h2>Contact</h2>
        <?php echo do_shortcode('[contact-form-7 id="c5ce14f" title="Contact"]'); ?>
    </section>
    </div>
</main>
<?php get_footer( ); ?>
