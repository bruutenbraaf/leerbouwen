<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Bruut en Braaf">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <title><?php wp_title(''); ?></title>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	
<header>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="<?php if ( have_rows( 'menu', 'option' ) ) { ?>ro<?php } ?>">
                    <div class="branding">
                        <a href="<?php echo get_home_url(); ?>">
                            <?php $logo_full = get_field( 'logo_full', 'option' ); ?>
                            <?php if ( $logo_full ) { ?>
                                <img src="<?php echo $logo_full['url']; ?>" alt="<?php echo $logo_full['alt']; ?>" />
                            <?php } ?>
                        </a>
                    </div>
                    <div class="main-nav">
                        <?php wp_nav_menu( array( 'theme_location' => 'main_menu' ) ); ?>
                    </div>
                    <div class="mobile-nav">
                        <div class="hamburger">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                   </div>
                    <?php if ( have_rows( 'menu', 'option' ) ) : ?>
                        <?php while ( have_rows( 'menu', 'option' ) ) : the_row(); ?>
                            <?php if ( have_rows( 'cta_knoppen_menu' ) ) : ?>
                                <div class="ct-btns">
                                    <ul>
                                        <?php $i = 0;?>
                                        <?php while ( have_rows( 'cta_knoppen_menu' ) ) : the_row(); ?>
                                            <?php $i++;?>
                                            <?php $knop = get_sub_field( 'knop' ); ?>
                                            <?php if ( $knop ) { ?>
                                                <li><a class="<?php if ($i < 1) { ?>singular<?php } ?> menu-btn <?php if ( get_sub_field( 'secondaire_kleur_gebruiken' ) == 1 ) { ?>secondair<?php } ?>" href="<?php echo $knop['url']; ?>" target="<?php echo $knop['target']; ?>"><?php echo $knop['title']; ?></a></li>
                                            <?php } ?>
                                        <?php endwhile; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </nav>
            </div>
        </div>
    </div>
    <div class="reading-progress"></div>
    <div class="mobile-navigation">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php wp_nav_menu( array( 'theme_location' => 'mobile_menu' ) ); ?>
                </div>
            </div>
        </div>
        <?php if ( have_rows( 'menu', 'option' ) ) : ?>
            <?php while ( have_rows( 'menu', 'option' ) ) : the_row(); ?>
                <?php if ( have_rows( 'cta_knoppen_menu' ) ) : ?>
                    <div class="mt-btns">
                        <ul>
                            <?php $i = 0;?>
                            <?php while ( have_rows( 'cta_knoppen_menu' ) ) : the_row(); ?>
                                <?php $i++;?>
                                <?php $knop = get_sub_field( 'knop' ); ?>
                                <?php if ( $knop ) { ?>
                                    <li><a class="<?php if ($i < 1) { ?>singular<?php } ?> menu-btn <?php if ( get_sub_field( 'secondaire_kleur_gebruiken' ) == 1 ) { ?>secondair<?php } ?>" href="<?php echo $knop['url']; ?>" target="<?php echo $knop['target']; ?>"><?php echo $knop['title']; ?></a></li>
                                <?php } ?>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</header>