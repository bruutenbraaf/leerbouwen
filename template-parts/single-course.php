<?php $afbeelding_geen_logo = get_field('afbeelding_geen_logo', 'option'); ?>
<?php $featured = get_field('upload_featured_afbeelding'); ?>
<?php $logo = get_field('logo'); ?>

<section id="education-info">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-md-6">
                <?php if (have_rows('over_de_opleiding')) : ?>
                    <?php while (have_rows('over_de_opleiding')) : the_row(); ?>
                        <?php if (get_sub_field('titel')) { ?>
                            <h2><?php the_sub_field('titel'); ?></h2>
                        <?php } ?>
                        <?php the_sub_field('tekstueel'); ?>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php if (have_rows('knoppen_edu')) : ?>
                    <?php while (have_rows('knoppen_edu')) : the_row(); ?>
                        <?php $knop_edu = get_sub_field('knop_edu'); ?>
                        <?php if ($knop_edu) { ?>
                            <a class="btn<?php if (get_sub_field('is_secondair_edu') == 1) { ?> secondair<?php } ?>" href="<?php echo $knop_edu['url']; ?>" target="<?php echo $knop_edu['target']; ?>"><?php echo $knop_edu['title']; ?></a>
                        <?php } ?>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php if (have_rows('inhoud_items')) : ?>
                    <div class="education-content">
                        <h4><?php the_field('subtitel'); ?></h4>
                        <h2><?php the_field('titel_inhoud'); ?></h2>
                        <ul>
                            <?php while (have_rows('inhoud_items')) : the_row(); ?>
                                <li>
                                    <div class="content-title"><?php the_sub_field('titel_item'); ?></div>
                                    <div class="edu-content"><?php the_sub_field('inhoud_beschrijving'); ?></div>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <?php if (have_rows('extra_informatie')) : ?>
                    <?php while (have_rows('extra_informatie')) : the_row(); ?>
                        <div class="inf">
                            <h2><?php the_sub_field('titel'); ?></h2>
                            <?php the_sub_field('content'); ?>
                            <?php if (have_rows('knoppen_toevoegen')) : ?>
                                <?php while (have_rows('knoppen_toevoegen')) : the_row(); ?>
                                    <?php $knop = get_sub_field('knop'); ?>
                                    <?php if ($knop) { ?>
                                        <a class="btn <?php if (get_sub_field('is_secondair') == 1) { ?>secondair<?php } ?>" href="<?php echo $knop['url']; ?>" <?php if ($knop['target']) { ?>target="<?php echo $knop['target']; ?>" <?php } ?>><?php echo $knop['title']; ?></a>
                                    <?php } ?>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <div class="col-xl-4 offset-xl-1 col-md-5 offset-md-1 side">
                <?php if (get_field('toon_kosten') == 1) { ?>
                    <?php if (have_rows('kosten_opleidingcursus')) : ?>
                        <select class="cost-select">
                            <?php while (have_rows('kosten_opleidingcursus')) : the_row(); ?>
                                <option value="<?php the_sub_field('kosten_groep'); ?>"><?php _e('Ik ben', 'leerbouwen'); ?> <?php the_sub_field('kosten_groep'); ?></option>
                            <?php endwhile; ?>
                        </select>
                    <?php endif; ?>
                    <?php if (have_rows('kosten_opleidingcursus')) : ?>
                        <div class="costgroups">
                            <?php while (have_rows('kosten_opleidingcursus')) : the_row(); ?>
                                <div class="box <?php the_sub_field('kosten_groep'); ?>" id="<?php the_sub_field('kosten_groep'); ?>">
                                    <div class="row">
                                        <div class="col-6 heading"><?php _e('Periode', 'leerbouwen'); ?></div>
                                        <div class="col-6 heading"><?php _e('Kosten', 'leerbouwen'); ?></div>
                                        <?php if (have_rows('kosten_voor_de_kosten_groep')) : ?>
                                            <?php while (have_rows('kosten_voor_de_kosten_groep')) : the_row(); ?>
                                                <div class="col-6"><?php the_sub_field('periode'); ?></div>
                                                <div class="col-6"><?php _e('&euro;', 'leerbouwen') ?> <?php the_sub_field('kosten'); ?></div>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                    <script>
                        jQuery(document).ready(function() {
                            jQuery('select').niceSelect();
                            jQuery("select").change(function() {
                                jQuery(this).find("option:selected").each(function() {
                                    var optionValue = jQuery(this).attr("value");
                                    if (optionValue) {
                                        jQuery(".box").not("." + optionValue).hide();
                                        jQuery("." + optionValue).show();
                                    } else {
                                        jQuery(".box").hide();
                                    }
                                });
                            }).change();
                        });
                    </script>
                <?php } ?>
                <?php get_template_part('template-parts/widget', 'helpsingle'); ?>
            </div>
        </div>
    </div>
</section>