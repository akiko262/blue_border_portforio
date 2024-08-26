<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta <?php bloginfo('charset'); ?>>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo( 'description' );?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.1/normalize.css">
    <?php wp_head();?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
    <header class="header">
        <div class="header-inner">
            <!-- logo画像はdivで囲んでサイズ指定 -->
             <h1 class="logo"> <img class="logo-img" src="<?php echo esc_url(get_template_directory_uri()); ?>/imgs/logo.svg" alt="<?php bloginfo( 'name' );?>"></h1>
        <nav>
            <ul class="header-nav-ul">
                <li><a href="#skills">Skills</a></li>
                <li><a href="#works">Works</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
        </div>
    </header>