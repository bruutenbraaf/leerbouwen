<?php

/**
 * Provide a view for the vacancy widget
 *
 * @link https://www.uitzendplaats.nl
 * @since 1.0.0
 *
 * @package Uitzendplaats
 * @subpackage Uitzendplaats/admin/partials
 */
?>

<?php if (empty($view_data)) { ?>
	<p><?php _e('No vacancies found', 'uitzendplaats'); ?></p>
<?php } else { ?>
	<?php shuffle($view_data->data);
		foreach ($view_data->data as $key => $item) { ?>
		<article class="vacansie" data-scroll>
			<div class="inner">
				<h4><a href="<?php echo get_site_url(null, get_option('uitzendplaats-options')['uzp-vacancy-index-page'] . '/' . sanitize_title($item->title) . '/' . $item->id . '/') ?>" title="<?php echo $item->title ?>"><?php echo $item->title ?></a></h4>
				<div class="uzp__meta text-muted">
					<span class="location"><?php echo $item->location ?></span>
					<span class="branches">
						<?php
								foreach ($item->branches->data as $key => $branche) {
									echo $branche->name;
									if ($key < count($item->branches->data) - 1) {
										echo ', ';
									}
								}
								?>
					</span>
					<span class="education">
						<?php
								foreach ($item->education->data as $key => $edu) {
									echo $edu->name;
									if ($key < count($item->education->data) - 1) {
										echo ', ';
									}
								}
								?>
					</span>
				</div>
				<a class="the-link" href="<?php echo get_site_url(null, get_option('uitzendplaats-options')['uzp-vacancy-index-page'] . '/' . sanitize_title($item->title) . '/' . $item->id . '/') ?>" title="<?php _e('More information', 'uitzendplaats'); ?>"></a>
			</div>
		</article>
	<?php } ?>
<?php } ?>