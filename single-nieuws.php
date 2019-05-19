<?php
get_header(); ?>

<div class="single-header">
    <div class="container">
        <div class="row">
            <div class="offset-md-1 col-md-9">
                <h1><?php the_title();?></h1>
                <div class="information-news">
                    <div class="author">
                        <?php if ( have_rows( 'informatie_nieuws' ) ) { ?>
                            <?php while ( have_rows( 'informatie_nieuws' ) ) : the_row(); ?>
                                <?php $auteur_afbeelding = get_sub_field( 'auteur_afbeelding' ); ?>
                                <?php if ( $auteur_afbeelding ) { ?>
                                    <img src="<?php echo $auteur_afbeelding['sizes']['vacaturesmall']; ?>" alt="<?php echo $auteur_afbeelding['alt']; ?>" />
                                <?php } else { ?>
                                    <?php $author = get_the_author();?>
                                        <?php echo mb_strimwidth($author, 0, 1, '');?>
                                <?php } ?>
                            <?php endwhile; ?>
                        <?php } ?>
                    </div>
                    <div class="athdat">
                        <span class="author-name"><?php $author = get_the_author(); echo $author?></span>
                        <span class="date"><?php the_time('j-n-Y');?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if ( function_exists('yoast_breadcrumb') ) {
                    yoast_breadcrumb('');
                }?>
            </div>
        </div>
    </div>
</div>

<main id="sngl-news">

    <?php if ( have_rows( 'sections' ) ): ?>
        <?php while ( have_rows( 'sections' ) ) : the_row(); ?>
            <?php if ( get_row_layout() == 'intro_text' ) : ?>
            <section id="sngl-intro">
                <div class="container">
                    <div class="offset-md-2 col-md-8">
                        <p><?php the_sub_field( 'intro_text_paragraaf' ); ?></p>
                    </div>
                </div>
            </section>
            <?php elseif ( get_row_layout() == 'volle_breedte_tekst' ) : ?>
                <section id="content">
                    <div class="container">
                        <div class="offset-md-2 col-md-8">
                            <?php the_sub_field( 'content' ); ?>
                            <?php if ( have_rows( 'knoppen' ) ) : ?>
                            <?php while ( have_rows( 'knoppen' ) ) : the_row(); ?>
                                <?php $knop = get_sub_field( 'knop' ); ?>
                                <?php if ( $knop ) { ?>
                                    <a class="btn<?php if ( get_sub_field( 'is_secondair' ) == 1 ) { ?> secondair<?php } ?>" href="<?php echo $knop['url']; ?>" target="<?php echo $knop['target']; ?>"><?php echo $knop['title']; ?></a>
                                <?php } ?>
                            <?php endwhile; ?>
                        <?php else : ?>
                            <?php // no rows found ?>
                        <?php endif; ?>
                        </div>
                    </div>
                </section>
            <?php elseif ( get_row_layout() == 'half__half' ) : ?>
                <section id="sngl-content">
                    <div class="container">
                        <div class="row">
                            <div class="offset-md-2 col-md-4">
                                <?php if ( have_rows( 'links' ) ) : ?>
                                    <?php while ( have_rows( 'links' ) ) : the_row(); ?>
                                        <?php the_sub_field( 'tekst' ); ?>
                                        <?php if ( have_rows( 'knoppen_left' ) ) : ?>
                                            <?php while ( have_rows( 'knoppen_left' ) ) : the_row(); ?>
                                                <?php $knop_l = get_sub_field( 'knop_l' ); ?>
                                                <?php if ( $knop_l ) { ?>
                                                    <a class="btn<?php if ( get_sub_field( 'is_secondair' ) == 1 ) { ?> secondair<?php } ?>" href="<?php echo $knop_l['url']; ?>" target="<?php echo $knop_l['target']; ?>"><?php echo $knop_l['title']; ?></a>
                                                <?php } ?> 
                                            <?php endwhile; ?>
                                        <?php else : ?>
                                            <?php // no rows found ?>
                                        <?php endif; ?>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-4">
                                <?php if ( have_rows( 'rechts' ) ) : ?>
                                    <?php while ( have_rows( 'rechts' ) ) : the_row(); ?>
                                        <?php the_sub_field( 'tekst' ); ?>
                                        <?php if ( have_rows( 'knoppen_right' ) ) : ?>
                                            <?php while ( have_rows( 'knoppen_right' ) ) : the_row(); ?>
                                                <?php $knop_r = get_sub_field( 'knop_r' ); ?>
                                                <?php if ( $knop_r ) { ?>
                                                    <a class="btn<?php if ( get_sub_field( 'is_secondair' ) == 1 ) { ?> secondair<?php } ?>" href="<?php echo $knop_r['url']; ?>" target="<?php echo $knop_r['target']; ?>"><?php echo $knop_r['title']; ?></a>
                                                <?php } ?>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </section>
            <?php elseif ( get_row_layout() == 'afbeelding' ) : ?>
                <section id="singl-img">
                    <div class="container">
                        <div class="row">
                            <div class="<?php if ( get_sub_field( 'lijn_de_afbeelding_uit_met_de_tekst' ) == 1 ) { ?>offset-md-2 col-md-8<?php } else { ?>col-md-10<?php }?>">
                                <?php $upload_een_afbeelding = get_sub_field( 'upload_een_afbeelding' ); ?>
                                <?php if ( $upload_een_afbeelding ) { ?>
                                    <div class="sngl-bigm <?php if ( get_sub_field( 'lijn_de_afbeelding_uit_met_de_tekst' ) == 1 ) { ?> inside<?php } ?>" style="background-image:url(<?php echo $upload_een_afbeelding['sizes']['large']; ?>);"></div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
        <?php endwhile; ?>
    <?php endif; ?>

</main>

<?php get_footer(); ?>