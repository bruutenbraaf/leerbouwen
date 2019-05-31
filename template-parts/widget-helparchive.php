<?php $postType = get_queried_object();?>
<?php if (have_rows('' . $postType->labels->name . '_hulp_nodig_widget', 'option')) : ?>
    <?php while (have_rows('' . $postType->labels->name . '_hulp_nodig_widget', 'option')) : the_row(); ?>
        <?php if (get_sub_field('toon_de_widget') == 1) { ?>
            <div class="help-needed">
                <div class="heading">
                    <?php $werknemerwidget = get_sub_field('afbeelding_werknemer'); ?>
                    <div class="image" style="background-image:url(<?php if ($werknemerwidget) { ?><?php echo $werknemerwidget['sizes']['smallfeatured']; ?> <?php } else { ?> <?php echo $afbeelding_geen_logo['sizes']['smallfeatured']; ?> <?php } ?>);">
                    </div>
                    <h3><?php the_sub_field('titel'); ?></h3>
                </div>
                <?php the_sub_field('tekst'); ?>
                <?php if (have_rows('knoppen')) : ?>
                    <?php while (have_rows('knoppen')) : the_row(); ?>
                        <?php $knop = get_sub_field('knop'); ?>
                        <?php if ($knop) { ?>
                            <a class="btn<?php if (get_sub_field('secondair') == 1) { ?> secondair<?php } ?>" href="<?php echo $knop['url']; ?>" <?php if ($knop['target']) { ?>target="<?php echo $knop['target']; ?>" <?php } ?>><?php echo $knop['title']; ?></a>
                        <?php } ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        <?php } ?>
    <?php endwhile; ?>
<?php endif; ?>